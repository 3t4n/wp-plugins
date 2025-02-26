<?php

if ( !defined('WP_UNINSTALL_PLUGIN') ) { exit; }

delete_option('abp_autor');
delete_option('abp_buscar');
delete_option('abp_pagina');

