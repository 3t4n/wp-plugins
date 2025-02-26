<?php if ($this->user) { ?>
    <div class="flex items-center w-full h-16 px-8 border-b" header>
        <div class="flex items-center w-full h-full">
            <a href="<?php echo esc_url(admin_url('admin.php?page=ad-ink')); ?>" class="flex items-center px-4 text-sm tracking-widest uppercase transition-all duration-75 cursor-pointer border-b-4 border-transparent h-full hover:border-green-500 <?php echo esc_html($_GET["page"]) == "ad-ink" ? "border-green-500" : "" ?>">Mon Tag</a>
            <a href="<?php echo esc_url(admin_url('admin.php?page=ad-ink-report')); ?>" class="flex items-center px-4 text-sm tracking-widest uppercase transition-all duration-75 cursor-pointer border-b-4 border-transparent h-full hover:border-green-500 <?php echo esc_html($_GET["page"]) == "ad-ink-report" ? "border-green-500" : "" ?>">Rapport</a>
            <a href="<?php echo esc_url(admin_url('admin.php?page=ad-ink-affiliation')); ?>" class="flex items-center px-4 text-sm tracking-widest uppercase transition-all duration-75 cursor-pointer border-b-4 border-transparent h-full hover:border-green-500 <?php echo esc_html($_GET["page"]) == "ad-ink-affiliation" ? "border-green-500" : "" ?>">Affiliation</a>
            <a href="<?php echo esc_url(admin_url('admin.php?page=ad-ink-account')); ?>" class="flex items-center h-full px-4 text-sm tracking-widest uppercase transition-all duration-75 border-b-4 border-transparent cursor-pointer hover:border-green-500 <?php echo esc_html($_GET["page"]) == "ad-ink-account" ? "border-green-500" : "" ?>">Mon compte</a>
            <?php if ($this->user !== null) { ?>
                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="flex items-center h-full px-4 ml-auto text-sm tracking-widest uppercase transition-all duration-75 border-b-4 border-transparent cursor-pointer hover:border-green-500">Déconnexion</a>
                <form id="logout-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" style="display: none;">
                    <input type="hidden" name="action" value="logout" />
                    <?php echo $this->nonce(); ?>
                </form>
            <?php } ?>
        </div>
    </div>
<?php } ?>