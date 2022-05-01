<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\News as NewsModel;
use App\Services\UploadService;

class NewsController extends Controller
{
    private $filter = [];

    function __construct() {

        $this->filter['pagination'] = 10;
    }


    public function index(Request $request) {
        $data = [];

        $newsModel = new NewsModel();

        $header = [
            'meta_title' => 'Chiêu mộ nhân sự cho Startup Công Nghệ với Sứ mệnh Số hoá ngành vận tải hành khách | AN VUI',
        ];

        
        // $this->setFilter($request->only(['title', 'pagination', 'id_view']));

        $data = $newsModel->getNewses(['status' => 1])->orderBy('created_at', 'DESC')->paginate($this->filter['pagination']);
        
        foreach($data as $key => &$value) {
            $value = $newsModel->createContentFormatter($value, 'news.detail' ,'d/m/Y');
        }

        $this->setHeader($header);

        return view("news.index")->with(['data' => $data]);
    }


    public function detail(Request $request)
    {

        $data = [];
        $newsModel = new NewsModel();

        $filter = [
            'id' => $request->id,
        ];
        $data = $newsModel->getNewses($filter)->firstOrFail();

        $header = [
            'meta_title' => empty($data['seo_data']['meta_title']) ? $data['title'] : $data['seo']['meta_title'],
            'meta_keyword' => $data['seo_data']['meta_keyword'],
            'meta_desc' => $data['seo_data']['meta_desc'],
            'img' => $data['img'],
        ];
        
        $this->setHeader($header);

        return view("news.details")->with([
            'data' => $data,
        ]);
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

}

