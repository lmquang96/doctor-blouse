<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function index()
    {
        $doctors = DB::table('doctors')->join('specialties', 'doctors.specialty' , '=', 'specialties.code')->select('doctors.*', 'specialties.name as specialty_name')->get();

        $breadcrumbTitle = 'About Us';

        $breadcrumbParent = 'About';

        return view('user.about-us', compact('doctors', 'breadcrumbTitle', 'breadcrumbParent'));
    }
}
