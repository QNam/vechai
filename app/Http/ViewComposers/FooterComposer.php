<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\Model\Menu;

 class FooterComposer
 {
     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
        $data = Menu::where('status', 1)->where('position', 0)->where('parent_id', 0)->get();

        $view->with('data', $data);
     }
 }
