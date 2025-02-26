<?php

if(isset($_SERVER["HTTP_HOST"])==false){
    define("FUTURA_SITE_URL", "");
    define("FUTURA_LICENSE_SITE_URL", "");    
}else if($_SERVER["HTTP_HOST"]=="localhost"){
    define("FUTURA_SITE_URL", "http://localhost:5000");
    define("FUTURA_LICENSE_SITE_URL", "http://localhost:5050");
}else{
    define("FUTURA_SITE_URL", "https://analyze1.futura.site");
    define("FUTURA_LICENSE_SITE_URL", "https://account.futura.site");
}
