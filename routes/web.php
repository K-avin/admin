<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Dashboard
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'Dashboard'])->name('dashboard.index')->middleware('auth');

// Restaurant
Route::get('/restaurants', [App\Http\Controllers\RestaurantController::class, 'restaurantIndex'])->name('view.index')->middleware('auth');
Route::get('/restaurant/add', [App\Http\Controllers\RestaurantController::class, 'addRestaurant'])->name('view.add')->middleware('auth');
Route::get('/restaurant/edit/{id}', [App\Http\Controllers\RestaurantController::class, 'editRestaurant'])->name('view.edit')->middleware('auth');
Route::get('/delte-restaurant/{id}', [App\Http\Controllers\RestaurantController::class, 'destroy'])->middleware('auth');
Route::post('/restaurant', [App\Http\Controllers\RestaurantController::class, 'storeRestaurant'])->name('add-restaurant')->middleware('auth');
Route::post('/update-restaurant/{id}', [App\Http\Controllers\RestaurantController::class, 'update'])->name('edit-restaurant')->middleware('auth');;

// Orders
Route::get('/orders', [App\Http\Controllers\AdminController::class, 'ordersIndex'])->name('orders.index')->middleware('auth');

// Dishes
Route::get('/dishes', [App\Http\Controllers\DishesController::class, 'dishesIndex'])->name('dishes.index')->middleware('auth');
Route::get('/dishe/add', [App\Http\Controllers\DishesController::class, 'addDishes'])->name('dishes.add')->middleware('auth');
Route::get('/dish/edit/{id}', [App\Http\Controllers\DishesController::class, 'editDish'])->name('dish.edit')->middleware('auth');
Route::post('/dishe', [App\Http\Controllers\DishesController::class, 'storeDishes'])->name('add-dishes')->middleware('auth');
Route::post('/update-dish/{id}', [App\Http\Controllers\DishesController::class, 'update'])->name('edit-dish')->middleware('auth');;
Route::get('/delete-dish/{id}', [App\Http\Controllers\DishesController::class, 'destroy'])->middleware('auth');

// Dishe Category
Route::get('/dishes/category', [App\Http\Controllers\DisheCategoryController::class, 'categoryIndex'])->name('category.index')->middleware('auth');
Route::get('/dishe/category/add', [App\Http\Controllers\DisheCategoryController::class, 'addCategory'])->name('category.add')->middleware('auth');
Route::get('/dish/category/edit/{id}', [App\Http\Controllers\DisheCategoryController::class, 'editCategory'])->name('category.edit')->middleware('auth');
Route::post('/category', [App\Http\Controllers\DisheCategoryController::class, 'storeCategory'])->name('add-category')->middleware('auth');
Route::post('/update-category/{id}', [App\Http\Controllers\DisheCategoryController::class, 'update'])->name('edit-category')->middleware('auth');;
Route::get('/delete-category/{id}', [App\Http\Controllers\DisheCategoryController::class, 'destroy'])->middleware('auth');

// Customers
Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'customersIndex'])->name('customer.index')->middleware('auth');
Route::get('/delete-customer/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->middleware('auth');
Route::post('/update-customer/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('update-customer')->middleware('auth');

// Tables
Route::get('/tables', [App\Http\Controllers\TableController::class, 'tablesIndex'])->name('table.index')->middleware('auth');
Route::get('/table/add', [App\Http\Controllers\TableController::class, 'addTable'])->name('table.add')->middleware('auth');
Route::get('/table/edit/{id}', [App\Http\Controllers\TableController::class, 'editTable'])->name('table.edit')->middleware('auth');
Route::post('/table', [App\Http\Controllers\TableController::class, 'storeTable'])->name('add-table')->middleware('auth');
Route::post('/update-table/{id}', [App\Http\Controllers\TableController::class, 'update'])->name('edit-table')->middleware('auth');
Route::get('/delete-table/{id}', [App\Http\Controllers\TableController::class, 'destroy'])->middleware('auth');