<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

global $post;

$gsbks_meta_publish       = get_post_meta( $post->ID, '_gsbks_publish', true );
$gsbks_meta_isbn_ten      = get_post_meta( $post->ID, '_gsbks_isbn_ten', true );
$gsbks_meta_isbn_thirteen = get_post_meta( $post->ID, '_gsbks_isbn_thirteen', true );
$gsbks_meta_pages         = get_post_meta( $post->ID, '_gsbks_pages', true );
$gsbks_meta_dimension     = get_post_meta( $post->ID, '_gsbks_dimension', true );
$gsbks_meta_fsize         = get_post_meta( $post->ID, '_gsbks_fsize', true );
$gsbks_meta_url           = get_post_meta( $post->ID, '_gsbks_url', true );

?>

<div class="gs_bookshowcase-metafields">
    
    <div style="height: 20px;"></div>

    <!-- Published On -->
    <div class="form-group">
        <label for="gsbksPublish"><?php esc_html_e( 'Published On', 'gsbookshowcase' ); ?></label>
        <input type="text" id="gsbksPublish" class="form-control" name="gsbks_publish" placeholder="20 Jan, 25" value="<?php echo isset( $gsbks_meta_publish ) ? esc_attr( $gsbks_meta_publish ) : ''; ?>">
    </div>
    
    <!-- ISBN 10 -->
    <div class="form-group">
        <label for="gsbksIsbn"><?php esc_html_e( 'ISBN 10', 'gsbookshowcase' ); ?></label>
        <input type="text" id="gsbksIsbn10" class="form-control" name="gsbks_isbn_10" value="<?php echo isset( $gsbks_meta_isbn_ten ) ? esc_attr( $gsbks_meta_isbn_ten ) : ''; ?>">
    </div>

    <!-- ISBN 13 -->
    <div class="form-group">
        <label for="gsbksIsbn"><?php esc_html_e( 'ISBN 13', 'gsbookshowcase' ); ?></label>
        <input type="text" id="gsbksIsbn13" class="form-control" name="gsbks_isbn_13" value="<?php echo isset( $gsbks_meta_isbn_thirteen ) ? esc_attr( $gsbks_meta_isbn_thirteen ) : ''; ?>">
    </div>

    <!-- Total Pages / Length -->
    <div class="form-group">
        <label for="gsbksPages"><?php esc_html_e( 'Total Pages / Length', 'gsbookshowcase' ); ?></label>
        <input type="text" id="gsbksPages" class="form-control" name="gsbks_pages" value="<?php echo isset( $gsbks_meta_pages ) ? esc_attr( $gsbks_meta_pages ) : ''; ?>">
    </div>

    <!-- Book Dimensions -->
    <div class="form-group">
        <label for="gsbksDimension"><?php esc_html_e( 'Book Dimensions', 'gsbookshowcase' ); ?></label>
        <input type="text" id="gsbksDimension" class="form-control" name="gsbks_dimension" value="<?php echo isset( $gsbks_meta_dimension ) ? esc_attr( $gsbks_meta_dimension ) : ''; ?>">
    </div>

    <!-- File Size -->
    <div class="form-group">
        <label for="gsbksFsize"><?php esc_html_e( 'File Size (if e-book)', 'gsbookshowcase' ); ?></label>
        <input type="text" id="gsbksFsize" class="form-control" name="gsbks_fsize" value="<?php echo isset( $gsbks_meta_fsize ) ? esc_attr( $gsbks_meta_fsize ) : ''; ?>">
    </div>

    <!-- Download URL -->
    <div class="form-group">
        <label for="gsbksUrl"><?php esc_html_e( 'Download URL (for e-book)', 'gsbookshowcase' ); ?></label>
        <input type="text" id="gsbksUrl" class="form-control" name="gsbks_url" value="<?php echo isset( $gsbks_meta_url ) ? esc_attr( $gsbks_meta_url ) : ''; ?>">
    </div>

    <p><a target="_blank" href="https://www.gsplugins.com/product/gs-books-showcase/#pricing"><b>Upgrade to PRO</b></a> to get these advanced features.</p>

    <!-- Co Publisher -->
    <div class="form-group pro-only">
        <label for="gsbksPublisher"><?php esc_html_e( 'Co-Publisher', 'gsbookshowcase' ); ?></label>
        <input type="text" id="gsbksPublisher" class="form-control" name="gsbks_copublisher">
    </div>

    <!-- Translator -->
    <div class="form-group pro-only">
        <label for="gsbksTranslator"><?php esc_html_e( 'Translator', 'gsbookshowcase' ); ?></label>
        <input type="text" id="gsbksTranslator" class="form-control" name="gsbks_translator">
    </div>

    <!-- ASIN -->
    <div class="form-group pro-only">
        <label for="gsbksAsin"><?php esc_html_e( 'ASIN', 'gsbookshowcase' ); ?></label>
        <input type="text" id="gsbksAsin" class="form-control" name="gsbks_asin">
    </div>

    <!-- DOI -->
    <div class="form-group pro-only">
        <label for="gsbdoi"><?php esc_html_e( 'DOI', 'gsbookshowcase' ); ?></label>
        <input type="text" id="gsbdoi" class="form-control" name="gsbks_doi">
    </div>

    <!-- LLCN -->
    <div class="form-group pro-only">
        <label for="lccn"><?php esc_html_e( 'LLCN', 'gsbookshowcase' ); ?></label>
        <input type="text" id="lccn" class="form-control" name="gsbks_lccn">
    </div>

    <!-- Weight -->
    <div class="form-group pro-only">
        <label for="weight"><?php esc_html_e( 'Weight', 'gsbookshowcase' ); ?></label>
        <input type="text" id="weight" class="form-control" name="gsbks_weight">
    </div>

    <!-- Book Cover Variation -->
    <div class="form-group pro-only">
        <label for="bookcover"><?php esc_html_e( 'Book Cover Variation', 'gsbookshowcase' ); ?></label>
        <input type="text" id="bookcover" class="form-control" name="gsbks_book_cover">
    </div>

    <!-- Regular Price -->
    <div class="form-group pro-only">
        <label for="regular_price"><?php esc_html_e( 'Regular Price', 'gsbookshowcase' ); ?></label>
        <input type="number" id="regular_price" class="form-control" name="gsbks_regular_price">
    </div>

    <!-- Sale Price -->
    <div class="form-group pro-only">
        <label for="sale_price"><?php esc_html_e( 'Sale Price', 'gsbookshowcase' ); ?></label>
        <input type="number" id="sale_price" class="form-control" name="gsbks_sale_price">
    </div>

    <!-- Book Availability -->
    <div class="form-group pro-only">
        <label for="book_availability"><?php esc_html_e( 'Book Availability', 'gsbookshowcase' ); ?></label>
        <select name="available_books" id="book_availability">
            <option><?php esc_html_e( 'Available', 'gsbookshowcase' ); ?></option>
            <option><?php esc_html_e( 'Upcoming', 'gsbookshowcase' ); ?></option>
        </select>
    </div>

    <!-- Pre Order Availability -->
    <div class="form-group pro-only">
        <label for="pre_order_availability"><?php esc_html_e( 'Pre-Order Availability', 'gsbookshowcase' ); ?></label>
        <select name="pre_order_books" id="pre_order_availability">
            <option><?php esc_html_e( 'No', 'gsbookshowcase' ); ?></option>
            <option><?php esc_html_e( 'Yes', 'gsbookshowcase' ); ?></option>
        </select>
    </div>

    <!-- Age Group -->
    <div class="form-group pro-only">
        <label for="age_group"><?php esc_html_e( 'Age Group', 'gsbookshowcase' ); ?></label>
        <input type="text" id="age_group" class="form-control" name="gsbks_age_group">
    </div>

    <!-- Reading Level -->
    <div class="form-group pro-only">
        <label for="reading_level"><?php esc_html_e( 'Reading Level', 'gsbookshowcase' ); ?></label>
        <input type="text" id="reading_level" class="form-control" name="gsbks_reading_level">
    </div>

    <!-- Edition -->
    <div class="form-group pro-only">
        <label for="edition"><?php esc_html_e( 'Edition', 'gsbookshowcase' ); ?></label>
        <input type="text" id="edition" class="form-control" name="gsbks_edition">
    </div>

    <!-- Book Edition Features -->
    <div class="form-group pro-only">
        <label for="book_edition"><?php esc_html_e( 'Book Edition Features', 'gsbookshowcase' ); ?></label>
        <input type="text" id="book_edition" class="form-control" name="gsbks_edition_features">
    </div>

    <!-- Awards and Recognitions -->
    <div class="form-group pro-only">
        <label for="awards-recognition"><?php esc_html_e( 'Awards and Recognitions', 'gsbookshowcase' ); ?></label>
        <input type="text" id="awards-recognition" class="form-control" name="gsbks_award_recognitions">
    </div>

    <!-- Reading Time -->
    <div class="form-group pro-only">
        <label for="reading-time"><?php esc_html_e( 'Reading Time', 'gsbookshowcase' ); ?></label>
        <input type="text" id="reading-time" class="form-control" name="gsbks_reading_time">
    </div>

    <!-- Accessibility Features -->
    <div class="form-group pro-only">
        <label for="accessibility"><?php esc_html_e( 'Accessibility Features', 'gsbookshowcase' ); ?></label>
        <select name="accessibility_features" id="accessibility">
            <option><?php esc_html_e( 'Enabled', 'gsbookshowcase' ); ?></option>
            <option><?php esc_html_e( 'Not Enabled', 'gsbookshowcase' ); ?></option>
        </select>
    </div>

    <!-- Readers Rating -->
    <div class="form-group pro-only">
        <label for="gsbks_rating"><?php esc_html_e( 'Readers Rating', 'gsbookshowcase' ); ?></label>
        <p>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:serif="http://www.serif.com/" width="130px" viewBox="0 0 881 130" version="1.1" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g transform="matrix(1,0,0,1,-634.728,-382.568)"><path d="M702.68,382.568L718.721,431.938L770.632,431.938L728.635,462.45L744.677,511.82L702.68,481.308L660.683,511.82L676.724,462.45L634.728,431.938L686.639,431.938L702.68,382.568Z" style="fill:rgb(255,216,0);"/></g><g transform="matrix(1,0,0,1,-447.914,-382.568)"><path d="M702.68,382.568L718.721,431.938L770.632,431.938L728.635,462.45L744.677,511.82L702.68,481.308L660.683,511.82L676.724,462.45L634.728,431.938L686.639,431.938L702.68,382.568Z" style="fill:rgb(255,216,0);"/></g><g transform="matrix(1,0,0,1,-261.961,-382.568)"><path d="M702.68,382.568L718.721,431.938L770.632,431.938L728.635,462.45L744.677,511.82L702.68,481.308L660.683,511.82L676.724,462.45L634.728,431.938L686.639,431.938L702.68,382.568Z" style="fill:rgb(255,216,0);"/></g><g transform="matrix(1,0,0,1,-76.0238,-382.568)"><path d="M702.68,382.568L718.721,431.938L770.632,431.938L728.635,462.45L744.677,511.82L702.68,481.308L660.683,511.82L676.724,462.45L634.728,431.938L686.639,431.938L702.68,382.568Z" style="fill:rgb(255,216,0);"/></g><g transform="matrix(1,0,0,1,109.853,-382.568)"><path d="M702.68,382.568L718.721,431.938L770.632,431.938L728.635,462.45L744.677,511.82L702.68,481.308L660.683,511.82L676.724,462.45L634.728,431.938L686.639,431.938L702.68,382.568Z" style="fill:rgb(255,216,0);"/></g</svg>
        </p>
    </div>

    <!-- Review -->
    <div class="form-group pro-only">
        <label for="gsbksReview"><?php esc_html_e( 'Review', 'gsbookshowcase' ); ?></label>
        <textarea id="gsbksReview" name="gsbks_review" class="form-control" rows="4" cols="50"></textarea>
    </div>

    <!-- Book Short Description -->
    <div class="form-group pro-only">
        <label for="b_short_desc"><?php esc_html_e( 'Book Short Description', 'gsbookshowcase' ); ?></label>
        <div class="form-control">
            <?php wp_editor( '', 'gsbks_custom_editor', [
                'textarea_name' => 'gsbks_custom_editor',
                'media_buttons' => false,
                'textarea_rows' => 10,
                'teeny'         => false,
                'tinymce'       => true
            ]); ?>
        </div>
    </div>

</div>