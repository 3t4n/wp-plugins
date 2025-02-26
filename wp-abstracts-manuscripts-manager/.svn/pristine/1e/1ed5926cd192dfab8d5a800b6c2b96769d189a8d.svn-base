<?php
defined('ABSPATH') or die("ERROR: You do not have permission to access this page");

if (!class_exists('WPAbstracts_Emails')) {
    require_once(apply_filters('wpabstracts_page_include', WPABSTRACTS_PLUGIN_DIR . 'emails/emails.classes.php'));
}
if (is_admin() && isset($_GET['tab']) && $_GET["tab"] == "emails") {
    if (isset($_GET['task'])) {
        $task = sanitize_text_field($_GET['task']);
        $id = isset($_GET['id']) ? intval($_GET['id']) : '';
        switch ($task) {
            case 'new':
                wpabstracts_add_email_template();
                break;
            case 'edit':
                wpabstracts_edit_email_template($id);
                break;
            case 'delete':
                wpabstracts_delete_email_template($id, true);
                wpabstracts_show_abs_templates();
                break;
            case 'bulk_delete':
                wpabstracts_delete_email_templates();
                wpabstracts_show_abs_templates();
                break;
            default:
                wpabstracts_show_abs_templates();
        }
    } else {
        if (has_action('wpabstracts_page_render')) {
            do_action('wpabstracts_page_render');
        } else {
            wpabstracts_show_abs_templates();
        }
    }
}

function wpabstracts_add_email_template()
{
    global $wpdb;
    if ($_POST) {
        $template_name = sanitize_text_field($_POST["template_name"]);
        $from_name = sanitize_text_field($_POST["from_name"]);
        $from_email = sanitize_text_field($_POST["from_email"]);
        $email_subject = sanitize_text_field($_POST["email_subject"]);
        $email_body = wp_kses_post($_POST["email_body"]);
        $include_submission = isset($_POST["include_submission"]) ? 1 : 0;
        $template_status = intval($_POST["template_status"]);
        $template_trigger = sanitize_text_field($_POST["template_trigger"]);
        $template_receiver = sanitize_text_field($_POST["template_receiver"]);
        $status_id = $template_trigger == 'status' && isset($_POST["template_abs_status"]) ? intval($_POST["template_abs_status"]) : -1;
        $wpdb->show_errors();
        $data = array(
            'name' => $template_name,
            'subject' => $email_subject,
            'message' => $email_body,
            'from_name' => $from_name,
            'from_email' => $from_email,
            'include_submission' => $include_submission,
            'type' => 'abstract',
            'trigger' => $template_trigger,
            'receiver' => $template_receiver,
            'status_id' => $status_id,
            'status' => $template_status
        );
        $wpdb->insert($wpdb->prefix . "wpabstracts_emailtemplates", $data);
        wpabstracts_redirect('?page=wpabstracts&tab=emails&subtab=templates');
    } else {
        wpabstracts_get_add_view('emailTemplates', null);
    }
}

function wpabstracts_edit_email_template($id)
{
    global $wpdb;
    if ($_POST) {
        $template_name = sanitize_text_field($_POST["template_name"]);
        $from_name = sanitize_text_field($_POST["from_name"]);
        $from_email = sanitize_text_field($_POST["from_email"]);
        $email_subject = sanitize_text_field($_POST["email_subject"]);
        $email_body = wp_kses_post($_POST["email_body"]);
        $include_submission = isset($_POST["include_submission"]) ? 1 : 0;
        $template_status = intval($_POST["template_status"]);
        $template_trigger = sanitize_text_field($_POST["template_trigger"]);
        $template_receiver = sanitize_text_field($_POST["template_receiver"]);
        $status_id = $template_trigger == 'status' && isset($_POST["template_abs_status"]) ? intval($_POST["template_abs_status"]) : -1;
        $wpdb->show_errors();
        $data = array(
            'name' => $template_name,
            'subject' => $email_subject,
            'message' => $email_body,
            'from_name' => $from_name,
            'from_email' => $from_email,
            'include_submission' => $include_submission,
            'trigger' => $template_trigger,
            'receiver' => $template_receiver,
            'status_id' => $status_id,
            'status' => $template_status
        );
        $where = array('ID' => $id);
        $wpdb->update($wpdb->prefix . "wpabstracts_emailtemplates", $data, $where);
        wpabstracts_redirect('?page=wpabstracts&tab=emails&subtab=templates');
    } else {
        $template = wpabstracts_get_edit_view('emailTemplates', $id);
        if ($template) {
            echo $template;
        } else {
            wpabstracts_show_message(__('Could not locate this resource. Please try again.', 'wpabstracts'), 'alert-danger');
        }
    }
}

