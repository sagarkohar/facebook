<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\SecondController;

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

// Route::get('/', function () {
//     return view('beforelogin/index');
// });

// Route::view("home", "beforelogin/index");

Route::get('/', [FirstController::class, 'index'])->name("index");
Route::get('home', [FirstController::class, 'index']);
Route::get('forgot', [FirstController::class, 'forgotAccount']);
Route::POST('/recovery', [FirstController::class,'recovery']);
Route::get('reset', [FirstController::class, 'reset']);
Route::get('otp', [FirstController::class, 'otp']);
Route::get('otp/{username}', [FirstController::class, 'resend']);
Route::get('resetpassword', [FirstController::class, 'resetPassword']);
Route::POST('loginKaro', [FirstController::class, 'loginKaro']);
Route::get('logout', [FirstController::class, 'logout']);
Route::POST('register', [FirstController::class, 'register']);
Route::get('resend', [FirstController::class, 'resend']);
Route::POST('resetPassword', [FirstController::class, 'reset_password']);
Route::get("resetPass", [FirstController::class, 'resetPass'])->name("reset");



// After login
Route::middleware('admin')->group(function () {
    Route::get('successlogin', [SecondController::class, 'home']);
    Route::get('messanger', [SecondController::class, 'messageKaro']);
    Route::get('message', [SecondController::class, 'message']);
    Route::get('profile', [SecondController::class, 'profile']);
    Route::post('/update_profile_picture', [SecondController::class, 'updateProfilePicture'])->name('update_profile_picture');
    Route::post("/changepassword", [SecondController::class, 'ChangePassword']);
    Route::get('friends', [SecondController::class, 'friends'])->name("friend");
    Route::POST("updateNameStatus", [SecondController::class, 'updateNameStatus']);
    Route::get("send_request{id}", [SecondController::class, 'sendRequest']);
    Route::get("accept_request{id}", [SecondController::class, 'confirmRequest']);
    Route::get("decline_request{id}", [SecondController::class, 'declineRequest']);
    Route::get('friend_profile{id}', [SecondController::class, 'friendProfile']);
    Route::post('post', [SecondController::class, 'Post']);
    Route::get("/liked{pId}", [SecondController::class, 'liked']);
    Route::post("/comment",[SecondController::class,'commentKaro'])->name("comment.post");
    Route::post('story', [SecondController::class, 'addStory']);

});