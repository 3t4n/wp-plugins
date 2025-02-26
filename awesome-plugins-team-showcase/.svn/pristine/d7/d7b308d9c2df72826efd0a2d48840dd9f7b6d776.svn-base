<input type="hidden" id="team-post-id" value="<?php echo the_ID(); ?>" />

<ul id="aws-teams-list" class="team-container js-team-container">

    <?php
    if (is_array($members) && count($members) > 0):

        foreach ($members as $member):
            ?>

            <li class="team-item js-team-item ui-state-default">
                <div class="team-title portlet-header">
                    <input type="hidden" name="aws_ts_members[]" value="<?php echo $member ?>">
                    <?php echo get_post($member)->post_title; ?>
                    <span class="dashicons dashicons-trash js-aws-remove-member"></span>
                </div>
            </li>

            <?php
            $counter++;

        endforeach;
    endif;
    ?>

</ul>

<select class="js-add-new-member-list add-new-member-list">

    <option value="add"><?php _e("Add member", $this->plugin_name); ?></option>
    
    <option value="all"><?php _e("Select All", $this->plugin_name); ?></option>
    
    <?php foreach ($members_posts as $member_p): ?>

        <?php
        $added = ( in_array($member_p->ID, $members) ? "added" : "");
        ?>

        <option
            value="<?php echo $member_p->ID ?>" 
            data-name="<?php echo $member_p->post_title ?>" 
            class="<?php echo $added ?>">
            <?php echo $member_p->post_title ?>
        </option>
    <?php endforeach; ?>
        
</select>

<table class="aws-member-meta">

    <tr>
        <th><?php _e("Order By", $this->plugin_name); ?></th>
        <td>
            
            <select name="aws_team_settings[orderby]">
                <option value="name" <?php echo ( $orderby === "name" ? "selected" : "")?>><?php _e("Name", $this->plugin_name); ?></option>
                <option value="date" <?php echo ( $orderby === "date" ? "selected" : "")?>><?php _e("Date", $this->plugin_name); ?></option>
                <option value="post__in" <?php echo ( $orderby === "post__in" ? "selected" : "")?>><?php _e("Drag & Drop", $this->plugin_name); ?></option>
                <option value="rand" <?php echo ( $orderby === "rand" ? "selected" : "")?>><?php _e("Random", $this->plugin_name); ?></option>
            </select>
        </td>
    </tr>

    <tr data-hide="order">
        <th><?php _e("Order", $this->plugin_name); ?></th>
        <td>
            <select name="aws_team_settings[order]">
                <option value="asc" <?php echo ( $order === "asc" ? "selected" : "")?>><?php _e("ASC", $this->plugin_name); ?></option>
                <option value="desc" <?php echo ( $order === "desc"? "selected" : "")?>><?php _e("DESC", $this->plugin_name); ?></option>
            </select>
        </td>
    </tr>

</table>