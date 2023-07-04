<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelanggan;
use App\Models\PetugasMeteran;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagihanController extends Controller
{
    public function index()
    {
        $id_pelanggan = Auth::user()->pelanggan->id_pelanggan;

        $data_tagihan = Tagihan::where('id_pelanggan', $id_pelanggan)
            ->with('pelanggan.user', 'pembayaran')
            ->get();

        return view('pelanggan.backend.tagihan.index', compact('data_tagihan'));
    }


    public function show($id_tagihan){
        
        $data_tagihan = Tagihan::findOrFail($id_tagihan);
        return view('pelanggan.backend.tagihan.index', compact('data_tagihan'));
    }
}
