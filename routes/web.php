<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogTagController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\UiSettingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\BlogPostTagController;
use App\Http\Controllers\NetworkTeamController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StoreSettingController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\UserStoreCreditController;

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
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/product/{id}', [ProductController::class, "details"])->name('product.show');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', function () {
        return view('dashboard');
    })
    ->name('dashboard');

Route::prefix('/')
    ->middleware(['auth:sanctum', 'verified'])
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('addresses', AddressController::class);
        Route::resource('banners', BannerController::class);
        Route::resource('carousels', CarouselController::class);
        Route::resource('carts', CartController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('contents', ContentController::class);
        Route::resource('invoices', InvoiceController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('order-items', OrderItemController::class);
        Route::resource('products', ProductController::class);
        Route::resource('product-categories', ProductCategoryController::class);
        Route::resource('reviews', ReviewController::class);
        Route::resource('store-settings', StoreSettingController::class);
        Route::resource('ui-settings', UiSettingController::class);
        Route::resource('users', UserController::class);
        Route::resource('blog-categories', BlogCategoryController::class);
        Route::resource('blog-posts', BlogPostController::class);
        Route::resource('blog-post-tags', BlogPostTagController::class);
        Route::resource('blog-tags', BlogTagController::class);
        Route::resource('contacts', ContactController::class);
        Route::resource('network-teams', NetworkTeamController::class);
        Route::resource('product-images', ProductImageController::class);
        Route::resource('quotes', QuoteController::class);
        Route::resource('transactions', TransactionController::class);
        Route::resource('user-store-credits', UserStoreCreditController::class);
    });
