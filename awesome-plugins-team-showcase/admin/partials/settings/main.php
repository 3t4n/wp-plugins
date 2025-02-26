<div class="wrap"> 

    <div class="aws-team-showcase-settings-page-wrap">  

        <h3 class="aws-team-showcase-settings-title"> <?php _e(' Awesome Team Showcase Settings', $this->plugin_name) ?> </h3>

        <h2 class="nav-tab-wrapper">
            <?php
            foreach ($tabs as $tab => $name):
                $class = ( $tab == $current ) ? ' nav-tab-active' : '';
                echo "<a class='nav-tab $class' href='/wp-admin/admin.php?page=aws-team-showcase-settings&tab=$tab'>$name</a>";
            endforeach;
            ?>
        </h2>	

        <?php echo apply_filters("aws_ts_include_setting_tab", $current) ?>
        
    </div>

</div>