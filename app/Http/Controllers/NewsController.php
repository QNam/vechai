<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\News as NewsModel;
use App\Model\Category;
use App\Model\Tag;
use App\Services\UploadService;

class NewsController extends Controller
{
    private $filter = [];

    function __construct() {

        $this->filter['pagination'] = 10;
    }


    public function index(Request $request) {
        $data = [];

        // $this->setFilter($request->only(['title', 'pagination', 'id_view']));
        if($request->q) {
            $data = NewsModel::where('status', 1)->where('title', 'like', '%' . $request->q . '%')->orderBy('updated_at', 'DESC')->paginate($this->filter['pagination']);
        } else {
            $data = NewsModel::where('status', 1)->orderBy('updated_at', 'DESC')->paginate($this->filter['pagination']);
        }

        // $this->setHeader($header);

        return view("news.index")->with(['data' => $data]);
    }


    public function detail(Request $request)
    {

        $data = [];
        $newsModel = new NewsModel();

        $filter = [
            'id' => $request->id,
        ];
        $data = $newsModel->getNewses($filter)->with('tags')->with('categories')->firstOrFail();
        $header = [
            'meta_title' => empty($data['seo_data']['meta_title']) ? $data['title'] : $data['seo_data']['meta_title'],
            'meta_keyword' => $data['seo_data']['meta_keyword'],
            'meta_desc' => $data['seo_data']['meta_desc'],
            'img' => $data['img'],
        ];
        
        $this->setHeader($header);

        return view("news.details")->with([
            'data' => $data,
        ]);
    } 

    public function category(Request $request) {
        $data = [];
        $category = Category::findOrFail($request->id);

        $data = NewsModel::where('news_category.category_id', $request->id)
		->where('news.status', 1)
		->join('news_category', 'news_category.news_id', '=', 'news.id')
		->join('category', 'category.id', '=', 'news_category.category_id')
		->select('news.*')
		->orderBy('news.updated_at', 'DESC')
        ->paginate($this->filter['pagination']);


        return view("news.index")->with(['data' => $data, 'category' => $category]);
    }

    public function get(Request $request) {
        $data = [];

        $newsModel = new NewsModel();
        
        $offset = $request->limit * ($request->page - 1);
        
        if($request->id) {
            $data = $newsModel->getNewses(['id' => $request->id])->first();
            $data = $newsModel->createContentFormatter($data, 'news.detail' ,'d/m/Y');
        } else {
            $data = $newsModel->getNewses()->offset($offset)->paginate($request->limit);
            foreach($data as $key => &$value) {
                $value = $newsModel->createContentFormatter($value, 'news.detail' ,'d/m/Y');
            }
        }

        return response()->json($data);
    }

    public function tag(Request $request) {
        $data = [];
        $category = Tag::findOrFail($request->id);

        $data = NewsModel::where('news_tag.tag_id', $request->id)
		->where('news.status', 1)
		->join('news_tag', 'news_tag.news_id', '=', 'news.id')
		->join('tag', 'tag.id', '=', 'news_tag.tag_id')
		->select('news.*')
		->orderBy('news.updated_at', 'DESC')
        ->paginate($this->filter['pagination']);


        return view("news.index")->with(['data' => $data, 'category' => $category]);
    }
}

