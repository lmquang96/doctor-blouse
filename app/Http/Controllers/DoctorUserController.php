<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Specialty;

class DoctorUserController extends Controller
{
    public function index()
    {
        $doctors = DB::table('doctors')->join('specialties', 'doctors.specialty' , '=', 'specialties.code')->select('doctors.*', 'specialties.name as specialty_name')->get();

        $specialties = Specialty::all();

        $breadcrumbTitle = 'Our Doctors';

        $breadcrumbParent = 'Doctors';

        return view('user.doctors', compact('breadcrumbTitle', 'breadcrumbParent', 'doctors', 'specialties'));
    }
}
