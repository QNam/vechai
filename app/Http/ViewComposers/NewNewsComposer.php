<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\Model\News;

 class NewNewsComposer
 {
     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
        $data = News::where('status', 1)->orderBy('updated_at', 'desc')->limit(5)->get();

        $view->with('data', $data);
     }
 }
