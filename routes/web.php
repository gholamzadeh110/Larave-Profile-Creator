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
// Front Site
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/profiles/{id}', 'App\Http\Controllers\HomeController@show')->name('profiles.show');

// Admin Site
//Route::middleware(['verified'])->group(function () {
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard.index');
    Route::resources([
        'profile' => 'App\Http\Controllers\ProfileController',
        'contacts' => 'App\Http\Controllers\ContactsController',
        'experience' => 'App\Http\Controllers\ExperienceController',
        'projects' => 'App\Http\Controllers\ProjectsController',
        'education' => 'App\Http\Controllers\EducationController',
        'skills' => 'App\Http\Controllers\SkillsController',
        'interests' => 'App\Http\Controllers\InterestsController',
        'awards' => 'App\Http\Controllers\AwardsController',
        'donate' => 'App\Http\Controllers\DonateController',
        'workflow' => 'App\Http\Controllers\WorkflowController',
        'setting' => 'App\Http\Controllers\SettingController',
    ]);
    Route::post('dashboard/{profile}', 'App\Http\Controllers\DashboardController@publish')->name('dashboard.publish');

    Route::post('contacts/destroy/{contact}', 'App\Http\Controllers\ContactsController@destroy')->name('contacts.destroy');
    Route::post('experience/destroy/{experience}', 'App\Http\Controllers\ExperienceController@destroy')->name('experience.destroy');
    Route::post('projects/destroy/{projects}', 'App\Http\Controllers\ProjectsController@destroy')->name('projects.destroy');
    Route::post('education/destroy/{education}', 'App\Http\Controllers\EducationController@destroy')->name('education.destroy');
    Route::post('skills/destroy/{skill}', 'App\Http\Controllers\SkillsController@destroy')->name('skills.destroy');
    Route::post('awards/destroy/{award}', 'App\Http\Controllers\AwardsController@destroy')->name('awards.destroy');
    Route::post('donate/destroy/{donate}', 'App\Http\Controllers\DonateController@destroy')->name('donate.destroy');
    Route::post('workflow/destroy/{workflow}', 'App\Http\Controllers\WorkflowController@destroy')->name('workflow.destroy');
    Route::post('interests/destroy/{interest}', 'App\Http\Controllers\InterestsController@destroy')->name('interests.destroy');
});

require __DIR__.'/auth.php';
