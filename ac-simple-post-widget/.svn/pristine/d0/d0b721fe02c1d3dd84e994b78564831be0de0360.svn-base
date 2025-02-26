<p>
    <label for="<?php echo $this->get_field_name( 'title' ); ?>">Title : </label>
    <input id="<?php echo $this->get_field_name( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_name( 'post_type' ); ?>">Choose Custom Post Type : </label>
    <select class="widefat" id="<?php echo $this->get_field_name( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>" >
        <?php

            $post_types = get_post_types( '', 'names' ); 

            foreach ( $post_types as $type_post ) {

        ?>

               <option value="<?php echo $type_post ?>" <?php selected( $post_type, $type_post ); ?>><?php echo $type_post ?></option>;

        <?php } ?>
        
    </select>
</p>

<p>
    <label for="<?php echo $this->get_field_name( 'num_post' ); ?>">How many post would you like to display? : </label>
    <input size="4" name="<?php echo $this->get_field_name( 'num_post' ); ?>" value="<?php echo $num_post; ?>" type="text" id="<?php echo $this->get_field_name( 'num_post' ); ?>">


<p>
	<label for="<?php echo $this->get_field_name( 'title_content' ); ?>" >Do you want to display title and excerpt? : </label>
	<input type="checkbox" id="<?php echo $this->get_field_name( 'title_content' ); ?>" name="<?php echo $this->get_field_name( 'title_content' );?>" value="1" <?php checked( $title_content, 1 ); ?>>
</p>

<p>
   <label>Set custom height and width for the image: </label>
</p>

<p>
    <label for="<?php echo $this->get_field_name( 'img_width' ); ?>">Width :</label>
    <input size="4" name="<?php echo $this->get_field_name( 'img_width' ); ?>" value="<?php echo $img_width; ?>" type="text" id="<?php echo $this->get_field_name( 'img_width' ); ?>">
    <label for="<?php echo $this->get_field_name( 'img_height' ); ?>">Height :</label>
    <input size="4" name="<?php echo $this->get_field_name( 'img_height' ); ?>" value="<?php echo $img_height; ?>" type="text" id="<?php echo $this->get_field_name( 'img_height' ); ?>">
</p>

<p>
    <label for="<?php echo $this->get_field_name( 'new_tab' ); ?>">Open in new tab? : </label>
    <input id="<?php echo $this->get_field_name( 'new_tab' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'new_tab' ); ?>" value="1" <?php checked( $new_tab, 1 ); ?>>
</p>