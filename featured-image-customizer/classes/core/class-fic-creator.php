<?php

namespace FIC\Featured_Image_Customizer;

! defined( ABSPATH ) || exit;

if ( ! class_exists( 'FIC_Creator' ) ) {

	class FIC_Creator extends Featured_Image_Customizer {

		private $fs;

		public function __construct() {
			parent::__construct();
			$this->fs = new FIC_FS;
		}

		public function generate_preview_image( $logo_a_name, $logo_b_name, $conjunction_text, $bgcolor_hex ) {
			// Static Variables
			$font_family = $this->settings['plugin_path'] . 'assets/dist/fonts/firacode.ttf';
			$font_size   = 64;
			$canvas_w    = 800;
			$canvas_h    = 600;
			$logo_size_w = 150;
			$logo_size_h = 150;
			$source_url  = 'https://fic.developry.com/logos/';

			list($r, $g, $b) = sscanf( $bgcolor_hex, '#%02x%02x%02x' );

			$logo_a_url = $source_url . '/' . $logo_size_w . 'x' . $logo_size_w . '/' . $logo_a_name . '.png';
			$logo_b_url = $source_url . '/' . $logo_size_w . 'x' . $logo_size_w . '/' . $logo_b_name . '.png';

			if ( $this->fs->file_exist( $logo_a_name ) ) {
				$logo_a_url = $this->fs->get_file( $logo_a_name );
			} else {
				$this->fs->save_file( $logo_a_url, $logo_a_name );
			}

			if ( $this->fs->file_exist( $logo_b_name ) ) {
				$logo_b_url = $this->fs->get_file( $logo_b_name );
			} else {
				$this->fs->save_file( $logo_b_url, $logo_b_name );
			}

			// Canvas
			$canvas  = imagecreatetruecolor( $canvas_w, $canvas_h );
			$white   = imagecolorallocate( $canvas, 255, 255, 255 );
			$black   = imagecolorallocate( $canvas, 0, 0, 0 );
			$bgcolor = imagecolorallocate( $canvas, $r, $g, $b );

			imagealphablending( $canvas, true );
			imagesavealpha( $canvas, true );
			imagefill( $canvas, 0, 0, $bgcolor );

			// Logo A
			$logo_a = imagecreatefrompng( $logo_a_url );
			// imagefill($logo_a, 0, 0, $white);

			$logo_a_x = ( $canvas_w - $logo_size_w - ( $canvas_w / 2 ) ) / 2;
			$logo_a_y = ( $canvas_h - $logo_size_h ) / 2;

			// Logo B
			$logo_b = imagecreatefrompng( $logo_b_url );
			// imagefill($logo_b, 0, 0, $white);

			$logo_b_x = ( $canvas_w / 2 ) + ( ( $canvas_w - $logo_size_w - ( $canvas_w / 2 ) ) / 2 );
			$logo_b_y = ( $canvas_h - $logo_size_h ) / 2;

			// Conjuction
			$conjunction_text = html_entity_decode( $conjunction_text ); // & or &amp;
			$conjunction_box  = imagettfbbox( $font_size, 0, $font_family, $conjunction_text );
			$conjunction_w    = $conjunction_box[2] - $conjunction_box[0]; // lower right corner, X - lower left corner, X
			$conjunction_h    = $conjunction_box[3] - $conjunction_box[5]; // lower right corner, Y - upper right corner, Y
			$conjunction_x    = ( $canvas_w / 2 ) - ( $conjunction_w / 2 );
			$conjunction_y    = ( $canvas_h / 2 ) + ( $conjunction_h / 2 );

			// Generate new image
			imagecopy( $canvas, $logo_a, $logo_a_x, $logo_a_y, 0, 0, $logo_size_w, $logo_size_w );
			imagecopy( $canvas, $logo_b, $logo_b_x, $logo_b_y, 0, 0, $logo_size_w, $logo_size_h );
			imagettftext( $canvas, $font_size, 0, $conjunction_x, $conjunction_y, $black, $font_family, $conjunction_text );

			// Create a tmp preview file with unique name
			$tmp_path = tempnam( sys_get_temp_dir(), bin2hex( random_bytes( 10 ) ) );

			imagejpeg( $canvas, $tmp_path, 100 );

			$tmp_type     = pathinfo( $tmp_path, PATHINFO_EXTENSION );
			$tmp_contents = file_get_contents( $tmp_path );

			// Kill all created images
			imagedestroy( $canvas );
			imagedestroy( $logo_a );
			imagedestroy( $logo_b );

			// Return tmp file contents as base64 string
			return array(
				'file_path'     => $tmp_path,
				'file_contents' => 'data:image/' . $tmp_type . ';base64,' . base64_encode( $tmp_contents ),
			);
		}
	}
}
