<?php
function smartass_panel() {
	add_options_page('SmartAss Highlighter Help', 'SmartAss Highlighter','manage_options', __FILE__, 'smartass_info');
}
function smartass_info(){
?>
<div class="wrap">
<?php $link = plugins_url('/donate.jpg', __FILE__);?>
<?php $lineop = plugins_url('/screenshot-3.png', __FILE__);?>
<?php $nolineop = plugins_url('/screenshot-4.png', __FILE__);?>
<h2>SmartAss Highlighter</h2>
<img src="<?php echo $lineop;?>" alt="Default Output" /><br><br><br>
<h3>Usage Notes :</h3>
&rsaquo;&rsaquo; Put any of your code in between <code>&lt;pre&gt;</code> and <code>&lt;/pre&gt;</code> tags to be highlighted.<br>
&rsaquo;&rsaquo; The highlighting css is placed in the plugin folder as `highlighter.css`<br>
&rsaquo;&rsaquo; <b>MUST</b> use shortcode <strong><code>[highlighter]</code></strong> to highlight the code in <code>&lt;pre&gt;</code> tags.<br>
&rsaquo;&rsaquo; You can choose to show line numbers or not. By Default line numbers will be shown.<br>
&rsaquo;&rsaquo; To turn off the line numbers in code:-<br>
&nbsp;&nbsp;&nbsp;&nbsp;&rsaquo;&rsaquo; <code>[highlighter]</code> &rsaquo; Line numbers will be shown because it is on by default<br>
&nbsp;&nbsp;&nbsp;&nbsp;&rsaquo;&rsaquo; <code>[highlighter line=1]</code> &rsaquo; Line numbers will be shown<br>
&nbsp;&nbsp;&nbsp;&nbsp;&rsaquo;&rsaquo; <code>[highlighter line=0]</code> &rsaquo; No line numbers<br><br><br>

<h3>Example Post containing code</h3>

This is some random code.
<pre>
&lt;pre&gt;
class JustTechThings
{
	public static void main (String arguments[])
	{
		System.out.println("Greetings from the developer!");
	}
}
&lt;/pre&gt;
[highlighter line=0]</pre>

<h3>Output</h3>
<img src="<?php echo $nolineop;?>" alt="Output without line numbers" /><br><br>
<h2>Donate</h2>
<p>
If you find this plugin helpful and want to encourage me to develop more free tools, Please consider <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EVULYXVJWP8ZW" target="_blank" title="Paypal Donate Link">donating</a>. :)
</p>
<p>
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EVULYXVJWP8ZW" target="_blank" title="Paypal Donate Link"><img src="<?php echo $link; ?>" alt="Paypal Donate" title="Paypal Donate Link" /></a>
</p>
</div>
<?php 
}
add_action('admin_menu', 'smartass_panel');
?>