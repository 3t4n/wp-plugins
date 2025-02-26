<form id='aws-team-showcase-update-general' method='post'>

    <input type="hidden" name="aws_team_showcase_settings_flag" value="1" />

    <p class="section-text"><?php _e('Individual posts for teams and members can be seen by a user on the front-end. <br/>Disable this if you only want to show the showcase using a shortcode. ', $this->plugin_name) ?></p>
    <input type="hidden" name="aws_ts_posts[flag]" value="1" />

    <table class="form-table" role="presentation">
        <tbody>
            <tr>
                <th scope="row">Teams</th>
                <td> 

                    <label class="awesome-pub-switch">
                        <input type="checkbox" name="aws_ts_posts[teams]" <?php echo (!isset($aws_ts_posts["teams"]) || $aws_ts_posts["teams"] !== "yes" ? "" : "checked" ) ?> value="yes" />
                        <span class="slider round"></span>
                    </label>

                </td>
            </tr>
            <tr data-row="team">
                <th scope="row"><?php _e("Team Shortcode Position", $this->plugin_name)?></th>
                <td> 
                    <select name="aws_ts_posts[team_card_position]">
                        <option value=""><?php _e("Select card position", $this->plugin_name) ?></option>
                        <option value="disabled" <?php echo ( $team_card_position === "disabled" ? "selected" : ""); ?>><?php _e("Disabled", $this->plugin_name) ?></option>
                        <option value="before" <?php echo ( $team_card_position === "before" ? "selected" : ""); ?>><?php _e("Before the content", $this->plugin_name) ?></option>
                        <option value="after" <?php echo ( $team_card_position === "after" ? "selected" : ""); ?>><?php _e("After the content", $this->plugin_name) ?></option>
                    </select>

                </td>
            </tr>

            <tr>
                <th scope="row">Members</th>
                <td> 
                    <label class="awesome-pub-switch">
                        <input type="checkbox" name="aws_ts_posts[members]" <?php echo (!isset($aws_ts_posts["members"]) || $aws_ts_posts["members"] !== "yes" ? "" : "checked" ) ?> value="yes" />
                        <span class="slider round"></span>
                    </label>

                </td>
            </tr>

            <tr data-row="member">
                <th scope="row"><?php _e("Member Shortcode Position", $this->plugin_name)?></th>
                <td> 
                    
                    <select name="aws_ts_posts[member_card_position]">
                        <option value=""><?php _e("Select card position", $this->plugin_name) ?></option>
                        <option value="disabled" <?php echo ( $member_card_position === "disabled" ? "selected" : ""); ?>><?php _e("Disabled", $this->plugin_name) ?></option>
                        <option value="before" <?php echo ( $member_card_position === "before" ? "selected" : ""); ?>><?php _e("Before the content", $this->plugin_name) ?></option>
                        <option value="after" <?php echo ( $member_card_position === "after" ? "selected" : ""); ?>><?php _e("After the content", $this->plugin_name) ?></option>
                    </select>

                </td>
            </tr>
            
            <tr data-row="member">
                <th scope="row"><?php _e("Member Link", $this->plugin_name)?></th>
                <td> 
                    
                    <select name="aws_ts_posts[member_link_action]">
                        
                        <option value="link-to-member" <?php echo ( $member_link_action === "link-to-member" ? "selected" : ""); ?>><?php _e("Link to member", $this->plugin_name) ?></option>
                        <option value="none" <?php echo ( $member_link_action === "none" ? "selected" : ""); ?>><?php _e("None", $this->plugin_name) ?></option>
                        
                    </select>

                </td>
            </tr>

        </tbody>

    </table>

    <input class="button button-primary" type="submit" value="Save" />

</form>