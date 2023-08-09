<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();

        if($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nim' => 'required',
                'nama' => 'required',
                'fakultas' => 'required',
                'program_studi' => 'required',
                'alamat' => 'required',
            ]);

            $mahasiswa = Mahasiswa::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'fakultas' => $request->fakultas,
                'program_studi' => $request->program_studi,
                'alamat' => $request->alamat
            ]);

            $data = Mahasiswa::where('id', '=', $mahasiswa->id)->get();

            if($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function show(string $id)
    {
        $data = Mahasiswa::where('id', '=', $id)->get();

        if($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nim' => 'required',
                'nama' => 'required',
                'fakultas' => 'required',
                'program_studi' => 'required',
                'alamat' => 'required',
            ]);

            $mahasiswa = Mahasiswa::findOrFail($id);

            $mahasiswa->update([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'fakultas' => $request->fakultas,
                'program_studi' => $request->program_studi,
                'alamat' => $request->alamat
            ]);

            $data = Mahasiswa::where('id', '=', $mahasiswa->id)->get();

            if($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $data = $mahasiswa->delete();

        if($data) {
            return ApiFormatter::createApi(200, 'Success Destroy Data');
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
