@extends('layouts.app')

@section('content')
<div class='col-lg-9 col-md-9 col-sm-9 pull-left' style='background-color: #fff;margin: 10px;'>
    <h1>Update Task</h1>

    <!-- Example row of columns -->

    <form method='post' action='{{route('tasks.update',[$task->id])}}'>

        {{ csrf_field() }}
        <input type='hidden' name='_method' value='put'>

        <div class='form-group'>
            <label for='task-name'>Name<span class='required'>*</span></label>
            <input placeholder='Enter Name' 
                   id='task-name'
                   required
                   name='name'
                   spellcheck='false'
                   class='form-control'
                   value='{{$task->name}}'
                   />
        </div>
        
        <div class='form-group'>
            <input type="submit" value='Submit' class='form-control btn btn-primary' style="color: #fff">
        </div>
    </form>
</div>

<div class="col-sm-2 col-md-2 col-lg-2 pull-right">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/tasks/{{$task->id}}">View Tasks</a></li>
            <li><a href="/tasks">All Tasks</a></li>
        </ol>
    </div>
</div>
@endsection