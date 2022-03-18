<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/home');
});

// Auth::routes();
//Routes for homepage
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/single/{id}', [HomeController::class, 'single_post'])->name('single');
Route::get('/category/{category}', [HomeController::class, 'single_cat'])->name('single_cat');
Route::get('/About', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
//search route
Route::get('/search',[HomeController::class, 'search'])->name('search');
//Route to handle Email Subscription
Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');
//Routes to Handle comments
Route::post('/add_comment', [CommentController::class, 'add_comment'])->name('add_comment');
//These routes are protected by the auth middleware
Route::group(["middleware" => ["auth"]], function(){
    Route::get('/single/{post_id}/{comment_id}/edit', [CommentController::class, 'show_edit'])->name('show_comment_edit');
    Route::post('/update_comment', [CommentController::class, 'update'])->name('update_comment');
    Route::get('/single/{post_id}/{comment_id}/delete', [CommentController::class, 'delete'])->name('delete_comment');
});





//Routes for Admin Dashboard
Route::post("/auth/registersave",[AdminController::class, "saveregister"])->name("admin.rsave");
Route::post("/auth/loginsave", [AdminController::class, "savelogin"])->name("admin.lsave");
Route::get("/admin", function(){
    return redirect('/auth/login');
});

//these routes are protected by the admincheck middleware.
Route::group(["middleware" => ["AdminCheck"]], function(){
    Route::get("admin/dashboard", [AdminController::class, "showdashboard"])->name("admin.dash");
    Route::get("admin/logout", [AdminController::class, "logout"])->name("admin.logout");
    Route::get("auth/login", [AdminController::class, 'showlogin'])->name("admin.login");
    Route::get("auth/register", [AdminController::class, 'showregister'])->name("admin.register");
    Route::get('admin/users',[AdminController::class, 'showUsers'])->name('admin.show_users');
    Route::delete('admin/destroy_user/{user_id}',[AdminController::class, 'deleteUser'])->name('admin.delete_user');
    Route::get('admin/subscription', [AdminController::class, 'subscription'])->name('admin.subscription');
    Route::get('admin/subscription/bulkemail', [AdminController::class, 'email_subscription'])->name('admin.subscription_bulk');
    Route::get('admin/subscription/singlemail/{email}', [AdminController::class, 'email_sub_single'])->name('admin.subscription_single');
    Route::post('admin/sendit',[AdminController::class, 'sendemail'])->name('admin.send');
    Route::post('admin/sendbulk',[AdminController::class, 'sendbulk'])->name('admin.sendbulk');
    

    //Route resource for Admin Category
    Route::resource("admin/category",CategoryController::class);
    //Route resource for Admin Post
    Route::resource("admin/post", PostController::class);
});