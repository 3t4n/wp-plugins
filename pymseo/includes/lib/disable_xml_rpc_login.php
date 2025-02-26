<?php
// ###############################
//-> Bloquear solicitudes de autenticacion a traves de XML-RPC
// ###############################
add_filter('xmlrpc_enabled','__return_false');
?>