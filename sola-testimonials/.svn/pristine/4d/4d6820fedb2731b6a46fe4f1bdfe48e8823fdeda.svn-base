<?php
global $current_user;
wp_get_current_user();
?>
<div class="wrap">
    <h2><?php _e("Super Testimonials Feedback","sola-testimonials") ?></h2>

    <h3><?php _e("We'd love to hear your comments and/or suggestions","sola-testimonials"); ?></h3>
    <div class='sola_t_feedback_wrap'>
        <form name="sola_t_feedback" action="" method="POST">
            <?php 
                wp_nonce_field( 'sola_feedback_nonce', 'sola_feedback_nonce' );
            ?>
            <table width='100%'>
                <tr>
                    <td width="250px" >
                        <label><?php _e("Your Name","sola-testimonials"); ?></label>
                    </td>
                    <td>
                        <input type="text" class='sola-input' name="sola_t_feedback_name" value="<?php echo esc_attr($current_user->user_firstname); ?>"/>
                </td>
                </tr>
                <tr>
                    <td width="250px" >
                        <label><?php _e("Your Email","sola-testimonials"); ?></label>
                    </td>
                    <td>
                        <input type="text" class='sola-input' name="sola_t_feedback_email" value="<?php echo esc_attr($current_user->user_email); ?>"/>
                </td>
                </tr>
                <tr>
                    <td width="250px" >
                        <label><?php _e("Your Website","sola-testimonials"); ?></label>
                    </td>
                    <td>
                        <input type="text" class='sola-input' name="sola_t_feedback_website" value="<?php echo esc_url(get_site_url()); ?>"/>
                </td>
                </tr>
                <tr>
                    <td width="250px" valign='top' >
                        <label><?php _e("Feedback","sola-testimonials"); ?></label>
                    </td>
                    <td>
                        <textarea name="sola_t_feedback_feedback" cols='60' rows='10'></textarea>
                </td>
                </tr>
                <tr>
                    <td width="250px" valign='top' >
                    </td>
                    <td>
                        <input type='submit' name='sola_t_send_feedback' class='button-primary' value='<?php _e("Send Feedback","sola-testimonials") ?>' />
                </td>
                </tr>
            </table>
        </form>
    </div>
    
</div>