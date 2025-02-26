<?php
// Prevent direct file access
if( ! defined( 'ABSPATH' ) ) {
	die();
}
class HSAWSadminMain{
	private static $instance;
	private $file = ''; 
	public static function instance(){
		 if ( ! isset( self::$instance ) ) {
             self::$instance = new self;
		}
			return self::$instance;		
	}
	
	public function __construct(){
		add_action('admin_menu', array( $this , 'create_admin_menu'));
		add_action('admin_enqueue_scripts',array($this,'myCustomScripts'));
		add_action( 'wp_ajax_myawesomecallback', array($this,'myawesomecallback') );
		add_action( 'wp_ajax_nopriv_myawesomecallback',  array($this,'myawesomecallback') );
		add_action( 'wp_ajax_myawesomecallbackjs', array($this,'myawesomecallbackjs') );
		add_action( 'wp_ajax_nopriv_myawesomecallbackjs',  array($this,'myawesomecallbackjs') );
		add_action( 'wp_ajax_hstheme', array($this,'hstheme') );
		add_action( 'wp_ajax_nopriv_hstheme',  array($this,'hstheme') );
		add_action( 'wp_ajax_hsthemejss', array($this,'hsthemejss') );
		add_action( 'wp_ajax_nopriv_hsthemejss',  array($this,'hsthemejss') );
		
	}
	
	public function create_admin_menu(){
				add_menu_page('Ajax Custom CSS','Ajax Custom CSS','manage_options','hsacc', array($this,'addMenus'), plugin_dir_url( __FILE__ ). 'images/icon.png',67);
				add_submenu_page('hsacc','Add Ajax CSS','Add Ajax CSS','manage_options','hsaddacc', array($this,'addoptionspage'));
				add_submenu_page('hsacc','Add Ajax JS','Add Ajax JS','manage_options','hsaddaccjs', array($this,'addoptionspagejs'));
	}

