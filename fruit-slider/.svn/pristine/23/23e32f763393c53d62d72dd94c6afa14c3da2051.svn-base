<?php
$save_url = add_query_arg(array('method' => 'save_layer', 'id' => $_GET['id']), admin_url('admin.php?page=edit_layer_settings'));
global $wpdb;
?>
<div class="wrap">
    <div class="fruit_element">
        <?php
        switch (isset($_GET['method']) ? $_GET['method'] : '') {
            case 'edit_layer':
                if (!empty($_GET['id']) && isset($_GET['id'])) {

                    $table = $wpdb->prefix . "add_fruitslider";
                    $slider_details = $wpdb->get_results("SELECT * FROM " . $table . " WHERE ID = " . $_GET['id']);
                    $attachment_id = $slider_details[0]->attachment_id;
                    ?>
                    <h2 class="fruit-title"><?php _e('Edit Layer', FRUIT_SLIDER_SLUG); ?></h2>

                    <?php
                    $table = $wpdb->prefix . "add_fruitslider_layer";
                    $slider_layer = $wpdb->get_results("SELECT 	* FROM " . $table . " WHERE image_id = " . $_GET['id']);
                    ?>
                    <form method="post" action="<?php echo $save_url; ?>" >
                        <table class="fruit-table image-element">
                            <thead>
                                <tr class="odd-row">
                                    <th colspan="3"><?php _e('Image effect Options', FRUIT_SLIDER_SLUG); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="fruit-table-header">
                                    <td><?php _e('Option', FRUIT_SLIDER_SLUG); ?></td>
                                    <td><?php _e('Parameter', FRUIT_SLIDER_SLUG); ?></td>
                                    <td><?php _e('Description', FRUIT_SLIDER_SLUG); ?></td>
                                </tr>
                                <tr>
                                    <td class="fruit-name"><?php _e('In animation', FRUIT_SLIDER_SLUG); ?></td>
                                    <td class="fruit-content">
                                        <?php $value = !empty($slider_layer[0]->sliderimage_inanimation) ? $slider_layer[0]->sliderimage_inanimation : 'FadeIn'; ?>
                                        <input type="hidden" value="<?php echo $value; ?>" id="select_image_in">
                                        <select name="slider_inanimation_image" class="input fruit-image-data_in">
                                            <?php animation_option(); ?>
                                        </select>
                                    </td>
                                    <td class="fruit-description">
                                        <?php _e('designates a specific entering animation for the current slide', FRUIT_SLIDER_SLUG); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fruit-name"><?php _e('Out animation', FRUIT_SLIDER_SLUG); ?></td>
                                    <td class="fruit-content">
                                        <?php $value = !empty($slider_layer[0]->sliderimage_outanimation) ? $slider_layer[0]->sliderimage_outanimation : 'FadeOut'; ?>
                                        <input type="hidden" value="<?php echo $value; ?>" id="select_image_out">						
                                        <select name="slider_outanimation_image" class="input fruit-image-data_out">
                                            <?php animation_option(); ?>
                                        </select>
                                    </td>
                                    <td class="fruit-description">
                                        <?php _e('designates a specific exiting animation for the current slide', FRUIT_SLIDER_SLUG); ?>
                                    </td>
                                </tr>					
                            </tbody>
                        </table>

                        <div class="update_new_image" id="update_newslider">
                            <?php _e('Upload Image', FRUIT_SLIDER_SLUG); ?> :  <input type="button" id="fruit_image_slider" value="Choose Files" name="fruit_image_slider" class="button button-secondary">
                        </div>
                        <div class="update_new_gallery" id="update_new_gallery">
                            <div class="select_gallery">
                                <?php
                                $gallerydetails = unserialize($slider_details[0]->gallery);
                                $count_gallery = sizeof($gallerydetails);
                                ?>
                                <h2><?php _e('Galleries', FRUIT_SLIDER_SLUG); ?></h2>
                                <?php
                                $table = $wpdb->prefix . "add_fruitgallery";
                                $gallery_details = $wpdb->get_results("SELECT * FROM " . $table);
                                if (!empty($gallery_details)) :
                                    ?>
                                    <label style="font-weight:bold"><input onclick="jqCheckAll(this, '', 'Slide[galleries]');" type="checkbox" name="checkboxall" value="checkboxall" id="checkboxall" /> <?php _e('Select All', FRUIT_SLIDER_SLUG); ?></label>
                                    <?php foreach ($gallery_details as $gallery) :
                                        ?>
                                        <label>
                                            <input type="checkbox" name="Slide[galleries][]" value="<?php echo $gallery->ID; ?>" id="Slide_galleries_<?php echo $gallery->ID; ?>" 
                    <?php
                    for ($i = 0; $i < $count_gallery; $i++) {
                        $galleryid = $gallerydetails[$i];
                        if ($gallery->ID == $galleryid) {
                            echo 'checked= checked';
                        }
                    }
                    ?>
                                                   /> 
                                                   <?php echo $gallery->gallery_name; ?>
                                        </label>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <span class="error"><?php _e('No galleries are available.', FRUIT_SLIDER_SLUG); ?></span>
                                <?php endif; ?>
                            </div>	
                        </div>
                        <div class="fruit_slider">
                            <?php
                            $image_src = wp_get_attachment_image_src($attachment_id, 'full');
                            echo '<input type="hidden" class="update_image_id" name="update_image_id" value="' . $attachment_id . '">';
                            echo '<img src="' . $image_src[0] . '" class="fruit_slider_image">';
                            echo '<div class="fruit_slider_title" id="animation_title"></div>';
                            echo '<p class="fruit_slider_content" id="animation_content"></p>';
                            echo '<a class="fruit_slider_link" href="" id="animation_link"></a>';
                            ?>
                        </div>

                        <table class="fruit-element-settings-list fruit-text-element-settings-list fruit-table">
                            <thead>
                                <tr class="odd-row">
                                    <th colspan="5"><?php _e('Element Options', FRUIT_SLIDER_SLUG); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="fruit-table-header">
                                    <td><?php _e('Option', FRUIT_SLIDER_SLUG); ?></td>
                                    <td colspan="3"><?php _e('Parameter', FRUIT_SLIDER_SLUG); ?></td>
                                    <td><?php _e('Description', FRUIT_SLIDER_SLUG); ?></td>
                                </tr>
                                <tr>
                                    <td class="fruit-name"><?php _e('Title', FRUIT_SLIDER_SLUG); ?></td>
                                    <td class="fruit-content">
                                        <?php
                                        $title = !empty($slider_layer[0]->slider_title) ? $slider_layer[0]->slider_title : '';
                                        echo '<input class="fruit-element-data_title" type="text" value="' . $title . '" id="slider_title" name="slider_title"/>';
                                        ?>
                                    </td>
                                    <td class="fruit-content">
                                        <?php
                                        $title_top = !empty($slider_layer[0]->slider_title_top) ? $slider_layer[0]->slider_title_top : ' 0 ';
                                        _e('Top ', FRUIT_SLIDER_SLUG);
                                        echo '<input class="fruit-element-top_title" type="number"  min="0"  value="' . $title_top . '" name="slider_title_top"/> px';
                                        ?>
                                    </td>
                                    <td class="fruit-content">
                                        <?php
                                        $title_left = !empty($slider_layer[0]->slider_title_left) ? $slider_layer[0]->slider_title_left : ' 0 ';
                                        _e('Left ', FRUIT_SLIDER_SLUG);
                                        echo '<input class="fruit-element-left_title" type="number"  min="0" value="' . $title_left . '" name="slider_title_left"/> px';
                                        ?>
                                    </td>						
                                    <td class="fruit-description">
                                        <?php _e('Write the Title', FRUIT_SLIDER_SLUG); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fruit-name"><?php _e('Text', FRUIT_SLIDER_SLUG); ?></td>
                                    <td class="fruit-content">
                                        <?php
                                        $content = !empty($slider_layer[0]->slider_content) ? $slider_layer[0]->slider_content : '';
                                        echo '<textarea class="fruit-element-inner_html" id="slider_content" name="slider_content">' . __($content, FRUIT_SLIDER_SLUG) . '</textarea>';
                                        ?>
                                    </td>
                                    <td class="fruit-content">
                                        <?php
                                        $content_top = !empty($slider_layer[0]->slider_content_top) ? $slider_layer[0]->slider_content_top : ' 30 ';
                                        _e('Top ', FRUIT_SLIDER_SLUG);
                                        echo '<input class="fruit-element-top_text" type="number"  min="0"  value="' . $content_top . '" name="slider_content_top"/> px';
                                        ?>
                                    </td>
                                    <td class="fruit-content">
                                        <?php
                                        $content_left = !empty($slider_layer[0]->slider_content_left) ? $slider_layer[0]->slider_content_left : ' 0 ';
                                        _e('Left ', FRUIT_SLIDER_SLUG);
                                        echo '<input class="fruit-element-left_text" type="number"  min="0"  value="' . $content_left . '" name="slider_content_left"/> px';
                                        ?>
                                    </td>	
                                    <td class="fruit-description">
                                        <?php _e('Write the Text .', FRUIT_SLIDER_SLUG); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fruit-name"><?php _e('Link', FRUIT_SLIDER_SLUG); ?></td>
                                    <td class="fruit-content" colspan="2">
                                        <?php
                                        $link = !empty($slider_layer[0]->slider_url) ? unserialize($slider_layer[0]->slider_url) : '';
                                        $link_url = !empty($link['url']) ? $link['url'] : '';
                                        $link_target = !empty($link['target']) && $link['target'] != 'off' ? 'checked' : '';
                                        echo '<input class="fruit-element-link" type="text" value="' . $link_url . '" id="slider_url" name="slider_url"/>';
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo '<input class="fruit-element-link_new_tab" type="checkbox" id="slider_target_link" name="slider_url_checkbox" ' . $link_target . '/>' . __('Open link in a new tab', FRUIT_SLIDER_SLUG);
                                        ?>
                                    </td>
                                    <td class="fruit-description" colspan="2">
                                        <?php _e("Open the link (e.g.: http://www.google.com) on click. Leave it empty if you don't want it.", FRUIT_SLIDER_SLUG); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fruit-name"><?php _e('Link Title', FRUIT_SLIDER_SLUG); ?></td>
                                    <td class="fruit-content">
                                        <?php
                                        $url = !empty($slider_layer[0]->slider_link) ? $slider_layer[0]->slider_link : '';
                                        echo '<input class="fruit-element-link_title" type="text" value="' . $url . '" id="slider_link" name="slider_link"/>';
                                        ?>					
                                    </td>
                                    <td class="fruit-content">
                                        <?php
                                        $url_top = !empty($slider_layer[0]->slider_link_top) ? $slider_layer[0]->slider_link_top : '100';
                                        _e('Top ', FRUIT_SLIDER_SLUG);
                                        echo '<input class="fruit-element-top_link" type="number" value="' . $url_top . '" name="slider_link_top"/> px';
                                        ?>
                                    </td>
                                    <td class="fruit-content">
                                        <?php
                                        $url_left = !empty($slider_layer[0]->slider_link_left) ? $slider_layer[0]->slider_link_left : '10';
                                        _e('Left ', FRUIT_SLIDER_SLUG);
                                        echo '<input class="fruit-element-left_link" type="number" value="' . $url_left . '" name="slider_link_left"/> px';
                                        ?>
                                    </td>	
                                    <td class="fruit-description">
                                        <?php _e('Anchor tag title', FRUIT_SLIDER_SLUG); ?>
                                    </td>
                                </tr>		
                                <tr>
                                    <td class="fruit-name"><?php _e('Title Color', FRUIT_SLIDER_SLUG); ?></td>
                                    <td class="fruit-content" colspan="2">
                                        <?php
                                        $color = !empty($slider_layer[0]->slider_titlecolor) ? $slider_layer[0]->slider_titlecolor : '#fff';
                                        echo '<input type="text" id="title_color" class="of-input caption_color" name="slider_titlecolor"  size="32"  value="' . $color . '"/>';
                                        ?>					
                                    </td>
                                    <td class="fruit-description" colspan="2">
                                        <?php _e('Choose Title Color', FRUIT_SLIDER_SLUG); ?>
                                    </td>
                                </tr>	
                                <tr>
                                    <td class="fruit-name"><?php _e('Content Color', FRUIT_SLIDER_SLUG); ?></td>
                                    <td class="fruit-content" colspan="2">
                                        <?php
                                        $color = !empty($slider_layer[0]->slider_contentcolor) ? $slider_layer[0]->slider_contentcolor : '#fff';
                                        echo '<input type="text" id="content_color" class="of-input caption_color" name="slider_contentcolor"  size="32"  value="' . $color . '"/>';
                                        ?>					
                                    </td>
                                    <td class="fruit-description" colspan="2">
                                        <?php _e('Choose Content Color', FRUIT_SLIDER_SLUG); ?>
                                    </td>
                                </tr>					
                                <tr>
                                    <td class="fruit-name"><?php _e('In animation', FRUIT_SLIDER_SLUG); ?></td>
                                    <td class="fruit-content" colspan="2">
                                        <?php $value = !empty($slider_layer[0]->slider_animation) ? $slider_layer[0]->slider_animation : 'FadeIn'; ?>	
                                        <input type="hidden" value="<?php echo $value; ?>" id="select_inanimation">			
                                        <select class="input input_dropdown js_animations fruit-element-data_in" name="slider_animation">
                                            <?php animation_option(); ?>
                                        </select>
                                    </td>
                                    <td class="fruit-description" colspan="2">
                                        <?php _e('The in animation of the element.', FRUIT_SLIDER_SLUG); ?>
                                    </td>
                                </tr>	
                                <tr>
                                    <td class="fruit-name"><?php _e('Out animation', FRUIT_SLIDER_SLUG); ?></td>
                                    <td class="fruit-content" colspan="2">
                                        <?php $value = !empty($slider_layer[0]->slider_animation_out) ? $slider_layer[0]->slider_animation_out : 'FadeOut'; ?>	
                                        <input type="hidden" value="<?php echo $value; ?>" id="select_outanimation">	
                                        <select class="input input_dropdown js_animations_out fruit-element-data_out" name="slider_animation_out">
                                            <?php animation_option(); ?>						
                                        </select>
                                    </td>
                                    <td class="fruit-description" colspan="2">
                                        <?php _e('The out animation of the element.', FRUIT_SLIDER_SLUG); ?>
                                    </td>
                                </tr>									
                                <tr>
                                    <td class="fruit-name"><?php _e('Custom CSS', FRUIT_SLIDER_SLUG); ?></td>
                                    <td class="fruit-content" colspan="2">
                                        <?php
                                        $custom_css = !empty($slider_layer[0]->slider_custom_css) ? $slider_layer[0]->slider_custom_css : '';
                                        echo '<textarea class="fruit-element-custom_css" name="slider_custom_css">' . $custom_css . '</textarea>';
                                        ?>
                                    </td>
                                    <td class="fruit-description" colspan="2">
                                        <?php _e('Style the element.', FRUIT_SLIDER_SLUG); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>	


                        <?php if (!empty($slider_layer[0]->slider_layer)) {
                            $layer = explode('_', $slider_layer[0]->slider_layer);
                        } ?>
                        <div id="fruit_imageslides">							
                            <table class="fruit-table" id="fruit_imagelayer">
                                <thead>
                                    <tr class="odd-row">
                                        <th colspan="5"><?php _e('Image Layer Options', FRUIT_SLIDER_SLUG); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="fruit-table-header">
                                        <td><?php _e('Option', FRUIT_SLIDER_SLUG); ?></td>
                                        <td colspan='3'><?php _e('Parameter', FRUIT_SLIDER_SLUG); ?></td>
                                        <td><?php _e('Image', FRUIT_SLIDER_SLUG); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fruit-name"> Layer Image  :  
                                            <?php $image_id = !empty($layer[6]) ? $layer[6] : '';
                                            if (empty($image_id)) {
                                                ?>
                                                <input class="button button-secondary" type="button" name="fruit_sliderimage" value="<?php _e('Choose Files', FRUIT_SLIDER_SLUG); ?>" id="fruit_sliderimage" />
            <?php } ?>
                                            <input class="button button-secondary" type="button" name="fruit_sliderimage" value="<?php _e('Choose Files', FRUIT_SLIDER_SLUG); ?>" id="fruit_sliderimage"  style="display:none;"/>

                                        </td>
                                        <td class="fruit-content" colspan='3' >
                                            <?php $top = !empty($layer[0]) ? $layer[0] : '0'; ?>
                                            <?php _e('Top', FRUIT_SLIDER_SLUG); ?> <input type="text" name="slider_layer_top" value="<?php echo $top; ?>" class="fruit-element-top_layer"> px
                                            <br/>
                                            <?php $left = !empty($layer[1]) ? $layer[1] : '0'; ?>
                                            <?php _e('Left', FRUIT_SLIDER_SLUG); ?> <input type="text" name="slider_layer_left" value="<?php echo $left; ?>" class="fruit-element-left_layer"> px
                                            <br/>
                                            <?php $delay = !empty($layer[2]) ? $layer[2] : '2000'; ?>
                                            <?php _e('Delay', FRUIT_SLIDER_SLUG); ?><input type="text" name="slider_layer_delay" value="<?php echo $delay; ?>" class="fruit-element_delay_layer"> ms
                                            <br/>
                                            <?php $delay_out = !empty($layer[3]) ? $layer[3] : '2000'; ?>
                                            <?php _e('Delay-Out', FRUIT_SLIDER_SLUG); ?><input type="text" name="slider_layer_delay_out" value="<?php echo $delay_out; ?>" class="fruit-element-layer_delay_out">
                                            <br/>
                                                <?php $in_animation = !empty($layer[4]) ? $layer[4] : ''; ?>
            <?php _e('In Animation', FRUIT_SLIDER_SLUG); ?>							
                                            <select name="layer_animation" class="input fruit-layer-data_in">
                                            <?php animation_option(); ?>
                                            </select>
                                            <br/>
                                                <?php $out_animation = !empty($layer[5]) ? $layer[5] : ''; ?>
            <?php _e('Out Animation', FRUIT_SLIDER_SLUG); ?>							
                                            <select name="layer_animationout" class="input fruit-layer-data_out">
                                            <?php animation_option(); ?>
                                            </select>																		
                                        </td>
                                        <td class="fruit-description" id="main_layer_content">
                                            <?php $image_id = !empty($layer[6]) ? $layer[6] : ''; ?>
                                                <?php
                                                if (!empty($image_id)) {
                                                    $image_src = wp_get_attachment_image_src($image_id);
                                                    ?>
                                                <a id ="fruit_sliderupload_row_<?php echo $image_id; ?>" onclick="jQuery.colorbox({href: '<?php echo $image_src[0]; ?>'});
                                                                                return false;" class="colorbox" href="">
                                                    <img src="<?php echo $image_src[0]; ?>" class="dropshadow" style="width:100px;">
                                                </a>
                                                <input type="hidden" value="<?php echo $image_id; ?>" name="Slide_layerid" id="slide_id_<?php echo $image_id; ?>"/>
                                                <input onclick="if (confirm('<?php echo __('Are you sure you want to remove this slide?', FRUIT_SLIDER_SLUG); ?>')) {
                                                                                    jQuery('#remove<?php echo $image_id; ?>').remove();
                                                                                    jQuery('#fruit_sliderupload_row_<?php echo $image_id; ?>').remove();
                                                                                    jQuery('#slide_id_<?php echo $image_id; ?>').remove();
                                                                                    jQuery('#fruit_sliderimage').show();
                                                                                }
                                                                                return false;" class="button button-secondary button-small" type="button" name="remove" value="<?php echo __('Remove', FRUIT_SLIDER_SLUG); ?>" id="remove<?php echo $image_id; ?>" />							
            <?php } ?>		
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>	

                        <input type="submit" name="layer-multiple" value="<?php _e('Save Layer', FRUIT_SLIDER_SLUG); ?>" class="button button-primary" />
                    </form>	
                    <?php
                }
                break; //case 'edit_layer':

            case 'save_layer' : // case 'save layer'
                if (!empty($_GET['id']) && isset($_GET['id']) && !empty($_POST)) {
                    $image_id = $_GET['id'];
                    $gallery = $_POST['Slide']['galleries'];
                    $layer_info = array(
                        'slider_layer_top' => $_POST['slider_layer_top'],
                        'slider_layer_left' => $_POST['slider_layer_left'],
                        'slider_layer_delay' => $_POST['slider_layer_delay'],
                        'slider_layer_delay_out' => $_POST['slider_layer_delay_out'],
                        'layer_animation' => $_POST['layer_animation'],
                        'layer_animationout' => $_POST['layer_animationout'],
                        'Slide_layerid' => isset($_POST['Slide_layerid']) ? $_POST['Slide_layerid'] : ''
                    );

                    $table = $wpdb->prefix . "add_fruitslider_layer";
                    $slider_layer = $wpdb->get_results("SELECT image_id FROM " . $table . " WHERE image_id = " . $image_id);
                    $count = count($slider_layer);
                    $redirect = admin_url('admin.php?page=slider_settings');
                    $wpdb->update(
                            $wpdb->prefix . "add_fruitslider", array('attachment_id' => $_POST['update_image_id'],
                        'gallery' => serialize($gallery)
                            ), array('ID' => $image_id), array('%s', '%s'), array('%d')
                    );
                    if ($count == '0') {
                        $wpdb->insert($table, array(
                            'image_id' => $image_id,
                            'slider_title' => stripslashes($_POST['slider_title']),
                            'slider_title_top' => $_POST['slider_title_top'],
                            'slider_title_left' => $_POST['slider_title_left'],
                            'slider_content' => stripslashes($_POST['slider_content']),
                            'slider_content_top' => $_POST['slider_content_top'],
                            'slider_content_left' => $_POST['slider_content_left'],
                            'slider_link' => stripslashes($_POST['slider_link']),
                            'slider_link_top' => $_POST['slider_link_top'],
                            'slider_link_left' => $_POST['slider_link_left'],
                            'slider_url' => serialize(array('url' => !empty($_POST['slider_url']) ? $_POST['slider_url'] : '', 'target' => !empty($_POST['slider_url_checkbox']) ? $_POST['slider_url_checkbox'] : 'off')),
                            'slider_titlecolor' => $_POST['slider_titlecolor'],
                            'slider_contentcolor' => $_POST['slider_contentcolor'],
                            'slider_animation' => $_POST['slider_animation'],
                            'slider_animation_out' => $_POST['slider_animation_out'],
                            'slider_custom_css' => $_POST['slider_custom_css'],
                            'sliderimage_inanimation' => $_POST['slider_inanimation_image'],
                            'sliderimage_outanimation' => $_POST['slider_outanimation_image'],
                            'slider_layer' => implode('_', $layer_info)
                                ), array(
                            '%d', '%s', '%d', '%d', '%s', '%d', '%d', '%s', '%d', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'
                                )
                        );
                    } else {
                        $wpdb->update(
                                $table, array(
                            'slider_title' => stripslashes($_POST['slider_title']),
                            'slider_title_top' => $_POST['slider_title_top'],
                            'slider_title_left' => $_POST['slider_title_left'],
                            'slider_content' => stripslashes($_POST['slider_content']),
                            'slider_content_top' => $_POST['slider_content_top'],
                            'slider_content_left' => $_POST['slider_content_left'],
                            'slider_link' => stripslashes($_POST['slider_link']),
                            'slider_link_top' => $_POST['slider_link_top'],
                            'slider_link_left' => $_POST['slider_link_left'],
                            'slider_url' => serialize(array('url' => !empty($_POST['slider_url']) ? esc_url($_POST['slider_url']) : '', 'target' => !empty($_POST['slider_url_checkbox']) ? $_POST['slider_url_checkbox'] : 'off')),
                            'slider_titlecolor' => $_POST['slider_titlecolor'],
                            'slider_contentcolor' => $_POST['slider_contentcolor'],
                            'slider_animation' => $_POST['slider_animation'],
                            'slider_animation_out' => $_POST['slider_animation_out'],
                            'slider_custom_css' => $_POST['slider_custom_css'],
                            'sliderimage_inanimation' => $_POST['slider_inanimation_image'],
                            'sliderimage_outanimation' => $_POST['slider_outanimation_image'],
                            'slider_layer' => implode('_', $layer_info)
                                ), array('image_id' => $image_id), array(
                            '%s', '%d', '%d', '%s', '%d', '%d', '%s', '%d', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'
                                ), array('%d')
                        );
                    }
                    echo"<script>window.location='" . $redirect . "';</script>";
                }
                break; // save layer 

            default:
                if (isset($_POST['save_settings']) && !empty($_POST)) {
                    $option_name = 'slider_settings';
                    $new_value = array(
                        'change_color' => (isset($_POST['change_color'])) ? $_POST['change_color'] : '',
                        'change_hovercolor' => (isset($_POST['change_hovercolor'])) ? $_POST['change_hovercolor'] : '',
                        'show_navbar' => (isset($_POST['show_navbar'])) ? $_POST['show_navbar'] : '',
                        'show_bullets' => (isset($_POST['show_bullets'])) ? $_POST['show_bullets'] : '',
                        'show_thumbnail' => (isset($_POST['show_thumbnail'])) ? $_POST['show_thumbnail'] : '',
                    );
                    if (get_option($option_name) !== false) {
                        update_option($option_name, $new_value);
                    } else {
                        $deprecated = null;
                        $autoload = 'no';
                        add_option($option_name, $new_value, $deprecated, $autoload);
                    }
                }
                $option_name = 'slider_settings';
                $option_value = get_option($option_name);
                ?>
                <h2 class="fruit-title"><?php _e('Settings', FRUIT_SLIDER_SLUG); ?></h2>

                <form method="post" action="">
                    <table class="fruit-table slider_settings">
                        <thead>
                            <tr class="odd-row">
                                <th colspan="3"><?php _e('Slider Settings', FRUIT_SLIDER_SLUG); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fruit-name"><?php _e('Select Color options', FRUIT_SLIDER_SLUG); ?></td>
                                <td class="fruit-content">
        <?php _e('Select Color  ', FRUIT_SLIDER_SLUG); ?>
                                    <input type="text" id="themecolor" class="of-input caption_color" name="change_color"  size="32"  value="<?php
        if (!empty($option_value['change_color'])) {
            echo esc_attr($option_value['change_color']);
        }
        ?>">
                                </td>
                                <td class="fruit-content">
                                    <?php _e('Select Hover Color  ', FRUIT_SLIDER_SLUG); ?>
                                    <input type="text" id="themehovercolor" class="of-input caption_color" name="change_hovercolor"  size="32"  value="<?php
                                    if (!empty($option_value['change_hovercolor'])) {
                                        echo esc_attr($option_value['change_hovercolor']);
                                    }
                                    ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="fruit-name"><?php _e('Always Show Navigation Control', FRUIT_SLIDER_SLUG); ?></td>
                                <td class="fruit-content"  colspan="2">
                                    <select class="show_navbar" name="show_navbar">											
                                           <?php
                                           $options = array('Yes', 'No');
                                           $output = '';
                                           foreach ($options as $option) {
                                               $output .= '<option ' . ( $option_value['show_navbar'] == $option ? 'selected="selected"' : '' ) . '>'
                                                       . $option
                                                       . '</option>';
                                           }
                                           echo $output;
                                           ?>												
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="fruit-name"><?php _e('Always Show Bullets', FRUIT_SLIDER_SLUG); ?></td>
                                <td class="fruit-content"  colspan="2">
                                    <select class="show_bullets" name="show_bullets">											
        <?php
        $options = array('Yes', 'No');
        $output = '';
        foreach ($options as $option) {
            $output .= '<option ' . ( $option_value['show_bullets'] == $option ? 'selected="selected"' : '' ) . '>'
                    . $option
                    . '</option>';
        }
        echo $output;
        ?>												
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="fruit-name"><?php _e('Show Thumbnail', FRUIT_SLIDER_SLUG); ?></td>
                                <td class="fruit-content"  colspan="2">
                                    <select class="show_thumbnail" name="show_thumbnail">											
        <?php
        $options = array('Yes', 'No');
        $output = '';
        foreach ($options as $option) {
            $output .= '<option ' . ( $option_value['show_thumbnail'] == $option ? 'selected="selected"' : '' ) . '>'
                    . $option
                    . '</option>';
        }
        echo $output;
        ?>												
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style="text-align:center;"><input type="submit" class="button button-primary" value="Save Settings" name="save_settings"></p>
                </form>						
        <?php
        break;
} // main switch  
?>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function () {
        //layer upload

        var file_frame;

        jQuery('#fruit_sliderimage').on('click', function (event) {
            event.preventDefault();

            // If the media frame already exists, reopen it.
            if (file_frame) {
                file_frame.open();
                return;
            }

            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
                title: '<?php _e('Upload Slides', FRUIT_SLIDER_SLUG); ?>',
                button: {
                    text: '<?php _e('Select Images as Slides', FRUIT_SLIDER_SLUG); ?>',
                },
                multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            file_frame.on('select', function () {
                attachment = file_frame.state().get('selection').first().toJSON();
                var attachment_html = '<a id= "fruit_sliderupload_row_' + attachment.id + '" href="" class="colorbox" onclick="jQuery.colorbox({href:\'' + attachment.url + '\'}); return false;"><img style="width:100px;" class="dropshadow" src="' + attachment.sizes.thumbnail.url + '" /></a>';
                attachment_html += '<input type="hidden" value="' + attachment.id + '" name="Slide_layerid" />';
                attachment_html += '<input onclick="if (confirm(\'<?php echo __('Are you sure you want to remove this slide?', FRUIT_SLIDER_SLUG); ?>\')) { jQuery(\'#remove' + attachment.id + '\').remove();  jQuery(\'#fruit_sliderupload_row_' + attachment.id + '\').remove(); jQuery(\'#fruit_sliderimage\').show(); } return false;" class="button button-secondary button-small" type="button" name="remove" value="<?php echo __('Remove', FRUIT_SLIDER_SLUG); ?>" id="remove' + attachment.id + '" />';
                jQuery('#main_layer_content').append(attachment_html);
                jQuery('#fruit_sliderimage').hide();

            });

            // Finally, open the modal
            file_frame.open();
        });

        jQuery('#fruit_image_slider').on('click', function (event) {
            event.preventDefault();

            if (file_frame) {
                file_frame.open();
                return;
            }

            file_frame = wp.media.frames.file_frame = wp.media({
                title: '<?php _e('Upload Slides', FRUIT_SLIDER_SLUG); ?>',
                button: {
                    text: '<?php _e('Select Images as Slides', FRUIT_SLIDER_SLUG); ?>',
                },
                multiple: false
            });

            file_frame.on('select', function () {
                attachment = file_frame.state().get('selection').first().toJSON();
                jQuery('.fruit_slider .fruit_slider_image').attr('src', attachment.url);
                jQuery('.fruit_slider .update_image_id').attr('value', attachment.id);
            });

            file_frame.open();
        });
    });
