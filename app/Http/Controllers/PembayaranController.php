<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function create($id_tagihan)
    {
        $data_tagihan = Tagihan::findOrFail($id_tagihan);
        return view('pelanggan.backend.tagihan.index', compact('data_tagihan'));
    }


    public function store(Request $request, $id_tagihan)
    {
        // dd($request)->all();

        // Find the Tagihan record
        $tagihan = Tagihan::findOrFail($id_tagihan);

        // Find the associated Pembayaran record
        $pembayaran = Pembayaran::where('id_tagihan', $id_tagihan)->first();
    
        // Handle the uploaded file
        $uploadedFile = $request->bukti_pembayaran;
        $file_name = time().rand(100,999).".".$uploadedFile->getClientOriginalExtension();
        $uploadedFile->move('upload/bukti_pembayaran/', $file_name);
        $bukti_pembayaran_path = 'upload/bukti_pembayaran/' . $file_name;

        // save to pembayaran table
        $pembayaran->id_tagihan = $id_tagihan;
        $pembayaran->id_pelanggan = $tagihan->id_pelanggan;
        $pembayaran->jumlah_pembayaran = $tagihan->jumlah_tagihan;
        $tagihan->status = 'Sedang Diproses';
        $pembayaran->id_kasir = $tagihan->id_kasir;
        $pembayaran->bukti_pembayaran = $bukti_pembayaran_path;
        $pembayaran->tanggal_pembayaran = $request->tanggal_pembayaran;
        $pembayaran->save();
        $tagihan->save();

        // Redirect 
        return redirect()->route('pelanggan.tagihan.index')
            ->with('success', 'Bukti Pembayaran uploaded successfully.');
    }
}
