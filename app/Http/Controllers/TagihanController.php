<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelanggan;
use App\Models\PetugasMeteran;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagihanController extends Controller
{
    // Show List Tagihan as Pelanggan Role
    public function index(){
        $id_pelanggan = Auth::user()->pelanggan->id_pelanggan;

        $data_tagihan = Tagihan::where('id_pelanggan', $id_pelanggan)
        ->where('status_tagihan', 'Completed')
        ->orWhere('status_tagihan', 'Sent')
        ->with('pelanggan.user', 'pembayaran')
        ->get();
    

        return view('pelanggan.backend.tagihan.index', compact('data_tagihan'));
    }

    // Show Detail Tagihan as Pelanggan Role
    public function show($id_tagihan){
        
        $data_tagihan = Tagihan::findOrFail($id_tagihan);
        return view('pelanggan.backend.tagihan.index', compact('data_tagihan'));
    }

    // Create Input Penggunaan Air as Petugas Role
    public function createInputPenggunaanAir(){
        
        return view('petugas.backend.input_penggunaan_air.create');
    }

     // Store Input Penggunaan Air as Petugas Role
    public function storeInputPenggunaanAir(Request $request){

        $id_petugas = Auth::user()->petugas_meteran->id_petugas;

        // Calculate Meteran Value
        $meteran = $request->meteran_akhir - $request->meteran_awal;

        $data_pelanggan = Pelanggan::findOrFail($request->id_pelanggan);

        $jenis_pengguna = $data_pelanggan->id_jenis_pengguna;

        // Retrieve tarif based on jenis_pengguna's foreign key
        $data_tarif = Tarif::where('id_jenis_pengguna', $jenis_pengguna)->first();
        $data_petugas = PetugasMeteran::where('id_petugas', $id_petugas)->first();

        // Main Cost
        if($meteran > 0 && $meteran <10){
            $jumlah_tagihan = $data_tarif ->biaya_tarif * $meteran;
        }elseif($meteran >=10 && $meteran <20){
            $jumlah_tagihan = $data_tarif ->biaya_tarif * $meteran;
        }elseif($meteran >=20 && $meteran < 30){
            $jumlah_tagihan = $data_tarif ->biaya_tarif * $meteran;
        }elseif($meteran >=30){
            $jumlah_tagihan = $data_tarif ->biaya_tarif * $meteran;
        }

        // Additional Cost
        $biaya_beban_tetap = 7450;
        $biaya_pemeliharaan = 4400;
        $PPN = 1995;
        $biaya_materai = 3000;
        $biaya_admin = 2500;

        // Calculate all cost
        $jumlah_tagihan = $jumlah_tagihan + $biaya_beban_tetap + $biaya_pemeliharaan + $PPN + $biaya_materai + $biaya_admin;

        $tagihan = new Tagihan();
        $tagihan->id_pelanggan = $request->id_pelanggan;
        $tagihan->id_admin = $data_petugas->id_admin;
        $tagihan->id_petugas = $id_petugas;
        // $tagihan->status = 'Belum Lunas'; // Default Value in migration
        $tagihan->meteran = $meteran;
        $tagihan->bulan_penggunaan = $request->bulan_penggunaan;
        $tagihan->tanggal_penagihan = $request->tanggal_penagihan;
        $tagihan->jumlah_tagihan = $jumlah_tagihan;
        $tagihan->save(); 

        $pembayaran = new Pembayaran();
        $pembayaran->id_pelanggan = $request->id_pelanggan;
        $pembayaran->id_tagihan = $tagihan->id_tagihan;
        $pembayaran->jumlah_pembayaran = $tagihan->jumlah_tagihan;
        $pembayaran->save();


        return redirect()->route('petugas.input.create')
            ->with('success', 'Pelanggan created successfully.');
    }

    // Show List Tagihan if Petugas Click Tampilkan Tagihan Button
    public function generateTagihanShow(Request $request)
    {
        $bulan_penggunaan = $request->bulan_penggunaan;

        $data_tagihan = Tagihan::where('bulan_penggunaan', $bulan_penggunaan)
            ->where('status_tagihan', 'Pending')
            ->with('pelanggan.user', 'pelanggan.area')
            ->get();

        return view('petugas.backend.generate_tagihan.create', compact('data_tagihan'));
    }


    public function generateTagihanCreate(){
        
        return view('petugas.backend.generate_tagihan.create');
    }


    public function generateTagihanStore(Request $request)
    {
        $periode_tagihan = $request->bulan_penggunaan; // Periode tagihan dalam format YYYYMM (e.g. 202304)

        // Retrieve tagihan dengan status "Pending" berdasarkan periode tagihan
        $tagihan_pending = Tagihan::where('status_tagihan', 'Pending')
            ->where('bulan_penggunaan', $periode_tagihan)
            ->get();

        foreach ($tagihan_pending as $tagihan) {
            // Update status tagihan menjadi "Completed"
            $tagihan->status_tagihan = "Completed";
            $tagihan->save();
        }

        return redirect()->route('petugas.generate.show')
            ->with('success', 'Tagihan berhasil digenerate.');
    }

}
