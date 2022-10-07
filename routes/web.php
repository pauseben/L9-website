<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use Alexusmai\LaravelFileManager\Controllers\FileManagerController;

use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Models\Post;
use App\Models\Page;

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






Auth::routes();

 /*
     * A csoporthoz tartozó route-okhoz autentikáció szükséges
 */
Route::group(['middleware' => ['auth', 'permission']], function() {
    Route::resource('products', ProductController::class);
    Route::resource('posts', PostController::class);
    Route::resource('category', PostCategoryController::class);
    Route::resource('pages',PageController::class);
    Route::resource('menu',MenuController::class);
    /*Route::get('/posts/category/list',[PostController::class, 'listPostCategories']);
    Route::get('/posts/category/create',[PostController::class, 'createPostCategories'])->name('category.create');
    Route::get('/posts/category/list', function(){
        return View::make('posts.category.list');
    });*/


                                                                                                    //permission name to validate
    Route::get('/admin/contact-form-list',[ContactUsFormController::class, 'listContacts'])->name('contact-form-list');
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users/list', [App\Http\Controllers\UsersController::class, 'list'])->name('users.list');
    Route::get('/users/create', [App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
    Route::get('/users/profile', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
    Route::get('/users/edit-user/{id}',[App\Http\Controllers\UsersController::class, 'editUser'])->name('edit.user'); //Jogosultság szükséges
    
    
    Route::post('/users/store', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
    Route::post('/users/{user}/update', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/destroy/{user}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.destroy');
    
    Route::get('/users/impersonate/{id}', [App\Http\Controllers\UsersController::class, 'impersonate'])->name('impersonate');//Jogosultság szükséges
    Route::get('/leave-impersonate', [App\Http\Controllers\UsersController::class, 'leaveImpersonate'])->name('users.leave-impersonate');//Jogosultság szükséges

    Route::get('/file-manager', [App\Http\Controllers\AdminController::class, 'fileManager'])->name('fileManager');

    Route::resource('permissions', PermissionsController::class);
    Route::resource('roles', RolesController::class);
    
    
    Route::post('/store-order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/my-orders', [OrderController::class, 'my_orders'])->name('my-orders');
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{order}', [OrderController::class, 'show']);
    
    
    //Route::post('/upload/image', [App\Http\Controllers\PageController::class, 'upload']);

    Route::get('/logs', [AdminController::class, 'logs'])->name('logs');
    
    //File Manager Routes
    Route::get('/file-manager/ckeditor', [FileManagerController::class, 'ckeditor']);
    Route::get('/file-manager/content', [FileManagerController::class, 'content']);
    Route::get('/file-manager/create-directory', [FileManagerController::class, 'createDirectory']);
    Route::get('/file-manager/create-file', [FileManagerController::class, 'createFile']);
    Route::get('/file-manager/delete', [FileManagerController::class, 'delete']);
    Route::get('/file-manager/download', [FileManagerController::class, 'download']);
    Route::get('/file-manager/fm-button', [FileManagerController::class, 'fmButton']);
    Route::get('/file-manager/initialize', [FileManagerController::class, 'initialize']);
    Route::get('/file-manager/paste', [FileManagerController::class, 'paste']);
    Route::get('/file-manager/preview', [FileManagerController::class, 'preview']);
    Route::get('/file-manager/rename', [FileManagerController::class, 'rename']);
    Route::get('/file-manager/select-disk', [FileManagerController::class, 'selectDisk']);
    Route::get('/file-manager/stream-file', [FileManagerController::class, 'streamFile']);
    Route::get('/file-manager/summernote', [FileManagerController::class, 'summernote']);
    Route::get('/file-manager/thumbnails', [FileManagerController::class, 'thumbnails']);
    Route::get('/file-manager/tinymce', [FileManagerController::class, 'tinymce']);
    Route::get('/file-manager/tinymce5', [FileManagerController::class, 'tinymce5']);
    Route::get('/file-manager/tree', [FileManagerController::class, 'tree']);
    Route::get('/file-manager/unzip', [FileManagerController::class, 'unzip']);
    Route::get('/file-manager/update-file', [FileManagerController::class, 'updateFile']);
    Route::get('/file-manager/upload', [FileManagerController::class, 'upload']);
    Route::get('/file-manager/url', [FileManagerController::class, 'url']);
    Route::get('/file-manager/zip', [FileManagerController::class, 'zip']);

    

});

 /*
     * Kívülről elérhető linkek
 */
/*
    ~ Főoldal
*/
Route::get('/', function(){
    $posts = Post::where('category_id','3')
                    ->where('status','=',1)
                    ->limit(3)->get();
    return View::make('pages.home')->with(compact('posts'));
 });
 


//Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/kapcsolat', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Route::get('/blog/{slug}', [PostController::class, 'show']);
Route::get('/blog/category/{category_id}', [PostCategoryController::class, 'show']);
Route::get('/blog', [PostController::class, 'blog']);

Route::get('/food-delivery', [ProductController::class, 'food_delivery']);


Route::get('/{slug}', [PageController::class, 'show']);
View::composer('layouts.default', function ($view) {
    // menu_id(1)Főmenü
    $pages = Page::where([
        ['status','=',1],
        ['menu_id','=',1]
    ])->get();
    $view->with('pages',$pages);
});












