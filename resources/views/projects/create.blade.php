@extends('layouts.app')

@section('content')
<div class='row col-lg-9 col-md-9 col-sm-9 pull-left' style='background-color: #fff;margin: 10px;'>
    <h1>Create New Project</h1>

    <!-- Example row of columns -->
    <div class="row col-lg-12 col-md-12 col-sm-12">
        <form method='post' action='{{route('projects.store')}}'>

            {{ csrf_field() }}

            <div class='form-group'>
                <label for='project-name'>Name<span class='required'>*</span></label>
                <input class='form-control' placeholder='Enter Name' id='project-name' name='name' spellcheck='false'  required/>
            </div>

            @if($companies == null)
            <input class="form-control" name='company_id' type='hidden' value='{{$company_id}}'/>
            @endif

            @if($companies != null)
            <div class='form-group'>
                <label for='company-content'>Select Company</label>
                <select name="company_id" class='form-control'>
                    @foreach($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif

            <div class='form-group'>
                <label for='project-content'>Description</label>
                <textarea placeholder='Enter Description' style='resize: vertical' id='project-content'
                          name='description' rows="5" cols="105"  spellcheck='false' class='form-control autosize-target text-left'>
                </textarea>
            </div>
            <div class='form-group'>
                <input type="submit" value='submit' class='btn btn-primary'>
            </div>
        </form>
    </div>
</div>

<div class="col-sm-2 col-md-2 col-lg-2 pull-right">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/projects">My Projects</a></li>

        </ol>
    </div>
</div>
@endsection