<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$paybox = new Paybox();
?>
<div id="paybox-state">
    <div class="col-lg-6">
        <p>
            <em>Visualisation de l'état de votre installation Paybox.</em></p>
        <table class="wp-list-table widefat plugins">
            <thead>
                <tr>
                    <th scope="col" class="manage-column column-name column-primary">Plateforme E-Commerce</th>
                    <th scope="col" class="manage-column column-name column-primary">Extension Correspondante</th>
                    <th scope="col" class="manage-column column-name column-primary">Installer</th>
                    <th scope="col" class="manage-column column-name column-primary">Activer</th>
                    <th scope="col" class="manage-column column-name column-primary">Version</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paybox->plugins as $plugin) { ?>
                    <?php
                    $pathToPlugin = ABSPATH . 'wp-content/plugins/' . $plugin['file_path'];
                    $install = false;
                    $active = false;
                    $version = '-';
                    if(is_plugin_inactive($plugin['file_path'])){
                        $install = true;
                    }
                    if (is_plugin_active($plugin['file_path'])) {
                        $active = true;
                        $install = true;
                        $data = get_plugin_data(ABSPATH . 'wp-content/plugins/' . $plugin['file_path']);
                        $version = $data['Version'];
                        $ReposVersions = Paybox_Plugin_Installer::get_svn_versions_data(Paybox_Plugin_Installer::get_svn_tags($plugin['wordpress_org_name']), $version);
                    }
                    ?>
                    <tr class="grisclair">
                        <td class="plugin-title column-primary"><strong><?php echo $plugin['depend']; ?></strong></td>
                        <td class="column-description desc">
                            <div class="plugin-description">
                                <p><?php echo $plugin['name']; ?></p>
                            </div>
                            <div class="active second plugin-version-author-uri">
                                Par <a href="http://www.paybox.com"><?php echo $plugin['author']; ?></a>
                            </div>
                        </td>
                        <td class="check">
                            <?php
                            if ($install) {
                                ?>✔<?php
                            } else {
                                ?>-<?php }
                            ?>
                        </td>
                        <td class="check">
                            <?php
                            if ($active) {
                                ?>✔<?php
                            } else {
                                ?>-<?php }
                            ?>
                        </td>
                        <td class="check">
                        <select name="paybox_state_settings[tag_<?php echo $plugin['wordpress_org_name'];?>]">
                            <option value="<?php echo $version;?>">Your current version is <?php echo $version;?></option>
                            <?php 
                                $ReposVersions = array_reverse($ReposVersions);
                                $tag = $ReposVersions[0];
                                if(!empty($tag)){
                                    ?>
                                    <option value="<?php echo $tag;?>">Upgrade to <?php echo $tag;?></option>
                                    <?php
                                }
                                ?>
                        </select>
                        </td>
                    </tr>	
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>