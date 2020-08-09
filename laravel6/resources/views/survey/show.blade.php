@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <h1>{{$questionnaire->title}}</h1>
            
            <form method ="post" action ="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}">
                @csrf
                
                @foreach($questionnaire->questions AS $key => $question)
                    <div class="card mt-4">
                        <div class ="card-header"><strong>{{$key+1}}.</strong> {{$question->question}}</div>
                        <div class ="card-body">
                            
                            @error("responses.".$key.".answer_id")
                                <small class = "text-danger">{{$message}}</small>
                            @enderror
                            
                            <ul class="list-group">
                                @foreach($question->answers AS $answer)
                                <label for="answer{{$answer->id}}">
                                    <li class="list-group-item">
                                        <input type ="radio" name ="responses[{{$key}}][answer_id]" 
                                               {{old("responses.".$key.".answer_id")==$answer->id ? "CHECKED" : ""}}
                                               class = "mr-2" id ="answer{{$answer->id}}" value = "{{$answer->id}}">
                                        {{$answer->answer}}
                                        
                                        <input type ="hidden" name ="responses[{{$key}}][question_id]" value = "{{$question->id}}"/>
                                    </li>
                                </label>
                                @endforeach
                            </ul>    
                        </div>
                    </div>
                @endforeach 
                
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
            
        </div>
    </div>
</div>
@endsection


