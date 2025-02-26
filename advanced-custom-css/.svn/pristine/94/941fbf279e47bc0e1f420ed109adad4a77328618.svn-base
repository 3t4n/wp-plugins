<?php
return '
<div class="card" style="max-width:100%;margin:10px!important">
    <div class="card-content">
	<h4>Advanced Custom CSS</h4>
	<a href="http://bit.ly/2bzAUb6" style="float:right;margin-left:10px" class="waves-effect waves-light btn">Help</a>
	
	<a href="https://wordpress.org/support/plugin/advanced-custom-css/reviews/?rate=5#new-post" style="float:right;margin-left:10px" class="waves-effect waves-light btn">Rate Plugin</a>
	
	<a href="http://prasadkirpekar.com/donate" style="float:right" class="waves-effect waves-light btn">Donate</a><br/>
	</div>
</div>

<div class="card" style="max-width:100%;margin:10px!important">
    <div class="card-content">
      
	  </div>
    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width">
        <li class="tab"><a href="#everywhere-tab">Everywhere</a></li>
        <li class="tab"><a href="#posts-tab">On Posts</a></li>
        <li class="tab"><a href="#pages-tab">On Pages</a></li>
      </ul>
    </div>
    <div class="card-content grey lighten-4">
    <div id="everywhere-tab">
		<form method="post" action="'.$action_url.'">'.
				wp_nonce_field('acc_nonce_everywhere','acc_nonce_field_everywhere').'
				<textarea class="acc_editor" name="everywhere_css" id="ct">'.esc_textarea(get_option('acc_css_everywhere')).'</textarea><br/>
				<input value="Save CSS" type="submit" id="save-everywhere" style="float:right" class="waves-effect waves-light btn acc-save" /><br/><br/>
		</form>
	</div>
    <div id="posts-tab">
		<form method="post" action="'.$action_url.'">'.
				wp_nonce_field('acc_nonce_posts','acc_nonce_field_posts').'
				<textarea class="acc_editor" name="posts_css" id="ct1">'.esc_textarea(get_option('acc_css_posts')).'</textarea><br/>
				<input value="Save CSS" type="submit" style="float:right" class="waves-effect waves-light btn acc-save" /><br/><br/>
		</form>
	</div>
    <div id="pages-tab">
		<form method="post" action="'.$action_url.'">'.
				wp_nonce_field('acc_nonce_pages','acc_nonce_field_pages').'
				<textarea class="acc_editor" name="pages_css" id="ct2">'.esc_textarea(get_option('acc_css_pages')).'</textarea><br/>
				<input value="Save CSS" type="submit" style="float:right" class="waves-effect waves-light btn acc-save" /><br/><br/>
		</form>
    </div>
  </div>
  <script>
 jQuery(window).on("load",function(){
	 var se = CodeMirror.fromTextArea(document.getElementById("ct"), {
    
    matchBrackets: true,
	autofocus: true,
	theme:"dracula",
    mode: "css"
  });
  
	
	var sp = CodeMirror.fromTextArea(document.getElementById("ct1"), {
    
    matchBrackets: true,
	autofocus: true,
	 autoRefresh:true,
	theme:"dracula",
    mode: "css"
  });

	
	var spa = CodeMirror.fromTextArea(document.getElementById("ct2"), {
    
    matchBrackets: true,
	 autoRefresh:true,
	autofocus: true,
	theme:"dracula",
    mode: "css"
  });
 
	
	
 });
  
	
  </script>
';

?>