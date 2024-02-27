<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardMemberController;
use App\Http\Controllers\DashboardStaffController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Route::middleware(['guest'])->group(function () {
    Route::match(['get', 'post'], '/login', [AuthController::class, 'login']);
    Route::match(['get', 'post'], '/register', [AuthController::class, 'register']);
});

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/profile', [ProfileController::class, 'index']);
Route::match(['get', 'post'], '/profile/update', [ProfileController::class, 'update']);
Route::match(['get', 'post'], '/profile/password/update', [ProfileController::class, 'updatePassword']);

Route::middleware(['role:administrator'])->group(function () {
    Route::get('admin/dashboard', [DashboardAdminController::class, 'showDashboard']);

    Route::get('admin/dashboard/book', [DashboardAdminController::class, 'showBook']);
    Route::match(['get', 'post'], 'admin/dashboard/book/insert', [DashboardAdminController::class, 'insertBook']);
    Route::match(['get', 'post'], 'admin/dashboard/book/update/{id}', [DashboardAdminController::class, 'updateBook']);
    Route::match(['get', 'post'], 'admin/dashboard/book/delete/{id}', [DashboardAdminController::class, 'deleteBook']);
    Route::get('admin/dashboard/book/detail/{id}', [DashboardAdminController::class, 'showDetailBook']);

    Route::get('admin/dashboard/category', [DashboardAdminController::class, 'showCategory']);
    Route::match(['get', 'post'], 'admin/dashboard/category/insert', [DashboardAdminController::class, 'insertCategory']);
    Route::match(['get', 'post'], 'admin/dashboard/category/update/{id}', [DashboardAdminController::class, 'updateCategory']);
    Route::match(['get', 'post'], 'admin/dashboard/category/delete/{id}', [DashboardAdminController::class, 'deleteCategory']);

    Route::get('admin/dashboard/member', [DashboardAdminController::class, 'showMember']);

    Route::get('admin/dashboard/staff', [DashboardAdminController::class, 'showStaff']);
    Route::match(['get', 'post'], 'admin/dashboard/staff/insert', [DashboardAdminController::class, 'insertStaff']);
    Route::match(['get', 'post'], 'admin/dashboard/staff/update/{id}', [DashboardAdminController::class, 'updateStaff']);
    Route::match(['get', 'post'], 'admin/dashboard/staff/delete/{id}', [DashboardAdminController::class, 'deleteStaff']);

    Route::get('admin/dashboard/borrowing', [DashboardAdminController::class, 'showBorrowing']);
    Route::get('admin/dashboard/borrowing/report', [DashboardAdminController::class, 'showBorrowingReport']);

    Route::get('admin/dashboard/report/borrowing', [DashboardAdminController::class, 'generateBorrowingReport']);
});

Route::middleware(['role:staff'])->group(function () {
    Route::get('staff/dashboard', [DashboardStaffController::class, 'showDashboard']);

    Route::get('staff/dashboard/book', [DashboardStaffController::class, 'showBook']);
    Route::match(['get', 'post'], 'staff/dashboard/book/insert', [DashboardStaffController::class, 'insertBook']);
    Route::match(['get', 'post'], 'staff/dashboard/book/update/{id}', [DashboardStaffController::class, 'updateBook']);
    Route::match(['get', 'post'], 'staff/dashboard/book/delete/{id}', [DashboardStaffController::class, 'deleteBook']);
    Route::get('staff/dashboard/book/detail/{id}', [DashboardStaffController::class, 'showDetailBook']);

    Route::get('staff/dashboard/category', [DashboardStaffController::class, 'showCategory']);
    Route::match(['get', 'post'], 'staff/dashboard/category/insert', [DashboardStaffController::class, 'insertCategory']);
    Route::match(['get', 'post'], 'staff/dashboard/category/update/{id}', [DashboardStaffController::class, 'updateCategory']);
    Route::match(['get', 'post'], 'staff/dashboard/category/delete/{id}', [DashboardStaffController::class, 'deleteCategory']);

    Route::get('staff/dashboard/borrowing', [DashboardStaffController::class, 'showBorrowing']);
    Route::get('staff/dashboard/borrowing/report', [DashboardStaffController::class, 'showBorrowingReport']);

    Route::get('staff/dashboard/report/borrowing', [DashboardStaffController::class, 'generateBorrowingReport']);
});

Route::middleware(['role:borrower'])->group(function () {
    Route::get('member/dashboard', [DashboardMemberController::class, 'showDashboard']);

    Route::get('member/dashboard/book', [DashboardMemberController::class, 'showBook']);
    Route::get('member/dashboard/book/detail/{id}', [DashboardMemberController::class, 'showDetailBook']);

    Route::get('member/dashboard/borrowed', [DashboardMemberController::class, 'showBorrowedById']);
    Route::get('member/dashboard/returned', [DashboardMemberController::class, 'showReturnedById']);
    Route::get('member/dashboard/collection', [DashboardMemberController::class, 'showCollectionById']);
    Route::get('member/dashboard/review', [DashboardMemberController::class, 'showReviewById']);

    Route::match(['get', 'post'], 'member/dashboard/borrowing/insert/{id}', [DashboardMemberController::class, 'insertBorrowing']);
    Route::match(['get', 'post'], 'member/dashboard/borrowing/update/{id}', [DashboardMemberController::class, 'updateBorrowing']);
    Route::match(['get', 'post'], 'member/dashboard/review/update/{id}', [DashboardMemberController::class, 'updateReview']);

    Route::match(['get', 'post'], 'member/dashboard/review/delete/{id}', [DashboardMemberController::class, 'deleteReview']);

    Route::match(['get', 'post'], 'member/dashboard/book/collection/{id}', [DashboardMemberController::class, 'addToCollection']);

    
    // Route::match(['get', 'post'], 'member/dashboard/book/insert', [DashboardMemberController::class, 'insertBook']);
    // Route::match(['get', 'post'], 'member/dashboard/book/update/{id}', [DashboardMemberController::class, 'updateBook']);

    // Route::get('member/dashboard/category', [DashboardMemberController::class, 'showCategory']);
    // Route::match(['get', 'post'], 'member/dashboard/category/insert', [DashboardMemberController::class, 'insertCategory']);
    // Route::match(['get', 'post'], 'member/dashboard/category/update/{id}', [DashboardMemberController::class, 'updateCategory']);
    // Route::match(['get', 'post'], 'member/dashboard/category/delete/{id}', [DashboardMemberController::class, 'deleteCategory']);

    // Route::get('member/dashboard/member', [DashboardMemberController::class, 'showMember']);

    // Route::get('member/dashboard/borrowing', [DashboardMemberController::class, 'showBorrowing']);
    // Route::match(['get', 'post'], 'member/dashboard/borrowing/insert', [DashboardMemberController::class, 'insert']);
    // Route::match(['get', 'post'], 'member/dashboard/borrowing/update/{id}', [DashboardMemberController::class, 'update']);
});
