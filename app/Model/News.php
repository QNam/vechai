<?php

namespace App\Model;

use App\Model\BaseModel;

class News extends BaseModel
{
    public $table       = "news";
    public $primayKey   = "id";
    public $incrementing = true;
    public $timestamps   = true;
    protected $dateFormat = 'U';

    function __construct() {
        parent::__construct();
    }

    public function getImgLinkAttribute() {
        return asset($this->img);
    }
    
    public function getUpdatedAtFormatAttribute() {
        if(!$this->updated_at) return '';
        return $this->updated_at->format('d-m-Y h:i:s');
    }

    public function getCreatedAtFormatAttribute() {
        if(!$this->created_at) return '';
        return $this->created_at->format('d-m-Y h:i:s');
    }

    public function getLinkAttribute() {
        return route('news.detail', [ 'slug' => $this->slug, 'id' => $this->id ]);
    }

    public function getSlugAttribute() {
        return str_slug($this->title, "-");
    }

    public function getSeoDataAttribute() {
        if (empty($this->seo)) {
			return [
				'meta_title' => '',
				'meta_desc' => '',
				'meta_keyword' => '',
			];
		} else {
			return json_decode($this->seo, true);
		}
    }

    public function getNewses($filter = []) {
        $model = $this::where('lang', $this->lang);

        if( isset($filter['status']) ) {
            $model = $model->where('status', $filter['status']);
        }

        if( isset($filter['id']) ) {
            $model = $model->where('news.id', $filter['id']);
        }
        return $model;
    }

    public function removeNews($id) {
        return $this->where('id', $id)->delete();
    }
}
