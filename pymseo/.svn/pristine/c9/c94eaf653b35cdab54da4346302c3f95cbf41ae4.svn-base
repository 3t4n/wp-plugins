<?php
//###############################
// WPO -> Minify HTML
//###############################

	function fun_pymseo_minify_html_init() {
		ob_start('fun_pymseo_minify_html');
	}
	if ( !is_admin() )
		if ( !( defined( 'WP_CLI' ) && WP_CLI ) )
			add_action( 'init', 'fun_pymseo_minify_html_init', 1 );

	function fun_pymseo_minify_html($buffer) {
		if ( substr( ltrim( $buffer ), 0, 5) == '<?xml' )
			return ( $buffer );
		$minify_javascript = get_option('pymseoWPOMinifyInlineJavaScript');
		$minify_html_comments = get_option('pymseoWPORemoveCommentsHTML');
		//$minify_html_utf8 = get_option( 'minify_html_utf8' );
		if ( $minify_html_utf8 == 'yes' && mb_detect_encoding($buffer, 'UTF-8', true) )
			$mod = '/u';
		else
			$mod = '/s';
		$buffer = str_replace(array (chr(13) . chr(10), chr(9)), array (chr(10), ''), $buffer);
		$buffer = str_ireplace(array ('<script', '/script>', '<pre', '/pre>', '<textarea', '/textarea>', '<style', '/style>'), array ('M1N1FY-ST4RT<script', '/script>M1N1FY-3ND', 'M1N1FY-ST4RT<pre', '/pre>M1N1FY-3ND', 'M1N1FY-ST4RT<textarea', '/textarea>M1N1FY-3ND', 'M1N1FY-ST4RT<style', '/style>M1N1FY-3ND'), $buffer);
		$split = explode('M1N1FY-3ND', $buffer);
		$buffer = ''; 
		for ($i=0; $i<count($split); $i++) {
			$ii = strpos($split[$i], 'M1N1FY-ST4RT');
			if ($ii !== false) {
				$process = substr($split[$i], 0, $ii);
				$asis = substr($split[$i], $ii + 12);
				if (substr($asis, 0, 7) == '<script') {
					$split2 = explode(chr(10), $asis);
					$asis = '';
					for ($iii = 0; $iii < count($split2); $iii ++) {
						if ($split2[$iii])
							$asis .= trim($split2[$iii]) . chr(10);
						if ( $minify_javascript != false )
							if (strpos($split2[$iii], '//') !== false && substr(trim($split2[$iii]), -1) == ';' )
								$asis .= chr(10);
					}
					if ($asis)
						$asis = substr($asis, 0, -1);
					if ( $minify_html_comments != 'no' )
						$asis = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $asis);
					if ( $minify_javascript != false )
						$asis = str_replace(array (';' . chr(10), '>' . chr(10), '{' . chr(10), '}' . chr(10), ',' . chr(10)), array(';', '>', '{', '}', ','), $asis);
				} else if (substr($asis, 0, 6) == '<style') {
					$asis = preg_replace(array ('/\>[^\S ]+' . $mod, '/[^\S ]+\<' . $mod, '/(\s)+' . $mod), array('>', '<', '\\1'), $asis);
					if ( $minify_html_comments != false )
						$asis = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $asis);
					$asis = str_replace(array (chr(10), ' {', '{ ', ' }', '} ', '( ', ' )', ' :', ': ', ' ;', '; ', ' ,', ', ', ';}'), array('', '{', '{', '}', '}', '(', ')', ':', ':', ';', ';', ',', ',', '}'), $asis);
				}
			} else {
				$process = $split[$i];
				$asis = '';
			}
			$process = preg_replace(array ('/\>[^\S ]+' . $mod, '/[^\S ]+\<' . $mod, '/(\s)+' . $mod), array('>', '<', '\\1'), $process);
			if ( $minify_html_comments != false )
				$process = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->' . $mod, '', $process);
			$buffer .= $process.$asis;
		}
		$buffer = str_replace(array (chr(10) . '<script', chr(10) . '<style', '*/' . chr(10), 'M1N1FY-ST4RT'), array('<script', '<style', '*/', ''), $buffer);
		//$minify_html_xhtml = get_option( 'minify_html_xhtml' );
		//$minify_html_relative = get_option( 'minify_html_relative' );
		//$minify_html_scheme = get_option( 'minify_html_scheme' );
		if ( $minify_html_xhtml == 'yes' && strtolower( substr( ltrim( $buffer ), 0, 15 ) ) == '<!doctype html>' )
			$buffer = str_replace( ' />', '>', $buffer );
		if ( $minify_html_relative == true )
			$buffer = str_replace( array ( 'https://' . $_SERVER['HTTP_HOST'] . '/', 'http://' . $_SERVER['HTTP_HOST'] . '/', '//' . $_SERVER['HTTP_HOST'] . '/' ), array( '/', '/', '/' ), $buffer );
		if ( $minify_html_scheme == true )
			$buffer = str_replace( array( 'http://', 'https://' ), '//', $buffer );
		return ($buffer);
	}

?>