<div id="<?php echo $this->pre; ?>-admin-bar" class="<?php if($allow || (! $allow && count($menu))): ?>minimize<?php endif; ?> <?php if(! $allow && ! count($menu)): ?>noallow<?php endif; ?> <?php if(empty($menu)): ?>nomenu<?php endif; ?>" data-admin-url="<?php echo admin_url(); ?>">
    <?php if(! empty($menu)): ?>
    <div class="<?php echo $this->pre; ?>-admin-bar-menu">
        <?php foreach($menu as $item): ?>
        <div class="<?php echo $this->pre; ?>-admin-bar-menu-item">
            <a href="<?php echo $item['link']; ?>" <?php if($item['type'] == 'link'): ?>target="<?php echo $item['target']; ?>"<?php endif; ?> role="button" aria-label="<?php echo stripslashes($item['name']); ?>">
                <span><?php echo stripslashes($item['name']); ?></span>
                <?php if(! empty($item['instructions'])): ?><span class="<?php echo $this->pre; ?>-admin-bar-menu-instruction" role="button"><span title="<?php echo htmlentities($item['instructions']); ?>"></span></span><?php endif; ?>
            </a>
            <?php if($item['type'] == 'menu' && ! empty($item['submenu'])): ?>
            <div class="<?php echo $this->pre; ?>-admin-bar-submenu">
                <?php foreach($item['submenu'] as $sub): ?>
                <a class="<?php echo $this->pre; ?>-admin-bar-submenu-item" href="<?php echo $sub['link']; ?>" role="button" title="<?php echo stripslashes($sub['name']); ?>"><?php echo stripslashes($sub['name']); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div><?php endif; ?><div class="<?php echo $this->pre; ?>-admin-bar-action">
        <?php if($allow || (! $allow && count($menu))): ?><a class="<?php echo $this->pre; ?>-admin-bar-toggle" title="Toggle">Toggle</a><?php endif; ?>
        <a class="<?php echo $this->pre; ?>-admin-bar-home" href="<?php echo home_url(); ?>" target="_blank" title="Home Page">Home Page</a>

        <?php if($allow): ?><?php if(! empty($post)): ?><a class="<?php echo $this->pre; ?>-admin-bar-page <?php if($label == 'View Page'): ?><?php echo $this->pre; ?>-admin-bar-view<?php endif; ?>" href="<?php echo $link; ?>" title="<?php echo $label; ?>" <?php if(is_admin()): ?>target="_blank"<?php endif; ?>><?php echo $label; ?></a><?php endif; ?>

        <!-- <?php //if(empty(get_option($this->pre . 'cache_option'))) :?>
        <?php //if(! empty($cache_dir)): ?><a class="<?php //echo $this->pre; ?>-admin-bar-flush" target="_blank" href="<?php //echo $cache_dir; ?>" title="Flush Cache">Flush Cache</a><?php //endif; ?>
        <?php //endif; ?> -->

        <!-- <?php //if(! empty($gd)): ?><a class="<?php //echo $this->pre; ?>-admin-bar-flush" target="_blank" href="<?php //echo $gd; ?>" title="Flush Cache">Flush Cache</a><?php //endif; ?>
        <?php //if(! empty($wpaas)): ?><a class="<?php //echo $this->pre; ?>-admin-bar-flush" target="_blank" href="<?php //echo $wpaas; ?>" title="Flush Cache">Flush Cache</a><?php //endif; ?>
        <?php //if(! empty($kinsta)): ?><a class="<?php //echo $this->pre; ?>-admin-bar-flush" target="_blank" href="<?php //echo $kinsta; ?>" title="Clear Cache">Clear Cache</a><?php //endif; ?>
        <?php //if(! empty($wpcycle)): ?><a class="<?php //echo $this->pre; ?>-admin-bar-flush" target="_blank" href="<?php //echo $wpcycle; ?>" title="Flush Cache">Flush Cache</a><?php //endif; ?> -->

        <a class="<?php echo $this->pre; ?>-admin-bar-mode <?php if(! empty($this -> advance)): ?><?php echo $this->pre; ?>-admin-bar-advance<?php endif; ?>" href="<?php echo $mode; ?>" title="<?php if(empty($this -> advance)): ?>Switch to Full WordPress Admin<?php else: ?>Switch to a Simple Backend<?php endif; ?>"><?php if(empty($this -> advance)): ?>Switch to Full WordPress Admin<?php else: ?>Switch to a Simple Backend<?php endif; ?></a>
        <a class="<?php echo $this->pre; ?>-admin-bar-settings" href="<?php echo admin_url("admin.php?page=a-simple-backend"); ?>" title="Settings">Settings</a><?php endif; ?>
        <a class="<?php echo $this->pre; ?>-admin-bar-logout" href="<?php echo $logout; ?>" title="Log Out">Log Out</a>
    </div>
</div>