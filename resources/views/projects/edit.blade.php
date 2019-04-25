@extends('layouts.app')

@section('content')
<div class='col-lg-9 col-md-9 col-sm-9 pull-left' style='background-color: #fff;margin: 10px;'>
    <h1>Update Project</h1>

    <!-- Example row of columns -->
    <div class="row col-lg-12 col-md-12 col-sm-12">
        <form method='post' action='{{route('projects.update',[$project->id])}}'>

            {{ csrf_field() }}
            <input type='hidden' name='_method' value='put'>

            <div class='form-group'>
                <label for='project-name'>Name<span class='required'>*</span></label>
                <input placeholder='Enter Name' 
                       id='project-name'
                       required
                       name='name'
                       spellcheck='false'
                       class='form-control'
                       value='{{$project->name}}'
                       />
            </div>
            <div class='form-group'>
                <label for='project-content'>Description</label>
                <textarea placeholder='Enter Description' 
                          style='resize: vertical'
                          id='project-content'
                          name='description'
                          rows="5"
                          spellcheck='false'
                          class='form-control autosize-target text-left'>
                    {{$project->description}}</textarea>

            </div>
            <div class='form-group'>
                <input type="submit" value='submit' class='btn btn-primary'>
            </div>
        </form>

    </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/projects/{{$project->id}}">View Projects</a></li>
            <li><a href="/projects">All Projects</a></li>
        </ol>
    </div>
</div>
@endsection