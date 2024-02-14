<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Presensi;
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
            'presensiDetail' => PresensiDetail::all(),
        ];
        return view('Presensi.detail', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            // Menambah ke tabel jadwal
            'id_presensi' => ['required'],
            'nisn_pemain' => ['nullable'],
            'nik_pelatih' => ['nullable'],
            'keterangan' => ['required'],
        ]);

        // Memanggil fungsi untuk mendapatkan ID kustom
        $customId = DB::selectOne("SELECT function_id_presensi_detail() as custom_id")->custom_id;
        $data['id_presensi_detail'] = $customId;

        $presensi_detail = new PresensiDetail($data);
        $presensi_detail->save();

        // $presensi = Presensi::find($data['id_presensi']);
        // $presensi_detail = PresensiDetail::create($data);
        // $presensi_detail->presensi()->save($presensi);

        if ($presensi_detail) {
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
