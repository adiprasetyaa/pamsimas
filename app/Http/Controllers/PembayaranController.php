<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::all();
        return view('pembayarans.index', compact('pembayarans'));
    }

    public function create()
    {
        return view('pembayarans.create');
    }

    public function store(Request $request)
    {
        $pembayaran = Pembayaran::create([
            'id_pelanggan' => $request->input('id_pelanggan'),
            'id_kasir' => $request->input('id_kasir'),
            'tanggal_pembayaran' => $request->input('tanggal_pembayaran'),
            'jumlah_pembayaran' => $request->input('jumlah_pembayaran'),
            'bukti_pembayaran' => $request->input('bukti_pembayaran'),
        ]);

        // Handle any additional logic or validation here

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran created successfully.');
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('pembayarans.show', compact('pembayaran'));
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('pembayarans.edit', compact('pembayaran'));
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'id_pelanggan' => $request->input('id_pelanggan'),
            'id_kasir' => $request->input('id_kasir'),
            'tanggal_pembayaran' => $request->input('tanggal_pembayaran'),
            'jumlah_pembayaran' => $request->input('jumlah_pembayaran'),
            'bukti_pembayaran' => $request->input('bukti_pembayaran'),
        ]);

        // Handle any additional logic or validation here

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran updated successfully.');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        // Handle any additional logic or validation here

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran deleted successfully.');
    }
}
