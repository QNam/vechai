<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Services\UploadService;

class NewsTag extends BaseModel
{
    public $table       = "news_tag";
    public $primayKey   = "id";
    public $incrementing = true;
    public $timestamps   = true;
    protected $dateFormat = 'U';

    function __construct() {
        parent::__construct();
    }

    public static function createMulti($listTagId, $newsId) {
        NewsTag::where('news_id', $newsId)->delete();
        if(!$listTagId) return;

		$tmp = [];

		foreach ($listTagId as $key => $value) {
			array_push($tmp, [
				'news_id' => $newsId,
				'tag_id' => $value,
			]);
		}
		return NewsTag::insert($tmp);
	}

}