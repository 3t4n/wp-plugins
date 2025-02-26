<div class="wrap">
    <h2><?php echo sprintf(__("Upgrade to %s", PIG_PLUGIN_SLUG__), PIG_PLUGIN_NAME__ . " " . __("Premium", PIG_PLUGIN_SLUG__));?></h2>

<?php
    global $active_tab, $name;
    $active_tab = isset( $_REQUEST[ 'tab' ] ) ? $_REQUEST[ 'tab' ] : "go";
?>
    <h2 class="nav-tab-wrapper">
        <a href="?page=<?php echo PIG_PLUGIN_SLUG__ . "1";?>&tab=go" class="nav-tab <?php echo $active_tab == 'go' ? 'nav-tab-active' : ''; ?>"><?php _e("Go Premium", PIG_PLUGIN_SLUG__);?></a>
    </h2>

    <?php if ($this->notice) { ?>
    <div class="updated"><p><?php echo $this->notice;?></p></div>
    <?php } ?>

    <?php if ($this->error) { ?>
    <div class="error"><p><?php echo $this->error;?></p></div>
    <?php } ?>

    <form method="post" action="">
        <table class="form-table">
<?php
    switch ($active_tab) {
        case "go":
?>
    <div class="search-pro search-pro-go">
        <h2><?php echo sprintf(__("Go Pro! Only %s per year", PIG_PLUGIN_SLUG__), $price);?></h2>

        <ul>
            <li><?php echo $PIG_MESSAGES['go_pro_message1'];?></li>
            <li><?php echo $PIG_MESSAGES['go_pro_message2'];?></li>
            <li><?php echo $PIG_MESSAGES['go_pro_message3'];?></li>
            <li><?php echo $PIG_MESSAGES['go_pro_message4'];?></li>
            <li><?php echo $PIG_MESSAGES['go_pro_message5'];?></li>
        </ul>

        <div style="text-align: left">
            <a href="<?php echo PIG_PREMIUM_URL__;?>" target="_new"><input type="button" class="button button-primary" value="<?php echo $PIG_MESSAGES['go_pro_message6'];?>"></a>
        </div>
    </div>
<?php
            break;
        case "key":
            $status = self::getOption("license-status");
            $active = $status == "active";
            $bttn   = $active ? __( "Save", PIG_PLUGIN_SLUG__ ) : __( "Unlock!", PIG_PLUGIN_SLUG__ );
            $text   = $active ? $PIG_MESSAGES['license_yes'] : $PIG_MESSAGES['license_no'];
?>
            <tr valign="top">
                <th scope="row" colspan="2"><?php echo $text;?></th>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <input type="text" name="key" id="key" value="<?php echo self::getOption("license");?>" class="regular-text" placeholder="<?php echo $PIG_MESSAGES['placeholder_license'];?>">
                </th>
                <td><?php submit_button($bttn, "primary", "pig-license", false);?></td>
            </tr>
            <?php if ($status) { ?>
            <tr valign="top">
                <th scope="row" colspan="2"><p class="description"><?php echo sprintf($PIG_MESSAGES['license_status'], self::getOption("license-status"));?></p></th>
            </tr>
            <?php } ?>
<?php
            break;
    }
?>
        </table>
    
        <input type="hidden" name="tab" value="<?php echo $active_tab;?>">
        <?php wp_nonce_field($active_tab, "nonce");?>
    </form>