<?php

namespace App\Http\Controllers;

use App\Models\Pemain;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PemainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'pemain' => Pemain::all(),
            'user' => User::all()
        ];
        return view('Pemain.index', $data);
    }

    /**
     * Menampilkan halaman tambah pemain
     */
    public function indexCreate()
    {
        return view('Pemain.tambah');
    }

  /**
     * Menampilkan halaman detail pemain
     */
    public function indexDetail(Request $request)
    {
        $data = [
            'pemain' => Pemain::where('nisn_pemain', $request->id)->first()
        ];

        return view('Pemain.detail', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $data = $request->validate([
            // Menambah ke tabel pemain
            'nisn_pemain' => ['required'],
            'nama_pemain' => ['required'],
            'no_telp' => ['required'],
            'email' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required'],
            'no_punggung' => ['required'],
            'posisi' => ['required'],
            'kategori_umur' => ['required'],
            'deskripsi_pemain' => ['nullable'],

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

            $pemain = new Pemain($data);
            $pemain->id_user = $user->id_user;
            $pemain->save();
        });

        return redirect('/pemain')
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
    public function show(Pemain $pemain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemain $pemain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemain $pemain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemain $pemain)
    {
        //
    }
}
