<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class SurveyController extends Controller
{
    
    public function show(Questionnaire $questionnaire, $slug)
    {
        $questionnaire->load("questions.answers");
        return view("survey.show", ["questionnaire"=>$questionnaire]);
    }
    
    public function store(Questionnaire $questionnaire)
    {
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email'
        ]);

        //dd(request()->all());
        
        $survey = $questionnaire->surveys()->create($data["survey"]);
        $survey->responses()->createMany($data["responses"]);
        
        return "THANK YOU";
    }
    
}
