<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Area;
use App\Models\Pelanggan;
use App\Models\PetugasMeteran;
use App\Models\Tagihan;
use App\Models\Kasir;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class KasirController extends Controller
{
    public function KasirDashboard(){
        return view('kasir.kasir_dashboard');
    }

    public function showDaftarTagihan()
    {
        $data_kasir = Auth::user()->kasir;
    
        if ($data_kasir) {
            $id_kasir = $data_kasir->id_kasir;
    
            $data_tagihan = Tagihan::where('id_kasir', $id_kasir)
                ->with('pelanggan.user', 'pelanggan.area', 'pembayaran')
                ->get();

            
            // dd($data_tagihan);
    
            return view('kasir.backend.cek_tagihan.index', compact('data_tagihan'));
        }
    
        // Jika tidak ada objek petugas_meteran terkait dengan pengguna yang login

    }

    public function showDetailTagihan($id_tagihan){

        $data_tagihan = Tagihan::where('id_pelanggan', $id_pelanggan)
        ->with('pelanggan.user','pembayaran')
        ->get();

        // dd($data_tagihan);
        return view('kasir.backend.cek_tagihan.index', compact('data_tagihan'));
    }


    // Show Approval Pembayaran Pages [ KASIR ]
        public function showDaftarPembayaran(){

                $data_tagihan = Tagihan::where('status', 'Sedang Diproses')
                    ->with('pelanggan.user', 'pembayaran')
                    ->get();

                return view('kasir.backend.approval.index', compact('data_tagihan'));
            
        }

        public function showDetailPembayaran($id_tagihan){
            $data_tagihan = Tagihan::where('id_pelanggan', $id_pelanggan)
            ->with('pelanggan.user', 'pembayaran')
            ->get();

            return view('kasir.backend.approval.index', compact('data_tagihan'));
        }

        public function showBuktiPembayaran($id_tagihan){
            $data_tagihan = Tagihan::where('id_tagihan', $id_tagihan)
            ->with('pembayaran')
            ->get();

            return view('kasir.backend.approval.index', compact('data_tagihan'));
        }



        public function approvePembayaran($id_tagihan){

            $data_kasir = Auth::user()->kasir;

            $data_tagihan = Tagihan::findOrFail($id_tagihan);
            $data_pembayaran = Pembayaran::where('id_tagihan', $id_tagihan)-> first();

            $data_tagihan->status = 'Sudah Lunas';
            $data_tagihan->id_kasir = $data_kasir->id_kasir;
            $data_tagihan->save();

            $data_pembayaran->id_kasir = $data_kasir->id_kasir;
            $data_pembayaran->save();


            return redirect()->back();

        }

        public function declinePembayaran($id_tagihan){

            $data_tagihan = Tagihan::findOrFail($id_tagihan);

            $data_tagihan->status = 'Belum Lunas';

            $data_tagihan->save();

            return redirect()->back();

        }
    // End of Show Approval Pembayaran Pages

    // Show Cash Payment Pages [ KASIR ]
        public function showDaftarPembayaranTunai(){
            $data_tagihan = Tagihan::where('status', 'Belum Lunas')
            ->with('pelanggan.user', 'pembayaran')
            ->get();

            return view('kasir.backend.cash_payment.index', compact('data_tagihan'));
        }

        public function showDetailPembayaranTunai($id_tagihan){
            $data_tagihan = Tagihan::where('id_pelanggan', $id_tagihan)
            ->with('pelanggan.user', 'pembayaran')
            ->get();
    
            return view('kasir.backend.cash_payment.index', compact('data_tagihan'));
        }

        public function paidPembayaran(Request $request, $id_tagihan){

            $data_kasir = Auth::user()->kasir;

            $data_tagihan = Tagihan::findOrFail($id_tagihan);
            $data_pembayaran = Pembayaran::where('id_tagihan', $id_tagihan)-> first();

            $data_tagihan->status = 'Sudah Lunas';
            $data_tagihan->id_kasir = $data_kasir->id_kasir;
            $data_tagihan->save();

            $data_pembayaran->id_kasir = $data_kasir->id_kasir;
            $data_pembayaran->tanggal_pembayaran = $request->tanggal_pembayaran;
            $data_pembayaran->save();


            return view('kasir.backend.cash_payment.show', compact('data_tagihan'));
        }
        
        // End Of Show Cash Payment Pages 

    // Show Invoice Pages
        public function invoicePages($id_tagihan){

            $data_tagihan = Tagihan::where('id_tagihan', $id_tagihan)
            ->with('pelanggan.user', 'pembayaran','pelanggan.area')
            ->get();

            return view('kasir.backend.cash_payment.show', compact('data_tagihan'));
        }   
    
        public function viewInvoice($id_tagihan){

            $data_tagihan = Tagihan::where('id_tagihan', $id_tagihan)
            ->with('pelanggan.user', 'pembayaran','pelanggan.area')
            -> first();;

            return view('kasir.backend.cash_payment.invoice', compact('data_tagihan'));
        }

        public function printInvoice($id_tagihan){

            $data_tagihan = Tagihan::where('id_tagihan', $id_tagihan)
            ->with('pelanggan.user', 'pembayaran','pelanggan.area')
            -> first();;

            $pdf = Pdf::loadView('kasir.backend.cash_payment.invoice', compact('data_tagihan'));
            $today_date = Carbon::now()->format('d-m-Y');
            return $pdf->download('invoice'.$data_tagihan->id_tagihan.'-'.$today_date.'.pdf');

        }
    // End of Invoice Pages


    public function index()
    {
        $data_kasir = Kasir::with('user')->get();
        $data_admin = Admin::latest()->get();
        return view('admin.backend.kasir.index',compact('data_kasir','data_admin'));
    }



    public function create()
    {
        $data_admin = Admin::latest()->get();
        return view('admin.backend.kasir.index',compact('data_admin'));
    }

    public function store(Request $request)
    {
        $request-> validate([
            'name' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'Mohon isi kolom nama dengan benar!'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'kasir';
        $user->password = Hash::make($request->password); // You can replace 'password' with an appropriate default password
        $user->save();
        
    
        // Create a new PetugasMeteran
        $kasir = new Kasir();
        $kasir->id_user = $user->id_user;
        $kasir->id_admin = $request->id_admin;
        $kasir->save();

        return redirect()->route('admin.kasir.index')
            ->with('success', 'Kasir created successfully.');
    }

    public function show()
    {

    }

    public function edit($id_kasir)
    {
        $data_admin = Admin::latest()->get();
        $data_kasir = Kasir::findOrFail($id_kasir);
        return view('admin.backend.kasir.index', compact('data_admin','data_kasir'));
    }

    public function update(Request $request, $id_kasir)
    {
        // Find the PetugasMeteran record
        $kasir = Kasir::where('id_kasir', $id_kasir)->firstOrFail();

        // Find the associated User record
        $user = User::findOrFail($kasir->id_user);

        // Update the User record
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Update the kasirMeteran record
        $kasir->id_admin = $request->id_admin;
        $kasir->save();

        return redirect()->route('admin.kasir.index')
            ->with('success', 'Kasir updated successfully.');
    }

    public function destroy($id_kasir)
    {
        $id_kasir = intval($id_kasir); // Convert $id_petugas to an integer
    
        // Find the PetugasMeteran record
        $kasir = Kasir::where('id_kasir', $id_kasir)->firstOrFail();
    
        // Find the associated User record
        $user = User::findOrFail($kasir->id_user);
    
        // Delete the kasir record
        $kasir->delete();
    
        // Delete the associated User record
        $user->delete();
    
        return redirect()->route('admin.kasir.index')
            ->with('success', 'Kasir deleted successfully.');
    }
}
