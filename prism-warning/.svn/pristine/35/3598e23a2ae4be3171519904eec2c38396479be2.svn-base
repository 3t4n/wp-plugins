<?php
/*
Plugin Name: Prism Warning
Plugin URI: http://wordpress.org/plugins/prism-warning/
Description: Dieses Plugin zeigt eine Warnung, wenn ein Browser von PRISM-Mitgliedern genutzt wird.
Version: 0.6
Author: Lukas Fülling
Author URI: http://k40s.net
License: Beerware
*/

// Hooks a function to a filter action, 'the_content' being the action, 'prism_script' the function.
add_filter('the_content','prism_script');
 
// Callback function
function prism_script($content)
{
    // Checking if on post page.
    if ( is_singular() ) {
        return $content . load_priwar(); // If it's a page, a post or an attachment
    } // execute the script. The 'is_single' fits
    else { // exactly to our needs.
        return $content; // Return just the content.
    }
}

/*
Okay, here comes the magic (IF it actually works...):
I found no other way than writing a js file for every language.
The function 'load_priwar()' checks the language. If it's NULL
(because the language was not set at all) it will use english 'en'.
This way the plugin should *not* use too much space. I know this way
to do it is sh*t. Sorry.
If you know a better/easier way to handle this, PLEASE make a pull
request at GitHub. (https://github.com/k3ll4gr0up/prism-warning)
*/

function load_priwar() {
  $priwar_lang = get_option('priwar_lang');
  
  if ($priwar_lang == "en") { // Why can't it just work, like I want it too? :(
    wp_enqueue_script('prism-warning-script',plugins_url('/prism-warning-en.js', __FILE__));
  }
  
  elseif ($priwar_lang == "de") { // STUPID unexpected T_VARIABLE error :(
    wp_enqueue_script('prism-warning-script',plugins_url('/prism-warning-de.js', __FILE__));
  }
  
  else {    // Here is the "language not set" part...
    wp_enqueue_script('prism-warning-script',plugins_url('/prism-warning-en.js', __FILE__));
  }
}

// Menu stuff...

add_action('admin_menu', 'priwar_settings'); // Settings Page...

function priwar_settings() {

    add_menu_page('PRISM Warning Settings', 'PRISM Warning', 'administrator', 'priwar_settings', 'priwar_lang_settings');

}

// More badly formatted menu stuff...
// First attempt to design this. A bit.
// Nah I lied. I like it like this. Messy. :3
//
// BTW did you realize: I use TABLES!!11!1 
// *Shitstorm incoming*
//
// Oh damn, I hope nobody is actually reading this...
//
// Maybe I should add some ASCII-Art of naked people...
//

function priwar_lang_settings() {

    $lang_de = (get_option('priwar_lang') == 'de') ? 'selected' : '';

    $lang_en = (get_option('priwar_lang') == 'en') ? 'selected' : '';

    $html = '</pre>
<div class="wrap"><form action="options.php" method="post" name="options">
<h2>Select Your Settings</h2> <p><em>This should work now... If not, check your database if <code>priwar_lang</code> is set.</em></p>
<p>Please note: The drop-down <em>does not update</em> to the current language. If you click <code>update</code>, it will update the database values anyway.</p>
' . wp_nonce_field('update-options') . '
<table class="form-table" width="100%" cellpadding="10">
<tbody>
<tr>
<td scope="row" align="left">
<label>Language</label>
<select name="priwar_lang"><option value="de">German</option><option value="en">English</option></select>&nbsp;<em>This is the part which doesn\'t update!</em></td>
</tr>
</tbody>
</table>
<input type="hidden" name="action" value="update" />

<input type="hidden" name="page_options" value="priwar_lang" />

<input type="submit" name="Submit" value="Update" /></form></div>

<p>You found a bug? Please <a href="https://github.com/k3ll4gr0up/prism-warning/issues/new">Report it</a>!
<p>&nbsp;</p>
<p>Do you want to contribute?
<ul>
<li><a href="http://k3ll4gr0up.github.io/prism-warning">Project Home</a></li>
<li><a href="https://github.com/k3ll4gr0up/prism-warning">GitHub</a></li>
<li><a href="http://wordpress.org/plugin/prism-warning">Page at WordPress.org</a></li>
<li><a href="http://www.politiker-stopp.de/prism.html">About the Script</a></li>
</ul>
<em>This Plugin is handmade. Do not expect masterpieces from me. I suck at designing webpages. If you are interested in helping me <a href="https://github.com/k3ll4gr0up/prism-warning">please do so</a>.</em>
</p>
<p>Special thanks going out to <a href="http://gronkh.de/zeige/gronkh">Gronkh</a> for keeping me awake while coding, with his Minecraft Let\'s play.</p>
<pre>
';

    echo $html;

}

?>
