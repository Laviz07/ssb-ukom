@extends('layouts.layout')
@section('title', 'Detail Tim')
@section('content')
<div class="container mt-4 mb-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body d-flex">
                    <div class="p-2">
                        <img src="{{ asset('storage/' . $tim->foto_tim) }}" alt="{{$tim->nama_tim}}" 
                        class="rounded card-img-top" style="width: 550px; height: 300px;">
                    </div>
                    <div class="ms-4">
                        <div class="row">
                            <span class="text-capitalize" style="font-weight: 800; font-size: 26px;">{{$tim->nama_tim}}</span>

                            <span class="mt-3" style="font-size: 18px;">{{$tim->deskripsi_tim}}</span>

                            <span class="mt-5" style="font-size: 18px; font-weight: 600">Pelatih:</span>
                            <span class="mt-1" style="font-size: 18px;">{{$tim->pelatih->nama_pelatih}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection