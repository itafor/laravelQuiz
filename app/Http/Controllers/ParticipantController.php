<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Participant;
use App\Result;

class ParticipantController extends Controller
{
    public function insertParticipant(Request $request) {
       $checkEmail =Participant::where('email',$request->email)->first();
       if($checkEmail){
        return response()->json(
          ['warning'=>'You have already created an account, please login!!!'],401);
        }

       $participant = new Participant();
       $participant->name        = $request->name;
       $participant->email       = $request->email;
       $participant->role        = $request->role;
       $participant->password    = $request->password;
       $participant->save();
    if ($participant) {
       return  $participant;
    } else {
        return response()->json(
          ['warning'=>'participant could not be created at this time'],401);
        }
 
    }



    public function updateParticipant(Request $request,$id){
    	 $update = Participant::where('id', $id)
        ->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'score'=>$request->input('score'),
            'TimeSpent'=>$request->input('TimeSpent'),
            'testCode'=>$request->input('testCode')
        ]);

      if($update){
          return response()->json([
    'name' => $request->name,
    'email' => $request->email
],200);
      }            
        }
      

       public function submitResult(Request $request) {
       $email =  $request->email;
       $code =  $request->code;
       $checkUser = Result::where('email',$email)
        ->where('code',$code)->first();
      
       if($checkUser){
        return response()->json([
          'warning'=>'Results already submitted!!'],401);
       }
       $result = new Result();
       $result->email       = $request->email;
       $result->code       = $request->code;
       $result->score       = $request->score;
       $result->maxScore       = $request->maxScore;
       $result->participant_id  = $request->participant_id;
       $result->save();
    if ($result) {
       return  $result;
    } else {
             return response()->json([
        'warning'=>'result could not be created at this time'],403);
}
        
 
    }

    public function getResult($code){
      $result=Result::join('participants','participants.id','=','results.participant_id')
      ->selectRaw('participants.name, results.email, results.code, results.score,results.maxScore,results.created_at')
      ->where('results.code',$code)
      ->orderBy('results.score','desc')->get();
      if($result){
        return $result;
      }
      return 'result could not be display at this time';
    }


public function login($email, $password){
  $signin =Participant::where('email',$email)
      ->where('password',$password)
      ->first();
      if($signin){
        return $signin;
      }

      return response()->json([
        'warning'=>'We cannot find the provided credentials in our record!!'],400);
}
    }


