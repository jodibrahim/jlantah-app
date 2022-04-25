<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use Hash;   
use Signature;

class LaporanController extends Controller
{

    public function index(Request $request)
    {
        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $level_user = $request->session()->get('level_user');
        

        if (empty($token)) {

            return \redirect()->to( '' );

        } else {

            return view('admin.laporan', compact('level_user'));    
        }
    }


}
