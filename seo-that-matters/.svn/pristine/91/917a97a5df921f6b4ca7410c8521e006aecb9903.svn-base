<?php

/**
 * forked & modified from https://github.com/Nikschavan/json-ld-breadcrumbs
 * 
 */
	
namespace SeoThatMatters;

if (!defined('WPINC')) { die; }

class SeotmPluginBreadcrumbs {

	private static $instance = null;

	/**
	 * Crumb position. Increases everytime a new crumb is added.
	 *
	 * @var integer
	 */
	private $crumb_position = 0;

	/**
	 * Crunbs Array
	 *
	 * @var array
	 */
	private $crumbs = array();

	/**
	 * Initiate the class SeotmPluginBreadcrumbs
	 *
	 * @return (Object) Instance of SeotmPluginBreadcrumbs
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) ) {
		    self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {
	    
		$this->post           = ( isset( $GLOBALS['post'] ) ? $GLOBALS['post'] : null );
		$this->show_on_front  = get_option( 'show_on_front' );
		$this->page_for_posts = get_option( 'page_for_posts' );

		add_action( 'wp_footer', [$this, 'set_crumbs'], 1 );
		add_shortcode('seotm_breadcrumbs', [$this, 'seotm_breadcrumbs_shortcode']);
	}

	/**
	 * Initialize the Schema for the breadcrumbs markup.
	 *
	 * @param  (Array) $breadcrumb Breadcrumbs array.
	 * @return (Array) $breadcrumb Breadcrumbs array.
	 */
	private function initialize_breadcrumb_schema( $breadcrumb ) {
		$breadcrumb['@context'] = 'http://schema.org';
		$breadcrumb['@type']    = 'BreadcrumbList';

		return $breadcrumb;
	}

	/**
	 * Adds homepage to the breadcrumb.
	 *
	 */
	private function maybe_add_home_crumb() {
		$seotm_breadcrumb_home = apply_filters( 'seotm_breadcrumb_home', 'Home' ); // set the filter so it can be changed later
		$this->add_crumb(
			$seotm_breadcrumb_home,
			get_site_url()
		);
	}

	/**
	 * Conditionally adds blog page to the breadcrumb.
	 *
	 */
	private function maybe_add_blog_crumb() {
		if ( ( 'page' === $this->show_on_front && 'post' === get_post_type() ) && ( ! is_home() && ! is_search() ) ) {
    		if ( $this->page_for_posts ) {
    		//	$this->add_crumb( get_the_title( $this->page_for_posts ), get_permalink( $this->page_for_posts ) );
    		}
		}
	}

	/**
	 * Add crumb to the breadcrumbs array.
	 *
	 * @param String $name Name of the Breadcrumb element.
	 * @param string $url URL of the Breadcrumb element.
	 * @param string $image Image URL of the Breadcrumb element.
	 */
	private function add_crumb( $name, $url = '', $image = '' ) {
		// $this->crumb_position = count($this->crumbs) + 1; // original
		$this->crumb_position = count($this->crumbs) + 1;

		if ( '' === $image ) {
    		$this->crumbs[] = array(
    			'@type'    => 'ListItem',
    			'position' => $this->crumb_position,
    			'item'     => array(
    			'@id'  => esc_url( $url ),
    			'name' => esc_html( $name ),
    			),
    		);
		} else {
    		$this->crumbs[] = array(
    			'@type'    => 'ListItem',
    			'position' => $this->crumb_position,
    			'item'     => array(
    			'@id'   => esc_url( $url ),
    			'name'  => esc_html( $name ),
    			'image' => $image,
    			),
    		);
		}
	}

	/**
	 * Post type archive title.
	 *
	 * @param  string $pt The name of a registered post type.
	 * @return String     Title of the post type.
	 */
	private function post_type_archive_title( $pt ) {
		$archive_title = '';

		$post_type_obj = get_post_type_object( $pt );
		if ( is_object( $post_type_obj ) ) {
    		if ( isset( $post_type_obj->label ) && '' !== $post_type_obj->label ) {
    			$archive_title = $post_type_obj->label;
    		} elseif ( isset( $post_type_obj->labels->menu_name ) && '' !== $post_type_obj->labels->menu_name ) {
    			$archive_title = $post_type_obj->labels->menu_name;
    		} else {
    			$archive_title = $post_type_obj->name;
    		}
		}

		return $archive_title;
	}

	/**
	 * Conditionally adds the post type archive to the breadcrumb.
	 *
	 */
	private function maybe_add_pt_archive_crumb_for_post() {
		if ( 'post' === $this->post->post_type ) {
		    return;
		}
		if ( isset( $this->post->post_type ) && get_post_type_archive_link( $this->post->post_type ) ) {
		    $this->add_crumb( $this->post_type_archive_title( $this->post->post_type ), get_post_type_archive_link( $this->post->post_type ) );
		}
	}

