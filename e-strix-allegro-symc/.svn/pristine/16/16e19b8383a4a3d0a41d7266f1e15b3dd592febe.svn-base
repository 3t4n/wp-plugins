<?php

class EStrixHelper {
    
    private $user_name = "";
    private $client_id = "";
    
    public function __construct($token) {
        $secretKey = base64_decode($token);
        $m = array();
        preg_match('~user_name":"\K\d+~', $secretKey, $m );
        $this->user_name = $m[0];
        preg_match('~client_id":"\K\d+~', $secretKey, $m );
        $this->client_id = $m[0];  
    }
    
    public function getUserName(){
        return $this->user_name;
    }
    
}