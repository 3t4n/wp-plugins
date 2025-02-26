<?php 
class countdown99plugin extends WP_widget {

    public function __construct()
        {
            parent::__construct(
            // base ID of the widget
            'countdown_99plugin',
            
            // name of the widget
            __('99Plugins - CountDown', 'nn-count-down' ),
        
            // widget options
            array (
                'description' => __( 'Count Down widget by 99Plugins', 'nn-count-down' )
            )

            );
        }

    public function widget( $args, $instance ) {
        
        if ( empty( $instance['date'] ) ) {
            $date = '01-11-2015';
        } else {
            $date = $instance['date'];
        }

        if ( empty( $instance['style'] ) ) {
            $style = 'cdstyle-wg-default';
        } else {
            $style = $instance['style'];
        }
        echo '<aside class="widget widget_countdown ' . $style . '">';
        echo '<h2 class="widget-title">' . esc_attr( $instance['title'] ) . '</h2>'; 
        echo '<div id="' . $instance["id"] . '"></div>';
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($){ 
                <?php
                    $new_date =  strtotime( $date );
                    
                    $year   = date("Y", $new_date);
                    $month  = date("n", $new_date);
                    $date   = date("d", $new_date);
                ?>
                $('#<?php echo $instance["id"]; ?>').countdown({until: new Date( <?php echo $year; ?>, <?php echo $month; ?>-1, <?php echo $date; ?>) });
            });
        </script> 
       <?php echo '</aside>';
    }

    public function form( $instance ) {

        $defaults = array(
            'title' => '',
            'date'  => '',
            'id'    => '',
        );

        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = __( 'New title', 'nn-count-down' );
        }

        if ( isset( $instance[ 'date' ] ) ) {
            $date = $instance[ 'date' ];
        } else {
            $date = '';
        }

        if ( isset( $instance[ 'style' ] ) ) {
            $style = $instance[ 'style' ];
        } else {
            $style = '';
        }

        if ( isset( $instance[ 'id' ] ) ) {
            $id = $instance[ 'id' ];
        } else {
            $id = '';
        }
    // removed the for loop, you can create new instances of the widget instead ?>

    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'nn-count-down' ); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'date' ); ?>"><?php esc_html_e( 'CountDown to (ex:25.12.2015)', 'nn-count-down' ); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'date' ); ?>" name="<?php echo $this->get_field_name( 'date' ); ?>" value="<?php echo esc_attr( $date ); ?>">
    </p>

    <p>
        <label for="<?php echo $this->get_field_id('style'); ?>">Select your Style: 
            <select class='widefat' id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>" type="text">
                <option value='cdstyle-wg-default'<?php echo ($style=='cdstyle-wg-default')?'selected':''; ?>> Default </option>
                <option value='cdstyle-wg-flat'<?php echo ($style=='cdstyle-wg-flat')?'selected':''; ?>> Flat </option> 
                <option value='cdstyle-wg-box'<?php echo ($style=='cdstyle-wg-box')?'selected':''; ?>> Box </option> 
                <option value='cdstyle-wg-circle'<?php echo ($style=='cdstyle-wg-circle')?'selected':''; ?>> Circle </option> 
                <option value='cdstyle-wg-leaf'<?php echo ($style=='cdstyle-wg-leaf')?'selected':''; ?>> Leaf </option> 
            </select>                
        </label>
    </p>

    <p>
        <input class="widefat" type="hidden" id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" value="<?php echo $this->get_field_id( 'date' ); ?>">
    </p>
    
    <script type="text/javascript">
        jQuery(document).ready(function($){ 
        <?php 
         echo "$('#" . $this->get_field_id( 'date' ) . "').datepicker({dateFormat : 'dd-mm-yy'});";
        ?>
        });
    </script>
    <?php }

}