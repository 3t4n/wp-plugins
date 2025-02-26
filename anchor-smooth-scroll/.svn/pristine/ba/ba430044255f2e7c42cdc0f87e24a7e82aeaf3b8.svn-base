<?php

if ( ! defined('WPINC')) {
    die;
}

?>
<div class="wrap">
    <h1><?php _e('Anchor Smooth Scroll settings', 'anchor-smooth-scroll') ?></h1>
    <?php if($tabs): ?>
    <h2 class="nav-tab-wrapper">
        <?php foreach ($tabs as $tab => $name): ?>
            <?php $class = ($tab == $current) ? ' nav-tab-active' : ''; ?>
            <a class='nav-tab<?php echo $class ?>'
               href='?page=anchor-smooth-scroll-admin&tab=<?php echo $tab ?>'><?php echo $name ?></a>
        <?php endforeach; ?>
    </h2>
    <?php endif; ?>

    <?php
        $file = __DIR__ . "/tabs/{$current}.php";
        if (file_exists($file)){
            include $file;
        }
    ?>

</div>