<?php
/*
Plugin Name: Atomic Penguins Video Embedder
Plugin URI: #
Description: Loads all kinds of embedded video.
Version: 1.0
Author: Atomic Penguins
Author URI: http://atomicpenguins.com/wordpress
License: GPL2
*/
?>
<?php 
class Unfiltered_Text_Widget extends WP_Widget
{
    /**
     * @uses apply_filters( 'magic_widgets_name' )
     */
    public function __construct()
    {
        // You may change the name per filter.
        // Use add_filter( 'magic_widgets_name', 'your custom_filter', 10, 1 );
        $widgetname = apply_filters( 'magic_widgets_name', 'Atomic Video Embedder' );
        parent::__construct(
            'unfiltered_text'
        ,   $widgetname
        ,   array( 'description' => 'Embed Videos' )
        ,   array( 'width' => 300, 'height' => 150 )
        );
    }

    /**
     * Output.
     *
     * @param  array $args
     * @param  array $instance
     * @return void
     */
    public function widget( $args, $instance )
    {
        echo "<p style=\"text-align: center; background-color: gray;color:white\" class=\"aye-title\">";
        echo $instance['label'];
        echo "</p>";
        echo $instance['text'];
    }

    /**
     * Prepares the content. Not.
     *
     * @param  array $new_instance New content
     * @param  array $old_instance Old content
     * @return array New content
     */
    public function update( $new_instance, $old_instance )
    {
        return $new_instance;
    }

    /**
     * Backend form.
     *
     * @param array $instance
     * @return void
     */
    public function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array( 'text' => '', 'label' => '' ) );
        $label = strip_tags($instance['label']);
        $text = format_to_edit($instance['text']);
?>
		<div class="atomic-embedder" style="padding: 10px 0px">
		<label>Title</label>
        <input type="text" id="<?php echo $this->get_field_id( 'label' );  ?>" name="<?php echo $this->get_field_name( 'label' );  ?>" class="widefat" value="<?php echo $label  ?>">
        <label>Embed Code</label>
        <textarea class="widefat" rows="7" cols="20" id="<?php
            echo $this->get_field_id( 'text' );
        ?>" name="<?php
            echo $this->get_field_name( 'text' );
        ?>"><?php
            echo $text;
        ?></textarea>
        </div>
        <?php
     
        ! empty ( $text )
            and print '<h3>Preview</h3><div style="border:0px solid #369;padding:10px; text-align:center">'. $instance['text'] . '</div>';
       
        ?>
<?php
    }
}

// register widget
add_action( 'widgets_init', 'register_unfiltered_text_widget', 20 );

function register_unfiltered_text_widget()
{
    register_widget( 'Unfiltered_Text_Widget' );
}

?>