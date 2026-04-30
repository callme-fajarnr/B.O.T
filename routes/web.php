<?php

use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPostLinkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardNameCompany;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\About;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home', [
//         "tittle" => "home",
//         "active" => 'home'
//     ]);
// });

Route::get('/', [HomeController::class, 'index']);


Route::get('/about', function () {
    return view('about', [
        "tittle" => "about",
        "active" => 'about',
        "post" => Post::latest()->Filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
        "about" => About::latest()->first()
    ]);
});

Route::get('/cobaproject', function () {
    return view('cobaproject', [
        "tittle" => "cobaproject",
        "active" => "cobaproject"
    ]);
});

Route::get('/cobaprojectdua', function () {
    return view('cobaprojectdua', [
        "tittle" => "cobaprojectdua",
        "active" => "cobaprojectdua"
    ]);
});

Route::get('/fajar', function () {
    return view('fajar', [
        "tittle" => "cobaaane",
        "active" => "cobaaane"
    ]);
});

Route::get('/blog', [PostController::class, 'index']);

Route::get('/blog/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'tittle' => 'Post category',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('post', [
        'tittle' => "Post by catagory : $category->name",
        'active' => 'categories',
        'post' => $category->posts->load(['category', 'author'])
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('post', [
        'tittle' => "Post by author : $author->name",
        'post' => $author->posts->load(['category', 'author'])
    ]);
});

// $new = [];
// foreach (Post::all() as $post) {
//     # code...
//     if ($post["slug"] == $slug) {
//         # code...
//         $new = $post;
//     }
// }

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth');


Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/post', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/post-link', AdminPostLinkController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::resource('/dashboard/namecompany', DashboardNameCompany::class)->except('show')->middleware('admin');

Route::resource('/dashboard/about', AdminAboutController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/banner', AdminBannerController::class)->except('show')->middleware('admin');
Route::patch('/dashboard/banner/{banner}/toggle', [AdminBannerController::class, 'toggle']);
