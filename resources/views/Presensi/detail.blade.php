@extends('layouts.sidebar')
@section('title', 'Detail Presensi')
@section('content')

    <div class="container mt-4 mb-4">

        <div>
            <div class="card align-items-center" style="border: 2px solid #00171F;">
                <div class="card-body">
                    <span class="h3 text-uppercase ">
                        <strong>
                            Daftar Presensi
                            {{ $presensi->kegiatan->nama_kegiatan }}
                        </strong>
                    </span>
                </div>
            </div>

            <div class=" mt-3">
                <table class="table table-hovered table-bordered DataTable  ">
                    <thead>
                        <tr style="text-align: center; font-size: 17px; font-weight: 600;">
                            <td>No</td>
                            <td>Nama Kegiatan</td>
                            <td>Nama Pelatih</td>
                            <td>Keterangan</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>

                        @foreach ($presensiDetail as $pdi)
                            @if ($pdi->nik_pelatih != null)
                                <tr style="vertical-align: middle; font-size: 17px;" idpdi={{ $pdi->id_kegiatan }}>
                                    <td class="col-0" style="text-align: center;"> {{ $no++ }} </td>
                                    <td class="col-3 text-capitalize text-center "> {{ $presensi->kegiatan->nama_kegiatan }}
                                    </td>
                                    <td class="col-5 text-capitalize text-center "> {{ $pdi->pelatih->nama_pelatih }} </td>
                                    <td class="col-2 text-capitalize text-center "> {{ $pdi->keterangan }} </td>
                                    <td class="col-3" style="text-align: center">
                                        <div style="width: 200px;">
                                            <a href="{{ url('pemain', ['']) }}" class="btn btn-primary">
                                                Peninjauan pepe
                                                <i class="bi bi-search ms-2"
                                                    style="font-size: 15px; vertical-align: middle; "></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class=" mt-3">
                <table class="table table-hovered table-bordered DataTable  ">
                    <thead>
                        <tr style="text-align: center; font-size: 17px; font-weight: 600;">
                            <td>No</td>
                            <td>Nama Kegiatan</td>
                            <td>Nama Peserta</td>
                            <td>Keterangan</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>

                        @foreach ($presensiDetail as $pdi)
                            @if ($pdi->nisn_pemain != null)
                                <tr style="vertical-align: middle; font-size: 17px;" idpdi={{ $pdi->id_kegiatan }}>
                                    <td class="col-0" style="text-align: center;"> {{ $no++ }} </td>
                                    <td class="col-3 text-capitalize text-center "> {{ $presensi->kegiatan->nama_kegiatan }}
                                    </td>
                                    <td class="col-5 text-capitalize text-center "> {{ $pdi->pemain->nama_pemain }} </td>
                                    <td class="col-2 text-capitalize text-center "> {{ $pdi->keterangan }} </td>
                                    <td class="col-3" style="text-align: center">
                                        <div style="width: 200px;">
                                            <a href="{{ url('pemain', ['']) }}" class="btn btn-primary">
                                                Peninjauan pepe
                                                <i class="bi bi-search ms-2"
                                                    style="font-size: 15px; vertical-align: middle; "></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @else
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>


    </div>
@endsection
