<?php
class class_settings {
//  Autor: Eberhard Heber
//  Beschreibung: Functionsklasse um die Settings zu verwalten
//                und die Navigation bereit zu stellen
	// Datenbank
	function checkDB(){
		if (get_option('ex_which') == false){
			add_option('ex_which', '2');
		}
		if (get_option('ex_cat') == false){
			add_option('ex_cat', '1');
		}
		if (get_option('ex_vis') == false){
			add_option('ex_vis', '1');
		}
		if (get_option('ex_import') == false){
			add_option('ex_import', '0');
		}
		if (get_option('ex_post_not') == false){
			add_option('ex_post_not', 'email');
		}
		if (get_category('no-email') == false){
      $my_cat = array('cat_name' => 'no-email', 'category_description' => '',
       'category_nicename' => 'no-email', 'category_parent' => '0');
      $my_cat_id = wp_insert_category($my_cat);
    }
	}

	function selectBox(){
		$var = get_option('ex_which');
		$back = "";
		if ($var == 1){
			$back = '<select name="site" class="postform">
	<option class="level-0" value="1" selected="selected">1 - Schritt export</option>
	<option class="level-0" value="2">2 - Schritt export</option>
</select>';

		} else if ($var == 2){
			$back = '<select name="site" class="postform" >
	<option class="level-0" value="1">1 - Schritt export</option>
	<option class="level-0" value="2" selected="selected">2 - Schritt export</option>
</select>';
		}
		echo $back;
	}

	function selectradio(){
		$back = '';
		if (get_option('ex_vis') == 1){
			$back = '<input type="radio" name="visible" value="1" checked="checked"/> ja <input type="radio" name="visible" value="0"/> nein';
		}
		if (get_option('ex_vis') == 0){
			$back = '<input type="radio" name="visible" value="1"/> ja <input type="radio" name="visible" value="0" checked="checked"/> nein';
		}
		echo $back;
	}

	function javascript(){
		echo '<script type="text/javascript">
		<!--
		function checkedall(checked)
		{
			for (var i = 2; i < document.forms[0].elements.length; i++) {
			  document.forms[0].elements[i].checked = checked;
			}
		}
		//-->
	</script>';
	}
	
	function add_postnotification(){
    global $wpdb;
		$t_emails = $wpdb->prefix . 'post_notification_emails';
		$t_cats = $wpdb->prefix . 'post_notification_cats';
		$now = date('Y-m-d H:i:s');
		$no_email_cat = get_cat_ID('no-email');
		
    $lastposts = get_posts('numberposts=-1');
    foreach($lastposts as $post) :
      setup_postdata($post);
      $thePostID = $post->ID;
      $keys = array();
      $custom_field_keys = get_post_custom_keys($thePostID);
        foreach ( $custom_field_keys as $key => $value ) {
          $valuet = trim($value);
            if ( '_' == $valuet{0} )
            continue;
          $keys[] = $value;
        }
        for ($j = 0; $j < count($keys); $j ++){
          if ($keys[$j] == get_option('ex_post_not')){
            $addr = get_post_meta($thePostID, get_option('ex_post_not'), true);
            // check email
            if(!is_email($addr)){
    				  if(!$addr == ''){
    					  echo '<div class="error">' .  __('Email is not valid:', 'post_notification') . " $addr</div>";			
    				  } else if ($addr == ''){
    				  // kontakte ohne emails werden in eine eigene kategorie geordnet
    				    $categories = wp_get_post_categories($thePostID);
    				    $bool = false;
    				    for ($i = 0; $i < count($categories); $i++){
    				      if ($categories[$i] == $no_email_cat){
                    $bool = true;
                  }
                }
                if (!$bool){
                  $post_categories = array();
                  $post_categories[0] = $no_email_cat;
                  wp_set_post_categories( $thePostID, $post_categories );
                }
              }
    				  continue;
    			  }
    			  // doppelt?
    			  $mid = $wpdb->get_var("SELECT id FROM $t_emails WHERE email_addr = '$addr'");
    			  // make entry
      			if (!$mid) {
      				$wpdb->query(
      						"INSERT " . $t_emails .
      						" (email_addr, gets_mail, last_modified, date_subscribed) " .
      						" VALUES ('$addr', '1', '$now', '$now')");
      				echo "<div>" . __('Added Email:', 'post_notification') . " $addr</div>";
      				$mid = $wpdb->get_var("SELECT id FROM $t_emails WHERE email_addr = '$addr'"); 
      			 }
      			if($mid == ''){
      				echo '<div>' . __('Something went wrong with the Email:', 'post_notification') . $addr . '</div>';
      			} else {
      			  $cat = $post->post_category;
      			  if(!$wpdb->get_var("SELECT id FROM $t_cats WHERE id = $mid AND cat_id = $cat")){
						    $wpdb->query("INSERT INTO $t_cats (id, cat_id) VALUES($mid, $cat)");
						  }
						}
          }
        }
    endforeach;
  }
}
?>
