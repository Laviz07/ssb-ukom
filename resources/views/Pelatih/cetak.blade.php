@extends('layouts.layout')
@section('title', 'Cetak Data Pelatih')
@section('content')
    <div class="from-group mt-5">
        <h3 class="text-white" style="align: center;"><b>Laporan Data Pelatih</b></h3>
            <table class="table table-bordered table-hovered DataTable mt-3" style="width: 72vw; margin-left: 14%;">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>NIK</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    ?>
                    @foreach ($pelatih as $pl)
                        <tr idPL="{{ $pl->id }}">
                            <td class="col-1">{{ $no++ }}</td>
                            <td class="col-1">{{ $pl->foto_profil }}</td>
                            <td class="col-1">{{ $pl->nama_pelatih }}</td>
                            <td class="col-1">{{ $pl->nik_pelatih }}</td>
                            <td class="col-1">
                                <div class="w-100 d-flex flex-column">
                                    <img src="{{ asset('/storage/'. $pl->  )}}" width="100vw"
                                    alt="">
                                </div>
                            </td>
                    @endforeach
                </tbody>
            </table>
    </div>

    @yield('footer')
        <script>
            window.print
        </script>