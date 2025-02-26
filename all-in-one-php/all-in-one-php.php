<?php
/*
  Plugin Name: All In One Php
  Plugin URI: http://www.odrasoft.com
  Description: Executes PHP code on WordPress page ,page and on default Text Widget
  Version: 1.0
  Author: swadeshswain , aiswaryaswain
  Author URI: http://www.odrasoft.com
 */
?>
<?php
function wp_all_in_one_php($content) {
    if (strpos($content, '<' . '?') !== false) {
        ob_start();
        eval('?' . '>' . $content);
        $content = ob_get_clean();
    }
    return $content;
}
if (is_admin()) {
   
add_action('admin_menu', 'php_admin_menu');

function php_admin_menu() {
    add_options_page('All In One Php', 'All In One Php', 'manage_options',  basename(__FILE__), 'php_config_page');
}
function php_config_page() {
?>
<div class="wrap">
			<h3>All In One Php Option</h3>
            
            <?php

	
    if ( isset($_POST['submit']) ) { 
        $nonce = $_REQUEST['_wpnonce'];
        if (! wp_verify_nonce($nonce, 'php-updatesettings' ) ) {
            die('security error');
        }
        $phptitle = $_POST['phptitle'];
        $phpcontent = $_POST['phpcontent'];
        $phpwidget = $_POST['phpwidget'];
   
        update_option( 'od_phptitle', $phptitle );
        update_option( 'od_phpcontent', $phpcontent );
        update_option( 'od_phpwidget', $phpwidget );
    } 
    $od_phptitle = get_option( 'od_phptitle' );
    $od_phpcontent = get_option( 'od_phpcontent' );
    $od_phpwidget = get_option( 'od_phpwidget' );

	?>
 
    
			<form method="post" action="" id="php_config_page">
				<?php wp_nonce_field('php-updatesettings'); ?>
              
                 
				<table class="form-table">
					<tbody>
						
                    <tr>
						<th><label>Add Php Code In Title section (Page ,Post or Any post type)</label></th>
					
						<td>
                                         <Input type = 'Radio' Name ='phptitle' value= 'yes'
 <?php if ($od_phptitle == 'yes') echo 'checked="checked"'; ?>>
Yes

<Input type = 'Radio' Name ='phptitle' value= 'no'
 <?php if ($od_phptitle == 'no') echo 'checked="checked"'; ?>>
No
                        </td>
                      
                    </tr>
                    
                     <tr>
						<th><label>Add Php Code In Content section (Page ,Post or Any post type)</label></th>
					
						<td>
                                         <Input type = 'Radio' Name ='phpcontent' value= 'yes'
 <?php if ($od_phpcontent == 'yes') echo 'checked="checked"'; ?>>
Yes

<Input type = 'Radio' Name ='phpcontent' value= 'no'
 <?php if ($od_phpcontent == 'no') echo 'checked="checked"'; ?>>
No
                        </td>
                      
                    </tr>
                    
   <tr>
						<th><label>Add Php Code In Text Widget section(Default Text Widget)</label></th>
					
						<td>
                                         <Input type = 'Radio' Name ='phpwidget' value= 'yes'
 <?php if ($od_phpwidget == 'yes') echo 'checked="checked"'; ?>>
Yes

<Input type = 'Radio' Name ='phpwidget' value= 'no'
 <?php if ($od_phpwidget == 'no') echo 'checked="checked"'; ?>>
No
                        </td>
                      
                    </tr>
                                       
                    
                     
                    
                   
					</tbody>
				</table>
				<p class="submit"><input type="submit" value="Save Changes" class="button-primary" id="submit" name="submit" /></p>  
			</form>
		</div>
<?php
} // get_option('od_phpcontent');
}
?>
<?php if ( get_option('od_phpwidget') == 'yes') {?>
<?php  add_filter('widget_text', 'wp_all_in_one_php', 99); ?>
<?php } ?> 
<?php if (get_option('od_phpcontent') == 'yes') {?>
<?php add_filter('the_content', 'wp_all_in_one_php', 9); ?>
<?php } ?>
 <?php if (get_option('od_phptitle') == 'yes') {?>
<?php add_filter('the_title', 'wp_all_in_one_php', 29);?>
<?php } ?>