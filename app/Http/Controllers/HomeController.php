<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\News;

class HomeController extends Controller
{
    public function index() {
        $data = [];
        $data['news_hot']['first'] = News::where('status', 1)->orderBy('updated_at', 'DESC')->first();
        $data['news_hot']['group1'] = News::where('status', 1)->orderBy('updated_at', 'DESC')->offset(2)->limit(5)->get();
        $data['news_hot']['group2'] = News::where('status', 1)->orderBy('updated_at', 'DESC')->offset(7)->limit(16)->get();

        return view('home.index', ['data' => $data]);
    }

    
    public function lang($lang) {
        session(['locale' => $lang]);

        return redirect()->back();
    }
}
