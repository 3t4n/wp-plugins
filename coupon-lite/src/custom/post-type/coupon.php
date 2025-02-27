<?php
/**
 * Coupon Post Type
 *
 * Package  CouponPlugin\Custom\PostType;
 * @since   1.0.0
 * @author  Coupon Plugin
 * @link    https://wpcouponplugin.com
 * @license GNU General Public License 2.0+
 */

namespace CouponPlugin\Custom\PostType;

add_action( 'init', __NAMESPACE__ . '\register_coupon_post_type' );
/**
 * Register Custom Post Type
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_coupon_post_type() {
	$args = array(
		'label'         => __('Coupons', COUPON_PLUGIN_TEXT_DOMAIN),
		'labels'        => label_generator_post_tyepe( 'coupon', __('Coupon', COUPON_PLUGIN_TEXT_DOMAIN), __('Coupons', COUPON_PLUGIN_TEXT_DOMAIN) ),
		'show_ui'       => true,
		'menu_position' => 5,
		'rewrite'       => false,
		'supports'      => array( 'title' ),
		'menu_icon'     => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNTE1LjkxIDcyOC41IiBoZWlnaHQ9IjUxMiIgaWQ9IkxheWVyXzEiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDUxMi4wMDAwMyA1MTIiIHdpZHRoPSI1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6Y2M9Imh0dHA6Ly9jcmVhdGl2ZWNvbW1vbnMub3JnL25zIyIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczppbmtzY2FwZT0iaHR0cDovL3d3dy5pbmtzY2FwZS5vcmcvbmFtZXNwYWNlcy9pbmtzY2FwZSIgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIiB4bWxuczpzb2RpcG9kaT0iaHR0cDovL3NvZGlwb2RpLnNvdXJjZWZvcmdlLm5ldC9EVEQvc29kaXBvZGktMC5kdGQiIHhtbG5zOnN2Zz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxkZWZzIGlkPSJkZWZzNyIvPjxwYXRoIGQ9Im0gMzMuMjc2Mjk5LDIwMi4wMTQxMSBjIC0yMi42MTEwMDEsMTMuMDU0IC0zMC4zNzUwMDI1LDQyLjEyMyAtMTcuMzIxMDAxLDY0LjczMiBsIDYuMjEsMTAuNzU4IGMgLTEzLjU1OTAwMDUsMTYuMzIzIC0xNy45MzMwMDE1LDM4LjM0OSAtMTUuNTQ2MDAwNSw2MC45MTYgMi40ODUsMjMuNTEzIDEyLjQzMjAwMDUsNDguMDY3MDEgMjkuMzQ1MDAyNSw2OC44NDkwMSAyMi45MDkwMDEsMjguMTQ4IDU0LjExOTAwMyw0NC4xODggODMuNjg1MDEsMzkuMDgxIGwgNi4zMSwxMC45MjkgYyAxMy4wNTQsMjIuNjEgNDIuMTEsMzAuNDIxIDY0LjcyMSwxNy4zNjcgTCA0NzUuODc3MzMsMzA5Ljk4ODExIGMgMjIuNjExLC0xMy4wNTUgMzAuMzc1LC00Mi4xMjQgMTcuMzIsLTY0LjczNSBsIC01Ljc2MywtOS45ODMgYyAyMS4zMSwtMjIuOTYgMjMuNjQ0LC01OS4zNjgwMSAxMC4yMzMsLTk0LjU2NTAxIC05LjU0MSwtMjUuMDM5IC0yNS44MzIsLTQ1LjkyOTAwMSAtNDQuOTUyLC01OS44MzkwMDEgLTE5LjExNywtMTMuOTA4IC00MS4zODIwMSwtMjEuMTYyIC02My4xMzgwMSwtMTYuNDgyIC0wLjIzOCwwLjA1IC0wLjQ2OSwwLjExIC0wLjcwMiwwLjE3NyBsIC01LjY4MSwtOS44NCBjIC0xMy4wNTUsLTIyLjYxMSAtNDIuMTExLC0zMC40MjEgLTY0LjcyMiwtMTcuMzY3IEwgMzMuMjc1Mjk5LDIwMi4wMTMxMSB6IE0gMTU0LjgzNDMxLDE4OS43MDExIGMgOS43ODUsLTUuNjUgMjEuNTc1LC0zLjgzMiAzMS41ODksMS42NSAxMC4wMTMsNS40ODEgMTkuMTM4LDE0LjczMTAxIDI2LjAyOCwyNi42NjQwMSA2Ljg4OCwxMS45MzMgMTAuMzU0LDI0LjQ5IDEwLjA5NCwzNS45MDEgLTAuMjYsMTEuNDEgLTQuNTc5LDIyLjUzMyAtMTQuMzY0LDI4LjE4MyAtOS43ODgsNS42NSAtMjEuNTgsMy44MjkgLTMxLjU5MSwtMS42NSAtMTAuMDEzLC01LjQ4MSAtMTkuMTgzLC0xNC43NDUgLTI2LjA3MSwtMjYuNjc2IC02Ljg5MSwtMTEuOTM0IC0xMC4zMTEsLTI0LjQ3OCAtMTAuMDUyLC0zNS44OSAwLjI1OSwtMTEuNDEyIDQuNTgsLTIyLjUzMjAxIDE0LjM2NywtMjguMTgyMDEgeiBtIDguNDc5LDE0LjY4NzAxIGMgLTMuMjU5LDEuODgxIC01LjcwMiw2LjI4OSAtNS44NzUsMTMuODcyIC0wLjE3Miw3LjU4NCAyLjI3LDE3LjUxMyA3Ljc2NywyNy4wMzMgNS40OTYsOS41MTkgMTIuODksMTYuNjI5IDE5LjU0NCwyMC4yNzEgNi42NTIsMy42MzkgMTEuNjkxLDMuNzI5IDE0Ljk1MiwxLjg0NyAzLjI1OCwtMS44ODIgNS43MjksLTYuMzA3IDUuOTAzLC0xMy44ODggMC4xNzMsLTcuNTgzIC0yLjM0NSwtMTcuNTA5IC03Ljg0MSwtMjcuMDI4IC01LjQ5NywtOS41MiAtMTIuODE2LC0xNi42MzQgLTE5LjQ3LC0yMC4yNzUgLTYuNjUzLC0zLjY0MyAtMTEuNzIxLC0zLjcxNCAtMTQuOTgsLTEuODMyIHogTSAyODAuMjM2MzIsMTQzLjMwNzEgYSA4LjQ4MDU1LDguNDgwNTUgMCAwIDEgMTIuNjI0LDkuNTQyIGwgLTU1Ljc4MjAxLDIwOC4xODYwMSBhIDguNDgwNTUsOC40ODA1NSAwIDEgMSAtMTYuMzgxLC00LjM4OSBMIDI3Ni40ODAzMiwxNDguNDYwMSBhIDguNDgwNTUsOC40ODA1NSAwIDAgMSAzLjc1NiwtNS4xNTMgeiBtIDIzLjU2NSw4NS4wMDAwMSBjIDkuNzg1LC01LjY0OSAyMS41NiwtMy44NTcgMzEuNTcyLDEuNjIyIDEwLjAxMiw1LjQ4IDE5LjE1NSwxNC43NiAyNi4wNDMsMjYuNjkyIDYuODksMTEuOTM0IDEwLjM0LDI0LjQ2MiAxMC4wNzksMzUuODczIC0wLjI1OSwxMS40MTMgLTQuNTgsMjIuNTMzIC0xNC4zNjUsMjguMTgxIC05Ljc4Niw1LjY1MSAtMjEuNTc3LDMuODMzIC0zMS41OTEsLTEuNjQ4IC0xMC4wMSwtNS40ODEgLTE5LjE2NSwtMTQuNzE2IC0yNi4wNTYsLTI2LjY0OSAtNi44ODgsLTExLjkzMiAtMTAuMzI1LC0yNC41MDYgLTEwLjA2NiwtMzUuOTE3IDAuMjYxLC0xMS40MSA0LjU5OCwtMjIuNTAzIDE0LjM4NCwtMjguMTU0IHogbSA4LjQ2MywxNC42NTkgYyAtMy4yNiwxLjg4MSAtNS43MDMsNi4yODkgLTUuODc2LDEzLjg3MiAtMC4xNzIsNy41ODIgMi4yODgsMTcuNTQyIDcuNzgzLDI3LjA2IDUuNDk4LDkuNTIgMTIuODc1LDE2LjYwMSAxOS41MjcsMjAuMjQzIDYuNjU1LDMuNjQyIDExLjY5NCwzLjczIDE0Ljk1MywxLjg0OCAzLjI1OSwtMS44ODIgNS43MzIsLTYuMzA2IDUuOTAzLC0xMy44OSAwLjE3MiwtNy41ODEgLTIuMjk5LC0xNy40OTQgLTcuNzk2LC0yNy4wMTUgLTUuNDk1LC05LjUxOSAtMTIuODYzLC0xNi42NDcgLTE5LjUxNCwtMjAuMjg3IC02LjY1NCwtMy42NDIgLTExLjcyMiwtMy43MTMgLTE0Ljk4LC0xLjgzMSB6IiBpZD0icmVjdDEwMjYzLTMtNy00IiBzdHlsZT0iZm9udC1zaXplOm1lZGl1bTtmb250LXN0eWxlOm5vcm1hbDtmb250LXZhcmlhbnQ6bm9ybWFsO2ZvbnQtd2VpZ2h0Om5vcm1hbDtmb250LXN0cmV0Y2g6bm9ybWFsO3RleHQtaW5kZW50OjA7dGV4dC1hbGlnbjpzdGFydDt0ZXh0LWRlY29yYXRpb246bm9uZTtsaW5lLWhlaWdodDpub3JtYWw7bGV0dGVyLXNwYWNpbmc6bm9ybWFsO3dvcmQtc3BhY2luZzpub3JtYWw7dGV4dC10cmFuc2Zvcm06bm9uZTtkaXJlY3Rpb246bHRyO2Jsb2NrLXByb2dyZXNzaW9uOnRiO3dyaXRpbmctbW9kZTpsci10Yjt0ZXh0LWFuY2hvcjpzdGFydDtiYXNlbGluZS1zaGlmdDpiYXNlbGluZTtjb2xvcjojMDAwMDAwO2ZpbGw6IzAwYTFmMTtmaWxsLW9wYWNpdHk6MTtzdHJva2U6bm9uZTtzdHJva2Utd2lkdGg6MTY7bWFya2VyOm5vbmU7dmlzaWJpbGl0eTp2aXNpYmxlO2Rpc3BsYXk6aW5saW5lO292ZXJmbG93OnZpc2libGU7ZW5hYmxlLWJhY2tncm91bmQ6YWNjdW11bGF0ZTtmb250LWZhbWlseTpTYW5zOy1pbmtzY2FwZS1mb250LXNwZWNpZmljYXRpb246U2FucyIvPjwvc3ZnPg==',

	);
	register_post_type( 'coupon', $args );
}

/**
 * Custom Post Type Label Generator
 *
 * @since 1.0.0
 *
 * @param  string $post_type post type name
 * @param  string $singular_name display singular name of post type
 * @param  string $plural_name display plural name of post type
 *
 * @return array $labels
 */
