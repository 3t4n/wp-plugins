<?php

if(!defined('ABSPATH')){
    die;
}

require_once plugin_dir_path( __DIR__ ) . 'model/classes/installSchema.php';

function minutos_installSchema(){
    $schema = new Minutos_installSchema;
    $schema->createSchema();
    $schema->createSchemaShippingMethods();
    $schema->InstallationData();
    $schema->sellerOrdersNSettings();
    $schema->sellerOrders();
}