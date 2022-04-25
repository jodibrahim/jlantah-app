<?php
class Signature
{
    public function _createSignature($httpMethod='GET', $body='{}'){
        $secret = base64_decode(Session::get('client_secret'));
        $accessToken = base64_encode(Session::get('uid').":".$secret);
        $requestBody = hash_hmac('sha256', $body, $secret);
        $hexEncode = bin2hex($requestBody);
        $lowerCase = strtolower($hexEncode);
        $stringToSign = $httpMethod.":".$accessToken.":".$lowerCase;
        $expectedSignature = base64_encode(hash_hmac('sha256', $stringToSign, $secret));
    
        return $expectedSignature;
    }
	
}