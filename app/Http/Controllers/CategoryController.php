<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\News;
use App\Model\Category;

class CategoryController extends Controller
{
    public function index() {
        $data = [];
        $data = Category::get();
        return view('category.index', ['data' => $data]);
    }
}
