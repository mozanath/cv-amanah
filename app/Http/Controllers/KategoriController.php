<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return response()->json(['kategori' => $kategori], 200);
    }

    public function store(Request $request)
    {
        $kategori = Kategori::create($request->all());
        return response()->json(['message' => 'Kategori created successfully', 'kategori' => $kategori], 201);
    }

    public function show($id)
    {
        $kategori = Kategori::find($id);
        if ($kategori) {
            return response()->json(['kategori' => $kategori], 200);
        } else {
            return response()->json(['message' => 'Kategori not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        if ($kategori) {
            $kategori->update($request->all());
            return response()->json(['message' => 'Kategori updated successfully', 'kategori' => $kategori], 200);
        } else {
            return response()->json(['message' => 'Kategori not found'], 404);
        }
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if ($kategori) {
            $kategori->delete();
            return response()->json(['message' => 'Kategori deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Kategori not found'], 404);
        }
    }
}
