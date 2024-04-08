<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\RequirementDetailController;
use App\Http\Controllers\StoreTypeDetailController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\UserRoleDetailController;
use App\Http\Controllers\ApplicantCredentialController;
use App\Http\Controllers\ProductTypeDetailController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\PushNotificationController;
use App\Http\Controllers\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/Login', [UserController::class, 'Login']);
Route::post('/Register', [UserController::class, 'Register']);
Route::get('/GET_REQUIREMENT_DETAIL_BY_USER_ROLE_DETAILS_ID/{id}', [RequirementDetailController::class, 'GET_REQUIREMENT_DETAIL_BY_USER_ROLE_DETAILS_ID']);

Route::post('/sendResetCode', [ForgotPasswordController::class, 'sendResetCode']);
Route::post('/checkVerificationCode', [ForgotPasswordController::class, 'checkVerificationCode']);
Route::post('/changePassword', [ForgotPasswordController::class, 'changePassword']);

Route::middleware('auth:api')->group(function () {
    //USER API
    Route::resource('User', UserController::class);
    Route::get('/Logout', [UserController::class, 'Logout']);
    Route::get('/GetUserDetails', [UserController::class, 'GetUserDetails']);
    Route::get('/GetSideNav', [UserController::class, 'GetSideNav']);
    Route::get('/GetAllSideNav', [UserController::class, 'GetAllSideNav']);
    Route::get('/authenticate', [UserController::class, 'authenticate']);
    Route::get('/GetUserDetailsById', [UserController::class, 'GetUserDetailsById']);
    Route::post('/UpdateUserBalance', [UserController::class, 'UpdateUserBalance']);
    Route::post('/FIND_USER_WITHIN_RADIUS', [UserController::class, 'FIND_USER_WITHIN_RADIUS']);
    Route::post('/UpdateDeviceToken', [UserController::class, 'UpdateDeviceToken']);
    //REQUIREMENT API
    Route::resource('RequirementDetail', RequirementDetailController::class);
    Route::put('/RequirementDetail/{id}', [RequirementDetailController::class, 'edit']);
    Route::put('/RequirementDetail/{id}', [RequirementDetailController::class, 'store']);
    //STORE API
    Route::resource('StoreTypeDetail', StoreTypeDetailController::class);
    Route::get('/GetActiveStore', [StoreController::class, 'GetActiveStore']);
    Route::put('/StoreTypeDetail/{id}', [StoreTypeDetailController::class, 'edit']);
    Route::put('/StoreTypeDetail/{id}', [StoreTypeDetailController::class, 'store']);
    //PRODUCT API 
    Route::resource('ProductTypeDetail', ProductTypeDetailController::class);
    Route::resource('Product', ProductController::class);
    Route::get('/GetProductByType', [ProductController::class, 'GetProductByType']);
    Route::put('/Product/{id}', [ProductController::class, 'edit']);
    Route::put('/Product/{id}', [ProductController::class, 'store']);
    Route::put('/ProductTypeDetail/{id}', [ProductTypeDetailController::class, 'edit']);
    Route::put('/ProductTypeDetail/{id}', [ProductTypeDetailController::class, 'store']);
    //USER ROLE API
    Route::resource('UserRole', UserRoleController::class);
    Route::resource('updateUserRole', UserRoleController::class);
    Route::get('/Get_UserRole_With_Accessess_And_Requirements', [UserRoleController::class, 'Get_UserRole_With_Accessess_And_Requirements']);
    Route::post('/SubmitApplicantCrendential', [UserRoleController::class, 'SubmitApplicantCrendential']);
    Route::get('/GetApplicants', [UserRoleController::class, 'GetApplicants']);
    Route::patch('/ApproveUserRole/{id}', [UserRoleController::class, 'ApproveUserRole']);
    Route::patch('/DissaproveUserRole/{id}', [UserRoleController::class, 'DissaproveUserRole']);
    Route::post('/UpdateUserByUserID', [UserController::class, 'UpdateUserByUserID']);
    //USER ROLE DETAIL API
    Route::resource('UserRoleDetail', UserRoleDetailController::class);
    //APPLICANT CREDENTIAL API
    Route::resource('ApplicantCrendential', ApplicantCredentialController::class);
    //CART API
    Route::post('/AddCartProduct', [CartController::class, 'AddCartProduct']);
    Route::post('/IncreaseCartProduct', [CartController::class, 'IncreaseCartProduct']);
    Route::post('/DecreaseCartProduct', [CartController::class, 'DecreaseCartProduct']);
    Route::delete('/RemoveCartProduct', [CartController::class, 'RemoveCartProduct']);
    Route::get('/GetCart', [CartController::class, 'GetCart']);
    //ORDER API
    Route::post('/ORDER', [OrderController::class, 'ORDER']);
    Route::get('/GET_ORDERS', [OrderController::class, 'GET_ORDERS']);
    Route::get('/GET_ORDER_DETAILS', [OrderController::class, 'GET_ORDER_DETAILS']);
    Route::post('/CANCEL_ORDER', [OrderController::class, 'CANCEL_ORDER']);
    Route::post('/CANCEL_ORDER_DETAIL', [OrderController::class, 'CANCEL_ORDER_DETAIL']);
    Route::post('/ACCEPT_ORDER', [OrderController::class, 'ACCEPT_ORDER']);
    Route::post('/DECLINE_ORDER', [OrderController::class, 'DECLINE_ORDER']);
    Route::post('/ORDER_TO_SHIP', [OrderController::class, 'ORDER_TO_SHIP']);
    Route::post('/FIND_ORDER_WITHIN_RADIUS', [OrderController::class, 'FIND_ORDER_WITHIN_RADIUS']);
    Route::post('/REMOVE_TRANSACTION_DELIVERY_ID', [OrderController::class, 'REMOVE_TRANSACTION_DELIVERY_ID']);
    Route::post('/ACCEPT_TRANSACTION', [OrderController::class, 'ACCEPT_TRANSACTION']);
    Route::get('/GET_IN_PROGRESS_TRANSACTION', [OrderController::class, 'GET_IN_PROGRESS_TRANSACTION']);
    Route::get('/GET_TRANSACTION_BY_ID', [OrderController::class, 'GET_TRANSACTION_BY_ID']);
    Route::post('/PICKUP_ORDERS', [OrderController::class, 'PICKUP_ORDERS']);
    Route::post('/DROP_OFF', [OrderController::class, 'DROP_OFF']);
    Route::post('/COMPLETE_ORDER', [OrderController::class, 'COMPLETE_ORDER']);
    Route::get('/GET_TRANSACTION_BY_ID', [OrderController::class, 'GET_TRANSACTION_BY_ID']);
    //QUEUE API
    Route::post('/MarkOnline', [QueueController::class, 'MarkOnline']);
    Route::post('/MarkOffline', [QueueController::class, 'MarkOffline']);
    // ANALYSIS API
    Route::get('/GET_USER_ROLES_ANALYSIS', [AnalysisController::class, 'GET_USER_ROLES_ANALYSIS']);
    Route::get('/GET_USER_ROLES_STATUS_ANALYSIS', [AnalysisController::class, 'GET_USER_ROLES_STATUS_ANALYSIS']);
    Route::get('/GET_ORDERS_ANALYSIS', [AnalysisController::class, 'GET_ORDERS_ANALYSIS']);
    // PUSH NOTIF API
    Route::post('/SEND_PUSH_NOTIF', [PushNotificationController::class, 'SEND_PUSH_NOTIF']);
});