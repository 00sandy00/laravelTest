<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class McqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['questions'] = Question::with('option')->inRandomOrder()->limit(5)->get();
        return view('mcq.mcq')->with($result);
    }

   
    /**
     * Store a newly created resource in storage. (now it's showing marks for the taken test)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $QuestionIds=$request->input('questionId');
        $idString=[];
         foreach ($QuestionIds as $value) {
            $optionId=$request->input('option_'.$value);
            if($optionId!="" || $optionId!=null){
                array_push($idString,$optionId);
            }
        }
       $Option = new Option();
       $marks=$Option->GetMarks($idString);
       if ($marks==sizeof($QuestionIds)) {
            return 'Your result is '.$marks . ' out of  ' .sizeof($QuestionIds).'      <br><br> <a href="'.route('mcq.index').'"> Take Another Test</a><br><br> <a href="'.route('mcq.index').'"> << Go Back</a>';
        }else{
            return 'Your result is '.$marks . ' out of  ' .sizeof($QuestionIds).'      <br><br> <a href="'.route('mcq.index').'"> Retake Test</a><br><br> <a href="'.route('mcq.index').'"> << Go Back</a>';
        }
       
        
    }

    
}
