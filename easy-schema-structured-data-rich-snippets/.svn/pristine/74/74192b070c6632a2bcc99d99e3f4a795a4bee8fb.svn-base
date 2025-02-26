<?php
/**
 * Logo schema display functions for site wide.
 * 
 */

function essdrs_easy_schema_logo_schema_output() {	

  $logo_schema_url = esc_attr( get_option( 'logo_schema_url' ) );
  $logo_schema_image = esc_attr( get_option( 'logo_schema_image' ) );
  
echo '
<!-- Logo Schema output by Easy Schema https://wordpress.org/plugins/easy-schema-structured-data-rich-snippets/ -->
<script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "Organization",
"url": "'. $logo_schema_url .'",
"logo": "'. $logo_schema_image .'"
}
</script>';
}

// Has the user made the logo schema active? This is controlled by a radio option
$logo_schema_active = esc_attr( get_option( 'logo_schema_active' ) );  

if ( $logo_schema_active == 1 ) {
    
    // if user has checked the yes box, output the Schema to the footer
    add_action( 'wp_footer', 'essdrs_easy_schema_logo_schema_output' );

}