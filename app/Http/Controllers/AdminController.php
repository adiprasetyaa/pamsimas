<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin(){
        return view('admin.admin_login');
    }

    public function AdminProfile(){

        $id_user = Auth::user()->id_user;
        $profileData = User::find($id_user);

        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function index()
    {
        $administrators = Administrator::all();
        return view('administrators.index', compact('administrators'));
    }

    public function create()
    {
        return view('administrators.create');
    }

    public function store(Request $request)
    {
        $administrator = Administrator::create([
            'id_user' => $request->input('id_user'),
        ]);

        return redirect()->route('administrators.index')
            ->with('success', 'Administrator created successfully.');
    }

    public function show($id)
    {
        $administrator = Administrator::findOrFail($id);
        return view('administrators.show', compact('administrator'));
    }

    public function edit($id)
    {
        $administrator = Administrator::findOrFail($id);
        return view('administrators.edit', compact('administrator'));
    }

    public function update(Request $request, $id)
    {
        $administrator = Administrator::findOrFail($id);
        $administrator->update([
            'id_user' => $request->input('id_user'),
        ]);

        return redirect()->route('administrators.index')
            ->with('success', 'Administrator updated successfully.');
    }

    public function destroy($id)
    {
        $administrator = Administrator::findOrFail($id);
        $administrator->delete();


        return redirect()->route('administrators.index')
            ->with('success', 'Administrator deleted successfully.');
    }
}
