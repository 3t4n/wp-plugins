<?php
    if (!empty($_POST)) {
        global $wpdb;
        extract($_POST);

        if($action == 'add_pub_id') {
            setPubId($pub_id, $token);
            echo '<script>window.location="admin.php?page=add_banner_ad"</script>';
        }
        exit;
    }

    $ads_banners = getBanners();
?>

<script type="text/javascript" src="<?php echo plugin_dir_url(__FILE__) ?>3rd/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo plugin_dir_url(__FILE__) ?>3rd/ace/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo plugin_dir_url(__FILE__) ?>3rd/magnific-popup/jquery.magnific-popup.min.js" type="text/javascript" charset="utf-8"></script>
<link href="<?php echo plugin_dir_url(__FILE__) ?>3rd/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<link href="<?php echo plugin_dir_url(__FILE__) ?>3rd/magnific-popup/magnific-popup.css" rel="stylesheet"/>
<link href="<?php echo plugin_dir_url(__FILE__) ?>css/style.css" rel="stylesheet"/>

<div class="modal fade" id="codeModal" role="dialog" aria-labelledby="codeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="codeModalLabel">How to place a banner on your Wordpress page</h4>
            </div>
            <div class="modal-body">
                <div class="row-fluid">
                    <p style="text-align: center;"><a href="https://www.youtube.com/watch?v=WvGsRrBtE2c" class="btn btn-primary" target="_blank"><span class="dashicons dashicons-video-alt3"></span> Watch Tutorial on How to Place Ad</a></p>
                    <p>
                        <span style="color:green">Step 1</span>: To place a banner on your page, copy the Placement Code from your banner below.
                        <br><br>
                        <span style="color:green">Step 2</span>: Then in your Wordpress Admin navigation, click on <b>Appearance</b> and then <b>Widgets</b>.
                        <br><br>
                        <span style="color:green">Step 3</span>: Next, drag and drop the <b>Text Widget</b> to the spot where you would like to see the ads appear (sidebar, header, body, or footer).
                        <br><br>
                        <span style="color:green">Step 4</span>: Inside the text widget, paste your placement code then save.<br>
                    </p>
                    <div class="span12">
                        <textarea id="paste_code" style="width:100%; height: 70px;"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid padded">

    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-header">
                    <span class="title">CPAlead</span>
                    <?php if($pub_id > 0) { ?>
                        <span class="title_right">Publisher ID: <b><i class="glyphicon glyphicon-user"></i> <?php echo $pub_id; ?></b> <a href="admin.php?page=set_pub_id">[Change]</a></span>
                    <?php } ?>
                </div>
                <div class="box-content padded">
                    <p>CPAlead will display high performing targeted ads to your visitor based on your visitor's location and device (desktop, iOS, Android) they are using.</p>
                    <p>You will earn revenue when your visitor interacts with an ad.</p>

                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation">
                            <div class="span2 action-nav-button">
                                <a href="#template" aria-controls="custom" role="tab" data-toggle="tab">
                                    <i class="dashicons dashicons-format-image"></i>
                                    <span>Banner</span>
                                </a>
                            </div>
                        </li>
                        <li role="presentation">
                            <div class="span2 action-nav-button">
                                <a href="#custom" aria-controls="custom" role="tab" data-toggle="tab">
                                    <i class="dashicons dashicons-editor-code"></i>
                                    <span>CustomAd</span>
                                </a>
                            </div>
                        </li>
                        <li role="presentation">
                            <div class="span2 action-nav-button">
                                <a href="#pop_under" aria-controls="pop_under" role="tab" data-toggle="tab">
                                    <i class="dashicons dashicons-format-gallery"></i>
                                    <span>Pop Under</span>
                                </a>
                            </div>
                        </li>
                        <li role="presentation">
                            <div class="span2 action-nav-button">
                                <a href="#interstitial" aria-controls="interstitial" role="tab" data-toggle="tab">
                                    <i class="dashicons dashicons-feedback"></i>
                                    <span>Interstitial</span>
                                </a>
                            </div>
                        </li>

                        <li role="presentation">
							<div class="span2 action-nav-button">
						      	<a href="#superlink" aria-controls="superlink" role="tab" data-toggle="tab">
						        	<i class="dashicons dashicons-admin-links"></i>
						        	<span>Superlink</span>
						      	</a>
						    </div>
						</li>
					
						<li role="presentation">
							<div class="span2 action-nav-button">
						      	<a href="#push_up" aria-controls="push_up" role="tab" data-toggle="tab">
						        	<i class="dashicons dashicons-megaphone"></i>
						        	<span>PushUp</span>
						      	</a>
						    </div>
						</li>

                        <li role="presentation">
                            <div class="span2 action-nav-button">
                                <a href="#locker" aria-controls="locker" role="tab" data-toggle="tab">
                                    <i class="dashicons dashicons-lock"></i>
                                    <span>Locker</span>
                                </a>
                            </div>
                        </li>

                        <li role="presentation">
                            <div class="span2 action-nav-button">
                                <a href="#offerwall" aria-controls="offerwall" role="tab" data-toggle="tab">
                                    <i class="dashicons dashicons-image-filter"></i>
                                    <span>OfferWall</span>
                                </a>
                            </div>
                        </li>

                        <li style="float:right">
                            <div class="span2 action-nav-button">
                                <a href="admin.php?page=earnings_ads">
                                    <i class="dashicons dashicons-chart-line" aria-hidden="true"></i>
                                    <span>Earnings</span>
                                </a>
                            </div>
                        </li>
                        <li style="float:right">
                            <div class="span2 action-nav-button">
                                <a href="admin.php?page=rates">
                                    <i class="dashicons dashicons-info" aria-hidden="true"></i>
                                    <span>Rates</span>
                                </a>
                            </div>
                        </li>
                        <li style="float:right">
                            <div class="span2 action-nav-button">
                                <a href="http://blog.cpalead.com/category/display-ads/" target="_blank">
                                    <i class="dashicons dashicons-sos" aria-hidden="true"></i>
                                    <span>Help</span>
                                </a>
                            </div>
                        </li>
                        <li style="float:right">
                            <div class="span2 action-nav-button">
                                <a href="admin.php?page=manage_ads">
                                    <i class="dashicons dashicons-admin-generic" aria-hidden="true"></i>
                                    <span>Manage</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid padded">

    <?php if($pub_id=='' || $pub_id < 1) { ?>
        <div class="row-fluid">
            <div class="span12">
                <div class="box">
                    <div class="box-header">
                        <span class="title"><i class="dashicons dashicons-warning"></i> Set your Publisher ID from CPAlead</span>
                    </div>
                    <div class="box-content padded">
                        <div class="row" style="margin: 0">
                            <form method="post">
                                <input type="hidden" name="action" value="add_pub_id">
                                <p>To create new ad, you need to set your publisher id and token. Enter you Publisher ID:</p>
                                <input style="width: 250px" type="text" name="pub_id" placeholder="Publisher ID" required value="<?php echo $pub_id; ?>"/>
                                <p><small>Log into your CPAlead publisher account. This number will be in the upper right corner of your publisher dashboard.</small></p>
                                <p>Enter you Token:</p>
                                <input style="width: 250px" type="text" name="token" placeholder="Token key" required value="<?php echo $token; ?>"/> <input type="submit" value="Save" class="button">
                                <p><small>Token key is available on <a href="https://www.cpalead.comhttps://www.cpalead.com/dashboard/banners/manage.php" target="_blank">Manage Ads page</a>. This number will be in the upper right corner of 'Manage Ads' panel.</small></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } else { ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="box">
                    <div class="box-header">
                        <span class="title">Ad Settings</span>
                    </div>
                    <div class="box-content padded">

<div class="tab-content">
    <div role="tabpanel" class="tab-pane <?php if($_GET['page'] == 'add_banner_ad') { ?>active<?php } ?>" id="template" style="padding: 5px">                    
                        <div class="row" style="margin: 0">
                                <div class="span4 banner-size">

                                    <h5>Choose banner size:</h5>
                                    <div class="accordion-group">
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option1" autocomplete="off" value="1"> 336x280
                                        </label>
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option2" autocomplete="off" value="2"> 300x250
                                        </label>
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option3" autocomplete="off" value="3"> 728x90
                                        </label>
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option4" autocomplete="off" value="4"> 300x600
                                        </label>
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option5" autocomplete="off" value="5"> 300x100
                                        </label>
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option6" autocomplete="off" value="6"> 468x60
                                        </label>
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option7" autocomplete="off" value="7"> 250x250
                                        </label>
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option8" autocomplete="off" value="8"> 160x600
                                        </label>
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option9" autocomplete="off" value="9"> 120x600
                                        </label>
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option11" autocomplete="off" value="11"> 240x400
                                        </label>
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option12" autocomplete="off" value="12"> 234x60
                                        </label>
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option13" autocomplete="off" value="13"> 180x150
                                        </label>
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option14" autocomplete="off" value="14"> 125x125
                                        </label>
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option10" autocomplete="off" value="10"> 120x240 (1 Ad)
                                        </label>
                                        <label class="accordion-heading">
                                            <input type="radio" name="banner_type" class="banner_type" id="option15" autocomplete="off" value="15"> 120x240 (2 Ads)
                                        </label>
                                    </div>
                                    <br>
                                    <button class="btn btn-warning get_code" style="width: 49%; display: none" onclick="edit_banner();" data-template="">Edit banner</button>
                                    <button class="btn btn-primary get_code" style="width: 49%; display: none" data-toggle="modal" data-target="#codeModal" data-template="">Place banner</button>
                                </div>

                                <div class="span1"></div>
                                <div class="span7">
                                    <h5>Banner preview:</h5>
                                    <div class="banner-loading">
                                        <i class="fa fa-spin fa-spinner fa-2x" style="vertical-align: middle;"></i> Loading previews...
                                    </div>
                                    <div class="banner-preview">
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=1&type=1" id="iframe_1" style="display:none;border:none;overflow:hidden;width:336px;height:280px"></iframe>
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=2&type=1" id="iframe_2" style="display:none;border:none;overflow:hidden;width:300px;height:250px"></iframe>
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=3&type=1" id="iframe_3" style="display:none;border:none;overflow:hidden;width:728px;height:90px"></iframe>
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=4&type=1" id="iframe_4" style="display:none;border:none;overflow:hidden;width:300px;height:600px"></iframe>
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=5&type=1" id="iframe_5" style="display:none;border:none;overflow:hidden;width:300px;height:100px"></iframe>
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=6&type=1" id="iframe_6" style="display:none;border:none;overflow:hidden;width:468px;height:60px"></iframe>
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=7&type=1" id="iframe_7" style="display:none;border:none;overflow:hidden;width:250px;height:250px"></iframe>
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=8&type=1" id="iframe_8" style="display:none;border:none;overflow:hidden;width:160px;height:600px"></iframe>
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=9&type=1" id="iframe_9" style="display:none;border:none;overflow:hidden;width:120px;height:600px"></iframe>
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=10&type=1" id="iframe_10" style="display:none;border:none;overflow:hidden;width:120px;height:240px"></iframe>
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=11&type=1" id="iframe_11" style="display:none;border:none;overflow:hidden;width:240px;height:400px"></iframe>
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=12&type=1" id="iframe_12" style="display:none;border:none;overflow:hidden;width:234px;height:60px"></iframe>
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=13&type=1" id="iframe_13" style="display:none;border:none;overflow:hidden;width:180px;height:150px"></iframe>
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=14&type=1" id="iframe_14" style="display:none;border:none;overflow:hidden;width:125px;height:125px"></iframe>
                                        <iframe src="<?php echo BANNERS_URL; ?>?pid=<?= $pub_id; ?>&test=1&bid=15&type=1" id="iframe_15" style="display:none;border:none;overflow:hidden;width:120px;height:240px"></iframe>
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/o6uBEt_9GCc?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen style="margin-top: 20px; width: 100%"></iframe>
                                    </div>
                                </div>
                            </div>
    </div>

                        <div role="tabpanel" class="tab-pane <?php if($_GET['page'] == 'add_custom_ad') { ?>active<?php } ?>" id="custom">
                            <div class="row span12" style="margin: 0">
                                <div class="span6 jumbotron">
                                    <h3>Create a Custom Ad</h3>
                                    <h5>Choose banner size:</h5>
                                    <select class="form-control" id="rows" name="rows" required="" style="width:150px">
                                        <option disabled selected>Number of rows</option>
                                        <?php for($i=1; $i<51; $i++) { ?>
                                            <option value="<?= $i; ?>"><?= $i; ?> rows</option>
                                        <?php } ?>
                                    </select>

                                    <select class="form-control" id="columns" name="columns" required="" style="width:150px">
                                        <option disabled selected>Number of columns</option>
                                        <?php for($i=1; $i<11; $i++) { ?>
                                            <option value="<?= $i; ?>"><?= $i; ?> columns</option>
                                        <?php } ?>
                                    </select>

                                    <button class="btn btn-sm btn-green" style="margin-bottom: 10px" onclick="generate_banner(2);">Generate code</button>
                                    <div class="custom_banner_area">
                                        <h5>Set iFrame size</h5>
                                        <form action="<?php echo BANNERS_URL; ?>?preview=1" method="POST" target="_newtab" style="display: inline;">
                                            <input type="hidden" name="preview_html" id="preview_html">
                                            <input type="hidden" name="preview_css" id="preview_css">
                                            <input type="text" class="form-control" placeholder="Width size" name="width" id="width" style="max-width: 90px" value="800">
                                            <select class="form-control" id="w_type" name="w_type" style="max-width: 56px">
                                                <option value="px" selected>px</option>
                                                <option value="pe">%</option>
                                            </select>
                                            <input type="text" class="form-control" placeholder="Height size" name="height" id="height" style="max-width: 90px" value="300">
                                            <select class="form-control" id="h_type" name="h_type" style="max-width: 56px">
                                                <option value="px" selected>px</option>
                                                <option value="pe">%</option>
                                            </select>
                                            <button class="btn btn-sm btn-green" style="margin-bottom: 10px;" onclick="view_preview(2);">View Preview</button>
                                        </form>
                                        <h5>Ad Name</h5>
                                        <form action="<?php echo API_URL; ?>?q=add" method="POST" style="display: inline;">
                                            <input type="hidden" name="pub_id" value="<?php echo $pub_id; ?>">
                                            <input type="hidden" name="token" value="<?php echo $token; ?>">
                                            <input type="hidden" name="return_url_success" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads&message=added">
                                            <input type="hidden" name="return_url_error" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads">
                                            <input type="hidden" name="b_type" value="2">
                                            <input type="hidden" name="b_width" id="b_width">
                                            <input type="hidden" name="b_height" id="b_height">
                                            <input type="hidden" name="b_w_type" id="b_w_type">
                                            <input type="hidden" name="b_h_type" id="b_h_type">
                                            <input type="text" class="form-control" placeholder="Enter banner name" name="name" id="name" style="width: 100%; max-width: 305px" required="">

                                            <button class="btn btn-sm btn-green" style="margin-bottom: 10px" onclick="preparing_save(2);">Save Ad</button>
                                    </div>
                                </div>
                                <div class="span5">
                                    <iframe width="480" height="255" src="https://www.youtube.com/embed/EYZYmOS2F9Q?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen style="margin: 0 auto; display: block;"></iframe>
                                </div>
                            </div>
                            <div class="span12 jumbotron" style="margin-top: 30px">
                                        <div class="span6">
                                            <p>Custom HTML code</p>
                                            <div id="html_editor"></div>
                                            <input type="hidden" id="html" name="html">
                                        </div>
                                        <div class="span5">
                                            <p>Custom CSS code</p>
                                            <div id="css_editor"></div>
                                            <input type="hidden" id="css" name="css">
                                        </div>
                                    </form>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane <?php if($_GET['page'] == 'add_pop_under_ad') { ?>active<?php } ?>" id="pop_under">
                            <div class="row span12" style="margin: 0">
                                <div class="span6 jumbotron">
                                    <h3>Create a Pop Under</h3>
                                    <p>When your visitor clicks on a link that triggers a pop under ad on your website, the pop under ad will appear and you will earn money. Below, please select how you want the pop under ad to open.</p>
                                </div>
                                <div class="span6">
                                    <iframe width="480" height="255" src="https://www.youtube.com/embed/breTzrSU-FQ?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen style="margin: 0 auto; display: block;"></iframe>
                                </div>
                            </div>

                            <div class="row span12 jumbotron" style="margin: 0">
                                <div class="pop_under_area span6">
                                    <form action="<?php echo API_URL; ?>?q=add" method="POST" style="display: inline;">
                                        <input type="hidden" id="template_id">
                                        <input type="hidden" name="pub_id" value="<?php echo $pub_id; ?>">
                                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                                        <input type="hidden" name="return_url_success" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads&message=added">
                                        <input type="hidden" name="return_url_error" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads">

                                        <h5>Open this Ad in</h5>
                                        <select class="form-control" id="target" name="target" required="" style="width: 100%;">
                                            <option value="1" selected>Open ad in current tab and open destination page in new tab</option>
                                            <option value="2">Open ad in new tab and open destination page in current window</option>
                                            <option value="3">Open current page in new tab and open ad on current page (best for videos)</option>
                                        </select>
                                        
                                        <h5>CSS class for click event</h5>
                                        <input type="text" class="form-control" placeholder="class-name" name="class" id="class" style="width: 100%;" required="">

                                        <h5>Pop Under Name</h5>
                                        <input type="hidden" name="b_type" value="3">
                                        <input type="hidden" name="b_width" id="b_width">
                                        <input type="hidden" name="b_height" id="b_height">
                                        <input type="hidden" name="b_w_type" id="b_w_type">
                                        <input type="hidden" name="b_h_type" id="b_h_type">
                                        <input type="hidden" name="pop_under_type" id="pop_under_type" value="1">
                                        <input type="text" class="form-control" placeholder="Enter banner name" name="name" id="name" style="width: 100%; max-width: 380px" required="">
                                        <button class="btn btn-sm btn-green" style="margin-bottom: 10px" onclick="preparing_save(3);">Save Pop Under</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane <?php if($_GET['page'] == 'add_interstitial_ad') { ?>active<?php } ?>" id="interstitial">
                            <div class="span12">
                                <div class="span6 jumbotron">
                                    <input type="hidden" id="template_id">
                                    <h3>Create an Interstitial Ad</h3>
                                    <p>When your visitor clicks on a link that triggers an interstitial, they will be required to view a list of ads before they can access your webpage. If your visitor interacts with an ad, you will earn money.</p>
                                </div>
                                <div class="span6">
                                    <iframe width="480" height="255" src="https://www.youtube.com/embed/SEp4X9HEW5I?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen style="margin: 0 auto; display: block"></iframe>
                                </div>
                            </div>

                            <div class="span12" style="padding: 0 40px">
                                <h5>Select a Template:</h5>

                                <ul id="thumbs" class="theme-set">
                                    <li class="theme-thumbnails selected" data-theme-name="interstitial_6">
                                        <a class="linklocker--inline-block" href="https://www.cpalead.com/dashboard/banners/images/interstitial_adjustable.jpg" style="background-image:url('https://www.cpalead.com/dashboard/banners/images/interstitial_adjustable.jpg');" title="Adjustable Desktop interstitial">
                                            <span class="name">Adjustable Desktop interstitial</span>
                                        </a>
                                        <button class="btn btn-inverse" type="button" data-theme="interstitial_6" onclick="set_template(4,6)">Use Theme</button>
                                    </li>

                                    <li class="theme-thumbnails" data-theme-name="interstitial_5">
                                        <a class="linklocker--inline-block" href="https://www.cpalead.com/dashboard/banners/images/interstitial_mobile.jpg" style="background-image:url('https://www.cpalead.com/dashboard/banners/images/interstitial_mobile.jpg');" title="Mobile Full Page">
                                            <span class="name">Mobile Full Page</span>
                                        </a>
                                        <button class="btn btn-inverse" type="button" data-theme="interstitial_5" onclick="set_template(4,5)">Use Theme</button>
                                    </li>

                                    <li class="theme-thumbnails" data-theme-name="interstitial_4">
                                        <a class="linklocker--inline-block" href="https://www.cpalead.com/dashboard/banners/images/interstitial_alternative.jpg" style="background-image:url('https://www.cpalead.com/dashboard/banners/images/interstitial_alternative.jpg');" title="Alternative Desktop">
                                            <span class="name">Alternative Desktop</span>
                                        </a>
                                        <button class="btn btn-inverse" type="button" data-theme="interstitial_4" onclick="set_template(4,4)">Use Theme</button>
                                    </li>

                                    <li class="theme-thumbnails" data-theme-name="interstitial_21">
                                        <a class="linklocker--inline-block" href="https://www.cpalead.com/dashboard/banners/images/overlay_mobile.png" style="background-image:url('https://www.cpalead.com/dashboard/banners/images/overlay_mobile.png');" title="Mobile Overlay">
                                            <span class="name">Mobile Overlay</span>
                                        </a>
                                        <button class="btn btn-inverse" type="button" data-theme="interstitial_21" onclick="set_template(4,21)">Use Theme</button>
                                    </li>

                                    <li class="theme-thumbnails" data-theme-name="interstitial_20">
                                        <a class="linklocker--inline-block" href="https://www.cpalead.com/dashboard/banners/images/interstitial_overlay.jpg" style="background-image:url('https://www.cpalead.com/dashboard/banners/images/interstitial_overlay.jpg');" title="Desktop Overlay">
                                            <span class="name">Desktop Overlay</span>
                                        </a>
                                        <button class="btn btn-inverse" type="button" data-theme="interstitial_20" onclick="set_template(4,20)">Use Theme</button>
                                    </li>

                                    <li class="theme-thumbnails" data-theme-name="interstitial_15">
                                        <a class="linklocker--inline-block" href="https://www.cpalead.com/dashboard/banners/images/interstitial_mobile_alternative.jpg" style="background-image:url('https://www.cpalead.com/dashboard/banners/images/interstitial_mobile_alternative.jpg');" title="Mobile Embed">
                                            <span class="name">Mobile Embed</span>
                                        </a>
                                        <button class="btn btn-inverse" type="button" data-theme="interstitial_15" onclick="set_template(4,15)">Use Theme</button>
                                    </li>
                                </ul>
                            </div>

                            <div class="span12 jumbotron interstitial_area" style="display: none">
                                <div class="span12">
                                    <div class="span6" style="padding-right: 40px;">
                                        <div>
                                            <h5>Size:</h5>
                                            <form action="<?php echo BANNERS_URL; ?>?preview=1&wp=1&pub_id=<?php echo $pub_id; ?>&token=<?php echo $token; ?>" method="POST" target="_newtab" style="display: inline;" id="interstitial_preview">
                                                <input type="hidden" name="type" value="4">
                                                <input type="hidden" name="preview_html" id="preview_html">
                                                <input type="hidden" name="preview_css" id="preview_css">
                                                <input type="hidden" name="preview_timer" id="preview_timer">
                                                <input type="hidden" name="preview_overlay" id="preview_overlay">
                                                <input type="text" class="form-control" placeholder="Width size" name="width" id="width" style="max-width: 120px" value="500">
                                                <select class="form-control" id="w_type" name="w_type" style="max-width: 100px">
                                                    <option value="px" selected>px</option>
                                                    <option value="pe">%</option>
                                                </select>
                                                <input type="text" class="form-control" placeholder="Height size" name="height" id="height" style="max-width: 120px" value="500">
                                                <select class="form-control" id="h_type" name="h_type" style="max-width: 100px">
                                                    <option value="px" selected>px</option>
                                                    <option value="pe">%</option>
                                                </select>
                                            </form>

                                            <form action="<?php echo API_URL; ?>?q=add" method="POST" style="display: inline;">
                                                <input type="hidden" name="pub_id" value="<?php echo $pub_id; ?>">
                                                <input type="hidden" name="token" value="<?php echo $token; ?>">
                                                <input type="hidden" name="return_url_success" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads&message=added">
                                                <input type="hidden" name="return_url_error" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads">
                                                <h5>Skip button</h5>
                                                <select class="form-control" id="skip_button" name="skip_button" required="" style="width: 100%">
                                                    <option value="1" selected>Add skip button</option>
                                                    <option value="0">Add close button (no timer)</option>
                                                </select>

                                                <div id="interstitial_timer">
                                                    <h5>Skip button timer</h5>
                                                    <input type="text" class="form-control" placeholder="Seconds for enable skip button" name="timer" id="timer" style="width: 100%;" value="5">
                                                </div>

                                                <h5>Interstitial Name</h5>
                                                <input type="hidden" name="b_type" value="4">
                                                <input type="hidden" id="overlay" name="overlay" value="0">
                                                <input type="hidden" name="b_width" id="b_width">
                                                <input type="hidden" name="b_height" id="b_height">
                                                <input type="hidden" name="b_w_type" id="b_w_type">
                                                <input type="hidden" name="b_h_type" id="b_h_type">
                                                <input type="text" class="form-control" placeholder="Enter banner name" name="name" id="name" style="width: 100%;" required="">

                                                <button class="btn btn-sm btn-green" style="margin-bottom: 10px" onclick="preparing_save(4);">Save Interstitial</button> <button class="btn btn-sm btn-default" style="margin-bottom: 10px" onclick="event.preventDefault(); custom_code(4);">Customize template</button> 
                                                <button class="btn btn-sm btn-default" style="margin-bottom: 10px;" onclick="event.preventDefault(); view_preview(4);"><i class="fa fa-eye"></i> View Preview</button>
                                            
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <div class="interstitial_size">
                                            <h5>Interstitial Grid Size:</h5>
                                            <select class="form-control" id="rows" name="rows" required="" style="width:150px">
                                                <option disabled selected>Number of rows</option>
                                                <?php for($i=1; $i<51; $i++) { ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?> rows</option>
                                                <?php } ?>
                                            </select>

                                            <select class="form-control" id="columns" name="columns" required="" style="width:150px">
                                                <option disabled selected>Number of columns</option>
                                                <?php for($i=1; $i<11; $i++) { ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?> columns</option>
                                                <?php } ?>
                                            </select>

                                            <button class="btn btn-sm btn-default" style="margin-bottom: 10px" onclick="event.preventDefault(); generate_banner(4);">Generate code</button>
                                        </div>

                                        <h5>If visitor is using mobile device, display</h5>
                                        <select class="form-control" id="m_template" name="m_template" required="" style="width: 510px !important">
                                            <option value="0" selected>This Design</option>
                                            <?php foreach ($ads_banners as $banner) { 
                                                if($banner->type == 4) { ?>
                                                    <option value="<?php echo $banner->id; ?>"><?php echo $banner->name; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>

                                        <h5>CSS class for click event</h5>
                                        <input type="text" class="form-control" placeholder="class-name" name="class" id="class" style="width: 100%;" required="">
                                    </div>
                                </div>
                                <div class="custom_interstitial span12" style="margin-top: 30px; display: none;">
                                    <div class="span6">
                                        <p>Custom HTML code</p>
                                        <div id="interstitial_html_editor"></div>
                                        <input type="hidden" id="html" name="html">
                                    </div>
                                    <div class="span5">
                                        <p>Custom CSS code</p>
                                        <div id="interstitial_css_editor"></div>
                                        <input type="hidden" id="css" name="css">
                                    </div>
                                </div>
                            </div>
                                </form>
                        </div>

                        <div role="tabpanel" class="tab-pane <?php if($_GET['page'] == 'add_superlink_ad') { ?>active<?php } ?>" id="superlink" style="padding: 5px">
                            <div class="span12">
    							<div class="span6 jumbotron">
    								<div class="superlink_area">
    									<form action="<?php echo API_URL; ?>?q=add" method="POST" style="display: inline;">
    										<input type="hidden" name="pub_id" value="<?php echo $pub_id; ?>">
                                            <input type="hidden" name="token" value="<?php echo $token; ?>">
                                            <input type="hidden" name="return_url_success" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads&message=added">
                                            <input type="hidden" name="return_url_error" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads">
    										<h3>Create a Superlink</h3>
                                            <p>When your visitor clicks on a Superlink on a social network or on your website, we will detect your visitor's device and country to display our top CPA offer available to them. When your earn money with your visitors complete the CPA offer shown. Works best with purchased pop under traffic.</p>
    										<h5>Superlink Name</h5>
    										<input type="hidden" name="b_type" value="5">
    										<input type="text" class="form-control" placeholder="Enter Superlink Name" name="name" id="name" style="width: 100%; max-width: 307px" required="">

    										<button class="btn btn-sm btn-green" style="margin-bottom: 10px">Create Superlink</button>
    									</form>
    								</div>
    							</div>
                            </div>
	                   </div>

                        <div role="tabpanel" class="tab-pane <?php if($_GET['page'] == 'add_push_up_ad') { ?>active<?php } ?>" id="push_up" style="padding: 5px">
							<div class="span12">
	        					<div class="span6 jumbotron">
									<div class="push_up_area">
                                        <h3>Create a PushUp Ad</h3>
                                        <p style="padding-right: 10px">A PushUp ad will detect your visitor's device and country and ask them to interact with an advertisement in a notification prompt. When your visitor clicks OK, they will be sent to the ad and you will earn money. If they click cancel, the notification prompt will close.</p>
                                    </div>
                                </div>
                                <div class="span6">
                                    <iframe width="480" height="255" src="https://www.youtube.com/embed/h5KSaqQNfuU?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen style="margin: 0 auto; display: block"></iframe>
                                </div>
                            </div>
                            <div class="span12 push_up_area jumbotron">
                                <div class="span6">
    								<form action="<?php echo API_URL; ?>?q=add" method="POST" style="display: inline;">
    									<input type="hidden" name="pub_id" value="<?php echo $pub_id; ?>">
                                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                                        <input type="hidden" name="return_url_success" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads&message=added">
                                        <input type="hidden" name="return_url_error" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads">
    									<h5>Display PushUp ads on</h5>
    									<select class="form-control" id="on_desktop" name="on_desktop" required="" style="width:100%">
    									  	<option value="1" selected>Desktop and Mobile Devices</option>
    									  	<option value="0">Only Mobile Devices</option>
    									</select>

    									<div id="interstitial_timer">
    										<h5>PushUp Delay</h5>
    										<small style="display: block">Amount of seconds the PushUp ad will be delayed after page load. Use <i>0</i> to disable the delay.</small>
    										<input type="text" class="form-control" placeholder="Seconds for running ad" name="timer" id="timer" style="width: 100%" value="2">
    									</div>

    									<h5>PushUp Ad Name</h5>
    									<input type="hidden" name="b_type" value="6">
    									<input type="text" class="form-control" placeholder="Enter ad name" name="name" id="name" style="width: 100%; max-width: 437px" required="">
    									<button class="btn btn-sm btn-green" style="margin-bottom: 10px">Create</button>
    								</form>
                                </div>
							</div>
						</div>

                        <div role="tabpanel" class="tab-pane <?php if($_GET['page'] == 'add_locker') { ?>active<?php } ?>" id="locker" style="padding: 5px">
                            <div class="span12">
                                <div class="span6 jumbotron">
                                    <input type="hidden" id="template_id">
                                    <h3>Create a Content Locker</h3>
                                    <p style="padding-right: 10px">The content locker will ask your visitor to interact with an ad to unlock your webpage. After your visitor has completed an ad, the locker will disappear and your webpage content will be revealed to your visitor.</p>
                                    <form action="<?php echo BANNERS_URL; ?>?preview=1&wp=1&pub_id=<?php echo $pub_id; ?>&token=<?php echo $token; ?>" method="POST" target="_newtab" style="display: inline;" id="locker_preview">
                                        <input type="hidden" name="type" value="7">
                                        <input type="hidden" name="preview_target" id="preview_target">
                                        <input type="hidden" name="preview_html" id="preview_html">
                                        <input type="hidden" name="preview_locker_link" id="preview_locker_link">
                                        <input type="hidden" name="preview_event" id="preview_event">
                                        <input type="hidden" name="preview_css" id="preview_css">
                                        <input type="hidden" name="preview_timer" id="preview_timer">
                                        <input type="hidden" name="preview_locker_name" id="preview_locker_name">
                                        <input type="hidden" name="preview_overlay_value" id="preview_overlay_value">
                                        <input type="hidden" name="preview_skip_button" id="preview_skip_button">
                                        <input type="hidden" name="preview_instructions_before" id="preview_instructions_before">
                                        <input type="hidden" name="preview_instructions_after" id="preview_instructions_after">
                                        <input type="hidden" name="preview_template_id" id="preview_template_id">
                                        <input type="hidden" name="width" id="width">
                                        <input type="hidden" name="w_type" id="w_type" value="px">
                                        <input type="hidden" name="height" id="height" value="520">
                                        <input type="hidden" name="h_type" id="h_type" value="px">
                                    </form>
                                </div>
                                <div class="span6">
                                    <iframe width="480" height="255" src="https://www.youtube.com/embed/BZlVeMUmAww?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen style="margin:0 auto; display: block;"></iframe>
                                </div>
                            </div>

                            <div class="span12" style="padding: 0 40px">
                                <h5>Select a Template:</h5>

                                <ul id="thumbs" class="theme-set">
                                    <li class="theme-thumbnails" data-theme-name="locker_1">
                                        <a class="linklocker--inline-block" href="https://www.cpalead.com/dashboard/banners/images/locker_1_large.png" style="background-image:url('https://www.cpalead.com/dashboard/banners/images/locker_1_large.png');" title="Template 1">
                                            <span class="name">Template 1</span>
                                        </a>
                                        <button class="btn btn-inverse" type="button" data-theme="locker_1" onclick="set_template(7,70)">Use Theme</button>
                                    </li>
                                            
                                    <li class="theme-thumbnails" data-theme-name="locker_2">
                                        <a class="linklocker--inline-block" href="https://www.cpalead.com/dashboard/banners/images/locker_2_large.png" style="background-image:url('https://www.cpalead.com/dashboard/banners/images/locker_2_large.png');" title="Template 2">
                                          <span class="name">Template 2</span>
                                        </a>
                                        <button class="btn btn-inverse" type="button" data-theme="locker_2" onclick="set_template(7,71)">Use Theme</button>
                                    </li>
                                            
                                    <li class="theme-thumbnails" data-theme-name="locker_3">
                                        <a class="linklocker--inline-block" href="https://www.cpalead.com/dashboard/banners/images/locker_3_large.png" style="background-image:url('https://www.cpalead.com/dashboard/banners/images/locker_3_large.png');" title="Template 3">
                                            <span class="name">Template 3</span>
                                        </a>
                                        <button class="btn btn-inverse" type="button" data-theme="locker_3" onclick="set_template(7,72)">Use Theme</button>
                                    </li>

                                    <li class="theme-thumbnails" data-theme-name="locker_4">
                                        <a class="linklocker--inline-block" href="https://www.cpalead.com/dashboard/banners/images/locker_4_large.png" style="background-image:url('https://www.cpalead.com/dashboard/banners/images/locker_4_large.png');" title="Template 4">
                                            <span class="name">Template 4</span>
                                        </a>
                                        <button class="btn btn-inverse" type="button" data-theme="locker_4" onclick="set_template(7,73)">Use Theme</button>
                                    </li>
                                            
                                    <li class="theme-thumbnails" data-theme-name="locker_5">
                                        <a class="linklocker--inline-block" href="https://www.cpalead.com/dashboard/banners/images/locker_5_large.png" style="background-image:url('https://www.cpalead.com/dashboard/banners/images/locker_5_large.png');" title="Template 5">
                                            <span class="name">Template 5</span>
                                        </a>
                                        <button class="btn btn-inverse" type="button" data-theme="locker_5" onclick="set_template(7,74)">Use Theme</button>
                                    </li>
                                </ul>
                            </div>
    
                            <div class="jumbotron locker_area" style="display: none">
                                <form action="<?php echo API_URL; ?>?q=add" method="POST" style="display: inline;">

                                    <input type="hidden" name="pub_id" value="<?php echo $pub_id; ?>">
                                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                                    <input type="hidden" name="return_url_success" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads&message=added">
                                    <input type="hidden" name="return_url_error" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads">
                                
                                    <div class="span12">
                                        <div class="span6" style="padding-right: 40px;">
                                            <h5>Locker width (in pixels)</h5>
                                            <input type="text" class="form-control" name="b_width" id="b_width" style="width: 100%" required="" value="900">

                                            <h5>Locker Title</h5>
                                            <input type="text" class="form-control" name="locker_name" id="locker_name" style="width: 100%" required="" value="Unlock This Content">

                                            <h5>Instructions before click on offer</h5>
                                            <input type="text" class="form-control" name="instructions_before" id="instructions_before" style="width: 100%" required="" value="To unlock this page, please complete an offer below">

                                            <h5>Instructions after click on offer</h5>
                                            <input type="text" class="form-control" name="instructions_after" id="instructions_after" style="width: 100%" required="" value="We are checking for offer completion">

                                            <h5>Locker name</h5>
                                            <input type="hidden" name="b_type" value="7">
                                            <input type="hidden" name="b_height" id="b_height">
                                            <input type="hidden" name="b_w_type" id="b_w_type">
                                            <input type="hidden" name="b_h_type" id="b_h_type">
                                            <input type="hidden" name="locker_template_id" id="locker_template_id">
                                            <input type="text" class="form-control" placeholder="Enter locker name" name="name" id="name" style="width: 100%; max-width: 437px" required="">

                                            <button class="btn btn-sm btn-green" style="margin-bottom: 10px" onclick="preparing_save(7);">Create</button> 
                                            <button class="btn btn-sm btn-default" style="margin-bottom: 10px" onclick="event.preventDefault(); custom_code(7);">Customize template</button>
                                             <button class="btn btn-sm btn-default" style="margin-bottom: 10px;" onclick="event.preventDefault(); view_preview(7);">View Preview</button>
                                        </div>

                                        <div class="span6">
                                            <h5>Overlay Opacity (From 0 to 99)</h5>
                                            <input type="text" class="form-control" name="overlay_value" id="overlay_value" style="width: 100%" required="" value="80">

                                            <h5>Run Locker</h5>
                                            <select class="form-control" id="target" name="target" required="" style="width: 100%">
                                                <option value="0" selected>When page is load</option>
                                                <option value="1">OnClick event</option>
                                            </select>

                                            <div id="locker1" style="display: none">
                                                <small>For OnClick event you will need to add <i>onclick="run_locker()"</i> code to launch locker.</small>
                                            </div>

                                            <div id="locker11">
                                                <h5>Delay Locker</h5>
                                                <small style="display: block">Amount of seconds the locker will be delayed after page load. Use <i>0</i> to disable the delay.</small>
                                                <input type="text" class="form-control" placeholder="Seconds to run locker" name="timer" id="timer" style="width: 100%" value="0">
                                            </div>

                                            <h5>Unlock Event</h5>
                                            <select class="form-control" id="event" name="event" required="" style="width: 100%">
                                                <option value="1" selected>Close Locker</option>
                                                <option value="2">Reveal Link</option>
                                                <option value="3">Open URL</option>
                                            </select>

                                            <div id="locker12" style="display: none">
                                                <h5>Locker Link</h5>
                                                <input type="text" class="form-control" name="locker_link" id="locker_link" style="width: 100%; max-width: 100%" placeholder="https://www.cpalead.com/">
                                            </div>

                                            <h5>Completing Offers</h5>
                                            <label><input type="checkbox" class="form-control" name="require_more_offers" id="require_more_offers" style="margin-top: -2px" checked=""> Require 2 Offers to be Completed</label>
                                        </div>
                                    </div>
                                    <div class="span12 custom_locker" style="margin-top: 30px; display: none">
                                        <div class="span6">
                                            <p>Custom HTML code</p>
                                            <div id="locker_html_editor"></div>
                                            <input type="hidden" id="html" name="html">
                                        </div>
                                        <div class="span5">
                                            <p>Custom CSS code</p>
                                            <div id="locker_css_editor"></div>
                                            <input type="hidden" id="css" name="css">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div role="tabpanel" class="tab-pane <?php if($_GET['page'] == 'add_offerwall') { ?>active<?php } ?>" id="offerwall" style="padding: 5px">
                            <div class="span12">
                                <div class="span6 jumbotron">
                                    <h3>Create an Offerwall</h3>
                                    <p>Offerwalls will reward your user virtual currency or in-game points for each survey or mobile app they install.</p>
                                </div>
                                <div class="span6">
                                    <iframe width="480" height="255" src="https://www.youtube.com/embed/P7I2T4rO5ag?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen style="margin: 0 auto; display: block;"></iframe>
                                </div>
                            </div>

                            <div class="span12" style="padding: 0 40px">
                                <h5>Select a Template:</h5>

                                <ul id="thumbs" class="theme-set">
                                    <li class="theme-thumbnails" data-theme-name="offerwall_1">
                                        <a class="linklocker--inline-block" href="https://www.cpalead.com/dashboard/banners/images/offerwall1.jpg" style="background-image:url('https://www.cpalead.com/dashboard/banners/images/offerwall1.jpg');" title="Template 1">
                                            <span class="name">Template 1</span>
                                        </a>
                                        <button class="btn btn-inverse" type="button" data-theme="offerwall_1" onclick="set_template(8,81)">Use Theme</button>
                                    </li>
                                       
                                    <li class="theme-thumbnails" data-theme-name="offerwall_2">
                                        <a class="linklocker--inline-block" href="https://www.cpalead.com/dashboard/banners/images/offerwall2.jpg" style="background-image:url('https://www.cpalead.com/dashboard/banners/images/offerwall2.jpg');" title="Template 2">
                                            <span class="name">Template 2</span>
                                        </a>
                                        <button class="btn btn-inverse" type="button" data-theme="offerwall_2" onclick="set_template(8,80)">Use Theme</button>
                                    </li>
                                        
                                    <li class="theme-thumbnails" data-theme-name="offerwall_3">
                                        <a class="linklocker--inline-block" href="https://www.cpalead.com/dashboard/banners/images/offerwall3.jpg" style="background-image:url('https://www.cpalead.com/dashboard/banners/images/offerwall3.jpg');" title="Template 3">
                                            <span class="name">Template 3</span>
                                        </a>
                                       <button class="btn btn-inverse" type="button" data-theme="offerwall_3" onclick="set_template(8,82)">Use Theme</button>
                                    </li>
                                </ul>
                            </div>


                            <div class="jumbotron offerwall_area" style="display: none">
                                <form action="<?php echo API_URL; ?>?q=add" method="POST" style="display: inline;">
                                    <div class="span12">
                                        <div class="span6" style="padding-right: 40px;">
                                            <input type="hidden" name="pub_id" value="<?php echo $pub_id; ?>">
                                            <input type="hidden" name="token" value="<?php echo $token; ?>">
                                            <input type="hidden" name="return_url_success" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads&message=added">
                                            <input type="hidden" name="return_url_error" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads">

                                            <h5>Page Header</h5>
                                            <input type="text" class="form-control" name="header_title" id="header_title" style="width: 100%" required="" value="Your Game or Site Name">

                                            <h5>App Wall Instruction Text</h5>
                                            <input type="text" class="form-control" name="app_wall_instructions" id="app_wall_instructions" style="width: 100%" required="" value="Install an App below to earn {currency}.">

                                            <h5>Offer Wall Instruction Text</h5>
                                            <input type="text" class="form-control" name="offer_wall_instructions" id="offer_wall_instructions" style="width: 100%" required="" value="Complete an offer below to earn {currency}.">

                                            <h5>Offer Title Length</h5>
                                            <input type="text" class="form-control" name="title_length" id="title_length" style="width: 100%" required="" placeholder="Number of characters for title" value="25">

                                            <h5>Offerwall name</h5>
                                            <input type="hidden" name="b_type" value="8">
                                            <input type="hidden" name="b_width" id="b_width">
                                            <input type="hidden" name="b_height" id="b_height">
                                            <input type="hidden" name="b_w_type" id="b_w_type">
                                            <input type="hidden" name="b_h_type" id="b_h_type">
                                            <input type="text" class="form-control" placeholder="Enter offerwall name" name="name" id="name" style="width: 100%; max-width: 437px" required="">

                                            <button class="btn btn-sm btn-green" style="margin-bottom: 10px" onclick="preparing_save(8);">Create</button> <button class="btn btn-sm btn-default" style="margin-bottom: 10px" onclick="event.preventDefault(); custom_code(8);">Customize template</button>
                                        </div>
                                        <div class="span6">
                                            <h5>If visitor is using mobile device, display</h5>
                                            <select class="form-control" id="m_template" name="m_template" required="" style="width: 100%">
                                                <option value="0" selected>This Design</option>
                                                <?php foreach ($ads_banners as $banner) { 
                                                    if($banner->type == 8) { ?>
                                                        <option value="<?php echo $banner->id; ?>"><?php echo $banner->name; ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>

                                            <h5>Points Setup</h5>
                                            <input type="text" class="form-control" placeholder="Points" name="currency" id="currency" style="width: 100%; margin: 0;" required="" value="Points" onkeyup="update_currency();">
                                            <small style="display: block;margin-bottom: 10px;">Name of {currency}</small>

                                            <h5 style="margin:0">Points Ratio</h5>
                                            <input type="text" class="form-control" placeholder="Points Ratio" name="ratio" id="ratio" style="width: 100%; margin: 0;" required="" value="100" onkeyup="update_currency();">
                                            <small style="display: block;margin-bottom: 10px;" class="point-explain">For every <b>$1.00 USD</b> your earn, your users earn <b>100 Points</b>.</small>

                                            <h5 style="margin:0">Credit Method</h5>
                                            <select class="form-control" id="credit_method" name="credit_method" style="width: 100%">
                                                <option value="0" selected>Manual</option>
                                                <option value="1">Automatic</option>
                                            </select>

                                            <div id="credit_method_div" style="display: none">
                                                <h5 style="margin:0">Postback URL</h5>
                                                <input type="text" class="form-control" placeholder="Postback URL" name="postback_url" id="postback_url" style="width: 100%">

                                                <h5 style="margin:0">Postback Password</h5>
                                                <input type="text" class="form-control" placeholder="Postback Password" name="postback_password" id="postback_password" style="width: 100%; margin: 0;" >
                                                <small style="display: block;margin-bottom: 10px;">A Postback Password is optional. Automatic method requires a Postback to be setup, see our <a href="https://www.cpalead.com/documentation/postback/" target="_blank">Postback Documentation</a> for more information.</small>
                                            </div>

                                            <h5 style="margin:0">Prompt Visitor for Email/subID?</h5>
                                            <select class="form-control" id="prompt" name="prompt" style="width: 100%">
                                                <option value="0" selected>No</option>
                                                <option value="1">Yes</option>
                                            </select>

                                            <div id="prompt_div" style="display: none">
                                                <h5 style="margin:0">Prompt Question</h5>
                                                <input type="text" class="form-control" placeholder="Enter your email address to continue" name="prompt_content" id="prompt_content" style="width: 100%" value="Enter your email address to continue">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span12 custom_offerwall" style="margin-top: 30px; display: none">
                                        <div class="span6">
                                            <p>Custom HTML code</p>
                                            <div id="offerwall_html_editor"></div>
                                            <input type="hidden" id="html" name="html">
                                        </div>
                                        <div class="span5">
                                            <p>Custom CSS code</p>
                                            <div id="offerwall_css_editor"></div>
                                            <input type="hidden" id="css" name="css">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<script type="text/javascript">

    jQuery(document).ready(function($) {

        jQuery('.linklocker--inline-block').magnificPopup({type:'image'});

        <?php require_once 'banner-templates.php'; ?>

        var default_html_editor = ace.edit("html_editor");
        default_html_editor.getSession().setMode("ace/mode/html");
        default_html_editor.getSession().setUseWorker(false);
        default_html_editor.setValue(default_html_code);

        var default_css_editor = ace.edit("css_editor");
        default_css_editor.getSession().setMode("ace/mode/css");
        default_css_editor.getSession().setUseWorker(false);
        default_css_editor.setValue(default_css_code);

        jQuery("#locker #target").change(function() {
            var val = jQuery(this).val();
            jQuery("#locker #target_type").val(val);
            if(val == 0) {
                jQuery('#locker #locker1').hide();
                jQuery('#locker #locker11').show();
                jQuery("#event").prepend("<option value='1'>Close Locker</option>");
            } else if(val == 1) {
                jQuery('#event option[value="1"]').remove();
                jQuery('#locker #locker1').show();
                jQuery('#locker #locker12').show();
                jQuery('#locker #locker11').hide();
            }
        });

        jQuery("#locker #event").change(function() {
            var val = jQuery(this).val();
            jQuery("#locker #event_type").val(val);
            if(val == 1) {
                jQuery('#locker #locker12').hide();
            } else if(val == 2 || val == 3) {
                jQuery('#locker #locker12').show();
            }
        });

        jQuery("#credit_method").change(function() {
            var val = jQuery(this).val();
            if(val == 0) {
                jQuery('#credit_method_div').hide();
            } else if(val == 1) {
                jQuery('#credit_method_div').show();
            }
        });

        jQuery("#prompt").change(function() {
            var val = jQuery(this).val();
            if(val == 0) {
                jQuery('#prompt_div').hide();
            } else if(val == 1) {
                jQuery('#prompt_div').show();
            }
        });

        jQuery(document).on("tap click", 'label a', function( event, data ){
            event.stopPropagation();
            event.preventDefault();
            window.open(jQuery(this).attr('href'), jQuery(this).attr('target'));
            return false;
        });

    });

    function update_currency() {
        jQuery(".point-explain").html("For every <b>$1.00 USD</b> your earn, your users earn <b>"+jQuery("#ratio").val()+" "+jQuery("#currency").val()+"</b>.");
    }

    function view_preview(type) {
        if(type == 2) {
            
            var html_editor = ace.edit("html_editor");
            var html = html_editor.getValue();
            jQuery("#preview_html").val(html);

            var css_editor = ace.edit("css_editor");
            var css = css_editor.getValue();
            jQuery("#preview_css").val(css);

        } else if(type == 3) {
            
            var pop_under_html_editor = ace.edit("pop_under_html_editor");
            var html = pop_under_html_editor.getValue();
            jQuery("#pop_under #preview_html").val(html);

            var pop_under_css_editor = ace.edit("pop_under_css_editor");
            var css = pop_under_css_editor.getValue();
            jQuery("#pop_under #preview_css").val(css);

            var preview_target = jQuery("#pop_under #target").val();
            jQuery("#pop_under #preview_target").val(preview_target);

            var preview_window_width = jQuery("#pop_under #width").val();
            jQuery("#preview_window_width").val(preview_window_width);

            var preview_window_height = jQuery("#pop_under #height").val();
            jQuery("#preview_window_height").val(preview_window_height);

        } else if(type == 4) {
            
            var interstitial_html_editor = ace.edit("interstitial_html_editor");
            var html = interstitial_html_editor.getValue();
            jQuery("#interstitial #preview_html").val(html);

            var interstitial_css_editor = ace.edit("interstitial_css_editor");
            var css = interstitial_css_editor.getValue();
            jQuery("#interstitial #preview_css").val(css);

            var preview_timer = jQuery("#interstitial #timer").val();
            jQuery("#interstitial #preview_timer").val(preview_timer);

            var preview_overlay = jQuery("#overlay").val();
            jQuery("#preview_overlay").val(preview_overlay);

            jQuery("#interstitial_preview").submit();
        
        } else if(type == 7) {
            
            var locker_html_editor = ace.edit("locker_html_editor");
            var html = locker_html_editor.getValue();
            jQuery("#locker #preview_html").val(html);

            var locker_css_editor = ace.edit("locker_css_editor");
            var css = locker_css_editor.getValue();
            jQuery("#locker #preview_css").val(css);

            var preview_target = jQuery("#locker #target").val();
            jQuery("#locker #preview_target").val(preview_target);

            var preview_locker_name = jQuery("#locker_name").val();
            jQuery("#preview_locker_name").val(preview_locker_name);

            var preview_overlay_value = jQuery("#overlay_value").val();
            jQuery("#preview_overlay_value").val(preview_overlay_value);

            var preview_instructions_before = jQuery("#instructions_before").val();
            jQuery("#preview_instructions_before").val(preview_instructions_before);

            var preview_instructions_after = jQuery("#locker #instructions_after").val();
            jQuery("#locker #preview_instructions_after").val(preview_instructions_after);

            var preview_width = jQuery("#locker #b_width").val();
            jQuery("#locker #width").val(preview_width);

            var preview_event = jQuery("#locker #event").val();
            jQuery("#locker #preview_event").val(preview_event);

            var preview_locker_link = jQuery("#locker #locker_link").val();
            jQuery("#locker #preview_locker_link").val(preview_locker_link);

            var preview_timer = jQuery("#locker #timer").val();
            jQuery("#locker #preview_timer").val(preview_timer);

            jQuery("#locker_preview").submit();
        }
    }

    function preparing_save(type) {

        if(type == 2) {

            var width = jQuery("#width").val();
            var height = jQuery("#height").val();
            var w_type = jQuery("#w_type").val();
            var h_type = jQuery("#h_type").val();
            jQuery("#b_width").val(width);
            jQuery("#b_height").val(height);
            jQuery("#b_w_type").val(w_type);
            jQuery("#b_h_type").val(h_type);

            var html_editor = ace.edit("html_editor");
            var html = html_editor.getValue();
            jQuery("#html").val(html);

            var css_editor = ace.edit("css_editor");
            var css = css_editor.getValue();
            jQuery("#css").val(css);

        } else if(type == 3) {

            var width = jQuery("#pop_under #width").val();
            var height = jQuery("#pop_under #height").val();
            var w_type = jQuery("#pop_under #w_type").val();
            var h_type = jQuery("#pop_under #h_type").val();
            jQuery("#pop_under #b_width").val(width);
            jQuery("#pop_under #b_height").val(height);
            jQuery("#pop_under #b_w_type").val(w_type);
            jQuery("#pop_under #b_h_type").val(h_type);

            var pop_under_html_editor = ace.edit("pop_under_html_editor");
            var html = pop_under_html_editor.getValue();
            jQuery("#pop_under #html").val(html);

            var pop_under_css_editor = ace.edit("pop_under_css_editor");
            var css = pop_under_css_editor.getValue();
            jQuery("#pop_under #css").val(css);
        
        } else if(type == 4) {

            var width = jQuery("#interstitial #width").val();
            var height = jQuery("#interstitial #height").val();
            var w_type = jQuery("#interstitial #w_type").val();
            var h_type = jQuery("#interstitial #h_type").val();
            jQuery("#interstitial #b_width").val(width);
            jQuery("#interstitial #b_height").val(height);
            jQuery("#interstitial #b_w_type").val(w_type);
            jQuery("#interstitial #b_h_type").val(h_type);

            var interstitial_html_editor = ace.edit("interstitial_html_editor");
            var html = interstitial_html_editor.getValue();
            jQuery("#interstitial #html").val(html);

            var interstitial_css_editor = ace.edit("interstitial_css_editor");
            var css = interstitial_css_editor.getValue();
            jQuery("#interstitial #css").val(css);

        } else if(type == 7) {

            var height = jQuery("#locker #height").val();
            var w_type = jQuery("#locker #w_type").val();
            var h_type = jQuery("#locker #h_type").val();
            jQuery("#locker #b_height").val(height);
            jQuery("#locker #b_w_type").val(w_type);
            jQuery("#locker #b_h_type").val(h_type);

            var locker_html_editor = ace.edit("locker_html_editor");
            var html = locker_html_editor.getValue();
            jQuery("#locker #html").val(html);

            var locker_css_editor = ace.edit("locker_css_editor");
            var css = locker_css_editor.getValue();
            jQuery("#locker #css").val(css);
        
        } else if(type == 8) {

            var width = jQuery("#offerwall #width").val();
            var height = jQuery("#offerwall #height").val();
            var w_type = jQuery("#offerwall #w_type").val();
            var h_type = jQuery("#offerwall #h_type").val();
            jQuery("#offerwall #b_width").val(width);
            jQuery("#offerwall #b_height").val(height);
            jQuery("#offerwall #b_w_type").val(w_type);
            jQuery("#offerwall #b_h_type").val(h_type);

            var offerwall_html_editor = ace.edit("offerwall_html_editor");
            var html = offerwall_html_editor.getValue();
            jQuery("#offerwall #html").val(html);

            var offerwall_css_editor = ace.edit("offerwall_css_editor");
            var css = offerwall_css_editor.getValue();
            jQuery("#offerwall #css").val(css);
        }
    }

    function generate_banner(type) {

        if(type == 2) {
            var rows = jQuery("#rows").val();
            var columns = jQuery("#columns").val();
        } else if(type == 3) {
            var rows = jQuery("#pop_under #rows").val();
            var columns = jQuery("#pop_under #columns").val();
        } else if(type == 4) {
            var rows = jQuery("#interstitial #rows").val();
            var columns = jQuery("#interstitial #columns").val();
        }
        if(rows>0 && rows<51 && columns>0 && columns<11) {
            if(rows*columns>50) {
                alert('You exceed 50 offers. Please, choose another banner size');
            } else {
                if(type == 3) {
                    jQuery(".pop_under_area").show();
                } else if(type == 4) {
                    jQuery(".interstitial_area").show();
                } else if(type == 7) {
                    jQuery(".locker_area").show();
                }

                /* Checking for custom templates */
                if(type == 3) {
                    var template_id = jQuery("#pop_under #template_id").val();
                } else if(type == 4) {
                    var template_id = jQuery("#interstitial #template_id").val();
                }
                if(template_id == 6) {
                    var html_code = '<h3 class="title">Support Us</h3>\n';
                    html_code += '<h4 class="subtitle">Please support us by interacting with an ad</h4>\n';
                    html_code += '<h5 class="timer">Skip in {timer} Seconds</h5>\n';
                } else if(template_id == 10 || template_id == 11) {
                    var html_code = '<h3 class=\"title\">Trending Deals</h3>\n';
                    html_code += '<h4 class=\"subtitle\">These are the top deals of the day</h4>\n';
                } else {
                    var html_code = '';
                }

                html_code += '<div class="cpalead-offers">\n';

                for(i=0; i<rows; i++) {
                    html_code += '\t<div class="cpalead-offers-row">\n';
                    for(j=0; j<columns; j++) {
                        html_code += '\t\t<a href="{offer_link}" target="_blank">\n';
                        html_code += '\t\t\t<div class="cpalead-offer">\n';
                        html_code += '\t\t\t\t<div class="cpalead-offer-image">\n';
                        html_code += '\t\t\t\t\t<img src="{offer_image}">\n';
                        html_code += '\t\t\t\t</div>\n';
                        html_code += '\t\t\t\t<div class="cpalead-offer-content">\n';
                        html_code += '\t\t\t\t\t<h3>{offer_title}</h3>\n';
                        html_code += '\t\t\t\t\t<p>{offer_description_1}</p>\n';
                        html_code += '\t\t\t\t\t<p>{offer_description_2}</p>\n';
                        html_code += '\t\t\t\t</div>\n';
                        html_code += '\t\t\t</div>\n';
                        html_code += '\t\t</a>\n';
                    }
                    html_code += '\t</div>\n';
                }
                
                html_code += '</div>';

                if(template_id == 6) {
                    var css_code = 'body {\n';
                    css_code += '\tbackground-color: #fff;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.title {\n';
                    css_code += '\tfont-size: 32px;\n';
                    css_code += '\tcolor: #444;\n';
                    css_code += '\ttext-align: center;\n';
                    css_code += '\tfont-family:\'Open Sans\', Arial, Helvetica Neue, Helvetica, sans-serif;\n';
                    css_code += '\tmargin-bottom: 10px;\n';
                    css_code += '}\n';
                    css_code += '.subtitle {\n';
                    css_code += '\tfont-size: 18px;\n';
                    css_code += '\tcolor: #444;\n';
                    css_code += '\ttext-align: center;\n';
                    css_code += '\tfont-family:Roboto, Arial, Helvetica Neue, Helvetica, sans-serif;\n';
                    css_code += '\tmargin-top: 0px;\n';
                    css_code += '\tmargin-bottom: 15px;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.timer {\n';
                    css_code += '\tfont-size: 14px;\n';
                    css_code += '\tcolor: #838383;\n';
                    css_code += '\ttext-align: center;\n';
                    css_code += '\tfont-family:Roboto, Arial, Helvetica Neue, Helvetica, sans-serif;\n';
                    css_code += '\tmargin-top: 0px;\n';
                    css_code += '\tmargin-bottom: 15px;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offers {\n';
                    css_code += '\twidth: 100%;\n';
                    css_code += '\tmargin: 0 auto;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offers-row {\n';
                    css_code += '\ttext-align: center;\n';
                    css_code += '}\n';
                    css_code += '.cpalead-offers:after, .cpalead-offers-row:after {\n';
                    css_code += '\tcontent: \"\";\n';
                    css_code += '\tdisplay: block;\n';
                    css_code += '\tclear: both;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offers-row a {\n';
                    css_code += '\tdisplay: inline-block;\n';
                    css_code += '\twidth: 240px;\n';
                    css_code += '\theight: 60px;\n';
                    css_code += '\tpadding: 3px 5px;\n';
                    css_code += '\ttext-decoration: none;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-image {\n';
                    css_code += '\tmargin: 5px auto;\n';
                    css_code += '\tpadding-top: 1px;\n';
                    css_code += '\twidth: 43px;\n';
                    css_code += '\tfloat: left;\n';
                    css_code += '\tpadding-left: 4px;\n';
                    css_code += '\tpadding-right: 3px;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-image img {\n';
                    css_code += '\twidth: 100%;\n';
                    css_code += '\tborder-radius: 7px;\n';
                    css_code += '\tborder: 0;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-content {\n';
                    css_code += '\twidth: 72%;\n';
                    css_code += '\tfloat: left;\n';
                    css_code += '\tmargin: 0;\n';
                    css_code += '\tpadding: 0;\n';
                    css_code += '\ttext-align: left;\n';
                    css_code += '\tmargin-top: 5px;\n';
                    css_code += '\tmargin-left: 7px;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-content h3 {\n';
                    css_code += '\tline-height: 16px;\n';
                    css_code += '\tfont-size: 12px;\n';
                    css_code += '\tpadding: 0px;\n';
                    css_code += '\tmargin: 0;\n';
                    css_code += '\tcolor: #044595;\n';
                    css_code += '\tletter-spacing: 0px;\n';
                    css_code += '\ttext-align: left;\n';
                    css_code += '\tfont-family:Roboto, Arial, Helvetica Neue, Helvetica, sans-serif;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-content p {\n';
                    css_code += '\tcolor: #666;\n';
                    css_code += '\tmargin: 0;\n';
                    css_code += '\tpadding: 2px 0;\n';
                    css_code += '\tfont-size: 11px;\n';
                    css_code += '\ttext-align: left;\n';
                    css_code += '\tline-height: 1;\n';
                    css_code += '\tfont-family:Roboto, Arial, Helvetica Neue, Helvetica, sans-serif;\n';
                    css_code += '}';
                } else if(template_id == 10) {
                    var css_code = 'body {\n';
                    css_code += '\tbackground-color: #fff;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.title {\n';
                    css_code += '\tfont-size: 32px;\n';
                    css_code += '\tcolor: #444;\n';
                    css_code += '\ttext-align: center;\n';
                    css_code += '\tfont-family:\'Open Sans\', Arial, Helvetica Neue, Helvetica, sans-serif;\n';
                    css_code += '\tmargin-bottom: 15px;\n';
                    css_code += '}\n';
                    css_code += '.subtitle {\n';
                    css_code += '\tfont-size: 18px;\n';
                    css_code += '\tcolor: #666;\n';
                    css_code += '\ttext-align: center;\n';
                    css_code += '\tfont-family:Roboto, Arial, Helvetica Neue, Helvetica, sans-serif;\n';
                    css_code += '\tmargin-top: 0px;\n';
                    css_code += '\tmargin-bottom: 30px;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offers {\n';
                    css_code += '\twidth: 100%;\n';
                    css_code += '\tmargin: 0 auto;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offers-row {\n';
                    css_code += '\ttext-align: center;\n';
                    css_code += '}\n';
                    css_code += '.cpalead-offers:after, .cpalead-offers-row:after {\n';
                    css_code += '\tcontent: \"\";\n';
                    css_code += '\tdisplay: block;\n';
                    css_code += '\tclear: both;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offers-row a {\n';
                    css_code += '\tdisplay: inline-block;\n';
                    css_code += '\twidth: 240px;\n';
                    css_code += '\theight: 60px;\n';
                    css_code += '\tpadding: 3px 5px;\n';
                    css_code += '\ttext-decoration: none;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-image {\n';
                    css_code += '\tmargin: 5px auto;\n';
                    css_code += '\tpadding-top: 1px;\n';
                    css_code += '\twidth: 43px;\n';
                    css_code += '\tfloat: left;\n';
                    css_code += '\tpadding-left: 4px;\n';
                    css_code += '\tpadding-right: 3px;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-image img {\n';
                    css_code += '\twidth: 100%;\n';
                    css_code += '\tborder-radius: 7px;\n';
                    css_code += '\tborder: 0;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-content {\n';
                    css_code += '\twidth: 72%;\n';
                    css_code += '\tfloat: left;\n';
                    css_code += '\tmargin: 0;\n';
                    css_code += '\tpadding: 0;\n';
                    css_code += '\ttext-align: left;\n';
                    css_code += '\tmargin-top: 5px;\n';
                    css_code += '\tmargin-left: 7px;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-content h3 {\n';
                    css_code += '\tline-height: 16px;\n';
                    css_code += '\tfont-size: 12px;\n';
                    css_code += '\tpadding: 0px;\n';
                    css_code += '\tmargin: 0;\n';
                    css_code += '\tcolor: #044595;\n';
                    css_code += '\tletter-spacing: 0px;\n';
                    css_code += '\ttext-align: left;\n';
                    css_code += '\tfont-family:Roboto, Arial, Helvetica Neue, Helvetica, sans-serif;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-content p {\n';
                    css_code += '\tcolor: #666;\n';
                    css_code += '\tmargin: 0;\n';
                    css_code += '\tpadding: 2px 0;\n';
                    css_code += '\tfont-size: 11px;\n';
                    css_code += '\ttext-align: left;\n';
                    css_code += '\tline-height: 1;\n';
                    css_code += '\tfont-family:Roboto, Arial, Helvetica Neue, Helvetica, sans-serif;\n';
                    css_code += '}';
                } else if(template_id == 11) {
                    var css_code = 'body {\n';
                    css_code += '\tbackground-color: #fff;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.title {\n';
                    css_code += '\tfont-size: 32px;\n';
                    css_code += '\tcolor: #444;\n';
                    css_code += '\ttext-align: center;\n';
                    css_code += '\tfont-family:\'Open Sans\', Arial, Helvetica Neue, Helvetica, sans-serif;\n';
                    css_code += '\tmargin-bottom: 15px;\n';
                    css_code += '}\n';
                    css_code += '.subtitle {\n';
                    css_code += '\tfont-size: 18px;\n';
                    css_code += '\tcolor: #666;\n';
                    css_code += '\ttext-align: center;\n';
                    css_code += '\tfont-family:Roboto, Arial, Helvetica Neue, Helvetica, sans-serif;\n';
                    css_code += '\tmargin-top: 0px;\n';
                    css_code += '\tmargin-bottom: 30px;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offers {\n';
                    css_code += '\twidth: 100%;\n';
                    css_code += '\tmargin: 0 auto;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offers-row {\n';
                    css_code += '\ttext-align: center;\n';
                    css_code += '}\n';
                    css_code += '.cpalead-offers:after, .cpalead-offers-row:after {\n';
                    css_code += '\tcontent: \"\";\n';
                    css_code += '\tdisplay: block;\n';
                    css_code += '\tclear: both;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offers-row a {\n';
                    css_code += '\tdisplay: inline-block;\n';
                    css_code += '\twidth: 240px;\n';
                    css_code += '\theight: 60px;\n';
                    css_code += '\tpadding: 3px 5px;\n';
                    css_code += '\ttext-decoration: none;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-image {\n';
                    css_code += '\tmargin: 5px auto;\n';
                    css_code += '\tpadding-top: 1px;\n';
                    css_code += '\twidth: 43px;\n';
                    css_code += '\tfloat: left;\n';
                    css_code += '\tpadding-left: 4px;\n';
                    css_code += '\tpadding-right: 3px;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-image img {\n';
                    css_code += '\twidth: 100%;\n';
                    css_code += '\tborder-radius: 7px;\n';
                    css_code += '\tborder: 0;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-content {\n';
                    css_code += '\twidth: 72%;\n';
                    css_code += '\tfloat: left;\n';
                    css_code += '\tmargin: 0;\n';
                    css_code += '\tpadding: 0;\n';
                    css_code += '\ttext-align: left;\n';
                    css_code += '\tmargin-top: 5px;\n';
                    css_code += '\tmargin-left: 7px;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-content h3 {\n';
                    css_code += '\tline-height: 16px;\n';
                    css_code += '\tfont-size: 12px;\n';
                    css_code += '\tpadding: 0px;\n';
                    css_code += '\tmargin: 0;\n';
                    css_code += '\tcolor: #044595;\n';
                    css_code += '\tletter-spacing: 0px;\n';
                    css_code += '\ttext-align: left;\n';
                    css_code += '\tfont-family:Roboto, Arial, Helvetica Neue, Helvetica, sans-serif;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-content p {\n';
                    css_code += '\tcolor: #666;\n';
                    css_code += '\tmargin: 0;\n';
                    css_code += '\tpadding: 2px 0;\n';
                    css_code += '\tfont-size: 11px;\n';
                    css_code += '\ttext-align: left;\n';
                    css_code += '\tline-height: 1;\n';
                    css_code += '\tfont-family:Roboto, Arial, Helvetica Neue, Helvetica, sans-serif;\n';
                    css_code += '}';
                } else {
                    var css_code = '.cpalead-offers {\n';
                    css_code += '\twidth: 100%;\n';
                    css_code += '\theight: 100%;\n';
                    css_code += '\tmargin: 0 auto;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offers-row {\n';
                    css_code += '\twidth: 100%;\n';
                    css_code += '\tbackground: #f7f7f7;\n';
                    css_code += '}\n';
                    css_code += '.cpalead-offers:after, .cpalead-offers-row:after {\n';
                    css_code += '\tcontent: "";\n';
                    css_code += '\tdisplay: block;\n';
                    css_code += '\tclear: both;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offers-row a {\n';
                    css_code += '\tdisplay: inline-block;\n';
                    css_code += '\twidth: 240px;\n';
                    css_code += '\theight: 60px;\n';
                    css_code += '\tfloat: left;\n';
                    css_code += '\tpadding: 3px 5px;\n';
                    css_code += '\ttext-decoration: none;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-image {\n';
                    css_code += '\tmargin: 5px auto;\n';
                    css_code += '\tpadding-top: 1px;\n';
                    css_code += '\twidth: 43px;\n';
                    css_code += '\tfloat: left;\n';
                    css_code += '\tpadding-left: 4px;\n';
                    css_code += '\tpadding-right: 3px;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-image img {\n';
                    css_code += '\twidth: 100%;\n';
                    css_code += '\tborder-radius: 7px;\n';
                    css_code += '\tborder: 0;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-content {\n';
                    css_code += '\twidth: 72%;\n';
                    css_code += '\tfloat: left;\n';
                    css_code += '\tmargin: 0;\n';
                    css_code += '\tpadding: 0;\n';
                    css_code += '\ttext-align: left;\n';
                    css_code += '\tmargin-top: 0px;\n';
                    css_code += '\tmargin-left: 10px;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-content h3 {\n';
                    css_code += '\tline-height: 16px;\n';
                    css_code += '\tfont-size: 12px;\n';
                    css_code += '\tpadding: 0px;\n';
                    css_code += '\tmargin: 0;\n';
                    css_code += '\tcolor: #044595;\n';
                    css_code += '\tletter-spacing: 0px;\n';
                    css_code += '\ttext-align: left;\n';
                    css_code += '}\n';
                    css_code += '\n';
                    css_code += '.cpalead-offer-content p {\n';
                    css_code += '\tcolor: #666;\n';
                    css_code += '\tmargin: 0;\n';
                    css_code += '\tpadding: 2px 0;\n';
                    css_code += '\tfont-size: 10px;\n';
                    css_code += '\ttext-align: left;\n';
                    css_code += '\tfont-weight: 600;\n';
                    css_code += '\tline-height: 1;\n';
                    css_code += '}';
                }

                if(type == 2) {
                    var html_editor = ace.edit("html_editor");
                    html_editor.getSession().setMode("ace/mode/html");
                    html_editor.getSession().setUseWorker(false);
                    html_editor.setValue(html_code);

                    var css_editor = ace.edit("css_editor");
                    css_editor.getSession().setMode("ace/mode/css");
                    css_editor.getSession().setUseWorker(false);
                    css_editor.setValue(css_code);

                } else if(type == 3) {
                    var pop_under_html_editor = ace.edit("pop_under_html_editor");
                    pop_under_html_editor.getSession().setMode("ace/mode/html");
                    pop_under_html_editor.getSession().setUseWorker(false);
                    pop_under_html_editor.setValue(html_code);

                    var pop_under_css_editor = ace.edit("pop_under_css_editor");
                    pop_under_css_editor.getSession().setMode("ace/mode/css");
                    pop_under_css_editor.getSession().setUseWorker(false);
                    pop_under_css_editor.setValue(css_code);
                } else if(type == 4) {
                    var interstitial_html_editor = ace.edit("interstitial_html_editor");
                    interstitial_html_editor.getSession().setMode("ace/mode/html");
                    interstitial_html_editor.getSession().setUseWorker(false);
                    interstitial_html_editor.setValue(html_code);

                    var interstitial_css_editor = ace.edit("interstitial_css_editor");
                    interstitial_css_editor.getSession().setMode("ace/mode/css");
                    interstitial_css_editor.getSession().setUseWorker(false);
                    interstitial_css_editor.setValue(css_code);
                    jQuery("#overlay").val('0');
                } else if(type == 7) {
                    var locker_html_editor = ace.edit("locker_html_editor");
                    locker_html_editor.getSession().setMode("ace/mode/html");
                    locker_html_editor.getSession().setUseWorker(false);
                    locker_html_editor.setValue(html_code);

                    var locker_css_editor = ace.edit("locker_css_editor");
                    locker_css_editor.getSession().setMode("ace/mode/css");
                    locker_css_editor.getSession().setUseWorker(false);
                    locker_css_editor.setValue(css_code);

                    jQuery("#locker #b_width").val(width);
                    jQuery("#locker #w_type").val(w_type);
                    jQuery("#locker #height").val(height);
                    jQuery("#locker #h_type").val(h_type);
                }
            }
        } else {
            alert('Choose banner size');
        }
    }

    jQuery('#codeModal').on('show.bs.modal', function (event) {
        b_id = '';
        var id = jQuery(".get_code").attr('data-template');
        var modal = jQuery(this);
        jQuery.ajax({
            url: '<?php echo API_URL; ?>?q=create_id&pub_id=<?php echo $pub_id; ?>&token=<?php echo $token; ?>&template_id='+id,
            success: function(_2){
                var _01 = JSON.stringify(_2);
                var _00 = JSON.parse(_01);
                b_id = _00.response;
                switch(id){
                    case '1': var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:336px;height:280px"></iframe>'; break;
                    case '2':  var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:300px;height:250px"></iframe>'; break;
                    case '3':  var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:728px;height:90px"></iframe>'; break;
                    case '4':  var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:300px;height:600px"></iframe>'; break;
                    case '5':  var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:300px;height:100px"></iframe>'; break;
                    case '6':  var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:468px;height:60px"></iframe>'; break;
                    case '7':  var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:250px;height:250px"></iframe>'; break;
                    case '8':  var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:160px;height:600px"></iframe>'; break;
                    case '9':  var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:120px;height:600px"></iframe>'; break;
                    case '10':  var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:120px;height:240px"></iframe>'; break;
                    case '11':  var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:240px;height:400px"></iframe>'; break;
                    case '12':  var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:234px;height:60px"></iframe>'; break;
                    case '13':  var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:180px;height:150px"></iframe>'; break;
                    case '14':  var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:125px;height:125px"></iframe>'; break;
                    case '15':  var code = '<iframe src="<?php echo BANNERS_URL; ?>?id='+b_id+'" style="border:none;overflow:hidden;width:120px;height:240px"></iframe>'; break;
                }
                modal.find('#paste_code').val(code);
            }
        });
    });

    jQuery("#iframe_15").on('load', function(){
        jQuery(".banner-loading").html('Choose banner size');
    });

    jQuery(".banner_type").on('click', function () {
        jQuery(".banner-loading").hide(0);
        banner_type = jQuery(this).val();
        jQuery("iframe").hide(0, function(){
            jQuery("#iframe_"+banner_type).show(0);
        });
        jQuery(".get_code").show(0);
        jQuery(".get_code").attr('data-template', banner_type);
    });

    jQuery("#interstitial #skip_button").on("change",function() {
        if (this.value != '1') {
            jQuery('#interstitial_timer').hide(0);
            jQuery('#timer').val('0');
        } else {
            jQuery('#interstitial_timer').show(0);
        }
    });

    function edit_banner() {

        <?php require 'banner-templates.php'; ?>

        var id = jQuery(".get_code").attr('data-template');

        jQuery("#template").removeClass('active');
        jQuery("#custom").addClass('active');

        html_code = default_ads_html[id];
        css_code = default_ads_css[id];

        var html_editor = ace.edit("html_editor");
        html_editor.getSession().setMode("ace/mode/html");
        html_editor.getSession().setUseWorker(false);
        html_editor.setValue(html_code);

        var css_editor = ace.edit("css_editor");
        css_editor.getSession().setMode("ace/mode/css");
        css_editor.getSession().setUseWorker(false);
        css_editor.setValue(css_code);

        jQuery("#width").val(default_ads_width[id]);
        jQuery("#height").val(default_ads_height[id]);
    }

    function custom_code(type) {
        if(type == 4) {
            if(jQuery(".custom_interstitial").is(":visible")) {
                jQuery(".custom_interstitial").hide();
            } else {
                jQuery(".custom_interstitial").show();
            }
        } else if(type == 7) {
            if(jQuery(".custom_locker").is(":visible")) {
                jQuery(".custom_locker").hide();
            } else {
                jQuery(".custom_locker").show();
            }
        } else if(type == 8) {
            if(jQuery(".custom_offerwall").is(":visible")) {
                jQuery(".custom_offerwall").hide();
            } else {
                jQuery(".custom_offerwall").show();
            }
        }
    }

    function set_template(type, id) {
        if(type == 3) {
            jQuery(".pop_under_area").show();
        } else if(type == 4) {
            jQuery(".interstitial_area").show();
        } else if(type == 7) {
            jQuery(".locker_area").show();
        } else if(type == 8) {
            jQuery(".offerwall_area").show();
        }

        <?php require_once 'js-templates.php'; ?>

        if(type == 3) {
            var pop_under_html_editor = ace.edit("pop_under_html_editor");
            pop_under_html_editor.getSession().setMode("ace/mode/html");
            pop_under_html_editor.getSession().setUseWorker(false);
            pop_under_html_editor.setValue(html_code);

            var pop_under_css_editor = ace.edit("pop_under_css_editor");
            pop_under_css_editor.getSession().setMode("ace/mode/css");
            pop_under_css_editor.getSession().setUseWorker(false);
            pop_under_css_editor.setValue(css_code);

            if(id == 3) {
                jQuery("#target option[value='3']").remove();
            } else {
                if(jQuery("#target option[value='3']").length == 0) {
                    var new_window = jQuery('<option value="3">Open ad in new (iframe size) window behind destination page in current tab</option>');
                    jQuery('#target').append(new_window);
                }
            }

            if(id == 2 || id == 10) {
                jQuery("#target").val(3);
                if(id == 10) {
                    jQuery(".pop_under_size #rows").val('4');
                    jQuery(".pop_under_size #columns").val('3');
                }
            } else {
                jQuery("#target").val(1);
            }

            if(id == 10 || id == 11) {
                jQuery(".pop_under_size").show(0);
                jQuery("#pop_under #template_id").val(id);
            } else {
                jQuery(".pop_under_size").hide(0);
            }

            jQuery("#pop_under #width").val(width);
            jQuery("#pop_under #w_type").val(w_type);
            jQuery("#pop_under #height").val(height);
            jQuery("#pop_under #h_type").val(h_type);

        } else if(type == 4) {
            var interstitial_html_editor = ace.edit("interstitial_html_editor");
            interstitial_html_editor.getSession().setMode("ace/mode/html");
            interstitial_html_editor.getSession().setUseWorker(false);
            interstitial_html_editor.setValue(html_code);

            var interstitial_css_editor = ace.edit("interstitial_css_editor");
            interstitial_css_editor.getSession().setMode("ace/mode/css");
            interstitial_css_editor.getSession().setUseWorker(false);
            interstitial_css_editor.setValue(css_code);

            if(id == 6) {
                jQuery(".interstitial_size").show(0);
                jQuery("#interstitial #template_id").val(id);
            } else {
                jQuery(".interstitial_size").hide(0);
            }

            if(id == 20) {
                jQuery("#overlay").val('1');
            } else if(id == 21) {
                jQuery("#overlay").val('2');
            } else {
                jQuery("#overlay").val('0');
            }

            jQuery("#interstitial #width").val(width);
            jQuery("#interstitial #w_type").val(w_type);
            jQuery("#interstitial #height").val(height);
            jQuery("#interstitial #h_type").val(h_type);
        } else if(type == 7) {
            var locker_html_editor = ace.edit("locker_html_editor");
            locker_html_editor.getSession().setMode("ace/mode/html");
            locker_html_editor.getSession().setUseWorker(false);
            locker_html_editor.setValue(html_code);

            var locker_css_editor = ace.edit("locker_css_editor");
            locker_css_editor.getSession().setMode("ace/mode/css");
            locker_css_editor.getSession().setUseWorker(false);
            locker_css_editor.setValue(css_code);

            jQuery("#locker #preview_template_id").val(id);
            jQuery("#locker #locker_template_id").val(id);

            jQuery("#locker #b_width").val(width);
            jQuery("#locker #w_type").val(w_type);
            jQuery("#locker #height").val(height);
            jQuery("#locker #h_type").val(h_type);
        
        } else if(type == 8) {
            var offerwall_html_editor = ace.edit("offerwall_html_editor");
            offerwall_html_editor.getSession().setMode("ace/mode/html");
            offerwall_html_editor.getSession().setUseWorker(false);
            offerwall_html_editor.setValue(html_code);

            var offerwall_css_editor = ace.edit("offerwall_css_editor");
            offerwall_css_editor.getSession().setMode("ace/mode/css");
            offerwall_css_editor.getSession().setUseWorker(false);
            offerwall_css_editor.setValue(css_code);

            jQuery("#offerwall #width").val(width);
            jQuery("#offerwall #w_type").val(w_type);
            jQuery("#offerwall #height").val(height);
            jQuery("#offerwall #h_type").val(h_type);

            if(id == 81) {
                jQuery("#title_length").val('50');
            } else {
                jQuery("#title_length").val('25');
            }
        }
    }

</script>