<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KasirController extends Controller
{
    public function KasirDashboard(){
        return view('kasir.kasir_dashboard');
    }

    public function index()
    {
        $data_kasir = Kasir::with('user')->get();
        $data_admin = Admin::latest()->get();
        return view('admin.backend.kasir.index',compact('data_kasir','data_admin'));
    }

    public function create()
    {
        $data_admin = Admin::latest()->get();
        return view('admin.backend.kasir.index',compact('data_admin'));
    }

    public function store(Request $request)
    {
        $request-> validate([
            'name' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'Mohon isi kolom nama dengan benar!'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'kasir';
        $user->password = Hash::make($request->password); // You can replace 'password' with an appropriate default password
        $user->save();
        
    
        // Create a new PetugasMeteran
        $kasir = new Kasir();
        $kasir->id_user = $user->id_user;
        $kasir->id_admin = $request->id_admin;
        $kasir->save();

        return redirect()->route('admin.kasir.index')
            ->with('success', 'Kasir created successfully.');
    }

    public function show()
    {

    }

    public function edit($id_kasir)
    {
        $data_admin = Admin::latest()->get();
        $data_kasir = Kasir::findOrFail($id_kasir);
        return view('admin.backend.kasir.index', compact('data_admin','data_kasir'));
    }

    public function update(Request $request, $id_kasir)
    {
        // Find the PetugasMeteran record
        $kasir = Kasir::where('id_kasir', $id_kasir)->firstOrFail();

        // Find the associated User record
        $user = User::findOrFail($kasir->id_user);

        // Update the User record
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Update the kasirMeteran record
        $kasir->id_admin = $request->id_admin;
        $kasir->save();

        return redirect()->route('admin.kasir.index')
            ->with('success', 'Kasir updated successfully.');
    }

    public function destroy($id_kasir)
    {
        $id_kasir = intval($id_kasir); // Convert $id_petugas to an integer
    
        // Find the PetugasMeteran record
        $kasir = Kasir::where('id_kasir', $id_kasir)->firstOrFail();
    
        // Find the associated User record
        $user = User::findOrFail($kasir->id_user);
    
        // Delete the kasir record
        $kasir->delete();
    
        // Delete the associated User record
        $user->delete();
    
        return redirect()->route('admin.kasir.index')
            ->with('success', 'Kasir deleted successfully.');
    }
}
