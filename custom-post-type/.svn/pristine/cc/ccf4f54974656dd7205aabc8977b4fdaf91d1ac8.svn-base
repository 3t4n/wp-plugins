<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
if(current_user_can('manage_options')):

$ripath = plugins_url( '', __FILE__);
$err = '';
?>
<script type="text/javascript">
	function remove_space(el){
		var val = el.value;
		el.value = val.replace(/\s+/g, '-').toLowerCase();;
	}
</script>
<div class="wrap ripladmin">
<form action="" method="post">
	<input type="hidden" name="_cuptfanonce" value="<?php echo wp_create_nonce( 'cuptfn-nonce' ); ?>" />
  <p><b>Plural Name : </b> <input type="text" name="lab" /></p>
  <p class="sc">
  	<b>Singilar Name : </b> <input type="text" name="ph" />
  </p>
  <p class="mc" id="mc">
  	<b>Slug : </b> <input type="text" name="ftype" placeholder="" onblur="remove_space(this)" />
  </p>
  <p><input type="submit" value="Create Post Type" /></p>
</form>
<?php
//postList type='post' cat='23' tag='24' ordby='date' ord='asc' count='10' offset='0' temp='t1' hide='date,author' exrpt='50';

if(isset($_REQUEST['cuptslug']) && $_REQUEST['cuptslug']!=''){
	if(get_option( 'cuptf_custom_post_opt' )){
		$cuptf_custom_posts_disp = unserialize(get_option( 'cuptf_custom_post_opt' ));
		foreach($cuptf_custom_posts_disp as $cuptf_custom_post_disp){
			foreach($cuptf_custom_post_disp as $slug=>$field){
				if($field['type']!=$_REQUEST['cuptslug']){ 
					$newfiels = array();
					$newfiels[] = array('label'=>$field['label'],
										 'type'=>$field['type'],
										 'ph'=>$field['ph']
										 );
				}
			}
		}
		
		$cuptf_custom_post = array(); //unserialize(get_option( 'cuptf_custom_post_opt' ));
		$cuptf_custom_post[] = $newfiels;
		update_option( 'cuptf_custom_post_opt', serialize($cuptf_custom_post) );
	}
}

if(isset($_POST['_cuptfanonce']) && wp_verify_nonce( $_POST['_cuptfanonce'], 'cuptfn-nonce' )){
	$f = 0;
	if(get_option( 'cuptf_custom_post_opt' )){
		$cuptf_custom_posts_disp = unserialize(get_option( 'cuptf_custom_post_opt' ));
		foreach($cuptf_custom_posts_disp as $cuptf_custom_post_disp){
			if($cuptf_custom_post_disp)
			foreach($cuptf_custom_post_disp as $slug=>$field){
				if($field['type']==$_POST['ftype']){ $f=1; $err = 'Please use a different slug'; break; }
			}
		}
	}
	if(isset($_POST['ftype']) && $f==0){ $h = '';
		
		if( strlen($_POST['ftype']) < 30 ){ $ftype =  sanitize_text_field($_POST['ftype']); }
		if( strlen($_POST['lab']) < 30 ){ $lab =  sanitize_text_field($_POST['lab']); }
		if( strlen($_POST['ph']) < 30 ){ $ph =  sanitize_text_field($_POST['ph']); }
		
		$newfiels = array();
		$newfiels[] = array('label'=>$lab,
								 'type'=>$ftype,
								 'ph'=>$ph
								 );
		$cuptf_custom_post = unserialize(get_option( 'cuptf_custom_post_opt' ));
		$cuptf_custom_post[] = $newfiels;
		
		update_option( 'cuptf_custom_post_opt', serialize($cuptf_custom_post) );
	}
}
echo '<p class="error">'.$err.'</p>';
if(get_option( 'cuptf_custom_post_opt' )){
	$cuptf_custom_posts_disp = unserialize(get_option( 'cuptf_custom_post_opt' ));
}
else{ if(add_option( 'cuptf_custom_post_opt' )){  } }

if($cuptf_custom_posts_disp && sizeof($cuptf_custom_posts_disp)>0){
	/*echo '<pre>';
	print_r($cuptf_custom_posts_disp);*/
	
	echo '<table class="wp-list-table widefat fixed striped pages">';
	echo '<thead><tr> <td>Plural Name</td> <td>Singular Name</td> <td>Slug</td> <td>Delete</td>  </tr></thead><tbody>';
	foreach($cuptf_custom_posts_disp as $cuptf_custom_post_disp){
		if($cuptf_custom_post_disp)
		foreach($cuptf_custom_post_disp as $slug=>$field){
			echo '<tr>
			<td>'.$field['label'].'</td>
			<td>'.$field['ph'].'</td>
			<td>'.$field['type']; 
			echo '</td><td><a href="admin.php?page=custom-post-type%2Fmain.php&cuptslug='.$field['type'].'">Delete</a></td>
			</tr>';
		}
	}
	echo '</tbody></table>';
}


endif;
?>
</div>