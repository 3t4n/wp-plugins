<div class="wrap">
	
<?php 
    $meta_query_args = array(
    		'meta_query'=>array(
    		array(
    			'key'=>'profilepro_account_status',
    			'value'=>'pending_admin',
    			'compare'=>'='
    		),
    	)	
    );
  //  $meta_query = new WP_Meta_Query( $meta_query_args );
	$pending_users = get_users($meta_query_args);

	if(!empty($pending_users))
	{
	foreach( $pending_users as $pending_user){
		$user_id = $pending_user->ID;
 		if(profilepro_get_option('user_gravatar')=="y")
        $profile_pic = get_avatar( $user_id); 
        	
		if( empty( get_user_meta( $user_id, 'profile_pic', true )) ){

             $default= PROFILEPRO_URL."assets/images/profiledefault.png";
		$profile_pic =  '<img src="'. $default.'"  />';
	}
	else 
     	{
  		$profile_pic = get_user_meta( $user_id, 'profile_pic', true );
                $profile_pic = '<img src="'.$profile_pic.'"  />';

        }	
		?>
		<div class="profilepro_pending_pic">
			
			<img src="<?php echo $profile_pic;?>">
			<div class="profilepro_pending_name">
				<?php echo $pending_user->user_login;?>
			</div>
			<div class="profilepro_pending_email">
				<?php echo $pending_user->user_email;?>
			</div>
			<div class="profilepro_accept_user">
				<input type=button value="Accept" data-id="<?php echo $user_id;?>" />
			</div>
		</div>
		
<?php		
	}}
	else
	{
		_e("No Request found..!!","profilepro");

	}
?>

<br class="clear">
</div>
