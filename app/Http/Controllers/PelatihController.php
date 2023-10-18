<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use App\Models\Pemain;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Storage;

class PelatihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Pelatih.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
