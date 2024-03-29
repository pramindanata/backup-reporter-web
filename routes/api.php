<?php

use App\Http\Controllers\Api\AccessTokenController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BackupReportLogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::name('api.')->middleware(['auth'])->group(function () {
    Route::delete("/users/{user}", [UserController::class, 'destroy'])->name("users.destroy");
    Route::delete("/access-tokens/{access_token}", [AccessTokenController::class, 'destroy'])->name("access-tokens.destroy");
    Route::delete("/backup-report-logs/{backup_report_log}", [BackupReportLogController::class, 'destroy'])->name("backup-report-logs.destroy");
});
