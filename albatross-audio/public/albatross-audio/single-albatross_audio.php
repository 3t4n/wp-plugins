<?php if ( ! defined( 'ABSPATH' ) ) { exit; }
/* 
Template Name: Single Albatross Audio
*/
get_header();
?>
<div class="container">
    <div class="row albatross-content">
        <div class="col-12">
            <?php echo do_shortcode('[albatross-audio]'); ?>
        </div>
    </div>
</div>
<?php
get_footer();