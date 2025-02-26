<?php
defined('ABSPATH') || exit();
function socialmark_admin_menu_page_html()
{
    global $wpdb;
    $socialmark_ov_error = "";
    $socialmark_ov_msg_type = "";
    if (!current_user_can('manage_options')) {
        return;
    }

    $default_tab = null;
    $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;

    $socialmark_images = $wpdb->get_results("SELECT id, name, image_link FROM {$wpdb->prefix}sm_images order by id desc", ARRAY_A);
    ?>
    <div class="wrap socialmarkAdmin">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <nav class="nav-tab-wrapper">
            <a href="?page=socialmark"
               class="nav-tab <?php if ($tab === null): ?>nav-tab-active<?php endif; ?>"><?php _e('Settings'); ?></a>
            <a href="?page=socialmark&tab=overlay-images"
               class="nav-tab <?php if ($tab === 'overlay-images'): ?>nav-tab-active<?php endif; ?>"><?php _e('Overlay Images'); ?></a>
            <a href="?page=socialmark&tab=not-working"
               class="nav-tab <?php if ($tab === 'not-working'): ?>nav-tab-active<?php endif; ?>"><?php _e('Not Working?'); ?></a>
            <a href="?page=socialmark&tab=premium-features" style="background: #46b450; color: white"
               class="nav-tab <?php if ($tab === 'premium-features'): ?>nav-tab-active<?php endif; ?>"><?php _e('Premium Features'); ?></a>
        </nav>
        <div class="tab-content">
            <?php switch ($tab) :
                case 'overlay-images':
                    include_once SOCIALMARK_INCLUDES . '/admin/overlay-tab.php';
                    break;
                case 'not-working':
                    include_once SOCIALMARK_INCLUDES . '/admin/not-working.php';
                    break;
                case 'premium-features':
                    include_once SOCIALMARK_INCLUDES . '/admin/premium-features.php';
                    break;
                default:
                    include_once SOCIALMARK_INCLUDES . '/admin/admin-settings.php';
                    break;
            endswitch; ?>
        </div>
    </div>
    <?php
}

