<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

if( !class_exists( 'ilrc_form' ) ) {

	class ilrc_form {

		/**
		 * ELEMENT START
		 */

		public function elementStart($attribute, $id, $class ) {

			$html = '<';
			$html .= $attribute !== FALSE ? esc_attr($attribute) : '' ;
			$html .= $id !== FALSE ? ' id="' . esc_attr($id) . '" ' : '' ;
			$html .= $class !== FALSE ? ' class="' . esc_attr($class) . '" ' : '' ;
			$html .= '>';

			return $html;

		}

		/**
		 * ELEMENT END
		 */

		public function elementEnd($attribute) {

			$html = '</';
			$html .= $attribute !== FALSE ? esc_attr($attribute) : '' ;
			$html .= '>';

			return $html;

		}

		/**
		 * ELEMENT
		 */

		public function element($attribute, $id, $class, $content) {

			$html = '<';
			$html .= $attribute !== FALSE ? esc_attr($attribute) : '' ;
			$html .= $id !== FALSE ? ' id="' . esc_attr($id) . '" ' : '' ;
			$html .= $class !== FALSE ? ' class="' . esc_attr($class) . '" ' : '' ;
			$html .= '>';
			$html .= $content !== FALSE ? esc_html($content) : '' ;
			$html .= '</';
			$html .= $attribute !== FALSE ? esc_attr($attribute) : '' ;
			$html .= '>';

			return $html;

		}

		/**
		 * IMAGE
		 */

		public function img($src, $id = FALSE, $class = FALSE) {

			$html = '<img ';
			$html .= $src !== FALSE ? ' src="' . esc_attr($src) . '" ' : '' ;
			$html .= $id !== FALSE ? ' id="' . esc_attr($id) . '" ' : '' ;
			$html .= $class !== FALSE ? ' class="' . esc_attr($class) . '" ' : '' ;
			$html .= '>';

			return $html;

		}

		/**
		 * LINK
		 */

		public function link($url, $id, $class, $target, $rel, $content) {

			$html = '<a ';
			$html .= $url !== FALSE ? ' href="' . esc_url($url) . '" ' : '' ;
			$html .= $id !== FALSE ? ' id="' . esc_attr($id) . '" ' : '' ;
			$html .= $class !== FALSE ? ' class="' . esc_attr($class) . '" ' : '' ;
			$html .= $target !== FALSE ? ' target="' . esc_attr($target) . '" ' : '' ;
			$html .= $rel !== FALSE ? ' rel="' . esc_attr($rel) . '" ' : '' ;
			$html .= '>';
			$html .= $content !== FALSE ? esc_html($content) : '' ;
			$html .= '</a>';

			return $html;

		}

		/**
		 * LIST
		 */

		public function htmlList( $type, $id, $class, $values, $current ) {

			$html  = '<' . esc_attr($type);
			$html .= $id !== FALSE ? ' id="' . esc_attr($id) . '"' : '' ;
			$html .= $class !== FALSE ? ' class="' . esc_attr($class) . '"' : '' ;
			$html .= '>';

			foreach ($values as $k => $v ) {
			
				$html .= '<li';
				$html .= (str_replace(' ', '', $k) === $current) ? ' class="ui-state-active"' : '' ;
				$html .= ' value="' . $k . '"';
				$html .= '>';
				
				if (0 === strpos($k, 'http')) {
					$html .= $this->link($k, FALSE, FALSE, '_BLANK', FALSE, $v);
				} else {
					$html .= $this->link(esc_url('admin.php?page=ilrc_panel&tab=' . str_replace(' ', '', $k)), FALSE, FALSE, '_SELF', FALSE, $v);
				}
				
				$html .= '</li>';
			}
			
			$html .= '<li class="clear"></li>';
			$html .= '</' . esc_attr($type) . '>';

			return $html;

		}

		/**
		 * FORM START
		 */

		public function formStart($method, $action ) {

			$html = '<form enctype="multipart/form-data"';
			$html .= $method !== FALSE ? ' method="' . esc_attr($method) . '" ' : '' ;
			$html .= $action !== FALSE ? ' action="' . esc_attr($action) . '" ' : '' ;
			$html .= '>';

			return $html;

		}

		/**
		 * FORM END
		 */

		public function formEnd() {

			return '</form>';

		}

		/**
		 * LABEL
		 */

		public function label($id, $text) {

			$html  = '<label';
			$html .= $id !== FALSE ? ' id="' . esc_attr($id) . '_label"' : '' ;
			$html .= $id !== FALSE ? ' for="' . esc_attr($id) . '"' : '' ;
			$html .= '>';
			$html .= $text !== FALSE ? esc_html($text) : '' ;
			$html .= '</label>';

			return $html;

		}

		/**
		 * INPUT
		 */

		public function input($name, $id, $class, $type, $value, $limit = FALSE ) {

			$html  = '<input ';
			$html .= $name !== FALSE ? ' name="' . esc_attr($name) . '"' : '' ;
			$html .= $id !== FALSE ? ' id="' . esc_attr($id) . '"' : '' ;
			$html .= $class !== FALSE ? ' class="' . esc_attr($class) . '"' : '' ;
			$html .= $type !== FALSE ? ' type="' . esc_attr($type) . '"' : '' ;
			$html .= $limit !== FALSE ? ' min="' . esc_attr($limit) . '"' : '' ;
			$html .= $value !== FALSE ? ' value="' . esc_attr($value) . '"' : '' ;
			$html .= ' >';

			return $html;

		}

		/**
		 * COLOR
		 */

		public function color($name, $id, $class, $type, $value, $std ) {

			$html = str_replace ('<input ', '<input data-default-color="' . esc_attr($std) .'" ' , $this->input($name, $id, $class, $type, $value));  
			return $html;

		}

		/**
		 * TEXTAREA
		 */

		public function textarea($name, $id, $class, $value, $disabled) {

			$html  = '<textarea ';
			$html .= $name !== FALSE ? ' name="' . esc_attr($name) . '"' : '' ;
			$html .= $id !== FALSE ? ' id="' . esc_attr($id) . '"' : '' ;
			$html .= $class !== FALSE ? ' class="' . esc_attr($class) . '"' : '' ;
			$html .= $disabled === TRUE ? ' disabled' : '' ;
			$html .= '>';
			$html .= $value !== FALSE ? stripslashes($value) : '' ;
			$html .= '</textarea>';

			return $html;

		}

		/**
		 * SELECT
		 */

		public function select($name, $id, $class, $values, $current, $dataType ) {

			$html  = '<select ';
			$html .= $name !== FALSE ? ' name="' . esc_attr($name) . '"' : '' ;
			$html .= $id !== FALSE ? ' id="' . esc_attr($id) . '"' : '' ;
			$html .= $class !== FALSE ? ' class="' . esc_attr($class) . '"' : '' ;
			$html .= $dataType !== FALSE ? esc_attr($dataType) : '' ;
			$html .= '>';

			foreach ($values as $k => $v ) {

				$html .= '<option';
				$html .= strval($k) === strval($current) ? ' selected="selected"' : '' ;
				$html .= ' value="' . esc_attr($k) . '"';
				$html .= '>';
				$html .= esc_html($v);
				$html .= '</option>';
			}

			$html .= '</select>';

			return $html;

		}

		/**
		 * CHECKBOX
		 */

		public function checkbox($name, $values, $default ) {

			$html = '';

			foreach ($values as $k => $v ) {

				$check = '';

				if ( $default != false ) {

					foreach ( $default as $current ) {

						if ( $current == $k )
							$check = ' checked="checked"';

					}

				}

				$html  = '<p>';
				$html .= '<input';
				$html .= $name !== FALSE ? ' name="' . esc_attr($name) . '[]"' : '' ;
				$html .= 'type="checkbox"' ;
				$html .= 'value="' . esc_attr($k) . '"' ;
				$html .= $check;
				$html .= '/>';
				$html .= esc_html($v);
				$html .= '</p>';

			}

			return $html;

		}

		/**
		 * TABLE START
		 */

		public function tableStart($id, $class, $cellspacing, $cellpadding) {

			$html  = '<table ';
			$html .= $id !== FALSE ? ' id="' . esc_attr($id) . '"' : '' ;
			$html .= $class !== FALSE ? ' class="' . esc_attr($class) . '"' : '' ;
			$html .= $cellspacing !== FALSE ? ' cellspacing="' . esc_attr($cellspacing) . '"' : '' ;
			$html .= $cellpadding !== FALSE ? ' cellpadding="' . esc_attr($cellpadding) . '"' : '' ;
			$html .= '>';

			return $html;

		}

		/**
		 * TABLE END
		 */

		public function tableEnd() {

			return '</table>';

		}

		/**
		 * TABLE ELEMENT
		 */

		public function tableElement($name, $id, $class) {

			$html  = '<'.esc_attr($name).' ';
			$html .= $id !== FALSE ? ' id="' . esc_attr($id) . '"' : '' ;
			$html .= $class !== FALSE ? ' class="' . esc_attr($class) . '"' : '' ;
			$html .= '>';

			$html .= '</'.esc_attr($name).'>';

			return $html;

		}

		/**
		 * TABLE ELEMENT START
		 */

		public function tableElementStart($name, $id, $class) {

			$html  = '<'.esc_attr($name).' ';
			$html .= $id !== FALSE ? ' id="' . esc_attr($id) . '"' : '' ;
			$html .= $class !== FALSE ? ' class="' . esc_attr($class) . '"' : '' ;
			$html .= '>';

			return $html;

		}

		/**
		 * TABLE ELEMENT END
		 */

		public function tableElementEnd($name) {

			return '</'.esc_attr($name).'>';

		}

	}

}

?>
