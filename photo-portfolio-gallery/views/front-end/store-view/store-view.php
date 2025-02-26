<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if (isset($_GET['single_prod_id']) && isset($_GET['portfolio_id']) && $portfolioID == $_GET['portfolio_id']) {
    ?>
    <div id="web_pace_product_<?php echo esc_attr($portfolioID); ?>_<?php echo esc_attr($id); ?>"
         class=" web_pace_product view-store ">
        <div id="web_pace_main-product">
            <div class="web_pace_container-title">

                <?php echo $name; ?>

            </div>

            <div class="web_pace_container-imagery">
                <div class="web_pace_thumbnail-wrapper">
                    <div class="web_pace_thumbnail-prev-button ">
                            <span class="web_pace_icon-arrow_up">
                            </span>
                    </div>
                    <div class=" web_pace_thumbnail-carousel">
                        <ul class="web_pace_thumbnails">
                            <?php
                            foreach ($imgurl as $key => $value) {
                                if ($key === count($imgurl) - 1) continue;

                                ?>

                                <li class="web_pace_thumbnail" style="display: block">

                                <?php
                                switch (photo_gallery_youtube_or_vimeo_portfolio($value)) {
                                    case 'image': ?>
                                        <a class="not_open p_responsive_lightbox"
                                           href="<?php echo esc_attr($value); ?>">
                                            <img class="web_pace_thumbnail-image"
                                                 src=" <?php echo esc_attr($value); ?>"/>

                                        </a>
                                        <?php
                                        break;
                                    case 'youtube':
                                        $videourl = photo_gallery_get_video_id_from_url($value); ?>
                                        <a class="p_responsive_lightbox"
                                           href="//www.youtube.com/embed/<?php echo esc_attr($videourl[0]); ?>">
                                            <img class="web_pace_thumbnail-image "
                                                 src="//img.youtube.com/vi/<?php echo $videourl[0]; ?>/mqdefault.jpg"/></a>
                                        <div class="play-icon <?php echo esc_attr($videourl[1]); ?>-icon thumb-you-icon thumbnail-icon"
                                             data-href="//www.youtube.com/embed/<?php echo esc_attr($videourl[0]); ?>"
                                             data-src="//img.youtube.com/vi/<?php echo $videourl[0]; ?>/mqdefault.jpg"></div>

                                        <?php
                                        break;
                                    case 'vimeo':
                                        $videourl = photo_gallery_get_video_id_from_url($value);
                                        $hash = unserialize(wp_remote_fopen("https://vimeo.com/api/v2/video/" . $videourl[0] . ".php"));
                                        $imgsrc = $hash[0]['thumbnail_large'];
                                        ?>
                                        <a class="not_open p_responsive_lightbox"
                                           href="https://vimeo.com/<?php echo esc_attr($videourl[0]); ?>">
                                            <img class="web_pace_thumbnail-image "
                                                 src="<?php echo esc_attr($imgsrc); ?>"/></a>
                                        <div class="play-icon vimeo-icon thumb-vimeo-icon thumbnail-icon"
                                             data-href="https://vimeo.com/<?php echo esc_attr($videourl[0]); ?>"
                                             data-src="<?php echo esc_attr($imgsrc); ?>"></div>


                                        <?php break; ?>


                                        </li>


                                        <?php
                                }
                            } ?>
                        </ul>
                    </div>
                    <div class="web_pace_thumbnail-next-button">
                            <span class="web_pace_icon-arrow_down">

                            </span>
                    </div>

                </div><!--thumb wrapper-->
                <div class="web_pace_main-carousel-wrapper">
                    <div class="web_pace_main-image-carousel " id="main-image-carousel">

                        <?php
                        switch (photo_gallery_youtube_or_vimeo_portfolio($imgurl[0])) {
                            case 'image': ?>
                                <a class="p_responsive_lightbox" href="<?php echo esc_attr($imgurl[0]); ?> ">
                                    <img class="web_pace_product-image first-image "
                                         src="<?php echo esc_attr($imgurl[0]); ?> ">
                                </a>
                                <div class="main-icon play-icon youtube-icon main-you-icon" style="display: none"></div>

                                <?php
                                break;
                            case 'youtube':
                                $videourl = photo_gallery_get_video_id_from_url($imgurl[0]); ?>
                                <a class="p_responsive_lightbox"
                                   href="//www.youtube.com/embed/<?php echo esc_attr($videourl[0]); ?>">
                                    <img class="web_pace_product-image first-image  youtube-img"
                                         src="//img.youtube.com/vi/<?php echo $videourl[0]; ?>/mqdefault.jpg"/></a>
                                <div class="main-icon play-icon youtube-icon main-you-icon"></div>

                                <?php
                                break;
                            case 'vimeo':
                                $videourl = photo_gallery_get_video_id_from_url($imgurl[0]);
                                $hash = unserialize(wp_remote_fopen("https://vimeo.com/api/v2/video/" . $videourl[0] . ".php"));
                                $imgsrc = $hash[0]['thumbnail_large'];
                                ?>
                                <a class="p_responsive_lightbox"
                                   href="https://vimeo.com/<?php echo esc_attr($videourl[0]); ?>">
                                    <img class="web_pace_product-image first-image vimeo-img"
                                         src="<?php echo esc_attr($imgsrc); ?>"/></a>
                                <div class=" main-icon play-icon vimeo-icon main-vim-icon"></div>
                                <?php break;

                        } ?>

                    </div>
                </div><!--carousel-->
            </div><!--imagery-->
            <div class="web_pace_container-details">
                <div class="web_pace_product-details">
                    <?php echo $description; ?>

                </div>
                <div class="web_pace_share-buttons">

                </div>
            </div>

        </div>
    </div>


    <?php

} else {

    ?>

    <section id="web_pace_portfolio_content_<?php echo esc_attr($portfolioID); ?>"
             class=" photo-portfolio-content <?php if ($portfolioShowSorting == 'on') {
                 echo 'sortingActive ';
             }
             if ($portfolioShowFiltering == 'on') {
                 echo 'filteringActive';
             } ?>"
             data-portfolio-id="<?php echo esc_attr($portfolioID); ?>">
        <div id="web-pace-container-loading-overlay_<?php echo esc_attr($portfolioID); ?>"></div>
        <?php if (($sortingFloatLgal == 'left' && $filteringFloatLgal == 'left') || ($sortingFloatLgal == 'right' && $filteringFloatLgal == 'right')) { ?>
        <div id="web_pace_portfolio_options_and_filters_<?php echo esc_attr($portfolioID); ?>">
            <?php } ?>
            <?php if ($portfolioShowSorting == "on") { ?>
                <div id="web_pace_portfolio_options_<?php echo esc_attr($portfolioID); ?>"
                     data-sorting-position="<?php echo esc_attr($photo_gallery_get_options["photo_gallery_ht_view8_sorting_float"]); ?>">
                    <ul id="sort-by" class="option-set clearfix" data-option-key="sortBy">
                        <?php if ($photo_gallery_get_options["photo_gallery_ht_view8_sorting_name_by_default"] != ''): ?>
                            <li><a href="#sortBy=original-order" data-option-value="original-order" class="selected"
                                   data><?php echo esc_attr($photo_gallery_get_options["photo_gallery_ht_view8_sorting_name_by_default"]); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if ($photo_gallery_get_options["photo_gallery_ht_view8_sorting_name_by_id"] != ''): ?>
                            <li><a href="#sortBy=load_date"
                                   data-option-value="load_date"><?php echo esc_attr($photo_gallery_get_options["photo_gallery_ht_view8_sorting_name_by_id"]); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if ($photo_gallery_get_options["photo_gallery_ht_view8_sorting_name_by_name"] != ''): ?>
                            <li><a href="#sortBy=name"
                                   data-option-value="name"><?php echo esc_attr($photo_gallery_get_options["photo_gallery_ht_view8_sorting_name_by_name"]); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if ($photo_gallery_get_options["photo_gallery_ht_view8_sorting_name_by_random"] != ''): ?>
                            <li id="shuffle"><a data-option-value="random"
                                                href='#shuffle'><?php echo esc_attr($photo_gallery_get_options["photo_gallery_ht_view8_sorting_name_by_random"]); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <ul id="port-sort-direction" class="option-set clearfix">
                        <?php if ($photo_gallery_get_options["photo_gallery_ht_view8_sorting_name_by_asc"] != ''): ?>
                            <li><a href="#sortAscending=true" data-option-value="true" data-option-key="number"
                                   class="selected"><?php echo esc_attr($photo_gallery_get_options["photo_gallery_ht_view8_sorting_name_by_asc"]); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if ($photo_gallery_get_options["photo_gallery_ht_view8_sorting_name_by_desc"] != ''): ?>
                            <li><a href="#sortAscending=false" data-option-key="number"
                                   data-option-value="false"><?php echo esc_attr($photo_gallery_get_options["photo_gallery_ht_view8_sorting_name_by_desc"]); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php }
            if ($portfolioShowFiltering == "on") { ?>
                <div id="web_pace_portfolio_filters_<?php echo esc_attr($portfolioID); ?>"
                     data-filtering-position="<?php echo esc_attr($photo_gallery_get_options["photo_gallery_ht_view8_filtering_float"]); ?>">
                    <ul>
                        <li rel="*">
                            <a><?php echo esc_attr($photo_gallery_get_options["photo_gallery_ht_view8_cat_all"]); ?></a>
                        </li>
                        <?php
                        $portfolioCats = explode(",", $portfolioCats);
                        foreach ($portfolioCats as $portfolioCatsValue) {
                            if (!empty($portfolioCatsValue)) {
                                ?>
                                <li rel=".<?php echo str_replace(" ", "_", $portfolioCatsValue); ?>">
                                    <a><?php echo str_replace("_", " ", $portfolioCatsValue); ?></a></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            <?php } ?>
            <?php if (($sortingFloatLgal == 'left' && $filteringFloatLgal == 'left') || ($sortingFloatLgal == 'right' && $filteringFloatLgal == 'right')) { ?>
        </div>
    <?php } ?>
        <div id="web_pace_portfolio_container_<?php echo esc_attr($portfolioID); ?>"
             class="web_pace_portfolio_container super-list variable-sizes clearfix view-<?php echo esc_attr($view_slug); ?>  "
             data-show-loading="<?php echo esc_attr($portfolioShowLoading); ?>"
             data-show-center="<?php echo esc_attr($portfolioposition); ?>" <?php if ($photo_gallery_get_options["photo_gallery_ht_view8_sorting_float"] == "top" && $photo_gallery_get_options["photo_gallery_ht_view8_filtering_float"] == "top") {
            echo "style='clear: both;'";
        } ?>>

            <?php
            foreach ($images as $key => $row) {
                $link = $row->sl_url;
                $descnohtml = strip_tags($row->description);
                $result = substr($descnohtml, 0, 50);
                $catForFilter = explode(",", $row->category);
                ?>
                <div
                        class="portelement portelement_<?php echo esc_attr($portfolioID); ?>  <?php foreach ($catForFilter as $catForFilterValue) {
                            echo str_replace(" ", "_", $catForFilterValue) . " ";
                        } ?> " tabindex="0" data-symbol="<?php echo $row->name; ?>" data-category="alkaline-earth">
                    <p style="display:none;" class="load_date"><?php echo esc_attr($row->web_pace_loadDate); ?></p>
                    <p style="display:none;" class="number"><?php echo esc_attr($row->id); ?></p>
                    <p style="display: none;" class="id"><?php echo esc_attr($row->id); ?></p>
                    <div class="image-block_<?php echo esc_attr($portfolioID); ?>">
                        <?php //echo $row->id;
                        ?>
                        <?php $imgurl = explode(";", $row->image_url); ?>
                        <?php
                        if (strpos(get_permalink(), '/?') !== false) {
                            $product_page_link = get_permalink() . "&single_prod_id=$row->id&portfolio_id=$portfolioID";
                        } else if (strpos(get_permalink(), '/') !== false) {
                            $product_page_link = get_permalink() . "?single_prod_id=$row->id&portfolio_id=$portfolioID";
                        } else {
                            $product_page_link = get_permalink() . "/?single_prod_id=$row->id&portfolio_id=$portfolioID";
                        }
                        ?>
                        <?php
                        if ($row->image_url != ';') {
                            switch (photo_gallery_youtube_or_vimeo_portfolio($imgurl[0])) {
                                case 'image': ?>
                                    <a href="<?php echo $product_page_link; ?>" <?php if ($row->link_target == "on") {
                                        echo 'target="_blank"';
                                    } ?>
                                       data-description="<?php echo esc_attr($row->description); ?>"
                                       title="<?php echo esc_attr($row->name); ?>">
                                        <img alt="<?php echo esc_attr($row->name); ?>"
                                             id="wd-cl-img<?php echo esc_attr($key); ?>"
                                             data-title=" <?php echo photo_gallery_get_image_title($imgurl[0]); ?>"
                                             src="<?php echo esc_url(photo_gallery_get_image_by_sizes_and_src($imgurl[0], array(
                                                 $photo_gallery_get_options['photo_gallery_ht_view8_width'],
                                                 ''
                                             ), false)); ?>"/>
                                    </a>
                                    <?php
                                    break;
                                case 'youtube':

                                    $videourl = photo_gallery_get_video_id_from_url($imgurl[0]); ?>
                                    <a href="<?php echo $product_page_link; ?>" <?php if ($row->link_target == "on") {
                                        echo 'target="_blank"';
                                    } ?>
                                       data-description=" <?php echo esc_attr($row->description); ?>"
                                       class="web_pace_portfolio_item pyoutube "
                                       title="<?php echo esc_attr($row->name); ?>">
                                        <img alt="<?php echo esc_attr($row->name); ?>"
                                             id="wd-cl-img<?php echo esc_attr($key); ?>"
                                             src="//img.youtube.com/vi/<?php echo esc_attr($videourl[0]); ?>/mqdefault.jpg"/>
                                        <div class="play-icon <?php echo esc_attr($videourl[1]); ?>-icon"></div>
                                    </a>
                                    <?php
                                    break;
                                case 'vimeo':
                                    $videourl = photo_gallery_get_video_id_from_url($imgurl[0]);
                                    $hash = unserialize(wp_remote_fopen("https://vimeo.com/api/v2/video/" . $videourl[0] . ".php"));
                                    $imgsrc = $hash[0]['thumbnail_large']; ?>
                                    <a class="web_pace_portfolio_item pvimeo  "
                                       href="<?php echo $product_page_link; ?>" <?php if ($row->link_target == "on") {
                                        echo 'target="_blank"';
                                    } ?>
                                       data-description=" <?php echo esc_attr($row->description); ?>"
                                       title="<?php echo esc_attr($row->name); ?>">
                                        <img src="<?php echo esc_attr($imgsrc); ?>"
                                             alt="<?php echo esc_attr($row->name); ?>"/>
                                        <div class="play-icon vimeo-icon"></div>
                                    </a>
                                    <?php
                                    break;
                            }
                        } else { ?>
                            <img alt="<?php echo esc_attr($row->name); ?>" id="wd-cl-img<?php echo esc_attr($key); ?>"
                                 src="images/noimage.jpg"/>
                            <?php
                        } ?>
                    </div>

                    <?php if ($row->name != "") { ?>
                        <div class="title-block_<?php echo esc_attr($portfolioID); ?>">
                            <h3 class="name"><?php echo $row->name; ?></h3>
                            <a <?php if ($link != '') { ?>  href="<?php echo esc_attr($link); ?>" target="_blank" <?php } else { ?>
                                href="<?php echo $product_page_link; ?>"  <?php if ($row->link_target == "on") {
                                    echo 'target="_blank"';
                                } ?>

                            <?php } ?>
                                    title="<?php echo esc_attr($row->name); ?>">
                                <?php echo $row->name; ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <?php
            } ?>

            <div style="clear:both;"></div>
        </div>


    </section>
<?php }