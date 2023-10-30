@extends('layouts.layout')
@section('title', 'Galeri Sekolah')
@section('content')   

    <div class="mt-4">

        <div>
            <div class="card align-items-center" style="border: 2px solid #00171F;">
                <div class="card-body">
                    <span class="h3 text-uppercase "> <strong>Galeri Sekolah</strong></span>
                </div>
            </div>
    
            <div class="col d-flex justify-content-between mb-2  mt-3">
                <a href="{{ url('/', []) }}">
                    <btn class="btn btn-primary">Kembali</btn>
                </a>
    
                @if (Auth::check() && Auth::user()->role == 'admin')
                    <a href="{{ url('galeri', ['tambah']) }}" class="btn btn-success">Tambah Foto</a>
                @endif
            </div>

            <div class="row mt-4 mb-4">
                @foreach($galeri as $gl)

                <div class="col-lg-4 col-md-12 mb-4 mt-4 mb-lg-0">

                    <div class="image-container" idGL={{$gl->id_galeri}} >

                        <img class="image" src="{{ asset('storage/' . $gl->foto) }}" alt="{{$gl->keterangan_foto}}" 
                            style="width: 350px; height: 200px; border-radius: 5px">

                        <div class="overlay ">
                            <span class="caption text-white" style="font-size: 18px; text-align: center; "> 
                                {{$gl->keterangan_foto}} 
                            </span>
                        </div>

                        @if (Auth::check() && Auth::user()->role == 'admin')
                            <div class="overlay" 
                                style="position: absolute; top: 0; left: 0; padding-left: 40px; padding-top: 50px" >
                                <div class="dropdown dropend" style="display: inline-block; vertical-align: middle;">
                                
                                        <i  class="bi bi-three-dots-vertical text-white" 
                                            style="font-size: 26; vertical-align: middle; cursor: pointer;"
                                            id="galeriDropdown" data-bs-toggle='dropdown' data-bs-offset="-10,20">
                                        </i>

                                    <div class="dropdown-menu" style="width: 200px;" aria-labelledby="galeriDropdown">
                                    
                                    <h6 class="dropdown-header">Apa Yang Akan Anda Lakukan?</h6>

                                    @if (Auth::user()['role']=='admin')
                                        <a class="dropdown-item editBtn" data-bs-toggle="modal" data-bs-target="#edit-modal-{{$gl->id_galeri}}" 
                                            style="cursor: pointer" idGL = {{$gl->id_galeri}} > 
                                            <i class="bi bi-pencil"  style="font-size: 20px; vertical-align: middle; "></i> 
                                            <strong class="ms-1" >Edit Data Foto</strong> 
                                        </a>

                                        
                                        <a class="dropdown-item hapusBtn" idGL={{$gl->id_galeri}} style="cursor: pointer"> 
                                            <i class="bi bi-trash"  style="font-size: 20px; vertical-align: middle; "></i> 
                                            <strong class="ms-1">Hapus Data Foto</strong> 
                                        </a>
                                    @endif

                                    </div>

                                </div>
                            </div>
                        @endif

                    </div>
                </div>

                {{-- EDIT GAMBAR--}}
                <div class="modal fade" id="edit-modal-{{$gl->id_galeri}}" tabindex="-1"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Gambar</h1>
                        </div>
                        <div class="modal-body">
                            <form id="edit-gl-form-{{$gl->id_galeri}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label>Keterangan Gambar</label>
                                    <textarea name="keterangan_foto" id="" rows="2" 
                                        required class="form-control" style="resize: none">{{$gl->keterangan_foto}}
                                    </textarea>
                                </div>
                                <input type="hidden" name="id_galeri" value="{{$gl->id_galeri}}">


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
                            <button type="submit" class="btn btn-primary edit-btn" form="edit-gl-form-{{$gl->id_galeri}}">
                                Edit
                            </button>
                            
                        </div>
                    </div>
                </div>
            </div>
                @endforeach      
            </div>
        
        </div>
    </div>

@endsection
@section('footer')
    <script type="module">
         //delete pop up
         $('.image-container').on('click', '.hapusBtn', function(e) {
            e.preventDefault();
            let idGL = $(this).attr('idGL');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/galeri/hapus/' + idGL) 
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
            let idGL = $(this).attr('idGL');
            $(`#edit-gl-form-${idGL}`).on('submit', function (e) {
                e.preventDefault();
                let data = Object.fromEntries(new FormData(e.target));
                data['id_galeri'] = idGL;
                axios.post(`/galeri/edit/${idGL}`, data)
                    .then(() => {
                        $(`#edit-modal-${idGL}`).css('display', 'none')
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