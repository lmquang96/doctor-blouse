<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

use App\Models\Specialty;

use App\Http\Requests\CreateNewSpecialtyRequest;

use Illuminate\Support\Facades\DB;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialties = DB::table('specialties')->join('doctors', 'specialties.dean', '=', 'doctors.id')->select('specialties.*', 'doctors.first_name', 'doctors.last_name')->get();
        
        return view('admin.specialty.index', compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::all();
        return view('admin.specialty.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateNewSpecialtyRequest $request)
    {
        try {
            Specialty::create($request->all());

            return redirect()->route('specialty.index')->with('message', 'Create successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
