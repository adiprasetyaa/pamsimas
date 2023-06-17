<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index()
    {
        $tarifs = Tarif::all();
        return view('tarifs.index', compact('tarifs'));
    }

    public function create()
    {
        return view('tarifs.create');
    }

    public function store(Request $request)
    {
        $tarif = Tarif::create([
            'id_jenis_pengguna' => $request->input('id_jenis_pengguna'),
            'biaya_tarif' => $request->input('biaya_tarif'),
            'minimum' => $request->input('minimum'),
            'maximum' => $request->input('maximum'),
        ]);

        // Handle any additional logic or validation here

        return redirect()->route('tarifs.index')
            ->with('success', 'Tarif created successfully.');
    }

    public function show($id)
    {
        $tarif = Tarif::findOrFail($id);
        return view('tarifs.show', compact('tarif'));
    }

    public function edit($id)
    {
        $tarif = Tarif::findOrFail($id);
        return view('tarifs.edit', compact('tarif'));
    }

    public function update(Request $request, $id)
    {
        $tarif = Tarif::findOrFail($id);
        $tarif->update([
            'id_jenis_pengguna' => $request->input('id_jenis_pengguna'),
            'biaya_tarif' => $request->input('biaya_tarif'),
            'minimum' => $request->input('minimum'),
            'maximum' => $request->input('maximum'),
        ]);

        // Handle any additional logic or validation here

        return redirect()->route('tarifs.index')
            ->with('success', 'Tarif updated successfully.');
    }

    public function destroy($id)
    {
        $tarif = Tarif::findOrFail($id);
        $tarif->delete();

        // Handle any additional logic or validation here

        return redirect()->route('tarifs.index')
            ->with('success', 'Tarif deleted successfully.');
    }
}
