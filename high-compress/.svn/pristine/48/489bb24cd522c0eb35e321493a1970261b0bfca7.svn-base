<?php defined('ABSPATH') || die('Cheatin\' uh?');
if ($_GET['page']=='highcompress-optimizer' || $_GET['page']=='highcompress-settings') {
    require(HIGHCOMPRESS_3RD_PARTY_PATH . 'banners.php');
}
?>

<style>
.buttons {
    float: right;
    color: #4CAF50;
    border: 2px solid #4CAF50;
    padding: 5px 29px;
    border-radius: 35px;
    font-family: 'Roboto', sans-serif;
    line-height: 21px;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 13px;
}
</style>
<!-- HEADER START -->
<header style="margin-right: 30px;margin-top: 30px;height: auto;">

    <nav class="navbar">
        <!-- MENU START -->
        <div class="container">

            <div class="col-md-6">
                <div class="row">
                    <br>
                    <a class="navbar-brand logo-simple wow fadeIn" style="font-size: 37px;">High
                        <span>Compress</span><b>.</b></a>
                    <br>
                </div>
                <div class="row">
                    <font color="#40b1d0">(Powered by A.I)</a></font>
                </div>
            </div>

            <div class="col-md-3">
                <h3 style="color: white;">Status </h3>
                <font color="#40b1d0">Your subscription:
                    <b><?php echo get_option('HIGHCOMPRESS_PLAN_NAME'); ?></b></a>
                </font>
            </div>
            <div class="col-md-3">
                <h3 style="color: white;">Remaining Credit</h3>
                <font color="#40b1d0">Your Have : <b><?php echo esc_html((get_option('HIGHCOMPRESS_COUNT')));?></b>
                    Images Left.</font>
            </div>
        </div>
    </nav><!-- END NAV -->
    <br><br>

</header><!-- END HEADER -->
<br>

<?php  $TSB=get_option('HIGHCOMPRESS_TOATAL_IMAGES');
       $TSA=get_option('HIGHCOMPRESS_TOTAL_COUNT');

       if ($TSB!=0) {
           $percent=round(($TSA/$TSB)*100, 0);
       } else {
           $percents=0;
       }

       $total_size_format=size_format($TSB, 2);
       $TSAC=size_format($TSA, 0);
       $TSBC=size_format($TSB, 0);

             ?>
<div class="plans-no-index" style="margin-right: 30px;background: #f1f1f1;margin-top: -90px;">
    <!-- START PLANS -->
    <div class="container">
          <div class="row">
        <div class="col-md-4">
            <h3>Overview </h3>
            <br>
            <div id="circle">
                <div id="firstc" class="c100 p<?php echo esc_html($percent); ?>">
                    <span><?php echo esc_html($percent); ?>%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>

                <b>You optimized <?php echo esc_html($percent); ?>% of your websites images </b>
            </div>
        </div>

        <div class="col-md-4">
            <h3>Statistics </h3><br>
            <div id="total_blog_img"><b>
                    <h3 style="display:inline"><?php echo esc_html(get_option('HIGHCOMPRESS_TOATAL_IMAGES'));?></h3>
                    images your blog had.<br>
                </b></div>

            <hr
                style="display: block;margin-top: 1.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;">

            <div id="total_img"><b>
                    <h3 style="display:inline"><?php echo esc_html(get_option('HIGHCOMPRESS_TOTAL_COUNT'));?></h3>
                    images you optimized with Highcompress.<br>
                </b></div>
            <hr
                style="display: block;margin-top: 1.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;">

            <br>


            <div id="prev_size">Your blog had <b>
                    <?php  echo esc_html(size_format(get_option('HIGHCOMPRESS_TOATAL_Size_BEFORE'), 2));  ?></b> of
                Images before.</div>
            <br>
            <div class="progress">

                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_html($percent); ?>"
                    aria-valuemin="0" aria-valuemax="100" style="width:100%">
                    100%
                </div>
            </div>
            <div id="new_size">
                Now it's just <b> Calculating.. </b> after compression!

                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0"
                        aria-valuemax="100" style="width: 0%">
                        0%
                    </div>
                </div>

                <br>

            </div>
        </div>
        <div class="col-md-4">
            <h3>Information </h3>

            <div class="alert alert-success">
                <i class="fa fa-info-circle" aria-hidden="true"></i> Auto Backup :
                <?php $rule=get_option('HIGHCOMPRESS_AUTOBACKUP_RULE'); if ($rule=="YES") {
                 echo wp_kses_post("<b>ON</b>");
             } else {
                 echo wp_kses_post("<b>OFF</b>");
             } ?>
            </div>
            <div class="alert alert-success">
                <i class="fa fa-info-circle" aria-hidden="true"></i> You must keep this page open while the bulk
                optimization is processing. If you leave you can come back to continue where it left off.
            </div>
            <div class="alert alert-success">
                <i class="fa fa-info-circle" aria-hidden="true"></i> Please remove any other simmilar plugin before
                using it.
            </div>
            <div class="alert alert-success">
               <h6>
                    <i class="fa fa-info-circle" aria-hidden="true"></i> Update    <font color=#5F758E><a
                            href="<?php echo esc_url(get_admin_url()) . 'admin.php?page=' . HIGHCOMPRESS_SLUG . '-settings' ?>">Highcompress
                            settings.</a></font>
            </h6>
            </div>


            <br>

        </div>
