<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

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

define('paginate_count', 5);
Route::get('/', function () {
    return view("home");
})->middleware('auth');
Route::resource("test", TestController::class);
Route::get("getcont", [TestController::class, 'getcont']);
Route::post("addcont", [TestController::class, 'addTest']);
Route::put("updatecont", [TestController::class, 'updateTest']);
Route::delete("deletecont/{id}", [TestController::class, 'deleteTest']);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("Auth");




//pagination
Route::get('/page', function () {
    // $data = DB::table('tests')->paginate(paginate_count)->toArray();
    // // foreach ($data as $value) {
    // //     echo $value->id ;
    // // }  
    // return $data["links"][0]["label"];
    // // return $data;
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
    return $ip;
});