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
    public function index($angka = null)
    {
        // If $angka is provided as a filter or not used, keep backward compatibility
        // New behavior: list all products. Optional parameter ignored.
        $products = Product::orderBy('id', 'desc')->paginate(15);

        return view('products.index', compact('products'));
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
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validasi_data = $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'information' => 'nullable|string',
            'qty' => 'required|integer',
            'producer' => 'required|string|max:255'
        ]);

        $product->update($validasi_data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
