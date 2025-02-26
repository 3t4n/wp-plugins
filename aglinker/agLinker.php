<?php
/*
Plugin Name: agLinker
Plugin URI: http://blog.agrafix.net
Description: This plugin adds links to specified words in posts and pages
Author: Alexander Thiemann
Version: 1.0
License: GPL
Author URI: http://agrafix.net
Min WP Version: 2.5
Max WP Version: 3.0.1
*/

function filter_agLinker($content) {
    $wl = get_option('aglinker_wordlist');
    
    $wordlist = array();
    $lines = explode("\n", $wl);
    foreach ($lines As $line) {
    	$inline = explode('|', $line);
    	$wordlist[$inline[0]] = array($inline[1], $inline[2]);
    }
    
    foreach ($wordlist As $k => $v) {
    	$content = preg_replace('#[\s|\,|\?|\!]'.$k.'[\s|\,|\?|\!]#si', '<a href="'.$v[1].'" target="_blank" title="'.$v[0].'">$0</a>', $content);
    }
    
    return $content;
}

function ag_admin_content() {
	echo '<style>
				.layout{
					
					float: right;
					position:absolute;
					padding: 1em;
					top:210px;
					right:50px;
					border: 1px solid #CCC;
					border-radius: 5px;

				   -moz-border-radius: 5px;
				
				   -webkit-border-radius: 5px;
				   -webkit-box-shadow: 1px 1px 10px #939393;
	               -moz-box-shadow: 1px 1px 10px #939393;
	               box-shadow: 1px 1px 10px #939393;
					
					
				}
				
				.layout input[type=submit]{
				
				cursor:pointer !important
					
				}
				.settings input[type=submit]{
				
				cursor:pointer !important
					
				}
				.settings{
					padding: 1em;
					float: left;
					position:absolute;
					top:210px;
					border: 1px solid #CCC;
					
					border-radius: 5px;

				   -moz-border-radius: 5px;
				
				   -webkit-border-radius: 5px;
				   -webkit-box-shadow: 1px 1px 10px #939393;
	               -moz-box-shadow: 1px 1px 10px #939393;
	               box-shadow: 1px 1px 10px #939393;
				   z-index:1000;
				}
				
				.api{
					padding: 5px;
					float: right;
					position:absolute;
					top:140px;
					right: 50px;
					background: #daffd9;
					border: 1px solid #CCC;
					
					border-radius: 5px;

				   -moz-border-radius: 5px;
				
				   -webkit-border-radius: 5px;
				   -webkit-box-shadow: 1px 1px 10px #939393;
	               -moz-box-shadow: 1px 1px 10px #939393;
	               box-shadow: 1px 1px 10px #939393;	
				}
             </style>
	
	
	 <div class="wrap">
			  	          <div class="icon32" id="icon-options-general"><br/></div><h2>agLinker Settings</h2>

			    <div class="metabox-holder has-right-sidebar" id="poststuff">
	
		<div class="inner-sidebar">
			<div style="position: relative;" class="meta-box-sortabless ui-sortable" id="side-sortables">
	
			<div class="postbox">

				<h3 class="hndle"><span>About agLinker</span></h3>
				<div class="inside">
				<p>
				<a href="http://blog.agrafix.net"  target = "_blank"><b>AgrafixBlog</b></a><br /><br />
				<b>Contact</b> : <a href="mailto:allypage@gmail.com">allypage@gmail.com</a><br />
				<b>Twitter</b> : <a href="http://twitter.com/agrafix"  target = "_blank">@agrafix</a><br />

				</p>
				
				
				</div><!--/inside-->
			</div><!--/postbox-->
			
			
			
			<div class="postbox">
		<h3 class="hndle"><span>Donate with MicroPayment</span></h3>
		<div class="inside">
			<p align="">
			
			<iframe src="https://billing.micropayment.de/fastdonate/?account=17155&theme=type3-blue" width="250" height="200" frameBorder="0" border="0" marginheight="0" marginwidth="0"><a href="https://billing.micropayment.de/fastdonate/?account=17155&theme=type3-blue" target="_blank">Donate Now!</a></iframe>
			</p>
		
		</div>
	</div>
	
	<div class="postbox">
				<h3 class="hndle"><span>Donate with PayPal</span></h3>
				<div class="inside">

				<p align="">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick" />
<input type="hidden" name="hosted_button_id" value="6158730" />
<input type="image" src="https://www.paypal.com/de_DE/DE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="Jetzt einfach, schnell und sicher online bezahlen – mit PayPal." />
<img alt="" border="0" src="https://www.paypal.com/de_DE/i/scr/pixel.gif" width="1" height="1" />
</form>
				</p>
				
				
				</div><!--/inside-->
			</div><!--/postbox-->
	
			</div>
		</div>
		
              <form action = "" method = "POST" id="form">

			 
			
			 <div class="has-sidebar-content" id="post-body-content">
			 
			 <div class="postbox">
				<h3 class="hndle"><span>Link Management</span></h3>
				<div class="inside">
			 		<p>Put your words that should be linked here. Format: <i>[WordToBeLinked]|[Description]|[URL]</i> (one per line)</p>
			 		<textarea name="aglinker_wordlist" style="width:80%;height:400px;">'.get_option('aglinker_wordlist').'</textarea><br />
			 		<input type="submit" name="sub" value = "Save Settings" />
			 </div>
			 </div>

		  </div>

		  </div>
		  </div>
		  </div>
		  <br>
         
		</form>	
		<br>

		</div>';
}

function ag_admin_box() {
    add_menu_page('agLinker', 'agLinker', 8, basename(__file__), '' , plugins_url('icon.png',__FILE__));
  
    add_submenu_page(basename(__file__), 'agLinker Settings', 'Edit Links', 8, basename(__file__),
        'ag_admin_content');

}

if (!get_option('aglinker_wordlist')) {
	add_option('aglinker_wordlist', '');
}

if (isset($_POST["aglinker_wordlist"]) && !empty($_POST["aglinker_wordlist"])) {
	update_option('aglinker_wordlist', $_POST["aglinker_wordlist"]);
}

add_action('admin_menu', 'ag_admin_box');
add_filter( 'the_content', 'filter_agLinker'' );
?>