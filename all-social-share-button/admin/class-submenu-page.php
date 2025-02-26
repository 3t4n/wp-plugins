<?php
/**
 * Creates the Allsocialsharebutton page for the plugin.
 * @package assb_sharebuttonPage
 */
class assb_sharebuttonPage {
    public function assb_rendersharebuttonPage() {
        ?>
        <div class="wrap">
        <h1>All social share button</h1>
        
        <form method="post" action="options.php">
            <?php settings_fields( 'all-social-share-button-group' ); ?>
            <?php do_settings_sections( 'all-social-share-button-group' ); ?>
            <table class="form-table">
                <tr valign="top">
                <th scope="row">Add title</th>
                <td><input type="text" name="social_share_title" value="<?php echo esc_attr( get_option('social_share_title') ); ?>" /></td>
                </tr>
                <tr valign="top">
                <th scope="row">Select sites to share:</th>
                <td>
                &nbsp;
                </td>
                </tr>
            </table>
            <div>
            <?php $options = get_option( 'socialcheckbox' ); ?>
            <input type="checkbox" name="socialcheckbox[digg]" value="1"<?php checked( isset( $options['digg'] ) ); ?> />
            Digg
            <input type="checkbox" name="socialcheckbox[facebook]" value="1"<?php checked( isset( $options['facebook'] ) ); ?> />
            Facebook
            <input type="checkbox" name="socialcheckbox[gmail]" value="1"<?php checked( isset( $options['gmail'] ) ); ?> />
            Gmail
            <input type="checkbox" name="socialcheckbox[gplus]" value="1"<?php checked( isset( $options['gplus'] ) ); ?> />
            Google +
            <input type="checkbox" name="socialcheckbox[linkedin]" value="1"<?php checked( isset( $options['linkedin'] ) ); ?> />
            Linkedin
            <input type="checkbox" name="socialcheckbox[pinterest]" value="1"<?php checked( isset( $options['pinterest'] ) ); ?> />
            Pinterest
            <input type="checkbox" name="socialcheckbox[reddit]" value="1"<?php checked( isset( $options['reddit'] ) ); ?> />
            Reddit
            <input type="checkbox" name="socialcheckbox[tumbler]" value="1"<?php checked( isset( $options['tumbler'] ) ); ?> />
            Tumbler
            <input type="checkbox" name="socialcheckbox[twitter]" value="1"<?php checked( isset( $options['twitter'] ) ); ?> />
            Twitter
            <input type="checkbox" name="socialcheckbox[vk]" value="1"<?php checked( isset( $options['vk'] ) ); ?> />
            VK
            <input type="checkbox" name="socialcheckbox[whatsapp]" value="1"<?php checked( isset( $options['whatsapp'] ) ); ?> />
            Whatsapp
            
            
            </div>
            
            
            <?php submit_button(); ?>
        
        </form>
        </div>
        <?php
        }
}