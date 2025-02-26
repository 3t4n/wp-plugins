<?php
/**
 * Save
 *
 * @package GCORE
 */

if ( ! isset( $_POST['n'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['n'] ) ) ) ) {
	status_header( 401, 'Unauthorized' );
	die;
}

$gcore_tabs = array(
	'main'       => array( 'name' => esc_html( __( 'General', 'gcore_translate' ) ) ),
	'types'      => array( 'name' => esc_html( __( 'File types', 'gcore_translate' ) ) ),
	'folders'    => array( 'name' => esc_html( __( 'Folders', 'gcore_translate' ) ) ),
	'exceptions' => array( 'name' => esc_html( __( 'Exceptions', 'gcore_translate' ) ) ),
);
if ( isset( $_GET['tab'] ) && in_array( $_GET['tab'], array( 'types', 'folders', 'exceptions' ), true ) ) {
	sanitize_text_field( wp_unslash( $_GET['tab'] ) );
} else {
	$get_tab = 'main';
}
$del = null !== isset( $_GET['del'] ) ? sanitize_text_field( wp_unslash( $_GET['del'] ) ) : null;

if ( isset( $_POST['save'] ) ) {
	if ( 'main' === $get_tab ) {
		$gcore_cdn_url = isset( $_POST['gcore_cdn_url'] ) ? trim( esc_url_raw( wp_unslash( $_POST['gcore_cdn_url'] ) ) ) : '';
		if ( '' !== $gcore_cdn_url ) {
			$gcore_cdn_url = trailingslashit( untrailingslashit( $gcore_cdn_url ) );
		}
		update_option( 'gcore_cdn_url', $gcore_cdn_url );
		$gcore_enable_cdn = isset( $_POST['gcore_enable_cdn'] ) ? intval( $_POST['gcore_enable_cdn'] ) : 0;
		update_option( 'gcore_enable_cdn', $gcore_enable_cdn );
	}
	if ( 'types' === $get_tab ) {
		$gcore_cdn_types = get_option( 'gcore_cdn_types' );
		$new_type        = isset( $_POST['new_type'] ) ? sanitize_text_field( wp_unslash( $_POST['new_type'] ) ) : '';
		$new_type        = preg_replace( '/[^a-zA-Z0-9]/ui', '', strtolower( trim( $new_type ) ) );
		if ( '' !== $new_type ) {
			if ( '' !== $gcore_cdn_types ) {
				$gcore_cdn_types = json_decode( $gcore_cdn_types, true );
			} else {
				$gcore_cdn_types = array();
			}
			array_push( $gcore_cdn_types, $new_type );
			$gcore_cdn_types = array_unique( $gcore_cdn_types );
			$gcore_cdn_types = wp_json_encode( $gcore_cdn_types );
			update_option( 'gcore_cdn_types', $gcore_cdn_types );
		}
		update_option( 'gcore_type_image', isset( $_POST['gcore_type_image'] ) ? intval( $_POST['gcore_type_image'] ) : 0 );
		update_option( 'gcore_type_video', isset( $_POST['gcore_type_video'] ) ? intval( $_POST['gcore_type_video'] ) : 0 );
		update_option( 'gcore_type_audio', isset( $_POST['gcore_type_audio'] ) ? intval( $_POST['gcore_type_audio'] ) : 0 );
		update_option( 'gcore_type_js', isset( $_POST['gcore_type_js'] ) ? intval( $_POST['gcore_type_js'] ) : 0 );
		update_option( 'gcore_type_css', isset( $_POST['gcore_type_css'] ) ? intval( $_POST['gcore_type_css'] ) : 0 );
		update_option( 'gcore_type_archive', isset( $_POST['gcore_type_archive'] ) ? intval( $_POST['gcore_type_archive'] ) : 0 );
		update_option( 'gcore_type_advanced', isset( $_POST['gcore_type_advanced'] ) ? intval( $_POST['gcore_type_advanced'] ) : 0 );

	}
	if ( 'folders' === $get_tab ) {
		$gcore_cdn_folders = get_option( 'gcore_cdn_folders' );
		$new_folder        = isset( $_POST['new_folder'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['new_folder'] ) ) ) : '';
		if ( '' !== $new_folder ) {
			$new_folder = trailingslashit( untrailingslashit( $new_folder ) );
			$first      = substr( $new_folder, 0, 1 );
			if ( '/' !== $first ) {
				$new_folder = '/' . $new_folder;
			}
			if ( '' !== $gcore_cdn_folders ) {
				$gcore_cdn_folders = json_decode( $gcore_cdn_folders, true );
			} else {
				$gcore_cdn_folders = array();
			}
			array_push( $gcore_cdn_folders, $new_folder );
			$gcore_cdn_folders = array_unique( $gcore_cdn_folders );
			$gcore_cdn_folders = wp_json_encode( $gcore_cdn_folders );
			update_option( 'gcore_cdn_folders', $gcore_cdn_folders );
		}
		update_option( 'gcore_folder_templates', intval( isset( $_POST['gcore_folder_templates'] ) ? $_POST['gcore_folder_templates'] : 0 ) );
		update_option( 'gcore_folder_plugins', intval( isset( $_POST['gcore_folder_plugins'] ) ? $_POST['gcore_folder_plugins'] : 0 ) );
		update_option( 'gcore_folder_content', intval( isset( $_POST['gcore_folder_content'] ) ? $_POST['gcore_folder_content'] : 0 ) );
		update_option( 'gcore_folder_advanced', intval( isset( $_POST['gcore_folder_advanced'] ) ? $_POST['gcore_folder_advanced'] : 0 ) );

	}
	if ( 'exceptions' === $get_tab ) {
		$gcore_cdn_exceptions = get_option( 'gcore_cdn_exceptions' );
		$new_exception        = isset( $_POST['new_exception'] ) ? trim( wp_unslash( esc_url_raw( wp_unslash( $_POST['new_exception'] ) ) ) ) : '';
		$new_exception        = explode( '?', $new_exception );
		$new_exception        = explode( '&', $new_exception[0] );
		$new_exception        = $new_exception[0];
		if ( '' !== $new_exception ) {
			if ( '' !== $gcore_cdn_exceptions ) {
				$gcore_cdn_exceptions = json_decode( $gcore_cdn_exceptions, true );
			} else {
				$gcore_cdn_exceptions = array();
			}
			array_push( $gcore_cdn_exceptions, $new_exception );
			$gcore_cdn_exceptions = array_unique( $gcore_cdn_exceptions );
			$gcore_cdn_exceptions = wp_json_encode( $gcore_cdn_exceptions );
			update_option( 'gcore_cdn_exceptions', $gcore_cdn_exceptions );
		}
	}
} elseif ( null !== $del ) {
	if ( 'types' === $get_tab ) {
		$gcore_cdn_types = get_option( 'gcore_cdn_types' );
		$new_type        = preg_replace( '/[^a-zA-Z0-9]/ui', '', strtolower( trim( $del ) ) );
		if ( '' !== $new_type ) {
			if ( '' !== $gcore_cdn_types ) {
				$gcore_cdn_types = json_decode( $gcore_cdn_types, true );
				$k               = array_search( $new_type, $gcore_cdn_types, true );
				if ( false !== $k ) {
					unset( $gcore_cdn_types[ $k ] );
					$gcore_cdn_types = wp_json_encode( $gcore_cdn_types );
					update_option( 'gcore_cdn_types', $gcore_cdn_types );
				}
			}
		}
	}
	if ( 'folders' === $get_tab ) {
		$gcore_cdn_folders = get_option( 'gcore_cdn_folders' );
		$new_folder        = isset( $_POST['new_folder'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['new_folder'] ) ) ) : '';
		if ( '' !== $new_folder ) {
			$new_folder = trailingslashit( untrailingslashit( $new_folder ) );
			$first      = substr( $new_folder, 0, 1 );
			if ( '/' !== $first ) {
				$new_folder = '/' . $new_folder;
			}
			if ( '' !== $gcore_cdn_folders ) {
				$gcore_cdn_folders = json_decode( $gcore_cdn_folders, true );
				$k                 = array_search( $new_folder, $gcore_cdn_folders, true );
				if ( false !== $k ) {
					unset( $gcore_cdn_folders[ $k ] );
					$gcore_cdn_folders = wp_json_encode( $gcore_cdn_folders );
					update_option( 'gcore_cdn_folders', $gcore_cdn_folders );
				}
			}
		}
	}
	if ( 'exceptions' === $get_tab ) {
		$gcore_cdn_exceptions = get_option( 'gcore_cdn_exceptions' );
		$new_exception        = isset( $_POST['new_exception'] ) ? trim( wp_unslash( esc_url_raw( wp_unslash( $_POST['new_exception'] ) ) ) ) : '';
		if ( '' !== $new_exception ) {
			if ( '' !== $gcore_cdn_exceptions ) {
				$gcore_cdn_exceptions = json_decode( $gcore_cdn_exceptions, true );
				$k                    = array_search( $new_exception, $gcore_cdn_exceptions, true );
				if ( false !== $k ) {
					unset( $gcore_cdn_exceptions[ $k ] );
					$gcore_cdn_exceptions = wp_json_encode( $gcore_cdn_exceptions );
					update_option( 'gcore_cdn_exceptions', $gcore_cdn_exceptions );
				}
			}
		}
	}
}

