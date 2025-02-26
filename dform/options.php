<?php
/* Menu item */
add_action('admin_menu', 'dform_plugin_menu');
function dform_plugin_menu() {
	$res=add_options_page('dForm Options', 'dForm', 'manage_options', 'dform-settings', 'dform_plugin_options');
	add_action('admin_print_styles-' . $res, 'dform_admin_css');
}

/* Custom style for options page */
function dform_admin_css() {
    wp_register_style('dform-plugin-page-css', plugins_url('astyle.css', __FILE__), array(), '1.0.0', 'all');
    wp_enqueue_style('dform-plugin-page-css');
}

/* Tab management */
function dform_admin_tabs( $current = 'homepage' ) {
    $tabs = array( 'homepage' => 'Submissions', 'sources' => 'Forms', 'settings' => 'Settings', 'help'=>'Help');
    echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=dform-settings&tab=$tab'>$name</a>";

    }
    echo '</h2>';
}

/* Options */
add_action( 'admin_init', 'dform_admin_init' );
function dform_admin_init(){
	register_setting( 'dform_options', 'dform_recaptcha_private');
	register_setting( 'dform_options', 'dform_recaptcha_public');
	register_setting( 'dform_options', 'dform_show_link');
}

/* Settings pages */
function dform_plugin_options() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	//Settings tabs
   global $pagenow;
	if ( isset ( $_GET['tab'] ) ) dform_admin_tabs($_GET['tab']); else dform_admin_tabs('homepage');	
   if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab']; else $tab = 'homepage';

	?><div class="wrap"><?php
   switch ( $tab ){
      case 'settings' :
         dform_tab_settings();
      break;
      case 'sources' :
         dform_tab_sources();
      break;
      case 'homepage' :
         dform_tab_results();
      break;
      case 'help' :
         dform_tab_help();
      break;	
	}
	?></div><?php
}

