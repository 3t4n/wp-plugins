<?php
add_action( 'admin_menu', 'dp_breadcrumb_menu' );
     
function dp_breadcrumb_menu() {
    add_options_page( 'DP RDFa Breadcrumb Generator options', 'DP Breadcrumb', 'manage_options', 'dp-rdfa-breadcrumb-generator.php', 'dp_breadcrumb_options' );
}
    
function dp_breadcrumb_register_settings() {
	add_option( 'dp_breadcrumb_showhome'); if (get_option('dp_breadcrumb_showhome') == "") {update_option('dp_breadcrumb_showhome','Yes');}
	add_option( 'dp_breadcrumb_showpost'); if (get_option('dp_breadcrumb_showpost') == "") {update_option('dp_breadcrumb_showpost','Yes');}
	add_option( 'dp_breadcrumb_showpage'); if (get_option('dp_breadcrumb_showpage') == "") {update_option('dp_breadcrumb_showpage','Yes');}
	add_option( 'dp_breadcrumb_showarchive'); if (get_option('dp_breadcrumb_showarchive') == "") {update_option('dp_breadcrumb_showarchive','Yes');}
	add_option( 'dp_breadcrumb_showtag'); if (get_option('dp_breadcrumb_showtag') == "") {update_option('dp_breadcrumb_showtag','Yes');}
	add_option( 'dp_breadcrumb_optseparator'); if (get_option('dp_breadcrumb_optseparator') == "") {update_option('dp_breadcrumb_optseparator','&gt;');}
	add_option( 'dp_breadcrumb_opttext'); if (get_option('dp_breadcrumb_opttext') == "") {update_option('dp_breadcrumb_opttext','You are here: ');}
    add_option( 'dp_breadcrumb_opttexthome'); if (get_option('dp_breadcrumb_opttexthome') == "") {update_option('dp_breadcrumb_opttexthome','Home');}
	add_option( 'dp_breadcrumb_opttitle'); if (get_option('dp_breadcrumb_opttitle') == "") {update_option('dp_breadcrumb_opttitle','Yes');}
	add_option( 'dp_breadcrumb_optlastchild'); if (get_option('dp_breadcrumb_optlastchild') == "") {update_option('dp_breadcrumb_optlastchild','Yes');}
	add_option( 'dp_breadcrumb_optmultiple'); if (get_option('dp_breadcrumb_optmultiple') == "") {update_option('dp_breadcrumb_optmultiple','Yes');}
	add_option( 'dp_breadcrumb_optremove'); if (get_option('dp_breadcrumb_optremove') == "") {update_option('dp_breadcrumb_optremove','Yes');}
	register_setting( 'dp_breadcrumb_settings', 'dp_breadcrumb_showhome' ); 
	register_setting( 'dp_breadcrumb_settings', 'dp_breadcrumb_showpost' ); 
	register_setting( 'dp_breadcrumb_settings', 'dp_breadcrumb_showpage' ); 
	register_setting( 'dp_breadcrumb_settings', 'dp_breadcrumb_showarchive' ); 
	register_setting( 'dp_breadcrumb_settings', 'dp_breadcrumb_showtag' ); 
	register_setting( 'dp_breadcrumb_settings', 'dp_breadcrumb_optseparator' );
	register_setting( 'dp_breadcrumb_settings', 'dp_breadcrumb_opttext' );
    register_setting( 'dp_breadcrumb_settings', 'dp_breadcrumb_opttexthome' );
	register_setting( 'dp_breadcrumb_settings', 'dp_breadcrumb_opttitle' ); 
	register_setting( 'dp_breadcrumb_settings', 'dp_breadcrumb_optlastchild' );  
	register_setting( 'dp_breadcrumb_settings', 'dp_breadcrumb_optmultiple' );
	register_setting( 'dp_breadcrumb_settings', 'dp_breadcrumb_optremove' );
} 
add_action( 'admin_init', 'dp_breadcrumb_register_settings' );
	
