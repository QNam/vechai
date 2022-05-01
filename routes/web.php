<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['web'])->group(function () {
        Route::get('/', 'HomeController@index')->name('home.index');
        Route::get('/lang/{lang}', "HomeController@lang")->name('lang');
        Route::get('/gioi-thieu', 'IntroController@index')->name('intro.index');
        Route::get('/tin-tuc', 'NewsController@index')->name('news.index');
        Route::get('/tin-tuc/{slug}-{id}.html', 'NewsController@detail')
                ->where('slug', '[a-zA-Z0-9-_]+')
                ->where('id', '[0-9]+')
                ->name('news.detail');

        Route::get('/{slug}-{id}.html', 'NewsController@detail')
                ->where('slug', '[a-zA-Z0-9-_]+')
                ->where('id', '[0-9]+')
                ->name('news.detail.old');

        Route::get('/tuyen-dung', 'HomeController@index')->name('recruit.index');

        Route::get('/tuyen-dung/{slug}-{id}.html', 'HomeController@index')
                ->where('slug', '[a-zA-Z0-9-_]+')
                ->where('id', '[0-9]+')
                ->name('recruit.detail');
        
        Route::post('/sendCV', 'HomeController@index')->name('recruit.sendCV');
        Route::get('/presend/{id}', 'HomeController@index')->name('recruit.preViewCV');
        Route::post('/removeCV', 'HomeController@index')->name('recruit.removeCV');
        

        Route::get('/gioi-thieu-phan-mem', 'HomeController@index')->name('page.software');
        Route::get('/le-cong-bo-hop-dong-dien-tu-{u}', 'HomeController@index')
                ->where('u', '[a-zA-Z0-9-_]+');
        Route::get('/hddt', 'HomeController@index');
        Route::get('/hddt-{u}', 'HomeController@index')->where('u', '[a-zA-Z0-9-_]+');
        Route::get('/le-cong-bo-hop-dong-dien-tu', 'HomeController@index');

        Route::post('/register_use', 'HomeController@index')->name('register_use.store');

        
        Route::get('/admin/login', 'Admin\LoginController@index')->name('admin.login.index');
        Route::post('/admin/login', 'Admin\LoginController@login')->name('admin.login');
        
        
        Route::post('/media/upload', 'MediaController@upload')->name('media.upload');
});



Route::middleware(['web', 'isAdminLogin'])->group(function () { 
        Route::get('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');

        Route::get('/admin', 'Admin\DashBoardController@index')->name('admin.index');
        Route::get('/admin/news', 'Admin\NewsController@index')->name('admin.news.index');
        Route::get('/admin/news/create', 'Admin\NewsController@create')->name('admin.news.create');
        Route::get('/admin/news/{id}', 'Admin\NewsController@create')->name('admin.news.edit');
        Route::post('/admin/news', 'Admin\NewsController@store')->name('admin.news.store');
        Route::post('/admin/news/remove', 'Admin\NewsController@remove')->name('admin.news.remove');
        Route::post('/admin/news/update_status', 'Admin\NewsController@ajaxUpdateStatus')->name('admin.news.ajax.update_status');

        Route::post('/admin/web-setting', 'Admin\WebController@store')->name('admin.web.store');
        
        Route::get('/admin/recruit', 'HomeController@index')->name('admin.recruit.index');
        Route::get('/admin/recruit/create', 'HomeController@index')->name('admin.recruit.create');
        Route::get('/admin/recruit/{id}', 'HomeController@index')->name('admin.recruit.edit');
        Route::post('/admin/recruit', 'HomeController@index')->name('admin.recruit.store');
        Route::post('/admin/recruit/remove', 'HomeController@index')->name('admin.recruit.remove');
        Route::post('/admin/recruit/update_status', 'HomeController@index')->name('admin.recruit.ajax.update_status');       

        Route::get('/admin/menu', 'Admin\MenuController@index')->name('admin.menu.index');
        Route::post('/admin/menu', 'Admin\MenuController@store')->name('admin.menu.store');
        Route::post('/admin/menu/remove', 'Admin\MenuController@remove')->name('admin.menu.remove');
        Route::post('/admin/menu/toggle_status', 'Admin\MenuController@ajaxToggleStatus')->name('admin.menu.toggle_status');

});
