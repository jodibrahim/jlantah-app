<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use Hash;
use Signature;

class DatamitraController extends Controller
{

    

    public function index(Request $request)
    {
        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $level_user = $request->session()->get('level_user');
        

        if (empty($token)) {

            return \redirect()->to( '' );

        } else {

            return view('admin.data_mitra', compact('level_user'));    
        }

    }


    public function loadDataMitra(Request $request, $limit, $page) {

        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $httpMethod = "GET";
        $body = "{}";
        $sign = new Signature();
        $signature = $sign->_createSignature($httpMethod, $body);

        $api = env('API_URL');

        $client = new  \GuzzleHttp\Client(); 
        $response = $client->request("GET", ''.$api.'api/admin/users?type=mitra&limit='.$limit.'&page='.$page.'', 
            ['headers' => [
                'x-auth-token' => ''.$token.'',
                'x-auth-client' => ''.$client_secret.'',
                'x-auth-signature' => ''.$signature.'']
            ]); 

        $data = json_decode((string) $response->getBody(), true);
        echo json_encode($data);
    }
}
