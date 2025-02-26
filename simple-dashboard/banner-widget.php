<?php

//Fetch Posts and show
	function DashboardExtended_banner(){
	// Add the widget to the dashboard
	  $widget_options = DashboardExtended_Options_banner();

		echo "<div style='margin:auto'>
		<a href='{$widget_options['url']}'><img src='{$widget_options['image']}' /></a>
		</div>";	
	}
	
	function DashboardExtended_Options_banner() {
		$defaults = array( 
			'title' 	=> 'Mike Leembruggen',
			'url' 	=> 'http://mikeleembruggen.com/',
			'image'	=> 'http://mikeleembruggen.com/wp-content/themes/mikeleembruggen/images/logo.png'
		);
		
		if((!$options = get_option('DashboardExtended_banner')) || !is_array($options))
			$options = array();
		return array_merge( $defaults, $options );
	}
	
	function DashboardExtended_Setup_banner() {

		$options = DashboardExtended_Options_banner();
	
		if ( 'post' == strtolower($_SERVER['REQUEST_METHOD']) && isset( $_POST['widget_id'] ) && 'DashboardExtended_banner' == $_POST['widget_id'] ) {

			$options['title'] = $_POST['title'];
			$options['url'] = $_POST['url'];
			$options['image'] = $_POST['image'];
			update_option( 'DashboardExtended_banner', $options );
		}
			
	?>
		
		<p>
			<label for="title">
				Title
			</label>
			<input id="title" name="title" type='text' value='<?php echo $options['title'] ?>'  />
		</p>
		<p>
			<label for="url">
				URL
			</label>
			<input id="url" name="url" type='text' value='<?php echo $options['url'] ?>'  />
		</p>
		
		<p>
			<label for="image">
				Image
			</label>
			<input id="image" name="image" type='text' value='<?php echo $options['image'] ?>' />
		</p>
		
	<?php
	}


