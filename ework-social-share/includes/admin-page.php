<?php
function ewsp_options_page()
{

	global $ewsp_options;

	ob_start(); ?>
	<div class="wrap">
		<h2><?php _e('Ework Social Share','ewsp_domain');?></h2>
		
		<form method="POST" action="options.php">
			<?php settings_fields('ewsp_settings_group');?>
                    
                        <h4><?php _e('Enable','ewsp_domain');?></h4>
                        <p>
                            <input id="ewsp_settings[enable]" name="ewsp_settings[enable]" type="checkbox" value="1" <?php checked('1',$ewsp_options['enable']);?> />
                            <label class="description" for="ewsp_settings[enable]"><?php _e('Display the Social Icons','ewsp_domain');?></label>
                            
                        </p>
                        
                        <h4><?php _e('Position','ewsp_domain');?></h4>
                        <p>
                            <input id="ewsp_settings[position]" name="ewsp_settings[position]" type="checkbox" value="1" <?php checked('1',$ewsp_options['position']);?> />
                            <label class="description" for="ewsp_settings[position]"><?php _e('After page/post title','ewsp_domain');?></label>
                            
                        </p>
                        <p>
                            <input id="ewsp_settings[positionsec]" name="ewsp_settings[positionsec]" type="checkbox" value="1" <?php checked('1',$ewsp_options['positionsec']);?> />
                            <label class="description" for="ewsp_settings[positionsec]"><?php _e('After page/post Content','ewsp_domain');?></label>
                            
                        </p>
                        
                        <h4><?php _e('Selection Area','ewsp_domain');?></h4>
                        <p>
                            <input id="ewsp_settings[area]" name="ewsp_settings[area]" type="checkbox" value="1" <?php checked('1',$ewsp_options['area']);?> />
                            <label class="description" for="ewsp_settings[area]"><?php _e('On single page/posts only','ewsp_domain');?></label>
                            
                        </p>
                        
                        <p>
                            <input id="ewsp_settings[both]" name="ewsp_settings[both]" type="checkbox" value="1" <?php checked('1',$ewsp_options['both']);?> />
                            <label class="description" for="ewsp_settings[both]"><?php _e('Both on all page and posts','ewsp_domain');?></label>
                            
                        </p>
                        <h4><?php _e('Share button options','ewsp_domain');?></h4>
                        <p>
                            <input id="ewsp_settings[twitter]" name="ewsp_settings[twitter]" type="checkbox" value="1" <?php checked('1',$ewsp_options['twitter']);?> />
                            <label class="description" for="ewsp_settings[twitter]"><?php _e('Twitter button','ewsp_domain');?></label>
                            
                        </p>
                        <p>
                            <input id="ewsp_settings[facebook]" name="ewsp_settings[facebook]" type="checkbox" value="1" <?php checked('1',$ewsp_options['facebook']);?> />
                            <label class="description" for="ewsp_settings[facebook]"><?php _e('Facebook Like button','ewsp_domain');?></label>
                            
                        </p>
                        <p>
                            <input id="ewsp_settings[linkedin]" name="ewsp_settings[linkedin]" type="checkbox" value="1" <?php checked('1',$ewsp_options['linkedin']);?> />
                            <label class="description" for="ewsp_settings[linkedin]"><?php _e('Linkedin Share button','ewsp_domain');?></label>
                            
                        </p>
                        <p>
                            <input id="ewsp_settings[googleplus]" name="ewsp_settings[googleplus]" type="checkbox" value="1" <?php checked('1',$ewsp_options['googleplus']);?> />
                            <label class="description" for="ewsp_settings[googleplus]"><?php _e('Google Plus Share button','ewsp_domain');?></label>
                            
                        </p>
                        
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Options','ewsp_domain');?>" />
			</p>
		</form>
	</div>
<?php
echo ob_get_clean();
}

function ewsp_add_options_page()
{
	add_options_page('Ework Social Share Plugin','Ework social share','manage_options','ewsp-options','ewsp_options_page');

}

add_action('admin_menu','ewsp_add_options_page');

function ewsp_register_settings()
{
	register_setting('ewsp_settings_group','ewsp_settings');
}
add_action('admin_init','ewsp_register_settings');
?>