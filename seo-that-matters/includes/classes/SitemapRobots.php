<?php

namespace SeoThatMatters;

if (!defined('WPINC')) { die; }

class SeotmPluginSitemapRobots {
    
    private $options = [];
    private $home_url;
    private $sitemap_url;

	public function __construct() {
	    
	    $this->options = get_option(SEOTM_PREFIX . '_options', []);
	    $this->home_url = get_site_url();
	    
	    if ($this->options['seotm_use_sitemap']) {
	        
            if (!empty($this->options['seotm_use_sitemap_custom_url'])) {
                $this->sitemap_url = $this->options['seotm_use_sitemap_custom_url'];
            } else {
                $this->sitemap_url = 'sitemap_index';
            }
	        
			add_action( 'init', array( $this, 'custom_sitemap_index_url_rewrite' ));
			add_filter( 'home_url', array( $this, 'custom_sitemap_index_url'), 11, 2 );
            add_filter('wp_sitemaps_stylesheet_index_content', array( $this, 'custom_sitemap_index') );
            add_filter('wp_sitemaps_stylesheet_content', array( $this, 'custom_sitemap_entries') );
            
            add_filter( 'wp_sitemaps_post_types', array( $this, 'unset_sitemaps_post_types' ) );
            add_filter( 'wp_sitemaps_taxonomies', array( $this, 'unset_sitemaps_taxonomies' ) );
            add_filter( 'wp_sitemaps_add_provider', array( $this, 'unset_sitemaps_providers' ), 10, 2 );
            
            add_filter( 'wp_sitemaps_posts_entry', array( $this, 'add_last_mod' ), 10, 2 );
            
            if ($this->options['seotm_use_sitemap_add_media']) {
            	$media_sitemap_file = SEOTM_CLASSES_DIR . 'parts/MediaSitemap.php';
                if ( file_exists( $media_sitemap_file ) ) {
            		require_once( $media_sitemap_file );
            	}
            }
            
            // add metabox and save the values
            add_action( 'add_meta_boxes', array( $this, 'add_seotm_metabox' ) );
            add_action( 'save_post', array( $this, 'save_seotm_metabox' ) );
            add_action( 'edit_attachment', array( $this, 'save_seotm_metabox' ) );
            add_action('edit_term', array($this, 'save_taxonomy_seotm_metabox'), 10, 2);
            
            $taxonomies = apply_filters('custom_sitemap_taxonomy', get_taxonomies()); // Get all taxonomies.
            
            if (!function_exists('is_plugin_active')) { // check if this function exist
                require_once ABSPATH . 'wp-admin/includes/plugin.php'; // include the plugin.php file if it's not
            }
            
            if (is_plugin_active('woocommerce/woocommerce.php')) {
                $taxonomies[] = 'product_cat'; // add product_cat taxonomy when woo is active.
            }
        
            foreach ($taxonomies as $taxonomy) {
                add_action("{$taxonomy}_edit_form_fields", array($this, 'add_taxonomy_seotm_metabox'), 10, 2);
            }
            
            // exclude entries
            add_filter( 'wp_sitemaps_posts_query_args', array( $this, 'exclude_sitemap_entries'), 10, 2 );
            add_filter( 'wp_sitemaps_taxonomies_query_args', array($this, 'exclude_taxonomy_sitemap_entries'), 99, 2);
        	
        	// short the order entries
        	add_filter( 'wp_sitemaps_posts_query_args', array( $this, 'change_sitemap_post_order'), 10, 2 );
        	
        	
        	// add noindex to meta robots tag and x-headers
        	add_filter('wp_robots', array($this, 'set_meta_robots_noindex_tag'), 10, 1);
        	add_action('send_headers', array($this, 'set_x_robots_noindex_header'), 10);
        	
        }
		
		if ($this->options['seotm_use_robots']) {
    		add_filter('robots_txt', [$this, 'customRobotsTxt'], 10, 2);
        }
        
	}
	
	public function set_meta_robots_noindex_tag($robots) {
        if ('0' === get_option('blog_public')) {
            $robots['noindex'] = true;
            $robots['nofollow'] = true;
        }

        $current_id = get_queried_object_id();

        if ($this->hasNoIndexMeta($current_id) ) {
            $robots['noindex'] = true;
            $robots['nofollow'] = true;
            $this->removeCanonicalLink();
        }

        return $robots;
    }
    
    public function set_x_robots_noindex_header() {
        if ('0' === get_option('blog_public')) {
            // Blog is not public, set X-Robots-Tag to noindex, nofollow
            header('X-Robots-Tag: noindex, nofollow', true);
            return;
        }

        $current_id = get_queried_object_id();

        if ($this->hasNoIndexMeta($current_id) ) {
            // Meta noindex found, set X-Robots-Tag to noindex, nofollow
            header('X-Robots-Tag: noindex, nofollow', true);
            return;
        }

        // Check if it's the page_for_posts
        $page_for_posts = get_option('page_for_posts');
        if ($current_id == $page_for_posts) {
            // Page_for_posts, set X-Robots-Tag to index, follow
            header('X-Robots-Tag: index, follow', true);
            return;
        }

        // Default case, set X-Robots-Tag to index, follow
        header('X-Robots-Tag: index, follow', true);
    }

    private function hasNoIndexMeta($object_id) {
        $exclude_from_sitemap = get_post_meta($object_id, '_exclude_from_sitemap', true);
        $exclude_taxonomy_from_sitemap = get_term_meta($object_id, '_exclude_taxonomy_from_sitemap', true);

        // Check if either of the meta values is '1'
        return ($exclude_from_sitemap === '1' || $exclude_taxonomy_from_sitemap === '1');
    }
    
    private function removeCanonicalLink() {
        remove_action('wp_head', 'rel_canonical');
    }
	
	public function custom_sitemap_attachments_provider() {
	    
        $provider = new \SeoThatMatters\Custom_Sitemap_Attachments();
        wp_register_sitemap_provider('attachments', $provider);
        
    }
    
    public function custom_sitemap_index() {
		$css         = $this->custom_sitemap_index_stylesheet();
        $title       = esc_xml( __( 'XML Sitemap (Index)' ) );
        $site_url = get_bloginfo('url');

		$lang    = get_language_attributes( 'html' );
		$url     = esc_xml( __( 'Sitemap List' ) );
		$lastmod = esc_xml( __( 'Last Modified' ) );

		$xsl_content = <<<XSL
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
		version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
		xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
		exclude-result-prefixes="sitemap"
		>

	<xsl:output method="html" encoding="UTF-8" indent="yes" />

	<xsl:variable name="has-lastmod" select="count( /sitemap:sitemapindex/sitemap:sitemap/sitemap:lastmod )" />

	<xsl:template match="/">
		<html {$lang}>
			<head>
				<title>{$title}</title>
				<style>
					{$css}
				</style>
			</head>
			<body>
				<div id="sitemap">
					<div id="sitemap__header">
						<h1>{$title}</h1>
						<p>Used to inform search engines like <a rel="nofollow noreferrer noopener" target="_blank" href="https://www.google.com">Google</a>, <a rel="nofollow noreferrer noopener" target="_blank" href="https://www.bing.com/">Bing</a>, and <a rel="nofollow noreferrer noopener" target="_blank" href="https://www.yahoo.com">Yahoo!</a> about the content of this website, so that they can crawl and index this site more effectively. Learn more about XML sitemaps on <a href="https://www.sitemaps.org/">Sitemaps.org</a>.</p>
					</div>
					<div id="sitemap__content">
						<table id="sitemap__table">
							<thead>
								<tr>
									<th class="loc">{$url}</th>
									<xsl:if test="\$has-lastmod">
										<th class="lastmod">{$lastmod}</th>
									</xsl:if>
								</tr>
							</thead>
							<tbody>
								<xsl:for-each select="sitemap:sitemapindex/sitemap:sitemap">
									<tr>
										<td class="loc"><a href="{sitemap:loc}"><xsl:value-of select="substring-after(sitemap:loc, 'wp-')" /></a></td>
										<xsl:if test="\$has-lastmod">
											<td class="lastmod"> <xsl:value-of select="concat(substring(sitemap:lastmod,0,11),concat(' ', substring(sitemap:lastmod,12,8)))"/> (<xsl:value-of select="substring(sitemap:lastmod,20,6)"/>)</td>
										</xsl:if>
									</tr>
								</xsl:for-each>
							</tbody>
						</table>
						<p class="text">This Sitemap Index contains <xsl:value-of select="count( sitemap:sitemapindex/sitemap:sitemap )" /> Sitemaps. Check the website: <a href="{$site_url}">{$site_url}</a>.</p>
					</div>
				</div>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>

XSL;

		return $xsl_content;
	}
	
