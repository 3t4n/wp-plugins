<div class="filerobot__loader"></div>

<?php
    $default_tab = null;
    $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;
?>
<div class="wrap">
    <h2><!-- Keep this dummy H2 here, else the admin warnings will display elsewhere --></h2>
    <?php settings_errors(); ?>

    <nav class="nav-tab-wrapper">
        <a 
            href="?page=scaleflex-dam"
            class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>"
        >
            <?php echo 'Welcome'; ?>
        </a>
        <a 
            href="?page=scaleflex-dam&tab=settings"
            class="nav-tab <?php if($tab==='settings'):?>nav-tab-active<?php endif; ?>"
        >
            <?php echo 'General Settings'; ?>
        </a>
        <a 
            href="?page=scaleflex-dam&tab=logs"
            class="nav-tab <?php if($tab==='logs'):?>nav-tab-active<?php endif; ?>"
        >
            <?php echo 'Scaleflex DAM Logs'; ?>
        </a>
        <a 
            href="?page=scaleflex-dam&tab=support"
            class="nav-tab <?php if($tab==='support'):?>nav-tab-active<?php endif; ?>"
        >
            <?php echo 'Support'; ?>
        </a>
    </nav>

    <div class="tab-content">
    <?php 
        switch($tab) 
        {
            case 'settings':
                include_once('filerobot_settings_page.php');
                break;
            case 'logs':
                include_once('filerobot_log_page.php');
                break;
            case 'support':
                include_once('filerobot_support_page.php');
                break;
            default:
                include_once('filerobot_description_page.php');
                break;
        }
    ?>
    </div>
</div>
