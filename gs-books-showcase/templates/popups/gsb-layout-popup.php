<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

if ( ! $_popup_enabled ) return;

$localizations = get_option( 'gs_bookshowcase_level_settings' );

?>

<div id="gs_book_popup_<?php echo esc_attr( get_the_id() ); ?>" class="gs_book_popup_shortcode_<?php echo esc_attr( $id ); ?> white-popup mfp-hide mfp-with-anim gs_book_popup">
	<div class="mfp-content--container">
		<?php

		switch ( $popup_style ) {

			case 'style_one':
				include TemplateLoader::locate_template( 'popups/gsb-popup-style-01.php' );
				break;

			case 'style_two':
				include TemplateLoader::locate_template( 'popups/gsb-popup-style-02.php' );
				break;

			case 'style_three':
				include TemplateLoader::locate_template( 'popups/gsb-popup-style-03.php' );
				break;

			case 'style_four':
				include TemplateLoader::locate_template( 'popups/gsb-popup-style-04.php' );
				break;

			case 'style_five':
				include TemplateLoader::locate_template( 'popups/gsb-popup-style-05.php' );
				break;

			default:
				include TemplateLoader::locate_template( 'popups/gsb-popup-style-01.php' );
		}
		?>
	</div>
</div>