<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('tintuc/detail', function()
{
	return View::make('tintuc/detail');
});

Route::get('/','HomeController@showWelcome');
Route::get('map','HomeController@showMap');
Route::post('login','UserController@login');
Route::get('logout','UserController@logout');
Route::post('register','UserController@register');
Route::post('recoverypassword','UserController@recoverypassword');
Route::post('checkemail','UserController@checkEmail');
Route::post('checkuseremail','UserController@checkUserEmail');
Route::get('dat-nha-be-contact','HomeController@showContact');
Route::get('dat-nha-be-webinfo','HomeController@showWebinfo');
Route::get('author','HomeController@loadAuthor');

//create first database
Route::get('taotin/first1', function()
{
	return View::make('template/first');
});
Route::group(array('prefix'=>'first'),function(){

    Route::get('create','FirstDatabaseController@createFirst');
    Route::get('loadDistrict','FirstDatabaseController@loadDistrict');
    Route::get('loadStreet','FirstDatabaseController@loadStreet');
    Route::get('loaditem','FirstDatabaseController@loadItem');
    Route::get('loadgroup','FirstDatabaseController@loadGroup');
    Route::get('loadcategory','FirstDatabaseController@loadCategory');
});
//End create first database
//dangtin
Route::group(array('prefix'=>'dangtin'),function(){

    Route::get('/','DangTinController@getDangtin');
    Route::get('list','DangTinController@getListDangtin');
    Route::post('list','DangTinController@postListDangtin');
    Route::get('add','DangTinController@getDangtin');
    Route::get('edit/{name}','DangTinController@editDangtin');
    Route::get('detail/{name}','DangTinController@detailDangtin');
    Route::post('update/{id}','DangTinController@updateDangtin');
    Route::post('postdangtin','DangTinController@postDangtin');
    Route::post('createproduct','DangTinController@createProduct');
    Route::post('load','DangTinController@loadDangtin');
    //Route::post('search','DangTinController@searchDangtin');
    Route::post('delete','DangTinController@deleteDangtin');
    Route::post('up','DangTinController@upDangtin');
    Route::get('mualuotup','DangTinController@mualuotupDangtin');
    Route::post('mualuotup','DangTinController@postmualuotupDangtin');
    Route::post('allup','DangTinController@postAllUp');
});
Route::group(array('prefix'=>'tintuc'),function(){

    Route::get('/','TinTucController@getTinTuc');
    //Route::get('list','TinTucController@getListTinTuc');
    Route::post('uploadimagenews','TinTucController@uploadImageNews');
    Route::post('list','TinTucController@postListTinTuc');
    Route::get('add','TinTucController@addNews');
    Route::get('edit/{name}','TinTucController@editNews');
    Route::get('detail/{name}','TinTucController@detailMyNews');
    Route::post('update/{id}','TinTucController@updateNews');
    Route::get('{category}/{name}','TinTucController@detailNews');
    Route::get('mylist','TinTucController@myNewsList');
    Route::post('delete','TinTucController@deleteNews');
    Route::get('{category}','TinTucController@getCategoryPageNews');
    Route::post('posttintuc','TinTucController@postTinTuc');
    Route::post('createnews','TinTucController@createNews');
    Route::post('load','TinTucController@loadTinTuc');
    Route::post('search','TinTucController@searchTinTuc');
    //Route::get('{category}','TinTucController@getListTinTuc');
    
});
//End tintuc
Route::group(array('prefix'=>'user'),function(){
    Route::get('infor','UserController@getThongTinTaiKhoan');
    Route::get('add','UserController@addUser');
    Route::post('create','UserController@createUser');
    Route::get('list','UserController@getListUser');
    Route::get('edit/{id}','UserController@getEditUser');
    Route::post('update/{id}','UserController@updateUser');
    Route::post('checkupdateuseremail/{id}','UserController@checkUpdateUserEmail');
});
Route::group(array('prefix'=>'bat-dong-san'),function(){
    Route::post('loadbytag','TagsController@loadProductByTag');
    Route::post('search','CategoryController@search');
    Route::post('{name}','TagsController@getTags');
    Route::get('{name}','TagsController@getTags');

    //Route::get('{name}','TagsController@getCategory');
});

Route::group(array('prefix'=>'ban-dat-nha-be'),function(){
    Route::post('loadbytag','TagsController@loadProductByTag');
    Route::get('{name}','TagsController@getTags');
    Route::post('{name}','TagsController@getTags');

    //Route::get('{name}','TagsController@getCategory');
});

Route::group(array('prefix'=>'{category}'),function(){

    Route::get('/','CategoryController@getCategory');

    //Route::post('/','CategoryController@search');
    Route::get('ho-chi-minh/ban-dat-duong-nguyen-binh-nha-be','CategoryController@getNguyenBinh');
    Route::get('{city}/{name}','CategoryController@getChitiet');
    Route::get('{city}','CategoryController@getCategoryCity');

});
