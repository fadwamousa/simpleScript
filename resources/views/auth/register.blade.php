@extends('layouts.main')

@section('content')


    <div class="album text-muted">
        <div class="container">
            <div class="row">
                <h1>Seeker Registration</h1>



                <div class="site-section bg-light">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12  col-lg-8 mb-5">
                                <div class="card">
                                    <div class="card-header">{{ __('Register Job Seeker') }}</div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <input type="hidden" value="seeker" name="user_type">

                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                <div class="col-md-12">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-12">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                                                <div class="col-md-12">
                                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror"
                                                           name="dob"
                                                           value="{{ old('dob') }}"  autocomplete="dob">

                                                    @error('dob')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                                <div class="col-md-12">
                                                    <input id="gender" type="radio"

                                                           name="gender"
                                                           value="male"  autocomplete="gender">Male
                                                    <input id="gender" type="radio"

                                                           name="gender"
                                                           value="female"  autocomplete="gender">Fe-Male
                                                    @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-12">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                <div class="col-md-12">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-12 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
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
                </div>
            </div>
        </div>
    </div>



@endsection
