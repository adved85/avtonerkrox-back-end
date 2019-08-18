<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'
], function() {

    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/all', 'IndexController@all_cars')->name('all_cars');
    Route::get('/aboutus', 'IndexController@about')->name('about');
    Route::get('/contacts', 'IndexController@contacts')->name('contacts');
    Route::get('/search', 'IndexController@search')->name('search');

    Route::get('/item/{id}', 'IndexController@item')->name('item');
    Auth::routes();
    // Route::get('/password/reset/{token}/{email?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/statement', 'StatementController@index')->name('home.statement');
    Route::POST('/home/statement/store', 'StatementController@store')->name('home.statement.store');
    Route::get('/home/statement/edit/{st_id}', 'StatementController@edit')->name('home.statement.edit');
    Route::PUT('/home/statement/update', 'StatementController@update')->name('home.statement.update');

    Route::POST('/home/statement/upload', 'StatementController@upload')->name('home.statement.upload');
    Route::delete('/home/statement/destroy/{st_id}', 'StatementController@destroy')->name('home.statement.destroy');

    Route::get('/home/settings', 'UserSettingsController@edit')->name('home.settings.edit');
    Route::put('/home/settings/update_email', 'UserSettingsController@updateEmail')->name('home.settings.updateEmail');
    Route::put('/home/settings/update_pass', 'UserSettingsController@updatePass')->name('home.settings.updatePass');
});

Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('{locale}/password/reset/{token}/{email?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::group([
    'prefix' =>'{locale}/admin',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'namespace' =>'Admin',
    'middleware' => ['auth', 'role:admin', 'setlocale'], //'role:admin',
], function(){
    Route::get('/', 'DashboardController@index')->name('admin.index');
    Route::get('/statements', 'DashboardController@statements')->name('admin.statements');    
    Route::get('/statements/item/{id}', 'DashboardController@item')->name('admin.statements.item');
    Route::put('/statements/item/{id}', 'DashboardController@update')->name('admin.statements.update');
    
    Route::get('/users', 'DashboardController@users')->name('admin.users');
});