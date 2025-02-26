<!-- Title Field -->
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Widget Title:' , 'ts_hvrbrd'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<!-- IGDB Api Key Field -->
<p>
	<label for="<?php echo $this->get_field_id( 'api' ); ?>"><?php esc_html_e( 'IGDB API Key:' , 'ts_hvrbrd'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'api' ); ?>" name="<?php echo $this->get_field_name( 'api' ); ?>" type="password" value="<?php echo esc_attr( $api ); ?>" />
</p>


<!-- Filter by Platform field -->
<p>
    <label for="<?php echo $this->get_field_id( 'platform' ); ?>"><?php esc_html_e( 'Filter by Platform:' , 'ts_hvrbrd'); ?></label>

    <select name="<?php echo $this->get_field_name('platform'); ?>" id="<?php echo $this->get_field_id('platform'); ?>" class="widefat">
        <option value="0"<?php selected( $platform, '0' ); ?>><?php _e('All'); ?></option>
        <?php 
        	$options=$this->get_platforms($api); 
        	if($this->validarr($options)){
        		foreach($options as $key=>$name){
                    echo '<option value="'.$key.'" '.selected($platform,$key).' >'.$name.'</option>';
                }
        	}
        ?>
    </select>
    
</p>

<!-- Filter by franchise field -->

    <label for="<?php echo $this->get_field_id( 'franchises' ); ?>"><?php esc_html_e( 'Filter by Franchise:' , 'ts_hvrbrd'); ?></label>

    <select name="<?php echo $this->get_field_name('franchises'); ?>" id="<?php echo $this->get_field_id('franchises'); ?>" class="widefat">
        <option value="0"<?php selected( $franchises, '0' ); ?>><?php _e('All'); ?></option>
        <?php 
        	$options=$this->get_franchises($api); 
        	if($this->validarr($options)){
        		foreach($options as $key=>$name){
                    echo '<option value="'.$key.'" '.selected($franchises,$key).' >'.$name.'</option>';
                }
        	}
        ?>
    </select>
    
</p>

<!-- Filter by game modes -->

    <label for="<?php echo $this->get_field_id( 'game_modes' ); ?>"><?php esc_html_e( 'Filter by Game Modes:' , 'ts_hvrbrd'); ?></label>

    <select name="<?php echo $this->get_field_name('game_modes'); ?>" id="<?php echo $this->get_field_id('game_modes'); ?>" class="widefat">
        <option value="0"<?php selected( $game_modes, '0' ); ?>><?php _e('All'); ?></option>
        <?php 
        	$options=$this->get_game_modes($api); 
        	if($this->validarr($options)){
        		foreach($options as $key=>$name){
                    echo '<option value="'.$key.'" '.selected($game_modes,$key).' >'.$name.'</option>';
                }
        	}
        ?>
    </select>
    
</p>


<!-- Filter by game engines -->

    <label for="<?php echo $this->get_field_id( 'game_engines' ); ?>"><?php esc_html_e( 'Filter by Game Engines:' , 'ts_hvrbrd'); ?></label>

    <select name="<?php echo $this->get_field_name('game_engines'); ?>" id="<?php echo $this->get_field_id('game_engines'); ?>" class="widefat">
        <option value="0"<?php selected( $game_engines, '0' ); ?>><?php _e('All'); ?></option>
        <?php 
        	$options=$this->get_game_engines($api); 
        	if($this->validarr($options)){
        		foreach($options as $key=>$name){
                    echo '<option value="'.$key.'" '.selected($game_engines,$key).' >'.$name.'</option>';
                }
        	}
        ?>
    </select>
    
</p>


<!-- Filter by companies field -->

    <label for="<?php echo $this->get_field_id( 'companies' ); ?>"><?php esc_html_e( 'Filter by Company:' , 'ts_hvrbrd'); ?></label>

    <select name="<?php echo $this->get_field_name('companies'); ?>" id="<?php echo $this->get_field_id('companies'); ?>" class="widefat">
        <option value="0"<?php selected( $companies, '0' ); ?>><?php _e('All'); ?></option>
        <?php 
        	$options=$this->get_companies($api); 
        	if($this->validarr($options)){
        		foreach($options as $key=>$name){
                    echo '<option value="'.$key.'" '.selected($companies,$key).' >'.$name.'</option>';
                }
        	}
        ?>
    </select>
    
</p>

<!-- Filter by genres field -->

    <label for="<?php echo $this->get_field_id( 'genres' ); ?>"><?php esc_html_e( 'Filter by Genre:' , 'ts_hvrbrd'); ?></label>

    <select name="<?php echo $this->get_field_name('genres'); ?>" id="<?php echo $this->get_field_id('genres'); ?>" class="widefat">
        <option value="0"<?php selected( $genres, '0' ); ?>><?php _e('All'); ?></option>
        <?php 
        	$options=$this->get_genres($api); 
        	if($this->validarr($options)){
        		foreach($options as $key=>$name){
                    echo '<option value="'.$key.'" '.selected($genres,$key).' >'.$name.'</option>';
                }
        	}
        ?>
    </select>
    
</p>

<!-- Game Order -->
<p>
    <label for="<?php echo $this->get_field_id( 'game_release' ); ?>"><?php esc_html_e( 'Game Order:' , 'ts_hvrbrd'); ?></label>
    <select name="<?php echo $this->get_field_name('game_release'); ?>" id="<?php echo $this->get_field_id('game_release'); ?>" class="widefat">
        <option value="0"<?php selected( $game_release, '0' ); ?>><?php _e('Ascending'); ?></option>
        <option value="1"<?php selected( $game_release, '1' ); ?>><?php _e('Descending'); ?></option>
    </select>
</p> 

