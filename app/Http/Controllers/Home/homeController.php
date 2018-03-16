<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Traits\styleController;

class homeController extends Controller
{
    use styleController ;

    public function __construct()
    {

    }

    public function home(){

        $data = array(
            'style' => $this->style(),
            'scriptT' => $this->scriptT(),
            'scriptB' => $this->scriptB()
        );
        return view('home/home',$data);
    }

}
