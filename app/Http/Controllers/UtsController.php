<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtsController extends Controller
{
    /**
     * Menampilkan halaman utama UTS
     */
    public function index()
    {
        $data = [
            'title' => 'Sistem UTS Online',
            'total_matkul' => 2,
            'semester' => 'Ganjil 2025'
        ];
        
        return view('uts_isi', $data);
    }
}
