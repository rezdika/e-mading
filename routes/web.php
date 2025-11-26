<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, CategoryController, BlogController, ContactController, ErrorController, AuthController};

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/blog-details/{id}', [BlogController::class, 'details'])->name('blog-details');
Route::get('/blog-details/{id}/download-pdf', [BlogController::class, 'downloadPdf'])->name('blog-details.download-pdf');
Route::post('/articles/{id}/like', [BlogController::class, 'toggleLike'])->name('articles.like')->middleware('auth');
Route::post('/articles/{id}/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::delete('/comments/{id}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy')->middleware('auth');


Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/404', [ErrorController::class, 'notFound'])->name('404');

// New Features Routes
Route::get('/pengumuman', [App\Http\Controllers\PengumumanController::class, 'index'])->name('pengumuman.index');
Route::get('/arsip', [App\Http\Controllers\ArsipController::class, 'index'])->name('arsip.index');
Route::get('/tutorial', [App\Http\Controllers\TutorialController::class, 'index'])->name('tutorial.index');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Routes (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'userDashboard'])->name('dashboard');
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard')->middleware('role:admin');
    Route::get('/guru/dashboard', [AuthController::class, 'guruDashboard'])->name('guru.dashboard')->middleware('role:guru');
    Route::get('/siswa/dashboard', [AuthController::class, 'siswaDashboard'])->name('siswa.dashboard')->middleware('role:siswa');
    
    // Article CRUD Routes
    Route::resource('articles', App\Http\Controllers\ArticleController::class);
    Route::post('/articles/{article}/submit-approval', [App\Http\Controllers\ArticleController::class, 'submitForApproval'])->name('articles.submit-approval');
    
    // Category Management Routes
    Route::resource('categories', App\Http\Controllers\CategoryManagementController::class)->middleware('role:admin,guru');
    
    // User Management Routes (Admin only)
    Route::resource('users', App\Http\Controllers\UserManagementController::class)->middleware('role:admin');
    
    // File Upload Routes
    Route::get('/uploads', [App\Http\Controllers\FileUploadController::class, 'index'])->name('uploads.index');
    Route::post('/uploads/upload', [App\Http\Controllers\FileUploadController::class, 'upload'])->name('uploads.upload');
    Route::post('/uploads/delete', [App\Http\Controllers\FileUploadController::class, 'delete'])->name('uploads.delete');
    
    // Statistics Routes
    Route::get('/statistik', [App\Http\Controllers\StatistikController::class, 'index'])->name('statistik.index');
    
    // Report Routes
    Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/preview', [App\Http\Controllers\LaporanController::class, 'preview'])->name('laporan.preview');
    Route::get('/laporan/generate', [App\Http\Controllers\LaporanController::class, 'generate'])->name('laporan.generate');
    
    // Notification Routes
    Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/mark-all-read', [App\Http\Controllers\NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
    
    // Profile Routes
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    
    // Moderation Routes (Admin & Guru)
    Route::middleware('role:admin,guru')->group(function () {
        Route::get('/moderasi', [App\Http\Controllers\ModerasiController::class, 'index'])->name('moderasi.index');
        Route::post('/moderasi/{id}/approve', [App\Http\Controllers\ModerasiController::class, 'approve'])->name('moderasi.approve');
        Route::post('/moderasi/{id}/reject', [App\Http\Controllers\ModerasiController::class, 'reject'])->name('moderasi.reject');
    });
    
    // Home Settings Routes (Admin only)
    Route::middleware('role:admin')->group(function () {
        Route::get('/home-settings', [App\Http\Controllers\HomeSettingController::class, 'edit'])->name('home-settings.edit');
        Route::put('/home-settings', [App\Http\Controllers\HomeSettingController::class, 'update'])->name('home-settings.update');
    });
});
