<?php
global $wpdb;
require_once('functions.php');

$func = new Ancfunction();
$func->createTable();




    if($_POST['anc_hidden'] == 'Y') {
		//echo '<pre>';print_r($_POST);echo '</pre>';exit;
        //Form data sent
    } else {
        //Normal page display
    }

    if($_POST['anc_hidden'] == 'Y' && wp_create_nonce('update-form-opendc') == $_POST['opendc_hidden_nonce'] ) {
        //Form data sent
     if (!current_user_can('manage_options'))
		wp_die(__( 'You do not have sufficient permissions to access this page.', 'ACF'));
	  
        $anc_site_logo = $func->filter_post($_POST['anc_site_logo']);
        update_option('anc_site_logo', $anc_site_logo);

        $blogname = $func->filter_post($_POST['blogname']);
        update_option('blogname', $blogname);

        $blogdescription = $func->filter_post($_POST['blogdescription']);
        update_option('blogdescription', $blogdescription);

        $anc_site_meta_title = $func->filter_post($_POST['anc_site_meta_title']);
        update_option('anc_site_meta_title', $anc_site_meta_title);

        $anc_site_meta_description = $func->filter_post($_POST['anc_site_meta_description']);
        update_option('anc_site_meta_description', $anc_site_meta_description);

        $anc_site_meta_keywords = $func->filter_post($_POST['anc_site_meta_keywords']);
        update_option('anc_site_meta_keywords', $anc_site_meta_keywords);

         $anc_cmail1 = $func->filter_post($_POST['anc_cmail1'],'email');
        update_option('anc_cmail1', $anc_cmail1);

        $anc_cmail2 = $func->filter_post($_POST['anc_cmail2'],'email');
        update_option('anc_cmail2', $anc_cmail2);

         $anc_cmail3 = $func->filter_post($_POST['anc_cmail3'],'email');
        update_option('anc_cmail3', $anc_cmail3);

         $anc_cname = $func->filter_post($_POST['anc_cname']);
        update_option('anc_cname', $anc_cname);

        $anc_caddress = $_POST['anc_caddress'];
        update_option('anc_caddress', $anc_caddress);

         $anc_cno = $func->filter_post($_POST['anc_cno']);
        update_option('anc_cno', $anc_cno);

         $anc_hidden_div_social = $func->filter_post($_POST['anc_hidden_div_social']);
        update_option('anc_hidden_div_social', $anc_hidden_div_social);

        $anc_hidden_div_general = $func->filter_post($_POST['anc_hidden_div_general']);
        update_option('anc_hidden_div_general', $anc_hidden_div_general);

        $anc_hidden_div_contact = $func->filter_post($_POST['anc_hidden_div_contact']);
        update_option('anc_hidden_div_contact', $anc_hidden_div_contact);

         $anc_hidden_div_custom = $func->filter_post($_POST['anc_hidden_div_link']);
        update_option('anc_hidden_div_link', $anc_hidden_div_custom);


$func->deleteAll('general');
	for($i=0;$i<count($_POST['general']['label']);$i++) {
		if($_POST['general']['label'][$i] != "") {
		$general_array = array(
							'fields_name' => $func->filter_post($_POST['general']['label'][$i]),
							'fields_value' => $func->filter_post($_POST['general']['value'][$i]),
							'fields_key' => $func->escapeData($_POST['general']['label'][$i]),
							'fields_type' => 'general',

		);
		$func->insert($general_array);

		}
	}
$func->deleteAll('social');	
	for($i=0;$i<count($_POST['social']['label']);$i++) {
		if($_POST['social']['label'][$i] != "") {
		$social_array = array(
							'fields_name' => $func->filter_post($_POST['social']['label'][$i]),
							'fields_value' => $func->filter_post($_POST['social']['value'][$i]),
							'fields_key' => $func->escapeData($_POST['social']['label'][$i]),
							'fields_type' => 'social',

		);
		$func->insert($social_array);

		}
	}
$func->deleteAll('custom');	
//print_r($_POST['custom']); exit;
	for($i=0;$i<count($_POST['custom']['label']);$i++) {
		if($_POST['custom']['label'][$i] != "") {

		$custom_array = array(
							'fields_name' => $func->filter_post($_POST['custom']['label'][$i]),
							'fields_value' => $func->filter_post($_POST['custom']['value'][$i]),
							'fields_key' => $func->escapeData($_POST['custom']['label'][$i]),
							'fields_type' => 'custom',

		);
		$func->insert($custom_array);

		}
	}

		  
        ?>
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
        <?php
    } else {
        //Normal page display
       // echo 'error';
    }
?>

<?php

