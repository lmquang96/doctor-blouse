<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\Specialty;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            if (Auth::user()->userType == '0') {
                return view('admin.dashboard');
            }
        }
        $doctors = DB::table('doctors')->join('specialties', 'doctors.specialty' , '=', 'specialties.code')->select('doctors.*', 'specialties.name as specialty_name')->get();

        $blogs = DB::table('blogs')->join('blog_categories', 'blogs.category_id', '=', 'blog_categories.id')->join('users', 'blogs.author_id', '=', 'users.id')->select('blogs.*', 'blog_categories.name as category_name', 'users.name as author_name')->orderBy('created_at', 'desc')->skip(0)->take(3)->get();

        foreach ($blogs as $key => $blog) {
            $date = Carbon::parse($blog->created_at)->diffForHumans();
            $blogs[$key]->diff_date = $date;
        }

        $specialties = Specialty::all();

        return view('user.home', compact('doctors', 'blogs', 'specialties'));
    }

    public function thanks()
    {
        return view('user.thanks-you');
    }

    public function changeLanguage(string $language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }
}
