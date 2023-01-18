<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

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
// VIEW ROUTES


Route::get('/', 'App\Http\Controllers\EventsController@index')->name("pages.index");
Route::get('/about', 'App\Http\Controllers\ViewController@about')->name("pages.about");
Route::get('/team', 'App\Http\Controllers\ViewController@team')->name("pages.team");
Route::get('/contact', 'App\Http\Controllers\ViewController@contact')->name("pages.contact");
Route::get('/profile', 'App\Http\Controllers\Auth\UserProfileController@profile')->name("pages.profile");
Route::get('/thanks', 'App\Http\Controllers\ViewController@thanks')->name("pages.thanks");

Route::get('/register', 'App\Http\Controllers\ViewController@register')->name("auth.register");

// STORAGE LINK
// Route::get('/foo', function () {
//     Artisan::call('storage:link');
// });

// UPDATE USER INFO
// CRUD FOR USER
Route::get('/user/profile/{id}/edit', 
    'App\Http\Controllers\Auth\UserProfileController@edit')->name('user.profile.edit');
Route::put('/user/profile/{id}/update', 
    'App\Http\Controllers\Auth\UserProfileController@update')->name('user.profile.update');


// DYNAMIC ROUTES: blog, event, member
Route::get('/blog', 'App\Http\Controllers\PostsController@blog')->name("posts.blog");
Route::get('/blog/{post:slug}', 'App\Http\Controllers\PostsController@show')->name("posts.show");

