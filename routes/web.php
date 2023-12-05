<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('login',[PostController::class,'create'])->name('login');
Route::post('logged',[PostController::class,'store'])->name('logged');


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
    
    // Route::get('product/{category}',function($cat){
    //     return 'The category is : '.  $cat;
    // })->whereIn('category',['laptop','pc','mobile']);
    
    