add_action('admin_menu', 'socialmark_admin_menu_page');
function socialmark_admin_menu_page()
{
    add_menu_page('SocialMark Settings', 'SocialMark', 'manage_options', 'socialmark', 'socialmark_admin_menu_page_html', 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB2aWV3Qm94PSIwIDAgNTAwIDUwMCIgd2lkdGg9IjUwMCIgaGVpZ2h0PSI1MDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPGcgdHJhbnNmb3JtPSJtYXRyaXgoMC4wOTg4OSwgMCwgMCwgLTAuMDk4NTAxLCAtNi4xMDU1OSwgNDk1LjIyMTQwNSkiIGZpbGw9IiMwMDAwMDAiIHN0cm9rZT0ibm9uZSIgc3R5bGU9IiI+CiAgICA8cGF0aCBkPSJNMjQyNSA0OTk0IGMtNDc1IC0zNyAtNzc5IC0xMDggLTEwODAgLTI1MyAtNDkwIC0yMzUgLTc5MyAtNTk3IC05MDYgLTEwODEgLTMwIC0xMjUgLTM3IC00MDcgLTE1IC01NTggNDIgLTI4NCAxNDIgLTQ5NCAzMjYgLTY4NiAyODQgLTI5NiA2ODEgLTQ3MSAxNDA4IC02MjIgNzMgLTE1IDEzMSAtMzAgMTMwIC0zMyAtMiAtNCAtNTIgLTcwIC0xMTIgLTE0OSBsLTEwOSAtMTQyIC0zNiA2IGMtMzcxIDY2IC03NDIgMjAyIC0xMDM1IDM4MSAtNDkgMzAgLTkyIDUwIC05NyA0NiAtMTYgLTE2IC01OTggLTEzNDYgLTU5MyAtMTM1NSAzIC00IDU4IC00MCAxMjMgLTc4IDM4OCAtMjI5IDk0MSAtMzg4IDE1NzEgLTQ1MiAxOTQgLTE5IDY5MyAtMTYgODcwIDYgNTUwIDY3IDk2MyAyMzEgMTI4OSA1MTAgMjUyIDIxNiA0MTkgNDk2IDQ5MyA4MjcgMjAgOTAgMjMgMTMxIDIzIDI5OSAtMSAyMTEgLTEzIDMwNCAtNjEgNDU1IC0xMDQgMzI2IC0zNDAgNTgzIC03MDIgNzY1IC02NSAzMyAtMTAwIDU2IC05NSA2MyAxMSAxOSAxMjcgMTUwIDI5MCAzMjcgMTUyIDE2NiA0NDUgNDU5IDYwNSA2MDYgbDg2IDc5IC0yMiAzMSAtMjEgMzIgLTg1IC01MCBjLTEyNSAtNzMgLTI2MCAtMTYxIC0zOTMgLTI1NiAtNjUgLTQ2IC0xMjAgLTgyIC0xMjEgLTgwIC0yIDEgODAgMjAzIDE4MiA0NDcgbDE4NSA0NDQgLTI0IDE4IGMtNTEgNDAgLTM1MSAxODEgLTQ5NCAyMzMgLTI2MCA5NCAtNTc0IDE2NCAtODk1IDIwMSAtMTI5IDE1IC01ODAgMjcgLTY4NSAxOXogbTE4NTUgLTE0MzEgYy00NzEgLTQ3OCAtODE5IC04OTUgLTExODcgLTE0MjMgLTk3IC0xMzkgLTMyMyAtNDg2IC0zMjMgLTQ5NSAwIC0zIC0zMCAtNTMgLTY2IC0xMTIgLTE2MSAtMjYxIC0zMDcgLTUyMSAtNDcxIC04NDAgbC0xMDkgLTIxMiAtNDUxIDUyMiBjLTI0NyAyODcgLTQ3OSA1NTUgLTUxNCA1OTYgLTU0IDYzIC01OCA3MSAtMzIgNTggMTYgLTkgMjEwIC0xMTggNDI5IC0yNDIgMjE5IC0xMjQgNDAxIC0yMjUgNDA0IC0yMjUgNCAwIDYxIDc1IDEyNyAxNjggMzY4IDUwOSA4MDkgMTAyMSAxMjc1IDE0NzcgMjU3IDI1MiAzNDcgMzMzIDU3OCA1MjAgMjQ0IDE5OCA0ODAgMzc1IDQ5OSAzNzUgMyAwIC02OSAtNzUgLTE1OSAtMTY3eiBtLTEzMTAgLTI3IGMxMzAgLTIzIDI4MiAtNjEgNDAzIC0xMDEgMTMxIC00NCAzNTggLTEzOCAzNTQgLTE0NyAtNSAtMTcgLTI1MSAtMjI4IC0yNjUgLTIyOCAtOCAwIC00NSA5IC04MSAyMCAtODQgMjUgLTM4MSA5MiAtNTMxIDEyMCAtMzIzIDYxIC01NzcgMTMyIC02MzAgMTc3IC04MCA2NyA4IDE0MyAyMDAgMTczIDg3IDE0IDQ0MiA0IDU1MCAtMTR6IiBzdHlsZT0iZmlsbDogcmdiKDIzNiwgMjM2LCAyMzYpOyIvPgogIDwvZz4KPC9zdmc+', 90);
}

add_action('wp_ajax_socialmark_delete_overlay', 'socialmark_delete_overlay');

function socialmark_delete_overlay()
{
    if (isset($_POST['socialmark_overlay_nonce'])
        && wp_verify_nonce($_POST['socialmark_overlay_nonce'], 'socialmark_overlay_nonce') && isset($_POST['id'])
    ) {
        global $wpdb;
        $overlay_delete_ok = $wpdb->delete(
            $wpdb->prefix . 'sm_images', array('id' => sanitize_text_field($_POST['id']))
        );
        if ($overlay_delete_ok) {
            echo "success";
        } else {
            echo "failed";
        }
        wp_die();
    }
}

add_action('before_delete_post', 'socialmark_on_post_delete');
function socialmark_on_post_delete($post){
    if (get_post_meta($post, 'socialmark_og_image_url', true) && get_post_meta($post, 'socialmark_og_image_url', true) !== "") {

        $socialmark_og_image_url = SOCIALMARK_UPLOAD . '/' . esc_attr(get_post_meta($post, 'socialmark_og_image_url', true));
        if (file_exists($socialmark_og_image_url)) {
            wp_delete_file($socialmark_og_image_url);
        }
    }
delete_post_meta($post, 'socialmark_og_image_url');
}

add_filter('plugin_action_links_socialmark/socialmark.php', 'socialmark_settings_page');

function socialmark_settings_page($links)
{
    $links[] = '<a href="' .
        admin_url( 'admin.php?page=socialmark' ) .
        '">' . __('Settings') . '</a>';
    return $links;
}

add_filter( 'plugin_row_meta', 'socialmark_plugin_row_meta', 10, 2 );

function socialmark_plugin_row_meta( $links, $file ) {

    if ( strpos( $file, 'socialmark.php' ) !== false ) {
        $new_links = array(
            '<a href="https://shawonpro.com/socialmark-docs/" target="_new">Docs</a>'
        );

        $links = array_merge( $links, $new_links );
    }

    return $links;
}


add_action('wp_ajax_socialmark_post_test', 'socialmark_post_test');

function socialmark_post_test()
{
    if (isset($_POST['url'])
    ) {
        $socialmark_test_url=sanitize_text_field($_POST['url']);
        function socialmark_contents_curl($socialmark_test_url)
        {
            $socialmark_ch = curl_init();

            curl_setopt($socialmark_ch, CURLOPT_HEADER, 0);
            curl_setopt($socialmark_ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($socialmark_ch, CURLOPT_URL, $socialmark_test_url);
            curl_setopt($socialmark_ch, CURLOPT_FOLLOWLOCATION, 1);

            $socialmark_test_data = curl_exec($socialmark_ch);
            curl_close($socialmark_ch);

            return $socialmark_test_data;
        }

        $socialmark_html = socialmark_contents_curl($socialmark_test_url);

        //parsing begins here:
        $socialmark_doc = new DOMDocument();
        @$socialmark_doc->loadHTML($socialmark_html);

        $socialmark_metas = $socialmark_doc->getElementsByTagName('meta');
        $socialmark_test_count=0;
        $socialmark_test_result=[];
        for ($smi = 0; $smi < $socialmark_metas->length; $smi++)
        {
            $socialmark_meta = $socialmark_metas->item($smi);
            if($socialmark_meta->getAttribute('property') == 'og:image'){
                $socialmark_test_result.array_push($socialmark_test_result, $socialmark_meta->getAttribute('content'));
                $socialmark_test_count++;
            }
        }
        if ($socialmark_test_count>0) {
            echo json_encode($socialmark_test_result);
        } else {
            echo "failed";
        }
        wp_die();
    }
}