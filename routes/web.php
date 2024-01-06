<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ExampleController;
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
    return view ('welcome');
});

Route::get('test', function () {
    return view ('testHome');
})->name('testHome');


Route::get('contact', function () {
    return view ('contact');
})->name('contact');

Route::get('404', function () {
    return view ('404');
})->name('404');

Route::get('image', function () {
    return view ('image');
});
// Route::get('login',[PostController::class,'create'])->name('login');
// Route::post('logged',[PostController::class,'store'])->name('logged');


// store data into car table
// Route::get('storeCar',[CarController::class,'store']);

Route::post('imageUpload',[ExampleController::class,'upload'])->name('imageUpload');


//Routes for the car table
Route::get('createCar',[CarController::class,'create'])->middleware('verified')->name('createCar');
Route::get('cars',[CarController::class,'index'])->name('cars');
Route::get('updateCar/{id}',[CarController::class,'edit']);
Route::put('update/{id}',[CarController::class,'update'])->name('update');
Route::get('showCar/{id}',[CarController::class,'show'])->name('show');
Route::get('deleteCar/{id}',[CarController::class,'destroy']);
Route::get('trashed',[CarController::class,'trashed'])->name('trashed');
Route::get('restoreCar/{id}',[CarController::class,'restore'])->name('restoreCar');
Route::get('forceDelete/{id}',[CarController::class,'forceDelete'])->name('forceDelete');
Route::post('storeCar',[CarController::class,'store'])->name('storeCar');
Auth::routes(['verify'=>true]);



//Routes for the post table

// Route::get('createPost',[PostController::class,'create'])->name('createPost');
// Route::get('posts',[PostController::class,'index'])->name('posts');
// Route::get('updatePost/{id}',[PostController::class,'edit']);
// Route::put('update/{id}',[PostController::class,'update'])->name('update');
// Route::get('showPost/{id}',[PostController::class,'show'])->name('show');
// Route::post('storePost',[PostController::class,'store'])->name('storePost');
// Route::get('deletePost/{id}',[PostController::class,'destroy']);
// Route::get('trashed',[PostController::class,'trashed'])->name('trashed');
// Route::get('forceDelete/{id}',[PostController::class,'forceDelete'])->name('forceDelete');
// Route::get('restorePost/{id}',[PostController::class,'restore'])->name('restorePost');




// Route:: get('login',function(){
//     return view ('login');
// });

// Route:: post('logged',function(){
//     return 'you are logged in';
// })->name('logged');



// Route::prefix('Blog')->group(function(){

//     Route::get('/', function () {
//         return ('welcome');
//     });

//     Route:: get('Science',function(){
//         return 'welcome to science page';
//     });

//     Route::get('Sports',function(){
//         return 'welcome to sports page';
//     });

//     Route::get('Math',function(){
//         return 'welcome to Math page';
//     });

//     Route::get('Medical',function(){
//         return 'welcome to Medical page';
//     });
    
// });


// Route::fallback(function(){
//     return redirect('/');
// });

// Route::get('/math',function($id){
//     return 'The id is : '.  $id;
// });

// Route::get('test2/{id?}',function($id = 0){
    //     return 'The id is : '.  $id;
    // })->where(['id'=>'[0-9]+']);
    
    // Route::get('test2/{id?}',function($id = 0){
    //     return 'The id is : '.  $id;
    // })->whereNumber('id');
    
    // Route::get('test3/{name?}',function($name=null){
    //     return 'The name is : '.  $name;
    // })->whereAlpha('name');
    
    // Route::get('test4/{id}/{name}',function($id,$name){
    //     return 'The age is : '.  $id . ' and the name is: '. $name;
    // })->where(['id' => '[0-9]+', 'name' => '[a-zA-Z]+']);
    
    Route::get('product/{category}',function($cat){
        return 'The category is : '.  $cat;
    });
    // })->whereIn('category',['laptop','pc','mobile']);
    
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
