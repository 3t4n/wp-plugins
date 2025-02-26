<?php
/*
 * Plugin Name: AMP Related Posts
 * Version: 2.2
 * Plugin URI: https://jaaadesign.nl/en/blog/amp-related-posts/
 * Description: Plugin to display related posts in your AMP template, with links to AMP articles (visitor is not redirected to regular website).
 * Author: Nick van de Veerdonk
 * Author URI: https://jaaadesign.nl/
 */
 

 
 
 



// create custom plugin settings menu

add_action('admin_menu', 'amp_rel_posts_menu');



function amp_rel_posts_menu() {



	//create new top-level menu

	add_menu_page('AMP Related Posts Settings', 'AMP Related Posts', 'administrator', __FILE__, 'amp_rel_posts_options_page' , plugins_url('/images/icon.png', __FILE__), 102 );



	//call register settings function

	add_action( 'admin_init', 'register_amp_rel_posts_settings' );

}





function register_amp_rel_posts_settings() {

	//register our settings

	register_setting( 'amp_rel_posts_group', 'use_hook_rel' );	

	register_setting( 'amp_rel_posts_group', 'set_prio_hook_amp_rel' );	

	register_setting( 'amp_rel_posts_group', 'append_amp_rel' );

	register_setting( 'amp_rel_posts_group', 'heading_amp_rel' );

	register_setting( 'amp_rel_posts_group', 'max_amp_rel' );

	register_setting( 'amp_rel_posts_group', 'type_check_post_amp_rel' );	

	register_setting( 'amp_rel_posts_group', 'cust_post_supp_amp_rel' );	

	register_setting( 'amp_rel_posts_group', 'exclude_any_id_amp_1_rel' );	

	register_setting( 'amp_rel_posts_group', 'exclude_any_id_amp_2_rel' );	

	register_setting( 'amp_rel_posts_group', 'exclude_any_id_amp_3_rel' );	

	register_setting( 'amp_rel_posts_group', 'exclude_any_id_amp_4_rel' );	

	register_setting( 'amp_rel_posts_group', 'exclude_any_id_amp_5_rel' );	

    register_setting( 'amp_rel_posts_group', 'sel_thumb_amp_rel' );

    register_setting( 'amp_rel_posts_group', 'sel_date_amp_rel' );	

}



