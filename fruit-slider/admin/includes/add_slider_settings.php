<div id="main-wrapper" class="wrap" >
    <div class="fruit-logo">
        <h2 class="fruit-title"><?php _e('Add New Slider', FRUIT_SLIDER_SLUG); ?></h2>
    </div>
    <form action="<?php echo add_query_arg(array('method' => 'save'), admin_url('admin.php?page=slider_settings')); ?>" method="post">
        <div class="form-slider">
            <div class="label">
                <label for="fruit_sliderupload"><?php _e('Choose Images', FRUIT_SLIDER_SLUG); ?></label>
            </div>
            <div class="fruit_slider_button">		
                <input class="button button-secondary" type="button" name="fruit_sliderupload" value="<?php _e('Choose Files', FRUIT_SLIDER_SLUG); ?>" id="fruit_sliderupload" />
                <span class="howto"><?php _e('Upload/Choose images from the media gallery. Ctrl/Shift + Click to choose multiple.', FRUIT_SLIDER_SLUG); ?></span>
            </div>
            <div class="select_gallery">
                <h2><?php _e('Galleries', FRUIT_SLIDER_SLUG); ?></h2>
                <?php
                global $wpdb;
                $table = $wpdb->prefix . "add_fruitgallery";
                $gallery_details = $wpdb->get_results("SELECT * FROM " . $table);
                if (!empty($gallery_details)) :
                    ?>
                    <label style="font-weight:bold"><input onclick="jqCheckAll(this, '', 'Slide[galleries]');" type="checkbox" name="checkboxall" value="checkboxall" id="checkboxall" /> <?php _e('Select All', FRUIT_SLIDER_SLUG); ?></label>
                    <?php foreach ($gallery_details as $gallery) : ?>
                        <label><input type="checkbox" name="Slide[galleries][]" value="<?php echo $gallery->ID; ?>" id="Slide_galleries_<?php echo $gallery->ID; ?>" /> <?php echo $gallery->gallery_name; ?></label>
                    <?php endforeach; ?>
                <?php else : ?>
                    <span class="error"><?php _e('No galleries are available.', FRUIT_SLIDER_SLUG); ?></span>
<?php endif; ?>
            </div>	

            <div id="fruit_mediaslides" style="display:none;">							
                <table class="form-table" id="fruit_mediaslides_table">
                    <tbody>								
                    </tbody>
                </table>
            </div>					
            <p class="submit">
                <input type="submit" name="save-multiple" value="<?php _e('Save Multiple Slides', FRUIT_SLIDER_SLUG); ?>" class="button button-primary" />
            </p>
    </form>		
</div>

<script type="text/javascript">
    jQuery(document).ready(function () {
        var file_frame;

        jQuery('#fruit_sliderupload').on('click', function (event) {
            event.preventDefault();

            // If the media frame already exists, reopen it.
            if (file_frame) {
                file_frame.open();
                return;
            }

            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
                title: '<?php _e('Upload Slides', FRUIT_SLIDER_SLUG); ?>',
                button: {
                    text: '<?php _e('Select Images as Slides', FRUIT_SLIDER_SLUG); ?>',
                },
                multiple: true  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            file_frame.on('select', function () {

                var selection = file_frame.state().get('selection');

                selection.map(function (attachment) {
                    attachment = attachment.toJSON();

                    var attachment_html = '<tr id="fruit_sliderupload_row_' + attachment.id + '">';
                    attachment_html += '<th style="width:100px; vertical-align:top;"><a href="" class="colorbox" onclick="jQuery.colorbox({href:\'' + attachment.url + '\'}); return false;"><img style="width:100px;" class="dropshadow" src="' + attachment.sizes.thumbnail.url + '" /></th>';
                    attachment_html += '<td>';
                    attachment_html += '<label><?php _e('Title:', FRUIT_SLIDER_SLUG); ?> <input class="widefat" type="text" value="' + attachment.title + '" name="Slide[slides][' + attachment.id + '][title]" /></label>';
                    attachment_html += '<input class="widefat" readonly="readonly" type="text" value="' + attachment.url + '" name="Slide[slides][' + attachment.id + '][url]" />';
                    attachment_html += '<input type="hidden" value="' + attachment.id + '" name="Slide[slides][' + attachment.id + '][attachment_id]" />';
                    attachment_html += '</td>';
                    attachment_html += '<td><input onclick="if (confirm(\'<?php echo __('Are you sure you want to remove this slide?', FRUIT_SLIDER_SLUG); ?>\')) { jQuery(\'#fruit_sliderupload_row_' + attachment.id + '\').remove(); } return false;" class="button button-secondary button-small" type="button" name="remove" value="<?php echo __('Remove', FRUIT_SLIDER_SLUG); ?>" id="remove' + attachment.id + '" /></td>';
                    attachment_html += '</tr>';

                    jQuery('#fruit_mediaslides').show();
                    jQuery('#fruit_mediaslides_table tbody').append(attachment_html);
                });
            });

            // Finally, open the modal
            file_frame.open();
        });
    });
</script>


