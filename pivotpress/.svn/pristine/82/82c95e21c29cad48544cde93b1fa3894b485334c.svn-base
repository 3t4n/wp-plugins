<article class="pivotpress-story panel panel-default state-<?php echo $story->current_state . ' '?>

    <?php
        foreach($story->labels as $label) {
            print($label->name . ' ');
        }
    ?>
">
    <div class="panel-body row">
        <span class="story-title col-md-9"><?php print($story->name); ?></span>
    </div>
    <div class="panel-footer">
        <?php
            foreach($story->labels as $label) {
                print('<span class="label label-default">' . $label->name . '</span> ');
            }
        ?>
        <?php
            if ($story->estimate) {
                print('<span class="badge estimate">');
                print($story->estimate);
                print('</span>');
            }
        ?>
        <?php pivotpress_out_story_type_svg ($story->story_type); ?>
    </div>
</article>
