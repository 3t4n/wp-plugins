<?php
/*
Plugin Name: Disable Comments Selectively
Version: 0.15
Description: Selectively disable comments by post type, taxonomy or term. Go to Settings-><strong>Discussion</strong> to configure which posts won't show comments.
Author: Keith Drakard
Author URI: https://drakard.com/
*/

class DisableCommentsSelectivelyPlugin {

	public function __construct() {
		load_plugin_textdomain('DisableCommentsSelectively', false, plugin_dir_path(__FILE__).'/languages');

		$this->settings = get_option('DisableCommentsSelectivelyPlugin', array(
			'types' => array(),			// select by post type
			'taxonomies' => array(),	// or by whole taxonomy
			'terms' => array(),			// or by individual terms
		));
		$this->show_comments = true;

		if (is_admin()) {
			add_action('init', array($this, 'load_admin'));

		} else {

			add_action('wp', array($this, 'check_if_have_match'));

			// this works to hide existing comments, the form and the feed link
			add_action('wp', array($this, 'zero_comments'), 99);
			
			// need this for at least 2010, 2011, 2012 and 2013 archive pages (meta section)
			add_filter('comments_open', array($this, 'close_comments_and_pings'), 99, 2);
			add_filter('pings_open', array($this, 'close_comments_and_pings'), 99, 2);

			// need this for themes that test like "( comments_open() || get_comments_number() )"
			add_filter('get_comments_number', array($this, 'filter_number'), 99, 2);

			// default WP recent comment widget calls this filter
			add_filter('widget_comments_args', function($args) {
				if (! isset($this->closed_post_ids)) $this->closed_post_ids = $this->not_these_posts();
				if (sizeof($this->closed_post_ids)) {
					$args['post__not_in'] = $this->closed_post_ids;
				}
				return $args;
			}, 99); 

			// a bit of a hack, as befitting WPs feed "API"
			add_filter('comment_feed_where', function($where) {
				if (! isset($this->closed_post_ids)) $this->closed_post_ids = $this->not_these_posts();
				if (sizeof($this->closed_post_ids)) {
					$where.= ' AND comment_post_ID NOT IN ('.implode(',', $this->closed_post_ids).')';
				}
				return $where;
			}, 99);

			// catch comments being submitted (from the frontend) to disabled posts
			add_filter('pre_comment_approved', function($approved, $commentdata) {
				if (! isset($this->closed_post_ids)) $this->closed_post_ids = $this->not_these_posts();
				if (in_array($commentdata['comment_post_ID'], $this->closed_post_ids)) {
					$approved = new WP_Error('comment_closed', __('Comments for this post are closed.', 'DisableCommentsSelectively'), 410);
				}
				return $approved;
			}, 99, 2);

		}
	}


	public function activation_hook() {
		update_option('DisableCommentsSelectivelyPlugin', $this->settings, false);
	}

	public function deactivation_hook() {
		delete_option('DisableCommentsSelectivelyPlugin');
	}

	public function load_admin() {
		// in general, don't bother adding anything if we can't use it
		if (current_user_can('manage_options')) {

			// WP BUG re "public": https://core.trac.wordpress.org/ticket/18950
			$this->taxonomies = get_taxonomies(array('public' => true, 'show_ui' => true), 'objects'); ksort($this->taxonomies);
			$this->types = array_filter(
				get_post_types(array('public' => true, 'show_ui' => true), 'objects'),
				function ($k) { return (post_type_supports($k, 'comments')); },
				ARRAY_FILTER_USE_KEY
			); ksort($this->types);

			add_action('admin_init', array($this, 'settings_init'));
			add_action('admin_enqueue_scripts', function() {
				wp_enqueue_script('disable-comments-by-taxonomy-script', plugins_url('admin.js', __FILE__), array(), false, true);
			});
		}
	}


	/******************************************************************************************************************************************************************/


	public function settings_init() {
		register_setting('discussion', 'DisableCommentsSelectivelyPlugin', array($this, 'validate_settings'));
		add_settings_field('DisableCommentsSelectivelySettings', __('Disable Comments Selectively', 'DisableCommentsSelectively'), array($this, 'settings_form'), 'discussion', 'default');
	}



