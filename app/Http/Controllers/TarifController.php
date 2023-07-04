<?php

namespace App\Http\Controllers;

use App\Models\JenisPengguna;
use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function SettingTarif(){

        $tarif = Tarif::latest()->get();
        return view('admin.backend.admin_set_tarif', compact('tarif'));
    }

    public function index()
    {
        $data_tarif = Tarif::with('jenis_pengguna')->get();
        $data_jenis_pengguna = JenisPengguna::latest()->get();
        return view('admin.backend.tarif.index',compact('data_tarif','data_jenis_pengguna'));
    }

    public function create()
    {
        $data_jenis_pengguna = JenisPengguna::latest()->get();
        return view('admin.backend.tarif.index',compact('data_jenis_pengguna'));
    }

    public function store(Request $request)
    {
        $request-> validate([
            'id_jenis_pengguna' => 'required',
            'biaya_tarif' => 'required',
            'minimum' => 'required',
            'maximum' => 'required',
            
        ],[
            'name.required' => 'Mohon isi kolom nama dengan benar!'
        ]);
        
        // Create a new PetugasMeteran
        $tarif = new Tarif();
        $tarif->id_jenis_pengguna = $request->id_jenis_pengguna;
        $tarif->biaya_tarif = $request->biaya_tarif;
        $tarif->minimum = $request->minimum;
        $tarif->maximum = $request->maximum;
        $tarif->save();

        return redirect()->route('admin.tarif.index')
            ->with('success', 'Tarif created successfully.');
    }

    public function show($id)
    {

    }

    public function edit($id_tarif)
    {
        $data_jenis_pengguna = JenisPengguna::latest()->get();
        $data_tarif = Tarif::findOrFail($id_tarif);
        return view('admin.backend.kasir.index', compact('data_jenis_pengguna','data_tarif'));
    }

    public function update(Request $request, $id_tarif)
    {
        // Find the Tarif record
        $tarif = Tarif::where('id_tarif', $id_tarif)->firstOrFail();

        // Find the associated User record
        // $user = User::findOrFail($kasir->id_user);

        // // Update the User record
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();

        // Update the Tarif table record
        $tarif->id_jenis_pengguna = $request->id_jenis_pengguna;
        $tarif->biaya_tarif = $request->biaya_tarif;
        $tarif->minimum = $request->minimum;
        $tarif->maximum = $request->maximum;
        $tarif->save();

        return redirect()->route('admin.tarif.index')
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
