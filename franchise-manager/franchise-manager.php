<?php
defined( 'ABSPATH' ) OR exit;
/*
  Plugin Name: Franchise Manager
  Plugin URI: http://makadiyakuldip.wordpress.com/
  Version: 1.0
  Author: kuldip_raghu
  Author URI: http://www.gopiplus.com/work/2011/11/04/wordpress-plugin-image-slider-with-description/
  Donate link: http://www.gopiplus.com/work/2011/11/04/wordpress-plugin-image-slider-with-description/
  Description: Franchise Manager allow to display list of franchise with franchise gallery.
  License: GNU General Public License v2.0 or later
  Copyright 2015 kuldip_raghu
 */
define( 'PLUGIN_PATH', plugin_dir_url( __FILE__ ));
add_action('init', 'franchise_custom_post', 0);

/* Create custom post type using CPT */

function franchise_custom_post() {
    $labels = array(
        'name' => _x('Add Franchise', 'Post Type General Name', 'tfa'),
        'singular_name' => _x('Add Franchise', 'Post Type Singular Name', 'tfa'),
        'menu_name' => __('Franchise', 'tfa'),
        'parent_item_colon' => __('Parent Add Franchise', 'tfa'),
        'all_items' => __('All Franchise', 'tfa'),
        'view_item' => __('View Franchise', 'tfa'),
        'add_new_item' => __('Add New Franchise', 'tfa'),
        'add_new' => __('Add New', 'tfa'),
        'edit_item' => __('Edit Franchise', 'tfa'),
        'update_item' => __('Update Franchise', 'tfa'),
        'search_items' => __('Search Franchise', 'tfa'),
        'not_found' => __('Not Found', 'tfa'),
        'not_found_in_trash' => __('Not found in Trash', 'tfa'),
    );
    $args = array(
        'label' => __('franchsie', 'tfa'),
        'description' => __('Franchise news and reviews', 'tfa'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('genres'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('franchsie', $args);
}

/* Create custom post type using CPT */

/* All Hooks are define in this below section */
add_action('add_meta_boxes', 'franchise_add_custom_box');
add_action('admin_init', 'franchise_add_custom_box', 1);
add_action('save_post', 'franchise_save_postdata');
add_action('admin_menu', 'franchise_enable_pages');
/* All Hooks are define in this below section */

function franchise_add_custom_box() {
    add_meta_box(
            'franchise_sectionid', __('Franchise Details', 'franchise_textdomain'), 'franchise_inner_custom_box', 'franchsie'
    );
}

/* Create Franchise Settings tab in custom post type hook */

function franchise_enable_pages() {
    add_submenu_page('edit.php?post_type=franchsie', 'Custom Post Type Admin', 'Franchise Settings', 'edit_posts', basename(__FILE__), 'franchise_settings');
}

/* Create Franchise Settings tab in custom post type hook */

?>
<style type="text/css">
.field_left {float:left;}
.field_right {float:left;margin-left:10px;}
.clear {clear:both;}
#dynamic_form {width:580px;}
#dynamic_form input[type=text] {width:300px;}
#dynamic_form .field_row {border:1px solid #999;margin-bottom:10px;padding:10px;}
#dynamic_form label {padding:0 6px;}
.error_msg.green{ color:#138f45; font-weight: bold; font-size: 18px;}
</style>
<?php
/* Custom Post type display custom details of Franchise */

function franchise_inner_custom_box() {
    wp_nonce_field(plugin_basename(__FILE__), 'franchise_noncename');
    global $post;
    $post_id = $post->ID;

    $country_of_origin_1 = isset($_POST['country_of_origin']) ? $_POST['country_of_origin'] : get_post_meta($post_id, 'country_of_origin', true);
    $type_of_industry_1 = isset($_POST['type_of_industry']) ? $_POST['type_of_industry'] : get_post_meta($post_id, 'type_of_industry', true);
    $estimate_investment_1 = isset($_POST['estimate_investment']) ? $_POST['estimate_investment'] : get_post_meta($post_id, 'estimate_investment', true);
    $marketing_support_1 = isset($_POST['marketing_support']) ? $_POST['marketing_support'] : get_post_meta($post_id, 'marketing_support', true);
    $training_support_1 = isset($_POST['training_support']) ? $_POST['training_support'] : get_post_meta($post_id, 'training_support', true);
    $year_of_establishment_1 = isset($_POST['year_of_establishment']) ? $_POST['year_of_establishment'] : get_post_meta($post_id, 'year_of_establishment', true);
    $numberof_existing_unit_1 = isset($_POST['numberof_existing_unit']) ? $_POST['numberof_existing_unit'] : get_post_meta($post_id, 'numberof_existing_unit', true);
    $size_of_unit_1 = isset($_POST['size_of_unit']) ? $_POST['size_of_unit'] : get_post_meta($post_id, 'size_of_unit', true);
    ?>

    <table width='100%' border=0>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . 'franchise';
        $result = $wpdb->get_results("SELECT * FROM " . $table_name . "");
        $get_country = explode(",", $result[0]->country);
        ?>
        <tr>
            <th style="font-size:17px; float:left; font-family:Georgia;">Country of origin:</th>
            <td>
                <select name="country_of_origin">
                    <option value="0">Select your Option</option>
                    <?php
                    $country = 1;
                    foreach ($get_country as $country => $i):
                        $selected = $country_of_origin_1 == $country ? "selected='selected'" : '';
                        echo '<option ' . $selected . ' value="' . $country . '">' . $i . '</option>';
                        $country++;
                    endforeach;
                    ?>
                </select>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <th style="font-size:17px; float:left; font-family:Georgia;">Type Of Industry:</th>	
            <td>
                <select name="type_of_industry">
                    <option value="">Select your Option</option>
                    <?php
                    $types_of_industry = explode(",", $result[0]->types_of_industry);
                    foreach ($types_of_industry as $industry => $i):
                        $selected = $type_of_industry_1 == $industry ? "selected='selected'" : '';
                        echo '<option ' . $selected . ' value="' . $industry . '">' . $i . '</option>';
                    endforeach;
                    ?>
                </select>
            </td>
        </tr> 
        <tr><td></td></tr>
        <tr>
            <th style="font-size:17px; float:left; font-family:Georgia;">Estimated investments:</th>
            <td>
                <select name="estimate_investment">
                    <option value="">Select your Option</option>
                    <?php
                    $estimated_investement = explode(",", $result[0]->estimated_investement);
                    foreach ($estimated_investement as $investment => $i):
                        $currency = $result[0]->currency == 1 ? '&dollar;' : '';
                        $currency = $result[0]->currency == 2 ? '&pound;' : '';
                        $currency = $result[0]->currency == 3 ? '&#8377;' : '';
                        $currency = $result[0]->currency == 4 ? '&euro;' : '';
                        $currency = $result[0]->currency == 5 ? '&#165;' : '';
                        $selected = $estimate_investment_1 == $investment ? "selected='selected'" : '';
                        echo '<option ' . $selected . ' value="' . $investment . '">' . $currency . ' ' . $i . '</option>';
                    endforeach;
                    ?>
                </select>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <th style="font-size:17px; float:left; font-family:Georgia;">Marketing support:</th>	
            <td>
                <select name="marketing_support">
                    <option value="">Select your Option</option>
                    <?php
                    $marketing_support = explode(",", $result[0]->marketin_support);
                    foreach ($marketing_support as $martketing => $i):
                        $selected = $marketing_support_1 == $martketing ? "selected='selected'" : '';
                        echo '<option ' . $selected . ' value="' . $martketing . '">' . $i . '</option>';
                    endforeach;
                    ?>
                </select>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <th style="font-size:17px; float:left; font-family:Georgia;">Training support:</th>
            <td>
                <select name="training_support">
                    <option value="">Select your Option</option>
                    <?php
                    $training_support = explode(",", $result[0]->training_support);
                    foreach ($training_support as $training => $i):
                        $selected = $training_support_1 == $training ? "selected='selected'" : '';
                        echo '<option ' . $selected . ' value="' . $training . '">' . $i . '</option>';
                    endforeach;
                    ?>
                </select>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <th style="font-size:17px; float:left; font-family:Georgia;">Year of establishment:</th>	

            <td>
                <select name="year_of_establishment">
                    <option value="">Select your Option</option>
                    <?php
                    $year_of_establishment = explode(",", $result[0]->year_of_establish);
                    foreach ($year_of_establishment as $yoe => $i):
                        $selected = $year_of_establishment_1 == $yoe ? "selected='selected'" : '';
                        echo '<option ' . $selected . ' value="' . $yoe . '">' . $i . '</option>';
                        $j++;
                    endforeach;
                    ?>
                </select>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <th style="font-size:17px; float:left; font-family:Georgia;">Number of existing Units:</th>	
            <td>
                <select name="numberof_existing_unit">
                    <option value="">Select your Option</option>
                    <?php
                    $numberof_existing_unit = explode(",", $result[0]->number_of_existing_unit);
                    foreach ($numberof_existing_unit as $noeu => $i):
                        $selected = $numberof_existing_unit_1 == $noeu ? "selected='selected'" : '';
                        echo '<option ' . $selected . ' value="' . $noeu . '">' . $i . '</option>';
                    endforeach;
                    ?>
                </select>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <th style="font-size:17px; float:left; font-family:Georgia;">size of unit (sq ft):</th>	
            <td>
                <select name="size_of_unit">
                    <option value="">Select your Option</option>
                    <?php
                    $size_of_unit = explode(",", $result[0]->sizeofunit);
                    foreach ($size_of_unit as $size_of_u => $i):
                        $selected = $size_of_unit_1 == $size_of_u ? "selected='selected'" : '';
                        echo '<option ' . $selected . ' value="' . $size_of_u . '">' . $i . '</option>';

                    endforeach;
                    ?>
                </select>
            </td>
        </tr>

    </table>
    <?php
}

/* Custom Post type display custom details of Franchise */


/* When the post is saved, saves our custom data */

function franchise_save_postdata($post_id) {
    if (isset($_POST['country_of_origin']) && $_POST['country_of_origin'] != '') {
        update_post_meta($post_id, 'country_of_origin', $_POST['country_of_origin']);
    }
    if (isset($_POST['type_of_industry']) && $_POST['type_of_industry'] != '') {
        update_post_meta($post_id, 'type_of_industry', $_POST['type_of_industry']);
    }
    if (isset($_POST['estimate_investment']) && $_POST['estimate_investment'] != '') {
        update_post_meta($post_id, 'estimate_investment', $_POST['estimate_investment']);
    }
    if (isset($_POST['marketing_support']) && $_POST['marketing_support'] != '') {
        update_post_meta($post_id, 'marketing_support', $_POST['marketing_support']);
    }
    if (isset($_POST['training_support']) && $_POST['training_support'] != '') {
        echo $_POST['training_support'];
        update_post_meta($post_id, 'training_support', $_POST['training_support']);
    }
    if (isset($_POST['year_of_establishment']) && $_POST['year_of_establishment'] != '') {
        update_post_meta($post_id, 'year_of_establishment', $_POST['year_of_establishment']);
    }
    if (isset($_POST['numberof_existing_unit']) && $_POST['numberof_existing_unit'] != '') {
        update_post_meta($post_id, 'numberof_existing_unit', $_POST['numberof_existing_unit']);
    }
    if (isset($_POST['size_of_unit']) && $_POST['size_of_unit'] != '') {
        update_post_meta($post_id, 'size_of_unit', $_POST['size_of_unit']);
    }

    if (!wp_verify_nonce(isset($_POST['franchise_noncename']), plugin_basename(__FILE__)))
        return $post_id;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    if ('franchsie' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
    }
    else {
        if (!current_user_can('edit_post', $post_id))
            return $post_id;
    }
    return $mydata;
}

/* When the post is saved, saves our custom data */


/* On button submit if there is no table name then it will create table and update franchise setting tab data into database */

function franchise_settings() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'franchise';
    $result = $wpdb->get_results("SELECT * FROM " . $table_name . "");
    ?>
    <div id="poststuff">
        <div id="post-body"  class="metabox-holder columns-2" >
            <div id="post-body-content">
                <div class="wrap">
                    <table><tr><td><a href="https://twitter.com/kuldipraghu" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @kuldipraghu</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></td>
                        </tr>
                    </table>
                    <h2>Franchise Settings</h2>
                    <p>*Note :- Enter All Value Using Comma Seprated (John Doe,Methues,Johny).</p>
                    <div id="poststuff">
                        <div id="post-body" class="metabox-holder columns-2">
                            <div id="post-body-content">
                                <form name="add_country" action="" id="add_country" method="post">
                                    <div class="stuffbox" id="namediv" style="width:100%;">
                                        <h3><label>Currency</label></h3>
                                        <div class="inside">
                                            <table>
                                                <tr>
                                                    <th scope="row"><label for="blogname">Currency</label></th>
                                                    <td>
                                                        <select name="currency">
                                                            <option value="1" <?php echo $result[0]->currency == 1 ? "selected='selected'" : ''; ?>>&dollar;</option>
                                                            <option value="2" <?php echo $result[0]->currency == 2 ? "selected='selected'" : ''; ?>>&pound;</option>
                                                            <option value="3" <?php echo $result[0]->currency == 3 ? "selected='selected'" : ''; ?>>&#8377;</option>
                                                            <option value="4" <?php echo $result[0]->currency == 4 ? "selected='selected'" : ''; ?>>&euro;</option>
                                                            <option value="5" <?php echo $result[0]->currency == 5 ? "selected='selected'" : ''; ?>>&#165;</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="stuffbox" id="namediv" style="width:100%;">
                                        <h3><label>Image Dimension Listing:</label></h3>
                                        <div class="inside">
                                            <table>
                                                <tr>
                                                    <td><?php $image_dimension_input = explode("X",$result[0]->image_dimension); ?>
                                                    <input type="number" name="width" id="width" value="<?php echo $result[0]->image_dimension != '' ? $image_dimension_input[0] : ''; ?>" placeholder="width" /> X <input type="number" name="height" id="height" value="<?php echo $result[0]->image_dimension != '' ? $image_dimension_input[1] : ''; ?>" placeholder="height" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="stuffbox" id="namediv" style="width:100%;">
                                        <h3><label>Country:</label></h3>
                                        <div class="inside">
                                            <table>
                                                <tr>
                                                    <td> 
                                                        <textarea name="country" id="country" rows="5" cols="50"><?php
                                                        if ($result[0]->country != '') {
                                                            echo $result[0]->country;
                                                        }
                                                        ?></textarea><br />Please Enter comma seperated value in textarea.
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="stuffbox" id="namediv" style="width:100%;">
                                        <h3><label>Types Of Industry:</label></h3>
                                        <div class="inside">
                                            <table>
                                                <tr>
                                                    <td> 
                                                        <textarea name="type_of_indus" id="type_of_indus" rows="5" cols="50"><?php
                                                        if ($result[0]->types_of_industry != '') {
                                                            echo $result[0]->types_of_industry;
                                                        }
                                ?></textarea><br />Please Enter comma seperated value in textarea.
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="stuffbox" id="namediv" style="width:100%;">
                                        <h3><label>Estimated investments:</label></h3>
                                        <div class="inside">
                                            <table>
                                                <tr>
                                                    <td> 
                                                        <textarea name="estimated_inve" id="estimated_inve" rows="5" cols="50"><?php
                                                        if ($result[0]->estimated_investement != '') {
                                                            echo $result[0]->estimated_investement;
                                                        }
                                ?></textarea><br />Please Enter comma seperated value in textarea.
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="stuffbox" id="namediv" style="width:100%;">
                                        <h3><label>Marketing support:</label></h3>
                                        <div class="inside">
                                            <table>
                                                <tr>
                                                    <td> 
                                                        <textarea name="marketing_support" id="marketing_support" rows="5" cols="50"><?php
                                                        if ($result[0]->marketin_support != '') {
                                                            echo $result[0]->marketin_support;
                                                        }
                                ?></textarea><br />Please Enter comma seperated value in textarea.
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="stuffbox" id="namediv" style="width:100%;">
                                        <h3><label>Training support:</label></h3>
                                        <div class="inside">
                                            <table>
                                                <tr>
                                                    <td> 
                                                        <textarea name="training_support" id="training_support" rows="5" cols="50"><?php
                                                        if ($result[0]->training_support != '') {
                                                            echo $result[0]->training_support;
                                                        }
                                ?></textarea><br />Please Enter comma seperated value in textarea.
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="stuffbox" id="namediv" style="width:100%;">
                                        <h3><label>Year of establishment:</label></h3>
                                        <div class="inside">
                                            <table>
                                                <tr>
                                                    <td> 
                                                        <textarea name="yearofestimate" id="yearofestimate" rows="5" cols="50"><?php
                                                        if ($result[0]->year_of_establish != '') {
                                                            echo $result[0]->year_of_establish;
                                                        }
                                ?></textarea><br />Please Enter comma seperated value in textarea.
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="stuffbox" id="namediv" style="width:100%;">
                                        <h3><label>Number of existing Units:</label></h3>
                                        <div class="inside">
                                            <table>
                                                <tr>
                                                    <td> 
                                                        <textarea name="numberofexisting" id="numberofexisting" rows="5" cols="50"><?php
                                                        if ($result[0]->number_of_existing_unit != '') {
                                                            echo $result[0]->number_of_existing_unit;
                                                        }
                                ?></textarea><br />Please Enter comma seperated value in textarea.
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="stuffbox" id="namediv" style="width:100%;">
                                        <h3><label>size of unit (sq ft):</label></h3>
                                        <div class="inside">
                                            <table>
                                                <tr>
                                                    <td> 
                                                        <textarea name="sizeofunit" id="sizeofunit" rows="5" cols="50"><?php
                                                        if ($result[0]->sizeofunit != '') {
                                                            echo $result[0]->sizeofunit;
                                                        }
                                                        ?></textarea><br />Please Enter comma seperated value in textarea.
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit">
                    </form>
                </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="postbox-container-1" class="postbox-container"> 
                <div class="postbox"> 
                    <h3 class="hndle"><span></span>Avada | Multi-Purpose Theme</h3> 
                    <div class="inside">
                        <center><a target="_blank" href="https://themeforest.net/item/avada-responsive-multipurpose-theme/2833226?ref=kuldip1"><img src="<?php echo PLUGIN_PATH ?>images/Avada.jpg" alt="" border="0"></a></center>
                        <div style="margin:10px 5px"></div>
                    </div>
                </div>
                <div class="postbox"> 
                    <h3 class="hndle"><span></span>Enfold - Multi-Purpose Theme</h3> 
                    <div class="inside">
                        <center><a target="_blank" href="https://themeforest.net/item/enfold-responsive-multipurpose-theme/4519990?ref=kuldip1"><img src="<?php echo PLUGIN_PATH ?>images/Enfold.jpg" alt="" border="0"></a></center>
                        <div style="margin:10px 5px"></div>
                    </div>
                </div>
                <div class="postbox"> 
                    <h3 class="hndle"><span></span>Impreza - Retina Responsive WordPress Theme</h3> 
                    <div class="inside">
                        <center><a target="_blank" href="https://themeforest.net/item/impreza-retina-responsive-wordpress-theme/6434280?ref=kuldip1"><img src="<?php echo PLUGIN_PATH ?>images/Impreza.jpg" alt="" border="0"></a></center>
                        <div style="margin:10px 5px"></div>
                    </div>
                </div>
                <div class="postbox"> 
                    <h3 class="hndle"><span></span>Brooklyn | Responsive Multi-Purpose WordPress Theme</h3>
                    <div class="inside">
                        <center><a target="_blank" href="https://themeforest.net/item/brooklyn-responsive-multipurpose-wordpress-theme/6221179?ref=kuldip1"><img src="<?php echo PLUGIN_PATH ?>images/brooklyn.jpg" alt="" border="0"></a></center>
                        <div style="margin:10px 5px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'franchise';
        if ($wpdb->get_var("SHOW TABLES LIKE '" . $wpdb->prefix . "franchise'") === $wpdb->prefix . 'franchise') {
            $blogtime = current_time('mysql');
            if ($_POST['country'] != '' && $_POST['type_of_indus'] != '' && $_POST['estimated_inve'] != '' && $_POST['marketing_support'] != '' &&
                    $_POST['training_support'] != '' && $_POST['yearofestimate'] != '' && $_POST['numberofexisting'] != '' && $_POST['sizeofunit'] != '') {
                $result = $wpdb->get_results("SELECT id FROM " . $table_name . "");
                if (count($result) > 0) {
                    $image_dimesnion = $_POST['width'].'X'.$_POST['height'];
                    $query = $wpdb->query("UPDATE " . $table_name . " SET currency='" . $_POST['currency'] . "', image_dimension='".$image_dimesnion."', country='" . $_POST['country'] . "',types_of_industry='" . $_POST['type_of_indus'] . "',estimated_investement='" . $_POST['estimated_inve'] . "',marketin_support='" . $_POST['marketing_support'] . "',training_support='" . $_POST['training_support'] . "',year_of_establish='" . $_POST['yearofestimate'] . "',number_of_existing_unit='" . $_POST['numberofexisting'] . "',sizeofunit='" . $_POST['sizeofunit'] . "',updated_date='" . $blogtime . "' WHERE id='" . $result[0]->id . "'");
                    if ($query) {
                        echo '<p class="error_msg green">Records Updated Succesfully.</p>';
                    }
                } else {
                    $image_dimesnion = $_POST['width'].'X'.$_POST['height'];
                    $data = array(
                        'currency' => $_POST['currency'],
                        'image_dimension' => $image_dimesnion,
                        'country' => $_POST['country'],
                        'types_of_industry' => $_POST['type_of_indus'],
                        'estimated_investement' => $_POST['estimated_inve'],
                        'marketin_support' => $_POST['marketing_support'],
                        'training_support' => $_POST['training_support'],
                        'year_of_establish' => $_POST['yearofestimate'],
                        'number_of_existing_unit' => $_POST['numberofexisting'],
                        'sizeofunit' => $_POST['sizeofunit'],
                        'post_type' => 'franchsie',
                        'post_author' => 1,
                        'created_date' => $blogtime);
                    $idsa = $wpdb->insert($table_name, $data);
                    if ($idsa) {
                        echo '<p class="alert-box success tfamsg">Franchise Setting Inserted.</p>';
                    }
                }
            } else {
                echo '<p class="alert-box success tfamsg">Please Enter Required Fields.</p>';
            }
        } else {
            $charset_collate = $wpdb->get_charset_collate();
            $sql = "CREATE TABLE $table_name (
		id int(10) NOT NULL AUTO_INCREMENT,
                currency int(10) NOT NULL,
                image_dimension varchar(255) NOT NULL,
		country text NOT NULL,
                types_of_industry text NOT NULL,
                estimated_investement text NOT NULL,
                marketin_support text NOT NULL,
                training_support text NOT NULL,
                year_of_establish text NOT NULL,
                number_of_existing_unit text NOT NULL,
                sizeofunit text NOT NULL,
                post_type varchar(255) NOT NULL,
                post_author int(10) NOT NULL,
		created_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                updated_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		UNIQUE KEY id (id)
        	) $charset_collate;";
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }
    }
}

/* On button submit if there is no table name then it will create table and update franchise setting tab data into database */


/* Create Custom Franchise Gallery function with hooks and action */
add_action('admin_init', 'franchise_add_post_gallery');
add_action('admin_head-post.php', 'franchise_print_scripts');
add_action('admin_head-post-new.php', 'franchise_print_scripts');
add_action('save_post', 'franchise_update_post_gallery', 10, 2);

/**
 * Add custom Meta Box to Posts post type
 */
function franchise_add_post_gallery() {
    add_meta_box(
            'post_gallery', 'Franchise Gallery Image', 'franchise_post_gallery_options', 'franchsie', 'normal', 'core'
    );
}

/**
 * Print the Meta Box content
 */
function franchise_post_gallery_options() {
    wp_nonce_field(plugin_basename(__FILE__), 'franchise_noncename_so_1444');
    global $post;
    $gallery_data = get_post_meta($post->ID, 'gallery_data', true);
    ?>
    <div id="dynamic_form">
        <div id="field_wrap">
    <?php
    if (isset($gallery_data['image_url'])) {
        for ($i = 0; $i < count($gallery_data['image_url']); $i++) {
            ?>
                    <div class="field_row">
                        <div class="field_left">
                            <div class="form_field">
                                <label>Image URL</label>
                                <input type="text"
                                       class="meta_image_url"
                                       name="gallery[image_url][]"
                                       value="<?php esc_html_e($gallery_data['image_url'][$i]); ?>"
                                       />
                            </div>
                            <div class="form_field">
                                <label>Description</label>
                                <input type="text"
                                       class="meta_image_desc"
                                       name="gallery[image_desc][]"
                                       value="<?php esc_html_e($gallery_data['image_desc'][$i]); ?>"
                                       />
                            </div>
                        </div>
                        <div class="field_right image_wrap">
                            <img src="<?php esc_html_e($gallery_data['image_url'][$i]); ?>" height="48" width="48" />
                        </div>
                        <div class="field_right">
                            <input class="button" type="button" value="Choose File" onclick="add_image(this)" /><br />
                            <input class="button" type="button" value="Remove" onclick="remove_field(this)" />
                        </div>
                        <div class="clear" /></div> 
                </div>
            <?php
        }
    }
    ?>
    </div>
    <div style="display:none" id="master-row">
        <div class="field_row">
            <div class="field_left">
                <div class="form_field">
                    <label>Image URL</label>
                    <input class="meta_image_url" value="" type="text" name="gallery[image_url][]" />
                </div>
                <div class="form_field">
                    <label>Description</label>
                    <input class="meta_image_desc" value="" type="text" name="gallery[image_desc][]" />
                </div>
            </div>
            <div class="field_right image_wrap">
            </div> 
            <div class="field_right"> 
                <input type="button" class="button" value="Choose File" onclick="add_image(this)" />
                <br />
                <input class="button" type="button" value="Remove" onclick="remove_field(this)" /> 
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="add_field_row">
        <input class="button" type="button" value="Add Field" onclick="add_field_row();" />
    </div>
    </div>
    <?php
}

/**
 * Print styles and scripts
 */
function franchise_print_scripts() {
    global $post;
    if ('franchsie' != $post->post_type)
        return;
    ?>  
    <script type="text/javascript">
        function add_image(obj) {
            var parent = jQuery(obj).parent().parent('div.field_row');
            var inputField = jQuery(parent).find("input.meta_image_url");

            tb_show('', 'media-upload.php?TB_iframe=true');

            window.send_to_editor = function (html) {
                var url = jQuery(html).find('img').attr('src');
                inputField.val(url);
                jQuery(parent)
                        .find("div.image_wrap")
                        .html('<img src="' + url + '" height="48" width="48" />');
                tb_remove();
            };
            return false;
        }
        function remove_field(obj) {
            var parent = jQuery(obj).parent().parent();
            //console.log(parent)
            parent.remove();
        }
        function add_field_row() {
            var row = jQuery('#master-row').html();
            jQuery(row).appendTo('#field_wrap');
        }
    </script>
    <?php
}

/**
 * Save post action, process fields
 */
function franchise_update_post_gallery($post_id, $post_object) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if ('revision' == $post_object->post_type)
        return;

    if (!wp_verify_nonce(@$_POST['franchise_noncename_so_1444'], plugin_basename(__FILE__)))
        return;

    if ('franchsie' != @$_POST['post_type'])
        return;

    if (@$_POST['gallery']) {
        $gallery_data = array();
        for ($i = 0; $i < count(@$_POST['gallery']['image_url']); $i++) {
            if ('' != @$_POST['gallery']['image_url'][$i]) {
                $gallery_data['image_url'][] = @$_POST['gallery']['image_url'][$i];
                $gallery_data['image_desc'][] = @$_POST['gallery']['image_desc'][$i];
            }
        }
        if ($gallery_data) {
            update_post_meta($post_id, 'gallery_data', $gallery_data);
        } else {
            delete_post_meta($post_id, 'gallery_data');
        }
    } else {
        delete_post_meta($post_id, 'gallery_data');
    }
}