function wpabstracts_delete_email_templates()
{
    if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], WPABSTRACTS_SECRET_KEY)) {
        wpabstracts_show_message(__('Unable to process your request. Please reload the page and try again.', 'wpabstracts'), 'alert-danger');
        return;
    }
    global $wpdb;
    $wpdb->show_errors();
    $tmpl_ids = isset($_POST['tmpl_id']) && is_array($_POST['tmpl_id'])
        ? array_map('intval', $_POST['tmpl_id'])
        : [];
    foreach ($tmpl_ids as $id) {
        $wpdb->delete("{$wpdb->prefix}wpabstracts_emailtemplates", ['id' => $id], ['%d']);
    }
    wpabstracts_show_message("The selected templates were successfully deleted", 'alert-success');
}

function wpabstracts_delete_email_template($id, $message)
{
    if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], WPABSTRACTS_SECRET_KEY)) {
        wpabstracts_show_message(__('Unable to process your request. Please reload the page and try again.', 'wpabstracts'), 'alert-danger');
        return;
    }
    global $wpdb;
    $templ_tbl = $wpdb->prefix . "wpabstracts_emailtemplates";
    $wpdb->delete($templ_tbl, array('id' => intval($id)));
    if ($message) {
        wpabstracts_show_message("Template ID " . $id . " was successfully deleted", 'alert-success');
    }
}

function wpabstracts_show_abs_templates()
{ ?>
    <div class="wpabstracts container-fluid wpabstracts-admin-container">
        <h3><?php echo apply_filters('wpabstracts_title_filter', __('Email Templates', 'wpabstracts'), 'abstracts'); ?> <a href="?page=wpabstracts&tab=emails&subtab=templates&task=new" role="button" class="wpabstracts btn btn-primary"><?php _e('Add New', 'wpabstracts'); ?></a></h3>
    </div>
    <form id="showTemplates" method="get">
        <input type="hidden" name="page" value="wpabstracts" />
        <input type="hidden" name="tab" value="emails" />
        <input type="hidden" name="subtab" value="templates" />
        <?php
        $templates = new WPAbstracts_Emails();
        $templates->prepare_items();
        $templates->display();
        ?>
    </form>
    <script>
        jQuery(document).ready(function() {
            var templates_count = '<?php echo count($templates->items); ?>';
            if (templates_count > 0) {
                jQuery('.wp-list-table').DataTable({
                    responsive: false,
                    lengthMenu: [50, 100, 250, 500]
                });
            }
            jQuery('#doaction, #doaction2').on('click', function(event) {
                event.preventDefault();
                var tmpl_ids = jQuery('input[name="template\\[\\]"]:checked').map(function() {
                    return jQuery(this).val();
                }).toArray();
                var action = -1;
                if (event.target.id == 'doaction') {
                    action = jQuery('#bulk-action-selector-top').val();
                } else {
                    action = jQuery('#bulk-action-selector-bottom').val();
                }
                switch (action) {
                    case 'delete':
                        wpabstracts_delete_templates(tmpl_ids);
                        break;
                    default:
                        jQuery("#showTemplates").submit();
                }
            });
        });
    </script>
<?php
}
