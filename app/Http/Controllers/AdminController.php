<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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


    // For show Admin Profile Pages
    public function AdminProfile(){

        $id_user = Auth::user()->id_user;
        $profileData = User::find($id_user);

        return view('admin.admin_profile_view', compact('profileData'));
    }

    // For change Admin data
    public function AdminProfileStore(Request $request){
        $id_user = Auth::user()->id_user;
        $data = User::find($id_user);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data ->save();
    
        $notification = array(
            'message' => 'Admin Profile Updated Successfully!',
            'alert-type' => 'success'
        );

        return back()-> with($notification);

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
