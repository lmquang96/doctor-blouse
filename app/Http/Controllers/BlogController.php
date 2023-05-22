<?php

namespace App\Http\Controllers;

use App\Models\Blog;

use Illuminate\Http\Request;

use App\Models\BlogCategory;

use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = DB::table('blogs')->join('blog_categories', 'blogs.category_id', '=', 'blog_categories.id')->join('users', 'blogs.author_id', '=', 'users.id')->select('blogs.*', 'blog_categories.name as category_name', 'users.name as author_name')->get();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $imageName = time().'.'.$data['image']->getClientoriginalExtension();
        $data['image']->move('images/blogs', $imageName);
        $data['image'] = $imageName;
        $data['author_id'] = auth()->user()->id;
        try {
            Blog::create($data);
            return redirect()->route('blog.index')->with('message', 'Create successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $blog = Blog::find($id);

            if (empty($blog)) {
                return response('Blog not found', 404)
                ->header('Content-Type', 'text/plain');
            }

            $categories = BlogCategory::all();

            return view('admin.blog.edit', compact('blog', 'categories'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $data['slug'] = str_slug($request->name) . '-' . $id;
        
        try {
            $blog = Blog::find($id);
            
            if (empty($blog)) {
                return response('Blog not found', 404)
                ->header('Content-Type', 'text/plain');
            }

            $blog->update($data);

            return redirect()->route('blog.index')->with('message', 'Update successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
