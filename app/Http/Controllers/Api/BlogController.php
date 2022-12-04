<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blogs() {
        $blogs = Blog::paginate(15);
        return $blogs;
    }
}
