<?php

namespace App\Http\Controllers;

use App\Models\PetugasMeteran;
use Illuminate\Http\Request;

class PetugasMeteranController extends Controller
{
    public function PetugasDashboard(){
        return view('petugas.petugas_dashboard');
    }

    public function index()
    {
        $petugasMeterans = PetugasMeteran::all();
        return view('petugasMeterans.index', compact('petugasMeterans'));
    }

    public function create()
    {
        return view('petugasMeterans.create');
    }

    public function store(Request $request)
    {
        $petugasMeteran = PetugasMeteran::create([
            'id_admin' => $request->input('id_admin'),
            'id_user' => $request->input('id_user'),
            'area' => $request->input('area'),
        ]);

        // Handle any additional logic or validation here

        return redirect()->route('petugasMeterans.index')
            ->with('success', 'Petugas Meteran created successfully.');
    }

    public function show($id)
    {
        $petugasMeteran = PetugasMeteran::findOrFail($id);
        return view('petugasMeterans.show', compact('petugasMeteran'));
    }

    public function edit($id)
    {
        $petugasMeteran = PetugasMeteran::findOrFail($id);
        return view('petugasMeterans.edit', compact('petugasMeteran'));
    }

    public function update(Request $request, $id)
    {
        $petugasMeteran = PetugasMeteran::findOrFail($id);
        $petugasMeteran->update([
            'id_admin' => $request->input('id_admin'),
            'id_user' => $request->input('id_user'),
            'area' => $request->input('area'),
        ]);

        // Handle any additional logic or validation here

        return redirect()->route('petugasMeterans.index')
            ->with('success', 'Petugas Meteran updated successfully.');
    }

    public function destroy($id)
    {
        $petugasMeteran = PetugasMeteran::findOrFail($id);
        $petugasMeteran->delete();

        // Handle any additional logic or validation here

        return redirect()->route('petugasMeterans.index')
            ->with('success', 'Petugas Meteran deleted successfully.');
    }
}
