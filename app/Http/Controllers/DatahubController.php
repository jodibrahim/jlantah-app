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

class DatahubController extends Controller
{

    public function index(Request $request)
    {   
        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $level_user = $request->session()->get('level_user');
        

        if (empty($token)) {

            return \redirect()->to( '' );

        } else {

            return view('admin.data_hub', compact('level_user'));    
        }
        
    }


    public function loadDataHub(Request $request, $limit, $page) {

        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $httpMethod = "GET";
        $body = "{}";
        $sign = new Signature();
        $signature = $sign->_createSignature($httpMethod, $body);

        $api = env('API_URL');

        $client = new  \GuzzleHttp\Client(); 
        $response = $client->request("GET", ''.$api.'api/admin/users?type=hub&limit='.$limit.'&page='.$page.'', 
            ['headers' => [
                'x-auth-token' => ''.$token.'',
                'x-auth-client' => ''.$client_secret.'',
                'x-auth-signature' => ''.$signature.'']
            ]); 

        $data = json_decode((string) $response->getBody(), true);
        echo json_encode($data);
    }

    public function addHub(Request $request)
    {
        $token = $request->session()->get('token');
        $client_secret = $request->session()->get('client_secret');
        $level_user = $request->session()->get('level_user');
        

        if (empty($token)) {

            return \redirect()->to( '' );

        } else {

            $api = env('API_URL');
            $client = new  \GuzzleHttp\Client(); 
            $response = $client->request("GET", ''.$api.'api/location/propinsi', 
                ); 

            $result = json_decode((string) $response->getBody(), true);
            $province = $result['data'];

            return view('admin.add_hub', compact('level_user','province'));    
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


    public function insertHub(Request $request) {
        
        $form_data = array(
            'nama_hub'        =>  $request->nama,
            'email'        =>  $request->email,
            'phone'        =>  $request->telepon,
            'penanggung_jawab'        =>  $request->pic,
            'alamat_lengkap'        =>  $request->alamat,
            'latitude'        =>  $request->lat,
            'longitude'        =>  $request->long,
            'provinsi'        =>  $request->provinsi,
            'kota'        =>  $request->kota,
            'kecamatan'        =>  $request->kecamatan,
            'kelurahan'        =>  $request->kelurahan
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
          CURLOPT_URL => ''.$url.'api/admin/register_hub',
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

    public function editPool(Request $request, $id_user)
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
            $response = $client->request("GET", ''.$api.'api/admin/user/'.$id_user.'', 
                ['headers' => [
                    'x-auth-token' => ''.$token.'',
                    'x-auth-client' => ''.$client_secret.'',
                    'x-auth-signature' => ''.$signature.'']
                ]); 

            $data = json_decode((string) $response->getBody(), true);
            $pool = $data['data'];

            $id_prov = $pool['alamat']['0']['provinsi_kode'];
            $id_kab = $pool['alamat']['0']['kota_kode'];
            $id_kec = $pool['alamat']['0']['kecamatan_kode'];
            $id_kel = $pool['alamat']['0']['kelurahan_kode'];

            //GET PROVINCE
            $client_ = new  \GuzzleHttp\Client(); 
            $response_ = $client_->request("GET", ''.$api.'api/location/propinsi', 
                ); 

            $result_ = json_decode((string) $response_->getBody(), true);
            $province = $result_['data'];

            //GET DISTRICT
            $client_ = new  \GuzzleHttp\Client(); 
            $response_ = $client_->request("GET", ''.$api.'api/location/kabko?lokasi_propinsi='.$id_prov.'', 
                ); 

            $result_ = json_decode((string) $response_->getBody(), true);
            $district = $result_['data'];

            //GET SUB DISTRICT
            $client_ = new  \GuzzleHttp\Client(); 
            $response_ = $client_->request("GET", ''.$api.'api/location/kecamatan?lokasi_propinsi='.$id_prov.'&lokasi_kabupatenkota='.$id_kab.'', 
                ); 

            $result_ = json_decode((string) $response_->getBody(), true);
            $subdistrict = $result_['data'];

            //GET VILLAGE
            $client_ = new  \GuzzleHttp\Client(); 
            $response_ = $client_->request("GET", ''.$api.'api/location/kelurahan?lokasi_propinsi='.$id_prov.'&lokasi_kabupatenkota='.$id_kab.'&lokasi_kecamatan='.$id_kec.'', 
                ); 

            $result_ = json_decode((string) $response_->getBody(), true);
            $village = $result_['data'];

            return view('admin.edit_pool', compact('level_user', 'pool', 'province', 'district', 'subdistrict', 'village'));    

        }
        
    }

    public function updatePool(Request $request) {

        $form_data = array(
            'hub_id'        =>  $request->hub_id,
            'nama_hub'        =>  $request->nama,
            'email'        =>  $request->email,
            'phone'        =>  $request->telepon,
            'penanggung_jawab'        =>  $request->pic,
            'alamat_lengkap'        =>  $request->alamat,
            'latitude'        =>  $request->lat,
            'longitude'        =>  $request->long,
            'provinsi'        =>  $request->provinsi,
            'kota'        =>  $request->kota,
            'kecamatan'        =>  $request->kecamatan,
            'kelurahan'        =>  $request->kelurahan
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
          CURLOPT_URL => ''.$url.'api/admin/update_hub',
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
