<ul class="post-list team-showcase" 
    data-grid-type="<?php echo $skin["grid"]; ?>" 
    data-columns="<?php echo $skin["columns"] ?>" 
    data-card-action="<?php echo (isset($skin["extrainfo"]) ? $skin["extrainfo"] : "none") ?>"
    tabindex="0"
    >
        <?php
        if ($query->have_posts()):

            while ($query->have_posts()):

                $query->the_post();
                $the_post = get_post();

                $member_meta = get_post_meta(get_the_ID(), "aws_ts_member_meta", true);
                ?>
            <li class="list-item team-showcase-member">

                <?php
                include $card_file;

                if (isset($skin["extrainfo"]) && $skin["extrainfo"] !== "none" && $skin["extrainfo"] !== "no-link" && $extra_info_file !== "none"):

                    include $extra_info_file;

                endif;
                ?>

            </li>

            <?php
        endwhile;

    else:

        echo "<li>" . _e("No posts available", $this->plugin_name) . "</li>";

    endif;
    ?>

</ul>