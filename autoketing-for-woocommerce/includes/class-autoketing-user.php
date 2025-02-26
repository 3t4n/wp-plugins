<?php
namespace AutoketingUser;
if( ! class_exists( 'Autoketing_User' ) ){ 
    class Autoketing_User{
        public $username;
        public $usermail;
        public $address = array();
        public $phone_number;
        public $payment;
        public function __construct( $username,$usermail,$address,$phone_number,$payment ){
            $this->username = $username;
            $this->usermail = $usermail;
            $this->address = $address;
            $this->phone_number = $phone_number;
            $this->payment = $payment;
        }
    }
}