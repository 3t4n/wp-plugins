<?php
namespace ArtistPress\Administration\Settings;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}


class Fields
{
    public static function getTextField($args)
    {
        $settings = \get_option($args['key']);
        $value = isset($settings[$args['slug']]) ? $settings[$args['slug']] : false;

        \ob_start();

        printf(
            '<input type="text" id="%1$s" name="%2$s" value="%3$s"><br><br><label for="%1$s">%4$s</label>',
            $args['slug'],
            $args['key'] . '[' .$args['slug']. ']',
            $value,
            $args['desc']
        );

        print \apply_filters(__METHOD__, \ob_get_clean());
    }

    public static function getSelectField($args)
    {
        $settings = \get_option($args['key']);
        $value = isset($settings[$args['slug']]) ? $settings[$args['slug']] : false;


        $options = !empty($args['options']) ? $args['options'] : ['yes' => 'Yes', 'no' => 'No'];

        \ob_start(); ?>

        <select id="<?php echo $args['slug'];?>" name="<?php echo $args['key'] . '[' . $args['slug'] . ']';?>">
            <?php 
            foreach ($options as $key => $name) {
                printf(
                    '<option value="%1$s" %3$s>%2$s</option>',
                    $key,
                    $name,
                    selected($value, $key, false)
                );
            }
            ?>
        </select>
        <label for="artist_use_stylesheet">
            <?php echo $args['desc'];?>
        </label>

        <?php
        print \apply_filters(__METHOD__, \ob_get_clean());
    }

    public static function getRadioField($args)
    {
        $settings   = \get_option($args['key']);
        $value      = isset($settings[$args['slug']]) ? $settings[$args['slug']] : false;
        $options    = !empty($args['options']) ? $args['options'] : ['yes' => 'Yes', 'no' => 'No'];

        \ob_start(); 

        echo '<div class="radio_items">';
        foreach($options as $key => $label) {
            printf(
                '<input type="radio" id="%1$s" name="%2$s" value="%3$s" %5$s><label for="%1$s">%4$s</label>',
                $args['slug'] . '_' . $key,
                $args['key'] . '['. $args['slug'] .']',
                $key,
                $label,
                \checked($value, $key, false)
             );
        }
        
        echo '</div>';
        echo $args['desc'];

        print \apply_filters(__METHOD__, \ob_get_clean());
    }

}
