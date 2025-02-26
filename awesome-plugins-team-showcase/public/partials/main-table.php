<table 
    class="post-list team-table team-showcase"
    data-grid-type="table"
    >
    <thead>
        <tr>

            <?php
            if (isset($skin["tablehead"]) ):

                foreach ($skin["tablehead"] as $th):
                    ?>

                    <th><?php echo $th ?></th>

                    <?php
                endforeach;

            endif;
            ?>

        </tr>
    </thead>
    <tbody>
        <?php
        if ($query->have_posts()):

            while ($query->have_posts()):

                $query->the_post();
                $member_meta = get_post_meta(get_the_ID(), "aws_ts_member_meta", true)
                ?>
                <tr>

                    <?php
                    
                    if ( file_exists($card_file) ):

                        include $card_file;

                    else:

                        include __DIR__ . "/cards/showcase-table.php";

                    endif;
                    ?>

                </tr>

                <?php
            endwhile;

        endif;
        ?>

    </tbody>
</table>