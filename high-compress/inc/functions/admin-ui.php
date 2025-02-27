<?php defined('ABSPATH') || die('Cheatin\' uh?');
if ($_GET['page']=='highcompress-optimizer' || $_GET['page']=='highcompress-settings') {
    //  require( HIGHCOMPRESS_3RD_PARTY_PATH . 'banners.php' );
}

?>

<?php $keyapi=get_option('HIGHCOMPRESS_API_KEY');
if ($keyapi=="") {
    ?>
<header style="margin-right: 30px;margin-top: 30px;">
    <div class="animation-header">
        <!-- HEADRR ANIMATION -->
        <span class='stars'></span>
        <span class="starsbg"></span>

    </div><!-- END HEADER ANIMATION -->

    <nav class="navbar megamenu">
        <!-- MENU START -->
        <div class="container">
            <div class="navbar-header">

                <h4><a class="navbar-brand logo-simple wow fadeIn"><span>High</span> Compress<b>.</b> </a></h4>
                <h3>
                    <p style="color: gray;font-size: 14px;">(Powered by A.I)</p>
                </h3>
            </div>
            <div id="js-bootstrap-offcanvas" class="navbar-offcanvas navbar-offcanvas-touch main-nav">

            </div>
        </div>
    </nav><!-- END NAV -->

    <div class="domain-section">
        <!-- DOMAIN SERCTION START -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="big-title">BEST Image Compressor<span class="wow fadeIn" data-wow-delay="0.2s"> For
                            Wordpress</span></div>
                    <div class="head-light-title"></div>
                    <div class="domain-search-holder">
                        <div id="domain-search" class="wow fadeIn" data-wow-delay="0.5s">
                            <input type="text" id="key_box" onchange="checkapi()" name="domain"
                                placeholder="Enter Your API KEY" />
                            <input type="hidden" id="key_box_flag" />
                            <span class="inline-button">
                                <div id="checkbtn">
                                </div>
                            </span>
                            <br>

                            <font color="white" size='3'>Don't Have API Key ? <span
                                    style="color:#6bd26f; cursor: pointer;"><a style="color:#6bd26f; cursor: pointer;"
                                        href="https://highcompress.com/signup" target="_blank"><b>Click
                                            here</b></a></span> to get one for Free !</font>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div><!-- DOMAIN SECTION END -->
</header>
<!-- END BLOG SERCTION -->
<!-- END FOOTER -->

<?php
} else { ?>


<!-- HEADER START -->
<header style="margin-right: 30px;margin-top: 30px;height: 250px;">


    <nav class="navbar">
        <!-- MENU START -->
        <div class="container">
            <div class="navbar-header">
                <br>
                <a class="navbar-brand logo-simple wow fadeIn"><span><b>High</b></span> Compress<b>.</b></a>
            </div>

        </div>
    </nav><!-- END NAV -->
    <br><br>
    <br>

    <div class="container">
        <!-- START HEADLINE -->
        <div class="row">
            <div class=" col-md-3">
            </div>
            <?php $current_user = wp_get_current_user();
          if (user_can($current_user, 'administrator')) {
              ?>
            <div class="col-md-6">
                <input type="hidden" id="key_box_flag" />
                <div id="valid_check">
                    <font size="3" color="white">Your API KEY </font><input type="text" id="key_box"
                        onchange="checkapi()" value="<?php echo esc_html($keyapi) ?>" style="width:52%">&nbsp;&nbsp;
                    <font color="#5ce25c"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;<b>Your key is Valid</b>
                    </font>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div> <?php
                // user is an admin
          } ?>
    </div><!-- END HEADLINE -->

</header><!-- END HEADER -->
<br>
<div class="plans-no-index" style="margin-right: 30px;">
    <!-- START PLANS -->
    <center>
        <h2 style="margin-top: -70px;"><b>HIGH COMPRESS SETTINGS</b></h2>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="plans-no-index-info">
                    <h4>1. Choose Mode</h4>
                    <div class="col-md-12">
                        <div class="btn-group btn-group-justified d-flex align-items-center justify-content-center"
                            role="group">
                            <?php $option= get_option('HIGHCOMPRESS_MODE'); ?>

                            <input type="radio" class="btn-check" onchange="cc('n');" name="btnradio" id="btnradio1"
                                autocomplete="off" <?php if($option=='n'){ echo "checked=checked";} ?>> <label
                                class="btn btn-primary" for="btnradio1">Normal</label>

                            <input type="radio" class="btn-check" onchange="cc('h');" name="btnradio" id="btnradio2"
                                autocomplete="off" <?php if($option=='h'){ echo "checked=checked";} ?>>
                            <label class="btn btn-primary" for="btnradio2">High</label>

                            <input type="radio" class="btn-check" onchange="cc('u');" name="btnradio" id="btnradio3"
                                autocomplete="off" <?php if($option=='u'){ echo "checked=checked";} ?>>
                            <label class="btn btn-primary" for="btnradio3">Super</label>

                        </div>
                        <div style="background:white; padding: 10px;">
                            <div id="normal" class="tabcontent" style="display:none">
                                <h3>Normal</h3>
                                <p>This Mode is lossless compression so if the quality is your priority use this mode.
                                    Use
                                    this option if your image is in low quality with the size below 1mb.(recommended)
                                </p>
                            </div>
                            <div id="high" class="tabcontent">
                                <h3>High</h3>
                                <p>This Mode is lossy compression and can compress your image up to 70%.
                                    Use this option if your image is in high quality with a size between 1-2
                                    Mb(recommended).
                                </p>
                            </div>
                            <div id="super" class="tabcontent" style="display:none">
                                <h3>Super</h3>
                                <p>This Mode is lossy compression and can compress your image up to 95%.
                                    Pro tip: Use this option if your image is in high quality with a size between 2-10
                                    Mb.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <div class="col-md-1"></div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <div style="background:white;padding: 10px;margin-top: 60px;min-width: 300px;margin-left: -30px;">
                    <center>
                        <h3>Your plan</h3>
                    </center>
                    <div class="row">
                        <div class="col-md-4" style="text-align: center;">
                            <img src="<?php echo esc_url(HIGHCOMPRESS_PLUGIN_PATH.'assets/img/spacer.png'); ?>">

                        </div>
                        <div class="col-md-8">
                            <br><br>
                            <b> <?php echo esc_html(get_option('HIGHCOMPRESS_PLAN')-get_option('HIGHCOMPRESS_COUNT')); ?>
                                out of <?php echo esc_html(get_option('HIGHCOMPRESS_PLAN')); ?></b>

                        </div>
                    </div>
                    <br>
                    <a class="btn-ordr-plan d-flex align-items-center justify-content-center"
                        href="https://bit.ly/highcompressUpgrade" target="_blank"
                        style="border-radius: 25px;background-color: #2196f3; /* Green */border: none;color: white;padding: 8px 29px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;m;margin: 12px 5px;webkit-transition-duration: 0.4s; /* Safari *//* transition-duration: 0.4s; *//* cursor: pointer; */">Upgrade
                        plan</a>


                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?php $rule=get_option('HIGHCOMPRESS_AUTOBACKUP_RULE');?>
                <?php $rule2=get_option('HIGHCOMPRESS_AUTOCOMPRESS_RULE');?>
                <div style="background:white;padding: 30px;margin-top: 30px;">


                    <h4><b><i class=" fa fa-download" aria-hidden="true"></i>
                            Auto Backup
                        </b></h4>
                    <div class="set-row">
                        <span>
                            Turn on / off auto backup
                        </span>
                        <label class="switch">
                            <input type="checkbox" id="checkbox_id" onchange="backuptoogle()"
                                <?php if($rule=='YES'){ echo esc_html("checked=checked");} ?>>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <p style="color: grey;font-size: 13px;">backup location -> wp-content/uploads/highcompress_backup
                    </p>

                    <h4><b><i class="fa fa-magic" aria-hidden="true"></i> Auto Compress</b></h4>
                    <div class="set-row">
                        <span>
                            Turn on / off auto Compress
                        </span>
                        <label class="switch">
                            <input type="checkbox" id="checkbox_id2" onchange="auto_compress_uptoogle()" <?php if ($rule2=="YES") 
                      echo esc_html("checked") ?>>
                            <span class="slider round"></span>
                        </label>

                    </div>
                    <p style="color: grey;font-size: 13px;">Auto Compress will automatically compress images
                        that
                        you
                        upload.</p>

                </div>

            </div>
            <div class="col-md-1"></div>
            <div class="col-md-1"></div>
            <div class="col-md-4">

                <div style="background:white;padding: 40px;margin-top: 30px;min-width: 300px;margin-left: -30px;">
                    <h4><b><i class="fa fa-question-circle" aria-hidden="true"></i> Need Help ?</b></h4>
                    Do you have thousands of images and want to compress all at once then just conctact us.<br>
                    <br>
                    <p><b>Contact us : support@highcompress.com</b></p>
                </div>
            </div>
        </div>

    </div>
    <br>


    <center> <a href="<?php echo esc_url(get_admin_url()) . 'upload.php?page=' . HIGHCOMPRESS_SLUG . '-optimizer' ?>"
            <button
            style="border-radius: 25px;background-color: #2196f3; /* Green */border: none;color: white;padding: 8px 29px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;m;margin: 12px 5px;webkit-transition-duration: 0.4s; /* Safari *//* transition-duration: 0.4s; *//* cursor: pointer; */">Save
            and Go to Bulk Image Compressor</button></a></center>

</div>

<?php } ?>


