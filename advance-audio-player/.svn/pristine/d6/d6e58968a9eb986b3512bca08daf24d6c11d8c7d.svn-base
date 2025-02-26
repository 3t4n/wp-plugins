<?php

/*
Plugin Name: Adsense WoW
Version: 10.14.03
Plugin URI: http://111waystomakemoney.com/adsense-wow/
Author: Raghu
Author URI: http://111waystomakemoney.com/
Plugin Description: For using the plugin, read the <a href="http://111waystomakemoney.com/adsense-wow/" title="Adsense WoW">Adsense WoW Instruction Page</a> .A simple Wordpress plugin to insert Google Adsense into posts, pages, sidebars.
*/

/*
    This program is free software; you can redistribute it
    under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

$wp_simple_ad_insert_version = 1.1;


function show_ad_camp_1()
{
    $ad_camp_encoded_value_1 = get_option('wp_ad_camp_1_code');
    $ad_camp_decoded_value_1 = html_entity_decode($ad_camp_encoded_value_1, ENT_COMPAT);

    if(!empty($ad_camp_decoded_value_1))
    {
        $output .= " $ad_camp_decoded_value_1";
    }
    return $output;
}

function show_ad_camp_2()
{
    $ad_camp_encoded_value_2 = get_option('wp_ad_camp_2_code');
    $ad_camp_decoded_value_2 = html_entity_decode($ad_camp_encoded_value_2, ENT_COMPAT);

    if(!empty($ad_camp_decoded_value_2))
    {
        $output .= " $ad_camp_decoded_value_2";
    }
    return $output;
}

function show_ad_camp_3()
{
    $ad_camp_encoded_value_3 = get_option('wp_ad_camp_3_code');
    $ad_camp_decoded_value_3 = html_entity_decode($ad_camp_encoded_value_3, ENT_COMPAT);

    if(!empty($ad_camp_decoded_value_3))
    {
        $output .= " $ad_camp_decoded_value_3";
    }
    return $output;
}

function wp_ad_camp_process($content)
{
    if (strpos($content, "<!-- wp_ad_camp_1 -->") !== FALSE)
    {
        $content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);
        $content = str_replace('<!-- wp_ad_camp_1 -->', show_ad_camp_1(), $content);
    }
    if (strpos($content, "<!-- wp_ad_camp_2 -->") !== FALSE)
    {
        $content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);
        $content = str_replace('<!-- wp_ad_camp_2 -->', show_ad_camp_2(), $content);
    }
    if (strpos($content, "<!-- wp_ad_camp_3 -->") !== FALSE)
    {
        $content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);
        $content = str_replace('<!-- wp_ad_camp_3 -->', show_ad_camp_3(), $content);
    }
    return $content;
}

// Displays Simple Ad Campaign Options menu
function ad_camp_add_option_page() {
    if (function_exists('add_options_page')) {
        add_options_page('Adsense WoW', 'Adsense WoW', 8, __FILE__, 'ad_insertion_options_page');
    }
}

function ad_insertion_options_page() {

    global $wp_simple_ad_insert_version;

    if (isset($_POST['info_update']))
    {
        echo '<div id="message" class="updated fade"><p><strong>';

        $tmpCode1 = htmlentities(stripslashes($_POST['wp_ad_camp_1_code']) , ENT_COMPAT);
        update_option('wp_ad_camp_1_code', $tmpCode1);

        $tmpCode2 = htmlentities(stripslashes($_POST['wp_ad_camp_2_code']) , ENT_COMPAT);
        update_option('wp_ad_camp_2_code', $tmpCode2);

        $tmpCode3 = htmlentities(stripslashes($_POST['wp_ad_camp_3_code']) , ENT_COMPAT);
        update_option('wp_ad_camp_3_code', $tmpCode3);

        echo 'Options Updated!';
        echo '</strong></p></div>';
    }

    ?>

    <div class=wrap>

    <h2>Adsense WoW Options </h2>

<h1 style="text-align: left">For Instructions Visit:<a href="http://111waystomakemoney.com/adsense-wow/" target="_blank">Plugin Page</a></h1>
    <p>For information and updates, please visit:<br />
    <a href="http://111waystomakemoney.com/adsense-wow/?p=170">http://111waystomakemoney.com/adsense-wow/</a></p>

    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
    <input type="hidden" name="info_update" id="info_update" value="true" />

    <fieldset class="options">
    <legend><strong>Usage</strong></legend>
    <p>Use this plugin to quickly and easily insert Google Adsense to your posts, pages and sidebar.</p>
    <p>There are two ways you can use this plugin:</p>
    <ol>
    <li>Add the trigger text <strong>&lt;!-- wp_ad_camp_1 --&gt;</strong><br />or <strong>&lt;!-- wp_ad_camp_2 --&gt;</strong><br />or <strong>&lt;!-- wp_ad_camp_3 --&gt;</strong>  to your posts or pages</li>
    <li>Call the function from template files: <strong>&lt;?php echo show_ad_camp_1(); ?&gt;</strong><br />or <strong>&lt;?php echo show_ad_camp_2(); ?&gt;</strong><br />or <strong>&lt;?php echo show_ad_camp_3(); ?&gt;</strong></li>
    </ol>

    </fieldset>

    <fieldset class="options">
    <legend><strong>Options</strong></legend>

    <table width="100%" border="0" cellspacing="0" cellpadding="6">

    <tr valign="top"><td width="35%" align="left">
    <strong>Adsense Ad Campaign 1 Code:</strong>
    <br /><i>Copy and Paste the Google adsene code here. To show this add in your posts or pages use the token <br />&lt;!-- wp_ad_camp_1 --&gt;
    <br />or call the function from a template file <br />&lt;?php echo show_ad_camp_1(); ?&gt;</i>
    </td><td align="left">
    <textarea name="wp_ad_camp_1_code" rows="6" cols="35"><?php echo get_option('wp_ad_camp_1_code'); ?></textarea>
    </td></tr>

    <tr valign="top"><td width="35%" align="left">
    <strong>Adsense Ad Campaign 2 Code:</strong>
    <br /><i>Copy and Paste the Google adsene code here. To show this add in your posts or pages use the token <br />&lt;!-- wp_ad_camp_2 --&gt;
    <br />or call the function from a template file <br />&lt;?php echo show_ad_camp_2(); ?&gt;</i>
    </td><td align="left">
    <textarea name="wp_ad_camp_2_code" rows="6" cols="35"><?php echo get_option('wp_ad_camp_2_code'); ?></textarea>
    </td>
    </tr>

    <tr valign="top"><td width="35%" align="left">
    <strong>Adsense Ad Campaign 3 Code:</strong>
    <br /><i>Copy and Paste the Google adsene code here. To show this add in your posts or pages use the token <br />&lt;!-- wp_ad_camp_3 --&gt;
    <br />or call the function from a template file <br />&lt;?php echo show_ad_camp_3(); ?&gt;</i>
    </td><td align="left">
    <textarea name="wp_ad_camp_3_code" rows="6" cols="35"><?php echo get_option('wp_ad_camp_3_code'); ?></textarea>
    </td></tr>

    </table>
    </fieldset>

    <div class="submit">
        <input type="submit" name="info_update" value="<?php _e('Update options'); ?> &raquo;" />
    </div>

    </form>
    </div>
<h2 style="text-align: left">If u like the plugin please Donate:<a href="http://111waystomakemoney.com/donate/" target="_blank">Plugin Donation Page</a></h2>
<?php
}

add_filter('the_content', 'wp_ad_camp_process');

// Insert the ad_camp_add_option_page in the 'admin_menu'
add_action('admin_menu', 'ad_camp_add_option_page');

?>
