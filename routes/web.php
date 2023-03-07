<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cms/sites', [Controllers\Cms\SiteController::class, 'list']);
Route::get('/cms/sites/{siteId}', [Controllers\Cms\SiteController::class, 'page']);
Route::get('/cms/sites/{siteId}/pages/{pageId}', [Controllers\Cms\SiteController::class, 'page']);

Route::put('/cms/sites/{siteId}/pages/{pageId}/contents/{contentId}', [Controllers\Cms\ContentController::class, 'update']);
Route::post('/cms/sites/{siteId}/pages/{pageId}/contents', [Controllers\Cms\ContentController::class, 'create']);

Route::get('/sites/{siteId}', [Controllers\IndexController::class, 'index']);
Route::get('/sites/{siteId}/pages/{pageId}', [Controllers\PageController::class, 'index']);