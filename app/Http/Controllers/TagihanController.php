<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::all();
        return view('tagihans.index', compact('tagihans'));
    }

    public function create()
    {
        return view('tagihans.create');
    }

    public function store(Request $request)
    {
        $tagihan = Tagihan::create([
            'id_admin' => $request->input('id_admin'),
            'id_pelanggan' => $request->input('id_pelanggan'),
            'id_petugas' => $request->input('id_petugas'),
            'id_kasir' => $request->input('id_kasir'),
            'status' => $request->input('status'),
            'meteran' => $request->input('meteran'),
            'bulan_penggunaan' => $request->input('bulan_penggunaan'),
            'tanggal_penagihan' => $request->input('tanggal_penagihan'),
            'jumlah_tagihan' => $request->input('jumlah_tagihan'),
        ]);

        // Handle any additional logic or validation here

        return redirect()->route('tagihans.index')
            ->with('success', 'Tagihan created successfully.');
    }

    public function show($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        return view('tagihans.show', compact('tagihan'));
    }

    public function edit($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        return view('tagihans.edit', compact('tagihan'));
    }

    public function update(Request $request, $id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->update([
            'id_admin' => $request->input('id_admin'),
            'id_pelanggan' => $request->input('id_pelanggan'),
            'id_petugas' => $request->input('id_petugas'),
            'id_kasir' => $request->input('id_kasir'),
            'status' => $request->input('status'),
            'meteran' => $request->input('meteran'),
            'bulan_penggunaan' => $request->input('bulan_penggunaan'),
            'tanggal_penagihan' => $request->input('tanggal_penagihan'),
            'jumlah_tagihan' => $request->input('jumlah_tagihan'),
        ]);

        // Handle any additional logic or validation here

        return redirect()->route('tagihans.index')
            ->with('success', 'Tagihan updated successfully.');
    }

    public function destroy($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->delete();

        // Handle any additional logic or validation here

        return redirect()->route('tagihans.index')
            ->with('success', 'Tagihan deleted successfully.');
    }
}
