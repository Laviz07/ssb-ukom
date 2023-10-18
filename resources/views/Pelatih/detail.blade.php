@extends('layouts.layout')
@section('title', 'Detail Pelatih')
@section('content')
<div class="container mt-4 mb-4">
    <div class="row mt-4 d-flex justify-content-between">
        <div class="col-md-3 card">
            <div class="row p-4 d-flex flex-column align-items-center justify-content-center">
                <div class="text-center">
                    <img src="{{ asset('storage/' . $pelatih->user->foto_profil) }}" alt="{{$pelatih->nama_pelatih}}" class="rounded-circle" style="width: 170px; height: 170px;">
                </div>
                <div class="mt-4 text-center">
                    <div>
                        <span class="text-capitalize" style="font-weight: 800; font-size: 26px;">{{$pelatih->nama_pelatih}}</span>
                    </div>
                    <div class="row">
                        <span>No. Telp: {{$pelatih->no_telp}}</span>
                        <span>Email: {{$pelatih->email}}</span>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="col-md-8 card" style="width: 73%">
            <div class="row p-3">
                <span style="font-size:24px; font-weight: 700">Detail Pelatih:</span>

                <div class="row mt-3">
                    <span style="font-size: 16px; font-weight: 600;">Tempat, Tanggal Lahir:</span>
                    <span style="font-size: 16px;"> {{$pelatih->tempat_lahir}}, {{$pelatih->tanggal_lahir}} </span>
                </div>

                <div class="row mt-3">
                    <span style="font-size: 16px; font-weight: 600;">Alamat:</span>
                    <span style="font-size: 16px;"> {{$pelatih->alamat}}</span>
                </div>

                <div class="row mt-3">
                    <span style="font-size: 16px; font-weight: 600;">Deskripsi Diri:</span>
                    <span style="font-size: 16px;"> {{$pelatih->deskripsi_pelatih}} </span>
                </div>
            </div>
        </div>

        <div class="card align-items-center mt-4" style="border: 2px solid #00171F;">
            <div class="card-body">
                <span class="h3 text-uppercase "> <strong>Tim yang dilatih</strong></span>
            </div>
        </div>
        
        <div class="col-md-3 card mt-4 align-items-center" style="width: 520px;">
                
            <img 
            src="{{ asset('images/main_bola.jpeg') }}"
                alt="Stadion" width="470" class="rounded p-2 pt-4">
            
            <div class="row p-3">
                <span class="h4" style="font-weight: 500; font-size: 26px">
                    {{-- <i class="bi bi-geo-alt"></i> --}}
                    Nama Tim : Java FC
                </span>
                <span class="mt-2">
                    Jalan Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </span>
            </div>
        </div>
        <div class="col-md-3 card mt-4 align-items-center" style="width: 520px;">
                
            <img 
            src="{{ asset('images/main_bola.jpeg') }}"
                alt="Stadion" width="470" class="rounded p-2 pt-4">
            
            <div class="row p-3">
                <span class="h4" style="font-weight: 500; font-size: 26px">
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