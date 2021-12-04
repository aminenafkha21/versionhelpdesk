<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;






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


Auth::routes([]);




Route::middleware('auth')->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');



Route::resource('tickets', TicketController::class);
Route::resource('services', ServiceController::class);
Route::resource('users', UserController::class);

Route::get('/newticket', [App\Http\Controllers\TicketController::class, 'create']);


Route::get("removeticket/{id}",[TicketController::class,"removeTicket"]);
Route::get("editticket/{id}",[TicketController::class,"showTicket"]);
Route::post("/edit",[TicketController::class,"updateTicket"]);

Route::post("/assignedticket",[TicketController::class,"assignedTicket"]);
Route::post("/closeticket",[TicketController::class,"closeTicket"]);

Route::post("/confirmticket",[TicketController::class,"confirmTicket"]);
Route::get("/reopenticket/{id}",[TicketController::class,"reopenTicket"]);



Route::get('/newservice', [App\Http\Controllers\ServiceController::class, 'create']);
Route::get("/deleteservice/{id}",[ServiceController::class,"removeservice"]);
Route::get("editservice/{id}",[ServiceController::class,"showService"]);
Route::post("/editservice",[ServiceController::class,"updateService"]);


Route::get("/markasvnotification/{id}",[NotificationController::class,"markasvnotification"]);


Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
Route::post('/changePassword',[App\Http\Controllers\SettingsController::class, 'changePasswordPost'])->name('changePasswordPost');
Route::post('/changeNameandMail',[App\Http\Controllers\SettingsController::class, 'changeNameandMail'])->name('changeNameandMail');
Route::post('/deleteaccount',[App\Http\Controllers\SettingsController::class, 'deleteaccount'])->name('deleteaccount');





// Route::get('/users', [App\Http\Controllers\HomeController::class, 'users']);


Route::get('/{page}', [App\Http\Controllers\HomeController::class, 'error']);


});


Route::get('/{page}', [App\Http\Controllers\AdminController::class, 'index']);



