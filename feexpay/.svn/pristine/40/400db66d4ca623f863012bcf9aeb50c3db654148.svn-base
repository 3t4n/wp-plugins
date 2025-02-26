<?php

/**
 * Settings for FeexPay Plugin.
 *
 */
defined('ABSPATH') || exit;

return array(
    'enabled' => array(
        'title' => __('Activer/Désactiver', 'feexpay'),
        'label' => __('Activer Feexpay Paiement', 'feexpay'),
        'type' => 'checkbox',
        'description' => '',
        'default' => 'yes'
    ),

    'testmode' => array(
        'title' => __('Test Mode', 'feexpay'),
        'label' => __('Activer le mode test', 'feexpay'),
        'type' => 'checkbox',
        'description' => __('Sets feexpay into test mode', 'feexpay'),
        'default' => 'no',
        'desc_tip'    => true,
    ),
    'title' => array(
        'title'       => __( '(Optional) Titre', 'feexpay' ),
        'type'        => 'text',
        'description' => __( 'This controls the title which the user sees during checkout.', 'feexpay' ),
        'default'     => __( 'Pay by Mobile Money and Banking Card (Feexpay)', 'feexpay' ),
        'desc_tip'    => true,
    ),
    'description' => array(
        'title'       => __( '(Optional) Description', 'feexpay' ),
        'type'        => 'text',
        'description' => __( 'This controls the description which the user sees during checkout.', 'feexpay' ),
        'default'     => __( 'Pay reliably, quickly and securely' ),
        'desc_tip'    => true,
    ),
    'form' => array(
        'title' => __('Type de formulaire', 'feexpay'),
        'type' => 'select',
        'options' => array(
            'ALL' => __('Tout', 'feexpay'),
            'CARD' => __('Uniquement Cartes bancaires', 'feexpay'),
            'MOBILE' => __('Uniquement Mobile Money', 'feexpay'),
        ),
        'default' => 'ALL',
        'desc_tip'    => true,
        'description' => __('Choisissez le type de formulaire que vous souhaitez afficher aux clients', 'feexpay')
    ),
    'country' => array(
        'title' => __('Pays', 'feexpay'),
        'type' => 'select',
        'options' => array(
            '' => __('Choisissez le pays à sélectionner', 'feexpay'),
            'BJ' => __('Bénin', 'feexpay'),
            'BF' => __('Burkina-Faso', 'feexpay'),
            'CI' => __('Côte d\'Ivoire', 'feexpay'),
            'SN' => __('Sénégal', 'feexpay'),
            'TG' => __('Togo', 'feexpay'),
        ),
        'default' => '',
        'desc_tip'    => true,
        'description' => __('Choisissez le pays à sélectionner', 'feexpay')
    ),
    'network' => array(
        'title' => __('Réseau Mobile', 'feexpay'),
        'type' => 'select',
        'options' => array(
            "" => __('Choisissez le réseau mobile', 'feexpay'),
            "MOOV" => __('MOOV', 'feexpay'),
            "MTN" => __('MTN', 'feexpay'),
            "MOOV TG" => __('MOOV TG', 'feexpay'),
            "TOGOCOM TG" => __('TOGOCOM TG', 'feexpay'),
            "ORANGE SN" => __('ORANGE SN', 'feexpay'),
            "FREE SN" => __('FREE SN', 'feexpay'),
            "MOOV CI" => __('MOOV CI', 'feexpay'),
            "MTN CI" => __('MTN CI', 'feexpay'),
            "ORANGE CI" => __('ORANGE CI', 'feexpay'),
            "WAVE CI" => __('WAVE CI', 'feexpay'),
            "MOOV BF" => __('MOOV BF', 'feexpay'),
            "ORANGE BF" => __('ORANGE BF', 'feexpay'),
        ),
        'default' => '',
        'desc_tip'    => true,
        'description' => __('Choisissez le réseau mobile', 'feexpay')
    ),
    'token' => array(
        'title' => __('API Key', 'feexpay'),
        'type' => 'password',
        'desc_tip'    => true,
        'description' => __('Get your Token API keys from your Feexpay dashboard', 'feexpay')
    ),
    'shop' => array(
        'title' => __('Identifiant', 'feexpay'),
        'type' => 'password',
        'desc_tip'    => true,
        'description' => __('Get your Shop Id from your Feexpay dashboard', 'feexpay')
    ),
);
