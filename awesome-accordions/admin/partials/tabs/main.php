<div class="wrap"> 

    <div class="awesome-accordions-wrap">  

        <h3 class="awesome-accordions-settings-title"> <?php _e('Awesome Accordions Settings', $this->plugin_name) ?> </h3>
        
        <h2 class="nav-tab-wrapper">
            <?php
            foreach ($tabs as $tab => $name):
                $class = ( $tab == $current ) ? ' nav-tab-active' : '';
                echo "<a class='nav-tab$class' href='/wp-admin/edit.php?post_type=aws-accordions&page=awesome-accordions-settings&tab=$tab'>$name</a>";
            endforeach;
            ?>
        </h2>	

        <?php echo apply_filters("aws_acc_include_setting_tab", $current) ?>
        
    </div>
</div>