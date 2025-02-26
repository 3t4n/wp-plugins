<?php
/*
Plugin Name: Amumu Naver Searchbar
Plugin URI: https://wordpress.org/plugins/amumu-naver-searchbar/
Description: 네이버 검색창을 원하는 위치에 넣는 간단한 플러그인 입니다.
Author: Amumu
Version: 1.1
Author URI: http://www.amumu.kr
*/

// Add Shortcode
function amumu_naver_searchbar( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'keyword' => 'Amumu.kr',
		),
		$atts
	);

	$output = '
	<div class="lnb">
		<div id="search">

			<form id="sform" name="sform" action="https://search.naver.com/search.naver" method="get" target="_blank">
		
				<fieldset>
					
					<span class="green_window">
						<input id="searchbar" type="text" name="query" class="input_text" value="'.$atts['keyword'].'">
					</span>
					
					<button id="search_btn" class="sch_smit" onmouseover="this.className=\'sch_smit over\'" onmouseout="this.className=\'sch_smit\'"></button>
					
				</fieldset>
				
			</form>
			
			<div id="nautocomplete" class="autocomplete">
				<span class="btn_arw top"><a><img src="'.plugins_url( 'images/btn_atcmp_down_on.gif', __FILE__ ).'" width="13" height="11" class="triangleImg"></a></span>
			</div>	
	
		</div>
	</div>
	';
	
	return $output;
	
// 	echo '<div id="search"><span class="green_window"><input id="searchbar" type="text" class="input_text" style="imemode:active;" value="'.$atts['keyword'].'"></span><button id="search_btn" class="sch_smit"></button></div>';
	

}
add_shortcode( 'amumu-naver-searchbar', 'amumu_naver_searchbar' );

add_filter('widget_text', 'do_shortcode'); 

// We need some CSS to position the paragraph
function amumu_css() {

	echo "
	<style type='text/css'>
	
		.lnb {
			position: relative;
			width: 560px;
			margin: 0 auto;
			text-align: left;		
		}
		
		#search {
			text-align: center;
		}
	
		#search .green_window {
		    display: -moz-inline-block;
		    display: -moz-inline-box;
		    display: inline-block;
		    width: 366px;
		    height: 34px;
		    margin-right: 3px;
		    border: 3px solid #2db400;
		    box-sizing:initial;		    
		}
		
		#search .input_text {
		    width: 323px;
		    height: 21px;
		    margin: 6px 0 0 9px;
		    border: 0;
		    line-height: 21px;
		    font-weight: bold;
		    font-size: 16px;
		    color: #000;
		    background-color: transparent;
		    outline: none;
		    padding: 1px;
		}		
		
		#search .sch_smit {
		    width: 62px;
		    height: 50px;
		    margin: -5px 0;
		    border: 0;
		    vertical-align: top;
		    background: url(".plugins_url( 'images/btn_search.png', __FILE__ ).") no-repeat 2px 5px;
		}
		
		#search .sch_smit.over {
		    background-image: url(http://img.naver.net/static/www/img/btn_search_over.png);
		}				
		
		.autocomplete {
		    position: absolute;
		    top: 34px;
		    left: 6px;
		    z-index: 10;
		    width: 100%;
		}		
		
		.btn_arw {
		    position: absolute;
		    top: -31px;
		    left: 390px;
		}		
		
		.btn_arw.top a {
		    display: block;
		    padding: 12px 7px 8px;
			box-shadow: none !important;		    
		}		
		
		.btn_arw top a img {
		    vertical-align: top;
		}	
		
		#search fieldset {
		    border: 0 none !important;
		    margin: 0 0 10px 0 !important;
		    padding: 0 !important;
		}			
		
		#search button, #search button:hover {
			box-shadow: none !important;
		}
		
		@media screen and (max-width: 782px) {
			.lnb { width:100%; }
			#search .green_window { width: 240px; }
			#search .input_text { width: 228px; }
			.btn_arw { left: 215px; }
		}
			
	</style>";
}

add_action( 'wp_head', 'amumu_css' );

?>
