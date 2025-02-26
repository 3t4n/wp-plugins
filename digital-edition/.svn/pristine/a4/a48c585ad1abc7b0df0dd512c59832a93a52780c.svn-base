<?php
/**
 * @package Digital-Edition
 * @version 0.2.2
 */
/*
Plugin Name: Digital Edition
Plugin URI: http://wp.timshedor.com/plugins/digital-edition-plugin/
Description: Hawk your content in a slick tablet/mobile optimized edition. For more on using and setting up this plugin, read the <a href="http://wp.timshedor.com/plugins/digital-edition-plugin/" title="Documentation">documentation</a>, or check <a href="http://wp.timshedor.com/digital-edition/sample" title="Sample">the example</a>.
Author: Tim Shedor
Version: 0.2.2
Author URI: http://timshedor.com
*/
/* Licenses of third-party elements:
Custom [Font Awesome](https://github.com/FortAwesome/Font-Awesome) build licensed under [SIL OFL 1.1](http://scripts.sil.org/OFL)
Owl Carousel licensed under the [MIT License (Expat)](https://github.com/OwlFonk/OwlCarousel/blob/master/LICENSE)
*/

/* Enqueue necessary scripts and styles, but only on the digital-edition pages */

add_filter( 'plugin_row_meta', 'digital_edition_plugin_meta_links', 10, 2 );
function digital_edition_plugin_meta_links( $links, $file ) {

	$plugin = plugin_basename(__FILE__);

	if ( $file == $plugin )
		return array_merge( $links, array( '<a href="http://wp.timshedor.com/digital-edition/sample" title="Sample">Sample</a>', '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=tshedor%40gmail%2ecom&item_name=Digital%20Edition%20%Plugin">Donate</a>' ) );
	return $links;
}

function tswp_digital_edition_scripts(){
	global $post;
	wp_register_script('digital-edition-script', plugins_url('js/digital-editions.js', __FILE__), array('jquery'));
	wp_register_style('digital-edition-style', plugins_url('css/digital-edition.css', __FILE__));
	wp_register_script('owl-carousel', plugins_url('js/owl.carousel.min.js', __FILE__), array('digital-edition-script'));
	if(is_singular('digital-edition')) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('digital-edition-script');
		wp_enqueue_style('foundation');
		wp_enqueue_style('digital-edition-style');
		wp_enqueue_script('owl-carousel');
	}
}
add_action( 'wp_enqueue_scripts', 'tswp_digital_edition_scripts');

//Register custom post type - each post is a digital edition
function tswp_digital_edition_register() {
	$labels = array(
		'name'				=>	_x('Digital Edition Posts', 'post type general name'),
		'singular_name'		=>	_x('Digital Edition Post', 'post type singular name'),
		'add_new'			=>	_x('Add New Digital Edition Post', 'digital_edition item'),
		'add_new_item'		=>	__('Add New Digital Edition Post'),
		'edit_item'			=>	__('Edit Digital Edition Post'),
		'new_item'			=>	__('New Digital Edition Post'),
		'view_item'			=>	__('View Digital Edition Post'),
		'search_items'		=>	__('Search Digital Edition Posts'),
		'not_found'			=>	__('Nothing found'),
		'menu_name'			=>	__('Digital Editions'),
		'all_items'			=>	__('Digital Edition Posts'),
		'parent_item_colon'	=>	''
	);

	$args = array(
		'labels'				=>	$labels,
		'public'				=>	true,
		'publicly_queryable'	=>	true,
		'show_ui'				=>	true,
		'query_var'				=>	true,
		'rewrite'				=>	true,
		'capability_type'		=>	'post',
		'hierarchical'			=>	false,
		'supports'				=>	array('title','thumbnail', 'author')
		);

	register_post_type( 'digital-edition' , $args );

	register_taxonomy("digital_edition_name", array("post", "digital-edition"), array("hierarchical" => true, "label" => "Digital Editions", "singular_label" => "Digital Edition", "rewrite" => true));

	flush_rewrite_rules();
}
add_action('init', 'tswp_digital_edition_register');


