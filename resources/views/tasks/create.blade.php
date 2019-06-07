@extends('layouts.app')

@section('content')
<div class='row col-lg-9 col-md-9 col-sm-9 pull-left' style='background-color: #fff;margin: 10px;'>
    <h1>Create New Task</h1>

    <!-- Example row of columns -->
    <div class="row col-lg-12 col-md-12 col-sm-12">
        <form method='post' action='{{route('tasks.store')}}'>

            {{ csrf_field() }}

            <div class='form-group'>
                <label for='task-name'>Name<span class='required'>*</span></label>
                <input class='form-control' placeholder='Enter Name' id='task-name' name='name' spellcheck='false'  required/>
            </div>

            @if($projects == null)
            <input class="form-control" name='project_id' type='hidden' value='{{$project_id}}'/>
            @endif

            @if($projects != null)
            <div class='form-group'>
                <label for='project-content'><i class="fa fa-product-hunt" aria-hidden="true"></i> Select Project </label>
                <select name="project_id" class='form-control'>
                    @foreach($projects as $project)
                    <option value="{{$project->id}}">{{$project->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif
            
            <div class='form-group'>
                <input type="submit" value='Submit' class='form-control btn btn-primary' style="color: #fff">
            </div>
        </form>
    </div>
</div>

<div class="col-sm-2 col-md-2 col-lg-2 pull-right">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/tasks"><i class="fa fa-product-hunt" aria-hidden="true"></i>My Tasks</a></li>

        </ol>
    </div>
</div>
@endsection