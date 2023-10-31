@extends('layouts.layout')
@section('title', 'List Jadwal')
@section('content')   

<div class="container mt-4 mb-4">

    {{-- LIST JADWAL --}}
    <div>
        <div class="card align-items-center" style="border: 2px solid #00171F;">
            <div class="card-body">
                <span class="h3 text-uppercase "> <strong>Daftar Jadwal</strong></span>
            </div>
        </div>

        <div class="col d-flex justify-content-between mb-2  mt-3">
            <a href="{{ url('/', []) }}">
                <btn class="btn btn-primary">Kembali</btn>
            </a>

            @if (Auth::user()['role']=='admin')
            <a href="{{ url('jadwal', ['tambah'])}}" class="justify-content-end">
                <btn class="btn btn-success">Tambah </btn>
            </a>
            @endif
        </div>

        <div class=" mt-3">
                <table class="table table-hovered table-bordered DataTable  ">
                    <thead>
                        <tr style="text-align: center; font-size: 17px; font-weight: 600;">
                            <td>No</td>
                            <td>Tanggal</td>
                            <td>Judul Kegiatan</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                        ?>

                @foreach ($jadwal as $jw)
                    
                        <tr style="vertical-align: middle; font-size: 17px;" idJW={{$jw->id_jadwal}}>
                            <td class="col-1" style="text-align: center;"> {{$no++}} </td>
                            <td class="col-3" style="text-align: center"> 
                                {{\Carbon\Carbon::parse($jw->tanggal_kegiatan)->format('j F Y') }}
                        
                            </td>
                            <td class="col-5 text-capitalize text-center "> {{$jw->judul_kegiatan}} </td>
                            <td style="text-align: center">
                               

                                <div class="dropdown dropend" style="display: inline-block; vertical-align: middle;">
                                    <button class="btn btn-primary" id="navbarDropdownMenuLink" data-bs-toggle='dropdown' data-bs-offset="-10,20">
                                        Action
                                        <i  class="bi bi-three-dots-vertical " 
                                            style="font-size: 26; vertical-align: middle; cursor: pointer;">
                                        </i>
                                    </button>

                                    <div class="dropdown-menu" style="width: 200px;" aria-labelledby="navbarDropdownMenuLink">
                                    
                                    <h6 class="dropdown-header">Apa Yang Akan Anda Lakukan?</h6> 
                                       <a class="dropdown-item" href="{{ url('jadwal', ['detail', $jw->id_jadwal]) }}"> 
                                        <i class="bi bi-eye"  style="font-size: 20px; vertical-align: middle; "></i> 
                                        <strong class="ms-1">Lihat Detail Jadwal</strong> 
                                       </a>

                                    @if (Auth::user()['role']=='admin')
                                        <a class="dropdown-item editBtn" data-bs-toggle="modal" data-bs-target="#edit-modal-{{$jw->id_jadwal}}" 
                                            style="cursor: pointer" idJW = {{$jw->id_jadwal}} > 
                                            <i class="bi bi-pencil"  style="font-size: 20px; vertical-align: middle; "></i> 
                                            <strong class="ms-1" >Edit Data Jadwal</strong> 
                                        </a>

                                        <a class="dropdown-item hapusBtn" idJW={{$jw->id_jadwal}} style="cursor: pointer"> 
                                            <i class="bi bi-trash"  style="font-size: 20px; vertical-align: middle; "></i> 
                                            <strong class="ms-1">Hapus Data Jadwal</strong> 
                                        </a>
                                    @endif

                                    </div>

                                </div>

                            </td>
                        </tr>

                         {{-- EDIT JADWAL --}}
                        <div class="modal fade" id="edit-modal-{{$jw->id_jadwal}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jadwal</h1>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit-jw-form-{{$jw->id_jadwal}}">
                                            <div class="form-group">
                                                <label>Judul Kegiatan:</label>
                                                <input placeholder="example" type="text" class="form-control mb-3"
                                                        name="judul_kegiatan"
                                                        value="{{$jw->judul_kegiatan}}"
                                                        required/>
                                                @csrf
                                            </div>
                                            <div class="form-group mt-2">
                                                <label>Tanggal Kegiatan:</label>
                                                <input placeholder="{{$jw->tanggal_kegiatan}}" type="date" id="tanggal" name="tanggal_kegiatan" class="form-control">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary edit-btn"
                                                form="edit-jw-form-{{$jw->id_jadwal}}" >
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

@endsection

@section('footer')
    <script type="module">

        // // edit pop up
        $('.editBtn').on('click', function (e) {
            e.preventDefault();
            let idJW = $(this).attr('idJW');
            $(`#edit-jw-form-${idJW}`).on('submit', function (e) {
                e.preventDefault();
                let data = Object.fromEntries(new FormData(e.target));
                data['id_jadwal'] = idJW;
                axios.post(`/jadwal/edit/${idJW}`, data)
                    .then(() => {
                        $(`#edit-modal-${idJW}`).css('display', 'none')
                        swal.fire('Berhasil edit data!', '', 'success').then(function () {
                            location.reload();
                        })
                    })
                    .catch(() => {
                        swal.fire('Gagal edit data!', '', 'warning');
                    })
            })
        })
        
        //delete pop up
        $('.DataTable tbody').on('click','.hapusBtn',function(a){
        a.preventDefault();
        let idJW = $(this).closest('.hapusBtn').attr('idJW');
        swal.fire({
                title : "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'
    
            }).then((result)=>{
                if(result.isConfirmed){
                    //dilakukan proses hapus
                    axios.delete('/jadwal/hapus/' + idJW).then(function(response){
                        console.log(response);
                        if(response.data.success){
                            swal.fire('Berhasil di hapus!', '', 'success').then(function(){
                                    //Refresh Halaman
                                    location.reload();
                                });
                        }else{
                            swal.fire('Gagal di hapus!', '', 'warning').then(function(){
                                    //Refresh Halaman
                                    location.reload();
                                });
                        }
                    }).catch(function(error){
                        swal.fire('Data gagal di hapus!', '', 'error').then(function(){
                                    //Refresh Halaman
                                   
                                });
                    });
                }
            });
    });

        $('.DataTable').DataTable();
    </script>
@endsection