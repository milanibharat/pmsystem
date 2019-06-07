@extends('layouts.app')

@section('content')

        <div class='col-md-11 col-lg-11 col-md-offset-1 col-lg-offset-1'>
            <div class="panel panel-primary">
                <div class="panel-heading">Tasks <a class='pull-right btn btn-primary btn-sm' href="/tasks/create">Create new</a></div>
                <div class="panel-body">

                    <ul class="list-group">
                        @foreach($tasks as $task)
                        <li class="list-group-item"><a href='/tasks/{{$task->id}}'>{{$task->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection