<?php
/**
 * WordPress eXtended RSS file parser implementations
 *
 * @package WordPress
 * @subpackage Importer
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly     
/**
 * WordPress Importer class for managing parsing of WXR files.
 */
class ANANTA_WXR_Parser {
	function parse( $file ) {
		// Attempt to use proper XML parsers first
		if ( extension_loaded( 'simplexml' ) ) {
			$parser = new ANANTA_WXR_Parser_SimpleXML;
			$result = $parser->parse( $file );

			// If SimpleXML succeeds or this is an invalid WXR file then return the results
			if ( ! is_wp_error( $result ) || 'SimpleXML_parse_error' != $result->get_error_code() )
				return $result;
		} else if ( extension_loaded( 'xml' ) ) {
			$parser = new ANANTA_WXR_Parser_XML;
			$result = $parser->parse( $file );

			// If XMLParser succeeds or this is an invalid WXR file then return the results
			if ( ! is_wp_error( $result ) || 'XML_parse_error' != $result->get_error_code() )
				return $result;
		}

		// We have a malformed XML file, so display the error and fallthrough to regex
		if ( isset($result) && defined('IMPORT_DEBUG') && IMPORT_DEBUG ) {
			$error_message = '';
			
			$error_output = ''; // Variable to store HTML markup and messages
			
			$error_message .= '<pre>';
			if ( 'SimpleXML_parse_error' == $result->get_error_code() ) {
				foreach  ( $result->get_error_data() as $error ) {
					$error_message .= $error->line . ':' . $error->column . ' ' . esc_html( $error->message ) . "\n";
				}
			} else if ( 'XML_parse_error' == $result->get_error_code() ) {
				$error = $result->get_error_data();
				$error_message .= $error[0] . ':' . $error[1] . ' ' . esc_html( $error[2] );
			}
			$error_message .= '</pre>';
			
			$error_output .= $error_message; 

			$error_output .= '<p><strong>' . esc_html__( 'There was an error when reading this WXR file', 'ananta-sites' ) . '</strong><br />';
			$error_output .= esc_html__( 'Details are shown above. The importer will now try again with a different parser...', 'ananta-sites' ) . '</p>';
    
			// Log the error message
			error_log($error_output);
		}

		// use regular expressions if nothing else available or this is bad XML
		$parser = new ANANTA_WXR_Parser_Regex;
		return $parser->parse( $file );
	}
}