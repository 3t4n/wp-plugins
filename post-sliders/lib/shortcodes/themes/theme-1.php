<?php 
    if( !defined( 'ABSPATH' ) ){
        exit;
    }
?>

<style type="text/css">
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .post-slider-items {
        display: flex;
        flex-direction: column;
        background:<?php echo $tppostsliderpro_bg_color; ?>;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-item {
        -webkit-transform: unset;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .slider-post-thumb-wrap {
        position: relative;
        display: block;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .slider-post-thumb-wrap img{
        width: 100%;
        height:270px;
        object-fit: cover;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> ul.slider-post-cats {
        position: absolute;
        top: auto;
        bottom: 15px;
        left: 25px;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> ul.slider-post-cats {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> ul.slider-post-cats li {
        display: inline-block;
        background: <?php echo $tppostsliderpro_catbg_color; ?>;
        text-decoration: none;
        outline: none;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> ul.slider-post-cats li:hover {
        background: <?php echo $tppostsliderpro_cathoverbg_color; ?>;
        text-decoration: none;
        outline: none;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> ul.slider-post-cats li a {
        color:<?php echo $tppostsliderpro_cat_color; ?>;
        text-decoration: none;
        outline: none;
        box-shadow: none;
        display: block;
        font-size: 12px;
        padding: 5px 8px;
        font-weight: 600;
        overflow: hidden;
        line-height: 1.3;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> ul.slider-post-cats li a:hover {
        color:<?php echo $tppostsliderpro_cat_hover_color; ?>;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .post-slider-content-wrap {
        padding: 25px;
        position: relative;
        display: flex;
        flex-direction: column;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .post-slider-content-wrap h2.title,
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .post-slider-content-wrap h2.title a {
        color:<?php echo $tppostsliderpro_titletext_color; ?>;
        font-size: <?php echo $tppostsliderpro_titlefont_size; ?>px;
        text-align: <?php echo $tppostsliderpro_title_alignment; ?>;
        font-weight: 600;
        line-height: 1.3;
        text-decoration: none;
        outline: none;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .post-slider-content-wrap h2.title a:hover {
        color:<?php echo $tppostsliderpro_titlehover_color; ?>;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .post-slider-content-wrap p {
        color:<?php echo $tppostsliderpro_content_colors; ?>;
        font-size: <?php echo $tppostsliderpro_content_fontsize; ?>px;
        text-align: <?php echo $tppostsliderpro_content_alignment; ?>;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
        padding-bottom:15px;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .post-slider-content-wrap a.tp-read-more{
        display: inline-block;
        overflow: hidden;
        margin: 0;
        padding: 0;
        padding-bottom:15px;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .post-meta {
        font-size: 15px;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .post-meta ul {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        column-gap: 10px;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> li.post-author {

    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> li i.fa {
        margin-right:5px;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> li.post-author,
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> li.post-author a {
        color:<?php echo $tppostsliderpro_author_color; ?>;
        font-size: <?php echo $tppostsliderpro_author_size; ?>px;
        margin: 0;
        padding: 0;
        text-decoration: none;
        text-transform: capitalize;
        outline: none;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> li.post-author i.fa{
        color:<?php echo $tppostsliderpro_author_color; ?>;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> li.post-date {
        color:<?php echo $tppostsliderpro_date_color; ?>;
        font-size: <?php echo $tppostsliderpro_date_size; ?>px;
        margin: 0;
        padding: 0;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> li.post-comments {
        color:<?php echo $tppostsliderpro_comments_color; ?>;
        font-size: <?php echo $tppostsliderpro_comments_size; ?>px;
        margin: 0;
        padding: 0;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> a.tp-read-more {
        color:<?php echo $tppostsliderpro_excerpt_colors; ?>;
    }
    .post-slider-area.id-<?php echo esc_attr( $postid ); ?> a.tp-read-more:hover {
        color:<?php echo $tppostsliderpro_excerpt_bgcolors; ?>;
    }

    <?php if ( $tppostsliderpr_navigation == 'true' ){ ?>
        .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-nav{ }
        .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-next,
        .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-prev{
            position: absolute;
            top: 0;
            left: auto;
            right: 0;
            width: 35px;
            height: 35px;
            line-height: 35px !important;
            text-align:center;
            background: <?php echo $tppostsliderpr_navbgcolors; ?> !important;
            color: <?php echo $tppostsliderpr_navtextcolors; ?> !important;
            border:1px solid <?php echo $tppostsliderpr_navbgcolors; ?> !important;
            border-radius:<?php echo $tppostsliderpr_nav_type; ?>px !important;
        }
        .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-next:hover,
        .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-prev:hover{
            background: <?php echo $tppostsliderpr_navbghovercolors; ?> !important;
            color:<?php echo $tppostsliderpr_navtextcolors_hover; ?> !important;
            border:1px solid <?php echo $tppostsliderpr_navbghovercolors; ?> !important;
        }
        .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-next{
            right: 40px;
        }
        .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-prev{ }

        <?php if ( $tppostsliderpr_navigation_position == 'left' ){ ?>
            .post-slider-area.id-<?php echo esc_attr( $postid ); ?>{
                padding-top:50px;
            }
            .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-next{
                right: auto;
            }
            .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-prev{
                left:40px;
            }
        <?php }elseif ( $tppostsliderpr_navigation_position == 'center' ){ ?>
            .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-next{
                top: 50%;
                transform: translateY(-50%);
                left:0;
            }
            .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-prev{
                top: 50%;
                transform: translateY(-50%);
            }
        <?php }elseif ( $tppostsliderpr_navigation_position == 'right' ){ ?>
            .post-slider-area.id-<?php echo esc_attr( $postid ); ?>{
                padding-top:50px;
            }
        <?php } ?>
    <?php } ?>

    <?php if ( $tppostsliderpr_paginations == 'true' ){ ?> 
        .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-dots{
            display: block;
            text-align: center;
            width: 100%;
            overflow: hidden;
            margin: 0;
            margin-top: 10px;
            padding: 0;
        }
        .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-dots .owl-dot{
            width: 10px;
            height: 10px;
            display: inline-block;
            position: relative;
            background: <?php echo $tppostsliderpr_paginations_bgcolor; ?> !important;
            margin: 0px 4px;
            border-radius: 50%;
        }
        .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-dots .owl-dot.active{
            background: <?php echo $tppostsliderpr_paginations_color; ?> !important;
        }
        .post-slider-area.id-<?php echo esc_attr( $postid ); ?> .owl-dots{
            text-align:<?php echo $tppostsliderpr_paginationsposition; ?>;
        }
    <?php } ?>
</style>

<script type="text/javascript">
    jQuery(document).ready(function($){
        $(".post-slider-area.id-<?php echo esc_attr( $postid ); ?>").owlCarousel({
            lazyLoad: true,
            items:<?php echo $tppostsliderpr_items; ?>,
            autoHeight:<?php echo $tppostsliderpro_autohidemode; ?>,
            loop: <?php echo $tppostsliderpr_loops; ?>,
            margin: <?php echo $tppostsliderpr_margin; ?>,
            autoplay: <?php echo $tppostsliderpro_autoplay; ?>,
            autoplaySpeed: <?php echo $tppostsliderpro_autoplay_speed; ?>,
            autoplayTimeout: <?php echo $tppostsliderpro_autoplaytimeout; ?>,
            autoplayHoverPause: <?php echo $tppostsliderpr_stophover; ?>,
            nav : <?php echo $tppostsliderpr_navigation; ?>,
            dots: <?php echo $tppostsliderpr_paginations; ?>,
            navText: ['<i class="fa fa-angle-right"></i>', '<i class="fa fa-angle-left"></i>'],
            smartSpeed: 450,
            clone:true,
            responsive:{
                0:{
                  items:<?php echo $tppostsliderpr_itemsmobile; ?>,
                },
                678:{
                  items:<?php echo $tppostsliderpr_itemsdesktopsmall; ?>,
                },
                980:{
                  items:<?php echo $tppostsliderpr_itemsdesktop; ?>,
                },
                1199:{
                  items:<?php echo $tppostsliderpr_items; ?>,
                }
            }
        });
    });
</script>

<div class="post-slider-area id-<?php echo esc_attr( $postid ); ?> owl-carousel">
	<?php while ($query->have_posts()) : $query->the_post(); ?>
		<div class="post-slider-items">
			<?php if( has_post_thumbnail( ) ) : ?>
				<div class="slider-post-thumb-wrap">
                    <a href="<?php the_permalink( ); ?>"><?php the_post_thumbnail( ); ?></a>
                    <?php if( $tppostsliderpro_hidecats == 1 ) : ?>
    					<ul class="slider-post-cats">
    						<?php 
    						$categories = get_the_category( get_the_ID() );
    						foreach( $categories as $category ) : ?>
    							<li class="category-items <?php echo $category->name; ?>">
                                    <a href="<?php echo get_category_link( $category->cat_ID ); ?>"><?php echo $category->name; ?></a>
                                </li>
    						<?php endforeach; ?>
    					</ul>
                    <?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="post-slider-content-wrap">
				<h2 class="title"><a href="<?php the_permalink( ); ?>"> <?php the_title(); ?> </a></h2>

                <?php $tp_post_content_limit = (!empty( $excerpt_lenght ) ) ? $excerpt_lenght : ''; ?>
                <p class="blog-text"><?php print wp_trim_words(get_the_excerpt(get_the_ID()), $tp_post_content_limit, ''); ?> </p>
                <?php if ( get_the_content() ) : ?>
                    <a class="tp-read-more" href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More', 'post-sliders'); ?></a>
                <?php endif; ?>

				<div class="post-meta">
					<ul>
                        <?php if( $tppostsliderpro_hideauthors == 1 ) : ?>
						  <li class="post-author"><i class="fa fa fa-user"></i><?php the_author_posts_link(); ?></li>
                        <?php endif; ?>
                        <?php if( $tppostsliderpro_hidedate == 1 ) : ?>
						  <li class="post-date"><i class="fa fa-calendar"></i><?php echo esc_html( get_the_date('M d, Y') ); ?></li>
                        <?php endif; ?>
						<li class="post-comments"><i class="fa fa-comments"></i><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></li>
					</ul>
				</div>
			</div>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
</div>