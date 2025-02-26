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

trait Switcher {

    public function switcher_field( $args ) {

        $default = [
            'title' => '',
            'name' => '',
            'condition'   => '',
            'description'   => '',
        ];

        $args = wp_parse_args( $args, $default );
        $this->switcher_markup( $args );
    }

    public function switcher_markup( $args ) {
        $fieldName = 'admintosh_options['.esc_attr( $args['name'] ).']';
        $opt = get_option('admintosh_options');
        $value = !empty( $opt[$args['name']] ) ? $opt[$args['name']] : '';
        $condition = !empty( $args['condition'] ) ? 'data-condition='.json_encode( $args['condition'] ) : '';
        ?>
        <div class="admintosh-label admintosh-field-wrp" <?php echo esc_attr( $condition ); ?>>
            <div>
            <h5><?php echo esc_html( $args['title'] ); ?></h5>
            <?php
            if( !empty( $args['description'] ) ) {
                echo '<p>'.esc_html( $args['description'] ).'</p>';
            }
            ?>
            </div>
            <label class="switcher-switch">
              <input name="<?php echo esc_attr( $fieldName ); ?>" type="checkbox" <?php echo checked( $value, 'on' ); ?>>
              <span class="switcher-slider switcher-round"></span>
            </label>

        </div>
        <?php
    }
}