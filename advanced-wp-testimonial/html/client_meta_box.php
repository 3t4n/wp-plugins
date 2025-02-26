<?php

function awt_clientmeta_form(){
    $post_id = $_GET['post'];
    if(empty($post_id)){
        $post_id = -1;
    }
    ?>
    <table class="form-table">
        <tr>
            <td><label><?PHP echo __('Client Name <sup class="error">*</sup>','awt'); ?></label></td>
            <td>
                <input type="text" name="awt_client_name"
                       value="<?PHP echo get_post_meta($post_id,'awt_client_name', TRUE);?>"
                       class="regular-text" />
            </td>
        </tr>
        <tr>
            <td><label><?PHP echo __('Client site url','awt'); ?></label></td>
            <td>
                <input type="text" name="awt_client_siteurl"
                        value="<?PHP echo get_post_meta($post_id,'awt_client_siteurl', TRUE);?>"
                       class="regular-text" />
            </td>
        </tr>
        <tr>
            <td><label><?PHP echo __('Client Image','awt'); ?></label></td>
            <td>
                <p class="desription"><?PHP echo __('to Set Client Image set it as Featured Image','awt'); ?></p>
            </td>
        </tr>
    </table>
    <?PHP
}
