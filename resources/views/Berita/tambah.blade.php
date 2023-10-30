@extends('layouts.layout')
@section('title', 'Tambah Berita')
@section('content')

<div class="container mt-4 mb-4">
    <div class="row">

        <div class="card align-items-center ms-2" style="width: 98%;">
            <div class="card-body">
                <span class="h3 text-uppercase">
                    <strong>Tambah Berita Sekolah</strong>
                </span>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('berita', ['tambah']) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="form-group mt-2">
                            <label for="">Judul:</label>
                            <textarea name="judul_berita" id="" rows="2"
                                class="form-control"
                               placeholder="Judul Berita" style="resize: none" ></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Isi Berita:</label>
                            <textarea name="isi_berita" id="" rows="20"
                                class="form-control"
                               placeholder="Keterangan Berita" style="resize: none" ></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-3 align-items-center">
                                <label for="fileUpload">Upload Gambar</label>
                                <input type="file" name="foto_berita" id="fileUpload" class="btn w-auto btn-outline-primary form-control">
                            </div>
                        </div>

                </div>

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