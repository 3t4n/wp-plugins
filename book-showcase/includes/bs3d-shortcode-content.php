<ul id="bk-list" class="bk-list clearfix">
    <?php while ( $loop->have_posts() ) : $loop->the_post();
        // GET all values from DB associated with the BOOK POST TYPE
        $post_id = get_the_ID();
        $book_id = 'book-'. $post_id;
        // allowed html tags in content
        $allowed_html = [
            'a' => [
                'href' => [],
                'title' => [],
                'target' => [],
            ],
            'br' => [],
            'em' => [],
            'strong' => [],
            'hr' => [],
            'ul' => [],
            'del' => [],
            'ol' => [],
            'li' => [],
            'i' => [
                'class' => [],
            ],
        ];
        // temp value

        $bs3dmaincontent_tmp = get_post_meta( $post_id, 'bs3dmaincontent', true );
        $bs3d_author_name_tmp = get_post_meta( $post_id, 'bs3d_author_name', true );
        $bs3d_front_cover_tmp = get_post_meta( $post_id, 'bs3d_front_cover', true );
        $bs3d_back_cover_tmp = get_post_meta( $post_id, 'bs3d_back_cover', true );
        $bs3d_show_author_book_on_cover_tmp = get_post_meta( $post_id, 'bs3d_show_author_book_on_cover', true );
        $bs3dbackcovertext_tmp = get_post_meta( $post_id, 'bs3dbackcovertext', true );
        $bs3d_show_text_on_back_cover_tmp = get_post_meta( $post_id, 'bs3d_show_text_on_back_cover', true );
        $bs3d_book_author_font_size_tmp = get_post_meta( $post_id, 'bs3d_book_author_font_size', true );
        $bs3d_book_title_font_size_tmp = get_post_meta( $post_id, 'bs3d_book_title_font_size', true );
        $bs3d_download_btn_link_tmp = get_post_meta( $post_id, 'bs3d_download_btn_link', true );

        //unique style temp var
        $bs3d_author_book_title_color_tmp = get_post_meta( $post_id, 'bs3d_author_book_title_color', true );
        $bs3d_book_bg_color_tmp = get_post_meta( $post_id, 'bs3d_book_bg_color', true );
        $bs3d_book_cover_bg_color_tmp = get_post_meta( $post_id, 'bs3d_book_cover_bg_color', true );
        $bs3d_book_nav_bg_color_tmp = get_post_meta( $post_id, 'bs3d_book_nav_bg_color', true );
        $bs3d_book_nav_hover_color_tmp = get_post_meta( $post_id, 'bs3d_book_nav_hover_color', true );
        $bs3d_book_nav_color_tmp = get_post_meta( $post_id, 'bs3d_book_nav_color', true );
        $bs3d_download_btn_bg_color_tmp = get_post_meta( $post_id, 'bs3d_download_btn_bg_color', true );
        $bs3d_download_btn_hover_color_tmp = get_post_meta( $post_id, 'bs3d_download_btn_hover_color', true );
        $bs3d_download_btn_text_color_tmp = get_post_meta( $post_id, 'bs3d_download_btn_text_color', true );


        //sanitzied value
        $bs3dmaincontent = (!empty($bs3dmaincontent_tmp)) ? wp_kses($bs3dmaincontent_tmp, $allowed_html) : '';
        $bs3d_author_name = (!empty($bs3d_author_name_tmp)) ? esc_attr( $bs3d_author_name_tmp) : '';
        $bs3d_front_cover = (!empty($bs3d_front_cover_tmp)) ? esc_url($bs3d_front_cover_tmp) : '';
        $bs3d_back_cover = (!empty($bs3d_back_cover_tmp)) ? esc_url($bs3d_back_cover_tmp) : '';
        $bs3d_show_author_book_on_cover = (!empty($bs3d_show_author_book_on_cover_tmp)) ? esc_attr($bs3d_show_author_book_on_cover_tmp): '';
        $bs3dbackcovertext = (!empty($bs3dbackcovertext_tmp)) ? wp_kses($bs3dbackcovertext_tmp, $allowed_html) : '';
        $bs3d_show_text_on_back_cover = (!empty($bs3d_show_text_on_back_cover_tmp)) ? esc_attr( $bs3d_show_text_on_back_cover_tmp ) : '';
        $bs3d_book_author_font_size = (!empty($bs3d_book_author_font_size_tmp)) ? esc_attr($bs3d_book_author_font_size_tmp) : '';
        $bs3d_book_title_font_size = (!empty($bs3d_book_title_font_size_tmp)) ? esc_attr($bs3d_book_title_font_size_tmp) : '';
        $bs3d_download_btn_link = (!empty($bs3d_download_btn_link_tmp)) ? esc_url($bs3d_download_btn_link_tmp) : '#';

        // GET UNIQUE STYLES VARS
        $bs3d_author_book_title_color = (!empty($bs3d_author_book_title_color_tmp)) ? esc_attr($bs3d_author_book_title_color_tmp): '';
        $bs3d_book_bg_color = (!empty($bs3d_book_bg_color_tmp)) ? esc_attr($bs3d_book_bg_color_tmp) : '';
        $bs3d_book_cover_bg_color = (!empty($bs3d_book_cover_bg_color_tmp)) ? esc_attr($bs3d_book_cover_bg_color_tmp) : '';
        $bs3d_book_nav_bg_color = (!empty($bs3d_book_nav_bg_color_tmp)) ? esc_attr($bs3d_book_nav_bg_color_tmp) : '';
        $bs3d_book_nav_hover_color = (!empty($bs3d_book_nav_hover_color_tmp)) ? esc_attr($bs3d_book_nav_hover_color_tmp) : '';
        $bs3d_book_nav_color = (!empty($bs3d_book_nav_color_tmp)) ? esc_attr($bs3d_book_nav_color_tmp) : '';
        $bs3d_download_btn_bg_color = (!empty($bs3d_download_btn_bg_color_tmp)) ? esc_attr($bs3d_download_btn_bg_color_tmp) : '';
        $bs3d_download_btn_hover_color = (!empty($bs3d_download_btn_hover_color_tmp)) ? esc_attr($bs3d_download_btn_hover_color_tmp) : '';
        $bs3d_download_btn_text_color = (!empty($bs3d_download_btn_text_color_tmp)) ? esc_attr($bs3d_download_btn_text_color_tmp) : '';
        if ( ('yes' == $bs3d_image_crop) && !empty($bs3d_front_cover) && !empty($bs3d_back_cover) && !empty($bs3d_image_width) && !empty($bs3d_image_height)) {
            $bs3d_front_cover  = aq_resize($bs3d_front_cover, $bs3d_image_width, $bs3d_image_height, true);
            $bs3d_back_cover  = aq_resize($bs3d_back_cover, $bs3d_image_width, $bs3d_image_height, true);
        }
        // cut string at specific length but not in the middle of word and then turns it to an array
        $splited_content = explode("|cut|", wordwrap($bs3dmaincontent, $bs3d_chars_per_page, "|cut|"));
        $content_for_first_para = array_shift($splited_content);


        ?>
        <!--I will have to make the style unique to all books -->
        <!--UNIQUE STYLE FOR EACH BOOK-->
        <style type="text/css">
            /* Cover color */
            #<?php echo $book_id; ?> .bk-front > div,
            #<?php echo $book_id; ?> .bk-back,
            #<?php echo $book_id; ?> .bk-left,
            #<?php echo $book_id; ?> .bk-front:after {
                background-color:<?php echo (!empty($bs3d_book_cover_bg_color)) ? $bs3d_book_cover_bg_color : '#bbbbbb'; ?>;
                }

             /* Author and title color*/

             /*AUTHOR INFO ON Left side */
            #<?php echo $book_id; ?> .bk-left h2 , #<?php echo $book_id; ?> .bk-cover h2{
                color:<?php echo (!empty($bs3d_author_book_title_color)) ? $bs3d_author_book_title_color : '#fff'; ?>;
            }
            /* setting default style , and it is ready for applying custom style on left side info too*/
            #<?php echo $book_id; ?> .bk-left h2 span:first-child {
                font-size: 11px;
            }
            #<?php echo $book_id; ?> .bk-left h2 span:last-child {
                font-size: 14px;
                text-transform: capitalize;
            }

            /*Author info on FRONT COVER*/
            #<?php echo $book_id; ?> .bk-cover h2 span:first-child{
                font-size: <?php echo (!empty($bs3d_book_author_font_size)) ? $bs3d_book_author_font_size : '13px'; ?>;
            }
            #<?php echo $book_id; ?> .bk-cover h2 span:last-child {
                font-size: <?php echo (!empty($bs3d_book_title_font_size)) ? $bs3d_book_title_font_size : '20px'; ?> ;
            }

            /*Inside page*/
            #<?php echo $book_id; ?> .bk-page, #<?php echo $book_id; ?> .bk-right, #<?php echo $book_id; ?> .bk-top, #<?php echo $book_id; ?> .bk-bottom, #<?php echo $book_id; ?> .bk-content{
                background: <?php echo (!empty($bs3d_book_bg_color)) ? $bs3d_book_bg_color : '#fff'; ?> ;
            }

            /* Inside page nav*/
            #<?php echo $book_id; ?> .bk-page nav span {
                color: <?php echo (!empty($bs3d_book_nav_color)) ? $bs3d_book_nav_color : '#fff'; ?>;
                background: <?php echo (!empty($bs3d_book_nav_bg_color)) ? $bs3d_book_nav_bg_color : '#bbbbbb'; ?>;
                font-size: 20px;
                line-height: 26px;
            }
            #<?php echo $book_id; ?> .bk-page nav span:hover {
                background: <?php echo (!empty($bs3d_book_nav_hover_color)) ? $bs3d_book_nav_hover_color : '#9A9A9A'; ?>;
            }


            /*Inside page download button*/
            #<?php echo $book_id; ?> span.download-book {
                background: <?php echo (!empty($bs3d_download_btn_bg_color)) ? $bs3d_download_btn_bg_color : '#bbbbbb'; ?>;
                color: <?php echo (!empty($bs3d_download_btn_text_color)) ? $bs3d_download_btn_text_color : '#fff'; ?>;
            }
            #<?php echo $book_id; ?> span.download-book:hover {
                background: <?php echo (!empty($bs3d_download_btn_hover_color)) ? $bs3d_download_btn_hover_color : '#9A9A9A'; ?>;
            }

        </style>
        <li class="<?php echo $book_id; ?>">
            <div class="bk-book book-1 <?php echo $book_id; ?> bk-bookdefault" id="<?php echo $book_id; ?>">
                <div class="bk-front">
                    <div class="bk-cover-back" ></div>
                    <div class="bk-cover" style="background-image: url('<?php echo $bs3d_front_cover; ?>');">

                    <?php if ( 'yes' == $bs3d_show_author_book_on_cover ): ?>
                        <h2>
                            <span><?php echo $bs3d_author_name; ?></span>
                            <span> <?php echo the_title(); ?></span>
                        </h2>
                    <?php endif; ?>
                    </div> <!--ends .bk-cover-->
                </div> <!--ends .bk-front-->

                <div class="bk-page">
                    <?php if (!empty($content_for_first_para)): ?>
                        <div class="bk-content bk-content-current">
                            <p><?php echo $content_for_first_para; ?> </p>
                        </div>
                    <?php endif; ?>
                    <?php if ( count($splited_content) ):
                        foreach($splited_content as $content):
                            ?>
                            <div class="bk-content">
                                <p><?php echo $content; ?> </p>
                            </div>
                        <?php endforeach; endif; ?>
                </div> <!--ends .bk-page -->
                <div class="bk-back" style="background-image: url(' <?php echo $bs3d_back_cover; ?> ')">
                <?php if ( 'yes' === $bs3d_show_text_on_back_cover ) {
                    echo "<p>{$bs3dbackcovertext}</p>";
                }?>
                </div> <!--ends .bk-back -->
                <div class="bk-right"></div>
                <div class="bk-left">
                    <h2>
                        <span><?php echo $bs3d_author_name; ?></span>
                        <span><?php echo the_title(); ?></span>
                    </h2>
                </div> <!--ends .bk-left-->
                <div class="bk-top"></div>
                <div class="bk-bottom"></div>
            </div> <!--ends .bk-book -->

            <div class="bk-info <?php echo $book_id; ?> ">
                <button class="bk-bookback"> <span class="btn-content"> <i class="icon-loop"></i> Flip </span></button>
                <button class="bk-bookview"> <span class="btn-content"> <i class="icon-book-open"></i> Read</span></button>
            </div>
        </li>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</ul>

