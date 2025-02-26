<?php
// ###############################
// CDN
// ###############################

	if(!class_exists('pymseo_class_Plugin')){class pymseo_class_Plugin{function hook($h){$p=10;$m=$this->sanitize_method($h);$b=func_get_args();unset($b[0]);foreach((array)$b as $a){if(is_int($a))$p=$a;else $m=$a;}return add_action($h,array($this,$m),$p,999);}private function sanitize_method($m){return str_replace(array('.','-'),array('_DOT_','_DASH_'),$m);}}}

	class pymseo_class_CDN_Plugin extends pymseo_class_Plugin {
		public static $instance;
		public $site_domain;
		public $cdn_domain;
		public $extensions;
		public function __construct() {
			self::$instance = $this;
			$this->hook( 'init' );
		}
		public function init() {
			$pymseoCDNTypeFile = array();
			If (get_option( 'pymseoCDNTypeFileCss') ){
				array_push($pymseoCDNTypeFile, 'css' );
			}
			If (get_option( 'pymseoCDNTypeFileJs') ){
				array_push($pymseoCDNTypeFile, 'js' );
			}
			If (get_option( 'pymseoCDNTypeFileImages') ){
				array_push($pymseoCDNTypeFile, 'jpe?g' );
				array_push($pymseoCDNTypeFile, 'gif' );
				array_push($pymseoCDNTypeFile, 'png');
				array_push($pymseoCDNTypeFile, 'bmp');
				array_push($pymseoCDNTypeFile, 'ico' );
			}
			If (get_option( 'pymseoCDNTypeFileVideo') ){
				array_push($pymseoCDNTypeFile, 'mp4' );
			}
			If (!empty($pymseoCDNTypeFile)) {
				$this->extensions = apply_filters( 'pymseo_cdn_extensions', $pymseoCDNTypeFile );
			}else{
				$this->extensions = apply_filters( 'pymseo_cdn_extensions','' );
			}
			//$pymseoConsoleLog .= "console.log('Extensiones CDN:" .  json_encode($pymseoCDNTypeFile) . "' );";
			if ( !is_admin() ) {
				$this->hook( 'template_redirect' );
				$this->hook( 'pymseo_cdn_content', 'filter' );
				$this->hook( 'wp_calculate_image_srcset', 'srcset' );
				$this->site_domain = parse_url( get_bloginfo( 'url' ), PHP_URL_HOST );
				$this->cdn_domain = get_option( 'pymseoCDNHosts' );
			}
		}

		public function filter( $content ) {
			return preg_replace( "#=([\"'])https?://({$this->site_domain})?/([^/](?:(?!\\1).)+)\.(" . implode( '|', $this->extensions ) . ")(\?((?:(?!\\1).)+))?\\1#", '=$1' . $this->cdn_domain . '/$3.$4$5$1', $content );
		}
		public function srcset( $sizes) {
			return array_map( array( $this, 'replace_subkey_url' ), $sizes );
		}
		public function replace_subkey_url( $src ) {
			$src['url'] = str_replace( 'https://', '', $src['url']);
			$src['url'] = str_replace( 'http://', '', $src['url']);
			$src['url'] = str_replace( $this->site_domain . '/', $this->cdn_domain . '/', $src['url'] );
			return $src;
		}
		public function template_redirect() {
			ob_start( array( $this, 'ob' ) );
		}
		public function ob( $contents ) {
				return apply_filters( 'pymseo_cdn_content', $contents, $this );
		}
	}
	new pymseo_class_CDN_Plugin;
	

?>