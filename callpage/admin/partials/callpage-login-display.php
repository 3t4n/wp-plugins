<?php
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<style>
    @import url('https://fonts.googleapis.com/css?family=Maven+Pro:700');
    @import url('https://fonts.googleapis.com/css?family=Lato');

    .grid-container-12 {
        display: grid;
        grid-template-columns: auto;
        padding: 10px;
    }

    .grid-container-6 {
        display: grid;
        grid-template-columns: auto auto;
        padding: 10px;
    }

    .grid-item {
        padding: 10px;
        font-size: 30px;
        text-align: center;
        margin:0 auto
    }

    .cp-btn-shell {
        position: relative;

        margin: 5px
    }

    .cp-btn {
        padding: 15px 5px 15px 5px;
        min-width: 180px;
        display: inline-block;
        border-radius: 10px;
        margin: 10px
    }

    .cp-btn-style-one {
        font-family: 'Maven Pro', sans-serif;
        font-size:16px;
        cursor: pointer;
        transition-delay: 0.5s;
        background: #ff4800;
        color: #f2f1f2;
        -webkit-box-shadow: 0px 0px 6px 5px rgba(0, 0, 0, 0.08);
        -moz-box-shadow: 0px 0px 6px 5px rgba(0, 0, 0, 0.08);
        box-shadow: 0px 0px 6px 5px rgba(0, 0, 0, 0.08);
        text-decoration: none;
    }

    .cp-btn-style-one:hover {
        transition-delay: 0.5s;
        color: rgb(255, 255, 255);
        -webkit-box-shadow: 0px 0px 11px 8px rgba(0, 0, 0, 0.16);
        -moz-box-shadow: 0px 0px 11px 8px rgba(0, 0, 0, 0.16);
        box-shadow: 0px 0px 11px 8px rgba(0, 0, 0, 0.16);
    }

    .cp-paragraph {
        font-family:'Lato', sans-serif;;
        font-size:14px;
        max-width: 700px;
        color:#717171;

    }

    .cp-link {
        font-size: 14px;
        color: #ff4800;
    }

    .cp-link:hover {
        transition-delay: 0.5s;
        cursor: pointer;
        text-decoration: underline;
    }

    .cp-img-logo-box{
        max-width:120px;
        margin:0 auto;
    }

    .cp-img-logo{
        max-width:100%;
        height:auto;
        display:block
    }

    .display-none {
        display: none;
    }

    .cp-heading{
        font-family:'Maven Pro', sans-serif;
        font-size: 22px;
        color:#717171;
    }


</style>
<div id="cp-banner" class="wrap <?php if($_GET['settings-updated'] != null || !empty($code_callpage)) echo "display-none" ?>"">
    <div class="grid-container-12">
        <div class="grid-item">
            <div class="cp-img-logo-box">
            <img class="cp-img-logo" src="<?php echo esc_url( plugins_url( 'callpage/admin/assets/logo-wp.png'))?>">
            </div>
        </div>
    </div>
    <div class="grid-container-12">
        <div class="grid-item cp-heading">Hey there! Thank you for downloading Callpage Plugin</div>
    </div>
    <div class="grid-container-12">
        <div class="grid-item">
            <p class="cp-paragraph">We’re delighted to see you here and cannot wait to assist you in generating hot leads from your website.<br><br>

                To complete the installation process, please choose from one of the options below. If you already have an account with us, then log in to your account and copy the installation code. If not, then you’ll have to sign up as a new user, copy the code and finish your installation.<br><br>

                Should you feel stuck, and need our assistance, don’t hesitate to reach out to us.
            </p>
        </div>
    </div>
    <div class="grid-container-12">
        <div class="grid-item">
            <a id="cp-login" onclick="displaySettings()" href="https://app.callpage.io/login" target="_blank" class="cp-btn cp-btn-style-one cp-logs">log in</a>
            <a id="cp-register" onclick="displaySettings()" href="https://app.callpage.io/register" target="_blank" class="cp-btn cp-btn-style-one cp-logs">sing up</a>
        </div>
    </div>
    <div class="grid-container-12">
        <div class="grid-item">
            <a onclick="displaySettings()" class="cp-link">Go to plugin settings and insert code</a>
        </div>
    </div>
</div>