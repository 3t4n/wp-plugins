<?php 
	
// data-diagram WP plugin	
	
	declare(strict_types=1);
	
	namespace DATADIAGRAMS;
	
	
 	if ( ! defined( 'ABSPATH' ) ) exit('access denied'); // Exit if accessed directly 
 
 	if (count(get_included_files()) < 2) { header("HTTP/1.1 301 Moved Permanently"); header("Location: /"); exit; } 
  		
 
	/*
	Plugin Name:  Data Diagrams
	Plugin URI:   https://data-diagrams.com
	Description:  Data visualizing responsive diagrams and charts: barcharts, areacharts, functioncharts, donutcharts, piecharts, spiderwebs, radarwebs, and more
	Version:      1.0
	Author:       data-diagrams.com
	Author URI:   https://www.cartouche.dk
	License:      GPL2
	License URI:  https://www.gnu.org/licenses/gpl-2.0.html
	Text Domain:  data-diagrams"
	Domain Path:  /
	*/
	
	
// Allow SVG

	function svg_mime_types( $mimes )
	{
	 	 $mimes['svg'] = 'image/svg+xml';
	 	 return $mimes;
	}
	\add_filter( 'upload_mimes', 'DATADIAGRAMS\svg_mime_types' );


// tool page
	
	// create admin page 
	\add_action('admin_menu', 'DATADIAGRAMS\diagram_menu');

 	\add_action('admin_menu', 'DATADIAGRAMS\submenu');

	function diagram_menu() {
		
		\add_menu_page('Data Diagrams Settings', 'Data Diagrams', 'manage_options', 'diagram-settings', 'DATADIAGRAMS\toolpage', 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeD0iMHB4IiB5PSIwcHgiIHdpZHRoPSI3NXB4IiBoZWlnaHQ9Ijc1cHgiIHZpZXdCb3g9IjAgMCAyNSAyNSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMjUgMjUiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSJyZWMiPgogIAogICAgPHJlY3QgeD0iMiIgeT0iMy40MDIiIGZpbGw9IiMwMGY5MDAiIHdpZHRoPSI2LjEwNiIgaGVpZ2h0PSIxNy41NjIiLz4KICAgIDxyZWN0IHg9IjEwLjgwNiIgeT0iOC4wMDciIGZpbGw9IiMwZDZlZmQiIHdpZHRoPSI2LjEwNSIgaGVpZ2h0PSIxMi45NTciLz4KICAgIDxyZWN0IHg9IjE5LjQwMyIgeT0iMy40MDIiIGZpbGw9IiMwMGZjZmYiIHdpZHRoPSI2LjEwNSIgaGVpZ2h0PSIxNy41NjIiLz4KIAogICAgPHN0eWxlIHR5cGU9InRleHQvY3NzIj4KICAgICAgICAKICAgICAgICAucmVjOmhvdmVyCgkJewoJCSAgICAgIGZpbGwtb3BhY2l0eTogMC44OwoJCX0KICAgICAgICAKICAgIDwvc3R5bGU+CiAgCjwvc3ZnPgo=');

		// add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $callback = ”, string $icon_url = ”, int|float $position = null ): string



	} 
	
		
	function submenu()
	{
	
	//	\add_submenu_page('diagram-settings', 'Data Diagrams - Settings', 'Settings', 'manage_options', 'diagram-tool', 'DATADIAGRAMS\toolpage');

		\add_submenu_page('diagram-settings', 'Data Diagrams - About', 'About', 'manage_options', 'diagram-about', 'DATADIAGRAMS\about');

		// add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $callback = ”, int|float $position = null ): string|false

		\add_submenu_page('diagram-settings', 'Data Diagrams - Support', 'Support', 'manage_options', 'diagram-support', 'DATADIAGRAMS\support');
	
	}	
		
		
	function resources()
	{
	
		// bootstrap 5.3.3	
		\wp_enqueue_script('bootstrap-bundle-script', \esc_url(\plugin_dir_url(__FILE__) . 'bootstrap.bundle.min.js'), array(), '5.3.3', true);    	
    	\wp_script_add_data( 'bootstrap-bundle-script', array( 'integrity', 'crossorigin' ) , array( 'sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz', 'anonymous' ) );
        
    	\wp_enqueue_style('bootstrap-style', \esc_url(\plugin_dir_url(__FILE__) . 'bootstrap.min.css'), array(), '5.3.3', 'all');
    	\wp_style_add_data( 'bootstrap-style', array( 'integrity', 'crossorigin' ) , array( 'sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH', 'anonymous' ) );


		// data-diagrams
		\wp_enqueue_script('datadiagrams-script', \esc_url(\plugin_dir_url(__FILE__) . 'datadiagrams-script.js'), array(), null, true);    	
    
    	\wp_enqueue_style('datadiagrams-style', \esc_url(\plugin_dir_url(__FILE__) . 'datadiagrams-styles.css'), array(), null, 'all');
    
    		
		\wp_localize_script('datadiagrams-script', 'wpApiSettings', array(
			'root' => \esc_url(rest_url()),
			'nonce' => \wp_create_nonce('wp_rest'),			
			'url' => \esc_url(plugin_dir_url(__FILE__))			
		));
	
	}	
		
	
	function about()
	{
		resources();
		
		$path = \plugin_dir_url(__FILE__);
			
		?>
									
		<div class="container-fluid mt-3">
		
			<div class="col">
		
				<h1>Data Diagrams - About</h1>
		
				<p class="lead">The basic idea of this plugin is to create a chart tool that:</p>
				
				<ul class="list-group">
					<li class="list-group-item">Takes no technical skills</li>
					<li class="list-group-item">Has an easy to use Visual Editor</li>
					<li class="list-group-item">Creates data charts that are not calling external APIs, iframes, etc. giving a bad page load</li>
					<li class="list-group-item">Creates Stunning Charts</li>
					<li class="list-group-item">Creates responsive Charts rescaling to fit any device</li>
					<li class="list-group-item">Has options for multidimensional (complex) data</li>
					<li class="list-group-item">Has a very easy approach for linking up with live data - without calling back and forth to external API</li>
				</ul>	
				
				<a href="https://data-diagrams.com">More information at: https://data-diagrams.com</a>
		
				<br>
				<br>
		
				<img class="image fadein d-block w-100" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>editor.png"/>

				<br>
				<br>

				<img class="image fadein d-block w-50" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>editor_data.png"/>
		
				<!--<img class="image fadein d-block w-50" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>editor_link.png"/>-->

		
			</div>		
		</div>		
					
		<?php	
	
	}
	
	function support()
	{
		resources();
		
		?>
									
		<div class="container-fluid mt-3">
		
			<div class="col">
		
				<h1>Data Diagrams - Support</h1>
		
				<p class="lead">Please email us at:</p>
				
				<a href="mailto:info@data-diagrams.com">info@data-diagrams.com</a>
		
			</div>		
		</div>		
					
		<?php	
	
	}

	function toolpage()
	{    	
		// bootstrap 5.3.3	
	/*	\wp_enqueue_script('bootstrap-bundle-script', \esc_url(\plugin_dir_url(__FILE__) . 'bootstrap.bundle.min.js'), array(), '5.3.3', true);    	
    	\wp_script_add_data( 'bootstrap-bundle-script', array( 'integrity', 'crossorigin' ) , array( 'sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz', 'anonymous' ) );
        
    	\wp_enqueue_style('bootstrap-style', \esc_url(\plugin_dir_url(__FILE__) . 'bootstrap.min.css'), array(), '5.3.3', 'all');
    	\wp_style_add_data( 'bootstrap-style', array( 'integrity', 'crossorigin' ) , array( 'sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH', 'anonymous' ) );


		// data-diagrams
		\wp_enqueue_script('datadiagrams-script', \esc_url(\plugin_dir_url(__FILE__) . 'datadiagrams-script.js'), array(), null, true);    	
    
    	\wp_enqueue_style('datadiagrams-style', \esc_url(\plugin_dir_url(__FILE__) . 'datadiagrams-styles.css'), array(), null, 'all');
    
    		
		\wp_localize_script('datadiagrams-script', 'wpApiSettings', array(
			'root' => \esc_url(rest_url()),
			'nonce' => \wp_create_nonce('wp_rest'),			
			'url' => \esc_url(plugin_dir_url(__FILE__))			
		));
		
		*/
		
		resources();
		
	//	$img = \plugin_dir_url(__FILE__) . 'banner-1544x500.png';

		$path = \plugin_dir_url(__FILE__);

		$libpath = \site_url() . '/wp-admin/upload.php';
		
		$dataurl = 'https://data-diagrams.com/charts/areachart.html?task=5';

		?>
									
		<div class="container-fluid mt-3">
		
			<div class="col">
		
				<h1>Data Diagrams</h1>
			
				<div class="tab-content" id="myTabContent">
    
					<div class="tab-pane fade show active p-0 container-fluid position-relative" id="data" role="tabpanel" aria-labelledby="data-tab" tabindex="0">
						
						<h4 class="mt-2">Go GET the FREE Pro Edition</h4>
				
						<a class="btn btn-success text-white w-100 p-2" href="https://www.data-diagrams.com/plugin.html" target="plugin">Install the FREE Pro Edition for seamless integration</a>

						<br>
						<br>

						<div id="D25idm1758" data-bs-ride="carousel" data-bs-touch="true" class="carousel slide mx-auto col-8">
							<div class="carousel-inner d-flex h-100 text-center">
									
								<!-- multi areachart -->
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>multi_areachart.svg" class="image fadein d-block w-100">
									</div>
								</div>
							
								<!-- gauge -->								
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center">														
										<object type="image/svg+xml" data="<?php echo \esc_url($path) ?>gauge.svg" loading="eager">&nbsp;</object>							
									</div>
								</div>

								<!-- areachart -->								
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>double-stacked-areachart.svg" class="image fadein d-block w-100">
									</div>
								</div>

								<!-- pie -->								
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">						
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>piechart.svg" class="image fadein d-block w-100">
									</div>
								</div>

								<!-- barchart -->
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>barchart.svg" class="image fadein d-block w-100">
									</div>
								</div>

								<!-- line  -->
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" nonce="" src="<?php echo \esc_url($path) ?>linechart.svg" class="image fadein d-block w-100">
									</div>
								</div>

								<!-- spider -->								
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>spiderweb.svg" class="image fadein d-block w-100">
									</div>
								</div>
								
								<!-- stacked-donutchart -->								
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>stacked-donutchart.svg" class="image fadein d-block w-100">
									</div>
								</div>


								<!-- multi barchart -->
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>multi_barchart.svg" class="image fadein d-block w-100">
									</div>
								</div>
																
								<!-- radar -->								
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">						
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>radarweb.svg" class="image fadein d-block w-100">							
									</div>
								</div>
								
								<!-- double area -->								
							<!--	<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" nonce="" src="<?php echo \esc_url($path) ?>double_areachart.svg" class="image fadein d-block w-100">
									</div>
								</div>-->

								<!-- donut -->								
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>donutchart.svg" class="image fadein d-block w-100">
									</div>
								</div>
								
								<!-- stacked radar -->								
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" nonce="" src="<?php echo \esc_url($path) ?>stacked-radarweb.svg" class="image fadein d-block w-100">
									</div>
								</div>

								<!-- bubble -->								
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" nonce="" src="<?php echo \esc_url($path) ?>bubblechart.svg" class="image fadein d-block w-100">
									</div>
								</div>

								<!-- multi donut -->								
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" nonce="" src="<?php echo \esc_url($path) ?>multi-donutchart.svg" class="image fadein d-block w-100">
									</div>
								</div>

								<!-- multi bubble -->								
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" nonce="" src="<?php echo \esc_url($path) ?>multi-bubblechart.svg" class="image fadein d-block w-100">
									</div>
								</div>
							

								<!-- stacked bar -->
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">							
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>stacked_barchart.svg" class="image fadein d-block w-100">
									</div>
								</div>
								
								<!-- stacked double bar -->
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">							
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>stacked_double_barchart4.svg" class="image fadein d-block w-100">
									</div>
								</div>								
								
								<!-- double bar -->								
								<div data-bs-interval="5000" class="carousel-item active">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>double_barchart.svg" class="image fadein d-block w-100">
									</div>
								</div>
								<!-- double multi bar -->							
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>double_multi_barchart.svg" class="image fadein d-block w-100">
									</div>
								</div>
								<!-- stacked double bar -->								
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">							
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>stacked_double_barchart.svg" class="image fadein d-block w-100">
									</div>
								</div>
								<!-- 7 -->
								<!--<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>double_barchart.svg" class="image fadein d-block w-100">
									</div>
								</div>-->
							
								<!-- multi spider -->								
								<div data-bs-interval="5000" class="carousel-item">
									<div class=" d-flexh-100 align-items-center text-center" style="overflow: hidden;">
										<img alt="Data Visualization Diagrams" loading="eager" decoding="auto" src="<?php echo \esc_url($path) ?>multi_spiderweb.svg" class="image fadein d-block w-100">
									</div>
								</div>
								
								<!-- editor -->
								<div data-bs-interval="5000" class="carousel-item">
									<img src="<?php echo \esc_url($path) ?>editor.png" class="image fadein d-block w-100"/>							
								</div>
								
							</div>
						</div>
					
						<br>

						<h4>Or Try it right away</h4>
						<a class="btn btn-primary text-white w-100 p-2" href="<?php echo \esc_url($dataurl) ?>" target="diagrams">1. Click to Open the Editor in another tab (all 33 diagram types)</a>
								
						<br>	
						<br>
	
					<!--	<h4 class="mt-2">Step 2</h4>-->
						<button data-diagram="media" class="btn btn-primary text-white w-100 mt-1 p-2">2. Click (this button in this tab) to Save Diagram to WordPress Media Library</button>
				
						<div class="toast p-2" id="feedback">
							<div class="d-flex">
								<a class="btn me-2" href="<?php echo \esc_url($libpath) ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
									  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
									</svg>
								</a>

								<h4 class="my-auto">Open Media Library</h4>
																
								<button class="btn ms-auto pe-0" data-bs-dismiss="toast">
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="25" class="bi bi-x-lg" viewBox="0 0 16 16">
										<path stroke="grey" d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
									</svg>	
								</button>
							</div>
							<div>
								<small class="ms-3">Did you remember to click <code>Update</code> on the Editor tab?</small>
							</div>									
						</div>
						
						<br>						
							
					</div>
	
				</div>
			
			</div>
		
		</div>
		
<?php
	}
	
?>