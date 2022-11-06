<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    // method get
    public function index()
    {
        // $user = [
        //     'nama' => 'ADRYAN EKA PRAMUDITA',
        //     'jurusan' => 'INFORMATIKA' 
        // ];

        $mahasiswas = Mahasiswa::all();
        $data = [
            'message' => 'Get all mahasiswa',
            'data' => $mahasiswas
        ];

        return response()->json($data, 200);
    }

    // menambahkan resource
    // method post
    public function store(Request $request)
    {
        // menangkap request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        // menggunakan mahasiswa untuk insert data
        $mahasiswa = Mahasiswa::create($input);

        $data = [
            'message' => 'Data mahasiswa berhasil dibuat',
            'data' => $mahasiswa,
        ];

        // mengembalikan data (json) status code 201
        return response()->json($data, 201);
    }

    // mengubah resource
    // method put
    public function update(Request $request, $id)
    {
        $mahasiswaput = Mahasiswa::find($id);
        $mahasiswaput->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ]);

        $data = [
            'message' => 'Data mahasiswa berhasil diubah',
            'data' => $mahasiswaput,
        ];
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $mahasiswaput2 = Mahasiswa::destroy($id);

        $data = [
            'message' => 'Data mahasiswa berhasil dihapus : ' . $id,
            'jumlah data yang tehapus' => $mahasiswaput2,
        ];
        return response()->json($data, 200);
    }
}