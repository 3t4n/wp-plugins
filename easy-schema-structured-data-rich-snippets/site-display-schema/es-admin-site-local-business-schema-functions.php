<?php
/**
 * Local Business display functions for site wide.
 * 
 */
function essdrs_easy_schema_local_business_output() {	 

  $business_type = esc_attr( get_option( 'local_business_type' ) );
  $business_name = esc_attr( get_option( 'local_business_name' ) );
  $business_description = esc_attr( get_option( 'local_business_description' ) );
  $business_url = esc_attr( get_option( 'local_business_url' ) );
  $business_image = esc_attr( get_option( 'local_business_image' ) );
  $business_logo = esc_attr( get_option( 'local_business_logo' ) );
  $business_telephone = esc_attr( get_option( 'local_business_telephone' ) );
  $business_currency = esc_attr( get_option( 'local_business_currency' ) );
  $business_price = esc_attr( get_option( 'local_business_price' ) );
  $business_payment = esc_attr( get_option( 'local_business_payment' ) );
  $business_legal = esc_attr( get_option( 'local_business_legal' ) );
  $business_street = esc_attr( get_option( 'local_business_steet' ) );
  $business_town = esc_attr( get_option( 'local_business_town' ) );
  $business_city = esc_attr( get_option( 'local_business_city' ) );
  $business_zip = esc_attr( get_option( 'local_business_zip' ) );
  $business_country = esc_attr( get_option( 'local_business_country' ) );
  $business_lat = esc_attr( get_option( 'local_business_lat' ) );
  $business_long = esc_attr( get_option( 'local_business_long' ) );
  $business_map = esc_attr( get_option( 'local_business_map' ) );
  $business_area = esc_attr( get_option( 'local_business_area_served' ) );
  $business_opening_monday = esc_attr( get_option( 'local_business_opening_monday' ) );
  $business_closing_monday = esc_attr( get_option( 'local_business_closing_monday' ) );
  $business_opening_tuesday = esc_attr( get_option( 'local_business_opening_tuesday' ) );
  $business_closing_tuesday = esc_attr( get_option( 'local_business_closing_tuesday' ) );
  $business_opening_wednesday = esc_attr( get_option( 'local_business_opening_wednesday' ) );
  $business_closing_wednesday = esc_attr( get_option( 'local_business_closing_wednesday' ) );
  $business_opening_thursday = esc_attr( get_option( 'local_business_opening_thursday' ) );
  $business_closing_thursday = esc_attr( get_option( 'local_business_closing_thursday' ) );
  $business_opening_friday = esc_attr( get_option( 'local_business_opening_friday' ) );
  $business_closing_friday = esc_attr( get_option( 'local_business_closing_friday' ) );
  $business_opening_saturday = esc_attr( get_option( 'local_business_opening_saturday' ) );
  $business_closing_saturday = esc_attr( get_option( 'local_business_closing_saturday' ) );
  $business_opening_sunday = esc_attr( get_option( 'local_business_opening_sunday' ) );
  $business_closing_sunday = esc_attr( get_option( 'local_business_closing_sunday' ) );
  $business_facebook = esc_attr( get_option( 'local_business_facebook' ) );
  $business_twitter = esc_attr( get_option( 'local_business_twitter' ) );
  $business_instagram = esc_attr( get_option( 'local_business_instagram' ) );
  $business_youtube = esc_attr( get_option( 'local_business_youtube' ) );
  $business_linkedin = esc_attr( get_option( 'local_business_linkedin' ) );

  echo '
<!-- Schema output by Easy Schema https://wordpress.org/plugins/easy-schema-structured-data-rich-snippets/ -->
<script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "'. $business_type .'",
"name": "'. $business_name .'",
"legalname": "'. $business_legal .'",
"description": "'. $business_description .'",
"image": "'. $business_image .'",
"logo": "'. $business_logo .'",
"@id": "'. $business_url .'",
"url": "'. $business_url .'/#website",
"telephone": "'. $business_telephone .'",
"currenciesAccepted": "'. $business_currency .'",
"priceRange": "'. $business_price .'",
"paymentAccepted":"'. $business_payment .'",
"areaServed": "'. $business_area .'",
"hasMap": "'. $business_map .'",
"address": {
  "@type": "PostalAddress",
  "streetAddress": "'. $business_street .'",
  "addressLocality": "'. $business_town .'",
  "addressRegion": "'. $business_city .'",
  "postalCode": "'. $business_zip .'",
  "addressCountry": "'. $business_country .'"
},
"geo": {
  "@type": "GeoCoordinates",
  "latitude": '. $business_lat .',
  "longitude": '. $business_long .'
},
"openingHoursSpecification": [{
  "@type": "OpeningHoursSpecification",
  "dayOfWeek": "Monday",
  "opens": "'. $business_opening_monday .'",
  "closes": "'. $business_closing_monday .'"
},{
  "@type": "OpeningHoursSpecification",
  "dayOfWeek": "Tuesday",
  "opens": "'. $business_opening_tuesday .'",
  "closes": "'. $business_closing_tuesday .'"
},{
  "@type": "OpeningHoursSpecification",
  "dayOfWeek": "Wednesday",
  "opens": "'. $business_opening_wednesday .'",
  "closes": "'. $business_closing_wednesday .'"
},{
  "@type": "OpeningHoursSpecification",
  "dayOfWeek": "Thursday",
  "opens": "'. $business_opening_thursday .'",
  "closes": "'. $business_closing_thursday .'"
},{
  "@type": "OpeningHoursSpecification",
  "dayOfWeek": "Friday",
  "opens": "'. $business_opening_friday .'",
  "closes": "'. $business_closing_friday .'"
},{
  "@type": "OpeningHoursSpecification",
  "dayOfWeek": "Saturday",
  "opens": "'. $business_opening_saturday .'",
  "closes": "'. $business_closing_saturday .'"
},{
  "@type": "OpeningHoursSpecification",
  "dayOfWeek": "Sunday",
  "opens": "'. $business_opening_sunday .'",
  "closes": "'. $business_closing_sunday .'"
}]
}
</script>';
}

// Has the user made the local business schema output active for all of the site pages? This is controlled by a radio option
$jsonschema_business_display_all = esc_attr( get_option( 'local_business_display_wide' ) );  
 if ( $jsonschema_business_display_all == 1 ) {
// if user has checked the yes box, output the Schema to the footer
add_action( 'wp_footer', 'essdrs_easy_schema_local_business_output' );
}

// Has the user made the local business schema shortcode active? This is controlled by a radio option
$jsonschema_business_display_shortcode = esc_attr( get_option( 'local_business_display_shortcode' ) );  
 if ( $jsonschema_business_display_shortcode == 1 ) {
// if user has checked the yes box, create the shortcode so they can use it
     add_shortcode('local_schema', 'essdrs_easy_schema_local_business_output');
}