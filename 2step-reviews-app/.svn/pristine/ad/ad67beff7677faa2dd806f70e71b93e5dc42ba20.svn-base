<?php

use Timber\Timber;

include_once 'connect.php';
defined('ABSPATH') || exit;

$isConnected = isConnected();

if ($_POST['username'] && $_POST['password']){
    $result = connect();
}

$company = null;
$dash = null;

if ($isConnected){
    //-- Get company ---
    $client = new \TwoStepReviews\Client();

    $profile = $client->get('user')->getProfile();
    $role = $profile->data->role->name;

    $dash = [];
    if ($role != 'ROLE_SUPER' && $role != 'ROLE_ENTERPRISE'){
        $res = $client->get('company')->index();
        $company = $res->data->results[0];
        $dash = $client->get('dashboard')->getDashBoard();
    }
}

if ($_GET['action'] == 'disconnect'){
    disconnect();
}


Timber::render('assets/templates/config-page.html.twig', array(
    'connected' => $isConnected,
    'dash' => $dash,
    'url' => esc_url( Two_Step_Reviews_App::get_page_url('config-page.php') )
));
