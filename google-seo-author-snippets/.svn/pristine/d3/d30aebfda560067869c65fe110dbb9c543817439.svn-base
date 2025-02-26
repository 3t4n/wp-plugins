<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function smack_google_seo_schema_events($text) {
	global $post;
	$prefix = 'google_snippets';
	// Get the product values for schema
	$google_seo_events_summary = get_post_meta( $post->ID, $prefix.'events_summary', true );
	$google_seo_events_url = get_post_meta( $post->ID, $prefix.'events_url', true );
	$google_seo_events_photo = get_post_meta( $post->ID, $prefix.'events_photo', true );
	$google_seo_events_description = get_post_meta( $post->ID, $prefix.'events_description', true );
	$google_seo_events_location = get_post_meta( $post->ID, $prefix.'events_location', true );
	$google_seo_events_startdate = get_post_meta( $post->ID, $prefix.'events_startdate', true );
	$google_seo_events_enddate = get_post_meta( $post->ID, $prefix.'events_enddate', true );
	$google_seo_events_street_address = get_post_meta( $post->ID, $prefix.'events_street_address', true );
	$google_seo_events_locality = get_post_meta( $post->ID, $prefix.'events_locality', true );
	$google_seo_events_region = get_post_meta( $post->ID, $prefix.'events_region', true );
	$google_seo_events_country = get_post_meta( $post->ID, $prefix.'events_country', true );
	$google_seo_events_type = get_post_meta( $post->ID, $prefix.'events_type', true );
	$google_seo_eventsoffer_aggregate = get_post_meta( $post->ID, $prefix.'events_offer_aggregate', true );
	$google_seo_offer_low_price = get_post_meta( $post->ID, $prefix.'low_price', true );
	$google_seo_offer_high_price = get_post_meta( $post->ID, $prefix.'high_price', true );
	$google_seo_offer_name = get_post_meta( $post->ID, $prefix.'offer_name', true );
	$google_seo_offer_category = get_post_meta( $post->ID, $prefix.'offer_category', true );
	$google_seo_offer_url = get_post_meta( $post->ID, $prefix.'offer_url', true );
	$google_seo_events_performer = get_post_meta( $post->ID, $prefix.'events_performer', true );
	$google_seo_events_website = get_post_meta( $post->ID, $prefix.'events_website', true );
	$google_seo_events_ticket_price = get_post_meta( $post->ID, $prefix.'events_ticket_price', true );
	$google_seo_events_ticket_price_valid = get_post_meta( $post->ID, $prefix.'events_tickets_price_valid', true );
	$google_seo_events_ticket_quantity = get_post_meta( $post->ID, $prefix.'events_ticket_quantity', true );
	$google_seo_events_tickets_currency = get_post_meta( $post->ID, $prefix.'events_tickets_currency', true );
	$user_firstname = get_the_author_meta('user_firstname'); // retrieve firstname
	$user_lastname = get_the_author_meta('user_lastname'); // retrieve lastname
	$authdate = get_the_date( 'D M j' );
	$author = get_option('gsas_checked1');
	$date = get_option('gsas_checked2');
	$displ = get_option('gsas_checked4');
	if ($displ == 'checked') {
		$disp = 'block' ;
	} else {
		$disp = 'none' ;
	}
	$google_seo_events_author = $user_firstname . $user_lastname;
	$google_seo_events_date = $authdate;
	$smack_google_seo_schema_events = '';

	$smack_google_seo_schema_events .= ' <div style="display:'.$disp.';box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  transition: 0.3s;width: 100%;height:60%;border-radius: 5px;"> 
		<div style="padding:2%;display: '.$disp.'; " itemscope itemtype="https://schema.org/Event">
		<a itemprop="url" href="'.$google_seo_events_url.'">
		<span style="color: blue;
	font-size: 28px;
	font-style: italic;"style="float:right;" itemprop="name"> '.$google_seo_events_summary.' </span>
		</a> <img style="float:right;border-radius: 5px 5px 0 0;max-width: 21% ! important;"itemprop="image" src="'. $google_seo_events_photo .'" width:"50" height:"50"/>
		<div>Events url:
		<meta itemprop="eventurl" content="'.$google_seo_events_url.'"><a href="'.$google_seo_events_url.'">Link</a></br>
		</div>
		<div >Startdate:
		<meta  itemprop="startDate" content="'.$google_seo_events_startdate.'">'.$google_seo_events_startdate.'<br>End Date
		<meta itemprop="endDate" content="'.$google_seo_events_enddate.'">'.$google_seo_events_enddate.'</div><br>
		<br><div>Location:
		<meta itemprop="location" content="'.$google_seo_events_location.'">'.$google_seo_events_location.'
		<div style="float:center;">Description:
		<meta itemprop="description" content="'.$google_seo_events_description.'">'.$google_seo_events_description.'
		<br><div >Performer:
		<meta itemprop="performer" content="'.$google_seo_events_performer.'">'.$google_seo_events_performer.'<br>
		low price:<span itemprop="low price">'.$google_seo_offer_low_price.'</span><br>
		high price:<span itemprop="high price">'.$google_seo_offer_high_price.'</span><br>
		</div><div style="float:right;margin-right:20%;">
		<div  itemprop="offers" itemscope itemtype="https://schema.org/Offer">
		offer aggregate:
		<span itemprop="aggregate">'.$google_seo_eventsoffer_aggregate.'</span><br>
		Offer Name:
		<span itemprop="name">'.$google_seo_offer_name.'</span><br>
		Offer quantity:<span itemprop="quantity">'.$google_seo_events_ticket_quantity.'</span><br>
		offer category:<span itemprop="category">'.$google_seo_offer_category.'</span><br><span style="display:none;" itemprop="availability">'.$google_seo_events_ticket_quantity.'</span><br>Price:
		<span itemprop="price">'.$google_seo_events_ticket_price.'</span><br>
		<span itemprop="quantity">'.$google_seo_events_ticket_price_valid.'</span><br>
		<span itemprop="priceCurrency">'.$google_seo_events_tickets_currency.'</span><br>
		<a itemprop="url" href="'.esc_url($google_seo_offer_url).'">
		'.$google_seo_events_summary.'
		</div>                                            </a></div>
		<div itemprop="location" itemscope itemtype="https://schema.org/Place">
		<div " itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">Address :
		<span itemprop="streetAddress">'.$google_seo_events_street_address.'</span>
		<span style="display:none;" itemprop="name">'.$google_seo_events_summary.'</span><br>
		<span style="padding-left: 17%;" itemprop="addressLocality">'.$google_seo_events_locality.'</span><br>
		<span  style="padding-left: 17%;" itemprop="addressRegion">'.$google_seo_events_region.'</span>
		<div style="padding-left: 17%;" itemprop="addressCountry" itemscope itemtype="https://schema.org/Country">
		<span itemprop="name"> '.$google_seo_events_country.' </span>
		</div>
		Event website:<a href="'.$google_seo_events_website.'"temprop="website">Link</a><br>
		Events type:<span itemprop="type">'.$google_seo_events_type.'</span>
		</div>

		<br>';
	if($author == 'checked' && $date == 'checked'){
		$smack_google_seo_schema_events .='<div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published on<span itemprop="published Date">'.$google_seo_events_date.'</span>
			by<span itemprop="auhtor Name">'.$google_seo_events_author.'</span>

			</div>
			</div>';
	}
	elseif($author == 'checked'){
		$smack_google_seo_schema_events .='<div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published 
			by<span itemprop="auhtor Name">'.$google_seo_events_author.'</span>

			</div>
			</div>';
	}
	elseif($date == 'checked'){
		$smack_google_seo_schema_events .='<div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published on<span itemprop="published Date">'.$google_seo_events_date.'</span>

			</div>
			</div>';
	}

	$smack_google_seo_schema_events .='  </div></div>';
	return $text.$smack_google_seo_schema_events;
}
function smack_google_seo_schema_add_events() {
	global $post;
	$prefix = 'google_snippets';
	$google_seo_event_name = get_post_meta( $post->ID, $prefix.'events_summary', true );
	if( $google_seo_event_name != '' && !is_home() ) {
		add_filter( "the_content", "smack_google_seo_schema_events" );
	}
}
add_action('wp', 'smack_google_seo_schema_add_events');
