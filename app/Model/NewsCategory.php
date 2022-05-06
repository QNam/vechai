<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Services\UploadService;

class NewsCategory extends BaseModel
{
    public $table       = "news_category";
    public $primayKey   = "id";
    public $incrementing = true;
    public $timestamps   = true;
    protected $dateFormat = 'U';

    function __construct() {
        parent::__construct();
    }

    public static function createMulti($listCateId, $newsId) {
        if(!$listCateId) return;
        NewsCategory::where('news_id', $newsId)->delete();

		$tmp = [];

		foreach ($listCateId as $key => $value) {
			array_push($tmp, [
				'news_id' => $newsId,
				'category_id' => $value,
			]);
		}
		return NewsCategory::insert($tmp);
	}

}
