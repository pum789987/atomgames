@extends('layouts/sub')

@section('title','Atom Games | ลงทะเบียนเข้าร่วมงาน')

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
                    <div class="logo text-uppercase"><span>Dash</span><strong class="text-primary">Express</strong></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                    <form id="register-form">
                        <div class="form-group">
                            <label for="register-username" class="label-custom">User Name</label>
                            <input id="register-username" type="text" name="registerUsername" required>
                        </div>
                        <div class="form-group">
                            <label for="register-email" class="label-custom">Email Address      </label>
                            <input id="register-email" type="email" name="registerEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="register-passowrd" class="label-custom">password        </label>
                            <input id="register-passowrd" type="password" name="registerPassword" required>
                        </div>
                        <div class="terms-conditions d-flex justify-content-center">
                            <input id="license" type="checkbox" class="form-control-custom">
                            <label for="license">Agree the terms and policy</label>
                        </div>
                        <input id="register" type="submit" value="Register" class="btn btn-primary">
                    </form><small>Already have an account? </small><a href="{{Route("loginT")}}" class="signup">Login</a>
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