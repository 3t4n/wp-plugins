<?php

namespace Profitblue\Abstracts;

use ProfitBlue\Helpers\Helper;

abstract class AbstractForm {

	public function __construct() {
		
	}

	/**
	 * Render checkbox field.
	 *
	 * @since     1.0.0
	 * @return string/void
	 */
	public static function checkbox( $option = array(), $value = null ) {

		/*
		$option = array(
			'label' => esc_html__( 'Lorem ipsum doler sit amet', 'profitblue-financial-reporting-for-woocommerce' ), //Required
			'show_label' => 'yes', //Not required - values yes/no or empty for not show label
			'echo' => true, //Not required - values true/false or empty for returning string
			'name' => 'input name', //Required
			'id' => 'input_id, //Not required
			'value' => 'input value', //Not required, default is yes
		)
		*/
		if( !empty( $option['value'] ) ) {
			$input_value = $option['value'];
		} else {
			$input_value = 'yes';
		}
		$id = '';
		if( !empty( $option['id'] ) ) {
            $id  = 'id="' . $option['id'] . '"';
        }
		$data = '';
	    if( !empty( $option['data'] ) ) {
            $data = $option['data'];
        }
		
        $checked = '';
		$span_checked = '';
	    if( !empty( $value ) && $value == $input_value ) {
            $checked = ' checked="checked"';
			$span_checked = 'checked';
        }
        $html = '';

		$html .= '<div class="checkbox-wrap ' . $option['name'] . '-wrap">';

			if ( !empty( $option['show_label'] ) && 'yes' == $option['show_label'] ) {
        		$html .= '<label>' . $option['label'] . '</label>';
			}
        	$html .= '<input type="checkbox" name="' . $option['name'] . '" ' . $id . ' value="' . $input_value . '" ' . $checked . ' class="checkbox-input" />';
			$html .= '<span class="checkbox-input-handler ' . $span_checked . '" ' . $data . '></span>';

		$html .= '</div>';

        if ( !empty( $option['echo'] ) && true == $option['echo'] ) {
            echo wp_kses( $html, Helper::get_allowed_tags() );
        } else {
            return $html;
        }

	}

    /**
	 * Render text field.
	 *
	 * @since     1.0.0
	 * @return string/void
	 */
	public static function text( $option = array(), $value = null ) {
		
        /*
		$option = array(
			'label' => esc_html__( 'Lorem ipsum doler sit amet', 'profitblue-financial-reporting-for-woocommerce' ), //Required
			'show_label' => 'yes', //Not required - values yes/no or empty for not show label
			'echo' => true, //Not required - values true/false or empty for returning string
			'name' => 'input name', //Required
			'id' => 'input_id, //Not required
			'value' => 'input value', //Not required
		)
		*/
		
        if( !empty( $value ) ) {
            $value_html  = 'value="' . $value . '"';
        } else {
			$value_html =  '';
		}
		$id = '';
		if( !empty( $option['id'] ) ) {
            $id  = 'id="' . $option['id'] . '"';
        }
		$html = '';

		$html .= '<div class="text-wrap ' . $option['name'] . '-wrap">';

			if ( !empty( $option['show_label'] ) && 'yes' == $option['show_label'] ) {
				$html .= '<label>' . $option['label'] . '</label>';
			}
		
			$html .= '<div class="text-inner">';

        		$html .= '<input type="text" name="' . $option['name'] . '" ' . $id . ' ' . $value_html . ' />';

        	$html .= '</div>';

		$html .= '</div>';

        if ( !empty( $option['echo'] ) && true == $option['echo'] ) {
            echo wp_kses( $html, Helper::get_allowed_tags() );
        } else {
            return $html;
        }  

	}

