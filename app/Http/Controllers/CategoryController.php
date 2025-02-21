<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index():View
    {
        $categories = Category::latest()->get();
        return view('category.index', compact('categories'));
    }

    //Delete category
    public function delete($id):RedirectResponse
    {
        $category = Category::findOrfail($id);
        $category->delete();
        return redirect()->route('category.index');
    }

    //Create category
    public function create():View
    {
        return view('category.create');
    }

    // Store category
    public function store(Request $request):RedirectResponse
    {
        /* $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]); */

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('category.index');
    }

    // Edit category
    public function edit($id):View
    {
        $category = Category::findOrfail($id);
        return view('category.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, $id):RedirectResponse
    {
        $category = Category::findOrfail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->status = $request->status;
        $category->update();
        return redirect()->route('category.index');
    }
}
