<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Question;
use App\Test;
use App\Result;
use App\Contact;
class QuestionController extends Controller
{
    
     public function addQuestion(Request $request) {
      if($request->question){
         $quest=$request->question;
      $getQuest=Question::where('Qn',$quest)->first();
      if($getQuest){
        return response()->json([
    'warning' => 'this question  '.$quest.'  '.' alredy exist',
],403);
      }
}

 if($request->hasfile('myfile')){
    $File = $request->file('myfile'); 
        $sub_path = 'api/files'; 
        $real_name = $File->getClientOriginalName(); 
        $destination_path = public_path($sub_path);  
        $File->move($destination_path,  $real_name);  
        return response()->json('File Save');
      }
      
           
       $question = new Question();
       $question->Qn =  $request->question;
       $question->ImageName   = $request->imageName;
       $question->Option1   = $request->option1;
       $question->Option2   = $request->option2;
       $question->Option3  = $request->option3;
       $question->Option4  = $request->option4;
       $question->answer  = $request->answer;
       $question->marks  = $request->marks;
       $question->testCode  = $request->testCode;
       $question->save();
    if ($question) {
       return  $question;
    } else {
        return 'Question could not be created at this time';
        }
 
    }

public function updateQuestion(Request $request, $id){

       if($request->hasfile('myfile')){
    $File = $request->file('myfile'); 
        $sub_path = 'api/files'; 
        $real_name = $File->getClientOriginalName(); 
        $destination_path = public_path($sub_path);  
        $File->move($destination_path,  $real_name);  
        return response()->json('File Save');
      }
      


   $update = Question::where('id', $id)
        ->update([
            'Qn'=>$request->input('Qn'),
            'ImageName'=>$request->input('ImageName'),
            'Option1'=>$request->input('Option1'),
            'Option2'=>$request->input('Option2'),
            'Option3'=>$request->input('Option3'),
            'Option4'=>$request->input('Option4'),
            'answer'=>$request->input('answer'),
            'testCode'=>$request->input('testCode'),
        ]);

      if($update){
     return $update;
      }
 return response()->json([
    'warning' => 'Error occured while attempting to delete the Selected question',
],401);       
        
}


 public function orderQuestionByCode(){
         $questions=DB::table('questions')
          ->select('testCode', DB::raw('count(*) as total'))
         ->groupBy('testCode')
         ->get();
         if($questions){
         return $questions;
         }
         return response()->json([
    'warning' => 'Error occured while attempting to get questions',
],401);  
   }

public function contactus(Request $request){
   $contact = new Contact();
   $contact->email = $request->email;
   $contact->message = $request->message;
   $contact->save();
       if($contact) {
      return response()->json([
         'success'=>'Thanks for contacting us, we will get back to you shortly'],200);
    } else {
        return response()->json([
         'error'=>'Ooops!!, You message could not be sent at this time,please try again'],401);
        }
}

     public function tests(Request $request){
      $testCode=$request->testCode;
      $getCode=Test::where('testCode',$testCode)->first();
      if($getCode){
        return response()->json([
    'warning' => 'this code '.$testCode.' alredy exist',
],500);
      }

       $test = new Test();
       $test->subjectName  = $request->subjectName;
       $test->numberOfQn  = $request->numberOfQn;
       $test->duration  = $request->duration;
       $test->testCode  = $request->testCode;
       $test->instruction  = $request->instruction;
       $test->save();
    if ($test) {
       return  $test;
    } else {
        return 'test could not be created at this time';
        }
    }

    public function getTest(){
      $alltest=Test::all();
      return $alltest;
    }

    public function listQuestions($code, $email){
     // $userEmail=$request->email;
        $getQt=Question::where('testCode',$code)->first();
      $checkUser=Result::where('code',$code)
     ->where('email',$email) ->first();
     if($checkUser){
      return response()->json([
    'warning' => 'You have alredy taken this test',
],401);
     }else if(!$getQt){
      return response()->json([
    'warning' => 'The test code you entered does not exist',
],401);
}else{

   $allQuestion=Question::where('testCode',$code)->get();
      return $allQuestion;
     
}
}

 public function showQuestions($code){
$allQuestion=Question::where('testCode',$code)->get();
      return $allQuestion;
}

     public function getTestDetail($code){
      $testDetail=Test::where('testCode',$code)->first();
      return $testDetail;
    }

    public function destroyQuestion($id)
    {
        //dd($project);
        $findUrl = Question::find($id);
        if($findUrl->delete()){
         return  $findUrl;
        }
   return response()->json([
    'warning' => 'Error occured while trying to delete this question',
],401);
    
    }

     public function destroyTest($id)
    {
        //dd($project);
        $findUrl = Test::find($id);
        if($findUrl->delete()){
         return  $findUrl;
        }
   return response()->json([
    'warning' => 'Error occured while trying to delete this test',
],401);
    
    }

     public function updateTest(Request $request,$id){
       $update = Test::where('id', $id)
        ->update([
            'subjectName'=>$request->input('subjectName'),
            'numberOfQn'=>$request->input('numberOfQn'),
            'duration'=>$request->input('duration'),
            'testCode'=>$request->input('testCode'),
            'instruction'=>$request->input('instruction'),

        ]);

      if($update){
          return response()->json([
    'success' => 'Selected test updated successfully',
],201);
      } 
       return response()->json([
    'success' => 'Selected test updated successfully',
],403);           
        }
     
}
