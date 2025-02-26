<?php

function acfw30_widgets_init() {   

    register_sidebar( array(
        'name'          => esc_html__( 'Ajax Contact Form', 'acfw30' ),
        'id'            => 'acfw30_widget',
        'description'   => esc_html__( 'Add widgets here.', 'acfw30' ),
        'before_title'  => '',
        'after_title'   => '',
        'before_widget' => '',
        'after_widget'  => '',
    ) );

}
add_action( 'widgets_init', 'acfw30_widgets_init' );

class acfw30_button_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'register_subscription_widget', 
            'Ajax Contact Form',
            array('description' => 'Button widget')
        );
    }

    function widget( $args, $instance ) {
        $acfw30_form_id = apply_filters('widget_text', $instance['acfw30_form_id']);
        $acfw30_btn_text = apply_filters('widget_text', $instance['acfw30_btn_text']);
        $acfw30_btn_bg_spcolor = apply_filters('widget_text', $instance['acfw30_btn_bg_spcolor']);
        $acfw30_btn_text_spcolor = apply_filters('widget_text', $instance['acfw30_btn_text_spcolor']);
        $acfw30_btn_icon = apply_filters('widget_text', $instance['acfw30_btn_icon']);
        $acfw30_btn_animation = apply_filters('widget_text', $instance['acfw30_btn_animation']);
        $acfw30_btn_position = apply_filters('widget_text', $instance['acfw30_btn_position']);
        $acfw30_btn_position_left = apply_filters('widget_text', $instance['acfw30_btn_position_left']);
        $acfw30_btn_position_right = apply_filters('widget_text', $instance['acfw30_btn_position_right']);
        $acfw30_btn_position_bottom = apply_filters('widget_text', $instance['acfw30_btn_position_bottom']);

        if($acfw30_btn_position == 'right'){
        	$acfw30_sp_position = 'right:'.$acfw30_btn_position_right.'px; bottom:'.$acfw30_btn_position_bottom .'px;';
        }

        if($acfw30_btn_position == 'left'){
        	$acfw30_sp_position = 'left:'.$acfw30_btn_position_left.'px; bottom:'.$acfw30_btn_position_bottom .'px;';
        }

        $animation_class = acfw30_get_animation_class($acfw30_btn_animation);

        echo $args['before_widget'];
        if(!empty($acfw30_form_id)){
            echo '<a class="acfw30_button '.$animation_class.'" href="#acfw30_'.$acfw30_form_id.'" style="background-color: '.$acfw30_btn_bg_spcolor.'; color: '.$acfw30_btn_text_spcolor.'; '.$acfw30_sp_position.'">';

            if($acfw30_btn_icon !='none'){
                echo'<i class="fa '.$acfw30_btn_icon.'" aria-hidden="true"></i>';
            }
                
            echo ' '.$acfw30_btn_text.'</a>';
        }
        echo $args['after_widget'];
    }


    function form( $instance ) {
        $acfw30_form_id = @ $instance['acfw30_form_id'] ?: '';
        $acfw30_btn_text = @ $instance['acfw30_btn_text'] ?: __('Contact me','acfw30');
        $acfw30_btn_bg_spcolor = @ $instance['acfw30_btn_bg_spcolor'] ?: '#4095f4';
        $acfw30_btn_text_spcolor = @ $instance['acfw30_btn_text_spcolor'] ?: '#ffffff';
        $acfw30_btn_icon = @ $instance['acfw30_btn_icon'] ?: 'fa-phone-square';
        $acfw30_btn_animation = @ $instance['acfw30_btn_animation'] ?: 'tada';
        $acfw30_btn_position = @ $instance['acfw30_btn_position'] ?: 'left';
        $acfw30_btn_position_left = @ $instance['acfw30_btn_position_left'] ?: '40';
        $acfw30_btn_position_right = @ $instance['acfw30_btn_position_right'] ?: '40';
        $acfw30_btn_position_bottom = @ $instance['acfw30_btn_position_bottom'] ?: '40';
        ?>
        <p> 
            <label for="<?php echo $this->get_field_id('acfw30_form_id'); ?>"><?php echo __('Form Name', 'acfw30'); ?>:</label> 
            <br>
            <select id="<?php echo $this->get_field_id('acfw30_form_id'); ?>" name="<?php echo $this->get_field_name('acfw30_form_id'); ?>">
                <?php
                    if($acfw30_form_id!=''){
                        $acfw30_form = get_post($acfw30_form_id);
                        $acfw30_form_title = $acfw30_form->post_title;
                    } else {
                        $acfw30_form_title = 'none';
                    }
                ?>
                <option value="<?php echo $acfw30_form_id;?>"><?php echo $acfw30_form_title;?></option>
                <option disabled>-------</option>
                <?php
                    $args = array(
                        'post_type' => 'acfw30_forms',
                        'numberposts' => -1,
                    );

                    $posts = get_posts( $args );
                    foreach( $posts as $post ){
                        echo '<option value="'.$post->ID.'">'.$post->post_title.'</option>';
                    }
                ?>
            </select>
        </p>

        <p><label for="<?php echo $this->get_field_id('acfw30_btn_text'); ?>"><?php echo __('Link text', 'acfw30'); ?>:</label></br>
        <input type="text" id="<?php echo $this->get_field_id('acfw30_btn_text'); ?>" name="<?php echo $this->get_field_name('acfw30_btn_text'); ?>" value="<?php echo esc_attr($acfw30_btn_text); ?>"> 

        <p><label for="<?php echo $this->get_field_id('acfw30_btn_bg_spcolor'); ?>"><?php echo __('Button Color', 'acfw30'); ?>:</label></br>
        <input type="text" class="spcolor" id="<?php echo $this->get_field_id('acfw30_btn_bg_spcolor'); ?>" name="<?php echo $this->get_field_name('acfw30_btn_bg_spcolor'); ?>" value="<?php echo $acfw30_btn_bg_spcolor ?>"> 

        </p>
        <p><label for="<?php echo $this->get_field_id('acfw30_btn_text_spcolor'); ?>"><?php echo __('Text color', 'acfw30'); ?>:</label></br>
        <input type="text" class="spcolor" id="<?php echo $this->get_field_id('acfw30_btn_text_spcolor'); ?>" name="<?php echo $this->get_field_name('acfw30_btn_text_spcolor'); ?>" value="<?php echo $acfw30_btn_text_spcolor ?>">
    	</p>
        <p>
			<label for="<?php echo $this->get_field_id('acfw30_btn_icon'); ?>"><?php echo __('Icon', 'acfw30'); ?>:</label> 
			<select class="widefat" id="<?php echo $this->get_field_id('acfw30_btn_icon'); ?>" name="<?php echo $this->get_field_name('acfw30_btn_icon'); ?>" style="font-family: 'FontAwesome', 'sans-serif';">
				<option value="<?php echo $acfw30_btn_icon;?>"><?php echo acfw30_get_icons_symbol($acfw30_btn_icon);?> <?php echo $acfw30_btn_icon;?></option>
				<?php acfw30_get_contact_icons();?>
			</select>
		</p>

        <p>
            <label for="<?php echo $this->get_field_id('acfw30_btn_animation'); ?>"><?php echo __('Button animation', 'acfw30'); ?>:</label> 
            <select class="widefat" id="<?php echo $this->get_field_id('acfw30_btn_animation'); ?>" name="<?php echo $this->get_field_name('acfw30_btn_animation'); ?>">
                <option value="<?php echo $acfw30_btn_animation;?>"><?php echo $acfw30_btn_animation;?></option>
                <option disabled>---</option>
                <option value="none"><?php echo __('none', 'acfw30'); ?></option>
                <option value="rotate"><?php echo __('rotate', 'acfw30'); ?></option>
                <option value="tada"><?php echo __('tada', 'acfw30'); ?></option>
                <option value="swing"><?php echo __('swing', 'acfw30'); ?></option>
                <option value="grow"><?php echo __('grow', 'acfw30'); ?></option>
                <option value="shrink"><?php echo __('shrink', 'acfw30'); ?></option>
                <option value="buzz"><?php echo __('buzz', 'acfw30'); ?></option>
                <option value="forward"><?php echo __('forward', 'acfw30'); ?></option>
                <option value="backward"><?php echo __('backward', 'acfw30'); ?></option>
            </select>
        </p>

		<p>
			<label for="<?php echo $this->get_field_id('acfw30_btn_position'); ?>"><?php echo __('Button position', 'acfw30'); ?>:</label> 
			<select class="widefat" id="<?php echo $this->get_field_id('acfw30_btn_position'); ?>" name="<?php echo $this->get_field_name('acfw30_btn_position'); ?>">
				<option value="<?php echo $acfw30_btn_position;?>"><?php if($acfw30_btn_position=='left'){ echo __('left', 'acfw30');} else {echo __('right', 'acfw30');}?></option>
				<option disabled>---</option>
                <option value="left"><?php echo __('left', 'acfw30'); ?></option>
                <option value="right"><?php echo __('right', 'acfw30'); ?></option>
			</select>
		</p>
		<p><label for="<?php echo $this->get_field_id('acfw30_btn_position_left'); ?>"><?php echo __('left', 'acfw30'); ?>:</label></br>
        <input type="number" class="acfw30_btn_position_left" id="<?php echo $this->get_field_id('acfw30_btn_position_left'); ?>" name="<?php echo $this->get_field_name('acfw30_btn_position_left'); ?>" value="<?php echo $acfw30_btn_position_left ?>" style="width:60px;">px
    	</p>
    	<p><label for="<?php echo $this->get_field_id('acfw30_btn_position_right'); ?>"><?php echo __('right', 'acfw30'); ?>:</label></br>
        <input type="number" class="acfw30_btn_position_right" id="<?php echo $this->get_field_id('acfw30_btn_position_right'); ?>" name="<?php echo $this->get_field_name('acfw30_btn_position_right'); ?>" value="<?php echo $acfw30_btn_position_right ?>" style="width:60px;">px
    	</p>
    	<p><label for="<?php echo $this->get_field_id('acfw30_btn_position_bottom'); ?>"><?php echo __('bottom', 'acfw30'); ?>:</label></br>
        <input type="number" id="<?php echo $this->get_field_id('acfw30_btn_position_bottom'); ?>" name="<?php echo $this->get_field_name('acfw30_btn_position_bottom'); ?>" value="<?php echo $acfw30_btn_position_bottom ?>" style="width:60px;">px
    	</p>
        <?php 
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['acfw30_form_id'] = ( ! empty( $new_instance['acfw30_form_id'] ) ) ? $new_instance['acfw30_form_id'] : '';
        $instance['acfw30_btn_text'] = ( ! empty( $new_instance['acfw30_btn_text'] ) ) ? $new_instance['acfw30_btn_text'] : '';
        $instance['acfw30_btn_bg_spcolor'] = ( ! empty( $new_instance['acfw30_btn_bg_spcolor'] ) ) ? $new_instance['acfw30_btn_bg_spcolor'] : '';
        $instance['acfw30_btn_text_spcolor'] = ( ! empty( $new_instance['acfw30_btn_text_spcolor'] ) ) ? $new_instance['acfw30_btn_text_spcolor'] : '';
        $instance['acfw30_btn_icon'] = ( ! empty( $new_instance['acfw30_btn_icon'] ) ) ? $new_instance['acfw30_btn_icon'] : '';
        $instance['acfw30_btn_animation'] = ( ! empty( $new_instance['acfw30_btn_animation'] ) ) ? $new_instance['acfw30_btn_animation'] : '';
        $instance['acfw30_btn_position'] = ( ! empty( $new_instance['acfw30_btn_position'] ) ) ? $new_instance['acfw30_btn_position'] : '';
        $instance['acfw30_btn_position_left'] = ( ! empty( $new_instance['acfw30_btn_position_left'] ) ) ? $new_instance['acfw30_btn_position_left'] : '';
        $instance['acfw30_btn_position_right'] = ( ! empty( $new_instance['acfw30_btn_position_right'] ) ) ? $new_instance['acfw30_btn_position_right'] : '';
        $instance['acfw30_btn_position_bottom'] = ( ! empty( $new_instance['acfw30_btn_position_bottom'] ) ) ? $new_instance['acfw30_btn_position_bottom'] : '';
        return $instance;
    }

}

function register_acfw30_button_widget() {
    register_widget('acfw30_button_widget');
}

add_action('widgets_init', 'register_acfw30_button_widget');

function acfw30_widget_area(){
    dynamic_sidebar('acfw30_widget');
}

add_action('wp_footer', 'acfw30_widget_area');