	public function myCustomScripts(){
		wp_enqueue_script( 'my_awesome_script',plugin_dir_url(__FILE__).'js/awesome.js');
		wp_localize_script( 'awesome', 'awesome_ajax', array('ajax_url' => admin_url( 'admin-ajax.php' ) ));
		wp_enqueue_script( 'awesome_codemirror',plugin_dir_url(__FILE__).'codemirror/lib/codemirror.js');
		wp_enqueue_script( 'awesome_codemirrorcssjs',plugin_dir_url(__FILE__).'codemirror/mode/css/css.js');
		wp_enqueue_script( 'codemirrocsshintjs',plugin_dir_url(__FILE__).'codemirror/addon/hint/css-hint.js');
		wp_enqueue_script( 'codemirroshowhintjs',plugin_dir_url(__FILE__).'codemirror/addon/hint/show-hint.js');
		wp_enqueue_script( 'closebrackets',plugin_dir_url(__FILE__).'codemirror/addon/edit/closebrackets.js');
		wp_enqueue_script( 'awesome_javascript', plugin_dir_url(__FILE__).'codemirror/mode/javascript/javascript.js');
		wp_enqueue_script( 'hsaacjshints', plugin_dir_url(__FILE__).'codemirror/addon/hint/javascript-hint.js');
		wp_enqueue_script( 'hsaaclintjs', plugin_dir_url(__FILE__).'codemirror/addon/lint/lint.js');
		wp_enqueue_script( 'hsaacmatchbrackets',plugin_dir_url(__FILE__).'codemirror/addon/edit/matchbrackets.js');
		wp_enqueue_script( 'hsaacjavascriptlint', plugin_dir_url(__FILE__).'codemirror/addon/lint/javascript-lint.js');
		wp_enqueue_script( 'hsaacplaceholder', plugin_dir_url(__FILE__).'codemirror/addon/display/placeholder.js');
		wp_enqueue_script( 'hsaacactiveline', plugin_dir_url(__FILE__).'codemirror/addon/selection/active-line.js');
		wp_enqueue_script( 'hsaacjshint', plugin_dir_url(__FILE__).'codemirror/addon/jshint/jshint.js');
		wp_enqueue_script( 'hsaacjsonlintjs', plugin_dir_url(__FILE__).'codemirror/addon/jshint/jsonlint.js');
		wp_enqueue_script( 'hsaacjsonlintssjs', 'selectTheme');
		
		//wp_enqueue_script( 'hsaacjsonlintthemejs', plugin_dir_url(__FILE__).'codemirror/addon/jshint/jsonlint.js');
		wp_enqueue_script( 'hsaacjsonlintssthemejs', 'selectThemejs');
		
		wp_register_style( 'admincss',plugin_dir_url(__FILE__).'css/styles.css');
		wp_enqueue_style( 'admincss' );
		wp_register_style( 'awesome_codemirrorcss',plugin_dir_url(__FILE__).'codemirror/lib/codemirror.css' );
		wp_enqueue_style( 'awesome_codemirrorcss' );
		wp_register_style( 'codemirroshowhintcss',plugin_dir_url(__FILE__).'codemirror/addon/hint/show-hint.css' );
		wp_enqueue_style( 'codemirroshowhintcss' );
		wp_register_style( 'lintcss', plugin_dir_url(__FILE__).'codemirror/addon/lint/lint.css');
		wp_enqueue_style( 'lintcss' );	
		wp_register_style( '3024-day', plugin_dir_url(__FILE__).'codemirror/theme/3024-day.css');
		wp_enqueue_style( '3024-day' );
		wp_register_style( 'dracula', plugin_dir_url(__FILE__).'codemirror/theme/dracula.css');
		wp_enqueue_style( 'dracula' );
		wp_register_style( '3024-night', plugin_dir_url(__FILE__).'codemirror/theme/3024-night.css');
		wp_enqueue_style( '3024-night' );
		wp_register_style( 'ambiance', plugin_dir_url(__FILE__).'codemirror/theme/ambiance.css');
		wp_enqueue_style( 'ambiance' );
		wp_register_style( 'base16-dark', plugin_dir_url(__FILE__).'codemirror/theme/base16-dark.css');
		wp_enqueue_style( 'base16-dark' );
		wp_register_style( 'base16-light', plugin_dir_url(__FILE__).'codemirror/theme/base16-light.css');
		wp_enqueue_style( 'base16-light' );
		wp_register_style( 'bespin', plugin_dir_url(__FILE__).'codemirror/theme/bespin.css');
		wp_enqueue_style( 'bespin' );
		wp_register_style( 'blackboard', plugin_dir_url(__FILE__).'codemirror/theme/blackboard.css');
		wp_enqueue_style( 'blackboard' );
		wp_register_style( 'cobalt', plugin_dir_url(__FILE__).'codemirror/theme/cobalt.css');
		wp_enqueue_style( 'cobalt' );
		wp_register_style( 'colorforth', plugin_dir_url(__FILE__).'codemirror/theme/colorforth.css');
		wp_enqueue_style( 'colorforth' );
		wp_register_style( 'eclipse', plugin_dir_url(__FILE__).'codemirror/theme/eclipse.css');
		wp_enqueue_style( 'eclipse' );
		wp_register_style( 'elegant', plugin_dir_url(__FILE__).'codemirror/theme/elegant.css');
		wp_enqueue_style( 'elegant' );
		wp_register_style( 'erlang-dark', plugin_dir_url(__FILE__).'codemirror/theme/erlang-dark.css');
		wp_enqueue_style( 'erlang-dark' );
		wp_register_style( 'hopscotch', plugin_dir_url(__FILE__).'codemirror/theme/hopscotch.css');
		wp_enqueue_style( 'hopscotch' );
		wp_register_style( 'icecoder', plugin_dir_url(__FILE__).'codemirror/theme/icecoder.css');
		wp_enqueue_style( 'icecoder' );
		wp_register_style( 'isotope', plugin_dir_url(__FILE__).'codemirror/theme/isotope.css');
		wp_enqueue_style( 'isotope' );
		wp_register_style( 'lesser-dark', plugin_dir_url(__FILE__).'codemirror/theme/lesser-dark.css');
		wp_enqueue_style( 'lesser-dark' );
		wp_register_style( 'liquibyte', plugin_dir_url(__FILE__).'codemirror/theme/liquibyte.css');
		wp_enqueue_style( 'liquibyte' );
		wp_register_style( 'material', plugin_dir_url(__FILE__).'codemirror/theme/material.css');
		wp_enqueue_style( 'material' );
		wp_register_style( 'mbo', plugin_dir_url(__FILE__).'codemirror/theme/mbo.css');
		wp_enqueue_style( 'mbo' );
		wp_register_style( 'mdn-like', plugin_dir_url(__FILE__).'codemirror/theme/mdn-like.css');
		wp_enqueue_style( 'mdn-like' );
		wp_register_style( 'midnight', plugin_dir_url(__FILE__).'codemirror/theme/midnight.css');
		wp_enqueue_style( 'midnight' );
		wp_register_style( 'monokai', plugin_dir_url(__FILE__).'codemirror/theme/monokai.css');
		wp_enqueue_style( 'monokai' );
		wp_register_style( 'neat', plugin_dir_url(__FILE__).'codemirror/theme/neat.css');
		wp_enqueue_style( 'neat' );
		wp_register_style( 'neo', plugin_dir_url(__FILE__).'codemirror/theme/neo.css');
		wp_enqueue_style( 'neo' );
		wp_register_style( 'night', plugin_dir_url(__FILE__).'codemirror/theme/night.css');
		wp_enqueue_style( 'night' );
		wp_register_style( 'panda-syntax', plugin_dir_url(__FILE__).'codemirror/theme/panda-syntax.css');
		wp_enqueue_style( 'panda-syntax' );
		wp_register_style( 'paraiso-dark', plugin_dir_url(__FILE__).'codemirror/theme/paraiso-dark.css');
		wp_enqueue_style( 'paraiso-dark' );
		wp_register_style( 'paraiso-light', plugin_dir_url(__FILE__).'codemirror/theme/paraiso-light.css');
		wp_enqueue_style( 'paraiso-light' );
		wp_register_style( 'pastel-on-dark', plugin_dir_url(__FILE__).'codemirror/theme/pastel-on-dark.css');
		wp_enqueue_style( 'pastel-on-dark' );
		wp_register_style( 'railscasts', plugin_dir_url(__FILE__).'codemirror/theme/railscasts.css');
		wp_enqueue_style( 'railscasts' );
		wp_register_style( 'rubyblue', plugin_dir_url(__FILE__).'codemirror/theme/rubyblue.css');
		wp_enqueue_style( 'rubyblue' );
		wp_register_style( 'seti', plugin_dir_url(__FILE__).'codemirror/theme/seti.css');
		wp_enqueue_style( 'seti' );
		wp_register_style( 'solarized-dark', plugin_dir_url(__FILE__).'codemirror/theme/solarized.css');
		wp_enqueue_style( 'solarized-dark' );
		wp_register_style( 'solarized-light', plugin_dir_url(__FILE__).'codemirror/theme/solarized.css');
		wp_enqueue_style( 'solarized-light' );
		wp_register_style( 'the-matrix', plugin_dir_url(__FILE__).'codemirror/theme/the-matrix.css');
		wp_enqueue_style( 'the-matrix' );
		wp_register_style( 'tomorrow-night-bright', plugin_dir_url(__FILE__).'codemirror/theme/tomorrow-night-bright.css');
		wp_enqueue_style( 'tomorrow-night-bright' );
		wp_register_style( 'tomorrow-night-eighties', plugin_dir_url(__FILE__).'codemirror/theme/tomorrow-night-eighties.css');
		wp_enqueue_style( 'tomorrow-night-eighties' );
		wp_register_style( 'ttcn', plugin_dir_url(__FILE__).'codemirror/theme/ttcn.css');
		wp_enqueue_style( 'ttcn' );
		wp_register_style( 'twilight', plugin_dir_url(__FILE__).'codemirror/theme/twilight.css');
		wp_enqueue_style( 'twilight' ); 
		wp_register_style( 'vibrant-ink', plugin_dir_url(__FILE__).'codemirror/theme/vibrant-ink.css');
		wp_enqueue_style( 'vibrant-ink' ); 
		wp_register_style( 'xq-dark', plugin_dir_url(__FILE__).'codemirror/theme/xq-dark.css');
		wp_enqueue_style( 'xq-dark' ); 
		wp_register_style( 'xq-light', plugin_dir_url(__FILE__).'codemirror/theme/xq-light.css');
		wp_enqueue_style( 'xq-light' ); 
		wp_register_style( 'yeti', plugin_dir_url(__FILE__).'codemirror/theme/yeti.css');
		wp_enqueue_style( 'yeti' ); 
		wp_register_style( 'zenburn', plugin_dir_url(__FILE__).'codemirror/theme/zenburn.css');
		wp_enqueue_style( 'zenburn' ); 
		
	
	}
	public function addMenus(){?>
		<div class="wrap" id='hsajaxwrap'>
			<h1>Welcome to Ajax Custom CSS/JS</h1>
				<div class='hscontent'>Ajax Custom CSS/JS plugin is very easy and simple to use with powerful features. User can add their own custom css/js without even changing the core files of themes or plugins. So they will not have 
				to worry about messing with the core files of theme or plugin. <br><br>
				
				In this plugin, we have used the ajax functionality for saving the css/js to admin panel. So this plugin will work faster than the any other plugin without even reloading the page. So we have
				build to plugin to overcome the reloading issue.<br><br>
				
				This plugin also provides the powerful features of CODEMIRROR. We have integrated the full feldge library of codemirror into our plugin. So while editing css, if user types the wrong property of css , then it will 
				show the wrong css property in red color. We have also provided the Autocomplete features for css. While adding new css , it will show the autocomplete options when you will start typing".<br><br>
				
				We will keep updating the features of this plugin. So please stay in touch.<br><br>
				
				<b>If you see any issue or bug , before giving us negative reviews. Please dont hesitate to ask us for the support.<br><br>
				
				THANK YOU FOR CHOSING US !!!!!!!!</b>
				</div>
				<div class='hsrightcontent'>
				<div class='hspaypalcontent'>
				<span class='hsinnertitle'>Please support us if you have liked our plugin.</span><br/>
				<b style='margin-bottom:10px;'>PAY WITH PAYPAL</b>
				<p style='margin-bottom:-5px;'></p>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target='_blank'>
					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="business" value="er.harpreet.harry@gmail.com">
					<input type="hidden" name="item_number" value="1">
					<input type="hidden" name="item_name" value="Wordpress Plugin Support">
					<span class='hsdollar'>$ <input type="text" name="amount" value="1"></span>
					<input type="hidden" name="no_shipping" value="0">
					<input type="hidden" name="no_note" value="1">
					<input type="hidden" name="currency_code" value="USD"><br>
					<input type="hidden" name="return" value="http://www.paypal.com">
					<input type="image" src="<?php echo  plugin_dir_url( __FILE__ ). 'images/support-us.png' ;?>" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
				</form>
				<br/>
				</div>
				<div>
		</div> <!-- wrap ends here-->
	<?php
		
	}
	public function myawesomecallback(){
		global $wpdb;
		$csscontent = stripslashes_deep($_REQUEST['getCss']);
		 $table_name = $wpdb->prefix . 'awesomecustom';
		$custom_query = 'SELECT awesomecss FROM '.$table_name.' where id =1';
		$checkdata = $wpdb->get_results($custom_query);
		$checkdata;
		 if($checkdata != NULL){
			$result = $wpdb->update( 
			$table_name, 
				array( 
					'awesomecss' => $csscontent,
				) ,
				array('id' => 1)
			);
			
		}
		else{
			$result = $wpdb->insert( 
			$table_name, 
				array( 
					'awesomecss' => $csscontent,
					'id' => 1
				) 
			);
			
		} 
		 echo $getcontent = $csscontent;
		die();
	}

