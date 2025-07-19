<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TestimonialController;

// Route::get('/', function () {
//     return view('welcome');
// });


// Home or frontend routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop', [HomeController::class, 'shop'])->name('home.shop');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::post('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('home.checkout');
Route::get('/search', [HomeController::class, 'search_results'])->name('home.search');
Route::get('/cart', [HomeController::class, 'cart'])->name('home.cart');
Route::post('/newsletter', [HomeController::class, 'newsletter'])->name('home.newsletter');
Route::get('/shop/category/{slug}', [HomeController::class, 'shopByCategory'])->name('home.shopByCategory');
Route::post('/cart/{id}' , [HomeController::class, 'addToCart'])->name('home.addToCart');
Route::post('/cart/update/{id}' , [HomeController::class, 'updateCart'])->name('home.updateCart');
Route::get('/cart/clear' , [HomeController::class, 'clearCart'])->name('home.clearCart');
Route::get('/cart' , [HomeController::class, 'cart'])->name('home.cart');
Route::get('/products/show/{id}' , [HomeController::class, 'productShow'])->name('home.productShow');
Route::post('/order', [HomeController::class, 'placeOrder'])->name('home.placeOrder');
Route::get('/ordersuccess', [HomeController::class, 'orderSuccess'])->name('home.orderSuccess');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function (){
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    // Order routes
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/update/{id}', [OrderController::class, 'update'])->name('orders.update');

    // testimonial
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('testimonials.create');
    Route::put('/testimonial/update/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::get('/testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::delete('/testimonial/destroy/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

});