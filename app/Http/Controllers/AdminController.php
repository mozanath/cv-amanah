<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::all();
        return response()->json(['pelanggan' => $admin], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'admin_username' => 'required',
            'admin_password' => 'required',
        ]);

        $admin = Admin::create($request->all());
        return response()->json(['message' => 'Admin created successfully', 'admin' => $admin], 201);
    }

    public function show($id)
    {
        $admin = Admin::find($id);
        if ($admin) {
            return response()->json(['admin' => $admin], 200);
        } else {
            return response()->json(['message' => 'Admin not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'admin_username' => 'required',
            'admin_password' => 'required'
        ]);

        $admin = Admin::find($id);
        if ($admin) {
            $admin->update($request->all());
            return response()->json(['message' => 'Admin updated successfully', 'admin' => $admin], 200);
        } else {
            return response()->json(['message' => 'admin not found'], 404);
        }
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        if ($admin) {
            $admin->delete();
            return response()->json(['message' => 'Admin deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Admin not found'], 404);
        }
    }
}
