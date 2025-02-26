<?php
namespace Admintosh\Admin;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */

trait Dimension {

    public function dimension_field( $args ) {

        $default = [
            'title' => '',
            'name' => '',
            'placeholder' => '',
            'condition'   => ''
        ];

        $args = wp_parse_args( $args, $default );
        $this->dimension_markup( $args );
    }

    public function dimension_markup( $args ) {

        $name = $args['name'];

        $fieldName = 'admintosh_options['.esc_attr( $name ).']';
        $condition = !empty( $args['condition'] ) ? 'data-condition='.json_encode( $args['condition'] ) : '';
        $opt = get_option('admintosh_options');

        $valTop    = !empty( $opt[$name]['top'] ) ? $opt[$name]['top'] : '';
        $valRight  = !empty( $opt[$name]['right'] ) ? $opt[$name]['right'] : '';
        $valBottom = !empty( $opt[$name]['bottom'] ) ? $opt[$name]['bottom'] : '';
        $valLeft   = !empty( $opt[$name]['left'] ) ? $opt[$name]['left'] : '';
        ?>
        <div class="admintosh-label admintosh-field-wrp" <?php echo esc_attr( $condition ); ?>>
            <h5><?php echo esc_html( $args['title'] ); ?></h5>
            <div class="dimension-input-group">
                <div class="dimension-field-wrap">
                <span>Top</span>
                <input type="number" class="dimension-field" placeholder="Top" name="<?php echo esc_attr( $fieldName.'[top]' ); ?>" value="<?php echo esc_html( $valTop ); ?>"/>
                </div>
                <div class="dimension-field-wrap">
                <span>Right</span>
                <input type="number" class="dimension-field" placeholder="Right" name="<?php echo esc_attr( $fieldName.'[right]' ); ?>" value="<?php echo esc_html( $valRight ); ?>"/>
                </div>
                <div class="dimension-field-wrap">
                <span>Bottom</span>
                <input type="number" class="dimension-field" placeholder="Bottom" name="<?php echo esc_attr( $fieldName.'[bottom]' ); ?>" value="<?php echo esc_html( $valBottom ); ?>"/>
                </div>
                <div class="dimension-field-wrap">
                <span>Left</span>
                <input type="number" class="dimension-field" placeholder="Left" name="<?php echo esc_attr( $fieldName.'[left]' ); ?>" value="<?php echo esc_html( $valLeft ); ?>"/>
                </div>
            </div>
        </div>
        <?php
    }
}