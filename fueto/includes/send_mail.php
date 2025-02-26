<?php

require_once("../../../../wp-config.php");

global $fueto_options;


if (!empty($_GET['sp'])){


    $email = trim($_GET['sp']);

    fueto_sendmail($email);
}

?>