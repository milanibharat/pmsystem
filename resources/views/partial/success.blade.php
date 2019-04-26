@if(session()->has('success'))
<div class='alert alert-dismissible alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='close'>
        <span aria-hidden='true'>&times;</span>
    </button>
    <strong style="font-size: 18px;font-weight: normal;">
        {!! session()->get('success') !!}
    </strong>
</div>
@endif