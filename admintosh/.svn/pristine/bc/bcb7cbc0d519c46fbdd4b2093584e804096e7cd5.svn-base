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
trait Multi_Select {

    public function multi_select_field( $args ) {

        $default = [
            'title' => '',
            'name' => '',
            'placeholder' => '',
            'options' => [],
            'condition'   => ''
        ];

        $args = wp_parse_args( $args, $default );
        $this->multi_select_markup( $args );
    }

    public function multi_select_markup( $args ) {
        $fieldName = 'admintosh_options['.esc_attr( $args['name'] ).']';
        $opt = get_option('admintosh_options');
        $value = !empty( $opt[$args['name']] ) ? $opt[$args['name']] : '';
        $condition = !empty( $args['condition'] ) ? 'data-condition='.json_encode( $args['condition'] ) : '';
        ?>
        <div class="admintosh-label admintosh-field-wrp" <?php echo esc_attr( $condition ); ?>>
            <h5><?php echo esc_html( $args['title'] ); ?></h5>
            <div>
            <select class="input-control input-select-multiple" name="<?php echo esc_attr( $fieldName.'[]' ); ?>" multiple="multiple">
                <?php 
                if( !empty( $args['options'] ) ) {
                    foreach( $args['options'] as $key => $opt ) {

                        $getVal = !empty( $value ) && in_array( $key , $value ) ? $key : '';
                        
                        echo '<option value="'.esc_attr( $key ).'" '.selected( $key,  $getVal, false ).'>'.esc_html( $opt ).'</option>';
                    }
                }
                ?>
            </select>
            <?php 
            if( !empty( $args['description'] ) ) {
                echo '<p>'.wp_kses_post( $args['description'] ).'</p>';
            }
            ?>
            </div>
        </div>
        <?php
    }
    
}