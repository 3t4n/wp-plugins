<?php
class AuthorListings_Widget  extends WP_Widget {
    function AuthorListings_Widget() {
            /* Widget settings. */
            $widget_ops = array( 'classname' => 'author-listings', 'description' => 'Advanced Author Listings' );
            /* Widget control settings. */
            $control_ops = array( 'width' => 500, 'height' => 350, 'id_base' => 'author-listings' );
            /* Create the widget. */
            $this->WP_Widget( 'author-listings', 'Advanced Author Listings', $widget_ops, $control_ops );
    }
    function widget( $args, $instance ) {
            extract( $args );
    /* User-selected settings. */
    $title = apply_filters('widget_title', $instance['title'] );
    /* Before widget (defined by themes). */
    echo $before_widget;
    /* Title of widget (before and after defined by themes). */
    if ( $title )
            echo $before_title . $title . $after_title;
            /* Before widget (defined by themes). */
                /*
                 */
                 $args = array(
                    'author_excerpt'=>$instance['author_excerpt'],
                    'author_bio'=>$instance['author_bio'],
                    'twitter'=>$instance['twitter'],
                    'facebook'=>$instance['facebook'],
                    'linkedin'=>$instance['linkedin'],
                    'author_image'=>$instance['author_image'],
                    'author_page'=>$instance['author_page'],
                    'author_posts'=>$instance['author_posts'],
                    'author'=>$instance['author'],
                    'editor'=>$instance['editor'],
                    'contributor'=>$instance['contributor'],
                    'administrator'=>$instance['administrator'],
                    'image_size'=>$instance['image_size'],
                    'contact_heading'=>$instance['contact_heading'],
                    'show_email'=>$instance['show_email'],

                 );
                 show_author_listings($args);
                 /*
                 *
                 *  After widget (defined by themes). */
                echo $after_widget;
    }
    function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            /* Strip tags (if needed) and update the widget settings. */
            $instance['title'] = $new_instance['title'];
            $instance['author_excerpt'] = $new_instance['author_excerpt'];
            $instance['author_bio'] = $new_instance['author_bio'];
            $instance['twitter'] = $new_instance['twitter'];
            $instance['facebook'] = $new_instance['facebook'];
            $instance['linkedin'] = $new_instance['linkedin'];
            $instance['author_image'] = $new_instance['author_image'];
            $instance['author_page'] = $new_instance['author_page'];
            $instance['author_posts'] = $new_instance['author_posts'];
            $instance['author'] = $new_instance['author'];
            $instance['editor'] = $new_instance['editor'];
            $instance['contributor'] = $new_instance['contributor'];
            $instance['administrator'] = $new_instance['administrator'];
            $instance['image_size'] = $new_instance['image_size'];
            $instance['contact_heading'] = $new_instance['contact_heading'];
            $instance['show_email'] = $new_instance['show_email'];

        return $instance;
    }

    
    function form( $instance ) {

            /* Set up some default widget settings. */
           $defaults = array(
               'author_excerpt'=>'yes',
               'author_image'=>'yes',
               'author_page'=>'',
               'twitter'=>'',
               'facebook'=>'',
               'linkedin'=>'',
               'author_posts'=>'',
               'author'=>'yes',
               'editor'=>'yes',
               'contributor'=>'',
               'administrator'=>'',
               'image_size'=>'55',
               'contact_heading'=>'contact:',
               'show_email'=>'',
           );
            $instance = wp_parse_args( (array) $instance, $defaults ); ?>
            <p>
                    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','author-listings'); ?></label>
                    <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%" />
            </p>
            <br />
            <p>What to show</p>
            <?php $args = array ('author_excerpt'=>__('author excerpt','author-listings'),'author_image'=>__('author image','author-listings'),'author_page'=>__('author page link','author-listings'),'author_posts'=>__('number of author posts','author-listings'),
                'author_bio'=>__('author biography','author-listings'), 'twitter'=>__ ('twitter link','author-listings'), 'facebook'=>__('facebook link','author-listings'), 'linkedin'=>__('Linked in link','author-listings'), 'show_email'=>__('show email','author-listings'), ); ?>
                <?php foreach($args as $key=>$value){
                    ?>
                <input type="hidden" value="no" name="<?php echo $this->get_field_name( $key ); ?>" />
                <input type="checkbox" <?php if ( 'yes' == $instance[$key] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( $key ); ?>" value="yes" id="<?php echo $this->get_field_name( $key ); ?>"/><label for="<?php echo $this->get_field_name( $key ); ?>"> <?php echo $value; ?></label><br />
                    <?php
                } ?>
             <br />
             <p>Who to show</p>
             <?php $args = array ('author'=>__('authors','author-listings'),'editor'=>__('editors','author-listings'), 'contributor'=>__('contributors','author-listings'),'administrator'=>__('administrators *not recomended','author-listings'), ); ?>
              <?php foreach($args as $key=>$value){
                    ?>
                <input type="hidden" value="no" name="<?php echo $this->get_field_name( $key ); ?>" />
                <input type="checkbox" <?php if ( 'yes' == $instance[$key] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( $key ); ?>" value="yes" id="<?php echo $this->get_field_name( $key ); ?>"/><label for="<?php echo $this->get_field_name( $key ); ?>"> <?php echo $value; ?></label><br />
                    <?php
                } ?>
                <br />
                <p>What size is the Author Image</p>
                <select  name="<?php echo $this->get_field_name( 'image_size'); ?>" id="<?php echo $this->get_field_name( 'image_size' ); ?>" style="width:12em">
                                <?php for ( $counter = 25; $counter <= 250; $counter += 5) { ?>
                                    <option value="<?php echo $counter; ?>" <?php if ($counter == $instance['image_size']) {echo 'selected="selected"';} ?>><?php echo $counter?>px</option>
                                <?php } ?>
                </select>
                <p>
                    <label for="<?php echo $this->get_field_id( 'contact_heading' ); ?>"><?php _e('Contact Heading:','author-listings'); ?></label>
                    <input id="<?php echo $this->get_field_id( 'contact_heading' ); ?>" name="<?php echo $this->get_field_name( 'contact_heading' ); ?>" value="<?php echo $instance['contact_heading']; ?>" style="width:100%" />
            </p>
            <p><?php _e('<em><strong>Important:</strong></em> We recommend that you use a seperate ID for editing/creating posts to the one that you use to Administer wordpress.  This is because by giving out the user name of the administrator alows hackers on to the first step of breaking in to you site.','author-listings'); ?></p>
            <?php
    }
}


?>