$gcore_enable_cdn   = get_option( 'gcore_enable_cdn' );
$gcore_cdn_disabled = ( 1 === $gcore_enable_cdn ) ? '' : ' disabled';

if ( 'main' === $get_tab ) {
	$gcore_cdn_url            = get_option( 'gcore_cdn_url' );
	$gcore_enable_cdn_checked = 1 === (int) $gcore_enable_cdn ? ' checked="checked"' : '';
}
if ( 'types' === $get_tab ) {

	$gcore_type_advanced         = get_option( 'gcore_type_advanced' );
	$gcore_type_advanced_checked = ( 1 === (int) $gcore_type_advanced ) ? ' checked="checked"' : '';

	if ( 0 === $gcore_type_advanced ) {
		$gcore_type_image           = get_option( 'gcore_type_image' );
		$gcore_type_image_checked   = ( 1 === (int) $gcore_type_image ) ? ' checked="checked"' : '';
		$gcore_type_video           = get_option( 'gcore_type_video' );
		$gcore_type_video_checked   = ( 1 === (int) $gcore_type_video ) ? ' checked="checked"' : '';
		$gcore_type_audio           = get_option( 'gcore_type_audio' );
		$gcore_type_audio_checked   = ( 1 === (int) $gcore_type_audio ) ? ' checked="checked"' : '';
		$gcore_type_js              = get_option( 'gcore_type_js' );
		$gcore_type_js_checked      = ( 1 === (int) $gcore_type_js ) ? ' checked="checked"' : '';
		$gcore_type_css             = get_option( 'gcore_type_css' );
		$gcore_type_css_checked     = ( 1 === (int) $gcore_type_css ) ? ' checked="checked"' : '';
		$gcore_type_archive         = get_option( 'gcore_type_archive' );
		$gcore_type_archive_checked = ( 1 === (int) $gcore_type_archive ) ? ' checked="checked"' : '';
	} else {
		$gcore_type_image_checked   = ' disabled';
		$gcore_type_video_checked   = ' disabled';
		$gcore_type_audio_checked   = ' disabled';
		$gcore_type_js_checked      = ' disabled';
		$gcore_type_css_checked     = ' disabled';
		$gcore_type_archive_checked = ' disabled';
	}


	$gcore_cdn_types = get_option( 'gcore_cdn_types' );
	$gcore_cdn_types = json_decode( $gcore_cdn_types, true );
	if ( '' === $gcore_cdn_types ) {
		$gcore_cdn_types = array();
	}
}
if ( 'folders' === $get_tab ) {

	$gcore_folder_advanced         = get_option( 'gcore_folder_advanced' );
	$gcore_folder_advanced_checked = ( 1 === (int) $gcore_folder_advanced ) ? ' checked="checked"' : '';

	if ( 0 === $gcore_folder_advanced ) {
		$gcore_folder_templates         = get_option( 'gcore_folder_templates' );
		$gcore_folder_templates_checked = ( 1 === (int) $gcore_folder_templates ) ? ' checked="checked"' : '';
		$gcore_folder_plugins           = get_option( 'gcore_folder_plugins' );
		$gcore_folder_plugins_checked   = ( 1 === (int) $gcore_folder_plugins ) ? ' checked="checked"' : '';
		$gcore_folder_content           = get_option( 'gcore_folder_content' );
		$gcore_folder_content_checked   = ( 1 === (int) $gcore_folder_content ) ? ' checked="checked"' : '';
	} else {
		$gcore_folder_templates_checked = ' disabled';
		$gcore_folder_plugins_checked   = ' disabled';
		$gcore_folder_content_checked   = ' disabled';
	}

	$gcore_cdn_folders = get_option( 'gcore_cdn_folders' );
	$gcore_cdn_folders = json_decode( $gcore_cdn_folders, true );
	if ( '' === $gcore_cdn_folders ) {
		$gcore_cdn_folders = array();
	}
}
if ( 'exceptions' === $get_tab ) {
	$gcore_cdn_exceptions = get_option( 'gcore_cdn_exceptions' );
	$gcore_cdn_exceptions = json_decode( $gcore_cdn_exceptions, true );
	if ( '' === $gcore_cdn_exceptions ) {
		$gcore_cdn_exceptions = array();
	}
}


