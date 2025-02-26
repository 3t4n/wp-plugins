<?php /*
		Plugin Name: Theme Duplicator
		Plugin URI: https://wordpress.org/plugins/theme-duplicator/
		Description: This plugin creates a duplicate copy of your selected theme.
		Author: Rohit Choudhary
		Version: 1.1
		Author URI: https://about.me/r_choudhary
	 */


//global variable for form field.
$td_new_name;

//Menu in admin
function rtdpDuplicateMenu() {
       add_menu_page("Theme Duplicator", "Theme Duplicator", "administrator", "Theme Duplicator", "rtdpDuplicateAdmin");
}

add_action('admin_menu', 'rtdpDuplicateMenu');

//Function runs on plugin screen
function rtdpDuplicateAdmin() { 

	global $td_new_name;
	
	
	
    if(isset($_REQUEST['td_create_theme'])) {
		
		if($_REQUEST['td_source_theme']!='' && $_REQUEST['td_dest_theme']!='' && $_REQUEST['td_new_name']!='') {
		
			if(sanitize_text_field(rtdpcheckForSpecial($_REQUEST['td_dest_theme']))!='' && sanitize_text_field(rtdpcheckForSpecial($_REQUEST['td_new_name']))!='') {

        $td_theme_path = get_theme_root(); //theme folder path
		
		$td_source_th = sanitize_text_field(rtdpcheckForSpecial($_REQUEST['td_source_theme']));
		$td_dest_th = sanitize_title(rtdpcheckForSpecial($_REQUEST['td_dest_theme']));
		
        $tdsourcedirectory = $td_theme_path.'/'.$td_source_th; //source theme directory
        $tddestdirectory = $td_theme_path.'/'.$td_dest_th; //new theme directory

        if(rtdpduplicateThemeNew($tdsourcedirectory, $tddestdirectory)){
			$tdmessg = '<p style="color: #009845;"><strong>'.sanitize_text_field(rtdpcheckForSpecial($_REQUEST['td_new_name']))." Created Successfully.</strong></p>";
		}
		
		$td_new_name = sanitize_text_field(rtdpcheckForSpecial($_REQUEST['td_new_name']));

		$tdstyledata = file($tddestdirectory.'/style.css');

		$tdstyledata = array_map('rtdpchangeThemeStyle',$tdstyledata);
		file_put_contents($tddestdirectory.'/style.css', implode('', $tdstyledata));
		
		} else {
			$tdmessg = '<p style="color: #ec1a1a;"><strong>Please Do not use special characters for eg: $, %, & etc...</strong></p>';
			}
		} else {
			$tdmessg = '<p style="color: #ec1a1a;"><strong>Error! Please try again...</strong></p>';
		}

    }
    ?>

<div class="wrap">
  <h2>Theme Duplicator</h2>
  <?php if(isset($tdmessg)) {
	  echo $tdmessg;
  } ?>
  <form name="theme_dupli_form" method="post" action="">
  <input type="hidden" name="td_hidden" value="Y">
  <table class="form-table">
    <tbody>
      <tr>
        <th scope="row"><?php _e("Source Theme Name: " ); ?></th>
        <td><select name="td_source_theme">
            <?php
    	foreach (wp_get_themes() as $key=>$themess) { ?>
            <option value="<?php echo $key; ?>"><?php echo $themess['Name']; ?></option>
            <?php } ?>
          </select></td>
      </tr>
      <tr>
        <th scope="row"><?php _e("Destination Theme Folder Name: "); ?></th>
        <td><input type="text" name="td_dest_theme" value="" required="required">
        <small><strong>Note:</strong> (Please Do not use special characters for eg: !, %, # etc...)</small>
        </td>
      </tr>
      <tr>
        <th scope="row"><?php _e("Destination Theme Name: "); ?></th>
        <td><input type="text" name="td_new_name" value="" required="required">
        <small><strong>Note:</strong> (Please Do not use special characters for eg: !, %, # etc...)</small>
        </td>
      </tr>
    </tbody>
  </table>
  <p class="submit">
    <input type="submit" name="td_create_theme" value="Submit" class="button button-primary" />
  </p>
</form>

</div>
<?php }

function rtdpduplicateThemeNew($tdsourcedirectory, $tddestdirectory)
{
    // Check for symlinks
    if (is_link($tdsourcedirectory)) {
        return symlink(readlink($tdsourcedirectory), $tddestdirectory);
    }
    
    // Simple copy for a file
    if (is_file($tdsourcedirectory)) {
        return copy($tdsourcedirectory, $tddestdirectory);
    }

    // Make destination directory
    if (!is_dir($tddestdirectory)) {
        mkdir($tddestdirectory);
    }

    // Loop through the folder
    $dir = dir($tdsourcedirectory);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories
        rtdpduplicateThemeNew("$tdsourcedirectory/$entry", "$tddestdirectory/$entry");
    }

    // Clean up
    $dir->close();
    return true;
}

function rtdpchangeThemeStyle($tdstyledata) {
	global $td_new_name;
	if (stristr($tdstyledata, 'Theme Name')) {
	 return "Theme Name: ".$td_new_name."\n";
	}
	return $tdstyledata;
}

function rtdpcheckForSpecial($string)
{
	$string = trim($string);
	$string = str_replace("@","",$string);
	$string = str_replace("#","",$string);
	$string = str_replace("$","",$string);
	$string = str_replace('"',"",$string);
	$string = str_replace("%","",$string);
	$string = str_replace("^","",$string);
	$string = str_replace("&","",$string);
	$string = str_replace("*","",$string);
	$string = str_replace("(","",$string);
	$string = str_replace(")","",$string);
	$string = str_replace("{","",$string);
	$string = str_replace("}","",$string);
	$string = str_replace("[","",$string);
	$string = str_replace("]","",$string);
	$string = str_replace("|","",$string);
	$string = str_replace("\\","",$string);
	$string = str_replace(";","",$string);
	$string = str_replace(":","",$string);
	$string = str_replace("?","",$string);
	$string = str_replace(">","",$string);
	$string = str_replace("<","",$string);
	$string = str_replace(",","",$string);
	$string = str_replace(".","",$string);
	$string = str_replace("//","",$string);
	$string = str_replace("!","",$string);
	$string = str_replace("/","",$string);
	$string = str_replace("'","",$string);
	$string = str_replace('"',"",$string);
	$string = str_replace("_","",$string);
	$string = str_replace('quot',"",$string);
	return $string;
}
