@extends('layouts.sidebar')
@section('title', 'Detail Kegiatan')
@section('content')
    <div class="container mt-4 mb-4 ">
        <div class="row text-center">
            <span style="font-size: 45px; font-weight: 600;" class="text-capitalize "> {{ $kegiatan->nama_kegiatan }} </span>
            <div class="mt-0" style="font-size: 16px; font-weight: 400;">
                {{ $kegiatan->pelatih->nama_pelatih }} &#8226;
                {{ \Carbon\Carbon::createFromFormat('H:i:s', $kegiatan->jam_mulai)->format('g:i a') }}
                -
                {{ \Carbon\Carbon::createFromFormat('H:i:s', $kegiatan->jam_selesai)->format('g:i a') }}
            </div>
        </div>
        <div class="row mt-1">

            <div class="row p-4 d-flex flex-column align-items-center justify-content-center text-center">
                @if ($kegiatan->foto_kegiatan)
                    <div class="text-center">
                        <img src="{{ asset('storage/' . $kegiatan->foto_kegiatan) }}" alt="{{ $kegiatan->nama_kegiatan }}"
                            style="width: auto; height: 350px; border-radius: 10px">
                    </div>
                @endif

                <div class="container mt-2 mb-4 text-center d-flex justify-content-center align-items-center">
                    <div class="ms-4">
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'pelatih')
                            @if ($kegiatan->laporan_kegiatan)
                                <div class="mt-4 ">
                                    <a class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#edit-laporan-modal-{{ $kegiatan->id_kegiatan }}"
                                        style="cursor: pointer" idKG={{ $kegiatan->id_kegiatan }}>
                                        Edit Laporan Kegiatan
                                    </a>
                                </div>
                            @else
                                <div class="mt-4  ">
                                    <a class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#tambah-laporan-modal-{{ $kegiatan->id_kegiatan }}"
                                        style="cursor: pointer" idKG={{ $kegiatan->id_kegiatan }}>
                                        Mengisi Laporan Kegiatan
                                    </a>
                                </div>
                            @endif
                        @endif
                    </div>

                    @if ($presensi)
                        <div class="ms-5">
                            {{-- /* -------------------------------- PRESENSI PEMAIN -------------------------------- */ --}}
                            @if (Auth::user()->role == 'pemain')
                                <div class="mt-4 me-5">
                                    <a href="#presensi-pemain-modal" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#presensi-pemain-modal">Mengisi Presensi</a>
                                </div>

                                <div class="modal fade " id="presensi-pemain-modal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered w-50">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Presensi</h1>
                                            </div>
                                            <div class="modal-body">
                                                <form id="presensi-pemain-form" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mt-2">
                                                        <input type="hidden" name="nisn_pemain"
                                                            value="{{ Auth::user()->pemain['nisn_pemain'] }}">

                                                        <input type="hidden" name="id_presensi"
                                                            value="{{ $presensi->id_presensi }}">

                                                        <select name="keterangan" id="keterangan" class="form-select mb-3">
                                                            <option value="" selected disabled>Keterangan</option>
                                                            <option value="hadir">Hadir</option>
                                                            <option value="izin">Izin</option>
                                                            <option value="sakit">Sakit</option>
                                                        </select>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary presensiPemainBtn"
                                                    form="presensi-pemain-form">
                                                    Simpan
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- /* -------------------------------- PRESENSI PELATIH -------------------------------- */ --}}
                            @elseif(Auth::user()->role == 'pelatih')
                                <div class="mt-4 me-5 ">
                                    <a href="#presensi-pelatih-modal" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#presensi-pelatih-modal">Mengisi Presensi</a>
                                </div>

                                <div class="modal fade " id="presensi-pelatih-modal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered w-50">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Presensi
                                                    {{ $presensi->id_presensi }}</h1>
                                            </div>
                                            <div class="modal-body">
                                                <form id="presensi-pelatih-form" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mt-2">
                                                        <input type="hidden" name="nik_pelatih"
                                                            value="{{ Auth::user()->pelatih['nik_pelatih'] }}">

                                                        <input type="hidden" name="id_presensi"
                                                            value="{{ $presensi->id_presensi }}">

                                                        <select name="keterangan" id="keterangan" class="form-select mb-3">
                                                            <option value="" selected disabled>Keterangan</option>
                                                            <option value="hadir">Hadir</option>
                                                            <option value="izin">Izin</option>
                                                            <option value="sakit">Sakit</option>
                                                        </select>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary presensiPelatihBtn"
                                                    form="presensi-pelatih-form">
                                                    Simpan
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="mt-4">
                                    <a href="{{ url('presensi', []) }}" class="btn btn-primary">
                                        Lihat Daftar Presensi
                                    </a>
                                </div>
                            @endif
                        </div>
                    @else
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'pelatih')
                            <div class="mt-4 ms-4">
                                <a href="{{ url('presensi', []) }}" class="btn btn-primary  ">
                                    Buat Presensi
                                </a>
                            </div>
                        @else
                            <div class="mt-4 ms-4">
                                <a href="{{ url('presensi', []) }}" class="btn btn-primary disabled ">
                                    Belum Ada Presensi
                                </a>
                            </div>
                        @endif

                    @endif

                </div>
            </div>
        </div>

        <div class="container mt-2 mb-4 text-center ">
            <div class="row d-flex justify-content-between ">
                <div class="card mt-3 p-3" style="width: 48%;">
                    <span style="font-size: 20px; font-weight: 500; text-align: left">
                        Detail Kegiatan
                    </span>

                    <span class="mt-3" style="font-size: 18px; text-align: left">
                        {!! nl2br(e($kegiatan->detail_kegiatan)) !!}
                    </span>
                </div>

                <div class="card mt-3 p-3" style="width: 48%;">
                    <span style="font-size: 20px; font-weight: 500; text-align: left">
                        Laporan Kegiatan
                    </span>

                    <span class="mt-3" style="font-size: 18px; text-align: left">
                        @if ($kegiatan->laporan_kegiatan)
                            {!! nl2br(e($kegiatan->laporan_kegiatan)) !!}
                        @else
                            Belum ada laporan kegiatan
                        @endif
                    </span>
                </div>

            </div>
        </div>
    </div>

    {{-- /* ----------------------------- TAMBAH LAPORAN ----------------------------- */ --}}
    <div class="modal fade" id="tambah-laporan-modal-{{ $kegiatan->id_kegiatan }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Laporan Kegiatan</h1>
                </div>
                <div class="modal-body">
                    <form id="add-lk-form-{{ $kegiatan->id_kegiatan }}">
                        <div class="form-group">
                            <label>Laporan Kegiatan:</label>
                            <textarea required name="laporan_kegiatan" id="" class="form-control" rows="5"
                                placeholder="Laporan Kegiatan" style="resize: none">
                        </textarea>
                            @csrf
                        </div>
                        <input type="hidden" name="id_kegiatan" value="{{ $kegiatan->id_kegiatan }}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary addBtn"
                        form="add-lk-form-{{ $kegiatan->id_kegiatan }}">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- /* ------------------------------ EDIT LAPORAN ------------------------------ */ --}}
    <div class="modal fade" id="edit-laporan-modal-{{ $kegiatan->id_kegiatan }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Laporan Kegiatan</h1>
                </div>
                <div class="modal-body">
                    <form id="edit-lk-form-{{ $kegiatan->id_kegiatan }}">
                        <div class="form-group">
                            <label>Laporan Kegiatan:</label>
                            <textarea required name="laporan_kegiatan" id="" class="form-control" rows="5"
                                placeholder="Laporan Kegiatan" style="resize: none"> {{ $kegiatan->laporan_kegiatan }}
                    </textarea>
                            @csrf
                        </div>
                        <input type="hidden" name="id_kegiatan" value="{{ $kegiatan->id_kegiatan }}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary editBtn"
                        form="edit-lk-form-{{ $kegiatan->id_kegiatan }}">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- LIST ANGGOTA kegiatan --}}
    {{-- <div>
        <div class="card align-items-center" style="border: 2px solid #00171F;">
            <div class="card-body">
                <span class="h3 text-uppercase "> <strong>Daftar Anggota Tim</strong></span>
            </div>
        </div>
        <div class="col d-flex justify-content-end mb-2 mt-3">
            @if (Auth::check() && Auth::user()->role == 'admin')
            <a data-bs-toggle="modal" data-bs-target="#add-modal" class="position-fixed z-10 bottom-0 end-0">
                <i class="bi bi-plus-circle-fill bi-3x" style="font-size: 45px; margin: 30px; color:#003459;"></i>
            </a>@endif
        </div>

        <div class=" mt-3">
                <table class="table table-hovered table-bordered DataTable  ">
                    <thead>
                        <tr style="text-align: center; font-size: 17px; font-weight: 600;">
                            <td>No</td>
                            <td>Foto</td>
                            <td>Nama Pemain</td>
                            <td>NISN Pemain</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>

                        @foreach ($tim->pemain as $pm)
                        @if ($pm->tim)
                            <tr style="vertical-align: middle; font-size: 17px;" idTm={{$pm->nisn_pemain}}>
                                <td class="col-1" style="text-align: center;"> {{$no++}} </td>
                                <td class="col-1" style="text-align: center"> 
                                    @if ($pm->user->foto_profil)
                                        <img src="{{asset('storage/' . $pm->user->foto_profil) }}" 
                                        alt="Foto Profil" style="width: 90px; height: 90px;" class="rounded-circle">
                                    @else
                                        <i class="bi bi-person-circle"  style="font-size: 40px;"></i> 
                                    @endif
                                </td>
                                <td class="col-5 text-capitalize text-center"> {{$pm->nama_pemain}} </td>
                                <td class="col-3" style="text-align: center"> {{$pm->nisn_pemain}} </td>
                                <td style="text-align: center">
                                    <div class="dropdown dropend" style="display: inline-block; vertical-align: middle;">
                                        <button class="btn btn-primary" id="navbarDropdownMenuLink" data-bs-toggle='dropdown' data-bs-offset="-10,20">
                                            Action
                                            <i  class="bi bi-three-dots-vertical " 
                                                style="font-size: 26; vertical-align: middle; cursor: pointer;">
                                            </i>
                                        </button>
                                        <div class="dropdown-menu" style="width: 230px;" aria-labelledby="navbarDropdownMenuLink">
                                            <h6 class="dropdown-header">Apa Yang Akan Anda Lakukan?</h6>
                                            <a class="dropdown-item" href="{{ url('pemain', ['detail', $pm->nisn_pemain]) }}"> 
                                                <i class="bi bi-eye"  style="font-size: 20px; vertical-align: middle; "></i> 
                                                <strong class="ms-1">Lihat Detail Anggota Tim</strong> 
                                            </a>

                                            <a class="dropdown-item hapusBtn" idTM="{{ $pm->nisn_pemain }}" data-nisn-pemain="{{ $pm->nisn_pemain }}" style="cursor: pointer">
                                                <i class="bi bi-trash" style="font-size: 20px; vertical-align: middle;"></i>
                                                <strong class="ms-1">Keluarkan Anggota Tim</strong>
                                            </a>
                                        </div> 
                                    </div>
                                </td>
                            </tr>
                        @endif
                        @endforeach


                    </tbody>
                </table>
        </div>
           
    </div> --}}


    </div>
