<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Textarea
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_html extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() { 
      
    global $post;
      
    
    $q = new WP_Query(
        array('posts_per_page' => -1, 'post_type' => 'post')
    );

    ?>

  
    <ul>
        <?php
        while($q->have_posts()) : $q->the_post();
        ?>
            <a href="<?php the_permalink(); ?>"><li> <?php the_title(); ?></li></a>
        
        <?php
        endwhile;
        ?>
        
    </ul>








  <?php }



  
}
