<li class="accordion-item ui-state-default">

    <div class="js-accordion-open">

        <div class="accordion-title portlet-header"><?php _e("Title", "awesome-accordions"); ?>:</div>

        <span class="dashicons dashicons-arrow-down "></span>

    </div>


    <div class="accordion-content">

        <div class ="acc-title-input-updated">

            <?php _e("Title", "awesome-accordions"); ?>: <br> <input type="text" class="acc-name" value="" name="accordions[<?php echo $new_editor_id ?>][name]">

        </div> 


        <?php
        $content        = "";
        $editor_id      = "accordions_$new_editor_id";
        $editor_real_id = "accordions[$new_editor_id][content]";

        $settings = array(
            'textarea_name' => $editor_real_id,
            "textarea_rows" => 20
        );

        wp_editor($content, $editor_id, $settings);
        ?>

        <div class ="acc-bottom">

            <div class="alignleft">

                <button type="button" class="button-link button-link-delete js-remove-accordion"><?php _e("Delete", "awesome-accordions"); ?></button>

            </div>

            <div class="alignright">

                <span class="spinner"></span><button type="submit" name="save-accordion" value="" class="button button-primary js-save-accordion right"><?php _e("Saved", "awesome-accordions"); ?></button>

            </div>

        </div> 

    </div>

</li>