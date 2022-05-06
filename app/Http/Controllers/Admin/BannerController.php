<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UploadService;
use Illuminate\Http\Request;
use App\Model\Banner;

class BannerController extends Controller
{

    public function index() {
        $data = Banner::get();

        return view('admin.banner.index', ['data' => $data]); 
    }

    public function ajaxStore(Request $request) {
        $params = [];

        if($request->img) {
            $uploadService = new UploadService();
            $dataUpload = [
                'name' => $request->img->getClientOriginalName(),
                'realPath' => $request->img->getRealPath()
            ];
            $img = $uploadService->uploadFromFile($dataUpload);
            $params['url'] = $img;
        }

        try {
            $params['created_at'] = time();
            $bannerCreated = Banner::insert($params);

            if($bannerCreated) {
                $res = [
                    'status' => true,
                    'msg' => 'Upload thành công!',
                    'data' => [
                        // 'id' => $bannerCreated,
                        'url' => $params['url'],
                    ],
                ];
            } else {
                $res = [
                    'status' => false,
                    'msg' => 'Upload thất bại!' . $th->getMessage(),
                ];
            }

        } catch (\Throwable $th) {
            $res = [
				'status' => false,
				'msg' => 'Upload thất bại!' . $th->getMessage(),
			];
        }
        
        return response()->json($res);
    }


    public function ajaxRemove(Request $request) {
        if(!$request->id) {
            $res = [
                'status' => false,
                'msg' => 'Xóa thất bại !'
            ];

            return response()->json($res);
        }
        try {
            Banner::where('id', $request->id)->delete();

            $res = [
                'status' => true,
                'msg' => 'Xóa thành công !'
            ];

        } catch (\Throwable $th) {
            $res = [
                'status' => false,
                'msg' => 'Xóa thất bại !'
            ];
        }
        
        return response()->json($res);
    }
}
