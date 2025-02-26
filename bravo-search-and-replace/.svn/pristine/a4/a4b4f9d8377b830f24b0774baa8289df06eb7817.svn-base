<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

function BRAVOSP__deactivation(){
//we delete option
delete_option("BRAVOSP_notice");

}

register_deactivation_hook(BRAVOSP_FILE,"BRAVOSP__deactivation");

?>