</script>	
<?php

function animation_option() { ?>
    <optgroup label="Attention Seekers">
        <option value="bounce"><?php _e('bounce', FRUIT_SLIDER_SLUG); ?></option>
        <option value="flash"><?php _e('flash', FRUIT_SLIDER_SLUG); ?></option>
        <option value="pulse"><?php _e('pulse', FRUIT_SLIDER_SLUG); ?></option>
        <option value="rubberBand"><?php _e('rubberBand', FRUIT_SLIDER_SLUG); ?></option>
        <option value="shake"><?php _e('shake', FRUIT_SLIDER_SLUG); ?></option>
        <option value="swing"><?php _e('swing', FRUIT_SLIDER_SLUG); ?></option>
        <option value="tada"><?php _e('tada', FRUIT_SLIDER_SLUG); ?></option>
        <option value="wobble"><?php _e('wobble', FRUIT_SLIDER_SLUG); ?></option>
    </optgroup>

    <optgroup label="Bouncing Entrances">
        <option value="bounceIn"><?php _e('bounceIn', FRUIT_SLIDER_SLUG); ?></option>
        <option value="bounceInDown"><?php _e('bounceInDown', FRUIT_SLIDER_SLUG); ?></option>
        <option value="bounceInLeft"><?php _e('bounceInLeft', FRUIT_SLIDER_SLUG); ?></option>
        <option value="bounceInRight"><?php _e('bounceInRight', FRUIT_SLIDER_SLUG); ?></option>
        <option value="bounceInUp"><?php _e('bounceInUp', FRUIT_SLIDER_SLUG); ?></option>
    </optgroup>

    <optgroup label="Bouncing Exits">
        <option value="bounceOut"><?php _e('bounceOut', FRUIT_SLIDER_SLUG); ?></option>
        <option value="bounceOutDown"><?php _e('bounceOutDown', FRUIT_SLIDER_SLUG); ?></option>
        <option value="bounceOutLeft"><?php _e('bounceOutLeft', FRUIT_SLIDER_SLUG); ?></option>
        <option value="bounceOutRight"><?php _e('bounceOutRight', FRUIT_SLIDER_SLUG); ?></option>
        <option value="bounceOutUp"><?php _e('bounceOutUp', FRUIT_SLIDER_SLUG); ?></option>
    </optgroup>

    <optgroup label="Fading Entrances">
        <option value="fadeIn"><?php _e('fadeIn', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeInDown"><?php _e('fadeInDown', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeInDownBig"><?php _e('fadeInDownBig', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeInLeft"><?php _e('fadeInLeft', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeInLeftBig"><?php _e('fadeInLeftBig', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeInRight"><?php _e('fadeInRight', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeInRightBig"><?php _e('fadeInRightBig', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeInUp"><?php _e('fadeInUp', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeInUpBig"><?php _e('fadeInUpBig', FRUIT_SLIDER_SLUG); ?></option>
    </optgroup>

    <optgroup label="Fading Exits">
        <option value="fadeOut"><?php _e('fadeOut', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeOutDown"><?php _e('fadeOutDown', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeOutDownBig"><?php _e('fadeOutDownBig', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeOutLeft"><?php _e('fadeOutLeft', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeOutLeftBig"><?php _e('fadeOutLeftBig', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeOutRight"><?php _e('fadeOutRight', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeOutRightBig"><?php _e('fadeOutRightBig', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeOutUp"><?php _e('fadeOutUp', FRUIT_SLIDER_SLUG); ?></option>
        <option value="fadeOutUpBig"><?php _e('fadeOutUpBig', FRUIT_SLIDER_SLUG); ?></option>
    </optgroup>

    <optgroup label="Flippers">
        <option value="flip"><?php _e('flip', FRUIT_SLIDER_SLUG); ?></option>
        <option value="flipInX"><?php _e('flipInX', FRUIT_SLIDER_SLUG); ?></option>
        <option value="flipInY"><?php _e('flipInY', FRUIT_SLIDER_SLUG); ?></option>
        <option value="flipOutX"><?php _e('flipOutX', FRUIT_SLIDER_SLUG); ?></option>
        <option value="flipOutY"><?php _e('flipOutY', FRUIT_SLIDER_SLUG); ?></option>
    </optgroup>

    <optgroup label="Lightspeed">
        <option value="lightSpeedIn"><?php _e('lightSpeedIn', FRUIT_SLIDER_SLUG); ?></option>
        <option value="lightSpeedOut"><?php _e('lightSpeedOut', FRUIT_SLIDER_SLUG); ?></option>
    </optgroup>

    <optgroup label="Rotating Entrances">
        <option value="rotateIn"><?php _e('rotateIn', FRUIT_SLIDER_SLUG); ?></option>
        <option value="rotateInDownLeft"><?php _e('rotateInDownLeft', FRUIT_SLIDER_SLUG); ?></option>
        <option value="rotateInDownRight"><?php _e('rotateInDownRight', FRUIT_SLIDER_SLUG); ?></option>
        <option value="rotateInUpLeft"><?php _e('rotateInUpLeft', FRUIT_SLIDER_SLUG); ?></option>
        <option value="rotateInUpRight"><?php _e('rotateInUpRight', FRUIT_SLIDER_SLUG); ?></option>
    </optgroup>

    <optgroup label="Rotating Exits">
        <option value="rotateOut"><?php _e('rotateOut', FRUIT_SLIDER_SLUG); ?></option>
        <option value="rotateOutDownLeft"><?php _e('rotateOutDownLeft', FRUIT_SLIDER_SLUG); ?></option>
        <option value="rotateOutDownRight"><?php _e('rotateOutDownRight', FRUIT_SLIDER_SLUG); ?></option>
        <option value="rotateOutUpLeft"><?php _e('rotateOutUpLeft', FRUIT_SLIDER_SLUG); ?></option>
        <option value="rotateOutUpRight"><?php _e('rotateOutUpRight', FRUIT_SLIDER_SLUG); ?></option>
    </optgroup>

    <optgroup label="Specials">
        <option value="hinge"><?php _e('hinge', FRUIT_SLIDER_SLUG); ?></option>
        <option value="rollIn"><?php _e('rollIn', FRUIT_SLIDER_SLUG); ?></option>
        <option value="rollOut"><?php _e('rollOut', FRUIT_SLIDER_SLUG); ?></option>
    </optgroup>

    <optgroup label="Zoom Entrances">
        <option value="zoomIn"><?php _e('zoomIn', FRUIT_SLIDER_SLUG); ?></option>
        <option value="zoomInDown"><?php _e('zoomInDown', FRUIT_SLIDER_SLUG); ?></option>
        <option value="zoomInLeft"><?php _e('zoomInLeft', FRUIT_SLIDER_SLUG); ?></option>
        <option value="zoomInRight"><?php _e('zoomInRight', FRUIT_SLIDER_SLUG); ?></option>
        <option value="zoomInUp"><?php _e('zoomInUp', FRUIT_SLIDER_SLUG); ?></option>
    </optgroup>

    <optgroup label="Zoom Exits">
        <option value="zoomOut"><?php _e('zoomOut', FRUIT_SLIDER_SLUG); ?></option>
        <option value="zoomOutDown"><?php _e('zoomOutDown', FRUIT_SLIDER_SLUG); ?></option>
        <option value="zoomOutLeft"><?php _e('zoomOutLeft', FRUIT_SLIDER_SLUG); ?></option>
        <option value="zoomOutRight"><?php _e('zoomOutRight', FRUIT_SLIDER_SLUG); ?></option>
        <option value="zoomOutUp"><?php _e('zoomOutUp', FRUIT_SLIDER_SLUG); ?></option>
    </optgroup>
<?php } ?>