@endsection
@section('footer')
    <script type="module">
        // add laporan kegiatan pop up
        $('.addBtn').on('click', function(e) {
            e.preventDefault();
            let data = new FormData(e.target.form);
            axios.post(`/jadwal/kegiatan/tambah/laporan-kegiatan/`, data)
                .then((res) => {
                    swal.fire('Selamat!', 'Laporan Kegiatan berhasil ditambahkan.', 'success').then(function() {
                        location.reload();
                    });
                })
                .catch((err) => {
                    swal.fire('Laporan Kegiatan gagal ditambahkan!', 'Pastikan mengisi data seluruhnya.',
                        'warning');
                });
        });

        // presensi pelatih pop up
        $('.presensiPelatihBtn').on('click', function(e) {
            e.preventDefault();
            let data = new FormData(e.target.form);
            axios.post(`/jadwal/kegiatan/presensi-pelatih/`, data)
                .then((res) => {
                    swal.fire('Selamat!', 'Presensi berhasil disimpan.', 'success').then(function() {
                        location.reload();
                    });
                })
                .catch((err) => {
                    if (err.response && err.response.data && err.response.data.message === 'Presensi sudah diisi!') {
                        swal.fire('Presensi sudah diisi!', 'Tidak diperkenankan mengisi presensi dua kali.',
                            'warning');
                    } else {
                        swal.fire('Presensi gagal disimpan!', 'Pastikan mengisi data seluruhnya.', 'error');
                    }

                });
        });

        // presensi pemain pop up
        $('.presensiPemainBtn').on('click', function(e) {
            e.preventDefault();
            let data = new FormData(e.target.form);
            axios.post(`/jadwal/kegiatan/presensi-pemain/`, data)
                .then((res) => {
                    swal.fire('Selamat!', 'Presensi berhasil disimpan.', 'success').then(function() {
                        location.reload();
                    });
                })
                .catch((err) => {
                    if (err.response && err.response.data && err.response.data.message === 'Presensi sudah diisi!') {
                        swal.fire('Presensi sudah diisi!', 'Tidak diperkenankan mengisi presensi dua kali.',
                            'warning');
                    } else {
                        swal.fire('Presensi gagal disimpan!', 'Pastikan mengisi data seluruhnya.', 'error');
                    }

                });
        });

        //edit pop up
        $('.editBtn').on('click', function(e) {
            e.preventDefault();
            let data = new FormData(e.target.form);
            axios.post(`/jadwal/kegiatan/tambah/laporan-kegiatan/`, data)
                .then((res) => {
                    swal.fire('Selamat!', 'Laporan Kegiatan berhasil diedit.', 'success').then(function() {
                        location.reload();
                    });
                })
                .catch((err) => {
                    swal.fire('Laporan Kegiatan gagal diedit!', 'Pastikan mengisi data seluruhnya.', 'warning');
                });
        });

        $('.DataTable').DataTable();
    </script>
@endsection
