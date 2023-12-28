<?php

use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\FrontEnd\MenuController;
use App\Http\Controllers\FrontEnd\HomePageController;
use App\Http\Controllers\Mail\ContactController;




Route::get('/', function () {
    return view('home');
});


Route::get('/contact',function(){
    return view('contactus.contactus');

});


Route::controller(ContactController::class)->group(function(){
    Route::post('/contact/submit', 'submitContactForm')->name('contact.submit');

});


Route::controller(HomePageController::class)->group(function(){
    Route::get('/','ViewCategoryHome');

});

Route::controller(MenuController::class)->group(function(){
    Route::get('/menu','ViewProduct');

});

Route::controller(MenuController::class)->group(function(){
    Route::get('/menu', 'searchSort')->name('products.searchSort');


});


Route::post("/addcart/{id}",[CartController::class,'addCart']);

Route::get("/cart/{id}",[CartController::class,'showCart']);

Route::get("/remove/{id}",[CartController::class,'removeCart']);





Route::get('/welcome', function () {
    return view('home');
});







Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::controller(CategoryController::class)->group(function () {

        Route::get('admin/category', 'Category')->name('admin.category');
        Route::get('admin/addcategory', 'AddCategory')->name('admin.addcategory');
        Route::post('admin/storecategory', 'StoreCategory')->name('admin.storecategory');
        Route::get('admin/editcategory/{id}', 'EditCategory')->name('admin.editcategory');
        Route::put('admin/updatecategory/{id}', 'UpdateCategory');
        Route::get('admin/deletecategory/{id}', 'DeleteCategory')->name('admin.deletecategory');
        


    });

    Route::controller(ProductController::class)->group(function () {

        Route::get('admin/products', 'Product')->name('admin.products');
        Route::get('admin/addproducts', 'AddProducts')->name('admin.addproducts');
        Route::post('admin/storeproducts', 'StoreProducts')->name('admin.storeproducts');
        Route::get('admin/editproduct/{id}','EditProduct');
        Route::put('admin/updateproduct/{id}','UpdateProducts');
        Route::get('admin/deleteproduct/{id}', 'DeleteProduct')->name('admin.deleteproduct');
        


    });

    Route::controller(UserController::class)->group(function(){
        Route::get('admin/users','Users')->name('admin.users');
        Route::get('admin/addusers','AddUsers')->name('admin.addusers');
        Route::post('admin/storeusers', 'StoreUsers')->name('admin.storeusers');
        Route::get('admin/edituser/{id}','EditUser');
        Route::put('admin/updateuser/{id}','UpdateUser');
        Route::get('admin/deleteuser/{id}', 'DeleteUser')->name('admin.deleteuser');


    });





    Route::get('/admin/orders', [AdminController::class, 'Orders'])->name('admin.orders');
    //Route::get('/admin/users', [AdminController::class, 'Users'])->name('admin.users');
    //Route::get('/admin/addusers', [AdminController::class, 'AddUsers'])->name('admin.addusers');

}); // End group  Admin Middleware





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::
require __DIR__ . '/auth.php';




