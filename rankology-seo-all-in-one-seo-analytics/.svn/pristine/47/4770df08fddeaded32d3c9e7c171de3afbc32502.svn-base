<div class="wrap rkns-wrap">
    <div class="postbox">
        <form action="<?php echo admin_url('admin.php?page=rkns_optimization_page&tab=updates') ?>" method="post">
            <?php wp_nonce_field('rkns_optimization_nonce'); ?>
            <table class="form-table">
                <tbody>
                <?php if (\RANKOLOGY_STATS\GeoIP::active()) { ?>
                    <tr valign="top">
                        <th scope="row" colspan="2"><h3><?php esc_html_e('GeoIP Options', 'rankology-stats'); ?></h3></th>
                    </tr>

                    <tr valign="top">
                        <th scope="row">
                            <label for="populate-submit"><?php esc_html_e('Countries:', 'rankology-stats'); ?></label>
                        </th>

                        <td>
                            <input type="hidden" name="submit" value="1"/>
                            <button id="populate-submit" class="button button-primary" type="submit" value="1" name="populate-submit"><?php esc_html_e('Update Now!', 'rankology-stats'); ?></button>
                            <p class="description"><?php esc_html_e('Updates any unknown location data in the database, this may take a while', 'rankology-stats'); ?></p>
                        </td>
                    </tr>
                <?php } ?>

                <tr valign="top">
                    <th scope="row" colspan="2"><h3><?php esc_html_e('IP Addresses', 'rankology-stats'); ?></h3></th>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <label for="populate-submit"><?php esc_html_e('Hash IP Addresses:', 'rankology-stats'); ?></label>
                    </th>

                    <td>
                        <input type="hidden" name="submit" value="1"/>
                        <button id="hash-ips-submit" class="button button-primary" type="submit" value="1" name="hash-ips-submit" onclick="return confirm('<?php esc_html_e('This will replace all IP addresses in the database with hash values and cannot be undo, are you sure?', 'rankology-stats'); ?>')"><?php esc_html_e('Update Now!', 'rankology-stats'); ?></button>
                        <p class="description"><?php esc_html_e('Replace IP addresses in the database with hash values, you will not be able to recover the IP addresses in the future to populate location information afterwards and this may take a while', 'rankology-stats'); ?></p>
                    </td>
                </tr>

                </tbody>
            </table>
        </form>
    </div>
</div>
