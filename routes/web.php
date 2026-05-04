<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    PostController,
    LoginController,
    RegisterController,
    DashboardController,
    DashboardPostController,
    AdminCategoryController,
    AdminAboutController,
    AdminBannerController,
    AdminPostLinkController,
    DashboardNameCompany,
    AdminUserController
};
use App\Models\{Post, Category, About, User};

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// =================== PUBLIC ===================
Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about', [
        "tittle" => "about",
        "active" => 'about',
        "post" => Post::latest()->filter(request(['search', 'category', 'author']))
            ->paginate(6)->withQueryString(),
        "about" => About::latest()->first()
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
        'tittle' => "Post by category : $category->name",
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


// =================== AUTH ===================
Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])
    ->name('register')
    ->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);


// =================== DASHBOARD (AUTH) ===================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug']);
    Route::resource('/dashboard/post', DashboardPostController::class);

    Route::resource('/dashboard/post-link', AdminPostLinkController::class);
});


// =================== ADMIN ONLY ===================
Route::middleware('admin')->group(function () {

    Route::get('/dashboard/user', [AdminUserController::class, 'index']);

    Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');
    Route::resource('/dashboard/namecompany', DashboardNameCompany::class)->except('show');
    Route::resource('/dashboard/about', AdminAboutController::class)->except('show');
    Route::resource('/dashboard/banner', AdminBannerController::class)->except('show');

    // 🔥 FIX: tambahin middleware
    Route::patch('/dashboard/banner/{banner}/toggle', [AdminBannerController::class, 'toggle']);
    Route::patch('/dashboard/user/{user}/toggle', [AdminUserController::class, 'toggle'])
        ->middleware('admin');
});
