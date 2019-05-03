@if(isset($errors)&&count($errors)>0)
<div class='col-md-offset-3 col-sm-offset-3 col-lg-offset-3 col-xs-offset-3 alert alert-dismissible alert-danger'>
    <button type='button' class='close' data-dismiss='alert' aria-label='close'>
        <span aria-hidden='true'>&times;</span>
    </button>
    @foreach ($errors->all() as $error)
    <li><strong style="font-size: 18px;font-weight: normal;">
            {!! $error !!}
        </strong></li>
    @endforeach
</div>
@endif