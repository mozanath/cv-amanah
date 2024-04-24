<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PelangganData;

class PelangganDataController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_data_pelanggan_id' => 'required',
            'pelanggan_data_jenis' => 'required|in:KTP,SIM',
            'pelanggan_data_file' => 'required'
        ]);

        $pelangganData = PelangganData::create($request->all());
        return response()->json(['message' => 'Pelanggan data created successfully', 'pelanggan_data' => $pelangganData], 201);
    }

    public function show($id)
    {
        $pelangganData = PelangganData::find($id);
        if ($pelangganData) {
            return response()->json(['pelanggan_data' => $pelangganData], 200);
        } else {
            return response()->json(['message' => 'Pelanggan data not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pelanggan_data_pelanggan_id' => 'required',
            'pelanggan_data_jenis' => 'required|in:KTP,SIM',
            'pelanggan_data_file' => 'required'
        ]);

        $pelangganData = PelangganData::find($id);
        if ($pelangganData) {
            $pelangganData->update($request->all());
            return response()->json(['message' => 'Pelanggan data updated successfully', 'pelanggan_data' => $pelangganData], 200);
        } else {
            return response()->json(['message' => 'Pelanggan data not found'], 404);
        }
    }

    public function destroy($id)
    {
        $pelangganData = PelangganData::find($id);
        if ($pelangganData) {
            $pelangganData->delete();
            return response()->json(['message' => 'Pelanggan data deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Pelanggan data not found'], 404);
        }
    }
}
