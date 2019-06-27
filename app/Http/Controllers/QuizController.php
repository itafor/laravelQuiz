<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use DB;

class QuizController extends Controller
{
   public function getQuestions(){

   	$quiz=Question::all()->take(10);

   	return $quiz;
   }
   

   public function getAnswer($qtId){
   		$answer=DB::table('questions')
   		->where('id',$qtId)
   		->orderBy('id','decs')
   		->get();
   		if($answer){
   		return $answer;
   		}
   }


   
}
