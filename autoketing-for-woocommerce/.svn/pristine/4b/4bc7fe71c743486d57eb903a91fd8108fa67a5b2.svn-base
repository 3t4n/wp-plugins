<?php 
    $currentUser = wp_get_current_user();
    $userName = $currentUser->display_name;
    $autoketingLoginKey = get_option('autoketing_key_login');
    $sessionname = 'autoketing_login'.$autoketingLoginKey;
    isset( $_COOKIE[ $sessionname ] ) && $_COOKIE[ $sessionname ] == true ? setcookie( 'username', $userName, 0 , "/") : '';
    $link_autoLogin =  isset( $_COOKIE[ $sessionname ] ) && $_COOKIE[ $sessionname ] == true ? AUTOKETING_URL_CURRENCY_AUTO_LOGIN.$_COOKIE['keyLogin'] : '';
?>
<div class="auto-ketting">
    <?php if( !isset( $_COOKIE[ $sessionname ] ) ) : ?>
        <div class="auto-ketting-setting">
            <div class="popup-setting">
                <h2>Hi "<?php echo $userName; ?>" , Welcome to AutoKetting!</h2>
                <div class="content-setting">
                    <p><?php _e( 'ONLY 1 step connecting, Autoketing will bring you great e-commerce experiences.', 'autoketing' ); ?></p>
                    <div class="box-icon-setting">
                        <a href="javascript:void(0)" title="">
                            <img src="<?php echo AUTOKETING_PLUGIN_BASENAME.'assets/images/logo/logo.png' ;?>" />
                        </a>
                        <img class ="icon-plus" src="<?php echo AUTOKETING_PLUGIN_BASENAME.'assets/images/icons/icon-plus.png' ;?>" />
                        <a href="javascript:void(0)" title="">
                            <img src="<?php echo AUTOKETING_PLUGIN_BASENAME.'assets/images/icons/icon-woo.png' ;?>" />
                        </a>
                    </div>
                    <p class="desc"><?php _e( 'Connect your store with Autoketing for maximum customer conversion rates and 3x revenue growth. Allow us to accompany you!', 'autoketing' ); ?></p>
                </div>
                <div class="autoketing-connect">
                    <a href="javascript:void(0)" title="" id="auto-connect"><?php _e( "let's connect",'autoketing' ) ;?></a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="autoketing-wrap">
        <div class="auto-ketting-header">
            <h1><?php echo $_COOKIE['username']; ?>, how are you doing?</h1>
            <p>Today, thousands of AutoKetting customers have been creating new offers and changing settings to optimize conversions. Ready to review how your apps are performing and add new tweaks to make them convert more sales?</p>
            <img src="<?php echo AUTOKETING_PLUGIN_BASENAME.'assets/images/logo/logo.jpg' ;?>"/>
        </div>
        <div class="list-app">
            <div class="list-tab-menu">
                <ul>
                    <li>
                        <a href="javascript:void(0)" title="addAppsList" class='showListApps ' data-idList = "addAppsList">Add Apps</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" title="installAppsList" class='showListApps active' data-idList="installAppsList">Installed Apps (1)</a>
                    </li>
                </ul>
            </div>
            <div class="list-app-data" id = 'addAppsList'>
                <div class="box-item-app">
                    <div class="wrap-item">
                        <div class="icon">
                            <img src="<?php echo AUTOKETING_PLUGIN_BASENAME . 'assets/images/icons/icon-autoketing.jpg'; ?>" />
                        </div>
                        <div class="desc">
                            <h3><?php _e( 'Facebook Chat Box - Marketing','autoketing' ); ?>
                            </h3>
                            <p><?php _e( 'Offer both Up-sell and Cross-sell for your store in just 1 app! Smart & Targeted Recommendations to bring you more money automatically.', 'autoketing' ); ?>
                                <a href="" title="">Show details</a>
                            </p>
                        </div>
                    </div>
                    <div class="get-app">
                        <a href="" title="" target="_blank"><?php  _e( 'Developing','autoketing' ) ;?></a>
                    </div>
                </div>
                <div class="box-item-app">
                    <div class="wrap-item">
                        <div class="icon">
                            <img src="<?php echo AUTOKETING_PLUGIN_BASENAME . 'assets/images/icons/icon-autoketing.jpg'; ?>" />
                        </div>
                        <div class="desc">
                            <h3><?php _e( 'Sales Pop Master - Countdown','autoketing' ); ?>
                            </h3>
                            <p><?php _e( 'Offer both Up-sell and Cross-sell for your store in just 1 app! Smart & Targeted Recommendations to bring you more money automatically.', 'autoketing' ); ?>
                                <a href="" title="">Show details</a>
                            </p>
                        </div>
                    </div>
                    <div class="get-app">
                        <a href="" title="" target="_blank"><?php _e( 'Developing','autoketing' ) ;?></a>
                    </div>
                </div>
            </div>
            <div class="list-app-data" id = 'installAppsList'>
                <div class="box-item-app">
                    <div class="wrap-item">
                        <div class="icon">
                            <img src="<?php echo AUTOKETING_PLUGIN_BASENAME . 'assets/images/icons/icon-autoketing.jpg'; ?>" />
                        </div>
                        <div class="desc">
                            <h3><?php _e( 'CURRENCY CONVERTER BOX - BEST','autoketing' ); ?>
                            </h3>
                            <p><?php _e( 'Offer both Up-sell and Cross-sell for your store in just 1 app! Smart & Targeted Recommendations to bring you more money automatically.', 'autoketing' ); ?>
                                <a href="" title="">Show details</a>
                            </p>
                        </div>
                    </div>
                    <div class="get-app">
                        <a href="<?php echo $link_autoLogin; ?>" title="" target="_blank"><?php _e( 'Setting','autoketing' ) ;?></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    jQuery(function ($) {
        const auto_connect = $("#auto-connect");   
        var autoketing_popup;
        var domain = "<?php echo  $_SERVER['SERVER_NAME']; ?>";
        var currency_login = "<?php echo AUTOKETING_URL_CURRENCY_LOGIN; ?>" + domain + '' ;
        auto_connect.on('click',() => {    
            openW();
        });
        const openW = (domain) => {           
            let width = window.outerWidth + '';
            let height = window.outerHeight + '';
            autoketing_popup = window.open( currency_login ,"_blank","width="+ width+ ",height=" + height);            
        };
        window.addEventListener('message', function (e) {
            let currency_url = "<?php echo AUTOKETING_URL_CURRENCY; ?>" + '';
            if(e.origin === currency_url ){
                if(e.data !== null){
                    $.ajax({
                        type: "post",
                        dataType : "json",
                        url : '<?php echo admin_url('admin-ajax.php');?>',
                        data : {
                            action: "add_key_login", 
                            keyLogin : e.data
                        },
                        success: function(response) {
                            if(response.status === true){
                                location.reload();
                            }
                        }
                    });
                }
                autoketing_popup.postMessage( 'shoplogin', currency_login );
            }
        }, false);
    });
</script>