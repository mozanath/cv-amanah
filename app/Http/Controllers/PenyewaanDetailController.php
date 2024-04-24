<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenyewaanDetail;

class PenyewaanDetailController extends Controller
{
    public function store(Request $request)
    {
        $penyewaanDetail = PenyewaanDetail::create($request->all());
        return response()->json(['message' => 'Penyewaan detail created successfully', 'penyewaan_detail' => $penyewaanDetail], 201);
    }

    public function show($id)
    {
        $penyewaanDetail = PenyewaanDetail::find($id);
        if ($penyewaanDetail) {
            return response()->json(['penyewaan_detail' => $penyewaanDetail], 200);
        } else {
            return response()->json(['message' => 'Penyewaan detail not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $penyewaanDetail = PenyewaanDetail::find($id);
        if ($penyewaanDetail) {
            $penyewaanDetail->update($request->all());
            return response()->json(['message' => 'Penyewaan detail updated successfully', 'penyewaan_detail' => $penyewaanDetail], 200);
        } else {
            return response()->json(['message' => 'Penyewaan detail not found'], 404);
        }
    }

    public function destroy($id)
    {
        $penyewaanDetail = PenyewaanDetail::find($id);
        if ($penyewaanDetail) {
            $penyewaanDetail->delete();
            return response()->json(['message' => 'Penyewaan detail deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Penyewaan detail not found'], 404);
        }
    }
}
