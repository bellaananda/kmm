<?php

namespace App\Http\Controllers;

use App\Models\AutorepairShop;
use Illuminate\Support\Facades\Auth;
use Illuminate\http\Request;

class AutorepairShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (Auth::user()->role != 'superadmin')
        // {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Anda tidak memiliki akses'
        //     ], 401);
        // }
        $shops = AutorepairShop::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar Bengkel',
            'data'    => $shops
        ], 200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if (Auth::user()->role != 'superadmin')
        // {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Anda tidak memiliki akses'
        //     ], 401);
        // }
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'details' => 'required',
            'logo' => 'required',
            'image' => 'required'
        ]);

        $shop = new AutorepairShop();
        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->phone_number = $request->phone_number;
        $shop->details = $request->details;
        
        $shop->save();

        return response()->json([
            'success' => true,
            'message' => 'Bengkel berhasil ditambahkan',
            'data'    => $shop
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // if (Auth::user()->role != 'superadmin')
        // {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Anda tidak memiliki akses'
        //     ], 401);
        // }
        $shop = AutorepairShop::find($id);
        if ($shop)
        {
            return response()->json([
                'success' => true,
                'message' => 'Detail Bengkel',
                'data'    => $shop
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Bengkel tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AutorepairShop $autorepairShop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AutorepairShop $autorepairShop)
    {
        // if (Auth::user()->role != 'superadmin')
        // {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Anda tidak memiliki akses'
        //     ], 401);
        // }
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'details' => 'required',
            'logo' => 'required',
            'image' => 'required'
        ]);

        $shop = AutorepairShop::find($autorepairShop);
        if ($shop)
        {
            $shop->name = $request->name;
            $shop->address = $request->address;
            $shop->phone_number = $request->phone_number;
            $shop->save();

            return response()->json([
                'success' => true,
                'message' => 'Bengkel berhasil diupdate',
                'data'    => $shop
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Bengkel tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AutorepairShop $autorepairShop)
    {
        // if (Auth::user()->role != 'superadmin')
        // {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Anda tidak memiliki akses'
        //     ], 401);
        // }
        $shop = AutorepairShop::find($autorepairShop);
        if ($shop)
        {
            $shop->delete();
            return response()->json([
                'success' => true,
                'message' => 'Bengkel berhasil dihapus'
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Bengkel tidak ditemukan'
            ], 404);
        }
    }
}
