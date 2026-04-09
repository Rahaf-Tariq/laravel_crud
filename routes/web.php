<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    $totalEmployees = Employee::count();
    $activeEmployees = Employee::where('status', 'active')->count();
    $totalDepartments = Department::count();
    return view('dashboard', compact('totalEmployees', 'activeEmployees', 'totalDepartments'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('employees', EmployeeController::class);
    Route::resource('departments', DepartmentController::class);
});

require __DIR__.'/auth.php';
