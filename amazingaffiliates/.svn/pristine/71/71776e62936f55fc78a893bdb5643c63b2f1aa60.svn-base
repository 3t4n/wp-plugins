<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php $amazingaffiliates_page = "setup";  ?>

<main
    class="amazingaffiliates_admin_page amazingaffiliates_setup"
    data-ajax="<?php echo esc_url( get_site_url() ); ?>/wp-admin/admin-ajax.php"
    data-nonce="<?php echo esc_attr( wp_create_nonce( 'setup' ) ); ?>"
>

	<nav id="amazingaffiliates_navbar">
		<?php do_action('amazingaffiliates_navbar', $amazingaffiliates_page ); ?>
	</nav>
	
	<?php do_action('amazingaffiliates_setupnotice' ); ?>
	
<br>

	<?php require( AMAZINGAFFILIATES_PLUGIN_URI . '/admin/partials/settings_settings.php' ); ?>
	
	<section style="padding-bottom:1em;<?php 
                if( ! empty( get_option('amazingaffiliates_settings_api_partner_tag') ) AND
                    ! empty( get_option('amazingaffiliates_settings_api_country') ) AND
                    ! empty( get_option('amazingaffiliates_settings_api_accessKey') ) AND
                    ! empty( get_option('amazingaffiliates_settings_api_secretKey') ) ) echo 'border-color:green;border-width:2px;';
                ?>" >
        
        <div class="amazingaffiliates_tab" >
            
            <details 
                <?php 
                if( empty( get_option('amazingaffiliates_settings_api_partner_tag') ) OR
                    empty( get_option('amazingaffiliates_settings_api_country') ) OR
                    empty( get_option('amazingaffiliates_settings_api_accessKey') ) OR
                    empty( get_option('amazingaffiliates_settings_api_secretKey') ) ) echo 'open';
                ?>
            >
                <summary>
                    <div style="width: calc(100% - 20px); top: -18px; right: -18px; position: relative; margin-bottom: -18px;" >
                        <h2 style="margin-top:0;" >Step 1<br><small>Insert your Amazon APIs credentials (they are free in you Amazon Affiliate page)</small></h2>
                        <i>Please notice that Amazing Affiliates does NOT collect this data in ANY way. This data remains on your Wordpress website database and is only needed to contact the Amazon Servers for product information retrieval. Please notice that the API credentials are not a license key for a paid product but the way to connect to Amazon database. They are free and you can find them in you Amazon Affiliate Program personal page.</i><br><br>
                    </div>
                </summary>
                
                <?php $i = 0; ?>
                <div style="padding-bottom:0;">
                    
                    <?php $i = 0; ?>
                    <form method="post" action="options.php">
                        
                        <?php settings_fields( 'amazingaffiliates_settings' ); ?>
                        
                        <?php foreach(array_keys($settings) as $setting_group_key) : ?>
                            
                            <?php if($i++ > 0) continue; ?>
                            
                            <div id="<?php echo esc_attr( $setting_group_key ); ?>" >
                                
                                <p><?php echo esc_html( $settings_groups[$setting_group_key]["desc"] ); ?></p>
                                
                                <div class="form-table">
                                    
                                    <?php $j = 0; ?>
                                    <?php foreach($settings[$setting_group_key] as $setting) : ?>
                                        
                                        <?php $setting_slug = 'amazingaffiliates_settings_' . $setting_group_key . '_' . $setting['name']; ?>
                                            
                                            <?php if($setting["type"] == "separator") : ?>
                                                
                                                <div class="tr" style="border-bottom:1px dotted gray;" >
                                                    <div class="td" scope="row" colspan="3" style="font-size:150%;">
                                                        <?php echo esc_html( $setting["display"] ); ?>
                                                    </div>
                                                </div>
                                                
                                            <?php else : ?>
                                                <?php if($j++ > 0): ?>
                                                    <div class="lineseparator"><div></div></div>
                                                <?php endif; ?>
                                                
                                                <div data-saved-value="<?php echo esc_attr( get_option($setting_slug) ); ?>" class="tr <?php echo esc_attr( $setting_group_key . '_group' ); ?>" >
                                                    <div class="th" scope="row" ><?php echo esc_html( $setting["display"] ); ?></div>
                                                    <div  class="td field" >
                                                        
                                                    <?php
                                                    
                                                    $value = get_option($setting_slug);
                                                    if( empty( $value ) & !empty( $setting["default"] ) ) $value = $setting["default"];
                                                    if( empty( $value ) ) $value = "";
                                                    
                                                    switch ($setting["type"]) : 
                                                        
                                                        case "text":
                                                            echo '<input type="text" name="' . esc_attr( $setting_slug ) . '" value="' . esc_attr( $value ) . '" data-saved-value="' . esc_attr( get_option($setting_slug) ) . '" />';
                                                        break;
                                                        
                                                        case "number":
                                                            echo '<input type="number" name="' . esc_attr( $setting_slug ) . '" value="' . esc_attr( $value ) . '" data-saved-value="' . esc_attr( get_option($setting_slug) ) . '" />';
                                                        break;
                                                        
                                                        case "password":
                                                            echo '<input type="password" name="' . esc_attr( $setting_slug ) . '" value="' . esc_attr( $value ) . '" data-saved-value="' . esc_attr( get_option($setting_slug) ) . '" />';
                                                        break;
                                                        
                                                        case "color":
                                                            echo '<input type="color" name="' . esc_attr( $setting_slug ) . '" value="' . esc_attr( $value ) . '"  data-saved-value="' . esc_attr( get_option($setting_slug) ) . '" />';
                                                        break;
                                                        
                                                        case "textarea":
                                                            echo '<textarea name="' . esc_attr( $setting_slug ) . '" data-saved-value="' . esc_attr( get_option($setting_slug) ) . '" >' . esc_attr( $value ) . '</textarea>';
                                                        break;
                                                        
                                                        case "select":
                                                            echo '<select name="' . esc_attr( $setting_slug ) . '" >';
                                                            foreach($setting["options"] as $setting_option) {
                                                                $selected_status = '';
                                                                if( get_option($setting_slug) == $setting_option["value"] ) {
                                                                    $selected_status = 'selected';
                                                                }
                                                                echo '<option value="' . esc_attr( $setting_option["value"] ) .'" ' . esc_attr( $selected_status ) . '>'
                                                                .	esc_attr( $setting_option["innerText"] )
                                                                .'</option>';
                                                            }
                                                            echo '</select>';
                                                        break;
                                                        
                                                        case "config":
                                                            echo '<select name="' . esc_attr( $setting_slug ) . '" data-saved-value="' . esc_attr( get_option($setting_slug) ) . '" >';
                                                            foreach($setting["options"] as $setting_option) {
                                                                $selected_status = '';
                                                                $current_option = json_decode(get_option($setting_slug));
                                                                if( $current_option->name == $setting_option["name"] ) {
                                                                    $selected_status = 'selected';
                                                                }
                                                                if( $setting_option["name"] == '- SELECT -' ) {
                                                                    echo '<option value="" ' . esc_attr( $selected_status ) . '>' .	esc_attr( $setting_option["name"] ) .'</option>'; 
                                                                }
                                                                else {
                                                                    $valid_value = array( 
                                                                        "name" => $setting_option["name"] , 
                                                                        "amazon_domain" => $setting_option["amazon_domain"] ,  
                                                                        "pa_endpoint" => $setting_option["pa_endpoint"] , 
                                                                        "region" => $setting_option["region"]  
                                                                    );
                                                                    echo '<option value="' . esc_attr( wp_json_encode( $valid_value ) ) .'" ' . esc_attr( $selected_status ) . '>' .	esc_attr( $setting_option["name"] ) .'</option>';
                                                                }
                                                                
                                                            }
                                                            echo '</select>';
                                                        break;
                                                        
                                                        default:
                                                            echo "Invalid Field";
                                                        break;
                                                        
                                                    endswitch; 
                                                    
                                                    ?>
                                                    
                                                    </div>
                                                    
                                                    <?php if( empty($value) ): ?>
                                                        
                                                        <div  class="td desc" style="padding-top:0;">
                                                            <?php echo wp_kses_post( $setting['desc'] ); ?>
                                                        </div>
                                                        
                                                    <?php else: ?>
                                                        
                                                        <div  class="td desc" style="padding:0;"></div>
                                                        
                                                    <?php endif; ?>
                                                    
                                                </div>
                                                
                                            <?php endif; ?>
                                        
                                    <?php endforeach; ?>
                                    
                                </div>
                                
                            </div>
                            
                        <?php endforeach; ?>
                        
                        <?php submit_button(__("Save", "amazingaffiliates"),'primary amazingaffiliates_submit'); ?>
                        
                    </div>
                    
            </details>
                
            </form>
            
        </div>	    
        
	</section>
	
	<br>

    <section style="display:flex;flex-direction:column;justify-content:center; align-items:flex-start;<?php 
                if( get_option('amazingaffiliates_api_test_successful') == 1 ) { echo 'border-color:green;border-width:2px;'; }
					else { echo 'border-color:gold;border-width:2px;'; }
                ?>">
        
        <h2 style="margin:0 0 1em 0;">Step 2<br><small>Checking the connection with the Amazon APIs with your credentials</small></h2>
        <i>In case of failure check the information you have entered or visit the <a target="_blank" href="https://webservices.amazon.it/paapi5/scratchpad/index.html" >Amazon PAAPI5 scratchpad</a> for troubleshooting or leave a <a target="_blank" href="https://wordpress.org/support/plugin/amazingaffiliates/" >support request</a> on the Amazing Affiliates plugin page.</i><br>
        
        <div style="display:flex;margin:1em 0 1em 0; align-items: center;">
            
            <button id="test_api" class="button button-primary amazingaffiliates_submit">Test the APIs</button>
            <p style="margin:0;" id="test_api_result"><?php if( get_option('amazingaffiliates_api_test_successful') == 1 ) echo '<b style="color:green;">APIs already tested</b>'; ?></p>
            
        </div>
        
        <button 
            id="letsStart"
            class="button button-primary amazingaffiliates_submit <?php if( get_option('amazingaffiliates_api_test_successful') != 1 ) echo 'hidden'; ?>"
            style="margin-top:1em;"
            >
            <a  style="color:white;text-decoration:none;" href="<?php echo esc_url( get_admin_url() ); ?>admin.php?page=amazingaffiliates_menu"
                >Let's Start!</a>
        </button>
        
    </section>
	
</main>

<br>