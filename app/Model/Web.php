<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Services\UploadService;

class Web extends BaseModel
{
    public $table       = "web";
    public $primayKey   = "id";
    public $incrementing = true;
    public $timestamps   = true;
    protected $dateFormat = 'U';
    public static $socialsAllow = [
        ['key' => 'facebook', 'value' => 'Facebook'],
        ['key' => 'youtube', 'value' => 'Youtube'],
    ];
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'hotline',
        'map',
        'meta_title',
        'meta_desc',
        'meta_keyword',
        'short_intro',
        'addresses',
        'socials',
        'logo_bottom',
        'logo_top',
        'favicon',
        'default_facebook_img',
        'banner_ad_link',
        'banner_ad',
    ];

    function __construct() {
        parent::__construct();
    }

    public function getSeoAttribute() {
        return [
            'meta_title' => $this->meta_title,
            'meta_desc' => $this->meta_desc,
            'meta_keyword' => $this->meta_keyword,
        ];
    }

    public function getFacebookAttribute() {
        $socials = $this->socialData;
        $res = null;

        foreach ($socials as $key => $value) {
            if ($value['key'] == 'facebook') {
                $res = $value;
                break;
            }
        }

        return $res;
    }

    public function getAddressDataAttribute() {
        try {
            return json_decode($this->addresses, true);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function getSocialDataAttribute() {
        try {
            return json_decode($this->socials, true);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function getBannerAdImgAttribute() {
        return asset($this->banner_ad);
    }

    public function getFaviconImgAttribute() {
        return asset($this->favicon);
    }

    public static function createOrUpdateWeb($request) {
        $web = Web::first();

        $params = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'hotline' => $request->hotline,
            'map' => $request->map,
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_keyword' => $request->meta_keyword,
            'short_intro' => $request->short_intro,
            'banner_ad_link' => $request->banner_ad_link,
            'banner_ad_right_link' => $request->banner_ad_right_link,
        ];

        if($request->banner_ad) {
            $uploadService = new UploadService();
            $dataUpload = [
                'name' => str_slug('banner_ad' . time(), "-") . "." . $request->banner_ad->getClientOriginalExtension(),
                'realPath' => $request->banner_ad->getRealPath()
            ];
            $img = $uploadService->uploadFromFile($dataUpload);
            $params['banner_ad'] = $img;
        }

        if($request->banner_ad_right) {
            $uploadService = new UploadService();
            $dataUpload = [
                'name' => str_slug('banner_ad_right' . time(), "-") . "." . $request->banner_ad_right->getClientOriginalExtension(),
                'realPath' => $request->banner_ad_right->getRealPath()
            ];
            $img = $uploadService->uploadFromFile($dataUpload);
            $params['banner_ad_right'] = $img;
        }

        if($request->logo_top) {
            $uploadService = new UploadService();
            $dataUpload = [
                'name' => str_slug('logo_top' . time(), "-") . "." . $request->logo_top->getClientOriginalExtension(),
                'realPath' => $request->logo_top->getRealPath()
            ];
            $img = $uploadService->uploadFromFile($dataUpload);
            $params['logo_top'] = $img;
        }

        if($request->logo_bottom) {
            $uploadService = new UploadService();
            $dataUpload = [
                'name' => str_slug('logo_bottom' . time(), "-") . "." . $request->logo_bottom->getClientOriginalExtension(),
                'realPath' => $request->logo_bottom->getRealPath()
            ];
            $img = $uploadService->uploadFromFile($dataUpload);
            $params['logo_bottom'] = $img;
        }

        if($request->favicon) {
            $uploadService = new UploadService();
            $dataUpload = [
                'name' => str_slug('favicon' . time(), "-") . "." . $request->favicon->getClientOriginalExtension(),
                'realPath' => $request->favicon->getRealPath()
            ];
            $img = $uploadService->uploadFromFile($dataUpload);
            $params['favicon'] = $img;
        }

        if($request->default_facebook_img) {
            $uploadService = new UploadService();
            $dataUpload = [
                'name' => str_slug('default_facebook' . time(), "-") . "." . $request->default_facebook_img->getClientOriginalExtension(),
                'realPath' => $request->default_facebook_img->getRealPath()
            ];
            $img = $uploadService->uploadFromFile($dataUpload);
            $params['default_facebook_img'] = $img;
        }

        $addresses = [];
		foreach ($request->addresses['value'] as $key => $value) {
			$tmp = [ 'key' => $request->addresses['key'][$key], 'value' => $value ];

			array_push($addresses,$tmp);
		}
		
		foreach ($addresses as $key => $value) {
			if(trim($value['key']) == "" && trim($value['value']) == "" ) {
				unset($addresses[$key]);
			}
		}

		if( !empty($addresses) ) {
			$params['addresses'] = json_encode($addresses);	
		} else {
			$params['addresses'] = "";
		}


        $socials = [];
		foreach ($request->socials['key'] as $key => $value) {
			$tmp = [ 'key' => $value, 'value' => $request->socials['value'][$key] ];

			array_push($socials,$tmp);
		}

		foreach ($socials as $key => $value) {
		
			if( trim($value['key']) == "" || trim($value['value']) == "" ) {
				unset($socials[$key]);
			}
		}

		if( !empty($socials) ) {
			$params['socials'] = json_encode($socials); 
		} else {
			$params['socials'] = "";
		}

        if(!$web) {
            return Web::insert($params);
        } else {
            return Web::where('id', $web->id)->update($params);
        }
    }
}
