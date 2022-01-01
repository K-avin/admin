<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Dashboard
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'Dashboard'])->name('dashboard.index')->middleware('is_admin');

// Restaurant
Route::get('/restaurants', [App\Http\Controllers\RestaurantController::class, 'restaurantIndex'])->name('view.index')->middleware('is_admin');
Route::get('/restaurant/add', [App\Http\Controllers\RestaurantController::class, 'addRestaurant'])->name('view.add')->middleware('is_admin');
Route::get('/restaurant/edit/{id}', [App\Http\Controllers\RestaurantController::class, 'editRestaurant'])->name('view.edit')->middleware('is_admin');
Route::get('/delte-restaurant/{id}', [App\Http\Controllers\RestaurantController::class, 'destroy'])->middleware('is_admin');
Route::post('/restaurant', [App\Http\Controllers\RestaurantController::class, 'storeRestaurant'])->name('add-restaurant')->middleware('is_admin');
Route::post('/update-restaurant/{id}', [App\Http\Controllers\RestaurantController::class, 'update'])->name('edit-restaurant')->middleware('is_admin');;

// Orders
Route::get('/orders', [App\Http\Controllers\AdminController::class, 'ordersIndex'])->name('orders.index')->middleware('is_admin');

// Dishes
Route::get('/dishes', [App\Http\Controllers\DishesController::class, 'dishesIndex'])->name('dishes.index')->middleware('is_admin');
Route::get('/dishe/add', [App\Http\Controllers\DishesController::class, 'addDishes'])->name('dishes.add')->middleware('is_admin');
Route::get('/dish/edit/{id}', [App\Http\Controllers\DishesController::class, 'editDish'])->name('dish.edit')->middleware('is_admin');
Route::post('/dishe', [App\Http\Controllers\DishesController::class, 'storeDishes'])->name('add-dishes')->middleware('is_admin');
Route::post('/update-dish/{id}', [App\Http\Controllers\DishesController::class, 'update'])->name('edit-dish')->middleware('is_admin');;
Route::get('/delete-dish/{id}', [App\Http\Controllers\DishesController::class, 'destroy'])->middleware('is_admin');

// Dishe Category
Route::get('/dishes/category', [App\Http\Controllers\DisheCategoryController::class, 'categoryIndex'])->name('category.index')->middleware('is_admin');
Route::get('/dishe/category/add', [App\Http\Controllers\DisheCategoryController::class, 'addCategory'])->name('category.add')->middleware('is_admin');
Route::get('/dish/category/edit/{id}', [App\Http\Controllers\DisheCategoryController::class, 'editCategory'])->name('category.edit')->middleware('is_admin');
Route::post('/category', [App\Http\Controllers\DisheCategoryController::class, 'storeCategory'])->name('add-category')->middleware('is_admin');
Route::post('/update-category/{id}', [App\Http\Controllers\DisheCategoryController::class, 'update'])->name('edit-category')->middleware('is_admin');;
Route::get('/delete-category/{id}', [App\Http\Controllers\DisheCategoryController::class, 'destroy'])->middleware('is_admin');

// Customers
Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'customersIndex'])->name('customer.index')->middleware('is_admin');
Route::get('/delete-customer/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->middleware('is_admin');
Route::post('/update-customer/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('update-customer')->middleware('is_admin');

// Tables
Route::get('/tables', [App\Http\Controllers\TableController::class, 'tablesIndex'])->name('table.index')->middleware('is_admin');
Route::get('/table/add', [App\Http\Controllers\TableController::class, 'addTable'])->name('table.add')->middleware('is_admin');
Route::get('/table/edit/{id}', [App\Http\Controllers\TableController::class, 'editTable'])->name('table.edit')->middleware('is_admin');
Route::post('/table', [App\Http\Controllers\TableController::class, 'storeTable'])->name('add-table')->middleware('is_admin');
Route::post('/update-table/{id}', [App\Http\Controllers\TableController::class, 'update'])->name('edit-table')->middleware('is_admin');
Route::get('/delete-table/{id}', [App\Http\Controllers\TableController::class, 'destroy'])->middleware('is_admin');