function label_generator_post_tyepe( $post_type, $singular_name, $plural_name ) {
	$labels = array(
		'name'               => _x( "{$plural_name}", 'post type general name', COUPON_PLUGIN_TEXT_DOMAIN ),
		'singular_name'      => _x( "{$singular_name}", 'post type singular name', COUPON_PLUGIN_TEXT_DOMAIN ),
		'menu_name'          => _x( "{$plural_name}", 'admin menu', COUPON_PLUGIN_TEXT_DOMAIN ),
		'name_admin_bar'     => _x( "{$singular_name}", 'add new on admin bar', COUPON_PLUGIN_TEXT_DOMAIN ),
		'add_new'            => _x( 'Add New', $post_type, COUPON_PLUGIN_TEXT_DOMAIN ),
		'add_new_item'       => __( "Add New {$singular_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'new_item'           => __( "New {$singular_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'edit_item'          => __( "Edit {$singular_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'view_item'          => __( "View {$singular_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'all_items'          => __( "All {$plural_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'search_items'       => __( "Search {$plural_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'parent_item_colon'  => __( "Parent {$plural_name}:", COUPON_PLUGIN_TEXT_DOMAIN ),
		'not_found'          => __( "No {$plural_name} found", COUPON_PLUGIN_TEXT_DOMAIN ),
		'not_found_in_trash' => __( "No {$plural_name} found in Trash", COUPON_PLUGIN_TEXT_DOMAIN )
	);

	return $labels;

}
