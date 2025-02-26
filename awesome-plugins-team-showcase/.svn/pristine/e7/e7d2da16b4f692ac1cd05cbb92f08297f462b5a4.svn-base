<div class="aws-carousel owl-carousel owl-theme js-aws-carousel"
     data-grid-type="<?php echo $skin["grid"]; ?>" 
     data-columns="<?php echo $skin["columns"] ?>" 
     data-card-action="<?php echo $skin["extrainfo"] ?>"

     data-carousel-auto="<?php echo (isset($skin["autoslide"]) ? $skin["autoslide"] : "") ?>"
     data-carousel-interval="<?php echo (isset($skin["interval"]) ? $skin["interval"] : "") ?>"
     data-carousel-indicators="<?php echo (isset($skin["indicators"]) ? $skin["indicators"]: "") ?>"
     data-carousel-arrows="<?php echo $skin["arrows"] ?>"

     >

    <?php
    if ($query->have_posts()):

        while ($query->have_posts()):

            $query->the_post();
            $member_meta = get_post_meta(get_the_ID(), "aws_ts_member_meta", true)
            ?>
            <div class="item" data-card-action="<?php echo $extrainfo ?>">

                <?php
                if (file_exists($card_file)):

                    include $card_file;

                else:

                    include __DIR__ . "/cards/showcase-default.php";

                endif;
                ?>


            </div>

            <?php
        endwhile;

    else:

        echo "<li>" . _e("No posts", $this->plugin_name) . "</li>";

    endif;
    ?>

</div>