function amp_rel_posts_options_page() { 

	   

	

?>

<div class="wrap">

<h1><span class="dashicons dashicons-admin-settings" style="font-size: 35px;
    color: #68a7dc;
    padding-right: 20px;"></span>AMP Related Posts</h1>



<table width="100%">

<br /><br />

	<tbody><tr>

    	<td valign="top">

            <table class="wp-list-table widefat fixed ">

                <thead>

                    <tr>

                        <th>AMP Related Posts Settings</th>

                    </tr>

                </thead>

                <tbody>

                <tr>

                    <td>

                     

                        <form method="post" action="options.php">

    <?php settings_fields( 'amp_rel_posts_group' ); ?>

    <?php do_settings_sections( 'amp_rel_posts_group' ); ?>

	
	

    <table class="form-table">

<br />	 
<p><strong>NB.</strong> If you are NOT using the Automattic AMP plugin please implement the related posts by adding this code to your plugins templates:</p>

<blockquote><strong>&lt;?php echo do_shortcode( "[amp-recent-posts append='amp' heading='Recent Posts' max='5']" ); ?&gt;</strong></blockquote>




	    <tr valign="top">

        <th scope="row">Use AMP plugin (Automattic) hook?</th>

		<td><input name="use_hook_rel" type="checkbox" value="1" <?php checked( '1', get_option( 'use_hook_rel' ) ); ?> />

		<br />

		<p>This will implement the related posts without the use of shortcode.</p></td>

        </tr>

	

		<tr valign="top">

        <th scope="row">Priority of hook

		<td><input type="number" name="set_prio_hook_amp_rel" size="5" id="myHookprioamp" value="<?php echo esc_attr( get_option('set_prio_hook_amp_rel') ); ?>" />

		<br />

		<p>We suggest you set this to <strong>3</strong>, to play nice with our other plugins, if you wish to move the related posts up of down change this number. </p>

		</td>







		</tr>				

        <tr valign="top">

        <th scope="row">Set endpoint*</th>

        <td><input type="text" name="append_amp_rel" id="myAmpend" value="<?php echo esc_attr( get_option('append_amp_rel') ); ?>" />

		<br />

		<p>Unless you have changed this the AMP plugin uses '<strong>amp</strong>', enter just letters no apostrophes. The endpoint is the last part of the URL to indicate AMP content. </p></td>

        </tr>

         

        <tr valign="top">

        <th scope="row">Heading</th>

        <td><input type="text" name="heading_amp_rel" id="myDefhead" value="<?php echo esc_attr( get_option('heading_amp_rel') ); ?>" />

		<br />

		<p>Add an &lt;H3&gt; heading here.</p></td>

		</tr>

		<br /> 

 

		

		<tr valign="top">

        <th scope="row">Set number of posts*</th>

		<td><input type="number" name="max_amp_rel" size="5" id="myNumberofposts" value="<?php echo esc_attr( get_option('max_amp_rel') ); ?>" />

		<br />

		<p>The maximum of related posts rendered, for example <strong>5</strong>.</p>

		</td>

		</tr>

		

	  	

        <tr valign="top">

        <th scope="row">Return posts?</th>

		<td><input name="type_check_post_amp_rel" type="checkbox" id="mySetpostsdef" value="post" <?php checked( 'post', get_option( 'type_check_post_amp_rel' ) ); ?>" />

		<br />

		<p>Check this to show related posts, as opposed to entries of a different post type, for example portfolio items. Only prerequisite is a shared category.</p></td>

        </tr>

			

		

        <tr valign="top">

        <th scope="row">Other post types</th>

		<td><input type="text" name="cust_post_supp_amp_rel" value="<?php echo esc_attr( get_option('cust_post_supp_amp_rel') ); ?>" />

		

		

		

		<br />

		<p>If you wish to return a different post type set it here. (ex.: post, page, product, portfolio), only prerequisite is a shared category</p>

		</td>

		</tr>

                <tr valign="top">

        <th scope="row">Display featured image?</th>

		<td><input name="sel_thumb_amp_rel" type="checkbox" value="1" <?php checked( '1', get_option( 'sel_thumb_amp_rel' ) ); ?>" />

		<br />

		<p>Check this to show featured images.</p></td>

        </tr>

			

              <tr valign="top">

        <th scope="row">Show date?</th>

		<td><input name="sel_date_amp_rel" type="checkbox" value="1" <?php checked( '1', get_option( 'sel_date_amp_rel' ) ); ?>" />

		<br />

		<p>Check this to show the dates.</p></td>

        </tr>

			



			

<tr valign="top">

        <th scope="row">Exclude posts by ID</th>

		<td> <input type="text" name="exclude_any_id_amp_1_rel" size="5" value="<?php echo esc_attr( get_option('exclude_any_id_amp_1_rel') ); ?>" /> 

		 <input type="text" name="exclude_any_id_amp_2_rel" size="5" value="<?php echo esc_attr( get_option('exclude_any_id_amp_2_rel') ); ?>" />	 

		 <input type="text" name="exclude_any_id_amp_3_rel" size="5" value="<?php echo esc_attr( get_option('exclude_any_id_amp_3_rel') ); ?>" />	 

		 <input type="text" name="exclude_any_id_amp_4_rel" size="5" value="<?php echo esc_attr( get_option('exclude_any_id_amp_4_rel') ); ?>" />	 

		 <input type="text" name="exclude_any_id_amp_5_rel" size="5" value="<?php echo esc_attr( get_option('exclude_any_id_amp_5_rel') ); ?>" />	

		<br />

		<p>Some posts are more equal than others, you can find their ID in the admin URL of the post, page etc.</p>

		 



		</td>

	 

		</tr>

		

    </table>

  

  

  

 <br />

  <br />

    <?php submit_button(); ?>



</form>

                    							 

                        <br>                        

                        <span style="font-size: 1.4rem;color: #ffe200;">★★★★★</span> If you like this plugin please consider <a href="https://nl.wordpress.org/plugins/amp-related-posts/" target="_blank">rating it</a>, thank you!

                        <br><br>

                   	</td>

                    

                </tr>

                </tbody>

            </table>

            <br>

		</td>

		

		

        <td width="15">&nbsp;</td>

        <td width="250" valign="top">

		

		            <table class="wp-list-table widefat fixed bookmarks">

            	

                <tbody>

                <tr>

                	<td style="padding:4px;">

                    	

 

						<a href="https://nl.wordpress.org/plugins/amp-related-posts/" title="Visit Wordpress plugin page" target="_blank">

						<img width="240" alt="AMP Related Posts" style="margin-bottom: -4px;" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/admin-logo.jpg'; ?>" class="aligncenter"></a>

                    </td>

                </tr>

                </tbody>

            </table>

            <br>

		

        	            <table class="wp-list-table widefat fixed bookmarks">

            	<thead>

                <tr>



				

					<th>Our other plugins</th>

                </tr>

                </thead>

               



                <tbody>

                <tr>

                	<td>

                    <ul class="uaf_list">

                    	<li><a href="https://wordpress.org/plugins/amp-social-share/" target="_blank">AMP Social Share</a></li>

						<li><a href="https://wordpress.org/plugins/amp-html-sitemap/" target="_blank">AMP HTML Sitemap</a></li>

                        <li><a href="https://wordpress.org/plugins/amp-recent-posts/" target="_blank">AMP Recent Posts</a></li>

                        <li><a href="https://wordpress.org/plugins/amp-recent-posts-widget/" target="_blank">AMP Recent Posts widget</a></li>

                      

                    </ul>

                    </td>

                </tr>

                </tbody>

            </table>

            <br>

			

			<table class="wp-list-table widefat fixed bookmarks">

            	<thead>

                <tr>

                	

					

					<th>Articles</th>

                </tr>

                </thead>

               



                <tbody>

                <tr>

                	<td>

                    <ul class="uaf_list">

                    	<li><a href="https://jaaadesign.nl/en/blog/wpml-language-switcher-amp/" target="_blank">WPML language switcher in AMP</a></li>

                        <li><a href="https://jaaadesign.nl/en/blog/wordpress-amp/" target="_blank">WordPress AMP tutorial</a></li>

                        <li><a href="https://jaaadesign.nl/en/blog/what-is-structured-data/" target="_blank">What is Structured Data?</a></li>

                        <li><a href="https://jaaadesign.nl/en/blog/structured-data-examples/" target="_blank">Structured Data examples, tools and generators</a></li>

                    </ul>

                    </td>

                </tr>

                </tbody>

            </table>

            <br>

			

        <table class="wp-list-table widefat fixed bookmarks">

            	<thead>

                <tr>

                	

					

					<th>Keep in touch</th>

                </tr>

                </thead>

               



                <tbody>

                <tr>

                	<td>

                    <ul class="uaf_list">

                        <li><a href="https://jaaadesign.nl/en/contact/" target="_blank">Contact Us</a></li>

                    </ul>

                    </td>

                </tr>

                </tbody>

            </table>

            <br>

         

            

        </td>

    </tr>

</tbody></table>

</div>

<?php 

}

 
 
 
 
 
 
 
 
 //* Global 

