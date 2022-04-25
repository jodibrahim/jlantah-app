<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use Hash;
use Signature;

class KeluarbarangController extends Controller
{

    public function index(Request $request)
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


            return view('hub.keluar_barang', compact('level_user'));    
        }

    }

    public function loadDataBarangHub(Request $request, $limit, $page) {

        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $httpMethod = "GET";
        $body = "{}";
        $sign = new Signature();
        $signature = $sign->_createSignature($httpMethod, $body);

        $api = env('API_URL');

        $client = new  \GuzzleHttp\Client(); 
        $response = $client->request("GET", ''.$api.'api/pesanan_hub/delivery_orders?limit='.$limit.'&page='.$page.'&sort=desc', 
            ['headers' => [
                'x-auth-token' => ''.$token.'',
                'x-auth-client' => ''.$client_secret.'',
                'x-auth-signature' => ''.$signature.'']
            ]); 

        $data = json_decode((string) $response->getBody(), true);
        echo json_encode($data);
    }

    public function addData(Request $request)
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
            $response = $client->request("GET", ''.$api.'api/admin/users?type=hub', 
                ['headers' => [
                    'x-auth-token' => ''.$token.'',
                    'x-auth-client' => ''.$client_secret.'',
                    'x-auth-signature' => ''.$signature.'']
                ]); 
            $data = json_decode((string) $response->getBody(), true);
            $pool = $data['data'];

            $client_buyer = new  \GuzzleHttp\Client(); 
            $response_buyer = $client_buyer->request("GET", ''.$api.'api/admin/buyers', 
                ['headers' => [
                    'x-auth-token' => ''.$token.'',
                    'x-auth-client' => ''.$client_secret.'',
                    'x-auth-signature' => ''.$signature.'']
                ]); 
            $data_buyer = json_decode((string) $response_buyer->getBody(), true);
            $buyer = $data_buyer['data'];
            

            return view('admin.add_keluar_barang', compact('level_user', 'pool', 'buyer'));    
        }

    }

    public function editData(Request $request)
    {

        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $level_user = $request->session()->get('level_user');
        

        if (empty($token)) {

            return \redirect()->to( '' );

        } else {

            return view('admin.edit_keluar_barang', compact('level_user'));    
        }

    }

    public function cekData(Request $request)
    {
        
        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $level_user = $request->session()->get('level_user');
        

        if (empty($token)) {

            return \redirect()->to( '' );

        } else {

            return view('admin.keluar_barang', compact('level_user'));    
        }
    }

    public function loadDataBarang(Request $request, $limit, $page) {

        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $httpMethod = "GET";
        $body = "{}";
        $sign = new Signature();
        $signature = $sign->_createSignature($httpMethod, $body);

        $api = env('API_URL');

        $client = new  \GuzzleHttp\Client(); 
        $response = $client->request("GET", ''.$api.'api/admin/delivery_order?page='.$page.'&limit='.$limit.'&sort=desc', 
            ['headers' => [
                'x-auth-token' => ''.$token.'',
                'x-auth-client' => ''.$client_secret.'',
                'x-auth-signature' => ''.$signature.'']
            ]); 

        $data = json_decode((string) $response->getBody(), true);
        echo json_encode($data);
    }

    public function insertBarang(Request $request) {
        
        $form_data = array(
            'hub_id'        =>  $request->hub_id,
            'buyer_id'        =>  $request->buyer_id,
            'nama_driver'        =>  $request->nama_driver,
            'nomor_kendaraan'        =>  $request->nomor_kendaraan,
            'phone_driver'        =>  $request->phone_driver,
            'jumlah_liter'        =>  $request->jumlah_liter
        );



        $postdata = json_encode($form_data);
        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $httpMethod = "POST";
        $body = $postdata;
        $sign = new Signature();
        $signature = $sign->_createSignature($httpMethod, $body);
        $url = env('API_URL');

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => ''.$url.'api/admin/delivery_order',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $postdata,
          CURLOPT_HTTPHEADER => array(
            'x-auth-token: '.$token.'',
            'x-auth-client: '.$client_secret.'',
            'x-auth-signature: '.$signature.'',
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);
        $convert = json_decode($response,true);
        $data = $convert['status'];
        $message = $convert['message'];
        curl_close($curl);
        return response()->json(['status' => $data , 'message' => $message]);

    }

    public function confirmBarang(Request $request,$id) {

        $form_data = array(
            'status'        =>  $request->status
        );


        $postdata = json_encode($form_data);

        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $httpMethod = "PUT";
        $body = $postdata;
        $sign = new Signature();
        $signature = $sign->_createSignature($httpMethod, $body);
        $url = env('API_URL');

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => ''.$url.'api/pesanan_hub/delivery_order/'.$id.'',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'PUT',
          CURLOPT_POSTFIELDS => $postdata,
          CURLOPT_HTTPHEADER => array(
            'x-auth-token: '.$token.'',
            'x-auth-client: '.$client_secret.'',
            'x-auth-signature: '.$signature.'',
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);
        $convert = json_decode($response,true);
        $data = $convert['status'];
        $message = $convert['message'];
        curl_close($curl);
        return response()->json(['status' => $data , 'message' => $message]);
    }


}
