<?php

use Illuminate\Http\Request;

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

Route::post('/addNewQuestion','QuestionController@addQuestion');
Route::post('/insertParticipants','ParticipantController@insertParticipant');
Route::Put('/updateParticipant/{id}','ParticipantController@updateParticipant');
Route::get('/get-questions','QuizController@getQuestions');
Route::get('/get-answer/{qtId}','QuizController@getAnswer');
Route::post('/newTest','QuestionController@tests');

Route::get('/get-groupedQuestions','QuestionController@orderQuestionByCode');
Route::get('/get-test','QuestionController@getTest');
Route::get('/display-questions/{code}','QuestionController@listQuestions');
Route::delete('/delete-question/{id}','QuestionController@destroyQuestion');
Route::delete('/delete-test/{id}','QuestionController@destroyTest');
Route::PUT('/update-question/{id}','QuestionController@updateQuestion');
Route::PUT('/update-test/{id}','QuestionController@updateTest');

Route::get('/get-testdetail/{code}','QuestionController@getTestDetail');




