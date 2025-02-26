<!--CUSSTOM CSS START-->
<?php
$sample = '';
$breaks = array("<br />", "<br>", "<br/>");
$sample = str_ireplace($breaks, "\r\n", $sample);
?>
<div class="mb-l-customcss">
    <h2><?php _e('Custom CSS', 'author-box-pro'); ?></h2>
    <p><?php _e('Use your own CSS to override the current design', 'author-box-pro'); ?>.</p>
    <h3><?php _e('Customize it', 'author-box-pro'); ?></h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-4">
            <h4><?php _e('Custom CSS', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-8">
            <textarea name="mb-author-box-pro-get-setting-group[custom-css]" placeholder="<?php echo $sample; ?>" class="mb-l-form--textarea"><?php echo (isset($mbPluginABoptions['custom-css']) ? str_ireplace(array('\r\n', '\r', '\n'), "\n", $mbPluginABoptions['custom-css']) : ''); ?></textarea>
        </div>
    </div>
</div>
<!--CUSSTOM CSS END-->