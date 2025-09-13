<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Search
Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');

// Photo Gallery
Route::get('/photo-gallery', [App\Http\Controllers\PhotoGalleryController::class, 'index'])->name('photo-gallery.index');
Route::get('/photo-gallery/{slug}', [App\Http\Controllers\PhotoGalleryController::class, 'show'])->name('photo-gallery.show');

// Video Gallery
Route::get('/video-gallery', [App\Http\Controllers\VideoGalleryController::class, 'index'])->name('video-gallery.index');
Route::get('/video-gallery/{slug}', [App\Http\Controllers\VideoGalleryController::class, 'show'])->name('video-gallery.show');

// Archives
Route::get('/archives', function(Illuminate\Http\Request $request) {
    $categories = App\Models\Category::where('is_active', true)->orderBy('sort_order')->get();
    
    $query = App\Models\Article::published()->with('category');
    
    if ($request->category) {
        $category = $categories->where('slug', $request->category)->first();
        if ($category) {
            $query->where('category_id', $category->id);
        }
    }
    
    if ($request->month) {
        $query->whereYear('published_at', substr($request->month, 0, 4))
              ->whereMonth('published_at', substr($request->month, 5, 2));
    }
    
    $articles = $query->latest()->paginate(20);
    
    return view('archives', compact('categories', 'articles'));
})->name('archives');

// Pages (Contact, Privacy, Terms, etc.)
Route::get('/page/{slug}', [App\Http\Controllers\PageController::class, 'show'])->name('page.show');

// Admin authentication routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
    
    // Protected admin routes
    Route::middleware('admin.auth')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('articles', App\Http\Controllers\Admin\AdminArticleController::class);
        Route::resource('photo-galleries', App\Http\Controllers\Admin\AdminPhotoGalleryController::class);
        Route::resource('video-galleries', App\Http\Controllers\Admin\AdminVideoGalleryController::class);
        Route::resource('pages', App\Http\Controllers\Admin\AdminPageController::class);
        Route::get('/settings', [App\Http\Controllers\Admin\AdminSettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [App\Http\Controllers\Admin\AdminSettingController::class, 'update'])->name('settings.update');
    });
});

// Category and Article routes (must be last to avoid conflicts)
Route::get('/{categorySlug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/{categorySlug}/news/{slug}', [ArticleController::class, 'show'])->name('article.show');
