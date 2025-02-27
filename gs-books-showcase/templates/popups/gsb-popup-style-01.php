<?php

namespace GS_BOOKS;

use function GS_BOOKS_PRO\is_pro_valid;

defined( 'ABSPATH' ) || exit;

?>

<div class="gs-containeer-f" itemscope="" itemtype="http://schema.org/Person">

    <!-- Book Cover & Info -->
    <div class="gs-roow">

        <div class="gs-col-md-12">

            <div class="gsb-sp-top-content gsb-sp-spacing-border">

                <div class="gsb-sp-cover-img">

                    <div class="gsb-cover-wrapper">

                        <!-- Book Thumbnail -->
                        <?php include TemplateLoader::locate_template( 'singles/partials/post-thumbnails.php' ); ?>

                    </div>

                </div>

                <div class="gsb-sp-info-details">

                    <div class="gsb-sp-info-details-top gsb--scrollbar">

                        <div class="gsb-title">
                            <h3><?php the_title(); ?></h3>
                        </div>

                        <!-- Book Author -->
                        <?php include TemplateLoader::locate_template( 'singles/partials/book-authors.php' ); ?>

                        <!-- Book Short Description -->
                        <?php if ( is_pro_active() && is_pro_valid() ): ?>
                            <?php include TemplateLoader::locate_template( 'singles/partials/book-short-description.php' ); ?>
                        <?php endif; ?>

                        <div class="gsb-book-info">

                            <!-- Publish Date -->
                            <?php include TemplateLoader::locate_template( 'singles/partials/published-date.php' ); ?>

                            <!-- Publisher -->
                            <?php if ( is_pro_active() && is_pro_valid() ): ?>
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-co-publisher.php' ); ?>
                            <?php endif; ?>

                            <!-- Translator -->
                            <?php if ( is_pro_active() && is_pro_valid() ): ?>
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-translator.php' ); ?>
                            <?php endif; ?>

                            <!-- Book Categories -->
                            <?php TemplateLoader::load_template( 'singles/partials/book-taxonomies.php', [
                                'title'    => __( 'Categories', 'gs-books-showcase' ),
                                'taxonomy' => 'bookshowcase_group',
                            ] ); ?>

                            <!-- Book Tags -->
                            <?php TemplateLoader::load_template( 'singles/partials/book-taxonomies.php', [
                                    'title'    => __( 'Tags', 'gs-books-showcase' ),
                                    'taxonomy' => 'gsb_tag',
                            ] ); ?>

                            <!-- Book Authors -->
                            <?php TemplateLoader::load_template( 'singles/partials/book-taxonomies.php', [
                                'title'    => __( 'Authors', 'gs-books-showcase' ),
                                'taxonomy' => 'gsb_author',
                            ] ); ?>

                            <!-- Book Genre -->
                            <?php TemplateLoader::load_template( 'singles/partials/book-taxonomies.php', [
                                'title'    => __( 'Genres', 'gs-books-showcase' ),
                                'taxonomy' => 'gsb_genre',
                            ] ); ?>

                            <!-- Book Series -->
                            <?php TemplateLoader::load_template( 'singles/partials/book-taxonomies.php', [
                                'title'    => __( 'Series', 'gs-books-showcase' ),
                                'taxonomy' => 'gsb_series',
                            ] ); ?>

                            <!-- Book Language -->
                            <?php TemplateLoader::load_template( 'singles/partials/book-taxonomies.php', [
                                'title'    => __( 'Languages', 'gs-books-showcase' ),
                                'taxonomy' => 'gsb_languages',
                            ] ); ?>

                            <!-- Book Publisher -->
                            <?php TemplateLoader::load_template( 'singles/partials/book-taxonomies.php', [
                                'title'    => __( 'Publishers', 'gs-books-showcase' ),
                                'taxonomy' => 'gsb_publishers',
                            ] ); ?>

                            <!-- Book Countries -->
                            <?php TemplateLoader::load_template( 'singles/partials/book-taxonomies.php', [
                                'title'    => __( 'Countries', 'gs-books-showcase' ),
                                'taxonomy' => 'gsb_countries',
                            ] ); ?>

                            <!-- ISBN 10 -->
                            <?php include TemplateLoader::locate_template( 'singles/partials/book-isbn-ten.php' ); ?>

                            <!-- ISBN 13 -->
                            <?php include TemplateLoader::locate_template( 'singles/partials/book-isbn-thirteen.php' ); ?>

                            <?php if ( is_pro_active() && is_pro_valid() ): ?>
                                <!-- ASIN -->
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-asin.php' ); ?>                            

                                <!-- DOI -->                            
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-doi.php' ); ?>                            

                                <!-- LLCN -->                            
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-llcn.php' ); ?>
                            <?php endif; ?>

                            <!-- Pages -->
                            <?php include TemplateLoader::locate_template( 'singles/partials/book-pages.php' ); ?>

                            <!-- Country -->
                            <?php include TemplateLoader::locate_template( 'singles/partials/book-country.php' ); ?>

                            <!-- Language -->
                            <?php include TemplateLoader::locate_template( 'singles/partials/book-language.php' ); ?>

                            <!-- Dimension -->
                            <?php include TemplateLoader::locate_template( 'singles/partials/book-dimension.php' ); ?> 

                            <!-- Weight -->
                            <?php if ( is_pro_active() && is_pro_valid() ): ?>
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-weight.php' ); ?>
                            <?php endif; ?>

                            <!-- File Size -->
                            <?php include TemplateLoader::locate_template( 'singles/partials/book-file.php' ); ?>

                            <!-- Download Url -->
                            <?php include TemplateLoader::locate_template( 'singles/partials/book-download-url.php' ); ?>

                            <?php if ( is_pro_active() && is_pro_valid() ): ?>

                                <!-- Rating -->                            
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-rating.php' ); ?>

                                <!-- Cover Variation -->                            
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-cover-variation.php' ); ?>

                                <!-- Regular Price -->                            
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-regular-price.php' ); ?>                            

                                <!-- Sale Price -->                            
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-sale-price.php' ); ?>                            

                                <!-- Book Availability -->                            
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-availability.php' ); ?>                            

                                <!-- Pre Order Availability -->                            
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-pre-order.php' ); ?>                            

                                <!-- Age Group -->                            
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-age-group.php' ); ?>                            

                                <!-- Reading Level -->                            
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-reading-level.php' ); ?>                            

                                <!-- Book Edition -->                            
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-edition.php' ); ?>                            

                                <!-- Book Edition Features -->
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-edition-features.php' ); ?>

                                <!-- Awards -->
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-awards.php' ); ?>

                                <!-- Reading Time -->
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-reading-time.php' ); ?>

                                <!-- Accessibility Features -->
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-accessibility-features.php' ); ?>

                            <?php endif; ?>

                        </div>

                    </div>

                    <?php if ( Helpers::has_post_meta('gs_repeatable_fields') ) : ?>

                        <!-- Book Retails -->
                        <div class="gsb-sp-info-details-bottom">
                            <div class="gsb-book-info">
                                <?php include TemplateLoader::locate_template( 'singles/partials/book-retails.php' ); ?>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

    <?php if ( ! empty( trim( get_the_content() ) ) ) : ?>
        <!-- Description Section -->
        <div class="gs-roow">

            <div class="gs-col-md-12">

                <div class="gsb-sp-section-space gsb-sp-spacing-border">

                    <!-- Description Section -->
                    <?php include TemplateLoader::locate_template( 'singles/partials/book-description.php' ); ?>

                </div>


            </div>

        </div>
    <?php endif; ?>
    
    <?php if ( is_pro_active() && is_pro_valid() && Helpers::has_author_info() ) : ?>
        <!-- Author Details -->
        <div class="gs-roow">

            <div class="gs-col-md-12">
                
                <div class="gsb-author-details gsb-sp-section-space">
                
                    <!-- Author Details -->
                    <?php require TemplateLoader::locate_template( 'partials/gs-author-details.php' ); ?>

                </div>

            </div>
            
        </div>
    <?php endif; ?>

</div>