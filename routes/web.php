<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\InvestorsController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ProjectsController;

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
Route::get('/admin/dashboard', function () {
    return view('admin.index');
});

Route::GET('/admin/investors', [InvestorsController::class,'all_investors']);
Route::GET('/admin/investors/{id}/details', [InvestorsController::class,'investor_details']);
Route::GET('/admin/investors/{id}/edit', [InvestorsController::class,'edit_investor_view']);
Route::GET('/admin/add-investor', [InvestorsController::class,'add_investor_view']);
Route::POST('/admin/add-investor', [InvestorsController::class,'add_investor'])->name('add.investor');
Route::POST('/admin/update-investor', [InvestorsController::class,'update_investor'])->name('update.investor');
Route::POST('/admin/ban-investor', [InvestorsController::class,'ban_investor'])->name('ban.investor');
Route::POST('/admin/active-investor', [InvestorsController::class,'active_investor'])->name('active.investor');


Route::GET('/admin/properties', [PropertyController::class,'all_properties']);
Route::GET('/admin/property/{slug}/details', [PropertyController::class,'property_details']);

Route::GET('/admin/add-property', [PropertyController::class,'add_property_view']);
Route::POST('/admin/add-property',[PropertyController::class,'add_property'])->name('add.property');
Route::GET('/admin/property/{id}/update/pictures', [PropertyController::class,'update_property_images']);

Route::GET('/admin/property/{slug}/edit', [PropertyController::class,'edit_property_view']);
Route::POST('/admin/update-property', [PropertyController::class,'update_property'])->name('update.property');
Route::POST('/admin/ban-property', [PropertyController::class,'ban_property'])->name('ban.property');

Route::GET('/admin/renovation-gallery', [AdminsController::class,'renovation_gallery_view']);
Route::POST('/admin/add-gallery', [AdminsController::class,'add_renovation_gallery'])->name('add.renovation_gallery');
Route::GET('/admin/renovation-gallery/{slug}/details', [AdminsController::class,'gallery_image_detail']);
Route::GET('/admin/renovation-gallery/{slug}/edit', [AdminsController::class,'gallery_image_edit_view']);
Route::POST('/admin/update-gallery', [AdminsController::class,'update_renovation_gallery'])->name('update.renovation_gallery');
Route::POST('/admin/archive-gallery', [AdminsController::class,'archive_gallery'])->name('archive.renovation_gallery');
Route::POST('/admin/active-gallery', [AdminsController::class,'active_renovation_gallery'])->name('active.renovation_gallery');


Route::GET('/admin/projects', [ProjectsController::class,'all_projects']);
Route::GET('/admin/project/{slug}/details', [ProjectsController::class,'project_details']);

Route::GET('/admin/add-project', [ProjectsController::class,'add_project_view']);
Route::POST('/admin/add-project',[ProjectsController::class,'add_project'])->name('add.project');
