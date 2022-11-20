<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    # method index - get all resource pasien
    public function index()
    {
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
        $patientshow = Patients::find($id);

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
        $patientinput = Patients::find($id);
        if ($patientinput) {
            $patientinput->update([
                'name' => $request->name ?? $patientinput->name,
                'phone' => $request->phone ?? $patientinput->phone,
                'address' => $request->address ?? $patientinput->address,
                'status' => $request->status ?? $patientinput->status,
                'in_date_at' => $request->in_date_at ?? $patientinput->in_date_at,
                'out_date_at' => $request->out_date_at ?? $patientinput->out_date_at,
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
    public function destroy($id)
    {
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
        $patientspositive = Patients::where('status', 'patients positive')->get;

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
        $patientrecovered = Patients::where('status', 'patients recovered')->get;

        $data = [
            'message' => 'Get recovered resource',
            'total' => $patientrecovered->count(),
            'data' => $patientrecovered,
        ];
        # mengembalikan data (json) status code 200
        return response()->json($data, 200);
    }

    # method get - data pasien meninggal
    public function dead()
    {
        $patientsdead = Patients::where('status', 'patients dead')->get;

        $data = [
            'message' => 'Get dead resource',
            'total' => $patientsdead->count(),
            'data' => $patientsdead,
        ];
        return response()->json($data, 200);
    }
}