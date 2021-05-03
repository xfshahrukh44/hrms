@extends('layouts.login-reg')
@section('page-title')
    {{__('Login')}}
@endsection
@php
    $logo=asset(Storage::url('uploads/logo/'));
@endphp
@section('content')
    <div id="app">
        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 pt-4">
                        <div class="changeLanguage float-right mr-1 position-relative">
                            <ul class="navbar-nav navbar-right">
                                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg language-dd"><i class="fas fa-language lang-font"></i></a>
                                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                        <div class="dropdown-header">{{__('Choose Language')}}
                                        </div>

                                        <div class="dropdown-list-content dropdown-list-icons lang-dropdown">
                                            @foreach(Utility::languages() as $language)
                                                <a href="{{ route('login',$language) }}" class="dropdown-item dropdown-item-unread @if($language == $lang) active-language @endif">
                                                    <span> {{Str::upper($language)}}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img class="img-fluid" src="{{$logo.'/logo.png'}}" alt="" width="70%">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header"><h4>{{ __('Login') }}</h4></div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" required autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <div class="invalid-feedback">
                                            {{__('Please fill in your email')}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">{{ __('Password') }}</label>
                                            <div class="float-right">
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link text-small" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror

                                        </div>
                                        <div class="invalid-feedback">
                                            {{ __('please fill in your password') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            {{__("Don't have an account?")}} <a href="{{ route('register') }}">{{ __('Create One') }}</a>
                        </div>
                        <div class="simple-footer">
                            {{(Utility::getValByName('footer_text')) ? Utility::getValByName('footer_text') :  __('Copyright HRLab') }} {{ date('Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
