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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([


    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::apiResource('/employee','Api\EmployeeController');
Route::apiResource('/supplier','Api\SupplierController');
Route::apiResource('/category','Api\CategoryController');
Route::apiResource('/product','Api\ProdcutController');
Route::apiResource('/expense','Api\ExpenseController');
Route::apiResource('/customer','Api\CustomerController');

Route::Post('/salary/paid/{id}','Api\SalaryController@Paid');
Route::Get('/salary','Api\SalaryController@AllSalary');
Route::Get('/salary/view/{id}','Api\SalaryController@ViewSalary');
Route::Get('/edit/salary/{id}','Api\SalaryController@EditSalary');
Route::Post('/salary/update/{id}','Api\SalaryController@SalaryUpdate');
Route::Post('/stock/update/{id}','Api\SalaryController@StockUpdate');