	public function myawesomecallbackjs(){
		global $wpdb;
		$jscontent = stripslashes_deep($_REQUEST['getJs']);
		$table_name = $wpdb->prefix . 'awesomecustom';
		$custom_query = 'SELECT awesomejs FROM '.$table_name.' where id = 1';
		$checkdata = $wpdb->get_results($custom_query);
		$checkdata;
		 if($checkdata != NULL){
			$result = $wpdb->update( 
			$table_name, 
				array( 
					'awesomejs' => $jscontent,
				) ,
				array('id' => 1)
			);
			
		}
		else{
			$result = $wpdb->insert( 
			$table_name, 
				array( 
					'awesomejs' => $jscontent,
					'id' => 1
				) 
			);
			
		} 
		echo $getcontent = $jscontent;
		die();
	}
	public function hstheme(){
		global $wpdb;
		 $theme = stripslashes_deep($_REQUEST['getcsstheme']);
		 $cssfonts = stripslashes_deep($_REQUEST['getcssfonts']);
		 $table_name = $wpdb->prefix . 'awesomecustom';
		$result = $wpdb->update( 
			$table_name, 
				array( 
					'awesometheme' => $theme,
					'awesomefontcss' => $cssfonts,
				) ,
				array('id' => 1)
			);
		//print_r($result);
		die();
	}
	public function hsthemejss(){
		global $wpdb;
		$themejs = stripslashes_deep($_REQUEST['getjstheme']);
		$jsfonts = stripslashes_deep($_REQUEST['getjsfonts']);
		$table_name = $wpdb->prefix . 'awesomecustom';
		$result = $wpdb->update( 
			$table_name, 
				array( 
					'awesomethemejs' => $themejs,
					'awesomefontjs' => $jsfonts,
				) ,
				array('id' => 1)
			);
		//print_r($result);
		die();
	}
	
	
	
