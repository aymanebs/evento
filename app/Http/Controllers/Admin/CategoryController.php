<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Event;
use App\Models\Organiser;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $totalUsers=User::count();
        $totalEvents=Event::count();
        $totalOrganisers=Organiser::count();
        $totalCategories=Category::count();
        $categories=Category::all();
        return view('admin.categories',compact('categories','totalUsers','totalEvents','totalOrganisers','totalCategories'));
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
