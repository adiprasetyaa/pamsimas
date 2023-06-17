<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggans.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggans.create');
    }

    public function store(Request $request)
    {
        $pelanggan = Pelanggan::create([
            'id_admin' => $request->input('id_admin'),
            'id_jenis_pengguna' => $request->input('id_jenis_pengguna'),
            'id_user' => $request->input('id_user'),
            'id_petugas' => $request->input('id_petugas'),
            'email_pelanggan' => $request->input('email_pelanggan'),
            'kelurahan' => $request->input('kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
        ]);

        // Handle any additional logic or validation here

        return redirect()->route('pelanggans.index')
            ->with('success', 'Pelanggan created successfully.');
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggans.show', compact('pelanggan'));
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggans.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update([
            'id_admin' => $request->input('id_admin'),
            'id_jenis_pengguna' => $request->input('id_jenis_pengguna'),
            'id_user' => $request->input('id_user'),
            'id_petugas' => $request->input('id_petugas'),
            'email_pelanggan' => $request->input('email_pelanggan'),
            'kelurahan' => $request->input('kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
        ]);

        // Handle any additional logic or validation here

        return redirect()->route('pelanggans.index')
            ->with('success', 'Pelanggan updated successfully.');
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        // Handle any additional logic or validation here

        return redirect()->route('pelanggans.index')
            ->with('success', 'Pelanggan deleted successfully.');
    }
}
