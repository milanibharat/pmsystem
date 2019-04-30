@extends('layouts.app')

@section('content')
<div class='col-lg-9 col-md-9 col-sm-9 pull-left'>
    <!-- Jumbotron -->
    <div class="jumbotron">
        <h1>{{$company->name}}</h1>
        <p class="lead">{{$company->description}}</p>
    </div>


    <div class="row " style='background-color: #fff;margin: 10px;'>
        <div class='row col-lg-12 col-md-12 col-sm-12' style="background: #fff;margin: 10px;">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <a href="/projects/create/{{$company->id}}" class='btn btn-primary pull-right btn-sm' style='height: 30px;'>Add project</a>
            </div>
        </div>
        @foreach($company->projects as $project)
        <div class="col-lg-4 col-md-4 col-sm-4">
            <h2>{{$project->name}}</h2>
            <p class="text-danger">{{$project->description}}</p>
            <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View Project »</a></p>
        </div>
        @endforeach


    </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/companies/{{$company->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></li>
            <li><a href="/projects/create/{{$company->id}}"><i class="fa fa-plus" aria-hidden="true"></i> Add project</a></li> 

            <li><a href="/companies"><i class="fa fa-building" aria-hidden="true"></i>My companies</a></li>

            <li><a href="/companies/create"><i class="fa fa-plus" aria-hidden="true"></i>Create new company</a></li> 

            <br /> 
            <li><i class="fa fa-trash-o" aria-hidden="true"></i>
                
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

                <form id='delete-form' action='{{route('companies.destroy',[$company->id])}}'
                      method='post' style='display: none;'>
                    <input type='hidden' name='_method' value='delete'>
                    {{csrf_field()}}
                </form>
            </li>
        </ol>
    </div>
</div>
@endsection