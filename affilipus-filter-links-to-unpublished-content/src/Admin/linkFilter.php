<?php

namespace imbaa\AffilipusLinkfilter\Admin;


class linkFilter {


	function __construct() {

		//add_action('add_meta_boxes', [$this, 'register_meta_boxes']);
		//add_action('save_post', [$this, 'save_metabox_data']);

		//add_action( 'save_post', [$this,'purge_linkfilter'] );
		add_action( 'save_post', [$this,'check_links'] );




	}

	public function check_links($post_id){


		if(array_key_exists('post_content',$_POST)) {


			apply_filters('the_content',$_POST['post_content']);


		}

	}


	function register_meta_boxes(){

		$metabox = add_meta_box('affilipus-linkfilter-metabox', __( 'Link Filter', 'imbaf-linkfilter' ), [$this,'linkfilter_metabox_callback'], null, 'side');

	}

	function linkfilter_metabox_callback($post){



		?>

		<label><input type="checkbox" name="linkFilter[filterLinks]" value="1" <?php if(get_post_meta($post->ID,'_imbaf-linkfilter_filter_links',true) == 1){echo "checked";} ?>><?php _e( 'Filter aktivieren', 'imbaf-linkfilter' ) ?></label>
		<p class="description"><?php _e('Filtert Links zu noch nicht veröffentlichten Seiten aus dem Seitencontent heraus','imbaf-linkfilter'); ?></p>

		<?php


	}

	function save_metabox_data($post_id){


		if(array_key_exists('linkFilter',$_POST)) {

			update_post_meta($post_id,'_imbaf-linkfilter_filter_links',$_POST['linkFilter']['filterLinks']);


		} else {

			delete_post_meta($post_id,'_imbaf-linkfilter');
			
		}

	}

}
