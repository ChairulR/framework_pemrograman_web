<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtsController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem UTS Online',
            'total_matkul' => 2,
            'semester' => 'Ganjil 2025'
        ];
        
        return view('uts_isi', $data);
    }
    
    public function pemrogramanWeb()
    {
        return view('uts_pemrograman_web');
    }
    
    public function database()
    {
        return view('uts_database');
    }
}
