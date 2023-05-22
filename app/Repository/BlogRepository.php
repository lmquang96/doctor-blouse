<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\Blog;

use App\Models\Comment;

class BlogRepository {
    public function getAllBlog()
    {
        $blogs = DB::table('blogs')->join('blog_categories', 'blogs.category_id', '=', 'blog_categories.id')->join('users', 'blogs.author_id', '=', 'users.id')->select('blogs.*', 'blog_categories.name as category_name', 'users.name as author_name')->latest()->get();

        foreach ($blogs as $key => $blog) {
            $date = Carbon::parse($blog->created_at)->diffForHumans();
            $blogs[$key]->diff_date = $date;
        }

        return $blogs;
    }

    public function getAllCategoryCount()
    {
        $categories = DB::table('blogs')->join('blog_categories', 'blogs.category_id', '=', 'blog_categories.id')->select('blog_categories.name', 'blog_categories.slug' ,DB::raw('count(blogs.id) as count'))->groupBy('blog_categories.name', 'blog_categories.slug')->get();

        return $categories;
    }

    public function getBlogBySlug(string $slug)
    {
        $blog = DB::table('blogs')->join('blog_categories', 'blogs.category_id', '=', 'blog_categories.id')->join('users', 'blogs.author_id', '=', 'users.id')->where('blogs.slug', '=', $slug)->select('blogs.*', 'blog_categories.name as category_name', 'users.name as author_name')->first();

        $blog->created_date_format = Carbon::parse($blog->created_at)->toFormattedDateString();

        $blog->arrTags = explode(',', $blog->tags);

        $commentCount = Comment::where('blog_id', '=', $blog->id)->select(DB::raw('count(*) as count'))->value('count');

        $blog->commentCount = $commentCount;

        return $blog;
    }

    public function getBlogByTag(string $tag)
    {
        $blogs = DB::table('blogs')->join('blog_categories', 'blogs.category_id', '=', 'blog_categories.id')->join('users', 'blogs.author_id', '=', 'users.id')->where('tags', 'like', '%' . $tag . '%')->select('blogs.*', 'blog_categories.name as category_name', 'users.name as author_name')->latest()->get();

        $tagBlogs = [];

        foreach ($blogs as $key => $blog) {
            $date = Carbon::parse($blog->created_at)->diffForHumans();
            $blogs[$key]->diff_date = $date;

            $tags = explode(',', $blog->tags);

            //get exactly blog by tag

            if (in_array($tag, $tags)) {
                $tagBlogs[] = $blog;
            }
        }

        $blogs = $tagBlogs;

        return $blogs;
    }

    public function getBlogBySearch(string $searchString)
    {
        $blogs = DB::table('blogs')->join('blog_categories', 'blogs.category_id', '=', 'blog_categories.id')->join('users', 'blogs.author_id', '=', 'users.id')->whereRaw('LOWER(blogs.name) LIKE ?', '%' . $searchString . '%')->select('blogs.*', 'blog_categories.name as category_name', 'users.name as author_name')->orderBy('created_at', 'desc')->get();

        foreach ($blogs as $key => $blog) {
            $date = Carbon::parse($blog->created_at)->diffForHumans();
            $blogs[$key]->diff_date = $date;
        }

        return $blogs;
    }

    public function getTags()
    {
        $tagList = [];

        $blogs = Blog::select('tags')->get();

        foreach ($blogs as $key => $blog) {
            $tags = explode(',', $blog->tags);
            $tagList = array_merge($tagList, $tags);
        }

        $tagList = array_unique($tagList);

        return $tagList;
    }

    public function getRecentBlogs()
    {
        $recentBlog = DB::table('blogs')->join('users', 'blogs.author_id', '=', 'users.id')->join('comments', 'blogs.id', '=', 'comments.blog_id')->select('blogs.name', 'blogs.image', 'blogs.slug', 'blogs.created_at', 'users.name as author_name', DB::raw('count(comments.id) as comments_count'))->groupBy('blogs.name', 'blogs.image', 'blogs.slug', 'blogs.created_at', 'users.name')->orderBy('created_at', 'desc')->skip(0)->take(3)->get();

        foreach ($recentBlog as $key => $recent) {
            $recentBlog[$key]->created_date_format = Carbon::parse($recent->created_at)->toFormattedDateString();
        }

        return $recentBlog;
    }

    public function getBlogByCategory(string $slug)
    {
        $blogs = DB::table('blogs')->join('blog_categories', 'blogs.category_id', '=', 'blog_categories.id')->join('users', 'blogs.author_id', '=', 'users.id')->where('blog_categories.slug', '=', $slug)->select('blogs.*', 'blog_categories.name as category_name', 'users.name as author_name')->orderBy('created_at', 'desc')->get();

        foreach ($blogs as $key => $blog) {
            $date = Carbon::parse($blog->created_at)->diffForHumans();
            $blogs[$key]->diff_date = $date;
        }

        return $blogs;
    }

    public function getBlogByAuthor(string $name)
    {
        $blogs = DB::table('blogs')->join('blog_categories', 'blogs.category_id', '=', 'blog_categories.id')->join('users', 'blogs.author_id', '=', 'users.id')->where('users.name', '=', $name)->select('blogs.*', 'blog_categories.name as category_name', 'users.name as author_name')->orderBy('created_at', 'desc')->get();

        foreach ($blogs as $key => $blog) {
            $date = Carbon::parse($blog->created_at)->diffForHumans();
            $blogs[$key]->diff_date = $date;
        }

        return $blogs;
    }

    public function incrementBlogView(string $slug)
    {
        Blog::where('slug', '=', $slug)->increment('views');
    }

    public function getComments(string $blogId)
    {
        $comments = Comment::where('blog_id', $blogId)->latest()->get();

        foreach ($comments as $key => $comment) {
            $date = Carbon::parse($comment->created_at)->diffForHumans();
            $comments[$key]->diff_date = $date;
        }

        return $comments;
    }
}