function tswp_add_digital_edition_meta_box() {
	add_meta_box(
	'tswp_digital_edition_meta_box',
	'Customize this Edition',
	'tswp_show_digital_edition_meta_box',
	'digital-edition',
	'normal',
	'high');
}
add_action('add_meta_boxes', 'tswp_add_digital_edition_meta_box');
$digital_edition_meta_fields = array(
	array(
		'label'	=> __('Header Color', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_header_color',
		'std'	=> '#358ccb',
		'type'	=> 'color',
	),
	array(
		'label'	=> __('Push content with navigation', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_push_content',
		'type'	=> 'radio',
		'options' => array(
			'one' => array(
				'label' => 'Yes',
				'value' => 'yes',
			),
			'two' => array(
				'label' => 'No',
				'value' => 'no'
			),
		)
	),
	array(
		'label'	=> __('Summary Text', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_short_summary',
		'std'	=> 'We worked really hard on this.',
		'type'	=> 'textarea',
	),
	array(
		'label'	=> __('Splash Image (proportionate to 2048x1536px)', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_splash',
		'std'	=> '',
		'type'	=> 'media',
	),
	array(
		'label'	=> __('Introduction', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_intro_copy',
		'std'	=> '',
		'type'	=> 'tinymce',
	),
	array(
		'label'	=> __('Anchor Image (proportionate to 2048x1536px)', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_anchor',
		'std'	=> '',
		'type'	=> 'media',
	),
	array(
		'label'	=> __('Colophon', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_colophon',
		'std'	=> '',
		'type'	=> 'tinymce',
	),
	array(
		'label'	=> __('Sponsor Full Page 1 (proportionate to 2048x1536px)', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_full_sponsor_1',
		'std'	=> '',
		'type'	=> 'media',
	),
	array(
		'label'	=> __('Sponsor Full Page 2 (proportionate to 2048x1536px)', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_full_sponsor_2',
		'std'	=> '',
		'type'	=> 'media',
	),
	array(
		'label'	=> __('Sponsor Full Page 3 (proportionate to 2048x1536px)', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_full_sponsor_3',
		'std'	=> '',
		'type'	=> 'media',
	),
	array(
		'label'	=> __('Sponsor Logo 1 (max 35x80px)', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_sponsor_logo_1',
		'std'	=> '',
		'type'	=> 'media',
	),
	array(
		'label'	=> __('Sponsor Link 1', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_sponsor_link_1',
		'std'	=> 'http://timshedor.com',
		'type'	=> 'text',
	),
	array(
		'label'	=> __('Sponsor Logo 2 (max 35x80px)', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_sponsor_logo_2',
		'std'	=> '',
		'type'	=> 'media',
	),
	array(
		'label'	=> __('Sponsor Link 2', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_sponsor_link_2',
		'std'	=> 'http://timshedor.com',
		'type'	=> 'text',
	),
	array(
		'label'	=> __('Sponsor Logo 3 (max 35x80px)', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_sponsor_logo_3',
		'std'	=> '',
		'type'	=> 'media',
	),
	array(
		'label'	=> __('Sponsor Link 3', 'tswpde'),
		'desc'	=> '',
		'id'	=> 'digital_edition_sponsor_link_3',
		'std'	=> 'http://timshedor.com',
		'type'	=> 'text',
	),
);

function tswp_show_digital_edition_meta_box() {
	global $digital_edition_meta_fields, $post;
	 wp_nonce_field( basename( __FILE__ ), 'digital_edition_meta_box_nonce' );
	echo "<script>jQuery(document).ready(function($){
	$('.custom_media_upload').click(function() {
		var clickedButton = $(this);
		var send_attachment_bkp = wp.media.editor.send.attachment;
		wp.media.editor.send.attachment = function(props, attachment) {
			$(clickedButton).siblings('.custom_media_image').attr('src', attachment.url);
			$(clickedButton).siblings('.custom_media_url').val(attachment.url);
			wp.media.editor.send.attachment = send_attachment_bkp;
		}
		wp.media.editor.open();
		return false;
	});
});</script><table class='form-table'>";
	foreach ($digital_edition_meta_fields as $field) {
		$meta = get_post_meta($post->ID, $field['id'], true);
		echo '<tr>';
				switch($field['type']) {
					case 'text' :
						echo '<td class="label"><strong>'.$field['label'].'</strong><br /><em>'.$field['desc'].'</em></td>
							<td class="cell"><input name="'.$field['id'].'" type="text" placeholder="'.$field['std'].'" value="',$meta ? $meta : '','" /></td>';
					break; case 'color' :
						echo '<td class="label"><strong>'.$field['label'].'</strong><br /><em>'.$field['desc'].'</em></td>
							<td class="cell"><input name="'.$field['id'].'" type="color" value="',$meta ? $meta : $field['std'],'" /></td>';
					break; case 'textarea' :
						echo '<td class="label"><strong>'.$field['label'].'</strong><br /><em>'.$field['desc'].'</em></td>
							<td class="cell"><textarea name="'.$field['id'].'" type="text" placeholder="'.$field['std'].'" style="width:80%; height:80px" />'.stripslashes($meta).'</textarea></td>';
					break; case 'media' :
						echo '<td class="label">'.$field['label'].'</td>
						<td class="cell">
							<input type="button" class="custom_media_upload button button-large button-primary" value="Add Media" />
							<input class="custom_media_url" type="text" name="'.$field['id'].'" value="',$meta ? $meta : '','" />
							<img class="custom_media_image" src="',$meta ? $meta : $field['std'],'" style="max-width:100%!important;"/>
						</td>';
					break; case 'radio':
						echo '<td class="label"><strong>'.$field['label'].'</strong></td><td class="cell">';
						foreach ( $field['options'] as $option ) {
							echo '<input type="radio" name="'.$field['id'].'" id="'.$option['value'].'" value="'.$option['value'].'" ',$meta == $option['value'] ? ' checked="checked"' : '';
							if(!$meta && $option['value'] == 'no'){
								echo 'checked="checked"';
							}
							echo ' />
									<label for="'.$option['value'].'">'.$option['label'].'</label>&nbsp;&nbsp;';
						}
						echo '</td>';
					break; case 'tinymce' :
						echo '<td class="label"><strong>'.$field['label'].'</strong></td>';
						if ( get_option( $field['id'] ) != "") { $val = stripslashes(get_option($field['id'])); } else { $val = stripslashes($field['std']); }
						echo '<td class="cell">';
						wp_editor( $val, $field['id'], array( 'textarea_name' => $field['id'], 'media_buttons' => true, 'textarea_rows' => 12, 'tinymce' => array( 'theme_advanced_buttons1' => 'formatselect,forecolor,|,bold,italic,underline,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,wp_adv' ) ) );
						echo '</td>';
					break;
				}
		echo '</tr>';
	}
	echo '</table>';
}
function tswp_save_digital_edition_meta($post_id) {
	global $digital_edition_meta_fields;

	if ( !isset( $_POST['digital_edition_meta_box_nonce'] )  || !wp_verify_nonce($_POST['digital_edition_meta_box_nonce'], basename(__FILE__)))
		return $post_id;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $post_id;
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return $post_id;
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
	}

	foreach ($digital_edition_meta_fields as $field) {
		if($field['type'] == 'tax_select') continue;
		  $old = get_post_meta($post_id, $field['id'], true);
		  $new = $_POST[$field['id']];
		  if (isset($new) && $new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		  } elseif ('' == $new && $old) {
		  	delete_post_meta($post_id, $field['id'], $old);
		}
	}
}
add_action('save_post', 'tswp_save_digital_edition_meta');

//Add support for post types
add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'image', 'quote', 'status', 'video', 'audio' ) );

//Add support for thumbnails for retrieval later
add_theme_support( 'post-thumbnails' );

function ts_wp_get_digital_edition_template($temp) {
	global $post;
	if ($post->post_type == 'digital-edition')
		$temp = dirname( __FILE__ ) . '/single-digital-edition.php';
	return $temp;
}

add_filter( "single_template", "ts_wp_get_digital_edition_template" ) ;
if(!class_exists('TSWPDE')) :
	class TSWPDE {
		//http://css-tricks.com/snippets/php/convert-hex-to-rgb/
		static function hex2rgb( $color ) {
			if ( $color[0] == '#' ) $color = substr( $color, 1 );
			if ( strlen( $color ) == 6 )
				list( $r, $g, $b ) = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			elseif ( strlen( $color ) == 3 )
				list( $r, $g, $b ) = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			else
				return false;
			$r = hexdec( $r );
			$g = hexdec( $g );
			$b = hexdec( $b );
			//return array( 'red' => $r, 'green' => $g, 'blue' => $b );
			return $r.','.$g.','.$b;
		}

		static function display_sponsor($number){
			global $cp,$post;
			$html = '';
			$link = false;
			$logo = false;
			if(get_post_meta($post->ID, 'digital_edition_sponsor_link_'.$number, true))
				$link = $cp['digital_edition_sponsor_link_'.$number][0];
			if(get_post_meta($post->ID, 'digital_edition_sponsor_logo_'.$number, true))
				$logo = $cp['digital_edition_sponsor_logo_'.$number][0];
			if($link){
				if($link != '' && $logo && $logo != '')
					$html = '<a href="'.$link.'" class="single-sponsor" target="_blank">';
			}
			if($logo){
				if($logo != '' && $link)
					$html .= '<img src="'.$logo.'" /></a>';
				else
					$html = '<a href="#" class="sponsor"><img src="'.$logo.'" /></a>';
			}
			echo $html;
		}

		static function post_protected($id){
			echo '<div class="de-password-form">
				<h1>'.get_the_title($id).'</h1>'.get_the_password_form().'</div>';
		}
	}
endif;
?>