$data_custom = $func->getdata('custom');
$data_general = $func->getdata('general');
$data_social = $func->getdata('social');


	
        $anc_email = get_option('anc_email');
        $anc_site_logo = get_option('anc_site_logo');
        $blogname = get_option('blogname');
        $blogdescription = get_option('blogdescription');
        $anc_site_meta_title = get_option('anc_site_meta_title');
        $anc_site_meta_description = get_option('anc_site_meta_description');
        $anc_site_meta_keywords = get_option('anc_site_meta_keywords');
        $anc_site_logo = get_option('anc_site_logo');
        $anc_cmail1 = get_option('anc_cmail1');
        $anc_cmail2 = get_option('anc_cmail2');
        $anc_cmail3 = get_option('anc_cmail3');
        $anc_caddress = get_option('anc_caddress');
        $anc_cno = get_option('anc_cno');

		$anc_hidden_div_social = (get_option('anc_hidden_div_social') == 1) ? 1:0;
		$anc_hidden_div_general = (get_option('anc_hidden_div_general') == 1) ? 1:0;
		$anc_hidden_div_contact = (get_option('anc_hidden_div_contact') == 1) ? 1:0;
		$anc_hidden_div_custom = (get_option('anc_hidden_div_link') == 1) ? 1:0;

        ?>

<div class="wrap">
    <?php    echo "<h2>" . __( 'Custom Field Display Options', 'anc_trdom' ) . "</h2>"; ?>
 <hr>
  <?php if(isset($_SESSION['opendc_error_msg']['string']) && $_SESSION['opendc_error_msg']['string'] != "") {?>
<div class="error"><p><strong><?php echo $_SESSION['opendc_error_msg']['string'];?></strong></p></div>
	 <?php } ?>
	  <?php if(isset($_SESSION['opendc_error_msg']['email']) && $_SESSION['opendc_error_msg']['email'] != "") {?>
<div class="error"><p><strong><?php echo $_SESSION['opendc_error_msg']['email'];?></strong></p></div>
	 <?php } ?>
	 <?php unset($_SESSION['opendc_error_msg']);?>
    <form name="anc_any_custom_fields_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
     <input type="hidden" name="anc_hidden" value="Y">
     <input type="hidden" id="anc_hidden_div_social" name="anc_hidden_div_social" value="<?php echo $anc_hidden_div_social;?>">
     <input type="hidden" id="anc_hidden_div_general" name="anc_hidden_div_general" value="<?php echo $anc_hidden_div_general;?>">
     <input type="hidden" id="anc_hidden_div_contact" name="anc_hidden_div_contact" value="<?php echo $anc_hidden_div_contact;?>">
     <input type="hidden" id="anc_hidden_div_link" name="anc_hidden_div_link" value="<?php echo $anc_hidden_div_custom;?>">
       <input type="hidden" id="opendc_hidden_nonce" name="opendc_hidden_nonce" value="<?php echo wp_create_nonce('update-form-opendc' );?>">
   

     <?php    echo "<h4 class='heading'>" . __( 'General options', 'anc_trdom' ) . "</h4> "; ?> <a href='javascript:void(0);' class="show_hide" rel="div_general"><?php echo ($anc_hidden_div_general == 0) ? 'Show' : 'Hide';?></a>

