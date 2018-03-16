<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Traits\styleController;
use DB;

class registerController extends Controller
{
    use styleController ;
    public function __construct()
    {

    }
    public function register(){
        $university = DB::table("university")->orderBy("UN_NAME")->lists("UN_NAME");
        $data = array(
            'style' => $this->style(),
            'scriptT' => $this->scriptT(),
            'scriptB' => $this->scriptB(),
            'university' => $university
        );
        return view('registration/register',$data);
    }
    public function getPrename(Request $request){
        $prename = DB::table('name_title')
            ->where('PRE_GENDER', $request->gender)
            ->orWhere('PRE_GENDER','=', 'A')
            ->lists("PRE_NAME","PRE_ID");
        return response()->json($prename);
    }
    public function getExistsUser(Request $request){
        $username = DB::table('attendees')
            ->where('AT_USERNAME', $request->user)
            ->lists("AT_USERNAME");
        if(count($username) > 0){
            $data = 'false';
        }else{
            $data = 'true';
        }
        return response()->json($data);
    }

}
