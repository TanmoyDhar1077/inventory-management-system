<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
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
}
