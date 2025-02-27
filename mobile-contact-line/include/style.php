<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<style>

    .yydev-line-mobile {
        direction: ltr;
        display: block;
    }

    .yydev-line-mobile .phone-button h2 span,
    .yydev-line-mobile .email-button h2 span,
    .yydev-line-mobile .whatsapp-button h2 span,
    .yydev-line-mobile .chat-button h2 span,
    .yydev-line-mobile .skype-button h2 span {
        display: inline-block;
        width: 55px;
        height: 45px;
        background: #838383 url(<?php echo plugin_dir_url(dirname(__FILE__)) . 'images/mobile-line.png'; ?>) no-repeat;
        background-position: 0px 0px;
        margin: 0px 5px -5px 5px;
    }

    .yydev-line-mobile .phone-button h2 span {
        background-position: 10px 4px;
    }

    .yydev-line-mobile .email-button h2 span {
        background-position: -61px 4px;
    }

    .yydev-line-mobile .whatsapp-button h2 span {
        background-position: -143px 4px;
    }

    .yydev-line-mobile .chat-button h2 span {
        background-position: -221px 4px;
    }

    .yydev-line-mobile .skype-button h2 span {
        background-position: -300px 4px;
    }



    .yydev-line-mobile .yydev_mobile_line_line {
        margin: 20px 0px 20px 0px;
    }

    .yydev-line-mobile .input-very-short {
        width: 100px;
    }

    .yydev-line-mobile .input-short {
        width: 200px;
    }

    .yydev-line-mobile .input-long {
        width: 400px;
    }

    .yydev-line-mobile .input-very-long {
        width: 500px;
    }

    .yydev-line-mobile .yydev_light_img_bg {
      padding: 5px 5px 5px 5px;
      display: inline-block;
      float: left;
      margin: 0px 10px 0px 10px;
      cursor: pointer;
    }

    .yydev-line-mobile span#footer-thankyou-code {
        margin: 0px 0px -30px 0px !important;
        padding: 0px;
        display: block;
        font-size: 14px;
        line-height: 1.55;
        font-style: italic;
        font-family: Arial,sans-serif !important;
        color: #555d66;
    }

    .yydev-line-mobile textarea.form_shortcode_content {
        width: 100%;
        height: 250px;
        text-align: left;
        direction: ltr;
        display: block;
    }

    .yydev-line-mobile .yydev-tags-submit {
        color: #fff;
        background: #4c4c4c;
        font-size: 20px;
        font-weight: bold;
        padding: 10px 20px 10px 20px;
        cursor: pointer;
        margin: 20px 10px 0px 0px;
    }

    .yydev-line-mobile .yydev-tags-submit:hover {
        background: #393939;
    }

    .yydev-line-mobile .align-center {
        text-align: center;
    }

    .yydev-line-mobile .output-messsage {
        display: block;
        color: #fff;
        background: #0054ff;
        line-height: 30px;
        padding: 10px 10px 10px 10px;
        font-size: 20px;
        margin: 8px 0px 15px 0px;
    }

    .yydev-line-mobile .error-messsage {
        display: block;
        color: #fff;
        background: #ff0000;
        line-height: 30px;
        padding: 10px 10px 10px 10px;
        font-size: 20px;
        margin: 8px 0px 15px 0px;
    }

    .yydev-line-mobile .clear {
        display: block;
        clear: both;
    }

/*================================
=============== Mobile
==================================*/

@media only screen and (max-width: 960px) {

}

</style>