<?php
$toke_byte = random_bytes(16);
$csrf_token = bin2hex($toke_byte);
$_SESSION['secure_token'] = $csrf_token;
?>
<ol class="breadcrumb">
    <li><a href="http://<?php echo $siteDomain ?>/summaries?ui_medium=service&ui_source=userheat&ui_campaign=wp-admin" target="_blank"><?php _e('Admin', $pluginName) ?></a></li>
    <li><a href="http://<?php echo $siteDomain ?>/stage/help?ui_medium=service&ui_source=userheat&ui_campaign=wp-admin" target="_blank"><?php _e('Help', $pluginName) ?></a></li>
    <li><a href="http://<?php echo $siteDomain ?>/?ui_medium=service&ui_source=userheat&ui_campaign=wp-admin" target="_blank"><?php _e('Website', $pluginName) ?></a></li>
    <li><a href="http://www.userlocal.jp/?ui_medium=service&ui_source=userheat&ui_campaign=wp-admin" target="_blank"><?php _e('About us', $pluginName) ?></a></li>
</ol>

<div class="content">
    <div class="clearfix">
        <h1 class="pull-left"><img src="<?php echo plugins_url('userheat') ?>/img/logo.png" alt="UserHeatPlugin" width="220"></h1>
        <?php if (!empty($groupid)) : ?>
            <a class="pull-right" href="http://<?php echo $siteDomain ?>/summaries" target="_blank"><button type="button" class="btn btn-warning admin_button"><?php _e('Check report', $pluginName) ?></button></a>
        <?php endif; ?>
    </div>

    <?php if (empty($groupid)) : ?>
        <div class="alert alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php _e('Pelese, set your Site ID.', $pluginName) ?>
        </div>
    <?php endif; ?>

    <?php if (isset($message)) : ?>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message ?>
        </div>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><?php _e('about UserHeat', $pluginName) ?></h2>
        </div>
        <div class="panel-body">
            <?php _e('You can check your site heatmap data by free', $pluginName) ?><br>
            <?php _e('This plug-ins by using, you can see whether the user with a heat map is viewing how the WEB site.', $pluginName) ?><br>
            <?php _e('Use of this tool is free. It does not have to be arbitrarily charged.', $pluginName) ?><br>
            <h3><?php _e('Heat map that can be viewed by this plug-in', $pluginName) ?></h3>

            <div class="panel panel-info">
                <ul class="nav nav-tabs nav-pills">
                    <li class="nav-item">
                        <a href="#tab1" data-toggle="tab" class="nav-link active"><?php _e('perusal area', $pluginName) ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab2" data-toggle="tab" class="nav-link"><?php _e('click area', $pluginName) ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab3" data-toggle="tab" class="nav-link"><?php _e('mouse move', $pluginName) ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab4" data-toggle="tab" class="nav-link"><?php _e('end area', $pluginName) ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab5" data-toggle="tab" class="nav-link"><?php _e('leave area', $pluginName) ?></a>
                    </li>
                </ul>
                <div class="tab-content panel-body">
                    <div id="tab1" class="tab-pane active row">
                        <div class="col-md-3">
                            <img src="<?php echo plugins_url('userheat') ?>/img/kind_heatmap/gaze.png" alt="" width="300px" class="img-fluid">
                        </div>
                        <div class="col-md-4">
                            <?php _e('Visualize how much attention a specific area gets.', $pluginName) ?><br>
                            <?php _e('The parts which are often seen becomes red.', $pluginName) ?><br>
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane">
                        <div class="col-md-3">
                            <img src="<?php echo plugins_url('userheat') ?>/img/kind_heatmap/click.png" alt="" width="300px" class="img-fluid">
                        </div>
                        <div class="col-md-4">
                            <?php _e('Click Heatmap shows you what is being clicked on your site', $pluginName) ?><br>
                            <?php _e('Among the click of this page, it displays focuses only on "where you click on the user last".', $pluginName) ?><br>
                        </div>
                    </div>
                    <div id="tab3" class="tab-pane">
                        <div class="col-md-3">
                            <img src="<?php echo plugins_url('userheat') ?>/img/kind_heatmap/mousemove.png" alt="" width="300px" class="img-fluid">
                        </div>
                        <div class="col-md-4">
                            <?php _e('Find out exactly what visitors are looking at and what they focus on within your webpages, based on their mouse movements', $pluginName) ?><br>
                            <?php _e('By looking at more than one person of the movement at the same time, the tendency of the user browsing behavior on this page will be clear.', $pluginName) ?><br>
                        </div>
                    </div>
                    <div id="tab4" class="tab-pane">
                        <div class="col-md-3">
                            <img src="<?php echo plugins_url('userheat') ?>/img/kind_heatmap/endarea.png" alt="" width="300px" class="img-fluid">
                        </div>
                        <div class="col-md-4">
                            <?php _e('Find out exactly how far your visitors scroll, and what point visitors abandon the page.', $pluginName) ?><br>
                            <?php _e('Width and the percent of the numbers, how much of the user shows what was seen up to that location.', $pluginName) ?><br>
                        </div>
                    </div>
                    <div id="tab5" class="tab-pane">
                        <div class="col-md-3">
                            <img src="<?php echo plugins_url('userheat') ?>/img/kind_heatmap/withdrawal.png" alt="" width="300px" class="img-fluid">
                        </div>
                        <div class="col-md-4">
                            <?php _e('Page via the use of an area separated for each fixed height, which area shows what withdrawal often.', $pluginName) ?><br>
                            <?php _e('To leave closer to the warm colors (red, etc.) has become the area percentage of users is large.', $pluginName) ?><br>
                            <?php _e('If there is a red area, there might be a problem with the content of that part.', $pluginName) ?><br>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><?php _e('Installation', $pluginName) ?></h2>
        </div>
        <div class="panel-body">
            <ul>
                <li>
                    <?php _e('1. Free registration from', $pluginName) ?>
                    <span class="regist-link">
                        <a href="http://<?php echo $siteDomain ?>/?ui_medium=service&ui_source=userheat&ui_campaign=wp-admin" target="_blank"><?php _e('here.', $pluginName) ?></a>
                    </span>
                    <?php _e('(Registered after login required.)', $pluginName) ?>
                </li>
                <li><?php _e('2. Get site ID from `Create HTML Tag` page after log in', $pluginName) ?></li>
                <li><?php _e('3. Register site ID in below form.', $pluginName) ?></li>
                <?php if (!empty($permalinkParam)) : ?>
                    <li>
                        <?php _e('4. Set the URL parameter to be measured from the setting page below.', $pluginName) ?><br>
                        <?php _e('Click the "Change the site\'s setting" button as it is.', $pluginName) ?><br>
                        <?php _e('If you do not do these operations, only the top page will be measured.', $pluginName) ?><br>
                        <a href="https://userheat.com/users/config?formInsertParams=<?php echo wp_strip_all_tags($permalinkParam) ?>#url_params"><?php _e('config page', $pluginName) ?></a>
                    </li>
                    <li>
                        <?php echo !empty($permalinkParam) ? '5.' : '4.'; ?>
                        <?php _e('Complete your registration.', $pluginName) ?><br>
                        <?php _e('* will automatically start the measurement by this configuration tasks. "Embedded work of analysis tag" is not necessary.', $pluginName) ?>
                    </li>
                <?php endif ?>
            </ul>
            <br>
            <?php _e('You can check the heatmap report when access data is accumulated.', $pluginName) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><?php _e('ID registration', $pluginName) ?></h2>
        </div>
        <div class="panel-body">
            <form method="POST" action="admin.php?page=userheat%2Fuserheat.php">
                <input type="hidden" name="secure_token" value="<?php echo $csrf_token ?>">
                <label><?php _e('Site ID') ?></label>
                <input type="text" name="groupid" value="<?php echo htmlspecialchars($groupid, ENT_QUOTES) ?>" class="form-control form-groupid" placeholder="<?php _e('Site ID') ?>" maxlength="10"><br>
                <p><?php _e('* If you set invalid ID, UserHeat does not work.', $pluginName) ?></p>
                <input type="submit" value="<?php _e('registration', $pluginName) ?>" class="btn btn-success form-submit">
                <a href="<?php _e('http://en.userheat.com/groups/show_id', $pluginName) ?>" target="_blank"><?php _e('Show your Site ID.', $pluginName) ?></a>
            </form>
        </div>
    </div>

    <?php if ('ja' === get_locale()) : ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">有料版のご案内</h2>
            </div>
            <div class="panel-body">
                <div class="col-sm-7">
                    <p>UserHeatを提供するユーザーローカルでは、より高機能な企業向けアクセス解析ツールUserInsightを提供しています。<br><br>
                        ヒートマップだけではなくアクセス状況の把握ができ、期間や条件に応じたヒートマップの絞り込み表示も可能です。
                        UserHeatで行っていない、技術サポートもございます。</p><br>

                    <a class="ui-link" href="http://ui.userlocal.jp/?ui_medium=service&ui_source=userheat&ui_campaign=wp-admin-pr1" target="_blank">サービス概要</a><br>
                    <a class="ui-link" href="http://ui.userlocal.jp/download/new/?ui_medium=service&ui_source=userheat&ui_campaign=wp-admin-pr2" target="_blank">資料ダウンロード</a><br>
                </div>
                <a class="col-sm-5" href="http://ui.userlocal.jp/?ui_medium=service&ui_source=userheat&ui_campaign=wp-admin-pr3" target="_blank"><img src="<?php echo plugins_url('userheat') ?>/img/uipr.png" width="350px"></a><br>
            </div>
        </div>
    <?php endif; ?>

    <div class="clearfix">
        <span class="pull-right">
            <a href="http://www.userlocal.jp/?ui_medium=service&ui_source=userheat&ui_campaign=wp-admin" target="_blank"><img src="<?php echo plugins_url('userheat') ?>/img/producedby.png" width="280"></a>
        </span>
    </div>
</div>
