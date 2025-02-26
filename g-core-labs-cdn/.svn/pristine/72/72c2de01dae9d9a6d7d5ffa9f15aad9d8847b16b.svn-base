<?php
/**
 * Admin
 *
 * @package GCORE
 */

$tabs_list = array(
	'main'       => array( 'name' => esc_html( __( 'General', 'gcore_translate' ) ) ),
	'types'      => array( 'name' => esc_html( __( 'File types', 'gcore_translate' ) ) ),
	'folders'    => array( 'name' => esc_html( __( 'Folders', 'gcore_translate' ) ) ),
	'exceptions' => array( 'name' => esc_html( __( 'Exceptions', 'gcore_translate' ) ) ),
);

$del = isset( $_GET['del'] ) ? sanitize_text_field( wp_unslash( $_GET['del'] ) ) : null;

if ( isset( $_GET['tab'] ) && in_array( $_GET['tab'], array( 'types', 'folders', 'exceptions' ), true ) ) {
	$get_tab = sanitize_text_field( wp_unslash( $_GET['tab'] ) );
} else {
	$get_tab = 'main';
}
if ( null !== $del ) {
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
		$new_folder        = sanitize_text_field( trim( $del ) );
		if ( '' !== $new_folder ) {
			$new_folder = trailingslashit( untrailingslashit( $new_folder ) );
			$first      = substr( $new_folder, 0, 1 );
			if ( '/' !== $first ) {
				$new_folder = '/' . $new_folder;
			}
			if ( '' !== $gcore_cdn_folders ) {
				$gcore_cdn_folders = json_decode( $gcore_cdn_folders, true );

				$k = array_search( $new_folder, $gcore_cdn_folders, true );
				if ( false !== $k ) {
					unset( $gcore_cdn_folders[ $k ] );
					$gcore_cdn_folders = wp_json_encode( $gcore_cdn_folders );
					update_option( 'gcore_cdn_folders', $gcore_cdn_folders );
				}
			}
		}
	}
	if ( 'exceptions' !== $get_tab ) {
		$gcore_cdn_exceptions = get_option( 'gcore_cdn_exceptions' );
		$new_exception        = esc_url( trim( $del ) );
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
$gcore_cdn_disabled = 1 === (int) $gcore_enable_cdn ? '' : ' disabled';

if ( 'main' === $get_tab ) {
	$gcore_cdn_url            = get_option( 'gcore_cdn_url' );
	$gcore_enable_cdn_checked = 1 === (int) $gcore_enable_cdn ? ' checked="checked"' : '';
}
if ( 'types' === $get_tab ) {

	$gcore_type_advanced         = get_option( 'gcore_type_advanced' );
	$gcore_type_advanced_checked = 1 === (int) $gcore_type_advanced ? ' checked="checked"' : '';

	if ( 0 === (int) $gcore_type_advanced ) {
		$gcore_type_image           = get_option( 'gcore_type_image' );
		$gcore_type_image_checked   = 1 === (int) $gcore_type_image ? ' checked="checked"' : '';
		$gcore_type_video           = get_option( 'gcore_type_video' );
		$gcore_type_video_checked   = 1 === (int) $gcore_type_video ? ' checked="checked"' : '';
		$gcore_type_audio           = get_option( 'gcore_type_audio' );
		$gcore_type_audio_checked   = 1 === (int) $gcore_type_audio ? ' checked="checked"' : '';
		$gcore_type_js              = get_option( 'gcore_type_js' );
		$gcore_type_js_checked      = 1 === (int) $gcore_type_js ? ' checked="checked"' : '';
		$gcore_type_css             = get_option( 'gcore_type_css' );
		$gcore_type_css_checked     = 1 === (int) $gcore_type_css ? ' checked="checked"' : '';
		$gcore_type_archive         = get_option( 'gcore_type_archive' );
		$gcore_type_archive_checked = 1 === (int) $gcore_type_archive ? ' checked="checked"' : '';
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
	$gcore_folder_advanced_checked = 1 === (int) $gcore_folder_advanced ? ' checked="checked"' : '';

	if ( 0 === (int) $gcore_folder_advanced ) {
		$gcore_folder_templates         = get_option( 'gcore_folder_templates' );
		$gcore_folder_templates_checked = 1 === (int) $gcore_folder_templates ? ' checked="checked"' : '';
		$gcore_folder_plugins           = get_option( 'gcore_folder_plugins' );
		$gcore_folder_plugins_checked   = 1 === (int) $gcore_folder_plugins ? ' checked="checked"' : '';
		$gcore_folder_content           = get_option( 'gcore_folder_content' );
		$gcore_folder_content_checked   = 1 === (int) $gcore_folder_content ? ' checked="checked"' : '';
		$gcore_folder_wp                = get_option( 'gcore_folder_wp' );
		$gcore_folder_wp_checked        = 1 === (int) $gcore_folder_wp ? ' checked="checked"' : '';
	} else {
		$gcore_folder_templates_checked = ' disabled';
		$gcore_folder_plugins_checked   = ' disabled';
		$gcore_folder_content_checked   = ' disabled';
		$gcore_folder_wp_checked        = ' disabled';
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


$title_page = $tabs_list[ $get_tab ]['name'];

$admin_url = admin_url();
$data      = '';
$data     .= '
<h1>' . esc_html( __( 'CDN settings', 'gcore_translate' ) ) . ' - ' . esc_html( $title_page ) . '</h1>
<div>
    <h3>
';

foreach ( $tabs_list as $key => $value ) {
	$c = $key === $get_tab ? ' nav-tab-active' : '';
	if ( 0 === (int) $gcore_enable_cdn ) {
		$li_style = 'style="opacity:0.3"';
		$href     = '#';
	} else {
		$li_style = '';
		$href     = esc_url( $admin_url ) . 'admin.php?page=gcore_labs&tab=' . esc_html( $key );
	}
	$data .= '<a ' . $li_style . ' class="g-d nav-tab' . $c . '" href="' . $href . '" data-href="' . esc_url( $admin_url ) . 'admin.php?page=gcore_labs&tab=' . esc_html( $key ) . '">' . esc_html( $value['name'] ) . '</a>';
}
$data .= '</h3>
</div>
<input type="hidden" id="gcore-wpnonce" name="_wpnonce" value="' . wp_create_nonce() . '">
';

if ( 'main' === $get_tab ) {
	$data .= '<table class="form-table" style="max-width: 600px;">
            <tr class="form-field form-required">
                <td colspan="2">
                    <label class="el-checkbox el-checkbox-sm">
                            <input id="gcore_enable_cdn" type="checkbox" class="g-c" data-t="checkbox" data-o="gcore_enable_cdn" value="1" ' . esc_html( $gcore_enable_cdn_checked ) . '>
				        <span class="el-checkbox-style  pull-right"></span>
				        <span class="margin-r">' . esc_html( __( 'Enable CDN', 'gcore_translate' ) ) . '</span>
			        </label>
                    <p class="description" id="tagline-description">' . esc_html( __( 'In the paths to files conforming to the rules specified below, a domain will be replaced with a personal domain.', 'gcore_translate' ) ) . '</p>
                </td>
            </tr>           
            <tr class="form-field form-required">
                <td scope="row"><label for="user_login">' . esc_html( __( 'Personal domain (for configuring CNAME)', 'gcore_translate' ) ) . '</label></td>
                <td>
                    <input type="text" class="g-d g-c" id="gcore_cdn_url" data-t="url" data-o="gcore_cdn_url" ' . esc_html( $gcore_cdn_disabled ) . ' value="' . esc_url( $gcore_cdn_url ) . '" placeholder="' . esc_html( __( 'Example', 'gcore_translate' ) ) . ': https://cdn.example.com/">
                    <p class="description" id="tagline-description">' . esc_html( __( 'Specify the personal domain with a scheme corresponding to the one specified in Gcore control panel. If you are using a domain in your zone, make sure that this domain is added in the DNS provider settings.', 'gcore_translate' ) ) . '</p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: right"><a href="' . esc_url( $admin_url ) . 'admin.php?page=gcore_labs&tab=types" class="button-gcore">' . esc_html( __( 'Next', 'gcore_translate' ) ) . '</a></td>
            </tr>
        </table>
';
}
if ( 'types' === $get_tab ) {
	$data .= '<div class="clear"></div>
        <p class="description" style="margin:15px 0 0 5px">' . esc_html( __( 'Specify the types of files you want to distribute via CDN.', 'gcore_translate' ) ) . '</p>
        <table class="form-table" style="max-width: 600px;">
            <tr class="form-field form-required">
                <td>
                    <label class="el-checkbox el-checkbox-sm">
				        <input id="gcore_type_image" type="checkbox" class="g-c list-ch" data-t="checkbox" data-o="gcore_type_image" value="1" ' . esc_html( $gcore_type_image_checked ) . '>
				        <span class="el-checkbox-style  pull-right"></span>
				        <span class="margin-r">' . esc_html( __( 'Type Images', 'gcore_translate' ) ) . '</span>
			        </label>   
			    </td>             
                <td>
                    <label class="el-checkbox el-checkbox-sm">
				        <input id="gcore_type_video" type="checkbox" class="g-c list-ch" data-t="checkbox" data-o="gcore_type_video" value="1" ' . esc_html( $gcore_type_video_checked ) . '>
				        <span class="el-checkbox-style  pull-right"></span>
				        <span class="margin-r">' . esc_html( __( 'Type Video', 'gcore_translate' ) ) . '</span>
			        </label>                
                </td>
                <td>
                    <label class="el-checkbox el-checkbox-sm">
				        <input id="gcore_type_audio" type="checkbox" class="g-c list-ch" data-t="checkbox" data-o="gcore_type_audio" value="1" ' . esc_html( $gcore_type_audio_checked ) . '>
				        <span class="el-checkbox-style  pull-right"></span>
				        <span class="margin-r">' . esc_html( __( 'Type Audio', 'gcore_translate' ) ) . '</span>
			        </label>
                </td>
            </tr>
            <tr class="form-field form-required">
                <td>
                    <label class="el-checkbox el-checkbox-sm">
				        <input id="gcore_type_js" type="checkbox" class="g-c list-ch" data-t="checkbox" data-o="gcore_type_js" type="checkbox" value="1" ' . esc_html( $gcore_type_js_checked ) . '>
				        <span class="el-checkbox-style  pull-right"></span>
				        <span class="margin-r">' . esc_html( __( 'Type JS', 'gcore_translate' ) ) . '</span>
			        </label>
                </td>
                <td>
                    <label class="el-checkbox el-checkbox-sm">
				        <input id="gcore_type_css" type="checkbox" class="g-c list-ch" data-t="checkbox" data-o="gcore_type_css" type="checkbox" value="1" ' . esc_html( $gcore_type_css_checked ) . '>
				        <span class="el-checkbox-style  pull-right"></span>
				        <span class="margin-r">' . esc_html( __( 'Type CSS', 'gcore_translate' ) ) . '</span>
			        </label>
                </td>
                <td>
                    <label class="el-checkbox el-checkbox-sm">
				        <input id="gcore_type_archive" type="checkbox" class="g-c list-ch" data-t="checkbox" data-o="gcore_type_archive" type="checkbox" value="1" ' . esc_html( $gcore_type_archive_checked ) . '>
				        <span class="el-checkbox-style  pull-right"></span>
				        <span class="margin-r">' . esc_html( __( 'Type Archive', 'gcore_translate' ) ) . '</span>
			        </label>
                </td>
            </tr>
            <tr>
                <td colspan="3">
		            <label class="el-switch">
			            <input id="gcore_type_advanced" type="checkbox" class="g-c" data-t="checkbox" data-o="gcore_type_advanced" type="checkbox" value="1" ' . esc_html( $gcore_type_advanced_checked ) . '>
			            <span class="el-switch-style"></span>
		            </label>
		            <span class="margin-r">' . esc_html( __( 'Advanced property', 'gcore_translate' ) ) . '</span>                
                </td>
            </tr>
        ';
	if ( 0 === (int) $gcore_type_advanced ) {
		$disabled = 'display:none;';
	} else {
		$disabled = '';
	}
	$data .= '
        <table class="form-table list-advanced advanced-show" data-t="types" style="max-width: 600px;' . esc_html( $disabled ) . '"></table>
        <table class="form-table" style="max-width: 600px;">
            <tr>
                <td style="text-align: left"><a href="' . esc_url( $admin_url ) . 'admin.php?page=gcore_labs&tab=main" class="button-gcore">' . esc_html( __( 'Previous', 'gcore_translate' ) ) . '</a></td>
                <td style="text-align: right"><a href="' . esc_url( $admin_url ) . 'admin.php?page=gcore_labs&tab=folders" class="button-gcore">' . esc_html( __( 'Next', 'gcore_translate' ) ) . '</a></td>
            </tr>            
        </table>    
    ';
}
if ( 'folders' === $get_tab ) {
	$data .= '<div class="clear"></div>
        <p class="description" style="margin:15px 0 0 5px;max-width: 600px;">' . esc_html( __( 'Specify folders containing files you want to distribute via CDN. Please note that only files that match file types specified on the File Types tab will be delivered via CDN.', 'gcore_translate' ) ) . '</p>
        <table class="form-table" style="max-width: 600px;">
            <tr class="form-field form-required">
                <td>
                    <label class="el-checkbox el-checkbox-sm">
				        <input id="gcore_folder_templates" type="checkbox" class="g-c list-ch" data-t="checkbox" data-o="gcore_folder_templates" type="checkbox"  value="1" ' . esc_html( $gcore_folder_templates_checked ) . '>
				        <span class="el-checkbox-style  pull-right"></span>
				        <span class="margin-r">' . esc_html( __( 'Folder Templates', 'gcore_translate' ) ) . '</span>
			        </label>  
                </td>
                <td>
                    <label class="el-checkbox el-checkbox-sm">
				        <input id="gcore_folder_plugins" type="checkbox" class="g-c list-ch" data-t="checkbox" data-o="gcore_folder_plugins" type="checkbox" value="1" ' . esc_html( $gcore_folder_plugins_checked ) . '>
				        <span class="el-checkbox-style  pull-right"></span>
				        <span class="margin-r">' . esc_html( __( 'Folder Plugins', 'gcore_translate' ) ) . '</span>
			        </label>
                </td>
                <td>
                    <label class="el-checkbox el-checkbox-sm">
				        <input id="gcore_folder_content" type="checkbox" class="g-c list-ch" data-t="checkbox" data-o="gcore_folder_content" type="checkbox" value="1" ' . $gcore_folder_content_checked . '>
				        <span class="el-checkbox-style  pull-right"></span>
				        <span class="margin-r">' . esc_html( __( 'Folder Content', 'gcore_translate' ) ) . '</span>
			        </label>
                </td>
                <td>
                    <label class="el-checkbox el-checkbox-sm">
				        <input id="gcore_folder_wp" type="checkbox" class="g-c list-ch" data-t="checkbox" data-o="gcore_folder_wp" type="checkbox" value="1" ' . esc_html( $gcore_folder_wp_checked ) . '>
				        <span class="el-checkbox-style  pull-right"></span>
				        <span class="margin-r">' . esc_html( __( 'Folder WordPress', 'gcore_translate' ) ) . '</span>
			        </label>
                </td>
            </tr>
            <tr>
                <td colspan="4">
		            <label class="el-switch">
			            <input id="gcore_folder_advanced" type="checkbox" class="g-c" data-t="checkbox" data-o="gcore_folder_advanced" type="checkbox" value="1" ' . esc_html( $gcore_folder_advanced_checked ) . '>
			            <span class="el-switch-style"></span>
		            </label>
		            <span class="margin-r">' . esc_html( __( 'Advanced property', 'gcore_translate' ) ) . '</span>                
                </td>
            </tr>
        </table>
        ';
	if ( 0 === (int) $gcore_folder_advanced ) {
		$disabled = 'display:none;';
	} else {
		$disabled = '';
	}
	$data .= '<table class="form-table list-advanced advanced-show" data-t="folders" style="max-width: 600px;' . esc_html( $disabled ) . '"></table>
        <table class="form-table" style="max-width: 600px;">
            <tr>
                <td style="text-align: left"><a href="' . esc_url( $admin_url ) . 'admin.php?page=gcore_labs&tab=types" class="button-gcore">' . esc_html( __( 'Previous', 'gcore_translate' ) ) . '</a></td>
                <td style="text-align: right"><a href="' . esc_url( $admin_url ) . 'admin.php?page=gcore_labs&tab=exceptions" class="button-gcore">' . esc_html( __( 'Next', 'gcore_translate' ) ) . '</a></td>
            </tr>            
        </table>    
    ';
}
if ( 'exceptions' === $get_tab ) {
	$data .= '<div class="clear"></div>
        <p class="description" style="margin:15px 0 0 5px">' . esc_html( __( 'Specify the URLs you want to add to the exceptions list and not distribute them via CDN.', 'gcore_translate' ) ) . '</p>
        <table class="form-table list-advanced advanced-show" data-t="exceptions" style="max-width: 600px;' . esc_html( $disabled ) . '"></table>
        <table class="form-table" style="max-width: 600px;">
            <tr>
                <td style="text-align: left"><a href="' . esc_url( $admin_url ) . 'admin.php?page=gcore_labs&tab=folders" class="button-gcore">' . esc_html( __( 'Previous', 'gcore_translate' ) ) . '</a></td>
                <td></td>
            </tr>            
        </table>    
    ';
}

$allowed_tags           = wp_kses_allowed_html( 'post' );
$allowed_tags['input']  = array(
	'type'        => true,
	'name'        => true,
	'value'       => true,
	'disabled'    => true,
	'checked'     => true,
	'readonly'    => true,
	'data-e'      => true,
	'data-t'      => true,
	'data-o'      => true,
	'data-type'   => true,
	'placeholder' => true,
	'id'          => true,
	'class'       => true,
	'required'    => true,
);
$allowed_tags['select'] = array(
	'name'     => true,
	'value'    => true,
	'id'       => true,
	'class'    => true,
	'required' => true,
);
$allowed_tags['button'] = array(
	'value'     => true,
	'disabled'  => true,
	'type'      => true,
	'name'      => true,
	'data-e'    => true,
	'data-t'    => true,
	'data-o'    => true,
	'id'        => true,
	'class'     => true,
	'data-type' => true,
);
$allowed_tags['option'] = array(
	'value' => true,
);
add_filter(
	'safe_style_css',
	function( $styles ) {
		$styles[] = 'display';
		return $styles;
	}
);
echo wp_kses( $data, $allowed_tags )
. '<script>const gcoreAmaranMsgSaved = "' . esc_html( __( 'Saved', 'gcore_translate' ) ) . '";const gcoreAmaranMsgDeleted = "' . esc_html( __( 'Deleted', 'gcore_translate' ) ) . '";const gcoreAmaranMsgAdded = "' . esc_html( __( 'Added', 'gcore_translate' ) ) . '";</script>';
