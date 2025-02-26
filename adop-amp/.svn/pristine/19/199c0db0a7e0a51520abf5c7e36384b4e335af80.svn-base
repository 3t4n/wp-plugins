<?php
/**
 * Created by IntelliJ IDEA.
 * User: administrator
 * Date: 11/03/2019
 * Time: 4:09 PM
 */

function adop_amp_add_header_tag() {
    $options = adop_amp_get_default_options();
    if(is_single()) {
        if($options['adop_amp_url'] == '') {
            $options['adop_amp_url'] = adop_amp_get_default_amp_url();
        } else {
            if (substr($options['adop_amp_url'], strlen($options['adop_amp_url']) - 1, 1) == '/') {
                $options['adop_amp_url'] = substr($options['adop_amp_url'], 0, -1);
            }
        }

        if($options['adop_amp_header_date'] <= get_the_date('Y-m-d')) {
            $tag = '<link rel="amphtml" href="' . $options['adop_amp_url'] . $_SERVER['REQUEST_URI'] . '">';
            echo $tag;
        }
    }
}
