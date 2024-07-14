<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
    Route::get('/dashboard/editProfile', 'App\Http\Controllers\DashboardController@editProfile')->name('dashboard.editProfile');
    Route::post('dashboard/editProfile', 'App\Http\Controllers\DashboardController@editDetails')->name('dashboard.editDetails');
    Route::get('/dashboard/viewspd', 'App\Http\Controllers\DashboardController@viewspd')->name('dashboard.viewspd');
    Route::post('/dashboard/comparespd', 'App\Http\Controllers\DashboardController@compareSpd')->name('dashboard.compareSpd');
    Route::get('/dashboard/comparespd', 'App\Http\Controllers\DashboardController@showCompareSpd')->name('dashboard.showCompareSpd');
    Route::get('/dashboard/viewRaceData', 'App\Http\Controllers\CoachController@getRaceData')->name('dashboard.viewRaceData');
});
// for member only
Route::group(['middleware' => ['auth', 'role:member']], function () {
    Route::get('dashboard/registerParent', '\App\Http\Controllers\MemberController@getRegisterParentPage')->name('dashboard.getRegisterParentPage');
    Route::post('dashboard/registerParent', '\App\Http\Controllers\MemberController@registerParent')->name('dashboard.registerParent');

//    Route::get('/dashboard/comparespd', 'App\Http\Controllers\DashboardController@comparespd')->name('dashboard.comparespd');
});

Route::group(['middleware' => ['auth', 'role:parent']], function () {
    Route::get('/dashboard/editChildProfile/{id?}', 'App\Http\Controllers\DashboardController@getEditChildDetailsPage')->name('dashboard.getEditChildDetailsPage');
    Route::post('dashboard/editChildProfile', 'App\Http\Controllers\DashboardController@editChildDetails')->name('dashboard.editChildDetails');
});

// for coaches only
Route::group(['middleware' => ['auth', 'role:coach']], function () {
    Route::get('/dashboard/coachDash', function (){
        return view('coachdash');
    })->name('dashboard.coachDash');
    Route::get('/dashboard/createSquad', 'App\Http\Controllers\DashboardController@createSquad')->name('dashboard.createSquad');
    Route::get('/dashboard/editSquad/{id?}', 'App\Http\Controllers\DashboardController@editSquad')->name('dashboard.editSquad');
    Route::post('/dashboard/editSquad', 'App\Http\Controllers\DashboardController@updateSquad')->name('dashboard.updateSquad');
    Route::get('/dashboard/viewSquad/{id?}', 'App\Http\Controllers\DashboardController@viewSquad')->name('dashboard.viewSquad');
    Route::post('/dashboard/createSquad', 'App\Http\Controllers\DashboardController@insertSquad')->name('dashboard.insertSquad');
    Route::get('viewSquads/addMembers/{id?}', '\App\Http\Controllers\CoachController@addMembersToSquad')->name('squads.addMembers');
    Route::post('viewSquads/insertMembers', '\App\Http\Controllers\CoachController@insertSquadMembers')->name('squads.insertMembers');
    Route::get('viewSquads/removeMembers/{id?}', '\App\Http\Controllers\CoachController@removeSquadMembers')->name('squads.removeMembers');
    Route::post('viewSquads/deleteMembers', '\App\Http\Controllers\CoachController@deleteSquadMembers')->name('squads.deleteMembers');
    Route::get('/dashboard/addTrainingSPD/{id?}', '\App\Http\Controllers\CoachController@addTrainingSPD')->name('dashboard.addTrainingSPD');
    Route::post('/dashboard/insertTrainingSPD', '\App\Http\Controllers\CoachController@insertTrainingSPD')->name('dashboard.insertSPD');
    Route::get('/dashboard/addRaceData/{id}', '\App\Http\Controllers\CoachController@addRaceData')->name('dashboard.addRaceData');
    Route::post('/dashboard/insertRaceData', '\App\Http\Controllers\CoachController@insertRaceData')->name('dashboard.insertRaceData');
});

// for admins only
Route::group(['middleware' => ['auth', 'role:admin']], function () {
//    Route::get('/dashboard/viewSquad', 'App\Http\Controllers\DashboardController@viewSquad')->name('dashboard.viewSquad');
    Route::get('/dashboard/viewMembers', 'App\Http\Controllers\DashboardController@viewMembers')->name('dashboard.viewMembers');
    Route::get('/dashboard/viewCoaches', 'App\Http\Controllers\DashboardController@viewCoaches')->name('dashboard.viewCoaches');
    Route::get('raceData/delete/{id?}', '\App\Http\Controllers\DashboardController@deleteRaceData')->name('raceData.delete');
    Route::get('raceData/validate/{id?}', '\App\Http\Controllers\DashboardController@validateRaceData')->name('raceData.validate');
    Route::get('/dashboard/raceData/edit/{id?}', '\App\Http\Controllers\DashboardController@editRaceData')->name('raceData.edit');
    Route::post('raceData/updateRaceData', '\App\Http\Controllers\DashboardController@updateRaceData')->name('dashboard.updateRaceData');
    Route::get('dashboard/getAssignCoach/{id?}', '\App\Http\Controllers\DashboardController@getAssignCoachPage')->name('dashboard.assignCoach');
    Route::post('dashboard/updateCoach', '\App\Http\Controllers\DashboardController@updateCoach')->name('dashboard.updateCoach');

});

require __DIR__.'/auth.php';
