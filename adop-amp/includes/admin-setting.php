<?php
/**
 * Created by IntelliJ IDEA.
 * User: administrator
 * Date: 11/03/2019
 * Time: 1:52 PM
 */
function adop_amp_plugin_settings() {
    add_menu_page('ADOP AMP Settings', 'ADOP AMP Settings', 'administrator', 'adop_amp_settings', 'adop_amp_display_settings');
}

function adop_amp_display_settings() {
    $options = adop_amp_get_default_options();

    $html = '<div class="wrap">';
    $html .= '<form method="post" name="options" action="options.php">';
    $html .= '<h2>Select ADOP AMP Settings</h2>';
    $html .= wp_nonce_field('update-options');
    $html .= '<table width="100%" cellpadding="10" class="form-table">';
    $html .= '<tr>';
    $html .= '<td align="left" scope="row">';
    $html .= '<label>AMP Domain</label>';
    $html .= '</td>';
    $html .= '<td align="left" scope="row">';
    $html .= '<input type="text" name="adop_amp_url" value="' . $options['adop_amp_url'] . '" placeholder="http://amp.adop.cc/adop/" style="width:50%"/>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td align="left" scope="row">';
    $html .= '<label>AMP Start Date</label>';
    $html .= '</td>';
    $html .= '<td align="left" scope="row">';
    $html .= '<input type="text" name="adop_amp_header_date" value="' . $options['adop_amp_header_date'] . '" placeholder="YYYY-MM-DD" style="width:50%"/>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</table>';
    $html .= '<p class="submit">';
    $html .= '<input type="hidden" name="action" value="update"/>';
    $html .= '<input type="hidden" name="page_options" value="adop_amp_url,adop_amp_header_date"/>';
    $html .= '<input type="submit" name="Submit" value="Update"/>';
    $html .= '</p>';
    $html .= '</form>';
    $html .= '</div>';
    echo $html;
}
