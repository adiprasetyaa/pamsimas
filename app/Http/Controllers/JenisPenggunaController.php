<?php

namespace App\Http\Controllers;

use App\Models\JenisPengguna;
use Illuminate\Http\Request;

class JenisPenggunaController extends Controller
{
    public function index()
    {
        $data_jenis_pengguna = JenisPengguna::latest()->get();
        return view('admin.backend.jenis_pengguna.index',compact('data_jenis_pengguna'));
    }

    public function create()
    {
        return view('admin.backend.jenis_pengguna.index');
    }

    public function store(Request $request)
    {
        $this-> validate($request,[
            'nama_jenis_pengguna' => 'required',
            'id_admin' => 'required',
        ]);

        $data_jenis_pengguna = JenisPengguna::create([
            'nama_jenis_pengguna' => $request->nama_jenis_pengguna,
            'id_admin' => $request->id_admin,
        ]);

        $data_jenis_pengguna->save();

        return redirect()->route('admin.jenis.pengguna.index')
            ->with('success', 'Jenis Pengguna created successfully.');
    }

    public function show(JenisPengguna $jenisPengguna)
    {
        return view('jenis_pengguna.show', compact('jenisPengguna'));
    }

    public function edit(JenisPengguna $jenisPengguna)
    {
        return view('jenis_pengguna.edit', compact('jenisPengguna'));
    }


    public function update(Request $request, $id_jenis_pengguna)
    {
        $this-> validate($request,[
            'nama_jenis_pengguna' => 'required',
            'id_admin' => 'required',
        ]);

        $data_jenis_pengguna = JenisPengguna::findOrFail($id_jenis_pengguna);

        $data_jenis_pengguna->nama_jenis_pengguna = $request->nama_jenis_pengguna;
        $data_jenis_pengguna->id_admin = $request->id_admin;
        $data_jenis_pengguna->save();
    
        return redirect()->route('admin.jenis.pengguna.index')
            ->with('success', 'Jenis Pengguna updated successfully.');

    }

    public function destroy($id_jenis_pengguna)
    {
        $data_jenis_pengguna = JenisPengguna::findOrFail($id_jenis_pengguna);
        $data_jenis_pengguna->delete();
    
        return redirect()->route('admin.jenis.pengguna.index')
            ->with('success', 'Jenis Pengguna deleted successfully.');
    
    }
}
