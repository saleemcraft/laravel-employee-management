
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeApiController;

Route::apiResource('employees', EmployeeApiController::class);;