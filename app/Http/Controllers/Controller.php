<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setHeader($data) {
        
        $header['meta_title'] = !empty($data['meta_title']) ? $data['meta_title']  : config('HEADER')['meta_title'];
        $header['meta_desc'] = !empty($data['meta_desc']) ? $data['meta_desc']  : config('HEADER')['meta_desc'];
        $header['meta_keyword'] = !empty($data['meta_keyword']) ? $data['meta_keyword']  : config('HEADER')['meta_keyword'];
        $header['img'] = !empty($data['img']) ? $data['img']  : "https://anvui.vn/upload/web/2020/11/03/1604385406_the-nao-la-mot-phan-mem-quan-ly-nha-xe-tot.png";
        
        Config::set('HEADER', $header);
        View::share('HEADER', $header );
    }

    public function createSeoArrayFromRequest($request) {
        $seo = [
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_keyword' => $request->meta_keyword,
            'raw' => array_filter($request->seo_raw),
            'tag' => $request->meta_tag,
        ];

        $tagAsArray = array_filter( explode(",", $request->meta_tag) );
        $tagAsString = ',' . implode(",", $tagAsArray) . ',';

        return [
            'seo' => $seo,
            'tagAsString' => $tagAsString, 
            'tagAsArray' => $tagAsArray, 
        ];
    }


    // public function setHeader($header)
    // {
    //     $webHeaderDTO = new WebHeaderDTO($header);

    //     Config::set('HEADER', $webHeaderDTO->toArray());
    //     View::share('HEADER', $webHeaderDTO->toArray());

    //     return $webHeaderDTO->toArray();
    // }


    public function createSeoData($request) {
        return [
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_keyword' => $request->meta_keyword,
            'raw' => array_filter($request->seo_raw),
        ];
    }
}