function dp_breadcrumb_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
?>
<div class="wrap">
	<div class="dp_how">
		<h2 style="font-size:36px; text-align:center;">DP RDFa Breadcrumb Generator</h2>
		<h2>About</h2>
		<p>Hi, my name's <a href="http://www.danilopetrozzi.it" target="_blank">Danilo Petrozzi</a>, I'm an italian SEO/blogger. I made my own RDFa breadcrumb generator plugin because, well.. I was frustrated by the fact that there were no (SEO-friendly) valid alternatives.</p>
		<p>I tried every microformats/RDFa breadcrumb plugin on earth, but they never produced the exact markup I wanted (what Google actually suggests).</p>
		<h2>Why should I use this?</h2>
		<ul>
		<li>> The Google Structure Data Testing Tool always says that my markup is perfect</li>
		<li>> My breadcrumbs are 100% based on the Google suggested RDFa markup. (<a href="https://support.google.com/webmasters/answer/185417?hl=en" target="_blank">click here to read Google's suggestions about breadcrumbs</a>)</li>
		<li>> DP RDFa Breadcrumb Generator works in every possible scenario: child pages, sub categories, posts in multiple categories (even if they are sub-categories too), and so on.</li>
		<li>> It is lightweight and fast: no external .CSS or .JS are involved during the process or requested as a resource in the front-end</li>
		<li></li>
		</ul>
		</div>
		
		<div class="dp_opt">
		<h1>How to use</h1>
		<p>Simply put this PHP code wherever you want: <span class="dp_high"><em>&lt;?php if(function_exists('dp_breadcrumb')){echo dp_breadcrumb();} ?&gt;</em></span></p>
		<p>Or use this shortcode instead: <span class="dp_high"><em>[dp_breadcrumb_generator]</em></span></p>
		<p style="font-size:12px;">Warning: in order to use shortcodes inside widgets, you have to add this to your theme's functions.php: <em>add_filter('widget_text', 'do_shortcode');</em></p>
		</div>
		
		<div class="dp_opt">
		<h1>How to customize (CSS)</h1>
		<p>Every different element has it's own CSS class to help you customize everything. Example:</p>
        <p><em>&lt;div class=&quot;<strong>dp_breadcrumb_main</strong>&quot; ...&gt;<br />
&lt;span class=&quot;<strong>dp_breadcrumb_span_1</strong>&quot; ...&gt;&lt;a class=&quot;<strong>dp_breadcrumb_a_1</strong>&quot; ...&gt; ...&lt;/a&gt;&lt;/span&gt;<br />
&lt;span class=&quot;<strong>dp_breadcrumb_span_2</strong>&quot; ...&gt;&lt;a class=&quot;<strong>dp_breadcrumb_a_2</strong>&quot; ...&gt; ...&lt;/a&gt;&lt;/span&gt;<br />
&lt;span class=&quot;<strong>dp_breadcrumb_span_3 dp_breadcrumb_span_last</strong>&quot; ...&gt;&lt;a class=&quot;<strong>dp_breadcrumb_a_3 dp_breadcrumb_a_last</strong>&quot; ...&gt; ...&lt;/a&gt;&lt;/span&gt;
<br />&lt;/div&gt;</em></p>
		</div>
	
	<div class="dp_opt">
		<form method="post" action="options.php">
<?php settings_fields( 'dp_breadcrumb_settings' ); ?>
	  <?php do_settings_sections( 'dp_breadcrumb_settings' ); ?>
		<h1 style="text-align:center; font-size:34px;">Settings</h1>
		<h2 style="margin-top:10px;">Where ?</h2>
		<p>Instead of displaying the PHP code/shortcode in the right taxonomies, simply place it everywhere and filter where it should be activated:</p>
		<table cellpadding="6">
			<tr>
				<td>Home</td>
				<td>
				<input class="dp_radio" type="radio" name="dp_breadcrumb_showhome" value="Yes" <?php if (get_option('dp_breadcrumb_showhome') == "Yes") {echo 'checked=checked';} ?> /> Yes
				<input class="dp_radio" type="radio" name="dp_breadcrumb_showhome" value="No" <?php if (get_option('dp_breadcrumb_showhome') == "No") {echo 'checked=checked';} ?> /> No
				</td>
			</tr>
			<tr>
				<td>Posts</td>
				<td>	
				<input class="dp_radio" type="radio" name="dp_breadcrumb_showpost" value="Yes" <?php if (get_option('dp_breadcrumb_showpost') == "Yes") {echo 'checked=checked';} ?> /> Yes
				<input class="dp_radio" type="radio" name="dp_breadcrumb_showpost" value="No" <?php if (get_option('dp_breadcrumb_showpost') == "No") {echo 'checked=checked';} ?> /> No
				</td>
			</tr>
			<tr>
				<td>Pages</td>
				<td>
				<input class="dp_radio" type="radio" name="dp_breadcrumb_showpage" value="Yes" <?php if (get_option('dp_breadcrumb_showpage') == "Yes") {echo 'checked=checked';} ?> /> Yes
				<input class="dp_radio" type="radio" name="dp_breadcrumb_showpage" value="No" <?php if (get_option('dp_breadcrumb_showpage') == "No") {echo 'checked=checked';} ?> /> No
				</td>
			</tr>
			<tr>
				<td>Categories</td>
				<td>
				<input class="dp_radio" type="radio" name="dp_breadcrumb_showarchive" value="Yes" <?php if (get_option('dp_breadcrumb_showarchive') == "Yes") {echo 'checked=checked';} ?> /> Yes
				<input class="dp_radio" type="radio" name="dp_breadcrumb_showarchive" value="No" <?php if (get_option('dp_breadcrumb_showarchive') == "No") {echo 'checked=checked';} ?> /> No
				</td>
			</tr>
			<tr>
				<td>Tags</td>
				<td>
				<input class="dp_radio" type="radio" name="dp_breadcrumb_showtag" value="Yes" <?php if (get_option('dp_breadcrumb_showtag') == "Yes") {echo 'checked=checked';} ?> /> Yes
				<input class="dp_radio" type="radio" name="dp_breadcrumb_showtag" value="No" <?php if (get_option('dp_breadcrumb_showtag') == "No") {echo 'checked=checked';} ?> /> No
				</td>
			</tr>
			
		</table>
		
		<h2 style="margin-top:15px;">How ?</h2>
		<p>Choose your preferred breadcrumb separator:<br /> 
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optseparator" value="&gt;" <?php if (get_option('dp_breadcrumb_optseparator') == "&gt;" || get_option('dp_breadcrumb_optseparator') == ">") {echo 'checked=checked';} ?> /> &gt;
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optseparator" value="-" <?php if (get_option('dp_breadcrumb_optseparator') == "-") {echo 'checked=checked';} ?> /> -
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optseparator" value="|" <?php if (get_option('dp_breadcrumb_optseparator') == "|") {echo 'checked=checked';} ?> /> |
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optseparator" value="," <?php if (get_option('dp_breadcrumb_optseparator') == ",") {echo 'checked=checked';} ?> /> ,
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optseparator" value=";" <?php if (get_option('dp_breadcrumb_optseparator') == ";") {echo 'checked=checked';} ?> /> ;
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optseparator" value=":" <?php if (get_option('dp_breadcrumb_optseparator') == ":") {echo 'checked=checked';} ?> /> :
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optseparator" value="/" <?php if (get_option('dp_breadcrumb_optseparator') == "/") {echo 'checked=checked';} ?> /> /
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optseparator" value="\" <?php if (get_option('dp_breadcrumb_optseparator') == "\\") {echo 'checked=checked';} ?> /> \
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optseparator" value="_" <?php if (get_option('dp_breadcrumb_optseparator') == "_") {echo 'checked=checked';} ?> /> _
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optseparator" value="&lt;" <?php if (get_option('dp_breadcrumb_optseparator') == "&lt;" || get_option('dp_breadcrumb_optseparator') == "<") {echo 'checked=checked';} ?> /> &lt;
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optseparator" value=" " <?php if (get_option('dp_breadcrumb_optseparator') == " ") {echo 'checked=checked';} ?> /> (space)
		</p>
		<hr />
		<p>Text before the breadcrumb trail: <input class="dp_text" type="text" name="dp_breadcrumb_opttext" value="<?php echo get_option('dp_breadcrumb_opttext'); ?>"  /></p>
		<hr />
        <p>Homepage anchor text: <input class="dp_text" type="text" name="dp_breadcrumb_opttexthome" value="<?php echo get_option('dp_breadcrumb_opttexthome'); ?>"  /></p>
		<hr />
		<p><strong>Add a title=""</strong> parameter to every breadcrumb link containing it's own name<br /> 
		<input class="dp_radio" type="radio" name="dp_breadcrumb_opttitle" value="Yes" <?php if (get_option('dp_breadcrumb_opttitle') == "Yes") {echo 'checked=checked';} ?> /> Yes
		<input class="dp_radio" type="radio" name="dp_breadcrumb_opttitle" value="No" <?php if (get_option('dp_breadcrumb_opttitle') == "No") {echo 'checked=checked';} ?> /> No</p>
		<hr />
		<p><strong>Always show the last child if it's a post</strong><br />
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optlastchild" value="Yes" <?php if (get_option('dp_breadcrumb_optlastchild') == "Yes") {echo 'checked=checked';} ?> /> Yes
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optlastchild" value="No" <?php if (get_option('dp_breadcrumb_optlastchild') == "No") {echo 'checked=checked';} ?> /> No</p>
		<p>When a post has multiple categories, <strong>should I print multiple breadcrumbs?</strong><br /><em>Tip: Google says a BIG YES! You definetely should leave it to "Yes"<br />Tip2: even if there are multiple breadcrumbs, Google shows only the first one he sees (the highest in the code)</em> <br />
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optmultiple" value="Yes" <?php if (get_option('dp_breadcrumb_optmultiple') == "Yes") {echo 'checked=checked';} ?> /> Yes
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optmultiple" value="No" <?php if (get_option('dp_breadcrumb_optmultiple') == "No") {echo 'checked=checked';} ?> /> No</p>
		<p>In this scenario (multiple markups), <strong>should I remove the text before the first breadcrumb</strong>? (most of the times it looks ugly. If in doubt, leave "Yes")<br />
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optremove" value="Yes" <?php if (get_option('dp_breadcrumb_optremove') == "Yes") {echo 'checked=checked';} ?> /> Yes
		<input class="dp_radio" type="radio" name="dp_breadcrumb_optremove" value="No" <?php if (get_option('dp_breadcrumb_optremove') == "No") {echo 'checked=checked';} ?> /> No</p>
		<hr />
		
		<p>
		<div class="dpx" style="margin-top:30px; font-size:20px; text-align:center; margin:0 auto;">Now save everything, and let me do my dirty job :)<br /><?php submit_button(); ?></div>
		
		</div>
	</form>
	
</div>
<style>
	.dp_high {color:#3EA30B; font-size:15px; font-weight:bold;}
	.dp_how {background-color:#FFF; padding:15px; margin:0 auto; border:1px solid #bdbdbd;}
	.dp_opt {background-color:#FFF; padding:15px; margin:0 auto; margin-top: 20px; border:1px solid #bdbdbd; }
	.dp_radio {margin:10px 0 10px 20px !important;}
	.dp_text {margin-left:15px;}
	.dpx .submit {text-align:center; margin:0 auto;}
</style>

<?php
			}
?>