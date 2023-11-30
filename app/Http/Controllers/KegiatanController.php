<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Pelatih;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'jadwal' => Jadwal::where('id_jadwal', $request->id)->first(),
            'kegiatan' => Kegiatan::all(),
            'pelatih' => Pelatih::all(),
        ];

        return view('Kegiatan.index', $data);
    }

    public function indexCreate(Request $request)
    {
        $data = [
            'jadwal' => Jadwal::where('id_jadwal', $request->id)->first(),
            'pelatih' => Pelatih::all(),
        ];
        return view('Kegiatan.tambah', $data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            // Menambah ke tabel pelatih
            'nik_pelatih' => ['required'],
            'nama_kegiatan' => ['required'],
            'id_jadwal' => ['required'],
            'tipe_kegiatan' => ['required'],
            'jam_mulai' => ['required'],
            'jam_selesai' => ['required'],
            // 'foto_kegiatan' => ['required'],
            'detail_kegiatan' => ['required'],
            // 'laporan_kegiatan' => ['required'],

        ]);

        //Upload foto kegiatan
        // $path = $request->file("foto_kegiatan")->storePublicly("foto_kegiatan", "public");
        // $data['foto_kegiatan'] = $path;

        $dataInsert = Kegiatan::create($request->all());
        if ($dataInsert) {
            // return redirect()->to('/jadwal/kegiatan/{id}')->with('success', 'kegiatan berhasil ditambah');
            $pesan = [
                'success' => true,
                'pesan' => 'Kegiatan berhasil ditambah'
            ];
        } else {
            $pesan = [
                'success' => true,
                'pesan' => 'Kegiatan gagal ditambah'
            ];
        }

        return response()->json($pesan);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tipe_kegiatan' => 'required',
            // Tambahkan validasi untuk atribut lainnya
        ]);

        Kegiatan::create($request->all());
        return redirect()->route('Kegiatan.index');
    }


    public function edit(Request $request)
    {
        \Log::info('Received data:', $request->all());
        $data = $request->validate([
            'nik_pelatih' => ['required'],
            'nama_kegiatan' => ['required'],
            'id_jadwal' => ['required'],
            'tipe_kegiatan' => ['required'],
            'jam_mulai' => ['required'],
            'jam_selesai' => ['required'],
            'detail_kegiatan' => ['required'],
        ]);

        $kegiatan = Kegiatan::find($request->input('id_kegiatan'));

        if (!$kegiatan) {
            return response()->json(['success' => false, 'pesan' => 'Kegiatan tidak ditemukan']);
        }

        $kegiatan->fill($data);

        if ($kegiatan->save()) {
            return response()->json(['success' => true, 'pesan' => 'Kegiatan berhasil diedit']);
        } else {
            return response()->json(['success' => false, 'pesan' => 'Kegiatan gagal diedit']);
        }

        // $kegiatan = Kegiatan::where('id_kegiatan', $request->input('id_kegiatan'))->first();

        // $kegiatan->fill($data);
        // $kegiatan->save();

        // return redirect()->to('/jadwal/kegiatan/{id}')->with('success', 'kegiatan berhasil ditambah');

        // $simpan = $kegiatan->save();
        // if ($simpan) {   
        //     $pesan = [
        //         'success' => true,
        //         'pesan' => 'Kegiatan berhasil diedit'
        //     ];
        // } else {
        //     $pesan = [
        //         'success' => true,
        //         'pesan' => 'Kegiatan gagal diedit'
        //     ];
        // }

        // return response()->json($pesan);

        // return redirect()->to('/kegiatan')->with('success', 'kegiatan Berhasil Diupdate');
    }

    public function update(Request $request, $id)
    {
        // $data = Kegiatan::find($id);
        // $data->update($request->all());
        // return redirect()->route('kegiatan.index');
    }

    public function delete(Kegiatan $kegiatan, Request $request)
    {
        $idKegiatan = $request->id;

        $kegiatan = Kegiatan::where('id_kegiatan', $idKegiatan)->first();

        if ($kegiatan) {

            // //hapus foto profil
            // if ($admin->user->foto_profil) {
            //     Storage::disk('public')->delete($admin->user->foto_profil);
            // }

            $kegiatan = Kegiatan::where('id_kegiatan', $kegiatan->id_kegiatan)->first();
            if ($kegiatan) {
                $kegiatan->delete();
            }

            $pesan = [
                'success' => true,
                'pesan' => 'Kegiatan Berhasil Dihapus'
            ];
        } else {
            $pesan = [
                'success' => false,
                'pesan' => 'Kegiatan Gagal Dihapus'
            ];
        }

        return response()->json($pesan);
    }
}
