<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Models\Post;
use Illuminate\Support\Facades\Request;

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

Route::get('/', [PostsController::class, 'index'])->name('index');





Route::prefix('/posts')->name('blog_posts')->group(function () {
    Route::get('/', [PostsController::class, 'index']);

    Route::middleware('auth')->group(function () {
        Route::get('/create', [PostsController::class, 'create']);
        Route::post('/', [PostsController::class, 'store']);
    });
});

Route::get('/dashboard', function(Request $request){
    $user_posts = Post::where('user_id', auth()->id())->get();
    return view('dashboard', ['posts' => $user_posts]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    /**
     * @name: profile related routes
     * 
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    
});


/* Route::prefix('/blog')->name('blog.')->group(function () {
    Route::get('/', [PostsController::class, 'index'])->name('index');
    Route::post('/post', [PostsController::class, 'store'])->name('store_posts');
});
 */

Route::get('/editor',function(){
    return view('editor');
});


require __DIR__.'/auth.php';
