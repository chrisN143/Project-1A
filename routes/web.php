<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ViewController;

Route::get('/', [AuthController::class, 'login']);

/* Auth */
Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginStore')->name('login.store');
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'registerStore')->name('register.store');
    });
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::post('/logout', 'logout')->name('logout');
    });
});

Route::group(['middleware' => 'auth'], function () {
    /* Users */
    Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
        Route::middleware('role_or_permission:Admin')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('data_table', 'data_table')->name('data_table');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('show/{user}', 'show')->name('show');
            Route::get('edit/{user}', 'edit')->name('edit');
            Route::put('update/{user}', 'update')->name('update');
            Route::delete('destroy/{user}', 'destroy')->name('destroy');
        });
    });

    /* Permissions */
    Route::controller(PermissionController::class)->prefix('permission')->name('permission.')->group(function () {
        Route::middleware('role_or_permission:Admin')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('data_table', 'data_table')->name('data_table');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{permission}', 'edit')->name('edit');
            Route::put('update/{permission}', 'update')->name('update');
            Route::delete('destroy/{permission}', 'destroy')->name('destroy');
        });
    });

    /* Roles */
    Route::controller(RoleController::class)->prefix('role')->name('role.')->group(function () {
        Route::middleware('role_or_permission:Admin')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('data_table', 'data_table')->name('data_table');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('show/{role}', 'show')->name('show');
            Route::get('edit/{role}', 'edit')->name('edit');
            Route::put('update/{role}', 'update')->name('update');
            Route::delete('destroy/{role}', 'destroy')->name('destroy');
        });
    });

    Route::prefix('product')->name('item.')->group(function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/detail', 'detail')->name('detail');
        });
    });

    Route::prefix('payment')->name('payment.')->group(function () {
        Route::controller(PaymentController::class)->group(function () {
            Route::get('/', 'index')->name('detail');
            Route::get('/detail', 'detail')->name('detail');
        });
    });
    Route::prefix('transaction')->name('transaction.')->group(function () {
        Route::controller(TransationController::class)->group(function () {
            Route::get('/', 'index')->name('detail');
            Route::get('/detail', 'detail')->name('detail');
        });
    });

    Route::prefix('store')->name('store.')->group(function () {
        Route::controller(StoreController::class)->group(function () {
            Route::get('/', 'index')->name('detail');
            Route::get('/detail', 'detail')->name('detail');
        });
    });

    Route::prefix('dontgiveme30dollarhaircut')->name('dontgiveme30dollarhaircut.')->group(function () {
        Route::controller(StoreController::class)->group(function () {
            Route::get('/', 'index')->name('detail');   
            Route::get('/detail', 'detail')->name('detail');
        });
    });

    Route::prefix('30dollarhaircut')->name('dollarhaircut.')->group(function () {
        Route::controller(StoreController::class)->group(function () {
            Route::get('/', 'index')->name('detail');   
            Route::get('/detail', 'detail')->name('detail');
        });
    });
});
Route::controller(PermissionController::class)->prefix('permission')->name('permission.')->group(function () {
    Route::middleware('role_or_permission:Admin')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('data_table', 'data_table')->name('data_table');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{permission}', 'edit')->name('edit');
        Route::put('update/{permission}', 'update')->name('update');
        Route::delete('destroy/{permission}', 'destroy')->name('destroy');
    });
});
Route::controller(PermissionController::class)->prefix('permission')->name('permission.')->group(function () {
    Route::middleware('role_or_permission:Admin')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('data_table', 'data_table')->name('data_table');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{permission}', 'edit')->name('edit');
        Route::put('update/{permission}', 'update')->name('update');
        Route::delete('destroy/{permission}', 'destroy')->name('destroy');
    });
});
