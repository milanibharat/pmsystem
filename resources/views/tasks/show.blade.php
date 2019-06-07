@extends('layouts.app')
@section('content')

<div class='col-lg-12 col-md-12 col-sm-12 pull-left'>
    <!-- Well -->
    <div class="well well-lg">
        <h1>{{$task->name}}</h1>
        <p class="lead">{{$task->description}}</p>
    </div>

    <!-- Example row of columns -->
</div>
<div class='col-lg-8 col-md-9 col-sm-9' style="background: #fff;margin: 10px;">
    <br />
    <div class='row container-fluid'>       
        <form method='post' action="{{route('comments.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type='hidden' name='commentable_type' value='App\Task'>
            <input type='hidden' name='commentable_id' value='{{$task->id}}'>
            <div class='form-group'>
                <label for='comment-content'><i class="fa fa-comment" aria-hidden="true"></i> Comment</label>
                <textarea placeholder='Enter Comment' style='resize: vertical' id='comment-content'
                          name='body' rows="3" cols="105" spellcheck='false' class='form-control autosize-target text-left'>
                </textarea>
            </div>
            <div class='form-group'>
                <label for='comment-content'><i class="fa fa-th" aria-hidden="true"></i> Proof of work done (Url / Screens)</label>
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

<div class="col-sm-2 col-md-2 col-lg-3 pull-right">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/tasks/{{$task->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></li>
            <li><a href="/tasks/create"><i class="fa fa-plus" aria-hidden="true"></i> Create new task</a></li>
            <li><a href="/tasks"> <i class="fa fa-briefcase" aria-hidden="true"></i> My tasks</a></li>
            <br /> 

            @if($task->user_id ==Auth::user()->id)
            <li><i class="fa fa-trash-o" aria-hidden="true"></i>
                <a 
                    href="#"
                    onclick="
                            var result = confirm('Are you sure you want to delete this task?');
                            if (result) {
                                event.preventDefault();
                                document.getElementById('delete-form').submit();
                            }
                    "
                    >
                    Delete Task
                </a>

                <form id='delete-form' action='{{route('tasks.destroy',[$task->id])}}'
                      method='post' style='display: none;'>
                    <input type='hidden' name='_method' value='delete'>
                    {{csrf_field()}}
                </form>
            </li>
            @endif
        </ol>
        <hr />

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h4>Add Members</h4>
                <form id='add-user' action="{{route('tasks.adduser')}}"
                      method='post'>
                    {{csrf_field()}}
                    <input class="form-control" name = "task_id" id="project_id" value="{{$task->id}}" type="hidden">
                    <input type="text" class="form-control" placeholder="Email" style="height: 30px;" id="email" name="email">
                    <br />
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" id="addMember">Add </button>
                    </span>
                </form>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <br />
        <h4>Team Members</h4>
        <ol class="list-unstyled" id="member-list">
            @foreach($project->users as $user)
            <li><a href="#"> {{ $user->email }} </a></li>
            @endforeach
        </ol>
    </div>
</div>
@endsection