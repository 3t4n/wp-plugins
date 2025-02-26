<?php
require_once('apm-do_save_settings.php');


if (isset($_REQUEST['do_clearcache'])) {
    ?>
    <script type="text/javascript">
        $.get(ajaxurl+'?action=apm_extensions&subaction=get_extensions_files&type=js&clearcache=false');
        $.get(ajaxurl+'?action=apm_extensions&subaction=get_extensions_files&type=css&clearcache=false');
        $.get(ajaxurl+'?action=apm_extensions&subaction=get_extensions_files&type=views&clearcache=false');
    </script>
<?php } ?>
<div class="wrap wrpapm">
    <?php
    if (class_exists('MultiPostThumbnails')) {

    } else {
        //   echo '<div class="well">This class rely on <a href="http://wordpress.org/extend/plugins/multiple-post-thumbnails/" target="_blank">MultiPostThumbnails</a> plugin, please install it</div> ';
    }

    $application = $oThis->applications[$appName];
    ?>

    <h2><?php echo $appLabel . ' - ' . $args['page_type_label']; ?></h2>
    <?php
    $blockid = $appName . '_topintrotext';
    $showintro = get_option('neveragain_' . $blockid . "_" . $current_user->ID);
    if ($appHometext !== '' and $showintro !== 'hide') {
        ?>
        <div class='well wellmedpadd' id="<?php echo $blockid; ?>">
            <?php echo $appHometext; ?>
            <span class="neveragain topintrotext_closealways">&times; Close and never see this anymore?</span>
            <span class="neveragain topintrotext_close">&times; Close</span>
            <span class="clearfix"></span>
        </div>
        <?php
    }
    if (isset($_REQUEST['reset_statsapproove'])) {
        update_option('statsapproove', 'show');
    }
    $showstatsapproove = get_option('statsapproove');
// var_dump($showstatsapproove);
    if ($showstatsapproove == false or $showstatsapproove == 'show') {
        ?>
        <div class="alert alert-block ask_send_stat">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Please help us to get Statistics about the numbers of peoples that installed the last version of our CRM</h4>
            <p>If you agree, please click Yes, we will send to our server ONLY the current plugin Version number, and nothing else.
                <br/>Then you will never see this request anymore</p>
            <p>If you disagree, just click No, and you will never see this request anymore</p>
            <p>DO YOU AGREE?</p>
            <p><span class="btn btn-success do_send_stat">Yes</span> <span class="btn btn-info dont_send_stat">No</span></p>
        </div>
        <?php
    }


    if (isset($_REQUEST['reset_pollpro'])) {
        update_option('set_pollpro', 'show');
    }
    $showreset_pollpro = get_option('set_pollpro');
