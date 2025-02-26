<?php 

if ( ! defined( 'ABSPATH' ) ) exit; 

$custom_post_meta_groups = array();
$custom_post_meta_groups['links']               = array( 'group_name' => 'URLs',                                        'metabox_classes' => 'metabox100' );
$custom_post_meta_groups['basic']               = array( 'group_name' => 'Product basic info',                          'metabox_classes' => 'metabox100' );
$custom_post_meta_groups['price']               = array( 'group_name' => 'Prices, Offers & Availability',               'metabox_classes' => 'metabox100' );
$custom_post_meta_groups['texts']               = array( 'group_name' => 'Descriptions and customizable details',       'metabox_classes' => 'metabox100' );
$custom_post_meta_groups['api']                 = array( 'group_name' => 'API Response',                                'metabox_classes' => 'metabox100' );
$custom_post_meta_groups['review']              = array( 'group_name' => 'Reviews',                                     'metabox_classes' => 'metabox100' );
$custom_post_meta_groups['prosncons']           = array( 'group_name' => 'Pros & Cons',                                 'metabox_classes' => 'metabox100' );
$custom_post_meta_groups['amazingaffiliates']   = array( 'group_name' => 'AmazingAffiliates Inventory',                 'metabox_classes' => 'metabox100' );


$custom_post_meta = array();
$custom_post_meta['amazing_product']['links'] = array(
    array( 'type' => 'string',  'slug' => 'affiliate_link', 	'name' => 'Affiliate Link', 		    'metabox' => 'displaylink',	    'metabox_classes' => 'metabox100 gray_metabox' 		),
    array( 'type' => 'string',  'slug' => 'primary_img_url', 	'name' => 'Marketplace Image URL',	    'metabox' => 'displaylink',		'metabox_classes' => 'metabox100 gray_metabox'  	)
);
$custom_post_meta['amazing_product']['basic'] = array(
    array( 'type' => 'string',  'slug' => 'asin', 				'name' => 'ASIN', 					    'metabox' => 'input',		'metabox_classes' => 'metabox100 gray_metabox' 		),
    array( 'type' => 'string',  'slug' => 'creation_date', 		'name' => 'Created On', 			    'metabox' => 'time',		'metabox_classes' => 'metabox50 gray_metabox' 		),
    array( 'type' => 'string',  'slug' => 'last_update', 		'name' => 'Last Update', 			    'metabox' => 'time',		'metabox_classes' => 'metabox50 gray_metabox' 		)
);
$custom_post_meta['amazing_product']['texts'] = array(
    array( 'type' => 'string',  'slug' => 'custom_title', 		'name' => 'Custom Title', 			    'metabox' => 'textarea',	'metabox_classes' => 'metabox100 green_metabox' 	),
    array( 'type' => 'string',  'slug' => 'details', 			'name' => 'Details (Default from APIs)', 'metabox' => 'details',	'metabox_classes' => 'metabox100 gray_metabox'  	)
);
$custom_post_meta['amazing_product']['price'] = array(
    array( 'type' => 'string',  'slug' => 'current_price', 		'name' => 'Current Price', 			    'metabox' => 'display',		'metabox_classes' => 'metabox50 gray_metabox' 		),
    array( 'type' => 'string',  'slug' => 'currency', 			'name' => 'Currency', 				    'metabox' => 'display',	    'metabox_classes' => 'metabox25 gray_metabox'  		),
    array( 'type' => 'string',  'slug' => 'list_price', 		'name' => 'List Price', 			    'metabox' => 'display',		'metabox_classes' => 'metabox50 gray_metabox' 		),
    array( 'type' => 'number',  'slug' => 'offer', 				'name' => 'Offer', 					    'metabox' => 'displaybool',	'metabox_classes' => 'metabox25 gray_metabox'  		),
    array( 'type' => 'number',  'slug' => 'discount', 			'name' => 'Discount', 				    'metabox' => 'displayx100',	'metabox_classes' => 'metabox33 gray_metabox'  		),
    array( 'type' => 'boolean', 'slug' => 'stock', 				'name' => 'Stock Status', 			    'metabox' => 'display',		'metabox_classes' => 'metabox33 gray_metabox'  		),
    array( 'type' => 'string',  'slug' => 'availability', 		'name' => 'Availability Status', 	    'metabox' => 'display',		'metabox_classes' => 'metabox33 gray_metabox'  		),
    array( 'type' => 'string',  'slug' => 'availability_msg', 	'name' => 'Availability Message', 	    'metabox' => 'display',		'metabox_classes' => 'metabox33 gray_metabox'  		),
    array( 'type' => 'string',  'slug' => 'condition-value', 	'name' => 'Condition Value', 		    'metabox' => 'display',		'metabox_classes' => 'metabox33 gray_metabox'  		),
    array( 'type' => 'string',  'slug' => 'merchant_info-name', 'name' => 'Merchant Name', 			    'metabox' => 'display',		'metabox_classes' => 'metabox33 gray_metabox'  		)
);
$custom_post_meta['amazing_product']['api'] = array(
    array( 'type' => 'string',  'slug' => 'api_response', 		'name' => 'API Response', 			    'metabox' => 'details',	    'metabox_classes' => 'metabox100 gray_metabox'  		)
);
$custom_post_meta['post']['amazingaffiliates'] = array(
    array( 'type' => 'string',  'slug' => 'products', 			'name' => 'Products', 				    'metabox' => 'display',	    'metabox_classes' => 'metabox100 gray_metabox' 		)
);


$custom_post_meta_metaboxes = array();
$custom_post_meta_metaboxes[0] = array( 'id' => 'amazing_product_meta_metabox',     'title' => 'Product Data',             'post_type' => 'amazing_product' );
$custom_post_meta_metaboxes[1] = array( 'id' => 'amazing_post_meta_metabox',        'title' => 'AmazingAffiliates Data',   'post_type' => 'post' );