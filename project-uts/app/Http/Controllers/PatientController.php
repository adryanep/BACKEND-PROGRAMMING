<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    # method index - get all resource pasien
    public function index()
    {
        $patients = Patient::all();

        if ($patients) {
            $data = [
                'message' => 'Get All Resource',
                'data' => $patients,
            ];
            # mengembalikan data (json) status code 200
            return response()->json($patients, 200);
        } else {
            $data = [
                'message' => 'Data is empty',
            ];
            # mengembalikan data (json) status code 200
            return response()->json($data, 200);
        }
    }

    # method post - menambah resource pasien
    public function store(Request $request)
    {
        # menangkap request
        $input = [
            'nama pasien' => $request->name,
            'no hp pasien' => $request->phone,
            'alamat pasien' => $request->address,
            'status pasien' => $request->status,
            'tanggal masuk' => $request->in_date_at,
            'tanggal keluar' => $request->out_date_at,
        ];
        # menggunakan pasien untuk insert data
        $patient = Patient::create($input);

        if ($patient) {
            $data = [
                'message' => 'Data is added successfully',
                'data' => $patient,
            ];
            #mengembalikan data (json) status code 201
            return response()->json($data, 201);
        } else {
            $data = [
                'message' => 'Data is empty',
            ];
            # mengembalikan data (json) status code 200
            return response()->json($data, 200);
        }
    }

    # method get - menampilkan resource pasien
    public function show($id)
    {
        #cari data pasien
        $patientshow = Patient::find($id);

        if ($patientshow) {
            $data = [
                'message' => 'Get Detail Resource',
                'data' => $patientshow,
            ];
            # mengembalikan data (json) status code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found',
            ];
            # mengembalikan data (json) status code 404
            return response()->json($data, 404);
        }
    }

    # method put - edit resource pasien
    public function update(Request $request, $id)
    {
        $patientinput = Patient::find($id);
        if ($patientinput) {
            $patientinput->update([
                'nama pasien' => $request->name ?? $patientinput->name,
                'no hp pasien' => $request->phone ?? $patientinput->phone,
                'alamat pasien' => $request->address ?? $patientinput->address,
                'status pasien' => $request->status ?? $patientinput->status,
                'tanggal masuk' => $request->in_date_at ?? $patientinput->in_date_at,
                'tanggal keluar' => $request->out_date_at ?? $patientinput->out_date_at,
            ]);

            $data = [
                'message' => 'Resource is update successfully',
                'data' => $patientinput
            ];
            # mengembalikan data (json) status code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found',
            ];
            # mengembalikan data (json) status code 404
            return response()->json($data, 404);
        }
    }

    # method delete - menghapus data pasien
    public function delete($id)
    {
        $patientdelete = Patient::destroy($id);
        if ($patientdelete) {
            $data = [
                'message' => 'Resource is delete successfully' . $id,
            ];
            # mengembalikan data (json) status code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found',
            ];
            # mengembalikan data (json) status code 404
            return response()->json($data, 404);
        }
    }

    # method get - mencari data pasien berdasarkan nama
    public function search($name)
    {
        $patientname = Patient::where($name);
        if ($patientname) {
            $data = [
                'message' => 'Get searched resource',
                'data' => $patientname,
            ];
            # mengembalikan data (json) status code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found',
            ];
            # mengembalikan data (json) status code 404
            return response()->json($data, 404);
        }
    }

    # method get - data pasien positif
    public function positive()
    {
        $patientpositive = Patient::where();

        $data = [
            'message' => 'Get positive resource',
            'total' => $patientpositive,
            'data' => $patientpositive,
        ];
        # mengembalikan data (json) status code 200
        return response()->json($data, 200);
    }

    # method get - data pasien pulih
    public function recovered()
    {
        $patientrecovered = Patient::where();

        $data = [
            'message' => 'Get recovered resource',
            'total' => $patientrecovered,
            'data' => $patientrecovered,
        ];
        # mengembalikan data (json) status code 200
        return response()->json($data, 200);
    }

    # method get - data pasien meninggal
    public function dead()
    {
        $patientdead = Patient::where();

        $data = [
            'message' => 'Get dead resource',
            'total' => $patientdead,
            'data' => $patientdead,
        ];
        return response()->json($data, 200);
    }
}