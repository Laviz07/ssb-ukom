@extends('layouts.layout')
@section('title', 'Detail Berita')
@section('content')
<div class="container mt-4 mb-4">
    <div class="row mt-4 d-flex justify-content-between">
        <div class="col-md-3 card">
            <div class="row p-4 d-flex flex-column align-items-center justify-content-center">
                <div class="text-center">
                    <img src="{{ asset('storage/' . $berita->foto_berita) }}" alt="{{$berita->nama_detail_berita}}" class="rounded-circle" style="width: 170px; height: 170px;">
                </div>
            </div>
        </div>
        

        <div class="col-md-8 card" style="width: 73%">
            <div class="row p-3">
                <span style="font-size:24px; font-weight: 700">Detail Peserta:</span>
                <div class="row mt-3">
                    <span style="font-size: 16px; font-weight: 600;">Judul Berita</span>
                    <span style="font-size: 16px;"> {{$berita->detail_berita}} </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection