<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

global $post;

$authors = Helpers::post_authors(true);
$term_id  = get_queried_object_id();
$term     = get_term($term_id);
$image_id = get_term_meta( $term_id, 'author-taxonomy-image-id', true );


if (!empty($image_id)) {
    $image_src = wp_get_attachment_image_src($image_id, 'full');
    if ($image_src) {
        $gs_book_author_img_src = $image_src[0];
    } else {
        $gs_book_author_img_src = false;
    }
} else {
    $gs_book_author_img_src = false;
}

$authors = get_terms( array(
    'taxonomy'   => 'gsb_author',
    'hide_empty' => false,
));


get_header();
?>

    <div class="gs-containeer gsb-author-single-container">

        <div class="gs-roow">

            <div class="gs-col-md-4">

                <div class="gsb-as-content-left">
                    
                    <div class="gsb-author-img-wrpper">

                        <?php 
                            $thumbnail = sprintf( '<img src="%s" alt="%s" itemprop="image"/>', $gs_book_author_img_src, 'author image' );
                            echo $thumbnail;
                        ?>

                    </div>

                </div>

            </div>

            <div class="gs-col-md-8">

                <div class="gsb-as-content-right">
                    
                    <h3 class="gsb-author-title-single"> <?php echo esc_html(  $term->name ); ?> </h3>

                    <div class="gsb-author-details-single">
                        <?php echo wpautop($term->description ); ?>
                    </div>

                    <div class="gsb-author-bio">
                        <?php include TemplateLoader::locate_template( 'partials/gs-author-socials.php' ); ?>
                    </div>

                </div>

            </div>
        </div>


        <!-- Related Author -->
        <div class="gsb-related-author gsb-sp-section-space">
            <h3 class="gsb-author-title-single"><?php esc_html_e( 'Other Authors', 'gsbookshowcase' ); ?></h3>

            <div class="swiper">
                <div class="gsb-ra-wrapper">
                    <?php     
                        foreach( $authors as $author ) {

							if( $term_id == $author->term_id ) continue;
                        
                            ?>
                                <div class="gsb-ra-item">
                                    <div class="gsb_author_image">
                                        <?php
                                            if ( !empty($author->term_id) ) {
                                                $gs_book_author_img = get_term_meta($author->term_id, 'author-taxonomy-image-id', true);
                                                echo wp_get_attachment_image($gs_book_author_img, 'full');
                                            }
                                        ?>

                                        <div class="gsb-ra-img-overlay">
											<a href="<?php echo esc_url( get_term_link( $author->term_id, 'gsb_author' ) ); ?>">
												<div class="sb-ra-img-overlay-icon">
													<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" clip-rule="evenodd" d="M24.14 9.12051L17.465 15.7955C16.4591 16.8012 15.0949 17.3662 13.6725 17.3662C12.2501 17.3662 10.8859 16.8012 9.88001 15.7955C9.77638 15.6968 9.69354 15.5784 9.63636 15.4472C9.57919 15.316 9.54884 15.1747 9.54709 15.0316C9.54535 14.8885 9.57224 14.7465 9.6262 14.6139C9.68016 14.4814 9.76009 14.361 9.86129 14.2598C9.96248 14.1586 10.0829 14.0787 10.2154 14.0247C10.348 13.9707 10.49 13.9438 10.6331 13.9456C10.7762 13.9473 10.9175 13.9777 11.0487 14.0349C11.1799 14.092 11.2983 14.1749 11.397 14.2785C11.6957 14.5774 12.0503 14.8146 12.4407 14.9763C12.831 15.1381 13.2495 15.2214 13.672 15.2214C14.0946 15.2214 14.513 15.1381 14.9033 14.9763C15.2937 14.8146 15.6483 14.5774 15.947 14.2785L22.622 7.60351C22.9208 7.30468 23.1579 6.94993 23.3196 6.5595C23.4813 6.16907 23.5646 5.75061 23.5646 5.32801C23.5646 4.90541 23.4813 4.48695 23.3196 4.09651C23.1579 3.70608 22.9208 3.35133 22.622 3.05251C22.3232 2.75368 21.9684 2.51664 21.578 2.35492C21.1876 2.1932 20.7691 2.10996 20.3465 2.10996C19.9239 2.10996 19.5054 2.1932 19.115 2.35492C18.7246 2.51664 18.3698 2.75368 18.071 3.05251L14.431 6.69151C14.23 6.89267 13.9573 7.00574 13.6729 7.00583C13.3885 7.00593 13.1157 6.89304 12.9145 6.69201C12.7133 6.49097 12.6003 6.21826 12.6002 5.93386C12.6001 5.64946 12.713 5.37667 12.914 5.17551L16.554 1.53551C17.5631 0.545261 18.9223 -0.00655594 20.3361 5.87896e-05C21.7499 0.00667352 23.1039 0.571185 24.1037 1.57083C25.1035 2.57047 25.6682 3.92441 25.675 5.3382C25.6818 6.75198 25.1301 8.11129 24.14 9.12051ZM15.189 12.0025C14.9878 12.2036 14.715 12.3166 14.4305 12.3166C14.146 12.3166 13.8732 12.2036 13.672 12.0025C13.0683 11.3995 12.2498 11.0608 11.3965 11.0608C10.5432 11.0608 9.72477 11.3995 9.12101 12.0025L3.05201 18.0725C2.47274 18.681 2.15432 19.4919 2.16474 20.332C2.17517 21.172 2.51362 21.9747 3.10782 22.5687C3.70202 23.1626 4.50488 23.5007 5.34496 23.5108C6.18504 23.5208 6.99576 23.202 7.60401 22.6225L10.638 19.5885C10.7367 19.4849 10.8551 19.402 10.9863 19.3449C11.1175 19.2877 11.2588 19.2573 11.4019 19.2556C11.545 19.2538 11.687 19.2807 11.8196 19.3347C11.9521 19.3887 12.0725 19.4686 12.1737 19.5698C12.2749 19.671 12.3549 19.7914 12.4088 19.9239C12.4628 20.0565 12.4897 20.1985 12.4879 20.3416C12.4862 20.4847 12.4558 20.626 12.3987 20.7572C12.3415 20.8884 12.2586 21.0068 12.155 21.1055L9.12101 24.1395C8.11193 25.1298 6.75269 25.6816 5.3389 25.675C3.92512 25.6683 2.57111 25.1038 1.57133 24.1042C0.571553 23.1045 0.00686326 21.7506 6.21492e-05 20.3368C-0.00673897 18.923 0.544898 17.5637 1.53501 16.5545L7.60401 10.4855C8.60992 9.47982 9.9741 8.91485 11.3965 8.91485C12.8189 8.91485 14.1831 9.47982 15.189 10.4855C15.3901 10.6867 15.5031 10.9595 15.5031 11.244C15.5031 11.5285 15.3901 11.8013 15.189 12.0025Z" fill="white"/>
													</svg>
												</div>
											</a>
                                        </div>
                                    </div>

                                    <div class="gsb-ra-author">
                                        <h3><a href="<?php echo esc_url( get_term_link( $author->term_id, 'gsb_author' ) ); ?>"><?php echo esc_html( $author->name ); ?></a></h3>
                                    </div>                                    
                                </div>
                            <?
                        }
                    ?>
                </div>

                <div class="swiper-nav-buttons">
                    <div class="swiper-button-prev"><svg viewBox="0 0 9.91 17"><path d="M1511,5458.51l-1.41,1.42,8.48,8.48,1.42-1.41Zm-1.41,15.56,1.41,1.42,8.49-8.49-1.42-1.41Z" transform="translate(-1509.59 -5458.5)"/></svg></div>
                    <div class="swiper-button-next"><svg viewBox="0 0 9.91 17"><path d="M1511,5458.51l-1.41,1.42,8.48,8.48,1.42-1.41Zm-1.41,15.56,1.41,1.42,8.49-8.49-1.42-1.41Z" transform="translate(-1509.59 -5458.5)"/></svg></div>
                </div>                
            </div>
        </div>

        <div class="gsb-related-books gsb-sp-section-space">

            <h3 class="gsb-author-title-single"> More books by <?php echo esc_html(  $term->name ); ?></h3>

            <div class="gsb_author_books">
                <?php
                $args = array(
                    'post_type' => 'gs_bookshowcase',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'gsb_author',
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        ),
                    ),
                );

                $query = new \WP_Query( $args );

                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        ?>
                        <div class="gsb-author-book">

                            <div class="gsb-rb-cover">

                                <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('full');
                                }
                                ?>

                            </div>

                            <div class="gsb-rb-title">
                                <h3><a href="<?php the_permalink( get_the_ID() ); ?>"><?php the_title(); ?></a></h3>
                            </div>

                        </div>
                        <?php
                    }
                }
                ?>
            </div>

        </div>

    </div>
<?php

get_footer();
