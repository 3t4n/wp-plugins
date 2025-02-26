<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Sirve_Filter{

    private static $_instance = null;
    public static function instance(){
        if( is_null( self::$_instance ) ){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    function __construct(){
        // Ajax Call All Listing Search
		add_action( 'wp_ajax_sirve_search', [ $this, 'search_request' ] );
		add_action( 'wp_ajax_nopriv_sirve_search', [ $this, 'search_request' ] );
		// Ajax Call All Listing Category
		add_action( 'wp_ajax_sirve_category_search', [ $this, 'sirve_category' ] );
		add_action( 'wp_ajax_nopriv_sirve_category_search', [ $this, 'sirve_category' ]);
    }

    public function search_request(){
		//search Key
        $s = isset( $_REQUEST['s'] ) ? sanitize_text_field( $_REQUEST['s'] ) : '';
		//Current Page
		$currentPage = ( isset($_REQUEST['page']) ) ? intval( $_REQUEST['page'] ) : 0;
		//Event
		$sirveEvent = (isset($_REQUEST['sirveevent'])) ? sanitize_text_field( $_REQUEST['sirveevent'] ) : '';
		// Tags
		$sirveTags =  ( isset( $_REQUEST['sirveTags']) && !empty($_REQUEST['sirveTags'])) ? array_map( 'sanitize_text_field', $_REQUEST['sirveTags'] ) : array();
		//print_r($sirveTags);
		//Nonce
		check_ajax_referer('sirve_itemsa_nonce', 'nonce');
		//Sirve Par Pages
		$sirve_par_pages = 0;
		if(!empty(get_option('sirve_par_pages'))){
			$sirve_par_pages = get_option('sirve_par_pages');
		}else{
			$sirve_par_pages = 15;
		}

		$args = array(
			'post_type'         => 'sirve',
			'post_status' 		=> 'publish',
			'orderby'        	=> 'meta_value_num ' . get_option( 'sirve_post_order_by', 'ID' ),
			'order'          	=> get_option( 'sirve_post_order', 'DESC' ),
			'meta_key'       	=> 'htSirveFeaturePost',
			'posts_per_page' 	=> $sirve_par_pages,
			'offset' 			=> ($currentPage ) * $sirve_par_pages,
			's' => $s,
		);

		if(isset($sirveEvent) && isset($sirveTags)){		
			$sirveCatoragorys = get_terms( 'sirve_category');
			$sirveCatogry = array();
			foreach($sirveCatoragorys as $catagory){
				$sirveCatogry[] = $catagory->slug;
			}

			//Start category
			$args_tax_query = $args['tax_query'] = array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'sirve_category',
					'field'    => 'slug',
					'terms'    => $sirveCatogry,
				)
			);

			//Event
			if(!empty($sirveEvent)){
				$args_tax_query[] = array(
					'taxonomy' => 'sirve_event',
					'field'    => 'slug',
					'terms'    => $sirveEvent,
				);
			}
			//Tag
			if(!empty($sirveTags)){
				$args_tax_query[] = array(
					'taxonomy' => 'sirve_tag',
					'field'    => 'slug',
					'terms'    => $sirveTags,
				);
			}

			$args['tax_query'] = $args_tax_query;
		}
		
		$query = new WP_Query( $args );

		if( $query->have_posts() ):
			sirve_pagination($query, $currentPage, $s, $sirveEvent, $sirveTags,'sirve-search-pagination');
		else:
			?><p class="text-center sirve_psa_wrapper sirve_no_result"><?php echo esc_html__( 'List Not Found', 'sirve' ) ?></p><?php 
		endif; 
		wp_reset_query(); 
		wp_die();
    }

	public function sirve_category(){
		//Categorie
		$sirveKeyValue = sanitize_text_field( $_REQUEST['sirveCategorie'] );
		// Event
		$sirveEvent = (isset($_REQUEST['sirveevent'])) ? sanitize_text_field( $_REQUEST['sirveevent'] ) : '';
		// Page Number
		$currentPage = ( isset($_REQUEST['page']) ) ? intval( $_REQUEST['page'] ) : 0;
		//Shortcode
		$options = ( isset( $_REQUEST['options']) && !empty($_REQUEST['options'])) ? array_map( 'sanitize_text_field', $_REQUEST['options'] ) : array();
		
		// Tags
		$sirveTags =  ( isset( $_REQUEST['sirveTags']) && !empty($_REQUEST['sirveTags'])) ? array_map( 'sanitize_text_field', $_REQUEST['sirveTags'] ) : array();

		//nonce
		check_ajax_referer('sirve_itemsa_nonce', 'nonce');

		$sirve_par_pages = 0;
		if(!empty(get_option('sirve_par_pages'))){
			$sirve_par_pages = get_option('sirve_par_pages');
		}else{
			$sirve_par_pages = 15;
		}

		$args = array(
			'post_type'     => 'sirve', 
			'post_status'   => 'publish',
			'orderby'        => (isset( $options['orderby']) && !($options['orderby'] == '')) ?  'meta_value_num ' . esc_attr( $options['orderby'] ) : 'meta_value_num ' . get_option( 'sirve_post_order_by', 'ID' ),
            'order'          => (isset($options['order']) && !($options['order'] == '')) ? esc_attr( $options['order'] ) : get_option( 'sirve_post_order', 'DESC' ),
			'meta_key'       => 'htSirveFeaturePost',
			'posts_per_page' => $sirve_par_pages,
			'offset' => ($currentPage ) * $sirve_par_pages
		);

		if( $sirveKeyValue !== "all" ){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'sirve_category',
					'field'    => 'slug',
					'terms'    => $sirveKeyValue,
				),
			);
		}

		if(isset($sirveEvent) || isset($sirveTags)){
			if($sirveKeyValue == 'all'){
				$sirveCatoragorys = get_terms( 'sirve_category');
				$sriveCatogry = array();
				foreach($sirveCatoragorys as $catagory){
					$sriveCatogry[] = $catagory->slug;
				}
			}

			//Start category
			$args_tax_query = $args['tax_query'] = array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'sirve_category',
					'field'    => 'slug',
					'terms'    => ( $sirveKeyValue !== 'all' ) ? $sirveKeyValue :  $sriveCatogry,
				)
			);

			//Event
			if(!empty($sirveEvent)){
				$args_tax_query[] = array(
					'taxonomy' => 'sirve_event',
					'field'    => 'slug',
					'terms'    => $sirveEvent,
				);
			}
			//Tag
			if(!empty($sirveTags)){
				$args_tax_query[] = array(
					'taxonomy' => 'sirve_tag',
					'field'    => 'slug',
					'terms'    => $sirveTags,
				);
			}

			$args['tax_query'] = $args_tax_query;
	
		}

		$query = new WP_Query( $args );
		if( $query->have_posts() ):
			sirve_pagination($query, $currentPage, $sirveKeyValue, $sirveEvent, $sirveTags);
		else:
			?><p class="text-center sirve_psa_wrapper sirve_no_result"><?php echo esc_html__( 'List Not Found', 'sirve' ); ?> </p><?php 
		endif; // have posts
		
		wp_reset_query(); 
		wp_die();		
	}
}
Sirve_Filter::instance();


