<?php

class APBridge_TwigExtension extends Twig_Extension {
    private $js = array();

	protected $options = array();

    public function getFunctions() {
        return array(
			'__' => new Twig_Function_Function('__', array('is_safe' => array('html'))),

			'get_header' => new Twig_Function_Function('get_header'),
			'get_footer' => new Twig_Function_Function('get_footer'),
			'wp_meta' => new Twig_Function_Function('wp_meta'),
			'comments_template' => new Twig_Function_Function('comments_template'),

			'have_posts' => new Twig_Function_Function('have_posts'),
			'is_singular' => new Twig_Function_Function('is_singular'),
			'is_single' => new Twig_Function_Function('is_single'),
			'is_user_logged_in' => new Twig_Function_Function('is_user_logged_in'),

			'is_404' => new Twig_Function_Function('is_404'),
			'is_category' => new Twig_Function_Function('is_category'),
			'is_day' => new Twig_Function_Function('is_day'),
			'is_month' => new Twig_Function_Function('is_month'),
			'is_year' => new Twig_Function_Function('is_year'),
			'is_search' => new Twig_Function_Function('is_search'),
			'is_paged' => new Twig_Function_Function('is_paged'),
			'is_tag' => new Twig_Function_Function('is_tag'),
			'is_author' => new Twig_Function_Function('is_author'),
			'is_date' => new Twig_Function_Function('is_date'),
			'is_home' => new Twig_Function_Function('is_home'),
			'is_page' => new Twig_Function_Function('is_page'),

			'wp_register' => new Twig_Function_Method($this, 'wpRegister', array('is_safe' => array('html'))),
			'wp_loginout' => new Twig_Function_Method($this, 'wpLoginout', array('is_safe' => array('html'))),

			'comments_open' => new Twig_Function_Function('comments_open'),
			'pings_open' => new Twig_Function_Function('pings_open'),
			'single_tag_title' => new Twig_Function_Function('single_tag_title', array('is_safe' => array('html'))),

			'home_url_esc' => new Twig_Function_Method($this, 'homeUrlEsc', array('is_safe' => array('html'))),

			'wp_enqueue_script' => new Twig_Function_Function('wp_enqueue_script'),
			'is_with_comments' => new Twig_Function_Method($this, 'getWithComments'),

			'wp_login_url' => new Twig_Function_Function('wp_login_url', array('is_safe' => array('html'))),
			'wp_logout_url' => new Twig_Function_Function('wp_logout_url', array('is_safe' => array('html'))),
			'allowed_tags' => new Twig_Function_Function('allowed_tags', array('is_safe' => array('html'))),
			'comment_id_fields' => new Twig_Function_Function('get_comment_id_fields', array('is_safe' => array('html'))),
			'get_permalink' => new Twig_Function_Function('get_permalink', array('is_safe' => array('html'))),
			'get_user_identity' => new Twig_Function_Method($this, 'getUserIdentity', array('is_safe' => array('html'))),
			'comment_author' => new Twig_Function_Method($this, 'getCommentAuthor', array('is_safe' => array('html'))),
			'comment_author_email' => new Twig_Function_Method($this, 'getCommentAuthorEmail', array('is_safe' => array('html'))),
			'comment_author_url' => new Twig_Function_Method($this, 'getCommentAuthorUrl', array('is_safe' => array('html'))),
			'comments_number' => new Twig_Function_Method($this, 'commentsNumber', array('is_safe' => array('html'))),
			'previous_comments_link' => new Twig_Function_Function('get_previous_comments_link', array('is_safe' => array('html'))),
			'next_comments_link' => new Twig_Function_Function('get_next_comments_link', array('is_safe' => array('html'))),
			'wp_list_comments' => new Twig_Function_Method($this, 'getWpListComments', array('is_safe' => array('html'))),

			'get_post' => new Twig_Function_Method($this, 'getPostGlobal'),
			'get_posts' => new Twig_Function_Method($this, 'getPostsGlobal'),
			'do_action' => new Twig_Function_Function('do_action'),
			'post_password_required' => new Twig_Function_Function('post_password_required'),
			'have_comments' => new Twig_Function_Function('have_comments'),
			'user_display_name' => new Twig_Function_Method($this, 'getUserDisplayName', array('is_safe' => array('html'))),

			'require_name_email' => new Twig_Function_Method($this, 'requireNameEmail', array('is_safe' => array('html'))),

			'filter_search_form' => new Twig_Function_Method($this, 'filterSearchForm', array('is_safe' => array('html'))),

			'single_cat_title' => new Twig_Function_Function('single_cat_title', array('is_safe' => array('html'))),
			'get_search_query' => new Twig_Function_Method($this, 'getSearchQuery'), // not safe
			'post_class' => new Twig_Function_Method($this, 'getPostClass', array('is_safe' => array('html'))),
			'body_class' => new Twig_Function_Method($this, 'getBodyClass', array('is_safe' => array('html'))),
			'the_ID' => new Twig_Function_Function('get_the_ID', array('is_safe' => array('html'))),
			'the_permalink' => new Twig_Function_Function('get_permalink', array('is_safe' => array('html'))),
			'the_title' => new Twig_Function_Function('get_the_title', array('is_safe' => array('html'))),
			'the_time' => new Twig_Function_Function('get_the_time', array('is_safe' => array('html'))),
			'the_author' => new Twig_Function_Function('get_the_author', array('is_safe' => array('html'))),
			'the_content' => new Twig_Function_Method($this, 'getTheContent', array('is_safe' => array('html'))),
            'the_title_attribute' => new Twig_Function_Method($this, 'getTheTitleAttribute', array('is_safe' => array('html'))),
			'language_attributes' => new Twig_Function_Method($this, 'getLanguageAttributes', array('is_safe' => array('html'))),
			'bloginfo' => new Twig_Function_Function('get_bloginfo', array('is_safe' => array('html'))),
			'get_option' => new Twig_Function_Function('get_option', array('is_safe' => array('html'))),
			'wp_title' => new Twig_Function_Method($this, 'getWpTitle', array('is_safe' => array('html'))),
			'trackback_url' => new Twig_Function_Function('get_trackback_url', array('is_safe' => array('html'))),

			'wp_head' => new Twig_Function_Method($this, 'getWpHead', array('is_safe' => array('html'))),
			'wp_footer' => new Twig_Function_Method($this, 'getWpFooter', array('is_safe' => array('html'))),
			'the_tags' => new Twig_Function_Method($this, 'getTheTags', array('is_safe' => array('html'))),
			'get_the_category_list' => new Twig_Function_Function('get_the_category_list', array('is_safe' => array('html'))),
			'edit_post_link' => new Twig_Function_Method($this, 'getEditPostLink', array('is_safe' => array('html'))),
			'comments_popup_link' => new Twig_Function_Method($this, 'getCommentsPopupLink', array('is_safe' => array('html'))),
			'next_posts_link' => new Twig_Function_Function('get_next_posts_link', array('is_safe' => array('html'))),
			'previous_posts_link' => new Twig_Function_Function('get_previous_posts_link', array('is_safe' => array('html'))),
			'get_search_form' => new Twig_Function_Method($this, 'getSearchForm', array('is_safe' => array('html'))),
			'get_post_comments_feed_link' => new Twig_Function_Function('get_post_comments_feed_link', array('is_safe' => array('html'))),

			'next_post_link' => new Twig_Function_Method($this, 'nextPostLink', array('is_safe' => array('html'))),
			'previous_post_link' => new Twig_Function_Method($this, 'previousPostLink', array('is_safe' => array('html'))),


			'wp_list_pages' => new Twig_Function_Method($this, 'wpListPages', array('is_safe' => array('html'))),
			'wp_link_pages' => new Twig_Function_Method($this, 'wpLinkPages', array('is_safe' => array('html'))),
			'wp_get_archives' => new Twig_Function_Method($this, 'wpGetArchives', array('is_safe' => array('html'))),
			'wp_list_bookmarks' => new Twig_Function_Method($this, 'wpListBookmarks', array('is_safe' => array('html'))),
			'wp_list_categories' => new Twig_Function_Method($this, 'wpListCategories', array('is_safe' => array('html'))),


            'put_js' => new Twig_Function_Method($this, 'putJs', array('is_safe' => array('html'))),
            'print_js' => new Twig_Function_Method($this, 'printJs', array('is_safe' => array('html'))),
        );
    }

