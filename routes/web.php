<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEmployeeController;
use App\Http\Controllers\AdminEquipmentContoller;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminScheduleController;
use App\Http\Controllers\AdminServiceCategoryController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceDetailController;
use App\Http\Controllers\UserServiceController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-home' , [AdminHomeController::class, 'index'])->name('admin-home');
});

Route::resource('/admin-service', AdminServiceController::class)->middleware(['auth', 'verified'])->names(['index' => 'admin-service']);

Route::get('/admin-schedule', [AdminScheduleController::class, 'index'])->name('admin-schedule');
Route::post('/admin-schedule', [AdminScheduleController::class, 'store'])->name('schedule-store');
Route::delete('/admin-schedule/{id}', [AdminScheduleController::class, 'destroy'])->name('delete-schedule');
Route::get('/admin-schedule/{id}/edit', [AdminScheduleController::class, 'edit'])->name('schedule-edit');
Route::put('/admin-schedule/{id}', [AdminScheduleController::class, 'update'])->name('schedule-update');

Route::resource('/admin-employee', AdminEmployeeController::class)->middleware(['auth', 'verified'])->names(['index' => 'admin-employee']);

Route::get('/admin-user', [AdminController::class, 'displayUser'])->name('admin-user');

Route::get('/admin-booking', [AdminBookingController::class, 'displayBooking'])->name('admin-booking');
Route::delete('/admin-booking/{id}', [AdminBookingController::class, 'destroy'])->name('booking-delete');
Route::post('/admin-booking/{id}', [AdminBookingController::class, 'changeStatus'])->name('change-status');

Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/about-us', function () {
    return view('user.aboutus');
})->middleware(['auth', 'verified'])->name('aboutus');

Route::get('/contact-us', [ContactController::class, 'index'])->name('contactus');
Route::post('/contac-tus', [ContactController::class, 'store'])->name('feedback');
Route::get('/admin-feedback', [ContactController::class, 'displayFeedback'])->name('admin-feedback');

Route::get('/faq', [FaqController::class, 'index'])->middleware(['auth', 'verified'])->name('faq');

Route::get('/positions', function(){
    return view('user.jobposition');
})->name('position');

Route::get('/service', [ServiceController::class, 'index'])->middleware(['auth', 'verified'])->name('service');
Route::get('/service/{categoryId}', [ServiceController::class, 'getServicesByCategory']);
Route::get('/service/details/{id}', [ServiceDetailController::class, 'displayService'])->name('service-details');
Route::post('/service/details/{id}/book', [BookingController::class, 'store'])->middleware(['auth'])->name('book.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