/* Create Custom Franchise Gallery function with hooks and action */


/* Change Featured Image name function  */
add_action('admin_head', 'franchise_change_featured_text');

function franchise_change_featured_text() {
    remove_meta_box('postimagediv', 'franchsie', 'side');
    add_meta_box('postimagediv', __('Franchise Featured Image'), 'post_thumbnail_meta_box', 'franchsie', 'side', 'high');
}

/* Change Featured Image name function  */


/* Franchise Shortcode Function with custom meta use this Shortcode [franchise_list_basic] */
add_shortcode('franchise_list_basic', 'franchise_listing_shortcode');

function franchise_listing_shortcode($atts) {
    ob_start();
    global $post;
    $query = new WP_Query(array(
        'post_type' => 'franchsie',
        'posts_per_page' => -1,
        'order' => 'DESC',
            ));
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'franchise';
    $result = $wpdb->get_results("SELECT image_dimension FROM " . $table_name . "");
    $image_dimension = explode("X",$result[0]->image_dimension);
    if ($query->have_posts()) {
        ?>
        <ul class="franchise-listing">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li id="franchise-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
                <div class="image">
                    <?php $gallery_data = get_post_meta( $post->ID, 'gallery_data', true );
                    foreach($gallery_data['image_url'] as $image):  ?>
                        <img src="<?php echo $image; ?>" height="<?php echo $image_dimension[1] ?>" width="<?php echo $image_dimension[0] ?>" />
                    <?php endforeach; ?>
                </div>
        <?php endwhile; ?>
        </ul>
        <?php
        $franchise_variable = ob_get_clean();
        return $franchise_variable;
    }
}

/* Franchise Shortcode Function with custom meta [franchise_list_basic] */