<div id="div_general" class="clearfix" <?php echo ($anc_hidden_div_general == 0) ? 'style="display:none;"' : '';?>>
    <table id="table_general" class="clearfix">
		<tr> </tr>
		<tr>


        <td><label class="first_label"><?php _e("Site title: " ); ?></label></td><td><input type="text" name="blogname" value="<?php echo $blogname; ?>" size="35"><?php _e(" ex: Hello world" ); ?>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_site_title')" >view</a> &nbsp;<code class="code_text" id="code_site_title"><?php echo " get_option('blogname')";?></code></td>
        </tr><tr>
	    <td><label class="first_label"><?php _e("Site Description: " ); ?></label></td><td><input type="text" name="blogdescription" value="<?php echo $blogdescription; ?>" size="35"><?php _e(" ex: hello world" ); ?>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_site_description')" >view</a> &nbsp;<code class="code_text" id="code_site_description"><?php echo " get_option('blogdescription')";?></code></td>
	     </tr><tr>
        <td><label class="first_label"><?php _e("Meta Title: " ); ?></label></td><td><input type="text" name="anc_site_meta_title" value="<?php echo $anc_site_meta_title; ?>" size="35"><?php _e(" ex: hello world" ); ?>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_site_meta_title')" >view</a> &nbsp;<code class="code_text" id="code_site_meta_title"><?php echo " get_option('anc_site_meta_title')";?></code></td>
         </tr><tr>
        <td><label class="first_label"><?php _e("Meta Description: " ); ?></label></td><td><input type="text" name="anc_site_meta_description" value="<?php echo $anc_site_meta_description; ?>" size="35"><?php _e(" ex: sky is blue." ); ?>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_site_meta_description')" >view</a> &nbsp;<code class="code_text" id="code_site_meta_description"><?php echo " get_option('anc_site_meta_description')";?></code></td>
         </tr><tr>


        <td><label class="first_label"><?php _e("Meta Keywords: " ); ?></label></td><td><input type="text" name="anc_site_meta_keywords" value="<?php echo $anc_site_meta_keywords; ?>" size="35"><?php _e(" ex: sky,blue,world" ); ?>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_site_meta_keywords')" >view</a> &nbsp;<code class="code_text" id="code_site_meta_keywords"><?php echo " get_option('anc_site_meta_keywords')";?></code></td>
         </tr><tr>
        <td><label class="first_label"><?php _e("Site logo url: " ); ?></label></td><td><input type="text" name="anc_site_logo" value="<?php echo $anc_site_logo; ?>" size="35"><?php _e(" ex: http://www.yourstore.com/images/" ); ?>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_site_logo')" >view</a> &nbsp;<code class="code_text" id="code_site_logo"><?php echo " get_option('anc_site_logo')";?></code></td>
         </tr>

            <?php $i =0; foreach($data_general as $general) {
       
			 if($general->fields_value != "" && $general->fields_key != "") {?>
			 <tr>
        <td><label class="first_label"><?php (trim($general->fields_name) != "") ? _e($general->fields_name.":") :_e("Custom ".$i.": " ); ?></label></td><td><input type="text" id="anc_general_custom_<?php echo $i;?>" name="general[value][]"  data-id="<?php echo $i;?>" class="new_one_general" value="<?php echo $general->fields_value; ?>" size="35"><input type="hidden" id="anc_general_custom_label<?php echo $i;?>" name="general[label][]"  data-id="<?php echo $i;?>" class="" value="<?php echo $general->fields_name; ?>" size="35">&nbsp;<?php _e(" ex: Custom link,text etc." ); ?>&nbsp;<button type="button" class="notice-dismiss delete_notice delete_row"><span class="screen-reader-text">Dismiss this notice.</span></button>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_general_social_<?php echo $i;?>')" >view</a> &nbsp;<code class="code_text" id="code_general_social_<?php echo $i;?>"><?php echo " echo anc_fields('".$general->fields_key."')";?></td>
         </tr>
			 <?php $i++; }
			 } ?>
        </table>

        <a href="javascript:void(0);" id="add_general_link">Add New</a>
</div>
<hr class="clearfix" />



     <?php    echo "<h4 class='heading'>" . __( 'Social Links Options', 'anc_trdom' ) . "</h4> ";?><a href='javascript:void(0);' class="show_hide" rel="div_social"><?php echo ($anc_hidden_div_social == 0) ? 'Show' : 'Hide';?></a>
<div id="div_social" class="clearfix" <?php echo ($anc_hidden_div_social == 0) ? 'style="display:none;"' : '';?>>
    <table id="table_social" class="clearfix">
		<tr> </tr>
         <?php $i =0; foreach($data_social as $social) {
       
			 if($social->fields_value != "" && $social->fields_key != "") {?>
			 <tr>
        <td><label class="first_label"><?php (trim($social->fields_name) != "") ? _e($social->fields_name.":") :_e("Custom ".$i.": " ); ?></label></td><td><input type="text" id="anc_social_custom_<?php echo $i;?>" name="social[value][]"  data-id="<?php echo $i;?>" class="new_one_social" value="<?php echo $social->fields_value; ?>" size="35"><input type="hidden" id="anc_social_custom_label<?php echo $i;?>" name="social[label][]"  data-id="<?php echo $i;?>" class="" value="<?php echo $social->fields_name; ?>" size="35">&nbsp;<?php _e(" ex: Custom link,text etc." ); ?>&nbsp;<button type="button" class="notice-dismiss delete_notice delete_row"><span class="screen-reader-text">Dismiss this notice.</span></button>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_custom_social_<?php echo $i;?>')" >view</a> &nbsp;<code class="code_text" id="code_custom_social_<?php echo $i;?>"><?php echo " echo anc_fields('".$social->fields_key."')";?></code</td>
         </tr>
			 <?php $i++; }
			 } ?>
        </table>
         <a href="javascript:void(0);" id="add_social_link">Add New</a>