	/**
	 * Conditionally adds taxanomy titles to the breadcrumb.
	 *
	 */
	private function maybe_add_taxonomy_crumbs_for_post() {
		// TODO: Add an option in admin panel to choose taxanomy base in the breadcrumb.
	}

	/**
	 * Adds post ancestor to the breadcrumb.
	 *
	 */
	private function add_post_ancestor_crumbs() {
		$ancestors = $this->get_post_ancestors();
    		if ( is_array( $ancestors ) && array() !== $ancestors ) {
    		foreach ( $ancestors as $ancestor ) {
    			$this->add_crumb( get_the_title( $ancestor ), get_permalink( $ancestor ) );
    		}
		}
	}

	/**
	 * Finds the post ancestors.
	 *
	 * @return Array Ancestors for the current page.
	 */
	private function get_post_ancestors() {
		$ancestors = array();

		if ( isset( $this->post->ancestors ) ) {
    		if ( is_array( $this->post->ancestors ) ) {
    			$ancestors = array_values( $this->post->ancestors );
    		} else {
    			$ancestors = array( $this->post->ancestors );
    		}
		} elseif ( isset( $this->post->post_parent ) ) {
		    $ancestors = array( $this->post->post_parent );
		}

		// Reverse the order so it's oldest to newest.
		$ancestors = array_reverse( $ancestors );

		return $ancestors;
	}

	/**
	 * Add Taxanomies to breadcrumb.
	 *
	 */
	private function add_crumbs_for_taxonomy() {
		$term = $GLOBALS['wp_query']->get_queried_object();
		$this->add_crumb( $term->name, get_term_link( $term ) );
	}

	/**
	 * Add month to the breadcrumb.
	 *
	 */
	private function add_month_crumb() {
		$this->add_crumb(
    		'Archives for ' . esc_html( single_month_title( ' ', false ) ),
    		get_month_link( get_query_var( 'y' ), get_query_var( 'monthnum' ) )
		);
	}

	/**
	 * Add Month and year to breadcrumb for date archive.
	 *
	 */
	private function add_linked_month_year_crumb() {
		$this->add_crumb(
		$GLOBALS['wp_locale']->get_month( get_query_var( 'monthnum' ) ) . ' ' . get_query_var( 'year' ),
		get_month_link( get_query_var( 'year' ), get_query_var( 'monthnum' ) )
		);
	}

	/**
	 * Add date to the breadcrumb.
	 *
	 */
	private function add_date_crumb() {
		$this->add_crumb(
    		'Archives for ' . esc_html( single_month_title( ' ', false ) ),
    		get_day_link( get_query_var( 'year' ), get_query_var( 'monthnum' ), get_query_var( 'day' ) )
		);
	}

	/**
	 * Add year to the breadcrumb.
	 *
	 */
	private function add_year_crumb() {
		$this->add_crumb(
    		'Archives for ' . esc_html( get_query_var( 'year' ) ),
    		get_year_link( get_query_var( 'year' ) )
		);
	}

	/**
	 * Conditionally add individual crumbs to the breadcrumb.
	 *
	 */
	private function add_breadcrumb_crumbs() {
		global $wp_query;

		$this->maybe_add_home_crumb();
		$this->maybe_add_blog_crumb();

		if ( ( 'page' === $this->show_on_front && is_front_page() ) || ( 'posts' === $this->show_on_front && is_home() ) ) { // phpcs:ignore Generic.CodeAnalysis.EmptyStatement.DetectedIf
		// Do nothing.
		} elseif ( 'page' === $this->show_on_front && is_home() ) {
		    $this->add_crumb( get_the_title( $this->page_for_posts ), get_permalink( $this->page_for_posts ) );
		} elseif ( is_singular() ) {
		    $this->maybe_add_pt_archive_crumb_for_post();

    		if ( isset( $this->post->post_parent ) && 0 === $this->post->post_parent ) {
    			$this->maybe_add_taxonomy_crumbs_for_post();
    		} else {
    			$this->add_post_ancestor_crumbs();
    		}
    
    		if ( isset( $this->post->ID ) ) {
    			$this->add_crumb( get_the_title( $this->post->ID ), get_permalink( $this->post->ID ) );
    		}
		} else {
    		if ( is_post_type_archive() ) {
    			$post_type = $wp_query->get( 'post_type' );
    
    			if ( $post_type && is_string( $post_type ) ) {
    			$this->add_crumb( $this->post_type_archive_title( $post_type ), get_post_type_archive_link( $post_type ) );
			}
    		} elseif ( is_tax() || is_tag() || is_category() ) {
    			$this->add_crumbs_for_taxonomy();
    		} elseif ( is_date() ) {
    			if ( is_day() ) {
    			$this->add_linked_month_year_crumb();
    			$this->add_date_crumb();
    			} elseif ( is_month() ) {
    			$this->add_month_crumb();
    			} elseif ( is_year() ) {
    			$this->add_year_crumb();
    			}
    		} elseif ( is_author() ) {
    			$user = $wp_query->get_queried_object();
    			$this->add_crumb(
    			'Archives for ' . $user->display_name,
    			get_author_posts_url( $user->ID, $user->nicename )
    			);
    		} elseif ( is_search() ) {
    			$this->add_crumb(
    			'Search results for ' . esc_html( get_search_query() ),
    			get_search_link( get_query_var( 's' ) )
    			);
    		} elseif ( is_404() ) {
    			$this->add_crumb(
    			'Error 404: Page not found',
    			null
    			);
    		}
		}

		return apply_filters( 'json_ld_breadcrumb_itemlist_array', $this->crumbs );
		
	}

