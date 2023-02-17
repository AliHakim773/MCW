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
Route::get('/users/{id}', [AuthController::class, 'show']);
Route::put('/users/{id}', [AuthController::class, 'update']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/updateProfileImage', [AuthController::class, 'updateProfileImage']);
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
Route::get('user',[AuthController::class,'get_current_user']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::post('/upload_image', [FunctionsUtilities::class, 'uploadImage']);


    Route::post('addMovieToList', function (Request $request) {
    $request->validate([
        'user_list_id' => 'required|integer',
        'movie_id' => 'required|integer',
        'user_id'=>'required|integer'
    ]);
    $function_utilities = new FunctionsUtilities;
    $user_list_id = $request->user_list_id;
    $movie_id = $request->movie_id;
    $user_id=$request->user_id;

    $function_utilities->Store_movie_to_list($user_list_id, $movie_id,$user_id);

});
Route::post('removeMovieFromList', function (Request $request) {
    $request->validate([
        'user_list_id' => 'required|integer',
        'movie_id' => 'required|integer'
    ]);
    $function_utilities = new FunctionsUtilities;
    $user_list_id = $request->user_list_id;
    $movie_id = $request->movie_id;

    $function_utilities->Remove_movie_from_list($user_list_id, $movie_id);

});
Route::post('followUser', function (Request $request) {
    $request->validate([
        'user_id' => 'required|integer',
        'followed_user_id' => 'required|integer'
    ]);
    $function_utilities = new FunctionsUtilities;
    $user_id = $request->user_id;
    $followed_user_id = $request->followed_user_id;

    $function_utilities->followFriend($user_id, $followed_user_id);
});
Route::post('unfollowUser', function (Request $request) {
    $request->validate([
        'user_id' => 'required|integer',
        'followed_user_id' => 'required|integer'
    ]);
    $function_utilities = new FunctionsUtilities;
    $user_id = $request->user_id;
    $followed_user_id = $request->followed_user_id;

    $function_utilities->unfollow($user_id, $followed_user_id);
});
Route::get('/get_users_by_letter/{letter}',[FunctionsUtilities::class,'get_users_by_letter']);
Route::get('/get_movies_by_letter/{letter}',[FunctionsUtilities::class,'get_movies_by_letter']);
Route::get('/isFollowed/{user_id}/{followed_user_id}', [FunctionsUtilities::class, 'isFollowed']);
Route::get('/followers/{user_id}', [FunctionsUtilities::class, 'getFollowers']);
Route::get('/userlistsOfUser/{user_id}', [FunctionsUtilities::class, 'get_user_lists_of_user']);
Route::get('/moviesInList/{user_list_id}', [FunctionsUtilities::class, 'movies_in_list']);
Route::get('/getAvgRating/{movie_id}', [MovieController::class, 'getAvgRating']);

Route::get('/listsOfUser/{user_id}', [FunctionsUtilities::class, 'get_user_lists']);
