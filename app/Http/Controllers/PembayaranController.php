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
        // ddd($request)->all();

        // Validation for the input

        // Get tagihan data by id_tagihan
        // $tagihan = Tagihan::findOrFail($request->tagihan_id)

        // Find the Pelanggan record
        $tagihan = Tagihan::where('id_tagihan', $id_tagihan)->firstOrFail();

        // Find the associated User record
        $pembayaran = Pembayaran::findOrFail($tagihan->id_tagihan);
    
        // Handle the uploaded file
        $uploadedFile = $request->bukti_pembayaran;
        $fileName = $uploadedFile->getClientOriginalName();
        $uploadedFile->move('upload/bukti_pembayaran/', $fileName);
        $bukti_pembayaran_path = 'upload/bukti_pembayaran/' . $fileName;

        // save to pembayaran table
        $pembayaran = new Pembayaran();
        $pembayaran->id_tagihan = $id_tagihan;
        $pembayaran->id_pelanggan = $tagihan->id_pelanggan;
        $pembayaran->jumlah_pembayaran = $tagihan->jumlah_tagihan;
        $pembayaran->id_kasir = $tagihan->id_kasir;
        $pembayaran->bukti_pembayaran = $bukti_pembayaran_path;
        $pembayaran->tanggal_pembayaran = $request->tanggal_pembayaran;
        $pembayaran->save();

        // Redirect 
        return redirect()->route('pelanggan.tagihan.index')
            ->with('success', 'Bukti Pembayaran uploaded successfully.');
    }
}
