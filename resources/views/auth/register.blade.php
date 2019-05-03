@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Register') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name *') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" 
                                       onkeyup="this.value = this.value.toUpperCase();" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="middle_name" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name (optional)') }}</label>

                            <div class="col-md-6">
                                <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" 
                                       onkeyup="this.value = this.value.toUpperCase();" name="middle_name" value="{{ old('middle_name') }}"  autocomplete="first_name" autofocus>

                                @if ($errors->has('middle_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('middle_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name *') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" 
                                       onkeyup="this.value = this.value.toUpperCase();" name="last_name" value="{{ old('last_name') }}" required autocomplete="middle_name" autofocus>

                                @if ($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address *') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                       onkeyup="this.value = this.value.toLowerCase();" name="email" value="{{ old('email') }}" required autocomplete="last_name">

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!--
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country *') }}</label>
                            <div class="col-md-6">
                                <select id="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" 
                                        style="text-transform: capitalize;" name="country" value="{{ old('country') }}" required autocomplete="email">
                                  
                                                             
                                    <?php /* foreach ($register->user() as $user) { ?>
                                                                <option value="<?php echo $user->id ?>"><?php echo $user->user_id ?></option>
                                    <?php } */ ?>
                                        
                                    
                                    @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State *') }}</label>

                            <div class="col-md-6">
                                <select id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" 
                                        style="text-transform: capitalize;" name="state" value="{{ old('state') }}" required 
                                        autocomplete="country">
                                    @if ($errors->has('state'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City *') }}</label>
                            <div class="col-md-6">
                                <select id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" 
                                        style="text-transform: capitalize;" value="{{ old('city') }}" required autocomplete="state">
                                    @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                        </div>   
                        -->
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country *') }}</label>
                            <div class="col-md-6">
                                <input id="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" 
                                        style="text-transform: capitalize;" name="country" value="{{ old('country') }}" required autocomplete="email">
                                  
                                                             
                                    <?php /* foreach ($register->user() as $user) { ?>
                                                                <option value="<?php echo $user->id ?>"><?php echo $user->user_id ?></option>
                                    <?php } */ ?>
                                        
                                    
                                    @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State *') }}</label>

                            <div class="col-md-6">
                                <input id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" 
                                        style="text-transform: capitalize;" name="state" value="{{ old('state') }}" required 
                                        autocomplete="country">
                                    @if ($errors->has('state'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City *') }}</label>
                            <div class="col-md-6">
                                <input id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" 
                                        style="text-transform: capitalize;" value="{{ old('city') }}" required autocomplete="state">
                                    @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                        </div>   
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4">
                                <button type="submit" class="btn btn-primary register">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
