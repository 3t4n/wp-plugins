<?php
add_action('init','bpsfw_init',8);
function bpsfw_init(){
	global $bpsfw_comman;
	if($bpsfw_comman['bpsfw_approve_registration'] == 'yes'){
		    add_action( 'show_user_profile','custom_user_profile_fields');
		    add_action( 'edit_user_profile','custom_user_profile_fields');
		    add_action( 'user_new_form','custom_user_profile_fields');
		    add_action( 'edit_user_profile_update','save_custom_user_profile_fields');
		    add_action( 'personal_options_update','save_custom_user_profile_fields');
			add_action( 'user_register','mktbn_user_register', 10, 1 );
	}
}

function custom_user_profile_fields($user){?>
	<table class="form-table">
    	<tr>
        	<th><label>Approval confirmation</label></th>
        	<td>
            	<select name="approval_confirmation">
              		<option value="confirm_approve"<?php if(isset($user->ID) && get_user_meta($user->ID,'approval_confirmation',true) == 'confirm_approve'){echo "selected";}?>>
              		Approve Confirm
              		</option>
              		<option value="denied_user"<?php if(isset($user->ID) && get_user_meta($user->ID,'approval_confirmation',true) == 'denied_user'){echo "selected";}?>>
              			Denied Users
              			</option>
              		<option value="not_confirm_approve"<?php if(isset($user->ID) && get_user_meta($user->ID,'approval_confirmation',true) == 'not_confirm_approve'){echo "selected";}?>>
              		User Pending
              	</option>
            	</select>
        	</td>
    	</tr>
	</table>
	<?php
	
}
function mktbn_user_register( $user_id )
{
	
        update_user_meta($user_id, 'approval_confirmation', 'not_confirm_approve');
   

}

function save_custom_user_profile_fields($user_id){
    
    if(!current_user_can('manage_options')){
      	return false;
    }

    update_user_meta( $user_id, 'approval_confirmation', sanitize_text_field($_POST['approval_confirmation']) );

    if ( isset( $_POST['approval_confirmation'] ))
    {
        update_user_meta($user_id, 'approval_confirmation', sanitize_text_field($_POST['approval_confirmation']));
    }
} 