<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script>
updateonload();
jQuery(document).ready(function() {
    jQuery('[data-toggle="tooltip"]').tooltip();
});

function filetype(type) {

    jQuery.ajax({
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        type: "POST",
        async: true,
        data: {
            'action': 'verify_highcompress_process_images',
            'type': type,
            "settype": 1
        },
        success: function(data) {}
    });

}

function backuptoogle() {
    if (jQuery('#checkbox_id').is(":checked")) {
        mode = "YES";
    } else {
        mode = "NO";
    }

    jQuery.ajax({
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        type: "POST",
        async: true,
        data: {
            'action': 'verify_highcompress_api_key',
            "mode": mode,
            "backup": 1
        },
        success: function(data) {

        }
    });
}

function auto_compress_uptoogle() {
    if (jQuery('#checkbox_id2').is(":checked")) {
        mode = "YES";
    } else {
        mode = "NO";
    }

    jQuery.ajax({
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        type: "POST",
        async: true,
        data: {
            'action': 'verify_highcompress_api_key',
            "mode": mode,
            "auto": 1
        },
        success: function(data) {

        }
    });
}

function email() {
    // swal({
    //   title: 'Enter Your email address!',
    //   input: 'email',

    //    }).then(function (email) {
    //     jQuery.ajax({

    //     url:"<?php echo admin_url('admin-ajax.php'); ?>",
    //     type:"POST",
    //     async:true,
    //     data:{
    //       'action': 'verify_highcompress_api_key',
    //        "mail":1,
    //        "email":email 
    //        },
    //        success: function(data)
    //        {

    //         if(data==1)
    //           {
    //           swal({
    //               type: 'success',
    //               html: 'Check Your Mail For API key'
    //              })
    //            }
    //            else
    //            {
    //            swal({
    //               type: 'error',
    //               html: 'Email Already Registered'
    //              })

    //           }

    //        }
    //      });

    //     })
}

function cc(a) {
    updatemode(a);

    if (a == "n") {
        jQuery("#normal").show();
        jQuery("#high").hide();
        jQuery("#super").hide();

    }
    if (a == "h") {
        jQuery("#normal").hide();
        jQuery("#high").show();
        jQuery("#super").hide();
    }
    if (a == "u") {
        jQuery("#normal").hide();
        jQuery("#high").hide();
        jQuery("#super").show();
    }


}

function updateonload() {
    var key = document.getElementById("key_box").value;

    jQuery.ajax({
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        type: "POST",
        async: true,
        data: {
            'action': 'verify_highcompress_api_key',
            "key": key,
            "verify": 1
        },
        success: function(data) {

        }
    });
}

function updatemode(mode) {

    jQuery.ajax({
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        type: "POST",
        async: true,
        data: {
            'action': 'verify_highcompress_api_key',
            "mode": mode,
            "lvl": 1
        },
        success: function(data) {

        }
    });
}

function checkapi() {

    var key = document.getElementById("key_box").value;
    jQuery.ajax({
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        type: "POST",
        async: true,
        data: {
            'action': 'verify_highcompress_api_key',
            "key": key,
            "verify": 1
        },
        beforeSend: function() {
            jQuery("#checkbtn").html(
                '<button onclick="#" id="check-btn" name="submit" style="background: white;"><font size="6" color="green"><img src="<?php echo esc_url(plugins_url('../../assets/', __FILE__));?>img/ring.svg" width="30px" style="margin-top: -3px;margin-right: 5px;"></font></button>'
            );

        },
        success: function(data) {
            console.log((data))
            data = JSON.parse(data)
            if (data.status == 201) {
                swal({
                    title: 'Congratulations!',
                    text: 'Your API key is valid. You can now configure the Highcompress settings to optimize your images ',
                    type: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                    savedata();
                })
                jQuery("#checkbtn").html(
                    '<button onclick="#" id="check-btn" name="submit" style="background: white;"><font size="6" color="green"><i class="fa fa-check-circle" aria-hidden="true"></i></font></button>'
                );
                jQuery("#key_box_flag").val("1");

            } else if (data.status == 403) {
                swal({
                    title: 'Error!',
                    text: 'Can\'t Use Multiple Keys on one website',
                    type: 'error',
                    confirmButtonText: 'OK'
                }).then(function() {

                    fail();
                })
                jQuery("#checkbtn").html(
                    '<button onclick="#" id="check-btn" name="submit" style="background: white;"><font size="6" color="red"><i class="fa fa-times" aria-hidden="true"></i></font></button>'
                );
                jQuery("#key_box_flag").val("0");
            } else if (data.status == 401) {
                swal({
                    title: 'Error!',
                    text: 'Please Upgrade Your API Key',
                    type: 'error',
                    confirmButtonText: 'OK'
                }).then(function() {
                    fail();
                })
                jQuery("#checkbtn").html(
                    '<button onclick="#" id="check-btn" name="submit" style="background: white;"><font size="6" color="red"><i class="fa fa-times" aria-hidden="true"></i></font></button>'
                );
                jQuery("#key_box_flag").val("0");
            } else if (data.status == 404) {
                swal({
                    title: 'Error!',
                    text: 'Invalid API Key',
                    type: 'error',
                    confirmButtonText: 'OK'
                }).then(function() {
                    fail();
                })
                jQuery("#checkbtn").html(
                    '<button onclick="#" id="check-btn" name="submit" style="background: white;"><font size="6" color="red"><i class="fa fa-times" aria-hidden="true"></i></font></button>'
                );
                jQuery("#key_box_flag").val("0");
            }
        }
    });
}

function fail() {

    jQuery.ajax({
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        type: "POST",
        async: true,
        data: {
            'action': 'verify_highcompress_api_key',
            "fail": 1
        },
        success: function(data) {
            var kys = '<?php echo get_option('
            HIGHCOMPRESS_API_KEY ');?>';
            if (kys != '') {
                location.reload();

            }

        }

    });
}

function savedata() {
    var keyflag = document.getElementById("key_box_flag").value;
    if (keyflag = 1) {
        var key = document.getElementById("key_box").value;
        jQuery.ajax({
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            type: "POST",
            async: true,
            data: {
                'action': 'verify_highcompress_api_key',

                "key": key,
                "save": 1
            },
            success: function(data) {
                location.reload();
            }

        });

    } else {

    }
}
</script>