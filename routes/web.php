
<?php

use Illuminate\Support\Facades\Route;

Route::get('/',\App\Http\Livewire\Pages\Home::class)->name('home');
Route::get('/community',\App\Http\Livewire\Pages\Community::class)->name('community');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/profile/{id?}',\App\Http\Livewire\Pages\Profile::class)->name('profile');
    Route::get('/user/edit',\App\Http\Livewire\Pages\Profile\Edit::class)->name('user.edit');
    Route::get('/post/create',\App\Http\Livewire\Pages\Post\Create::class)->name('post.create');
    Route::get('/inbox',\App\Http\Livewire\Pages\Inbox::class)->name('inbox');
    Route::post('/feed/delete',[\App\Http\Controllers\FeedController::class,'delete'])->name('feed.delete');
    Route::post('/post/delete',[\App\Http\Controllers\PostController::class,'delete'])->name('post.delete');
    Route::get('/notifications',\App\Http\Livewire\Pages\Notifications::class)->name('notifications');
    Route::post('/notification/delete',[\App\Http\Controllers\NotificationController::class,'delete'])->name('notification.delete');
    Route::post('/comment/delete',[\App\Http\Controllers\CommentController::class,'delete'])->name('comment.delete');
    Route::get('/admin',\App\Http\Livewire\Pages\Admin::class)->name('admin');
    Route::get('/admin/posts',\App\Http\Livewire\Pages\Admin\Posts::class)->name('admin.posts');
    Route::get('/admin/categories',\App\Http\Livewire\Pages\Admin\Categories::class)->name('admin.categories');
    Route::get('/admin/general',\App\Http\Livewire\Pages\Admin\General::class)->name('admin.general');
    Route::post('/user/delete',[\App\Http\Controllers\UserController::class,'delete'])->name('user.delete');
    Route::post('/category/delete',[\App\Http\Controllers\CategoryController::class,'delete'])->name('category.delete');
});

Route::middleware([
    'auth:web'
])->group(function(){
    Route::post('/loginas',[\App\Http\Controllers\LoginAsController::class,'loginas'])->name('loginas');
});
Route::get('/category/{id}',\App\Http\Livewire\Pages\Category::class)->name('category');
