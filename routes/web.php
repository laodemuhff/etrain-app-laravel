<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Front-End Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front-end.index');
});


/*
|--------------------------------------------------------------------------
| Back-End Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('logout', function(){
    Session::flush();
    return redirect('login');
}); 
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::group(['prefix'=>'be', 'middleware'=>'auth'], function(){
    Route::get('home', 'HomeController@index')->name('be.home');
    /*
    |------------------------------------------------------------------
    | Admin Routes
    |-------------------------------------------------------------------
    */
    Route::group(['middleware'=>'is_admin'], function(){
        Route::group(['prefix'=>'user'], function(){
            Route::group(['prefix' => 'admin', 'role'=>'admin'], function(){
                Route::get('/', 'UserController@index');
            });
            Route::group(['prefix' => 'mentor', 'role'=>'mentor'], function(){
                Route::get('/', 'UserController@index');
            });
            Route::group(['prefix' => 'trainee', 'role'=>'trainee'], function(){
                Route::get('/', 'UserController@index');
            });
            Route::get('/register', function(){ return view('back-end.users.register'); })->name('be.user-register');
            Route::get('/edit/{id}', 'UserController@edit')->name('be.user-edit');
            Route::post('/store', 'UserController@store')->name('be.user-store');
            Route::put('/update/{id}', 'UserController@update')->name('be.user-update');
            Route::get('/delete/{id}', 'UserController@delete')->name('be.user-delete');
        });
        Route::group(['prefix'=>'course'], function(){
            Route::get('/', 'CourseController@index');
            Route::get('/detail/{id}', 'CourseController@detail');
            Route::get('/add', 'CourseController@add');
            Route::get('/edit/{id}', 'CourseController@edit');
            Route::post('/store','CourseController@store');
            Route::put('/update/{id}','CourseController@update');
            Route::get('/delete/{id}', 'CourseController@delete');
        });
        Route::group(['middleware'=>'testimonial'], function(){
            Route::get('/', 'TestimonialController@index');
            Route::get('/delete/{id}', 'TestimonialController@delete');
            Route::put('/accept/{id}', 'TestimonialController@accept');
        }); 
    });

    /*
    |------------------------------------------------------------------
    | Mentor Routes
    |-------------------------------------------------------------------
    */
    Route::group(['prefix'=>'mentor','middleware'=>'is_mentor'], function(){
        Route::group(['prefix'=>'course'], function(){
            Route::get('/', 'CourseController@indexMentor');
            Route::get('/detail/{id}', 'CourseController@detailMentor');
        });
    });

    /*
    |------------------------------------------------------------------
    | Trainee Routes
    |-------------------------------------------------------------------
    */
    Route::group(['prefix'=>'trainee','middleware'=>'is_trainee'], function(){
        Route::group(['prefix'=>'course'], function(){
            Route::get('/', 'CourseController@indexTrainee');
            Route::get('/detail/{id}', 'CourseController@detailTrainee');
        });
        Route::group(['middleware'=>'testimonial'], function(){
            Route::get('/', 'TestimonialController@indexTrainee');
            Route::post('/store', 'TestimonialController@store');
        }); 
    });

});
