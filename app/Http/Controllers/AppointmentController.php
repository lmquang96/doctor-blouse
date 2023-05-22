<?php

namespace App\Http\Controllers;

use App\Models\Appointment;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = DB::table('appointments')->leftJoin('specialties', 'appointments.department', '=', 'specialties.code')->select('appointments.*', 'specialties.name as department_name')->get();

        return view('admin.appointment.index', compact('appointments'));
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
        try {
            Appointment::create($request->all());

            return redirect()->route('thank');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $appointment = DB::table('appointments')->leftJoin('specialties', 'appointments.department', '=', 'specialties.code')->where('appointments.id', '=', $id)->select('appointments.*', 'specialties.name as department_name')->first();

            return view('admin.appointment.detail', compact('appointment'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
