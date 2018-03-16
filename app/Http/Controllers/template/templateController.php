<?php

namespace App\Http\Controllers\template;

use App\Http\Controllers\Controller;
use App\Traits\styleController;

class templateController extends Controller
{
    use styleController ;

    public function __construct()
    {

    }

    public function index(){

        $data = array(
            'style' => $this->style(),
            'scriptT' => $this->scriptT(),
            'scriptB' => $this->scriptB()
        );
        return view('template/index',$data);
    }

    public function Charts(){

        $data = array(
            'style' => $this->style(),
            'scriptT' => $this->scriptT(),
            'scriptB' => $this->scriptB()
        );
        return view('template/Charts',$data);
    }

    public function forms(){

        $data = array(
            'style' => $this->style(),
            'scriptT' => $this->scriptT(),
            'scriptB' => $this->scriptB()
        );
        return view('template/forms',$data);
    }
    public function tables(){

        $data = array(
            'style' => $this->style(),
            'scriptT' => $this->scriptT(),
            'scriptB' => $this->scriptB()
        );
        return view('template/tables',$data);
    }
    public function loginT(){

        $data = array(
            'style' => $this->style(),
            'scriptT' => $this->scriptT(),
            'scriptB' => $this->scriptB()
        );
        return view('template/loginT',$data);
    }
    public function registerT(){

        $data = array(
            'style' => $this->style(),
            'scriptT' => $this->scriptT(),
            'scriptB' => $this->scriptB()
        );
        return view('template/registerT',$data);
    }
    public function icons(){

        return view('template/icons');
    }
}