$priohook = get_option( 'set_prio_hook_amp_rel' );

add_action('amp_post_template_footer', 'amp_related_function_global', $priohook);

function amp_related_function_global() {
	
	global $post;

if ( function_exists('is_amp_endpoint') && get_option( 'use_hook_rel' ) == '1' && is_single() && !is_page() ) {
	

$numm1 = get_option( 'exclude_any_id_amp_1_rel' );

$numm2 = get_option( 'exclude_any_id_amp_2_rel' );

$numm3 = get_option( 'exclude_any_id_amp_3_rel' );

$numm4 = get_option( 'exclude_any_id_amp_4_rel' );

$numm5 = get_option( 'exclude_any_id_amp_5_rel' );


$type1 = get_option( 'type_check_post_amp_rel' );

$type2 = get_option( 'cust_post_supp_amp_rel' );


$maxamp = get_option( 'max_amp_rel' );

$category = get_the_category($post->ID);
$category = $category[0]->cat_ID;



// WP_Query arguments

$args = array (

	'post_type'              => array( $type1, $type2 ),

	'order'                  => 'DESC',

	'orderby'                => 'rand',

	'showposts' 			 => $maxamp,

 	'post__not_in'			 => array (get_the_ID(), $numm1, $numm2, $numm3, $numm4, $numm5 ),

	'post_status'            => 'publish',
 
	'category__in' 			 => array($category),

); 


$attappendamp = get_option( 'append_amp_rel' );

$attheadingamp = get_option( 'heading_amp_rel' );

$ampthumb = get_the_post_thumbnail( 'thumbnail' );


echo '<div class="jd-css-plugins-rel">';

echo '<div class="jd-css-plugins-cont">';

echo '<div class="jd-css-plugins-inner">';

echo '<h3>'.$attheadingamp.'</h3>';

echo '<ul>';






// The Query

$query = new WP_Query( $args );



// The Loop

if ( $query->have_posts() ) {

	while ( $query->have_posts() ) {

		$query->the_post();

		// do something

$ampthumb = get_the_post_thumbnail_url();

$ampthumbalt = get_the_title(); 

$ampdefimg = plugin_dir_url( __FILE__ ) . 'images/default-thumb.jpg';

$ampdate = get_the_date();





// Featured image + has thumb + date

	if ( get_option( 'sel_thumb_amp_rel' ) == '1' && has_post_thumbnail() && get_option( 'sel_date_amp_rel' ) == '1') {

	 	echo '<li><a href="'. get_permalink() .''.$attappendamp.'/"><div class="ampimgcont"><amp-img src="'. $ampthumb .'" alt="'. $ampthumbalt .'" height="70" width="70"></amp-img></div><div class="amplinkcont">'.get_the_title().'</a><p>'. $ampdate .'</p></div></li>';	

 }

 // Featured image + has thumb 

 	else if ( get_option( 'sel_thumb_amp_rel' ) == '1' && has_post_thumbnail() && !get_option( 'sel_date_amp_rel' ) == '1') {

	 	echo '<li><a href="'. get_permalink() .''.$attappendamp.'/"><div class="ampimgcont"><amp-img src="'. $ampthumb .'" alt="'. $ampthumbalt .'" height="70" width="70"></amp-img></div><div class="amplinkcont">'.get_the_title().'</a></div></li>';	

 }



 // Featured image + NO thumb + date

 

 else if ( get_option( 'sel_thumb_amp_rel' ) == '1' && !has_post_thumbnail() && get_option( 'sel_date_amp_rel' ) == '1') {

	 	echo '<li><a href="'. get_permalink() .''.$attappendamp.'/"><div class="ampimgcont"><amp-img src="'. $ampdefimg .'" alt="'. $ampthumbalt .'" height="70" width="70"></amp-img></div><div class="amplinkcont">'.get_the_title().'</a><p>'. $ampdate .'</p></div></li>';	

 }

 

  // Featured image + NO thumb + NO date

 else if ( get_option( 'sel_thumb_amp_rel' ) == '1' && !has_post_thumbnail() && !get_option( 'sel_date_amp_rel' ) == '1') {

	 	echo '<li><a href="'. get_permalink() .''.$attappendamp.'/"><div class="ampimgcont"><amp-img src="'. $ampdefimg .'" alt="'. $ampthumbalt .'" height="70" width="70"></amp-img></div><div class="amplinkcont">'.get_the_title().'</a></div></li>';	

 }

 // NO featured image + date

else if ( !get_option( 'sel_thumb_amp_rel' ) == '1' && get_option( 'sel_date_amp_rel' ) == '1' ) {

	 	echo '<li><a href="'. get_permalink() .''.$attappendamp.'/"><div class="amplinkcont">'.get_the_title().'</a><p>'. $ampdate .'</p></div></li>';	

}

 // NO featured image + NO date

else if ( !get_option( 'sel_thumb_amp_rel' ) == '1' && !get_option( 'sel_date_amp_rel' ) == '1' ) {

	 	echo '<li><a href="'. get_permalink() .''.$attappendamp.'/"><div class="amplinkcont">'.get_the_title().'</a></div></li>';	

 	}	

	

}

	

} else {

	echo '<p>No related posts found</p>';

}

	

echo '</ul>';

echo '</div>'; 

echo '</div>'; 

echo '</div>'; 

   

// Restore original Post Data

wp_reset_postdata();	 



}

}
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
// Shortcode
 
 
 function amp_related_posts_function($atts, $append, $heading, $max) {


   extract(shortcode_atts(array(

    	  'append' 	=> 'amp',

	      'heading' => null,

		  'max' 	=> 10,

		  'cpt1' 	=> null,

		  'cpt2' 	=> null,

		  'cpt3' 	=> null,		  

		  ), $atts));

$return_string = '<ul>';

$category = get_the_category($post->ID);
$category = $category[0]->cat_ID;

 $args = array (

 	'post_type'              => array( 'post' ),

	'post_status'            => 'publish',

	'order'                  => 'DESC',

	'orderby'                => 'date',

	'showposts' 			 => $max,

	'post__not_in'			 => array (get_the_ID()),

	'heading'				 => $heading,

	'append'			     => $append,
	'category__in' 			 => array($category),
);

echo '<div class="jd-css-plugins-rel-short">';
echo '<h3>'.$heading.'</h3>';

echo '<ul>';

// The Query

$query = new WP_Query( $args );

// The Loop

if ( $query->have_posts() ) {

	while ( $query->have_posts() ) {

		$query->the_post();

		// do something

		echo '<li><a href="'.get_permalink().''.$append.'/">'.get_the_title().'</a></li>';
	}

} else {

	echo '<p>No posts found</p>';

}

echo '<ul>';
echo '</div>';

// Restore original Post Data

wp_reset_postdata();	 

}

