<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use Hash;
use Signature;

class DatapesananController extends Controller
{

    public function index(Request $request)
    {
        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $level_user = $request->session()->get('level_user');
        

        if (empty($token)) {

            return \redirect()->to( '' );

        } else {

            return view('admin.data_pesanan', compact('level_user'));    
        }
        
    }

    public function detailPesanan(Request $request, $id)
    {   
        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $level_user = $request->session()->get('level_user');

        

        if (empty($token)) {

            return \redirect()->to( '' );

        } else {

            $httpMethod = "GET";
            $body = "{}";
            $sign = new Signature();
            $signature = $sign->_createSignature($httpMethod, $body);
            $api = env('API_URL');
            $client = new  \GuzzleHttp\Client(); 
            $response = $client->request("GET", ''.$api.'api/admin/order/'.$id.'', 
                ['headers' => [
                    'x-auth-token' => ''.$token.'',
                    'x-auth-client' => ''.$client_secret.'',
                    'x-auth-signature' => ''.$signature.'']
                ]); 
            $data = json_decode((string) $response->getBody(), true);
            $detail = $data['data'];
            

            return view('admin.detail_pesanan', compact('level_user', 'detail'));    
        }
        
    }

    public function dataHub(Request $request)
    {
        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $level_user = $request->session()->get('level_user');
        

        if (empty($token)) {

            return \redirect()->to( '' );

        } else {


            return view('hub.data_pesanan_hub', compact('level_user'));    
        }
    }

    public function loadDataPesanan(Request $request, $limit, $page) {

        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $httpMethod = "GET";
        $body = "{}";
        $sign = new Signature();
        $signature = $sign->_createSignature($httpMethod, $body);

        $api = env('API_URL');

        $client = new  \GuzzleHttp\Client(); 
        $response = $client->request("GET", ''.$api.'api/admin/orders?page='.$page.'&limit='.$limit.'&sort=desc', 
            ['headers' => [
                'x-auth-token' => ''.$token.'',
                'x-auth-client' => ''.$client_secret.'',
                'x-auth-signature' => ''.$signature.'']
            ]); 

        $data = json_decode((string) $response->getBody(), true);
        echo json_encode($data);
    }

    public function loadDataPesananHub(Request $request, $limit, $page) {

        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $httpMethod = "GET";
        $body = "{}";
        $sign = new Signature();
        $signature = $sign->_createSignature($httpMethod, $body);

        $api = env('API_URL');

        $client = new  \GuzzleHttp\Client(); 
        $response = $client->request("GET", ''.$api.'api/pesanan_hub/orders?limit='.$limit.'&page='.$page.'&status=completed&sort=desc', 
            ['headers' => [
                'x-auth-token' => ''.$token.'',
                'x-auth-client' => ''.$client_secret.'',
                'x-auth-signature' => ''.$signature.'']
            ]); 

        $data = json_decode((string) $response->getBody(), true);
        echo json_encode($data);
    }

    public function detailPesananHub(Request $request, $id)
    {
        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $level_user = $request->session()->get('level_user');

        

        if (empty($token)) {

            return \redirect()->to( '' );

        } else {

            $httpMethod = "GET";
            $body = "{}";
            $sign = new Signature();
            $signature = $sign->_createSignature($httpMethod, $body);
            $api = env('API_URL');
            $client = new  \GuzzleHttp\Client(); 
            $response = $client->request("GET", ''.$api.'api/pesanan_hub/order/'.$id.'', 
                ['headers' => [
                    'x-auth-token' => ''.$token.'',
                    'x-auth-client' => ''.$client_secret.'',
                    'x-auth-signature' => ''.$signature.'']
                ]); 
            $data = json_decode((string) $response->getBody(), true);
            $detail = $data['data'];


            return view('hub.detail_pesanan', compact('level_user', 'detail'));    
        }
    }

    

}
