<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Superaddons_Builder_PDF_Shortcode {
	function __construct() {
		add_shortcode( 'wp_builder_pdf_site_url', array($this,'shortcode_main') );
		add_shortcode( 'wp_builder_pdf_site_name', array($this,'shortcode_main') );
		add_shortcode( 'wp_builder_pdf_date', array($this,'shortcode_main') );
		add_shortcode( 'wp_builder_pdf_time', array($this,'shortcode_main') );
		add_shortcode( 'wp_builder_pdf_ip', array($this,'shortcode_main') );
		add_shortcode( 'dotab', array($this,'shortcode_main') );
		add_shortcode( 'dotab_content', array($this,'shortcode_main') );
		add_filter( 'wp_builder_pdf_shortcode', array($this,'add_shortcode_to_editor') );
		add_shortcode( 'wp_builder_pdf_barcode', array($this,'shortcode_barcode') );
		add_shortcode( 'wp_builder_pdf_qrcode', array($this,'shortcode_qrcode') );
		add_shortcode( 'pdf_images', array($this,'pdf_images') );
		add_shortcode( 'pdf_download', array($this,'pdf_download') );
	}
	function pdf_download($atts,$content = ""){
		return get_option("pdf_download_last");
	}
	function pdf_images($atts,$content = ""){
		$images = "";
		$atts = shortcode_atts( array(
			'width' => 'auto',
			'height' => 'auto',
		), $atts);
		$width = $atts["width"];
		$height = $atts["height"];
		if(is_numeric($height) ){
			$height .= "px";
		}
		if(is_numeric($width) ){
			$width .= "px";
		}
		if($content != ""){
			$fields= explode(",",$content);
			foreach( $fields as $field ){
				$field = trim($field);
				$field = str_replace('"',"'",$field);
				$images .='<img src="'.$field.'" style="width: '.$width.'; height: '.$height.'" />';
			}
		}
		return $images;
	}
	function shortcode_main($atts, $content="", $tag=""){

		switch ($tag) {
			case "wp_builder_pdf_site_url":
				return site_url();
				break;
			case "wp_builder_pdf_site_name":
				return site_url();
				break;
			case "wp_builder_pdf_date":
				return current_time( get_option("date_format") );
				break;
			case "wp_builder_pdf_time":
				return current_time( get_option("time_format") );
			case "dotab":
				$atts = shortcode_atts( array(
					'outdent' => 0,
				), $atts );
				if( is_admin() ){
					return '<span class="dotab">..........</span>';		
				}else{
					return '<dottab outdent="'.$atts["outdent"].'" />';	
				}
			case "dotab_content":
				return '<span class="dotab_content">'.$content.'</span>';	
				break;
			case "wp_builder_pdf_ip":
				return $this->get_ip();
				break;
			default:
				return $tag;
				break;
		}
	}
	function shortcode_qrcode($atts, $content= "Change Text"){
		if($content == ""){
			$content ="Change Text";
		}	
		$content = do_shortcode($content);
		$content = wp_strip_all_tags($content);
		$img_qr = QRcode::png($content,'*');
		return '<div class="text-content"><img class="qrcode" src="data:image/png;base64,'.$img_qr.'"></div>';
	}
	function shortcode_barcode($atts, $content= "Change Text"){
		if($content == ""){
			$content ="Change Text";
		}	
		$content = do_shortcode($content);
		$content = wp_strip_all_tags($content);
		$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
		$img = base64_encode($generator->getBarcode($content, $generator::TYPE_CODE_128));
		return '<img class="barcode" src="data:image/png;base64,'.$img.'">';
	}
	function add_shortcode_to_editor($shortcode){
		$shortcode[] = array("text"=>"Site","value"=>"");
		$shortcode[] = array("text"=>"Site URL","value"=>"[wp_builder_pdf_site_url]");
		$shortcode[] = array("text"=>"Site Name","value"=>"[wp_builder_pdf_site_name]");
		$shortcode[] = array("text"=>"Current date","value"=>"[wp_builder_pdf_date]");
		$shortcode[] = array("text"=>"Current Time","value"=>"[wp_builder_pdf_time]");
		$shortcode[] = array("text"=>"User IP","value"=>"[wp_builder_pdf_ip]");
		$shortcode[] = array("text"=>"Dottab","value"=>"[dotab]");
		$shortcode[] = array("text"=>"Dottab content","value"=>"[dotab_content]");
		return $shortcode;
	}
	function get_ip() {
		$ip = false;
		if ( ! empty( $_SERVER['HTTP_X_REAL_IP'] ) ) {
			$ip = filter_var( wp_unslash( $_SERVER['HTTP_X_REAL_IP'] ), FILTER_VALIDATE_IP );
		} elseif ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			$ip = filter_var( wp_unslash( $_SERVER['HTTP_CLIENT_IP'] ), FILTER_VALIDATE_IP );
		} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			$ips = explode( ',', wp_unslash( $_SERVER['HTTP_X_FORWARDED_FOR'] ) );
			if ( is_array( $ips ) ) {
				$ip = filter_var( $ips[0], FILTER_VALIDATE_IP );
			}
		} elseif ( ! empty( $_SERVER['REMOTE_ADDR'] ) ) {
			$ip = filter_var( wp_unslash( $_SERVER['REMOTE_ADDR'] ), FILTER_VALIDATE_IP );
		}
		$ip       = false !== $ip ? $ip : '127.0.0.1';
		$ip_array = explode( ',', $ip );
		$ip_array = array_map( 'trim', $ip_array );
		return sanitize_text_field( apply_filters( 'pdf_get_ip', $ip_array[0] ) );
	}
}
new Superaddons_Builder_PDF_Shortcode;