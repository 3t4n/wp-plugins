<?php
/*
Plugin Name: Ataino Consolelog Output
Plugin URI: https://twitter.com/kyanetamaru
Description: Development support tool. (theme and plugin) Output valiable for your web browsers console.
Version: 1.03
Author: kanetamaru@ishii
Author URI: https://twitter.com/kyanetamaru
License: GPLv2
*/

class ataino_console {

 	private $plugin_value;
 	private $plugin_out = "";
 	private $numargs;
 	private $out;

	function log() {
	    $this->numargs = func_num_args();
		$this->plugin_value = func_get_args();
			if ( $this->numargs ) {
			    $this->out = $this->process(true);
			    echo( "<script>console.log(" . $this->out . ")</script>" );
			}
	}

	function table() {
	    $this->numargs = func_num_args();
		$this->plugin_value = func_get_args();
			if ( $this->numargs ) {
			    $this->out = $this->process(false);
			    echo( "<script>console.table([" . $this->out . "])</script>" );
			}
	}

	function json() {
	    $this->numargs = func_num_args();
		$this->plugin_value = func_get_args();
			if ( $this->numargs ) {
			    $this->out = $this->process(false);
			    echo( "<script>console.log(" . $this->out . ")</script>" );
			}
	}

	function time() {
	    $this->numargs = func_num_args();
		$this->plugin_value = func_get_args();
			if ( $this->numargs ) {
				$this->out = $this->plugin_value[0];
			    echo( "<script>console.time( '" . $this->out . "' )</script>" );
			} else {
				echo( "<script>console.time( 'wp:timer' )</script>" );
			}
	}
	function timeEnd() {
	    $this->numargs = func_num_args();
		$this->plugin_value = func_get_args();
			if ( $this->numargs ) {
				$this->out = $this->plugin_value[0];
			    echo( "<script>console.timeEnd( '" . $this->out . "' )</script>" );
			} else {
				echo( "<script>console.timeEnd( 'wp:timer' )</script>" );
			}
	}

	private function process($mode) {

	    for ($i = 0; $i < $this->numargs; $i++) {

		    if (is_array($this->plugin_value[$i]) || is_object($this->plugin_value[$i])) {
		    	if ($mode) { 
		    		/* Your choice of output. */
		    		/**
		    		 * about print_r()
		    		 */
		    			$this->plugin_value[$i] = print_r( $this->plugin_value[$i], true );
		    		/**
		    		 * about var_export()
		    		 */
		    			//$this->plugin_value[$i] = var_export( $this->plugin_value[$i], true );
		    		/**
		    		 * about var_dump() Output Buffering
		    		 */
						//ob_start();	var_dump( $this->plugin_value[$i] ); $this->plugin_value[$i] = ob_get_contents(); ob_end_clean();

		    	}
		    		$this->plugin_value[$i] = json_encode($this->plugin_value[$i]);
				        if ( $i === 0 ) {
				        	$this->plugin_out = $this->plugin_value[$i];
				    	} else {
				        	$this->plugin_out .= ',' . $this->plugin_value[$i];
				    	}
		    } else {
				        if ( $i === 0 ) {
				        	$this->plugin_out .= '"wp: "+"' . $this->plugin_value[$i] . '"';
				    	} else {
				        	$this->plugin_out .= ', "' . $this->plugin_value[$i] . '"';
				    	}
		    }

	    }

	    return $this->plugin_out;
	}

}

?>