<br />
<div>
    <b>To unlock all the features, please visit Pro version of this plugin </b> 
    <a class="button greenbg" target="_blank" href="http://webzotech.com/awesomeslider/">Get Awesome Slider Pro</a>
    &nbsp;
</div>
<?php
include(AW_ADMIN_VIEWS_ROOT . 'app-top.php');
include(AW_ROOT . 'awvars.php');
if ($act == 'manage' and $post_id != '') {
    $post = get_post($post_id);
    include(AW_ADMIN_VIEWS_ROOT . 'slide-playground.php');
} else {
    ?>
    <h2>Welcome to Awesome Slides</h2>
    <h4>Congratulations!! You are just a click away...</h4>
    <a href="javascript: void(0);" onclick="show_slide_form();" class="button-primary">Create New Slide</a>
    <div id="slideformdiv"></div>
    <br /><br />
    <div id="slidesdiv">
        <?php
        $args = array(
            'post_type' => 'awesomeslide'
        );
        $loop = new WP_Query($args);
        if (count($loop->posts)) {
            include(AW_INCLUDES_ROOT . 'fetch-slides.php');
        }
        ?>
    </div>
    <h3>For Developers</h3>
    Use function <span class="aw_func">aw_get_sliders()</span> to get list of awesome sliders.
    <br /><br />
    Note: Check <span class="aw_func">function_exists</span> before calling.
    <?php
}
?>