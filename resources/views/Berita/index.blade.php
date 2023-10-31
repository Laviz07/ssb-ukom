@extends('layouts.layout')
@section('title', 'Berita')
@section('content')   

<div class="mt-4">
    <div class="row mt-4">
        <div>
            <div class="card align-items-center" style="border: 2px solid #00171F;">
                <div class="card-body">
                    <span class="h3 text-uppercase "> <strong>Berita Sekolah</strong></span>
                </div>
            </div>

            <div class="col d-flex justify-content-between mb-2  mt-3">
                <a href="{{ url('/', []) }}">
                    <btn class="btn btn-primary">Kembali</btn>
                </a>

                @if (Auth::check() && Auth::user()->role == 'admin')
                <a href="{{ url('berita', ['tambah']) }}" class="btn btn-success">Tambah Berita</a>
                </a>
                @endif
            </div>
        </div>
    
        @foreach($berita as $br)

        <div class="col-lg-4 col-md-12 mb-4 mt-4 mb-lg-0 content">
            <div idBR={{$br->id_berita}} >
                <div class="col-md-6 card mt-0 align-items-center" style="width: 350px;">
                    <img src="{{ asset('storage/' . $br->foto_berita) }}" alt="{{$br->foto_berita}}" 
                        height="200" width="300" class="rounded p-2 pt-4" >

                    <div class="col d-flex justify-content-between mb-2 mt-3 ps-4">
                        <div>
                            <span style="font-weight: 300; font-size: 18px;" > 
                            {{$br->judul_berita}} 
                            </span>
                        </div>   
                        
                        <div class="ps-3" style="display: inline-block; ">
                            <div class="dropdown dropend" style=" vertical-align: middle; margin-right: 20px;">
                                <i  class="bi bi-three-dots-vertical " 
                                    style="font-size: 20px; vertical-align: middle; cursor: pointer;"
                                    id="beritaDropdown" data-bs-toggle='dropdown' data-bs-offset="-10,20">
                                </i>

                                <div class="dropdown-menu" style="width: 200px;" aria-labelledby="beritaDropdown">
                                    <h6 class="dropdown-header">Apa Yang Akan Anda Lakukan?</h6>
                                    <a class="dropdown-item" href="{{ url('berita', ['detail', $br->id_berita]) }}"> 
                                     <i class="bi bi-eye"  style="font-size: 20px; vertical-align: middle; "></i> 
                                     <strong class="ms-1">Lihat Detail Berita</strong> 
                                    </a>

                                        @if (Auth::check() && Auth::user()->role == 'admin')
                                            <a class="dropdown-item editBtn" data-bs-toggle="modal" data-bs-target="#edit-modal-{{$br->id_berita}}" 
                                                style="cursor: pointer" idBR = {{$br->id_berita}} > 
                                                <i class="bi bi-pencil"  style="font-size: 20px; vertical-align: middle; "></i> 
                                                <strong class="ms-1" >Edit Data Berita</strong> 
                                            </a>
                                            <a class="dropdown-item hapusBtn" idBR={{$br->id_berita}} style="cursor: pointer"> 
                                                <i class="bi bi-trash"  style="font-size: 20px; vertical-align: middle; "></i> 
                                                <strong class="ms-1">Hapus Data Berita</strong> 
                                            </a>
                                        @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- EDIT GAMBAR--}}
        <div class="modal fade" id="edit-modal-{{$br->id_berita}}" tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Gambar</h1>
                </div>
                <div class="modal-body">
                    <form id="edit-br-form-{{$br->id_berita}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label>Judul Berita Baru</label>
                            <textarea name="judul_berita" id="" rows="2" 
                                required class="form-control" style="resize: none">{{$br->judul_berita}}
                            </textarea>
                        </div>
                        <input type="hidden" name="id_berita" value="{{$br->id_berita}}">

                        <div class="form-group">
                            <label>Detail Berita Baru</label>
                            <textarea name="isi_berita" id="" rows="10" 
                                required class="form-control" style="resize: none">{{$br->isi_berita}}
                            </textarea>
                        </div>
                        <input type="hidden" name="id_berita" value="{{$br->id_berita}}">

                        <div class="row">
                            <div class="col-md-4 mt-3 align-items-center">
                                <label for="fileUpload">Upload Gambar</label>
                                <input type="file" name="foto" id="fileUpload" required class="btn w-auto btn-outline-primary form-control">
                            </div>
                        </div>

                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary editBtn" form="edit-br-form-{{$br->id_berita}}">
                        Edit
                    </button>
                    
                </div>
            </div>
        </div>
    </div>
        @endforeach      
    </div>
</div>
@endsection
@section('footer')
    <script type="module">
         //delete pop up
         $('.content').on('click', '.hapusBtn', function(e) {
            e.preventDefault();
            let idBR = $(this).attr('idBR');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/berita/hapus/' + idBR) 
                    .then(function(response) {
                        console.log(response);
                        if (response.data.success) {
                            swal.fire('Berhasil dihapus!', '', 'success').then(function() {
                                // Refresh Halaman
                                location.reload();
                            });
                        } else {
                            swal.fire('Gagal dihapus!', '', 'warning').then(function() {
                                // Refresh Halaman
                                location.reload();
                            });
                        }
                    }).catch(function(error) {
                        swal.fire('Data gagal dihapus!', '', 'error').then(function() {
                            // Refresh Halaman
                        });
                    });
                }
            });
        });

         // edit pop up
         $('.editBtn').on('click', function (e) {
            e.preventDefault();
            let idBR = $(this).attr('idBR');
            $(`#edit-br-form-${idBR}`).on('submit', function (e) {
                e.preventDefault();
                let data = Object.fromEntries(new FormData(e.target));
                data['id_berita'] = idBR;
                axios.post(`/berita/edit/${idBR}`, data)
                    .then(() => {
                        $(`#edit-modal-${idBR}`).css('display', 'none')
                        swal.fire('Berhasil edit data!', '', 'success').then(function () {
                            location.reload();
                        })
                    })
                    .catch(() => {
                        swal.fire('Gagal edit data!', '', 'warning');
                    })
            })
        })

    </script>
@endsection