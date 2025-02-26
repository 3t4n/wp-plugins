<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$license = array(
    array(
        "title" => "Advanced View Customization",
        "text" => "You can customize effects, views size, colors, buttons in here, get pro version to unlock all these features.",
        "icon" => "-35px -295px"
    ),
    array(
        "title" => "Full Image Configuration",
        "text" => "To configure the corners of the videos and images the way you want, buy the pro version and change the configuration settings in here.",
        "icon" => "-140px -300px"
    ),
    array(
        "title" => "Image Resizer Settings",
        "text" => "Advanced resizer settings will help in editing all the media, thumbs and images. To access these features, get the full version.",
        "icon" => " -244px -300px"
    ),
    array(
        "title" => "Color and Text Styling",
        "text" => "Get creative, customize the plugin texts and colors here! Available for pro users only.",
        "icon" => "-326px -297px"
    ),
    array(
        "title" => "Portfolios Category Settings",
        "text" => "Sorting and grouping the content into various sections and subjects will allow you Category Buttons.
In the meanwhile, the categories may include different or same projects.",
        "icon" => "-424px -418px"
    ),
    array(
        "title" => "Lightbox Views Library",
        "text" => "Some Portfolio gallery views include Popup/Lightbox feature with 4 beautifully designed styles.",
        "icon" => "-148px -396px"
    ),
   array(
        "title" => "Advanced Lightbox Options",
        "text" => "You will love this portfolio plugin just because it has 2 types of Lightbox with the following features: social sharing icons, framing, zooming, a lot of navigation and slide effects.",
        "icon" => "-251px -396px"
    ),
    array(
        "title" => "Image and Video slideshow",
        "text" => "Advanced options allows you to demonstrate images, videos and slideshows in different styles and effects.",
        "icon" => "-343px -399px"
    )
);
?>
<div class="responsive grid">
    <?php foreach ($license as $key => $val) { ?>
        <div class="col column_1_of_3">
            <div class="header" style="border: 1px solid">
                <div class="col-icon" style="background-position: <?= $val["icon"] ?>; ">
                </div>
                <?= $val["title"] ?>
            </div>
            <p><?= $val["text"] ?></p>
            <div class="col-footer">
                <a href="http://webpace.net/wordpress-photo-portfolio-gallery-plugin/" class="a-upgrate">Upgrade</a>
            </div>
        </div>
    <?php } ?>
</div>
<div class="license-footer">
    <p class="footer-text">
        You have the free version of Forms plugin. To access advanced features of customizing every plugin area, you need to upgrade.
        We offer 3 packages for these plugin. (It's a one time purchase!)
    </p>
    <p class="this-steps max-width">
        As soon as you have received the pro version of the plugin, follow the steps below.
    </p>
    <ul class="steps">
        <li>Deactivate the Free version of the plugin.</li>
        <li>Delete the Free version</li>
        <li>Upload the downloaded pro version on your WordPress dashboard</li>
    </ul>
    <a href="http://webpace.net/wordpress-photo-portfolio-gallery-plugin/" target="_blank">Purchase a License</a>
</div>