	/**
	 * Render number field.
	 *
	 * @since     1.0.0
	 * @return string/void
	 */
	public static function number( $option = array(), $value = null ) {

		/*
		$option = array(
			'label' => esc_html__( 'Lorem ipsum doler sit amet', 'profitblue-financial-reporting-for-woocommerce' ), //Required
			'show_label' => 'yes', //Not required - values yes/no or empty for not show label
			'echo' => true, //Not required - values true/false or empty for returning string
			'name' => 'input name', //Required
			'id' => 'input_id, //Not required
			'value' => 'input value', //Not required
			'min' => min //Not required default is 0
			'max' => max //Not required
			'step' => step //Not required default is 1
		)
		*/
		if( !empty( $value ) ) {
            $value_html  = 'value="' . $value . '"';
        } else {
			$value_html =  'value="0"';
		}
		$id = '';
		if( !empty( $option['id'] ) ) {
            $id  = 'id="' . $option['id'] . '"';
        }
		$step = '1';
		if ( !empty( $option['step'] ) ) {
			$step = $option['step'];
		}
		$min = '0';
		if ( !empty( $option['min'] ) ) {
			$min = $option['min'];
		}
		$max = '';
		if ( !empty( $option['max'] ) ) {
			$max = 'max="' . $option['max'] . '"';
		}

		$data = '';
	    if( !empty( $option['data'] ) ) {          
			$data = $option['data'];
        }
		$class = '';
	    if( !empty( $option['class'] ) ) {          
			$class = 'class="'. implode( ' ', $option['class'] ) . '"';
        }
        
		$html = '';

		$html .= '<div class="number-wrap ' . $option['name'] . '-wrap">';

			if ( !empty( $option['show_label'] ) && 'yes' == $option['show_label'] ) {
				$html .= '<label>' . $option['label'] . '</label>';
			}
		
			$html .= '<div class="number-inner">';

        		$html .= '<input type="number" name="' . $option['name'] . '" ' . $id . ' ' . $value_html . ' step="' . $step . '" min="' . $min . '" ' . $max . ' ' . $data . ' ' . $class . ' />';

        	$html .= '</div>';

		$html .= '</div>';

        if ( !empty( $option['echo'] ) && true == $option['echo'] ) {
            echo wp_kses( $html, Helper::get_allowed_tags() );
        } else {
            return $html;
        }  

	}

    /**
	 * Render select field.
	 *
	 * @since     1.0.0
	 * @return string/void
	 */
	//public static function select( $label, $name, $option, $args, $echo = false ) {
	public static function select( $option = array(), $value = null ) {
		
		/*
		$option = array(
			'label' => esc_html__( 'Lorem ipsum doler sit amet', 'profitblue-financial-reporting-for-woocommerce' ), //Required
			'show_label' => 'yes', //Not required - values yes/no or empty for not show label
			'echo' => true, //Not required - values true/false or empty for returning string
			'name' => 'input name', //Required
			'id' => 'input_id, //Not required
			'values' => 'input values', //Required, default is yes
		)
		*/

		$id = '';
		if( !empty( $option['id'] ) ) {
            $id  = 'id="' . $option['id'] . '"';
        }
		
        $html = '';

		$html .= '<div class="select-wrap ' . $option['name'] . '-wrap">';

			if ( !empty( $option['show_label'] ) && 'yes' == $option['show_label'] ) {
				$html .= '<label>' . $option['label'] . '</label>';
			}
			
			$html .= '<div class="select-inner">';
			$values = $option['values'];
				//Pořešit vybranou hodnotu
				$html .= '<div class="selected-value">';
					
					if ( !empty( $value ) && !empty( $option['values'][$value] ) ) {
						$html .= '<span class="selected-value-label">' . $option['values'][$value] . '</span>';
					} else {
						$html .= '<span class="selected-value-label">' . array_shift( $option['values'] ) . '</span>';
					}
					
					$html .= '<span class="select-dropdown-icon select-dropdown-action">';
						$html .= '<svg class="select-dropdown-action-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>';
					$html .= '</span>';
				$html .= '</div>';
				$html .= '<div class="select-dropdown">';
					foreach( $values as $key => $text ) {

						//Dropdown class for idetinfiing specific dropdown
						if ( !empty( $option['dropdown-class'] ) ) {
							$html .= '<div class="select-dropdown-item ' . $option['dropdown-class'] . '" data-value="' . $key . '" data-label="' . $text . '">' . $text . '</div>';						
						} else {						
							$html .= '<div class="select-dropdown-item" data-value="' . $key . '" data-label="' . $text . '">' . $text . '</div>';						
						}

					}

				$html .= '</div>';

			$html .= '</div>';
			
			$html .= '<select name="' . $option['name'] . '" ' . $id . '>';
			foreach( $values as $item_value => $text ) {

				$selected = '';
				
				if( $value == $item_value ) {
					$selected = ' selected="selected"';
				}

				$html .= '<option value="' . $item_value . '" ' . $selected . '>' . $text . '</option>';
			}
			$html .= '</select>';

		$html .= '</div>';

        if ( !empty( $option['echo'] ) && true == $option['echo'] ) {
            echo wp_kses( $html, Helper::get_allowed_tags() );
        } else {
            return $html;
        }       

	}

