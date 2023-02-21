<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;

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

/*-------------------------------------------- ROOT ROUTES --------------------------------------------*/

Route::group(['middleware' => 'globals'], function () {

    Route::get('/', [RootController::class, 'index']);

    Route::get('courses/filter', [RootController::class, 'multiCategoryFilter']);

    Route::get('courses/{category?}', [RootController::class, 'filterByCategory']);

    Route::get('course/{courseId}', [RootController::class, 'viewCourse']);

    Route::get('addToCart/{courseId}', [RootController::class, 'addToCart']);

    Route::get('removeFromCart/{courseId}', [RootController::class, 'removeFromCart']);

    Route::get('acceptCookies', [RootController::class, 'acceptCookies']);

    Route::get('denyCookies', [RootController::class, 'denyCookies']);

    Route::get('toggleThirdPartyCookies', [RootController::class, 'toggleThirdPartyCookies']);
    
     Route::get('removeCookies', [RootController::class, 'removeCookies']);

    Route::get('aboutUs', function () {return view('aboutUs');});

    Route::get('innobonos', function () {return view('innobonos');});

    Route::get('certifications', function () {return view('certifications');});

    Route::get('contact', function () {return view('contact');});

    Route::get('customerSupport', function () {return view('customerSupport');});

    Route::post('customerSupport', [RootController::class, 'customerSupport']);

    Route::get('requestRefund', function () {return view('requestRefund');});

    Route::post('requestRefund', [RootController::class, 'requestRefund']);

    Route::get('refunds', function () {return view('refunds');});

    Route::get('paymentMethods', function () {return view('paymentMethods');});

    Route::get('legalAdvice', function () {return view('legalAdvice');});

    Route::get('termsAndConditions', function () {return view('termsAndConditions');});

    Route::get('privacyPolicy', function () {return view('privacyPolicy');});

    Route::get('cookiesPolicy', function () {return view('cookiesPolicy');});

    Route::get('cookiesConfiguration', function () {return view('cookiesConfiguration');});

    /*-------------------------------------------- REGISTER ROUTES --------------------------------------------*/

    Route::get('confirm/{code}', [RegistrationController::class, 'confirmEmail']);

    Route::post('register', [RegistrationController::class, 'register']);

    /*-------------------------------------------- LOGIN ROUTES --------------------------------------------*/

    Route::post('login', [LoginController::class, 'login']);

    Route::get('resetPassword/{resetCode}', [LoginController::class, 'viewResetPasswordForm']);

    Route::post('resetPassword/{userId}', [LoginController::class, 'resetPassword']);

    Route::post('forgotPassword', [LoginController::class, 'forgotPassword']);

    Route::get('forgotPassword', function () {return view('forgotPassword');});

    /*-------------------------------------------- USER ROUTES --------------------------------------------*/

    Route::get('home', [UserController::class, 'home'])->middleware('auth');

    Route::get('wishList', [UserController::class, 'wishList'])->middleware('auth');

    Route::get('purchaseHistory', [UserController::class, 'purchaseHistory'])->middleware('auth');

    Route::get('configuration', [UserController::class, 'configuration'])->middleware('auth');

    Route::get('addToWishList/{courseId}', [UserController::class, 'addToWishList'])->middleware('auth');

    Route::get('removeFromWishList/{courseId}', [UserController::class, 'removeFromWishList'])->middleware('auth');

    Route::get('logout', [UserController::class, 'logout'])->middleware('auth');

    Route::post('editAccountInfo', [UserController::class, 'editAccountInfo'])->middleware('auth');

    Route::post('editAddress', [UserController::class, 'editAddress'])->middleware('auth');

    /*-------------------------------------------- ADMIN ROUTES --------------------------------------------*/

    Route::get('admin', [AdminController::class, 'admin']);

    Route::post('admin', [AdminController::class, 'login']);

    Route::get('admin/home', [AdminController::class, 'home'])->middleware('adminAuth');

    Route::get('admin/users', [AdminController::class, 'users'])->middleware('adminAuth');

    Route::get('admin/orders', [AdminController::class, 'orders'])->middleware('adminAuth');

    Route::get('admin/logout', [AdminController::class, 'logout'])->middleware('adminAuth');

    Route::post('admin/editCourse/{courseId}', [AdminController::class, 'editCourse'])->middleware('adminAuth');

    Route::get('admin/refund/{id}', [AdminController::class, 'refund'])->middleware('adminAuth');

    Route::get('refundValid', [AdminController::class, 'validateRefund'])->middleware('adminAuth');

    Route::get('refundInvalid', [AdminController::class, 'invalidateRefund'])->middleware('adminAuth');

    Route::post('notifyRefund', [AdminController::class, 'refundNotified']);

    /*-------------------------------------------- PAYMENT ROUTES --------------------------------------------*/

    Route::get('paymentGateway', [PaymentController::class, 'processPayment'])->middleware('auth');

    Route::get('invoiceValid', [PaymentController::class, 'validatePayment'])->middleware('auth');

    Route::get('invoiceInvalid', [PaymentController::class, 'invalidatePayment'])->middleware('auth');

    Route::post('notifyInvoice', [PaymentController::class, 'notifyPayment']);
});
