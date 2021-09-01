<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
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

// Route::get('/home', function () {
//     $data = ['ana yemekler','tatlilar','salatalar','icecekler'];
//     return view('home')->with('data',$data);
// });

Route::get('/categories/{category:slug?}', function (Category $category) {
    if(!$category->exists)
        return view('categories.index')->with('data',Category::where('parent_id',null)->get());
    if($category->has_item){
        return view('items.index')->with('data',Category::with('items')->where('id',$category->id)->get()[0]->items);
    }
    return view('categories.index')->with('data',Category::with('children')->where('id',$category->id)->get()[0]->children);
});
