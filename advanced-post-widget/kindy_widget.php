<?php
/*
Plugin Name: Advanced Post Widget
Description: Builds post widget based on options you choose from a form in a widget .
Author: Ibrahim Mohamed Abotaleb
Version: 1.0
Author URI: http://mrkindy.com/
Text Domain: kindy-widget
Domain Path: /languages
*/
class kindy_widget extends WP_Widget{
    function __construct()
    {
        $params = array(
            'description' => __('Builds post widget based on options you choose from a form in a widget', 'kindy-widget'),
            'name'        => __('Advanced Post Widget', 'kindy-widget')
        );
        parent::__construct('kindy_widget','',$params);
    }
    
    public function form($instance)
    {
        extract($instance);
        ?>
        <p>
                
            <label for="<?php echo $this->get_field_id('title');?>"><?_e('Title :', 'kindy-widget')?> </label>
            <input
                class="widefat"
                type="text"
                id="<?php echo $this->get_field_id('title');?>"
                name="<?php echo $this->get_field_name('title');?>"
                value="<?php if( isset($title) ) echo esc_attr($title)?>" />
                
            <label for="<?php echo $this->get_field_id('category_id');?>"><?_e('Cartegory :', 'kindy-widget')?> </label>
            <select
                class="widefat"
                id="<?php echo $this->get_field_id('category_id');?>"
                name="<?php echo $this->get_field_name('category_id');?>">
                <?php echo $this->categories_list($category_id)?>
            </select>
                
            <label for="<?php echo $this->get_field_id('rows');?>"><?_e('Number Of Posts :', 'kindy-widget')?> </label>
            <input
                class="widefat"
                type="text"
                id="<?php echo $this->get_field_id('rows');?>"
                name="<?php echo $this->get_field_name('rows');?>"
                value="<?php if( isset($rows) ) echo esc_attr($rows)?>" />
                
                
            <label for="<?php echo $this->get_field_id('offest');?>"><?_e('Offest (the number of posts to skip) :', 'kindy-widget')?> </label>
            <input
                class="widefat"
                type="text"
                id="<?php echo $this->get_field_id('offest');?>"
                name="<?php echo $this->get_field_name('offest');?>"
                value="<?php if( isset($offest) ) echo esc_attr($offest)?>" />
                
            <label for="<?php echo $this->get_field_id('order');?>"><?_e('Order by :', 'kindy-widget')?> </label>
            <select
                class="widefat"
                id="<?php echo $this->get_field_id('order');?>"
                name="<?php echo $this->get_field_name('order');?>">
                <?php echo $this->order_list($order)?>
            </select>
            
            <label for="<?php echo $this->get_field_id('template');?>"><?_e('Template :', 'kindy-widget')?> </label>
            <select
                class="widefat"
                id="<?php echo $this->get_field_id('template');?>"
                name="<?php echo $this->get_field_name('template');?>">
                <?php echo $this->template_list($template)?>
            </select>
            
            <label for="<?php echo $this->get_field_id('icon');?>"><?_e('Icon ( Default "fa-bars" ):', 'kindy-widget')?> </label>
            <input
                class="widefat"
                type="text"
                id="<?php echo $this->get_field_id('icon');?>"
                name="<?php echo $this->get_field_name('icon');?>"
                value="<?php if( isset($icon) ) echo esc_attr($icon)?>" />
            
            <label for="<?php echo $this->get_field_id('writer');?>"><?_e('Show Writer Name :', 'kindy-widget')?> </label>
            <input
                class="widefat"
                type="checkbox"
                <?php if( isset($writer) ){?>
                checked="checked"
                <?php }?>
                id="<?php echo $this->get_field_id('writer');?>"
                name="<?php echo $this->get_field_name('writer');?>"
                value="1" />
        </p>
        <?php
        
    }
    
    function categories_list($cat_id=0)
    {
        $out = '<option value="-1">'.__('All', 'kindy-widget').'</option>';
        foreach(get_categories() as $cat)
        {
            //print_r($cat);
            if($cat->cat_ID == $cat_id)
            {
                $out .= '<option selected="selected" value="'.$cat->cat_ID.'">'.$cat->cat_name.'</option>';
            }else{
                $out .= '<option value="'.$cat->cat_ID.'">'.$cat->cat_name.'</option>';
            }
        }
        return $out;
    }
    
    public function order_list($order="asc")
    {
        $orders = array('ID','post_views','rand','comment_count');
        $out = '';
        foreach($orders as $item)
        {
            if($item == $order)
            {
                $out .= '<option selected="selected">'.$item.'</option>';
            }else{
                $out .= '<option>'.$item.'</option>';
            }
        }
        return $out;
    }
    
    public function template_list($selected="")
    {
        $orders = array('widget_1'=>__('Text Only', 'kindy-widget'),
        'widget_2'=>__('Big Image', 'kindy-widget'),
        'widget_3'=>__('Right Image', 'kindy-widget'),
        'widget_4'=>__('Left Image', 'kindy-widget'),
        //'widget_5'=>__('tabs', 'kindy-widget'),
        'widget_6'=>__('Image Only', 'kindy-widget'),
        );
        $out = '';
        foreach($orders as $item=>$val)
        {
            if($item == $selected)
            {
                $out .= '<option selected="selected" value="'.$item.'">'.$val.'</option>';
            }else{
                $out .= '<option value="'.$item.'">'.$val.'</option>';
            }
        }
        return $out;
    }
    public function update($new_instance, $old_instance)
    {
        delete_transient( 'devnia_weather' );
        $instance = array();
        $instance['title'] = (! empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['category_id'] = (! empty($new_instance['category_id'])) ? strip_tags($new_instance['category_id']) : '';
        $instance['rows'] = (! empty($new_instance['rows'])) ? strip_tags($new_instance['rows']) : '';
        $instance['offest'] = (! empty($new_instance['offest'])) ? strip_tags($new_instance['offest']) : '';
        $instance['order'] = (! empty($new_instance['order'])) ? strip_tags($new_instance['order']) : '';
        $instance['template'] = (! empty($new_instance['template'])) ? strip_tags($new_instance['template']) : '';
        $instance['icon'] = (! empty($new_instance['icon'])) ? strip_tags($new_instance['icon']) : '';
        $instance['writer'] = (! empty($new_instance['writer'])) ? strip_tags($new_instance['writer']) : '';
        return $instance;
    }
    
    public function widget($widget,$instance)
    {
        
        echo $widget['before_widget'];
        if($instance['icon']){
            $before_title = str_replace('fa-bars',$instance['icon'],$widget['before_title']);
        }else{
            $before_title = $widget['before_title'];
        }
        

        echo $before_title.$instance['title'].$widget['after_title'];
        include('template/'.$instance['template'].".php");
        
        echo $widget['after_widget'];
    }
}
add_action('widgets_init','kindy_widget_register');
function kindy_widget_register()
{
    register_widget('kindy_widget');
}


function kindy_style() {
	wp_enqueue_style( 'pro-widget-style', plugins_url( 'css/style.css', dirname(__FILE__)));
}

add_action( 'wp_enqueue_scripts', 'kindy_style' );


add_action( 'add_meta_boxes', 'kindy_meta_box_add' );
function kindy_meta_box_add()
{
    add_meta_box( 'my-meta-box-id', __('Writer Name :', 'kindy-widget'), 'kindy_meta_box_cb', 'post', 'normal', 'high' );
}




function kindy_meta_box_cb( $post )
{
    $values = get_post_custom( $post->ID );
    $writer_name = isset( $values['writer_name'] ) ? esc_attr( $values['writer_name'][0] ) : '';
        ?>
    <p>
        <label for="my_meta_box_text"><?_e('Writer Name :', 'kindy-widget')?></label>
        <input type="text" name="writer_name" id="writer_name" value="<?php echo $writer_name; ?>" />
    </p>
<?php        
}
 
 
 add_action( 'save_post', 'kindy_meta_box_save' );
function kindy_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['writer_name'] ) )
        update_post_meta( $post_id, 'writer_name', esc_attr( $_POST['writer_name'] ) );
         
}
