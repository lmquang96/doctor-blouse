<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewDoctorRequest;

use Illuminate\Http\Request;

use App\Models\Doctor;

use App\Models\Specialty;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateNewDoctorRequest $request)
    {
        $data = $request->all();
        $imageName = time().'.'.$data['image']->getClientoriginalExtension();
        $data['image']->move('images/doctor', $imageName);
        $data['image'] = $imageName;
        try {
            Doctor::create($data);
            return redirect()->route('doctor.index')->with('message', 'Create successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $doctor = Doctor::find($id);

            if (empty($doctor)) {
                return response('Doctor not found', 404)
                ->header('Content-Type', 'text/plain');
            }

            $specialties = Specialty::all();
            return view('admin.doctor.edit', compact('doctor', 'specialties'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $doctor = Doctor::find($id);
            
            if (empty($doctor)) {
                return response('Doctor not found', 404)
                ->header('Content-Type', 'text/plain');
            }

            $doctor->update($request->all());

            return redirect()->route('doctor.index')->with('message', 'Update successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::find($id);
        if (!empty($doctor)) {
            try {
                $doctor->delete();
                return redirect()->route('doctor.index')->with('message', 'Delete successfully');
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        return response('Doctor not found', 404)
            ->header('Content-Type', 'text/plain');
    }
}
