<form id='aws-team-showcase-update-general' method='post'>

    <h1><?php _e("Getting Started", $this->plugin_name); ?></h1>

    <p class="section-text"><?php _e("Thank you for using the Awesome Team Showcase plugin, if you need any help or want to give us a review click one of the links below.", $this->plugin_name); ?>

	    <?php if (!is_plugin_active("awesome-plugins-team-showcase-premium/awesome-plugins-team-showcase-premium.php")): ?>

        <br/><?php _e("If you need more advanced options checkout our Premium version.", $this->plugin_name); ?> </p>

        <?php endif; ?>


    <table class="form-table" role="presentation">
        <tbody>

            <tr>
                <th scope="row"><h2><?php _e("Documentation", $this->plugin_name); ?></h2></th>
                <td><a href="https://team-showcase.awesome-plugins.com"><?php _e("Go here to read how you can create your first showcase", $this->plugin_name); ?></a></td>
            </tr>

            <tr>
                <th scope="row"><h2><?php _e("Questions?", $this->plugin_name); ?></h2></th>
                <td><a href="https://wordpress.org/support/plugin/awesome-plugins-team-showcase"><?php _e("Post your questions in the WordPress Forum", $this->plugin_name); ?>.</a></td>
            </tr>


            <?php if (!is_plugin_active("awesome-plugins-team-showcase-premium/awesome-plugins-team-showcase-premium.php")): ?>

                <tr>
                    <th scope="row"><h2><?php _e("Premium version", $this->plugin_name); ?></h2></th>
                    <td><a href="https://awesome-plugins.com/product/team-showcase" target="_blank"><?php _e("Go here to buy the plugin", $this->plugin_name); ?>.</a></td>
                </tr>

            <?php else: ?>

                <tr>
                    <th scope="row"><h2><?php _e("Need more help?", $this->plugin_name); ?></h2></th>
                    <td><a href="https://team-showcase.awesome-plugins.com/support/" target="_blank"><?php _e("Click here to send in a question using our support form", $this->plugin_name); ?>.</a></td>
                </tr>

            <?php endif; ?>

            <tr>
                <th scope="row"><h2><?php _e("Give a nice review", $this->plugin_name); ?></h2></th>
                <td><a href="https://wordpress.org/support/plugin/awesome-plugins-team-showcase/reviews/"><?php _e("If you like the plugin go here give us a review", $this->plugin_name); ?>.</a></td>
            </tr>

        </tbody>

    </table>

</form>