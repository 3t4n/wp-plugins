<?php
/*
Plugin Name: Filosofo Old-Style Upload
Plugin URI: http://www.ilfilosofo.com/blog/old-style-upload/
Description: Filosofo Old-Style Upload restores for WordPress 2.0+ the Upload feature found in earlier versions. 
Version: 0.5
Author: Austin Matzko
Author URI: http://www.ilfilosofo.com/blog/
*/

/*
Installation instructions: Upload this file into your WordPress 2.0 directory, and activate it.
*/


/*  Copyright 2005  Austin Matzko  (email : if.website at gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

if (!class_exists('filosofo_osu')) {
class filosofo_osu {
//**********************************************************************
function add_tabs() {
        add_menu_page('Upload', 'Upload', $this->get_settings('fileupload_minlevel'), __FILE__,array(&$this,'upload_page'));
        add_options_page('Uploads Options', 'Uploads', 9, __FILE__,array(&$this,'options_page'));
}
//*********************************************************************
function get_settings($value) {
// gets the settings, providing defaults if need be
if (!get_option($value)) {
	$defaults = array(
	'fileupload_realpath' => ABSPATH . 'wp-content',
	'fileupload_url' => get_option('siteurl') . '/wp-content',
	'fileupload_allowedtypes' => 'jpg jpeg gif png',
	'fileupload_maxk' => 300,
	'fileupload_minlevel' => 6);
	update_option($value,$defaults[$value]);
	return $defaults[$value];
} else {
	return get_option($value);
}
} //end get_settings
//*********************************************************************
function options_page() {
if ($_POST['submit']) {
        $possible_options = array_keys($_POST);
        //if the options are part of an array
	foreach($possible_options as $option) {
        	update_option($option,trim($_POST[$option]));
	}
} 
?>
<div class="wrap"> 
<h2><?php _e('Upload Options') ?></h2>
<p><?php printf(__('These settings affect only the <a href="%1$s">upload page</a>, <strong>not</strong> the inline uploader used on the write pages.'), $this->get_settings('siteurl') . '/wp-admin/admin.php?page=' . basename(__FILE__)) ?></p>
<form name="formoptions" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo basename(__FILE__); ?>&amp;updated=true"> 
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="form_type" value="upload_options" />
	<fieldset class="options">
	<table width="100%" cellspacing="2" cellpadding="5" class="editform"> 
	<tr> 
	<th width="33%" valign="top" scope="row"><?php _e('Destination directory:') ?> </th> 
	<td>
	<input name="fileupload_realpath" type="text" id="fileupload_realpath" value="<?php echo $this->get_settings('fileupload_realpath'); ?>" size="50" /><br />
	<?php printf(__('Recommended: <code>%s</code>'), ABSPATH . 'wp-content') ?>
	
	</td> 
	</tr> 
	<tr>
	<th valign="top" scope="row"><?php _e('URI of this directory:') ?> </th>
	<td>          
	<input name="fileupload_url" type="text" id="fileupload_url" value="<?php echo $this->get_settings('fileupload_url'); ?>" size="50" /><br />
	<?php printf(__('Recommended: <code>%s</code>'), $this->get_settings('siteurl') . '/wp-content') ?>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e('Maximum size:') ?> </th>
	<td><input name="fileupload_maxk" type="text" id="fileupload_maxk" value="<?php echo $this->get_settings('fileupload_maxk'); ?>" size="4" /> 
	<?php _e('Kilobytes (KB)') ?></td>
	</tr>
	<tr>
	<th valign="top" scope="row"><?php _e('Allowed file extensions:') ?></th>
	<td><input name="fileupload_allowedtypes" type="text" id="fileupload_allowedtypes" value="<?php echo $this->get_settings('fileupload_allowedtypes'); ?>" size="40" />
	<br />
	<?php _e('Recommended: <code>jpg jpeg png gif</code>') ?></td>
	</tr>
	<tr>
	<th scope="row"><?php _e('Minimum level to upload:') ?></th>
	<td><select name="fileupload_minlevel" id="fileupload_minlevel">
	<?php
	for ($i = 1; $i < 11; $i++) {
	if ($i == $this->get_settings('fileupload_minlevel')) $selected = " selected='selected'";
	else $selected = '';
	echo "\n\t<option value='$i' $selected>$i</option>";
	}
	?>
	</select></td>
	</tr>
	</table> 
	</fieldset>
	<p class="submit">
		<input type="submit" name="submit" value="<?php _e('Update Options') ?> &raquo;" />
	</p>
</form> 
</div>
<?php
}// end options_page
//*********************************************************************
function upload_page() {
$title = 'Upload Image or File';
if ( !$this->get_settings('fileupload_minlevel') )
	die (__("You are not allowed to upload files"));
$allowed_types = explode(' ', trim(strtolower($this->get_settings('fileupload_allowedtypes'))));
if ($_POST['submit']) {
	$action = 'upload';
} else {
	$action = '';
}
if (!is_writable($this->get_settings('fileupload_realpath')))
	$action = 'not-writable';
?> <div class="wrap">
<?php 
switch ($action) {
case 'not-writable':
?>
<p><?php printf(__("It doesn't look like you can use the file upload feature at this time because the directory you have specified (<code>%s</code>) doesn't appear to be writable by WordPress. Check the permissions on the directory and for typos."), $this->get_settings('fileupload_realpath')) ?></p>

<?php
break;
case 'upload':
	$imgalt = basename( (isset($_POST['imgalt'])) ? $_POST['imgalt'] : '' );
	$img1_name = (strlen($imgalt)) ? $imgalt : basename( $_FILES['img1']['name'] );
	$img1_name = preg_replace('/[^a-z0-9_.]/i', '', $img1_name); 
	$img1_size = $_POST['img1_size'] ? intval($_POST['img1_size']) : intval($_FILES['img1']['size']);
	$img1_type = (strlen($imgalt)) ? $_POST['img1_type'] : $_FILES['img1']['type'];
	$imgdesc = htmlentities2($_POST['imgdesc']);
	$pi = pathinfo($img1_name);
	$imgtype = strtolower($pi['extension']);
	if (in_array($imgtype, $allowed_types) == false)
		die(sprintf(__('File %1$s of type %2$s is not allowed.') , $img1_name, $imgtype));
    if (strlen($imgalt)) {
        $pathtofile = $this->get_settings('fileupload_realpath')."/".$imgalt;
        $img1 = $_POST['img1'];
    } else {
        $pathtofile = $this->get_settings('fileupload_realpath')."/".$img1_name;
        $img1 = $_FILES['img1']['tmp_name'];
    }
    // makes sure not to upload duplicates, rename duplicates
    $i = 1;
    $pathtofile2 = $pathtofile;
    $tmppathtofile = $pathtofile2;
    $img2_name = $img1_name;
    while ( file_exists($pathtofile2) ) {
        $pos = strpos( strtolower($tmppathtofile), '.' . trim($imgtype) );
        $pathtofile_start = substr($tmppathtofile, 0, $pos);
        $pathtofile2 = $pathtofile_start.'_'.zeroise($i++, 2).'.'.trim($imgtype);
        $img2_name = explode('/', $pathtofile2);
        $img2_name = $img2_name[count($img2_name)-1];
    }
    if (file_exists($pathtofile) && !strlen($imgalt)) {
        $i = explode(' ', $this->get_settings('fileupload_allowedtypes'));
        $i = implode(', ',array_slice($i, 1, count($i)-2));
        $moved = move_uploaded_file($img1, $pathtofile2);
        // if move_uploaded_file() fails, try copy()
        if (!$moved) {
            $moved = copy($img1, $pathtofile2);
        }
        if (!$moved) {
            die(sprintf(__("Couldn't upload your file to %s."), $pathtofile2));
        } else {
			chmod($pathtofile2, 0666);
            @unlink($img1);
        }
	// 
    // duplicate-renaming function contributed by Gary Lawrence Murphy
    ?>
    <p><strong><?php __('Duplicate File?') ?></strong></p>
    <p><b><em><?php printf(__("The filename '%s' already exists!"), $img1_name); ?></em></b></p>
    <p> <?php printf(__("Filename '%1\$s' moved to '%2\$s'"), $img1, "$pathtofile2 - $img2_name") ?></p>
    <p><?php _e('Confirm or rename:') ?></p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo basename(__FILE__); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo  $this->get_settings('fileupload_maxk') *1024 ?>" />
    <input type="hidden" name="img1_type" value="<?php echo $img1_type;?>" />
    <input type="hidden" name="img1_name" value="<?php echo $img2_name;?>" />
    <input type="hidden" name="img1_size" value="<?php echo $img1_size;?>" />
    <input type="hidden" name="img1" value="<?php echo $pathtofile2;?>" />
    <input type="hidden" name="thumbsize" value="<?php echo $_REQUEST['thumbsize'];?>" />
    <input type="hidden" name="imgthumbsizecustom" value="<?php echo $_REQUEST['imgthumbsizecustom'];?>" />
    <?php _e('Alternate name:') ?><br /><input type="text" name="imgalt" size="30" class="uploadform" value="<?php echo $img2_name;?>" /><br />
    <br />
    <?php _e('Description:') ?><br /><input type="text" name="imgdesc" size="30" class="uploadform" value="<?php echo $imgdesc;?>" />
    <br />
    <input type="submit" name="submit" value="<?php _e('Rename') ?>" class="search" />
    </form>
</div>
<?php 
die();
    }
    if (!strlen($imgalt)) {
        @$moved = move_uploaded_file($img1, $pathtofile); //Path to your images directory, chmod the dir to 777
        // move_uploaded_file() can fail if open_basedir in PHP.INI doesn't
        // include your tmp directory. Try copy instead?
        if(!$moved) {
            $moved = copy($img1, $pathtofile);
        }
        // Still couldn't get it. Give up.
        if (!$moved) {
            die(sprintf(__("Couldn't upload your file to %s."), $pathtofile));
        } else {
			chmod($pathtofile, 0666);
            @unlink($img1);
        }
    } else {
        rename($img1, $pathtofile)
        or die(sprintf(__("Couldn't upload your file to %s."), $pathtofile));
    }
    if($_POST['thumbsize'] != 'none' ) {
        if($_POST['thumbsize'] == 'small') {
            $max_side = 200;
        }
        elseif($_POST['thumbsize'] == 'large') {
            $max_side = 400;
        }
        elseif($_POST['thumbsize'] == 'custom') {
            $max_side = intval($_POST['imgthumbsizecustom']);
        }
        
        $result = wp_create_thumbnail($pathtofile, $max_side, NULL);
        if($result != 1) {
            print $result;
        }
    }
if ( ereg('image/',$img1_type) )
	$piece_of_code = "<img src='" . $this->get_settings('fileupload_url') ."/$img1_name' alt='$imgdesc' />";
else
	$piece_of_code = "<a href='". $this->get_settings('fileupload_url') . "/$img1_name' title='$imgdesc'>$imgdesc</a>";
$piece_of_code = htmlspecialchars( $piece_of_code );
?>
<h3><?php _e('File uploaded!') ?></h3>
<p><?php printf(__("Your file <code>%s</code> was uploaded successfully!"), $img1_name); ?></p>
<p><?php _e('Here&#8217;s the code to display it:') ?></p>
<p><code><?php echo $piece_of_code; ?></code>
</p>
<p><strong><?php _e('Image Details') ?></strong>: <br />
<?php _e('Name:'); ?>
<?php echo $img1_name; ?>
<br />
<?php _e('Size:') ?>
<?php echo round($img1_size / 1024, 2); ?> <?php _e('<abbr title="Kilobyte">KB</abbr>') ?><br />
<?php _e('Type:') ?>
<?php echo $img1_type; ?>
</p>
</div>
<p><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo basename(__FILE__); ?>"><?php _e('Upload another') ?></a></p>
<?php
break;
case '':
	foreach ($allowed_types as $type) {
		$type_tags[] = "<code>$type</code>";
	}
	$i = implode(', ', $type_tags);
?>
<p><?php printf(__('You can upload files with the extension %1$s as long as they are no larger than %2$s <abbr title="Kilobytes">KB</abbr>. If you&#8217;re an admin you can configure these values under <a href="%3$s">options</a>.'), $i, $this->get_settings('fileupload_maxk'),$this->get_settings('siteurl') . '/wp-admin/options-general.php?page=' . basename(__FILE__)) ?></p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo basename(__FILE__); ?>"  method="post" enctype="multipart/form-data">
    <p>
      <label for="img1"><?php _e('File:') ?></label>
      <br />
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $this->get_settings('fileupload_maxk') * 1024 ?>" />
    <input type="file" name="img1" id="img1" size="35" class="uploadform" /></p>
    <p>
    <label for="imgdesc"><?php _e('Description:') ?></label><br />
    <input type="text" name="imgdesc" id="imgdesc" size="30" class="uploadform" />
    </p>
    <p><?php _e('Create a thumbnail?') ?></p>
    <p>
    <label for="thumbsize_no">
    <input type="radio" name="thumbsize" value="none" checked="checked" id="thumbsize_no" />
    <?php _e('No thanks') ?></label>
    <br />
        <label for="thumbsize_small">
<input type="radio" name="thumbsize" value="small" id="thumbsize_small" />
<?php _e('Small (200px largest side)') ?></label>
        <br />
        <label for="thumbsize_large">
<input type="radio" name="thumbsize" value="large" id="thumbsize_large" />
<?php _e('Large (400px largest side)') ?></label>
        <br />
        <label for="thumbsize_custom">
        <input type="radio" name="thumbsize" value="custom" id="thumbsize_custom" />
<?php _e('Custom size') ?></label>
      : 
      <input type="text" name="imgthumbsizecustom" size="4" />
    <?php _e('px (largest side)') ?>    </p>
	<p><input type="submit" name="submit" value="<?php _e('Upload File') ?>" /></p>
    </form>
</div><?php 
break;
} //end cases
} //end function upload_page
} //end filosofo_osu class
}
$filosofo_osu_class = new filosofo_osu();
add_action('admin_menu', array(&$filosofo_osu_class,'add_tabs'),1);
?>
