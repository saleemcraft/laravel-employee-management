<?php

use App\Http\Controllers\employeecontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//employee routes
Route::get('/employees',[employeecontroller::class,'index'])->name('employee.index');
Route::get('/employees/create',[employeecontroller::class,'create'])->name('employee.create');
Route::post('/employees/store',[employeecontroller::class,'store'])->name('employee.store');
Route::get('/employees/{id}',[employeecontroller::class,'show'])->name('employee.show');
Route::get('/employees/{id}/edit',[employeecontroller::class,'edit'])->name('employee.edit');
Route::put('/employees/{id}',[employeecontroller::class,'update'])->name('employee.update');
Route::delete('/employees/{id}',[employeecontroller::class,'destroy'])->name('employee.destroy');