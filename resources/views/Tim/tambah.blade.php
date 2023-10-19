@extends('layouts.layout')
@section('title', 'Tambah Tim')

@section('content')
<div class="container mt-4 mb-4">
    <div class="row">

        <div class="card align-items-center ms-2" style="width: 98%;">
            <div class="card-body">
                <span class="h3 text-uppercase "> <strong>Tambah Tim</strong></span>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card ">
             
                <div class="card-body" >
                    <form action="{{ url('tim', ['tambah'])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="">
                                {{-- <div class="form-group mt-2">
                                    <label >NISN Pemain:</label>
                                    <input type="number" class="form-control" required name="id_tim">
                                    <input type="hidden" name="role" value="tim">
                                </div> --}}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                            <label >Nama Tim:</label>
                                            <input type="text" class="form-control" required name="nama_tim">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                            <label >Nama Pelatih:</label>
                                            <input type="text" class="form-control" required name="nama_tim">
                                    </div>
                                </div>
                            </div>
                               
                                <div class="form-group">
                                    <label >Deskripsi Tim:</label>
                                    <textarea required name="deskripsi_tim" id="" class="form-control" rows="3" placeholder="Deskripsi Tim" style="resize: none"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mt-3 align-items-center">
                                        <label for="fileUpload" class="">Upload Foto (masukkan frame 1:1) :</label>
                                        <input type="file" name="foto_tim" id="fileUpload"  class="btn w-auto btn-outline-primary form-control">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        {{-- <p> --}}
                            <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection