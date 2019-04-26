@extends('layouts.app')

@section('content')
<div class='col-lg-9 col-md-9 col-sm-9 pull-left' style='background-color: #fff;margin: 10px;'>
    <h1>Update Company</h1>

    <!-- Example row of columns -->
    <div class="row col-lg-12 col-md-12 col-sm-12">
        <form method='post' action='{{route('companies.update',[$company->id])}}'>

            {{ csrf_field() }}
            <input type='hidden' name='_method' value='put'>

            <div class='form-group'>
                <label for='company-name'>Name<span class='required'>*</span></label>
                <input placeholder='Enter Name' 
                       id='company-name'
                       required
                       class="form-control"
                       name='name'
                       spellcheck='false'                      
                       value='{{$company->name}}'
                       />
            </div>
            <div class='form-group'>
                <label for='company-content'>Description</label>
                <textarea placeholder='Enter Description' 
                          style='resize: vertical'
                          id='company-content'
                          name='description'
                          rows="5"
                          cols="105"
                          spellcheck='false'
                          class='form-control autosize-target text-left'>
                    {{$company->description}}</textarea>
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
            <li><a href="/companies/{{$company->id}}">View Companies</a></li>
            <li><a href="/companies">All Companies</a></li>
        </ol>
    </div>
</div>
@endsection