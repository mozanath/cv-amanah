<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewaan;

class PenyewaanController extends Controller
{
    public function index()
    {
        $penyewaan = Penyewaan::all();
        return response()->json(['penyewaan' => $penyewaan], 200);
    }

    public function store(Request $request)
    {
        $penyewaan = Penyewaan::create($request->all());
        return response()->json(['message' => 'Penyewaan created successfully', 'penyewaan' => $penyewaan], 201);
    }

    public function show($id)
    {
        $penyewaan = Penyewaan::find($id);
        if ($penyewaan) {
            return response()->json(['penyewaan' => $penyewaan], 200);
        } else {
            return response()->json(['message' => 'Penyewaan not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $penyewaan = Penyewaan::find($id);
        if ($penyewaan) {
            $penyewaan->update($request->all());
            return response()->json(['message' => 'Penyewaan updated successfully', 'penyewaan' => $penyewaan], 200);
        } else {
            return response()->json(['message' => 'Penyewaan not found'], 404);
        }
    }

    public function destroy($id)
    {
        $penyewaan = Penyewaan::find($id);
        if ($penyewaan) {
            $penyewaan->delete();
            return response()->json(['message' => 'Penyewaan deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Penyewaan not found'], 404);
        }
    }
}
