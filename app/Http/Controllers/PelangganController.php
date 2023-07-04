<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Area;                                                          
use App\Models\PetugasMeteran; 
use App\Models\JenisPengguna;                              
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    public function PelangganDashboard(){
        return view('pelanggan.pelanggan_dashboard');
    }

    public function index()
    {
        $data_petugas = PetugasMeteran::with('user')->get();
        $data_admin = Admin::latest()->get();
        $data_area = Area::latest()->get();
        $data_jenis_pengguna = JenisPengguna::latest()->get();
        $data_pelanggan = Pelanggan::with('user','petugas_meteran', 'area', 'jenis_pengguna')->get();

        return view('admin.backend.pelanggan.index',compact('data_petugas','data_admin','data_area','data_pelanggan','data_jenis_pengguna'));
    }

    public function create()
    {
        $data_petugas = PetugasMeteran::with('user')->get();
        $data_admin = Admin::latest()->get();
        $data_area = Area::latest()->get();
        $data_jenis_pengguna = JenisPengguna::latest()->get();
        return view('admin.backend.pelanggan.index',compact('data_petugas','data_admin','data_area','data_jenis_pengguna'));
    }

    public function store(Request $request)
    {

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
        $user->role = 'pelanggan';
        $user->password = Hash::make($request->password); // You can replace 'password' with an appropriate default password
        $user->save(); 
        
    
        // Create a new PetugasMeteran
        $pelanggan = new Pelanggan();
        $pelanggan->id_user = $user->id_user;
        $pelanggan->id_admin = $request->id_admin;
        $pelanggan->id_jenis_pengguna = $request->id_jenis_pengguna;
        $pelanggan->id_petugas = $request->id_petugas;
        $pelanggan->id_area = $request->id_area;
        $pelanggan->save();

        return redirect()->route('admin.pelanggan.index')
            ->with('success', 'Pelanggan created successfully.');
    }

    public function show($id)
    {
        // $pelanggan = Pelanggan::findOrFail($id);
        // return view('pelanggans.show', compact('pelanggan'));
    }

    public function edit($id_pelanggan)
    {
        $data_petugas = PetugasMeteran::with('user')->get();
        $data_admin = Admin::latest()->get();
        $data_area = Area::latest()->get();
        $data_jenis_pengguna = JenisPengguna::latest()->get();
        $data_pelanggan = Pelanggan::findOrFail($id_pelanggan);

        return view('admin.backend.pelanggan.index',compact('data_petugas','data_admin','data_area','data_jenis_pengguna','data_pelanggan'));
    }

    public function update(Request $request, $id_pelanggan)
    {
        // Find the Pelanggan record
        $pelanggan = Pelanggan::where('id_pelanggan', $id_pelanggan)->firstOrFail();

        // Find the associated User record
        $user = User::findOrFail($pelanggan->id_user);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'pelanggan';
        $user->password = Hash::make($request->password); // You can replace 'password' with an appropriate default password
        $user->save(); 
        
        $pelanggan->id_user = $user->id_user;
        $pelanggan->id_admin = $request->id_admin;
        $pelanggan->id_jenis_pengguna = $request->id_jenis_pengguna;
        $pelanggan->id_petugas = $request->id_petugas;
        $pelanggan->id_area = $request->id_area;
        $pelanggan->save();

        // Handle any additional logic or validation here

        return redirect()->route('admin.pelanggan.index')
            ->with('success', 'Pelanggan updated successfully.');
    }

    public function destroy($id_pelanggan)
    {
    
        // Find the PetugasMeteran record
        $pelanggan = Pelanggan::where('id_pelanggan', $id_pelanggan)->firstOrFail();
    
        // Find the associated User record
        $user = User::findOrFail($pelanggan->id_user);
    
        // Delete the pelangganMeteran record
        $pelanggan->delete();
    
        // Delete the associated User record
        $user->delete();
        return redirect()->route('admin.pelanggan.index')
            ->with('success', 'Pelanggan deleted successfully.');
    }
}
