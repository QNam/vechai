<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Web;
use App\Services\UploadService;

class WebController extends Controller
{
    public function store(Request $request) {
        try {
            Web::createOrUpdateWeb($request);

            $request->session()->flash('GLOBAL_STATUS', 'SUCCESS');
            $request->session()->flash('GLOBAL_MSG', 'Lưu thành công !');
            return redirect()->back();
        } catch (\Throwable $th) {
            $request->session()->flash('GLOBAL_STATUS', 'ERROR');
            $request->session()->flash('GLOBAL_MSG', "Có lỗi xảy ra vui lòng thử  lại sau ! " . $th->getMessage());
            return redirect()->back();
        }
    }
}
