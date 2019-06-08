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

//php artisan migrate:refresh --seed

//https://evilinside.ru/sozdanie-foruma-v-laravel/

Route::get('/', 'Site\SiteController@index');
Route::get('/home', 'Site\SiteController@index');

Route::get('/about', 'Site\SiteController@showAboutPage');
Route::get('/roditeliam', 'Site\SiteController@showRoditeliamPage');
Route::get('/domashnie-jivotnie', 'Site\SiteController@showDomashnieJivotniePage');

Route::get('/math',  function () {
    return view('site.math');
});
Route::get('/rebusi',  function () {
    return view('site.rebusi');
});
Route::get('/zagadki',  function () {
    return view('site.zagadki');
});


Auth::routes();
Route::get('logout' , function (){
    Auth::logout();
    return redirect('/');
});//для выхода





Route::group(['prefix' => 'backend', 'middleware' => ['auth' , 'admin']], function () {


	Route::get('/', ['uses' => 'Admin\BackendController@index', 'as' => 'backend']);
    Route::get('/test', ['uses' => 'Admin\TestController@index']);

    /* CRUD start */
        Route::resource('posts', 'Admin\PostController');
        Route::resource('categories', 'Admin\CategoryController');
        Route::resource('comments', 'Admin\CommentController');
        Route::resource('topics', 'Admin\TopicController');
        Route::resource('users', 'Admin\UserController');
    /* CRUD end */

    //Route::get('/forum', ['uses' => 'Admin\TestController@index']);
     Route::post('upload_image', 'Admin\BackendController@uploadImage')->name('upload');
    
});




Route::group(['prefix' => 'forum'/*, 'middleware' => 'auth'*/], function () {
   
    Route::get('/', 'Site\SiteController@showForumPage');
    Route::get('/{topic}', 'Site\SiteController@showForumTopicPage');
    Route::post('/addCommentTopic', 'Site\SiteController@addCommentTopic');
    Route::post('/addCommentPost', 'Site\SiteController@addCommentPost');
      Route::post('/addTopic', 'Site\SiteController@addTopic');

});



Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {

    Route::get('/', ['uses' => 'Profile\ProfileController@index', 'as' => 'profile']);
    /* CRUD start */
        Route::resource('comments', 'Profile\CommentController');
        Route::resource('topics', 'Profile\TopicController');
        Route::resource('users', 'Profile\UserController');
    /* CRUD end */
    
});










//заглушка для статичного контента для использования src="{{URL::asset($pathFile)}}"
Route::get('/storage/{filename}', function ($filename) {
    $path = storage_path('public/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});



Route::get('/{category1}/{category2?}/{news_id?}', 'Site\SiteController@showCategoryPage');
