@extends('layouts/sub')

@section('title','Atom Games | เข้าสู่ระบบ')

@section('style')
    @foreach($style as $css)
        {{ Html::style(($css))}}
    @endforeach
    {{ Html::style(('css/style.tomato.css'),array('id' => 'theme-stylesheet'))}}
    {{ Html::favicon( 'img/title_atom.png' ) }}
@endsection

@section('scriptT')
    @foreach($scriptT as $jsT)
        {{ Html::script(($jsT))}}
    @endforeach
@endsection

@section('container')
    <div class="page login-page">
        <div class="container">
            <div class="form-outer text-center d-flex align-items-center">
                <div class="form-inner">
                    <div class="logo text-uppercase"><span>Bootstrap</span><strong class="text-primary">Dashboard</strong></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                    <form id="login-form" method="post">
                        <div class="form-group">
                            <label for="login-username" class="label-custom">User Name</label>
                            <input id="login-username" type="text" name="loginUsername" required="">
                        </div>
                        <div class="form-group">
                            <label for="login-password" class="label-custom">Password</label>
                            <input id="login-password" type="password" name="loginPassword" required="">
                        </div><a id="login" href="{{Route("index")}}" class="btn btn-primary">Login</a>
                        <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                    </form><a href="#" class="forgot-pass">Forgot Password?</a><small>Do not have an account? </small><a href="{{Route("registerT")}}" class="signup">Signup</a>
                </div>
                <div class="copyrights text-center">
                    <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
                    <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptB')
    @foreach($scriptB as $jsB)
        {{ Html::script(($jsB))}}
    @endforeach
@endsection