<!-- Select Release Day Period -->
<p>
    <label for="<?php echo $this->get_field_id( 'release_day' ); ?>"><?php esc_html_e( 'Filter by release date:' , 'ts_hvrbrd'); ?></label>
    <select name="<?php echo $this->get_field_name('release_day'); ?>" id="<?php echo $this->get_field_id('release_day'); ?>" class="widefat">
        <option value="0"<?php selected( $release_day, '0' ); ?>><?php _e('All'); ?></option>
        <option value="1"<?php selected( $release_day, '1' ); ?>><?php _e('Current Day'); ?></option>
        <option value="1"<?php selected( $release_day, '07' ); ?>><?php _e('Past 7 days'); ?></option>
        <option value="1"<?php selected( $release_day, '014' ); ?>><?php _e('Past 14 days'); ?></option>
        <option value="7"<?php selected( $release_day, '7' ); ?>><?php _e('Next 7 days'); ?></option>
		<option value="14"<?php selected( $release_day, '14' ); ?>><?php _e('Next 14 Days'); ?></option>
		<option value="21"<?php selected( $release_day, '21' ); ?>><?php _e('Next 21 Days'); ?></option>
        <option value="30"<?php selected( $release_day, '30' ); ?>><?php _e('Next 30 days'); ?></option>
		<option value="60"<?php selected( $release_day, '60' ); ?>><?php _e('Next 60 days'); ?></option>
		 <option value="90"<?php selected( $release_day, '90' ); ?>><?php _e('Next 90 days'); ?></option>
        <option value="365"<?php selected( $release_day, '365' ); ?>><?php _e('Next year'); ?></option>
    </select>
</p> 

<!-- No of Games Display -->
<p>
	<label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php esc_html_e( 'Limit number of titles displayed (Up to 50):' , 'ts_hvrbrd'); ?></label>
	<input size="4"  id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="number" min="1" max="10" value="<?php echo esc_attr( $limit ); ?>" />
</p>
<script type='text/javascript'>
    jQuery(document).ready(function($) {
        $('.lxt-colorpicker').wpColorPicker();
    });
</script>
<!-- Pick Primary colour -->
<p>
	<label for="<?php echo $this->get_field_id( 'date_color' ); ?>"><?php esc_html_e( 'Plugin Colour:' , 'ts_hvrbrd'); ?></label>
	<input size="7" class="lxt-colorpicker" id="<?php echo $this->get_field_id( 'date_color' ); ?>" name="<?php echo $this->get_field_name( 'date_color' ); ?>" type="text" value="<?php echo esc_attr( $date_color ); ?>" />
</p>

<!-- Pick Secondary colour 
<p>
	<label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php esc_html_e( 'Pick Background Colour:' , 'ts_hvrbrd'); ?></label>
	<input size="7" class="lxt-colorpicker" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" type="text" value="<?php echo esc_attr( $background_color ); ?>" />
</p>
-->
<!--Hide Platform -->
<p>
    <input class="widefat" id="<?php echo $this->get_field_id( 'hide_platform' ); ?>" name="<?php echo $this->get_field_name( 'hide_platform' ); ?>" type="checkbox" value="1" <?php checked( $hide_platform, 1 ); ?> />
    <label for="<?php echo $this->get_field_id( 'hide_platform' ); ?>"><?php esc_html_e( 'Hide Platform List' , 'ts_hvrbrd'); ?></label>
</p>


<!--Hide Rating -->
<p>
    <input class="widefat" id="<?php echo $this->get_field_id( 'hide_rating' ); ?>" name="<?php echo $this->get_field_name( 'hide_rating' ); ?>" type="checkbox" value="1" <?php checked( $hide_rating, 1 ); ?> />
    <label for="<?php echo $this->get_field_id( 'hide_rating' ); ?>"><?php esc_html_e( 'Hide Game Rating' , 'ts_hvrbrd'); ?></label>
</p>

<!--Hide Counter -->
<p>
    <input class="widefat" id="<?php echo $this->get_field_id( 'hide_counter' ); ?>" name="<?php echo $this->get_field_name( 'hide_counter' ); ?>" type="checkbox" value="1" <?php checked( $hide_counter, 1 ); ?> />
    <label for="<?php echo $this->get_field_id( 'hide_counter' ); ?>"><?php esc_html_e( 'Hide Counter Box' , 'ts_hvrbrd'); ?></label>
</p>

<!--Popular Games -->
<p>
	<input class="widefat" id="<?php echo $this->get_field_id( 'popular' ); ?>" name="<?php echo $this->get_field_name( 'popular' ); ?>" type="checkbox" value="1" <?php checked( $popular, 1 ); ?> />
	<label for="<?php echo $this->get_field_id( 'popular' ); ?>"><?php esc_html_e( 'Most Popular only' , 'ts_hvrbrd'); ?></label>
</p>
<!--Hide Release Date -->
<p>
    <input class="widefat" id="<?php echo $this->get_field_id( 'hide_release' ); ?>" name="<?php echo $this->get_field_name( 'hide_release' ); ?>" type="checkbox" value="1" <?php checked( $hide_release, 1 ); ?> />
    <label for="<?php echo $this->get_field_id( 'hide_release' ); ?>"><?php esc_html_e( 'Hide Release Date' , 'ts_hvrbrd'); ?></label>
</p>


<!--Hide Cover
<p>
    <input class="widefat" id="<?php echo $this->get_field_id( 'hide_cover' ); ?>" name="<?php echo $this->get_field_name( 'hide_cover' ); ?>" type="checkbox" value="1" <?php checked( $hide_cover, 1 ); ?> />
    <label for="<?php echo $this->get_field_id( 'hide_cover' ); ?>"><?php esc_html_e( 'Hide Cover Image' , 'ts_hvrbrd'); ?></label>
</p>  
-->
