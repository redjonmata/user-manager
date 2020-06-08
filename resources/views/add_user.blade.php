@extends('layouts.app')
@section('title', 'Add  User')

@section('content')
<div class="container" id="home-container">
    <div class="row justify-content-center align-items-center pt-4">
        <div class="col-12 col-md-10 col-lg-8 ">
            <form method="post" action="/add-user" name="Form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h4 class="form-heading text-center">Add user</h4>

                <div class="field field-create">
                    <label class="label-input" for="first_name"> <strong>First Name</strong> </label><br/>
                    <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" id="first_name" name="first_name" value="{{ old('first_name') }}" required autofocus>

                    @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="field field-create">
                    <label class="label-input" for="last_name"> <strong>Last Name</strong> </label><br/>
                    <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" id="last_name" name="last_name" value="{{ old('last_name') }}" required autofocus>

                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="field field-create">
                    <label class="label-input" for="username"> <strong>Username</strong> </label><br/>
                    <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" name="username" value="{{ old('username') }}" required autofocus>

                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="field field-create">
                    <label class="label-input" for="email"> <strong>Email</strong> </label><br/>
                    <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="field field-create">
                    <label class="label-input" for="password"> <strong>Password</strong> </label><br/>
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" required autofocus>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="field field-create">
                    <label class="label-input" for="password_confirmation"> <strong>Confirm Password</strong> </label><br/>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autofocus>
                </div>

                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary" id="email-submit-btn">Add car</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
