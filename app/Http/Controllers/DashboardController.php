<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use Hash;
use Signature;



class DashboardController extends Controller
{
    
    public function index(Request $request)
    {
        $token = $request->session()->get('token');
        $level_user = $request->session()->get('level_user');

        $httpMethod = "GET";
        $body = "{}";
        $sign = new Signature();
        $signature = $sign->_createSignature($httpMethod, $body);

        

       

        if (empty($token)) {
            return \redirect()->to( '' );
        } else {
            return view('admin.dashboard', compact('level_user'));    
        }
        
    }

    public function dataHub(Request $request)
    {
        $token = $request->session()->get('token');
        $level_user = $request->session()->get('level_user');

        $httpMethod = "GET";
        $body = "{}";
        $sign = new Signature();
        $signature = $sign->_createSignature($httpMethod, $body);
        

        return view('hub.dashboard', compact('level_user')); 
    }


}
