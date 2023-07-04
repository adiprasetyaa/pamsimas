<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Area;
use App\Models\PetugasMeteran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasMeteranController extends Controller
{
    public function PetugasDashboard(){
        return view('petugas.petugas_dashboard');
    }

    public function index()
    {
        $data_petugas = PetugasMeteran::with('user')->get();
        $data_admin = Admin::latest()->get();
        $data_area = Area::latest()->get();
        return view('admin.backend.petugas.index',compact('data_petugas','data_admin','data_area'));
    }

    public function create()
    {

        // $data_petugas = PetugasMeteran::with('user')->get();
        $data_admin = Admin::latest()->get();
        $data_area = Area::latest()->get();
        return view('admin.backend.petugas.index',compact('data_admin','data_area'));
    }

    public function store(Request $request)
    {
        // return $request;
        $request-> validate([
            'name' => 'required',
            'email' => 'required',
            'id_area' => 'required'
        ],[
            'name.required' => 'Mohon isi kolom nama dengan benar!'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'petugas';
        $user->password = Hash::make($request->password); // You can replace 'password' with an appropriate default password
        $user->save(); 
        
    
        // Create a new PetugasMeteran
        $petugas = new PetugasMeteran();
        $petugas->id_user = $user->id_user;
        $petugas->id_admin = $request->id_admin;
        $petugas->id_area = $request->id_area;
        $petugas->save();

        return redirect()->route('admin.petugas.index')
            ->with('success', 'Petugas created successfully.');
    }

    public function show($id)
    {
        
        
    }
    
    public function edit($id_petugas)
    {
        $data_admin = Admin::latest()->get();
        $data_area = Area::latest()->get();
        $data_petugas = PetugasMeteran::findOrFail($id_petugas);
        return view('admin.backend.petugas.index', compact('data_admin','data_petugas','data_area'));
    }

    

    public function update(Request $request, $id_petugas)
    {   

        // Find the PetugasMeteran record
        $petugas = PetugasMeteran::where('id_petugas', $id_petugas)->firstOrFail();

        // Find the associated User record
        $user = User::findOrFail($petugas->id_user);

        // Update the User record
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'petugas';
        $user->password = Hash::make($request->password);
        $user->save();

        // Update the PetugasMeteran record
        $petugas->id_admin = $request->id_admin;
        $petugas->id_area = $request->id_area;
        $petugas->save();

        return redirect()->route('admin.petugas.index')
            ->with('success', 'Petugas Meteran updated successfully.');

    }

    public function destroy($id_petugas)
    {
        $id_petugas = intval($id_petugas); // Convert $id_petugas to an integer
    
        // Find the PetugasMeteran record
        $petugas = PetugasMeteran::where('id_petugas', $id_petugas)->firstOrFail();
    
        // Find the associated User record
        $user = User::findOrFail($petugas->id_user);
    
        // Delete the PetugasMeteran record
        $petugas->delete();
    
        // Delete the associated User record
        $user->delete();
    
        return redirect()->route('admin.petugas.index')
            ->with('success', 'Petugas Meteran deleted successfully.');
    }
}
