<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\NewsCategory;

class CategoryController extends Controller
{
    private $filter = [];

    function __construct() {

        $this->filter['pagination'] = 10;
    }

    public function index() {
        $data = Category::orderBy('updated_at', 'DESC')->paginate($this->filter['pagination']);

        return view('admin.category.index', ['data' => $data]); 
    }

    public function create(Request $request) {
        $data = null;

        if($request->id) {
            $data = Category::where('id', $request->id)->firstOrFail();
        }

        return view('admin.category.create', ['data' => $data]); 
    }

    public function ajaxUpdateStatus(Request $request) {
        if( !in_array($request->field, ['status', 'name']) ) {
			return response()->json([
                'status' => false,
                'msg' => "Có lỗi xảy ra vui lòng thử lại sau",
            ]);
		}

		$status = Category::where('id', $request->id)->update([ $request->field => $request->value ]);

		$res['status'] = $status;

		if($status) {
			$res['msg'] = "";
		} else {
			$res['msg'] = "Có lỗi xảy ra vui lòng thử lại sau";
		}

        return response()->json($res);
    }

    public function store(Request $request) {
        $params = [
            'name' => $request->name,
            'status' => 1,
            'is_home' => $request->is_home ? (int) $request->is_home : 0,
        ];

        try {
            if($request->id) {
                Category::where('id', $request->id)->update($params);
            } else {
                $params['created_at'] = time();
                Category::insert($params);
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
        $category = Category::where('id', $request->id)->firstOrFail();

        if($category->not_allow_delete) {
            $request->session()->flash('GLOBAL_STATUS', 'ERROR');
            $request->session()->flash('GLOBAL_MSG', "Không được xoá danh mục mặc định !");   
            return redirect()->back();
        }

        try {
            NewsCategory::where('category_id', $request->id)->update(['category_id' => $category->id]);
            $res = Category::where('id', $request->id)->delete();
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
