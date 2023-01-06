<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthController;
use App\Helper\FunctionsUtilities;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForumController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
////*/
//Route::get('/movies',[MovieController::class,'index']);
//Route::get('/movies/{id}',[MovieController::class,'show']);
//Route::post('/movie',[MovieController::class,'store']);
//Route::put('/movie/{id}',[MovieController::class,'update']);

Route::post('/register', [AuthController::class, 'register']);
Route::get('/users', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::apiResources([
    'movies' => MovieController::class,
    'roles' => RoleController::class,
    'actors' => ActorController::class,
    'genres' => GenreController::class,
    'rates' => RateController::class,
    'userLists' => UserListController::class,
    'forums'=> ForumController::class,
    'comments'=> CommentController::class
]);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('addMovieToList', function (Request $request) {
    $request->validate([
        'user_list_id' => 'required|integer',
        'movie_id' => 'required|integer'
    ]);
    $function_utilities = new FunctionsUtilities;
    $user_list_id = $request->user_list_id;
    $movie_id = $request->movie_id;

    $function_utilities->Store_movie_to_list($user_list_id, $movie_id);
});

Route::get('/moviesInList/{user_list_id}', [FunctionsUtilities::class, 'movies_in_list']);
Route::get('/listsOfUser/{user_id}', [FunctionsUtilities::class, 'get_user_lists']);
