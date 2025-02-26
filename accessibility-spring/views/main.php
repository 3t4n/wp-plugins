<?php

function as_render_sidebar()
{

    $all_options = get_option('true_options');
    if(!$all_options){
        $all_options = [];
    }
?>

    <div class="handicap-icon"><?php echo as_set_icon_url($all_options); ?></div>

    <div style="<?php if (isset($all_options['background-color'])) {
                    echo 'background-color:' . $all_options['background-color'] . ';';
                } ?>; display:none;" class="as-container">
        <div class="as-close" style="<?php if (isset($all_options['close_color']) && $all_options['close_color']) {
                                            echo 'color:' . $all_options['close_color'] . ';';
                                        } ?>">+</div>

        <div class="nothing-to-show">Go to <a href="<?php echo admin_url() ?>" target="_blank">Dashboard</a>, then click on Accessibility spring in the sidebar and enable options that you want to start to work.</div>
        <?php
        if (isset($all_options['font_size_changer']) && $all_options['font_size_changer'] === 'true') {
        ?>

            <div class="field-name" style="<?php if ($all_options['text_color']) {
                                                echo 'color:' . $all_options['text_color'] . ';';
                                            } ?>"> <?php _e('Change font size', 'accessibility-spring'); ?></div>

            <div class="logic-section" id="font-size">

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="decrease">A -</button>

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="font-size-default">A</button>

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="increase">A +</button>

            </div>

        <?php

        }

        if (isset($all_options['grayscale']) && $all_options['grayscale'] === 'true') {

        ?>

            <div class="field-name" style="<?php if ($all_options['text_color']) {
                                                echo 'color:' . $all_options['text_color'] . ';';
                                            } ?>"><?php _e('Grayscale', 'accessibility-spring'); ?></div>

            <div class="logic-section" id="grayscale">

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="grayscale">Apply</button>

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="grayscale-default">Discard</button>

            </div>

        <?php

        }

        if (isset($all_options['sepia']) && $all_options['sepia'] === 'true') {

        ?>
            <div class="field-name" style="<?php if ($all_options['text_color']) {
                                                echo 'color:' . $all_options['text_color'] . ';';
                                            } ?>"><?php _e('Sepia', 'accessibility-spring'); ?></div>

            <div class="logic-section" id="sepia">

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="sepia">Apply</button>

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="sepia-default">Discard</button>

            </div>
        <?php
        }

        if (isset($all_options['contrast']) && $all_options['contrast'] === 'true') {

        ?>

            <div class="field-name" style="<?php if ($all_options['text_color']) {
                                                echo 'color:' . $all_options['text_color'] . ';';
                                            } ?>"><?php _e('High contrast', 'accessibility-spring'); ?></div>

            <div class="logic-section" id="contrast">

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="contrast">Apply</button>

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="contrast-default">Discard</button>

            </div>
        <?php

        }

        if (isset($all_options['invert']) && $all_options['invert'] === 'true') {

        ?>
            <div class="field-name" style="<?php if ($all_options['text_color']) {
                                                echo 'color:' . $all_options['text_color'] . ';';
                                            } ?>"><?php _e('Invert color', 'accessibility-spring'); ?></div>

            <div class="logic-section" id="invert">

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="invert">Apply</button>

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="invert-default">Discard</button>

            </div>
        <?php

        }

        if (isset($all_options['custom_cursor']) && $all_options['custom_cursor'] === 'true') {

        ?>

            <div class="field-name" style="<?php if ($all_options['text_color']) {
                                                echo 'color:' . $all_options['text_color'] . ';';
                                            } ?>"><?php _e('Contrast cursor', 'accessibility-spring'); ?></div>

            <div class="logic-section" id="cursor">

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="cursor">Apply</button>

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="cursor-default">Discard</button>

            </div>
        <?php
        }

        if (isset($all_options['highlight_links']) && $all_options['highlight_links'] === 'true') {

        ?>
            <div class="field-name" style="<?php if ($all_options['text_color']) {
                                                echo 'color:' . $all_options['text_color'] . ';';
                                            } ?>"><?php _e('Highlight links', 'accessibility-spring'); ?></div>

            <div class="logic-section" id="links">

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="links">Apply</button>

                <button style="<?php if ($all_options['button_color']) {
                                    echo 'background-color:' . $all_options['button_color'] . ';';
                                }
                                if ($all_options['text_color']) {
                                    echo 'color:' . $all_options['text_color'];
                                } ?>" value="links-default">Discard</button>

            </div>
        <?php } ?>

    </div>

<?php } ?>