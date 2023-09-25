<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CorpController;
use App\Http\Controllers\FlorController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\PartnerController;

use Inertia\Inertia;

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


// ------ website ------

Route::get('/', [MainController::class, 'index'])->name('website.index.main');
Route::get('/about', [MainController::class, 'about'])->name('website.index.about');
Route::get('/contact', [MainController::class, 'contact'])->name('website.index.contact');
Route::post('/store-contact', [MainController::class, 'storeContact'])->name('website.store.contact');

Route::get('/blogs', [BlogController::class, 'websiteIndex'])->name('website.index.blog');
Route::get('/blog/{id}', [BlogController::class, 'websiteShow'])->name('website.index.show');

Route::get('/projects', [ProjectController::class, 'websiteIndex'])->name('website.index.project');
Route::get('/project/{id}', [ProjectController::class, 'websiteShow'])->name('website.show.project');
Route::get('/corp/{code}', [CorpController::class, 'websiteShow'])->name('website.show.corp');
Route::get('/flor/{code}', [FlorController::class, 'websiteShow'])->name('website.show.flor');
Route::get('/apartment/{code}', [ApartmentController::class, 'websiteShowCode'])->name('website.show.apartment.code');
Route::get('/apartment/id/{id}', [ApartmentController::class, 'websiteShowId'])->name('website.show.apartment.id');

Route::get('/apartments', [ApartmentController::class, 'websiteIndex'])->name('website.index.apartment');

// ------ end website ------



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    // პროექტები
Route::get('/admin', [ProjectController::class, 'index'])->name('index.project');
Route::get('/dashboard', [ProjectController::class, 'loader'])->name('index.loader');
Route::get('/admin/dashboard', [ProjectController::class, 'index'])->name('index.project');



Route::get('/admin/projects', [ProjectController::class, 'index'])->name('index.project');
Route::post('/admin/add-project', [ProjectController::class, 'store'])->name('store.project');
Route::put('/admin/update-project/{projectId}', [ProjectController::class, 'update'])->name('update.project');
Route::delete('/admin/delete-project/{projectId}', [ProjectController::class, 'destroy'])->name('destroy.project');

// კორპუსები

Route::get('/admin/project/{projectId}/corps/', [CorpController::class, 'index'])->name('index.corp');
Route::post('/admin/project/{projectId}/corp', [CorpController::class, 'store'])->name('store.corp');
Route::put('/admin/update-corp/{corpId}', [CorpController::class, 'update'])->name('update.corp');
Route::delete('/admin/delete-corp/{corpId}', [CorpController::class, 'destroy'])->name('destroy.corp');

// სართულები

Route::get('/admin/corp/{corpId}/flor', [FlorController::class, 'index'])->name('index.flor');
Route::post('/admin/corp/{corpId}/add-flor', [FlorController::class, 'store'])->name('store.flor');
Route::put('/admin/update-flor/{florId}', [FlorController::class, 'update'])->name('update.flor');
Route::delete('/admin/delete-flor/{florId}', [FlorController::class, 'destroy'])->name('destroy.flor');

// ბინები

Route::get('/admin/flor/{florId}/apartments', [ApartmentController::class, 'index'])->name('index.apartment');
Route::post('/admin/flor/{florId}/add-apartment', [ApartmentController::class, 'store'])->name('store.apartment');
Route::put('/admin/update-apartment/{apartmentId}', [ApartmentController::class, 'update'])->name('update.apartment');
Route::delete('/admin/delete-apartment/{apartmentId}', [ApartmentController::class, 'destroy'])->name('destroy.apartment');

// ბინების ცალკე თეიბლი

Route::get('/admin/apartments-table', [ApartmentController::class, 'indexTable'])->name('index.apartment-table');
Route::post('/admin/add-apartment-table', [ApartmentController::class, 'storeTable'])->name('store.apartment-table');
Route::put('/admin/update-apartment-table/{apartmentId}', [ApartmentController::class, 'updateTable'])->name('update.apartment-table');

// ბლოგი

Route::get('/admin/blogs', [BlogController::class, 'index'])->name('index.blog');
Route::post('/admin/add-blog', [BlogController::class, 'store'])->name('store.blog');
Route::put('/admin/update-blog/{blogId}', [BlogController::class, 'update'])->name('update.blog');
Route::delete('/admin/delete-blog/{blogId}', [BlogController::class, 'destroy'])->name('destroy.blog');

// სლაიდერები

Route::get('/admin/slides', [SlideController::class, 'index'])->name('index.slide');
Route::post('/admin/add-slide', [SlideController::class, 'store'])->name('store.slide');
Route::put('/admin/update-slide/{slideId}', [SlideController::class, 'update'])->name('update.slide');
Route::delete('/admin/delete-slide/{slideId}', [SlideController::class, 'destroy'])->name('destroy.slide');
Route::get('/admin/gg', [PartnerController::class, 'test']);

// პარტნიორები

Route::get('/admin/partners', [PartnerController::class, 'index'])->name('index.partner');
Route::post('/admin/add-partner', [PartnerController::class, 'store'])->name('store.partner');
Route::put('/admin/update-partner/{partnerId}', [PartnerController::class, 'update'])->name('update.partner');
Route::delete('/admin/delete-partner/{partnerId}', [PartnerController::class, 'destroy'])->name('destroy.partner');

// კომპანია

Route::get('/admin/company', [CompanyController::class, 'index'])->name('index.company');
Route::post('/admin/add-company', [CompanyController::class, 'store'])->name('store.company');
Route::put('/admin/update-company/{companyId}', [CompanyController::class, 'update'])->name('update.company');
Route::delete('/admin/delete-company/{companyId}', [CompanyController::class, 'destroy'])->name('destroy.company');

// კონტაქტი
Route::get('/admin/contacts', [MainController::class, 'indexContact'])->name('index.contact');
});
// -----admin-----


    // ------end admin------