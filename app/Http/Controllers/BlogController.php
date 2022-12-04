<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{   
    public function create() {
        $categories = Category::all();
        return view("admin.blogs.add")
                        ->with(compact("categories"));
    }
    public function admin_search(Request $request) {
        $query = $request->input("search");
        $blogs = $this->searchData($query, false);
        return view("admin.blogs.index")
                ->with(compact("blogs"));
    }
    public function store(Request $request, BlogPostRequest $req) {
        $validation = $req->validated();
        $file = $request->file("blog_img");
        $fileName = $file->getClientOriginalName() . time() . "." . $file->getClientOriginalExtension();
        // return $fileName;
        $file->move("uploads", $fileName);
        $title = $request->input("title");
        $slug = $request->input("slug");
        $categories = $request->input("categories");
        $description = $request->input("description");
        $keywords = $request->input("keywords");
        $user_id = $request->input("user_id");
        Blog::create([
            "title" => $title,
            "user_id" => 1,
            "description" => $description,
            "slug" => $slug,
            "categories" => $categories,
            "user_id" => $user_id,
            "keywords" => $keywords,
            "image" => $fileName,
            "video" => "null"
        ]);
        return redirect()->back();
    }
    public function index()
    {
        $blogs = Blog::where("status", 1)
                    ->with("comments")
                    ->with("user")
                    ->paginate(15);
        return view("home")
            ->with(compact("blogs"));
    }
    public function status($id) {
        $status = Blog::find($id)->status;
        Blog::where("id", $id)->update([
            "status" => !$status
        ]);
        return redirect()->back();
    }
    public function home() {
        $blogs = Blog::where("user_id", Auth::user()->id)->simplePaginate(15);
        return view("admin.blogs.index")
                ->with(compact("blogs"));
    }
    public function update($slug) {
        $blog = Blog::where("slug", $slug)->first();
        $categories = Category::all();
        return view("admin.blogs.edit")
                ->with(compact("blog", "categories"));
    }
    public function edit(Request $request, $id, BlogPostRequest $req) {
        $validation = $req->validated();
        Blog::where("id", $id)->update([
            "title" => $request->input("title"),
            "description" => $request->input("description"),
            "slug" => $request->input("slug"),
            "categories" => $request->input("categories"),
            "keywords" => $request->input("keywords"),
            "image" => "null",
            "video" => "null"
        ]);
        return redirect("/admin/blogs");
    }
    private function comments($comments) {
        $commentsCollection = [];
        foreach($comments as $comment) {
            if(is_null($comment->comment_id)) {
                $commentsCollection[$comment->id] = [$comment->id, $comment->name, $comment->comment, $comment->blog_id, $comment->comment_id, $comment->created_at];
            }
        }
        foreach($commentsCollection as $key => $comment) {
            $replies = [];
            foreach($comments as $reply) {
                if($reply->comment_id == $key) {
                    array_push($replies, $reply);
                }
            }
            $commentsCollection[$key]["replies"] = $replies;
        }
        return $commentsCollection;
    }
    public function blog($slug)
    {
        $blog = Blog::where("slug", $slug)->where("status", 1)->first();
        if(!$blog) abort(404);
        // dd([1, 2, 3]);
        $category = $blog->categories;
        // dd($category[0]);
        if(!$blog) abort(404);
        $relatedPosts = Blog::where("status", 1)
                            ->Related($category)
                            ->limit(3)
                            ->get();
        $commentsObject = Comment::where("blog_id", $blog->id)->where("status", 1)->get();
        $categories = explode(", ", $blog->categories);
        $categories = Category::whereIn("id", $categories)->get();
        $comments = $this->comments($commentsObject);
        return view("singleBlog")
            ->with(compact("blog", "categories", "comments", "relatedPosts"));
    }
    public function delete($id) {
        $blog = Blog::where("id", $id)->delete();
        return redirect()->back();
    }
    public function categorySearch($slug)
    {
        $category = Category::where("slug", $slug)->first();
        $id = $category->id;
        $blogs = Blog::where("status", 1)->whereRaw("categories REGEXP '" . $id . "'")->paginate();
        return view("home")
            ->with(compact("blogs"));
    }
    private function searchData($query, $flag = true) {
        if($flag)
            $blogs = Blog::where("title", "like", "%" . $query . "%")->where("status", 1)->paginate(15);
        else 
            $blogs = Blog::where("title", "like", "%" . $query . "%")->paginate(15);
            
        return $blogs;
    }
    public function search(Request $request) {
        $blogs = $this->searchData($request->input("query"));
        return view("home")
                ->with(compact("blogs"));
    }
    public function sample() {
        return view("test");
    }
}