// ADMIN ROUTES
Route::middleware('admin')->group(function(){
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");   
    Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUsersController@home')->name("admin.user.home");   
    Route::get('/admin/posts', 'App\Http\Controllers\Admin\AdminPostsController@index')->name("admin.posts.index");
    Route::get('/admin/events', 'App\Http\Controllers\Admin\AdminEventsController@home')->name("admin.events.home");
    Route::get('/admin/homeCover', 'App\Http\Controllers\Admin\AdminHomeCoverController@home')->name("admin.homeCover.home");
    Route::get('/admin/aboutCover', 'App\Http\Controllers\Admin\AdminAboutController@home')->name("admin.aboutCover.home");
    Route::get('/admin/aboutSection', 'App\Http\Controllers\Admin\AdminAboutSectionController@home')->name("admin.aboutSection.home");
    Route::get('/admin/team', 'App\Http\Controllers\Admin\AdminTeamController@home')->name("admin.team.home");

    // CRUD OPERATIONS FOR USERS
    Route::delete('/admin/user/{id}/delete', 
        'App\Http\Controllers\Admin\AdminUsersController@delete')->name("admin.user.delete");
    Route::get('/admin/user/{id}/edit', 
        'App\Http\Controllers\Admin\AdminUsersController@edit')->name("admin.user.edit");
    Route::put('/admin/user/{id}/update', 
        'App\Http\Controllers\Admin\AdminUsersController@update')->name("admin.user.update");


    // CRUD OPERATIONS FOR TEAM
    Route::post('admin/team/store', 
        'App\Http\Controllers\Admin\AdminTeamController@store')->name("admin.team.store");
    Route::delete('/admin/team/{id}/delete', 
        'App\Http\Controllers\Admin\AdminTeamController@delete')->name("admin.team.delete");
    Route::get('/admin/team/{id}/edit', 
        'App\Http\Controllers\Admin\AdminTeamController@edit')->name("admin.team.edit");
    Route::put('/admin/team/{id}/update', 
        'App\Http\Controllers\Admin\AdminTeamController@update')->name("admin.team.update");

    // CRUD OPERATIONS FOR BLOGS
    Route::post('/admin/posts/store', 
        'App\Http\Controllers\Admin\AdminPostsController@store')->name("admin.posts.store");
    Route::delete(
        '/admin/posts/{id}/delete',
        'App\Http\Controllers\Admin\AdminPostsController@delete')->name("admin.posts.delete");
    Route::get(
        '/admin/posts/{id}/edit',
        'App\Http\Controllers\Admin\AdminPostsController@edit')->name("admin.posts.edit");
    Route::put(
        '/admin/posts/{id}/update',
        'App\Http\Controllers\Admin\AdminPostsController@update')->name("admin.posts.update");
    

    // CRUD OPERATIONS FOR EVENTS
    Route::post(
        '/admin/events/store',
        'App\Http\Controllers\Admin\AdminEventsController@store')->name("admin.events.store");
    Route::delete(
        '/admin/events/{id}/delete',
        'App\Http\Controllers\Admin\AdminEventsController@delete')->name("admin.events.delete");
    Route::get(
        '/admin/events/{id}/edit',
        'App\Http\Controllers\Admin\AdminEventsController@edit')->name("admin.events.edit");
    Route::put(
        '/admin/events/{id}/update',
        'App\Http\Controllers\Admin\AdminEventsController@update')->name("admin.events.update");


    // CRUD OPERATIONS FOR HOME COVER
    // Route::post(
    //     '/admin/homeCover/store',
    //     'App\Http\Controllers\Admin\AdminHomeCoverController@store')->name("admin.homeCover.store");
    // Route::delete(
    //     '/admin/homeCover/{id}/delete',
    //     'App\Http\Controllers\Admin\AdminHomeCoverController@delete')->name("admin.homeCover.delete");
    Route::get(
        '/admin/homeCover/{id}/edit',
        'App\Http\Controllers\Admin\AdminHomeCoverController@edit')->name("admin.homeCover.edit");
    Route::put(
        '/admin/homeCover/{id}/update',
        'App\Http\Controllers\Admin\AdminHomeCoverController@update')->name("admin.homeCover.update");


    // CRUD OPERATIONS FOR ABOUT COVER
    // Route::post(
    //     '/admin/aboutCover/store',
    //     'App\Http\Controllers\Admin\AdminAboutController@store')->name("admin.aboutCover.store");
    // Route::delete(
    //     '/admin/aboutCover/{id}/delete',
    //     'App\Http\Controllers\Admin\AdminAboutController@delete')->name("admin.aboutCover.delete");
    Route::get(
        '/admin/aboutCover/{id}/edit',
        'App\Http\Controllers\Admin\AdminAboutController@edit')->name("admin.aboutCover.edit");
    Route::put(
        '/admin/aboutCover/{id}/update',
        'App\Http\Controllers\Admin\AdminAboutController@update')->name("admin.aboutCover.update");

    // CRUD OPERATIONS FOR ABOUT SECTION
    // Route::post(
    //     '/admin/aboutSection/store',
    //     'App\Http\Controllers\Admin\AdminAboutSectionController@store')->name("admin.aboutSection.store");
    // Route::delete(
    //     '/admin/aboutSection/{id}/delete',
    //     'App\Http\Controllers\Admin\AdminAboutSectionController@delete')->name("admin.aboutSection.delete");
    Route::get(
        '/admin/aboutSection/{id}/edit',
        'App\Http\Controllers\Admin\AdminAboutSectionController@edit')->name("admin.aboutSection.edit");
    Route::put(
        '/admin/aboutSection/{id}/update',
        'App\Http\Controllers\Admin\AdminAboutSectionController@update')->name("admin.aboutSection.update");
    
    // CRUD OPERATIONS FOR TEAM
    Route::post('admin/team/store', 
        'App\Http\Controllers\Admin\AdminTeamController@store')->name("admin.team.store");
    Route::delete('/admin/team/{id}/delete', 
        'App\Http\Controllers\Admin\AdminTeamController@delete')->name("admin.team.delete");
    Route::get('/admin/team/{id}/edit', 
        'App\Http\Controllers\Admin\AdminTeamController@edit')->name("admin.team.edit");
    Route::put('/admin/team/{id}/update', 
        'App\Http\Controllers\Admin\AdminTeamController@update')->name("admin.team.update");
       
});


Auth::routes();
