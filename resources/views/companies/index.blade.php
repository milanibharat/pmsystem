@extends('layouts.app')

@section('content')

        <div class='col-md-11 col-lg-11 col-md-offset-1 col-lg-offset-1'>
            <div class="panel panel-primary">
                <div class="panel-heading">Companies <a class='pull-right btn btn-primary btn-sm' href="/companies/create">Create new</a></div>
                <div class="panel-body">

                    <ul class="list-group">
                        @foreach($companies as $company)
                        <li class="list-group-item"><a href='/companies/{{$company->id}}'>{{$company->name}}</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection