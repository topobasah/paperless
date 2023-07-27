<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Backend\CollectionController;
use App\Http\Controllers\Backend\HakAksesController;
use App\Http\Controllers\Backend\CatalogController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\DashbookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Route::get('phpmyinfo', function () {
//     phpinfo();
// })->name('phpmyinfo');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(DashbookController::class)->group(function () {
    Route::get('/', 'AllDashbook')->name('all.dashbook');
    Route::get('/read/{id}', 'ReadBook')->name('read.book');
    Route::get('/read/pdf/{id}', 'ReadPdf')->name('read.pdf');
    Route::get('/lihat/{id}/{file}', 'viewFlipbook')->name('view.flipbook');
    Route::get('/lihat/pdf/{id}/{file}', 'viewPdf')->name('view.pdf');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
});

Route::middleware(['auth', 'role:anggota'])->group(function () {
    Route::get('/anggota/dashboard', [AnggotaController::class, 'AnggotaDashboard'])->name('anggota.dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(CollectionController::class)->group(function () {
        Route::get('/all/collections', 'AllCollections')->name('all.collections');
        Route::get('/add/collection', 'AddCollection')->name('add.collection');
        Route::post('/store/collection', 'StoreCollection')->name('store.collection');
        Route::get('/edit/collection/{id}', 'EditCollection')->name('edit.collection');
        Route::post('/update/collection', 'UpdateCollection')->name('update.collection');
        Route::get('/delete/collection/{id}', 'DeleteCollection')->name('delete.collection');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(HakAksesController::class)->group(function () {
        Route::get('/hakakses', 'AllHakAkses')->name('all.hakakses');
        Route::get('/add/hakakses', 'AddHakAkses')->name('add.hakakses');
        Route::post('/store/hakakses', 'StoreHakAkses')->name('store.hakakses');
        Route::get('/edit/hakakses/{id}', 'EditHakAkses')->name('edit.hakakses');
        Route::post('/update/hakakses', 'UpdateHakAkses')->name('update.hakakses');
        Route::get('/delete/hakakses/{id}', 'DeleteHakAkses')->name('delete.hakakses');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(CatalogController::class)->group(function () {
        Route::get('/all/catalogs', 'AllCatalogs')->name('all.catalogs');
        Route::get('/add/catalog', 'AddCatalog')->name('add.catalog');
        Route::post('/store/catalog', 'StoreCatalog')->name('store.catalog');
        Route::get('/edit/catalog/{id}', 'EditCatalog')->name('edit.catalog');
        Route::post('/update/catalog', 'UpdateCatalog')->name('update.catalog');
        Route::get('/delete/catalog/{id}', 'DeleteCatalog')->name('delete.catalog');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/permissions', 'AllPermissions')->name('all.permissions');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

        Route::get('/import/permission', 'ImportPermission')->name('import.permission');
        Route::get('/export', 'Export')->name('export');
        Route::post('/import', 'Import')->name('import');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/roles', 'AllRoles')->name('all.roles');
        Route::get('/add/role', 'AddRole')->name('add.role');
        Route::post('/store/role', 'StoreRole')->name('store.role');
        Route::get('/edit/role/{id}', 'EditRole')->name('edit.role');
        Route::post('/update/role', 'UpdateRole')->name('update.role');
        Route::get('/delete/role/{id}', 'DeleteRole')->name('delete.role');

        /////// Roles in Permission Menu /////////  
        Route::get('/add/role/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store', 'RolePermissionStore')->name('role.permission.store');
    });
});
