@extends('layouts.layout')
@section('title', 'Berita')
@section('content')   

<div class="container mt-4 mb-4">
    <div class="row mt-4 d-flex justify-content-between">
        <div class="card align-items-center" style="border: 2px solid #00171F;">
            <div class="card-body">
                <span class="h3 text-uppercase "> <strong>Berita Sekolah</strong></span>
            </div>
        </div>

        <div class=" mt-3">
            @if (Auth::check() && Auth::user()->role == 'admin')
        <a href="{{ url('berita', ['tambah']) }}" class="btn btn-success">Tambah Berita</a>
        </a>
        @endif
        </div>
    
        <div class="col-md-3 card mt-4 align-items-center" style="width: 340px;">
                    
            <img 
            src="{{ asset('images/main_bola.jpeg') }}"
                alt="Stadion" width="250" class="rounded p-2 pt-4">
            
            <div class="row p-3">
                <span class="h4" style="font-weight: 500; font-size: 18px">
                    {{-- <i class="bi bi-geo-alt"></i> --}}
                    Nama Tim : Java FC
                </span>
                <span class="mt-2">
                    Jalan Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </span>
            </div>
        </div>
        <div class="col-md-3 card mt-4 align-items-center" style="width: 340px;">
                
            <img 
            src="{{ asset('images/main_bola.jpeg') }}"
                alt="Stadion" width="250" class="rounded p-2 pt-4">
            
            <div class="row p-3">
                <span class="h4" style="font-weight: 500; font-size: 18px">
                    {{-- <i class="bi bi-geo-alt"></i> --}}
                    Nama Tim : Papua FC
                </span>
                <span class="mt-2">
                    Jalan Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </span>
            </div>
        </div>
        <div class="col-md-3 card mt-4 align-items-center" style="width: 340px;">
                
            <img 
            src="{{ asset('images/main_bola.jpeg') }}"
                alt="Stadion" width="250" class="rounded p-2 pt-4">
            
            <div class="row p-3">
                <span class="h4" style="font-weight: 500; font-size: 18px">
                    {{-- <i class="bi bi-geo-alt"></i> --}}
                    Nama Tim : Papua FC
                </span>
                <span class="mt-2">
                    Jalan Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </span>
            </div>
        </div>
    </div>
</div>
@endsection