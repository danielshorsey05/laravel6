
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class ="card-header">{{$questionnaire->title}}</div>
                
                <div class ="card-body">
                    <a href ="/questionnaires/{{$questionnaire->id}}/questions/create" class ="btn btn-dark">Add Question</a>
                    <a href ="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}" class ="btn btn-dark">Take Survey</a>
                </div>
            </div>
            
            @foreach($questionnaire->questions AS $question)
            <div class="card mt-4">
                <div class ="card-header">{{$question->question}}</div>
                <div class ="card-body">
                    <ul class="list-group">
                        @foreach($question->answers AS $answer)
                        <li class="list-group-item">
                            <div>{{$answer->answer}}</div>
                            <div>{{$answer->responses->count()}}</div>
                            <div>{{$question->responses->count()}}</div>
                        </li>
                            
                        @endforeach
                    </ul>    
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection

