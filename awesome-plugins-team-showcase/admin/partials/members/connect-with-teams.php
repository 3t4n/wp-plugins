<table class="aws-member-meta">

    <tr>

        <td>
            <select name="teams-to-connect">

                <option value=""><?php _e("Select team", $this->plugin_name) ?></option>
                <option value="all"><?php _e("All teams", $this->plugin_name) ?></option>

                <?php foreach ($teams as $team): ?>

                    <?php
                    $team_members   = get_post_meta($team->ID, "aws_ts_members", true);
                    $team_members   = ( is_array($team_members) ? $team_members : array() );
                    $connected_flag = ( in_array(get_the_ID(), $team_members) ? "hidden" : "" );
                    ?>

                    <option value="<?php echo $team->ID ?>" class="<?php echo $connected_flag ?>"><?php echo $team->post_title ?></option>

                <?php endforeach; ?>

            </select>

            <ul id="current-teams-connected" class="">

                <?php foreach ($teams as $team): ?>

                    <?php
                    $team_members   = get_post_meta($team->ID, "aws_ts_members", true);
                    $team_members   = ( is_array($team_members) ? $team_members : array() );
                    $connected_flag = ( in_array(get_the_ID(), $team_members) ? true : false );

                    if ($connected_flag):
                        ?>

                        <li>

                            <input type="hidden" name="teams_connected[]" value="<?php echo $team->ID ?>">
                            <span class="dashicons dashicons-dismiss js-remove-team-connected"></span>
                            <span class="title"><?php echo $team->post_title ?></span>

                        </li>

                    <?php endif; ?>
                <?php endforeach; ?>

            </ul>

        </td>

    </tr>

</table>