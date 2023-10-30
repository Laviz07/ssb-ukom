@extends('layouts.layout')
@section('title', 'Detail Berita')
@section('content')
<div class="container mt-4 mb-4 text-center">
    <span style="font-size: 45px; font-weight: 600;"> {{$berita->judul_berita}} </span>
    <div class="row mt-1 d-flex justify-content-between">
        <div>
            <div class="row p-4 d-flex flex-column align-items-center justify-content-center">
                
                <div class="text-center">
                    
                    <img src="{{ asset('storage/' . $berita->foto_berita) }}" alt="{{$berita->nama_detail_berita}}" style="width: 570px; border-radius: 30px">
                </div>
            </div>
        </div>
        

        <div class="container mt-4 mb-4 text-center" style="width: 73%">
            <div class="row p-3">
                <div class="row mt-3">
                    <p style="font-size: 16px; text-align: left"> {{$berita->isi_berita}} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection