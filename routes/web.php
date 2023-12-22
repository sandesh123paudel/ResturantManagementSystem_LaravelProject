<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;

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

Route::get('/', function () {
    return view('home');
});




Route::get('/welcome', function () {
    return view('home');
});


// Route::middleware(['auth','role:admin,user'])->group(function(){
//     Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
// });

Route::middleware(['auth', 'role:admin'])->group(function () {




});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::controller(CategoryController::class)->group(function () {

        Route::get('admin/category', 'Category')->name('admin.category');
        Route::get('admin/addcategory', 'AddCategory')->name('admin.addcategory');
        Route::post('admin/storecategory', 'StoreCategory')->name('admin.storecategory');
        Route::get('admin/editcategory/{id}', 'EditCategory')->name('admin.editcategory');
        Route::post('admin/updatecategory', 'UpdateCategory')->name('admin.updatecategory');
        Route::get('admin/deletecategory/{id}', 'DeleteCategory')->name('admin.deletecategory');
    });

    Route::controller(ProductController::class)->group(function () {

        Route::get('admin/products', 'Product')->name('admin.products');
        Route::get('admin/addproducts', 'AddProducts')->name('admin.addproducts');
        Route::post('admin/storeproducts', 'StoreProducts')->name('admin.storeproducts');


    });




    //Route::get('/admin/products', [AdminController::class, 'Products'])->name('admin.products');
    // Route::get('/admin/addproducts', [AdminController::class, 'AddProducts'])->name('admin.addproducts');
    Route::get('/admin/orders', [AdminController::class, 'Orders'])->name('admin.orders');
    Route::get('/admin/users', [AdminController::class, 'Users'])->name('admin.users');
    Route::get('/admin/addusers', [AdminController::class, 'AddUsers'])->name('admin.addusers');

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




