@extends('layouts.layout')
@section('title', 'Detail Pelatih')
@section('content')
<div class="container mt-4 mb-4">
    <div class="row mt-4 d-flex justify-content-between">
        <div class="col-md-3 card">
            <div class="row p-4 d-flex flex-column align-items-center justify-content-center">
                <div class="text-center">
                    <img src="{{ asset('storage/' . $Pelatih->user->foto_profil) }}" alt="{{$Pelatih->nama_Pelatih}}" class="rounded-circle" style="width: 170px; height: 170px;">
                </div>
                <div class="mt-4 text-center">
                    <div>
                        <span class="text-capitalize" style="font-weight: 800; font-size: 26px;">{{$Pelatih->nama_Pelatih}}</span>
                    </div>
                    <div class="row">
                        <span>No. Telp: {{$Pelatih->no_telp}}</span>
                        <span>Email: {{$Pelatih->email}}</span>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="col-md-8 card" style="width: 73%">
            <div class="row p-3">
                <span style="font-size:24px; font-weight: 700">Detail Peserta:</span>

                <div class="row mt-3">
                    <span style="font-size: 16px; font-weight: 600;">Tempat, Tanggal Lahir:</span>
                    <span style="font-size: 16px;"> {{$Pelatih->tempat_lahir}}, {{$Pelatih->tanggal_lahir}} </span>
                </div>

                <div class="row mt-3">
                    <span style="font-size: 16px; font-weight: 600;">Alamat:</span>
                    <span style="font-size: 16px;"> {{$Pelatih->alamat}}</span>
                </div>

                <div class="row mt-3">
                    <span style="font-size: 16px; font-weight: 600;">Deskripsi Diri:</span>
                    <span style="font-size: 16px;"> {{$Pelatih->deskripsi_Pelatih}} </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection