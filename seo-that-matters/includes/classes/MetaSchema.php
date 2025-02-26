<?php

namespace SeoThatMatters;

use WP_Query;

if (!defined('WPINC')) { die; }

class SeotmPluginMetaSchema {
    
    private $options = [];
    
    public function __construct() {

        $this->options = get_option(SEOTM_PREFIX . '_options', []);
        
        // meta tags
        if ( $this->options['seotm_use_seo_meta'] || $this->options['seotm_use_social_meta'] ) {
            add_action('wp_head', [$this, 'useMeta'], 1);
            add_post_type_support( 'page', 'excerpt' );
			add_post_type_support( 'product', 'excerpt' );
        }
        
        // custom title
        if ($this->options['seotm_use_custom_title']) {
            add_filter( 'pre_get_document_title', [$this, 'useCustomTitle'], 99 );
        }
        
        // json schema
        add_action('wp_footer', [$this, 'useSchema'], 1);
        
        // breadcrumbs
        if ($this->options['seotm_use_markup_breadcrumbs']) {
		    $breadcrumbs_file = SEOTM_CLASSES_DIR . 'parts/Breadcrumbs.php';
            if ( file_exists( $breadcrumbs_file ) ) {
        		require_once( $breadcrumbs_file );
        	}
			add_action( 'wp', 'SeoThatMatters\SeotmPluginBreadcrumbs::instance' );
        }
        
        if ($this->options['seotm_use_x_default']) {
            add_action('wp_head', [$this, 'useHrefLangXdefault'], 1);
        }
        
        if ($this->options['seotm_use_schema_offer_shop']) {
            add_action('wp_footer', [$this, 'useSchemaOfferForWcArchives'], 1);
        }
        
    }
    
    /* 
     * use meta
     */
    
    public function useMeta($post) {
        
        if ( is_user_logged_in() || is_404() ) {
            return;
        }
        
        /* define meta og:type */
        if (is_singular('post')) {
            $meta_og_type = 'article';
        } elseif (function_exists('is_product') && is_product()) {
            $meta_og_type = 'product';
        } elseif (
            (function_exists('is_woocommerce') && is_shop()) ||
            (function_exists('is_woocommerce') && is_product_category())
        ) {
            $meta_og_type = 'product'; // or another appropriate value
        } else {
            $meta_og_type = 'website'; // Default value
        }
        
        /* define meta og:site_name */
        $meta_site_name = get_bloginfo('name');
        
        if ( function_exists('is_woocommerce') ) {
			$shop_page_id = wc_get_page_id('shop'); // Get the shop page's ID
        	$shop_page = get_post($shop_page_id); // Get the shop page's post object
		}
        
        /* define meta og:title and twitter:title */
        if ( is_singular() ) {
            $og_title = get_post_meta( get_the_ID(), 'ogTitle', true );
            if ( $this->options['seotm_use_custom_title'] && ! empty( $og_title ) ) {
                $ogtitle = $og_title; // use custom title for og:title
            } else {
                $ogtitle = get_the_title();
            }
            $twitter_title = get_post_meta( get_the_ID(), 'twitterTitle', true );
            if ( $this->options['seotm_use_custom_title'] && ! empty( $twitter_title ) ) {
                $twittertitle = $twitter_title; // use custom title for twitter:title
            } else {
                $twittertitle = get_the_title();
            }
        } elseif (is_home() && get_option('page_for_posts')) {
            $ogtitle = get_the_title(get_option('page_for_posts')) . ' - ' . $meta_site_name; // title for page_for_posts
            $twittertitle = get_the_title(get_option('page_for_posts')) . ' - ' . $meta_site_name; // title for page_for_posts
        } elseif (is_category() || is_tag() || is_tax()) {
            $term_title = single_term_title('', false);
            $ogtitle = $term_title . ' - ' . $meta_site_name;
            $twittertitle = $term_title . ' - ' . $meta_site_name;
        } elseif ( is_archive() && (!function_exists('is_woocommerce') || !is_woocommerce()) ) {
            $ogtitle = get_the_archive_title();
             $twittertitle = get_the_archive_title();
        } elseif (function_exists('is_woocommerce') && is_shop()) {
            $ogtitle = $shop_page->post_title; // Shop page name
            $twittertitle = $shop_page->post_title; // Shop page name
        } else {
            $ogtitle = get_the_title();
            $twittertitle = get_the_title();
        }
        
        /* define meta description, og:description, and twitter:description */
        
        if ( is_object( $post ) ) {
          $post_excerpt = $post->post_excerpt;
        }
        
        if ( has_excerpt() ) {
			$excerpt = get_the_excerpt();
		} else {
			$post_content = get_the_content();
			$post_content = strip_shortcodes($post_content);
			$post_content = wp_strip_all_tags($post_content);
			$excerpt = wp_trim_words($post_content);
		}
		
        $seotm_excerpt_limit = (int) apply_filters('seotm_excerpt_limit', 156); // limit excerpt length to 156 words
        
        if (is_front_page()) {
            if (empty($post_excerpt)) {
                $meta_description = get_bloginfo('description');
            } else {
                $meta_description = wp_strip_all_tags($post_excerpt);
            }
        } elseif (is_home() && get_option('page_for_posts')) {
            $post_excerpt = get_post(get_option('page_for_posts'))->post_excerpt;
            if (empty($post_excerpt)) {
                $meta_description = substr(get_the_excerpt(), 0, $seotm_excerpt_limit);
            } else {
                $meta_description = wp_strip_all_tags($post_excerpt);
            }
        } elseif (is_category() || is_tag() || is_tax()) {
            $term_description = term_description();
            $meta_description = !empty($term_description) ? wp_strip_all_tags(substr($term_description, 0, $seotm_excerpt_limit)) : wp_strip_all_tags(substr($excerpt, 0, $seotm_excerpt_limit));
        } else {
            $meta_description = wp_strip_all_tags(substr($excerpt, 0, $seotm_excerpt_limit));
        }
    
        // get tags and categories
        $tags = get_the_tags();
        $categories = get_the_category();
        
        $article_author = '';
        
        // get the author
        if (is_singular()) {
            if (!empty(get_the_modified_author())) {
                $article_author = get_the_modified_author();
            } elseif (!empty(get_the_author())) {
                $article_author = get_the_author();
            } else {
                if ( is_object( $post ) ) {
                    $article_author = get_the_author_meta('display_name', $post->post_author);
                }
            }
        }
        
        // get publish & modified time for articles
        $article_published_time = trim(get_post_time('c'));
        $article_modified_time = trim(get_post_modified_time('c'));
        $article_updated_time = trim(get_post_modified_time('c'));
 
        // Get the url(s)
        $meta_url = '';
        if (is_singular()) {
            $meta_url = get_permalink(); // Permalink for individual post(s)
        } elseif (is_home() && get_option('page_for_posts')) {
            $meta_url = get_permalink(get_option('page_for_posts')); // Permalink for page_for_posts
        } elseif (is_archive()) {
            $meta_url = home_url($_SERVER['REQUEST_URI']); // URL for archive page(s)
        }
        
        // Get the images
        $meta_twitter_card = 'summary_large_image';
    
        $meta_image_url = '';
        $meta_image_width = '';
        $meta_image_height = '';
        
        $default_fb_img = isset($this->options['seotm_default_fb_img']) ? $this->options['seotm_default_fb_img'] : '';
        $default_twitter_img = isset($this->options['seotm_default_twitter_img']) ? $this->options['seotm_default_twitter_img'] : '';
        
        if (is_category() || is_tag() || is_tax() ) {
            
            $term = get_queried_object();
            $term_image = get_term_meta($term->term_id, 'thumbnail_id', true);
            
            if (!empty($term_image)) {
                $meta_image = wp_get_attachment_image_src($term_image, 'full');
                $meta_image_url = $meta_image[0];
                $meta_image_width = $meta_image[1];
                $meta_image_height = $meta_image[2];
            }
            
        } elseif (is_home() && get_option('page_for_posts')) {
            
            $posts_page_id = get_option('page_for_posts');
            $thumbnail_id = get_post_thumbnail_id($posts_page_id);
            
            if ($thumbnail_id) {
                // Get the featured image if it exists
                $meta_image = wp_get_attachment_image_src($thumbnail_id, 'full');
                $meta_image_url = $meta_image[0];
                $meta_image_width = $meta_image[1];
                $meta_image_height = $meta_image[2];
            }
        
        } else {
            
            if (has_post_thumbnail()) {
                // Get the featured image if it exists
                $meta_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                $meta_image_url = $meta_image[0];
                $meta_image_width = $meta_image[1];
                $meta_image_height = $meta_image[2];
            }
            
        }
        
        if (!empty($default_fb_img)) {
            // fallback for fb meta image
            $default_fb_img_data = $this->getImageDataURL($default_fb_img);
            $meta_image_fb_url = $default_fb_img_data['src'];
            $meta_image_fb_width = $default_fb_img_data['width'];
            $meta_image_fb_height = $default_fb_img_data['height'];
        }
                
        if (!empty($default_twitter_img)) {
            // fallback for twitter meta image
            $default_twitter_img_data = $this->getImageDataURL($default_twitter_img);
            $meta_image_twitter_url = $default_twitter_img_data['src'];
        }
        
        if ( !$meta_image_url ) {
            
            $meta_image_url_post = '';
            $meta_image_width_post = '';
            $meta_image_height_post = '';
                    
            if (is_category() || is_tag() || is_tax() || (is_home() && get_option('page_for_posts'))) {
                $thumbnail_id = get_post_thumbnail_id();
                if ($thumbnail_id) {
                    $image = wp_get_attachment_image_src($thumbnail_id, 'full');
                    $meta_image_url_post = $image[0];
                    $meta_image_width_post = $image[1];
                    $meta_image_height_post = $image[2];
                    
                } elseif (!$thumbnail_id) {
                
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => -1 // Retrieve all posts in the archive
                    );
                    $archive_posts = get_posts($args);
                    
                    foreach ($archive_posts as $post) {
                        $has_featured_image = has_post_thumbnail($post->ID);
                        $content = apply_filters('the_content', get_post_field('post_content', $post));
                        preg_match('/<img[^>]+src=[\"\']([^\"\']+)["\'][^>]*>/i', $content, $matches);
                    
                        if ($has_featured_image) {
                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                            if ($featured_image) {
                                $meta_image_url_post = $featured_image[0];
                                $meta_image_width_post = $featured_image[1];
                                $meta_image_height_post = $featured_image[2];
                                break;
                            }
                        } elseif (!empty($matches) && isset($matches[1])) {
                            $meta_image_url_post = $matches[1];
                            $attachment_id = attachment_url_to_postid($meta_image_url_post);
                            if ($attachment_id) {
                                $meta_image = wp_get_attachment_image_src($attachment_id, 'full');
                                if ($meta_image) {
                                    $meta_image_width_post = $meta_image[1];
                                    $meta_image_height_post = $meta_image[2];
                                    break;
                                }
                            }
                        }
                    }
                    
                }
                
            } else {
                
                $content = apply_filters('the_content', get_post_field('post_content', $post));
                preg_match_all('/<img[^>]+src=[\"\']([^\"\']+)["\'][^>]*>/i', $content, $matches);
                if (!empty($matches[1][0])) {
                    $meta_image_url_post = $matches[1][0];
                    $attachment_id = attachment_url_to_postid($meta_image_url_post);
                    if ($attachment_id) {
                        $meta_image = wp_get_attachment_image_src($attachment_id, 'full');
                        $meta_image_width_post = $meta_image[1];
                        $meta_image_height_post = $meta_image[2];
                    }
                }
                
            }
            
        }
        
        // get lang value for og:locale
        $lang = get_language_attributes();
        if (preg_match('/lang=["\']([^"\']+)["\']/', $lang, $matches)) {
            $lang_value = $matches[1];
            $lang_value = str_replace('-', '_', $lang_value);
        }
    
        // print the metas
        
        if ($this->options['seotm_use_seo_meta']) {
            if ( !empty($meta_description) ) {
                printf( '<meta name="description" content="%s" />' . PHP_EOL, esc_html($meta_description));   
            }
        }
        
        if ( $this->options['seotm_use_social_meta'] ) {
            
            // Open Graph (OG) meta tags
            
            printf('<meta property="og:type" content="%s" />' . PHP_EOL, esc_attr($meta_og_type));
            printf('<meta property="og:title" content="%s" />' . PHP_EOL, esc_attr($ogtitle));
            if ( !empty($meta_description) ) {
                printf('<meta property="og:description" content="%s" />' . PHP_EOL, esc_html($meta_description));
            }
            if ( is_singular('post') ) {
                printf('<meta property="og:updated_time" content="%s" />' . PHP_EOL, esc_attr($article_modified_time));
            }
            printf('<meta property="og:url" content="%s" />' . PHP_EOL, esc_url($meta_url));
            if ( $meta_image_url ) {
                printf('<meta property="og:image" content="%s" />' . PHP_EOL, esc_url($meta_image_url));
                printf('<meta property="og:image:secure_url" content="%s" />' . PHP_EOL, esc_url($meta_image_url));
                printf('<meta property="og:image:width" content="%d" />' . PHP_EOL, esc_attr($meta_image_width));
                printf('<meta property="og:image:height" content="%d" />' . PHP_EOL, esc_attr($meta_image_height));
            } elseif (!empty($default_fb_img)) {
                printf('<meta property="og:image" content="%s" />' . PHP_EOL, esc_url($meta_image_fb_url));
                printf('<meta property="og:image:secure_url" content="%s" />' . PHP_EOL, esc_url($meta_image_fb_url));
                printf('<meta property="og:image:width" content="%d" />' . PHP_EOL, esc_attr($meta_image_fb_width));
                printf('<meta property="og:image:height" content="%d" />' . PHP_EOL, esc_attr($meta_image_fb_height));
            } else {
                printf('<meta property="og:image" content="%s" />' . PHP_EOL, esc_url($meta_image_url_post));
                printf('<meta property="og:image:secure_url" content="%s" />' . PHP_EOL, esc_url($meta_image_url_post));
                printf('<meta property="og:image:width" content="%d" />' . PHP_EOL, esc_attr($meta_image_width_post));
                printf('<meta property="og:image:height" content="%d" />' . PHP_EOL, esc_attr($meta_image_height_post));
            }
            printf('<meta property="og:site_name" content="%s" />' . PHP_EOL, esc_attr($meta_site_name));
            if (!empty($lang_value)) {
                printf('<meta property="og:locale" content="%s" />' . PHP_EOL, esc_attr($lang_value));
            }    
            if ( is_singular('post') ) {
        
                printf('<meta property="article:author" content="%s" />' . PHP_EOL, esc_attr($article_author));
                if ( ! is_wp_error( $categories ) && is_array( $categories ) && $categories !== [] ) {
                    printf('<meta property="article:section" content="%s" />' . PHP_EOL, esc_attr($categories[0]->name));
                }
                printf('<meta property="article:published_time" content="%s" />' . PHP_EOL, esc_attr($article_published_time));
                printf('<meta property="article:modified_time" content="%s" />' . PHP_EOL, esc_attr($article_modified_time));
        
                if ( ! is_wp_error( $tags ) && is_array( $tags ) && $tags !== [] ) {
                    foreach ( $tags as $tag ) {
                        printf('<meta property="article:tag" content="%s" />' . PHP_EOL, esc_attr($tag->name));
                    }
                }
            }
            
            // Twitter meta tags
            
            printf('<meta name="twitter:title" content="%s" />' . PHP_EOL, esc_attr($twittertitle));
            printf('<meta name="twitter:url" content="%s" />' . PHP_EOL, esc_url($meta_url));
            if ( !empty($meta_description) ) {
                printf('<meta name="twitter:description" content="%s" />' . PHP_EOL, esc_attr($meta_description));
            }
            if ( $meta_image_url ) {
                printf('<meta name="twitter:card" content="%s" />' . PHP_EOL, esc_attr($meta_twitter_card));
                printf('<meta name="twitter:image" content="%s" />' . PHP_EOL, esc_url($meta_image_url));
            } elseif (!empty($default_twitter_img)) {
                printf('<meta name="twitter:card" content="%s" />' . PHP_EOL, esc_attr($meta_twitter_card));
                printf('<meta name="twitter:image" content="%s" />' . PHP_EOL, esc_url($meta_image_twitter_url));
            } else {
                printf('<meta name="twitter:card" content="%s" />' . PHP_EOL, esc_attr($meta_twitter_card));
                printf('<meta name="twitter:image" content="%s" />' . PHP_EOL, esc_url($meta_image_url_post));
            }
        }
        
    }
    
	// Helper function to retrieve image data (URL, width, height) to be used in useMeta()
    private function getImageDataURL($url): array {
        $id = attachment_url_to_postid($url);
        return $id ? $this->getImageData($id) : [
            'src' => $url,
            'width' => '',
            'height' => '',
        ];
    }
    private function getImageData($id): array {
        $image = wp_get_attachment_image_src($id, 'full');
        return $image ? [
            'id' => $id,
            'src' => $image[0],
            'width' => $image[1],
            'height' => $image[2],
        ] : [];
    }
    
    /* 
     * use custom title from wp native post meta fields 
     */

	public function useCustomTitle( $title ) {
		if ( is_singular() ) {
			$custom_title = get_post_meta( get_the_ID(), 'seoTitle', true );
			if ( ! empty( $custom_title ) ) {
				return esc_attr( $custom_title );
			}
		}
		return $title;
	}
	
	/* 
     * use schema
     */
	
	public function useSchema () {
		
		global $post;
	    
	    // start article schema
		if ($this->options['seotm_use_markup_articles']) {
			
			if ( is_singular( 'post' ) ) {
				// article type
				switch ($this->options['seotm_use_markup_articles_type']) {
					case '1':
						$article_schema_type = 'Article';
						break;
					case '2':
						$article_schema_type = 'NewsArticle';
						break;
					case '3':
						$article_schema_type = 'BlogPosting';
						break;
					default:
						$article_schema_type = 'Article';
						break;
				}
				// author type
				switch ($this->options['seotm_use_markup_articles_author']) {
					case '1':
						$article_author_type = 'Organization';
						break;
					case '2':
						$article_author_type = 'Person';
						break;
					default:
						$article_author_type = 'Organization';
						break;
				}

				$article_image = get_the_post_thumbnail_url( $post->ID, 'full' );
				if (!empty(get_the_modified_author())) {
                    $article_author = get_the_modified_author();
                } elseif (!empty(get_the_author())) {
                    $article_author = get_the_author();
                } else {
                    $article_author = get_the_author_meta('display_name', $post->post_author);
                }
				$article_author_url = get_author_posts_url( $post->post_author );
				$article_date_modified = get_the_modified_date( 'c' );
				$article_date_published = get_the_date( 'c' );
				$article_schema = '
{
 "@context": "https://schema.org",
 "@type": "'.$article_schema_type.'",
 "mainEntityOfPage": {
  "@type": "WebPage",
  "@id": "'.wp_get_canonical_url().'"
 },
 "headline": "'.get_the_title().'",
 "image": [
  "'.$article_image.'"
 ],
 "datePublished": "'.$article_date_published.'",
 "dateModified": "'.$article_date_modified.'",
 "author": {
  "@type": "'.$article_author_type.'",
  "name": "'.$article_author.'",
  "url": "'.$article_author_url.'"
 }
}
';
				$article_schema_tag = '<script type="application/ld+json">%s</script>'. PHP_EOL;
				printf( htmlspecialchars_decode(esc_attr($article_schema_tag)), htmlspecialchars_decode(wp_kses_data( $article_schema ) ));
			}
		}
		
		// start organization schema
		if ($this->options['seotm_use_markup_organization']) {
			if ( is_front_page() ) {

				$org_org_type = $this->options['seotm_use_markup_organization_org_type'];
				$org_name = $this->options['seotm_use_markup_organization_name'];
				$org_altname = $this->options['seotm_use_markup_organization_altname'];
				$org_description = $this->options['seotm_use_markup_organization_description'];
				$org_ophone = $this->options['seotm_use_markup_organization_ophone'];

				$org_social = array_filter(array_map('trim', explode("\n", $this->options['seotm_use_markup_organization_social'] ?? '')));
				$org_social = implode(",\n  ", array_map(function ($org_url) { return '"' . trim($org_url) . '"'; }, $org_social));  

				$org_logo = $this->options['seotm_use_markup_organization_logo'];
				$org_image = $this->options['seotm_use_markup_organization_image'];      
				$org_address = $this->options['seotm_use_markup_organization_address'];
				$org_locality = $this->options['seotm_use_markup_organization_locality'];
				$org_region = $this->options['seotm_use_markup_organization_region'];
				$org_aphone = $this->options['seotm_use_markup_organization_aphone'];
				$org_postcode = $this->options['seotm_use_markup_organization_postcode'];
				$org_country = $this->options['seotm_use_markup_organization_country'];
				
				$org_extra = stripslashes($this->options['seotm_use_markup_organization_extra']);

				$org_schema='
{
 "@context": "https://schema.org",
 "@type": "'.$org_org_type.'",
 "name": "'.$org_name.'",
 '.(!empty($org_altname)?'"alternateName": "'.$org_altname.'",':'').'
 '.(!empty($org_description)?'"description": "'.$org_description.'",':'').'
 "url":"'.home_url().'",
 '.(!empty($org_social)?'"sameAs": [
  '.$org_social.'
 ],':'').'
 '.(!empty($org_logo)?'"logo": "'.$org_logo.'",':'').'
 '.(!empty($org_image)?'"image": "'.$org_image.'",':'').'
 '.(!empty($org_ophone)?'"telephone" :"'.$org_ophone.'",':'').'
 '.(!empty($org_address)?'"address": {
  "@type": "PostalAddress",
  "streetAddress": "'.$org_address.'",
  '.(!empty($org_locality)?'"addressLocality": "'.$org_locality.'",':'').'
  '.(!empty($org_region)?'"addressRegion": "'.$org_region.'",':'').'
  '.(!empty($org_aphone)?'"telephone": "'.$org_aphone.'",':'').'
  '.(!empty($org_postcode)?'"postalCode": "'.$org_postcode.'",':'').'
  '.(!empty($org_country)?'"addressCountry": "'.$org_country.'"':'').'
 }':'').''.(!empty($org_extra)?',
 '.$org_extra.'':'').'
}
';

				// remove empty lines
				$org_schema = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $org_schema);

				$org_schema_tag = '<script type="application/ld+json">%s</script>'. PHP_EOL;
				printf($org_schema_tag, wp_kses_data($org_schema));
			}
		}
		
		// start local_business schema
		if ($this->options['seotm_use_markup_local_business']) {
			if ( is_front_page() ) {

				$loc_type = $this->options['seotm_use_markup_local_business_type'];
				$loc_name = $this->options['seotm_use_markup_local_business_name'];
				if (empty($loc_name)) {
                  $loc_name = get_bloginfo('name');
                }
				$loc_description = $this->options['seotm_use_markup_local_business_description'];
				$loc_phone = $this->options['seotm_use_markup_local_business_phone'];

				$loc_social = array_filter(array_map('trim', explode("\n", $this->options['seotm_use_markup_local_business_social'] ?? '')));
				$loc_social = implode(",\n  ", array_map(function ($loc_url) { return '"' . trim($loc_url) . '"'; }, $loc_social));  

				$loc_price = $this->options['seotm_use_markup_local_business_price'];
				
				$loc_image = array_filter(array_map('trim', explode("\n", $this->options['seotm_use_markup_local_business_image'] ?? '')));
				$loc_image = implode(",\n  ", array_map(function ($loc_url) { return '"' . trim($loc_url) . '"'; }, $loc_image));  
				     
				$loc_address = $this->options['seotm_use_markup_local_business_address'];
				$loc_locality = $this->options['seotm_use_markup_local_business_locality'];
				$loc_region = $this->options['seotm_use_markup_local_business_region'];
				$loc_postcode = $this->options['seotm_use_markup_local_business_postcode'];
				$loc_country = $this->options['seotm_use_markup_local_business_country'];
				$loc_geo_latitude = $this->options['seotm_use_markup_local_business_geo_latitude'];
				$loc_geo_longitude = $this->options['seotm_use_markup_local_business_geo_longitude'];
				
				// Get the opening hours textarea content
                $opening_hours = $this->options['seotm_use_markup_local_business_opening_hours'];
                
                // Split the content into an array of lines
                $lines = explode("\n", $opening_hours);
                
                // Initialize an empty array to store the opening hours specifications
                $opening_hours_specs = array();
                
                // Loop through each line and extract the day of the week, opening and closing times
                foreach ($lines as $line) {
                    $line = trim($line);
                    if (!empty($line)) {
                        $day_of_week = strtok($line, ':');
                        preg_match('/(\d{1,2}:\d{2}) - (\d{1,2}:\d{2})/', $line, $matches);
                        $opens = trim($matches[1]);
                        $closes = trim($matches[2]);
                        $opens_parts = explode(':', $opens);
                        $closes_parts = explode(':', $closes);
                        $spec = array(
                            "@type" => "OpeningHoursSpecification",
                            "dayOfWeek" => $day_of_week,
                            "opens" => sprintf('%02d:%02d', $opens_parts[0], $opens_parts[1]),
                            "closes" => sprintf('%02d:%02d', $closes_parts[0], $closes_parts[1])
                        );
                        $opening_hours_specs[] = $spec;
                    }
                }
                
                // Add the opening hours specifications to the location schema
                $loc_opening_hours_specs = $opening_hours_specs;
                
                $loc_extra = stripslashes($this->options['seotm_use_markup_local_business_extra']);

				$loc_schema='
{
 "@context": "https://schema.org",
 '.(!empty($loc_type)?'"@type": "'.$loc_type.'",':'').'
 "name": "'.$loc_name.'",
 '.(!empty($loc_description)?'"description": "'.$loc_description.'",':'').'
 "url":"'.home_url().'",
 '.(!empty($loc_price)?'"priceRange": "'.$loc_price.'",':'').'
 '.(!empty($loc_image)?'"image": [
  '.$loc_image.'
 ],':'').'
 '.(!empty($loc_phone)?'"telephone" :"'.$loc_phone.'",':'').'
 '.(!empty($loc_address)?'"address": {
  "@type": "PostalAddress",
  "streetAddress": "'.$loc_address.'",
  '.(!empty($loc_locality)?'"addressLocality": "'.$loc_locality.'",':'').'
  '.(!empty($loc_region)?'"addressRegion": "'.$loc_region.'",':'').'
  '.(!empty($loc_postcode)?'"postalCode": "'.$loc_postcode.'",':'').'
  '.(!empty($loc_country)?'"addressCountry": "'.$loc_country.'"':'').'
 }, ':'').'
 '.(!empty($loc_geo_latitude) && !empty($loc_geo_longitude) ? '"geo": {
  "@type": "GeoCoordinates",
  "latitude": '.$loc_geo_latitude.',
  "longitude": '.$loc_geo_longitude.'
 },' : '').'
 '.(!empty($opening_hours) ? '"openingHoursSpecification": ['."\n  ".implode(",\n  ", array_map(function($spec) {
  return json_encode($spec);
 }, $loc_opening_hours_specs))."\n ]," : '').'
 '.(!empty($loc_social)?'"sameAs": [
  '.$loc_social.'
 ]':'').''.(!empty($loc_extra)?',
 '.$loc_extra.'':'').'
}
';

				// remove empty lines
				$loc_schema = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $loc_schema);

				$loc_schema_tag = '<script type="application/ld+json">%s</script>'. PHP_EOL;
				printf($loc_schema_tag, wp_kses_data($loc_schema));
			}
		}
		
		// start sitelink search box schema
		if ($this->options['seotm_use_markup_sitelink_search_box']) {
			if ( is_front_page() ) {

				$slsb_schema = '
{
 "@context": "https://schema.org",
 "@type": "WebSite",
 "url": "'.home_url().'",
 "potentialAction": {
  "@type": "SearchAction",
  "target": {
   "@type": "EntryPoint",
   "urlTemplate": "'.home_url().'/search?s={search_term}"
  },
  "query-input": "required name=search_term"
 }
}
';
				$slsb_schema_tag = '<script type="application/ld+json">%s</script>'. PHP_EOL;
				printf( htmlspecialchars_decode(esc_attr($slsb_schema_tag)), htmlspecialchars_decode(wp_kses_data( $slsb_schema ) ));
			}
		}
		
		// start custom json schema
		if ($this->options['seotm_use_markup_custom_json']) {
            $custom_json_markups = get_post_meta(get_the_ID(), 'jsonScript', false);
            if (is_array($custom_json_markups) || is_object($custom_json_markups)) {
                $custom_json_tag = '<script type="application/ld+json">%s</script>' . PHP_EOL;
                foreach ($custom_json_markups as $custom_json) {
                    if (!empty($custom_json)) {
                        $custom_json = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $custom_json); // minify
                        printf(htmlspecialchars_decode(esc_attr($custom_json_tag)), htmlspecialchars_decode(esc_html($custom_json))); // print
                    }
                }
            }
        }
	    
	}
	
	public function useHrefLangXdefault() {
        $site_domain = get_site_url();
        $site_lang = get_bloginfo('language');
        $site_lang = preg_replace('/^lang=["\']/', '', $site_lang);
    
        $lang = get_language_attributes();
        
        // Extract the language value from $lang using regular expression
        if (preg_match('/lang=["\']([a-zA-Z-]+)["\']/', $lang, $matches)) {
            $lang_striped = $matches[1];
            $lang_value = $matches[1];
            // extract only the part before the hyphen
            if (strpos($lang_value, '-') !== false) {
                list($lang_value) = explode('-', $lang_value);
            }
        } else {
            $lang_value = '';
        }
    
        $default_lang = '';
    
        // Compare $site_lang with $lang_value
        if ($site_lang !== $lang_value) {
            $default_lang = $lang_striped;
        } else {
            $default_lang = $site_lang;
        }
    
        // Ensure proper escaping of values
        /*
        $site_domain_escaped = esc_url($site_domain);
        $lang_value_escaped = esc_html($lang_value);
        $default_lang_escaped = esc_attr($default_lang);
        */
    
        echo '<link rel="alternate" href="' . esc_url($site_domain) . '/" hreflang="' . esc_html($lang_value) . '" />' . "\n";
        echo '<link rel="alternate" href="' . esc_url($site_domain) . '/" hreflang="' . esc_attr($default_lang) . '" />' . "\n";
        echo '<link rel="alternate" href="' . esc_url($site_domain) . '/" hreflang="x-default" />' . "\n";
    }
    
    public function useSchemaOfferForWcArchives() {
		global $post;

		if (!is_product_category() && !is_shop()) {
			return;
		}

		$schema = array(
			"@context" => "https://schema.org",
			"@type" => "Product",
		);

		$currency_symbol = get_woocommerce_currency();
		$prices = array();
		$ratings = array();
		$total_ratings = 0;
		$total_rated_products = 0;
		$blog_name = get_bloginfo('name');

		if (is_product_category()) {
			$term = get_queried_object();

			$term_name = $term->name;
			$term_desc = $term->description;

			$args = array(
				'post_type' => 'product',
				'posts_per_page' => -1,
				'product_cat' => $term->slug,
			);

			$products = new \WP_Query($args);

			$total_products = $products->found_posts;

			if ($products->have_posts()) {
				while ($products->have_posts()) {
					$products->the_post();

					$product = wc_get_product(get_the_ID());

					if ($product->is_type('variable')) {
						// If it's a variable product, iterate through variations
						$variations = $product->get_available_variations();
						foreach ($variations as $variation) {
							$price = $variation['display_price']; // Use variation's price
							$prices[] = $price;
						}
					} else {
						$price = $product->get_price();
						$prices[] = $price;
					}

					$average_rating = $product->get_average_rating();

					if ($average_rating > 0) {
						$ratings[] = (float) $average_rating;
						$total_rated_products++;
					}

					$total_ratings += $product->get_review_count();
				}

				wp_reset_postdata();
			}

			$low_price = min($prices);
			$high_price = max($prices);

			$average_rating = ($total_rated_products > 0) ? number_format(array_sum($ratings) / $total_rated_products, 2) : 0.00;

			$schema["name"] = $term_name;
			$schema["description"] = $term_desc;
			$schema["brand"] = $blog_name;
			$schema["offers"] = array(
				"@type" => "AggregateOffer",
				"url" => get_category_link($term->term_id),
				"offerCount" => $total_products,
				"lowPrice" => $low_price,
				"highPrice" => $high_price,
				"priceCurrency" => $currency_symbol,
			);
			$schema["aggregateRating"] = array(
				"@type" => "AggregateRating",
				"ratingValue" => $average_rating,
				"bestRating" => "5",
				"worstRating" => "1",
				"ratingCount" => $total_ratings,
			);

			$thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);

			if ($thumbnail_id) {
				$thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full');
				$schema['image'] = $thumbnail_url;
			}
		}

		if (is_shop()) {

			$shop_page_id = wc_get_page_id('shop');
			$shop_page = get_post($shop_page_id);
			$shop_name = $shop_page->post_title;
			$shop_description = $shop_page->post_excerpt;

			$args = array(
				'post_type' => 'product',
				'posts_per_page' => -1,
			);
			$products = new \WP_Query($args);

			$total_products = $products->found_posts;

			if ($products->have_posts()) {
				while ($products->have_posts()) {
					$products->the_post();

					$product = wc_get_product(get_the_ID());

					if ($product->is_type('variable')) {
						// If it's a variable product, iterate through variations
						$variations = $product->get_available_variations();
						foreach ($variations as $variation) {
							$price = $variation['display_price']; // Use variation's price
							$prices[] = $price;
						}
					} else {
						$price = $product->get_price();
						$prices[] = $price;
					}

					$average_rating = $product->get_average_rating();

					if ($average_rating > 0) {
						$ratings[] = (float) $average_rating;
						$total_rated_products++;
					}

					$total_ratings += $product->get_review_count();
				}

				wp_reset_postdata();
			}

			$low_price = min($prices);
			$high_price = max($prices);

			$average_rating = ($total_rated_products > 0) ? number_format(array_sum($ratings) / $total_rated_products, 2) : 0.00;

			$schema["name"] = $shop_name;
			$schema["description"] = $shop_description;
			$schema["brand"] = $blog_name;
			$schema["offers"] = array(
				"@type" => "AggregateOffer",
				"url" => get_permalink($shop_page_id),
				"offerCount" => $total_products,
				"lowPrice" => $low_price,
				"highPrice" => $high_price,
				"priceCurrency" => $currency_symbol,
			);
			$schema["aggregateRating"] = array(
				"@type" => "AggregateRating",
				"ratingValue" => $average_rating,
				"bestRating" => "5",
				"worstRating" => "1",
				"ratingCount" => $total_ratings,
			);

			$thumbnail_id = get_post_thumbnail_id($shop_page_id);

			if ($thumbnail_id) {
				$thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full');
				$schema['image'] = $thumbnail_url;
			}
		}

		echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
	}

}