	public function custom_sitemap_entries() {
		$css         = $this->custom_sitemap_index_stylesheet();
		$title       = esc_xml( __( 'XML Sitemap' ) );
        $site_url    = get_bloginfo('url');
        $sitemap_index = $site_url . '/' . $this->sitemap_url . '.xml';

		$lang       = get_language_attributes( 'html' );
		$url        = esc_xml( __( 'URL' ) );
		$lastmod    = esc_xml( __( 'Last Modified' ) );
		$changefreq = esc_xml( __( 'Change Frequency' ) );
		$priority   = esc_xml( __( 'Priority' ) );

		$xsl_content = <<<XSL
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
		version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
		xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
		exclude-result-prefixes="sitemap"
		>

	<xsl:output method="html" encoding="UTF-8" indent="yes" />

	<xsl:variable name="has-lastmod"    select="count( /sitemap:urlset/sitemap:url/sitemap:lastmod )"    />
	<xsl:variable name="has-changefreq" select="count( /sitemap:urlset/sitemap:url/sitemap:changefreq )" />
	<xsl:variable name="has-priority"   select="count( /sitemap:urlset/sitemap:url/sitemap:priority )"   />

	<xsl:template match="/">
		<html {$lang}>
			<head>
				<title>{$title}</title>
				<style>
					{$css}
				</style>
			</head>
			<body>
				<div id="sitemap">
					<div id="sitemap__header">
						<h1>{$title}</h1>
						<p>Used to inform search engines like <a rel="nofollow noreferrer noopener" target="_blank" href="https://www.google.com">Google</a>, <a rel="nofollow noreferrer noopener" target="_blank" href="https://www.bing.com/">Bing</a>, and <a rel="nofollow noreferrer noopener" target="_blank" href="https://www.yahoo.com">Yahoo!</a> about the content of this website, so that they can crawl and index this site more effectively. Learn more about XML sitemaps on <a href="https://www.sitemaps.org/">Sitemaps.org</a>.</p>
					</div>
					<div id="sitemap__content">
						<table id="sitemap__table">
							<thead>
								<tr>
									<th class="loc">{$url}</th>
									<xsl:if test="\$has-lastmod">
										<th class="lastmod">{$lastmod}</th>
									</xsl:if>
									<xsl:if test="\$has-changefreq">
										<th class="changefreq">{$changefreq}</th>
									</xsl:if>
									<xsl:if test="\$has-priority">
										<th class="priority">{$priority}</th>
									</xsl:if>
								</tr>
							</thead>
							<tbody>
								<xsl:for-each select="sitemap:urlset/sitemap:url">
									<tr>
										<td class="loc"><a href="{sitemap:loc}" class="scroll"><xsl:value-of select="sitemap:loc" /></a></td>
										<xsl:if test="\$has-lastmod">
											<td class="lastmod"> <xsl:value-of select="concat(substring(sitemap:lastmod,0,11),concat(' ', substring(sitemap:lastmod,12,8)))"/> (<xsl:value-of select="substring(sitemap:lastmod,20,6)"/>)</td>
										</xsl:if>
										<xsl:if test="\$has-changefreq">
											<td class="changefreq"><xsl:value-of select="sitemap:changefreq" /></td>
										</xsl:if>
										<xsl:if test="\$has-priority">
											<td class="priority"><xsl:value-of select="sitemap:priority" /></td>
										</xsl:if>
									</tr>
								</xsl:for-each>
							</tbody>
						</table>
						<p class="text">This Sitemap contains <xsl:value-of select="count( sitemap:urlset/sitemap:url )" /> URLs. Check the website: <a href="{$site_url}">{$site_url}</a> or see the <a href="{$sitemap_index}">Sitemap Index</a>.</p>
					</div>
				</div>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>

XSL;
		return $xsl_content;
	}

	/**
	 * Gets the CSS to be included in sitemap XSL stylesheets.
	 *
	 * @return string The CSS.
	 */
    public function custom_sitemap_index_stylesheet() {
        $text_align = is_rtl() ? 'right' : 'left';
    
        $css = '
        * {
			box-sizing: border-box;
		}
		
		::-webkit-scrollbar {
        	height: 0px;
        	width: 0
        }
        
        body {
            font-family: Courier, "Courier New","Lucida Grande", "Lucida Sans Unicode", Tahoma, Verdana, sans-serif;
            font-size: 12.275px;
            font-size: calc(10.5px + (12.275 - 10.5) * ((100vw - 300px) / (1680 - 300)));
            line-height: 1.6;
            color: #495057;
            color: #3f454a;
            background: #fbfcff;
        }
    
        #sitemap {
            margin: 66px auto;
			text-align: left;
			max-width: 880px;
        }
        
