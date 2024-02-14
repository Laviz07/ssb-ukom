<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Presensi;
use DB;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengirimkan data ke view dengan isi array data presensi
        $data = [
            'presensi' => Presensi::all(),
            'kegiatan' => Kegiatan::all(),
        ];

        return view('Presensi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            // Menambah ke tabel jadwal
            'id_kegiatan' => ['required'],
            'hari_tanggal_hadir' => ['required'],
        ]);

        // Memanggil fungsi untuk mendapatkan ID kustom
        $customId = DB::selectOne("SELECT function_id_presensi() as custom_id")->custom_id;
        $data['id_presensi'] = $customId;

        $presensi = new Presensi($data);
        $presensi->save();

        if ($presensi) {
            $pesan = [
                'success' => true,
                'pesan' => 'Presensi berhasil ditambah'
            ];
        } else {
            $pesan = [
                'success' => true,
                'pesan' => 'Presensi gagal ditambah'
            ];
        }

        return response()->json($pesan);
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
    public function show(Presensi $presensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presensi $presensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presensi $presensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presensi $presensi)
    {
        //
    }
}
