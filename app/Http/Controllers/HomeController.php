<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\News;
use App\Model\Category;
use App\Model\Banner;

class HomeController extends Controller
{
    public function index() {
        $data = [];
        $data['news_hot']['first'] = News::where('status', 1)->where('is_hot', 0)->orderBy('updated_at', 'DESC')->first();
        $data['news_hot']['group1'] = News::where('status', 1)->where('is_hot', 0)->orderBy('updated_at', 'DESC')->offset(1)->limit(5)->get();
        $data['news_hot']['group2'] = News::where('status', 1)->where('is_hot', 1)->orderBy('updated_at', 'DESC')->limit(16)->get();
        $data['categories_home'] = Category::where('is_home', 1)->with('newses')->limit(6)->get();

        $data['banners'] = Banner::get();

        return view('home.index', ['data' => $data]);
    }

    
    public function lang($lang) {
        session(['locale' => $lang]);

        return redirect()->back();
    }
}
