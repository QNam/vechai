<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntroController extends Controller
{
    public function index() {
        $header = [
            'meta_title' => "Startup công nghệ  số 1 tại Việt Nam cung cấp Giải pháp phần mềm tổng thể cho xe khách | AN VUI",
        ];

        $this->setHeader($header);

        return view('intro.index');
    }
}
