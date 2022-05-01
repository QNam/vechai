<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Web;

class DashBoardController extends Controller
{
    public function index() {
        $web = Web::first();
        
		if ($web) {
            $web['addresses'] = json_decode($web['addresses'],true);
            $web['socials'] = json_decode( $web['socials'],true );
            $web['seo'] = [
                'meta_title' => $web['meta_title'],
                'meta_desc' => $web['meta_desc'],
                'meta_keyword' => $web['meta_keyword'],
            ];
        }
        $socialsAllow = Web::$socialsAllow;

        return view('admin.dashboard.index', ['data' => $web, 'socialsAllow' => $socialsAllow]); 
    }
}
