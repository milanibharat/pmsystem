@extends('layouts.app')

@section('content')

        <div class='col-md-11 col-lg-11 col-md-offset-1 col-lg-offset-1'>
            <div class="panel panel-primary">
                <div class="panel-heading">Projects <a class='pull-right btn btn-primary btn-sm' href="/projects/create">Create new</a></div>
                <div class="panel-body">

                    <ul class="list-group">
                        @foreach($projects as $project)
                        <li class="list-group-item"><a href='/projects/{{$project->id}}'>{{$project->name}}</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection