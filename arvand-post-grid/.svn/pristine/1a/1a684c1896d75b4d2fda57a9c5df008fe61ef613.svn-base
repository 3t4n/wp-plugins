<div class="wrap">
    <h1><?php _e('Post Styles & Settings', 'arvand-posts'); ?></h1>

    <nav class="nav-tab-wrapper">
        <?php
        $valid_query = array(
            'general',
            'posts-wrap',
            'posts-card',
            'posts-image',
            'posts-content',
            'posts-category',
            'posts-header',
            'posts-avatar',
            'posts-title',
            'posts-excerpt',
            'posts-footer',
            'posts-more',
            'posts-pagination'
        );

        $section = (isset($_GET['section']) and in_array($_GET['section'], $valid_query)) ? $_GET['section'] : 'posts-wrap';
        ?>

        <a class="nav-tab <?php echo ($section == 'posts-wrap') ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg(array('section' => 'posts-wrap'))); ?>">
            <?php _e('posts wrap', 'arvand-posts'); ?>
        </a>

        <a class="nav-tab <?php echo ($section == 'posts-card') ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg(array('section' => 'posts-card'))); ?>">
            <?php _e('post card', 'arvand-posts'); ?>
        </a>

        <a class="nav-tab <?php echo ($section == 'posts-image') ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg(array('section' => 'posts-image'))); ?>">
            <?php _e('image', 'arvand-posts'); ?>
        </a>

        <a class="nav-tab <?php echo ($section == 'posts-header') ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg(array('section' => 'posts-header'))); ?>">
            <?php _e('header', 'arvand-posts'); ?>
        </a>

        <a class="nav-tab <?php echo ($section == 'posts-avatar') ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg(array('section' => 'posts-avatar'))); ?>">
            <?php _e('avatar', 'arvand-posts'); ?>
        </a>

        <a class="nav-tab <?php echo ($section == 'posts-content') ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg(array('section' => 'posts-content'))); ?>">
            <?php _e('content', 'arvand-posts'); ?>
        </a>

        <a class="nav-tab <?php echo ($section == 'posts-category') ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg(array('section' => 'posts-category'))); ?>">
            <?php _e('category', 'arvand-posts'); ?>
        </a>

        <a class="nav-tab <?php echo ($section == 'posts-title') ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg(array('section' => 'posts-title'))); ?>">
            <?php _e('title', 'arvand-posts'); ?>
        </a>

        <a class="nav-tab <?php echo ($section == 'posts-excerpt') ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg(array('section' => 'posts-excerpt'))); ?>">
            <?php _e('excerpt', 'arvand-posts'); ?>
        </a>

        <a class="nav-tab <?php echo ($section == 'posts-more') ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg(array('section' => 'posts-more'))); ?>">
            <?php _e('read more', 'arvand-posts'); ?>
        </a>

        <a class="nav-tab <?php echo ($section == 'posts-footer') ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg(array('section' => 'posts-footer'))); ?>">
            <?php _e('footer', 'arvand-posts'); ?>
        </a>

        <a class="nav-tab <?php echo ($section == 'posts-pagination') ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg(array('section' => 'posts-pagination'))); ?>">
            <?php _e('pagination', 'arvand-posts'); ?>
        </a>
    </nav>

    <div class="nav-content">
        <?php
        if ($section == 'posts-card') {
            include APG_ADMIN_PATH . 'forms/post-card.php';
        } elseif ($section == 'posts-image') {
            include APG_ADMIN_PATH . 'forms/post-image.php';
        } elseif ($section == 'posts-header') {
            include APG_ADMIN_PATH . 'forms/post-header.php';
        } elseif ($section == 'posts-avatar') {
            include APG_ADMIN_PATH . 'forms/post-avatar.php';
        } elseif ($section == 'posts-content') {
            include APG_ADMIN_PATH . 'forms/post-content.php';
        } elseif ($section == 'posts-category') {
            include APG_ADMIN_PATH . 'forms/post-category.php';
        } elseif ($section == 'posts-title') {
            include APG_ADMIN_PATH . 'forms/post-title.php';
        } elseif ($section == 'posts-excerpt') {
            include APG_ADMIN_PATH . 'forms/post-excerpt.php';
        } elseif ($section == 'posts-more') {
            include APG_ADMIN_PATH . 'forms/post-more.php';
        } elseif ($section == 'posts-footer') {
            include APG_ADMIN_PATH . 'forms/post-footer.php';
        } elseif ($section == 'posts-pagination') {
            include APG_ADMIN_PATH . 'forms/pagination.php';
        } else {
            include APG_ADMIN_PATH . 'forms/posts-wrap.php';
        }
        ?>
    </div>
</div>