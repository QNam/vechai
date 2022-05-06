<?php

namespace App\Model;

use App\Model\BaseModel;

class Banner extends BaseModel
{
    public $table       = "banner";
    public $primayKey   = "id";
    public $incrementing = true;
    public $timestamps   = true;
    protected $dateFormat = 'U';

    function __construct() {
        parent::__construct();
    }

    public function getLinkAttribute() {
        return asset($this->url);
    }
}