	public function addoptionspage(){
		global $wpdb;
		$table_name = $wpdb->prefix . 'awesomecustom';
		$getcontent = $wpdb->get_results( "SELECT awesomecss FROM $table_name ");
		$storecss =  $getcontent[0]->awesomecss;
		
		$getthemecontent= $wpdb->get_results( "SELECT awesometheme,awesomefontcss FROM $table_name ");
		$storetheme = $getthemecontent[0]->awesometheme;
		$storecssfont = $getthemecontent[0]->awesomefontcss;
		?><div class="wrap">
			<h1>Add Custom Css</h1>
					<div class='hsleftarea'><textarea  name='<?php echo $storetheme;?>' cols="100" rows="30" id="awesome-css-area" placeholder='Enter Your Custom CSS . . . .' style='visibility:hidden' ><?php if($storecss) echo $storecss;?></textarea></div>
					<div class='hsrightarea'>
						<p><span class='hsstheme'>Select a theme:</span>
							<select onchange="selectTheme(this)" class='hsselecttheme' id='hsselectthemecss'>
							<option >Default</option>
							<option value='3024-day' <?php if($storetheme=='3024-day') echo 'selected';?>>Day</option>
							<option value='3024-night' <?php if($storetheme=='3024-night') echo 'selected';?>>Night</option>
							<option value='ambiance' <?php if($storetheme=='ambiance') echo 'selected';?>>Ambiance</option>
							<option value='bespin' <?php if($storetheme=='bespin') echo 'selected';?>>Bespin</option>
							<option value='blackboard' <?php if($storetheme=='blackboard') echo 'selected';?>>Blackboard</option>
							<option value='cobalt' <?php if($storetheme=='cobalt') echo 'selected';?>>Cobalt</option>
							<option value='colorforth' <?php if($storetheme=='colorforth') echo 'selected';?>>Colorforth</option>
							<option value='dracula' <?php if($storetheme=='dracula') echo 'selected';?>>Dracula</option>
							<option value='eclipse' <?php if($storetheme=='eclipse') echo 'selected';?>>Eclipse</option>
							<option value='elegant' <?php if($storetheme=='elegant') echo 'selected';?>>Elegant</option>
							<option value='erlang-dark' <?php if($storetheme=='erlang-dark') echo 'selected';?>>Blue Dark</option>
							<option value='hopscotch' <?php if($storetheme=='hopscotch') echo 'selected';?>>Hopscotch</option>
							<option value='icecoder' <?php if($storetheme=='icecoder') echo 'selected';?>>Icecoder</option>
							<option value='isotope' <?php if($storetheme=='isotope') echo 'selected';?>>Isotope</option>
							<option value='lesser-dark' <?php if($storetheme=='lesser-dark') echo 'selected';?>>Lesser Dark</option>
							<option value='liquibyte' <?php if($storetheme=='liquibyte') echo 'selected';?>>Liquibyte</option>
							<option value='material' <?php if($storetheme=='material') echo 'selected';?>>Material</option>
							<option value='mdn-like' <?php if($storetheme=='mdn-like') echo 'selected';?>>MDN Like</option>
							<option value='midnight' <?php if($storetheme=='midnight') echo 'selected';?>>Midnight</option>
							<option value='monokai' <?php if($storetheme=='monokai') echo 'selected';?>>Monokai</option>
							<option value='neat' <?php if($storetheme=='neat') echo 'selected';?>>Neat</option>
							<option value='neo' <?php if($storetheme=='neo') echo 'selected';?>>Neo</option>
							<option value='night' <?php if($storetheme=='night') echo 'selected';?>>Night</option>
							<option value='panda-syntax' <?php if($storetheme=='panda-syntax') echo 'selected';?>>Panda Syntax</option>
							<option value='paraiso-dark' <?php if($storetheme=='paraiso-dark') echo 'selected';?>>Paraiso Dark</option>
							<option value='paraiso-light' <?php if($storetheme=='paraiso-light') echo 'selected';?>>Paraiso Light</option>
							<option value='pastel-on-dark' <?php if($storetheme=='pastel-on-dark') echo 'selected';?>>Pastel on Dark</option>
							<option value='railscasts' <?php if($storetheme=='railscasts') echo 'selected';?>>Railscasts</option>
							<option value='rubyblue' <?php if($storetheme=='rubyblue') echo 'selected';?>>Rubyblue</option>
							<option value='seti' <?php if($storetheme=='seti') echo 'selected';?>>Seti</option>
							<option value='solarized dark' <?php if($storetheme=='solarized dark') echo 'selected';?>>Solarized Dark</option>
							<option value='solarized light' <?php if($storetheme=='solarized light') echo 'selected';?>>Solarized Light</option>
							<option value='the-matrix' <?php if($storetheme=='the-matrix') echo 'selected';?>>The Matrix</option>
							<option value='tomorrow-night-bright' <?php if($storetheme=='tomorrow-night-bright') echo 'selected';?>>Tomorrow Night Bright</option>
							<option value='tomorrow-night-eighties' <?php if($storetheme=='tomorrow-night-eighties') echo 'selected';?>>Tomorrow Night Eighties</option>
							<option value='twilight' <?php if($storetheme=='twilight') echo 'selected';?>>Twilight</option>
							<option value='vibrant-ink' <?php if($storetheme=='vibrant-ink') echo 'selected';?>>Vibrant Ink</option>
							<option value='xq-dark' <?php if($storetheme=='xq-dark') echo 'selected';?>>Extra Dark</option>
							<option value='yeti' <?php if($storetheme=='yeti') echo 'selected';?>>Yeti</option>
							<option value='zenburn' <?php if($storetheme=='zenburn') echo 'selected';?>>Zenburn</option>
						</select>
						</p><br>
						<p class='hssfs'><span class='hssfonts'>Select FontSize</span>
							<select id="selectfontcss" onchange="selectFont(this)" >
							<?php
							for ($i=13;$i<=23;$i++){
								?>
								<option value='<?php echo $i;?>' <?php if($storecssfont==$i) echo 'selected';?> ><?php echo $i;?></option>
							<?php
							}
						?>
							</select>
						</p>
						<div class='hssavetheme'>Save Theme</div>
			</div>
					
					<div class="clear"></div>
					<div id='hssavefile'>Add CSS</div>
					<div id='hsajax_load' style='display:none'><img src="<?php echo  plugin_dir_url( __FILE__ ). 'images/ajax_loading.gif' ;?>"></div>
		</div> <!-- wrap ends here-->
		<script>
		var title = jQuery( "#awesome-css-area" ).attr( "name" );
		//editor2.refresh();
			var editor2 = CodeMirror.fromTextArea(document.getElementById("awesome-css-area"), {
					   lineNumbers: true,
						lineWrapping: true,
						mode: "css",
						htmlMode: true,
						autoCloseBrackets: true,
						styleActiveLine: true,
						matchBrackets : true,
						theme: title,
						gutters: ["CodeMirror-linenumbers"]
					//	extraKeys: {"Ctrl-Space": "autocomplete"}
					  });
			 function selectFont(input){
				var fontsize = input.options[input.selectedIndex].value;
				editor2.display.wrapper.style.fontSize = fontsize + "px";
				editor2.refresh();
			}
			var cssfonts = <?php echo $storecssfont;?>;
			editor2.display.wrapper.style.fontSize = cssfonts + "px";

			 editor2.on("keyup", function(cm, event) { 
					 var keyCode = event.keyCode;
					if(keyCode >= 65 && keyCode <=95){
						timeout = setTimeout(function() {
							CodeMirror.showHint(cm, CodeMirror.hint.css, {completeSingle: false});
						}, 10);       
					} 
				});
				
				var getheight = jQuery(window).height() - 150;
                var getwidth = jQuery(window).width() - (jQuery(window).width()/3);
                editor2.setSize(getwidth, getheight);
				
				editor2.on("gutterClick", function(cm, n) {
					  var info = cm.lineInfo(n);
					  cm.setGutterMarker(n, "breakpoints", info.gutterMarkers ? null : makeMarker());
					});
				eval(document.getElementById("awesome-css-area").value);
				
				  var editor2 = CodeMirror.fromTextArea(document.getElementById("awesome-js-area"));
  function selectTheme(input) {
    var theme = input.options[input.selectedIndex].value;
    editor2.setOption("theme", theme);
  }
		</script>
		<style type="text/css">
      .breakpoints {width: .8em;}
      .breakpoint { color: #822; }
      .CodeMirror {border: 1px solid #aaa;}
    </style>
		<?php
		}
		
		public function addoptionspagejs(){
		global $wpdb;
		$table_name = $wpdb->prefix . 'awesomecustom';
		$getcontent = $wpdb->get_results( "SELECT awesomejs FROM $table_name ");
		$storejs = $getcontent[0]->awesomejs;
		
		
		$getthemecontentjs= $wpdb->get_results( "SELECT awesomethemejs,awesomefontjs FROM $table_name ");
		$storethemejs = $getthemecontentjs[0]->awesomethemejs;
		$storejsfont = $getthemecontentjs[0]->awesomefontjs;

		?><div class="wrap" id='wrapjs'>
			<h1>Add Custom JS</h1>
					<div class='hsleftarea'><textarea cols="100"  name='<?php echo $storethemejs;?>' rows="30" id="awesome-js-area" placeholder='Enter Your Custom JS . . . .' style='visibility:hidden'><?php if($storejs) echo $storejs ;?></textarea></div>
					<div class='hsrightarea'>
						<p><span class='hsstheme'>Select a theme:</span>
						<select onchange="selectThemejs(this)" class='hsselecttheme' id='hsselectthemejs'>
							<option >Default</option>
							<option value='3024-day' <?php if($storethemejs=='3024-day') echo 'selected';?>>Day</option>
							<option value='3024-night' <?php if($storethemejs=='3024-night') echo 'selected';?>>Night</option>
							<option value='ambiance' <?php if($storethemejs=='ambiance') echo 'selected';?>>Ambiance</option>
							<option value='bespin' <?php if($storethemejs=='bespin') echo 'selected';?>>Bespin</option>
							<option value='blackboard' <?php if($storethemejs=='blackboard') echo 'selected';?>>Blackboard</option>
							<option value='cobalt' <?php if($storethemejs=='cobalt') echo 'selected';?>>Cobalt</option>
							<option value='colorforth' <?php if($storethemejs=='colorforth') echo 'selected';?>>Colorforth</option>
							<option value='dracula' <?php if($storethemejs=='dracula') echo 'selected';?>>Dracula</option>
							<option value='eclipse' <?php if($storethemejs=='eclipse') echo 'selected';?>>Eclipse</option>
							<option value='elegant' <?php if($storethemejs=='elegant') echo 'selected';?>>Elegant</option>
							<option value='erlang-dark' <?php if($storethemejs=='erlang-dark') echo 'selected';?>>Blue Dark</option>
							<option value='hopscotch' <?php if($storethemejs=='hopscotch') echo 'selected';?>>Hopscotch</option>
							<option value='icecoder' <?php if($storethemejs=='icecoder') echo 'selected';?>>Icecoder</option>
							<option value='isotope' <?php if($storethemejs=='isotope') echo 'selected';?>>Isotope</option>
							<option value='lesser-dark' <?php if($storethemejs=='lesser-dark') echo 'selected';?>>Lesser Dark</option>
							<option value='liquibyte' <?php if($storethemejs=='liquibyte') echo 'selected';?>>Liquibyte</option>
							<option value='material' <?php if($storethemejs=='material') echo 'selected';?>>Material</option>
							<option value='mdn-like' <?php if($storethemejs=='mdn-like') echo 'selected';?>>MDN Like</option>
							<option value='midnight' <?php if($storethemejs=='midnight') echo 'selected';?>>Midnight</option>
							<option value='monokai' <?php if($storethemejs=='monokai') echo 'selected';?>>Monokai</option>
							<option value='neat' <?php if($storethemejs=='neat') echo 'selected';?>>Neat</option>
							<option value='neo' <?php if($storethemejs=='neo') echo 'selected';?>>Neo</option>
							<option value='night' <?php if($storethemejs=='night') echo 'selected';?>>Night</option>
							<option value='panda-syntax' <?php if($storethemejs=='panda-syntax') echo 'selected';?>>Panda Syntax</option>
							<option value='paraiso-dark' <?php if($storethemejs=='paraiso-dark') echo 'selected';?>>Paraiso Dark</option>
							<option value='paraiso-light' <?php if($storethemejs=='paraiso-light') echo 'selected';?>>Paraiso Light</option>
							<option value='pastel-on-dark' <?php if($storethemejs=='pastel-on-dark') echo 'selected';?>>Pastel on Dark</option>
							<option value='railscasts' <?php if($storethemejs=='railscasts') echo 'selected';?>>Railscasts</option>
							<option value='rubyblue' <?php if($storethemejs=='rubyblue') echo 'selected';?>>Rubyblue</option>
							<option value='seti' <?php if($storethemejs=='seti') echo 'selected';?>>Seti</option>
							<option value='solarized dark' <?php if($storethemejs=='solarized dark') echo 'selected';?>>Solarized Dark</option>
							<option value='solarized light' <?php if($storethemejs=='solarized light') echo 'selected';?>>Solarized Light</option>
							<option value='the-matrix' <?php if($storethemejs=='the-matrix') echo 'selected';?>>The Matrix</option>
							<option value='tomorrow-night-bright' <?php if($storethemejs=='tomorrow-night-bright') echo 'selected';?>>Tomorrow Night Bright</option>
							<option value='tomorrow-night-eighties' <?php if($storethemejs=='tomorrow-night-eighties') echo 'selected';?>>Tomorrow Night Eighties</option>
							<option value='twilight' <?php if($storethemejs=='twilight') echo 'selected';?>>Twilight</option>
							<option value='vibrant-ink' <?php if($storethemejs=='vibrant-ink') echo 'selected';?>>Vibrant Ink</option>
							<option value='xq-dark' <?php if($storethemejs=='xq-dark') echo 'selected';?>>Extra Dark</option>
							<option value='yeti' <?php if($storethemejs=='yeti') echo 'selected';?>>Yeti</option>
							<option value='zenburn' <?php if($storethemejs=='zenburn') echo 'selected';?>>Zenburn</option>
						</select>
						</p><p></p>
						<p class='hssfs'><span class='hssfonts'>Select FontSize</span>
						<select id="selectfontjs" onchange="selectFontjs(this)" >
						<?php
							for ($i=13;$i<=23;$i++){
								?>
								<option value='<?php echo $i;?>' <?php if($storejsfont==$i) echo 'selected';?> ><?php echo $i;?></option>
							<?php
							}
						?>
						</select></p>
						<div class='clear'></div>
						<div class='hssavethemejs'>Save Theme</div>
			</div>
					<div class="clear"></div>
					<div id='hssavejs'>Add JS</div>
					<div id='hsajax_load' style='display:none'><img src="<?php echo  plugin_dir_url( __FILE__ ). 'images/ajax_loading.gif' ;?>"></div>
		</div> <!-- wrap ends here-->
		<script>
				var titlejs = jQuery( "#awesome-js-area" ).attr( "name" );
			var editorjs = CodeMirror.fromTextArea(document.getElementById("awesome-js-area"), {
			   lineNumbers: true,
			   lineWrapping: true,
			   autoCloseBrackets: true,
			   matchBrackets : true,
			   theme: titlejs,
			   styleActiveLine: true,
			   mode: "javascript",
			   gutters: ["CodeMirror-lint-markers","breakpoints"],
			   //gutters: ["CodeMirror-linenumbers", "breakpoints"],
			   lint: true
			  });
			  
			 function selectFontjs(input){
				var fontsizejs = input.options[input.selectedIndex].value;
				editorjs.display.wrapper.style.fontSize = fontsizejs + "px";
				editorjs.refresh();
			}
			var jsfonts = <?php echo $storejsfont;?>;
			editorjs.display.wrapper.style.fontSize = jsfonts + "px";
			
			editorjs.on("keyup", function(cm, event) { 
					 var keyCode = event.keyCode;
					 //alert(keyCode);
					if(keyCode >= 65 && keyCode <=95){
						//if(timeout) clearTimeout(timeout);        
						timeout = setTimeout(function() {
							CodeMirror.showHint(cm, CodeMirror.hint.javascript, {completeSingle: false});
						}, 10);       
					} 
				});
				var getheightjs = jQuery(window).height() - 150;
                var getwidthjs = jQuery(window).width() - (jQuery(window).width()/3);
                editorjs.setSize(getwidthjs, getheightjs);
				
			editorjs.on("gutterClick", function(cm, n) {
					  var info = cm.lineInfo(n);
					  cm.setGutterMarker(n, "breakpoints", info.gutterMarkers ? null : makeMarker());
					});
			eval(document.getElementById("awesome-css-area").value);
			
			
		var editorjs = CodeMirror.fromTextArea(document.getElementById("awesome-js-area"));
  function selectThemejs(input) {
    var theme = input.options[input.selectedIndex].value;
    editorjs.setOption("theme", theme);
   // location.hash = "#" + theme;
  }
		</script>
		<?php
		}
}
$HSAWSadminMain = HSAWSadminMain::instance();
