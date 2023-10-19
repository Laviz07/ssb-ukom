<?php

namespace App\Http\Controllers;

use App\Models\Pemain;
use App\Models\Tim;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'tim' => Tim::all(),
        ];
        return view('Tim.index', $data);
    }

    public function indexCreate()
    {
        return view('Tim.tambah');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            // Menambah ke tabel pelatih
            'id_tim' => ['required'],
            'nik_pelatih' => ['required'],
            'nama_tim' => ['required'],
            'deskripsi_tim' => ['nullable'],


            // Menambah ke tabel user
            'role' => ['required'],
            'foto_tim' => ['nullable', 'mimes:png,jpg,jpeg', 'max:2048']
        ]);

            //Upload foto tim
            $path = $request->file("foto_tim")->storePublicly("foto_tim", "public");
            $data['foto_tim'] = $path;

            //hash password
            $data['password'] = Hash::make($data['password']);

        // DB::transaction(function () use ($data) {
        //     $user = new User([
        //         'username' => $data['username'],
        //         'password' => $data['password'],
        //         'role' => $data['role'],
        //         'foto_profil' => $data['foto_profil']
        //     ]);

        //     $user->save();

        //     $pelatih = new Pelatih($data);
        //     $pelatih->id_user = $user->id_user;
        //     $pelatih->save();
        // });

        return redirect('/tim')
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
    public function show(Tim $tim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tim $tim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tim $tim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tim $tim)
    {
        //
    }
}