	/**
	 * Render datepicker field.
	 *
	 * @since     1.0.0
	 * @return string/void
	 */
	public static function datepicker( $option = array(), $value = null ) {

		/*
		$option = array(
			'label' => esc_html__( 'Lorem ipsum doler sit amet', 'profitblue-financial-reporting-for-woocommerce' ), //Required
			'show_label' => 'yes', //Not required - values yes/no or empty for not show label
			'echo' => true, //Not required - values true/false or empty for returning string
			'name' => 'input name', //Required
			'id' => 'input_id, //Not required
			'value' => 'input value', //Not required
		)
		*/
		
        if( !empty( $value ) ) {
            $value_html  = 'value="' . $value . '"';
        } else {
			$value_html =  '';
		}
		$id = '';
		if( !empty( $option['id'] ) ) {
            $id  = 'id="' . $option['id'] . '"';
        }
		$step = '1';
		if ( !empty( $option['step'] ) ) {
			$step = $option['step'];
		}
		$min = '0';
		if ( !empty( $option['min'] ) ) {
			$min = $option['min'];
		}
		$max = '';
		if ( !empty( $option['max'] ) ) {
			$max = 'max="' . $option['max'] . '"';
		}
        
		$html = '';

		$html .= '<div class="datepicker-wrap ' . $option['name'] . '-wrap">';

			if ( !empty( $option['show_label'] ) && 'yes' == $option['show_label'] ) {
				$html .= '<label>' . $option['label'] . '</label>';
			}
		
			$html .= '<div class="datepicker-inner">';

        		$html .= '<input class="datepicker" name="' . $option['name'] . '" ' . $id . ' ' . $value_html . ' />';

        	$html .= '</div>';

		$html .= '</div>';

        if ( !empty( $option['echo'] ) && true == $option['echo'] ) {
            echo wp_kses( $html, Helper::get_allowed_tags() );
        } else {
            return $html;
        }  

	}

    /**
	 * Render textarea field.
	 *
	 * @since     1.0.0
	 * @return string/void
	 */
	public static function textarea( $label, $name, $option, $args, $echo = false, $default = false ) {
		
		$id = '';
		if( !empty( $option['id'] ) ) {
            $id  = 'id="' . $option['id'] . '"';
        }

        $html = '';
        $html .= '<label>' . $label . '</label>';

        $html .= '<textarea name="' . $name . '" ' . $id . '>';

        if( !empty( $option[$name] ) ) {
            $html .= $option[$name];
        } else {
            if( !empty( $default ) ) {
                $html .= $default;
            }
        }
    
        $html .= '</textarea>';
    
        if ( true == $echo ) {
            echo wp_kses( $html, Helper::get_allowed_tags() );
        } else {
            return $html;
        }        

	}
	
}
