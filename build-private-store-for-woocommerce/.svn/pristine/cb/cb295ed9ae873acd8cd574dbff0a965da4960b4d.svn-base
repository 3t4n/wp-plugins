<?php
global $bpsfw_comman;
add_action( 'admin_menu','bpsfw_submenu_page');

function bpsfw_submenu_page() {
    add_menu_page('Private Store','Private Store','manage_options','private-store', 'bpsfw_callback');
}

function bpsfw_callback() {
	global $bpsfw_comman, $wp_roles;
	$user_roles = $wp_roles->get_names();
	$user_roles = array_merge(['guest' => 'Guest'], $user_roles);

	?>
	<div class="bpsfw_container">
        <form method="post" >
        	<input type="hidden" name="_wpnonce" value="<?php echo esc_attr(wp_create_nonce('build_save_action')); ?>">
        	<div class="wrap">
            	<h2>Woocomerce Private Store Settings</h2>
        	</div>
        	<div class="card bpsfw_notice">
                <h2>Please help us spread the word & keep the plugin up-to-date</h2>
                <p>
                    <a class="button-primary button" title="Support Private Store" target="_blank" href="https://www.plugin999.com/support/">Support</a>
                    <a class="button-primary button" title="Rate Private Store" target="_blank" href="https://wordpress.org/support/plugin/build-private-store-for-woocommerce-pro/reviews/?filter=5">Rate the plugin ★★★★★</a>
                </p>
            </div>
            <?php if(isset($_REQUEST['message']) && $_REQUEST['message'] == 'success'){ ?>
                <div class="notice notice-success is-dismissible"> 
                    <p><strong>Setting saved successfully.</strong></p>
                </div>
            <?php } ?>
            <ul class="nav-tab-wrapper woo-nav-tab-wrapper">
                <li class="nav-tab" data-tab="bpsfw-tab-general">General</li>
                <li class="nav-tab" data-tab="bpsfw-tab-registration-form-settings">Registration Form Settings</li>
                <li class="nav-tab" data-tab="bpsfw-tab-new-user-registration-settings">New User Registration Settings</li>
                <li class="nav-tab" data-tab="bpsfw-tab-admin-email-settings">Administrator Email Settings</li>
                <li class="nav-tab" data-tab="bpsfw-tab-user-register-settings">Notification</li>
            </ul>
            <div id="bpsfw-tab-general" class="tab-content current"> 
            	<div class="postbox-header">
            		<h3>General Control Setting</h3>
            	</div>
                <table class="data_table">
                    <tbody>
                    	<tr class="product_private" style="background-color: grey; color: white;">
                       		<th colspan="2">Common Settings</th>
                       	</tr> 
                    	<tr class="product_private">
                            <th>
                            	<label>Private Products Price and Add to cart Button</label>
                            </th>
                            <td>
                            	<input type="checkbox"  name="bpsfw_comman[bpsfw_disble_price_addtocartbutton]" value="yes"<?php if ($bpsfw_comman['bpsfw_disble_price_addtocartbutton'] == "yes" ) { echo "checked"; } ?>>
                            	<label>If this Enable option then  below product show but not show price and Add to cart button for guest user And not Check this option Then below product not show for guest user</label>
                            </td>
                        </tr>
                       	<tr class="product_private">
                       		<th>
                       			<label>Login to see prices text</label>
                       		</th>
                       		<td>
                            	<input type="text" name="bpsfw_comman[bpsfw_login_to_see_price]" value="<?php echo esc_attr($bpsfw_comman['bpsfw_login_to_see_price']);?>">
                        		
                            </td>
                       	</tr>

                           <tr>
                                <th>
                                	<label>User Login Redirect Url</label>
                                </th>
                                <td>
                                	<input type="text" name="bpsfw_comman[bpsfw_redirect_url]" value="<?php echo esc_attr($bpsfw_comman['bpsfw_redirect_url']);?>" style="width:60%;">
                                	<p class="description">
                                		Redirect  User
                                	</p>
                                </td>
                            </tr>
                            <tr>
                            	<th>
                            		<label>Redirect Url For Private Product And Pages</label>
                            	</th>
                            	<td>
                            		<?php 
          								$my_account_url = get_permalink ( get_option( 'woocommerce_myaccount_page_id' ) );
          							?>
                            		<input type="text" name="bpsfw_comman[bpsfw_prod_redirect_url]" value="<?php echo esc_attr($bpsfw_comman['bpsfw_prod_redirect_url']);?>" style="width: 60%;">
                            		<p class="description">
                            			Redirect  User if they try to access private products or private pages
                            			<br>
                            			default url: <?php echo $my_account_url;?> 
                            		</p>
                            	</td>
                            </tr>

						<?php foreach( $user_roles as $userrole_key => $userrole_val){ ?>
                           	<tr class="product_private" style="background-color: grey; color: white;">
                           		<th colspan="2"><?php echo $userrole_val; ?></th>
                           	</tr> 	
                           	
                            <tr class="product_private">
                                <th>
                                	<label>Private Products</label>
                                </th>
                                <td>
                                	<select class="bpsfw_select_product" name="bpsfw_select2[<?php echo $userrole_key?>][]" multiple="multiple" style="width:60%;">
			                           	<?php 
			                           		$productsa = get_option('wg_combo_'.$userrole_key);
			                           		if($productsa){
				                           		foreach ($productsa as $value) {
			                              			$productc = wc_get_product( $value );
													if($productc &&  $productc->is_purchasable()){
				                                 		$title = $productc->get_name();
				                                 		$title = ( mb_strlen( $title ) > 50 ) ? mb_substr( $title, 0, 49 ) . '...' : $title; ?>
					                                 		<option value="<?php echo esc_attr($value); ?>" selected="selected"><?php echo esc_attr($title);?></option>
					                                 	<?php  
													}
				                           		}
			                           		}
			                           	?>
		                           	</select> 
                                	<p class="description">Private Product for <?php echo $userrole_val;?> User</p>
                                </td>
                            </tr>
                            <tr class="product_private">
                                <th>
                                	<label>Private Product Categories</label>
                                </th>
                                <td>
                                	<select class="bpsfw_select_cats" name="bpsfw_cats_select2[<?php echo $userrole_key?>][]" multiple="multiple" style="width:60%;" disabled>
			                           	<?php
			                           		$appended_terms = get_option('wg_cats_select2_'.$userrole_key);
			                           		if( $appended_terms ) {
								                foreach( $appended_terms as $term_id ) {
								                    $term_name = get_term( $term_id )->name;
								                    $term_name = ( mb_strlen( $term_name ) > 50 ) ? mb_substr( $term_name, 0, 49 ) . '...' : $term_name;
								                    echo '<option value="' . esc_attr($term_id) . '" selected="selected">' . esc_attr($term_name) . '</option>';
								                }
								            }
			                           	?>
		                           </select> 
                                   <label class="fcpfw_comman_link"><strong>Only Available in  </strong><a href="https://www.plugin999.com/plugin/build-private-store-for-woocommerce/" target="_blank">Pro Version</a></label>
                                	<p class="description">
                                		Private Category for <?php echo $userrole_val;?> User
                                	</p>
                                </td>
                            </tr>
                            <tr class="product_private">
                                <th>
                                	<label>Private Product Tags</label>
                                </th>
                                <td>
                                	<select class="bpsfw_select_tags" name="bpsfw_tags_select2[<?php echo $userrole_key?>][]" multiple="multiple" style="width:60%;" disabled>
			                           	<?php
			                           		$appended_terms = get_option('bpsfw_tags_select2_'.$userrole_key);
			                           		if( $appended_terms ) {
								                foreach( $appended_terms as $term_id ) {
								                    $term_name = get_term( $term_id )->name;
								                    $term_name = ( mb_strlen( $term_name ) > 50 ) ? mb_substr( $term_name, 0, 49 ) . '...' : $term_name;
								                    echo '<option value="' . esc_attr($term_id) . '" selected="selected">' . esc_attr($term_name) . '</option>';
								                }
								            }
			                           	?>
			                        </select>
                                    <label class="fcpfw_comman_link"><strong>Only Available in  </strong><a href="https://www.plugin999.com/plugin/build-private-store-for-woocommerce/" target="_blank">Pro Version</a></label>
                                	<p class="description">Private Tag for <?php echo $userrole_val;?> User</p>
                                </td>
                            </tr>
                            <tr class="product_private">
                                <th>
                                	<label>Private Pages</label>
                                </th>
                                <td>
                                	<select class="wg_select_pags" name="wg_pags_select2[<?php echo $userrole_key?>][]" multiple="multiple" style="width:60%;">
			                           	<?php
			                           		$appended_pags = get_option('wg_pags_select2_'.$userrole_key);

			                           		if(  $appended_pags ) {
								                foreach( $appended_pags as $page_id ) {
								                    $term_name = get_page( $page_id )->post_title;
								                    $term_name = ( mb_strlen( $term_name ) > 50 ) ? mb_substr( $term_name, 0, 49 ) . '...' : $term_name;
								                    echo '<option value="' . esc_attr($page_id) . '" selected="selected">' . esc_attr($term_name) . '</option>';
								                }
								            }
			                           	?>
			                           </select>
			                           <p class="description">Private Pages for <?php echo $userrole_val;?> User</p>
                                </td>
                            </tr>
                             
                        <?php } ?>

                    </tbody>                         
                </table>
            </div>               
            <div id="bpsfw-tab-registration-form-settings" class="tab-content">
            	<div class="postbox-header">
                	<h3>Private User Login/Registration Form Setting</h3>
                </div>
                <table class="data_table">
                    <tbody>
                        <tr>
                        	<th>
                        		<label>Login Form Title</label>	                            		
                        	</th>
                        	<td>
                        		<input type="text" name="bpsfw_comman[bpsfw_login_form_title]" value="<?php echo esc_attr($bpsfw_comman['bpsfw_login_form_title']);?>">
                        		<p>Enter the login form title</p>
                        	</td>
                        </tr>
                        <tr>
                        	<th>
                        		<label>Registration Form Title</label>	                            		
                        	</th>
                        	<td>
                        		<input type="text" name="bpsfw_comman[bpsfw_registration_form_title]" value="<?php echo esc_attr($bpsfw_comman['bpsfw_registration_form_title']);?>">
                        		<p>Enter the registration form title</p>
                        	</td>
                        </tr>
                        <tr>
                        	<th>
                        		<label>Registration Successful Message</label>	                            		
                        	</th>
                        	<td>
                        		<input type="text" name="bpsfw_comman[bpsfw_registration_successful_message]" value="<?php echo esc_attr($bpsfw_comman['bpsfw_registration_successful_message']);?>">
                        		<p>Enter the registration successful message</p>
                        	</td>
                        </tr>
                      	
                                                  
                    </tbody>                        
                </table>
            </div>
            <div id="bpsfw-tab-new-user-registration-settings" class="tab-content">
            	<div class="postbox-header">
            		<h3>Approve New Users Registration Settings</h3>
            	</div>
                <table class="data_table">
                    <tbody>
                        <tr>
                            <th>
                            	<label>Manually Approve New Registration</label>
                            </th>
                            <td>
                            	<input type="checkbox" name="bpsfw_comman[bpsfw_approve_registration]" value="yes"<?php if($bpsfw_comman['bpsfw_approve_registration'] == 'yes'){echo "checked";}?>>
                            	<p>Disable manual approval of new users registration.</p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th>
                            	<label>Message For Pending Account For Approval</label>
                            </th>
                            <td>
                            	<input type="text" class="bpsfw_tex" name="bpsfw_comman[bpsfw_pending_account_approval]" value="<?php echo esc_attr($bpsfw_comman['bpsfw_pending_account_approval']); ?>">
                            	<p>Message for users when account is pending for approval.</p>
                            	
                            </td>
                        </tr>
                        <tr>
                            <th>
                            	<label>Account Disable Email</label>
                            </th>
                            <td>
                            	<input type="checkbox" name="bpsfw_comman[bpsfw_account_disale_email]" value="yes"<?php if($bpsfw_comman['bpsfw_account_disale_email'] == 'yes'){echo "checked";}?>>
                            	<p>Notify users will by an E-mail when their registration is rejected.</p>
                            </td>
                        </tr>
                        <tr>
                            <th>
                            	<label>Account Reject Email Subject</label>
                            </th>
                            <td>
                            	<input type="text" class="bpsfw_tex" name="bpsfw_comman[bpsfw_reject_email_subject]" value="<?php echo esc_attr($bpsfw_comman['bpsfw_reject_email_subject']);?> " disabled>
                            	<p>Account reject email subject</p>
                                <label class="fcpfw_comman_link"><strong>Only Available in  </strong><a href="https://www.plugin999.com/plugin/build-private-store-for-woocommerce/" target="_blank">Pro Version</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th>
                            	<label>Account Reject Email message</label>
                            </th>
                            <td>
                            	<textarea class="bpsfw_tex" rows="5" cols="30" name="bpsfw_comman[bpsfw_reject_email_message]" disabled ><?php echo esc_attr($bpsfw_comman['bpsfw_reject_email_message']);?></textarea>
                            	<p>Account reject email message</p>
                                <label class="fcpfw_comman_link"><strong>Only Available in  </strong><a href="https://www.plugin999.com/plugin/build-private-store-for-woocommerce/" target="_blank">Pro Version</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th>
                            	<label>Account Approve Email</label>
                            </th>
                            <td>
                            	<input type="checkbox" name="bpsfw_comman[bpsfw_account_approve_email]" value="yes"<?php if($bpsfw_comman['bpsfw_account_approve_email'] == 'yes'){echo "checked";}?>>
                            	<p>Notify users will by an E-mail when their registration is approved.</p>
                                
                            </td>
                        </tr>
                        <tr>
                            <th>
                            	<label>Account Approve Email Subject</label>
                            </th>
                            <td>
                            	<input type="text" class="bpsfw_tex" name="bpsfw_comman[bpsfw_approve_email_subject]" value="<?php echo esc_attr($bpsfw_comman['bpsfw_approve_email_subject']);?>" disabled>
                            	<p>Account approve email subject</p>
                                <label class="fcpfw_comman_link"><strong>Only Available in  </strong><a href="https://www.plugin999.com/plugin/build-private-store-for-woocommerce/" target="_blank">Pro Version</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th>
                            	<label>Account Approve Email message</label>
                            </th>
                            <td>
                            	<textarea class="bpsfw_tex" rows="5" cols="30" name="bpsfw_comman[bpsfw_approve_email_message]" disabled><?php echo esc_attr($bpsfw_comman['bpsfw_approve_email_message']);?></textarea>
                            	<p>
                            		Account approve email message
                            	</p>
                                <label class="fcpfw_comman_link"><strong>Only Available in  </strong><a href="https://www.plugin999.com/plugin/build-private-store-for-woocommerce/" target="_blank">Pro Version</a></label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> 
            <div id="bpsfw-tab-admin-email-settings" class="tab-content">
            	<div class="postbox-header">
            		<h3>Administrator Email Settings</h3>
            	</div>
                <table class="data_table">
                    <tbody>
                        <tr>
                            <th>
                            	<label>Email For Administrator</label>
                            </th>
                            <td>
                            	<input type="checkbox" name="bpsfw_comman[bpsfw_admin_email]" value="yes"<?php if($bpsfw_comman['bpsfw_admin_email'] == 'yes'){echo "checked";}?>>
                            </td>
                        </tr>
                        <tr>
                            <th>
                            	<label>Account Reject Email Subject</label>
                            </th>
                            <td>
                            	<input type="text" class="bpsfw_tex" name="bpsfw_comman[bpsfw_admin_reject_email_subject]" value="<?php echo esc_attr($bpsfw_comman['bpsfw_admin_reject_email_subject']);?>">
                            	<p>Account reject email subject</p>
                            </td>
                        </tr>
                        <tr>
                            <th>
                            	<label>Account Reject Email message</label>
                            </th>
                            <td>
                            	<textarea class="bpsfw_tex" rows="5" cols="30" name="bpsfw_comman[bpsfw_admin_reject_email_message]"><?php echo esc_attr($bpsfw_comman['bpsfw_admin_reject_email_message']);?></textarea>
                            	<p>Account reject email message</p>
                            </td>
                        </tr>

                        <tr>
                            <th>
                            	<label>Account Approve Email Subject</label>
                            </th>
                            <td>
                            	<input type="text" class="bpsfw_tex" name="bpsfw_comman[bpsfw_admin_approve_email_subject]" value="<?php echo esc_attr($bpsfw_comman['bpsfw_admin_approve_email_subject']);?>">
                            	<p>Account approve email subject</p>
                            </td>
                        </tr>
                        <tr>
                            <th>
                            	<label>Account Approve Email message</label>
                            </th>
                            <td>
                            	<textarea class="bpsfw_tex" rows="5" cols="30" name="bpsfw_comman[bpsfw_admin_approve_email_message]"><?php echo esc_attr($bpsfw_comman['bpsfw_admin_approve_email_message']);?></textarea>
                            	<p>Account approve email message</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> 
           
            <div id="bpsfw-tab-user-register-settings" class="tab-content">
            	<div class="postbox-header">
            		<h3>User Register Email Notification</h3>
            	</div>
                <table class="data_table">
                    <tbody>
                        <tr>
                            <th>
                            	<label>User Register Email Notification</label>
                            </th>
                            <td>
                            	<input type="checkbox" name="bpsfw_comman[bpsfw_user_regi_email_notification]" value="yes" <?php if($bpsfw_comman['bpsfw_user_regi_email_notification'] == 'yes'){echo "checked";}?> >
                            	<label>Enable or Disable this setting to send email notification to below email address when new user registerd.</label>
                            </td>
                        </tr>
                        <tr>
                            <th>
                            	<label>Add Email</label>
                            </th>
                            <td>
                            	<input type="text" class="bpsfw_tex" name="bpsfw_comman[bpsfw_user_regi_email]" value="<?php echo esc_attr($bpsfw_comman['bpsfw_user_regi_email']); ?>">
                            	<p>Add ", " between two emails to send multiple email notification.</p>
                            </td>
                        </tr>
                        <tr>
                            <th>
                            	<label>Email Subject</label>
                            </th>
                            <td>
                            	<input type="text" class="bpsfw_tex" name="bpsfw_comman[bpsfw_user_regi_email_subject]" value="<?php echo esc_attr($bpsfw_comman['bpsfw_user_regi_email_subject']);?>">
                            	<p>Customer register email subject</p>
                            </td>
                        </tr>
                        <tr>
                            <th>
                            	<label>Email Message</label>
                            </th>
                            <td>
                            	<input type="text" class="bpsfw_tex" name="bpsfw_comman[bpsfw_user_regi_email_msg]" value="<?php echo esc_attr($bpsfw_comman['bpsfw_user_regi_email_msg']);?>">
                            	<p>Customer register email message</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="submit_button">
                <input type="hidden" name="bpsfw_private_store" value="bpsfw_save_option">
                <input type="submit" value="Save changes" name="submit" class="button-primary" id="bpsfw-btn-space">
            </div>              
        </form>  
    </div>
<?php
}