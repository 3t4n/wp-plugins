<?php if (!defined("ABSPATH")) die("go away!"); ?>

<div id="leadster">
    <div class="padding">
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
            <input name="leadster_nonce" type="hidden" value="<?php echo wp_create_nonce('leadster-nonce'); ?>" />
            <input name="action" type="hidden" value="leadster_script_code">
            <img
                src="<?php echo esc_url(LEADSTER_DIR_URL . 'assets/images/leadster.gif') ?>"
                alt="Leadster"
                title="Leadster"
            />

            <h1><?php esc_html_e("Conversational Marketing: The Future of Lead Generation", "leadster-marketing-conversacional"); ?></h1>

            <div class="form-area">
                <p>
                    <?php
                    wp_kses(
                        _e("Access the <a href=\"https://app.getleadster.com/implementation\" target=\"_blank\">Implementation Panel</a><br/>Where you will find the unique identifier for your Leadster script", "leadster-marketing-conversacional"),
                        array(
                            'a' => array(
                                'class'  => array(),
                                'href'   => array(),
                                'target' => array(),
                            ),
                        )
                    );
                    ?>
                </p>

                <p><?php esc_html_e("Simply enter the code in the field below and save. Very easy :)", "leadster-marketing-conversacional"); ?></p>

                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label for="leadster-script-code"><?php esc_html_e("Leadster unique identifier", "leadster-marketing-conversacional"); ?></label>
                            </th>
                            <td>
                                <input
                                        type="text"
                                        name="leadster-script-code"
                                        value="<?php echo esc_attr(get_option('leadster-script-code')); ?>"
                                        autocomplete="off"
                                />
                                <p>(<?php esc_html_e("Leave blank to disable", "leadster-marketing-conversacional"); ?>)</p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <?php submit_button(__("Save and activate!", "leadster-marketing-conversacional")); ?>

                <hr/>
                <p class="warning"><strong><?php esc_html_e("Important!", "leadster-marketing-conversacional"); ?></strong></p>
                <p><strong><?php esc_html_e("If your website has a caching mechanism, you need to reset the cache.", "leadster-marketing-conversacional"); ?></strong></p>
                <p><strong><?php esc_html_e("So the chatbot should now work.", "leadster-marketing-conversacional"); ?></strong></p>
                <hr>
                <p><?php esc_html_e("Version:", "leadster-marketing-conversacional"); ?> 1.3.2</p>
            </div>
        </form>
    </div>
</div>


