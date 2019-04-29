@extends('layouts.app')
@section('content')

<div class='col-lg-9 col-md-9 col-sm-9 pull-left'>
    <!-- Well -->
    <div class="well well-lg">
        <h1>{{$project->name}}</h1>
        <p class="lead">{{$project->description}}</p>
    </div>

    <!-- Example row of columns -->
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/projects/{{$project->id}}/edit">Edit</a></li>
            <li><a href="/projects/create">Create new project</a></li>
            <li><a href="/projects">My projects</a></li>
            <br /> 

            @if($project->user_id ==Auth::user()->id)
            <li>
                <a 
                    href="#"
                    onclick="
                            var result = confirm('Are you sure you want to delete this project?');
                            if (result) {
                                event.preventDefault();
                                document.getElementById('delete-form').submit();
                            }
                    "
                    >
                    Delete
                </a>

                <form id='delete-form' action='{{route('projects.destroy',[$project->id])}}'
                      method='post' style='display: none;'>
                    <input type='hidden' name='_method' value='delete'>
                    {{csrf_field()}}
                </form>
            </li>
            @endif
        </ol>
    </div>
</div>

<div class='col-lg-8 col-md-8 col-sm-8' style="background: #fff;margin: 10px;">

    <br />
    <div class='row container-fluid'>       
        <form method='post' action="{{route('comments.store')}}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <input type='hidden' name='commentable_type' value='App\Project'>
            <input type='hidden' name='commentable_id' value='{{$project->id}}'>

            <div class='form-group'>
                <label for='comment-content'>Comment</label>
                <textarea placeholder='Enter Comment' style='resize: vertical' id='comment-content'
                          name='body' rows="3" cols="105" spellcheck='false' class='form-control autosize-target text-left'>
                </textarea>
            </div>
            <div class='form-group'>
                <label for='comment-content'>Proof of work done (Url/Screens)</label>
                <textarea placeholder='Enter Url' style='resize: vertical' id='comment-content'
                          name='url' rows="2" spellcheck='false' class='form-control autosize-target text-left'>
                </textarea>
            </div>
            <div class='form-group'>
                <input type="submit" value='Submit' class='btn btn-primary'>
            </div>
        </form>
    </div>

    @include('partial.comments')
</div>






@endsection