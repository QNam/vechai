<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Services\UploadService;

class Category extends BaseModel
{
    public $table       = "category";
    public $primayKey   = "id";
    public $incrementing = true;
    public $timestamps   = true;
    protected $dateFormat = 'U';

    function __construct() {
        parent::__construct();
    }

    public function getLinkAttribute() {
        return route('news.category', [ 'slug' => str_slug($this->name), 'id' => $this->id ]);
    }

    public function newses() {
		return $this->belongsToMany(News::class, 'news_category');
	}

}
