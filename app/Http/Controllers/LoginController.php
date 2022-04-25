<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use Hash;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;
use Redirect;

class LoginController extends Controller
{

    public function index(Request $request)
    {   
        $token = $request->session()->get('token');
        
        if (!empty($token)) {
            return Redirect::back();
        } else {
            $message = '';
            return view('login', ['message' => $message]);
        }
    }

    public function loginHub()
    {
        return view('login_hub');
    }

    public function login(Request $request)
    {
        $api = env('API_URL');

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => ''.$api.'api/auth/web',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "email": "'.$request->email.'",
            "password": "'.$request->password.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),

        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $responseData = json_decode($response, true);
        $data = $responseData['status'];




        if ($data=='success') {

            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => ''.$api.'api/profile/me',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
                'x-auth-token: '.$responseData['token'].''
              ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $responseDataProfile = json_decode($response, true);
            $id = $responseDataProfile['id'];
            $level_user = $responseDataProfile['level_user'];

            $request->session()->put('token',$responseData['token']);
            $request->session()->put('client_secret',$responseData['client_secret']);
            $request->session()->put('uid',$id);
            $request->session()->put('level_user',$level_user);

            if ($level_user==1) {
                return \redirect()->to( 'dashboard' );
            } else {
                return \redirect()->to( 'dashboard_hub' );
            }
            

        } else {

            $message = 'error';
            return view('login', ['message' => $message]);
        }
        
    }

    public function logout(Request $request)
    {
        $request->session()->forget('token');
        $request->session()->forget('client_secret');
        return \redirect()->to( '' );
    }

    

}
