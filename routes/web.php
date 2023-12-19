<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('slider');
});




Route::get('/welcome', function () {
    return view('slider');
});



Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/category', [AdminController::class, 'Category'])->name('admin.category');
    Route::get('/admin/addcategory', [AdminController::class, 'AddCategory'])->name('admin.addcategory');
    Route::get('/admin/item', [AdminController::class, 'Item'])->name('admin.item');
    Route::get('/admin/additem', [AdminController::class, 'AddItem'])->name('admin.additem');
    Route::get('/admin/products', [AdminController::class, 'Products'])->name('admin.products');
    Route::get('/admin/addproducts', [AdminController::class, 'AddProducts'])->name('admin.addproducts');
    Route::get('/admin/orders', [AdminController::class, 'Orders'])->name('admin.orders');
    Route::get('/admin/users', [AdminController::class, 'Users'])->name('admin.users');
    Route::get('/admin/addusers', [AdminController::class, 'AddUsers'])->name('admin.addusers');







});// End group  Admin Middleware


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::
require __DIR__.'/auth.php';




