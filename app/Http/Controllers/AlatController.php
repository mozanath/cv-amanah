<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alat;

class AlatController extends Controller
{
    public function index()
    {
        $alat = Alat::all();
        return response()->json(['alat' => $alat], 200);
    }

    public function store(Request $request)
    {
        $alat = Alat::create($request->all());
        return response()->json(['message' => 'Alat created successfully', 'alat' => $alat], 201);
    }

    public function show($id)
    {
        $alat = Alat::find($id);
        if ($alat) {
            return response()->json(['alat' => $alat], 200);
        } else {
            return response()->json(['message' => 'Alat not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $alat = Alat::find($id);
        if ($alat) {
            $alat->update($request->all());
            return response()->json(['message' => 'Alat updated successfully', 'alat' => $alat], 200);
        } else {
            return response()->json(['message' => 'Alat not found'], 404);
        }
    }

    public function destroy($id)
    {
        $alat = Alat::find($id);
        if ($alat) {
            $alat->delete();
            return response()->json(['message' => 'Alat deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Alat not found'], 404);
        }
    }
}
