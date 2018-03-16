<?php

namespace App\Traits;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Routing\ControllerDispatcher;

trait styleController
{
    public function style(){
        $style = array(
            'vendor/bootstrap/css/bootstrap.min.css',
            'vendor/font-awesome/css/font-awesome.min.css',
            'css/fontastic.css',
            'http://fonts.googleapis.com/css?family=Roboto:300,400,500,700',
            'css/grasp_mobile_progress_circle-1.0.0.min.css',
            'vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css',
            'css/custom.css'
        );
        return $style ;
    }

    public function scriptT(){
        $scriptT = array(
            'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js',
            'https://oss.maxcdn.com/respond/1.4.2/respond.min.js'
        );
        return $scriptT ;
    }
    public function scriptB(){
        $scriptB = array(
            'https://code.jquery.com/jquery-3.2.1.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js',
            'vendor/bootstrap/js/bootstrap.min.js',
            'vendor/jquery.cookie/jquery.cookie.js',
            'js/grasp_mobile_progress_circle-1.0.0.min.js',
            'vendor/jquery-validation/jquery.validate.min.js',
            'vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
            'js/front.js'
        );
        return $scriptB ;
    }
}
