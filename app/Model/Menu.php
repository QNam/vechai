<?php

namespace App\Model;

use App\Model\BaseModel;

class Menu extends BaseModel
{
    public $table       = "menu";
    public $primayKey   = "id";
    protected $fillable = [
        'name',
        'position',
        'parent_id',
        'link',
        'sort',
        'status',
    ];
    public $incrementing = true;
    public $timestamps   = true;
    protected $dateFormat = 'U';

    function __construct() {
        parent::__construct();
    }

    public function getSubMenusAttribute() {
        return Menu::where('parent_id', $this->id)->get();
    }

    public static function createTreeMenu($data) {
        if(!$data) return [];
        $data = $data->toArray();
		foreach ($data as $key => $value) {
			$data['menu'.$value['id']] = $value;
			$data['menu'.$value['id']]['sub'] = [];
			unset($data[$key]);	
		}

		foreach ($data as $k => &$val) {
			if($val['parent_id'] != 0) {
				array_push($data['menu'.$val['parent_id'] ]['sub'], $val);
				unset($data[$k]);
			}
		}

		$res = [];
		foreach ($data as $menu) {
			$res[] = $menu;
		}

		return $res;
	}
}
