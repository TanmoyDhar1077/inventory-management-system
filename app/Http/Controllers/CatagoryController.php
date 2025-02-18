<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function index()
    {
        $catagories = Catagory::latest() -> get();
        return view('catagory.index', compact('catagories'));
    }
}
