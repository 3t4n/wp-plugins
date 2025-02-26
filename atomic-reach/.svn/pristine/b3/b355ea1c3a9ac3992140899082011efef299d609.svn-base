<?php


session_start();

function pr($var, $varname=null){


    if ($varname === 2){

        $log = new Zend_Log();
        $log->addWriter(new Zend_Log_Writer_Firebug());
        $log->log($var, Zend_Log::INFO);
        return;
    }

	echo '<pre class="debug" style="border-top:1px solid #aaa;">';


	echo '---- ' . getType($var) . ' ---- '. $varname .' ----' . "\n\r";
	if (is_bool($var) and $var === true) { echo '<span style="font-weight:bold;">true</span>';
        } else if (is_bool($var) and $var === false) { echo '<span style="font-weight:bold;">false</span>';
        } else if (is_null($var)){ echo '<span style="font-weight:bold;">null</span>';}

            if (getType($var) == 'array'){
                if (count ($var) ===0) {echo '<span style="font-weight:bold;">empty</span>';}
                else {
                    foreach ($var AS $key=>$val){
                        echo '['.$key.'] => ('. getType($val) .') ' ;
                        if (is_bool($val) and $val === true) { echo  '<span style="font-weight:bold;">true</span>';
                            } else if (is_bool($val) and $val === false) { echo '<span style="font-weight:bold;">false</span>';
                            } else if (is_null($val)){ echo '<span style="font-weight:bold;">null</span>';
                            } else { print_r($val);}
                       echo "\n";
                    }
                }
            } else {
                print_r($var);
            }

	echo '</pre>';

        if ($varname == 1) exit();
}

include_once 'atomicreach.api.class.php';
include_once 'shortcodes.class.php';
