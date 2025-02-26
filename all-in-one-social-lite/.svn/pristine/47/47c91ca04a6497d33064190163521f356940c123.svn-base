<?php
class Cube3x_Social_Lite extends WP_Widget {
	function Cube3x_Social_Lite() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'cube3x_social', 'description' => 'New Trend in Social Sharing' );

		/* Widget control settings. */
		$control_ops = array( 'width' => 350, 'height' => 350, 'id_base' => 'cube3x-social' );

		/* Create the widget. */
		$this->WP_Widget( 'cube3x-social', 'All in One Social Lite', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		if($instance['show_in_single'] == 1)
			if(!is_single()) return;
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		$all_in_one_social_options = get_option('all_in_one_social_settings');
		
		//Reading General Settings for the widget
		$services = array();
		$social_names = array();
		$facebook_graph_html = $twitter_graph_html = $gplus_graph_html = $linkedin_graph_html = $stumple_graph_html = '';
		if($instance['list_of_services_facebook']){
			array_push($services, '{"name":"facebook","id":"'.$all_in_one_social_options['facebook_id'].'","subscriber_count":"'.$all_in_one_social_options['facebook_fans'].'"}'); 
			array_push($social_names, '"facebook"');
			$facebook_graph_html = <<<EOT
		<div class="social-row facebook-wrapper">
			<div class="social-row1">
				<div class="social-site">Facebook</div>
				<div class="social-count">0</div>
			</div>
			<div class="social-row2">
				<div class="nofill"></div>
				<div class="fill"></div>
			</div>
		</div>	
EOT;
		}
		if($instance['list_of_services_twitter']){
			array_push($services, '{"name":"twitter","id":"'.$all_in_one_social_options['twitter_id'].'","subscriber_count":"'.$all_in_one_social_options['twitter_fans'].'"}'); 
			array_push($social_names, '"twitter"');
			$twitter_graph_html = <<<EOT
		<div class="social-row twitter-wrapper">
			<div class="social-row1">
				<div class="social-site">Twitter</div>
				<div class="social-count">0</div>
			</div>
			<div class="social-row2">
				<div class="nofill"></div>
				<div class="fill"></div>
			</div>
		</div>	
EOT;
		}
		if($instance['list_of_services_gplus']){
			array_push($services, '{"name":"gplus","id":"'.$all_in_one_social_options['gplus_id'].'","subscriber_count":"'.$all_in_one_social_options['gplus_fans'].'"}'); 
			array_push($social_names, '"gplus"');
			$gplus_graph_html = <<<EOT
		<div class="social-row gplus-wrapper">
			<div class="social-row1">
				<div class="social-site">Google</div>
				<div class="social-count">0</div>
			</div>
			<div class="social-row2">
				<div class="nofill"></div>
				<div class="fill"></div>
			</div>
		</div>	
EOT;
		}
		if($instance['list_of_services_linkedin']){
			array_push($services, '{"name":"linkedin","id":"'.$all_in_one_social_options['linkedin_id'].'","subscriber_count":"'.$all_in_one_social_options['linkedin_fans'].'"}'); 
			array_push($social_names, '"linkedin"');
			$linkedin_graph_html = <<<EOT
		<div class="social-row linkedin-wrapper">
			<div class="social-row1">
				<div class="social-site">Linkedin</div>
				<div class="social-count">0</div>
			</div>
			<div class="social-row2">
				<div class="nofill"></div>
				<div class="fill"></div>
			</div>
		</div>	
EOT;
		}
		if($instance['list_of_services_stumpleupon']){
			array_push($services, '{"name":"stumpleupon","id":"'.$all_in_one_social_options['stumple_id'].'","subscriber_count":"'.$all_in_one_social_options['stumple_fans'].'"}'); 
			array_push($social_names, '"stumpleupon"');
			$stumple_graph_html = <<<EOT
		<div class="social-row stumpleupon-wrapper">
			<div class="social-row1">
				<div class="social-site">StumpleUpon</div>
				<div class="social-count">0</div>
			</div>
			<div class="social-row2">
				<div class="nofill"></div>
				<div class="fill"></div>
			</div>
		</div>	
EOT;
		}
		$services_string = implode(',', $services);
		$social_sites = implode(',', $social_names);
		//Read Source
		$source = $instance['source'];
		//Get Plugin url
		$plugin_url = plugin_dir_url( __FILE__ );
		$script = <<<EOS
<script type="text/javascript">
jQuery(document).ready(function(){
	var options;
	var services =new Array($services_string);
	options = {
		services : services,
		source : $source,
		sites : new Array($social_sites),
		plugin_url : "$plugin_url"
	};
	load_all_in_one_social(options);
});
</script>
EOS;
		echo $script;
			
			$html = <<<EOT
<div class="cube3x-social-wrapper">
	<div class="total-share-count-wrapper">
		<div class="total_shares">0</div>
		<div class="shares_text">Shares</div>
	</div>
	<div class="social-wrapper">
		$facebook_graph_html
        $twitter_graph_html
		$gplus_graph_html
		$linkedin_graph_html
		$stumple_graph_html
	</div>
</div>
EOT;
		echo $html;
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
        $instance['source'] = $new_instance['source'];
		$instance['list_of_services_facebook'] = $new_instance['list_of_services_facebook'];
		$instance['list_of_services_twitter'] = $new_instance['list_of_services_twitter'];
		$instance['list_of_services_gplus'] = $new_instance['list_of_services_gplus'];
		$instance['list_of_services_linkedin'] = $new_instance['list_of_services_linkedin'];
		$instance['list_of_services_stumpleupon'] = $new_instance['list_of_services_stumpleupon'];
        $instance['show_in_single'] = $new_instance['show_in_single'];

		return $instance;
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 
        	'title' => 'Social Trends',
            'source' => '1',
            'list_of_services_facebook' => '',
            'list_of_services_twitter' => '',
            'list_of_services_gplus' => '',
            'list_of_services_linkedin' => '',
            'list_of_services_stumpleupon' => '',
            'show_in_single' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat"/>
		</p>
        <p>
        	Widget shows data of:
            <select class="widefat select-data" style="background: #fff;" name="<?php echo $this->get_field_name( 'source' ); ?>">
            	<option value="1" <?php if($instance['source'] == 1) echo 'selected' ?>>Current URL</option>
                <option value="3" <?php if($instance['source'] == 3) echo 'selected' ?>>Followers</option>
            </select>
        </p>
        <p>
            <fieldset class="widefat" style="padding: 3%; width: 94%; background: #fff;">
            <legend style="background: #fff;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; padding: 0px 10px; border: 1px solid #DFDFDF;">Select Services</legend>
            <label><input type="checkbox" <?php if($instance['list_of_services_facebook'] == 1) echo 'checked' ?> name="<?php echo $this->get_field_name( 'list_of_services_facebook' ); ?>" value="1"> Facebook</label><br/>
            <label><input type="checkbox" <?php if($instance['list_of_services_twitter'] == 1) echo 'checked' ?> name="<?php echo $this->get_field_name( 'list_of_services_twitter' ); ?>" value="1"> Twitter</label><br/>
            <label><input type="checkbox" <?php if($instance['list_of_services_gplus'] == 1) echo 'checked' ?> name="<?php echo $this->get_field_name( 'list_of_services_gplus' ); ?>" value="1"> Google Plus</label><br/>
            <label><input type="checkbox" <?php if($instance['list_of_services_linkedin'] == 1) echo 'checked' ?> name="<?php echo $this->get_field_name( 'list_of_services_linkedin' ); ?>" value="1"> LinkedIn</label><br/>
            <label><input type="checkbox" <?php if($instance['list_of_services_stumpleupon'] == 1) echo 'checked' ?> name="<?php echo $this->get_field_name( 'list_of_services_stumpleupon' ); ?>" value="1"> StumpleUpon</label>
            </fieldset>
        </p>
        <p>
        	<label><input type="checkbox" <?php if($instance['show_in_single'] == 1) echo 'checked' ?> name="<?php echo $this->get_field_name( 'show_in_single' ); ?>" value="1"> Show widget only for single pages</label>
        </p>
        <?php
	}
}
?>