	public function wpRegister($before = '<li>', $after = '</li>') {
		return wp_register($before, $after, false);
	}

	public function wpLoginout($redirect = '') {
		return wp_loginout($redirect, false);
	}

	public function getWpListComments($args = array(), $comments = null) {
		ob_start();
		wp_list_comments($args, $comments);
		$output = ob_get_clean();

		return $output;
	}

	public function requireNameEmail() {
		return $this->getOption('require_name_email');
	}

	public function getOption($name) {
		if (!isset($this->options[$name])) {
			$this->options[$name] = get_option($name);
		}
		return $this->options[$name];
	}

	public function previousPostLink($format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '') {
		ob_start();
		previous_post_link($format, $link, $in_same_cat, $excluded_categories);
		$output = ob_get_clean();

		return $output;
	}

	public function nextPostLink($format='&raquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '') {
		ob_start();
		next_post_link($format, $link, $in_same_cat, $excluded_categories);
		$output = ob_get_clean();

		return $output;
	}

	public function wpListPages($args = '') {
        $args = wp_parse_args( $args, array() );
		$args['echo'] = 0;

		return wp_list_pages($args);
	}

	public function wpLinkPages($args = '') {
        $args = wp_parse_args( $args, array() );
		$args['echo'] = 0;

		return wp_link_pages($args);
	}

