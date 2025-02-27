<?php

if( !class_exists('PVTFW_STYLING' )):

	class PVTFW_STYLING {

		protected static $_instance = null;

        function __construct(){

            $this->register();

        }

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        /**
        *==========================================================================================
        * Table Styling Feature
        *==========================================================================================
        **/

        function styling_setting(){
        ?> 
        	<div class="form-section" id="styling">

	            <h3>Table Design</h3>
	            <div class="detail">Use the default design or your preferred design.</div>

	            <!-- Unlock Link -->
	            <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="font-weight: bold; color: #9e0303; margin-top: 7px; display: block;"><?php echo esc_attr__( 'Unlock all features >>>', 'product-variant-table-for-woocommerce' ); ?></a>

	            <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="text-decoration: none; color: #2c3338; opacity: 0.5;">
	                <table class="form-table" style="pointer-events: none;">
	                	<tr valign="top">
	                        <th scope="row">Choose Design <?php PVTFW_COMMON::badge(); ?></th>
	                        <td>
	                            <select data-parent="table_design" class="regular-ele-width" name='pvtfw_variant_table_table_layout_bulk'>
	                                <option value="deafult">Deafult Design</option>
	                                <option value="customize">Customize Design</option>
	                            </select>
	                        </td>
	                    </tr>
	                    <tr valign="top" data-child="table_design-child">
	                        <th scope="row">Border Color</th>
	                        <td>
	                            <input class="color-field" type="text" name="pvtfw_variant_table_display_bulk_cart_msg_text" value="#eeeeee">
	                        </td>
	                    </tr>
	                    <tr valign="top" data-child="table_design-child">
	                        <th scope="row">Border Width</th>
	                        <td>
	                            <input class="small-ele-width" type="number" name="pvtfw_variant_table_display_bulk_cart_msg_text" value="1"><span>px</span>
	                        </td>
	                    </tr>
	                </table>
	            </a>

	            <div data-child="table_design-child">
		            <h3>Table Header Styling</h3>
		            <div class="detail">Customize the table header background, text, and padding.</div>

		            <!-- Unlock Link -->
		            <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="font-weight: bold; color: #9e0303; margin-top: 7px; display: block;"><?php echo esc_attr__( 'Unlock all features >>>', 'product-variant-table-for-woocommerce' ); ?></a>

		            <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="text-decoration: none; color: #2c3338; opacity: 0.5;">
		                <table class="form-table" style="pointer-events: none;">
		                	<tr valign="top" data-child="table_design-child">
		                        <th scope="row">Background Color</th>
		                        <td>
		                            <input class="color-field" type="text" name="pvtfw_variant_table_display_bulk_cart_msg_text" value="#f8f8f8">
		                        </td>
		                    </tr>
		                    <tr valign="top" data-child="table_design-child">
		                        <th scope="row">Text Color</th>
		                        <td>
		                            <input class="color-field" type="text" name="pvtfw_variant_table_display_bulk_cart_msg_text" value="#6d6d6d">
		                        </td>
		                    </tr>
		                    <tr valign="top" data-child="table_design-child">
		                        <th scope="row">Arrow Color</th>
		                        <td>
		                            <input class="color-field" type="text" name="pvtfw_variant_table_display_bulk_cart_msg_text" value="#666666">
		                        </td>
		                    </tr>
		                	<tr valign="top" data-child="table_design-child">
		                        <th scope="row">Text Alignment</th>
		                        <td>
		                            <select class="regular-ele-width" name='pvtfw_variant_table_table_layout_bulk'>
		                                <option value="left">Left</option>
		                                <option value="center">Center</option>
		                                <option value="right">Right</option>
		                            </select>
		                        </td>
		                    </tr>
		                	<tr valign="top" data-child="table_design-child">
		                        <th scope="row">Padding</th>
		                        <td>
		                            <input class="small-ele-width" type="number" name="pvtfw_variant_table_display_bulk_cart_msg_text" value=""><span>px</span>
		                        </td>
		                    </tr>
		                </table>
		            </a>

		            <h3>Table Body Styling</h3>
		            <div class="detail">Customize the table header background, text, and padding.</div>

		            <!-- Unlock Link -->
		            <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="font-weight: bold; color: #9e0303; margin-top: 7px; display: block;"><?php echo esc_attr__( 'Unlock all features >>>', 'product-variant-table-for-woocommerce' ); ?></a>

		            <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="text-decoration: none; color: #2c3338; opacity: 0.5;">
		                <table class="form-table" style="pointer-events: none;">
		                	<tr valign="top" data-child="table_design-child">
		                        <th scope="row">Background Color (Odd)</th>
		                        <td>
		                            <input class="color-field" type="text" name="pvtfw_variant_table_display_bulk_cart_msg_text" value="#fbfbfb">
		                        </td>
		                    </tr>
		                    <tr valign="top" data-child="table_design-child">
		                        <th scope="row">Background Color (Even)</th>
		                        <td>
		                            <input class="color-field" type="text" name="pvtfw_variant_table_display_bulk_cart_msg_text" value="#ffffff">
		                        </td>
		                    </tr>
		                    <tr valign="top" data-child="table_design-child">
		                        <th scope="row">Text Color</th>
		                        <td>
		                            <input class="color-field" type="text" name="pvtfw_variant_table_display_bulk_cart_msg_text" value="#6d6d6d">
		                        </td>
		                    </tr>
		                	<tr valign="top" data-child="table_design-child">
		                        <th scope="row">Text Alignment</th>
		                        <td>
		                            <select class="regular-ele-width" name='pvtfw_variant_table_table_layout_bulk'>
		                                <option value="left">Left</option>
		                                <option value="center">Center</option>
		                                <option value="right">Right</option>
		                            </select>
		                        </td>
		                    </tr>
		                	<tr valign="top" data-child="table_design-child">
		                        <th scope="row">Padding</th>
		                        <td>
		                            <input class="small-ele-width" type="number" name="pvtfw_variant_table_display_bulk_cart_msg_text" value=""><span>px</span>
		                        </td>
		                    </tr>
		                </table>
		            </a>

		            <h3>Table Footer Styling</h3>
		            <div class="detail">Customize the table footer background, pagination, and padding.</div>

		            <!-- Unlock Link -->
		            <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="font-weight: bold; color: #9e0303; margin-top: 7px; display: block;"><?php echo esc_attr__( 'Unlock all features >>>', 'product-variant-table-for-woocommerce' ); ?></a>

		            <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="text-decoration: none; color: #2c3338; opacity: 0.5;">
		                <table class="form-table" style="pointer-events: none;">
		                	<tr valign="top" data-child="table_design-child">
		                        <th scope="row">Background Color</th>
		                        <td>
		                            <input class="color-field" type="text" name="pvtfw_variant_table_footer_background_color" value="#f8f8f8">
		                        </td>
		                    </tr>
		                    <tr valign="top" data-child="table_design-child">
		                        <th scope="row">Pagination Number Color</th>
		                        <td>
		                            <input class="color-field" type="text" name="pvtfw_variant_table_footer_pagination_number_color" value="#222222">
		                        </td>
		                    </tr>
		                    <tr valign="top" data-child="table_design-child">
		                        <th scope="row">Pagination Selected Number Color</th>
		                        <td>
		                            <input class="color-field" type="text" name="pvtfw_variant_table_footer_pagination_selected_number_color" value="#ffffff">
		                        </td>
		                    </tr>
		                	<tr valign="top" data-child="table_design-child">
		                        <th scope="row">Pagination Selected Number Background Color</th>
		                        <td>
		                            <input class="color-field" type="text" name="pvtfw_variant_table_footer_pagination_selected_number_background_color" value="#abb8c3">
		                        </td>
		                    </tr>
		                </table>
		            </a>
		        </div>
	        </div>
        <?php
    	}

        /**
        *====================================================
        * Adding styling tab to the setting
        *====================================================
        **/

        function styling_tab($tab, $curTab){

        	$lock_class = !PVTFW_TABLE::is_pvtfw_pro_Active() ? esc_attr( 'lock' ) : '';

            $tab .= "<a href='#styling' data-target='styling' class='nav-tab ".($curTab==='styling' ? 'nav-tab-active' : null).$lock_class."'>".PVTFW_COMMON::badge('Pro', 'return').__('Styling', 'product-variant-table-for-woocommerce')."</a>";
            
            return $tab;

        }

        /**
        * ====================================================
        * Register function
        * ====================================================
        **/
        public function register(){

            if( ! PVTFW_TABLE::is_pvtfw_pro_Active() ):

                add_action('pvtfw_admin_section', array( $this, 'styling_setting' ), 99);

                // add_action('pvtfw_admin_after_filter', array( $this, 'bulk_cart' ), 99);
                // add_action('pvtfw_admin_after_filter', array( $this, 'thumbnail_resize_setting' ), 100);

            endif;

            // Adding Styling Tab
            add_filter('pvtfw_admin_setting_tab', array( $this, 'styling_tab' ), 9, 2);
        }
	}

	$pvtfw_styling = PVTFW_STYLING::instance();

endif;