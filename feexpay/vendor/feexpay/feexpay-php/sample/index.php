<?php

//namespace Feexpay;

include_once('../src/Feexpay.php');

$token = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$shop = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";

$feexpay = new Feexpay\FeexpayClass($token, $shop);

$payout = $feexpay->setupPayout(array( "algorithm" => "rate", "send_notification" => true, "destination_type" => "MOBILE_MONEY", "rate_frequency" => "1m", "destination" => "22990877433" ));

var_dump($payout);