	public function wpGetArchives($args = '') {
        $args = wp_parse_args( $args, array() );
		$args['echo'] = 0;

		return wp_get_archives($args);
	}

	public function wpListBookmarks($args = '') {
        $args = wp_parse_args( $args, array() );
		$args['echo'] = 0;

		return wp_list_bookmarks($args);
	}


	public function wpListCategories($args = '') {
        $args = wp_parse_args( $args, array() );
		$args['echo'] = 0;

		return wp_list_categories($args);
	}

	public function homeUrlEsc($path = '', $scheme = null) {
		return esc_url(home_url($path, $scheme));
	}

	public function filterSearchForm($content) {
		return apply_filters('get_search_form', (string) $content);
	}

	public function getSearchQuery() {
		return get_search_query(false);
	}

	public function getSearchForm() {
		return get_search_form(false);
	}

	public function getTheContent($more_link_text = null, $stripteaser = false) {
		ob_start();
		the_content($more_link_text, $stripteaser);
		$output = ob_get_clean();

		return $output;
	}

	public function getTheTags($before = null, $sep = ', ', $after = '') {
		if ( null === $before )
			$before = __('Tags: ');
		return get_the_tag_list($before, $sep, $after);
	}

	public function getUserIdentity() {
		global $user_identity;

		return $user_identity;
	}

	public function getCommentAuthor() {
		global $comment_author;

		return $comment_author;
	}

	public function getCommentAuthorEmail() {
		global $comment_author_email;

		return $comment_author_email;
	}

	public function getCommentAuthorUrl() {
		global $comment_author_url;

		return $comment_author_url;
	}

	public function getWithComments() {
		global $withcomments;

		return $withcomments;
	}

	public function getPostGlobal() {
		global $post;

		return $post;
	}

	public function getPostsGlobal() {
		global $posts;

		return $posts;
	}

	public function getUserDisplayName() {
		$userdata = get_userdatabylogin(get_query_var('author_name'));
		return $userdata->display_name;
	}

	public function getWpTitle($sep = '&raquo;', $seplocation = '') {
		return wp_title($sep, false, $seplocation);
	}

	public function getLanguageAttributes($doctype = 'html') {
		ob_start();
		language_attributes($doctype);
		$output = ob_get_clean();

		return $output;
	}

	public function getEditPostLink($link = null, $before = '', $after = '', $id = 0) {
		ob_start();
		edit_post_link($link, $before, $after, $id);
		$output = ob_get_clean();

		return $output;
	}

	public function getWpHead() {
		ob_start();
		wp_head();
		$output = ob_get_clean();

		return $output;
	}

	public function getCommentsPopupLink($zero = false, $one = false, $more = false, $css_class = '', $none = false) {
		ob_start();
		comments_popup_link($zero, $one, $more, $css_class, $none);
		$output = ob_get_clean();

		return $output;
	}

	public function commentsNumber( $zero = false, $one = false, $more = false ) {
		ob_start();
		comments_number($zero, $one, $more);
		$output = ob_get_clean();

		return $output;
	}


	public function getWpFooter() {
		ob_start();
		wp_footer();
		$output = ob_get_clean();

		return $output;
	}

	public function getBodyClass($class = '') {
		$classes = get_body_class($class);
		$classes = implode(' ', $classes);
		return 'class="' . $classes . '"';
	}

	public function getPostClass($class = '') {
		$classes = get_post_class($class);
		$classes = implode(' ', $classes);
		return 'class="' . $classes . '"';
	}

	public function getTheTitleAttribute() {
		return the_title_attribute('echo=0');
	}

    public function putJs($js) {
        $this->js[] = $js;
    }

    public function printJs() {
        return implode(PHP_EOL, $this->js);
    }

    public function getName() {
        return 'apbridge';
    }

}
