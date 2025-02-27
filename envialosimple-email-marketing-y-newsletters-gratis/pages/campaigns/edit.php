<?php
    //services
    include_once(dirname(__FILE__).'./../../services/all.php');

    //components
    include_once(dirname(__FILE__).'./../../components/all.php');
    
    //html
    getTemplate(dirname(__FILE__).'/edit/html.php');

    //js
    getTemplate(dirname(__FILE__).'/edit/js.php');