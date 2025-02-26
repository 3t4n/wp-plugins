<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://grittechnologies.com
 * @since      1.0.0
 *
 * @package   Grit_Taxonomy_Filter
 * @subpackage Grit_Taxonomy_Filter/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <form method="post" name="cleanup_options" action="options.php">
	
	
	<?php
        //Grab all options
        $options = get_option($this->plugin_name);

        // Cleanup
        
        $post_type = $options['post_type'];
		$taxonomy_name = $options['taxonomy_name'];
    ?>

    <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
    ?>

	
	

   

     
       
        <!-- Add setting terms -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Add taxonomy name(Write only "category" for default categories) and post type(Write only "post" if you are using for default posts)', $this->plugin_name); ?></span></legend>
           
                    <fieldset>
                        <p>Add post type </p>
                        <legend class="screen-reader-text"><span><?php _e('Post Type(Write only "post" if you are using for default posts)', $this->plugin_name); ?></span></legend>
                        <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-post_type" name="<?php echo $this->plugin_name; ?>[post_type]" value="<?php if(!empty($post_type)) echo $post_type; ?>"/>
                    </fieldset>
					
					
					 <fieldset>
                        <p>Add  taxonomy name </p>
                        <legend class="screen-reader-text"><span><?php _e('Taxonomy name(Write only "category" for default categories)', $this->plugin_name); ?></span></legend>
                        <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-taxonomy_name" name="<?php echo $this->plugin_name; ?>[taxonomy_name]" value="<?php if(!empty($taxonomy_name)) echo $taxonomy_name; ?>"/>
                    </fieldset>
					
					
        </fieldset>


		



           <?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>


    </form>
	
        <fieldset>
		
		<h3>Use shortcode [GRITFILTER] in your posts or pages.</h3>
		
		</fieldset>

</div>
</div>	
