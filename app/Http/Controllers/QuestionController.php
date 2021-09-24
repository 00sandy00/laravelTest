<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['questions'] = Question::with('option')->get();
        return view('question.list')->with($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result="";
        return view('question.addedit')->with($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question=$request->input('question');
        $options=$request->input('option');
        $is_correct=$request->input('is_correct');

        $optionInsertArr=[];
        foreach ($options as $value) {
            if ($is_correct==$value) {
                $optionInsertArr[]=[
                        'option'=>$value,
                        'is_correct'=>'Y'
                    ];
            }else {
                $optionInsertArr[]=[
                        'option'=>$value,
                        'is_correct'=>'N'
                    ];
            }
            
        }

        $Question = Question::create(['question'=>$question]);
        $Question->option()->createMany($optionInsertArr);
        return redirect('/question')->with('msg', 'Question Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $result['questionId']=$question->id;
        $result['questions'] = Question::where('id','=',$question->id)->with('option')->get();
        return view('question.addedit')->with($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $questionIn=$request->input('question');
        $options=$request->input('option');
        $is_correct=$request->input('is_correct');

        $optionInsertArr=[];
        foreach ($options as $value) {
            if ($is_correct==$value) {
                $optionInsertArr[]=[
                        'option'=>$value,
                        'is_correct'=>'Y'
                    ];
            }else {
                $optionInsertArr[]=[
                        'option'=>$value,
                        'is_correct'=>'N'
                    ];
            }
            
        }
        $question->update(['question'=>$questionIn]);
        //$Question = Question::where('id', '=', $question->id)->update(['question'=>$questionIn]);        
        Option::where('question_id', '=', $question->id)->delete();
        $question->option()->createMany($optionInsertArr);
        return redirect('/question')->with('msg', 'Question Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
       return Question::destroy($question->id);
                
    }
}
