<?php
/**
 * WordPress eXtended RSS file parser implementations
 *
 * @package WordPress
 * @subpackage Importer
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      
//_deprecated_file( basename( __FILE__ ), '0.7.0' );

/** ANANTA_WXR_Parser class */
require_once dirname( __FILE__ ) . '/parsers/class-wxr-parser.php';

/** ANANTA_WXR_Parser_SimpleXML class */
require_once dirname( __FILE__ ) . '/parsers/class-wxr-parser-simplexml.php';

/** ANANTA_WXR_Parser_XML class */
require_once dirname( __FILE__ ) . '/parsers/class-wxr-parser-xml.php';

/** ANANTA_WXR_Parser_Regex class */
require_once dirname( __FILE__ ) . '/parsers/class-wxr-parser-regex.php';