function register_shortcode_amp_rel(){

   add_shortcode('amp-related-posts', 'amp_related_posts_function');

}
add_action( 'init', 'register_shortcode_amp_rel');








//*  AMP Plugin extra styles

add_action( 'amp_post_template_css', 'jd_css_plugins_rel', 998 );

function jd_css_plugins_rel( $amp_template ) {

	 if ( function_exists('is_amp_endpoint') && get_option( 'use_hook_rel' ) == '1' && is_single() && !is_page() ) {

    // only CSS here please...

    ?>

 div.jd-css-plugins-rel div.jd-css-plugins-cont {
    max-width: 841px;
    width: 100%;
    margin: auto;
}
 div.jd-css-plugins-rel div.jd-css-plugins-inner {
    padding: 16px 16px 35px 16px;
}

div.jd-css-plugins-rel li {

    margin-bottom: initial;

    margin-left: 20px;
}

div.jd-css-plugins-rel div.amplinkcont {
  line-height: 1.6;
   padding-right: 16px;
position: relative;
    display: block;
}

 div.jd-css-plugins-rel div.amplinkcont p {

    font-size: 87%;

    opacity: .7;

    line-height: 1.4;

}
div.jd-css-plugins-rel-short {
  padding: 16px 16px 35px 16px;
}
div.jd-css-plugins-rel-short li {
    margin-bottom: initial;
    margin-left: 20px;
}


	<?php 
	}
}

 

 //*  AMP Plugin extra styles priority

add_action( 'amp_post_template_css', 'jd_css_plugins_rel_prio', 999 );

function jd_css_plugins_rel_prio( $amp_template ) {


if ( function_exists('is_amp_endpoint') && get_option( 'sel_thumb_amp_rel' ) == '1' && get_option( 'use_hook_rel' ) == '1' && is_single() && !is_page() ) {

    // only CSS here please...

    ?>

 div.jd-css-plugins-rel li {

    margin-bottom: initial;

    margin-left: 0px;

    list-style-type: none;

}

 div.jd-css-plugins-rel div.amplinkcont {

    margin-left: 2px;

    position: absolute;

    display: inline-block;

}

 div.jd-css-plugins-rel div.ampimgcont {

    height: 70px;

    width: 70px;

    padding: 2px;

    border: 1px solid #ddd;

    margin: 0px 10px 16px 0px;

    display: inline-block;

}

	<?php 

 }

}


















