<?php

namespace App\Http\Controllers;

use App\Mail\SendemailMaillable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendemailController extends Controller
{
    public function index($id){

        $user = DB::table('users')->where('users.id_user', $id)->select('users.username', 'users.name', 'users.email', 'users.password')->first();

        //$user->password buat assign data password user
        Mail::to($user->email)->send(new SendemailMaillable($user->name, $user->username, $user->password));

        $url = route('admin.pelanggan.index');

        return redirect($url);
    }
    //
}
