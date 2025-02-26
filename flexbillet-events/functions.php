<?php
defined( 'ABSPATH' ) or die( 'I cannot do anything when called directly good sir' );

/**
 * custom option and settings
 *
 */

function flexbillet_events_sanitize( $args ) {
    $sanitized_input = array();
    if( isset( $args['flexbillet_events_field_organizerkey'] ) )
        $sanitized_input['flexbillet_events_field_organizerkey'] = sanitize_text_field( $args['flexbillet_events_field_organizerkey'] );

    if( isset( $args['flexbillet_events_field_passphrase'] ) )
            $sanitized_input['flexbillet_events_field_passphrase'] = sanitize_text_field( $args['flexbillet_events_field_passphrase'] );

    return $sanitized_input; 
}

// API section callback
function flexbillet_events_section_api_cb( $args ) { }

// Shortcode section
function flexbillet_events_section_shortcode_cb( $args ) { }
 
/* Callback for input fields */
function flexbillet_events_field_input_cb( $args ) {
     // get the value of the setting we've registered with register_setting()
     $options = get_option( 'flexbillet_events_options' );

     // output the field
     ?>
     <input type="text" 
        id="<?php echo esc_attr( $args['label_for'] ); ?>"
        data-custom="<?php echo esc_attr( $args['flexbillet_custom_data'] ); ?>"
        name="flexbillet_events_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
        value="<?php echo isset( $options[ $args['label_for'] ] ) ? ( esc_html( $options[ $args['label_for'] ] ) ) : ( '' ); ?>" 
     />
     <p class="description"><?php esc_html_e( $args['flexbillet_description'], 'flexbillet' ); ?></p>
     <?php
}
 
/* Fetch organizer details - used for validating api credentials */
function flexbillet_events_getOrganizerDetails( $a_localekey, $a_organizerkey, $a_passphrase ) {

    // Construct and Execute CURL Request
    $request = "https://www.flexbillet.dk/organizerservices/api/v1/organizerdetails?characterset=UTF-8&format=xml&include-test-events=true&filter-visible=yes&localekey=$a_localekey&organizerkey=$a_organizerkey&passphrase=$a_passphrase";

    $response = wp_remote_get( $request );
    $xml = wp_remote_retrieve_body($response);
     
    /*
    $doc = new SimpleXmlElement( $data, LIBXML_NOCDATA );
    $xml = $doc->asXML();
*/
    $xml = new SimpleXMLElement($xml);
    
    if ($xml->count() == 0) {
        
        return false;
    }
    else {

        return $xml;

    }

}


/* List events for organizer */
function flexbillet_events_list_events ( $atts ) {
    //check for attributes 
    $flexbilletShortcodeAttributes = shortcode_atts( [
        'categories'   => false,
        'boxed'   => false,
    ], $atts );

    if ( $flexbilletShortcodeAttributes['categories'] ) {
        // Parse categories into an array. Whitespace will be stripped.
        $flexbilletShortcodeAttributes['categories'] = array_map( 'trim', str_getcsv( $flexbilletShortcodeAttributes['categories'], ',' ) );
    }    

    //Load options
    $flexbilletOptions = get_option( 'flexbillet_events_options' );

    //$uriObject = new URIHandler( $_SERVER[ "REQUEST_URI" ] );
    $currentLocale = 'da';

    //fetch API values
    $uriObject = new URIHandler( '/'.  esc_attr($flexbilletOptions['flexbillet_events_field_organizerkey']) .'/' );
    $flexbilletPassPhrase = esc_attr($flexbilletOptions['flexbillet_events_field_passphrase']);

    // Default values (assuming NO valid organizer)
    $validOrganizerFound = false;
    $siteTheme = THEME_FLEXBILLET;
    
    ob_start();
    include( plugin_dir_path( __FILE__).'includes/rendering/events.php' );
    return ob_get_clean();

}