<hr>
<h3><?php _e( 'Agent Details', 'wcp-rem' ); ?></h3>

<table class="form-table">
    <tr>
        <th><label for="rem_agent_meta_image"><?php _e( 'Picture of Agent', 'wcp-rem' ); ?></label></th>
        <td>
            <span class="agent_img_ph">
                <?php if (get_the_author_meta( 'rem_agent_meta_image', $user->ID ) != '') { ?>
                    <img style="max-width: 150px;" src="<?php echo esc_url_raw( get_the_author_meta( 'rem_agent_meta_image', $user->ID ) ); ?>">
                <?php } ?>
            </span>
            <br>
            <input type="text" name="rem_agent_meta_image" id="rem_agent_meta_image" value="<?php echo esc_url_raw( get_the_author_meta( 'rem_agent_meta_image', $user->ID ) ); ?>" class="regular-text" />
            <input type='button' class="upload_image_agent button-primary" value="<?php _e( 'Upload Image', 'wcp-rem' ); ?>"/><br />
            <span class="description"><?php _e( 'Upload an additional image for your profile.', 'wcp-rem' ); ?></span>
        </td>
    </tr>        
    <tr>
        <th><label for="rem_facebook_url"><?php _e( 'Facebook Profile', 'wcp-rem' ); ?></label></th>
        <td><input type="text" name="rem_facebook_url" value="<?php echo esc_attr(get_the_author_meta( 'rem_facebook_url', $user->ID )); ?>" class="regular-text" /></td>
    </tr>

    <tr>
        <th><label for="rem_twitter_url"><?php _e( 'Twitter Profile', 'wcp-rem' ); ?></label></th>
        <td><input type="text" name="rem_twitter_url" value="<?php echo esc_attr(get_the_author_meta( 'rem_twitter_url', $user->ID )); ?>" class="regular-text" /></td>
    </tr>

    <tr>
        <th><label for="rem_googleplus_url"><?php _e( 'Google+ Profile', 'wcp-rem' ); ?></label></th>
        <td><input type="text" name="rem_googleplus_url" value="<?php echo esc_attr(get_the_author_meta( 'rem_googleplus_url', $user->ID )); ?>" class="regular-text" /></td>
    </tr>

    <tr>
        <th><label for="rem_linkedin_url"><?php _e( 'LinkedIn Profile', 'wcp-rem' ); ?></label></th>
        <td><input type="text" name="rem_linkedin_url" value="<?php echo esc_attr(get_the_author_meta( 'rem_linkedin_url', $user->ID )); ?>" class="regular-text" /></td>
    </tr>

    <tr>
        <th><label for="rem_user_tagline"><?php _e( 'User Tagline', 'wcp-rem' ); ?></label></th>
        <td>
            <input type="text" name="rem_user_tagline" value="<?php echo esc_attr(get_the_author_meta( 'rem_user_tagline', $user->ID )); ?>" class="regular-text" />
            <p class="description"><?php _e( 'Will display under username', 'wcp-rem' ); ?></p>
        </td>
    </tr>

    <tr>
        <th><label for="rem_user_skills"><?php _e( 'Skills Level', 'wcp-rem' ); ?></label></th>
        <td>
        <textarea name="rem_user_skills" id="rem_user_skills" cols="30" rows="5"><?php echo esc_attr(get_the_author_meta( 'rem_user_skills', $user->ID )); ?></textarea>
        <p class="description"><?php _e( 'Skill name with percentage value on each line, eg: Speaking, 85', 'wcp-rem' ); ?></p>
        </td>
    </tr>

    <tr>
        <th><label for="rem_user_contact_sc"><?php _e( 'Contact Form Shortcode', 'wcp-rem' ); ?></label></th>
        <td>
            <input type="text" name="rem_user_contact_sc" value="<?php echo esc_attr(get_the_author_meta( 'rem_user_contact_sc', $user->ID )); ?>" class="regular-text" />
            <p class="description"><?php _e( 'Leave blank for default contact form', 'wcp-rem' ); ?></p>
        </td>
    </tr>
</table>
<hr>