@extends('uts')

@section('header')
    <h1>{{ $title }}</h1>
    <p>Semester: {{ $semester }}</p>
@endsection

@section('content')
    <h2>Menu UTS (Total: {{ $total_matkul }} Mata Kuliah)</h2>
    <ul>
        <li><a href="{{ route('pemrogramanWeb') }}">Menu UTS Pemrograman Web</a></li>
        <li><a href="{{ route('database') }}">Menu UTS Database</a></li>
    </ul>
@endsection

@section('footer')
    <p>&copy; 2025 Sistem UTS Online</p>
@endsection