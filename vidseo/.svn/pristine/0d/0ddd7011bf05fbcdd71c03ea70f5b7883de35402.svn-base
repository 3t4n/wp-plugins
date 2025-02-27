<div class="vidseo_wrapper" style="width: <?php echo $data['width']; ?>;">

    <?php if ($data['hide_title'] == false) { ?>
        <h2 class="vidseo_title" style="<?php echo $data['title_bg'] . $data['title_txt']; ?>">
            <?php echo $data['title']; ?>
        </h2>
    <?php } ?>

    <?php if ($data['host'] == "vidseo_youtube") { ?>

        <div class="vidseo_youtube">

            <iframe src='//www.youtube.com/embed/<?php echo $data['video_id'] . "/?"; foreach($params as $key => $value) { echo $value; } echo $data['controls']; ?>' width="100%" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>

        </div>
   
    <?php } elseif ($data['host'] == "vidseo_vimeo") { ?>

        <div class="vidseo_vimeo">

            <iframe title="vimeo-player" src="https://player.vimeo.com/video<?php echo $data['video_id'] . '/?'; foreach($params as $key => $value) { echo $value; } ?>" width="100%" frameborder="0" allowfullscreen></iframe>

        </div>

    <?php } ?>

    <?php if ($data['disable_trans'] == false) { ?>

    <div class="vidseo_collapse" style="<?php if ($data['hide_trans'] == true) { echo "display: none;"; } ?>">
        <div class="vidseo_btn" style="<?php echo $data['trans_bg'] . $data['trans_txt']; ?>">
            <?php echo $data['excerpt']; ?>
        </div>
        <div class="vidseo_collapse_content" style="<?php echo $data['trans_bg'] . $data['trans_txt']; ?>">
            <?php echo wpautop($data['content']); ?>
        </div>
    </div>

    <?php } ?>

</div>