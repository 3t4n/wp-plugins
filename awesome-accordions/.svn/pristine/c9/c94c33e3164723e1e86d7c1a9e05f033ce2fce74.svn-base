<form id='aws-team-showcase-update-general' method='post'>

    <input type="hidden" name="aws_team_showcase_settings_flag" value="1" />
    
    <p class="section-text"><?php _e('Individual posts can be seen by a user on the front-end. <br/>Disable this if you only want to show the accordions using a shortcode. ', $this->plugin_name) ?></p>
    <input type="hidden" name="awesome-accordions-views[flag]" value="1" />
    
    <table class="form-table" role="presentation">
        <tbody>
            <tr>
                <th scope="row">Accordions</th>
                <td> 

                    <label class="awesome-pub-switch">
                        <input type="checkbox" name="awesome-accordions-views[posts]" <?php echo ( !isset($views["posts"]) || $views["posts"] !== "yes" ? "" : "checked" ) ?> value="yes" />
                        <span class="slider round"></span>
                    </label>

                </td>
            </tr>

        </tbody>

    </table>

    <input class="button button-primary" type="submit" value="Save" />

</form>