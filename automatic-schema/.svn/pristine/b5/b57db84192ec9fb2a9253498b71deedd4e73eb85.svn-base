<?php
/**
 * Plugin Name: Automatic Schema
 * Plugin URI: http://digitalstartup.co.uk/
 * Description: This plugin will automatically insert http://schema.org/BlogPosting Microdata within your blog pages. You don't have to pre-fill any more information!
 * Version: 1.0.8
 * Author: Digital Startup
 * Author URI: http://digitalstartup.co.uk/
 * License: GPL2
 */

add_action( 'wp_footer', 'ds_schema' );
function ds_schema() {
  if( is_single() ) {
  ?>
	<div itemscope itemType="http://schema.org/BlogPosting">
		<meta itemprop="inLanguage" content="<?php bloginfo('language') ?>"/>
		<meta itemprop="headline" content="<?php the_title() ?>">
		<meta itemprop="mainEntityOfPage" content="<?php the_permalink() ?>"/>
		<meta itemprop="datePublished" content="<?php the_date('Y-m-d'); ?>">
		<meta itemprop="dateModified" content="<?php the_modified_time('Y-m-d');?>">
		<meta itemprop="articleBody" content="<?php echo strip_tags( get_the_excerpt() ); ?>">
	  <div itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject"/>
		<meta itemprop="url" content="<?php the_post_thumbnail_url( 'medium' ); ?>">
		<meta itemprop="width" content="300">
		<meta itemprop="height" content="300">
	  </div>
	  <div itemprop="author" itemscope="" itemtype="http://schema.org/Person">
		<meta itemprop="name" content="<?php the_author(); ?>">
	  </div>
	  <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
		<meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
		<meta itemprop="url" href="<?php bloginfo( 'wpurl' ); ?>">
		<meta itemprop="description" content="<?php bloginfo('description'); ?>">
		<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
		  <meta itemprop="image" content="<?php echo get_option('logo'); ?>">
		  <meta itemprop="url" content="<?php echo get_option('logo'); ?>">
		  <meta itemprop="width" content="300">
		  <meta itemprop="height" content="300">
		</span>
	</div>
    
  <?php
  }
}

add_action( 'admin_enqueue_scripts','ds_schema_scripits' );

function ds_schema_scripits() {
        wp_enqueue_media();
        wp_enqueue_script( 'jquery' );
    }

add_action('admin_menu', 'ds_schema_menu');

function ds_schema_menu() {
    add_submenu_page(
        'options-general.php',
        'Automatic Schema',
        'Automatic Schema',
        'manage_options',
        'ds-schema-plugin-settings',
        'ds_schema_settings_page'
    );
	add_action( 'admin_init', 'register_my_cool_plugin_settings' );
} 

function register_my_cool_plugin_settings() {
	//register our settings
	register_setting( 'ds-schema-settings-group', 'logo' );

}

