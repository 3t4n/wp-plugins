<?php
/*
Plugin Name: Easy Elements Hider
Description: You can hide elements on your website using CSS class or id. This lite version work with website frontend. Pro version available for hide admin menus.
Version: 2.0
License: GPL
Author: Cheap Web Designer
Author URI: https://cheapwebdesigner.co.uk
*/

add_filter( 'plugin_row_meta', 'encore_easy_elements_hider_plugin_row_meta', 10, 2 );
 
function encore_easy_elements_hider_plugin_row_meta( $links, $file ) {    
    if ( plugin_basename( __FILE__ ) == $file ) {
        $row_meta = array(
          'docs'    => '<a href="' . esc_url( 'https://cheapwebdesigner.co.uk' ) . '" target="_blank" aria-label="' . esc_attr__( 'Plugin Additional Links', 'domain' ) . '" style="color:green;">' . esc_html__( 'Visit Developer Website', 'domain' ) . '</a> | 
        <a href="' . esc_url( 'https://cheapwebdesigner.co.uk/contact-us/' ) . '" target="_blank" aria-label="' . esc_attr__( 'Plugin Additional Links', 'domain' ) . '" style="color:#00bfff;">' . esc_html__( 'Help & Support', 'domain' ) . '</a>'
        );
 
        return array_merge( $links, $row_meta );
    }
    return (array) $links;
} 
/*Credits End */

function encore_easy_elements_hider_add_custom_css() {
	$option = get_option('encore_easy_elements_hider_hidden_elements_selectors');
	if(!is_array($option))
		$option = [];

	echo '<style>';
	foreach($option as $value)
		echo $value.",";
	echo '_________{display:none;}</style>';
}
add_action( 'wp_print_styles', 'encore_easy_elements_hider_add_custom_css' );

function encore_easy_elements_hider_register_settings() {
	 $args = array(
      'type' => 'array',
      'default' => [],
      );
   register_setting('encore_easy_elements_hider_options_group', 'encore_easy_elements_hider_hidden_elements_selectors', $args);
}
add_action( 'admin_init', 'encore_easy_elements_hider_register_settings' );


function encore_easy_elements_hider_register_options_page() {
  add_options_page('Encore Settings', 'Elements Hider', 'manage_options', 'encore', 'encore_easy_elements_hider_options_page');
}
add_action('admin_menu', 'encore_easy_elements_hider_register_options_page');

function encore_easy_elements_hider_options_page()
{
	$option = get_option('encore_easy_elements_hider_hidden_elements_selectors');
	if(!is_array($option))
		$option = [];
	$option = array_values($option);
?>
	<script>
		window.encore_easy_elements_hider_settings_element_count = <?=count($option)?>;
		window.encore_easy_elements_hider_settings_add_element = ()=>{
			const elementCount = window.encore_easy_elements_hider_settings_element_count;
			const table = document.getElementById('encore_easy_elements_hider_settings_table');
			const tr = document.createElement('tr');
			const html = `
			  <th scope="row"><label for="encore_easy_elements_hider_hidden_elements_selectors[${elementCount}]">Element Class or ID:</label></th>
			  <td><input type="text" id="encore_easy_elements_hider_hidden_elements_selectors[${elementCount}]" name="encore_easy_elements_hider_hidden_elements_selectors[${elementCount}]" value="#element id or class" /></td>
				<td><input type="button" class="button button-secondary" value="Remove" onclick="encore_easy_elements_hider_settings_remove_element(${elementCount})" /></td>
			`;
			tr.innerHTML = html;
			tr.id = `encore_easy_elements_hider_settings_row[${elementCount}]`;
			table.tBodies[0].appendChild(tr);
			window.encore_easy_elements_hider_settings_element_count++;
		}
		window.encore_easy_elements_hider_settings_remove_element = (key)=>{
			const table = document.getElementById('encore_easy_elements_hider_settings_table');
			const tr = document.getElementById(`encore_easy_elements_hider_settings_row[${key}]`);
			table.tBodies[0].removeChild(tr);
		}
	</script>
  <div>
  <h2>Easy Elements Hider Settings (Hide any website elements using css class and ids)</h2>
  <h1>How to use</h1>
<ol>
<li>Get the CSS class or ID of the element you like to hide. (On your browser right-click on the element you like to hide &gt; Go to inspect elements &gt; find the "<em><strong>css class or css id</strong></em>" related to element.&nbsp;</li>
<li>Copy the class or ID and paste it in the Element css class or id box.</li>
<li>Save it.&nbsp;</li>
<li>Now that element will be hidden.</li>
</ol>
  <form method="post" action="options.php">
  <?php settings_fields( 'encore_easy_elements_hider_options_group' ); ?>
  <h3>Elements to hide</h3>
  <p>Input the CSS ID of the elements that should be hidden.</p>
	<input type="button" class="button button-secondary" value="Add element" onclick="encore_easy_elements_hider_settings_add_element();"/>
	<br/>
  <table id="encore_easy_elements_hider_settings_table">
	<tr><td>&nbsp;</td></tr>
	<?php foreach($option as $key => $value){ ?>
	  <tr id="encore_easy_elements_hider_settings_row[<?=$key?>]">
	  <th scope="row"><label for="encore_easy_elements_hider_hidden_elements_selectors[<?=$key?>]">Element Class or ID:</label></th>
	  <td style="width:500px"><input style="width:100%" type="text" id="encore_easy_elements_hider_hidden_elements_selectors[<?=$key?>]" name="encore_easy_elements_hider_hidden_elements_selectors[<?=$key?>]" value="<?=$value;?>" /></td>
		<td><input type="button" class="button button-secondary" value="Remove" onclick="encore_easy_elements_hider_settings_remove_element(<?=$key?>)" /></td>
	  </tr>
	<?php } ?>
  </table>
  <?php  submit_button(); ?>
  </form>
  </div>
<?php
}


function encore_easy_elements_hider_add_plugin_page_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'options-general.php?page=encore' ) .
		'">' . __('Settings') . '</a>';
	return $links;
}
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'encore_easy_elements_hider_add_plugin_page_settings_link');

?>