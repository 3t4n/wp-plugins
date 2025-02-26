<?php
require_once('apm-do_save_settings.php');
global $main_config;

//if (isset($_REQUEST['do_clearcache'])) {
?>
<script type="text/javascript">

    $.get(ajaxurl+'?action=apm_extensions&subaction=get_extensions_files&type=js&clearcache=false');
    $.get(ajaxurl+'?action=apm_extensions&subaction=get_extensions_files&type=css&clearcache=false');
    $.get(ajaxurl+'?action=apm_extensions&subaction=get_extensions_files&type=views&clearcache=false');
</script>
<?php
//}

if (isset($_POST)) {
    //var_dump($_POST);
}

if (isset($_POST['dosubmitsmtp'])) {
    $validsmtp = true;
    $ori_smtp_host = $_POST['ori_smtp_host'];
    if ($ori_smtp_host == '') {
        $validsmtp = false;
    }
    update_option('ori_smtp_host', $ori_smtp_host);

    $ori_smtp_port = $_POST['ori_smtp_port'];
    update_option('ori_smtp_port', $ori_smtp_port);

    $ori_smtp_username = $_POST['ori_smtp_username'];
    if ($ori_smtp_username == '') {
        $validsmtp = false;
    }
    update_option('ori_smtp_username', $ori_smtp_username);

    $ori_smtp_psw = $_POST['ori_smtp_psw'];
    if ($ori_smtp_psw == '') {
        $validsmtp = false;
    }
    update_option('ori_smtp_psw', $ori_smtp_psw);
}
?>
<div class="wrap wrpapm">


    <h2><?php echo $args['page_type_label']; ?></h2>
    <div class="well wellmedpadd" id="15CRM_topintrotext">
        <p></p><h4>Welcome to <?php echo $main_config['plugin_generic_name']; ?>.</h4>
        This is the page to define the main settings for Blue Origami.
        <br>For the sub settings for each  application please report to each application Home Page.
        <p></p>
        <span class="neveragain topintrotext_closealways">× Close and never see this anymore?</span>
        <span class="neveragain topintrotext_close">× Close</span>
        <span class="clearfix"></span>
    </div>

    <div class="alert alert-block ">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>You have just installed our plugin <?php echo $main_config['plugin_generic_name']; ?>, please fill the initial settings required</h4>
        <h5>Please be sure to input the Email SMTP settings below, in order to have the notifications working.</h5>
        <p></p>
    </div>
    <?php
    if (isset($_POST['dosubmitsmtp'])) {
        if ($validsmtp == false) {
            ?>
            <div class="alert alert-block ">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h5><i class="icon-fire"></i> Some settings for Email SMTP settings are still empty, please fill all of them. !</h5>
                <p></p>
            </div>
            <?php } else {
            ?>
            <div class="alert alert-info ">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h5><i class="icon-ok"></i> Email SMTP settings updated.</h5>
                <p></p>
            </div>
            <?php
        }
    }
    ?>
    <ul class="nav nav-tabs" id="myTab">
        <!--li class="active"><a href="#licence" data-toggle="tab"> <?php echo $main_config['plugin_generic_name']; ?> PRO Licence</a></li-->
        <li class="active"><a href="#settingssmtp" data-toggle="tab">Email SMTP Settings</a></li>
        <li><a href="#settings" data-toggle="tab">Generic Settings</a></li>
          <!--li><a href="#apps" data-toggle="tab"> <?php echo $main_config['plugin_generic_name']; ?> Apps Privacy</a></li-->
        <li><a href="#about" data-toggle="tab">About this system/plugin</a></li>

    </ul>

    <div class="tab-content">

        <div class=" tab-pane well wellmedpadd" id="apps">
            <h5 class="option_section">Apps available in Blue Origami</h5>
            <h5 class="option_section">Define Apps Privacy by Roles</h5>
        </div>

        <!--div class="active tab-pane well wellmedpadd" id="licence">
            <h5 class="option_section"> <?php echo $main_config['plugin_generic_name']; ?> PRO LICENCE</h5>
            <p>To come soon. Will allow to enter your PRO licence to benefit of more advanced UI and features and get extra PRO addons and modules</p>
        </div-->

        <div class="active tab-pane well wellmedpadd" id="settingssmtp">
            <h5 class="option_section">Email SMTP Settings</h5>
            <div class="tab-pane settingtabcontent active" >
                <div class='alert alert-block '><h5>Please be sure to input all those settings, in order to have the notification system to work.</h5></div>

                <form method="post" action="" id="settingformsmtp">
                    <input type="hidden" name='dosubmitsmtp' value='dosubmitsmtp' />
                    <ul>
                        <li class='row-fluid'>
                            <span class="span2"><label>Host: </label></span>
                            <span class="span10"><input name="ori_smtp_host" class="span12" value="<?php echo get_option("ori_smtp_host"); ?>" type="text"></span>
                        </li>
                        <li class='row-fluid'>
                            <span class="span2"><label>Port: </label></span>

                            <span class="span10">
                                <select name="ori_smtp_port" class="span12">
                                    <option value="465" <?php
    if (get_option("ori_smtp_port") == "465") {
        echo ' selected="selected" ';
    }
    ?>>465</option>
                                    <option value="25" <?php
                                    if (get_option("ori_smtp_port") == "25") {
                                        echo ' selected="selected" ';
                                    }
    ?>>25</option>
                                    <option value="587" <?php
                                    if (get_option("ori_smtp_port") == "587") {
                                        echo ' selected="selected" ';
                                    }
    ?>>587</option>
                                    <option value="475" <?php
                                    if (get_option("ori_smtp_port") == "475") {
                                        echo ' selected="selected" ';
                                    }
    ?>>475</option>
                                    <option value="2525" <?php
                                    if (get_option("ori_smtp_port") == "2525") {
                                        echo ' selected="selected" ';
                                    }
    ?>>2525</option>
                                </select>
                            </span>
                            <span>Note: the most usual ports are 465 if using SSL security, or 25 for non secured.</span>
                        </li>
                        <li class='row-fluid'>
                            <span class="span2"><label>Username: </label></span>
                            <span class="span10"><input name="ori_smtp_username" class="span12" value="<?php echo get_option("ori_smtp_username"); ?>" type="text"></span>
                        </li>
                        <li class='row-fluid'>
                            <span class="span2"><label>Password: </label></span>
                            <span class="span10"><input name="ori_smtp_psw" class="span12" value="<?php echo get_option("ori_smtp_psw"); ?>" type="text"></span>
                        </li>
                    </ul>
                </form>
                <span class="btn btn-info do_submit_settings_smtp">Update SMTP Settings</span>

            </div>
        </div>

        <div class=" tab-pane well wellmedpadd" id="settings">
            <h5 class="option_section">Admin Profile Settings</h5>
            <h5 class="option_section">Generic Settings</h5>


            <div class="tab-pane settingtabcontent active" id="tabid_1">
                <!--ul>
                    <li class='row-fluid'>
                        <span class="span2"><label>Generic Display Language: </label></span>
                        <!--span class="span10"><input name="ori_lang_name" class="span12" value="" type="text"></span>


                        <div class="apm_settings_note">NOTE: The language you Select here will be applied for ALL the users.</div>
                    </li>
                    <li>
                        <div class='row-fluid'>
                            <span class="span5"><label>Activate  <?php echo $main_config['plugin_generic_name']; ?> Wordpress menu for non admin users? : </label></span>
                            <span class="span7"><input name="ori_generic_active" checked="checked" type="checkbox"></span>
                        </div>
                        <div class="apm_settings_note">NOTE: If you uncheck then tis menu will be hidden for NON ADMIN users only.</div>
                    </li>
                    <li>
                    </li>
                </ul-->

                <span class="btn btn-info do_submit_settings">Update Settings</span>
                <p></p>
                <h5 class="">For developpers:</h5>
                <span class="btn btn-info do_clear_cache">Clear Cache</span>
            </div>
        </div>

        <div class=" tab-pane well wellmedpadd" id="about">
            <?php
            require_once APPLICATION_MAKER_VIEWS_PATH . 'application-maker-help.php';
            ?>
        </div>
    </div>
</div>
