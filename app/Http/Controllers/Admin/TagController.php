<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Tag;
use App\Model\NewsTag;

class TagController extends Controller
{
    private $filter = [];

    function __construct() {

        $this->filter['pagination'] = 10;
    }

    public function index() {
        $data = Tag::orderBy('updated_at', 'DESC')->paginate($this->filter['pagination']);

        return view('admin.tag.index', ['data' => $data]); 
    }

    public function create(Request $request) {
        $data = null;

        if($request->id) {
            $data = Tag::where('id', $request->id)->firstOrFail();
        }

        return view('admin.tag.create', ['data' => $data]); 
    }

    public function store(Request $request) {
        $params = [
            'name' => $request->name,
        ];

        try {
            if($request->id) {
                Tag::where('id', $request->id)->update($params);
            } else {
                $params['created_at'] = time();
                $params['updated_at'] = time();
                Tag::insert($params);
            }

            $request->session()->flash('GLOBAL_STATUS', 'SUCCESS');
            $request->session()->flash('GLOBAL_MSG', 'Lưu thành công !');
            return redirect()->back();
        } catch (\Throwable $th) {
            $request->session()->flash('GLOBAL_STATUS', 'ERROR');
            $request->session()->flash('GLOBAL_MSG', "Có lỗi xảy ra vui lòng thử  lại sau !" . $th->getMessage());
            return redirect()->back();
        }
    }

    public function remove(Request $request) {
        $tag = Tag::where('id', $request->id)->firstOrFail();

        try {
            NewsTag::where('tag_id', $request->id)->update(['tag_id' => $tag->id]);
            $res = Tag::where('id', $request->id)->delete();
            if($res) {
				$request->session()->flash('GLOBAL_STATUS', 'SUCCESS');
                $request->session()->flash('GLOBAL_MSG', 'Xoá thành công !');
			} else {
				$request->session()->flash('GLOBAL_STATUS', 'ERROR');
                $request->session()->flash('GLOBAL_MSG', "Có lỗi xảy ra vui lòng thử  lại sau !");
			}
        } catch (\Throwable $th) {
            //throw $th;
            $request->session()->flash('GLOBAL_STATUS', 'ERROR');
            $request->session()->flash('GLOBAL_MSG', "Có lỗi xảy ra vui lòng thử  lại sau !" . $th->getMessage());
        }
		
		return redirect()->back();
    }
}
