<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use Hash;
use Signature;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;

class DatahargaController extends Controller
{

    public function index(Request $request)
    {   
        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $level_user = $request->session()->get('level_user');
        

        if (empty($token)) {

            return \redirect()->to( '' );

        } else {

            return view('admin.data_harga', compact('level_user'));    
        }
        
    }


    public function loadDataHarga(Request $request, $limit, $page) {

        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $httpMethod = "GET";
        $body = "{}";
        $sign = new Signature();
        $signature = $sign->_createSignature($httpMethod, $body);

        $api = env('API_URL');

        $client = new  \GuzzleHttp\Client(); 
        $response = $client->request("GET", ''.$api.'api/admin/price_category_list?limit='.$limit.'&page='.$page.'&sort=desc', 
            ['headers' => [
                'x-auth-token' => ''.$token.'',
                'x-auth-client' => ''.$client_secret.'',
                'x-auth-signature' => ''.$signature.'']
            ]); 

        $data = json_decode((string) $response->getBody(), true);
        echo json_encode($data);
    }

    public function addHarga(Request $request)
    {
        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $level_user = $request->session()->get('level_user');
        

        if (empty($token)) {

            return \redirect()->to( '' );

        } else {

            return view('admin.add_harga', compact('level_user'));    
        }

    }

    public function getDistrict($id)
    {
        
        $api = env('API_URL');
        $client = new  \GuzzleHttp\Client(); 
        $response = $client->request("GET", ''.$api.'api/location/kabko?lokasi_propinsi='.$id.'', 
            ); 

        $result = json_decode((string) $response->getBody(), true);
        $district = $result['data'];
        return json_encode($district);
    }

    public function getSubDistrict($id_prov, $id_district)
    {
        
        $api = env('API_URL');
        $client = new  \GuzzleHttp\Client(); 
        $response = $client->request("GET", ''.$api.'api/location/kecamatan?lokasi_propinsi='.$id_prov.'&lokasi_kabupatenkota='.$id_district.'', 
            ); 

        $result = json_decode((string) $response->getBody(), true);
        $subdistrict = $result['data'];
        return json_encode($subdistrict);
    }

    public function getVillage($id_prov, $id_district, $id_subdistrict)
    {   
        $api = env('API_URL');
        $client = new  \GuzzleHttp\Client(); 
        $response = $client->request("GET", ''.$api.'api/location/kelurahan?lokasi_propinsi='.$id_prov.'&lokasi_kabupatenkota='.$id_district.'&lokasi_kecamatan='.$id_subdistrict.'', 
            ); 

        $result = json_decode((string) $response->getBody(), true);
        $village = $result['data'];
        return json_encode($village);
    }


    public function insertHarga(Request $request) {
        
        $form_data = array(
            'category_id'        =>  '5fe0562d3f71c82cc1903fe3',
            'user_type'        =>  $request->user_type,
            'min_range'        =>  $request->min_range,
            'max_range'        =>  $request->max_range,
            'amount'        =>  $request->amount,
            'potongan'        =>  $request->potongan,
            'description'        =>  $request->description,
            'active'        =>  $request->active
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
          CURLOPT_URL => ''.$url.'api/admin/price_category',
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


    public function resendActivation(Request $request) {

        $form_data = array(
            'hub_id'        =>  $request->id_hub
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
          CURLOPT_URL => ''.$url.'api/admin/resend_activation_hub',
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

    public function verificationHub(Request $request) {

        $token = $request->get('token');
        $api = env('API_URL');

        $client = new  \GuzzleHttp\Client(); 
        $response = $client->request("GET", ''.$api.'api/users/check_activate_hub?token='.$token.'', 
            ); 

        $data = json_decode((string) $response->getBody(), true);
        $status = $data['status'];

        if ($status=='success') {
            return view('create_password');  
        } else {
            return view('link_expired');  
        }
        
    }

    public function activateHub(Request $request) {

        $url = env('API_URL');
        $verify_token = $request->verify_token;
        $password = $request->password;

        $form_data = array(
            'verify_token'        =>  $verify_token,
            'password'        =>  $password,
        );

        $postdata = json_encode($form_data);    

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => ''.$url.'api/users/activate_hub',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'PUT',
          CURLOPT_POSTFIELDS => $postdata,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);
        $convert = json_decode($response,true);
        $data = $convert['status'];
        $message = $convert['message'];
        curl_close($curl);
        return response()->json(['status' => $data, 'message' => $message]);

    }

    public function activationSuccess() {

        return view('activation_succeess');  

    }

    public function editHarga(Request $request, $id)
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
            $response = $client->request("GET", ''.$api.'api/admin/price_category/'.$id.'', 
                ['headers' => [
                    'x-auth-token' => ''.$token.'',
                    'x-auth-client' => ''.$client_secret.'',
                    'x-auth-signature' => ''.$signature.'']
                ]); 

            $data = json_decode((string) $response->getBody(), true);
            $harga = $data['data'];

            return view('admin.edit_harga', compact('level_user', 'harga'));    

        }
        
    }

    public function updateHarga(Request $request) {

        $form_data = array(
            'price_id'        =>  $request->price_id,
            'category_id'        =>  $request->category_id,
            'user_type'        =>  $request->user_type,
            'min_range'        =>  $request->min_range,
            'max_range'        =>  $request->max_range,
            'amount'        =>  $request->amount,
            'potongan'        =>  $request->potongan,
            'description'        =>  $request->description,
            'active'        =>  $request->active
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
          CURLOPT_URL => ''.$url.'api/admin/price_category',
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
