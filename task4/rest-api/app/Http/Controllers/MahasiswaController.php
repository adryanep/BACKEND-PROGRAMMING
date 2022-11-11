<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    # method get
    public function index()
    {
        # $user = [
        #     'nama' => 'ADRYAN EKA PRAMUDITA',
        #     'jurusan' => 'INFORMATIKA' 
        # ];

        $mahasiswas = Mahasiswa::all();
        $data = [
            'message' => 'Get all mahasiswa',
            'data' => $mahasiswas
        ];

        return response()->json($data, 200);
    }

    # menambahkan resource
    # method post
    public function store(Request $request)
    {
        # menangkap request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        # menggunakan mahasiswa untuk insert data
        $mahasiswa = Mahasiswa::create($input);

        $data = [
            'message' => 'Data mahasiswa berhasil dibuat',
            'data' => $mahasiswa,
        ];

        # mengembalikan data (json) status code 201
        return response()->json($data, 201);
    }

    # mengubah resource
    # method put
    public function update(Request $request, $id)
    {
        $mahasiswaput = Mahasiswa::find($id);
        if ($mahasiswaput) {
            $mahasiswaput->update([
                'nama' => $request->nama ?? $mahasiswaput->nama,
                'nim' => $request->nim ?? $mahasiswaput->nim,
                'email' => $request->email ?? $mahasiswaput->email,
                'jurusan' => $request->jurusan ?? $mahasiswaput->jurusan,

            ]);

            $data = [
                'message' => 'Data mahasiswa berhasil diubah',
                'data' => $mahasiswaput,
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data mahasiswa not found',
            ];
            return response()->json($data, 404);
        }
    }

    public function delete($id)
    {
        $mahasiswaput2 = Mahasiswa::destroy($id);
        if ($mahasiswaput2) {
            $data = [
                'message' => 'Data mahasiswa berhasil dihapus : ' . $id,
                'jumlah data yang tehapus' => $mahasiswaput2,
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data tidak ditemukan',
            ];
            return response()->json($data, 404);
        }
    }

    # mendapatkan detail resource mahasiswa
    # membuat method show
    public function show($id)
    {
        # cari data mahasiswa
        $mahasiswashow = Mahasiswa::find($id);

        if ($mahasiswashow) {
            $data = [
                'message' => 'Get detail mahasiswa',
                'data' => $mahasiswashow,
            ];

            # mengembalikan data json status code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Mahasiswa not found',
            ];

            # mengembalikan data json status code 404
            return response()->json($data, 404);
        }
    }
}