	public function settings_form() {
		$odd = true;

		$output = '<fieldset id="dcbt"><legend class="screen-reader-text">'.__('Disable Comments Selectively', 'DisableCommentsSelectively').'</legend>';

		foreach ($this->types as $key => $type) {
			$checked = (in_array($key, $this->settings['types'])) ? ' checked="checked"' : '';
			$class = ($odd) ? 'alternate' : ''; $odd = (! $odd);
			$output.= '<div class="'.$class.' regular-text" style="padding:1vh 1vw;margin:0 0 1vh;border:1px solid #ccc;">'
						. '<label for="dcs_'.$key.'">'
							. '<input type="checkbox" id="'.esc_attr("dcs_{$key}").'" name="'.esc_attr("DisableCommentsSelectivelyPlugin[{$key}]").'" value="true" '.$checked.'>'
							. wp_sprintf(' %s %s', __('All', 'DisableCommentsSelectively'), $type->label)
						. '</label>'
					. '</div>';
		}

		$output.= '<hr class="widefat" style="margin:0 0 1vh">';

		$sorted_terms = $this->get_terms_hierarchically_and_sorted();
		foreach ($this->taxonomies as $key => $tax) {
			$checked = (in_array($key, $this->settings['taxonomies'])) ? ' checked="checked"' : '';

			$class = ($odd) ? 'alternate' : ''; $odd = (! $odd);
			$output.= '<div class="'.$class.' regular-text" style="padding:1vh 1vw;margin:0 0 1vh;border:1px solid #ccc;">'
					. '<label for="dcs_'.$key.'">'
						. '<input type="checkbox" id="'.esc_attr("dcs_{$key}").'" name="'.esc_attr("DisableCommentsSelectivelyPlugin[{$key}]").'" value="true" '.$checked.'>'
						. wp_sprintf(' %s %s', __('All', 'DisableCommentsSelectively'), $tax->label)
					. '</label><br>';

			if (isset($sorted_terms[$tax->label])) {
				$output.= '<select class="widefat" id="'.esc_attr("dcs_{$key}_terms").'" name="'.esc_attr("DisableCommentsSelectivelyPlugin[{$key}_terms][]").'" multiple="true">'
						. $this->display_options_recursively($sorted_terms[$tax->label])
						. '</select>';
			}

			$output.= '</div>';
		}

		$output.= wp_sprintf(
					'<p class="description">%s</p><p class="description">%s</p>',
					__('This will override both the default article settings defined at the top of this page, and any individual article settings.', 'DisableCommentsSelectively'),
					__('If a post is of a matching post type, or has a term in a selected taxonomy, then (as long as your theme follows the usual WP standards) there should be no comments or comment form shown on the frontend.', 'DisableCommentsSelectively')
				);

		$output.= '</fieldset>';

		echo $output;
	}


	private function display_options_recursively($terms = array(), $level = 0) {
		$output = '';
		foreach ($terms as $i => $term) {
			$selected = (in_array($term->taxonomy, $this->settings['taxonomies']) OR in_array($term->term_id, $this->settings['terms'])) ? ' selected="selected"' : '';
			$padded_name = str_repeat('-- ', $level).$term->name;
			$output.= '<option class="level-'.$level.'" value="'.$term->term_id.'"'.$selected.'>'.$padded_name.' ('.$term->count.')</option>';
			if (isset($term->children) AND sizeof($term->children)) $output.= $this->display_options_recursively($term->children, $level+1);
		}
		return $output;
	}


	public function validate_settings($input) {
		// reset our settings to no options chosen
		$settings = array('types' => array(), 'taxonomies' => array(), 'terms' => array());

		if (! isset($input) OR ! isset($_POST['DisableCommentsSelectivelyPlugin']) OR
			! is_array($input) OR ! is_array($_POST['DisableCommentsSelectivelyPlugin'])
		) return $settings;

		// I've been assuming there's no overlap because WP permalinks should complain before you get this far...
		$type_keys = array_keys($this->types);
		$tax_keys = array_keys($this->taxonomies);
		foreach ($input as $key => $value) {
			if (in_array($key, $type_keys) AND $value == true) {
				$settings['types'][] = $key;
			// selecting whole taxonomies overrides selecting by individual terms
			} elseif (in_array($key, $tax_keys) AND $value == true) {
				$settings['taxonomies'][] = $key;
			} else {
				$tax = substr_replace($key, '', -6); // strip _terms
				if (! in_array($tax, $settings['taxonomies']) AND in_array($tax, $tax_keys) AND is_array($value)) {
					foreach ($value as $term_id) {
						$settings['terms'][] = (int) $term_id;
					}
				}
			}
		}

		return $settings;
	}


	private function get_terms_hierarchically_and_sorted() {
		$all_terms = get_terms(array(
			'taxonomy'				 => array_keys($this->taxonomies),
			'hide_empty'			 => false,
			'update_term_meta_cache' => false,
		));
		$return = array();
		foreach ($all_terms as $i => $term) {
			$tax = get_taxonomy($term->taxonomy);
			if (! isset($return[$tax->label])) $return[$tax->label] = array();
			$return[$tax->label][] = $term;
		}
		foreach ($return as $taxonomy => $terms) {
			$hier = array(); $this->sort_terms_hierarchically($terms, $hier);
			$return[$taxonomy] = $hier;
		}
		ksort($return);
		return $return;
	}


	// by pospi @ http://wordpress.stackexchange.com/a/99516
	private function sort_terms_hierarchically(array &$cats, array &$into, $parentId = 0) {
		foreach ($cats as $i => $cat) {
			if ($cat->parent == $parentId) {
				$into[$cat->term_id] = $cat;
				unset($cats[$i]);
			}
		}
		foreach ($into as $topCat) {
			$topCat->children = array();
			$this->sort_terms_hierarchically($cats, $topCat->children, $topCat->term_id);
		}
	}




