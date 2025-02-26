<?php
/* Réception requete formulaire onglet configuration */
$consentement = isset($_POST['hod-ac-c-duree-du-consentement']) ? sanitize_text_field( $_POST['hod-ac-c-duree-du-consentement'] ) : '';
if($consentement != ''){
    $hob_ac_settings->hob_ac_update_configuration_params();
    exit;
}

/* Réception requete formulaire onglet configuration */
$delai_bandeau = isset($_POST['hod-ac-c-delai-du-bandeau']) ? sanitize_text_field( $_POST['hod-ac-c-delai-du-bandeau'] ) : '';
if($delai_bandeau != ''){
    $hob_ac_settings->hob_ac_update_configuration_params();
    exit;
}

/* Réception requete formulaire onglet gestion */
$service_gestion = isset($_POST['ac-gestion-des-services']) ? sanitize_text_field( $_POST['ac-gestion-des-services'] ) : '';
if($service_gestion != ''){
    $hob_ac_settings->hob_ac_update_gestion_params();
    exit;
}

/* Si non sur page admin activation de l'opération cookie */
if(!is_admin()){
    include( HOB_AC_URL . 'includes/Hob_ac_system.php');
    $hob_cookie = isset($_COOKIE['HOB-cookie']) ? sanitize_text_field( $_COOKIE['HOB-cookie'] ) : '';
    if($hob_cookie != ''){
        new Hob_ac_system($hob_cookie);
    }else{
        new Hob_ac_system("cat1=N cat2=N cat3=N cat4=N cat5=N");
    }
}