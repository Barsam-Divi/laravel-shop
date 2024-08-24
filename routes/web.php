<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\FeatUredCategoryController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\ProductComment;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPropertyController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyGroupController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LikesController;
use App\Http\Controllers\Client\orderController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Middleware\CheckPermission;
use Illuminate\Support\Facades\Route;



Route::prefix('')->name('client.')->group(function ()
{
    Route::get('/',[HomeController::class,'index'])->name('home');

    Route::get('/products/{product}',[\App\Http\Controllers\Client\ProductController::class,'show'])->name('product.show');

    Route::get('/register',[RegisterController::class , 'create'])->name('register');

    Route::post('/register/sendMail',[RegisterController::class , 'sendMail'])->name('register.sendMail');

    Route::get('/register/otp/{user}',[RegisterController::class,'otp'])->name('register.otp');

    Route::post('/register/verifyOtp/{user}',[RegisterController::class,'verifyOtp'])->name('register.verifyOtp');

    Route::delete('/logout',[RegisterController::class , 'logout'])->name('logout');

    Route::post('/products/{product}/comments',[CommentController::class , 'store'])->name('products.comments.store')->middleware('auth');

    Route::post('/products/{product}/likes', [LikesController::class ,'store'])->name('products.likes.store')->middleware('auth');
    Route::get('/likes' , [LikesController::class , 'index'])->name('likes.index')->middleware('auth');
    Route::delete('/products/{product}/likes' , [LikesController::class , 'destroy'])->middleware('auth');

    Route::post('/carts',[CartController::class, 'store'])->middleware('auth');
    Route::get('/carts',[CartController::class, 'index'])->name('carts.index')->middleware('auth');
    Route::delete('/carts',[CartController::class, 'destroy'])->middleware('auth');

    Route::get('/orders/create',[orderController::class , 'create'])->name('orders.create')->middleware('auth');
    Route::post('/orders',[orderController::class , 'store'])->name('orders.store')->middleware('auth');
    Route::get('/orders/payment/callback',[orderController::class , 'callback'])->name('orders.callback')->middleware('auth');
    Route::get('/orders/{order}',[orderController::class , 'show'])->name('orders.show')->middleware('auth');


});


Route::prefix('/adminpanel')->middleware([
    CheckPermission::class.':read-dashboard',
    'auth'
])->group(function ()
{
    Route::get('/',function (){
        return view('admin.home');
    })->name('home');

    Route::resource('categories',CategoryController::class);

    Route::resource('brands',BrandController::class);

    Route::resource('products',ProductController::class);
    Route::resource('products.pictures',PictureController::class);

    Route::post('/products/{product}/discounts',[DiscountController::class,'store'])->name('products.discounts.store');
    Route::patch('/products/{product}/discounts/edit',[DiscountController::class,'update'])->name('products.discounts.update');

    Route::get('/products/{product}/properties',[ProductPropertyController::class,'index'])->name('products.properties.index');
    Route::get('/products/{product}/properties/edit',[ProductPropertyController::class,'create'])->name('products.properties.create');
    Route::post('/products/{product}/properties',[ProductPropertyController::class,'store'])->name('products.properties.store');

    Route::get('/products/{product}/comments',[ProductComment::class , 'index'])->name('products.comments.index');
    Route::delete('/products/comments/{comment}',[ProductComment::class , 'destroy'])->name('products.comments.destroy');

    Route::post('/featuredCategories',[FeatUredCategoryController::class , 'store'])->name('featuredCategories.store');
    Route::get('/featuredCategories',[FeatUredCategoryController::class , 'create'])->name('featuredCategories.create');


    Route::resource('propertyGroups',PropertyGroupController::class);
    Route::resource('properties' , PropertyController::class);

    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);

    Route::resource('sliders',SliderController::class);

    Route::resource('offers',OfferController::class);

});
