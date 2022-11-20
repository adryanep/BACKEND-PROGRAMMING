<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    # method index - get all resource pasien
    public function index()
    {
        # mengambil seluruh data pasien
        $patients = Patients::all();

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
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'in_date_at' => $request->in_date_at,
            'out_date_at' => $request->out_date_at,
        ];
        # menggunakan pasien untuk insert data
        $patient = Patients::create($input);

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
        $patientsshow = Patients::find($id);

        if ($patientsshow) {
            $data = [
                'message' => 'Get Detail Resource',
                'data' => $patientsshow,
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
        # menemumkan data pasien
        $patientsinput = Patients::find($id);
        if ($patientsinput) {
            $patientsinput->update([
                'name' => $request->name ?? $patientsinput->name,
                'phone' => $request->phone ?? $patientsinput->phone,
                'address' => $request->address ?? $patientsinput->address,
                'status' => $request->status ?? $patientsinput->status,
                'in_date_at' => $request->in_date_at ?? $patientsinput->in_date_at,
                'out_date_at' => $request->out_date_at ?? $patientsinput->out_date_at,
            ]);

            $data = [
                'message' => 'Resource is update successfully',
                'data' => $patientsinput
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
    public function destroy($id)
    {
        # menghapus data pasien
        $patientsdelete = Patients::destroy($id);
        if ($patientsdelete) {
            $data = [
                'message' => 'Resource is delete successfully',
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
        # mencari data pasien berdasarkan nama
        $patientsname = Patients::where('name', 'like', $name)->get();
        if ($patientsname) {
            $data = [
                'message' => 'Get searched resource',
                'data' => $patientsname,
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
        # mencari data pasien positive
        $patientspositive = Patients::where('status', 'positive')->get();

        $data = [
            'message' => 'Get positive resource',
            'total' => $patientspositive->count(),
            'data' => $patientspositive,
        ];
        # mengembalikan data (json) status code 200
        return response()->json($data, 200);
    }

    # method get - data pasien pulih
    public function recovered()
    {
        # mencari data pasien pulih
        $patientsrecovered = Patients::where('status', 'recovered')->get();

        $data = [
            'message' => 'Get recovered resource',
            'total' => $patientsrecovered->count(),
            'data' => $patientsrecovered,
        ];
        # mengembalikan data (json) status code 200
        return response()->json($data, 200);
    }

    # method get - data pasien meninggal

    public function dead()
    {
        # mencari data pasien meninggal
        $patientsdead = Patients::where('status', 'dead')->get();

        $data = [
            'message' => 'Get dead resource',
            'total' => $patientsdead->count(),
            'data' => $patientsdead,
        ];
        return response()->json($data, 200);
    }
}