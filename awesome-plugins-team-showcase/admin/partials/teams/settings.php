<table class="aws-member-meta aws-ts-settings-table">
    <tr>
        <th><?php _e("Skin", $this->plugin_name) ?></th>
        <td>
            <select name="aws_team_settings[skin]">

                <option value=''><?php _e("Select a skin", $this->plugin_name) ?></option>

                <?php foreach ($options as $option): ?>

                    <option 
                        value="<?php echo $option["id"] ?>"
                        data-settings="<?php echo implode(",", $option["settings"]) ?>"
                        data-columns="<?php echo $option["max_columns"] ?>"
                        <?php echo ( $option["id"] === $skin ? "selected" : "" ) ?>
                        ><?php echo $option["title"] ?></option>

                <?php endforeach; ?>

            </select>
        </td>
    </tr>

    <tr data-skin="grid">
        <th><?php _e("Layout", $this->plugin_name) ?></th>
        <td>
            <select name="aws_team_settings[grid]">
                <option value="list" <?php echo ( $grid === "list" ? "selected" : "") ?>><?php _e("List", $this->plugin_name) ?></option>
                <option value="grid" <?php echo ( $grid === "grid" ? "selected" : "") ?>><?php _e("Grid", $this->plugin_name) ?></option>
                <option value="carousel" <?php echo ( $grid === "carousel" ? "selected" : "") ?>><?php _e("Carousel", $this->plugin_name) ?></option>
            </select>
        </td>
    </tr>

    <tr data-skin="card">
        <th><?php _e("Card", $this->plugin_name) ?></th>
        <td>
            <span class="aws-field-inline">wp-content/themes/<?php echo basename(get_stylesheet_directory()); ?>/</span>
            <input
                type="text"
                name="aws_team_settings[card]"
                placeholder="<?php _e("Leave empty to use plugin default card", $this->plugin_name) ?>"
                value="<?php echo $card ?>"
                />
        </td>
    </tr>

    <tr data-skin="columns">
        <th><?php _e("Columns", $this->plugin_name) ?></th>
        <td>
            <input type="number" max="" name="aws_team_settings[columns]" value="<?php echo $columns ?>" />
        </td>
    </tr>

    <tr data-skin="autoslide">
        <th><?php _e("Auto slide", $this->plugin_name) ?></th>
        <td>
            <input type="checkbox" name="aws_team_settings[autoslide]" value="yes" <?php echo ( isset($team_settings["autoslide"]) && $team_settings["autoslide"] === "yes" ? "checked" : "" ) ?> />
        </td>
    </tr>

    <tr data-skin="interval">
        <th><?php _e("interval", $this->plugin_name) ?></th>
        <td>
            <input type="number" name="aws_team_settings[interval]" value="<?php echo ( isset($team_settings["interval"]) ? $team_settings["interval"] : 5000 ) ?>" />
        </td>
    </tr>

    <tr data-skin="indicators">
        <th><?php _e("Show indicators", $this->plugin_name) ?></th>
        <td>
            <input type="checkbox" name="aws_team_settings[indicators]" value="yes" <?php echo ( isset($team_settings["indicators"]) && $team_settings["indicators"] === "yes" ? "checked" : "" ) ?> />
        </td>
    </tr>

    <tr data-skin="arrows">
        <th><?php _e("Show arrows", $this->plugin_name) ?></th>
        <td>
            <?php
            $arrows_flag = true;

            if (isset($team_settings["arrows"]) && $team_settings["arrows"] !== "yes"):

                $arrows_flag = false;

            endif;
            ?>
            <input type="checkbox" name="aws_team_settings[arrows]" value="yes" <?php echo ( $arrows_flag ? "checked" : "" ) ?> />
        </td>
    </tr>
    
    <tr data-skin="extrainfo">

        <th><?php _e("Card Action", $this->plugin_name) ?></th>
        <td>

            <input type="hidden" name="aws_team_settings[extrainfo]" value="<?php echo $extrainfo?>" />
            
            <select name="aws_team_settings[extrainfo]">

                <?php foreach ($options as $option): ?>

                    <?php if (isset($option["extrainfo_action"]) && $option["extrainfo_action"] !== false): ?>

                        <?php foreach ($option["extrainfo_action"] as $extra_info_option): ?>

                            <option 
                                data-option-skin="<?php echo $option["id"]?>"
                                value="<?php echo sanitize_title($extra_info_option) ?>" 
                                    <?php echo ( $extrainfo === sanitize_title($extra_info_option) ? "selected" : "") ?>><?php echo $extra_info_option ?></option>

                        <?php endforeach; ?>

                    <?php endif; ?>
                            
                <?php endforeach; ?>
                            
            </select>
        </td>
    </tr>



    <tr data-skin="extra_info_card" data-visible-option="extra-info-card">
        <th><?php _e("Panel", $this->plugin_name) ?></th>
        <td>
            <span class="aws-field-inline">wp-content/themes/<?php echo basename(get_stylesheet_directory()); ?>/</span>
            <input 
                type="text" 
                name="aws_team_settings[extra_info_card]" 
                placeholder="Leave empty to use plugin default card"
                value="<?php echo $extra_info_card ?>"
                />
        </td>
    </tr>

</table>