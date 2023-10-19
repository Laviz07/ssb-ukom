<?php

namespace App\Http\Controllers;

// use App\Http\Requests\AdminRequest;
// use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $data = [
            'admin' => Admin::all()
        ];

        return view('Admin.index', $data);
    }

    public function store(AdminRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $admin = new Admin($data);
        $admin->password = Hash::make($data['password']);
        $admin->save();

        return redirect()->to('/dashboard/Admin')->with('success', 'Admin successfully created');
    }

    public function update(int $id, AdminUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $admin = Admin::query()->find($id);

        $admin->fill($data);
        $admin->save();

        return redirect()->to('/dashboard/Admin')->with('success', 'Update success');
    }

    public function delete(int $id): JsonResponse
    {
        $admin = Admin::query()->find($id)->delete();

        if($admin):
            //Pesan Berhasil
            $pesan = [
                'success'   => true,
                'pesan'     => 'Data Admin berhasil dihapus'
            ];
        else:
            //Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'     => 'Data gagal dihapus'
            ];
        endif;
        return response()->json($pesan);
    }
}