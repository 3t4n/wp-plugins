<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('CSPFW_admin_menu')) {

    class CSPFW_admin_menu {

        protected static $CSPFW_instance;

        function cspfw_submenu_page() {
            add_submenu_page(
                'edit.php?post_type=specific_price', //$parent_slug
                'Settings',  //$page_title
                'Settings',        //$menu_title
                'manage_options',           //$capability
                'customer-specific-pricing',//$menu_slug
                array($this, 'CSPFW_callback')//$function
            );
        }        

        function CSPFW_callback() {
            global $cspfw_comman;
            ?>
            <div class="wrap">
                <h2>Customer Specific Pricing Settings</h2>
            </div>
            <div class="cspfw-container">
                <form method="post" >
                    <?php wp_nonce_field( 'cspfw_nonce_action', 'cspfw_nonce_field' ); ?>
                    <div class="cspfw-settings-main">
                        <h2 class="cspfw_heading_main">General Settings</h2>
                        <table class="cspfw-settings-table">
                            <tbody>
                                <tr>
                                    <th><?php echo __( 'Enable Features', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <td>
                                        <input type="checkbox" name="cspfw_comman[cspfw_enable_features]" value="yes" <?php if($cspfw_comman['cspfw_enable_features'] == 'yes'){echo "checked";}?>>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'Show Rules In Single Product Page', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <td>
                                        <input type="checkbox" name="cspfw_comman[cspfw_show_single_product_page]" value="yes" <?php if($cspfw_comman['cspfw_show_single_product_page'] == 'yes'){echo "checked";}?>>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'Single Product Page Rule Background Color', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($cspfw_comman['cspfw_rule_bg_color']); ?>" name="cspfw_comman[cspfw_rule_bg_color]" value="<?php echo esc_attr($cspfw_comman['cspfw_rule_bg_color']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'Single Product Page Rule Border Color', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($cspfw_comman['cspfw_rule_border_color']); ?>" name="cspfw_comman[cspfw_rule_border_color]" value="<?php echo esc_attr($cspfw_comman['cspfw_rule_border_color']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'Single Product Page Price Heading Text align', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <td>
                                        <select name="cspfw_comman[cspfw_single_product_page_price_heading_text_align]" class="regular-text">
                                            <option value="left" <?php if($cspfw_comman['cspfw_single_product_page_price_heading_text_align'] == 'left'){echo "selected";}?>>Left</option>
                                            <option value="center" <?php if($cspfw_comman['cspfw_single_product_page_price_heading_text_align'] == 'center'){echo "selected";}?>>Center</option>
                                            <option value="right" <?php if($cspfw_comman['cspfw_single_product_page_price_heading_text_align'] == 'right'){echo "selected";}?>>Right</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'Single Product Page Price Heading Text', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <td>
                                        <input type="text" class="regular-text" name="cspfw_comman[cspfw_single_product_page_price_heading_text]" value="<?php echo esc_attr($cspfw_comman['cspfw_single_product_page_price_heading_text']);?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'Heading Text Background Color', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($cspfw_comman['cspfw_heading_bg_color']); ?>" name="cspfw_comman[cspfw_heading_bg_color]" value="<?php echo esc_attr($cspfw_comman['cspfw_heading_bg_color']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'Heading Text Color', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($cspfw_comman['cspfw_heading_text_color']); ?>" name="cspfw_comman[cspfw_heading_text_color]" value="<?php echo esc_attr($cspfw_comman['cspfw_heading_text_color']); ?>"/>
                                    </td>
                                </tr>
                                <tr class="cspfw_fields_heading">
                                    <td>
                                        <h1>Messages</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'Fixed Price Text', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <td>
                                        <input type="text" class="regular-text" name="cspfw_comman[cspfw_fixed_price_text]" value="<?php echo esc_attr($cspfw_comman['cspfw_fixed_price_text']);?>">
                                        <p class="cspfw_description"><strong>Min Qty : </strong><code>{min}</code> To <strong>Max Qty : </strong><code>{max}</code> and <strong>Price : </strong> <code>{price}</code></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'Fixed Increase Price Text', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <td>
                                        <input type="text" class="regular-text" name="cspfw_comman[cspfw_fixed_increase_price_text]" value="<?php echo esc_attr($cspfw_comman['cspfw_fixed_increase_price_text']);?>">
                                        <p class="cspfw_description"><strong>Min Qty : </strong><code>{min}</code> To <strong>Max Qty : </strong><code>{max}</code> and <strong>Price : </strong> <code>{price}</code></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'Fixed Decrease Price Text', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <td>
                                        <input type="text" class="regular-text" name="cspfw_comman[cspfw_fixed_decrease_price_text]" value="<?php echo esc_attr($cspfw_comman['cspfw_fixed_decrease_price_text']);?>">
                                        <p class="cspfw_description"><strong>Min Qty : </strong><code>{min}</code> To <strong>Max Qty : </strong><code>{max}</code> and <strong>Price : </strong> <code>{price}</code></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'Percentage Increase Price Text', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <td>
                                        <input type="text" class="regular-text" name="cspfw_comman[cspfw_percentage_increase_price_text]" value="<?php echo esc_attr($cspfw_comman['cspfw_percentage_increase_price_text']);?>">
                                        <p class="cspfw_description"><strong>Min Qty : </strong><code>{min}</code> To <strong>Max Qty : </strong><code>{max}</code> and <strong>Price : </strong> <code>{percentage}</code></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'Percentage Decrease Price Text', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <td>
                                        <input type="text" class="regular-text" name="cspfw_comman[cspfw_percentage_decrease_price_text]" value="<?php echo esc_attr($cspfw_comman['cspfw_percentage_decrease_price_text']);?>">
                                        <p class="cspfw_description"><strong>Min Qty : </strong><code>{min}</code> To <strong>Max Qty : </strong><code>{max}</code> and <strong>Price : </strong> <code>{percentage}</code></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'Message Text Color', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($cspfw_comman['cspfw_message_text_color']); ?>" name="cspfw_comman[cspfw_message_text_color]" value="<?php echo esc_attr($cspfw_comman['cspfw_message_text_color']); ?>"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" name="action" value="cspfw_save_option">
                    <input type="submit" value="Save changes" name="submit" class="button-primary" id="cspfw-btn-space">
                </form>  
            </div>
            <?php
        }

        function cspfw_create_post_type() {
            $post_type = 'specific_price';
            $singular_name = 'Customer Specific Price';
            $plural_name = 'Specific Price';
            $slug = 'specific_price';
            $labels = array(
                'name'               => _x( $plural_name, 'post type general name', 'customer-specific-pricing-for-woocommerce' ),
                'singular_name'      => _x( $singular_name, 'post type singular name', 'customer-specific-pricing-for-woocommerce' ),
                'menu_name'          => _x( $singular_name, 'admin menu name', 'customer-specific-pricing-for-woocommerce' ),
                'name_admin_bar'     => _x( $singular_name, 'add new name on admin bar', 'customer-specific-pricing-for-woocommerce' ),
                'add_new'            => __( 'Add New', 'customer-specific-pricing-for-woocommerce' ),
                'add_new_item'       => __( 'Add New '.$singular_name, 'customer-specific-pricing-for-woocommerce' ),
                'new_item'           => __( 'New '.$singular_name, 'customer-specific-pricing-for-woocommerce' ),
                'edit_item'          => __( 'Edit '.$singular_name, 'customer-specific-pricing-for-woocommerce' ),
                'view_item'          => __( 'View '.$singular_name, 'customer-specific-pricing-for-woocommerce' ),
                'all_items'          => __( 'All '.$plural_name, 'customer-specific-pricing-for-woocommerce' ),
                'search_items'       => __( 'Search '.$plural_name, 'customer-specific-pricing-for-woocommerce' ),
                'parent_item_colon'  => __( 'Parent '.$plural_name.':', 'customer-specific-pricing-for-woocommerce' ),
                'not_found'          => __( 'No Customer Specific Price found.', 'customer-specific-pricing-for-woocommerce' ),
                'not_found_in_trash' => __( 'No Customer Specific Price found in Trash.', 'customer-specific-pricing-for-woocommerce' )
            );

            $args = array(
                'labels'             => $labels,
                'description'        => __( 'Description', 'customer-specific-pricing-for-woocommerce' ),
                'public'             => false,
                'publicly_queryable' => false,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => $slug ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => array( 'title', 'thumbnail' ),
                'menu_icon'          => 'dashicons-money-alt'
            );
            register_post_type( $post_type, $args );
        }

        function cspfw_add_meta_box() {
            add_meta_box(
                'cspfw_metabox',
                __( 'Customer Specific Price Options', 'customer-specific-pricing-for-woocommerce' ),
                array($this, 'cspfw_metabox_call_back'),
                'specific_price',
                'normal'
            );
        }

        function cspfw_metabox_call_back(){
            global $wp_roles;
            $all_roles = $wp_roles->roles;
            $post_id = get_the_ID();
            $users = get_users( array( 'fields' => array( 'ID' ) ) );
            $rowCount = get_post_meta($post_id, 'rowCount', true);
            $cspfw_customer_rule = get_post_meta($post_id, 'cspfw_customer_rule', true);
            $cspfw_price_rule = get_post_meta($post_id, 'cspfw_price_rule', true);
            $cspfw_price = get_post_meta($post_id, 'cspfw_price', true);
            $cspfw_qty_min = get_post_meta($post_id, 'cspfw_qty_min', true);
            $cspfw_qty_max = get_post_meta($post_id, 'cspfw_qty_max', true);
            $cspfw_start_date = get_post_meta($post_id, 'cspfw_start_date', true);
            $cspfw_end_date = get_post_meta($post_id, 'cspfw_end_date', true);
            $rowCount_role = get_post_meta($post_id, 'rowCount_role', true);
            $cspfw_role_rule = get_post_meta($post_id, 'cspfw_role_rule', true);
            $cspfw_role_price_rule = get_post_meta($post_id, 'cspfw_role_price_rule', true);
            $cspfw_role_price = get_post_meta($post_id, 'cspfw_role_price', true);
            $cspfw_role_qty_min = get_post_meta($post_id, 'cspfw_role_qty_min', true);
            $cspfw_role_qty_max = get_post_meta($post_id, 'cspfw_role_qty_max', true);
            $cspfw_role_start_date = get_post_meta($post_id, 'cspfw_role_start_date', true);
            $cspfw_role_end_date = get_post_meta($post_id, 'cspfw_role_end_date', true);
            $cspfw_enable_rule_main = get_post_meta($post_id, 'cspfw_enable_rule_main', true);
            $cspfw_apply_pro_and_cat = get_post_meta($post_id, 'cspfw_apply_pro_and_cat', true);
            $cspfw_apply_cust_and_role = get_post_meta($post_id, 'cspfw_apply_cust_and_role', true);
            ?>
            <div class="cspfw_container_main">
                <div class="cspfw_container_inner">
                    <table class="cspfw_container_table_setting">
                        <tbody>
                            <tr>
                                <th><?php echo __( 'Enable', 'customer-specific-pricing-for-woocommerce' );?></th> 
                                <td>
                                    <input type="checkbox" name="cspfw_enable_rule_main" value="yes" <?php if($cspfw_enable_rule_main == 'yes'){echo "checked";}?>>
                                </td> 
                            </tr>
                            <tr>
                                <th><?php echo __( 'Apply For Products/Categories', 'customer-specific-pricing-for-woocommerce' );?></th> 
                                <td>
                                    <select name="cspfw_apply_pro_and_cat" class="regular-text cspfw_apply_pro_cat">
                                        <option value="products" <?php if($cspfw_apply_pro_and_cat == 'products'){echo "selected";}?>>Products</option>
                                        <option value="categories" <?php if($cspfw_apply_pro_and_cat == 'categories'){echo "selected";}?>>Categories</option>
                                    </select>
                                </td> 
                            </tr>
                            <tr class="cspfw_apply_pro">
                                <th><?php echo __( 'Apply For Selected Products', 'customer-specific-pricing-for-woocommerce' );?></th> 
                                <td>
                                    <select id="cspfw_select_product" name="cspfw_select2[]" multiple="multiple" style="width:100%;max-width:15em;">
                                        <?php 
                                            $productsa = get_post_meta($post_id,'cspfw_select2',true);
                                            foreach ($productsa as $value) {
                                                $productc = wc_get_product( $value );
                                                if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
                                                    $title = $productc->get_name();
                                                    ?>
                                                        <option value="<?php echo esc_attr($value); ?>" selected="selected"><?php echo esc_html($title); ?></option>
                                                    <?php   
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr class="cspfw_apply_cat">
                                <th><?php echo __( 'Apply For Selected Categories', 'customer-specific-pricing-for-woocommerce' );?></th> 
                                <td>
                                    <select id="cspfw_select_cats" name="cspfw_cats_select2[]" multiple="multiple" style="width:100%;max-width:15em;">
                                        <?php
                                            $appended_terms = get_post_meta($post_id,'cspfw_cats_select2',true);
                                            if( $appended_terms ) {
                                                foreach( $appended_terms as $term_id ) {
                                                    $term_name = get_term( $term_id )->name;
                                                    $term_name = ( mb_strlen( $term_name ) > 50 ) ? mb_substr( $term_name, 0, 49 ) . '...' : $term_name;
                                                    echo '<option value="' . esc_attr($term_id) . '" selected="selected">' . esc_html($term_name) . '</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo __( 'Enable For Customer/Role Base Rule', 'customer-specific-pricing-for-woocommerce' );?></th> 
                                <td>
                                    <select name="cspfw_apply_cust_and_role" class="regular-text cspfw_apply_cust_role">
                                        <option value="customer_base" <?php if($cspfw_apply_cust_and_role == 'customer_base'){echo "selected";}?>>Customer Base</option>
                                        <option value="role_base" <?php if($cspfw_apply_cust_and_role == 'role_base'){echo "selected";}?>>Role Base</option>
                                    </select>
                                </td> 
                            </tr>
                        </tbody>
                        <input type="hidden" name="rowCount">
                    </table>
                    <div class="cspfw_customer_base_container_table">
                        <h2 class="cspfw_heading"><?php echo __( 'Customers Base Rule', 'customer-specific-pricing-for-woocommerce' );?></h2>
                        <table class="cspfw_container_table" border="1" cellpadding="5" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?php echo __( 'Customer', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <th><?php echo __( 'Price Rules', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <th><?php echo __( 'Price', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <th><?php echo __( 'Min', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <th><?php echo __( 'Max', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <th><?php echo __( 'Start Date', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <th><?php echo __( 'End Date', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <th><a href="#" class="cspfw_add_rule button-primary"><?php echo __( 'Add Rule', 'customer-specific-pricing-for-woocommerce' );?></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $key = 0;
                                for ($i=0; $i < $rowCount; $i++) {
                                    ?>
                                    <tr class="cspfw_fields_rule">
                                        <td>
                                            <select name="cspfw_customer_rule[]">
                                            <?php
                                            foreach($users as $user){
                                                $user_info = get_userdata($user->ID);
                                                $user_name = $user_info->display_name;
                                                $user_email = $user_info->user_email;
                                                ?>
                                                <option value="<?php echo esc_attr($user->ID);?>" <?php if(!empty($cspfw_customer_rule[$key]) && $cspfw_customer_rule[$key] == $user->ID){echo "selected";}?>><?php echo esc_html($user_name.'('.$user_email.')');?></option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="cspfw_price_rule[]">
                                                <option value="fixed_price" <?php if(!empty($cspfw_price_rule[$key]) && $cspfw_price_rule[$key] == 'fixed_price'){echo "selected";}?>>Fixed Price</option>
                                                <option value="fixed_increase" <?php if(!empty($cspfw_price_rule[$key]) && $cspfw_price_rule[$key] == 'fixed_increase'){echo "selected";}?>>Fixed Increase</option>
                                                <option value="fixed_decrease" <?php if(!empty($cspfw_price_rule[$key]) && $cspfw_price_rule[$key] == 'fixed_decrease'){echo "selected";}?>>Fixed Decrease</option>
                                                <option value="percentage_decrease" <?php if(!empty($cspfw_price_rule[$key]) && $cspfw_price_rule[$key] == 'percentage_decrease'){echo "selected";}?>>Percentage Decrease</option>
                                                <option value="percentage_increase" <?php if(!empty($cspfw_price_rule[$key]) && $cspfw_price_rule[$key] == 'percentage_increase'){echo "selected";}?>>Percentage Increase</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="cspfw_price[]" min="0" value="<?php echo esc_attr($cspfw_price[$key]);?>">
                                        </td>
                                        <td>
                                            <input type="number" name="cspfw_qty_min[]" min="0" value="<?php echo esc_attr($cspfw_qty_min[$key]);?>">
                                        </td>
                                        <td>
                                            <input type="number" name="cspfw_qty_max[]" min="0" value="<?php echo esc_attr($cspfw_qty_max[$key]);?>">
                                        </td>
                                        <td>
                                            <input type="text" readonly class="start_datepicker cspfw_date_field" name="cspfw_start_date[]" value="<?php echo esc_attr($cspfw_start_date[$key]);?>">
                                        </td>
                                        <td>
                                            <input type="text" readonly class="end_datepicker cspfw_date_field" name="cspfw_end_date[]" value="<?php echo esc_attr($cspfw_end_date[$key]);?>">
                                        </td>
                                        <td>
                                            <a href="#" class="cspfw_remove_rule button-primary">Remove</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $key++;
                                }
                                if ($rowCount == '0' || empty($rowCount)) {
                                    ?>
                                    <tr class="cspfw_fields_rule">
                                        <td>
                                            <select name="cspfw_customer_rule[]">
                                            <?php
                                            foreach($users as $user){
                                                $user_info = get_userdata($user->ID);
                                                $user_name = $user_info->display_name;
                                                $user_email = $user_info->user_email;
                                                ?>
                                                <option value="<?php echo esc_attr($user->ID);?>"><?php echo esc_html($user_name.'('.$user_email.')');?></option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="cspfw_price_rule[]">
                                                <option value="fixed_price">Fixed Price</option>
                                                <option value="fixed_increase">Fixed Increase</option>
                                                <option value="fixed_decrease">Fixed Decrease</option>
                                                <option value="percentage_decrease">Percentage Decrease</option>
                                                <option value="percentage_increase">Percentage Increase</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="cspfw_price[]" min="0" value="">
                                        </td>
                                        <td>
                                            <input type="number" name="cspfw_qty_min[]" min="0" value="">
                                        </td>
                                        <td>
                                            <input type="number" name="cspfw_qty_max[]" min="0" value="">
                                        </td>
                                        <td>
                                            <input type="text" readonly class="start_datepicker cspfw_date_field" name="cspfw_start_date[]" value="">
                                        </td>
                                        <td>
                                            <input type="text" readonly class="end_datepicker cspfw_date_field" name="cspfw_end_date[]" value="">
                                        </td>
                                        <td>
                                            <a href="#" class="cspfw_remove_rule button-primary">Remove</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <input type="hidden" name="rowCount">
                        </table>
                    </div>
                    <div class="cspfw_role_base_container_table">
                        <h2 class="cspfw_heading"><?php echo __( 'Roles Base Rule', 'customer-specific-pricing-for-woocommerce' );?></h2>
                        <table class="cspfw_role_container_table" border="1" cellpadding="5" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?php echo __( 'Role', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <th><?php echo __( 'Price Rules', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <th><?php echo __( 'Price', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <th><?php echo __( 'Min', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <th><?php echo __( 'Max', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <th><?php echo __( 'Start Date', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <th><?php echo __( 'End Date', 'customer-specific-pricing-for-woocommerce' );?></th>
                                    <th><a href="#" class="cspfw_role_add_rule button-primary"><?php echo __( 'Add Rule', 'customer-specific-pricing-for-woocommerce' );?></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $keee = 0;
                                for ($j=0; $j < $rowCount_role; $j++) {
                                    ?>
                                    <tr class="cspfw_role_fields_rule">
                                        <td>
                                            <select name="cspfw_role_rule[]">
                                            <?php
                                            foreach($all_roles as $keysss => $all_role){
                                                ?>
                                                <option value="<?php echo esc_attr($keysss);?>" <?php if(!empty($cspfw_role_rule[$keee]) && $cspfw_role_rule[$keee] == $keysss){echo "selected";}?>><?php echo esc_html($all_role['name']);?></option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="cspfw_role_price_rule[]">
                                                <option value="fixed_price" <?php if(!empty($cspfw_role_price_rule[$keee]) && $cspfw_role_price_rule[$keee] == 'fixed_price'){echo "selected";}?>>Fixed Price</option>
                                                <option value="fixed_increase" <?php if(!empty($cspfw_role_price_rule[$keee]) && $cspfw_role_price_rule[$keee] == 'fixed_increase'){echo "selected";}?>>Fixed Increase</option>
                                                <option value="fixed_decrease" <?php if(!empty($cspfw_role_price_rule[$keee]) && $cspfw_role_price_rule[$keee] == 'fixed_decrease'){echo "selected";}?>>Fixed Decrease</option>
                                                <option value="percentage_decrease" <?php if(!empty($cspfw_role_price_rule[$keee]) && $cspfw_role_price_rule[$keee] == 'percentage_decrease'){echo "selected";}?>>Percentage Decrease</option>
                                                <option value="percentage_increase" <?php if(!empty($cspfw_role_price_rule[$keee]) && $cspfw_role_price_rule[$keee] == 'percentage_increase'){echo "selected";}?>>Percentage Increase</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="cspfw_role_price[]" min="0" value="<?php echo esc_attr($cspfw_role_price[$keee]);?>">
                                        </td>
                                        <td>
                                            <input type="number" name="cspfw_role_qty_min[]" min="0" value="<?php echo esc_attr($cspfw_role_qty_min[$keee]);?>">
                                        </td>
                                        <td>
                                            <input type="number" name="cspfw_role_qty_max[]" min="0" value="<?php echo esc_attr($cspfw_role_qty_max[$keee]);?>">
                                        </td>
                                        <td>
                                            <input type="text" readonly class="start_role_datepicker cspfw_role_date_field" name="cspfw_role_start_date[]" value="<?php echo esc_attr($cspfw_role_start_date[$keee]);?>">
                                        </td>
                                        <td>
                                            <input type="text" readonly class="end_role_datepicker cspfw_role_date_field" name="cspfw_role_end_date[]" value="<?php echo esc_attr($cspfw_role_end_date[$keee]);?>">
                                        </td>
                                        <td>
                                            <a href="#" class="cspfw_role_remove_rule button-primary">Remove</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $keee++;
                                }
                                if ($rowCount_role == '0' || empty($rowCount_role)) {
                                    ?>
                                    <tr class="cspfw_role_fields_rule">
                                        <td>
                                            <select name="cspfw_role_rule[]">
                                            <?php
                                            foreach($all_roles as $keysss => $all_role){
                                                ?>
                                                <option value="<?php echo esc_attr($keysss);?>"><?php echo esc_html($all_role['name']);?></option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="cspfw_role_price_rule[]">
                                                <option value="fixed_price">Fixed Price</option>
                                                <option value="fixed_increase">Fixed Increase</option>
                                                <option value="fixed_decrease">Fixed Decrease</option>
                                                <option value="percentage_decrease">Percentage Decrease</option>
                                                <option value="percentage_increase">Percentage Increase</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="cspfw_role_price[]" min="0" value="">
                                        </td>
                                        <td>
                                            <input type="number" name="cspfw_role_qty_min[]" min="0" value="">
                                        </td>
                                        <td>
                                            <input type="number" name="cspfw_role_qty_max[]" min="0" value="">
                                        </td>
                                        <td>
                                            <input type="text" readonly class="start_role_datepicker cspfw_role_date_field" name="cspfw_role_start_date[]" value="">
                                        </td>
                                        <td>
                                            <input type="text" readonly class="end_role_datepicker cspfw_role_date_field" name="cspfw_role_end_date[]" value="">
                                        </td>
                                        <td>
                                            <a href="#" class="cspfw_role_remove_rule button-primary">Remove</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <input type="hidden" name="rowCount_role">
                        </table>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                jQuery('.cspfw_add_rule').click(function(){
                    jQuery(this).closest('.cspfw_container_table').find('tbody').append('<tr class="cspfw_fields_rule"><td><select name="cspfw_customer_rule[]"><?php foreach($users as $user){$user_info = get_userdata($user->ID);$user_name = $user_info->display_name;$user_email = $user_info->user_email;?><option value="<?php echo $user->ID;?>"><?php echo $user_name.'('.$user_email.')';?></option><?php }?></select></td><td><select name="cspfw_price_rule[]"><option value="fixed_price">Fixed Price</option><option value="fixed_increase">Fixed Increase</option><option value="fixed_decrease">Fixed Decrease</option><option value="percentage_decrease">Percentage Decrease</option><option value="percentage_increase">Percentage Increase</option></select></td><td><input type="number" name="cspfw_price[]" min="0" value=""></td><td><input type="number" name="cspfw_qty_min[]" min="0" value=""></td><td><input type="number" name="cspfw_qty_max[]" min="0" value=""></td><td><input type="text" readonly class="start_datepicker cspfw_date_field" name="cspfw_start_date[]" value=""></td><td><input type="text" readonly class="end_datepicker cspfw_date_field" name="cspfw_end_date[]" value=""></td><td><a href="#" class="cspfw_remove_rule button-primary">Remove</a></td></tr>');
                    jQuery('input[name="rowCount"]').val(cspfw_count());
                    return false;
                });
                function cspfw_count(){
                    var rowCount = jQuery('.cspfw_container_table tr.cspfw_fields_rule').length;
                    return rowCount;
                }

                jQuery('.cspfw_role_add_rule').click(function(){
                    jQuery(this).closest('.cspfw_role_container_table').find('tbody').append('<tr class="cspfw_role_fields_rule"><td><select name="cspfw_role_rule[]"><?php foreach($all_roles as $keysss => $all_role){?><option value="<?php echo $keysss;?>"><?php echo $all_role['name'];?></option><?php }?></select></td><td><select name="cspfw_role_price_rule[]"><option value="fixed_price">Fixed Price</option><option value="fixed_increase">Fixed Increase</option><option value="fixed_decrease">Fixed Decrease</option><option value="percentage_decrease">Percentage Decrease</option><option value="percentage_increase">Percentage Increase</option></select></td><td><input type="number" name="cspfw_role_price[]" min="0" value=""></td><td><input type="number" name="cspfw_role_qty_min[]" min="0" value=""></td><td><input type="number" name="cspfw_role_qty_max[]" min="0" value=""></td><td><input type="text" readonly class="start_role_datepicker cspfw_role_date_field" name="cspfw_role_start_date[]" value=""></td><td><input type="text" readonly class="end_role_datepicker cspfw_role_date_field" name="cspfw_role_end_date[]" value=""></td><td><a href="#" class="cspfw_role_remove_rule button-primary">Remove</a></td></tr>');
                    jQuery('input[name="rowCount_role"]').val(cspfw_role_count());
                    return false;
                });
                function cspfw_role_count(){
                    var rowCount_role = jQuery('.cspfw_role_container_table tr.cspfw_role_fields_rule').length;
                    return rowCount_role;
                }
            </script>
            <?php
        }

        function set_post_default_category( $post_id, $post, $update ) {
            if ( 'specific_price' == $post->post_type ) {
                if (isset($_REQUEST['cspfw_enable_rule_main'])) {
                    $cspfw_enable_rule_main = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_enable_rule_main'] );
                    update_post_meta($post_id, 'cspfw_enable_rule_main', $cspfw_enable_rule_main);
                }else{
                    update_post_meta($post_id, 'cspfw_enable_rule_main', '');
                }
                if (isset($_REQUEST['cspfw_apply_pro_and_cat'])) {
                    $cspfw_apply_pro_and_cat = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_apply_pro_and_cat'] );
                    update_post_meta($post_id, 'cspfw_apply_pro_and_cat', $cspfw_apply_pro_and_cat);
                }else{
                    update_post_meta($post_id, 'cspfw_apply_pro_and_cat', '');
                }
                if (isset($_REQUEST['cspfw_apply_cust_and_role'])) {
                    $cspfw_apply_cust_and_role = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_apply_cust_and_role'] );
                    update_post_meta($post_id, 'cspfw_apply_cust_and_role', $cspfw_apply_cust_and_role);
                }else{
                    update_post_meta($post_id, 'cspfw_apply_cust_and_role', '');
                }
                if (isset($_REQUEST['rowCount'])) {
                    $rowCount = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['rowCount'] );
                    update_post_meta($post_id, 'rowCount', $rowCount);
                }else{
                    update_post_meta($post_id, 'rowCount', '');
                }
                if (isset($_REQUEST['cspfw_customer_rule'])) {
                    $cspfw_customer_rule = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_customer_rule'] );
                    update_post_meta($post_id, 'cspfw_customer_rule', $cspfw_customer_rule);
                }else{
                    update_post_meta($post_id, 'cspfw_customer_rule', '');
                }
                if (isset($_REQUEST['cspfw_price_rule'])) {
                    $cspfw_price_rule = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_price_rule'] );
                    update_post_meta($post_id, 'cspfw_price_rule', $cspfw_price_rule);
                }else{
                    update_post_meta($post_id, 'cspfw_price_rule', '');
                }
                if (isset($_REQUEST['cspfw_price'])) {
                    $cspfw_price = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_price'] );
                    update_post_meta($post_id, 'cspfw_price', $cspfw_price);
                }else{
                    update_post_meta($post_id, 'cspfw_price', '');
                }
                if (isset($_REQUEST['cspfw_qty_min'])) {
                    $cspfw_qty_min = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_qty_min'] );
                    update_post_meta($post_id, 'cspfw_qty_min', $cspfw_qty_min);
                }else{
                    update_post_meta($post_id, 'cspfw_qty_min', '');
                }
                if (isset($_REQUEST['cspfw_qty_max'])) {
                    $cspfw_qty_max = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_qty_max'] );
                    update_post_meta($post_id, 'cspfw_qty_max', $cspfw_qty_max);
                }else{
                    update_post_meta($post_id, 'cspfw_qty_max', '');
                }
                if (isset($_REQUEST['cspfw_start_date'])) {
                    $cspfw_start_date = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_start_date'] );
                    update_post_meta($post_id, 'cspfw_start_date', $cspfw_start_date);
                }else{
                    update_post_meta($post_id, 'cspfw_start_date', '');
                }
                if (isset($_REQUEST['cspfw_end_date'])) {
                    $cspfw_end_date = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_end_date'] );
                    update_post_meta($post_id, 'cspfw_end_date', $cspfw_end_date);
                }else{
                    update_post_meta($post_id, 'cspfw_end_date', '');
                }
                if (isset($_REQUEST['rowCount_role'])) {
                    $rowCount_role = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['rowCount_role'] );
                    update_post_meta($post_id, 'rowCount_role', $rowCount_role);
                }else{
                    update_post_meta($post_id, 'rowCount_role', '');
                }
                if (isset($_REQUEST['cspfw_role_rule'])) {
                    $cspfw_role_rule = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_role_rule'] );
                    update_post_meta($post_id, 'cspfw_role_rule', $cspfw_role_rule);
                }else{
                    update_post_meta($post_id, 'cspfw_role_rule', '');
                }
                if (isset($_REQUEST['cspfw_role_price_rule'])) {
                    $cspfw_role_price_rule = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_role_price_rule'] );
                    update_post_meta($post_id, 'cspfw_role_price_rule', $cspfw_role_price_rule);
                }else{
                    update_post_meta($post_id, 'cspfw_role_price_rule', '');
                }
                if (isset($_REQUEST['cspfw_role_price'])) {
                    $cspfw_role_price = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_role_price'] );
                    update_post_meta($post_id, 'cspfw_role_price', $cspfw_role_price);
                }else{
                    update_post_meta($post_id, 'cspfw_role_price', '');
                }
                if (isset($_REQUEST['cspfw_role_qty_min'])) {
                    $cspfw_role_qty_min = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_role_qty_min'] );
                    update_post_meta($post_id, 'cspfw_role_qty_min', $cspfw_role_qty_min);
                }else{
                    update_post_meta($post_id, 'cspfw_role_qty_min', '');
                }
                if (isset($_REQUEST['cspfw_role_qty_max'])) {
                    $cspfw_role_qty_max = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_role_qty_max'] );
                    update_post_meta($post_id, 'cspfw_role_qty_max', $cspfw_role_qty_max);
                }else{
                    update_post_meta($post_id, 'cspfw_role_qty_max', '');
                }
                if (isset($_REQUEST['cspfw_role_start_date'])) {
                    $cspfw_role_start_date = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_role_start_date'] );
                    update_post_meta($post_id, 'cspfw_role_start_date', $cspfw_role_start_date);
                }else{
                    update_post_meta($post_id, 'cspfw_role_start_date', '');
                }
                if (isset($_REQUEST['cspfw_role_end_date'])) {
                    $cspfw_role_end_date = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_role_end_date'] );
                    update_post_meta($post_id, 'cspfw_role_end_date', $cspfw_role_end_date);
                }else{
                    update_post_meta($post_id, 'cspfw_role_end_date', '');
                }
                if(isset($_REQUEST['cspfw_select2'])) {
                    $cspfw_select2 = $this->CSPFW_recursive_sanitize_text_field($_REQUEST['cspfw_select2'] );
                    update_post_meta($post_id, 'cspfw_select2', $cspfw_select2);
                }else{
                    update_post_meta($post_id, 'cspfw_select2', '');
                }
                if(isset($_REQUEST['cspfw_cats_select2'])) {
                    $cspfw_cats_select2 = $this->CSPFW_recursive_sanitize_text_field( $_REQUEST['cspfw_cats_select2'] );
                    update_post_meta($post_id, 'cspfw_cats_select2', $cspfw_cats_select2);
                }else{
                    update_post_meta($post_id, 'cspfw_cats_select2', '');
                }
            }
        }

        function cspfw_product_ajax() {
          
            $return = array();
            $post_types = array( 'product','product_variation');

            $search_results = new WP_Query( array( 
                's'=> sanitize_text_field($_GET['q']),
                'post_status' => 'publish',
                'post_type' => $post_types,
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => '_stock_status',
                        'value' => 'instock',
                        'compare' => '=',
                    )
                )
            ));
             

            if( $search_results->have_posts() ) :
               while( $search_results->have_posts() ) : $search_results->the_post();   
                  $productc = wc_get_product( $search_results->post->ID );
                  if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
                     $title = $search_results->post->post_title;
                     $price = $productc->get_price_html();
                     $return[] = array( $search_results->post->ID, $title, $price);   
                  }
               endwhile;
            endif;
            echo json_encode( $return );
            die;
        }

        function cspfw_cats_ajax() {

            $return = array();

            $product_categories = get_terms( 'product_cat', $cat_args );

            if( !empty($product_categories) ){
                foreach ($product_categories as $key => $category) {
                    $category->term_id;
                    $title = ( mb_strlen( $category->name ) > 50 ) ? mb_substr( $category->name, 0, 49 ) . '...' : $category->name;
                    $return[] = array( $category->term_id, $title );
                }
            }

            echo json_encode( $return );
            die;
        }

        function CSPFW_recursive_sanitize_text_field($array) {  
            if(!empty($array)) {
                foreach ( $array as $key => $value ) {
                    if ( is_array( $value ) ) {
                        $value = $this->CSPFW_recursive_sanitize_text_field($value);
                    }else{
                        $value = sanitize_text_field( $value );
                    }
                }
            }
            return $array;
        }

        function cspfw_save_options() {
            if( current_user_can('administrator') ) {
                if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'cspfw_save_option') {
                    if(!isset( $_POST['cspfw_nonce_field'] ) || !wp_verify_nonce( $_POST['cspfw_nonce_field'], 'cspfw_nonce_action' ) ){
                        print 'Sorry, your nonce did not verify.';
                        exit;
                    } else {
                        if(!empty($_REQUEST['cspfw_comman'])){
                            $isecheckbox = array(
                                'cspfw_enable_features',
                                'cspfw_show_single_product_page'
                            );

                            foreach ($isecheckbox as $key_isecheckbox => $value_isecheckbox) {
                                if(!isset($_REQUEST['cspfw_comman'][$value_isecheckbox])){
                                    $_REQUEST['cspfw_comman'][$value_isecheckbox] ='no';
                                }
                            }
                            
                            foreach ($_REQUEST['cspfw_comman'] as $key_cspfw_comman => $value_cspfw_comman) {
                                update_option($key_cspfw_comman, sanitize_text_field($value_cspfw_comman), 'yes');
                            }
                        }

                        wp_redirect( admin_url( '/edit.php?post_type=specific_price&page=customer-specific-pricing' ) );
                        exit;
                    }
                }
            }
        }

        function cspfw_support_and_rating_notice() {
            $screen = get_current_screen();
            if( 'specific_price' == $screen->post_type) {
                ?>
                <div class="cspfw_ratess_open">
                    <div class="cspfw_rateus_notice">
                        <div class="cspfw_rtusnoti_left">
                            <h3>Rate Us</h3>
                            <label>If you like our plugin, </label>
                            <a target="_blank" href="#">
                                <label>Please vote us</label>
                            </a>
                            <label>, so we can contribute more features for you.</label>
                        </div>
                        <div class="cspfw_rtusnoti_right">
                            <img src="<?php echo CSPFW_PLUGIN_DIR;?>/assets/images/review.png" class="cspfw_review_icon">
                        </div>
                    </div>
                    <div class="cspfw_support_notice">
                        <div class="cspfw_rtusnoti_left">
                            <h3>Having Issues?</h3>
                            <label>You can contact us at</label>
                            <a target="_blank" href="https://www.xeeshop.com/support-us/?utm_source=aj_plugin&utm_medium=plugin_support&utm_campaign=aj_support&utm_content=aj_wordpress">
                                <label>Our Support Forum</label>
                            </a>
                        </div>
                        <div class="cspfw_rtusnoti_right">
                            <img src="<?php echo CSPFW_PLUGIN_DIR;?>/assets/images/support.png" class="cspfw_review_icon">
                        </div>
                    </div>
                </div>
                <div class="cspfw_donate_main">
                   <img src="<?php echo CSPFW_PLUGIN_DIR;?>/assets/images/coffee.svg">
                   <h3>Buy me a Coffee !</h3>
                   <p>If you like this plugin, buy me a coffee and help support this plugin !</p>
                   <div class="cspfw_donate_form">
                      <a class="button button-primary ocwg_donate_btn" href="https://www.paypal.com/paypalme/shayona163/" data-link="https://www.paypal.com/paypalme/shayona163/" target="_blank">Buy me a coffee !</a>
                   </div>
                </div>
                <?php
            }
        }

        function init() {
            add_action( 'init', array($this, 'cspfw_create_post_type'));
            add_action( 'add_meta_boxes', array($this, 'cspfw_add_meta_box'));
            add_action( 'save_post', array($this, 'set_post_default_category'), 10,3 );
            add_action( 'wp_ajax_nopriv_cspfw_product_ajax',array($this, 'cspfw_product_ajax') );
            add_action( 'wp_ajax_cspfw_product_ajax', array($this, 'cspfw_product_ajax') );
            add_action( 'wp_ajax_nopriv_cspfw_cats_ajax',array($this, 'cspfw_cats_ajax') );
            add_action( 'wp_ajax_cspfw_cats_ajax', array($this, 'cspfw_cats_ajax') );
            add_action( 'admin_menu',  array($this, 'cspfw_submenu_page'));
            add_action( 'init',  array($this, 'cspfw_save_options'));
            add_action( 'admin_notices', array($this, 'cspfw_support_and_rating_notice' ));
        }

        public static function CSPFW_instance() {
            if (!isset(self::$CSPFW_instance)) {
                self::$CSPFW_instance = new self();
                self::$CSPFW_instance->init();
            }
            return self::$CSPFW_instance;
        }
    }
    CSPFW_admin_menu::CSPFW_instance();
}