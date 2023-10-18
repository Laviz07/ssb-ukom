@extends('layouts.layout')
@section('title', 'Tambah Pelatih')

@section('content')
<div class="container mt-4 mb-4">
    <div class="row">

        <div class="card align-items-center ms-2" style="width: 98%;">
            <div class="card-body">
                <span class="h3 text-uppercase "> <strong>Tambah Pelatih</strong></span>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card ">
             
                <div class="card-body" >
                    <form action="{{ url('pelatih', ['tambah'])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="">
                                <div class="form-group mt-2">
                                    <label >NIK Pelatih:</label>
                                    <input type="number" class="form-control" required name="nik_pelatih">
                                    <input type="hidden" name="role" value="pelatih">
                                </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                            <label >Username:</label>
                                            <input type="text" class="form-control" required name="username">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                            <label >Nama Lengkap:</label>
                                            <input type="text" class="form-control" required name="nama_pelatih">
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mt-2">
                                            <label >No. Telepon:</label>
                                            <input type="number" class="form-control" required name="no_telp">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mt-2">
                                            <label >Email:</label>
                                            <input type="email" class="form-control" required name="email">
                                        </div> 
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mt-2">
                                            <label >Password:</label>
                                            <input type="text" class="form-control" required name="password">
                                        </div> 
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label >Tempat Lahir:</label>
                                            <input type="text" class="form-control" required name="tempat_lahir">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label for="tanggal" >Tanggal Lahir:</label>
                                            <input type="date" class="form-control" id="tanggal" required name="tanggal_lahir">
                                        </div> 
                                    </div>
                                </div>
                                
                                <div class="form-group mt-2">
                                    <label >Alamat Lengkap:</label>
                                    <input type="text" class="form-control" required name="alamat">
                                </div>
                               
                                <div class="form-group">
                                    <label >Deskripsi Diri:</label>
                                    <textarea required name="deskripsi_pelatih" id="" class="form-control" rows="3" placeholder="Deskripsi Diri" style="resize: none"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mt-3 align-items-center">
                                        <label for="fileUpload" class="">Upload Foto:</label>
                                        <input type="file" name="foto_profil" id="fileUpload" class="btn w-auto btn-outline-primary form-control">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        {{-- <p> --}}
                            <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <button  class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection