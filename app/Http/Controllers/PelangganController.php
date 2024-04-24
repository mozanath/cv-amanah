<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return response()->json(['pelanggan' => $pelanggan], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_nama' => 'required',
            'pelanggan_alamat' => 'required',
            'pelanggan_notelp' => 'required',
            'pelanggan_email' => 'required|email'
        ]);

        $pelanggan = Pelanggan::create($request->all());
        return response()->json(['message' => 'Pelanggan created successfully', 'pelanggan' => $pelanggan], 201);
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);
        if ($pelanggan) {
            return response()->json(['pelanggan' => $pelanggan], 200);
        } else {
            return response()->json(['message' => 'Pelanggan not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pelanggan_nama' => 'required',
            'pelanggan_alamat' => 'required',
            'pelanggan_notelp' => 'required',
            'pelanggan_email' => 'required|email'
        ]);

        $pelanggan = Pelanggan::find($id);
        if ($pelanggan) {
            $pelanggan->update($request->all());
            return response()->json(['message' => 'Pelanggan updated successfully', 'pelanggan' => $pelanggan], 200);
        } else {
            return response()->json(['message' => 'Pelanggan not found'], 404);
        }
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        if ($pelanggan) {
            $pelanggan->delete();
            return response()->json(['message' => 'Pelanggan deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Pelanggan not found'], 404);
        }
    }
}
