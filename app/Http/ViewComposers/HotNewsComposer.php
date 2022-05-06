<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\Model\News;

 class HotNewsComposer
 {
     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
        $data = News::where('status', 1)->where('is_hot', 1)->orderBy('updated_at', 'desc')->limit(10)->get();

        $view->with('data', $data);
     }
 }
