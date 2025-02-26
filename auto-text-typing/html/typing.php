<?php
if (!defined('ABSPATH') && !is_admin()) {
    exit;
}

$message = get_option('message');
$datas = get_plugin_data(MELIBU_PLUGIN_PATH_07 . 'auto-text-typing.php', $markup = true, $translate = true);

if (!isset($_REQUEST['settings-updated'])) {
    $_REQUEST['settings-updated'] = false;
}

$tab = filter_input(INPUT_POST, 'st_melibuPlugin_list_item');
if (!isset($tab)) {
    $tab = '';
}
?>
<div class="wrap">


    <div class="st_wp_brand">
        <h1>
            <img src="<?php echo plugins_url("auto-text-typing/img/icon-MB.png"); ?>" alt="icon-MB-20" width="50" class="st_wp_logo"> 
            <?php echo $datas['Name']; ?>
            <span><?php _e('Professional Themes and Plugins for WordPress', 'auto-text-typing'); ?></span>
        </h1>
    </div>
    <hr />

    <?php if (false !== $_REQUEST['settings-updated']) : ?>  
        <div class="updated fade">
            <p>
                <strong>
                    <?php _e('Settings saved!', 'auto-text-typing'); ?>
                </strong>
            </p>
        </div>
    <?php endif; ?>

    <div class="mb-st-grid-9">
        <div class="st-melibuPlugin-area">
            <div class="st_melibuPlugin_list st_melibuPlugin_list_flip">

                <input name="st_melibuPlugin_list_item" checked="checked" 
                       id="st_melibuPlugin_list_item_1" 
                       class="st_melibuPlugin_list_item_1" 
                       type="radio" 
                       value="1" <?php checked($tab, '1'); ?>>
                <label for="st_melibuPlugin_list_item_1">
                    <span>
                        <?php _e('Typing', 'auto-text-typing'); ?>
                    </span>
                </label>

                <ul>
                    <li class="st_melibuPlugin_list_item_1">
                        <div class="st_melibuPlugin_list_content">
                            <table class="wp-list-table widefat fixed striped media">
                                <tr>
                                    <th><?php _e('Description', 'auto-text-typing'); ?></th>
                                    <th><?php _e('Basic', 'auto-text-typing'); ?></th>
                                </tr>
                                <tr>
                                    <td>
                                        <h3><?php _e('Preview', 'auto-text-typing'); ?></h3>
                                    </td>
                                    <td>
                                        <section class="typing-letters"><div><?php echo $message; ?></div>
                                            <span class="st-copy">
                                                <?php echo 'AutoTyper &copy; by'; ?> <a href="<?php echo MAA_PLUGIN_07_DEV_URL; ?>" target="_blank">Melabu</a>
                                            </span>
                                        </section>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3><i class="fa fa-brush" aria-hidden="true"></i> <?php _e('Settings', 'auto-text-typing'); ?></h3>
                                        <p><?php _e('Here you can set the visuals', 'auto-text-typing'); ?></p>
                                        <p><?php _e('Enter your text, save and see the magic. Games you have with the design settings around until you find the right.', 'auto-text-typing'); ?></p>
                                    </td>
                                    <td>
                                        <?php require_once 'typing/message.php'; ?>
                                    </td>
                                </tr>
                            </table> 
                        </div>
                    </li>
                </ul>

            </div>
            <div class="st_melibu_copy">
                <p class="left">
                    <em><?php _e('Thank you for your confidence in', 'auto-text-typing'); ?></em>
                    <a href="<?php echo MAA_PLUGIN_07_WP_URL; ?>"><?php echo $datas['Name']; ?></a> &copy; <?php echo date('Y'); ?>
                </p>
                <p class="right">
                    <?php _e('Version', 'auto-text-typing'); ?> <?php echo $datas['Version']; ?>
                </p>
            </div>
        </div>
    </div>

    <div class="mb-st-grid-3">
        <div class="melibu-postbox postbox st-margin-top-45">
            <h2>
                <span>Melabu WP Hits</span>
            </h2>
            <p>
                <?php _e('Get more statistics, with Melabu WP hits. Learn which share button is clicked the most.', 'auto-text-typing'); ?>
            </p>
            <img src="<?php echo plugins_url("img/hits.jpg", dirname(__FILE__)); ?>" alt="Melabu WP Hits" width="650" class="st-img"/>
            <!--<p><a href='#' class='button button-primary'>More...</a></p>-->
        </div>
    </div>

</div>