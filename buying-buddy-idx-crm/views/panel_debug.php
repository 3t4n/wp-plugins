

<div class="card card-outline border-top border-secondary border-opacity-45">
    <div class="card-header bg-secondary bg-opacity-30 border-secondary border-opacity-30">
        <div class="d-flex flex-wrap align-items-center">                                                 	
            <div class="h2 lh-1">
            	Debug Information
            </div>
        </div>
    </div>
	<div class="card-body">
		<div class="body-inner700"> 
            <p class="mt-0">
                Click the blue copy button on the right side to copy these details to your clipboard.
                Add to a help ticket if you are reporting a problem using Buying Buddy on your site.
            </p>
            <div class="d-flex">
               
                <div class="copyme w-100">
                    <h3 class="mb-2">Plugin Version</h3>
                    
                        <?php echo esc_html($plugin_data['Version']);?>
                    
                    <h3 class="mb-2 mt-3">MBB Options</h3>
                
                        Acid: <?php echo esc_html($buyingbuddy_options["acid"]);?><br>
                        Google MAP Key: <?php echo esc_html($buyingbuddy_options["google_map_key"]);?><br>
                        Widget Theme: <?php echo esc_html($buyingbuddy_theme_id);?><br>
                        Disable loading of MBB: <?php echo esc_html($buyingbuddy_options["disable"]);?><br>
                        Disable loading Google Maps library: <?php echo esc_html($buyingbuddy_options["google_map"]);?><br>
                        Only load MBB on these Pages: <?php echo esc_html($buyingbuddy_allowedids);?><br>
                        Enable plugin auto updates: <?php echo esc_html($buyingbuddy_options["auto_updates"]);?><br>
                    
                   <h3 class="mb-2 mt-3">WordPress Details:</h3>
                    
                        WordPress Version: <?php echo esc_html(get_bloginfo('version'));?><br>
                        Active Theme: <?php echo esc_html(get_bloginfo('stylesheet_url'));?><br>

                   <h3 class="mb-2 mt-3">Rewrite Cache: </h3>
                        Last Flushed: <?php echo esc_html(date("Y-m-d H:i:s",$buyingbuddy_options["last_modified"]));?><br>
                        Current Time: <?php echo esc_html(date("Y-m-d H:i:s",time()));?><br>
                        
                   <h3 class="mb-2 mt-3">Active Plugins</h3>
                        <?php echo wp_kses_post($plugin_list); ?>
                </div>
            </div> 
        </div>   
    </div>                                                  
</div>                                                          
