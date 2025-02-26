<?php

class ARB_EXP_Widget_iframe extends WP_Widget{

    function __construct(){
        $args = array(
            'name' => 'Widget Arbitrage',
            'description' => 'View Arbitrage in you page',
            'classname' => 'abr-ifgame'
        );
        parent::__construct('abr-ifgame', '', $args);
    }

    function widget($args, $instance){
        extract($args);
        extract($instance);
        $title = apply_filters( 'widget_title', $title );

        echo $before_widget;
        echo $before_title . $title . $after_title;

        $manage = new ARB_EXP_Helpers();
        $iframe = $manage->arb_exp_getIframeById($idIframe);

        $template = $iframe[0]['text'];

        echo $template;
    }

    function form($instance){
        extract($instance);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( isset($title) ) echo esc_attr( $title ) ?>" class="widefat">

        <p>
            <label for="<?php echo $this->get_field_id( 'idIframe' ); ?>"><?php _e('Id Arbitrage:', ''); ?></label>
            <input id="<?php echo $this->get_field_id( 'idIframe' ); ?>" name="<?php echo $this->get_field_name( 'idIframe' ); ?>" value="<?php echo $instance['idIframe']; ?>" style="width:100%;" />
        </p>
        <?php
    }

}

?>