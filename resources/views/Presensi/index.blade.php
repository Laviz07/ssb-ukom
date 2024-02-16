@extends('layouts.sidebar')
@section('title', 'List Presenazi')
@section('content')

    <div class="container mt-4 mb-4">

        {{-- /* ------------------------------ LIST PRESENSI ----------------------------- */ --}}
        <div>
            <div class="card align-items-center" style="border: 2px solid #00171F;">
                <div class="card-body">
                    <span class="h3 text-uppercase "> <strong>Daftar Presensi</strong></span>
                </div>
            </div>

            <div class=" mt-3">
                <table class="table table-hovered table-bordered DataTable  ">
                    <thead>
                        <tr style="text-align: center; font-size: 17px; font-weight: 600;">
                            <td>No</td>
                            <td>Kegiatan</td>
                            <td>Tanggal</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>

                        @foreach ($presensi as $pr)
                            <tr style="vertical-align: middle; font-size: 17px;" idPm={{ $pm->nisn_pemain }}>
                                <td class="col-1" style="text-align: center;"> {{ $no++ }} </td>
                                <td class="col-5 text-capitalize text-center "> {{ $pm->kegiatan }} </td>
                                <td class="col-2" style="text-align: center"> {{ $pm->tanggal }} </td>
                                <td style="text-align: center">


                                    @if (Auth::user()['role'] == 'admin')
                                        <div class="dropdown dropend"
                                            style="display: inline-block; vertical-align: middle;">
                                            <button class="btn btn-primary" id="navbarDropdownMenuLink"
                                                data-bs-toggle='dropdown' data-bs-offset="-10,20">
                                                Action
                                                <i class="bi bi-three-dots-vertical "
                                                    style="font-size: 26; vertical-align: middle; cursor: pointer;">
                                                </i>
                                            </button>

                                            <div class="dropdown-menu" style="width: 200px;"
                                                aria-labelledby="navbarDropdownMenuLink">

                                                <h6 class="dropdown-header">Apa Yang Akan Anda Lakukan?</h6>
                                                <a class="dropdown-item"
                                                    href="{{ url('pemain', ['detail', $pm->nisn_pemain]) }}">
                                                    <i class="bi bi-eye"
                                                        style="font-size: 20px; vertical-align: middle; "></i>
                                                    <strong class="ms-1">Lihat Detail Pemain</strong>
                                                </a>

                                                <a class="dropdown-item editBtn" data-bs-toggle="modal"
                                                    data-bs-target="#edit-modal-{{ $pm->nisn_pemain }}"
                                                    style="cursor: pointer" idPM={{ $pm->nisn_pemain }}>
                                                    <i class="bi bi-pencil"
                                                        style="font-size: 20px; vertical-align: middle; "></i>
                                                    <strong class="ms-1">Edit Data Pemain</strong>
                                                </a>

                                                <a class="dropdown-item hapusBtn" idPM={{ $pm->nisn_pemain }}
                                                    style="cursor: pointer">
                                                    <i class="bi bi-trash"
                                                        style="font-size: 20px; vertical-align: middle; "></i>
                                                    <strong class="ms-1">Hapus Data Pemain</strong>
                                                </a>

                                            </div>
                                    @endif

                                    @if (Auth::user()['role'] != 'admin')
                                        <a href="{{ url('pemain', ['detail', $pm->nisn_pemain]) }}" class="btn btn-primary">
                                            Lihat Detail
                                            <i class="bi bi-search ms-2"
                                                style="font-size: 15px; vertical-align: middle; "></i>
                                        </a>
                                    @endif

                                </td>
                            </tr>

                            {{-- EDIT PRESENSI --}}
                            <div class="modal fade" id="edit-modal-{{ $pm->nisn_pemain }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pemain</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form id="edit-pm-form-{{ $pm->nisn_pemain }}">

                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input placeholder="example" type="email" class="form-control mb-3"
                                                        name="email" value="{{ $pm->email }}" required />

                                                </div>

                                                <div class="form-group">
                                                    <label>Deskripsi Diri:</label>
                                                    <textarea required name="deskripsi_pemain" id="" class="form-control" rows="5"
                                                        placeholder="Deskripsi Diri" style="resize: none">{{ $pm->deskripsi_pemain }}
                                                </textarea>


                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary edit-btn"
                                                form="edit-pm-form-{{ $pm->nisn_pemain }}">
                                                Edit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    @if (Auth::check() && Auth::user()->role == 'admin')
        <a href="#presensi-modal-" class="position-fixed z-10 bottom-0 end-0" data-bs-toggle="modal"
            data-bs-target="#presensi-modal-">
            <i class="bi bi-plus-circle-fill bi-3x" style="font-size: 35px; margin: 30px; color:#003459;"></i>
        </a>

        {{-- /* -------------------------------- TAMBAH PRESENSI -------------------------------- */ --}}
        <div class="modal fade " id="presensi-modal-" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered w-50">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Presensi</h1>
                    </div>
                    <div class="modal-body">
                        <form id="presensi-form-" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="tanggal">Tanggal:</label>
                                        <input type="date" id="tanggal" name="tanggal_kegiatan"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="kegiatan">Kegiatan:</label>
                                        <select name="id_kegiatan" id="kegiatan" class="form-select mb-3">
                                            <option value="" selected disabled>Pilih Kegiatan</option>
                                            @foreach ($kegiatan as $kg)
                                                <option value="{{ $kg->id_kegiatan }}">{{ $kg->nama_kegiatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary presensiBtn" form="edit-br-form-">
                            Simpan
                        </button>

                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
