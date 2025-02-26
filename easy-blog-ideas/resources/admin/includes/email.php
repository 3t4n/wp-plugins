<?php
    if (isset($_POST["pigemailid"])) {
?>
    <script>
        location.href = '<?php echo admin_url("edit.php?post_type=pig_email");?>';
    </script>
<?php
        exit();
    }

    global $name, $pig_email_alert;
    $name = "";

    if (!isset($_GET["id"]) && !$this->pig_email_can_add()) {
        echo "<p class='description limits-description email-limits'>" . $this->getEmailLimitsDescription() . "</p>";
        return;
    }

    $button_name    = isset($_GET["id"]) ? "Modify" : "Start";
?>
            <tr valign="top">
                <td scope="row" colspan="2">
                    <input type="text" name="search-q" id="search-q" value="<?php echo $pig_email_alert ? $pig_email_alert->post_title : "";?>" class="regular-text" placeholder="<?php echo $PIG_MESSAGES['placeholder_search'];?>">
                </td>
            </tr>
            <tr valign="top">
                <td scope="row">
                    <label for="search-sort"><?php _e("Sort by", PIG_PLUGIN_SLUG__);?></label>
                </td>
                <td scope="row">
                    <select name="search-sort" id="search-sort" class="<?php echo (isset($pro) && $pro) ? "refresh-form" : ""?>">
<?php
        $sort       = array(
                        "engagement"    => "Engagement",
                        "applause"      => "Applause",
                        "shares"        => "Shares",
                        "relevance"     => "Relevance",
                        "facebook"      => "Facebook",
                        "linkedin"      => "LinkedIn",
                        "googleplus"    => "Google+",
        );
        foreach ($sort as $key=>$label) {
            $selected       = (($pig_email_alert && self::getPostMeta($pig_email_alert->ID, "sort") == $key) || (isset($_POST["search-sort"]) && $_POST["search-sort"] == $key)) ? "selected" : "";
?>
                        <option value="<?php echo $key;?>" <?php echo $selected;?>><?php _e($label, PIG_PLUGIN_SLUG__);?></option>
<?php
        }
?>
                    </select>
                </td>
            </tr>
            <tr valign="top">
                <td scope="row">
                    <label for="search-type"><?php _e("Search for", PIG_PLUGIN_SLUG__);?></label>
                </td>
                <td scope="row">
                    <select name="search-type" id="search-type" class="<?php echo (isset($pro) && $pro) ? "refresh-form" : ""?>">
<?php
        $type       = array(
                        ""              => "Any",
                        "audio"         => "Audio",
                        "article"       => "Blog posts",
                        "casestudy"     => "Case Study",
                        "ebook"         => "eBook",
                        "image"         => "Image",
                        "infographic"   => "Infographics",
                        "podcast"       => "Podcast",
                        "slideshow"     => "Slideshow",
                        "video"         => "Videos",
                        "webinar"       => "Webinar",
                        "whitepaper"    => "Whitepaper",
        );
        foreach ($type as $key=>$label) {
            $selected       = (($pig_email_alert && self::getPostMeta($pig_email_alert->ID, "type") == $key) || (isset($_POST["search-type"]) && $_POST["search-type"] == $key)) ? "selected" : "";
?>
                        <option value="<?php echo $key;?>" <?php echo $selected;?>><?php _e($label, PIG_PLUGIN_SLUG__);?></option>
<?php
        }
?>
                    </select>
                </td>
            </tr>
            <tr valign="top">
                <td scope="row">
                    <label for="freq"><?php _e("Frequency", PIG_PLUGIN_SLUG__);?></label>
                </td>
                <td scope="row">
                    <select name="freq" id="freq">
<?php
    $freq       = array(
                    "monthly"   => __("Monthly",PIG_PLUGIN_SLUG__),
                    "weekly"    => __("Weekly",PIG_PLUGIN_SLUG__),
                    "daily"     => __("Daily",PIG_PLUGIN_SLUG__),
    );
    foreach ($freq as $key=>$label) {
        $extra      = "";
        if ($key !== "monthly" && !apply_filters("pig_pro_activated", false)) {
            $extra  = "disabled";
        }
?>
                        <option value="<?php echo $key;?>" <?php echo $extra;?> <?php echo $pig_email_alert && self::getPostMeta($pig_email_alert->ID, "frequency") == $key ? "selected" : "";?>><?php echo $label;?></option>
<?php
    }
?>
                    </select>
                </td>
            </tr>
            <tr valign="top">
                <td scope="row">
                    <label for="email"><?php _e("Send to", PIG_PLUGIN_SLUG__);?></label>
                </td>
                <td scope="row">
                    <input type="text" name="email" id="email" value="<?php echo $pig_email_alert ? self::getPostMeta($pig_email_alert->ID, "email") : "";?>" class="regular-text" placeholder="<?php _e("Email alerts sent to", PIG_PLUGIN_SLUG__);?>">
                    <p class="description"><?php echo $PIG_MESSAGES['csv'];?></p>
                </td>
            </tr>

<?php
    if (isset($_GET["id"])) {
?>
            <tr valign="top">
                <td scope="row">
                    <label for="rss"><?php _e("RSS Feed", PIG_PLUGIN_SLUG__);?></label>
                </td>
                <td scope="row">
                    <?php echo apply_filters("pig_rss_feed_link", "", $_GET["id"]);?>
                </td>
            </tr>
<?php
    }
?>
            <tr valign="top">
                <td scope="row">
                    <?php submit_button(__($button_name . " " . "Email Alert", PIG_PLUGIN_SLUG__), "primary pig-email-submit", "pig-submit", false);?>
                    <input type="hidden" name="pigemailid" value="<?php echo isset($_GET["id"]) ? $_GET["id"] : "";?>">
                </td>
            </tr>
