<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

$homeSections = ['dashboard', 'inquiries', 'social', 'sales', 'inventory', 'mesages', 'gallery', 'settings'];

Route::get('/home/sections', function () use ($homeSections) {
    return response()->json([
        'default' => 'dashboard',
        'sections' => $homeSections,
    ]);
});

Route::get('/home/redirect/{section?}', function (?string $section = null) use ($homeSections) {
    $target = in_array($section, $homeSections, true) ? $section : 'dashboard';

    return response()->json([
        'section' => $target,
        'path' => "/home/{$target}",
        'url' => url("/home/{$target}"),
    ]);
});
