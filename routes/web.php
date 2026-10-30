<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FloatingImageController;
use App\Http\Controllers\Admin\PasswordController;

use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\SendTestEmail;





/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/contact', function () {
    return view('frontend.contact');
});

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.submit');
    
    Route::post('/contact-submit', [
    ContactController::class,
    'store'
])->name('contact.submit');

Route::get('/bulk_order', function () {
    return view('frontend.bulk_order');
});

Route::get('/retail', function () {
    return view('frontend.retail');
});

Route::get('/thankyou', function () {
    return view('frontend.thankyou');
});

/*
|--------------------------------------------------------------------------
| Admin Login Routes
|--------------------------------------------------------------------------

*/
// Login page
// Login page — accessible without login
Route::get('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'loginSubmit'])
    ->name('admin.login.submit');

// Protected admin pages — login required
Route::middleware('auth:admin')->prefix('admin')->group(function () {


    Route::post('/logout', [AdminController::class, 'logout'])
        ->name('admin.logout');
});

Route::middleware('auth:admin')->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.pages.index');
    })->name('admin.dashboard');

    Route::get('/change-password', [AdminController::class, 'changepassword'])
        ->name('admin.change-password');

    Route::post('/update-password', [AdminController::class, 'update_password'])
        ->name('admin.update-password');


});

// Admin Profile
Route::get('/admin/profile', [AdminController::class, 'profile'])
    ->name('admin.profile');

Route::post('/save-profile', [AdminController::class, 'save_profile'])
    ->name('admin.save-profile');


Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'profile'])
        ->name('admin.profile');

    Route::post('/admin/save-profile', [AdminController::class, 'save_profile'])
        ->name('admin.save-profile');

    Route::post('/admin/delete-profile-image', [AdminController::class, 'deleteProfileImage'])
        ->name('admin.delete-profile-image');
});

Route::middleware('auth:admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('testimonials', TestimonialController::class);
                Route::resource('floating-images', FloatingImageController::class);
    });

Route::get('/send-mail', function () {
    $message = 'Hey, this is a test email from Laravel 12 + Livewire starter kit.';

    Mail::to('vijayakarthik13@gmail.com')
        ->send(new SendTestEmail($message));

    return 'Email sent successfully!';
});
// Login
// Public login routes
// Route::get('/admin/login', [AuthController::class, 'showLoginForm'])
//     ->name('admin.login');

// Route::post('/admin/login', [AuthController::class, 'login'])
//     ->name('admin.auth.login.submit');

// // Forgot password: no login required
// Route::get('/admin/forgot-password', [
//     PasswordController::class,
//     'showForgotPasswordForm'
// ])->name('admin.auth.password.request');

// // Authenticated admin routes
// Route::middleware('auth:admin')->group(function () {

//     Route::get('/admin/dashboard', [DashboardController::class, 'index'])
//         ->name('admin.dashboard');

//     Route::post('/admin/logout', [AuthController::class, 'logout'])
//         ->name('admin.logout');

//     Route::get('/admin/change-password', [PasswordController::class, 'edit'])
//         ->name('admin.auth.password.change');

//     Route::post('/admin/change-password', [PasswordController::class, 'update'])
//         ->name('admin.auth.password.update');
// });