</div>

    </div>
</div>
<br>
<div class="plans-no-index" style="margin-right: 30px;background: #dae7ef;">
    <!-- START PLANS -->
    <div class="container">
       <div class="row">
        <div class="col-md-12 text-center">
            <div id="process_btn">
                <button id="submit" onclick="verifykey()" name="submit"
                    style="border-radius: 5px;background-color: #2196f3; /* Green */border: none;color: white;padding: 8px 29px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;webkit-transition-duration: 0.4s; /* Safari *//* transition-duration: 0.4s; *//* cursor: pointer; */"><img
                        id="gear" src="<?php echo esc_url(plugins_url('../../assets/', __FILE__));?>img/Gear.png"
                        width="19px" style="margin-top: -3px;margin-right: 5px;"> Run Image Compressor</button>
            </div>
        </div>
        </div>
    </div>
</div>

<div id="result" class="domain-search-error" style="display:none;">
    <h4><b>Compressed Result</b></h4>
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="highcompress_modal">
        <div id="caption"></div>
    </div>
    <div class="suggestion-domains" style="height: 500px; overflow-y: scroll;">

        <div id="output">

        </div>
    </div>

</div>

<script>
verifykey();
fetchstats();


function fetchstats() {
    jQuery.ajax({
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        type: "POST",
        async: true,
        data: {
            'action': 'verify_highcompress_process_images',
            "fetch": 1
        },
        success: function(data) {
            console.log("verify_highcompress_process_images")
            console.log(data)

            var res = data.split("℧");
            var totalsize = res[0];
            var totalfiles = res[1];
            var totalcount = res[2];
            var highcompresssize = res[3];
            var highcompressper = res[4];
            var per;
            if (totalfiles != 0) {
                per = ((totalcount / totalfiles) * 100).toFixed(0);
                if (per > 100) {
                    per = 100;
                }
            } else {
                per = 0;
            }

            jQuery("#total_img").html('<b><h3 style="display:inline">' + totalcount +
                '</h3> images you optimized with Highcompress.<br></b></div>');
            jQuery("#circle").html('<div class="c100 p' + per + '"><span>' + per +
                '%</span><div class="slice"><div class="bar"></div><div class="fill"></div></div></div></div><b>You optimized ' +
                per + '% of your websites images</b><br> ');
            jQuery("#total_blog_img").html('<b><h3 style="display:inline">' + totalfiles +
                '</h3>  images your blog had.<br></b></div>');
            jQuery("#new_size").html('Now it\'s just <b> ' + highcompresssize +
                ' </b> after compression! <div class="progress">  <div class="progress-bar" role="progressbar" aria-valuenow="30"aria-valuemin="0" aria-valuemax="100" style="width:' +
                highcompressper + '%"> ' + highcompressper + '%</div> </div><br>');
            jQuery("#prev_size").html('Your blog had <b>' + totalsize + '</b> of Images before.');

        }
    });

}

