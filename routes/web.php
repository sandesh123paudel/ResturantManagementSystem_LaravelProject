<?php

use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\FrontEnd\CartController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\FrontEnd\MenuController;
use App\Http\Controllers\FrontEnd\HomePageController;
use App\Http\Controllers\Mail\ContactController;
use App\Http\Controllers\FrontEnd\CheckOutController;
use App\Http\Controllers\FrontEnd\FUserController;





Route::get('/', function () {
    return view('frontend.home');
});


Route::get('/contact', function () {
    return view('contactus.contactus');

});
Route::get('/about-us', function () {
    return view('frontend.aboutus');

});

Route::controller(ContactController::class)->group(function () {
    Route::post('/send-message', 'sendEmail')->name('contact.submit');

});


Route::controller(HomePageController::class)->group(function () {
    Route::get('/', 'viewCategoryHome');

});

Route::controller(MenuController::class)->group(function () {
    Route::get('/menu', 'viewProduct');

});

Route::controller(MenuController::class)->group(function () {
    Route::get('/menu', 'searchSort')->name('products.searchSort');


});




Route::middleware(['auth'])->group(function () {
    Route::post("/addcart/{id}", [CartController::class, 'addCart']);

    Route::get("/cart/{id}", [CartController::class, 'showCart']);

    Route::get("/remove/{id}", [CartController::class, 'removeCart']);

    Route::get("/checkout", [CheckOutController::class, 'index'])->name('checkout');

    Route::post("/place-order", [CheckOutController::class, 'placeorder']);
    Route::get('payment-cancel',[PayPalController::class,'cancel'])->name('payment.cancel');
    Route::get('payment-success',[PayPalController::class,'success'])->name('payment.success');
    
    




    Route::get("my-orders", [FUserController::class, 'index']);
    Route::controller(HomePageController::class)->group(function () {
        Route::get('/dashboard', 'viewCategoryHome');

    });


    Route::get("view-order/{id}", [FUserController::class, 'view']);

    Route::get('my-profile', [FUserController::class, 'viewprofile'])->name('my-profile');


    Route::get('edit-profile/{id}', [FUserController::class, 'editprofile']);

    Route::put('updateprofile/{id}', [FUserController::class, 'updateprofile']);
});









Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

    Route::controller(CategoryController::class)->group(function () {

        Route::get('admin/category', 'category')->name('admin.category');
        Route::get('admin/addcategory', 'addCategory')->name('admin.addcategory');
        Route::post('admin/storecategory', 'storeCategory')->name('admin.storecategory');
        Route::get('admin/editcategory/{id}', 'editCategory')->name('admin.editcategory');
        Route::put('admin/updatecategory/{id}', 'updateCategory');
        Route::get('admin/deletecategory/{id}', 'deleteCategory')->name('admin.deletecategory');



    });

    Route::controller(ProductController::class)->group(function () {

        Route::get('admin/products', 'product')->name('admin.products');
        Route::get('admin/addproducts', 'addProducts')->name('admin.addproducts');
        Route::post('admin/storeproducts', 'storeProducts')->name('admin.storeproducts');
        Route::get('admin/editproduct/{id}', 'editProduct');
        Route::put('admin/updateproduct/{id}', 'updateProducts');
        Route::get('admin/deleteproduct/{id}', 'deleteProduct')->name('admin.deleteproduct');



    });

    Route::controller(UserController::class)->group(function () {
        Route::get('admin/users', 'users')->name('admin.users');
        Route::get('admin/addusers', 'addUsers')->name('admin.addusers');
        Route::post('admin/storeusers', 'storeUsers')->name('admin.storeusers');
        Route::get('admin/edituser/{id}', 'editUser');
        Route::put('admin/updateuser/{id}', 'updateUser');
        Route::get('admin/deleteuser/{id}', 'deleteUser')->name('admin.deleteuser');


    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('admin/orders', 'order')->name('admin.orders');
        Route::patch('/admin/orders/{order}', 'updateStatus')->name('admin.updateStatus');

        Route::get('/order/{id}', 'show')->name('admin.viewOrder');



    });


}); // End group  Admin Middleware


//Route::
require __DIR__ . '/auth.php';




