<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script>
    var ajaxurl= "<?php echo admin_url( 'admin-ajax.php' );?>";
</script>
    <style>
        .seers-cmp-cookie-policy-text p{
            <?php if(get_option('SCCBPP_cookie_consent_body_text_color') && get_option('SCCBPP_cookie_consent_body_text_color')!=''){ echo ("color: " . get_option('SCCBPP_cookie_consent_body_text_color') . " !important;"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_font_style') && get_option('SCCBPP_cookie_consent_font_style')!='' && get_option('SCCBPP_cookie_consent_font_style')!='inherit'){ echo ("font-family: \"" . get_option('SCCBPP_cookie_consent_font_style') . "\" !important;"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . (get_option('SCCBPP_cookie_consent_font_size') + 2) . "px !important;"); }else{ echo ("font-size: " . ($this->defaultfontsize + 2) . "px !important;"); }?>
        }
        .seers-cms-tabs-universal-bar{
            font-weight: bold;
            <?php if(get_option('SCCBPP_cookie_consent_body_text_color') && get_option('SCCBPP_cookie_consent_body_text_color')!=''){ echo ("color: " . get_option('SCCBPP_cookie_consent_body_text_color') . " !important;"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_font_style') && get_option('SCCBPP_cookie_consent_font_style')!='' && get_option('SCCBPP_cookie_consent_font_style')!='inherit'){ echo ("font-family: \"" . get_option('SCCBPP_cookie_consent_font_style') . "\" !important;"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . (get_option('SCCBPP_cookie_consent_font_size') + 2) . "px !important;"); }else{ echo ("font-size: " . ($this->defaultfontsize + 2) . "px !important;"); }?>
        }
        a#seers-cmp-default-banner-opener {
            <?php if(get_option('SCCBPP_cookie_consent_preferences_btn_color') && get_option('SCCBPP_cookie_consent_preferences_btn_color')!=''){ echo("background: " . get_option('SCCBPP_cookie_consent_preferences_btn_color') . ";"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_preferences_text_color') && get_option('SCCBPP_cookie_consent_preferences_text_color')!=''){ echo("color: " . get_option('SCCBPP_cookie_consent_preferences_text_color') . ";"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . get_option('SCCBPP_cookie_consent_font_size') . "px !important;"); }else{ echo ("font-size: " . $this->defaultfontsize . "px !important;"); }?>
        }
        a#seers-iagree, a#seers_allow_all, a#savemychoice {
            <?php if(get_option('SCCBPP_cookie_consent_agree_btn_color') && get_option('SCCBPP_cookie_consent_agree_btn_color')!=''){ echo("background: " . get_option('SCCBPP_cookie_consent_agree_btn_color') . ";"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_agree_text_color') && get_option('SCCBPP_cookie_consent_agree_text_color')!=''){ echo("color: " . get_option('SCCBPP_cookie_consent_agree_text_color') . ";"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . get_option('SCCBPP_cookie_consent_font_size') . "px !important;"); }else{ echo ("font-size: " . $this->defaultfontsize . "px !important;"); }?>
        }
        a#seers-iagree, a#seers_allow_all, a#savemychoice1 {
            <?php if(get_option('SCCBPP_cookie_consent_agree_btn_color') && get_option('SCCBPP_cookie_consent_agree_btn_color')!=''){ echo("background: " . get_option('SCCBPP_cookie_consent_agree_btn_color') . ";"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_agree_text_color') && get_option('SCCBPP_cookie_consent_agree_text_color')!=''){ echo("color: " . get_option('SCCBPP_cookie_consent_agree_text_color') . ";"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . get_option('SCCBPP_cookie_consent_font_size') . "px !important;"); }else{ echo ("font-size: " . $this->defaultfontsize . "px !important;"); }?>
        }
        a#seers-idisagree, a#seers_disable_all {
            <?php if(get_option('SCCBPP_cookie_consent_disagree_btn_color') && get_option('SCCBPP_cookie_consent_disagree_btn_color')!=''){ echo("background: " . get_option('SCCBPP_cookie_consent_disagree_btn_color') . ";"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_disagree_text_color') && get_option('SCCBPP_cookie_consent_disagree_text_color')!=''){ echo("color: " . get_option('SCCBPP_cookie_consent_disagree_text_color') . ";"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . get_option('SCCBPP_cookie_consent_font_size') . "px !important;"); }else{ echo ("font-size: " . $this->defaultfontsize . "px !important;"); }?>
        }
        .seers-cmp-cookie-policy-accordion-tab .seers-cmp-cookie-policy-accordion-tab-content .seers-cmp-cookie-table-list table tbody tr th,
        .seers-cmp-cookie-policy-accordion-tab .seers-cmp-cookie-policy-accordion-tab-content .seers-cmp-cookie-table-list table thead tr th {
            border: 0 !important;
        }
        
        .seers-cmp-cookie-policy-accordion-tab .seers-cmp-cookie-policy-accordion-tab-content .seers-cmp-cookie-table-list table tbody tr td:first-child {
            font-weight: bold !important;
            border: 0 !important;
        }
        
        .seers-cmp-cookie-policy-accordion-tab .seers-cmp-cookie-policy-accordion-tab-content .seers-cmp-cookie-table-list table tbody tr td {
            border: 0 !important;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-no-cookie-found {
            font-size: 14px !important;
            color: #555;
            margin: 15px 0 15px 0;
            font-family: "Arial";
            display: inline-block;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar {
            position: fixed;
            bottom: 0;
            top: auto;
            left: 0;
            right: 0;
            width: 100% !important;
            max-width: 100%;
            padding: 30px 3% 15px;
            z-index: 9999999999999;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            background: <?php if(get_option('SCCBPP_cookie_consent_banner_bg_color') && get_option('SCCBPP_cookie_consent_banner_bg_color')!=''){ echo(get_option('SCCBPP_cookie_consent_banner_bg_color')); }else{ echo "#fff"; }?>;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-flex-flow: row wrap;
            -moz-flex-flow: row wrap;
            -ms-flex-flow: row wrap;
            flex-flow: row;
            -webkit-box-align: justify;
            -moz-box-align: justify;
            -webkit-box-pack: justify;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            -ms-justify-content: space-between;
            justify-content: space-between;
            box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -webkit-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -moz-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -webkit-animation: seers-cmp-slide-in-bottom 1s both;
            -moz-animation: seers-cmp-slide-in-bottom 1s both;
            -ms-animation: seers-cmp-slide-in-bottom 1s both;
            -o-animation: seers-cmp-slide-in-bottom 1s both;
            animation: seers-cmp-slide-in-bottom 1s both;
        }
        
        @keyframes seers-cmp-slide-in-bottom {
            from {
                -webkit-transform: translate3d(0, 100%, 0);
                -moz-transform: translate3d(0, 100%, 0);
                -ms-transform: translate3d(0, 100%, 0);
                -o-transform: translate3d(0, 100%, 0);
                transform: translate3d(0, 100%, 0)
            }
            to {
                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0)
            }
        }
        
        @-webkit-keyframes seers-cmp-slide-in-bottom {
            from {
                -webkit-transform: translate3d(0, 100%, 0);
                -moz-transform: translate3d(0, 100%, 0);
                -ms-transform: translate3d(0, 100%, 0);
                -o-transform: translate3d(0, 100%, 0);
                transform: translate3d(0, 100%, 0)
            }
            to {
                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0)
            }
        }
        
        @-moz-keyframes seers-cmp-slide-in-bottom {
            from {
                -webkit-transform: translate3d(0, 100%, 0);
                -moz-transform: translate3d(0, 100%, 0);
                -ms-transform: translate3d(0, 100%, 0);
                -o-transform: translate3d(0, 100%, 0);
                transform: translate3d(0, 100%, 0)
            }
            to {
                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0)
            }
        }
        
        @-ms-keyframes seers-cmp-slide-in-bottom {
            from {
                -webkit-transform: translate3d(0, 100%, 0);
                -moz-transform: translate3d(0, 100%, 0);
                -ms-transform: translate3d(0, 100%, 0);
                -o-transform: translate3d(0, 100%, 0);
                transform: translate3d(0, 100%, 0)
            }
            to {
                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0)
            }
        }
        
        @-o-keyframes seers-cmp-slide-in-bottom {
            from {
                -webkit-transform: translate3d(0, 100%, 0);
                -moz-transform: translate3d(0, 100%, 0);
                -ms-transform: translate3d(0, 100%, 0);
                -o-transform: translate3d(0, 100%, 0);
                transform: translate3d(0, 100%, 0)
            }
            to {
                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0)
            }
        }
        
        @keyframes seers-cmp-slide-out-bottom {
            from {
                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0)
            }
            to {
                -webkit-transform: translate3d(0, 120%, 0);
                -moz-transform: translate3d(0, 120%, 0);
                -ms-transform: translate3d(0, 120%, 0);
                -o-transform: translate3d(0, 120%, 0);
                transform: translate3d(0, 120%, 0)
            }
        }
        
        @-webkit-keyframes seers-cmp-slide-out-bottom {
            from {
                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0)
            }
            to {
                -webkit-transform: translate3d(0, 120%, 0);
                -moz-transform: translate3d(0, 120%, 0);
                -ms-transform: translate3d(0, 120%, 0);
                -o-transform: translate3d(0, 120%, 0);
                transform: translate3d(0, 120%, 0)
            }
        }
        
        @-moz-keyframes seers-cmp-slide-out-bottom {
            from {
                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0)
            }
            to {
                -webkit-transform: translate3d(0, 120%, 0);
                -moz-transform: translate3d(0, 120%, 0);
                -ms-transform: translate3d(0, 120%, 0);
                -o-transform: translate3d(0, 120%, 0);
                transform: translate3d(0, 120%, 0)
            }
        }
        
        @-ms-keyframes seers-cmp-slide-out-bottom {
            from {
                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0)
            }
            to {
                -webkit-transform: translate3d(0, 120%, 0);
                -moz-transform: translate3d(0, 120%, 0);
                -ms-transform: translate3d(0, 120%, 0);
                -o-transform: translate3d(0, 120%, 0);
                transform: translate3d(0, 120%, 0)
            }
        }
        
        @-o-keyframes seers-cmp-slide-out-bottom {
            from {
                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0)
            }
            to {
                -webkit-transform: translate3d(0, 120%, 0);
                -moz-transform: translate3d(0, 120%, 0);
                -ms-transform: translate3d(0, 120%, 0);
                -o-transform: translate3d(0, 120%, 0);
                transform: translate3d(0, 120%, 0)
            }
        }
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-preference-universal-bar {
            position: fixed;
            border-radius: 20px;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            bottom: auto !important;
            right: auto !important;
            width: 40%;
            max-width: 40%;
            padding: 0px 0% 0px;
            z-index: 9999999999999;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            background: #ffffff;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-flex-flow: row wrap;
            -moz-flex-flow: row wrap;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
            -webkit-box-align: justify;
            -moz-box-align: justify;
            -webkit-box-pack: justify;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            -ms-justify-content: space-between;
            justify-content: space-between;
            box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -webkit-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -moz-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -webkit-animation: seers-cmp-slide-in-bottom 1s both;
            -moz-animation: seers-cmp-slide-in-bottom 1s both;
            -ms-animation: seers-cmp-slide-in-bottom 1s both;
            -o-animation: seers-cmp-slide-in-bottom 1s both;
            animation: seers-cmp-slide-in-bottom 1s both;
        }
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-preference-bottom-hanging-bar {
            position: fixed;
            bottom: 0;
            top: auto;
            left: 0;
            right: 0;
            width: 60%;
            max-width: 60%;
            margin: auto;
            margin-bottom: 55px;
            padding: 30px 3% 15px;
            z-index: 9999999999999;
            -webkit-box-sizing: border-box;
            border: 1px solid #E0DEDE;
            border-radius: 10px;
            -moz-box-sizing: border-box;
            background: <?php if(get_option('SCCBPP_cookie_consent_banner_bg_color') && get_option('SCCBPP_cookie_consent_banner_bg_color')!=''){ echo(get_option('SCCBPP_cookie_consent_banner_bg_color')); }else{ echo "#fff"; }?>;
            box-sizing: border-box;
            /* background: #ffffff; */
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-flex-flow: row wrap;
            -moz-flex-flow: row wrap;
            -ms-flex-flow: row wrap;
            flex-flow: row;
            -webkit-box-align: justify;
            -moz-box-align: justify;
            -webkit-box-pack: justify;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            -ms-justify-content: space-between;
            justify-content: space-between;
            box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -webkit-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -moz-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -webkit-animation: seers-cmp-slide-in-bottom 1s both;
            -moz-animation: seers-cmp-slide-in-bottom 1s both;
            -ms-animation: seers-cmp-slide-in-bottom 1s both;
            -o-animation: seers-cmp-slide-in-bottom 1s both;
            animation: seers-cmp-slide-in-bottom 1s both;
        }

        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-banner-hanging-bar {
            position: fixed;
            bottom: 0;
            top: auto;
            left: 0;
            right: 0;
            width: 52%;
            max-width: 52%;
            padding: 30px 3% 15px;
            margin: auto;
            margin-bottom: 50px;
            border-radius: 10px;
            border: 1px solid #E0DEDE;
            z-index: 9999999999999;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            background: #ffffff;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            background: <?php if(get_option('SCCBPP_cookie_consent_banner_bg_color') && get_option('SCCBPP_cookie_consent_banner_bg_color')!=''){ echo(get_option('SCCBPP_cookie_consent_banner_bg_color')); }else{ echo "#fff"; }?>;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-flex-flow: row wrap;
            -moz-flex-flow: row wrap;
            -ms-flex-flow: row wrap;
            flex-flow: row;
            -webkit-box-align: justify;
            -moz-box-align: justify;
            -webkit-box-pack: justify;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            -ms-justify-content: space-between;
            justify-content: space-between;
            box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -webkit-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -moz-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -webkit-animation: seers-cmp-slide-in-bottom 1s both;
            -moz-animation: seers-cmp-slide-in-bottom 1s both;
            -ms-animation: seers-cmp-slide-in-bottom 1s both;
            -o-animation: seers-cmp-slide-in-bottom 1s both;
            animation: seers-cmp-slide-in-bottom 1s both;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-bar {
            top: 0;
            bottom: auto;
            left: 0;
            right: 0;
            -webkit-animation: seers-cmp-slide-in-top-bar 1s both;
            -moz-animation: seers-cmp-slide-in-top-bar 1s both;
            -ms-animation: seers-cmp-slide-in-top-bar 1s both;
            -o-animation: seers-cmp-slide-in-top-bar 1s both;
            animation: seers-cmp-slide-in-top-bar 1s both;
        }

        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-hanging-bar {
            top: 0;
            bottom: auto;
            left: 0;
            right: 0;
            -webkit-animation: seers-cmp-slide-in-top-bar 1s both;
            -moz-animation: seers-cmp-slide-in-top-bar 1s both;
            -ms-animation: seers-cmp-slide-in-top-bar 1s both;
            -o-animation: seers-cmp-slide-in-top-bar 1s both;
            background: <?php if(get_option('SCCBPP_cookie_consent_banner_bg_color') && get_option('SCCBPP_cookie_consent_banner_bg_color')!=''){ echo(get_option('SCCBPP_cookie_consent_banner_bg_color')); }else{ echo "#fff"; }?>;
            animation:1s both;
            width: 52% !important;
            margin: auto;
            margin-top: 75px;
            border-radius: 10px;
            border: 1px solid #E0DEDE;
        }
        
        @keyframes seers-cmp-slide-in-top-bar{from{-webkit-transform:translate3d(0,-100%,0);-moz-transform:translate3d(0,-100%,0);-ms-transform:translate3d(0,-100%,0);-o-transform:translate3d(0,-100%,0);transform:translate3d(0,-100%,0)}to{-webkit-transform:translate3d(0,0%,0);-moz-transform:translate3d(0,0%,0);-ms-transform:translate3d(0,0%,0);-o-transform:translate3d(0,0%,0);transform:translate3d(0,0%,0)}}
        @-webkit-keyframes seers-cmp-slide-in-top-bar{from{-webkit-transform:translate3d(0,-100%,0);-moz-transform:translate3d(0,-100%,0);-ms-transform:translate3d(0,-100%,0);-o-transform:translate3d(0,-100%,0);transform:translate3d(0,-100%,0)}to{-webkit-transform:translate3d(0,0%,0);-moz-transform:translate3d(0,0%,0);-ms-transform:translate3d(0,0%,0);-o-transform:translate3d(0,0%,0);transform:translate3d(0,0%,0)}}
        @-moz-keyframes seers-cmp-slide-in-top-bar{from{-webkit-transform:translate3d(0,-100%,0);-moz-transform:translate3d(0,-100%,0);-ms-transform:translate3d(0,-100%,0);-o-transform:translate3d(0,-100%,0);transform:translate3d(0,-100%,0)}to{-webkit-transform:translate3d(0,0%,0);-moz-transform:translate3d(0,0%,0);-ms-transform:translate3d(0,0%,0);-o-transform:translate3d(0,0%,0);transform:translate3d(0,0%,0)}}
        @-ms-keyframes seers-cmp-slide-in-top-bar{from{-webkit-transform:translate3d(0,-100%,0);-moz-transform:translate3d(0,-100%,0);-ms-transform:translate3d(0,-100%,0);-o-transform:translate3d(0,-100%,0);transform:translate3d(0,-100%,0)}to{-webkit-transform:translate3d(0,0%,0);-moz-transform:translate3d(0,0%,0);-ms-transform:translate3d(0,0%,0);-o-transform:translate3d(0,0%,0);transform:translate3d(0,0%,0)}}
        @-o-keyframes seers-cmp-slide-in-top-bar{from{-webkit-transform:translate3d(0,-100%,0);-moz-transform:translate3d(0,-100%,0);-ms-transform:translate3d(0,-100%,0);-o-transform:translate3d(0,-100%,0);transform:translate3d(0,-100%,0)}to{-webkit-transform:translate3d(0,0%,0);-moz-transform:translate3d(0,0%,0);-ms-transform:translate3d(0,0%,0);-o-transform:translate3d(0,0%,0);transform:translate3d(0,0%,0)}}
        
        
        @keyframes seers-cmp-slide-out-top-bar{from{-webkit-transform:translate3d(0,1%,0);-moz-transform:translate3d(0,-100%,0);-ms-transform:translate3d(0,-100%,0);-o-transform:translate3d(0,-100%,0);transform:translate3d(0,-100%,0)}to{-webkit-transform:translate3d(0,0%,0);-moz-transform:translate3d(0,0%,0);-ms-transform:translate3d(0,0%,0);-o-transform:translate3d(0,0%,0);transform:translate3d(0,0%,0)}}
        @-webkit-keyframes seers-cmp-slide-out-top-bar{from{-webkit-transform:translate3d(0,1%,0);-moz-transform:translate3d(0,-100%,0);-ms-transform:translate3d(0,-100%,0);-o-transform:translate3d(0,-100%,0);transform:translate3d(0,-100%,0)}to{-webkit-transform:translate3d(0,0%,0);-moz-transform:translate3d(0,0%,0);-ms-transform:translate3d(0,0%,0);-o-transform:translate3d(0,0%,0);transform:translate3d(0,0%,0)}}
        @-moz-keyframes seers-cmp-slide-out-top-bar{from{-webkit-transform:translate3d(0,1%,0);-moz-transform:translate3d(0,-100%,0);-ms-transform:translate3d(0,-100%,0);-o-transform:translate3d(0,-100%,0);transform:translate3d(0,-100%,0)}to{-webkit-transform:translate3d(0,0%,0);-moz-transform:translate3d(0,0%,0);-ms-transform:translate3d(0,0%,0);-o-transform:translate3d(0,0%,0);transform:translate3d(0,0%,0)}}
        @-ms-keyframes seers-cmp-slide-out-top-bar{from{-webkit-transform:translate3d(0,1%,0);-moz-transform:translate3d(0,-100%,0);-ms-transform:translate3d(0,-100%,0);-o-transform:translate3d(0,-100%,0);transform:translate3d(0,-100%,0)}to{-webkit-transform:translate3d(0,0%,0);-moz-transform:translate3d(0,0%,0);-ms-transform:translate3d(0,0%,0);-o-transform:translate3d(0,0%,0);transform:translate3d(0,0%,0)}}
        @-o-keyframes seers-cmp-slide-out-top-bar{from{-webkit-transform:translate3d(0,1%,0);-moz-transform:translate3d(0,-100%,0);-ms-transform:translate3d(0,-100%,0);-o-transform:translate3d(0,-100%,0);transform:translate3d(0,-100%,0)}to{-webkit-transform:translate3d(0,0%,0);-moz-transform:translate3d(0,0%,0);-ms-transform:translate3d(0,0%,0);-o-transform:translate3d(0,0%,0);transform:translate3d(0,0%,0)}}
        
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-left-bar .seers-cmp-cookie-policy-data,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-right-bar .seers-cmp-cookie-policy-data,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-center-bar .seers-cmp-cookie-policy-data,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-middle-bar .seers-cmp-cookie-policy-data{-webkit-box-align:start!important;-moz-box-align:start!important;-ms-flex-align:start!important;-webkit-align-items:flex-start!important;-moz-flex-align:flex-start!important;-ms-flex-align:flex-start!important;align-items:flex-start!important;width:max-content!important; display: block;}
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-right-bar{bottom:15px;top:auto;display: block !important;left:auto;right:15px;width:396px!important;max-width:100%;padding:15px 15px 0 15px!important;overflow:hidden;border-radius:20px;-webkit-border-radius:20px;-webkit-animation:seers-cmp-slide-in-right-bar .5s both;-moz-animation:seers-cmp-slide-in-right-bar .5s both;-ms-animation:seers-cmp-slide-in-right-bar .5s both;-o-animation:seers-cmp-slide-in-right-bar .5s both;animation:seers-cmp-slide-in-right-bar .5s both}
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-right-bar{top:15px;bottom:auto;left:auto;right:15px;width:396px!important;display: block !important;max-width:100%;padding:15px 15px 0 15px!important;overflow:hidden;border-radius:20px;-webkit-border-radius:20px;-webkit-animation:seers-cmp-slide-in-right-bar .5s both;-moz-animation:seers-cmp-slide-in-right-bar .5s both;-ms-animation:seers-cmp-slide-in-right-bar .5s both;-o-animation:seers-cmp-slide-in-right-bar .5s both;animation:seers-cmp-slide-in-right-bar .5s both}
        
        @keyframes seers-cmp-slide-in-right-bar{0%{right:0}100%{right:15px}}
        @-moz-keyframes seers-cmp-slide-in-right-bar{0%{right:0}100%{right:15px}}
        @-webkit-keyframes seers-cmp-slide-in-right-bar{0%{right:0}100%{right:15px}}
        @-o-keyframes seers-cmp-slide-in-right-bar{0%{right:0}100%{right:15px}}
        @-ms-keyframes seers-cmp-slide-in-right-bar{0%{right:0}100%{right:15px}}
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-center-bar{transform:translate(-50%,0%)!important;left:50%!important;top:auto!important;bottom:15px;width:396px!important;max-width:100%;padding:15px 15px 0 15px!important;overflow:hidden;border-radius:10px;-webkit-border-radius:10px;-webkit-animation:seers-cmp-slide-in-center-bar .5s both;-moz-animation:seers-cmp-slide-in-center-bar .5s both;-ms-animation:seers-cmp-slide-in-center-bar .5s both;-o-animation:seers-cmp-slide-in-center-bar .5s both;animation:seers-cmp-slide-in-center-bar .5s both}
        @keyframes seers-cmp-slide-in-center-bar{0%{bottom:0}100%{bottom:15px}}
        @-moz-keyframes seers-cmp-slide-in-center-bar{0%{bottom:0}100%{bottom:15px}}
        @-webkit-keyframes seers-cmp-slide-in-center-bar{0%{bottom:0}100%{bottom:15px}}
        @-o-keyframes seers-cmp-slide-in-center-bar{0%{bottom:0}100%{bottom:15px}}
        @-ms-keyframes seers-cmp-slide-in-center-bar{0%{bottom:0}100%{bottom:15px}}
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-middle-bar{top:50%!important;left:50%!important;display: block ;transform:translate(-50%,-50%)!important;bottom:auto!important;right:auto!important;width:396px!important;max-width:100%;padding:15px 15px 0 15px!important;overflow:hidden;border-radius:20px;-webkit-border-radius:20px;-webkit-animation:seers-cmp-fadeout ease .7s;-moz-animation:seers-cmp-fadeout ease .7s;-o-animation:seers-cmp-fadeout ease .7s;-ms-animation:seers-cmp-fadeout ease .7s;animation:seers-cmp-fadeout ease .7s}
        @keyframes seers-cmp-fadeout{0%{opacity:0;transform:translate(-50%,-40%)}100%{opacity:1;transform:translate(-50%,-50%)}}
        @-moz-keyframes seers-cmp-fadeout{0%{opacity:0;transform:translate(-50%,-40%)}100%{opacity:1;transform:translate(-50%,-50%)}}
        @-webkit-keyframes seers-cmp-fadeout{0%{opacity:0;transform:translate(-50%,-40%)}100%{opacity:1;transform:translate(-50%,-50%)}}
        @-o-keyframes seers-cmp-fadeout{0%{opacity:0;transform:translate(-50%,-40%)}100%{opacity:1;transform:translate(-50%,-50%)}}
        @-ms-keyframes seers-cmp-fadeout{0%{opacity:0;transform:translate(-50%,-40%)}100%{opacity:1;transform:translate(-50%,-50%)}}
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-left-bar{bottom:15px;top:auto;left:15px;display: block !important;right:auto;width:396px!important;max-width:100%;padding:15px 15px 0 15px!important;overflow:hidden;border-radius:20px;-webkit-border-radius:20px;-webkit-animation:seers-cmp-slide-in-left-bar .5s both;-moz-animation:seers-cmp-slide-in-left-bar .5s both;-ms-animation:seers-cmp-slide-in-left-bar .5s both;-o-animation:seers-cmp-slide-in-left-bar .5s both;animation:seers-cmp-slide-in-left-bar .5s both}
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-left-bar{top:15px;bottom:auto;left:15px;display: block !important;right:auto;width:396px!important;max-width:100%;padding:15px 15px 0 15px!important;overflow:hidden;border-radius:20px;-webkit-border-radius:20px;-webkit-animation:seers-cmp-slide-in-left-bar .5s both;-moz-animation:seers-cmp-slide-in-left-bar .5s both;-ms-animation:seers-cmp-slide-in-left-bar .5s both;-o-animation:seers-cmp-slide-in-left-bar .5s both;animation:seers-cmp-slide-in-left-bar .5s both}
        
        @keyframes seers-cmp-slide-in-left-bar{0%{left:0}100%{left:15px}}
        @-moz-keyframes seers-cmp-slide-in-left-bar{0%{left:0}100%{left:15px}}
        @-webkit-keyframes seers-cmp-slide-in-left-bar{0%{left:0}100%{left:15px}}
        @-o-keyframes seers-cmp-slide-in-left-bar{0%{left:0}100%{left:15px}}
        @-ms-keyframes seers-cmp-slide-in-left-bar{0%{left:0}100%{left:15px}}
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-right-bar .seers-cmp-cookie-policy-data,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-left-bar .seers-cmp-cookie-policy-data,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-left-bar .seers-cmp-cookie-policy-data,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-right-bar .seers-cmp-cookie-policy-data,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-center-bar .seers-cmp-cookie-policy-data,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-middle-bar .seers-cmp-cookie-policy-data{-webkit-box-align:start!important;-moz-box-align:start!important;-ms-flex-align:start!important;-webkit-align-items:flex-start!important;-moz-flex-align:flex-start!important;-ms-flex-align:flex-start!important;align-items:flex-start!important;width:max-content!important}
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-right-bar .seers-cmp-cookie-policy-data .seers-cmp-cookie-policy-hol, .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-left-bar .seers-cmp-cookie-policy-data .seers-cmp-cookie-policy-hol, .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-left-bar .seers-cmp-cookie-policy-data .seers-cmp-cookie-policy-hol,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-right-bar .seers-cmp-cookie-policy-data .seers-cmp-cookie-policy-hol,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-center-bar .seers-cmp-cookie-policy-data .seers-cmp-cookie-policy-hol,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-middle-bar .seers-cmp-cookie-policy-data .seers-cmp-cookie-policy-hol{-webkit-box-direction:normal;-webkit-box-orient:vertical;-moz-box-direction:normal;-moz-box-orient:vertical;-webkit-box-orient:vertical;-moz-box-orient:vertical;-ms-box-orient:vertical;box-orient:vertical;-webkit-flex-direction:column;-moz-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-orient:horizontal;-moz-box-orient:horizontal;-webkit-box-direction:normal;-moz-box-direction:normal;-webkit-flex-flow:row wrap;-moz-flex-flow:row wrap;-ms-flex-flow:row wrap;flex-flow:row wrap}
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-right-bar .seers-cmp-cookie-policy-data .seers-cmp-cookie-policy-hol .seers-cmp-cookie-policy-text,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-left-bar .seers-cmp-cookie-policy-data .seers-cmp-cookie-policy-hol .seers-cmp-cookie-policy-text,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-left-bar .seers-cmp-cookie-policy-data .seers-cmp-cookie-policy-hol .seers-cmp-cookie-policy-text,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-right-bar .seers-cmp-cookie-policy-data .seers-cmp-cookie-policy-hol .seers-cmp-cookie-policy-text,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-center-bar .seers-cmp-cookie-policy-data .seers-cmp-cookie-policy-hol .seers-cmp-cookie-policy-text,.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-middle-bar .seers-cmp-cookie-policy-data .seers-cmp-cookie-policy-hol .seers-cmp-cookie-policy-text{margin:0 0 15px 0;padding:0!important}
        
        .seers-cmp-cookie-data-hol .seers-cmp-cookie-logo {
            margin: 0 20px 0 0;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-cookie-logo svg {
            width: 50px;
            height: 50px;
            min-width: 50px;
            min-height: 50px;
            max-width: 50px;
            max-height: 50px;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-power-by {
            padding: 10px 20px;
            background: #EFF3FF;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-orient: horizontal;
            -moz-box-orient: horizontal;
            -webkit-box-direction: normal;
            -moz-box-direction: normal;
            -webkit-flex-flow: row wrap;
            -moz-flex-flow: row wrap;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
            -webkit-box-align: justify;
            -moz-box-align: justify;
            -webkit-box-pack: justify;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            -ms-justify-content: space-between;
            justify-content: space-between;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
        
        .rtl .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-power-by {
            -webkit-justify-content: flex-start;
            -moz-justify-content: flex-start;
            -ms-justify-content: flex-start;
            justify-content: flex-start;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-power-by .seers-cmp-cookie-policy-powered-by-text,
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-power-by .seers-cmp-cookie-policy-powered-by-link,
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-cookie-detail-hol .back-to-seers-cmp-detail,
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-no-cookie-found {
            -webkit-font-smoothing: auto;
            letter-spacing: normal;
            line-height: normal;
            padding: 0;
            height: auto;
            min-height: 0;
            max-height: none;
            width: auto;
            min-width: 0;
            max-width: none;
            border-radius: 0;
            border: none;
            clear: none;
            float: none;
            position: static;
            bottom: auto;
            left: auto;
            right: auto;
            top: auto;
            text-align: left;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            text-transform: none;
            white-space: normal;
            background: none;
            overflow: visible;
            vertical-align: baseline;
            visibility: visible;
            z-index: auto;
            box-shadow: none;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar-hide {
            -webkit-animation: seers-cmp-slide-out-bottom 1s both !important;
            -moz-animation: seers-cmp-slide-out-bottom 1s both !important;
            -ms-animation: seers-cmp-slide-out-bottom 1s both !important;
            -o-animation: seers-cmp-slide-out-bottom 1s both !important;
            animation: seers-cmp-slide-out-bottom 1s both !important;
        }
        
        /*for rtl languages*/
        .rtl .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-policy-title, .rtl .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-policy-desc, .rtl .seers-cmp-cookie-policy-accordion-tab-content .seers-cmp-cookie-policy-accordion-tab-content-text, .rtl .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-title, .rtl .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-text {
            text-align: right;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-power-by .seers-cmp-cookie-policy-powered-by-text {
            font-family: "Arial";
            text-transform: unset !important;
            font-size: 13px;
            color: #000;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: center;
            -moz-box-align: center;
            -webkit-box-pack: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            -moz-justify-content: center;
            -ms-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-power-by .seers-cmp-cookie-policy-powered-by-link {
            width: 50px;
            min-width: 50px;
            max-width: 50px;
            height: 30px;
            min-height: 30px;
            max-height: 30px;
            margin-top: -4px;
            margin-left: 3px;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-scan-staus {
            font-family: "Arial";
            text-transform: unset !important;
            font-size: 12px;
            color: #555;
            display: block;
            background: #EFF3FF;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-power-by .seers-cmp-cookie-policy-powered-by-link img,
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-power-by .seers-cmp-cookie-policy-powered-by-link svg {
            width: 100%;
            min-width: 100%;
            max-width: 100%;
            height: 100%;
            min-height: 100%;
            max-height: 100%;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer {
            padding: 15px 0 0;
            width: 100%;
            bottom: 0;
            left: 0;
            right: 0;
            position: absolute;
            -webkit-box-shadow: 0 -1px 8px rgb(0 0 0 / 7%);
            -moz-box-shadow: 0 -1px 8px rgb(0 0 0 / 7%);
            -ms-box-shadow: 0 -1px 8px rgb(0 0 0 / 7%);
            -o-box-shadow: 0 -1px 8px rgb(0 0 0 / 7%);
            box-shadow: 0 -1px 8px rgb(0 0 0 / 7%);
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-default-banner-footer-block .seers-cmp-btn {
            background: #3B6EF8;
            font-family: "Arial";
            font-weight: 500;
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . get_option('SCCBPP_cookie_consent_font_size') . "px !important;"); }else{ echo ("font-size: " . $this->defaultfontsize . "px !important;"); }?>
            color: #fff;
            border: none;
            padding: 7px 15px;
            line-height: 1.5em;
            white-space: nowrap;
            text-decoration: none;
            text-align: center;
            text-transform: capitalize;
            border-radius: 4px !important;
            -webkit-border-radius: 4px !important;
            width:100% !important;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-default-banner-footer-block .seers-cmp-btn:hover {
            background: #3544ee;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-default-banner-footer-block {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-align: end;
            -moz-box-align: end;
            -webkit-box-pack: end;
            -moz-box-pack: end;
            -ms-flex-pack: end;
            -webkit-justify-content: flex-end;
            -moz-justify-content: flex-end;
            -ms-justify-content: flex-end;
            justify-content: flex-end;
            margin: 0 auto 15px !important;
            padding: 0 19px 0 19px !important;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-header .seers-cmp-cookie-default-banner-logo {
            width: 100px;
            height: 30px;
            min-width: 100px;
            min-height: 30px;
            max-width: 100px;
            max-height: 30px;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: start;
            -moz-box-align: start;
            -webkit-box-pack: start;
            -moz-box-pack: start;
            -ms-flex-pack: start;
            -webkit-justify-content: flex-start;
            -moz-justify-content: flex-start;
            -ms-justify-content: flex-start;
            justify-content: flex-start;
            -webkit-box-align: start;
            -moz-box-align: start;
            -ms-flex-align: start;
            -webkit-align-items: flex-start;
            -moz-flex-align: flex-start;
            -ms-flex-align: flex-start;
            align-items: flex-start;
        }
        .rtl .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-header .seers-cmp-cookie-default-banner-logo {
            -webkit-justify-content: flex-end;
            -moz-justify-content: flex-end;
            -ms-justify-content: flex-end;
            justify-content: flex-end;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-header .seers-cmp-cookie-default-banner-logo svg,
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-header .seers-cmp-cookie-default-banner-logo img {
            height: 100%;
            min-height: 100%;
            max-height: 100%;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text {
            padding: 20px;
        }
        
        /*.seers-cmp-cookie-policy-accordion-tabs {
            padding-right: 15px;
            overflow-y: auto;
            height: calc(100vh - 300px);
            padding-bottom: 100px;
        }*/
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text {
            height: calc(100vh - 200px);
            overflow-y: auto;
            padding: 20px;
        }
        /*start style seers-cmp-cookie-detail-hol */
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-cookie-detail-hol {
            margin: 0 0 15px 0;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-cookie-detail-hol .back-to-seers-cmp-detail {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: start;
            -moz-box-align: start;
            -webkit-box-pack: start;
            -moz-box-pack: start;
            -ms-flex-pack: start;
            -webkit-justify-content: flex-start;
            -moz-justify-content: flex-start;
            -ms-justify-content: flex-start;
            justify-content: flex-start;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            position: relative;
            font-size: 18px;
            color: #555;
            margin: 30px 0 20px 0;
            font-family: "Arial";
            display: inline-block;
            text-transform: unset !important;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-cookie-detail-hol .back-to-seers-cmp-detail svg {
            cursor: pointer;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-cookie-detail-hol .seers-cmp-search-cookie {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: justify;
            -moz-box-align: justify;
            -webkit-box-pack: justify;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            -ms-justify-content: space-between;
            justify-content: space-between;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid #d8d8d8 !important;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-cookie-detail-hol .seers-cmp-search-cookie .seers-cmp-search-bar {
            width: 100% !important;
            padding: 11.2px 20px !important;
            height: 47px !important;
            outline: none !important;
            font-size: 16px;
            color: #555 !important;
            font-style: italic !important;
            border: 1px solid #dbdbdb !important;
            overflow-x: hidden !important;
            border-radius: 4px !important;
            -webkit-border-radius: 4px !important;
            font-weight: normal !important;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-cookie-detail-hol .seers-cmp-search-cookie .seers-cmp-filter-icon {
            margin: 0 0 0 20px !important;
            cursor: pointer !important;
            width: 47px !important;
            height: 47px !important;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-cookie-detail-hol .seers-cmp-search-cookie .seers-cmp-filter-icon:hover svg path {
            fill: #6cc04a !important;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-cookie-detail-hol .seers-cmp-view-cookie-table-link {
            font-size: 14px;
            color: #555;
            line-height: 16px;
            font-family: "Arial";
            font-weight: normal;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-cookie-detail-hol .seers-cmp-view-cookie-table-link:hover {
            color: #3b6ef8 !important;
            text-decoration: underline !important;
        }
        /*
.seers-cmp-cookie-policy-accordion-tab .seers-cmp-cookie-policy-accordion-tab-content .seers-cmp-cookie-table-list {
    margin: 0 0 15px 0 !important;
}
*/
        
        .seers-cmp-cookie-policy-accordion-tab .seers-cmp-cookie-policy-accordion-tab-content .seers-cmp-cookie-table-list table tbody tr td {
            padding: 10px 2em 10px 0 !important;
            font-size: 14px;
            color: #555;
            line-height: 24px !important;
            font-family: "Arial";
        }
        
        .seers-cmp-cookie-policy-accordion-tab .seers-cmp-cookie-policy-accordion-tab-content .seers-cmp-cookie-table-list table tbody tr td:first-child {
            font-weight: bold !important;
        }
        /* .seers-cmp-cookie-policy-accordion-tab .seers-cmp-cookie-policy-accordion-tab-content .seers-cmp-cookie-table-list table tbody tr td.td-hover-seers:hover {
    overflow-y: scroll !important;
} */
        /*end style seers-cmp-cookie-detail-hol */
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-title {
            font-weight: bold;
            position: relative;
            color: #555;
            margin: 0 0 15px 0 !important;
            font-family: "Arial";
            text-transform: unset !important;
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . (get_option('SCCBPP_cookie_consent_font_size') + 6) . "px !important;"); }else{ echo ("font-size: " . ($this->defaultfontsize + 6) . "px !important;"); }?>
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-text {
            margin: 0 0 15px 0 !important;
            color: #696969;
            font-family: "Arial";
            line-height: 20px !important;
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . get_option('SCCBPP_cookie_consent_font_size') . "px !important;"); }else{ echo ("font-size: " . $this->defaultfontsize . "px !important;"); }?>
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-text-links {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-direction: normal;
            -webkit-box-orient: vertical;
            -moz-box-direction: normal;
            -moz-box-orient: vertical;
            -webkit-box-orient: vertical;
            -moz-box-orient: vertical;
            -ms-box-orient: vertical;
            box-orient: vertical;
            -webkit-flex-direction: column;
            -moz-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-read-cookie {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            color: #696969;
            font-family: "Arial";
            font-size: 13px;
            line-height: 18px !important;
            display: inline-block;
            margin: 0 0 15px 0 !important;
            cursor: default;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-read-cookie svg {
            width: 12px !important;
            vertical-align: middle !important;
            fill: #3b6ef8 !important;
            box-sizing: border-box !important;
            cursor: pointer;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-text-links .seers-cmp-policy-banner-text-up-link {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: start;
            -moz-box-align: start;
            -webkit-box-pack: start;
            -moz-box-pack: start;
            -ms-flex-pack: start;
            -webkit-justify-content: flex-start;
            -moz-justify-content: flex-start;
            -ms-justify-content: flex-start;
            justify-content: flex-start;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            color: #3544ee;
            font-family: "Arial";
            font-size: 13px;
            text-decoration: none;
            cursor: pointer;
            margin: 0 0 15px 0;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-text-links .seers-cmp-policy-banner-text-up-link svg {
            width: 18px;
            height: 18px;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-text-links .seers-cmp-policy-banner-text-up-link svg path {
            fill: #3544ee;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-text-links .seers-cmp-cookie-policy-read-more-info {
            color: #3544ee;
            font-family: "Arial";
            font-size: 13px;
            display: block;
            cursor: pointer;
            text-decoration: none;
            margin: 0 0 15px 0;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-cookie-policy-read-more-info:hover {
            color: #6cc04a;
            text-decoration: underline;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-text-links .seers-cmp-btn {
            background: #3B6EF8;
            font-family: "Arial";
            font-weight: 500 !important;
            font-size: 14px;
            color: #fff;
            border: none;
            padding: 7px 15px !important;
            line-height: 1.5em !important;
            white-space: nowrap;
            text-decoration: none;
            text-transform: capitalize;
            display: inline-block;
            text-align: center;
            cursor: pointer;
            margin: 0 10px 15px !important;
            width: 100% !important;
            border-radius: 4px;
            -webkit-border-radius: 4px;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-data {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100vw;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-hol {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: justify;
            -moz-box-align: justify;
            -webkit-box-pack: justify;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            -ms-justify-content: space-between;
            justify-content: space-between;
            -webkit-box-flex: 1;
            -webkit-flex: 1 1 auto;
            -moz-flex: 1 1 auto;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-hol .seers-cmp-cookie-policy-text {
            padding: 0 30px 0 0;
            margin: 0 0 15px 0 !important;
            -webkit-box-flex: 1;
            -webkit-flex: auto;
            -moz-flex: auto;
            -ms-flex: auto;
            flex: auto;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-policy-title,
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-policy-desc,
        .seers-cmp-cookie-policy-accordion-tab-content .seers-cmp-cookie-policy-accordion-tab-content-text,
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-title,
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-text {
            -webkit-font-smoothing: auto;
            letter-spacing: normal;
            line-height: normal;
            padding: 0;
            height: auto;
            min-height: 0;
            max-height: none;
            width: auto;
            min-width: 0;
            max-width: none;
            border-radius: 0;
            border: none;
            clear: none;
            float: none;
            position: static;
            bottom: auto;
            left: auto;
            right: auto;
            top: auto;
            text-align: left;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            text-transform: none;
            white-space: normal;
            background: none;
            overflow: visible;
            vertical-align: baseline;
            visibility: visible;
            z-index: auto;
            box-shadow: none;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-policy-title {
            font-family: "Arial";
            font-weight: bold;
            font-size: 15px;
            color: #000;
            margin: 0 0 5px 0;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-policy-desc {
            font-family: "Arial";
            font-weight: normal;
            font-size: 14px;
            color: #000000;
            margin: 0;
            line-height: 20px;
        }

        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-middle-bar .seers-cmp-policy-desc {
            font-family: "Arial";
            font-weight: normal;
            font-size: 14px;
            color: #000000;
            margin: 0;
            line-height: 20px;
            padding-bottom: 15px;
        }
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-right-bar .seers-cmp-policy-desc {
            font-family: "Arial";
            font-weight: normal;
            font-size: 14px;
            color: #000000;
            margin: 0;
            line-height: 20px;
            padding-bottom: 15px;
        }
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-left-bar .seers-cmp-policy-desc {
            font-family: "Arial";
            font-weight: normal;
            font-size: 14px;
            color: #000000;
            margin: 0;
            line-height: 20px;
            padding-bottom: 15px;
        }
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-left-bar .seers-cmp-policy-desc {
            font-family: "Arial";
            font-weight: normal;
            font-size: 14px;
            color: #000000;
            margin: 0;
            line-height: 20px;
            padding-bottom: 15px;
        }
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-right-bar .seers-cmp-policy-desc {
            font-family: "Arial";
            font-weight: normal;
            font-size: 14px;
            color: #000000;
            margin: 0;
            line-height: 20px;
            padding-bottom: 15px;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-read-more-btn {
            font-family: "Arial";
            font-weight: 500;
            font-size: 12px;
            color: #3B6EF8;
            display: inline-block;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-read-more-btn:hover {
            color: #6cc04a;
            text-decoration: underline;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin: 0 -7.5px;
            /*  min-width: 381px;*/
            max-width: 381px;
            width: 381px;
            /* flex-flow: row wrap; */
        }
        .seers-cmp-cookie-policy-hanging-btn-hol {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: block !important;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin: 0 -7.5px;
            /* min-width: 381px; */
            max-width: 381px;
            width: 381px;
            /* flex-flow: row wrap; */
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol.seers-cmp-cookie-policy-btn-hol-wrap {
            -webkit-box-orient: horizontal;
            -moz-box-orient: horizontal;
            -webkit-box-direction: normal;
            -moz-box-direction: normal;
            -webkit-flex-flow: row wrap;
            -moz-flex-flow: row wrap;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
            min-width: 381px;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol.seers-cmp-cookie-policy-btn-hol-wrap .seers-cmp-btn,
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol.seers-cmp-cookie-policy-btn-hol-wrap .seers-cmp-preference-btn {
            width: 100% !important;
            -webkit-flex: auto !important;
            -moz-flex: auto !important;
            -ms-flex: auto !important;
            flex: auto !important;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-btn,
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-text-links .seers-cmp-btn,
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-default-banner-footer-block .seers-cmp-btn,
        .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-read-cookie {
            -webkit-font-smoothing: auto;
            height: auto;
            min-height: 0;
            max-height: none;
            width: auto;
            min-width: 0;
            max-width: none;
            clear: none;
            float: none;
            position: static;
            bottom: auto;
            left: auto;
            right: auto;
            top: auto;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            overflow: visible;
            vertical-align: baseline;
            visibility: visible;
            z-index: auto;
            box-shadow: none;
            text-transform: capitalize;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-btn {
            border: 1px solid transparent !important;
            background: #3B6EF8;
            font-family: "Arial";
            font-weight: 500;
            font-size: 14px;
            color: #fff;
            border: none;
            padding: 7px 15px !important;
            line-height: 1.5em !important;
            white-space: nowrap;
            text-decoration: none;
            margin: 0 7.5px 15px;
            text-transform: capitalize;
            display: inline-block;
            text-align: center;
            cursor: pointer;
        }
        /*seers-cmp-style-btn  */
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-btn.seers-cmp-default-style-btn {
            border-radius: 4px !important;
            -webkit-border-radius: 4px !important;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-btn.seers-cmp-flat-style-btn {
            border-radius: 0px !important;
            -webkit-border-radius: 0px !important;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-btn.seers-cmp-rounded-style-btn {
            border-radius: 16px !important;
            -webkit-border-radius: 16px !important;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-btn.seers-cmp-stroke-style-btn {
            border-radius: 4px !important;
            -webkit-border-radius: 4px !important;
            border: 1px solid #c1c1c1 !important;
        }
        /*
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-preference-btn.seers-cmp-default-style-btn {
            border-radius: 4px;
            -webkit-border-radius: 4px;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-preference-btn.seers-cmp-flat-style-btn {
            border-radius: 0px !important;
            -webkit-border-radius: 0px !important;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-preference-btn.seers-cmp-rounded-style-btn {
            border-radius: 16px !important;
            -webkit-border-radius: 16px !important;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-preference-btn.seers-cmp-stroke-style-btn {
            border-radius: 4px !important;
            -webkit-border-radius: 4px !important;
        }
*/
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-preference-btn {
            font-family: "Arial";
            font-weight: 500;
            font-size: 14px;
            color: #3B6EF8;
            border: 1px solid #c1c1c1 !important;
            border: none;
            padding: 7px 15px !important;
            line-height: 1.5em !important;
            white-space: nowrap;
            text-decoration: none;
            margin: 0 7.5px 15px;
            text-transform: capitalize;
            display: inline-block;
            text-align: center;
            cursor: pointer;
            border-radius: 4px;
            -webkit-border-radius: 4px;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-btn,
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-preference-btn {
            /* width: 112px; */
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: center;
            -moz-box-align: center;
            -webkit-box-pack: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            -moz-justify-content: center;
            -ms-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-flex: 1 !important;
            -webkit-flex: 1 0 auto !important;
            -moz-flex: 1 0 auto !important;
            -ms-flex: 1 0 auto !important;
            flex: 1 0 auto !important;
            min-width: 112px;
            border-radius: 4px;
            -webkit-border-radius: 4px;
        }
        /* .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-btn:hover {
    background: #3544ee !important;
}
.seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-preference-btn:hover {
    background: #6cc04a !important;
    color: #fff !important;
} */
        
        .seers-cmp-overlay {
            display: none;
            position: fixed;
            width: 100%;
            z-index: 99999999999999;
            height: 100%;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            -webkit-animation: seers-fade-in .7s ease-in-out;
            -moz-animation: seers-fade-in .7s ease-in-out;
            -ms-animation: seers-fade-in .7s ease-in-out;
            -o-animation: seers-fade-in .7s ease-in-out;
            animation: seers-fade-in .7s ease-in-out;
        }
        
        @-webkit-keyframes seers-fade-in {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        
        @-moz-keyframes seers-fade-in {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        
        @-ms-keyframes seers-fade-in {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        
        @-o-keyframes seers-fade-in {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        
        @keyframes seers-fade-in {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content {
            overflow: hidden;
            z-index: 999999999999999;
            background-color: #fff;
            position: fixed;
            top: 0;
            bottom: 0;
            left: -760px;
            max-width: 370px;
            width: 370px;
            -webkit-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -moz-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -ms-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -o-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -webkit-transistion-property: all;
            -moz-transistion-property: all;
            -ms-transistion-property: all;
            -o-transistion-property: all;
            transition-property: all;
            -webkit-transition-duration: .5s;
            -moz-transition-duration: .5s;
            -ms-transition-duration: .5s;
            -o-transition-duration: .5s;
            transition-duration: .5s;
        }
        
        .seers-cmp-overlay.seers-cmp-overlay-active {
            display: block;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content.seers-cmp-cookie-banner-active {
            left: 0px;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content.seers-cmp-cookie-banner-no-active {
            left: -760px!important;
        }
        
        .seers-cmp-cookie-policy-default-banner .seers-cmp-default-banner-close {
            position: absolute;
            right: 20px;
            top: 25px;
            cursor: pointer;
            font-size: 30px;
            line-height: 0;
            color: #3B6EF8;
            font-weight: bold;
            z-index: 99;
        }
        /*scrollbar style*/
        
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background-color: #9b9696;
            border: 5px solid transparent;
        }
        
        ::-webkit-scrollbar-button {
            display: none;
        }
        /*accordion*/
        
        .seers-cmp-cookie-policy-accordion-tab {
            overflow: hidden;
            position: relative;
            border: 1px solid #b7b7b7;
            /* background: #fff; */
            border-radius: 7px;
            margin: 15px 0px;
        }
        
        .seers-cmp-cookie-policy-accordion-tab.seers-top-border-none {
            /* border-top: none !important; */
            border: 1px solid #b7b7b7;
            border-radius: 7px;
            margin-bottom: 0px;
        }
        
        .seers-cmp-cookie-policy-accordion-tab input.seers-cmp-cookie-policy-accordion-check {
            position: absolute;
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            outline: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            font-size: 0 !important;
            line-height: 0 !important;
        }
        
        .seers-cmp-cookie-policy-accordion-tab-label {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: justify;
            -moz-box-align: justify;
            -webkit-box-pack: justify;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            -ms-justify-content: space-between;
            justify-content: space-between;
            padding: 1em 1.5em 1em 2.5em !important;
            display: block !important;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . (get_option('SCCBPP_cookie_consent_font_size') + 1) . "px !important;"); }else{ echo ("font-size: " . ($this->defaultfontsize + 1) . "px !important;"); }?>
            color: #555;
            vertical-align: middle;
            margin: 0 0 0 0 !important;
            font-family: "Arial";
            text-transform: unset !important;
            border-radius: 7px;
            -webkit-border-radius: 7px;
            transition: background-color 0.2s ease-out 0.3s, color 0.2s ease-out 0s;
            background-color: transparent;
            /* border: 1px solid #b7b7b7;  */
        }


        









        .seers-cmp-cookie-policy-accordion-tab-universal {
            overflow: hidden;
            position: relative;
            border: 1px solid #b7b7b7;
            /* background: #fff; */
            border-radius: 7px;
            margin: 15px 0px;
        }
        
        .seers-cmp-cookie-policy-accordion-tab-universal.seers-top-border-none {
            /* border-top: none !important; */
            border: 1px solid #b7b7b7;
            border-radius: 7px;
            margin-bottom: 0px;
        }
        
        .seers-cmp-cookie-policy-accordion-tab-universal input.seers-cmp-cookie-policy-accordion-check {
            position: absolute;
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            outline: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            font-size: 0 !important;
            line-height: 0 !important;
        }

        .seers-cmp-cookie-policy-accordion-tab-universal-label {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: justify;
            -moz-box-align: justify;
            -webkit-box-pack: justify;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            -ms-justify-content: space-between;
            justify-content: space-between;
            padding: 1em 1.5em 1em 1.5em !important;
            display: block !important;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . (get_option('SCCBPP_cookie_consent_font_size') + 1) . "px !important;"); }else{ echo ("font-size: " . ($this->defaultfontsize + 1) . "px !important;"); }?>
            color: #555;
            vertical-align: middle;
            margin: 0 0 0 0 !important;
            font-family: "Arial";
            text-transform: unset !important;
            border-radius: 7px;
            -webkit-border-radius: 7px;
            transition: background-color 0.2s ease-out 0.3s, color 0.2s ease-out 0s;
            background-color: transparent;
            /* border: 1px solid #b7b7b7;  */
        }
        
        
        .seers-cms-universal-detail-categories::before {
            content: '';
            position: absolute;
            width: 10px;
            height: 2px;
            background: #3b6ef8;
            right: 15px !important;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        
        .seers-cmp-cookie-policy-accordion-tab-label::after, .seers-cmp-cookie-policy-accordion-tab-label::before {
            content: '';
            position: absolute;
            width: 10px;
            height: 2px;
            background: #3b6ef8;
            left: 15px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        
        .seers-cmp-cookie-policy-accordion-tab-label::after{
            transform: rotate(90deg);
            top: 48%!important;
        }
        
        .rtl .seers-cmp-cookie-policy-accordion-tab-label{
            text-align:left;
        }
        
        .seers-cmp-cookie-policy-accordion-tab input.seers-cmp-cookie-policy-accordion-check:checked+.seers-cmp-cookie-policy-accordion-tab-label::after {
            transform: rotate(0deg)!important;
        }
            
        
        
        .seers-cmp-cookie-policy-accordion-tab input.seers-cmp-cookie-policy-accordion-check:checked+.seers-cmp-cookie-policy-accordion-tab-label {
            color: #3b6ef8 !important;
        }
        
        .seers-cmp-cookie-policy-accordion-tab input.seers-cmp-cookie-policy-accordion-check:checked+.seers-cmp-cookie-policy-accordion-tab-label::after {
            border-color: #3b6ef8 !important;
            border-width: 0px 0px 1.5px 1.5px !important;
            top: 50% !important;
        }







        .seers-cmp-cookie-policy-accordion-tab-universal-label::after, .seers-cmp-cookie-policy-accordion-tab-universal-label::before {
            content: '';
            position: absolute;
            width: 10px;
            height: 2px;
            background: #3b6ef8;
            right: 15px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        
        .seers-cmp-cookie-policy-accordion-tab-universal-label::after{
            transform: rotate(90deg);
            top: 48%!important;
        }
        
        .rtl .seers-cmp-cookie-policy-accordion-tab-universal-label{
            text-align:left;
        }
        
        .seers-cmp-cookie-policy-accordion-tab-universal input.seers-cmp-cookie-policy-accordion-check:checked+.seers-cmp-cookie-policy-accordion-tab-universal-label::after {
            transform: rotate(0deg)!important;
        }
            
        
        
        .seers-cmp-cookie-policy-accordion-tab-universal input.seers-cmp-cookie-policy-accordion-check:checked+.seers-cmp-cookie-policy-accordion-tab-universal-label {
            color: #3b6ef8 !important;
        }
        
        .seers-cmp-cookie-policy-accordion-tab-universal input.seers-cmp-cookie-policy-accordion-check:checked+.seers-cmp-cookie-policy-accordion-tab-universal-label::after {
            border-color: #3b6ef8 !important;
            border-width: 0px 0px 1.5px 1.5px !important;
            top: 50% !important;
        }
        /*
        .seers-cmp-cookie-policy-accordion-tab-label::after {
            content: '';
            position: absolute;
            width: 10px;
            height: 2px;
            background: #3b6ef8;
            left: 15px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        
        .seers-cmp-cookie-policy-accordion-tab-label::after {
            transform: rotate(90deg);
            top: 48% !important;
        }
        
        .seers-cmp-cookie-policy-accordion-tab input.seers-cmp-cookie-policy-accordion-check:checked+.seers-cmp-cookie-policy-accordion-tab-label::after {
            transform: rotate(0deg) !important;
        }
        
*/
        
        .seers-cmp-cookie-policy-accordion-tab-content {
            max-height: 0;
            color: #555;
            /* background: white; */
            overflow: hidden;
            -webkit-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -moz-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -ms-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -o-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -webkit-transistion-property: all;
            -moz-transistion-property: all;
            -ms-transistion-property: all;
            -o-transistion-property: all;
            transition-property: all;
            -webkit-transition-duration: .3s;
            -moz-transition-duration: .3s;
            -ms-transition-duration: .3s;
            -o-transition-duration: .3s;
            transition-duration: .3s;
        }








        .seers-cmp-cookie-policy-accordion-tab-universal-content {
            max-height: 0;
            color: #555;
            /* background: white; */
            overflow: hidden;
            -webkit-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -moz-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -ms-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -o-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -webkit-transistion-property: all;
            -moz-transistion-property: all;
            -ms-transistion-property: all;
            -o-transistion-property: all;
            transition-property: all;
            -webkit-transition-duration: .3s;
            -moz-transition-duration: .3s;
            -ms-transition-duration: .3s;
            -o-transition-duration: .3s;
            transition-duration: .3s;
        }
        
        .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-header {
            padding: 0 20px;
            height: 55px;
            -webkit-box-shadow: 0 2px 4px 0 rgb(0 0 0 / 7%);
            -moz-box-shadow: 0 2px 4px 0 rgb(0 0 0 / 7%);
            -ms-box-shadow: 0 2px 4px 0 rgb(0 0 0 / 7%);
            -o-box-shadow: 0 2px 4px 0 rgb(0 0 0 / 7%);
            box-shadow: 0 2px 4px 0 rgb(0 0 0 / 7%);
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: start;
            -moz-box-align: start;
            -webkit-box-pack: start;
            -moz-box-pack: start;
            -ms-flex-pack: start;
            -webkit-justify-content: flex-start;
            -moz-justify-content: flex-start;
            -ms-justify-content: flex-start;
            justify-content: flex-start;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
        
        .rtl .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-header {
            -webkit-justify-content: flex-end;
            -moz-justify-content: flex-end;
            -ms-justify-content: flex-end;
            justify-content: flex-end;
        }
        
        .seers-cmp-cookie-policy-accordion-tab-content .seers-cmp-cookie-table-list {
            border-bottom: 1px solid #d8d8d8 !important;
        }
        
        .seers-cmp-cookie-policy-accordion-tab input:checked~.seers-cmp-cookie-policy-accordion-tab-content {
            max-height: 100vh;
            -webkit-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -moz-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -ms-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -o-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -webkit-transistion-property: all;
            -moz-transistion-property: all;
            -ms-transistion-property: all;
            -o-transistion-property: all;
            transition-property: all;
            -webkit-transition-duration: .3s;
            -moz-transition-duration: .3s;
            -ms-transition-duration: .3s;
            -o-transition-duration: .3s;
            transition-duration: .3s;
        }
        
        .seers-cmp-cookie-policy-accordion-tab-content .seers-cmp-cookie-policy-accordion-tab-content-text {
            padding: 1.2em;
            margin: 0;
            color: #696969;
            font-family: "Arial";
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . get_option('SCCBPP_cookie_consent_font_size') . "px !important;"); }else{ echo ("font-size: " . $this->defaultfontsize . "px !important;"); }?>
            line-height: 22px !important;
        }
        
        .seers-cmp-cookie-policy-accordion-tab-content .seers-cmp-cookie-policy-detail-btn {
            margin: 0 1.2em 1.2em 1.2em;
            color: rgb(85, 85, 85);
            font-family: "Arial";
            font-size: 14px;
            display: block;
            cursor: pointer;
        }
        
        .seers-cmp-cookie-policy-accordion-tab-content .seers-cmp-cookie-policy-detail-btn:hover {
            color: #3b6ef8 !important;
            text-decoration: underline;
        }
        










        .seers-cmp-cookie-policy-accordion-tab-universal-content .seers-cmp-cookie-table-list {
            border-bottom: 1px solid #d8d8d8 !important;
        }
        
        .seers-cmp-cookie-policy-accordion-tab-universal input:checked~.seers-cmp-cookie-policy-accordion-tab-universal-content {
            max-height: 100vh;
            padding: 0px 32px 2px;
            -webkit-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -moz-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -ms-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -o-transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            transition-timing-function: cubic-bezier(0.250, 0.460, 0.450, 0.940);
            -webkit-transistion-property: all;
            -moz-transistion-property: all;
            -ms-transistion-property: all;
            -o-transistion-property: all;
            transition-property: all;
            -webkit-transition-duration: .3s;
            -moz-transition-duration: .3s;
            -ms-transition-duration: .3s;
            -o-transition-duration: .3s;
            transition-duration: .3s;
        }
        
        .seers-cmp-cookie-policy-accordion-tab-universal-content .seers-cmp-cookie-policy-accordion-tab-universal-content-text {
            padding: 1.2em;
            margin: 0;
            color: #696969;
            font-family: "Arial";
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . get_option('SCCBPP_cookie_consent_font_size') . "px !important;"); }else{ echo ("font-size: " . $this->defaultfontsize . "px !important;"); }?>
            line-height: 22px !important;
        }
        
        .seers-cmp-cookie-policy-accordion-tab-universal-content .seers-cmp-cookie-policy-detail-btn {
            margin: 0 1.2em 1.2em 1.2em;
            color: rgb(85, 85, 85);
            font-family: "Arial";
            font-size: 14px;
            display: block;
            cursor: pointer;
        }
        
        .seers-cmp-cookie-policy-accordion-tab-universal-content .seers-cmp-cookie-policy-detail-btn:hover {
            color: #3b6ef8 !important;
            text-decoration: underline;
        }
        
        a.seers-cmp-cookie-policy-detail-btn {
            color: var(--link-color) !important;
        }
        
        span.seers-cmp-cookie-policy-always-active {
            color: var(--link-color) !important;
        }
        /*switch button*/
        
        .seers-cmp-cookie-policy-switchers {
            position: absolute;
            top: 50% !important;
            right: 16px !important;
            -webkit-transform: translateY(-50%) !important;
            -moz-transform: translateY(-50%) !important;
            -ms-transform: translateY(-50%) !important;
            -o-transform: translateY(-50%) !important;
            transform: translateY(-50%) !important;
        }
        
        .seers-cmp-cookie-policy-switchers input.seers-cmp-cookie-policy-banner-switch {
            position: absolute;
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
        }
        
        .seers-cmp-cookie-policy-switchers input.seers-cmp-cookie-policy-banner-switch+label {
            width: 36px;
            height: 15px;
            margin: 0 !important;
            padding: 0 !important;
            background-color: #dddddd;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            -ms-border-radius: 30px;
            -o-border-radius: 30px;
            border-radius: 30px;
            display: block;
            position: relative;
            cursor: pointer;
            outline: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        
        .seers-cmp-cookie-policy-switchers input.seers-cmp-cookie-policy-banner-switch+label::before,
        .seers-cmp-cookie-policy-switchers input.seers-cmp-cookie-policy-banner-switch+label::after {
            display: block !important;
            position: absolute !important;
            top: 1px !important;
            left: 1px !important;
            bottom: 1px !important;
            content: "" !important;
        }
        
        .seers-cmp-cookie-policy-switchers input.seers-cmp-cookie-policy-banner-switch+label::before {
            right: 1px !important;
            background-color: #dddddd;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            -ms-border-radius: 30px;
            -o-border-radius: 30px;
            border-radius: 30px;
            -webkit-transition: background 0.4s;
            -moz-transition: background 0.4s;
            -o-transition: background 0.4s;
            transition: background 0.4s;
            margin: -1px;
        }
        
        .seers-cmp-cookie-policy-switchers input.seers-cmp-cookie-policy-banner-switch+label::after {
            width: 20px;
            height: 20px;
            margin-top: -4px;
            margin-left: -4px;
            background-color: #fff;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            -ms-border-radius: 100%;
            -o-border-radius: 100%;
            border-radius: 100%;
            -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            -webkit-transition: margin 0.4s;
            -moz-transition: margin 0.4s;
            -o-transition: margin 0.4s;
            transition: margin 0.4s;
        }
        
        .seers-cmp-cookie-policy-switchers input.seers-cmp-cookie-policy-banner-switch:checked+label::after {
            margin-left: 18px !important;
            background: #3544ee !important;
        }
        
        .seers-cmp-cookie-policy-switchers input.seers-cmp-cookie-policy-banner-switch:checked+label:before {
            background-color: #d5e9ff;
        }




/*Preference Banner switch button*/
        .seers-cmp-cookie-policy-switchers-first-preference {
            position: absolute;
            margin: 20px 10px 15px 10px;
            top: 30px;
            /* top: 120% !important;
            right: 36px !important; */
            -webkit-transform: translateY(-50%) !important;
            -moz-transform: translateY(-50%) !important;
            -ms-transform: translateY(-50%) !important;
            -o-transform: translateY(-50%) !important;
            transform: translateY(-50%) !important;
        }
        .seers-cmp-cookie-policy-switchers-first-preference input.seers-cmp-cookie-policy-banner-switch {
            position: absolute;
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
        }
        
        .seers-cmp-cookie-policy-switchers-first-preference input.seers-cmp-cookie-policy-banner-switch+label {
            width: 36px;
            height: 15px;
            margin: 0 !important;
            padding: 0 !important;
            background-color: #dddddd;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            -ms-border-radius: 30px;
            -o-border-radius: 30px;
            border-radius: 30px;
            display: block;
            position: relative;
            cursor: pointer;
            outline: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        
        .seers-cmp-cookie-policy-switchers-first-preference input.seers-cmp-cookie-policy-banner-switch+label::before,
        .seers-cmp-cookie-policy-switchers-first-preference input.seers-cmp-cookie-policy-banner-switch+label::after {
            display: block !important;
            position: absolute !important;
            top: 1px !important;
            left: 1px !important;
            bottom: 1px !important;
            content: "" !important;
        }
        
        .seers-cmp-cookie-policy-switchers-first-preference input.seers-cmp-cookie-policy-banner-switch+label::before {
            right: 1px !important;
            background-color: #dddddd;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            -ms-border-radius: 30px;
            -o-border-radius: 30px;
            border-radius: 30px;
            -webkit-transition: background 0.4s;
            -moz-transition: background 0.4s;
            -o-transition: background 0.4s;
            transition: background 0.4s;
            margin: -1px;
        }
        
        .seers-cmp-cookie-policy-switchers-first-preference input.seers-cmp-cookie-policy-banner-switch+label::after {
            width: 20px;
            height: 20px;
            margin-top: -4px;
            margin-left: -4px;
            background-color: #fff;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            -ms-border-radius: 100%;
            -o-border-radius: 100%;
            border-radius: 100%;
            -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            -webkit-transition: margin 0.4s;
            -moz-transition: margin 0.4s;
            -o-transition: margin 0.4s;
            transition: margin 0.4s;
        }
        
        .seers-cmp-cookie-policy-switchers-first-preference input.seers-cmp-cookie-policy-banner-switch:checked+label::after {
            margin-left: 18px !important;
            background: #3544ee !important;
        }
        
        .seers-cmp-cookie-policy-switchers-first-preference input.seers-cmp-cookie-policy-banner-switch:checked+label:before {
            background-color: #d5e9ff;
        }



        /*Universal Banner switch button*/
        .seers-cmp-cookie-policy-switchers-universal {
            position: absolute;
            top: 50% !important;
            right: 50px !important;
            -webkit-transform: translateY(-50%) !important;
            -moz-transform: translateY(-50%) !important;
            -ms-transform: translateY(-50%) !important;
            -o-transform: translateY(-50%) !important;
            transform: translateY(-50%) !important;
        }
        
        .seers-cmp-cookie-policy-switchers-universal input.seers-cmp-cookie-policy-banner-switch {
            position: absolute;
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
        }
        
        .seers-cmp-cookie-policy-switchers-universal input.seers-cmp-cookie-policy-banner-switch+label {
            width: 36px;
            height: 15px;
            margin: 0 !important;
            padding: 0 !important;
            background-color: #dddddd;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            -ms-border-radius: 30px;
            -o-border-radius: 30px;
            border-radius: 30px;
            display: block;
            position: relative;
            cursor: pointer;
            outline: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        
        .seers-cmp-cookie-policy-switchers-universal input.seers-cmp-cookie-policy-banner-switch+label::before,
        .seers-cmp-cookie-policy-switchers-universal input.seers-cmp-cookie-policy-banner-switch+label::after {
            display: block !important;
            position: absolute !important;
            top: 1px !important;
            left: 1px !important;
            bottom: 1px !important;
            content: "" !important;
        }
        
        .seers-cmp-cookie-policy-switchers-universal input.seers-cmp-cookie-policy-banner-switch+label::before {
            right: 1px !important;
            background-color: #dddddd;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            -ms-border-radius: 30px;
            -o-border-radius: 30px;
            border-radius: 30px;
            -webkit-transition: background 0.4s;
            -moz-transition: background 0.4s;
            -o-transition: background 0.4s;
            transition: background 0.4s;
            margin: -1px;
        }
        
        .seers-cmp-cookie-policy-switchers-universal input.seers-cmp-cookie-policy-banner-switch+label::after {
            width: 20px;
            height: 20px;
            margin-top: -4px;
            margin-left: -4px;
            background-color: #fff;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            -ms-border-radius: 100%;
            -o-border-radius: 100%;
            border-radius: 100%;
            -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            -webkit-transition: margin 0.4s;
            -moz-transition: margin 0.4s;
            -o-transition: margin 0.4s;
            transition: margin 0.4s;
        }
        
        .seers-cmp-cookie-policy-switchers-universal input.seers-cmp-cookie-policy-banner-switch:checked+label::after {
            margin-left: 18px !important;
            background: #3544ee !important;
        }
        
        .seers-cmp-cookie-policy-switchers-universal input.seers-cmp-cookie-policy-banner-switch:checked+label:before {
            background-color: #d5e9ff;
        }
        
        .seers-cmp-cookie-policy-always-active {
            color: rgb(85, 85, 85) !important;
            font-size: 13px !important;
            font-family: arial !important;
            font-weight: normal;
            position: absolute;
            right: 15px !important;
            top: 50% !important;
            -webkit-transform: translateY(-50%) !important;
            -moz-transform: translateY(-50%) !important;
            -ms-transform: translateY(-50%) !important;
            -o-transform: translateY(-50%) !important;
            transform: translateY(-50%) !important;
        }
        .seers-cmp-cookie-policy-always-active-universal {
            color: rgb(85, 85, 85) !important;
            font-size: 13px !important;
            font-family: arial !important;
            font-weight: normal;
            position: absolute;
            right: 50px !important;
            top: 50% !important;
            -webkit-transform: translateY(-50%) !important;
            -moz-transform: translateY(-50%) !important;
            -ms-transform: translateY(-50%) !important;
            -o-transform: translateY(-50%) !important;
            transform: translateY(-50%) !important;
        }

        .seers-cmp-cookie-policy-first-preference {
            display: flex;
            margin: 0px 0px 20px;
        }

        .seers-cmp-cookie-policy-accordion-tab-label-first-preference {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: justify;
            -moz-box-align: justify;
            -webkit-box-pack: justify;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            -ms-justify-content: space-between;
            justify-content: space-between;
            padding: 1em 3.5em 1em 0em !important;
            display: block !important;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            font-size: 13px !important;
            color: #555;
            vertical-align: middle;
            margin: 0 0 0 0 !important;
            font-family: "Arial";
            text-transform: unset !important;
            border-radius: 7px;
            -webkit-border-radius: 7px;
            transition: background-color 0.2s ease-out 0.3s, color 0.2s ease-out 0s;
            background-color: transparent;
            /*  border: 1px solid #b7b7b7; */
        }

        .seers-cmp-show-details {
            margin-top: 28px;
        }
        .seers-cms-header-universal-bar{
            width: 100%;
            background-color: #e3e6e8;
            border-bottom: 1px swolid #d6d6d6;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            display: flex;
            padding: 18px 18px 6px;
        }
        .seers-cmp-cookie-policy-powered-by-link-universal {
            margin-left: auto;
            position: relative;
            top: 10px;
        }
        .seers-cmp-cookie-policy-powered-by-link-universal svg {
            width: 60px;
            height: fit-content;
        }

        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-preference-universal-bar .seers-cmp-cookie-policy-hol {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: block;
            -webkit-box-align: justify;
            -moz-box-align: justify;
            -webkit-box-pack: justify;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            -ms-justify-content: space-between;
            justify-content: space-between;
            -webkit-box-flex: 1;
            -webkit-flex: 1 1 auto;
            -moz-flex: 1 1 auto;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
        }

        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-preference-universal-bar .seers-cmp-cookie-policy-btn-hol {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin: 0 0px;
            /* min-width: 381px; */
            max-width: 100%;
            width: 100%;
            /* flex-flow: row wrap; */
            background-color: #e3e3e3;
            padding: 20px 12px 6px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }
        .seers-cms-tabs-universal-bar {
            display: flex;
            border-bottom: 1px solid #d6d6d6;
            /* padding-bottom: 10px; */
        }
        .seers-cmp-consent-tab {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            text-align: center;
            padding: 20px 0 10px;
        }
        .seers-cmp-policy-tab {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            text-align: center;
            padding: 20px 0 10px;
        }
        .seers-cmp-detail-tab {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            text-align: center;
            padding: 20px 0 10px;
        }
        .seers-cmp-consent-tab.active, .seers-cmp-detail-tab.active, .seers-cmp-policy-tab.active {
        border-bottom: 2px solid;
        <?php if(get_option('SCCBPP_cookie_consent_agree_btn_color') && get_option('SCCBPP_cookie_consent_agree_btn_color')!=''){ echo ("border-bottom-color: " . get_option('SCCBPP_cookie_consent_agree_btn_color') . " !important;"); }else{ echo ""; }?>
        }
        .seers-cms-pages-universal-bar {
            padding: 15px 0px 0px;
        }
        .seers-cmp-cookie-policy-universal-choices {
        display: flex;
        margin: 20px 0px 0px;
        width: 100%;
        }

        .seers-cmp-cookie-policy-accordion-tab-label-universal {
            display: flex; 
            gap: 10px;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2em 0em 4em 0em !important;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            font-size: 13px !important;
            color: #555;
            vertical-align: middle;
            margin: 0 !important;
            font-family: "Arial";
            text-transform: unset !important;
            /* border-radius: 7px; */
            transition: background-color 0.2s ease-out 0.3s, color 0.2s ease-out 0s;
            background-color: transparent;
            flex: 1;
            <?php if(get_option('SCCBPP_cookie_consent_body_text_color') && get_option('SCCBPP_cookie_consent_body_text_color')!=''){ echo ("color: " . get_option('SCCBPP_cookie_consent_body_text_color') . " !important;"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_font_style') && get_option('SCCBPP_cookie_consent_font_style')!='' && get_option('SCCBPP_cookie_consent_font_style')!='inherit'){ echo ("font-family: \"" . get_option('SCCBPP_cookie_consent_font_style') . "\" !important;"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . (get_option('SCCBPP_cookie_consent_font_size') + 2) . "px !important;"); }else{ echo ("font-size: " . ($this->defaultfontsize + 2) . "px !important;"); }?>
            /* display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: center;
            text-align: center;
            -webkit-box-align: justify;
            -moz-box-align: justify;
            -webkit-box-pack: justify;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            -ms-justify-content: space-between;
            justify-content: space-between;
            padding: 1em 3.5em 1em 0em !important;
            display: block !important;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            font-size: 13px !important;
            color: #555;
            vertical-align: middle;
            margin: 0 0 0 0 !important;
            font-family: "Arial";
            text-transform: unset !important;
            border-radius: 7px;
            -webkit-border-radius: 7px;
            transition: background-color 0.2s ease-out 0.3s, color 0.2s ease-out 0s; */
            background-color: transparent;
            /* border: 1px solid #b7b7b7; */
            /* flex: 1; */
            /* justify-content: center; */
        }
        .seers-cms-universal-content-section {
            background-color: <?php if(get_option('SCCBPP_cookie_consent_banner_bg_color') && get_option('SCCBPP_cookie_consent_banner_bg_color')!=''){ echo(get_option('SCCBPP_cookie_consent_banner_bg_color')); }else{ echo "#fff"; }?>;
        }

        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-preference-universal-bar .seers-cmp-cookie-policy-hol .seers-cmp-cookie-policy-text {
            padding: 0 30px 0 0;
            margin: 0 0 0px 0 !important;
            -webkit-box-flex: 1;
            -webkit-flex: auto;
            -moz-flex: auto;
            -ms-flex: auto;
            flex: auto;
        }

        .seers-cms-universal-detail-categories {
            <?php if(get_option('SCCBPP_cookie_consent_body_text_color') && get_option('SCCBPP_cookie_consent_body_text_color')!=''){ echo ("color: " . get_option('SCCBPP_cookie_consent_body_text_color') . " !important;"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_font_style') && get_option('SCCBPP_cookie_consent_font_style')!='' && get_option('SCCBPP_cookie_consent_font_style')!='inherit'){ echo ("font-family: \"" . get_option('SCCBPP_cookie_consent_font_style') . "\" !important;"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . (get_option('SCCBPP_cookie_consent_font_size') + 2) . "px !important;"); }else{ echo ("font-size: " . ($this->defaultfontsize + 2) . "px !important;"); }?>
            font-weight: 600;
        }

        .seers-cms-universal-detail-categories-detail {
            <?php if(get_option('SCCBPP_cookie_consent_body_text_color') && get_option('SCCBPP_cookie_consent_body_text_color')!=''){ echo ("color: " . get_option('SCCBPP_cookie_consent_body_text_color') . " !important;"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_font_style') && get_option('SCCBPP_cookie_consent_font_style')!='' && get_option('SCCBPP_cookie_consent_font_style')!='inherit'){ echo ("font-family: \"" . get_option('SCCBPP_cookie_consent_font_style') . "\" !important;"); }else{ echo ""; }?>
            <?php if(get_option('SCCBPP_cookie_consent_font_size') && get_option('SCCBPP_cookie_consent_font_size')!=''){ echo ("font-size: " . (get_option('SCCBPP_cookie_consent_font_size') + 2) . "px !important;"); }else{ echo ("font-size: " . ($this->defaultfontsize + 2) . "px !important;"); }?>
            font-weight: 500;
        }
        
        .seers-cms-universal-detail-tab-content {
            border: 1px solid #d7d7d7 !important;
        }

        .seers-cmp-banner-bar.seers-cmp-top-hanging-bar .seers-cmp-cookie-policy-text {
            padding-right: 20px;
        }
        .seers-cmp-banner-bar.seers-cmp-banner-hanging-bar .seers-cmp-cookie-policy-text {
            padding-right: 20px;
        }
        .seers-cmp-banner-bar.seers-cmp-banner-preference-bar .seers-cmp-cookie-policy-text {
            padding-right: 20px;
        }
        .seers-cmp-banner-bar.seers-cmp-preference-bottom-hanging-bar .seers-cmp-cookie-policy-text {
            padding-right: 20px;
        }

        .seers-cmp-cookie-policy-switchers-customize-universal {
            top: 50px !important;
        }

        @media screen and (max-width: 1300px) {
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-preference-bottom-hanging-bar {
                position: fixed;
                bottom: 0;
                top: auto;
                left: 0;
                right: 0;
                width: 92%;
                max-width: 92%;
                margin: auto;
                margin-bottom: 55px;
                padding: 30px 3% 15px;
                z-index: 9999999999999;
                -webkit-box-sizing: border-box;
                border: 1px solid #E0DEDE;
                border-radius: 10px;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                background: #ffffff;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: -moz-box;
                display: -moz-flex;
                display: flex;
                -webkit-box-align: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                -moz-flex-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-flex-flow: row wrap;
                -moz-flex-flow: row wrap;
                -ms-flex-flow: row wrap;
                flex-flow: row wrap;
                -webkit-box-align: justify;
                -moz-box-align: justify;
                -webkit-box-pack: justify;
                -moz-box-pack: justify;
                -ms-flex-pack: justify;
                -webkit-justify-content: space-between;
                -moz-justify-content: space-between;
                -ms-justify-content: space-between;
                justify-content: space-between;
                box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
                -webkit-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
                -moz-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
                -webkit-animation: seers-cmp-slide-in-bottom 1s both;
                -moz-animation: seers-cmp-slide-in-bottom 1s both;
                -ms-animation: seers-cmp-slide-in-bottom 1s both;
                -o-animation: seers-cmp-slide-in-bottom 1s both;
                animation: seers-cmp-slide-in-bottom 1s both;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-preference-bottom-hanging-bar .seers-cmp-cookie-policy-btn-hol {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin: 0 -7.5px;
            /* min-width: 381px; */
            max-width: 100%;
            width: 100%;
            /* flex-flow: row wrap; */
        }
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-preference-universal-bar {
            position: fixed;
            border-radius: 20px;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            bottom: auto !important;
            right: auto !important;
            width: 40%;
            max-width: 60%;
            padding: 0px 0% 0px;
            z-index: 9999999999999;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            background: #ffffff;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-flex-flow: row wrap;
            -moz-flex-flow: row wrap;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
            -webkit-box-align: justify;
            -moz-box-align: justify;
            -webkit-box-pack: justify;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            -ms-justify-content: space-between;
            justify-content: space-between;
            box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -webkit-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -moz-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -webkit-animation: seers-cmp-slide-in-bottom 1s both;
            -moz-animation: seers-cmp-slide-in-bottom 1s both;
            -ms-animation: seers-cmp-slide-in-bottom 1s both;
            -o-animation: seers-cmp-slide-in-bottom 1s both;
            animation: seers-cmp-slide-in-bottom 1s both;
        }
        }
        @media screen and (max-width: 991px) {
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-banner-preference-bar .seers-cmp-cookie-policy-btn-hol {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: -moz-box;
                display: -moz-flex;
                display: flex;
                -webkit-box-align: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                -moz-flex-align: center;
                -ms-flex-align: center;
                align-items: center;
                margin: 0 -7.5px;
                /* min-width: 381px; */
                max-width: 100%;
                width: 100%;
                /* flex-flow: row wrap; */
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-policy-desc {
                margin: 0 0 15px 0 !important;
                padding: 0 20px 0 0 !important;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-hanging-bar .seers-cmp-policy-desc {
                margin: 0 0 15px 0 !important;
                padding: 0 0px 0 0 !important;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-banner-hanging-bar .seers-cmp-policy-desc {
                margin: 0 0 15px 0 !important;
                padding: 0 0px 0 0 !important;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-hanging-bar .seers-cmp-cookie-policy-hol {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: -moz-box;
                display: -moz-flex;
                display: block;
                -webkit-box-align: justify;
                -moz-box-align: justify;
                -webkit-box-pack: justify;
                -moz-box-pack: justify;
                -ms-flex-pack: justify;
                -webkit-box-align: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                -moz-flex-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-justify-content: space-between;
                -moz-justify-content: space-between;
                -ms-justify-content: space-between;
                justify-content: space-between;
                -webkit-box-flex: 1;
                -webkit-flex: 1 1 auto;
                -moz-flex: 1 1 auto;
                -ms-flex: 1 1 auto;
                flex: 1 1 auto;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-hanging-bar .seers-cmp-cookie-policy-hol .seers-cmp-cookie-policy-text {
                padding: 0 0px 0 0;
                margin: 0 0 15px 0 !important;
                -webkit-box-flex: 1;
                -webkit-flex: auto;
                -moz-flex: auto;
                -ms-flex: auto;
                flex: auto;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-banner-hanging-bar .seers-cmp-cookie-policy-hol .seers-cmp-cookie-policy-text {
                padding: 0 0px 0 0;
                margin: 0 0 15px 0 !important;
                -webkit-box-flex: 1;
                -webkit-flex: auto;
                -moz-flex: auto;
                -ms-flex: auto;
                flex: auto;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-hanging-bar .seers-cmp-cookie-policy-btn-hol {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: -moz-box;
                display: -moz-flex;
                display: flex;
                -webkit-box-align: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                -moz-flex-align: center;
                -ms-flex-align: center;
                align-items: center;
                margin: 0 -7.5px;
                /* min-width: 381px; */
                max-width: 100%;
                width: 100%;
                /* flex-flow: row wrap; */
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-banner-hanging-bar .seers-cmp-cookie-policy-hol {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: -moz-box;
                display: -moz-flex;
                display: block;
                -webkit-box-align: justify;
                -moz-box-align: justify;
                -webkit-box-pack: justify;
                -moz-box-pack: justify;
                -ms-flex-pack: justify;
                -webkit-box-align: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                -moz-flex-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-justify-content: space-between;
                -moz-justify-content: space-between;
                -ms-justify-content: space-between;
                justify-content: space-between;
                -webkit-box-flex: 1;
                -webkit-flex: 1 1 auto;
                -moz-flex: 1 1 auto;
                -ms-flex: 1 1 auto;
                flex: 1 1 auto;
                width: 120px;
            }
                        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-banner-hanging-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-btn, .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-banner-hanging-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-preference-btn {
                /* width: 112px; */
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: -moz-box;
                display: -moz-flex;
                display: flex;
                -webkit-box-align: center;
                -moz-box-align: center;
                -webkit-box-pack: center;
                -moz-box-pack: center;
                -ms-flex-pack: center;
                -webkit-justify-content: center;
                -moz-justify-content: center;
                -ms-justify-content: center;
                justify-content: center;
                -webkit-box-align: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                -moz-flex-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-flex: 1 !important;
                -webkit-flex: 1 0 auto !important;
                -moz-flex: 1 0 auto !important;
                -ms-flex: 1 0 auto !important;
                flex: 1 0 auto !important;
                min-width: 112px;
                border-radius: 4px;
                -webkit-border-radius: 4px;
                width: 100%;
            }
                        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-hanging-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-btn, .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-hanging-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-preference-btn {
                /* width: 112px; */
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: -moz-box;
                display: -moz-flex;
                display: flex;
                -webkit-box-align: center;
                -moz-box-align: center;
                -webkit-box-pack: center;
                -moz-box-pack: center;
                -ms-flex-pack: center;
                -webkit-justify-content: center;
                -moz-justify-content: center;
                -ms-justify-content: center;
                justify-content: center;
                -webkit-box-align: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                -moz-flex-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-flex: 1 !important;
                -webkit-flex: 1 0 auto !important;
                -moz-flex: 1 0 auto !important;
                -ms-flex: 1 0 auto !important;
                flex: 1 0 auto !important;
                min-width: 112px;
                border-radius: 4px;
                -webkit-border-radius: 4px;
                width: 100%;
            }
            .seers-cmp-cookie-policy-hanging-btn-hol {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: block !important;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin: 0 -7.5px;
            /* min-width: 381px; */
            max-width: 100% !important;
            width: 100% !important;
            /* flex-flow: row wrap; */
        }
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-banner-hanging-bar {
    position: fixed;
    bottom: 0;
    top: auto;
    left: 0;
    right: 0;
    width: 95%;
    max-width: 95%;
    padding: 30px 3% 15px;
    margin: auto;
    margin-bottom: 50px;
    border-radius: 10px;
    border: 1px solid #E0DEDE;
    z-index: 9999999999999;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    background: #ffffff;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: -moz-box;
    display: -moz-flex;
    display: flex;
    -webkit-box-align: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    -moz-flex-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-flex-flow: row wrap;
    -moz-flex-flow: row wrap;
    -ms-flex-flow: row wrap;
    flex-flow: row;
    -webkit-box-align: justify;
    -moz-box-align: justify;
    -webkit-box-pack: justify;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    -webkit-justify-content: space-between;
    -moz-justify-content: space-between;
    -ms-justify-content: space-between;
    justify-content: space-between;
    box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
    -webkit-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
    -moz-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
    -webkit-animation: seers-cmp-slide-in-bottom 1s both;
    -moz-animation: seers-cmp-slide-in-bottom 1s both;
    -ms-animation: seers-cmp-slide-in-bottom 1s both;
    -o-animation: seers-cmp-slide-in-bottom 1s both;
    animation: seers-cmp-slide-in-bottom 1s both;
}

    .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-hanging-bar {
    top: 0;
    bottom: auto;
    left: 0;
    right: 0;
    -webkit-animation: seers-cmp-slide-in-top-bar 1s both;
    -moz-animation: seers-cmp-slide-in-top-bar 1s both;
    -ms-animation: seers-cmp-slide-in-top-bar 1s both;
    -o-animation: seers-cmp-slide-in-top-bar 1s both;
    animation: 1s both;
    width: 95% !important;
    margin: auto;
    margin-top: 75px;
    border-radius: 10px;
    border: 1px solid #E0DEDE;
}
.seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-banner-preference-bar {
    position: fixed;
    bottom: 0;
    top: auto;
    left: 0;
    right: 0;
    width: 100% !important;
    max-width: 100%;
    padding: 30px 3% 15px;
    z-index: 9999999999999;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    background: #ffffff;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: -moz-box;
    display: -moz-flex;
    display: block;
    -webkit-box-align: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    -moz-flex-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-flex-flow: row wrap;
    -moz-flex-flow: row wrap;
    -ms-flex-flow: row wrap;
    flex-flow: row;
    -webkit-box-align: justify;
    -moz-box-align: justify;
    -webkit-box-pack: justify;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    -webkit-justify-content: space-between;
    -moz-justify-content: space-between;
    -ms-justify-content: space-between;
    justify-content: space-between;
    box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
    -webkit-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
    -moz-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
    -webkit-animation: seers-cmp-slide-in-bottom 1s both;
    -moz-animation: seers-cmp-slide-in-bottom 1s both;
    -ms-animation: seers-cmp-slide-in-bottom 1s both;
    -o-animation: seers-cmp-slide-in-bottom 1s both;
    animation: seers-cmp-slide-in-bottom 1s both;
}
        }
        @media screen and (max-width: 810px) {
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-banner-preference-bar .seers-cmp-cookie-policy-hol {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: -moz-box;
                display: -moz-flex;
                display: block;
                -webkit-box-align: justify;
                -moz-box-align: justify;
                -webkit-box-pack: justify;
                -moz-box-pack: justify;
                -ms-flex-pack: justify;
                -webkit-box-align: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                -moz-flex-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-justify-content: space-between;
                -moz-justify-content: space-between;
                -ms-justify-content: space-between;
                justify-content: space-between;
                -webkit-box-flex: 1;
                -webkit-flex: 1 1 auto;
                -moz-flex: 1 1 auto;
                -ms-flex: 1 1 auto;
                flex: 1 1 auto;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-banner-preference-bar .seers-cmp-cookie-policy-hol .seers-cmp-cookie-policy-text {
                padding: 0 0px 0 0;
                margin: 0 0 15px 0 !important;
                -webkit-box-flex: 1;
                -webkit-flex: auto;
                -moz-flex: auto;
                -ms-flex: auto;
                flex: auto;
                width: 100%;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-banner-preference-bar .seers-cmp-policy-desc {
                margin: 0 0 15px 0 !important;
                padding: 0 20px 0 0 !important;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-banner-preference-bar .seers-cmp-cookie-policy-btn-hol {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: -moz-box;
                display: -moz-flex;
                display: flex;
                -webkit-box-align: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                -moz-flex-align: center;
                -ms-flex-align: center;
                align-items: center;
                margin: 45px -7.5px 0px;
                /* min-width: 381px; */
                max-width: 100%;
                width: 100%;
                /* flex-flow: row wrap; */
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-preference-bottom-hanging-bar {
                position: fixed;
                bottom: 0;
                top: auto;
                left: 0;
                right: 0;
                width: 98%;
                max-width: 98%;
                margin: auto;
                margin-bottom: 55px;
                padding: 30px 3% 15px;
                z-index: 9999999999999;
                -webkit-box-sizing: border-box;
                border: 1px solid #E0DEDE;
                border-radius: 10px;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                background: #ffffff;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: -moz-box;
                display: -moz-flex;
                display: flex;
                -webkit-box-align: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                -moz-flex-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-flex-flow: row wrap;
                -moz-flex-flow: row wrap;
                -ms-flex-flow: row wrap;
                flex-flow: row wrap;
                -webkit-box-align: justify;
                -moz-box-align: justify;
                -webkit-box-pack: justify;
                -moz-box-pack: justify;
                -ms-flex-pack: justify;
                -webkit-justify-content: space-between;
                -moz-justify-content: space-between;
                -ms-justify-content: space-between;
                justify-content: space-between;
                box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
                -webkit-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
                -moz-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
                -webkit-animation: seers-cmp-slide-in-bottom 1s both;
                -moz-animation: seers-cmp-slide-in-bottom 1s both;
                -ms-animation: seers-cmp-slide-in-bottom 1s both;
                -o-animation: seers-cmp-slide-in-bottom 1s both;
                animation: seers-cmp-slide-in-bottom 1s both;

            }
        }
        
        @media screen and (max-width: 767px) {
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-hol,
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-bar .seers-cmp-cookie-policy-hol {
                -webkit-box-align: start !important;
                -moz-box-align: start !important;
                -ms-flex-align: start !important;
                -webkit-align-items: flex-start !important;
                -moz-flex-align: flex-start !important;
                -ms-flex-align: flex-start !important;
                align-items: flex-start !important;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-left-bar .seers-cmp-cookie-data-hol .seers-cmp-cookie-policy-hol {
                -webkit-box-orient: horizontal;
                -moz-box-orient: horizontal;
                -webkit-box-direction: normal;
                -moz-box-direction: normal;
                -webkit-flex-flow: row wrap;
                -moz-flex-flow: row wrap;
                -ms-flex-flow: row wrap;
                flex-flow: row wrap;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-data {
                -webkit-box-orient: horizontal;
                -moz-box-orient: horizontal;
                -webkit-box-direction: normal;
                -moz-box-direction: normal;
                -webkit-flex-flow: row wrap;
                -moz-flex-flow: row wrap;
                -ms-flex-flow: row wrap;
                flex-flow: row wrap;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-hol .seers-cmp-policy-desc,
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-left-bar .seers-cmp-cookie-data-hol .seers-cmp-cookie-policy-hol .seers-cmp-policy-desc {
                margin: 0 0 15px 0;
            }
            .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content.seers-cmp-cookie-banner-active {
                max-width: 100% !important;
                width: 100% !important;
            }
        }
        
        @media screen and (max-width: 639px) {
            /*.seers-cmp-cookie-policy-accordion-tabs {
                height: 150px !important;
            }*/
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-hol,
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-bar .seers-cmp-cookie-policy-hol {
                -webkit-box-orient: horizontal;
                -moz-box-orient: horizontal;
                -webkit-box-direction: normal;
                -moz-box-direction: normal;
                -webkit-flex-flow: row wrap;
                -moz-flex-flow: row wrap;
                -ms-flex-flow: row wrap;
                flex-flow: row wrap;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-hol .seers-cmp-cookie-policy-text {
                padding: 0 !important;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol {
                -webkit-box-orient: horizontal;
                -moz-box-orient: horizontal;
                -webkit-box-direction: normal;
                -moz-box-direction: normal;
                -webkit-flex-flow: row wrap !important;
                -moz-flex-flow: row wrap !important;
                -ms-flex-flow: row wrap !important;
                flex-flow: row wrap !important;
                margin: 0 auto !important;
                width: 100% !important;
                min-width: 100% !important;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-policy-desc {
                margin: 0 !important;
                padding: 0 !important;
            }
        }
        
        @media screen and (max-width: 479px) {
            /*.seers-cmp-cookie-policy-accordion-tabs {
                height: 110px !important;
            }*/
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar {
    position: fixed;
    bottom: 0;
    top: auto;
    left: 0;
    right: 0;
    width: 100%;
    max-width: 100%;
    padding: 30px 3% 15px;
    z-index: 9999999999999;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    background: #ffffff;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: -moz-box;
    display: -moz-flex;
    display: block;
    -webkit-box-align: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    -moz-flex-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-flex-flow: row wrap;
    -moz-flex-flow: row wrap;
    -ms-flex-flow: row wrap;
    flex-flow: row;
    -webkit-box-align: justify;
    -moz-box-align: justify;
    -webkit-box-pack: justify;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    -webkit-justify-content: space-between;
    -moz-justify-content: space-between;
    -ms-justify-content: space-between;
    justify-content: space-between;
    box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
    -webkit-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
    -moz-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
    -webkit-animation: seers-cmp-slide-in-bottom 1s both;
    -moz-animation: seers-cmp-slide-in-bottom 1s both;
    -ms-animation: seers-cmp-slide-in-bottom 1s both;
    -o-animation: seers-cmp-slide-in-bottom 1s both;
    animation: seers-cmp-slide-in-bottom 1s both;
}
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-preference-universal-bar {
                position: fixed;
                border-radius: 20px;
                top: 50% !important;
                left: 50% !important;
                transform: translate(-50%, -50%) !important;
                bottom: auto !important;
                right: auto !important;
                width: 95%;
                max-width: 100%;
                padding: 0px 0% 0px;
                z-index: 9999999999999;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                background: #ffffff;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: -moz-box;
                display: -moz-flex;
                display: flex;
                -webkit-box-align: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                -moz-flex-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-flex-flow: row wrap;
                -moz-flex-flow: row wrap;
                -ms-flex-flow: row wrap;
                flex-flow: row wrap;
                -webkit-box-align: justify;
                -moz-box-align: justify;
                -webkit-box-pack: justify;
                -moz-box-pack: justify;
                -ms-flex-pack: justify;
                -webkit-justify-content: space-between;
                -moz-justify-content: space-between;
                -ms-justify-content: space-between;
                justify-content: space-between;
                box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
                -webkit-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
                -moz-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
                -webkit-animation: seers-cmp-slide-in-bottom 1s both;
                -moz-animation: seers-cmp-slide-in-bottom 1s both;
                -ms-animation: seers-cmp-slide-in-bottom 1s both;
                -o-animation: seers-cmp-slide-in-bottom 1s both;
                animation: seers-cmp-slide-in-bottom 1s both;
            }
            .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-default-banner-footer-block {
                -webkit-box-orient: horizontal;
                -moz-box-orient: horizontal;
                -webkit-box-direction: normal;
                -moz-box-direction: normal;
                -webkit-flex-flow: row wrap;
                -moz-flex-flow: row wrap;
                -ms-flex-flow: row wrap;
                flex-flow: row wrap;
                margin: 0 8px 0 0 !important;
            }
            .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-default-banner-footer-block .seers-cmp-cookie-disagree-btn {
                -webkit-flex-basis: 100%;
                -ms-flex-preferred-size: 100%;
                flex-basis: 100%;
                margin: 0 0 10px 0 !important;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-btn,
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar .seers-cmp-cookie-policy-btn-hol .seers-cmp-preference-btn {
                width: 100% !important;
                margin-left: 0 !important;
                margin-right: 0 !important;
                -webkit-flex: auto !important;
                -moz-flex: auto !important;
                -ms-flex: auto !important;
                flex: auto !important;
            }
            .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-body-text .seers-cmp-policy-banner-text-links .seers-cmp-btn {
                width: 100% !important;
                margin: 0 10px 15px !important;
            }
            .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-power-by {
                -webkit-box-align: center !important;
                -moz-box-align: center !important;
                -webkit-box-pack: center !important;
                -moz-box-pack: center !important;
                -ms-flex-pack: center !important;
                -webkit-justify-content: center !important;
                -moz-justify-content: center !important;
                -ms-justify-content: center !important;
                justify-content: center !important;
            }
            .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-power-by .seers-cmp-cookie-policy-powered-by-text {
                margin: 0 0 0 auto;
            }
            .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-scan-staus {
                margin: 0 0 0 auto;
            }
            
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-right-bar, .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-left-bar{
                position: fixed;
                bottom: 0;
                top: auto;
                left: 0;
                right: 0;
                width: 100%;
                max-width: 100%;
                padding: 15px 5% 0;
                z-index: 9999999999999;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                background: #fff;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: -moz-box;
                display: -moz-flex;
                display: flex;
                -webkit-box-align: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                -moz-flex-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-flex-flow: row wrap;
                -moz-flex-flow: row wrap;
                -ms-flex-flow: row wrap;
                flex-flow: row wrap;
                -webkit-box-align: justify;
                -moz-box-align: justify;
                -webkit-box-pack: justify;
                -moz-box-pack: justify;
                -ms-flex-pack: justify;
                -webkit-justify-content: space-between;
                -moz-justify-content: space-between;
                -ms-justify-content: space-between;
                justify-content: space-between;
                box-shadow: 0 -4px 19px rgb(0 0 0 / 7%);
                -webkit-box-shadow: 0 -4px 19px rgb(0 0 0 / 7%);
                -moz-box-shadow: 0 -4px 19px rgba(0,0,0,.07);
                -webkit-animation: seers-cmp-slide-in-bottom 1s both;
                -moz-animation: seers-cmp-slide-in-bottom 1s both;
                -ms-animation: seers-cmp-slide-in-bottom 1s both;
                -o-animation: seers-cmp-slide-in-bottom 1s both;
                animation: seers-cmp-slide-in-bottom 1s both;
            }
            .seers-cmp-cookie-policy-first-preference {
                display: block;
                margin: 10px 0px;
            }
            .seers-cmp-cookie-policy-switchers-first-preference {
                /* position: absolute;
                right: 4px;
                top: 10%; */
                /* margin: 20px 10px 15px 10px; */
                /* -webkit-transform: translateY(-50%) !important;
                -moz-transform: translateY(-50%) !important;
                -ms-transform: translateY(-50%) !important;
                -o-transform: translateY(-50%) !important;
                transform: translateY(-50%) !important; */
                margin: 0;
                transform: translateY(0); 
                        top: 24px;
                        right: 4px;
            }
            .seers-cmp-show-details {
                margin-top: 2px;
                float: right;
                margin-bottom: 10px;
            }
            .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-banner-hanging-bar {
            position: fixed;
            bottom: 0;
            top: auto;
            left: 0;
            right: 0;
            width: 52%;
            max-width: 100%;
            padding: 30px 3% 15px;
            margin: auto;
            margin-bottom: 50px;
            border-radius: 10px;
            border: 1px solid #E0DEDE;
            z-index: 9999999999999;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            background: #ffffff;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -moz-box;
            display: -moz-flex;
            display: flex;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-flex-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-flex-flow: row wrap;
            -moz-flex-flow: row wrap;
            -ms-flex-flow: row wrap;
            -webkit-box-align: justify;
            -moz-box-align: justify;
            -webkit-box-pack: justify;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            -ms-justify-content: space-between;
            justify-content: space-between;
            box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -webkit-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -moz-box-shadow: 0px -4px 19px rgba(0, 0, 0, 0.07);
            -webkit-animation: seers-cmp-slide-in-bottom 1s both;
            -moz-animation: seers-cmp-slide-in-bottom 1s both;
            -ms-animation: seers-cmp-slide-in-bottom 1s both;
            -o-animation: seers-cmp-slide-in-bottom 1s both;
            animation: seers-cmp-slide-in-bottom 1s both;
        }
        .seers-cmp-banner-bar.seers-cmp-top-hanging-bar .seers-cmp-cookie-policy-text {
            padding-right: 0px;
        }
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar.seers-cmp-top-hanging-bar {
            top: 0;
            bottom: auto;
            left: 0;
            right: 0;
            -webkit-animation: seers-cmp-slide-in-top-bar 1s both;
            -moz-animation: seers-cmp-slide-in-top-bar 1s both;
            -ms-animation: seers-cmp-slide-in-top-bar 1s both;
            -o-animation: seers-cmp-slide-in-top-bar 1s both;
            animation: 1s both;
            width: 95% !important;
            margin: auto;
            margin-top: 75px;
            border-radius: 10px;
            border: 1px solid #E0DEDE;
        }
        .seers-cmp-banner-bar.seers-cmp-banner-hanging-bar .seers-cmp-cookie-policy-text {
            padding-right: 0px;
        }
        .seers-cmp-banner-bar.seers-cmp-banner-preference-bar .seers-cmp-cookie-policy-text {
            padding-right: 0px;
        }
        .seers-cmp-banner-bar.seers-cmp-preference-bottom-hanging-bar .seers-cmp-cookie-policy-text {
            padding-right: 0px;
        }
        .seers-cmp-cookie-policy-switchers-customize-universal {
            top: 70px !important;
            right: 32px !important;
        }
        }
        
        .btn-flat, .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-default-banner-footer-block .seers-cmp-btn.btn-flat{border-radius: 0px !important; -webkit-border-radius: 0px !important;}
        .btn-round, .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-default-banner-footer-block .seers-cmp-btn.btn-round{border-radius: 20px !important; -webkit-border-radius: 20px !important;}
        .btn-stroke, .seers-cmp-cookie-policy-default-banner .seers-cmp-cookie-policy-default-banner-content .seers-cmp-cookie-policy-default-banner-footer .seers-cmp-cookie-policy-default-banner-footer-block .seers-cmp-btn.btn-stroke{background:#fff; border:1px solid #C2C2C2 !important; border-radius: 4x !important; -webkit-border-radius: 4px !important; color:#7E7E7E;}
        
        .seers-cmp-cookie-data-hol .seers-cmp-banner-bar-hide-noanimation {
            display:none;
        }
        
        .seers-cmp-banner-bar.seers-cmp-middle-bar.seers-cmp-banner-bar-hide {
            display: none;
        }
        
        .seers-cmp-cookie-data-hol .seers-cmp-top-bar.seers-cmp-banner-bar-hide {
            display: none;
        }
        .seers-cmp-cookie-data-hol .seers-cmp-top-left-bar.seers-cmp-banner-bar-hide {
            display: none !important;
        }
        .seers-cmp-cookie-data-hol .seers-cmp-top-right-bar.seers-cmp-banner-bar-hide {
            display: none !important;
        }
        .seers-cmp-cookie-data-hol .seers-cmp-top-hanging-bar.seers-cmp-banner-bar-hide {
            display: none;
        }
        .seers-cmp-cookie-data-hol .seers-cmp-preference-universal-bar.seers-cmp-banner-bar-hide {
            display: none;
        }
    </style>
</head>

<?php
$showbadge = get_option("SCCBPP_cookie_consent_show_badge");

?>

<body>
    <div class="seers-cmp-cookie-data-hol">
        <div class="seers-cmp-banner-bar <?php echo ((get_option('SCCBPP_cookie_consent_banner_position') != 'seers-cmp-banner-bar') ? get_option('SCCBPP_cookie_consent_banner_position') : "" );?> <?php echo "seers-cmp-banner-bar-hide seers-cmp-banner-bar-hide-noanimation";?>">
        <?php if ((get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-preference-universal-bar')): ?>
                <div class="seers-cms-header-universal-bar">
                <div class="seers-cmp-cookie-default-banner-logo"><img style="width:45px;" src="https://seers-application-assets.s3.amazonaws.com/images/logo/seersco-logo.png" alt="<?php echo __('seers logo', $this->textdomain); ?>"></div>
                <div class="seers-cmp-cookie-policy-powered-by-link-universal">
                <span style="width=200px" class="seers-cmp-cookie-policy-powered-by-text" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>"><?php echo __("powered by", $this->textdomain);?>&nbsp;<a href="https://seersco.com" target="_blank" class="seers-cmp-cookie-policy-powered-by-link" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>" tabindex="0"><svg xmlns="http://www.w3.org/2000/svg" width="602" height="185" viewBox="0 0 602 185" fill="none"><g clip-path="url(#clip0_10_64)"><path d="M106.155 84.4733C102.817 58.7682 80.6109 38.8655 53.7747 38.8655C40.7654 38.8655 28.4353 43.5209 18.9682 51.9543C17.0611 53.6416 15.2224 55.4629 13.5873 57.4196C13.1101 57.9584 12.6345 58.5665 12.1573 59.1731C6.97852 65.5143 3.57309 72.7346 2.14314 80.5599C1.80292 82.3738 2.38455 84.2383 3.69575 85.537L12.1573 93.9182L18.9682 100.664L56.673 138.011C61.8774 143.166 61.1015 152.142 53.7762 152.142C44.4444 152.142 36.5424 145.733 34.5001 137.097C33.8877 134.533 31.6387 132.643 28.9824 132.643C25.4402 132.643 22.6472 135.814 23.3963 139.187C26.5981 153.693 40.2214 164.42 56.159 163.273C65.5592 162.531 74.0052 157.201 79.5913 149.644C80.7269 148.092 80.557 145.944 79.1918 144.59L18.9682 84.8782C15.808 81.7481 14.4102 77.0795 16.4323 73.1177C17.1684 71.6754 18.0138 70.2653 18.9682 68.8874C19.8541 67.4033 20.9437 65.987 22.17 64.6368C30.0036 55.3274 41.5146 49.9961 53.7762 49.9961C74.4155 49.9961 91.5794 64.9062 94.7812 84.4718C95.19 86.6302 95.3936 88.9256 95.3936 91.2179V118.088C95.3936 119.588 95.9931 121.025 97.0586 122.081C100.606 125.595 106.633 123.082 106.633 118.088V91.2194C106.633 88.9256 106.496 86.6995 106.155 84.4733Z" fill="#3B6EF8"></path><path d="M88.5814 123.267L50.8512 85.8432C45.6225 80.6569 46.4089 71.6555 53.7734 71.6555C63.1053 71.6555 70.9388 78.1322 72.9812 86.7011C73.5936 89.3321 75.8426 91.221 78.4989 91.221C81.9727 91.221 84.8341 88.0497 84.0849 84.6766C80.6111 68.889 64.8087 57.5551 47.2345 61.1976C39.4693 62.7494 32.7937 67.5389 28.0936 73.8816C26.8035 75.6242 26.9893 78.0499 28.5298 79.5757L88.5799 139.055C91.7342 142.179 93.0819 146.841 91.0878 150.807C90.3411 152.293 89.5004 153.731 88.5799 155.112C87.6256 156.596 86.6044 158.013 85.4465 159.295C77.6129 168.538 66.1019 173.8 53.7734 173.8C33.2709 173.8 16.2422 159.159 12.7684 139.796C12.3596 137.637 12.156 135.343 12.156 133.049V105.842C12.156 104.342 11.5564 102.905 10.4908 101.849C6.94291 98.3358 0.916992 100.849 0.916992 105.842V133.051C0.916992 135.345 1.12214 137.571 1.39415 139.797C4.93634 165.3 27.0739 185 53.7749 185C69.442 185 84.1548 178.254 94.0307 166.514C96.2782 163.95 98.2537 161.116 99.8888 158.08C101.184 155.922 102.205 153.626 103.091 151.334C104.112 148.771 104.861 146.138 105.406 143.441C105.788 141.632 105.225 139.753 103.912 138.452L95.3923 130.014L88.5814 123.267Z" fill="#3B6EF8"></path><ellipse cx="54.1267" cy="112.107" rx="21.1429" ry="20.9262" fill="white"></ellipse><ellipse cx="54.1267" cy="112.107" rx="15.8571" ry="15.6946" fill="#3B6EF8"></ellipse><path fill-rule="evenodd" clip-rule="evenodd" d="M57.0284 112.824C58.2839 111.93 59.1014 110.472 59.1014 108.824C59.1014 106.105 56.8741 103.901 54.1266 103.901C51.3791 103.901 49.1519 106.105 49.1519 108.824C49.1519 110.472 49.9693 111.93 51.2245 112.824V119.463C51.2245 121.066 52.5238 122.365 54.1265 122.365C55.7292 122.365 57.0284 121.066 57.0284 119.463V112.824Z" fill="white"></path></g><path d="M19.9397 38.0882C17.1611 38.0882 14.8738 35.8255 15.247 33.0722C16.3653 24.822 20.2206 17.1059 26.2921 11.1558C33.5808 4.01287 43.4664 1.07174e-05 53.7742 0C64.082 -1.07174e-05 73.9676 4.01283 81.2563 11.1557C87.3279 17.1059 91.1831 24.822 92.3014 33.0721C92.6746 35.8254 90.3873 38.0882 87.6088 38.0882C84.8303 38.0882 82.6241 35.8174 82.1218 33.0847C81.0876 27.4572 78.3241 22.2273 74.1414 18.1283C68.7397 12.8347 61.4134 9.86071 53.7742 9.86071C46.135 9.86072 38.8087 12.8347 33.407 18.1284C29.2243 22.2274 26.4609 27.4573 25.4266 33.0847C24.9244 35.8175 22.7182 38.0882 19.9397 38.0882Z" fill="#888585"></path><path d="M178.781 166.112C187.809 166.112 194.613 164.09 199.194 160.048C203.909 155.872 206.267 150.55 206.267 144.083C206.267 138.558 204.448 133.977 200.81 130.34C197.307 126.702 191.716 123.805 184.036 121.649L166.453 116.395C160.794 114.643 155.877 112.42 151.7 109.725C147.523 106.896 144.289 103.46 141.999 99.4182C139.843 95.2415 138.765 90.391 138.765 84.867C138.765 74.4924 142.538 66.4084 150.083 60.6149C157.628 54.6866 167.666 51.7224 180.196 51.7224C187.472 51.7224 193.939 52.5308 199.598 54.1476C205.391 55.6297 209.905 57.5833 213.138 60.0085C216.507 62.4338 218.191 64.9937 218.191 67.6884C218.191 69.4399 217.719 71.0567 216.776 72.5388C215.833 73.8861 214.621 74.964 213.138 75.7724C209.77 73.0777 205.189 70.7199 199.396 68.6989C193.737 66.6779 187.539 65.6674 180.802 65.6674C172.988 65.6674 166.79 67.4189 162.209 70.922C157.628 74.2903 155.338 78.9387 155.338 84.867C155.338 89.5826 156.954 93.4226 160.188 96.3867C163.556 99.3509 168.946 101.911 176.356 104.067L188.684 107.704C199.328 110.669 207.682 114.98 213.745 120.639C219.943 126.298 223.041 134.112 223.041 144.083C223.041 154.726 219.134 163.349 211.32 169.951C203.64 176.553 192.794 179.854 178.781 179.854C170.563 179.854 163.354 178.979 157.157 177.227C151.094 175.341 146.31 173.05 142.807 170.356C139.439 167.526 137.755 164.764 137.755 162.069C137.755 159.779 138.429 157.893 139.776 156.411C141.258 154.794 142.942 153.649 144.828 152.975C147.927 155.939 152.306 158.903 157.965 161.867C163.624 164.697 170.563 166.112 178.781 166.112Z" fill="#121212"></path><path d="M254.437 140.849L253.628 128.117L314.663 119.83C314.124 112.42 311.564 106.357 306.983 101.641C302.402 96.7909 296.069 94.3657 287.985 94.3657C279.632 94.3657 272.693 97.3972 267.169 103.46C261.78 109.389 259.085 117.944 259.085 129.127V133.573C260.028 144.352 263.531 152.571 269.594 158.23C275.792 163.754 284.213 166.516 294.857 166.516C300.516 166.516 305.635 165.573 310.216 163.686C314.797 161.8 318.435 159.779 321.13 157.623C322.612 158.566 323.757 159.712 324.566 161.059C325.509 162.272 325.98 163.686 325.98 165.303C325.98 167.863 324.498 170.288 321.534 172.579C318.705 174.734 314.865 176.486 310.014 177.833C305.299 179.181 299.977 179.854 294.048 179.854C283.674 179.854 274.647 177.968 266.967 174.196C259.422 170.423 253.561 164.832 249.384 157.421C245.342 149.876 243.321 140.714 243.321 129.935C243.321 122.256 244.399 115.452 246.555 109.523C248.845 103.46 251.944 98.3404 255.851 94.1636C259.893 89.9868 264.676 86.8206 270.2 84.6649C275.725 82.3744 281.72 81.2291 288.187 81.2291C296.406 81.2291 303.614 82.9807 309.812 86.4838C316.145 89.9869 321.062 94.9046 324.566 101.237C328.203 107.435 330.022 114.576 330.022 122.66C330.022 125.624 329.349 127.78 328.001 129.127C326.654 130.34 324.768 131.081 322.342 131.35L254.437 140.849Z" fill="#121212"></path><path d="M359.237 140.849L358.428 128.117L419.463 119.83C418.924 112.42 416.364 106.357 411.783 101.641C407.202 96.7909 400.87 94.3657 392.786 94.3657C384.432 94.3657 377.493 97.3972 371.969 103.46C366.58 109.389 363.885 117.944 363.885 129.127V133.573C364.828 144.352 368.331 152.571 374.394 158.23C380.592 163.754 389.013 166.516 399.657 166.516C405.316 166.516 410.436 165.573 415.017 163.686C419.598 161.8 423.235 159.779 425.93 157.623C427.412 158.566 428.557 159.712 429.366 161.059C430.309 162.272 430.781 163.686 430.781 165.303C430.781 167.863 429.298 170.288 426.334 172.579C423.505 174.734 419.665 176.486 414.815 177.833C410.099 179.181 404.777 179.854 398.849 179.854C388.474 179.854 379.447 177.968 371.767 174.196C364.222 170.423 358.361 164.832 354.184 157.421C350.142 149.876 348.121 140.714 348.121 129.935C348.121 122.256 349.199 115.452 351.355 109.523C353.645 103.46 356.744 98.3404 360.652 94.1636C364.694 89.9868 369.477 86.8206 375.001 84.6649C380.525 82.3744 386.52 81.2291 392.988 81.2291C401.206 81.2291 408.415 82.9807 414.612 86.4838C420.945 89.9869 425.863 94.9046 429.366 101.237C433.004 107.435 434.823 114.576 434.823 122.66C434.823 125.624 434.149 127.78 432.802 129.127C431.454 130.34 429.568 131.081 427.143 131.35L359.237 140.849Z" fill="#121212"></path><path d="M474.344 101.237V133.169H458.176V102.45C458.176 99.3509 458.715 96.9257 459.793 95.1741C461.006 93.2878 462.959 91.4689 465.654 89.7174C469.157 87.4269 473.94 85.4733 480.003 83.8564C486.066 82.1049 492.803 81.2291 500.213 81.2291C510.992 81.2291 516.381 83.9238 516.381 89.3132C516.381 90.6605 516.179 91.9405 515.775 93.1531C515.371 94.231 514.832 95.1741 514.158 95.9825C512.811 95.713 511.059 95.4436 508.904 95.1741C506.748 94.9046 504.592 94.7699 502.436 94.7699C496.239 94.7699 490.782 95.4436 486.066 96.7909C481.351 98.0035 477.443 99.4856 474.344 101.237ZM458.176 123.872L474.344 126.298V176.823C473.671 177.092 472.66 177.362 471.313 177.631C469.965 178.035 468.483 178.238 466.867 178.238C464.037 178.238 461.881 177.699 460.399 176.621C458.917 175.408 458.176 173.522 458.176 170.962V123.872Z" fill="#121212"></path><path d="M601.231 152.369C601.231 160.992 598.064 167.728 591.732 172.579C585.399 177.429 576.237 179.854 564.246 179.854C554.006 179.854 545.653 178.305 539.186 175.206C532.718 171.972 529.485 168.469 529.485 164.697C529.485 163.08 529.889 161.531 530.697 160.048C531.64 158.432 532.988 157.152 534.739 156.209C538.377 158.769 542.621 161.126 547.472 163.282C552.322 165.438 557.846 166.516 564.044 166.516C578.056 166.516 585.062 161.8 585.062 152.369C585.062 148.461 583.85 145.295 581.425 142.87C579.134 140.31 575.698 138.491 571.118 137.413L554.343 132.967C546.124 130.946 540.129 127.847 536.356 123.67C532.584 119.359 530.697 114.037 530.697 107.704C530.697 100.563 533.594 94.3657 539.388 89.1111C545.181 83.8565 554.006 81.2291 565.863 81.2291C572.195 81.2291 577.719 81.9028 582.435 83.2501C587.151 84.4628 590.789 86.1469 593.349 88.3027C596.043 90.3237 597.391 92.5468 597.391 94.972C597.391 96.7235 596.919 98.273 595.976 99.6203C595.168 100.968 594.022 101.978 592.54 102.652C590.923 101.574 588.835 100.429 586.275 99.2161C583.85 97.8688 580.953 96.7909 577.585 95.9825C574.216 95.0394 570.511 94.5678 566.469 94.5678C560.541 94.5678 555.758 95.713 552.12 98.0035C548.482 100.294 546.663 103.528 546.663 107.704C546.663 110.669 547.674 113.296 549.695 115.586C551.851 117.742 555.219 119.359 559.8 120.437L573.745 123.872C582.907 126.028 589.778 129.464 594.359 134.18C598.94 138.761 601.231 144.824 601.231 152.369Z" fill="#121212"></path><defs><clipPath id="clip0_10_64"><rect width="105.714" height="146.134" fill="white" transform="translate(0.916992 38.8655)"></rect></clipPath></defs></svg></a></span> 
                </div>
                </div>
                <?php endif; ?>
                <?php if ((get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-preference-universal-bar')): ?>
            <div class="seers-cmp-cookie-policy-data">
                <div class="seers-cmp-cookie-policy-hol">
                    <div class="seers-cms-universal-content-section">
                <div class="seers-cms-tabs-universal-bar">
                    <div class="seers-cmp-consent-tab active">Consents</div>
                    <div class="seers-cmp-detail-tab">Details</div>
                    <div class="seers-cmp-policy-tab">Policy</div>
                </div>
                <div class="seers-cms-pages-universal-bar">
                    <div class="seers-cmp-consent-pages"><p class="seers-cmp-policy-desc" style="padding: 0px 20px !important;" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>"> <?php if(get_option('SCCBPP_cookie_consent_body_text') && get_option('SCCBPP_cookie_consent_body_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_body_text'), $this->textdomain); }else{ esc_html_e( "We use cookies to ensure you get the best experience", $this->textdomain);} ?> </p>
                    <div class="seers-cmp-cookie-policy-universal-choices" style="border-top: 1px solid #d6d6d6; border-bottom: 1px solid #d6d6d6;">
                    <label class="seers-cmp-cookie-policy-accordion-tab-label-universal" for="seers-cmpAccordiannecessary" style="border-right: 1px solid #d6d6d6;">
                                    <?php echo __("Necessary", $this->textdomain); ?>
                                    <div class="seers-cmp-cookie-policy-switchers-first-preference seers-cmp-cookie-policy-switchers-customize-universal " >
                                        <input id="seers-cmp-cookie-policy-necessary-switch" class="seers-cmp-cookie-policy-banner-switch" type="checkbox" checked disabled>
                                        <label for="seers-cmp-cookie-policy-necessary-switch"></label>
                                    </div>
                                </label>

                                    <label class="seers-cmp-cookie-policy-accordion-tab-label-universal" for="seers-cmpAccordianPreference" style="border-right: 1px solid #d6d6d6;"><?php echo __("Preferences", $this->textdomain); ?>
                                        <div class="seers-cmp-cookie-policy-switchers-first-preference seers-cmp-cookie-policy-switchers-customize-universal" >
                                            <input id="seers-cmp-cookie-policy-preference-switch1" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                            <label for="seers-cmp-cookie-policy-preference-switch1"></label>
                                        </div>
                                    </label>
                                    <label class="seers-cmp-cookie-policy-accordion-tab-label-universal" for="seers-cmpAccordianstatistic" style="border-right: 1px solid #d6d6d6;"><?php echo __("Statistics", $this->textdomain); ?>
                                        <div class="seers-cmp-cookie-policy-switchers-first-preference seers-cmp-cookie-policy-switchers-customize-universal" >
                                            <input id="seers-cmp-cookie-policy-statistic-switch1" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                            <label for="seers-cmp-cookie-policy-statistic-switch1"></label>
                                        </div>
                                    </label>
                                    <label class="seers-cmp-cookie-policy-accordion-tab-label-universal" for="seers-cmpAccordianmarketing"><?php echo __("Marketing", $this->textdomain); ?>
                                        <div class="seers-cmp-cookie-policy-switchers-first-preference seers-cmp-cookie-policy-switchers-customize-universal" >
                                            <input id="seers-cmp-cookie-policy-marketing-switch1" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                            <label for="seers-cmp-cookie-policy-marketing-switch1"></label>
                                        </div>
                                    </label>
                                </div>
                </div>
                    <div class="seers-cmp-detail-pages" style="display:none; padding: 0px 16px 15px; max-height: 335px; overflow: auto;">
                    <div class="seers-cmp-cookie-policy-accordion-tabs" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>">
                            <div class="seers-cmp-cookie-policy-accordion-tab-universal  seers-cms-universal-detail-tab-content" style="margin-top:0px !important;">
                                <input class="seers-cmp-cookie-policy-accordion-check" type="checkbox" id="seers-cmpAccordiannecessary" name="seers-cmpAccordiannecessary">
                                <label class="seers-cmp-cookie-policy-accordion-tab-universal-label seers-cms-universal-detail-categories" for="seers-cmpAccordiannecessary"><?php echo __("Necessary", $this->textdomain);?> <span class="seers-cmp-cookie-policy-always-active-universal"><?php echo __("Always Active", $this->textdomain);?></span>
                            </label>
                                <div class="seers-cmp-cookie-policy-accordion-tab-universal-content">
                                    <p class="seers-cmp-cookie-policy-accordion-tab-content-text seers-cms-universal-detail-categories-detail"><?php echo __("Necessary cookies help make a website usable by enabling basic functions like page navigation and access to secure areas of the website. The website cannot function properly without these cookies.", $this->textdomain); ?></p> <?php /*hide for now it will shown in next version*/ if (false) { ?><a class="seers-cmp-cookie-policy-detail-btn"><?php echo __("Cookies Detail", $this->textdomain);?></a><?php } ?> </div>
                            </div>
                            <div class="seers-cmp-cookie-policy-accordion-tab-universal seers-top-border-none   seers-cms-universal-detail-tab-content">
                                <input class="seers-cmp-cookie-policy-accordion-check" type="checkbox" id="seers-cmpAccordianPreference" name="seers-cmpAccordianPreference">
                                <label class="seers-cmp-cookie-policy-accordion-tab-universal-label seers-cms-universal-detail-categories" for="seers-cmpAccordianPreference"><?php echo __("Preferences", $this->textdomain);?>
                                    <div class="seers-cmp-cookie-policy-switchers-universal">
                                        <input id="seers-cmp-cookie-policy-preference-switch" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                        <label for="seers-cmp-cookie-policy-preference-switch" /> </div>
                                </label>
                                <div class="seers-cmp-cookie-policy-accordion-tab-universal-content">
                                    <p class="seers-cmp-cookie-policy-accordion-tab-content-text seers-cms-universal-detail-categories-detail"><?php echo __("Preference cookies enable a website to remember information that changes the way the website behaves or looks, like your preferred language or the region that you are in.", $this->textdomain);?></p> <?php /*hide for now it will shown in next version*/ if (false) { ?><a class="seers-cmp-cookie-policy-detail-btn"><?php echo __("Cookies Detail", $this->textdomain);?></a><?php } ?> </div>
                            </div>
                            <div class="seers-cmp-cookie-policy-accordion-tab-universal seers-top-border-none  seers-cms-universal-detail-tab-content">
                                <input class="seers-cmp-cookie-policy-accordion-check" type="checkbox" id="seers-cmpAccordianstatistic" name="seers-cmpAccordianstatistic">
                                <label class="seers-cmp-cookie-policy-accordion-tab-universal-label seers-cms-universal-detail-categories" for="seers-cmpAccordianstatistic"><?php echo __("Statistics", $this->textdomain);?>
                                    <div class="seers-cmp-cookie-policy-switchers-universal">
                                        <input id="seers-cmp-cookie-policy-statistic-switch" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                        <label for="seers-cmp-cookie-policy-statistic-switch" /> </div>
                                </label>
                                <div class="seers-cmp-cookie-policy-accordion-tab-universal-content">
                                    <p class="seers-cmp-cookie-policy-accordion-tab-content-text seers-cms-universal-detail-categories-detail"><?php echo __("Statistic cookies help website owners to understand how visitors interact with websites by collecting and reporting information anonymously.", $this->textdomain);?></p> <?php /*hide for now it will shown in next version*/ if (false) { ?><a class="seers-cmp-cookie-policy-detail-btn"><?php echo __("Cookies Detail", $this->textdomain);?></a><?php } ?> </div>
                            </div>
                            <div class="seers-cmp-cookie-policy-accordion-tab-universal seers-top-border-none  seers-cms-universal-detail-tab-content">
                                <input class="seers-cmp-cookie-policy-accordion-check" type="checkbox" id="seers-cmpAccordianmarketing" name="seers-cmpAccordianmarketing">
                                <label class="seers-cmp-cookie-policy-accordion-tab-universal-label seers-cms-universal-detail-categories" for="seers-cmpAccordianmarketing"><?php echo __("Marketing", $this->textdomain);?>
                                    <div class="seers-cmp-cookie-policy-switchers-universal">
                                        <input id="seers-cmp-cookie-policy-marketing-switch" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                        <label for="seers-cmp-cookie-policy-marketing-switch" /> </div>
                                </label>
                                <div class="seers-cmp-cookie-policy-accordion-tab-universal-content">
                                    <p class="seers-cmp-cookie-policy-accordion-tab-content-text seers-cms-universal-detail-categories-detail"><?php echo __("Marketing cookies are used to track visitors across websites. The intention is to display ads that are relevant and engaging for the individual user and thereby more valuable for publishers and third-party advertisers.", $this->textdomain);?></p> <?php /*hide for now it will shown in next version*/ if (false) { ?><a class="seers-cmp-cookie-policy-detail-btn"><?php echo __("Cookies Detail", $this->textdomain);?></a><?php } ?> </div>
                            </div>
                            <div class="seers-cmp-cookie-policy-accordion-tab-universal seers-top-border-none  seers-cms-universal-detail-tab-content">
                                <input class="seers-cmp-cookie-policy-accordion-check" type="checkbox" id="seers-cmpAccordianunclassified" name="seers-cmpAccordianunclassified">
                                <label class="seers-cmp-cookie-policy-accordion-tab-universal-label  seers-cms-universal-detail-categories" for="seers-cmpAccordianunclassified"><?php echo __("Unclassified", $this->textdomain);?>
                                    <div class="seers-cmp-cookie-policy-switchers-universal"> </div>
                                </label>
                                <div class="seers-cmp-cookie-policy-accordion-tab-universal-content">
                                    <p class="seers-cmp-cookie-policy-accordion-tab-content-text  seers-cms-universal-detail-categories-detail"><?php echo __("Unclassified cookies are cookies that we are in the process of classifying, together with the providers of individual cookies.", $this->textdomain);?></p> <?php /*hide for now it will shown in next version*/ if (false) { ?><a class="seers-cmp-cookie-policy-detail-btn"><?php echo __("Cookies Detail", $this->textdomain);?></a><?php } ?> </div>
                            </div>
                            </div>
                    </div>
                    <div class="seers-cmp-policy-pages" style="display:none;"><p class="seers-cmp-policy-desc" style="padding: 0px 20px !important;" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>"> <?php esc_html_e( "Cookies are small text files that can be used by websites to make the experience of the user more efficient. The law states that we can store cookies on your device if they are strictly necessary for the operation of this site. For all other types of cookies, we need your permission. This site uses different types of cookies. Some cookies are placed by third party services that appear on our pages. You can at any time, change or withdraw your consent from the Cookie Declaration on our website. Learn more about who we are, how you can contact us, and how we process personal data in our Privacy Policy?", $this->textdomain); ?> </p>
                    <?php if(get_option('SCCBPP_cookie_consent_enable_policy') && get_option('SCCBPP_cookie_consent_enable_policy')=='true' ||  get_option('SCCBPP_cookie_consent_enable_policy')=== true){?><a class="seers-cmp-policy-desc" style="margin-left: 20px; border-bottom: 1px solid #000; padding-top:15px;" href="<?php if(get_option('SCCBPP_cookie_consent_policy_declaration_url') && get_option('SCCBPP_cookie_consent_policy_declaration_url')!=''){ if (filter_var(get_option('SCCBPP_cookie_consent_policy_declaration_url'), FILTER_VALIDATE_URL)) {esc_html_e(get_option('SCCBPP_cookie_consent_policy_declaration_url'));} else {echo "#";} }else{ echo "#"; } ?>" target="_blank" class="seers-cmp-policy-banner-read-cookie"><?php echo __("Read Cookie Policy", $this->textdomain);?>&nbsp;<svg style="width: 12px;" fill="#0061fe"  viewBox="0 0 32 40" x="0px" y="0px"><path d="M32 0l-8 1 2.438 2.438-9.5 9.5-1.063 1.063 2.125 2.125 1.063-1.063 9.5-9.5 2.438 2.438 1-8zm-30 3c-.483 0-1.047.172-1.438.563-.391.391-.563.954-.563 1.438v25c0 .483.172 1.047.563 1.438.391.391.954.563 1.438.563h25c.483 0 1.047-.172 1.438-.563.391-.391.563-.954.563-1.438v-15h-3v14h-23v-23h15v-3h-16z"></path></svg>

                        </a><?php } ?>
                    <div class="seers-cmp-cookie-policy-universal-choices" style="border-top: 1px solid #d6d6d6; border-bottom: 1px solid #d6d6d6;">
                    <label class="seers-cmp-cookie-policy-accordion-tab-label-universal" for="seers-cmpAccordiannecessary" style="border-right: 1px solid #d6d6d6;">
                                    <?php echo __("Necessary", $this->textdomain); ?>
                                    <div class="seers-cmp-cookie-policy-switchers-first-preference seers-cmp-cookie-policy-switchers-customize-universal" >
                                        <input id="seers-cmp-cookie-policy-necessary-switch" class="seers-cmp-cookie-policy-banner-switch" type="checkbox" checked disabled>
                                        <label for="seers-cmp-cookie-policy-necessary-switch"></label>
                                    </div>
                                </label>

                                    <label class="seers-cmp-cookie-policy-accordion-tab-label-universal" for="seers-cmpAccordianPreference" style="border-right: 1px solid #d6d6d6;"><?php echo __("Preferences", $this->textdomain); ?>
                                        <div class="seers-cmp-cookie-policy-switchers-first-preference seers-cmp-cookie-policy-switchers-customize-universal" >
                                            <input id="seers-cmp-cookie-policy-preference-switch2" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                            <label for="seers-cmp-cookie-policy-preference-switch2"></label>
                                        </div>
                                    </label>
                                    <label class="seers-cmp-cookie-policy-accordion-tab-label-universal" for="seers-cmpAccordianstatistic" style="border-right: 1px solid #d6d6d6;"><?php echo __("Statistics", $this->textdomain); ?>
                                        <div class="seers-cmp-cookie-policy-switchers-first-preference seers-cmp-cookie-policy-switchers-customize-universal" >
                                            <input id="seers-cmp-cookie-policy-statistic-switch2" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                            <label for="seers-cmp-cookie-policy-statistic-switch2"></label>
                                        </div>
                                    </label>
                                    <label class="seers-cmp-cookie-policy-accordion-tab-label-universal" for="seers-cmpAccordianmarketing"><?php echo __("Marketing", $this->textdomain); ?>
                                        <div class="seers-cmp-cookie-policy-switchers-first-preference seers-cmp-cookie-policy-switchers-customize-universal" >
                                            <input id="seers-cmp-cookie-policy-marketing-switch2" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                            <label for="seers-cmp-cookie-policy-marketing-switch2"></label>
                                        </div>
                                    </label>
                                </div>
                </div>
                </div>
                    </div>
                <?php endif; ?>
                
                    <div class="seers-cmp-cookie-policy-text">
                    <?php if ((get_option('SCCBPP_cookie_consent_banner_position') !== 'seers-cmp-preference-universal-bar')): ?>
                        <p class="seers-cmp-policy-desc" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>"> <?php if(get_option('SCCBPP_cookie_consent_body_text') && get_option('SCCBPP_cookie_consent_body_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_body_text'), $this->textdomain); }else{ esc_html_e( "We use cookies to ensure you get the best experience", $this->textdomain);} ?> </p>
                        <?php endif; ?>
                        <?php
                            if ((get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-banner-preference-bar') || (get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-preference-bottom-hanging-bar')): ?>
                                <div class="seers-cmp-cookie-policy-first-preference">
                                    <label class="seers-cmp-cookie-policy-accordion-tab-label-first-preference" for="seers-cmpAccordiannecessary"><?php echo __("Necessary", $this->textdomain); ?>
                                        <div class="seers-cmp-cookie-policy-switchers-first-preference">
                                            <input id="seers-cmp-cookie-policy-necessary-switch" class="seers-cmp-cookie-policy-banner-switch" type="checkbox" checked disabled>
                                            <label for="seers-cmp-cookie-policy-necessary-switch"></label>
                                        </div>
                                    </label>
                                    <label class="seers-cmp-cookie-policy-accordion-tab-label-first-preference" for="seers-cmpAccordianPreference"><?php echo __("Preferences", $this->textdomain); ?>
                                        <div class="seers-cmp-cookie-policy-switchers-first-preference">
                                            <input id="seers-cmp-cookie-policy-preference-switch1" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                            <label for="seers-cmp-cookie-policy-preference-switch1"></label>
                                        </div>
                                    </label>
                                    <label class="seers-cmp-cookie-policy-accordion-tab-label-first-preference" for="seers-cmpAccordianstatistic"><?php echo __("Statistics", $this->textdomain); ?>
                                        <div class="seers-cmp-cookie-policy-switchers-first-preference">
                                            <input id="seers-cmp-cookie-policy-statistic-switch1" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                            <label for="seers-cmp-cookie-policy-statistic-switch1"></label>
                                        </div>
                                    </label>
                                    <label class="seers-cmp-cookie-policy-accordion-tab-label-first-preference" for="seers-cmpAccordianmarketing"><?php echo __("Marketing", $this->textdomain); ?>
                                        <div class="seers-cmp-cookie-policy-switchers-first-preference">
                                            <input id="seers-cmp-cookie-policy-marketing-switch1" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                            <label for="seers-cmp-cookie-policy-marketing-switch1"></label>
                                        </div>
                                    </label>
                                    <div class="seers-cmp-show-details" data-v-15ba1144=""><a  id="seers-cmp-default-banner-opener" style="color: rgb(59, 110, 248) !important;background:transparent !important; cursor: pointer; font-size: 14px;">Show details</a></div>
                                </div>
                            <?php endif; ?>

                    </div>
                    <div class="seers-cmp-cookie-policy-btn-hol <?php echo (get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-top-hanging-bar') || (get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-banner-hanging-bar') || (get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-preference-bottom-hanging-bar') ? 'seers-cmp-cookie-policy-hanging-btn-hol' : ''; ?>"> <a href="#" class="seers-cmp-preference-btn <?php if (get_option('SCCBPP_cookie_consent_button_type')) { if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_flat') { echo "btn-flat"; } else if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_rounded') { echo "btn-round"; } else if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_stroke') { echo "btn-stroke"; } }?>" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>" tabindex="0" id="<?php echo (get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-banner-preference-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-preference-bottom-hanging-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-preference-universal-bar') ? 'savemychoice1' : 'seers-cmp-default-banner-opener'; ?>"
                    > <?php
                            if (get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-banner-preference-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-preference-bottom-hanging-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-preference-universal-bar') {
                                echo __("Save my choices", $this->textdomain);
                            } else {
                                if (get_option('SCCBPP_cookie_consent_setting_btn_text') && get_option('SCCBPP_cookie_consent_setting_btn_text') != '') {
                                    esc_html_e(get_option('SCCBPP_cookie_consent_setting_btn_text'), $this->textdomain);
                                } else {
                                    echo __("Preference", $this->textdomain);
                                }
                            }
                            ?>
                            </a>  <a href="#" class="seers-cmp-btn <?php if (get_option('SCCBPP_cookie_consent_button_type')) { if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_flat') { echo "btn-flat"; } else if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_rounded') { echo "btn-round"; } else if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_stroke') { echo "btn-stroke"; } }?>" id="seers-idisagree" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>" tabindex="0"> <?php if(get_option('SCCBPP_cookie_consent_reject_btn_text') && get_option('SCCBPP_cookie_consent_reject_btn_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_reject_btn_text'), $this->textdomain); }else{ echo __("Disable All", $this->textdomain); }?> </a><a href="#" class="seers-cmp-btn <?php if (get_option('SCCBPP_cookie_consent_button_type')) { if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_flat') { echo "btn-flat"; } else if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_rounded') { echo "btn-round"; } else if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_stroke') { echo "btn-stroke"; } }?>" id="seers-iagree" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>" tabindex="0"> <?php if(get_option('SCCBPP_cookie_consent_accept_btn_text') && get_option('SCCBPP_cookie_consent_accept_btn_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_accept_btn_text'), $this->textdomain); }else{ echo __("Allow All", $this->textdomain); }?> </a> </div>
                </div>
            </div>
        </div>
        <!-- The seers-cmp-default-banner -->
        <div id="seers-cmp-default-cookie-banner" class="seers-cmp-cookie-policy-default-banner" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>">
            <div id="seers-cmp-overlay" class="seers-cmp-overlay"></div>
            <!-- seers-cmp-default-banner content -->
            <!--<div class="seers-cmp-cookie-policy-default-banner-content" id="seers-cmp-cookie-policy-default-banner-content"> <span class="seers-cmp-default-banner-close" title="close">&times;</span>-->
            <div class="seers-cmp-cookie-policy-default-banner-content" id="seers-cmp-cookie-policy-default-banner-content"> 
                <div class="seers-cmp-cookie-policy-default-banner-header">
                    <div class="seers-cmp-cookie-default-banner-logo"><img src="https://seers-application-assets.s3.amazonaws.com/images/logo/seersco-logo.png" alt="<?php echo __('seers logo', $this->textdomain); ?>"></div>
                    <span class="seers-cmp-default-banner-close" title="close" id="SeersCMPBannerSettingCloseButton">×</span>
                </div>
                <div class="seers-cmp-cookie-policy-default-banner-body-text">
                    <h3 class="seers-cmp-policy-banner-title">
                    <?php echo __("About Cookies", $this->textdomain); ?>
                </h3>
                    <div class="seers-cmp-policy-banner-text-large-block">
                        <p class="seers-cmp-policy-banner-text"> <?php if(get_option('SCCBPP_cookie_consent_body_text') && get_option('SCCBPP_cookie_consent_body_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_body_text')); }else{ esc_html_e( "We use cookies to ensure you get the best experience", $this->textdomain);} ?> </p> 
                            <?php if(get_option('SCCBPP_cookie_consent_enable_policy') && get_option('SCCBPP_cookie_consent_enable_policy')=='true' ||  get_option('SCCBPP_cookie_consent_enable_policy')=== true){?><a href="<?php if(get_option('SCCBPP_cookie_consent_policy_declaration_url') && get_option('SCCBPP_cookie_consent_policy_declaration_url')!=''){ if (filter_var(get_option('SCCBPP_cookie_consent_policy_declaration_url'), FILTER_VALIDATE_URL)) {esc_html_e(get_option('SCCBPP_cookie_consent_policy_declaration_url'));} else {echo "#";} }else{ echo "#"; } ?>" target="_blank" class="seers-cmp-policy-banner-read-cookie"><?php echo __("Read Cookie Policy", $this->textdomain);?>&nbsp;<svg  viewBox="0 0 32 40" x="0px" y="0px"><path d="M32 0l-8 1 2.438 2.438-9.5 9.5-1.063 1.063 2.125 2.125 1.063-1.063 9.5-9.5 2.438 2.438 1-8zm-30 3c-.483 0-1.047.172-1.438.563-.391.391-.563.954-.563 1.438v25c0 .483.172 1.047.563 1.438.391.391.954.563 1.438.563h25c.483 0 1.047-.172 1.438-.563.391-.391.563-.954.563-1.438v-15h-3v14h-23v-23h15v-3h-16z"></path></svg>

                        </a><?php } ?>
                        
                            <div class="seers-cmp-policy-banner-text-links">
                                <a href="javascript:void(0);" class="seers-cmp-btn <?php if (get_option('SCCBPP_cookie_consent_button_type')) { if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_flat') { echo "btn-flat"; } else if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_rounded') { echo "btn-round"; } else if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_stroke') { echo "btn-stroke"; } }?>" id="seers_allow_all"> <?php echo __("Allow All", $this->textdomain);?> </a>
                                <a href="javascript:void(0);" class="seers-cmp-btn <?php if (get_option('SCCBPP_cookie_consent_button_type')) { if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_flat') { echo "btn-flat"; } else if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_rounded') { echo "btn-round"; } else if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_stroke') { echo "btn-stroke"; } }?>" id="seers_disable_all"> <?php echo __("Disable All", $this->textdomain);?> </a>
                            </div>

                        <div class="seers-cmp-cookie-policy-accordion-tabs" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>">
                            <div class="seers-cmp-cookie-policy-accordion-tab">
                                <input class="seers-cmp-cookie-policy-accordion-check" type="checkbox" id="seers-cmpAccordiannecessary" name="seers-cmpAccordiannecessary">
                                <label class="seers-cmp-cookie-policy-accordion-tab-label" for="seers-cmpAccordiannecessary"><?php echo __("Necessary", $this->textdomain);?> <span class="seers-cmp-cookie-policy-always-active"><?php echo __("Always Active", $this->textdomain);?></span>
                            </label>
                                <div class="seers-cmp-cookie-policy-accordion-tab-content">
                                    <p class="seers-cmp-cookie-policy-accordion-tab-content-text"><?php echo __("Necessary cookies help make a website usable by enabling basic functions like page navigation and access to secure areas of the website. The website cannot function properly without these cookies.", $this->textdomain); ?></p> <?php /*hide for now it will shown in next version*/ if (false) { ?><a class="seers-cmp-cookie-policy-detail-btn"><?php echo __("Cookies Detail", $this->textdomain);?></a><?php } ?> </div>
                            </div>
                            <div class="seers-cmp-cookie-policy-accordion-tab seers-top-border-none">
                                <input class="seers-cmp-cookie-policy-accordion-check" type="checkbox" id="seers-cmpAccordianPreference" name="seers-cmpAccordianPreference">
                                <label class="seers-cmp-cookie-policy-accordion-tab-label" for="seers-cmpAccordianPreference"><?php echo __("Preferences", $this->textdomain);?>
                                    <div class="seers-cmp-cookie-policy-switchers">
                                        <input id="seers-cmp-cookie-policy-preference-switch" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                        <label for="seers-cmp-cookie-policy-preference-switch" /> </div>
                                </label>
                                <div class="seers-cmp-cookie-policy-accordion-tab-content">
                                    <p class="seers-cmp-cookie-policy-accordion-tab-content-text"><?php echo __("Preference cookies enable a website to remember information that changes the way the website behaves or looks, like your preferred language or the region that you are in.", $this->textdomain);?></p> <?php /*hide for now it will shown in next version*/ if (false) { ?><a class="seers-cmp-cookie-policy-detail-btn"><?php echo __("Cookies Detail", $this->textdomain);?></a><?php } ?> </div>
                            </div>
                            <div class="seers-cmp-cookie-policy-accordion-tab seers-top-border-none">
                                <input class="seers-cmp-cookie-policy-accordion-check" type="checkbox" id="seers-cmpAccordianstatistic" name="seers-cmpAccordianstatistic">
                                <label class="seers-cmp-cookie-policy-accordion-tab-label" for="seers-cmpAccordianstatistic"><?php echo __("Statistics", $this->textdomain);?>
                                    <div class="seers-cmp-cookie-policy-switchers">
                                        <input id="seers-cmp-cookie-policy-statistic-switch" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                        <label for="seers-cmp-cookie-policy-statistic-switch" /> </div>
                                </label>
                                <div class="seers-cmp-cookie-policy-accordion-tab-content">
                                    <p class="seers-cmp-cookie-policy-accordion-tab-content-text"><?php echo __("Statistic cookies help website owners to understand how visitors interact with websites by collecting and reporting information anonymously.", $this->textdomain);?></p> <?php /*hide for now it will shown in next version*/ if (false) { ?><a class="seers-cmp-cookie-policy-detail-btn"><?php echo __("Cookies Detail", $this->textdomain);?></a><?php } ?> </div>
                            </div>
                            <div class="seers-cmp-cookie-policy-accordion-tab seers-top-border-none">
                                <input class="seers-cmp-cookie-policy-accordion-check" type="checkbox" id="seers-cmpAccordianmarketing" name="seers-cmpAccordianmarketing">
                                <label class="seers-cmp-cookie-policy-accordion-tab-label" for="seers-cmpAccordianmarketing"><?php echo __("Marketing", $this->textdomain);?>
                                    <div class="seers-cmp-cookie-policy-switchers">
                                        <input id="seers-cmp-cookie-policy-marketing-switch" class="seers-cmp-cookie-policy-banner-switch" type="checkbox">
                                        <label for="seers-cmp-cookie-policy-marketing-switch" /> </div>
                                </label>
                                <div class="seers-cmp-cookie-policy-accordion-tab-content">
                                    <p class="seers-cmp-cookie-policy-accordion-tab-content-text"><?php echo __("Marketing cookies are used to track visitors across websites. The intention is to display ads that are relevant and engaging for the individual user and thereby more valuable for publishers and third-party advertisers.", $this->textdomain);?></p> <?php /*hide for now it will shown in next version*/ if (false) { ?><a class="seers-cmp-cookie-policy-detail-btn"><?php echo __("Cookies Detail", $this->textdomain);?></a><?php } ?> </div>
                            </div>
                            <div class="seers-cmp-cookie-policy-accordion-tab seers-top-border-none">
                                <input class="seers-cmp-cookie-policy-accordion-check" type="checkbox" id="seers-cmpAccordianunclassified" name="seers-cmpAccordianunclassified">
                                <label class="seers-cmp-cookie-policy-accordion-tab-label" for="seers-cmpAccordianunclassified"><?php echo __("Unclassified", $this->textdomain);?>
                                    <div class="seers-cmp-cookie-policy-switchers"> </div>
                                </label>
                                <div class="seers-cmp-cookie-policy-accordion-tab-content">
                                    <p class="seers-cmp-cookie-policy-accordion-tab-content-text"><?php echo __("Unclassified cookies are cookies that we are in the process of classifying, together with the providers of individual cookies.", $this->textdomain);?></p> <?php /*hide for now it will shown in next version*/ if (false) { ?><a class="seers-cmp-cookie-policy-detail-btn"><?php echo __("Cookies Detail", $this->textdomain);?></a><?php } ?> </div>
                            </div>
                            </div>
                        </div>
                    </div>
                <div class="seers-cmp-cookie-policy-default-banner-footer">
                    <div class="seers-cmp-cookie-policy-default-banner-footer-block"> <a href="#" class="seers-cmp-btn <?php if (get_option('SCCBPP_cookie_consent_button_type')) { if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_flat') { echo "btn-flat"; } else if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_rounded') { echo "btn-round"; } else if (get_option('SCCBPP_cookie_consent_button_type') == 'cbtn_stroke') { echo "btn-stroke"; } }?>" id="savemychoice" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>" tabindex="0"> 
                            <?php echo __("Save my choices", $this->textdomain);?>
                         </a> </div>
                    <div class="seers-cmp-cookie-policy-power-by" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>">
                                        <span class="seers-cmp-cookie-policy-scan-staus" style="font-family: arial">
                                             
                                        </span>
                                        <span class="seers-cmp-cookie-policy-powered-by-text" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>"><?php echo __("powered by", $this->textdomain);?>&nbsp;<a href="https://seersco.com" target="_blank" class="seers-cmp-cookie-policy-powered-by-link" lang="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>" tabindex="0"><svg xmlns="http://www.w3.org/2000/svg" width="602" height="185" viewBox="0 0 602 185" fill="none"><g clip-path="url(#clip0_10_64)"><path d="M106.155 84.4733C102.817 58.7682 80.6109 38.8655 53.7747 38.8655C40.7654 38.8655 28.4353 43.5209 18.9682 51.9543C17.0611 53.6416 15.2224 55.4629 13.5873 57.4196C13.1101 57.9584 12.6345 58.5665 12.1573 59.1731C6.97852 65.5143 3.57309 72.7346 2.14314 80.5599C1.80292 82.3738 2.38455 84.2383 3.69575 85.537L12.1573 93.9182L18.9682 100.664L56.673 138.011C61.8774 143.166 61.1015 152.142 53.7762 152.142C44.4444 152.142 36.5424 145.733 34.5001 137.097C33.8877 134.533 31.6387 132.643 28.9824 132.643C25.4402 132.643 22.6472 135.814 23.3963 139.187C26.5981 153.693 40.2214 164.42 56.159 163.273C65.5592 162.531 74.0052 157.201 79.5913 149.644C80.7269 148.092 80.557 145.944 79.1918 144.59L18.9682 84.8782C15.808 81.7481 14.4102 77.0795 16.4323 73.1177C17.1684 71.6754 18.0138 70.2653 18.9682 68.8874C19.8541 67.4033 20.9437 65.987 22.17 64.6368C30.0036 55.3274 41.5146 49.9961 53.7762 49.9961C74.4155 49.9961 91.5794 64.9062 94.7812 84.4718C95.19 86.6302 95.3936 88.9256 95.3936 91.2179V118.088C95.3936 119.588 95.9931 121.025 97.0586 122.081C100.606 125.595 106.633 123.082 106.633 118.088V91.2194C106.633 88.9256 106.496 86.6995 106.155 84.4733Z" fill="#3B6EF8"></path><path d="M88.5814 123.267L50.8512 85.8432C45.6225 80.6569 46.4089 71.6555 53.7734 71.6555C63.1053 71.6555 70.9388 78.1322 72.9812 86.7011C73.5936 89.3321 75.8426 91.221 78.4989 91.221C81.9727 91.221 84.8341 88.0497 84.0849 84.6766C80.6111 68.889 64.8087 57.5551 47.2345 61.1976C39.4693 62.7494 32.7937 67.5389 28.0936 73.8816C26.8035 75.6242 26.9893 78.0499 28.5298 79.5757L88.5799 139.055C91.7342 142.179 93.0819 146.841 91.0878 150.807C90.3411 152.293 89.5004 153.731 88.5799 155.112C87.6256 156.596 86.6044 158.013 85.4465 159.295C77.6129 168.538 66.1019 173.8 53.7734 173.8C33.2709 173.8 16.2422 159.159 12.7684 139.796C12.3596 137.637 12.156 135.343 12.156 133.049V105.842C12.156 104.342 11.5564 102.905 10.4908 101.849C6.94291 98.3358 0.916992 100.849 0.916992 105.842V133.051C0.916992 135.345 1.12214 137.571 1.39415 139.797C4.93634 165.3 27.0739 185 53.7749 185C69.442 185 84.1548 178.254 94.0307 166.514C96.2782 163.95 98.2537 161.116 99.8888 158.08C101.184 155.922 102.205 153.626 103.091 151.334C104.112 148.771 104.861 146.138 105.406 143.441C105.788 141.632 105.225 139.753 103.912 138.452L95.3923 130.014L88.5814 123.267Z" fill="#3B6EF8"></path><ellipse cx="54.1267" cy="112.107" rx="21.1429" ry="20.9262" fill="white"></ellipse><ellipse cx="54.1267" cy="112.107" rx="15.8571" ry="15.6946" fill="#3B6EF8"></ellipse><path fill-rule="evenodd" clip-rule="evenodd" d="M57.0284 112.824C58.2839 111.93 59.1014 110.472 59.1014 108.824C59.1014 106.105 56.8741 103.901 54.1266 103.901C51.3791 103.901 49.1519 106.105 49.1519 108.824C49.1519 110.472 49.9693 111.93 51.2245 112.824V119.463C51.2245 121.066 52.5238 122.365 54.1265 122.365C55.7292 122.365 57.0284 121.066 57.0284 119.463V112.824Z" fill="white"></path></g><path d="M19.9397 38.0882C17.1611 38.0882 14.8738 35.8255 15.247 33.0722C16.3653 24.822 20.2206 17.1059 26.2921 11.1558C33.5808 4.01287 43.4664 1.07174e-05 53.7742 0C64.082 -1.07174e-05 73.9676 4.01283 81.2563 11.1557C87.3279 17.1059 91.1831 24.822 92.3014 33.0721C92.6746 35.8254 90.3873 38.0882 87.6088 38.0882C84.8303 38.0882 82.6241 35.8174 82.1218 33.0847C81.0876 27.4572 78.3241 22.2273 74.1414 18.1283C68.7397 12.8347 61.4134 9.86071 53.7742 9.86071C46.135 9.86072 38.8087 12.8347 33.407 18.1284C29.2243 22.2274 26.4609 27.4573 25.4266 33.0847C24.9244 35.8175 22.7182 38.0882 19.9397 38.0882Z" fill="#888585"></path><path d="M178.781 166.112C187.809 166.112 194.613 164.09 199.194 160.048C203.909 155.872 206.267 150.55 206.267 144.083C206.267 138.558 204.448 133.977 200.81 130.34C197.307 126.702 191.716 123.805 184.036 121.649L166.453 116.395C160.794 114.643 155.877 112.42 151.7 109.725C147.523 106.896 144.289 103.46 141.999 99.4182C139.843 95.2415 138.765 90.391 138.765 84.867C138.765 74.4924 142.538 66.4084 150.083 60.6149C157.628 54.6866 167.666 51.7224 180.196 51.7224C187.472 51.7224 193.939 52.5308 199.598 54.1476C205.391 55.6297 209.905 57.5833 213.138 60.0085C216.507 62.4338 218.191 64.9937 218.191 67.6884C218.191 69.4399 217.719 71.0567 216.776 72.5388C215.833 73.8861 214.621 74.964 213.138 75.7724C209.77 73.0777 205.189 70.7199 199.396 68.6989C193.737 66.6779 187.539 65.6674 180.802 65.6674C172.988 65.6674 166.79 67.4189 162.209 70.922C157.628 74.2903 155.338 78.9387 155.338 84.867C155.338 89.5826 156.954 93.4226 160.188 96.3867C163.556 99.3509 168.946 101.911 176.356 104.067L188.684 107.704C199.328 110.669 207.682 114.98 213.745 120.639C219.943 126.298 223.041 134.112 223.041 144.083C223.041 154.726 219.134 163.349 211.32 169.951C203.64 176.553 192.794 179.854 178.781 179.854C170.563 179.854 163.354 178.979 157.157 177.227C151.094 175.341 146.31 173.05 142.807 170.356C139.439 167.526 137.755 164.764 137.755 162.069C137.755 159.779 138.429 157.893 139.776 156.411C141.258 154.794 142.942 153.649 144.828 152.975C147.927 155.939 152.306 158.903 157.965 161.867C163.624 164.697 170.563 166.112 178.781 166.112Z" fill="#121212"></path><path d="M254.437 140.849L253.628 128.117L314.663 119.83C314.124 112.42 311.564 106.357 306.983 101.641C302.402 96.7909 296.069 94.3657 287.985 94.3657C279.632 94.3657 272.693 97.3972 267.169 103.46C261.78 109.389 259.085 117.944 259.085 129.127V133.573C260.028 144.352 263.531 152.571 269.594 158.23C275.792 163.754 284.213 166.516 294.857 166.516C300.516 166.516 305.635 165.573 310.216 163.686C314.797 161.8 318.435 159.779 321.13 157.623C322.612 158.566 323.757 159.712 324.566 161.059C325.509 162.272 325.98 163.686 325.98 165.303C325.98 167.863 324.498 170.288 321.534 172.579C318.705 174.734 314.865 176.486 310.014 177.833C305.299 179.181 299.977 179.854 294.048 179.854C283.674 179.854 274.647 177.968 266.967 174.196C259.422 170.423 253.561 164.832 249.384 157.421C245.342 149.876 243.321 140.714 243.321 129.935C243.321 122.256 244.399 115.452 246.555 109.523C248.845 103.46 251.944 98.3404 255.851 94.1636C259.893 89.9868 264.676 86.8206 270.2 84.6649C275.725 82.3744 281.72 81.2291 288.187 81.2291C296.406 81.2291 303.614 82.9807 309.812 86.4838C316.145 89.9869 321.062 94.9046 324.566 101.237C328.203 107.435 330.022 114.576 330.022 122.66C330.022 125.624 329.349 127.78 328.001 129.127C326.654 130.34 324.768 131.081 322.342 131.35L254.437 140.849Z" fill="#121212"></path><path d="M359.237 140.849L358.428 128.117L419.463 119.83C418.924 112.42 416.364 106.357 411.783 101.641C407.202 96.7909 400.87 94.3657 392.786 94.3657C384.432 94.3657 377.493 97.3972 371.969 103.46C366.58 109.389 363.885 117.944 363.885 129.127V133.573C364.828 144.352 368.331 152.571 374.394 158.23C380.592 163.754 389.013 166.516 399.657 166.516C405.316 166.516 410.436 165.573 415.017 163.686C419.598 161.8 423.235 159.779 425.93 157.623C427.412 158.566 428.557 159.712 429.366 161.059C430.309 162.272 430.781 163.686 430.781 165.303C430.781 167.863 429.298 170.288 426.334 172.579C423.505 174.734 419.665 176.486 414.815 177.833C410.099 179.181 404.777 179.854 398.849 179.854C388.474 179.854 379.447 177.968 371.767 174.196C364.222 170.423 358.361 164.832 354.184 157.421C350.142 149.876 348.121 140.714 348.121 129.935C348.121 122.256 349.199 115.452 351.355 109.523C353.645 103.46 356.744 98.3404 360.652 94.1636C364.694 89.9868 369.477 86.8206 375.001 84.6649C380.525 82.3744 386.52 81.2291 392.988 81.2291C401.206 81.2291 408.415 82.9807 414.612 86.4838C420.945 89.9869 425.863 94.9046 429.366 101.237C433.004 107.435 434.823 114.576 434.823 122.66C434.823 125.624 434.149 127.78 432.802 129.127C431.454 130.34 429.568 131.081 427.143 131.35L359.237 140.849Z" fill="#121212"></path><path d="M474.344 101.237V133.169H458.176V102.45C458.176 99.3509 458.715 96.9257 459.793 95.1741C461.006 93.2878 462.959 91.4689 465.654 89.7174C469.157 87.4269 473.94 85.4733 480.003 83.8564C486.066 82.1049 492.803 81.2291 500.213 81.2291C510.992 81.2291 516.381 83.9238 516.381 89.3132C516.381 90.6605 516.179 91.9405 515.775 93.1531C515.371 94.231 514.832 95.1741 514.158 95.9825C512.811 95.713 511.059 95.4436 508.904 95.1741C506.748 94.9046 504.592 94.7699 502.436 94.7699C496.239 94.7699 490.782 95.4436 486.066 96.7909C481.351 98.0035 477.443 99.4856 474.344 101.237ZM458.176 123.872L474.344 126.298V176.823C473.671 177.092 472.66 177.362 471.313 177.631C469.965 178.035 468.483 178.238 466.867 178.238C464.037 178.238 461.881 177.699 460.399 176.621C458.917 175.408 458.176 173.522 458.176 170.962V123.872Z" fill="#121212"></path><path d="M601.231 152.369C601.231 160.992 598.064 167.728 591.732 172.579C585.399 177.429 576.237 179.854 564.246 179.854C554.006 179.854 545.653 178.305 539.186 175.206C532.718 171.972 529.485 168.469 529.485 164.697C529.485 163.08 529.889 161.531 530.697 160.048C531.64 158.432 532.988 157.152 534.739 156.209C538.377 158.769 542.621 161.126 547.472 163.282C552.322 165.438 557.846 166.516 564.044 166.516C578.056 166.516 585.062 161.8 585.062 152.369C585.062 148.461 583.85 145.295 581.425 142.87C579.134 140.31 575.698 138.491 571.118 137.413L554.343 132.967C546.124 130.946 540.129 127.847 536.356 123.67C532.584 119.359 530.697 114.037 530.697 107.704C530.697 100.563 533.594 94.3657 539.388 89.1111C545.181 83.8565 554.006 81.2291 565.863 81.2291C572.195 81.2291 577.719 81.9028 582.435 83.2501C587.151 84.4628 590.789 86.1469 593.349 88.3027C596.043 90.3237 597.391 92.5468 597.391 94.972C597.391 96.7235 596.919 98.273 595.976 99.6203C595.168 100.968 594.022 101.978 592.54 102.652C590.923 101.574 588.835 100.429 586.275 99.2161C583.85 97.8688 580.953 96.7909 577.585 95.9825C574.216 95.0394 570.511 94.5678 566.469 94.5678C560.541 94.5678 555.758 95.713 552.12 98.0035C548.482 100.294 546.663 103.528 546.663 107.704C546.663 110.669 547.674 113.296 549.695 115.586C551.851 117.742 555.219 119.359 559.8 120.437L573.745 123.872C582.907 126.028 589.778 129.464 594.359 134.18C598.94 138.761 601.231 144.824 601.231 152.369Z" fill="#121212"></path><defs><clipPath id="clip0_10_64"><rect width="105.714" height="146.134" fill="white" transform="translate(0.916992 38.8655)"></rect></clipPath></defs></svg></a></span> 
                                        
                                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Get the seers-cmp-default-banner
        var cmpnsentmodal = document.getElementById("seers-cmp-cookie-policy-default-banner-content");
        var cmpnsentmodaloverlay = document.getElementById("seers-cmp-overlay");
        // Get the button that opens the seers-cmp-default-banner
        var seersOpenbtn = document.getElementById("seers-cmp-default-banner-opener");
        // Get the <span> element that seers-cmp-default-banner-closes the seers-cmp-default-banner
        var seersClosespan = document.getElementsByClassName("seers-cmp-default-banner-close")[0];
        // When the user clicks the button, open the seers-cmp-default-banner 
        if(seersOpenbtn){
        seersOpenbtn.onclick = function () {
                cmpnsentmodal.classList.add("seers-cmp-cookie-banner-active");
                cmpnsentmodal.classList.remove("seers-cmp-cookie-banner-no-active");
                cmpnsentmodaloverlay.classList.add("seers-cmp-overlay-active");
            }
        }
            // When the user clicks on <span> (x), seers-cmp-default-banner-close the seers-cmp-default-banner
        seersClosespan.onclick = function () {
            cmpnsentmodal.classList.remove("seers-cmp-cookie-banner-active");
            cmpnsentmodal.classList.add("seers-cmp-cookie-banner-no-active");
            cmpnsentmodaloverlay.classList.remove("seers-cmp-overlay-active");
        }
        
        //by Shoaib
        /*********** I Agree. **************/
        function savecookieajax(disagree, btnid) {
            let seersbannerbar = document.getElementsByClassName("seers-cmp-banner-bar")[0];

            let consentobj = {"Pref": false , "stat": false, "market": false};
            if (!disagree) {
                
                if (document.getElementById('seers-cmp-cookie-policy-preference-switch').checked || btnid === "seers-iagree" || btnid === "seers_allow_all") {
                consentobj.Pref = true;
                } else {
                    consentobj.Pref = false;
                }
                    if (document.getElementById('seers-cmp-cookie-policy-statistic-switch').checked || btnid === "seers-iagree" || btnid === "seers_allow_all") {
                    consentobj.stat = true;
                } else {
                    consentobj.stat = false;
                }
                    if (document.getElementById('seers-cmp-cookie-policy-marketing-switch').checked || btnid === "seers-iagree" || btnid === "seers_allow_all") {
                    consentobj.market = true;
                } else {
                    consentobj.market = false;
                }

            }
            
            
            //hide current banner
            cmpnsentmodal.classList.remove("seers-cmp-cookie-banner-active");
            cmpnsentmodal.classList.add("seers-cmp-cookie-banner-no-active");
            cmpnsentmodaloverlay.classList.remove("seers-cmp-overlay-active");
            seersbannerbar.classList.add("seers-cmp-banner-bar-hide");

            //var params = "action=savecookie&consentobj=" + JSON.stringify(consentobj);
            var params = "action=savecookie&savecooienonce=<?php echo wp_create_nonce( 'seers-cooksave-call' );?>&save=y";
            httpRequest = new XMLHttpRequest()
            httpRequest.open('POST', ajaxurl)
            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpRequest.send(params);
            // beforeSend:
            httpRequest.onreadystatechange = function() {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    // complete:
                    
                    let data = JSON.parse(httpRequest.response)
                    console.log(data);
                    if (httpRequest.status === 200) {
                        // show success message
                        
                        var expires = "";
                        var days = 30;
                        let name = "SeersCMPConsent";

                        if (days) {
                            let expirindays = <?php echo ((get_option('SCCBPP_cookie_consent_cookies_expiry')) ? get_option('SCCBPP_cookie_consent_cookies_expiry') : 1 );?>;
                            var date = new Date();
                            //date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                            //expires = "; expires=" + date.toGMTString();
                            
                            if (expirindays < 1) {
                                expires = "";
                            } else {
                                days = expirindays;
                                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                                expires = "; expires=" + date.toGMTString();
                            }
                            
                        }

                        const item = {
                            value: JSON.stringify(consentobj),
                            expiry: expires
                        }
                        
                        localStorage.setItem(name, JSON.stringify(item));
                    }
                }
            }
        }
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.seers-cms-tabs-universal-bar > div');
            const pages = document.querySelectorAll('.seers-cms-pages-universal-bar > div');

            tabs.forEach((tab, index) => {
                tab.addEventListener('click', function () {
                    tabs.forEach(t => t.classList.remove('active'));
                    pages.forEach(p => p.style.display = 'none');
                    tab.classList.add('active');
                    pages[index].style.display = 'block';
                });
            });
        });
        const savemychoiceButton = document.getElementById("savemychoice");
        if (savemychoiceButton) {
            savemychoiceButton.addEventListener('click', function(e) {
                e.preventDefault();
                savecookieajax(false, "savemychoice");
                document.getElementById("SeersCMPBannerBadgeIcon").style.display = "block";
            });
        }

        const savemychoice1Button = document.getElementById("savemychoice1");
        if (savemychoice1Button) {
            savemychoice1Button.addEventListener('click', function(e) {
                e.preventDefault();
                savecookieajax(false, "savemychoice1");
                document.getElementById("SeersCMPBannerBadgeIcon").style.display = "block";
            });
        }
        document.getElementById("seers-iagree").addEventListener('click', function(e) {
            e.preventDefault();
            savecookieajax(false, "seers-iagree");
            document.getElementById("SeersCMPBannerBadgeIcon").style.display = "block";
        });
        document.getElementById("seers-idisagree").addEventListener('click', function(e) {
            e.preventDefault();
            savecookieajax(true, "seers-idisagree");
            document.getElementById("SeersCMPBannerBadgeIcon").style.display = "block";
        });
        document.getElementById("seers_allow_all").addEventListener('click', function(e) {
            e.preventDefault();
            savecookieajax(false, "seers_allow_all");
            document.getElementById("SeersCMPBannerBadgeIcon").style.display = "block";
        });
        document.getElementById("seers_disable_all").addEventListener('click', function(e) {
            e.preventDefault();
            savecookieajax(true, "seers_disable_all");
            document.getElementById("SeersCMPBannerBadgeIcon").style.display = "block";
        });
        
function syncSwitches(switch1, switch2, switch3) {
    const element1 = document.getElementById(switch1);
    const element2 = document.getElementById(switch2);
    const element3 = document.getElementById(switch3);

    if (element1 && element2) {
        element1.addEventListener('change', function() {
            element2.checked = this.checked;
            if (element3) element3.checked = this.checked;
        });

        element2.addEventListener('change', function() {
            element1.checked = this.checked;
            if (element3) element3.checked = this.checked;
        });

        if (element3) {
            element3.addEventListener('change', function() {
                element1.checked = this.checked;
                element2.checked = this.checked;
            });
        }
    }
}

syncSwitches('seers-cmp-cookie-policy-preference-switch', 'seers-cmp-cookie-policy-preference-switch1', 'seers-cmp-cookie-policy-preference-switch2');

syncSwitches('seers-cmp-cookie-policy-statistic-switch', 'seers-cmp-cookie-policy-statistic-switch1', 'seers-cmp-cookie-policy-statistic-switch2');

syncSwitches('seers-cmp-cookie-policy-marketing-switch', 'seers-cmp-cookie-policy-marketing-switch1', 'seers-cmp-cookie-policy-marketing-switch2');

</script>
</body>

</html>