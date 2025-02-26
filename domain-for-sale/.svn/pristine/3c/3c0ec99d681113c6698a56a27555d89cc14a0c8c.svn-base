<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: typography
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
use ThemeAtelier\DomainForSale\Admin\Framework\Classes\DOMAIN_FOR_SALE;

if ( ! class_exists( 'DOMAIN_FOR_SALE_Field_typography' ) ) {
  class DOMAIN_FOR_SALE_Field_typography extends DOMAIN_FOR_SALE_Fields {

    public $chosen = false;

    public $value  = array();

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      echo wp_kses_post( $this->field_before() );

      $args                  = wp_parse_args( $this->field, array(
        'font_family'        => true,
        'font_weight'        => true,
        'font_style'         => true,
        'font_size'          => true,
        'line_height'        => true,
        'letter_spacing'     => true,
        'text_align'         => true,
        'text_transform'     => true,
        'color'              => true,
        'chosen'             => true,
        'preview'            => true,
        'subset'             => true,
        'multi_subset'       => false,
        'extra_styles'       => false,
        'backup_font_family' => false,
        'font_variant'       => false,
        'word_spacing'       => false,
        'text_decoration'    => false,
        'custom_style'       => false,
        'compact'            => false,
        'exclude'            => '',
        'unit'               => 'px',
        'line_height_unit'   => '',
        'preview_text'       => 'The quick brown fox jumps over the lazy dog',
      ) );

      if ( $args['compact'] ) {
        $args['text_transform'] = false;
        $args['text_align']     = false;
        $args['font_size']      = false;
        $args['line_height']    = false;
        $args['letter_spacing'] = false;
        $args['preview']        = false;
        $args['color']          = false;
      }

      $default_value         = array(
        'font-family'        => '',
        'font-weight'        => '',
        'font-style'         => '',
        'font-variant'       => '',
        'font-size'          => '',
        'line-height'        => '',
        'letter-spacing'     => '',
        'word-spacing'       => '',
        'text-align'         => '',
        'text-transform'     => '',
        'text-decoration'    => '',
        'backup-font-family' => '',
        'color'              => '',
        'custom-style'       => '',
        'type'               => '',
        'subset'             => '',
        'extra-styles'       => array(),
      );

      $default_value    = ( ! empty( $this->field['default'] ) ) ? wp_parse_args( $this->field['default'], $default_value ) : $default_value;
      $this->value      = wp_parse_args( $this->value, $default_value );
      $this->chosen     = $args['chosen'];
      $chosen_class     = ( $this->chosen ) ? ' domain-for-sale--chosen' : '';
      $line_height_unit = ( ! empty( $args['line_height_unit'] ) ) ? $args['line_height_unit'] : $args['unit'];

      echo '<div class="domain-for-sale--typography'. esc_attr( $chosen_class ) .'" data-depend-id="'. esc_attr( $this->field['id'] ) .'" data-unit="'. esc_attr( $args['unit'] ) .'" data-line-height-unit="'. esc_attr( $line_height_unit ) .'" data-exclude="'. esc_attr( $args['exclude'] ) .'">';

        echo '<div class="domain-for-sale--blocks domain-for-sale--blocks-selects">';

          //
          // Font Family
          if ( ! empty( $args['font_family'] ) ) {
            echo '<div class="domain-for-sale--block">';
            echo '<div class="domain-for-sale--title">'. esc_html__( 'Font Family', 'domain-for-sale' ) .'</div>';
            echo $this->create_select( array( $this->value['font-family'] => $this->value['font-family'] ), 'font-family', esc_html__( 'Select a font', 'domain-for-sale' ) );
            echo '</div>';
          }

          //
          // Backup Font Family
          if ( ! empty( $args['backup_font_family'] ) ) {
            echo '<div class="domain-for-sale--block domain-for-sale--block-backup-font-family hidden">';
            echo '<div class="domain-for-sale--title">'. esc_html__( 'Backup Font Family', 'domain-for-sale' ) .'</div>';
            echo $this->create_select( apply_filters( 'DOMAIN_FOR_SALE_field_typography_backup_font_family', array(
              'Arial, Helvetica, sans-serif',
              "'Arial Black', Gadget, sans-serif",
              "'Comic Sans MS', cursive, sans-serif",
              'Impact, Charcoal, sans-serif',
              "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
              'Tahoma, Geneva, sans-serif',
              "'Trebuchet MS', Helvetica, sans-serif",
              'Verdana, Geneva, sans-serif',
              "'Courier New', Courier, monospace",
              "'Lucida Console', Monaco, monospace",
              'Georgia, serif',
              'Palatino Linotype'
            ) ), 'backup-font-family', esc_html__( 'Default', 'domain-for-sale' ) );
            echo '</div>';
          }

          //
          // Font Style and Extra Style Select
          if ( ! empty( $args['font_weight'] ) || ! empty( $args['font_style'] ) ) {

            //
            // Font Style Select
            echo '<div class="domain-for-sale--block domain-for-sale--block-font-style hidden">';
            echo '<div class="domain-for-sale--title">'. esc_html__( 'Font Style', 'domain-for-sale') .'</div>';
            echo '<select class="domain-for-sale--font-style-select" data-placeholder="Default">';
            echo '<option value="">'. ( ! $this->chosen ? esc_html__( 'Default', 'domain-for-sale' ) : '' ) .'</option>';
            if ( ! empty( $this->value['font-weight'] ) || ! empty( $this->value['font-style'] ) ) {
              echo '<option value="'. esc_attr( strtolower( $this->value['font-weight'] . $this->value['font-style'] ) ) .'" selected></option>';
            }
            echo '</select>';
            echo '<input type="hidden" name="'. esc_attr( $this->field_name( '[font-weight]' ) ) .'" class="domain-for-sale--font-weight" value="'. esc_attr( $this->value['font-weight'] ) .'" />';
            echo '<input type="hidden" name="'. esc_attr( $this->field_name( '[font-style]' ) ) .'" class="domain-for-sale--font-style" value="'. esc_attr( $this->value['font-style'] ) .'" />';

            //
            // Extra Font Style Select
            if ( ! empty( $args['extra_styles'] ) ) {
              echo '<div class="domain-for-sale--block-extra-styles hidden">';
              echo ( ! $this->chosen ) ? '<div class="domain-for-sale--title">'. esc_html__( 'Load Extra Styles', 'domain-for-sale' ) .'</div>' : '';
              $placeholder = ( $this->chosen ) ? esc_html__( 'Load Extra Styles', 'domain-for-sale' ) : esc_html__( 'Default', 'domain-for-sale' );
              echo $this->create_select( $this->value['extra-styles'], 'extra-styles', $placeholder, true );
              echo '</div>';
            }

            echo '</div>';

          }

          //
          // Subset
          if ( ! empty( $args['subset'] ) ) {
            echo '<div class="domain-for-sale--block domain-for-sale--block-subset hidden">';
            echo '<div class="domain-for-sale--title">'. esc_html__( 'Subset', 'domain-for-sale' ) .'</div>';
            $subset = ( is_array( $this->value['subset'] ) ) ? $this->value['subset'] : array_filter( (array) $this->value['subset'] );
            echo $this->create_select( $subset, 'subset', esc_html__( 'Default', 'domain-for-sale' ), $args['multi_subset'] );
            echo '</div>';
          }

          //
          // Text Align
          if ( ! empty( $args['text_align'] ) ) {
            echo '<div class="domain-for-sale--block">';
            echo '<div class="domain-for-sale--title">'. esc_html__( 'Text Align', 'domain-for-sale' ) .'</div>';
            echo $this->create_select( array(
              'inherit' => esc_html__( 'Inherit', 'domain-for-sale' ),
              'left'    => esc_html__( 'Left', 'domain-for-sale' ),
              'center'  => esc_html__( 'Center', 'domain-for-sale' ),
              'right'   => esc_html__( 'Right', 'domain-for-sale' ),
              'justify' => esc_html__( 'Justify', 'domain-for-sale' ),
              'initial' => esc_html__( 'Initial', 'domain-for-sale' )
            ), 'text-align', esc_html__( 'Default', 'domain-for-sale' ) );
            echo '</div>';
          }

          //
          // Font Variant
          if ( ! empty( $args['font_variant'] ) ) {
            echo '<div class="domain-for-sale--block">';
            echo '<div class="domain-for-sale--title">'. esc_html__( 'Font Variant', 'domain-for-sale' ) .'</div>';
            echo $this->create_select( array(
              'normal'         => esc_html__( 'Normal', 'domain-for-sale' ),
              'small-caps'     => esc_html__( 'Small Caps', 'domain-for-sale' ),
              'all-small-caps' => esc_html__( 'All Small Caps', 'domain-for-sale' )
            ), 'font-variant', esc_html__( 'Default', 'domain-for-sale' ) );
            echo '</div>';
          }

          //
          // Text Transform
          if ( ! empty( $args['text_transform'] ) ) {
            echo '<div class="domain-for-sale--block">';
            echo '<div class="domain-for-sale--title">'. esc_html__( 'Text Transform', 'domain-for-sale' ) .'</div>';
            echo $this->create_select( array(
              'none'       => esc_html__( 'None', 'domain-for-sale' ),
              'capitalize' => esc_html__( 'Capitalize', 'domain-for-sale' ),
              'uppercase'  => esc_html__( 'Uppercase', 'domain-for-sale' ),
              'lowercase'  => esc_html__( 'Lowercase', 'domain-for-sale' )
            ), 'text-transform', esc_html__( 'Default', 'domain-for-sale' ) );
            echo '</div>';
          }

          //
          // Text Decoration
          if ( ! empty( $args['text_decoration'] ) ) {
            echo '<div class="domain-for-sale--block">';
            echo '<div class="domain-for-sale--title">'. esc_html__( 'Text Decoration', 'domain-for-sale' ) .'</div>';
            echo $this->create_select( array(
              'none'               => esc_html__( 'None', 'domain-for-sale' ),
              'underline'          => esc_html__( 'Solid', 'domain-for-sale' ),
              'underline double'   => esc_html__( 'Double', 'domain-for-sale' ),
              'underline dotted'   => esc_html__( 'Dotted', 'domain-for-sale' ),
              'underline dashed'   => esc_html__( 'Dashed', 'domain-for-sale' ),
              'underline wavy'     => esc_html__( 'Wavy', 'domain-for-sale' ),
              'underline overline' => esc_html__( 'Overline', 'domain-for-sale' ),
              'line-through'       => esc_html__( 'Line-through', 'domain-for-sale' )
            ), 'text-decoration', esc_html__( 'Default', 'domain-for-sale' ) );
            echo '</div>';
          }

        echo '</div>';

        echo '<div class="domain-for-sale--blocks domain-for-sale--blocks-inputs">';

          //
          // Font Size
          if ( ! empty( $args['font_size'] ) ) {
            echo '<div class="domain-for-sale--block">';
            echo '<div class="domain-for-sale--title">'. esc_html__( 'Font Size', 'domain-for-sale' ) .'</div>';
            echo '<div class="domain-for-sale--input-wrap">';
            echo '<input type="number" name="'. esc_attr( $this->field_name( '[font-size]' ) ) .'" class="domain-for-sale--font-size domain-for-sale--input domain-for-sale-input-number" value="'. esc_attr( $this->value['font-size'] ) .'" step="any" />';
            echo '<span class="domain-for-sale--unit">'. esc_attr( $args['unit'] ) .'</span>';
            echo '</div>';
            echo '</div>';
          }

          //
          // Line Height
          if ( ! empty( $args['line_height'] ) ) {
            echo '<div class="domain-for-sale--block">';
            echo '<div class="domain-for-sale--title">'. esc_html__( 'Line Height', 'domain-for-sale' ) .'</div>';
            echo '<div class="domain-for-sale--input-wrap">';
            echo '<input type="number" name="'. esc_attr( $this->field_name( '[line-height]' ) ) .'" class="domain-for-sale--line-height domain-for-sale--input domain-for-sale-input-number" value="'. esc_attr( $this->value['line-height'] ) .'" step="any" />';
            echo '<span class="domain-for-sale--unit">'. esc_attr( $line_height_unit ) .'</span>';
            echo '</div>';
            echo '</div>';
          }

          //
          // Letter Spacing
          if ( ! empty( $args['letter_spacing'] ) ) {
            echo '<div class="domain-for-sale--block">';
            echo '<div class="domain-for-sale--title">'. esc_html__( 'Letter Spacing', 'domain-for-sale' ) .'</div>';
            echo '<div class="domain-for-sale--input-wrap">';
            echo '<input type="number" name="'. esc_attr( $this->field_name( '[letter-spacing]' ) ) .'" class="domain-for-sale--letter-spacing domain-for-sale--input domain-for-sale-input-number" value="'. esc_attr( $this->value['letter-spacing'] ) .'" step="any" />';
            echo '<span class="domain-for-sale--unit">'. esc_attr( $args['unit'] ) .'</span>';
            echo '</div>';
            echo '</div>';
          }

          //
          // Word Spacing
          if ( ! empty( $args['word_spacing'] ) ) {
            echo '<div class="domain-for-sale--block">';
            echo '<div class="domain-for-sale--title">'. esc_html__( 'Word Spacing', 'domain-for-sale' ) .'</div>';
            echo '<div class="domain-for-sale--input-wrap">';
            echo '<input type="number" name="'. esc_attr( $this->field_name( '[word-spacing]' ) ) .'" class="domain-for-sale--word-spacing domain-for-sale--input domain-for-sale-input-number" value="'. esc_attr( $this->value['word-spacing'] ) .'" step="any" />';
            echo '<span class="domain-for-sale--unit">'. esc_attr( $args['unit'] ) .'</span>';
            echo '</div>';
            echo '</div>';
          }

        echo '</div>';

        //
        // Font Color
        if ( ! empty( $args['color'] ) ) {
          $default_color_attr = ( ! empty( $default_value['color'] ) ) ? ' data-default-color="'. esc_attr( $default_value['color'] ) .'"' : '';
          echo '<div class="domain-for-sale--block domain-for-sale--block-font-color">';
          echo '<div class="domain-for-sale--title">'. esc_html__( 'Font Color', 'domain-for-sale' ) .'</div>';
          echo '<div class="domain-for-sale-field-color">';
          echo '<input type="text" name="'. esc_attr( $this->field_name( '[color]' ) ) .'" class="domain-for-sale-color domain-for-sale--color" value="'. esc_attr( $this->value['color'] ) .'"'. $default_color_attr .' />';
          echo '</div>';
          echo '</div>';
        }

        //
        // Custom style
        if ( ! empty( $args['custom_style'] ) ) {
          echo '<div class="domain-for-sale--block domain-for-sale--block-custom-style">';
          echo '<div class="domain-for-sale--title">'. esc_html__( 'Custom Style', 'domain-for-sale' ) .'</div>';
          echo '<textarea name="'. esc_attr( $this->field_name( '[custom-style]' ) ) .'" class="domain-for-sale--custom-style">'. esc_attr( $this->value['custom-style'] ) .'</textarea>';
          echo '</div>';
        }

        //
        // Preview
        $always_preview = ( $args['preview'] !== 'always' ) ? ' hidden' : '';

        if ( ! empty( $args['preview'] ) ) {
          echo '<div class="domain-for-sale--block domain-for-sale--block-preview'. esc_attr( $always_preview ) .'">';
          echo '<div class="domain-for-sale--toggle icofont-toggle-off"></div>';
          echo '<div class="domain-for-sale--preview">'. esc_attr( $args['preview_text'] ) .'</div>';
          echo '</div>';
        }

        echo '<input type="hidden" name="'. esc_attr( $this->field_name( '[type]' ) ) .'" class="domain-for-sale--type" value="'. esc_attr( $this->value['type'] ) .'" />';
        echo '<input type="hidden" name="'. esc_attr( $this->field_name( '[unit]' ) ) .'" class="domain-for-sale--unit-save" value="'. esc_attr( $args['unit'] ) .'" />';

      echo '</div>';

      echo wp_kses_post( $this->field_after() );

    }

    public function create_select( $options, $name, $placeholder = '', $is_multiple = false ) {

      $multiple_name = ( $is_multiple ) ? '[]' : '';
      $multiple_attr = ( $is_multiple ) ? ' multiple data-multiple="true"' : '';
      $chosen_rtl    = ( $this->chosen && is_rtl() ) ? ' chosen-rtl' : '';

      $output  = '<select name="'. esc_attr( $this->field_name( '['. $name .']'. $multiple_name ) ) .'" class="domain-for-sale--'. esc_attr( $name ) . esc_attr( $chosen_rtl ) .'" data-placeholder="'. esc_attr( $placeholder ) .'"'. $multiple_attr .'>';
      $output .= ( ! empty( $placeholder ) ) ? '<option value="">'. esc_attr( ( ! $this->chosen ) ? $placeholder : '' ) .'</option>' : '';

      if ( ! empty( $options ) ) {
        foreach ( $options as $option_key => $option_value ) {
          if ( $is_multiple ) {
            $selected = ( in_array( $option_value, $this->value[$name] ) ) ? ' selected' : '';
            $output .= '<option value="'. esc_attr( $option_value ) .'"'. esc_attr( $selected ).'>'. esc_attr( $option_value ) .'</option>';
          } else {
            $option_key = ( is_numeric( $option_key ) ) ? $option_value : $option_key;
            $selected = ( $option_key === $this->value[$name] ) ? ' selected' : '';
            $output .= '<option value="'. esc_attr( $option_key ) .'"'. esc_attr( $selected ).'>'. esc_attr( $option_value ) .'</option>';
          }
        }
      }

      $output .= '</select>';

      return $output;

    }

    public function enqueue() {

      if ( ! wp_script_is( 'domain-for-sale-webfontloader' ) ) {

        DOMAIN_FOR_SALE::include_plugin_file( 'fields/typography/google-fonts.php' );

        wp_enqueue_script( 'domain-for-sale-webfontloader', 'https://cdn.jsdelivr.net/npm/webfontloader@1.6.28/webfontloader.min.js', array( 'domain-for-sale' ), '1.6.28', true );

        $webfonts = array();

        $customwebfonts = apply_filters( 'DOMAIN_FOR_SALE_field_typography_customwebfonts', array() );

        if ( ! empty( $customwebfonts ) ) {
          $webfonts['custom'] = array(
            'label' => esc_html__( 'Custom Web Fonts', 'domain-for-sale' ),
            'fonts' => $customwebfonts
          );
        }

        $webfonts['safe'] = array(
          'label' => esc_html__( 'Safe Web Fonts', 'domain-for-sale' ),
          'fonts' => apply_filters( 'DOMAIN_FOR_SALE_field_typography_safewebfonts', array(
            'Arial',
            'Arial Black',
            'Helvetica',
            'Times New Roman',
            'Courier New',
            'Tahoma',
            'Verdana',
            'Impact',
            'Trebuchet MS',
            'Comic Sans MS',
            'Lucida Console',
            'Lucida Sans Unicode',
            'Georgia, serif',
            'Palatino Linotype'
          )
        ) );

        $webfonts['google'] = array(
          'label' => esc_html__( 'Google Web Fonts', 'domain-for-sale' ),
          'fonts' => apply_filters( 'DOMAIN_FOR_SALE_field_typography_googlewebfonts', DOMAIN_FOR_SALE_get_google_fonts()
        ) );

        $defaultstyles = apply_filters( 'DOMAIN_FOR_SALE_field_typography_defaultstyles', array( 'normal', 'italic', '700', '700italic' ) );

        $googlestyles = apply_filters( 'DOMAIN_FOR_SALE_field_typography_googlestyles', array(
          '100'       => 'Thin 100',
          '100italic' => 'Thin 100 Italic',
          '200'       => 'Extra-Light 200',
          '200italic' => 'Extra-Light 200 Italic',
          '300'       => 'Light 300',
          '300italic' => 'Light 300 Italic',
          'normal'    => 'Normal 400',
          'italic'    => 'Normal 400 Italic',
          '500'       => 'Medium 500',
          '500italic' => 'Medium 500 Italic',
          '600'       => 'Semi-Bold 600',
          '600italic' => 'Semi-Bold 600 Italic',
          '700'       => 'Bold 700',
          '700italic' => 'Bold 700 Italic',
          '800'       => 'Extra-Bold 800',
          '800italic' => 'Extra-Bold 800 Italic',
          '900'       => 'Black 900',
          '900italic' => 'Black 900 Italic'
        ) );

        $webfonts = apply_filters( 'DOMAIN_FOR_SALE_field_typography_webfonts', $webfonts );

        wp_localize_script( 'domain-for-sale', 'DOMAIN_FOR_SALE_typography_json', array(
          'webfonts'      => $webfonts,
          'defaultstyles' => $defaultstyles,
          'googlestyles'  => $googlestyles
        ) );

      }

    }

    public function enqueue_google_fonts( $method = 'enqueue' ) {

      $is_google = false;

      if ( ! empty( $this->value['type'] ) ) {
        $is_google = ( $this->value['type'] === 'google' ) ? true : false;
      } else {
        DOMAIN_FOR_SALE::include_plugin_file( 'fields/typography/google-fonts.php' );
        $is_google = ( array_key_exists( $this->value['font-family'], DOMAIN_FOR_SALE_get_google_fonts() ) ) ? true : false;
      }

      if ( $is_google ) {

        // set style
        $font_family = ( ! empty( $this->value['font-family'] ) ) ? $this->value['font-family'] : '';
        $font_weight = ( ! empty( $this->value['font-weight'] ) ) ? $this->value['font-weight'] : '';
        $font_style  = ( ! empty( $this->value['font-style'] ) ) ? $this->value['font-style'] : '';

        if ( $font_weight || $font_style ) {
          $style = $font_weight . $font_style;
          if ( ! empty( $style ) ) {
            $style = ( $style === 'normal' ) ? '400' : $style;
            DOMAIN_FOR_SALE::$webfonts[$method][$font_family][$style] = $style;
          }
        } else {
          DOMAIN_FOR_SALE::$webfonts[$method][$font_family] = array();
        }

        // set extra styles
        if ( ! empty( $this->value['extra-styles'] ) ) {
          foreach ( $this->value['extra-styles'] as $extra_style ) {
            if ( ! empty( $extra_style ) ) {
              $extra_style = ( $extra_style === 'normal' ) ? '400' : $extra_style;
              DOMAIN_FOR_SALE::$webfonts[$method][$font_family][$extra_style] = $extra_style;
            }
          }
        }

        // set subsets
        if ( ! empty( $this->value['subset'] ) ) {
          $this->value['subset'] = ( is_array( $this->value['subset'] ) ) ? $this->value['subset'] : array_filter( (array) $this->value['subset'] );
          foreach ( $this->value['subset'] as $subset ) {
            if( ! empty( $subset ) ) {
              DOMAIN_FOR_SALE::$subsets[$subset] = $subset;
            }
          }
        }

        return true;

      }

      return false;

    }

    public function output() {

      $output    = '';
      $bg_image  = array();
      $important = ( ! empty( $this->field['output_important'] ) ) ? '!important' : '';
      $element   = ( is_array( $this->field['output'] ) ) ? join( ',', $this->field['output'] ) : $this->field['output'];

      $font_family   = ( ! empty( $this->value['font-family'] ) ) ? $this->value['font-family'] : '';
      $backup_family = ( ! empty( $this->value['backup-font-family'] ) ) ? ', '. $this->value['backup-font-family'] : '';

      if ( $font_family ) {
        $output .= 'font-family:"'. $font_family .'"'. $backup_family . $important .';';
      }

      // Common font properties
      $properties = array(
        'color',
        'font-weight',
        'font-style',
        'font-variant',
        'text-align',
        'text-transform',
        'text-decoration',
      );

      foreach ( $properties as $property ) {
        if ( isset( $this->value[$property] ) && $this->value[$property] !== '' ) {
          $output .= $property .':'. $this->value[$property] . $important .';';
        }
      }

      $properties = array(
        'font-size',
        'line-height',
        'letter-spacing',
        'word-spacing',
      );

      $unit = ( ! empty( $this->value['unit'] ) ) ? $this->value['unit'] : 'px';
      $line_height_unit = ( ! empty( $this->value['line_height_unit'] ) ) ? $this->value['line_height_unit'] : $unit;

      foreach ( $properties as $property ) {
        if ( isset( $this->value[$property] ) && $this->value[$property] !== '' ) {
          $unit = ( $property === 'line-height' ) ? $line_height_unit : $unit;
          $output .= $property .':'. $this->value[$property] . $unit . $important .';';
        }
      }

      $custom_style = ( ! empty( $this->value['custom-style'] ) ) ? $this->value['custom-style'] : '';

      if ( $output ) {
        $output = $element .'{'. $output . $custom_style .'}';
      }

      $this->parent->output_css .= $output;

      return $output;

    }

  }
}
