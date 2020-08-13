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
                
                <div class="card mt-4">
                    <div class ="card-header">Your information</div>
                    <div class ="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name ="survey[name]" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name">
                            <small id="nameHelp" class="form-text text-muted">Enter your name</small>
                            @error("name")
                            <small class ="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name ="survey[email]" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">Enter your email address</small>
                            @error("email")
                            <small class ="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                
                
                
                
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
            
        </div>
    </div>
</div>
@endsection


