<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*  Route::fallback(function(){
    return redirect('/');
}); */

Route::prefix('lar')->group(function(){
    
    Route::get('/',function(){
        return view('test');
    });

    Route::get('test',function(){
        return 'Welcome to my first laravel website';
    });
    
    Route::get('test1/{id}',function($id){
        return 'The ID is: '. $id;
    });
    
    Route::get('test2/{id?}',function($id = 0){
        return 'The ID 2 is: '. $id;
    })->whereNumber('id');
    
    /*another method to validate that the parameter is a number
    Route::get('test2/{id?}',function($id = 0){
        return 'The ID 2 is: '. $id;
    })->where(['id'=>'[0-9]+']);
    */
    
    Route::get('test3/{name?}',function($name = null){
        return 'The name is: '. $name;
    })->whereAlpha('name');
    
    Route::get('test4/{id}/{name}',function($id,$name){
        return 'The age is: '. $id. ' and the name is: '. $name;
    })->where(['id'=>'[0-9]+', 'name'=>'[a-zA-Z]+']);
    
    Route::get('product/{category}',function($cat){
        return 'The category is: '. $cat;
    })->whereIn('category',['laptop','PC','mobile']);
});

Route::get('/login',function(){
    return view('login');
});

Route::post('logged',function(){
    return 'you are logged in';
})->name('logged');

Route::get('control',[ExampleController::class,'show']);

// Routes for the car table
// store data into car table
// Route::get('storeCar',[CarController::class,'store']);
Route::get('createCar',[CarController::class,'create'])->name('createCar');
Route::post('storeCar',[CarController::class,'store'])->name('storeCar');
Route::get('Cars',[CarController::class,'index'])->name('Cars');
Route::get('updateCar/{id}',[CarController::class,'edit'])->name('updateCar');
Route::put('update/{id}',[CarController::class,'update'])->name('update');
Route::get('showCar/{id}',[CarController::class,'show'])->name('showCar');
Route::get('deleteCar/{id}',[CarController::class,'destroy'])->name('delete');
Route::get('trashed',[CarController::class,'trashed'])->name('trashed');
Route::get('forceDelete/{id}',[CarController::class,'forceDelete'])->name('forceDelete');
Route::get('restoreCar/{id}',[CarController::class,'restore'])->name('restoreCar');
Route::get('test1',function(){
    return view('test1');
});
Route::get('image',function(){
    return view('image');
});
Route::post('imageUpload',[ExampleController::class,'upload'])->name('imageUpload');
Route::get('testHome',function(){
    return view('testHome');
})->name('testHome');
Route::get('contact',function(){
    return view('contact');
})->name('contact');
Route::get('404',function(){
    return view('404');
})->name('404');
Route::get('createCat',[CategoryController::class,'create'])->name('createCat');
Route::post('storeCat',[CategoryController::class,'store'])->name('storeCat');
Route::get('Categories',[CategoryController::class,'index'])->name('Categories');