        h1 {
			text-align: center;
			line-height: 1.1;
			font-weight: 600;
			margin-bottom: 0.75em;
			font-size: calc(19.5px + (20.35 - 19.5) * ((100vw - 300px) / (1680 - 300)));
		}
		
		#sitemap__header {
			margin-bottom: calc(17.5px + (15.35 - 17.5) * ((100vw - 300px) / (1680 - 300)));
		}
    
        #sitemap__table {
            width: 100%;
            border: 1px solid rgba(0, 40, 100, .12);
            border-collapse: collapse;
        }
        
        table > thead > tr {
            border-bottom: 1.5px solid rgba(0, 40, 100, .08);
			font-size: calc(12.5px + (13.35 - 12.5) * ((100vw - 300px) / (1680 - 300)))
        }
    
        #sitemap__table tr td.loc {
            direction: ltr;
            font-size: 12px;
            font-size: calc(10.2px + (12.25 - 10.2) * ((100vw - 300px) / (1680 - 300)));
        }
    
        #sitemap__table tr th {
            text-align: {$text_align};
        }
    
        #sitemap__table tr td,
        #sitemap__table tr th {
            padding: 10px;
        }
    
        #sitemap__table tr:nth-child(odd) td {
            background-color: #f7f9ff;
        }
        
        a {
            color: #495057;
        }
        
        .text a,
        #sitemap__header a {
            font-weight: 600;
        }
    
        a:hover {
            text-decoration: none;
            font-weight: 600;
            color: #9aa0ac;
        }
        
        .loc a,
        td.lastmod {
            text-decoration: none;
            font-size: calc(10px + (12 - 10) * ((100vw - 300px) / (1680 - 300)));
        }
        
        .lastmod {
            text-align: center;
            display: flex;
            justify-content: center;
            min-width: max-content;
        }
        
        .loc a.scroll {
            width: calc(440px + (720 - 440) * ((100vw - 300px) / (1680 - 300)));
            overflow: scroll;
            white-space: nowrap;
            display: flex;
        }
        
        .text-cap {
            text-transform: capitalize;
        }
        
    
    ';
    
        return $css;
    }

	
	// Adds a rule with a new sitemap address
	public function custom_sitemap_index_url_rewrite() {
		add_rewrite_rule( '^' . preg_quote( $this->sitemap_url, '/' ) . '\.xml$', 'index.php?sitemap=index', 'top' );
	}

	// Replaces the url from wp-sitemap.xml to sitemap.xml
	public function custom_sitemap_index_url( $url, $path ) {

		if ( '/wp-sitemap.xml' === $path ) {
			return str_replace( '/wp-sitemap.xml', '/'.$this->sitemap_url.'.xml', $url );
		}

		return $url;
	}
	
	public function unset_sitemaps_post_types ( $post_types ) {

        foreach ( $post_types as $name => $data ) {
			if ( isset( $this->options['remove_sitemap_posts_' . $name] ) && $this->options[ 'remove_sitemap_posts_' . $name ] ) {
				unset( $post_types[ $name ] );
			}
		}

        return $post_types;
        
	}
	
	public function unset_sitemaps_taxonomies ( $taxonomies ) {

        foreach ( $taxonomies as $name => $data ) {
			if ( isset( $this->options['remove_sitemap_taxonomies_' . $name] ) && $this->options[ 'remove_sitemap_taxonomies_' . $name ] ) {
				unset( $taxonomies[ $name ] );
			}
		}

        return $taxonomies;
        
	}
	
	public function unset_sitemaps_providers ( $provider, $name ) {

        if ( isset( $this->options['remove_provider_' . $name] ) && $this->options[ 'remove_provider_' . $name ] ) {
			return false;
		}

        return $provider;
        
	}
	
	public function add_last_mod($entry, $post) {
	    if ( isset( $this->options['seotm_use_sitemap_add_last_mod'] ) && $this->options['seotm_use_sitemap_add_last_mod'] ) {
	        
	        $post_modified = get_post_modified_time('Y-m-d H:i:s', true, $post->ID);
            $entry['lastmod'] = date_i18n('Y-m-d\TH:i:sP', strtotime($post_modified));
            
	    }
	    
	    return $entry;
	}
	
	public function change_sitemap_post_order($args, $post_type) {
        if (is_array($args)) {
            $args['orderby'] = 'modified';
            $args['order'] = 'DESC';
        }
        return $args;
    }
	
	public function add_seotm_metabox() {
        $post_types = get_post_types(array(
            'public' => true), 'objects');
        $post_type_names = array_keys($post_types);
    
        $post_type_names[] = 'product';
    
        add_meta_box(
            'seotm_metabox',
            'SEO That Matters',
            array($this, 'render_seotm_metabox'),
            $post_type_names, // Pass an array of all registered post types (including "product")
            'side',
            'default'
        );
        
    }

    public function render_seotm_metabox($post) {
        
        $value = get_post_meta($post->ID, '_exclude_from_sitemap', true);
        ?>
        <label for="exclude_from_sitemap">
            <input type="checkbox" name="exclude_from_sitemap" id="exclude_from_sitemap" value="1" <?php checked($value, '1'); ?> />
            Exclude this from the sitemap <br>
            <em style="line-height: 1.3;
                display: block;
                margin-top: 6px;
                opacity: .8;">
                *this will also set the meta robots tag and X-Robots-Tag header to noindex, nofollow</em>
        </label>
        <?php
        
    }

    public function save_seotm_metabox($post_id) {
        
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
        if (isset($_POST['exclude_from_sitemap']) && $_POST['exclude_from_sitemap'] === '1') {
            update_post_meta($post_id, '_exclude_from_sitemap', '1');
        } else {
            delete_post_meta($post_id, '_exclude_from_sitemap');
        }
        
    }
    
    public function exclude_sitemap_entries($args, $post_type) {
        
        $excluded_posts = $this->get_excluded_post_ids();
    
        if (!empty($excluded_posts)) {
            $args['post__not_in'] = isset($args['post__not_in']) ? $args['post__not_in'] : array();
            $args['post__not_in'] = array_merge($args['post__not_in'], $excluded_posts);
        }
    
        return $args;
    }
    
    private function get_excluded_post_ids() {
        
        global $wpdb;
        $ids = array();
    
        $results = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT `post_id` FROM $wpdb->postmeta WHERE `meta_key` = %s AND `meta_value` = %s",
                '_exclude_from_sitemap',
                '1'
            )
        );
    
        if ($results) {
            foreach ($results as $result) {
                $ids[] = absint($result->post_id);
            }
        }
    
        return $ids;
    }
    
    public function add_taxonomy_seotm_metabox($term, $taxonomy) {
        $value = get_term_meta($term->term_id, '_exclude_taxonomy_from_sitemap', true);
        ?>
        <tr class="form-field">
            <th scope="row">
                <label for="exclude_taxonomy_from_sitemap">Exclude from Sitemap</label>
            </th>
            <td>
                <input type="checkbox" name="exclude_taxonomy_from_sitemap" id="exclude_taxonomy_from_sitemap" value="1" <?php checked($value, '1'); ?> />
                <span>Check to exclude this taxonomy from the sitemap <br>
            <em style="line-height: 1.3;
                display: block;
                margin-top: 6px;
                opacity: .8;">
                *this will also set the meta robots tag and X-Robots-Tag header to noindex, nofollow</em></span>
            </td>
        </tr>
        <?php
    }

    public function save_taxonomy_seotm_metabox($term_id, $tt_id) {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
        $exclude_value = isset($_POST['exclude_taxonomy_from_sitemap']) ? $_POST['exclude_taxonomy_from_sitemap'] : '0'; // Default to '0'

        if ($exclude_value === '1') {
            update_term_meta($term_id, '_exclude_taxonomy_from_sitemap', '1');
        } else {
            delete_term_meta($term_id, '_exclude_taxonomy_from_sitemap');
        }
        
    }
    
    public function exclude_taxonomy_sitemap_entries($args, $taxonomy) {
        $excluded_terms = $this->get_excluded_taxonomy_terms($taxonomy);
    
        if (!empty($excluded_terms)) {
            $args['exclude'] = isset($args['exclude']) ? $args['exclude'] : array();
            $args['exclude'] = array_merge($args['exclude'], $excluded_terms);
        }
    
        return $args;
    }
    
    private function get_excluded_taxonomy_terms($taxonomy) {
        global $wpdb;
        $term_ids = array();
    
        $results = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT `term_id` FROM $wpdb->termmeta WHERE `meta_key` = %s AND `meta_value` = %s",
                '_exclude_taxonomy_from_sitemap', // the meta option name
                '1'
            )
        );
    
        if ($results) {
            foreach ($results as $result) {
                $term_ids[] = absint($result->term_id);
            }
        }
    
        return $term_ids;
    }

    
    public function customRobotsTxt($output, $public) {
        
        $custom_robotstxt = stripslashes($this->options['seotm_use_robots_content']);
        
        if (!empty($custom_robotstxt)) {
            $output = esc_textarea($custom_robotstxt);
        }
        
        return $output;
    }

}