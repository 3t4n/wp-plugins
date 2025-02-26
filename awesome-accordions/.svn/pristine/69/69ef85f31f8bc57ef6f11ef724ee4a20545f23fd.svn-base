<div class="wrap"> 

    <div class="awesome-accordions-wrap">  

        <h2 class="nav-tab-wrapper">
            <?php
            foreach ($tabs as $tab => $name):
                $class = ( $tab == $current ) ? ' nav-tab-active' : '';
                echo "<a class='nav-tab$class' href='admin.php?page=awesome-accordions-settings&tab=$tab'>$name</a>";
            endforeach;
            ?>
        </h2>	

        <form action='options.php' method='post'>
            <?php
            settings_fields('awesome-accordions-settings_' . strtolower($current));
            do_settings_sections('awesome-accordions-settings_' . strtolower($current));
            submit_button();
            ?>
        </form>

    </div>
</div>