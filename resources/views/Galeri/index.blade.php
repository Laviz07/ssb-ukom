@extends('layouts.layout')
@section('title', 'Galeri Sekolah')
@section('content')   

    <div class="mt-4">

        @if (Auth::check() && Auth::user()->role == 'admin')
            <a href="{{ url('galeri', ['tambah']) }}" class="btn btn-success">Tambah Foto</a>
        @endif

        <div class="row mt-4">
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <div class="image-container">
                    <img class="image" src="https://www.appi-online.com/wp-content/uploads/2012/07/timnas_PSSI.jpg" alt="tim" 
                        style="width: 350px; border-radius: 5px">
                    <div class="overlay ">
                        <span class="caption text-white" style="font-size: 18px; text-align: center;">foto bersama di stadion bekasi</span>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <div class="image-container">
                    <img class="image" src="https://www.appi-online.com/wp-content/uploads/2012/07/timnas_PSSI.jpg" alt="tim" style="width: 350px;">
                    <div class="overlay">
                        <span class="caption">keterangan</span>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection