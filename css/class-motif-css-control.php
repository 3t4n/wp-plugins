<?php

class Motif_CSS_Control extends WP_Customize_Control {
	public $type = 'motif';

	public function render_content() {
		?><textarea></textarea><?php
	}

	public function enqueue() {
		wp_enqueue_script( 'motif-codemirror', plugins_url( "libs/codemirror/motif-codemirror.js", __FILE__ ), array(), '2.25' );
		wp_enqueue_style( 'motif-codemirror', plugins_url( "libs/codemirror/lib/codemirror.css", __FILE__ ), array(), '2.25' );

		wp_enqueue_script( 'motif', plugins_url( "motif.js", __FILE__ ), array( 'customize-controls', 'motif-codemirror' ), '20120607', true );
		wp_enqueue_style( 'motif', plugins_url( "motif.css", __FILE__ ), array( 'customize-controls', 'motif-codemirror' ), '20120607' );
	}
}