<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function checkOddEven($parameter)
    {
        // Tentukan ganjil atau genap
        if ($parameter % 2 == 0) {
            $pesan = "Nilai ini adalah genap";
            $alertType = "success";
        } else {
            $pesan = "Nilai ini adalah ganjil";
            $alertType = "warning";
        }
        
        // Kirim data ke view
        return view('produk', [
            'pesan' => $pesan,
            'alertType' => $alertType,
            'nilai' => $parameter
        ]);
    }
    
    /**
     * Display a listing of the resource.
     */
    
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('barang', ['isi_data' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
