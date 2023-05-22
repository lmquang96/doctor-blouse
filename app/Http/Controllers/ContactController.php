<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $breadcrumbTitle = 'Contact';

        $breadcrumbParent = 'Contact';

        return view('user.contact', compact('breadcrumbTitle', 'breadcrumbParent'));
    }
}
