<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function checkOddEven($parameter)
    {
        // Validasi dan konversi string ke integer
        if (!is_numeric($parameter)) {
            $pesan = "Parameter '$parameter' bukan angka valid";
            $alertType = "danger";
            return view('produk', [
                'pesan' => $pesan,
                'alertType' => $alertType,
                'nilai' => $parameter
            ]);
        }
        $parameter = (int) $parameter;
        
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
    public function index($angka)
    {
        // Validasi dan konversi string ke integer
        if (!is_numeric($angka)) {
            $pesan = "Parameter '$angka' bukan angka valid";
            $alertType = "danger";
            return view('product', [
                'angka' => $angka,
                'nilai' => $angka,
                'hasil' => 0,
                'pesan' => $pesan,
                'alertType' => $alertType
            ]);
        }
        $angka = (int) $angka;
        
        // Hitung hasil (contoh: angka * 2)
        $hasil = $angka * 2;
        
        // Tentukan ganjil atau genap
        if ($angka % 2 == 0) {
            $pesan = "Nilai $angka adalah genap";
            $alertType = "success";
        } else {
            $pesan = "Nilai $angka adalah ganjil";
            $alertType = "warning";
        }
        
        return view('product', [
            'angka' => $angka,
            'nilai' => $angka,
            'hasil' => $hasil,
            'pesan' => $pesan,
            'alertType' => $alertType
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("master-data.product-master.create-product");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input data
        $validasi_data = $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'information' => 'nullable|string',
            'qty' => 'required|integer',
            'producer' => 'required|string|max:255'
        ]);

        // Proses simpan data kedalam database
        Product::create($validasi_data);

        return redirect()->back()->with('success', 'Product created successfully!');
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
