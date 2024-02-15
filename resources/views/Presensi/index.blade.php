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
                            <tr style="vertical-align: middle; font-size: 17px;" idPr={{ $pr->id_presensi }}>
                                <td class="col-1" style="text-align: center;"> {{ $no++ }} </td>
                                <td class="col-5 text-capitalize text-center ">
                                    {{ $pr->kegiatan->nama_kegiatan }}
                                </td>
                                <td class="col-4" style="text-align: center">
                                    {{-- {{ $pr->hari_tanggal_hadir }} --}}
                                    {{ \Carbon\Carbon::parse($pr->hari_tanggal_hadir)->format('j F Y') }}
                                </td>
                                <td style="text-align: center">


                                    @if ((Auth::check() && Auth::user()->role == 'admin') || Auth::user()->role == 'pelatih')
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
                                                    href="{{ url('presensi/detail/' . $pr->id_presensi) }}">
                                                    <i class="bi bi-eye"
                                                        style="font-size: 20px; vertical-align: middle; "></i>
                                                    <strong class="ms-1">Lihat Detail Presensi</strong>
                                                </a>

                                                {{-- <a class="dropdown-item editBtn" data-bs-toggle="modal"
                                                    data-bs-target="#edit-modal-{{ $pr->id_presensi }}"
                                                    style="cursor: pointer" idPR={{ $pr->id_presensi }}>
                                                    <i class="bi bi-pencil"
                                                        style="font-size: 20px; vertical-align: middle; "></i>
                                                    <strong class="ms-1">Edit Data Presensi</strong>
                                                </a> --}}

                                                <a class="dropdown-item hapusBtn" idPR={{ $pr->id_presensi }}
                                                    style="cursor: pointer">
                                                    <i class="bi bi-trash"
                                                        style="font-size: 20px; vertical-align: middle; "></i>
                                                    <strong class="ms-1">Hapus Data Presensi</strong>
                                                </a>

                                            </div>
                                    @endif


                                </td>
                            </tr>

                            {{-- EDIT PRESENSI --}}
                            <div class="modal fade" id="edit-modal-{{ $pr->id_presensi }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pemain</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form id="edit-pr-form-{{ $pr->id_presensi }}">

                                                <div class="col-md-6">
                                                    <div class="form-group mt-2">
                                                        <label for="tanggal">Tanggal:</label>
                                                        <input type="date" id="tanggal" name="hari_tanggal_hadir"
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
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary edit-btn"
                                                form="edit-pr-form-{{ $pr->id_presensi }}">
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

    @if ((Auth::check() && Auth::user()->role == 'admin') || (Auth::check() && Auth::user()->role == 'pelatih'))
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
                                        <input type="date" id="tanggal" name="hari_tanggal_hadir"
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
                        <button type="submit" class="btn btn-primary addBtn" form="presensi-form-">
                            Simpan
                        </button>

                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('footer')
    <script type="module">
        // add pop up
        $('.addBtn').on('click', function(e) {
            e.preventDefault();
            let data = new FormData(e.target.form);
            axios.post(`/presensi/tambah`, data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then((res) => {
                    swal.fire('Selamat!', 'Presensi berhasil ditambahkan.', 'success').then(function() {
                        window.location.href = `/presensi`;
                    })
                })
                .catch((err) => {
                    swal.fire('Presensi gagal ditambahkan!', 'Pastikan mengisi data seluruhnya.', 'warning');
                });
        });

        //edit pop up
        $('.editBtn').on('click', function(e) {
            e.preventDefault();
            let idPr = $(this).attr('idPr');
            $(`#edit-pr-form-${idPr}`).on('submit', function(e) {
                e.preventDefault();
                let data = Object.fromEntries(new FormData(e.target));
                data['id_presensi'] = idPr;
                axios.post(`/presensi/edit/${idPr}`, data, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(() => {
                        $(`#edit-modal-${idPr}`).css('display', 'none')
                        swal.fire('Selamat!', 'Presensi berhasil diedit.', 'success').then(function() {
                            location.reload();
                        })
                    })
                    .catch(() => {
                        swal.fire('Waduh!', 'Gagal mengedit presensi.', 'warning');
                    })
            })
        })

        //delete pop up
        $('.DataTable tbody').on('click', '.hapusBtn', function(a) {
            a.preventDefault();
            let idPr = $(this).closest('.hapusBtn').attr('idPr');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'

            }).then((result) => {
                if (result.isConfirmed) {
                    //dilakukan proses hapus
                    axios.delete('/presensi/hapus/' + idPr).then(function(response) {
                        console.log(response);
                        if (response.data.success) {
                            swal.fire('Selamat!', 'Berita berhasil dihapus.', 'success').then(function() {
                                //Refresh Halaman
                                location.reload();
                            });
                        } else {
                            swal.fire('Waduh!', 'Berita gagal dihapus.', 'warning').then(function() {
                                //Refresh Halaman
                                location.reload();
                            });
                        }
                    }).catch(function(error) {
                        swal.fire('Waduh!', 'Berita gagal dihapus.', 'error').then(function() {
                            //Refresh Halaman

                        });
                    });
                }
            });
        });

        $('.DataTable').DataTable();
    </script>
@endsection
