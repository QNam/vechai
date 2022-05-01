<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public $lang = "vi";

    function __construct() {
        parent::__construct();
        // $this->lang = app()->getLocale() ?? "vi";
    }

    protected function _setModel($model, $filter) {

		if (isset($filter['limit'])) {
			$model->limit($filter['limit']);

			if (isset($filter['offset'])) {
				$model->offset($filter['offset']);
			}
		}

		if (isset($filter['select'])) {
			$model->select($filter['select']);
		}


		if (isset($filter['orderBy'])) {
			$operator = "DESC";

			if (isset($filter['orderBy']['1'])) $operator = $filter['orderBy']['1'];

			$model->orderBy($filter['orderBy']['0'], $operator);
		}


		return $model;
	}


	public function _createQueryBuilder($filter = []) {
		$model = $this;
		
		if( !empty($filter) ) {
			if (isset($filter['where'])) {
				$model = $model->where($filter['where']);
			}
	
			if (isset($filter['set'])) {
				$this->_setModel($model, $filter['set']);
			}
		}
		

		return $model;
	}


	public function createContentFormatter($item, $route = 'news.detail' ,$dateFormat = 'd-m-Y h:i:s') {
		// if (!empty($item->created_at)) {
		// 	$item->created_at_format = $item->created_at->format($dateFormat);
		// } else {
		// 	$item->created_at_format = "";
		// }

		// if (!empty($item->img)) {
		// 	$item->img = asset($item->img);
		// } else {
		// 	$item->img = "";
		// }

		// if (!empty($item->updated_at)) {
		// 	$item->updated_at_format = $item->updated_at->format($dateFormat);
		// } else {
		// 	$item->updated_at_format = "";
		// }

		// if (!empty($item->title)) {
		// 	$item->slug = str_slug($item->title, "-");
		// } else {
		// 	$item->slug = "";
		// }

		// if (empty($item->seo)) {
		// 	$item->seo = [
		// 		'meta_title' => '',
		// 		'meta_desc' => '',
		// 		'meta_keyword' => '',
		// 	];
		// } else {
		// 	$item->seo = json_decode($item->seo, true);
		// }

		// $item->link = route($route, [ 'slug' => $item->slug, 'id' => $item->id ]);

		return $item;
	}
}
