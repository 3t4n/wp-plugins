<div class="ui container generic-admin-welcome">
    <div class="ui one column grid">
        <div class="column">
            <h3 class="ui header"><?php esc_html_e( 'General Settings', 'generic-elements' ) ?></h3>
        </div>
    </div>
    <div class="ui one column grid">
        <div class="column">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label for="generic_gsap_enable_option"><?php esc_html_e( 'Enable GSAP Wrapper Div', 'generic-elements' ) ?></label></th>
                    <td>
                        <input type="checkbox" <?php echo (get_option('generic_gsap_enable_option') == '1') ? 'checked="checked"': ''; ?> id="generic_gsap_enable_option" name="generic_gsap_enable_option" value="1">
                        <p class="description"><?php esc_html_e( 'If the active theme is integrated with gsap and you need to add wrapper gsap div in header & footer for smooth scroll, you need enable this option.', 'generic-elements' ) ?></p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>