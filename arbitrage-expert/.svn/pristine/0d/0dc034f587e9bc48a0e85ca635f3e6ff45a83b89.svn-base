<?php

class ARB_EXP_Helpers
{
    public $text = "<iframe style='width: 800px; height: 400px;' src='https://www.arbitrage.expert/arbitrage?view_frame=1'></iframe>";
    public $textSecond = "<iframe style='width: 800px; height: 400px;' src='https://www.arbitrage.expert/arbitrage?view_frame=ext'></iframe>";
    public $width = "800px";
    public $height = "400px";
    public $shortcode = "[shortcode_arbitrage id='0' type='0']";

    function arb_exp_insertIframe($text, $width, $height, $shortcode, $type)
    {
        global $wpdb;

        $text = trim($text);
        $width = esc_html(trim($width));
        $height = esc_html(trim($height));


        if ($text == '')
            return false;

        $table = 'arb_exp_iframe';
        $t = "INSERT INTO $table (text, width, height, shortcode, type_iframe) VALUES('%s', '%s', '%s', '%s', '%s')";
        $query = $wpdb->prepare($t, stripcslashes($text), $width, $height, stripcslashes($shortcode), $type);
        $result = $wpdb->query($query);

        if ($result === false)
            die('no result');

        return true;
    }

    function arb_exp_insertIframeDefault($text, $width, $height, $shortcode, $type)
    {
        global $wpdb;

        $text = trim($text);

        if ($text == '')
            return false;

        $table = 'arb_exp_default';
        $t = "INSERT INTO $table (text, width, height, shortcode, type_iframe) VALUES('%s', '%s', '%s', '%s', '%s')";
        $query = $wpdb->prepare($t, $text, $width, $height, $shortcode, $type);
        $result = $wpdb->query($query);

        if ($result === false)
            die('no result');

        return true;
    }

    function arb_exp_updateIframe($text, $width, $height)
    {
        global $wpdb;

        $text = trim($text);
        $table = 'arb_exp_iframe';
        $t = "UPDATE  $table set text = '%s', width = '%s', height = '%s' where id = '%s'";
        $query = $wpdb->prepare($t, $text, $width, $height, 1);
        $result = $wpdb->query($query);

        if ($result === false)
            die('no result');

        return true;
    }

    function arb_exp_updateAllIframe($array)
    {
        global $wpdb;
        $t = "TRUNCATE TABLE arb_exp_iframe";

        $result = $wpdb->query($t);

        if ($result === false)
            die('no result');

        $list = array();

        foreach ($array as $key => $value) {
            foreach ($value as $k => $v){
                $list[$k][$key] = $v;
            }
        }

        foreach ($list as $key => $value){
            $this->arb_exp_insertIframe($value['text'], $value['width'], $value['height'], $value['shortcode'], $value['type']);
        }

        return true;
    }

    function arb_exp_getIframe()
    {
        global $wpdb;
        return $wpdb->get_results("SELECT * FROM arb_exp_iframe", ARRAY_A);
    }

    function arb_exp_getIframeById($id)
    {
        global $wpdb;
        return $wpdb->get_results("SELECT * FROM arb_exp_iframe where id = $id", ARRAY_A);
    }

    function arb_exp_getIframeDefault()
    {
        global $wpdb;
        return $wpdb->get_results("SELECT * FROM arb_exp_default", ARRAY_A);
    }

    function replaceSize($text, $width, $height)
    {
        $text = str_replace("800px", $width, $text);
        $text = str_replace("400px", $height, $text);

        return $text;
    }

    function arb_exp_reloadPage(){
       echo '<script>window.location.reload()</script>';
    }
}

?>