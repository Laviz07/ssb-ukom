<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Presensi;
use App\Models\presensi_pelatih;
use App\Models\presensi_pemain;
use App\Models\PresensiDetail;
use DB;
use Illuminate\Http\Request;

class PresensiDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //mengirimkan data ke view dengan isi array data detail presensi
        $data = [
            // 'kegiatan' => Kegiatan::where('id_kegiatan', $request->id)->first(),
            'presensi' => Presensi::where('id_presensi', $request->id)->first(),
            'presensiPelatih' => presensi_pelatih::all(),
            'presensiPemain' => presensi_pemain::all(),
        ];
        return view('Presensi.detail', $data);
    }

    /**
     * Store a newly created presensi pelatih resource in storage.
     */
    public function storePelatih(Request $request)
    {
        $data = $request->validate([
            // Menambah ke tabel jadwal
            'id_presensi' => ['required'],
            'nik_pelatih' => ['required'],
            'keterangan' => ['required'],
        ]);

        // Memanggil fungsi untuk mendapatkan ID kustom
        $customId = DB::selectOne("SELECT function_id_presensi_pelatih() as custom_id")->custom_id;
        $data['id_presensi_pelatih'] = $customId;

        $presensi_pelatih = new presensi_pelatih($data);
        $presensi_pelatih->save();

        // $presensi = Presensi::find($data['id_presensi']);
        // $presensi_pelatih = PresensiDetail::create($data);
        // $presensi_pelatih->presensi()->save($presensi);

        if ($presensi_pelatih) {
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
     * Store a newly created presensi pelatih resource in storage.
     */
    public function storePemain(Request $request)
    {
        $data = $request->validate([
            // Menambah ke tabel jadwal
            'id_presensi' => ['required'],
            'nisn_pemain' => ['required'],
            'keterangan' => ['required'],
        ]);

        // Memanggil fungsi untuk mendapatkan ID kustom
        $customId = DB::selectOne("SELECT function_id_presensi_pemain() as custom_id")->custom_id;
        $data['id_presensi_pemain'] = $customId;

        $presensi_pemain = new presensi_pemain($data);
        $presensi_pemain->save();

        // $presensi = Presensi::find($data['id_presensi']);
        // $presensi_pemain = PresensiDetail::create($data);
        // $presensi_pemain->presensi()->save($presensi);

        if ($presensi_pemain) {
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
     * Display the specified resource.
     */
    public function show(PresensiDetail $presensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PresensiDetail $presensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PresensiDetail $presensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PresensiDetail $presensi)
    {
        //
    }
}
