<?php
/**
 * Sitelinks display functions for site wide.
 * 
 */
 
// Sitelinks Search Box Schema output
function essdrs_easy_schema_search_schema_output() {	

  $sl_search_url = esc_attr( get_option( 'sl_search_url' ) );
  $sl_search_web_url = esc_attr( get_option( 'sl_search_web_url' ) );
  
  echo '
<!-- Sitelinks Search Box Schema output by Easy Schema https://wordpress.org/plugins/easy-schema-structured-data-rich-snippets/ -->
<script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "WebSite",
"url": "'. $sl_search_web_url .'",
"potentialAction": {
  "@type": "SearchAction",
  "target": "'. $sl_search_url .'{search_term_string}",
  "query-input": "required name=search_term_string"
}
}
</script>';
  }

// Has the user made the logo schema active? This is controlled by a radio option
$sl_search_active = esc_attr( get_option( 'sl_search_active' ) );  
if ( $sl_search_active == 1 ) {
    
    // if user has checked the yes box, output the Schema to the footer
    add_action( 'wp_footer', 'essdrs_easy_schema_search_schema_output' );

}