function dform_tab_settings() {
?>
	<form action="options.php" method="post">
	 <?php settings_fields('dform_options'); ?>
	 <h3>reCAPTCHA settings</h3>
	 Place <strong>[dfcaptcha]</strong> somewhere between the &lt;form&gt; and &lt;/form&gt; tag in your page to include the captcha. 
    <table class="form-table">
        <tr valign="top">
        <th scope="row">reCAPTCHA private key</th>
        <td><input type="text" name="dform_recaptcha_private" style="width:400px;" value="<?php echo get_option('dform_recaptcha_private'); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">reCAPTCHA public key</th>
        <td><input type="text" name="dform_recaptcha_public" style="width:400px;" value="<?php echo get_option('dform_recaptcha_public'); ?>" /></td>
        </tr>
    </table>
    <h3>Link to us</h3>
    <input type="checkbox" id="dform_show_link" name="dform_show_link" value="1" <?php checked( '1', get_option( 'dform_show_link' ) ); ?>  /> <label for="dform_show_link">Show link to divides.be</label><br /><br /> 
    If you don't like the standard link, consider adding a custom link to us: &lt;a href="http://www.divides.be"&gt;divides.be&lt;/a&gt; 
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
	</form>
<?php
}
function dform_tab_sources() {
	global $wpdb;	
	$table_name = $wpdb->prefix . "dform_sources";
	if($_POST['addsource']!="") {	
		$sourcename=$_POST['addsource'];
		$rows_affected = $wpdb->insert( $table_name, array('fname' => $sourcename) );
	}
	if($_POST['editsource']!="") {	
		$sourcename=$_POST['fname'];
		$sourceid=$_POST['editsource'];
		$rows_affected = $wpdb->update( $table_name, array('fname' => $sourcename), array('id' => $sourceid));
	}
	if($_GET['delsource']!="") {	
		$sourceid=$_GET['delsource'];
		$wpdb->query(
			"
			DELETE FROM $table_name 
			WHERE id = '".$sourceid."'");
	}
	?>
	Use the id in a hidden field to define the form. Replace the value with the id of the form you want the results to be listed under. The results of forms posted without an id will not be stored.<br />
	<div style="float:left;margin:5px;border:1px solid #ccc;padding:5px;">&lt;input type="hidden" name="dform_id" value="<em>id</em>" /&gt; </div><br />

<table class="wp-list-table widefat fixed pages dftable" cellspacing="0">
	<thead>
	<tr>
		<th scope='col' id='cdel' class='manage-column'  style="width:20px;height:24px;"></th>
		<th scope='col' id='cid' class='manage-column'  style="width:20px;"><span>ID</span></th>
		<th scope='col' id='cfrorm' class='manage-column'  style="100%;"><span>Form name</span></th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<th scope='col' class='manage-column'  style=""></th>
		<th scope='col' class='manage-column'  style=""><span>ID</span></th>
		<th scope='col' class='manage-column'  style=""><span>Form name</span></th>
	</tr>
	</tfoot>
	<tbody id="the-list">
	<?php
		foreach( $wpdb->get_results("SELECT * FROM ".$table_name.";") as $key => $row) {
			echo "<tr><td><img src='".plugin_dir_url(__FILE__)."/img/delete_16.png' onClick=\"location.href='?page=dform-settings&tab=sources&delsource=".$row->id."'\" /></td><td>".$row->id."</td><td><form method='post'><input type='hidden' name='editsource' value='".$row->id."' /><input type='text' name='fname' value='".$row->fname."' /></form></td></tr>";	
		}	
	?>
	<tr><td colspan="2">Add</td><td><form method="post"><input type="text" name="addsource"style="border:1px solid #ccc;background:#fff;" /></form></td></tr>
</tbody>	</table>
	<?php
}


/* Submission status bullets */
function dform_status_bullets($value,$id) {
	for($i=1;$i<=4;$i++) {
		if($value==$i) {
			echo "<img src='".plugin_dir_url(__FILE__)."/img/c".$i."a.png' onClick=\"location.href='?page=dform-settings&statid=".$id."&val=0'\" />";	
		} else {
			echo "<img src='".plugin_dir_url(__FILE__)."/img/c".$i."b.png' onClick=\"location.href='?page=dform-settings&statid=".$id."&val=".$i."'\"/>";
		}	
	}
}

/* Submissions */
function dform_tab_results() {
	global $wpdb;
	
	//Submission status change
	$table_name = $wpdb->prefix . "dform_entries";
	if($_GET['statid']!='') {
		$status=$_GET['val'];
		$entryid=$_GET['statid'];
		$rows_affected = $wpdb->update( $table_name, array('status' => $status), array('eid' => $entryid));
	}
	if($_GET['delentry']!="") {	
		$entryid=$_GET['delentry'];
		$wpdb->query(
			"
			DELETE FROM $table_name 
			WHERE eid = '".$entryid."'");
	}
?>
<table class="wp-list-table widefat fixed pages dftable" cellspacing="0">

<?php
	if($_GET['entryid']=="") {
?>
	<thead>
	<tr>
		<th scope='col' class='manage-column'  style="width:20px;height:24px;"></th>
		<th scope='col' class='manage-column'  style="width:20px;"><span>ID</span></th>
		<th scope='col' class='manage-column'  style="width:120px;"><span>Status</span></th>
		<th scope='col' class='manage-column'  style="width:200px;"><span>Time</span></th>
		<th scope='col' class='manage-column'  style="100%;"><span>Form name</span></th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<th scope='col' class='manage-column'  style="width:20px;height:24px;"></th>
		<th scope='col' class='manage-column'  style="width:20px;"><span>ID</span></th>
		<th scope='col' class='manage-column'  style="width:120px;"><span>Status</span></th>
		<th scope='col' class='manage-column'  style="width:200px;"><span>Time</span></th>
		<th scope='col' class='manage-column'  style="100%;"><span>Form name</span></th>
	</tr>
	</tfoot>
	<tbody id="the-list">
<?php
		$table_name = $wpdb->prefix . "dform_entries";
		$table_name_sources = $wpdb->prefix . "dform_sources";
		foreach( $wpdb->get_results("SELECT * FROM ".$table_name.",".$table_name_sources." WHERE ".$table_name_sources.".id=".$table_name.".source;") as $key => $row) {
			echo "<tr><td><img src='".plugin_dir_url(__FILE__)."/img/delete_16.png' onClick=\"location.href='?page=dform-settings&delentry=".$row->eid."'\" /></td><td onClick=\"location.href='?page=dform-settings&entryid=".$row->eid."'\">".$row->eid."</td><td>";dform_status_bullets($row->status,$row->eid);echo "</td><td onClick=\"location.href='?page=dform-settings&entryid=".$row->eid."'\">".date("d-M-Y H:i",$row->time)."</td><td onClick=\"location.href='?page=dform-settings&entryid=".$row->eid."'\">".$row->fname."</td></tr>";	
		}	
	} else {
		echo "<a href='?page=dform-settings'><- back to entries</a><br /><br />";
?>
	<thead>
	<tr>
		<th scope='col' class='manage-column'  style="width:20px;height:24px;"><span>ID</span></th>
		<th scope='col' class='manage-column'  style="width:200px;"><span>Field</span></th>
		<th scope='col' class='manage-column'  style="100%;"><span>Value</span></th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<th scope='col' class='manage-column'  style="width:20px;height:24px;"><span>ID</span></th>
		<th scope='col' class='manage-column'  style="width:200px;"><span>Field</span></th>
		<th scope='col' class='manage-column'  style="100%;"><span>Value</span></th>
	</tr>
	</tfoot>
	<tbody id="the-list">
<?php		
		$entry=$_GET['entryid'];
		$table_name = $wpdb->prefix . "dform_data";
		foreach( $wpdb->get_results("SELECT * FROM ".$table_name." where entry=".$entry.";") as $key => $row) {
			echo "<tr><td>".$row->id."</td><td>".$row->fname."</td><td>".$row->fvalue."</td></tr>";
		}	
	}
?>
</tbody></table>
<?php	
}

/* Help tab*/
function dform_tab_help() {
?>
<h3>About dForms</h3>
dForm is a WordPress plugin for handling forms. It can be used to process simple forms constructed with standard html tags.

<h3>How to create dForms</h3>
<ol>
<li>Create a form on the forms tab (enter the name in the last row and press enter)</li>
<li>Add a form to a WordPress page or post. For example:<br />
<div style="border:1px solid #ccc;padding:6px;float:left;margin:6px;">
&lt;form method="post"&gt;<br />
&lt;input type="hidden" name="dform_id" value="1" /&gt;<br />
&lt;label for="firstname"&gt;First name: &lt;/label&gt; &lt;input id="firstname" type="text" name="First name" /&gt;<br />
&lt;label for="lastname"&gt;Last name: &lt;/label&gt; &lt;input id="lastname" type="text" name="Last name" /&gt;<br />
&lt;label for="email"&gt;E-mail: &lt;/label&gt; &lt;input id="email" type="text" name="E-mail" /&gt;<br />
[dfcaptcha]<br />
&lt;input type="submit" value="Submit" /&gt;<br />
&lt;/form&gt;
</div>
<br style="clear:both;" />
Be sure the have the <strong>dform_id</strong> field in the form. Only forms with a value for dform_id will be processed. The [dfcaptcha] is optional and can be used to prevent spam.
</li>
<li>Try the form, and have a look in the dForm submissions tab.</li>
<li>Click on an entry to see the form fields and values</li>
</ol>
<?php
}
?>