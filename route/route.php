<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/*前台*/
Route::get('/','index/index/index');
Route::get('products/:id','index/product/product');
Route::get('productsCategory/:category','index/category/category');
Route::get('productsScreen','index/category/productScreen');

Route::resource('person','index/user')->only(['index','edit','update','create','save']);
Route::resource('index/login','index/sessions')->only(['index']);
Route::post('index/message','index/sessions/message');
Route::delete('index/logout','index/sessions/delete');
Route::post('index/messagevalidate','index/sessions/messagevalidate');

/*后台*/
// 产品
Route::get('product','admin/product/index')->middleware(['auth']);
Route::get('product/create','admin/product/create')->middleware(['auth']);
Route::post('product','admin/product/save')->middleware(['auth']);
Route::get('product/:id','admin/product/read')->middleware(['auth']);
Route::get('product/:id/edit','admin/product/edit')->middleware(['auth']);
Route::put('product/:id','admin/product/update')->middleware(['auth']);
Route::delete('product/:id','admin/product/delete')->middleware(['auth']);
Route::post('product/upload','admin/product/upload')->middleware(['auth']);

// 登录
Route::get('login','admin/login/login');
Route::post('login','admin/login/loginCheck');
Route::post('logout','admin/admin/logout')->middleware(['auth']);

// 欢迎页面
Route::get('welcome','admin/admin/welcome')->middleware(['auth']);

// 用户路由
Route::get('admin','admin/admin/index')->middleware(['auth']);
Route::get('lists','admin/admin/lists')->middleware(['auth']);
Route::get('admin/create','admin/admin/create')->middleware(['auth']);
Route::post('admin','admin/admin/save')->middleware(['auth']);
Route::get('admin/:id','admin/admin/read')->middleware(['auth']);
Route::get('admin/:id/edit','admin/admin/edit')->middleware(['auth']);
Route::put('admin/:id','admin/admin/update')->middleware(['auth']);
Route::delete('admin/:id','admin/admin/delete')->middleware(['auth']);
Route::delete('admins','admin/admin/deletes')->middleware(['auth']);

// 角色
Route::get('role','admin/role/index')->middleware(['auth']);
Route::get('role/create','admin/role/create')->middleware(['auth']);
Route::post('role','admin/role/save')->middleware(['auth']);
Route::get('role/:id','admin/role/read')->middleware(['auth']);
Route::get('role/:id/edit','admin/role/edit')->middleware(['auth']);
Route::put('role/:id','admin/role/update')->middleware(['auth']);
Route::delete('role/:id','admin/role/delete')->middleware(['auth']);

// 分类
Route::get('category','admin/category/index')->middleware(['auth']);
Route::get('category/create','admin/category/create')->middleware(['auth']);
Route::post('category','admin/category/save')->middleware(['auth']);
Route::get('category/:id','admin/category/read')->middleware(['auth']);
Route::get('category/:id/edit','admin/category/edit')->middleware(['auth']);
Route::put('category/:id','admin/category/update')->middleware(['auth']);
Route::delete('category/:id','admin/category/delete')->middleware(['auth']);

// 前台
Route::get('categorys','index/category/index');

// 标签
Route::resource('tag','admin/tag')->middleware(['auth']);
Route::get('setting/carousel','admin/setting/carouselEdit');
Route::put('setting/carousel','admin/setting/carouselUpdate');
Route::post('setting/carousel/upload','admin/setting/upload');





