<?php
//exit if accessed directly
if (!defined('ABSPATH')) {
exit;
}?>
<?php
function spspsp_desc_page()
{?>
    <div class="wrap">
        <h1>Plugin Description</h1>
        <p>
            SP Clients Carousel allows you to showcase your clients or anyone related to your company.This plugin is made on the top of owl carousel jquery plugin which makes the carousel touch enabled and responsive.<br>
            Note:<br>
            <i>Add at least 4 posts in 'Sp_clients' to see the carousel sliding.</i><br>
            <i>You can also add the shortcode within the page builders like Elementor,etc.</i><hr>
            <h2>FAQs</h2>
            <h4><li>How to add items and display them in my pages?</li></h4>
            <ol>
                <li>First, Goto the SP Clients section and create a post there. You must add featured image in your post.</li>
                <li>Publish the post.</li>
                <li>You can create as much post as you want in 'SP Clients' section.</li>
                <li>Goto the Page/Post where you want to show the carousel.</li>
                <li>Add [spcarousel_show] shortcode to content where you want to display the carousel.</li>
            </ol>
            <hr>
            <!--h2>From the Creator of 'SP Custom Client Showcase Carousel' Plugin!</h2>
            <p>This plugin is open sourced</p-->
        </p>
    </div>
<?php
}
?>
<?php  
function spspsp_desco_page()
{
    add_submenu_page(
        'edit.php?post_type=spspsp_client',
        'SP Carousel',
        'SP Carousel Docs',
        'edit_posts',
        'spspsp-desc',
        'spspsp_desc_page'
    );
}
add_action('admin_menu', 'spspsp_desco_page');
?>