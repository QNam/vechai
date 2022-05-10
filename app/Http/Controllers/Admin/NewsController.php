<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\News as NewsModel;
use Illuminate\Http\Request;
use App\Services\UploadService;
use App\Model\Category;
use App\Model\NewsCategory;
use App\Model\Tag;
use App\Model\NewsTag;

class NewsController extends Controller
{
    private $filter = [];

    function __construct() {

        $this->filter['pagination'] = 10;
    }

    public function index(Request $request) {
        $newsModel = new NewsModel();

        $data = $newsModel->getNewses()->orderBy('updated_at', 'DESC')->paginate($this->filter['pagination']);

        return view('admin.news.index', ['data' => $data]);
    }


    public function create(Request $request) {
        $data = null;
        $categoryIds = [];
        $tagIds = [];
        $newsModel = new NewsModel();
        $categories = Category::get();
        $tags = Tag::get();

        if($request->id) {
            $data = $newsModel->getNewses(['id' => $request->id])->with('categories')->with('tags')->firstOrFail();
            foreach ($data->categories as $key => $value) {
                array_push($categoryIds, $value->id);
            }

            foreach ($data->tags as $key => $value) {
                array_push($tagIds, $value->id);
            }
        }

        return view('admin.news.create', ['data' => $data, 'categories' => $categories, 'tags' => $tags, 'categoryIds' => $categoryIds, 'tagIds' => $tagIds]); 
    }

    public function ajaxUpdateStatus(Request $request) {
        $newsModel = new NewsModel();

		$id 	= $request->id;
		$field 	= $request->field;
		$value  = $request->value;

		if( !in_array($field, ['status', 'title']) ) {
			exit();
		}

		$status = $newsModel->where('id', $id)->update([$field => $value]);

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
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status == 1 ? 1 : 0,
            'is_hot' => $request->is_hot == 1 ? 1 : 0,
            'seo' => json_encode([
                'meta_title' => $request->meta_title, 
                'meta_desc' => $request->meta_desc, 
                'meta_keyword' => $request->meta_keyword,
            ]),
            'lang' => 'vi',
        ];

        if($request->img) {
            $uploadService = new UploadService();
            $dataUpload = [
                'name' => str_slug($params['title'], "-") . "." . $request->img->getClientOriginalExtension(),
                'realPath' => $request->img->getRealPath()
            ];
            $img = $uploadService->uploadFromFile($dataUpload);
            $params['img'] = $img;
        }

        if(!$request->id) {
            $params['created_at'] = time();
            $params['updated_at'] = time();
            if($newsId = NewsModel::insertGetId($params)) {
                NewsCategory::createMulti($request->categories, $newsId);
                NewsTag::createMulti($request->tags, $newsId);
                $request->session()->flash('GLOBAL_STATUS', 'SUCCESS');
                $request->session()->flash('GLOBAL_MSG', 'Đăng bài viết thành công !');
                return redirect()->back();
            } 
        } else {
            NewsCategory::createMulti($request->categories, $request->id);
            NewsTag::createMulti($request->tags, $request->id);
            $params['updated_at'] = time();
            if(NewsModel::where('id', $request->id)->update($params)) {
                $request->session()->flash('GLOBAL_STATUS', 'SUCCESS');
                $request->session()->flash('GLOBAL_MSG', 'Cập nhật bài viết thành công !');
                return redirect()->back();
            }
        }

        $request->session()->flash('GLOBAL_STATUS', 'ERROR');
        $request->session()->flash('GLOBAL_MSG', 'Có lỗi xảy ra vui lòng thử  lại sau !');
        return redirect()->back();
    }

    public function remove(Request $request) {
        $newsModel = new NewsModel();
        
        $remove = $newsModel->removeNews($request->id);

        if($remove){
            $request->session()->flash('GLOBAL_STATUS', 'SUCCESS');
            $request->session()->flash('GLOBAL_MSG', 'Xóa bài viết thành công !');
            return redirect()->back();
        } else {
            $request->session()->flash('GLOBAL_STATUS', 'ERROR');
            $request->session()->flash('GLOBAL_MSG', 'Có lỗi xảy ra! Vùi lòng thử lại sau.');
            return redirect()->back();
        }
    }
}
