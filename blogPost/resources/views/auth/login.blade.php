@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
<div class="container">
    <div class="row justify-content-center" id="loginContainer">
        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-4">
                    <h3><i>Our Mission...</i></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <p>Now you can browse privately, and other people who use this device won't see your activity.
                        However, downloads and bookmarks will be saved. Learn more</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <h3><i>Our Vision...</i></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <p>Chrome won't save the following information:Your browsing history
                        Cookies and site data
                        Information entered in forms
                        Your activity might still be visible to:</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                <input id="email" placeholder="Enter your email here" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                         
                            <div class="col-md-12">
                                <input id="password" placeholder="Enter your password here" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary" style="width:100%">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>





        </div>
    </div>
</div>
@endsection