</div>
   <hr  class="clearfix" />
 <?php    echo "<h4 class='heading'>" . __( 'Contact Information Options', 'anc_trdom' ) . "</h4>"; ?> <a href='javascript:void(0);' class="show_hide" rel="div_contact"><?php echo ($anc_hidden_div_contact == 0) ? 'Show' : 'Hide';?></a>
 <div id="div_contact" class="clearfix" <?php echo ($anc_hidden_div_contact == 0) ? 'style="display:none;"' : '';?>>
    <table id="table_contact" class="clearfix">
		<tr>


        <td><label class="first_label"><?php _e("Contact mail 1: " ); ?></label></td><td><input type="text" name="anc_cmail1" value="<?php echo $anc_cmail1; ?>" size="35"><?php _e(" ex: mail@domainname.com" ); ?>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_cmail1')" >view</a> &nbsp;<code class="code_text" id="code_cmail1"><?php echo " get_option('anc_cmail1')";?></code></td>
        </tr><tr>
	    <td><label class="first_label"><?php _e("Contact mail 2: " ); ?></label></td><td><input type="text" name="anc_cmail2" value="<?php echo $anc_cmail2; ?>" size="35"><?php _e(" ex: mail@domainname.com" ); ?>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_cmail2')" >view</a> &nbsp;<code class="code_text" id="code_cmail2"><?php echo " get_option('anc_cmail2')";?></code></td>
	     </tr><tr>
        <td><label class="first_label"><?php _e("Contact mail 3: " ); ?></label></td><td><input type="text" name="anc_cmail3" value="<?php echo $anc_cmail3; ?>" size="35"><?php _e(" ex: mail@domainname.com" ); ?>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_cmail3')" >view</a> &nbsp;<code class="code_text" id="code_cmail3"><?php echo " get_option('anc_cmail3')";?></code></td>
         </tr><tr>
        <td><label class="first_label"><?php _e("Contact name: " ); ?></label></td><td><input type="text" name="anc_cname" value="<?php echo $anc_cname; ?>" size="35"><?php _e(" ex: steve oxfford" ); ?>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_cname')" >view</a> &nbsp;<code class="code_text" id="code_cname"><?php echo " get_option('anc_cname')";?></code></td>
         </tr><tr>


        <td><label class="first_label"><?php _e("Contact Address: " ); ?></label></td><td><textarea  name="anc_caddress" rows="5" size="520" cols="37"><?php echo $anc_caddress; ?></textarea><?php _e(" ex: http://www.yourstore.com/" ); ?>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_caddress')" >view</a> &nbsp;<code class="code_text" id="code_caddress"><?php echo " get_option('anc_caddress')";?></code></td>
         </tr><tr>
        <td><label class="first_label"><?php _e("Contact No: " ); ?></label></td><td><input type="text" name="anc_cno" value="<?php echo $anc_cno; ?>" size="35"><?php _e(" ex: 0123456789" ); ?>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_cno')" >view</a> &nbsp;<code class="code_text" id="code_cno"><?php echo " get_option('anc_cno')";?></code></td>
         </tr>
        </table>
</div>
   <hr  class="clearfix"/>
<?php    echo "<h4 class='heading'>" . __( 'Extra Custom fields', 'anc_trdom' ) . "</h4> "; ?>

<a href='javascript:void(0);' class="show_hide" rel="div_link"><?php echo ($anc_hidden_div_custom == 0) ? 'Show' : 'Hide';?></a>

<div id="div_link" class="clearfix" <?php echo ($anc_hidden_div_custom == 0) ? 'style="display:none;"' : '';?>>

        <table id="table_link" class="clearfix">
		<tr> </tr>

         <?php
//print($data_custom);
$i =0;
foreach($data_custom as $custom) {
       
			 if($custom->fields_value != "" && $custom->fields_key != "") {?>
			 <tr>
        <td><label class="first_label"><?php (trim($custom->fields_name) != "") ? _e($custom->fields_name.":") :_e("Custom ".$i.": " ); ?></label></td><td><input type="text" id="anc_link_custom_<?php echo $i;?>" name="custom[value][]"  data-id="<?php echo $i;?>" class="new_link_social" value="<?php echo $custom->fields_value; ?>" size="35"><input type="hidden" id="anc_link_custom_label<?php echo $i;?>" name="custom[label][]"  data-id="<?php echo $i;?>" class="" value="<?php echo $custom->fields_name; ?>" size="35"><?php _e(" ex: Custom link,text etc." ); ?>&nbsp;<button type="button" class="notice-dismiss delete_notice delete_row"><span class="screen-reader-text">Dismiss this notice.</span></button>&nbsp;<a href="javascript:void(0);" onclick="javascript:showcode('code_custom_link_<?php echo $i;?>')" >view</a>  &nbsp;<code class="code_text" id="code_custom_link_<?php echo $i;?>"><?php echo " echo anc_fields('".$custom->fields_key."')";?></code></td>
         </tr>
			 <?php $i++; }
			 } ?>
        </table>
         <a href="javascript:void(0);" id="add_link_link">Add New</a>

</div>

        <p class="submit clearfix">
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'anc_trdom' ) ?>" class="button button-primary" />
        </p>
    </form>
</div>



