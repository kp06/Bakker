<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});







Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['CheckUser']], function () {



        Route::get('/home', 'Admin\AdminController@home')->name('home');

        Route::get('/details', 'Admin\AdminController@details')->name('AddDetails');
        Route::post('/update', 'Admin\Admincontroller@updatedetails')->name('updateprofile');
        Route::get('/viewprofile/{id}', 'Admin\AdminController@viewprofile')->name('viewprofile');
        Route::get('/vieweditprofile/{id}', 'Admin\AdminController@showedit')->name('showeditprofile');
        Route::post('/editaction/{id}', 'Admin\Admincontroller@actEditProfile')->name('editprofile');
        Route::get('/addcategory', 'Admin\CategoryController@addcategory')->name('addcategory');
        Route::get('/showadmin', 'Admin\AdminController@showAdmin')->name('showadmin');
        Route::get('/deleteadmin/{id}', 'Admin\AdminController@deleteadmin')->name('deleteadmin');
        Route::get('/addBakery', 'Admin\bakkerController@newBakker')->name('addBakery');
        Route::get('/showeditbakery/{slug}','Admin\bakkerController@showEditBakery')->name('showeditbakery');
        Route::get('/deleteBakery/{id}','Admin\bakkerController@deleteBakery')->name('deletebakery');
        Route::post('/updateBakery/{id}','Admin\bakkerController@updateBakery')->name('updateBakery');

        Route::post('/actAdCategory', 'Admin\CategoryController@actAddCategory')->name('actAdCategory');
        Route::post('/act-Add-Bakery', 'Admin\bakkerController@addbakery')->name('actAddBakery');
        Route::get('/manage-category', 'Admin\CategoryController@manageCategory')->name('managecategory');
        Route::post('/act-manage-category', 'Admin\CategoryController@actManageCategory')->name('actManageCategory');
        Route::get('/Add-product', 'Admin\ProductController@viewAddProduct')->name('viewAddProduct');
        Route::post('/store-product', 'Admin\ProductController@storeProduct')->name('storeProduct');
        Route::get('/show-product', 'Admin\ProductController@showProduct')->name('showproduct');
        Route::get('/edit-product/{slug}', 'Admin\ProductController@showEditProduct')->name('showeditproduct');
        Route::post('/update-product/{id}', 'Admin\ProductController@updateProduct')->name('updateproduct');
        Route::get('/delete-product/{id}', 'Admin\ProductController@deleteProduct')->name('deleteproduct');
        Route::get('/show-bekery', 'Admin\bakkerController@showBakeries')->name('showbekery');
        Route::get('/show-beker-category/{slug}', 'Admin\CategoryController@showBakerCategory')->name('showbekercategory');
        Route::get('/show-category', 'Admin\CategoryController@showCategory')->name('showcategory');
        Route::get('/edit-category/{slug}', 'Admin\CategoryController@showEditCategory')->name('showeditcategory');
        Route::post('/update-category/{id}', 'Admin\CategoryController@updateCategory')->name('updatecategory');
        Route::get('/show-category-product/{slug}', 'Admin\ProductController@viewCategoryProduct')->name('showcategoryproduct');
        Route::get('/delete-category/{id}', 'Admin\CategoryController@deleteCategory')->name('deletecategory');
        Route::get('/add-menu','Admin\MenuController@showAddMenu')->name('addmenu');
        Route::post('/create-menu','Admin\MenuController@createMenu')->name('createmenu');
        Route::get('/add-menu-item','Admin\MenuItemController@addMenuItem')->name('addmenuitem');
        Route::post('/create-menu-item','Admin\MenuItemController@createMenuItem')->name('createmenuitem');
        Route::get('/view-menu','Admin\MenuController@showMenu')->name('showmenu');
        Route::get('/view-menu-item','Admin\MenuItemController@showMenuItem')->name('showmenuitem');
        Route::get('/view-parent-item/{slug}','Admin\MenuItemController@showParentItem')->name('show.parent.item');
        Route::get('/view-edit-menu/{slug}','Admin\MenuController@showEditMenu')->name('show.edit.menu');
        Route::post('/update-menu/{id}','Admin\MenuController@UpdateMenu')->name('update.menu');
        Route::get('/delete-menu/{id}','Admin\MenuController@deleteMenu')->name('delete.menu');
        Route::get('/view-edit-menu-item/{slug}','Admin\MenuItemController@showEditMenuItem')->name('show.edit.menuItem');
        Route::post('/update-menu-item/{id}','Admin\MenuItemController@UpdateMenuItem')->name('update.menu.item');
        Route::get('/delete-menu-item/{id}','Admin\MenuItemController@deleteMenuItem')->name('delete.menu.item');
        Route::get('/add-configuration','Admin\ConfigController@addConfiguration')->name('add.configuration');
        Route::post('/create-configuration','Admin\ConfigController@createConfiguration')->name('create-configuration');
        Route::get('/show-configuration','Admin\ConfigController@showConfiguration')->name('show-configuration');
        Route::get('/show-edit-configuration/{id}','Admin\ConfigController@showEditConfiguration')->name('show.edit.configuration');
        Route::post('/update-configuration/{id}','Admin\ConfigController@updateConfiguration')->name('update.configuration');
        Route::get('/delete-configuration/{id}','Admin\ConfigController@deleteConfiguration')->name('delete.configuration');
        
    });
    Route::get('/public', 'Admin\AdminController@temp')->name('public');
});