	/**
	 * Initialize the breadcrumbs.
	 *
	 */
	public function set_crumbs() {
		$breadcrumb = array();
		$breadcrumb = $this->initialize_breadcrumb_schema( $breadcrumb );
		$breadcrumb['itemListElement'] = $this->add_breadcrumb_crumbs();
		$this->json_schema( apply_filters( 'json_ld_breadcrumb_array', $breadcrumb ) );
	}

	/**
	 * Output the ld+json schema markup.
	 *
	 * @param  Array $schema Array to be converted to json markup.
	 */
	private function json_schema( $schema ) {
		
		$schema_output = null;

		if ( ! empty( $schema ) && is_array( $schema ) ) {
		    
			$schema_output .= '
<script type="application/ld+json">
'.wp_json_encode( $schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ).'
</script>';
		}
        
		echo $schema_output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
	
	
	
	/**
	 * Generate breadcrumb shortcode
	 *
	 */
	
	private function generate_breadcrumb_html() {
        //$breadcrumb = $this->initialize_breadcrumb_schema(array());
        
        // shortcode style
        $inline_style = "
            .seotm-breadcrumbs {
                display: block;
                position: relative;
                text-transform: uppercase;
                font-size: small;
                line-height: 1.2
            }
            .seotm-breadcrumbs span {
                display: inline-flex;
                align-items: center;
            }
			.seotm-breadcrumbs .separator {
			    margin: 0 5px;
			}
		";

		// minify the inline style before inject
		$inline_style = preg_replace(['#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s','#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~]|\s(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si','#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si','#(?<=[\s:,\-])0+\.(\d+)#s',],['$1','$1$2$3$4$5$6$7','$1','.$1',], $inline_style);
        
        
        $output = '';
        
        $output .= "<style id='seotm-breadcrumb-style-inline-css'>";
        $output .= wp_strip_all_tags($inline_style);
        $output .= "</style>";
    
        $this->add_breadcrumb_crumbs();
    
        if (!empty($this->crumbs)) {
            $output .= '<nav class="seotm-breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">';
    
            $itemCount = count($this->crumbs);
    
            for ($i = 0; $i < $itemCount; $i++) {
                $crumb = $this->crumbs[$i];
    
                $output .= '<span class="' . sanitize_html_class(($i + 1) . '-item') . '" itemscope itemprop="itemListElement" itemtype="https://schema.org/ListItem">';
                $output .= '<meta itemprop="position" content="' . esc_attr($i + 1) . '">';
    
                if ($i !== ($itemCount - 1)) {
                    $output .= '<a href="' . esc_url($crumb['item']['@id']) . '" itemprop="item">';
                }
    
                $output .= '<span itemprop="name">' . esc_html($crumb['item']['name']) . '</span>';
    
                if ($i !== ($itemCount - 1)) {
                    $output .= '</a>';
                }
    
                $output .= '<meta itemprop="url" content="' . esc_url($crumb['item']['@id']) . '">';
    
                if ($i !== ($itemCount - 1)) {
                    $output .= '<svg class="separator" fill="currentColor" width="7" height="7" viewBox="0 0 8 8" aria-hidden="true" focusable="false">';
                    $output .= '<path d="M2,6.9L4.8,4L2,1.1L2.6,0l4,4l-4,4L2,6.9z"></path>';
                    $output .= '</svg>';
                }
    
                $output .= '</span>';
            }
    
            $output .= '</nav>';
        }
    
        // Reset the crumbs array to prevent duplication
        $this->crumbs = array();
    
        return $output;
    }
    
    /**
	 * Output breadcrumb shortcode.
	 *
	 */
	
	public function seotm_breadcrumbs_shortcode() {
		ob_start();
		return $this->generate_breadcrumb_html();
		return ob_get_clean();
	}
	
	

}