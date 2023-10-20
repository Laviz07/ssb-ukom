@extends('layouts.layout')
@section('title', 'List Tim')
@section('content')   

<div class="container mt-4 mb-4">

    {{-- LIST TIM --}}
    <div>
        <div class="card align-items-center" style="border: 2px solid #00171F;">
            <div class="card-body">
                <span class="h3 text-uppercase "> <strong>Daftar Tim</strong></span>
            </div>
        </div>

        <div class="col d-flex justify-content-between mb-2  mt-3">
            <a href="{{ url('/', []) }}">
                <btn class="btn btn-primary">Kembali</btn>
            </a>

            @if (Auth::user()['role']=='admin')
            <a href="{{ url('tim', ['tambah'])}}" class="justify-content-end">
                <btn class="btn btn-success">Tambah </btn>
            </a>
            @endif
        </div>

        <div class=" mt-3">
                <table class="table table-hovered table-bordered DataTable  ">
                    <thead>
                        <tr style="text-align: center; font-size: 17px; font-weight: 600;">
                            <td>No</td>
                            <td>Foto</td>
                            <td>Nama Tim</td>
                            <td>Nama Pelatih</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                        ?>

                @foreach ($tim as $tm)
                    
                        <tr style="vertical-align: middle; font-size: 17px;" idTm={{$tm->id_tim}}>
                            <td class="col-1" style="text-align: center;"> {{$no++}} </td>
                            <td class="col-1" style="text-align: center"> 
                                @if ($tm->foto_tim)
                                    <img src="{{asset('storage/' . $tm->foto_tim) }}" alt="Foto Profil" style="width: 150px; height: 90px;" class="rounded">
                                @else
                                    <i class="bi bi-person-circle"  style="font-size: 40px;"></i> 
                                @endif
                            </td>
                            <td class="col-5 text-capitalize text-center "> {{$tm->nama_tim}} </td>
                            <td class="col-3" style="text-align: center"> {{$tm->pelatih->nama_pelatih}} </td>
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
                                       <a class="dropdown-item" href="{{ url('tim', ['detail', $tm->id_tim]) }}"> 
                                        <i class="bi bi-eye"  style="font-size: 20px; vertical-align: middle; "></i> 
                                        <strong class="ms-1">Lihat Detail Tim</strong> 
                                       </a>

                                    @if (Auth::user()['role']=='admin')
                                        <a class="dropdown-item editBtn" data-bs-toggle="modal" data-bs-target="#edit-modal-{{$tm->id_tim}}" 
                                            style="cursor: pointer" idTM = {{$tm->id_tim}} > 
                                            <i class="bi bi-pencil"  style="font-size: 20px; vertical-align: middle; "></i> 
                                            <strong class="ms-1" >Edit Data Tim</strong> 
                                        </a>

                                        <a class="dropdown-item hapusBtn" idTM={{$tm->id_tim}} style="cursor: pointer"> 
                                            <i class="bi bi-trash"  style="font-size: 20px; vertical-align: middle; "></i> 
                                            <strong class="ms-1">Hapus Data Tim</strong> 
                                        </a>
                                    @endif

                                    </div>

                                </div>

                            </td>
                        </tr>

                         {{-- EDIT TIM --}}
                        <div class="modal fade" id="edit-modal-{{$tm->id_tim}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Tim</h1>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit-tm-form-{{$tm->id_tim}}">
                                            <div class="form-group">
                                                <label>Nama Tim:</label>
                                                <input placeholder="example" type="text" class="form-control mb-3"
                                                        name="nama_tim"
                                                        value="{{$tm->nama_tim}}"
                                                        required/>
                                                @csrf
                                            </div>

                                            <select name="nik_pelatih" id="pilihPelatih" class="form-select mb-3">
                                                <option value="" selected>Pilih Pelatih Tim</option>
                                                @foreach ($pelatih as $pl)
                                                    <option value="{{$pl->nik_pelatih}}" {{ $tm->nik_pelatih === $pl->nik_pelatih ? 'selected' : '' }}>
                                                        {{$pl->nama_pelatih}}
                                                    </option>
                                                @endforeach
                                                
                                            </select>

                                            <div class="form-group">
                                                <label>Deskripsi Tim:</label>
                                                <textarea required name="deskripsi_tim" id="" 
                                                    class="form-control" rows="5" placeholder="Deskripsi Tim" 
                                                    style="resize: none">{{$tm->deskripsi_tim}}
                                                </textarea>
                                            </div>

                                            <input type="hidden" name="id_tim" value="{{$tm->id_tim}}">


                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary edit-btn"
                                                form="edit-tm-form-{{$tm->id_tim}}" >
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

         // edit pop up
        $('.editBtn').on('click', function (e) {
            e.preventDefault();
            let idTM = $(this).attr('idTM');
            $(`#edit-tm-form-${idTM}`).on('submit', function (e) {
                e.preventDefault();
                let data = Object.fromEntries(new FormData(e.target));
                data['nisn_pemain'] = idTM;
                axios.post(`/tim/edit/${idTM}`, data)
                    .then(() => {
                        $(`#edit-modal-${idTM}`).css('display', 'none')
                        swal.fire('Berhasil edit data!', '', 'success').then(function () {
                            location.reload();
                        })
                    })
                    .catch(() => {
                        swal.fire('Gagal edit data!', '', 'warning');
                    })
            })
        })
        
    //     //delete pop up
        $('.DataTable tbody').on('click','.hapusBtn',function(a){
        a.preventDefault();
        let idTM = $(this).closest('.hapusBtn').attr('idTM');
        swal.fire({
                title : "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'
    
            }).then((result)=>{
                if(result.isConfirmed){
                    //dilakukan proses hapus
                    axios.delete('/tim/hapus/' + idTM).then(function(response){
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