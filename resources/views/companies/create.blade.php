@extends('layouts.app')

@section('content')
<div class='row col-lg-9 col-md-9 col-sm-9 pull-left' style='background-color: #fff;margin: 10px;'>
    <h1>Create New Company</h1>

    <!-- Example row of columns -->
    <div class="row col-lg-12 col-md-11 col-sm-11">
        <form method='post' action='{{route('companies.store')}}'>

            {{ csrf_field() }}

            <div class='form-group'>
                <label for='company-name'>Name<span class='required'>*</span></label>
                <input placeholder='Enter Name' id='company-name' name='name' spellcheck='false' class='form-control' required/>
            </div>
            <div class='form-group'>
                <label for='company-content'>Description</label>
                <textarea placeholder='Enter Description' style='resize: vertical' id='company-content'
                          name='description' rows="5" cols="105" spellcheck='false' class='form-control autosize-target text-left'>
                </textarea>
            </div>
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
            <li><a href="/companies"><i class="fa fa-building" aria-hidden="true"></i>My Companies</a></li>

        </ol>
    </div>
</div>
@endsection