$title_page = $gcore_tabs[ $get_tab ]['name'];

$admin_url = admin_url();
$data      = '';
$data     .= '
<h1>' . esc_html( __( 'CDN settings', 'gcore_translate' ) ) . ' - ' . esc_html( $title_page ) . '</h1>
<div>
    <h3>
';

foreach ( $gcore_tabs as $key => $value ) {
	$c     = $key == $get_tab ? ' nav-tab-active' : '';
	$data .= '<a class="nav-tab' . esc_html( $c ) . '" href="' . esc_url( $admin_url ) . 'admin.php?page=gcore_labs&tab=' . esc_html( $key ) . '">' . esc_html( $value['name'] ) . '</a>';
}
$data .= '</h3>
</div>
<form method="post" name="preferences" id="preferences" class="validate">';

if ( 'main' === $get_tab ) {
	$data .= '<table class="form-table" style="max-width: 600px;">
            <tr class="form-field form-required">
                <td colspan="2">
                    <input type="checkbox" name="gcore_enable_cdn" id="gcore_enable_cdn" value="1" ' . esc_html( $gcore_enable_cdn_checked ) . '> <label for="gcore_enable_cdn">' . esc_html( __( 'Enable CDN', 'gcore_translate' ) ) . '</label>
                    <p class="description" id="tagline-description">' . esc_html( __( 'In the paths to files conforming to the rules specified below, a domain will be replaced with a personal domain.', 'gcore_translate' ) ) . '</p>
                </td>
            </tr>           
            <tr class="form-field form-required">
                <td scope="row"><label for="user_login">' . esc_html( __( 'Personal domain (for configuring CNAME)', 'gcore_translate' ) ) . '</label></td>
                <td>
                    <input type="text" name="gcore_cdn_url" id="gcore_cdn_url" ' . esc_html( $gcore_cdn_disabled ) . ' value="' . esc_url( $gcore_cdn_url ) . '" placeholder="' . esc_html( __( 'Example', 'gcore_translate' ) ) . ': https://cdn.example.com/">
                    <p class="description" id="tagline-description">' . esc_html( __( 'Specify the personal domain with a scheme corresponding to the one specified in Gcore control panel. If you are using a domain in your zone, make sure that this domain is added in the DNS provider settings.', 'gcore_translate' ) ) . '</p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: right"><button type="submit" name="save" id="save" class="button button-primary"><span class="save">' . esc_html( __( 'Save', 'gcore_translate' ) ) . '</span><span class="save_go">' . esc_html( __( 'Save and Go', 'gcore_translate' ) ) . '</span></button></td>
            </tr>
        </table>
';
}
if ( 'types' === $get_tab ) {
	$data .= '<div class="clear"></div>
        <p class="description" style="margin:15px 0 0 5px">' . esc_html( __( 'Specify the types of files you want to distribute via CDN.', 'gcore_translate' ) ) . '</p>
        <table class="form-table" style="max-width: 600px;">
            <tr class="form-field form-required">
                <td><input type="checkbox" name="gcore_type_image" id="gcore_type_image" value="1" ' . esc_html( $gcore_type_image_checked ) . '> <label for="gcore_type_image">' . esc_html( __( 'Type Images', 'gcore_translate' ) ) . '</label></td>
                <td><input type="checkbox" name="gcore_type_video" id="gcore_type_video" value="1" ' . esc_html( $gcore_type_video_checked ) . '> <label for="gcore_type_video">' . esc_html( __( 'Type Video', 'gcore_translate' ) ) . '</label></td>
                <td><input type="checkbox" name="gcore_type_audio" id="gcore_type_audio" value="1" ' . esc_html( $gcore_type_audio_checked ) . '> <label for="gcore_type_audio">' . esc_html( __( 'Type Audio', 'gcore_translate' ) ) . '</label></td>
            </tr>
            <tr class="form-field form-required">
                <td><input type="checkbox" name="gcore_type_js" id="gcore_type_js" value="1" ' . esc_html( $gcore_type_js_checked ) . '> <label for="gcore_type_js">' . esc_html( __( 'Type JS', 'gcore_translate' ) ) . '</label></td>
                <td><input type="checkbox" name="gcore_type_css" id="gcore_type_css" value="1" ' . esc_html( $gcore_type_css_checked ) . '> <label for="gcore_type_css">' . esc_html( __( 'Type CSS', 'gcore_translate' ) ) . '</label></td>
                <td><input type="checkbox" name="gcore_type_archive" id="gcore_type_archive" value="1" ' . esc_html( $gcore_type_archive_checked ) . '> <label for="gcore_type_archive">' . esc_html( __( 'Type Archive', 'gcore_translate' ) ) . '</label></td>
            </tr>
        </table>
        <div style="margin: 10px"><input type="checkbox" name="gcore_type_advanced" id="gcore_type_advanced" value="1" ' . esc_html( $gcore_type_advanced_checked ) . '> <label for="gcore_type_advanced">' . esc_html( __( 'Advanced property', 'gcore_translate' ) ) . '</label></div>
        ';
	$data .= '
        <table class="form-table" style="max-width: 600px;">
        ';
	if ( 1 === (int) $gcore_type_advanced ) {
		foreach ( $gcore_cdn_types as $gcore_type ) {
			$admin_url = admin_url();
			$data     .= '<tr class="form-field form-required">
                <td scope="row">' . esc_html( $gcore_type ) . '</td>
                <td><a ' . esc_html( $gcore_cdn_disabled ) . ' href="' . esc_url( $admin_url ) . 'admin.php?page=gcore_labs&tab=types&del=' . esc_html( $gcore_type ) . '" class="button button-danger">' . esc_html( __( 'Delete', 'gcore_translate' ) ) . '</a></td>
            </tr>';
		}
		$data .= '<tr class="form-field form-required">
                <td scope="row"><input ' . esc_html( $gcore_cdn_disabled ) . ' type="text" name="new_type" placeholder="' . esc_html( __( 'Example', 'gcore_translate' ) ) . ': jpg"></td>
            <td><input ' . esc_html( $gcore_cdn_disabled ) . ' type="submit" name="save" class="button button-primary" value="' . esc_html( __( 'Add', 'gcore_translate' ) ) . '"></td>
            </tr>
        </table>
        ';
	}
	$data .= '<p class="submit"><input type="submit" name="save" id="save" class="button button-primary" value="' . esc_html( __( 'Save', 'gcore_translate' ) ) . '"></p>';
}
if ( 'folders' === $get_tab ) {
	$data .= '<div class="clear"></div>
        <p class="description" style="margin:15px 0 0 5px;max-width: 600px;">' . esc_html( __( 'Specify folders containing files you want to distribute via CDN. Leave this field blank to distribute files from all folders via CDN. Please note that only files that match file types specified on the File Types tab will be delivered via CDN.', 'gcore_translate' ) ) . '</p>
        <table class="form-table" style="max-width: 600px;">
            <tr class="form-field form-required">
                <td><input type="checkbox" name="gcore_folder_templates" id="gcore_folder_templates" value="1" ' . esc_html( $gcore_folder_templates_checked ) . '> <label for="gcore_folder_templates">' . esc_html( __( 'Folder Templates', 'gcore_translate' ) ) . '</label></td>
                <td><input type="checkbox" name="gcore_folder_plugins" id="gcore_folder_plugins" value="1" ' . esc_html( $gcore_folder_plugins_checked ) . '> <label for="gcore_folder_plugins">' . esc_html( __( 'Folder Plugins', 'gcore_translate' ) ) . '</label></td>
                <td><input type="checkbox" name="gcore_folder_content" id="gcore_folder_content" value="1" ' . esc_html( $gcore_folder_content_checked ) . '> <label for="gcore_folder_content">' . esc_html( __( 'Folder Content', 'gcore_translate' ) ) . '</label></td>
            </tr>
        </table>
        <div style="margin: 10px"><input type="checkbox" name="gcore_folder_advanced" id="gcore_folder_advanced" value="1" ' . esc_html( $gcore_folder_advanced_checked ) . '> <label for="gcore_folder_advanced">' . esc_html( __( 'Advanced property', 'gcore_translate' ) ) . '</label></div>
        ';
	$data .= '
        <table class="form-table" style="max-width: 600px;">
        ';
	if ( 1 === (int) $gcore_folder_advanced ) {
		foreach ( $gcore_cdn_folders as $folder ) {
			$folder_code = rawurlencode( $folder );
			$data       .= '<tr class="form-field form-required">
                <td scope="row">' . esc_html( $folder ) . '</td>
                <td><a ' . esc_html( $gcore_cdn_disabled ) . ' href="' . esc_url( $admin_url ) . 'admin.php?page=gcore_labs&tab=folders&del=' . esc_html( $folder_code ) . '" class="button button-danger">' . esc_html( __( 'Delete', 'gcore_translate' ) ) . '</a></td>
            </tr>';
		}
		$data .= '<tr class="form-field form-required">
            <td scope="row"><input ' . esc_html( $gcore_cdn_disabled ) . ' type="text" name="new_folder" placeholder="' . esc_html( __( 'Example', 'gcore_translate' ) ) . ': /wp-content/uploads/"></td>
            <td><input ' . esc_html( $gcore_cdn_disabled ) . ' type="submit" name="save" class="button button-primary" value="' . esc_html( __( 'Add', 'gcore_translate' ) ) . '"></td>
        </tr>
        </table>
        ';
	}
	$data .= '<p class="submit"><input type="submit" name="save" id="save" class="button button-primary" value="' . esc_html( __( 'Save', 'gcore_translate' ) ) . '"></p>';
}
if ( 'exceptions' === $get_tab ) {
	$data .= '<div class="clear"></div>
        <p class="description" style="margin:15px 0 0 5px">' . esc_html( __( 'Specify the URLs you want to add to the exceptions list and not distribute them via CDN.', 'gcore_translate' ) ) . '</p>
        <table class="form-table" style="max-width: 600px;">';

	foreach ( $gcore_cdn_exceptions as $exception ) {
		$delete_url     = admin_url();
		$exception_code = rawurlencode( $exception );

		$data .= '<tr class="form-field form-required">
                <td scope="row"><a href="' . esc_html( $exception ) . '" target="_blank">' . esc_html( $exception ) . '</a></td>
                <td><a ' . esc_html( $gcore_cdn_disabled ) . ' href="' . esc_url( $delete_url ) . 'admin.php?page=gcore_labs&tab=exceptions&del=' . esc_html( $exception_code ) . '" class="button button-danger">' . esc_html( __( 'Delete', 'gcore_translate' ) ) . '</a></td>
            </tr>';
	}
	$data .= '<tr class="form-field form-required">
            <td scope="row"><input ' . esc_html( $gcore_cdn_disabled ) . ' type="text" name="new_exception" placeholder="' . esc_html( __( 'Example', 'gcore_translate' ) ) . ': https://example.com/exepstions-page.html"></td>
            <td><input ' . esc_html( $gcore_cdn_disabled ) . ' type="submit" name="save" class="button button-primary" value="' . esc_html( __( 'Add', 'gcore_translate' ) ) . '"></td>
        </tr>
        </table>';
}
$data .= '</form>';
echo esc_html( $data );
