<?php

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\MahasiswaController;
use App\Filters\Sample;
use Pecee\SimpleRouter\SimpleRouter as Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->addMiddleware(Sample::class);
Route::get('admin/data-mahasiswa', [MahasiswaController::class, 'index'])->name('admin.data-mahasiswa')->addMiddleware(Sample::class);
Route::get('admin/data-mahasiswa/{id}', [MahasiswaController::class, 'get'])->name('admin.data-mahasiswa.get')->addMiddleware(Sample::class);
Route::post('admin/data-mahasiswa', [MahasiswaController::class, 'create'])->name('admin.data-mahasiswa.create')->addMiddleware(Sample::class);
Route::post('admin/data-mahasiswa/edit', [MahasiswaController::class, 'edit'])->name('admin.data-mahasiswa.edit')->addMiddleware(Sample::class);
Route::post('admin/data-mahasiswa/delete', [MahasiswaController::class, 'delete'])->name('admin.data-mahasiswa.delete')->addMiddleware(Sample::class);
