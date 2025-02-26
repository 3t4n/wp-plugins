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

trait Border {

    public function border_field( $args ) {

        $default = [
            'title' => '',
            'name' => '',
            'condition'   => ''
        ];

        $args = wp_parse_args( $args, $default );
        $this->border_markup( $args );
    }

    public function border_markup( $args ) {

        $name = $args['name'];

        $fieldName = 'admintosh_options['.esc_attr( $name ).']';
        $condition = !empty( $args['condition'] ) ? 'data-condition='.json_encode( $args['condition'] ) : '';
        $opt = get_option('admintosh_options');

        $width    = !empty( $opt[$name]['width'] ) ? $opt[$name]['width'] : '';
        $style    = !empty( $opt[$name]['style'] ) ? $opt[$name]['style'] : '';
        $color    = !empty( $opt[$name]['color'] ) ? $opt[$name]['color'] : '';

        $options = [
            'none'   => esc_html__( 'None', 'admintosh' ),
            'solid'  => esc_html__( 'Solid', 'admintosh' ),
            'dotted' => esc_html__( 'Dotted', 'admintosh' ),
            'dashed' => esc_html__( 'Dashed', 'admintosh' ),
            'double' => esc_html__( 'Double', 'admintosh' ),
            'groove' => esc_html__( 'Groove', 'admintosh' )
        ];
        ?>
        <div class="admintosh-label admintosh-field-wrp" <?php echo esc_attr( $condition ); ?>>
            <h5><?php echo esc_html( $args['title'] ); ?></h5>
            <div class="border-input-group">
                <div class="border-field-wrap">
                    <input type="number" class="border-number-field" placeholder="px" name="<?php echo esc_attr( $fieldName ); ?>[width]" value="<?php echo esc_html( $width ); ?>"/>
                </div>

                <div class="border-field-wrap">
                    <select name="<?php echo esc_attr( $fieldName ); ?>[style]">
                        <?php 
                        if( !empty( $options ) ) {
                            foreach( $options as $key => $option ) {
                                echo '<option value="'.esc_attr( $key ).'" '.selected( $style, $key, false ).'>'.esc_html( $option ).'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="border-field-wrap">
                    <input type="text" id="bg_color" class="color-field" value="<?php echo esc_html( $color ); ?>" name="<?php echo esc_attr( $fieldName ); ?>[color]" />
                </div>

            </div>
        </div>
        <?php
    }
}