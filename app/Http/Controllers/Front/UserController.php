<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('showUserName1', 'showUserName2', 'showUserName3');
    }

    public function showUserName()
    {
        return 'name :Admin mohammed';
    }

    public function showUserName1()
    {
        return 'هاي مش حيطبق عليها middleware عرفت اسمها فوق في الexcept ';
    }

    // pass data  in controller
    public function showUserName2()
    {

        $string = array('name' => 'mohammed pass data  array', 'id' => 5);

        return view('welcome', $string);
    }


    // pass data  in object
    public function showUserName3()
    {        $obj = new \stdClass();

        $obj->name = 'Mohammed obj';
        $obj->id = 5;
        $obj->gender = 'male';
        return view('welcome ',compact('obj'));
    }
}
