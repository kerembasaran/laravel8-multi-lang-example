<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LanguageController;

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
    return redirect(app()->getLocale());
});

Route::prefix('{locale}')->where(['locale' => '[a-zA-Z]{2}'])->middleware('language')->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('index');
});


Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('language', [LanguageController::class, 'langList'])->name('language.langList');
    Route::post('language/add', [LanguageController::class, 'languageAdd'])->name('language.add');
    Route::get('language/groups', [LanguageController::class, 'groups'])->name('language.groups');
    Route::post('language/groups/add', [LanguageController::class, 'groupAdd'])->name('language.groups.add');
    Route::get('language/groups/{id}', [LanguageController::class, 'groupDetail'])->name('language.groupDetail');
    Route::post('language/groups/detail-update/getText', [LanguageController::class, 'groupDetailGetText'])->name('language.groupDetail.getText');
    Route::post('language/groups/detail-update', [LanguageController::class, 'groupDetailUpdate'])->name('language.groupDetailUpdate');
    Route::get('language/phrase-add', [LanguageController::class, 'phraseAddShowForm'])->name('language.phraseAdd');
    Route::post('language/phrase-add', [LanguageController::class, 'phraseAdd']);

});
