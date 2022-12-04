<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Http\Requests\CategoryPostRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::simplePaginate(15);
        return view("admin.category.index")
                    ->with(compact("categories"));
    }
    public function create(Request $request) {
        return view("admin.category.add");
    }
    public function store(Request $request, CategoryPostRequest $req) {
        $validation = $req->validated();
        Category::create([
            "category" => $request->category,
            "slug" => $request->slug,
            "counts" => 0
        ]);
        return redirect()->back();
    }
    public function delete($id) {
        Blog::where("categories", "regexp", $id)->delete();
        Category::where("id", $id)->delete();
        return redirect()->back();
    }
    public function edit($slug) {
        $category = Category::where("slug", $slug)->first();
        return view("admin.category.edit")
                ->with(compact("category"));
    }
    public function update(Request $request, $slug, CategoryPostRequest $req) {
        $validation = $req->validated();
        Category::where("slug", $slug)->update([
            "category" => $request->category,
            "slug" => $request->slug,
            "counts" => 0
        ]);
        return redirect("admin/category");
    }
    public function search(Request $request) {
        $keyword = $request->input("search");
        $categories = Category::where("category", "like", "%" . $keyword . "%")->paginate(15);
        return view("admin.category.index")
                    ->with(compact("categories"));
    }
}
