<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Participant;
class ParticipantController extends Controller
{
    public function insertParticipant(Request $request) {
       
       $participant = new Participant();
       $participant->name        = $request->name;
       $participant->email       = $request->email;
       $participant->score       = $request->score;
       $participant->TimeSpent   = $request->TimeSpent;
       $participant->testCode    = $request->testCode;
       $participant->save();
    if ($participant) {
       return  $participant;
    } else {
        return 'participant could not be created at this time';
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
      

    }


