<?php
    if(function_exists('sola_t_register_pro')){
        include SOLA_T_PLUGIN_PRO_DIR.'/includes/pro-slider.php';
    } else {
?>
<tr>
    <td style="text-align: center;">        
        <?php 
            $pro_link = "<a href=\"https://codecabin.io/store/super-testimonials-pro/?utm_source=plugin&utm_medium=link&utm_campaign=super_t_slider_settings\" target=\"_BLANK\">".__('Premium Version', 'sola-testimonials')."</a>";
            echo "<h3>".__("Display your testimonials in a responsive and mobile friendly slider with the $pro_link.", "sola-testimonials")."</h3>";
        ?>
        <br/>
        <img src="<?php echo SOLA_T_PLUGIN_DIR.'/images/slider_testimonial.png'; ?>" title="<?php _e('Slider Preview', 'sola-testimonials'); ?>" style="width: 400px; border: 1px solid #e5e5e5; -moz-box-shadow: 0 0 5px rgba(0,0,0,.1); -webkit-box-shadow: 0 0 5px rgba(0,0,0,.1); box-shadow: 0 0 5px rgba(0,0,0,.1); -moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px;"/>
    </td>
</tr>
<?php
    }
?>