// var_dump($showstatsapproove);
    if ($showreset_pollpro == false or $showreset_pollpro == 'show') {
        ?>
        <!--div class="alert alert-info ask_send_pollpro">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Would you please answer to our Poll?</h4>
            <p>If you agree, please answer to our POLL.
                <br/>Then you will never see this request anymore</p>
            <p></p>
            <p>If you disagree, just click "I don't want to answer", and you will never see this request anymore</p>
            <p><strong>QUESTION: Would you be interested by buying a cheap Pro version of this plugin, with many advanced features?</strong></p>

            <p>(if you want to know more before answering, you can take a first look <a href="http://apmcrm2013.weproduceweb.com/blue_origami_crm_pro/" target='_blank'>BY CLICKING HERE</a>)</p>
            <p><span class="btn btn-success do_pollpro_yes">Yes</span> <span class="btn btn-info do_pollpro_no">No</span> | <span class="btn hide_pollpro">I don't want to answer, Hide this definitively</span></p>

        </div-->
    <?php } ?>

    <?php if ($alert !== '') { ?>
        <div class='alert'>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $alert; ?>
        </div>
    <?php } ?>

    <ul class="nav nav-tabs" id="myTab">
        <li class="active" ><a href="#modules"data-toggle="tab">Apps & Modules</a></li>
        <li><a href="#settings" data-toggle="tab">Settings</a></li>
        <li><a href="#categories" data-toggle="tab">Categories</a></li>
        <li><a href="#tags" data-toggle="tab">Tags</a></li>

        <?php if (isset($application['show_home_credit']) and $application['show_home_credit'] == true) { ?>
            <li><a href="#about" data-toggle="tab">About this system/plugin</a></li>

        <?php } ?>
    </ul>

    <div class="tab-content">
        <div class="active tab-pane well wellmedpadd" id="modules">
            <h5 class='option_section'>Modules for <?php echo $appLabel; ?></h5>
            <div id="apm_moduleslist" class="apm_settinglist">
                <h6 class=''>Main Modules</h6>
                <?php
                foreach ($oThis->applications[$appName]['modules'] as $k => $module) {

                    if (isset($module['roles_authorized']) and $module['roles_authorized'] != '') {
                        if (!$oThis->check_roles_authorized($module['roles_authorized']))
                            continue;
                    }

                    if (!isset($module['is_secundary']) or $module['is_secundary'] !== true) {
                        ?>
                        <span class='btn btnmargin apm_homebtnlist'>
                            <?php
                            $icon = '';
                            if (isset($module['icon'])) {
                                $icon = "<img src='" . $apm_settings['paths']['img'] . "/" . $module['icon'] . "' /> ";
                            }
                            ?>
                            <a class='hasTooltip'  title="See all <?php echo $module['name']; ?>" href='admin.php?page=<?php echo $appName . '-' . $k; ?>'> <?php echo $icon . ' ' . $module['name']; ?> </a></br>
                            <a  data-toggle="tooltip"  title="See all <?php echo $module['name']; ?>"  class='hasTooltip' href='admin.php?page=<?php echo $appName . '-' . $k; ?>'> <i class="icon-eye-open "></i> </a>
                            <a   data-toggle="tooltip"  title="Add <?php echo $module['singular_name']; ?>"  class='hasTooltip' href='post-new.php?post_type=<?php echo $k; ?>'> <i class="icon-plus "></i> </a>
                        </span>
                        <?php
                    }
                };
                ?>
                <span class='clearfix'></span>
                <h6 class=''>Other Modules</h6> <?php
                foreach ($oThis->applications[$appName]['modules'] as $k => $module) {

                    if (isset($module['roles_authorized']) and $module['roles_authorized'] != '') {
                        if (!$oThis->check_roles_authorized($module['roles_authorized']))
                            continue;
                    }

                    if (isset($module['is_secundary']) and $module['is_secundary'] == true) {
                        ?>
                        <span class='btn btnmargin apm_homebtnlist'>
                            <?php
                            $icon = '';
                            if (isset($module['icon'])) {
                                $icon = "<img src='" . $apm_settings['paths']['img'] . "/" . $module['icon'] . "' /> ";
                            }
                            ?>
                            <a class='hasTooltip'  title="See all <?php echo $module['name']; ?>" href='admin.php?page=<?php echo $appName . '-' . $k; ?>'> <?php echo $icon . ' ' . $module['name']; ?> </a></br>
                            <a  data-toggle="tooltip"  title="See all <?php echo $module['name']; ?>"   class='hasTooltip' href='admin.php?page=<?php echo $appName . '-' . $k; ?>'> <i class="icon-eye-open "></i> </a>
                            <a   data-toggle="tooltip"  title="Add <?php echo $module['singular_name']; ?>" class='hasTooltip' href='post-new.php?post_type=<?php echo $k; ?>'> <i class="icon-plus "></i> </a>
                        </span>
                        <?php
                    }
                };
                ?>

                <span class='clearfix'></span>
            </div>
            <h5 class='option_section'>All the Apps</h5>
            <div  class="apm_settinglist">
                <?php
                foreach ($oThis->applications as $k => $app) {
                    $setting_app_active = false;
                    if (current_user_can('administrator')) {
                        $setting_app_active = true;
                    }
                    if (isset($app ['option_isactive_name'])) {
                        $option_isactive_name = $app ['option_isactive_name'];
                        $isactive = get_option($option_isactive_name);
                        // var_dump($isactive);
                        if ($isactive !== 'off') {
                            $setting_app_active = true; //
                        }
                    }
                    if (isset($app ['active']) and $app ['active'] == false) {
                        $setting_app_active = false;
                    }

                    if ($setting_app_active == true) {
                        $cls = '';
                        if ($app['name'] == $appName) {
                            $cls = 'btn-info';
                        }
                        $tappName = $app['name'];
                        $appsingular_name = $app['singular_name'];
                        $appoptname = get_option($tappName . '_app_name');
                        if ($appoptname !== '' and $appoptname !== false and !empty($appoptname)) {
                            $appsingular_name = $appoptname;
                        }
                        ?>
                        <a  data-toggle="tooltip"  title="Open this App in the same window"  class='btn <?php echo $cls ?> hasTooltip apm_homebtnlist' href='admin.php?page=<?php echo $app['name'] ?>_home'><?php echo $appsingular_name ?></a>
                        <?php
                    }
                };
                ?>

                <span class='clearfix'></span>

            </div>

            <?php if ($oThis->applications["15CRM"]['is_pro'] !== true) { ?>

                <h5 class='option_section'>Latest activities / Dashboard</h5>
                <div  class="apm_settinglist">
                    "Latest activities / Dashboard"  panel will come as an extra feature in the next PRO VERSION of the system. Will list all the latest public activities or activities created by me or shared with me.
                </div>
                <div  class="wellads highlightpronotpro">YOU ARE USING THE FREE VERSION of <a href="http://apmcrm2013.weproduceweb.com/" target="_blank">BLUE ORIGAMI CRM System</a>
                    <br>   <p> The PRO Version based on this Free version has been stopped but the Free version will continue to have small improvement.
                        <a href='http://apmcrm2013.weproduceweb.com/' target="_blank" >More Infos</a>.
                        And a full new BLUE ORIGAMI PRO totally rebuild from zero to be much much better is in progress for maybe middle 2014.
                        <a href='http://apmcrm2013.weproduceweb.com/blue_origami_crm_pro' target="_blank" >PRO VERSION</a>.
                    </p>
                </div>
            <?php } else {
                ?>

                <h5 class='option_section'>Latest activities / Dashboard</h5>
                <div  class="apm_settinglist">
                    "Latest activities / Dashboard" panel will come as an extra feature in the PRO VERSION next release of the system. Will list all the latest public activities or activities created by me or shared with me.
                </div>
                <?php if (current_user_can('administrator')) { ?>
                    <div  class="wellads highlightpronotpro">
                        YOU ARE USING THE FREE VERSION of <a href="http://apmcrm2013.weproduceweb.com/" target="_blank">BLUE ORIGAMI CRM System</a>
                        <br>   The PRO Version based on this Free version has been stopped but the Free version will continue to have small improvement.
                        <a href='http://apmcrm2013.weproduceweb.com/' target="_blank" >More Infos</a>.
                        And a full new BLUE ORIGAMI PRO totally rebuild from zero to be much much better is in progress for maybe middle 2014.
                        <a href='http://apmcrm2013.weproduceweb.com/blue_origami_crm_pro' target="_blank" >PRO VERSION</a>.

                        <br><em>
                            (This banner is visible only to Admin)</em>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="tab-pane well wellmedpadd" id="settings">
            <?php
            if (isset($oThis->applications[$appName]['options_form'])) {
                if (current_user_can('administrator')) {
                    require_once APPLICATION_MAKER_PATH . 'views/' . $oThis->applications[$appName]['options_form'] . '.php'; //apm-home-options
                    //wp_die( __('You do not have sufficient permissions to access this page.') );
                } else {
                    ?>
                    Sorry, the Settings are only available for the Administrator.
                    <?php
                }
            } else {
                ?>
                Sorry, There is not settings for this App.
            <?php }
            ?>
        </div>
        <div class="tab-pane well wellmedpadd" id="categories">
            <?php
            if (current_user_can('administrator')) {
                $application = $oThis->applications[$appName];
                if (count($application['categories']) > 0) {
                    echo '<ul class="apm_homecategul">';
                    foreach ($application['categories'] as $catkey => $category) {
                        //add_submenu_page($key.'-main-menu',$category['name'], 'Category '.$category['menu_name'], 'administrator', $catkey, array($this, 'my_categories_redirect_do'));
                        echo "<li >";
                        // echo "---1 ". $category['menu_name'] ."  -2 ".$catkey."  -3 ".esc_url(add_query_arg(array('taxonomy' => $catkey), 'edit-tags.php'))."  - ";
                        $link = '<a   class="btn btn-small apm_homebtnlist" href="' . esc_url(add_query_arg(array('taxonomy' => $catkey), 'edit-tags.php')) . '"  title="Open the category ' . $category['menu_name'] . '">' . $category['menu_name'] . '</a>';
                        echo $link; //'Manage category '.$category['menu_name'];
                        echo "</li>";
                    };
                    echo '</ul>';
                }
            } else {
                ?>
                Sorry, only Administrators can manage the Categories.
            <?php } ?>
            <span class='clearfix'></span>
        </div>
        <div class="tab-pane well wellmedpadd" id="tags">
            <?php
            if (current_user_can('administrator')) {
                if (count($application['tags']) > 0) {
                    echo '<ul class="apm_homecategul">';
                    foreach ($application['tags'] as $catkey => $category) {
                        //add_submenu_page($key.'-main-menu',$category['name'], 'Category '.$category['menu_name'], 'administrator', $catkey, array($this, 'my_categories_redirect_do'));
                        echo "<li>";
                        // echo "---1 ". $category['menu_name'] ."  -2 ".$catkey."  -3 ".esc_url(add_query_arg(array('taxonomy' => $catkey), 'edit-tags.php'))."  - ";
                        $link = '<a  class="btn btn-small apm_homebtnlist" href="' . esc_url(add_query_arg(array('taxonomy' => $catkey), 'edit-tags.php')) . '"  title="Open the tags ' . $category['menu_name'] . '">' . $category['menu_name'] . '</a>';
                        echo $link; //'Manage category '.$category['menu_name'];
                        echo "</li>";
                    };
                    echo '</ul>';
                }
            } else {
                ?>
                Sorry, only Administrators can manage the Tags.
            <?php } ?>
            <span class='clearfix'></span>
        </div>

        <?php if (isset($application['show_home_credit']) and $application['show_home_credit'] == true) { ?>
            <div class="tab-pane well wellmedpadd" id="about">
                <?php
                require_once APPLICATION_MAKER_VIEWS_PATH . 'application-maker-help.php';
                ?>
            </div>
        <?php } ?>
    </div>
    <?php
// $appIntrotext;
    $categ_list = array();
    /**/