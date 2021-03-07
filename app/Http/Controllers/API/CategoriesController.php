<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index (){
        return response()->json([
            'categories' =>Category::all()
        ], 200);
    }
}