function verifykey() {
    jQuery("#gear").attr("src", "<?php echo plugins_url('../../assets/', __FILE__);?>img/Gear.svg");
    jQuery.ajax({
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        type: "POST",
        async: true,
        data: {
            'action': 'verify_highcompress_api_key',
            "key": '<?php echo get_option('HIGHCOMPRESS_API_KEY'); ?>',
            "verify": 1
        },
        success: function(data) {
            console.log("verify_highcompress_api_key")
            console.log(data)
            data = JSON.parse(data);
            if (data.status == '404') {
                swal({
                    title: 'Error!',
                    text: 'Your API key is Not Valid',
                    type: 'error',
                    confirmButtonText: 'OK'
                })
                jQuery("#process_btn").html(
                    '<button id="submit" onclick="verifykey()" name="submit" style="border-radius: 5px;background-color: #2196f3; /* Green */border: none;color: white;padding: 8px 29px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;webkit-transition-duration: 0.4s; /* Safari *//* transition-duration: 0.4s; *//* cursor: pointer; */" ><img id="gear" src="<?php echo esc_url(plugins_url('../../assets/', __FILE__));?>img/Gear.png" width="19px" style="margin-top: -3px;margin-right: 5px;"> Run Image Compressor</button>'
                );
            } else if (data.status == '400') {
                swal({
                    title: 'Error!',
                    text: 'Please Enter You API Key First',
                    type: 'error',
                    confirmButtonText: 'OK'
                })

                jQuery("#process_btn").html(
                    '<button id="submit" onclick="verifykey()" name="submit" style="border-radius: 5px;background-color: #2196f3; /* Green */border: none;color: white;padding: 8px 29px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;webkit-transition-duration: 0.4s; /* Safari *//* transition-duration: 0.4s; *//* cursor: pointer; */" ><img id="gear" src="<?php echo esc_url(plugins_url('../../assets/', __FILE__));?>img/Gear.png" width="19px" style="margin-top: -3px;margin-right: 5px;"> Run Image Compressor</button>'
                );

            } else if (data.status == '202') {
                swal({
                    title: 'Error!',
                    text: 'This Key is already in use',
                    type: 'error',
                    confirmButtonText: 'OK'
                })
            } else if (data.status == '201') {
                jQuery("#process_btn").html(
                    '<button id="submit" onclick="process_image()" name="submit" style="border-radius: 5px;background-color: #2196f3; /* Green */border: none;color: white;padding: 8px 29px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;webkit-transition-duration: 0.4s; /* Safari *//* transition-duration: 0.4s; *//* cursor: pointer; */" ><img id="gear" src="<?php echo esc_url(plugins_url('../../assets/', __FILE__));?>img/Gear.png" width="19px" style="margin-top: -3px;margin-right: 5px;"> Run Image Compressor</button>'
                );
            } else {
                swal({
                    title: 'Error!',
                    text: 'There is some error with your plugin Contact support@highcompress.com',
                    type: 'error',
                    confirmButtonText: 'OK'
                })
            }
        }
    });
}

var needStop = false;

function pause() {
    needStop = true;
    jQuery("#process_btn").html(
        '<button id="submit" onclick="process_image()" name="submit" style="border-radius: 5px;background-color: #2196f3; /* Green */border: none;color: white;padding: 8px 29px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;webkit-transition-duration: 0.4s; /* Safari *//* transition-duration: 0.4s; *//* cursor: pointer; */" ><img id="gear" src="<?php echo plugins_url('../../assets/', __FILE__);?>img/Gear.png" width="19px" style="margin-top: -3px;margin-right: 5px;"> Resume Image Compressor</button>'
    );

}

