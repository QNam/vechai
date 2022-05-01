<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UploadService;
use App\Model\Menu;

class MenuController extends Controller
{
    public function index(Request $request) {
        $data = [];

        $data['menu_top'] = Menu::createTreeMenu(
            Menu::where('position', 1)->get()
        );
        $data['menu_bottom'] = Menu::createTreeMenu(
            Menu::where('position', 0)->get()
        );
        $parentMenu = Menu::where('parent_id', 0)->get();
        return view('admin.menu.index', ['data' => $data, 'parentMenu' => $parentMenu]);
    }

    public function store(Request $request) {
        $params = [
            'name' => $request->name,
            'position' => $request->position,
            'link' => $request->link,
            'sort' => $request->sort ? $request->sort : 0,
            'status' => $request->status ? $request->status : 0,
            'parent_id' => $request->parent_id ? $request->parent_id : 0,
        ];

        try {
            if($request->id) {
                Menu::where('id', $request->id)->update($params);
            } else {
                $params['created_at'] = time();
                Menu::insert($params);
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
        try {
            $res = Menu::where('parent_id', $request->id)->orWhere('id', $request->id)->delete();
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

    public function ajaxToggleStatus(Request $request) {
		if( !in_array($request->field, ['status', 'title']) ) {
			return response()->json([
                'status' => false,
                'msg' => "Có lỗi xảy ra vui lòng thử lại sau",
            ]);
		}

		$status = Menu::where('id', $request->id)->update([ $request->field => $request->value ]);

		$res['status'] = $status;

		if($status) {
			$res['msg'] = "";
		} else {
			$res['msg'] = "Có lỗi xảy ra vui lòng thử lại sau";
		}

        return response()->json($res);
    }
}
