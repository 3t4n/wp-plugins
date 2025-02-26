<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.2803media.fr/
 * @since      1.0.0
 *
 * @package    Wp_Scsb
 * @subpackage Wp_Scsb/admin/partials
 */
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2 class="">Simple social sharing buttons settings</h2>
    <br />
    <form method="post" name="cleanup_options" action="options.php">

    <?php
        //Grab all options
        $options = get_option($this->plugin_name);

        //print_r($options);
        
		$sortraw = $options['sort'];
		$sort = array_flip(explode(',',$sortraw));
		//print_r($sort);
		
        $facebook = $options['network']['facebook'];
        $twitter = $options['network']['twitter'];
        $linkedin = $options['network']['linkedin'];
        $googleplus = $options['network']['google-plus'];
        $pinterest = $options['network']['pinterest'];
        $whatsapp = $options['network']['whatsapp'];
        
        $name_facebook = $options['name']['facebook'];
        $name_twitter = $options['name']['twitter'];
        $name_linkedin = $options['name']['linkedin'];
        $name_googleplus = $options['name']['google-plus'];
        $name_pinterest = $options['name']['pinterest'];
        $name_whatsapp = $options['name']['whatsapp'];
        
		$twitter_username = $options['twitter']['username'];
		
		$text_before_buttons = $options['text_before_buttons'];
		$display_counter = $options['display_counter'];
		$display_counter_total = $options['display_counter_total'];
		$display_counter_total_text = $options['display_counter_total_text'];
		$update_counter_minutes = $options['update_counter_minutes'];
		$count_number_format = $options['count_number_format'];
		
        $forme = $options['scsb_forme'];
        $round = $options['scsb_round'];
        $size = $options['scsb_size'];
        $icon = $options['scsb_icon'];
        $background = $options['scsb_background'];
        $hover = $options['scsb_hover'];

        $before = $options['location']['before'];
        $after = $options['location']['after'];
        $onpost = $options['where']['post'];
        $onpage = $options['where']['page'];
        $onhome = $options['where']['home'];
        
    ?>

    <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
    ?>

	<input id="sort_social_network" name="<?php echo $this->plugin_name; ?>[sort_social_network]" type="hidden" value="<?php echo $sortraw; ?>">
       
	<div id="socialnetwork">	
    <h2 class="rubrique"><?php _e( 'Choose the social networks', 'wp-scsb' ); ?></h2>    
    <ul id="sortable">
	<!-- Facebook -->
    <li id="sort_facebook" data-position="<?php echo $sort['sort_facebook']; ?>"><fieldset>
        <label for="<?php echo $this->plugin_name; ?>-facebook">
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-facebook" name="<?php echo $this->plugin_name; ?>[facebook]" value="1" <?php checked($facebook, 1); ?> />
            <span><i class="fa fa-facebook"></i> <?php esc_attr_e('Facebook', $this->plugin_name); ?></span><i class="fa fa-arrows-alt"></i>
        </label>
    </fieldset>
    </li>
		
    <!-- Twitter -->
    <li id="sort_twitter" data-position="<?php echo $sort['sort_twitter']; ?>"><fieldset>
        <label for="<?php echo $this->plugin_name; ?>-twitter">
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-twitter" name="<?php echo $this->plugin_name; ?>[twitter]" value="1" <?php checked($twitter, 1); ?> />
            <span><i class="fa fa-twitter"></i> <?php esc_attr_e('Twitter', $this->plugin_name); ?></span><i class="fa fa-arrows-alt"></i>
        </label>
    </fieldset>
    </li>
		
    <!-- linkedin -->
    <li id="sort_linkedin" data-position="<?php echo $sort['sort_linkedin']; ?>"><fieldset>
        <label for="<?php echo $this->plugin_name; ?>-linkedin">
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-linkedin" name="<?php echo $this->plugin_name; ?>[linkedin]" value="1" <?php checked($linkedin, 1); ?> />
            <span><i class="fa fa-linkedin"></i> <?php esc_attr_e('Linkedin', $this->plugin_name); ?></span><i class="fa fa-arrows-alt"></i>
        </label>
    </fieldset>
    </li>
	
    <!-- Google+ -->
    <li id="sort_google-plus" data-position="<?php echo $sort['sort_google-plus']; ?>"><fieldset>
        <label for="<?php echo $this->plugin_name; ?>-google-plus">
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-google-plus" name="<?php echo $this->plugin_name; ?>[google-plus]" value="1" <?php checked($googleplus, 1); ?> />
            <span><i class="fa fa-google-plus"></i> <?php esc_attr_e('Google+', $this->plugin_name); ?></span><i class="fa fa-arrows-alt"></i>
        </label>
    </fieldset>
    </li>

    <!-- Pinterest -->
    <li id="sort_pinterest" data-position="<?php echo $sort['sort_pinterest']; ?>"><fieldset>
        <label for="<?php echo $this->plugin_name; ?>-pinterest">
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-pinterest" name="<?php echo $this->plugin_name; ?>[pinterest]" value="1" <?php checked($pinterest, 1); ?> />
            <span><i class="fa fa-pinterest"></i> <?php esc_attr_e('Pinterest', $this->plugin_name); ?></span><i class="fa fa-arrows-alt"></i>
        </label>
    </fieldset>
    </li>

    <!-- Whatsapp 
    <li id="sort_whatsapp" data-position="<?php echo $sort['sort_whatsapp']; ?>"><fieldset>
        <label for="<?php echo $this->plugin_name; ?>-whatsapp">
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-whatsapp" name="<?php echo $this->plugin_name; ?>[whatsapp]" value="1" <?php checked($whatsapp, 1); ?> />
            <span><i class="fa fa-whatsapp"></i> <?php esc_attr_e('whatsapp', $this->plugin_name); ?></span><i class="fa fa-arrows-alt"></i>
        </label>
    </fieldset>
    </li> -->
	</ul>
	</div>
		
    <hr>    
    <h2 class="rubrique"><?php _e( 'Forms of buttons', 'wp-scsb' ); ?></h2>    
    <fieldset class="fieldset">
            <input type= "radio" id="<?php echo $this->plugin_name; ?>-scsb_rectangle" name="<?php echo $this->plugin_name; ?>[scsb_forme]" value="scsb_rectangle" <?php checked($forme, 'scsb_rectangle'); ?>> <a class="scsb_rectangle scsb_x2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <input type= "radio" id="<?php echo $this->plugin_name; ?>-scsb_square" name="<?php echo $this->plugin_name; ?>[scsb_forme]" value="scsb_square" <?php checked($forme, 'scsb_square'); ?>> <a class="scsb_rectangle scsb_x2">&nbsp;&nbsp;</a>
            <input type= "radio" id="<?php echo $this->plugin_name; ?>-scsb_circle" name="<?php echo $this->plugin_name; ?>[scsb_forme]" value="scsb_circle" <?php checked($forme, 'scsb_circle'); ?>> <a class="scsb_circleadmin scsb_x2">&nbsp;&nbsp;</a>
			<input type= "radio" id="<?php echo $this->plugin_name; ?>-scsb_noborder" name="<?php echo $this->plugin_name; ?>[scsb_forme]" value="scsb_noborder" <?php checked($forme, 'scsb_noborder'); ?>> <?php _e( 'icon without border', 'wp-scsb' ); ?>
    <hr>    
    </fieldset>    
    
	<div id="textebouton">	
	<h2 class="rubrique"><?php _e( 'Buttons text', 'wp-scsb' ); ?></h2>    
        
    <fieldset id="<?php echo $this->plugin_name; ?>-name_facebook-fieldset">
            <span class="input"><?php esc_attr_e('Facebook', $this->plugin_name); ?></span>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-name_facebook" name="<?php echo $this->plugin_name; ?>[name_facebook]" value="<?php if(isset($name_facebook)){ echo $name_facebook;} else {echo 'Facebook';} ?>"/>
    </fieldset>
    
    <fieldset id="<?php echo $this->plugin_name; ?>-name_twitter-fieldset">
            <span class="input"><?php esc_attr_e('Twitter', $this->plugin_name); ?></span>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-name_twitter" name="<?php echo $this->plugin_name; ?>[name_twitter]" value="<?php if(isset($name_twitter)){ echo $name_twitter;} else {echo 'Twitter';} ?>"/>
    </fieldset>
    
    <fieldset id="<?php echo $this->plugin_name; ?>-name_linkedin-fieldset">
            <span class="input"><?php esc_attr_e('Linkedin', $this->plugin_name); ?></span>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-name_linkedin" name="<?php echo $this->plugin_name; ?>[name_linkedin]" value="<?php if(isset($name_linkedin)){ echo $name_linkedin;} else {echo 'Linkedin';} ?>"/>
    </fieldset>
    
    <fieldset id="<?php echo $this->plugin_name; ?>-name_googleplus-fieldset">
            <span class="input"><?php esc_attr_e('Google+', $this->plugin_name); ?></span>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-name_googleplus" name="<?php echo $this->plugin_name; ?>[name_googleplus]" value="<?php if(isset($name_googleplus)){ echo $name_googleplus;} else {echo 'Google+';} ?>"/>
    </fieldset>
    
    <fieldset id="<?php echo $this->plugin_name; ?>-name_pinterest-fieldset">
            <span class="input"><?php esc_attr_e('Pinterest', $this->plugin_name); ?></span>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-name_pinterest" name="<?php echo $this->plugin_name; ?>[name_pinterest]" value="<?php if(isset($name_pinterest)){ echo $name_pinterest;} else {echo 'Pinterest';} ?>"/>
    </fieldset>
    
    <fieldset id="<?php echo $this->plugin_name; ?>-name_whatsapp-fieldset">
            <span class="input"><?php esc_attr_e('Whatsapp', $this->plugin_name); ?></span>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-name_whatsapp" name="<?php echo $this->plugin_name; ?>[name_whatsapp]" value="<?php if(isset($name_whatsapp)){ echo $name_whatsapp;} else {echo 'Whatsapp';} ?>"/>
    </fieldset>
    
	<br /><hr>    
    </div>
	
	<div id="coinarrondi">	
	<h2  class="rubrique"><?php _e( 'Corners style', 'wp-scsb' ); ?></h2>    
    <fieldset class="fieldset">
            <input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_round]" value="scsb_round" <?php checked($round, 'scsb_round'); ?>> <a class="scsb_rectangle scsb_round scsb_x2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_round]" value="scsb_noround" <?php checked($round, 'scsb_noround'); ?>> <?php _e( 'none', 'wp-scsb' ); ?>
            
            
    <br /><hr>    
    </fieldset>
    </div>	
    
    <h2 class="rubrique"><?php _e( 'Size', 'wp-scsb' ); ?></h2>    
    <br />
    <fieldset class="fieldset">
            <input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_size]" value="scsb_x1" <?php checked($size, 'scsb_x1'); ?>> <a class="scsb_rectangle scsb_x1 " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_size]" value="scsb_x2" <?php checked($size, 'scsb_x2'); ?>> <a class="scsb_rectangle scsb_x2 ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_size]" value="scsb_x3" <?php checked($size, 'scsb_x3'); ?>> <a class="scsb_rectangle scsb_x3 ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            
    <hr>    
    </fieldset>
        
    <div id="icon" >	
	<h2 class="rubrique"><?php _e( 'Icon of social network', 'wp-scsb' ); ?></h2>   
    <fieldset class="fieldset">
            <input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_icon]" value="scsb_icon" <?php checked($icon, 'scsb_icon'); ?>> <a class="scsb_btnz scsb_facebook scsb_round scsb_x2"><i class="fa fa-facebook"></i> <?php if(!empty($name_facebook)){ echo $name_facebook;} else {echo 'Facebook';} ?></a>
            <input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_icon]" value="scsb_noicon" <?php checked($icon, 'scsb_noicon'); ?>> <a class="scsb_btnz scsb_facebook scsb_round scsb_x2"><?php if(!empty($name_facebook)){ echo $name_facebook;} else {echo 'Facebook';} ?></a>
            
    <br /><hr>    
    </fieldset>   
    </div>	
        
    <h2 class="rubrique"><?php _e( 'Background color', 'wp-scsb' ); ?></h2>  
    <fieldset class="fieldset">
            
		<span id="backplein">	
			<span id="<?php echo $this->plugin_name; ?>-scsb_officialcolor"><input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_background]" value="scsb_officialcolor" <?php checked($background, 'scsb_officialcolor'); ?>> <a class="scsb_btnz scsb_facebook scsb_round scsb_x2"><i class="fa fa-facebook"></i> <?php _e( 'Social color', 'wp-scsb' ); ?></a></span>
            
			<span id="<?php echo $this->plugin_name; ?>-scsb_grey"><input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_background]" value="scsb_grey" <?php checked($background, 'scsb_grey'); ?>> <a class="scsb_btnz scsb_grey scsb_round scsb_x2"><i class="fa fa-facebook"></i> <?php _e( 'Grey', 'wp-scsb' ); ?></a></span>
            	
			<span id="<?php echo $this->plugin_name; ?>-scsb_dark"><input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_background]" value="scsb_dark" <?php checked($background, 'scsb_dark'); ?>> <a class="scsb_btnz scsb_dark scsb_round scsb_x2"><i class="fa fa-facebook"></i> <?php _e( 'Dark', 'wp-scsb' ); ?></a></span>
		</span>
		<span id="backnone">	
			<span id="<?php echo $this->plugin_name; ?>-scsb_noback_social"><input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_background]" value="scsb_noback_social" <?php checked($background, 'scsb_noback_social'); ?>><a class="scsb_btnz scsb_noback_social_pinterest scsb_x3"><i class="fa fa-pinterest"></i></a><?php _e( 'Social icon', 'wp-scsb' ); ?>&nbsp;&nbsp;</span>
            
			<span id="<?php echo $this->plugin_name; ?>-scsb_noback_dark"><input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_background]" value="scsb_noback_dark" <?php checked($background, 'scsb_noback_dark'); ?>> <a class="scsb_btnz scsb_noback_dark scsb_x3"><i class="fa fa-pinterest"></i></a><?php _e( 'Dark icon', 'wp-scsb' ); ?>&nbsp;&nbsp;</span>
        </span>
		  
    </fieldset>    
    
    <br /><hr>    
    <h2 class="rubrique"><?php _e( 'Hover color', 'wp-scsb' ); ?></h2>    
    <fieldset class="fieldset">
		<span id="backpleinhover">	
		    <span id="<?php echo $this->plugin_name; ?>-scsb_socialhover"><input type= "radio" id="<?php echo $this->plugin_name; ?>-scsb_socialhover" name="<?php echo $this->plugin_name; ?>[scsb_hover]" value="scsb_socialhover" <?php checked($hover, 'scsb_socialhover'); ?>> <a class="scsb_btnz scsb_grey scsb_round scsb_facebook_hover scsb_x2"><i class="fa fa-facebook"></i> <?php _e( 'Social color', 'wp-scsb' ); ?></a></span>
            
			<span id="<?php echo $this->plugin_name; ?>-scsb_hover"><input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_hover]" value="scsb_hover" <?php checked($hover, 'scsb_hover'); ?>> <a class="scsb_btnz scsb_facebook scsb_round scsb_hover scsb_x2"><i class="fa fa-facebook"></i> <?php _e( 'Grey', 'wp-scsb' ); ?></a></span>
            
			<span id="<?php echo $this->plugin_name; ?>-scsb_greyhover"><input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_hover]" value="scsb_greyhover" <?php checked($hover, 'scsb_greyhover'); ?>> <a class="scsb_btnz scsb_facebook scsb_round scsb_greyhover scsb_x2"><i class="fa fa-facebook"></i><?php _e( 'Dark', 'wp-scsb' ); ?></a></span>
        </span>
		<span id="backnonehover">	
			<span id="<?php echo $this->plugin_name; ?>-scsb_noback_social_hover"><input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_hover]" value="scsb_noback_social_hover" <?php checked($hover, 'scsb_noback_social_hover'); ?>> <a class="scsb_btnz scsb_noback_dark scsb_facebook scsb_round scsb_noback_social_hover_pinterest scsb_x3"><i class="fa fa-pinterest"></i></a><?php _e( 'Social icon', 'wp-scsb' ); ?>&nbsp;&nbsp;</span>
            
			<span id="<?php echo $this->plugin_name; ?>-scsb_noback_dark_hover"><input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_hover]" value="scsb_noback_dark_hover" <?php checked($hover, 'scsb_noback_dark_hover'); ?>> <a class="scsb_btnz scsb_noback_social_pinterest scsb_noback_dark_hover scsb_round scsb_x3"><i class="fa fa-pinterest"></i></a><?php _e( 'Dark icon', 'wp-scsb' ); ?>&nbsp;&nbsp;</span>
            
			<span id="<?php echo $this->plugin_name; ?>-scsb_nohover"><input type= "radio" name="<?php echo $this->plugin_name; ?>[scsb_hover]" value="scsb_nohover" <?php checked($hover, 'scsb_nohover'); ?>> <?php _e( 'none', 'wp-scsb' ); ?></span>
        </span>
		   
			
    </fieldset>    
     
	<div id="textbeforebuttons">	
	<br /><hr>    
   	<h2 class="rubrique"><?php _e( 'Text before buttons', 'wp-scsb' ); ?></h2>    
        
    <fieldset>
            <span class="input"><?php esc_attr_e('Text before buttons, default none', $this->plugin_name); ?></span>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-text_before_buttons" name="<?php echo $this->plugin_name; ?>[text_before_buttons]" value="<?php if(!empty($text_before_buttons)){ echo $text_before_buttons;} else {echo '';} ?>"/>
    </fieldset>
    </div>
		
		
	<div id="counter">	
	<br /><hr>    
   	<h2 class="rubrique"><?php _e( 'Display counter', 'wp-scsb' ); ?></h2>    
        
    <fieldset>
            <div class="toggle" data-checkbox="<?php echo $this->plugin_name; ?>-display_counter"></div><input type="checkbox" id="<?php echo $this->plugin_name; ?>-display_counter" name="<?php echo $this->plugin_name; ?>[display_counter]" value="1" <?php checked($display_counter, 1); ?> />
            <span><?php esc_attr_e('Display counter', $this->plugin_name); ?></span>
    </fieldset>
		<div id="showcounter">
		<hr>
			<fieldset>
					<span class="input"><?php esc_attr_e('Update counter each x minutes', $this->plugin_name); ?></span>
					<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-update_counter_minutes" name="<?php echo $this->plugin_name; ?>[update_counter_minutes]" value="<?php if(!empty($update_counter_minutes)){ echo $update_counter_minutes;} else {echo '30';} ?>"/>
			</fieldset>
			<fieldset>
					<div class="toggle" data-checkbox="<?php echo $this->plugin_name; ?>-display_counter_total"></div><input type="checkbox" id="<?php echo $this->plugin_name; ?>-display_counter_total" name="<?php echo $this->plugin_name; ?>[display_counter_total]" value="1" <?php checked($display_counter_total, 1); ?> />
					<span><?php esc_attr_e('Display total counter', $this->plugin_name); ?></span>
			</fieldset>
			<fieldset>
					<span class="input"><?php esc_attr_e('Text for total', $this->plugin_name); ?></span>
					<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-display_counter_total_text" name="<?php echo $this->plugin_name; ?>[display_counter_total_text]" value="<?php if(!empty($display_counter_total_text)){ echo $display_counter_total_text;} else {echo 'SHARES';} ?>"/>
			</fieldset>	
			<fieldset class="fieldset">
					<span class="input"><?php esc_attr_e('Numbers format', $this->plugin_name); ?></span>
					<input type= "radio" name="<?php echo $this->plugin_name; ?>[count_number_format]" value="classic" <?php checked($count_number_format, 'classic'); ?>> 100, 1 000, 100 000
					<input type= "radio" name="<?php echo $this->plugin_name; ?>[count_number_format]" value="condensed" <?php checked($count_number_format, 'condensed'); ?>> 100, 1k, 100k, 1M
			<hr>    
			</fieldset>	
			<p><?php esc_attr_e('To enable twitter counter please add your website at http://newsharecounts.com/', $this->plugin_name); ?></p>	
		</div>
    </div>	
		
	<div id="textetwitter">	
	<br /><hr>    
   	<h2 class="rubrique"><i class="fa fa-twitter"></i> <?php _e( 'Twitter options', 'wp-scsb' ); ?></h2>    
        
    <fieldset>
            <span class="input"><?php esc_attr_e('Twitter username if you want a "via" mention', $this->plugin_name); ?></span>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-twitter_username" name="<?php echo $this->plugin_name; ?>[twitter_username]" value="<?php if(!empty($twitter_username)){ echo $twitter_username;} else {echo '';} ?>"/>
    </fieldset>
    </div>	
		
    <br /><hr>    
    <h2 class="rubrique"><?php _e( 'Location of buttons', 'wp-scsb' ); ?></h2>    
    <fieldset>
        <label for="<?php echo $this->plugin_name; ?>-location">
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-before" name="<?php echo $this->plugin_name; ?>[before]" value="1" <?php checked($before, 1); ?> />
            <span><?php esc_attr_e('Before content', $this->plugin_name); ?></span>
        </label>
    </fieldset>
	<fieldset>
        <label for="<?php echo $this->plugin_name; ?>-location">
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-after" name="<?php echo $this->plugin_name; ?>[after]" value="1" <?php checked($after, 1); ?> />
            <span><?php esc_attr_e('After content', $this->plugin_name); ?></span>
        </label>
    </fieldset>
		
	<br /><hr>    
    <h2 class="rubrique"><?php _e( 'Where to display buttons', 'wp-scsb' ); ?></h2>    
    <fieldset>
        <label for="<?php echo $this->plugin_name; ?>-where">
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-post" name="<?php echo $this->plugin_name; ?>[post]" value="1" <?php checked($onpost, 1); ?> />
            <span><?php esc_attr_e('Posts', $this->plugin_name); ?></span>
        </label>
    </fieldset>
	<fieldset>
        <label for="<?php echo $this->plugin_name; ?>-where">
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-page" name="<?php echo $this->plugin_name; ?>[page]" value="1" <?php checked($onpage, 1); ?> />
            <span><?php esc_attr_e('Pages', $this->plugin_name); ?></span>
        </label>
    </fieldset>	
	<fieldset>
        <label for="<?php echo $this->plugin_name; ?>-where">
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-home" name="<?php echo $this->plugin_name; ?>[home]" value="1" <?php checked($onhome, 1); ?> />
            <span><?php esc_attr_e('Home (works if your theme display full post)', $this->plugin_name); ?></span>
        </label>
    </fieldset>		
	    
    <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

    </form>

</div>
<script>
if(jQuery('#wp-scsb-display_counter').is(':checked')){
	jQuery('#showcounter').show();
} else {
	jQuery('#showcounter').hide();	
}
jQuery('#wp-scsb-display_counter').change(function() {
	if(jQuery('#wp-scsb-display_counter').is(':checked')){
		jQuery('#showcounter').show();
	} else {
	jQuery('#showcounter').hide();	
}
})
</script>