function process_image() {
    jQuery("#process_btn").html(
        '<button id="submit" onclick="pause()" name="submit" style="border-radius: 5px;background-color: #0084ec; /* Green */border: none;color: white;padding: 8px 29px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;webkit-transition-duration: 0.4s; /* Safari *//* transition-duration: 0.4s; *//* cursor: pointer; */" ><img id="gear" src="<?php echo plugins_url('../../assets/', __FILE__);?>img/Gear.png" width="19px" style="margin-top: -3px;margin-right: 5px;"> Pause Image Compressor</button>'
    );

    jQuery("#gear").attr("src", "<?php echo plugins_url('../../assets/', __FILE__);?>img/Gear.svg");
    jQuery("#result").show();
    jQuery.ajax({
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        type: "POST",
        async: true,
        data: {
            'action': 'verify_highcompress_process_images',
            "process": 1
        },
        success: function(data) {
            console.log("verify_highcompress_process_images")
            console.log(data)
            if (needStop) {
                needStop = false;
                return;
            }

            if (data.indexOf('℧500℧') >= 0) {

                swal({
                    title: 'Error!',
                    text: 'Please enable allow_url_fopen = true or contact us to solve this issue at support@highcompress.com.',
                    type: 'error',
                    confirmButtonText: 'OK'
                })
                jQuery("#gear").attr("src",
                    "<?php echo plugins_url('../../assets/', __FILE__);?>img/Gear.png");
                jQuery("#process_btn").html(
                    '<button id="submit" onclick="process_image()" name="submit" style="border-radius: 5px;background-color: #2196f3; /* Green */border: none;color: white;padding: 8px 29px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;webkit-transition-duration: 0.4s; /* Safari *//* transition-duration: 0.4s; *//* cursor: pointer; */" ><img id="gear" src="<?php echo plugins_url('../../assets/', __FILE__);?>img/Gear.png" width="19px" style="margin-top: -3px;margin-right: 5px;"> Run Image Compressor</button>'
                );
                jQuery("#result").hide();
                return;
            }
            if (data.indexOf('℧401℧') >= 0) {

                swal({
                    title: 'Error!',
                    text: 'Your API key credit is finised please purchase another key',
                    type: 'error',
                    confirmButtonText: 'OK'
                })
                jQuery("#gear").attr("src",
                    "<?php echo plugins_url('../../assets/', __FILE__);?>img/Gear.png");
                jQuery("#process_btn").html(
                    '<button id="submit" onclick="process_image()" name="submit" style="border-radius: 5px;background-color: #2196f3; /* Green */border: none;color: white;padding: 8px 29px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;webkit-transition-duration: 0.4s; /* Safari *//* transition-duration: 0.4s; *//* cursor: pointer; */" ><img id="gear" src="<?php echo plugins_url('../../assets/', __FILE__);?>img/Gear.png" width="19px" style="margin-top: -3px;margin-right: 5px;"> Run Image Compressor</button>'
                );
                return;
            }
            if (data.length < 5) {
                swal({
                    title: 'Alert!',
                    text: 'All Images Compressed !',
                    type: 'info',
                    confirmButtonText: 'OK'
                })
                jQuery("#gear").attr("src",
                    "<?php echo plugins_url('../../assets/', __FILE__);?>img/Gear.png");
                jQuery("#process_btn").html(
                    '<button id="submit" onclick="process_image()" name="submit" style="border-radius: 5px;background-color: #2196f3; /* Green */border: none;color: white;padding: 8px 29px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;webkit-transition-duration: 0.4s; /* Safari *//* transition-duration: 0.4s; *//* cursor: pointer; */" ><img id="gear" src="<?php echo plugins_url('../../assets/', __FILE__);?>img/Gear.png" width="19px" style="margin-top: -3px;margin-right: 5px;"> Run Image Compressor</button>'
                );
            } else {
                jQuery("#output").append(data);
                jQuery('.suggestion-domains').scrollTop(jQuery('.suggestion-domains')[0].scrollHeight);
                process_image();
                fetchstats();
            }

        }
    });
}
</script>