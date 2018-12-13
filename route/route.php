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
Route::get('product','index/product/product');
Route::get('product/:id','index/product/read');

/*后台*/

// 产品
Route::get('admin/product','index/product/product');
Route::get('admin/product/:id','index/product/read');
Route::get('admin/product/create','admin/product/create');
Route::post('admin/product','admin/product/save');
Route::get('admin/product/:id','admin/product/read');
Route::put('admin/product/:id','admin/product/update');
Route::delete('admin/product/:id','admin/product/delete');

// 用户路由
Route::get('admin/login','admin/admin/login');
Route::get('admin','admin/admin/index');
Route::get('admin/create','admin/admin/create');
Route::post('admin','admin/admin/save');
Route::get('admin/:id','admin/admin/read');
Route::get('admin/:id/edit','admin/admin/edit');
Route::put('admin/:id','admin/admin/update');
Route::delete('admin/:id','admin/admin/delete');

// 角色
Route::get('role','admin/role/index');
Route::get('role/create','admin/role/create');
Route::post('role','admin/role/save');
Route::get('role/:id','admin/role/read');
Route::get('role/:id/edit','admin/role/edit');
Route::put('role/:id','admin/role/update');
Route::delete('role/:id','admin/role/delete');

// 权限
Route::get('auth','admin/auth/index');
Route::get('auth/create','admin/auth/create');
Route::post('auth','admin/auth/save');
Route::get('auth/:id','admin/auth/read');
Route::get('auth/:id/edit','admin/role/edit');
Route::put('auth/:id','admin/auth/update');
Route::delete('auth/:id','admin/auth/delete');





