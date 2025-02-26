<?php
class Wos_biawp_Public 
{
	private $plugin_name;
	private $version;
	
	public $bilings = [
        'First name'    => '_billing_first_name',
        'Last name'     => '_billing_last_name',
        'Company'       => '_billing_company',
        'Address1'      => '_billing_address_1',
        'Address2'      => '_billing_address_2',
        'City'          => '_billing_city',
        'Postcode'      => '_billing_postcode',
        'Email'         => '_billing_email',
        'Phone'         => '_billing_phone',
    ];

	public function __construct( $plugin_name, $version ) 
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() 
	{
	    if( !is_user_logged_in() || !is_account_page() || !is_wc_endpoint_url('orders') ) return;
	    
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wos-public.css', array(), $this->version, 'all' );
		
		if(is_rtl()){
		    wp_enqueue_style( 'wos-rtl', plugin_dir_url( __FILE__ ) . 'css/wos-public-rtl.css', array(), $this->version, 'all' );
		}
	}

	public function enqueue_scripts() {}
	
	public function wos_woocommerce_before_account_orders($has_orders)
	{
	    require dirname(__FILE__) . '/partials/wos-public-display.php';
	}
	
	public function wos_woocommerce_my_account_my_orders_query($args)
	{
		if ( ! isset ( $_GET['wos_filter'] ) ) return $args;

	    $item = unserialize(get_option('wos-setting'));
        if(is_array($item) && count(array_filter($item))==0) return $args; 

	    $args['order'] = 'DESC';
	    
	    $params = array(
            'posts_per_page' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => 'shop_order',
            'post_status' => array_keys( wc_get_order_statuses() ),
            'meta_query' => [
                'relation' => 'AND'
             ],
             'date_query' => [[
                 'inclusive' => true
             ]]
        );
        
        $mains = [
            'numberposts',
            'post_status'
        ];
        
        foreach( $mains as $main )
        {
            if( isset($_GET[$main]) && $_GET[$main]!=='' )
            {
                $args[$main] = sanitize_text_field($_GET[$main]);
            }
        }
        
        foreach( $this->bilings as $meta )
        {
            if( isset($_GET[$meta]) && $_GET[$meta]!=='' )
            {
                $params['meta_query'][] = [
                    'key'     	=> $meta,
                    'value'		=> sanitize_text_field($_GET[$meta]),
					'compare'	=> 'LIKE'
                ];
            }
        }

		if( 
			$item['sequential_order_numbers_support'] && 
			isset($_GET['order_number']) && 
			$_GET['order_number'] !== '' 
		)
		{
			$params['meta_query'][] = [
				'key'     => '_order_number',
				'value'   => sanitize_text_field($_GET['order_number']),
			];
		}
        
        if( isset($_GET['event_start_date']) && $_GET['event_start_date']!=='' )
        {
            $params['date_query'][0]['after'] = sanitize_text_field($_GET['event_start_date']);
        }
        
        if( isset($_GET['event_end_date']) && $_GET['event_end_date']!=='' )
        {
            $params['date_query'][0]['before'] = sanitize_text_field($_GET['event_end_date']);
        }
        
        $posts = get_posts($params);
        $all = [];
        
        foreach( $posts as $post ){
            $all[] = $post->ID;
        }
        
        $all = empty($all) ? [0] : $all;
        
		if ( $item['sequential_order_numbers_support'] != '1' )
		{
			$args['post__in'] = isset($_GET['order_number']) && $_GET['order_number']!=='' ? [sanitize_text_field($_GET['order_number'])] : $all;
		}
		else {
			$args['post__in'] = $all;
		}
        
        return $args;
	}

}
