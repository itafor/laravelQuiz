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
Route::post('/submit-Result','ParticipantController@submitResult');
Route::get('/display-result/{code}','ParticipantController@getResult');
Route::get('/candidateLog-in/{email}/{password}','ParticipantController@candidateLogin');
Route::get('/examinalLog-in/{email}/{password}/{examinal}','ParticipantController@examinalLogin');


Route::post('/contact-us','QuestionController@contactus');
Route::get('/get-questions','QuizController@getQuestions');
Route::get('/get-answer/{qtId}','QuizController@getAnswer');
Route::post('/newTest','QuestionController@tests');

Route::get('/get-groupedQuestions','QuestionController@orderQuestionByCode');
Route::get('/get-test','QuestionController@getTest');
Route::get('/display-questions/{code}/{email}','QuestionController@listQuestions');
Route::get('/show-questions/{code}','QuestionController@showQuestions');

Route::delete('/delete-question/{id}','QuestionController@destroyQuestion');
Route::delete('/delete-test/{id}','QuestionController@destroyTest');
Route::PUT('/update-question/{id}','QuestionController@updateQuestion');
Route::PUT('/update-test/{id}','QuestionController@updateTest');

Route::get('/get-testdetail/{code}','QuestionController@getTestDetail');

Route::post('create-student','StudentController@createStudents');
// Route::post('clock-student','StudentController@clockStudent');
Route::get('get-student/{id}','StudentController@fetchStudent');
Route::get('clock-student/{id}','StudentController@clockStudent');
Route::get('unclock-student/{id}','StudentController@UnclockStudent');

Route::get('all-students','StudentController@allStudents');
Route::get('all-clocked-students','StudentController@clockedStudents');
Route::get('all-unclocked-students','StudentController@allunclockedStudents');








