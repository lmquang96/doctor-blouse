<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Repository\BlogRepository;

class BlogUserController extends Controller
{
    private $blogRepository;

    public function __construct(BlogRepository $blogRepository = null)
    {
        $this->blogRepository = ($blogRepository === null) ? new BlogRepository : $blogRepository;
    }

    public function index()
    {
        try {
            $blogs = $this->blogRepository->getAllBlog();

            $categories = $this->blogRepository->getAllCategoryCount();

            $tagList = $this->blogRepository->getTags();

            $recentBlog = $this->blogRepository->getRecentBlogs();

            $breadcrumbTitle = "News";

            return view('user.blog', compact('blogs', 'categories', 'tagList', 'breadcrumbTitle', 'recentBlog'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function detail(string $slug)
    {
        try {
            $blog = $this->blogRepository->getBlogBySlug($slug);

            $categories = $this->blogRepository->getAllCategoryCount();

            $tagList = $this->blogRepository->getTags();

            $recentBlog = $this->blogRepository->getRecentBlogs();

            $this->blogRepository->incrementBlogView($slug);

            $comments = $this->blogRepository->getComments($blog->id);

            return view('user.blog-detail', compact('blog', 'categories', 'tagList', 'recentBlog', 'comments'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function tag(string $tag)
    {
        try {
            $blogs = $this->blogRepository->getBlogByTag($tag);

            $categories = $this->blogRepository->getAllCategoryCount();

            $tagList = $this->blogRepository->getTags();

            $recentBlog = $this->blogRepository->getRecentBlogs();

            $breadcrumbTitle = "Tag: ". $tag;

            return view('user.blog', compact('blogs', 'categories', 'tagList', 'breadcrumbTitle', 'recentBlog'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function search(Request $request)
    {
        try {
            $originalString = $request->q;

            $searchString = Str::lower(trim($originalString));

            $blogs = $this->blogRepository->getBlogBySearch($searchString);

            $categories = $this->blogRepository->getAllCategoryCount();
    
            $tagList = $this->blogRepository->getTags();
    
            $recentBlog = $this->blogRepository->getRecentBlogs();
    
            $breadcrumbTitle = "Search: " . $request->q;
    
            return view('user.blog', compact('blogs', 'categories', 'tagList', 'breadcrumbTitle', 'recentBlog', 'originalString'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function category(string $slug)
    {
        try {
            $blogs = $this->blogRepository->getBlogByCategory($slug);

            $categories = $this->blogRepository->getAllCategoryCount();
        
            $tagList = $this->blogRepository->getTags();

            $recentBlog = $this->blogRepository->getRecentBlogs();

            $breadcrumbTitle = "Category: " . $blogs[0]->category_name;

            return view('user.blog', compact('blogs', 'categories', 'tagList', 'breadcrumbTitle', 'recentBlog'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function author(string $name)
    {
        try {
            $blogs = $this->blogRepository->getBlogByAuthor($name);

            $categories = $this->blogRepository->getAllCategoryCount();
        
            $tagList = $this->blogRepository->getTags();

            $recentBlog = $this->blogRepository->getRecentBlogs();

            $breadcrumbTitle = "Author: " . $name;

            return view('user.blog', compact('blogs', 'categories', 'tagList', 'breadcrumbTitle', 'recentBlog'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
