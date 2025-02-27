<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . 'header.css'; ?>">
</head>
<body> 
    <header>
        <div class="seers-cms-header-logo">
            <img src="<?php echo plugin_dir_url(__FILE__) . '../images/Seers-logo.png'; ?>" alt="Logo">
        </div>
        <div class="seers-cms-header-nav">
        <?php $site_name = get_bloginfo('name'); ?>

            <p class="seers-cms-header-dynamic-website"><?php echo $site_name; ?></p>
            <button class="seers-cms-header-button seers-paid-feature-opener" name="headerpremium"><?php echo __('Get Premium', $this->textdomain);?></button>
            <button class="seers-cms-toggle-button">
        <span></span>
        <span></span>
        <span></span>
    </button>
        </div>
    </header>
</body>
</html>
