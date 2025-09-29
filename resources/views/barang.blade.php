@extends('utama')

@section('nav')
    <h1>🛍️ Sistem Toko Mahasiswa</h1>
@endsection

@section('judul_menu')
    <h1>✨ Halaman Product ✨</h1>
@endsection

@section('isi_menu')
    <h1>📦 Detail Product</h1>
    <div class="data-display">
        🔢 Data ID: {{ $isi_data }}
    </div>
    <p style="margin-top: 1rem; color: #666; line-height: 1.6;">
        Selamat datang di halaman product! Anda sedang melihat detail product dengan ID <strong>{{ $isi_data }}</strong>. 
        Sistem ini memungkinkan Anda untuk melihat berbagai informasi product berdasarkan ID yang dipilih.
    </p>
@endsection