<?php
 /**

  * Add additional custom field to new user creation
  */
 add_action ( 'show_user_profile', 'wp_birthday_extra_profile_fields' );
 add_action ( 'edit_user_profile', 'wp_birthday_extra_profile_fields' );
 add_action ( 'user_new_form', 'wp_birthday_extra_profile_fields' );


 function wp_birthday_extra_profile_fields ( $user )
 {
 ?>
     <table class="form-table">
         <tr>
             <th><label for="headerlabel"><strong>HAPPY BIRTHDAY EXTRA FIELD</strong></label></th>
               </tr>
         <tr>
             <th><label for="dateofbirth">Date Of Birth</label></th>
             <td>
                 <input type="date" name="dateofbirth" id="dateofbirth" value="<?php echo esc_attr( get_the_author_meta( 'dateofbirth', $user->ID ) ); ?>" class="regular-text" /><br />
                 <span class="description"></span>
             </td>
         </tr>
     </table>
 <?php
 }

 add_action ( 'personal_options_update', 'save_wp_birthday_extra_profile_fields' );
 add_action ( 'edit_user_profile_update', 'save_wp_birthday_extra_profile_fields' );
  add_action ( 'user_new_form', 'save_wp_birthday_extra_profile_fields' );

//save them
 function save_wp_birthday_extra_profile_fields( $user_id )
 {
     if ( !current_user_can( 'edit_user', $user_id ) )
         return false;
    update_usermeta( $user_id, 'dateofbirth', $_POST['dateofbirth'] );

}
add_action('user_register', 'save_wp_birthday_extra_profile_fields');    
?>