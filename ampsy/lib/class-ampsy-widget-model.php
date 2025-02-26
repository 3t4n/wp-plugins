<?php

class Ampsy_Widget_Model {
	public $url, $name, $style, $class;

	public function __construct( $attrs ) {
		$this->class = "ampsy-iframe";
		if ( isset ( $attrs['class'] ) ) {
			$this->class = $attrs['class'];
		}
		
		if ( isset ( $attrs['url'] ) ) {
			$this->url = $attrs['url'];
		}

		if ( isset ( $attrs['width'] ) ) {
			$this->width = $attrs['width'];
		}

		if ( isset ( $attrs['height'] ) ) {
			$this->height = $attrs['height'];
		}

		$this->style = $this->prepare_style();
	}

	private function prepare_style() {
		$style = '';
		if ( ! empty( $this->width ) ) {
			$style .= "width: $this->width; ";
		}
		if ( ! empty( $this->height ) ) {
			$style .= "height: $this->height;";
		}
		return $style;
	}
}

?>
