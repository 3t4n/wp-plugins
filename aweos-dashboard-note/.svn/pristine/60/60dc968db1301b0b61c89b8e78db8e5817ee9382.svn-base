<?php

if(!defined("ABSPATH")) exit;

?>
<div>
    <h2>AWEOS Developer Notes</h2>
    <form method="post" action="options.php?nonce=<?php echo wp_create_nonce('wp_dashboard_nonce') ?>" >

        <?php settings_fields( 'aw_dash_notice_dev_options_group' ); ?>

        <table class="form-table">
            <tr valign="top">
                <th scope="row">
                    <p><label for="aw_dash_notice_dev_title">From:</label></p>
                </th>
                <td>
                    <input 
                        type="text" 
                        id="aw_dash_notice_dev_title" 
                        name="aw_dash_notice_dev_title" 
                        value="<?php echo get_option('aw_dash_notice_dev_title'); ?>" />
                    <p class="description">This will be the title of your note.</p>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <p>What do you want to say?</p>
                </th>
                <td>
                <?php
                $my_content = stripslashes(get_option('aw_dash_notice_wysiwyg_feld')); // this var may contains previous data that is stored in mysql.
                wp_editor($my_content,"aw_dash_notice_wysiwyg_feld", array('textarea_rows'=>12, 'editor_class'=>'mytext_class'));
                ?>
                <p class="description">
                    Write everything you want to stick to the dashboard, your team will see the important information you put in here.
                </p>
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