	/******************************************************************************************************************************************************************/

	public function check_if_have_match() {
		if (is_singular()) {

			if (in_array(get_post_type(), $this->settings['types'])) {
				$this->show_comments = false;
				return; // skip the following tax/term checks
			}

			global $post;
			// if (! post_type_supports($post->ID, 'comments')) return;	// bail if the post doesn't support comments - but this can miss if you enable support, comment and then disable support, so I'm leaving this commented out for now
			$post_terms = wp_get_post_terms($post->ID, get_object_taxonomies($post, 'names')); // not names but keys

			// have we got a match on a whole taxonomy?
			$post_taxes = array_unique(array_column($post_terms, 'taxonomy'));
			if (sizeof(array_intersect($post_taxes, $this->settings['taxonomies'])) > 0) {
				$this->show_comments = false;
				return; // save a milli micro second by skipping the following term check...
			}

			// or a specific term?
			$post_terms_ids = array_column($post_terms, 'term_id');
			if (sizeof(array_intersect($post_terms_ids, $this->settings['terms'])) > 0) {
				$this->show_comments = false;
			}

		} elseif (is_home() OR is_archive() OR is_search()) {

			$this->closed_post_ids = $this->not_these_posts();

		}
	}


	public function zero_comments() {
		if ($this->show_comments) return;
		global $post, $wp_query;
		$wp_query->current_comment = $wp_query->comment_count = $post->comment_count = 0;
		$post->comment_status = $post->ping_status = 'closed';
		// wp_cache_set($post->ID, $post, 'posts');
	}


	public function filter_number($count, $post_id) {
		if (is_singular() AND ! $this->show_comments) {
			$count = 0;
		} elseif (isset($this->closed_post_ids) AND in_array($post_id, $this->closed_post_ids)) {
			$count = 0;
		}
		return $count;
	}

	public function close_comments_and_pings($open, $post_id) {
		if (is_singular() AND ! $this->show_comments) {
			$open = false;
		} elseif (isset($this->closed_post_ids) AND in_array($post_id, $this->closed_post_ids)) {
			$open = false;
		}
		return $open;
	}


	private function not_these_posts() {
		if (empty($this->settings['types']) AND empty($this->settings['taxonomies']) AND empty($this->settings['terms'])) return array();

		// can't use $wpdb->prepare because of the IN (...) statement
		$types = '0=1'; if (sizeof($this->settings['types'])) {
			$types = 'p.post_type IN ('.implode(',', array_map(function($v) { return "'".esc_sql($v)."'"; }, $this->settings['types'])).')';
		}
		$taxes = '0=1'; if (sizeof($this->settings['taxonomies'])) {
			$taxes = 'tt.taxonomy IN ('.implode(',', array_map(function($v) { return "'".esc_sql($v)."'"; }, $this->settings['taxonomies'])).')';
		}
		// can't use esc_sql for numeric values either...
		$terms = '0=1'; if (sizeof($this->settings['terms'])) {
			$terms = 'tt.term_id IN ('.implode(',', array_map(function($v) { return (int) $v; }, $this->settings['terms'])).')';
		}

		global $wpdb;
		$sql = "SELECT p.ID
				FROM {$wpdb->prefix}posts AS p
				LEFT OUTER JOIN {$wpdb->prefix}term_relationships AS tr ON p.ID = tr.object_id
				LEFT OUTER JOIN {$wpdb->prefix}term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
				WHERE {$types} OR {$taxes} OR {$terms}"; // btw no GROUP or ORDER to avoid using temporary/filesort

		$post_ids = array_unique($wpdb->get_col($sql));
		return $post_ids;
	}


	/******************************************************************************************************************************************************************/

	/* old ways that I tried...

	add_filter('wp', array($this, 'override_cache'), 99);
	public function override_cache() {
		global $post;
		$post->comment_count = 0; // NOTE: at this point I was going to need to check against the not_these_posts() function on every page
		wp_cache_set($post->ID, $post, 'posts');
	}


	// ALSO: the 'post_comments_feed_link' blanked the url but left the rest of the html
	// and the 'post_comments_feed_link_html' filter didn't work at all (caching again?)
	// Both would have run first before they could be removed, so not ideal.


	// would have liked to use this but the action order prevents that - we don't know the current post to check before the type is loaded
	add_action('init', array($this, 'remove_comment_support'));
	public function remove_comment_support() {
		remove_post_type_support(POST_TYPE, 'comments');
	}


	// was also using this but suspect my browser was the sole cache annoyance during testing as forced refreshes work
	add_action('wp_feed_options', function($feed) { 
		$feed->lifetime = 0;
		$feed->unlink();
		$feed->enable_cache(false);
	});


	*/

}


$DisableCommentsSelectively = new DisableCommentsSelectivelyPlugin();
register_activation_hook(__FILE__, array($DisableCommentsSelectively, 'activation_hook'));
register_deactivation_hook(__FILE__, array($DisableCommentsSelectively, 'deactivation_hook'));
