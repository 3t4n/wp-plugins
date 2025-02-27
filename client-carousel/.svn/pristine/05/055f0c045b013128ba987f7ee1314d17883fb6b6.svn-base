<?php
/*
Version: 1.0.0
Author:Creative pig
Author URI: www.creativepig.net
*/
function cpcsetting_menu() 
{
	add_submenu_page( 'edit.php?post_type=cpcarousel', 'Settings', 'Settings', 'manage_options', 'logo-client-carousel', 'client_settings_page', '' );
}

if (is_admin()) 
{
	add_action('admin_menu', 'cpcsetting_menu');
} 


function client_settings_page() {
	
	//print_r($clogo_settings);
	if (isset($_POST['savechanges'])) {
		$parameters = array();
		 $parameters['items'] = $_POST['items'];
		 $parameters['window_open'] = $_POST['window_open'];
		 $parameters['single_item'] = $_POST['single_item'];
		 $parameters['slide_speed'] = $_POST['slide_speed'];
		 $parameters['pagination_speed'] = $_POST['pagination_speed'];
		 $parameters['auto_play'] = $_POST['auto_play'];
		 $parameters['stop_on_hover'] = $_POST['stop_on_hover'];
		 $parameters['navigation'] = $_POST['navigation'];
		 $parameters['pagination'] = $_POST['pagination'];
		 $parameters['hover_style'] = $_POST['hover_style'];
		 $parameters['carousel_style'] = $_POST['carousel_style'];
		 $parameters['button_style'] = $_POST['button_style'];
		 $parameters['box_shadow'] = $_POST['box_shadow'];
		
		//$parameters = serialize($parameters);
		update_option( 'clogo_settings', $parameters );
	echo '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>'.__('Settings saved.').'</strong></p></div>';

	}
	$clogo_settings = get_option('clogo_settings');
	//print_r($clogo_settings);
	 if( isset( $_GET[ 'tab' ] ) ) {  
            $active_tab = $_GET[ 'tab' ];  
        } else {
            $active_tab = 'tab_one';
        }
?>
	<div class="wrap-main">
   <div class="wrap-mid1"> <img src="<?php echo $src=LOGO_IMAGE_URL?>Creativepig-logo.png"/></div>
   <div class="wrap-mid2"><h2 class="inlineh2"><h2><span><?php _e('Client Carousel Setting'); ?> </h2><span style="color:#03C">Version 1.0.0</span>
   <p>Display your clients’ names on your website and attract customers with the all new Client Carousel Plugin.</p>
   </div>
   
    </div>
     <hr />
      <h2 class="nav-tab-wrapper">  
                <a href="?post_type=cpcarousel&page=logo-client-carousel&tab=tab_one" class="nav-tab <?php echo $active_tab == 'tab_one' ? 'nav-tab-active' : ''; ?>">Settings</a>  
                <a href="?post_type=cpcarousel&page=logo-client-carousel&tab=tab_two" class="nav-tab <?php echo $active_tab == 'tab_two' ? 'nav-tab-active' : ''; ?>">Documentation</a>  
            </h2>  
     <?php  if( $active_tab == 'tab_one' ) {  ?>
    <form method="POST">
    			<div id="post-body">
							<div id="post-body-content">
								<div id="normal-sortables" class="meta-box-sortables ui-sortable">
									<div class="postbox">
										
										<div class="inside">
											<table class="form-table">
                                            	<tr valign="top">
													<th scope="row"><?php _e('Number Of Logo'); ?></th>
													<td><input type="text" name="items" id="items" value="<?php echo esc_attr( $clogo_settings['items'] ); ?>" />													<p>Mention the Number of Logos to be displayed in one frame.</p>
                                                    </td>
												</tr>
                                               <tr><th scope="row">Window Open</th><td>	
                                               		<select name="window_open" id="window_open">
                                                   
			<option <?php if($clogo_settings['window_open']=='_self'){echo 'selected';} ?> value="_self">_self</option>
            <option <?php if($clogo_settings['window_open']=='_blank'){echo 'selected';} ?> value="_blank">_blank</option>
		</select>
			<p class="description">Choose between self or blank to display the response in the same frame or in a new tab</p>
</td></tr>
			
            <tr>
            <th scope="row">Slider Speed</th>
            <td><input type="text" id="slide_speed" name="slide_speed" value="<?php echo esc_attr( $clogo_settings['slide_speed'] ); ?>">
			<p class="description">Mention the speed of the slider in numbers</p></td>
            </tr>
            <tr>
            <th scope="row">Pagination Speed</th>
            <td><input type="text" id="pagination_speed" name="pagination_speed" value="<?php echo esc_attr( $clogo_settings['pagination_speed'] ); ?>">
			<p class="description">Mention the pagination speed in numbers</p></td>
            </tr>
            <tr><th scope="row">Auto Play Slider</th><td>	
		<input type="hidden" name="auto_play" value="0" />
		<input type="checkbox" name="auto_play" id="auto_play" value="1"  <?php checked( $clogo_settings['auto_play'], 1, true); ?> />
			<p class="description">Tick or untick to switch on and off to play the auto slider</p>
</td></tr>
<tr><th scope="row">Display Navigation</th><td>	
		<input type="hidden" name="navigation" value="0" />
		<input type="checkbox" name="navigation" id="navigation" value="1"  <?php checked( $clogo_settings['navigation'], 1, true); ?>/>
			<p class="description">Choose to display the next and previous buttons on the slider by ticking the option</p>
</td></tr><tr><th scope="row">Display Pagination</th><td>	
		<input type="hidden" name="pagination" value="0" />
		<input type="checkbox" name="pagination" id="pagination" value="1"  <?php checked( $clogo_settings['pagination'], 1, true); ?>/>
			<p class="description">Choose to display pagination by ticking the option</p>
</td></tr>
<tr><th scope="row">Wrapper Shadow</th><td>	
		<input type="hidden" name="box_shadow" value="0" />
		<input type="checkbox" name="box_shadow" id="box_shadow" value="1"  <?php checked( $clogo_settings['box_shadow'], 1, true); ?> />
			<p class="description">Logo Carousel Wrapper Shadow</p>
</td></tr>
<tr><th scope="row">Carousel Styles</th><td>	
                                               		<select name="carousel_style" id="carousel_style">
                                                 
			<option <?php if($clogo_settings['carousel_style']=='style1'){echo 'selected';} ?> value="style1">with seprator</option>
            <option <?php if($clogo_settings['carousel_style']=='style2'){echo 'selected';} ?> value="style2">Normal</option>
             <option <?php if($clogo_settings['carousel_style']=='style3'){echo 'selected';} ?> value="style3">None</option>
             
		</select>
			<p class="description">Select between a normal / with separators / none carousel style</p>
</td></tr>

            
            <tr><th scope="row">Hover Style</th><td>	
                                               		<select name="hover_style" id="hover_style">
               <option <?php if($clogo_settings['hover_style']=='None'){echo 'selected';} ?> value="None">None</option>                                     
			<option <?php if($clogo_settings['hover_style']=='Grayscale'){echo 'selected';} ?> value="Grayscale">Grayscale</option>
            <option <?php if($clogo_settings['hover_style']=='Grow'){echo 'selected';} ?> value="Grow">Grow</option>
            <option <?php if($clogo_settings['hover_style']=='Bob'){echo 'selected';} ?> value="Bob">Bob</option>
            <option <?php if($clogo_settings['hover_style']=='Shadow'){echo 'selected';} ?> value="Shadow">Box Shadow</option>
           
		</select>
			<p class="description">Choose a Grayscale / Boxed / None Hover Style for the Carousel/ Grow / bob / Box Shadow</p>
</td></tr>

<tr><th scope="row">Button Style</th><td>	
                                               		<select name="button_style" id="button_style">
                                                  
			<option <?php if($clogo_settings['button_style']=='style1'){echo 'selected';} ?> value="style1">style1</option>
            <option <?php if($clogo_settings['button_style']=='style2'){echo 'selected';} ?> value="style2">style2</option>
             <option <?php if($clogo_settings['button_style']=='style3'){echo 'selected';} ?>  value="style3">style3</option>
              <option <?php if($clogo_settings['button_style']=='style4'){echo 'selected';} ?> value="style4">style4</option>
		</select>
			<p class="description">Choose style 1 / style 2 / style 3 / style 4 for the button</p>
</td></tr>
                                                <tr>
                                                <td colspan="2"><input type="submit" name="savechanges" class="button button-primary btn-add-setting-item" value="Save Changes" /></td>
                                                </tr>
                                        </table>
                                        </div>
                                        </div>
                                    </div>
                                   </div>
                                
                         
    </form>
    <?php }elseif( $active_tab == 'tab_two' )  {
?>
<div class="postbox">
<div class="inside">
<h2>Directions to Use:</h2>
<p>After you have successfully downloaded the Client Carousel Plugin, Go to Client Carousel from the<span style="color:#03C"> Admin panel > All Client Carousels > Add Client Carousel > Add New Slide > Upload a Logo Image & URL > Publish to save the clients</span>.</p>
<p>Now that your carousel(s) is (are) ready, you can go to the ‘All Clients Carousels’ where you will find the list of all your client carousels. Here, you will see the Shortcode for each carousel. Copy this code and paste it in the text column of the web page you want and click on ‘update’ to save the changes.</p>

<strong>NOTE: </strong><p>You need to mention the URL in the ‘Add New Slide’ Option if you want to publish the new carousel. If the URL is not mentioned, you will not be able to save / publish the new carousel.<p>
<h2>Features Include:</h2>
<ul type="circle">
<li>Fully Responsive</li>
<li>Customizing Options available in the Settings for Each Carousel you create including Number of Logos, Slider & Pagination Speed, Multiple Carousel Styles, and many more.</li>
<li>Auto Play Slider Available</li>
<li>Light weight Plugin</li>
<li>100% Free</li>
</ul>

<h2>Licenses:</h2>

<p>Client Carousel Plugin is Licensed under MIT and is free to use.</p>


<p>To check out more plugins, Go to <a href="http://www.creativepig.net/plugins">www.creativepig.net/plugins .</a></p>
</div>
</div>
<?php }?>
    </div>
<?php }
?>