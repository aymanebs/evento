<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('admin.categories',compact('categories'));
    }

    public function store(CategoryRequest $request){
        Category::create($request->all());
        return redirect()->back();
    }

    public function update(CategoryRequest $request, Category $category){
        $category->update($request->all());
        return redirect()->back();
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->back();
    }
}
