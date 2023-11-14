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
            'kegiatan' => Kegiatan::all()
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
        $data = $request->validate([
            // Menambah ke tabel pelatih
            'nik_pelatih' => ['required'],
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

        $dataInsert = Kegiatan::create($data);
        if ($dataInsert) {
            return redirect()->to('/jadwal/kegiatan/{id}')->with('success', 'kegiatan berhasil ditambah');
        }
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
        $data = $request->validate([
            'id_jadwal' => ['required'],
            'tanggal_kegiatan' => ['required'],
            'judul_kegiatan' => ['required']
        ]);

        $kegiatan = Kegiatan::where('id_jadwal', $request->input('id_kegiatan'))->first();
        $kegiatan->fill($data);
        $kegiatan->save();

        return redirect()->to('/kegiatan')->with('success', 'jadwal Berhasil Diupdate');
    }

    public function update(Request $request, $id)
    {
        // $data = Kegiatan::find($id);
        // $data->update($request->all());
        // return redirect()->route('kegiatan.index');
    }

    public function delete(Kegiatan $kegiatan, Request $request)
    {
        $id = $request->id;

        $kegiatan = Kegiatan::where('id_jadwal', $id)->first();

        if ($kegiatan) {

            // //hapus foto profil
            // if ($admin->user->foto_profil) {
            //     Storage::disk('public')->delete($admin->user->foto_profil);
            // }



            //menghapus user
            $kegiatan = Kegiatan::where('id_jadwal', $kegiatan->id_jadwal)->first();
            if ($kegiatan) {
                $kegiatan->delete();
            }

            $pesan = [
                'success' => true,
                'pesan' => 'Admin Berhasil Dihapus'
            ];
        } else {
            $pesan = [
                'success' => false,
                'pesan' => 'Admin Gagal Dihapus'
            ];
        }

        return response()->json($pesan);
    }
}
