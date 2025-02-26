<table id="tab_pro_general" class="form-table aeiwooc-tab active">
    <!--List field here .....-->
    <tr class="group-row" valign="top">
        <td>
            <h2 class="tt"><?php _e("Configure Invoice information", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></h2>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e("Title", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'title';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Selling TOP1 Quality SHOP", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Address", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'address';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("218 Hoang Van Thu, Binh Thanh District, Ho Chi Minh City, Vietnam", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Tel", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'tel';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("0792922321", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Email", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'email';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);

            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("website366@gmail.com", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
     <!-- ........................ -->
    <tr class="group-row" valign="top">
        <td>
            <h2 class="tt"><?php _e("Configure units", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></h2>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e("Unit", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'unit';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Pcs", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Unit column", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'unit_hide';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
			$checked = '';
			if($val=='on'){
				$checked = 'checked';
			}
            ?>
            <input type="checkbox" <?php echo $checked;?> id="<?php echo $field; ?>" name="<?php echo $field; ?>" />
            <label for="<?php echo $field; ?>"><?php _e("Don't create unit column in invoice", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></label>
        </td>
    </tr>
    
    <!-- ........................ -->
    <tr class="group-row" valign="top">
        <td>
            <h2 class="tt"><?php _e("Configure the file content color format", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></h2>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e("Product table head background color", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'head_bg';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val){
                $val = '#92d050';
            }
            ?>
            <input value="<?php echo $val; ?>" class="colorpicker" id="<?php echo $field; ?>" name="<?php echo $field; ?>" />
            <?php $WPSHARE247_CLASS_Aeiwooc::show_pro_message(); ?>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e("Product table head color", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'head_color';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val){
                $val = '#000000';
            }
            ?>
            <input value="<?php echo $val; ?>" class="colorpicker" id="<?php echo $field; ?>" name="<?php echo $field; ?>" />
            <?php $WPSHARE247_CLASS_Aeiwooc::show_pro_message(); ?>
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Border color", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'border';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val){
                $val = '#000000';
            }
            ?>
            <input value="<?php echo $val; ?>" class="colorpicker" id="<?php echo $field; ?>" name="<?php echo $field; ?>" />
            <?php $WPSHARE247_CLASS_Aeiwooc::show_pro_message(); ?>
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Border style", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'border_style';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
			$arr_border = Aeiwooc_helper::get_arr_border_style();
            ?>
            <select id="<?php echo $field; ?>" name="<?php echo $field; ?>" class="aeiwooc_excel_template">
                <?php 
				foreach($arr_border as $border => $border_name){
					$selected = ''; 
					if($border == $val){
						$selected = 'selected';
					}
					
					$border_img_url = '';
					$border_img = WPSHARE247_AEIWOOC_PLUGIN_INC_ASSETS . '/border-style/' . $border . '.png' ;
					if(file_exists($border_img)){
						$border_img_url = WPSHARE247_AEIWOOC_PLUGIN_INC_ASSETS_URL . '/border-style/' . $border . '.png' ;
					}
				?>
                	<option data-url="<?php echo $border_img_url;?>" <?php echo $selected;?> value="<?php echo $border; ?>"><?php echo $border_name;?></option>
                <?php
				}
				?>
            </select> <?php $WPSHARE247_CLASS_Aeiwooc::show_pro_message(); ?>
            <?php 
			$img_dir = WPSHARE247_AEIWOOC_PLUGIN_INC_ASSETS . '/border-style/' . $val . '.png' ; 
			if(file_exists($img_dir)){ 
				$bs_img_src = WPSHARE247_AEIWOOC_PLUGIN_INC_ASSETS_URL . '/border-style/' . $val . '.png' ;
			}
			?>
            <div id="aeiwooc_border_style_img">
            	<img class="<?php echo $field; ?>" src="<?php echo $bs_img_src;?>" />
            </div>
        </td>
    </tr>
    
    <!-- ........................ -->
    <tr class="group-row" valign="top">
        <td>
            <h2 class="tt"><?php _e("Configure Text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></h2>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e("Company address text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'co_address_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Address", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Address", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e("Company tel text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'co_tel_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Tel", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Tel", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e("Company email text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'co_email_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Email", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Email", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e("Order id text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_key_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Order ID", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Order ID", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e("Order datetime text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_date_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Order datetime", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Order datetime", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Numerical order text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_product_stt_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Number", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Number", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Product text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_product_name_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Product", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Product", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Unit text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_product_unit_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Unit", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Unit", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Quantity text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_product_quantity_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Quantity", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Quantity", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Table subtotal text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_product_subtotal_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Price", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Price", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Table total text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_product_total_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Total", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Total", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Subtotal text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_subtotal_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Subtotal", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Subtotal", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Shipping text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_ship_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Shipping", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Shipping", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Coupon text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_coupon_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Discount", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Discount", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Total text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_total_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Checkout total", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Checkout total", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Customer name text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_customer_name_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Customer name", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Customer name", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Customer tel text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_customer_tel_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Customer tel", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Customer tel", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Customer email text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_customer_email_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Customer email", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Customer email", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Customer address text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_customer_address_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Customer address", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Customer address", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Customer note text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_customer_note_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Customer note", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Customer note", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("Customer payment text", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_customer_payment_text';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            if(!$val && $lang_code=='vi'){
                $val = __("Payment method", WPSHARE247_AEIWOOC_TEXTDOMAIN);
            }
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php _e("Payment method", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" />
        </td>
    </tr>
    
     <!-- ........................ -->
    <tr class="group-row" valign="top">
        <td>
            <h2 class="tt"><?php _e("File save", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></h2>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e("File folder", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'file_path';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            $place_holder_path = $WPSHARE247_CLASS_Aeiwooc::get_wp_upload_dir_file();
            ?>
            <input class="w100" value="<?php echo $val;?>" type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="<?php echo WPSHARE247_AEIWOOC_FILE_PATH; ?>" />
            <small><?php _e("File path", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>: <?php echo $place_holder_path;?> </small>
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><?php _e("File name", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'file_name_save';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            ?>
            <select id="<?php echo $field; ?>" name="<?php echo $field; ?>" class="file_name_save_event">
                <option data-file="115.xlsx" <?php if($val=='ORDERID') echo 'selected'; ?> value="ORDERID"><?php _e("OrderID", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></option>
                <option data-file="115_7885555.xlsx" <?php if($val=='ORDERID_TIME') echo 'selected'; ?> value="ORDERID_TIME"><?php _e("Order ID and Time", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></option>
                <option data-file="3def184ad8f4755ff269862ea77393dd.xlsx" <?php if($val=='ORDERID_MD5') echo 'selected'; ?> value="ORDERID_MD5"><?php _e("MD5 Order ID", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></option>
            </select>
            <small class="<?php echo $field; ?>" style="display:block; margin-top:5px;">
            <?php 
            $order_id = 115;
            switch( $val ){
                case 'ORDERID_TIME':
                    $invoice_file_name = $order_id. '_' . time();
                break;
                
                case 'ORDERID_MD5':
                    $invoice_file_name = md5($order_id);
                break;
                
                default:
                    $invoice_file_name = $order_id;
                break;
            }
                echo $invoice_file_name.'.xlsx';
            ?>
            </small>
        </td>
    </tr>
    
    
    <tr valign="top">
        <th scope="row"><?php _e("Order date format", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'order_date_format';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            ?>
            <select id="<?php echo $field; ?>" name="<?php echo $field; ?>">
                <option <?php if($val=='H:i:s d/m/Y') echo 'selected'; ?> value="H:i:s d/m/Y"><?php _e("H:i:s d/m/Y", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></option>
                <option <?php if($val=='H:i:s Y/m/d') echo 'selected'; ?> value="H:i:s Y/m/d"><?php _e("H:i:s Y/m/d", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></option>
            </select>
            
        </td>
    </tr>
</table>