function ds_schema_settings_page() {
	add_action( 'admin_init', 'ds_schema_settings' );
?>

<style>
.js .postbox .hndle {
  cursor:default !important;
}
</style>

<div class="wrap">
<a href="https://goo.gl/dvtaey" alt="DigitalStartup.co.uk" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>images/digitalstartup-logo.png"></a><h2 style="padding-left: 55px; margin-top: 0px;"> - Schema.org</h2>

<div class="wrap">
    <div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<div id="postbox-container-2" class="postbox-container">
				<div class="meta-box-sortables ui-sortable" id="normal-sortables">

				 <div class="postbox " id="item2">
						<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>Digital Startup help entrepreneurs build and run their first online store</span></h3>
						<div class="inside">
				<p>Visit DigitalStartup.co.uk to find content that will help you succeed in building your first online store.</p>
				<p>And check out:</p>
				<ul style="list-style-type: circle; margin-left: 16px;">
					<li>Our <a href="https://goo.gl/mH0f7m" alt="DigitalStartup.co.uk" style="font-weight:bold" target="_blank">Blog</a></li>
					<li>Our <a href="https://goo.gl/A1zSBy" alt="DigitalStartup.co.uk" style="font-weight:bold" target="_blank">eCommerceTalk Podcast</a></li>
					<li>Our <a href="https://goo.gl/DRLi7G" alt="DigitalStartup.co.uk" style="font-weight:bold" target="_blank">Guides</a></li>
					<li>Our <a href="https://www.youtube.com/c/DigitalstartupUk" alt="DigitalStartup.co.uk" style="font-weight:bold" target="_blank">How-to YouTube Channel</a></li>
				</ul>
						</div>
					</div>

				  <div class="postbox " id="item1">
						<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>What is Microdata?</span></h3>
						<div class="inside">
							<p>The job of microdata, is to hold the hand of a search engine, and take it directly to the data that you need it to find. This helps search engines understand what it is crawling and minimise mistakes.</p>
				<p>Major search engines, like Google, now support something called the <a style="font-weight: bold;" href="http://schema.org/" target="_blank">schema.org</a> vocabulary for structured data. In English, it’s a universal template for structuring data. Essentially this makes it easier for search engines to crawl your pages.  As a human being, we are able to fill in the blanks when we view information, but software like search engines require a helping hand.</p>
				<p>One of the ways the schema.org vocabulary can be embedded within a page, is by using microdata. There are different sets for whatever your page is referring to. In the case of selling products, you would use the <a style="font-weight: bold;" href="http://schema.org/Product" target="_blank">Product Schema</a>. If you are familiar with metadata, then think of it like that. In the HTML of your page code, you wrap the text in the same way.</p>
						</div>
					</div>

				 <div class="postbox " id="item2">
						<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>About this plugin</span></h3>
						<div class="inside">
							<ul style="list-style-type: circle; margin-left: 16px;">
					<li>The Schema.org Microdata will automatically be picked up from your Blog Post.</li>
					<li>The Schema.org Microdata will then be added to the Footer of your article.</li>
					<li>The Schema.org Microdata will remain hidden on the page, just for Search Engines to find.</li>
					<li><strong>However you will need to assign your own Website/Organization Logo below.</strong></li>
				</ul>
						</div>
					</div>

					<div class="postbox " id="test3">
						<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>Website/Organization Logo</span></h3>
						<div class="inside">
				<form method="post" action="options.php">
					<?php settings_fields( 'ds-schema-settings-group' ); ?>
					<?php do_settings_sections( 'ds-schema-settings-group' ); ?>
					<table class="form-table">
		
						<tr valign="top">
						<th scope="row"><label for="logo">Website Logo</label></th>
						<td>
						<input class="regular-text wpc-url" id="logo" name="logo" value="<?php echo esc_attr( get_option('logo') ); ?>" type="text">
						<input class="button wpc-browse" value="Choose Image" type="button">
						<p class="description">image dimensions must be <strong>300 x 300px</strong></p>
						<?php submit_button(); ?>
						</td>
						</tr>
					</table>

				<?php script(); ?>

				</form>
						</div>
					</div>

					<div class="postbox " id="item4">
						<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>Schema.org Microdata Verification</span></h3>
						<div class="inside">
							<p>To verify that your Schema.org Microdata is working correctly, please visit <a style="font-weight: bold;" href="https://search.google.com/structured-data/testing-tool" target="_blank">Google Structured Data Testing Tool</a> for verification. Simply copy the URL of one of your Blog Articles into the prompt.</p>
						</div>
					</div>

					<div class="postbox " id="item5">
						<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>What Schema.org is included? (This bit is for techy people)</span></h3>
						<div class="inside">
	<ul>
		<li>itemscope itemType="http://schema.org/BlogPosting"</li>
	  <ul>
		  <li>itemprop="inLanguage" <strong>WORDPRESS LANGUAGE</strong></li>
		  <li>itemprop="headline" <strong>BLOG TITLE</strong></li>
		  <li>itemprop="mainEntityOfPage" <strong>PAGE URL</strong></li>
		  <li>itemprop="datePublished" <strong>POST DATE</strong></li>
		  <li>itemprop="dateModified" <strong>EDIT DATE</strong></li>
		  <li>itemprop="articleBody" <strong>ARTICLE EXCERT</strong></li>
	  </ul>
		<li>itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject"</li>
	  <ul>
		  <li>itemprop="url" <strong>FEATURE IMAGE URL</strong></li>
		  <li>itemprop="width" <strong>FIXED TO 300</strong></li>
		  <li>itemprop="height" <strong>FIXED TO 300</strong></li>
	  </ul>
		<li>itemprop="author" itemscope="" itemtype="http://schema.org/Person"</li>
		<ul>
		<li>itemprop="name" <strong>POST AUTHOR</strong></li>
	  </ul>
		<li>itemprop="publisher" itemscope itemtype="https://schema.org/Organization"></li>
	  <ul>
		  <li>itemprop="name" <strong>WORDPRESS NAME</strong></li>
		  <li>itemprop="url" <strong>WORDPRESS URL</strong></li>
		<li>itemprop="description" <strong>WORDPRESS TAGLINE</strong></li>
		<li>itemprop="logo" itemscope itemtype="https://schema.org/ImageObject"></li>
		<ul>
			<li>itemprop="image" <strong>SET ON THIS PAGE</strong></li>
			<li>itemprop="url" <strong>SET ON THIS PAGE</strong></li>
			<li>itemprop="width" <strong>FIXED TO 300</strong></li>
			<li>itemprop="height" <strong>FIXED TO 300</strong></li>
		</ul>
		</ul>
	</ul>
						</div>
					</div>

				</div>
			</div>
			<div id="postbox-container-1" class="postbox-container">

								
				<div class="postbox">

					<h3 class="hndle">Automatic Schema v1.0.6</h3>

					<div class="inside">

						<h4>Changelog</h4>
						<p>What's new in <a href="https://wordpress.org/plugins/automatic-schema/changelog/">version 1.0.6</a>.</p>

						<h4>Plugin rating <span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></h4>
						<p>Please <a href="https://wordpress.org/plugins/automatic-schema/">rate this plugin</a>. Thanks!</p>

						<div class="author" style="padding-top:10px;border-top:1px solid lightgrey">
							<span><a href="https://wordpress.org/plugins/automatic-schema/">Automatic Schema</a> by <a class="logo-webbistro" href="https://goo.gl/dvtaey">DigitalStartup.co.uk</a></span>
						</div>

					</div>

				</div>

				
		</div>
		</div>
	</div>
</div>


</div>

<?php }
function script() {
	?>
        <script>
            jQuery(document).ready(function($) {
                $('.wpc-browse').on('click', function (event) {
                    event.preventDefault();

                    var self = $(this);

                    // Create the media frame.
                    var file_frame = wp.media.frames.file_frame = wp.media({
                        title: self.data('uploader_title'),
                        button: {
                            text: self.data('uploader_button_text'),
                        },
                        multiple: false
                    });

                    file_frame.on('select', function () {
                        attachment = file_frame.state().get('selection').first().toJSON();

                        self.prev('.wpc-url').val(attachment.url);
                    });

                    // Finally, open the modal
                    file_frame.open();
                });
        });
        </script>	
<?php
}


function ds_schema_settings() {
	register_setting( 'ds-schema-settings-group', 'logo' );
}