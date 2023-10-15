@extends('layouts.layout')
@section('title', 'List Pemain')
@section('content')   

<div class="container mt-4 mb-4">
    <div>
        <div class="card p-2 align-items-center" style="border: 2px solid #00171F;">
            <div class="card-body">
                <span class="h2 text-uppercase "> <strong>Daftar Pemain</strong></span>
            </div>
        </div>

        <div class=" mt-3">
                <table class="table table-hovered table-bordered DataTable  ">
                    <thead>
                        <tr style="text-align: center; font-size: 17px; font-weight: 600;">
                            <td>No</td>
                            <td>Foto</td>
                            <td>Nama</td>
                            <td>NISN</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                        ?>

                        <tr style="vertical-align: middle; font-size: 17px;">
                            <td class="col-1" style="text-align: center;"> {{$no++}} </td>
                            <td class="col-1" style="text-align: center"> <i class="bi bi-person-circle"  style="font-size: 40px;"></i> </td>
                            <td class="col-5">Muhammad Sumbul</td>
                            <td class="col-3" style="text-align: center">12345678910</td>
                            <td style="text-align: center">
                                {{-- <a href="#" class="text-decoration-none">
                                    <btn class="btn btn-primary">Edit</btn>
                                </a>

                                <a href="#" class="text-decoration-none">
                                    <btn class="btn btn-success">Detail</btn>
                                </a>

                                <btn class="hapusBtn btn btn-danger">Hapus</btn> --}}

                                <div class="dropdown dropend" style="display: inline-block; vertical-align: middle;">
                                    <button class="btn btn-primary" id="navbarDropdownMenuLink" data-bs-toggle='dropdown' data-bs-offset="-10,20">
                                        Action
                                        <i  class="bi bi-three-dots-vertical " 
                                            style="font-size: 26; vertical-align: middle; cursor: pointer;">
                                        </i>
                                    </button>

                                    <div class="dropdown-menu" style="width: 200px;" aria-labelledby="navbarDropdownMenuLink">
                                    
                                    <h6 class="dropdown-header">Apa Yang Akan Anda Lakukan?</h6>
                                       <a class="dropdown-item" href="#"> 
                                        <i class="bi bi-eye"  style="font-size: 20px; vertical-align: middle; "></i> 
                                        <strong class="ms-1">Lihat Detail Pemain</strong> 
                                       </a>

                                       <a class="dropdown-item" href="#"> 
                                        <i class="bi bi-pencil"  style="font-size: 20px; vertical-align: middle; "></i> 
                                        <strong class="ms-1" >Edit Data Pemain</strong> 
                                       </a>

                                       <a class="dropdown-item" href="#"> 
                                        <i class="bi bi-trash"  style="font-size: 20px; vertical-align: middle; "></i> 
                                        <strong class="ms-1">Hapus Data Pemain</strong> 
                                       </a>

                                    </div>

                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
           
    </div>
</div>


@endsection