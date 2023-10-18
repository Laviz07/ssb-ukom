<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Storage;

class PelatihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'pelatih' => Pelatih::all(),
            'user' => User::all()
        ];
        return view('Pelatih.index', $data);
    }

    /**
     * Menampilkan halaman tambah pelatih
     */
    public function indexCreate()
    {
        return view('Pelatih.tambah');
    }

    /**
     * Menampilkan halaman detail pelatih
     */
    public function indexDetail(Request $request)
    {
        $data = [
            'pelatih' => Pelatih::where('nik_pelatih', $request->id)->first()
        ];

        return view('Pelatih.detail', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $data = $request->validate([
            // Menambah ke tabel pelatih
            'nik_pelatih' => ['required'],
            'nama_pelatih' => ['required'],
            'no_telp' => ['required'],
            'email' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required'],
            'deskripsi_pelatih' => ['nullable'],

            // Menambah ke tabel user
            'username' => ['nullable'],
            'password' => ['required'],
            'role' => ['required'],
            'foto_profil' => ['nullable', 'mimes:png,jpg,jpeg', 'max:2048']
        ]);

        //Upload foto profil
        $path = $request->file("foto_profil")->storePublicly("foto_profil", "public");
        $data['foto_profil'] = $path;

        //hash password
        $data['password'] = Hash::make($data['password']);

        DB::transaction(function () use ($data) {
            $user = new User([
                'username' => $data['username'],
                'password' => $data['password'],
                'role' => $data['role'],
                'foto_profil' => $data['foto_profil']
            ]);

            $user->save();

            $pelatih = new Pelatih($data);
            $pelatih->id_user = $user->id_user;
            $pelatih->save();
        });

        return redirect('/pelatih')
            ->with('success', 'User baru berhasil ditambahkan!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelatih $pelatih)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelatih $pelatih)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelatih $pelatih)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $nik_pelatih)
    {
        {
            $pelatih = Pelatih::query()->find($nik_pelatih);
    
            if (!$pelatih){
                throw new HttpResponseException(response()->json([
                    'message' => 'Not found'
                ])->setStatusCode(404));
            }
    
            // Deleting file
            Storage::delete("public/$pelatih->file");
            // Deleting pelatih 
            $pelatih->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menghapus pelatih pelatih'
            ], 200);
        }
    }
}
