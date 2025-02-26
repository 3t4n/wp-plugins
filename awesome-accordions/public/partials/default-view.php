<?php
if ( $toggle_show_flag === true ):
    
    include __DIR__ ."/toggle-buttons.php";

endif; ?>

<ul class="awesome-accordion no-js"
    aria-label="accordion collapse"
    data-allow-multiple="<?php echo ( $multi_flag ? "true" : "false" ) ?>">

    <?php
    $accordions = get_post_meta($accordion_id, "accordions", true);
    $flag       = true;

    if (is_array($accordions)):

        $counter = 0;

        foreach ($accordions as $acc):
            $counter++;
            ?>

            <li class="awesome-accordion-item <?php
            if ($tab_opened == "true") : echo $flag ? "opened" : "closed";
            else : echo $flag ? "closed" : "closed";
            endif;
            ?>">

                <input type="checkbox" <?php echo $flag ? "" : "checked" ?> class="no-js-action" />

                <div class="awesome-accordion-heading">

                    <button type="button"
                            id="accordion_<?php echo $counter ?>" 
                            aria-controls="accordion_<?php echo $counter ?>" 
                            aria-expanded="<?php echo $flag ? "true" : "false" ?>"
                            data-hash="<?php echo sanitize_title($acc["name"]) ?>"
                            class="awesome-accordion-btn js-open-close-acc"><?php echo $acc["name"] ?>
                    </button>

                </div>

                <div class="awesome-accordion-panel"
                     tabindex="-1"
                     role="region" 
                     aria-labelledby="accordion_<?php echo $counter ?>">

                    <?php echo do_shortcode(wpautop($acc["content"])); ?>

                </div>

            </li>

            <?php
            $flag = false;

        endforeach;

    endif;
    ?>

</ul>