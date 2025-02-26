<?php 
	$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
	$cid = isset( $instance['cid'] ) ? $instance['cid']: '';
	$orderby = isset( $instance['orderby'] ) ? $instance['orderby'] : 'date';
	$order= isset( $instance['order'] ) ? $instance['order'] : 'DESC';
	$number = isset( $instance['number'] ) ? $instance['number'] : 8;
	$style = isset( $instance['style'] ) ? $instance['style'] : 'fault';
	$pic_width = isset( $instance['pic_width'] ) ? $instance['pic_width'] : '';
	$pic_height = isset( $instance['pic_height'] ) ? $instance['pic_height'] : '';
	$word_num = isset( $instance['word_num'] ) ? $instance['word_num'] : '';
	$flash_width = isset( $instance['flash_width'] ) ? $instance['flash_width'] : '';
	$flash_height = isset( $instance['flash_height'] ) ? $instance['flash_height'] : '';
?>

<!--title-->
<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'dx-advanced-widgets' ); ?></label><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

<!--number-->
<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e( 'Number of posts to show:', 'dx-advanced-widgets' ); ?></label>
<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

<!--category-->
<p><label for="<?php echo $this->get_field_id('cid'); ?>"><?php _e( 'Category: ', 'dx-advanced-widgets' ); ?></label>
    <?php wp_dropdown_categories( array( 'show_option_all'=>__( 'all', 'dx-advanced-widgets' ), 'hierarchical'=>true, 'id'=>$this->get_field_id('cid'), 'name'=>$this->get_field_name('cid'), 'selected'=>$cid ) );?>
</p>

<!--order-->		
<p><label for="<?php echo $this->get_field_id('order'); ?>"><?php _e( 'Order: ', 'dx-advanced-widgets' ); ?></label>
<select id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>">
    <option value="DESC" <?php selected( 'DESC', $order );?>><?php _e( 'DESC', 'dx-advanced-widgets' ); ?></option>
    <option value="ASC" <?php selected( 'ASC', $order );?>><?php _e( 'ASC', 'dx-advanced-widgets' ); ?></option>
</select>
</p>

<!--orderby-->	
<p><label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e( 'Orderby: ', 'dx-advanced-widgets' ); ?></label>
<select id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>">
    <option value="date" <?php selected( 'date', $orderby );?>><?php _e( 'date', 'dx-advanced-widgets' ); ?></option>
    <option value="ID" <?php selected( 'ID', $orderby );?>><?php _e( 'ID', 'dx-advanced-widgets' ); ?></option>
    <option value="author" <?php selected( 'author', $orderby );?>><?php _e( 'author', 'dx-advanced-widgets' ); ?></option>
    <option value="title" <?php selected( 'title', $orderby );?>><?php _e( 'title', 'dx-advanced-widgets' ); ?></option>
    <option value="name" <?php selected( 'name', $orderby );?>><?php _e( 'name', 'dx-advanced-widgets' ); ?></option>
    <option value="modified" <?php selected( 'modified', $orderby );?>><?php _e( 'modified', 'dx-advanced-widgets' ); ?></option>
    <option value="rand" <?php selected( 'rand', $orderby );?>><?php _e( 'random', 'dx-advanced-widgets' ); ?></option>
    <option value="comment_count" <?php selected( 'comment_count', $orderby );?>><?php _e( 'comment_count', 'dx-advanced-widgets' ); ?></option>
</select>
</p>

<!--style-->
<p><label for="<?php echo $this->get_field_id('style'); ?>"><?php _e( 'Style: ', 'dx-advanced-widgets' ); ?></label>
<select class="dx-advanced-widgetsstyle-select" id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>">
    <option value="default" <?php selected( 'default', $style );?>><?php _e( 'dafault', 'dx-advanced-widgets' ); ?></option>
    <option value="pic" <?php selected( 'pic', $style );?>><?php _e( 'picture', 'dx-advanced-widgets' ); ?></option>
    <option value="flash" <?php selected( 'flash', $style );?>><?php _e( 'flash', 'dx-advanced-widgets' ); ?></option>
</select>
</p>

<div class="pic-style-form" style="display:<?php echo $style=='pic' ? 'block' : 'none'; ?>;">
    <p><label for="<?php echo $this->get_field_id('pic_width'); ?>"><?php _e( 'Image Size:', 'dx-advanced-widgets' ); ?></label>
    <?php _e( 'width', 'dx-advanced-widgets' ); ?> <input id="<?php echo $this->get_field_id('pic_width'); ?>" name="<?php echo $this->get_field_name('pic_width'); ?>" type="text" value="<?php echo $pic_width; ?>" size="4" />
    <?php _e( 'height', 'dx-advanced-widgets' ); ?> <input id="<?php echo $this->get_field_id('pic_height'); ?>" name="<?php echo $this->get_field_name('pic_height'); ?>" type="text" value="<?php echo $pic_height; ?>" size="4" /> <?php _e( '( e.g. 100px or auto )', 'dx-advanced-widgets' ); ?></p>
    
    <p><label for="<?php echo $this->get_field_id('word_num'); ?>"><?php _e( 'Word Number:', 'dx-advanced-widgets' ); ?></label>
    <input id="<?php echo $this->get_field_id('word_num'); ?>" name="<?php echo $this->get_field_name('word_num'); ?>" type="text" value="<?php echo $word_num; ?>" size="3" /></p>
</div>

<div class="flash-style-form" style="display:<?php echo $style=='flash' ? 'block' : 'none'; ?>;">
    <p><label for="<?php echo $this->get_field_id('flash_width'); ?>"><?php _e( 'Flash Size:', 'dx-advanced-widgets' ); ?></label>
    <?php _e( 'width', 'dx-advanced-widgets' ); ?> <input id="<?php echo $this->get_field_id('flash_width'); ?>" name="<?php echo $this->get_field_name('flash_width'); ?>" type="text" value="<?php echo $flash_width; ?>" size="4" />
    <?php _e( 'height', 'dx-advanced-widgets' ); ?> <input id="<?php echo $this->get_field_id('flash_height'); ?>" name="<?php echo $this->get_field_name('flash_height'); ?>" type="text" value="<?php echo $flash_height; ?>" size="4" /> <?php _e( '( e.g. 200 )', 'dx-advanced-widgets' ); ?></p>
</div>