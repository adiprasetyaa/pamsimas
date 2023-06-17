<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $kasirs = Kasir::all();
        return view('kasirs.index', compact('kasirs'));
    }

    public function create()
    {
        return view('kasirs.create');
    }

    public function store(Request $request)
    {
        $kasir = Kasir::create([
            'id_admin' => $request->input('id_admin'),
            'id_user' => $request->input('id_user'),
        ]);

        return redirect()->route('kasirs.index')
            ->with('success', 'Kasir created successfully.');
    }

    public function show($id)
    {
        $kasir = Kasir::findOrFail($id);
        return view('kasirs.show', compact('kasir'));
    }

    public function edit($id)
    {
        $kasir = Kasir::findOrFail($id);
        return view('kasirs.edit', compact('kasir'));
    }

    public function update(Request $request, $id)
    {
        $kasir = Kasir::findOrFail($id);
        $kasir->update([
            'id_admin' => $request->input('id_admin'),
            'id_user' => $request->input('id_user'),
        ]);

        return redirect()->route('kasirs.index')
            ->with('success', 'Kasir updated successfully.');
    }

    public function destroy($id)
    {
        $kasir = Kasir::findOrFail($id);
        $kasir->delete();


        return redirect()->route('kasirs.index')
            ->with('success', 'Kasir deleted successfully.');
    }
}
