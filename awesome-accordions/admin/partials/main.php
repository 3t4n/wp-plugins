<ul id="sortable" class="accordion-container js-accordion-container">

    <input type="hidden" id="acc-post-id" value="<?php echo the_ID(); ?>" />

    <?php
    $accordions = get_post_meta(get_the_ID(), "accordions", true);

    if (is_array($accordions) && count($accordions) > 0):
        
        $counter = 0;
    
        foreach ($accordions as $acc):
            ?>

            <li class="accordion-item ui-state-default <?php echo ( $counter < 1 ? " " : "" ) //removed opened to close first accordion    ?>"> <!-- item to clone but without the 'opened' class -->

                <div class="js-accordion-open">
                    
                    <div class="accordion-title portlet-header">

                        <?php echo (isset($acc["name"]) && $acc["name"] !== "" ? $acc["name"] : "Title:" ) ?>

                    </div>

                    <span class="dashicons dashicons-arrow-down"></span>
                    
                </div>
                

                <div class="accordion-content">

                    <div class ="acc-title-input-updated">

                        <?php _e("Title", "awesome-accordions"); ?> : <br> <input type="text" class="acc-name" value="<?php echo (isset($acc["name"]) && $acc["name"] !== "" ? $acc["name"] : "Title:" ) ?>" name="accordions[<?php echo $counter ?>][name]">
                    </div> 

                    <?php
                    $content        = (isset($acc["content"]) && $acc["content"] !== "" ? $acc["content"] : "");
                    $editor_id      = "accordions_$counter";
                    $editor_real_id = "accordions[$counter][content]";

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

            <?php
            $counter++;

        endforeach;

    else:
        $counter        = 0;
        $acc            = array(
            "name"    => "",
            "content" => ""
        );
        ?>

        <li class="accordion-item ui-state-default <?php echo ( $counter < 1 ? "opened" : "" ) ?>"> <!-- item to clone but without the 'opened' class -->

            <div class="js-accordion-open">
                    
                <div class="accordion-title portlet-header"><?php _e("Title", "awesome-accordions"); ?>:</div>

                <span class="dashicons dashicons-arrow-down"></span>

            </div>
            
            <div class="accordion-content">

                <div class ="acc-title-input-updated">

                    <?php _e("Title", "awesome-accordions"); ?>: <br> <input type="text" value="<?php echo (isset($acc["name"]) ? $acc["name"] : "" ) ?>" name="accordions[<?php echo $counter ?>][name]">

                </div> 

                <?php
                $content        = $acc["content"];
                $editor_id      = "accordions_$counter";
                $editor_real_id = "accordions[$counter][content]";

                $settings = array(
                    'textarea_name' => $editor_real_id, 
                    "editor_height" => 500
                );

                wp_editor($content, $editor_id, $settings); 
                
                ?>

                <div class ="acc-bottom">

                    <div class="alignleft">

                        <button type="button" class="button-link button-link-delete js-remove-accordion"><?php _e("Delete", "awesome-accordions"); ?></button>

                    </div>

                    <div class="alignright">

                        <span class="spinner"></span><button type="submit" name="save-accordion"  class="button button-primary js-save-accordion right"><?php _e("Save", "awesome-accordions"); ?></button>

                    </div> 
                </div> 

            </div>

        </li>

    <?php
    endif;
    ?>

</ul>

<div class="button button-primary js-add-accordion"><?php _e("Add element", "awesome-accordions"); ?></div>

<div class="accordion-remove-layover">

    <div class="layover-wrapper">

        <p><?php _e("Are you sure that you want remove this accordion?", "awesome-accordions"); ?></p>

        <div class="button-container">

            <div class="button button-primary js-remove-confirmation"><?php _e("Remove", "awesome-accordions"); ?></div>

            <div class="button js-cancel-confirmation"><?php _e("Cancel", "awesome-accordions"); ?></div>

        </div>

    </div>

</div>