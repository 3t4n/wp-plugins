<?php
/**
 * @copyright (C) 2021 - 2025 Holger Brandt IT Solutions
 * @license GPL2
*/

if(!defined('ABSPATH')){
    exit;
}

interface WADA_Layout_LayoutInterface
{
    public function display($returnAsString = false);
}