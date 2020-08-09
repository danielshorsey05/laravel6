@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class ="card-header">Create New Questionnaire</div>
                
                <div class ="card-body">
                    <form method ="post" action="/questionnaires">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name ="title" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter title">
                            <small id="titleHelp" class="form-text text-muted">Enter the title of your questionnaire</small>
                            @error("title")
                            <small class ="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Purpose</label>
                            <input type="text" name ="purpose" class="form-control" id="title" aria-describedby="purposeHelp" placeholder="Enter purpose">
                            <small id="purposeHelp" class="form-text text-muted">Enter the purpose of the questionnaire</small>
                            @error("title")
                            <small class ="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

