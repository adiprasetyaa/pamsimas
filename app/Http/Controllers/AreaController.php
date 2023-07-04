<?php

namespace App\Http\Controllers;
use App\Models\Area;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $data_area = Area::latest()->get();
        return view('admin.backend.area.index',compact('data_area'));
    }

    public function create()
    {
        $data_area = Area::latest()->get();
        return view('admin.backend.area.index',compact('data_area'));
    }

    public function store(Request $request)
    {
        $request-> validate([
            'nama_area' => 'required',
            
        ],[
            'nama_area.required' => 'Mohon isi kolom nama dengan benar!'
        ]);
        
        // Create a new PetugasMeteran
        $area = new Area();
        $area->nama_area = $request->nama_area;
        $area->save();

        return redirect()->route('admin.area.index')
            ->with('success', 'Area created successfully.');
    }

    public function show($id)
    {

    }

    public function edit($id_area)
    {
        $data_area = Area::latest()->get();
        return view('admin.backend.area.index', compact('data_area'));
    }

    public function update(Request $request, $id_area)
    {

        $area = Area::where('id_area', $id_area)->firstOrFail();

        $area->nama_area = $request->nama_area;
        $area->save();

        return redirect()->route('admin.area.index')
            ->with('success', 'Area updated successfully.');
    }

    public function destroy($id_area)
    {
        $area = Area::findOrFail($id_area);
        $area->delete();

        // Handle any additional logic or validation here

        return redirect()->route('admin.area.index')
            ->with('success', 'Area deleted successfully.');
    }
}
