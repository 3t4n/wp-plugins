<?php
/*
Plugin Name: Noted!
Description: A simple note-taking system within the WordPress admin.
Author: Kyle Van Deusen
Version: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function noted_markdown_to_html($text) {
    // Normalize line endings
    $text = str_replace(["\r\n", "\r"], "\n", $text);
    $text = trim($text);

    // First, handle non-list markdown
    $patterns = array(
        '/\#{6}\s?(.*)/' => '<h6>$1</h6>',  // Add H6 before H5
        '/\#{5}\s?(.*)/' => '<h5>$1</h5>',  // Add H5 before H4
        '/\#{4}\s?(.*)/' => '<h4>$1</h4>',  // Add H4 before H3
        '/\#{3}\s?(.*)/' => '<h3>$1</h3>',
        '/\#{2}\s?(.*)/' => '<h2>$1</h2>',
        '/\#{1}\s?(.*)/' => '<h1>$1</h1>',  // Single # last
        '/\*\*(.*?)\*\*|__(.*?)__/' => '<strong>$1$2</strong>',
        '/\*(.*?)\*|_(.*?)_/' => '<em>$1$2</em>',
        '/<(https?:\/\/[^\s<]+)>/' => '<a href="$1">$1</a>',
        '/\[(.*?)\]\((.*?)\)/' => '<a href="$2">$1</a>',
        '/(^|[\s>])(https?:\/\/[^\s<]+)(?=\s|$)/' => '$1<a href="$2">$2</a>'
    );

    $html = preg_replace(array_keys($patterns), array_values($patterns), $text);

    // Split content into lines for processing lists
    $lines = explode("\n", $html);
    $output = '';
    $lists = [];  // Stack to track nested lists
    $currentIndent = 0;

    foreach ($lines as $line) {
        // Calculate the indentation level
        preg_match('/^(\s*)/', $line, $matches);
        $indent = strlen($matches[0]);
        $line = ltrim($line);

        // Check for ordered list item
        if (preg_match('/^\d+\.\s+(.*)$/', $line, $matches)) {
            $content = $matches[1];
            if (empty($lists) || $indent > $currentIndent) {
                // Start a new list
                $output .= "<ol>\n";
                array_push($lists, ['type' => 'ol', 'indent' => $indent]);
            } elseif ($indent < $currentIndent) {
                // Close lists until we match current indent
                while (!empty($lists) && $lists[count($lists)-1]['indent'] > $indent) {
                    $list = array_pop($lists);
                    $output .= $list['type'] === 'ul' ? "</ul>\n" : "</ol>\n";
                }
            }
            $currentIndent = $indent;
            $output .= "<li>" . $content . "</li>\n";
        }
        // Check for unordered list item
        elseif (preg_match('/^-\s+(.*)$/', $line, $matches)) {
            $content = $matches[1];
            if (empty($lists) || $indent > $currentIndent) {
                // Start a new list
                $output .= "<ul>\n";
                array_push($lists, ['type' => 'ul', 'indent' => $indent]);
            } elseif ($indent < $currentIndent) {
                // Close lists until we match current indent
                while (!empty($lists) && $lists[count($lists)-1]['indent'] > $indent) {
                    $list = array_pop($lists);
                    $output .= $list['type'] === 'ul' ? "</ul>\n" : "</ol>\n";
                }
            }
            $currentIndent = $indent;
            $output .= "<li>" . $content . "</li>\n";
        }
        // Not a list item
        else {
            // Close all open lists
            while (!empty($lists)) {
                $list = array_pop($lists);
                $output .= $list['type'] === 'ul' ? "</ul>\n" : "</ol>\n";
            }
            $currentIndent = 0;
            $output .= $line . "\n";
        }
    }

    // Close any remaining open lists
    while (!empty($lists)) {
        $list = array_pop($lists);
        $output .= $list['type'] === 'ul' ? "</ul>\n" : "</ol>\n";
    }

    // Clean up extra newlines and return
    $output = preg_replace('/\n+/', "\n", $output);
    return wp_kses_post(trim($output));
}

function noted_html_to_markdown($html) {
    $markdown = $html;

    // Convert headings (updated to handle spacing and all levels)
    $markdown = preg_replace('/<h6[^>]*>(.*?)<\/h6>/', "\n###### $1\n", $markdown);
    $markdown = preg_replace('/<h5[^>]*>(.*?)<\/h5>/', "\n##### $1\n", $markdown);
    $markdown = preg_replace('/<h4[^>]*>(.*?)<\/h4>/', "\n#### $1\n", $markdown);
    $markdown = preg_replace('/<h3[^>]*>(.*?)<\/h3>/', "\n### $1\n", $markdown);
    $markdown = preg_replace('/<h2[^>]*>(.*?)<\/h2>/', "\n## $1\n", $markdown);
    $markdown = preg_replace('/<h1[^>]*>(.*?)<\/h1>/', "\n# $1\n", $markdown);
    
    // Convert bold and italic
    $markdown = preg_replace('/<strong>(.*?)<\/strong>/', '**$1**', $markdown);
    $markdown = preg_replace('/<em>(.*?)<\/em>/', '_$1_', $markdown);
    
    // Convert links - handle both types
    $markdown = preg_replace('/<a href="(.*?)">\1<\/a>/', '<$1>', $markdown); // URLs that match their text
    $markdown = preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '[$2]($1)', $markdown); // Regular links
    
    // Convert lists with proper indentation
    $lines = explode("\n", $markdown);
    $inList = false;
    $listType = '';
    $listCount = 0;
    $result = [];
    
    foreach ($lines as $line) {
        // Skip empty lines inside lists
        if (trim($line) === '' && !$inList) {
            $result[] = '';
            continue;
        }

        // Handle unordered lists
        if (strpos($line, '<ul>') !== false) {
            $inList = true;
            $listType = 'ul';
            continue;
        }
        // Handle ordered lists
        if (strpos($line, '<ol>') !== false) {
            $inList = true;
            $listType = 'ol';
            $listCount = 0;
            continue;
        }
        // Handle list endings
        if (strpos($line, '</ul>') !== false || strpos($line, '</ol>') !== false) {
            $inList = false;
            $listType = '';
            $result[] = ''; // Add spacing after lists
            continue;
        }
        
        // Handle list items
        if (preg_match('/<li>(.*?)<\/li>/', $line, $matches)) {
            $content = $matches[1];
            if ($listType === 'ul') {
                $result[] = "- " . $content;
            } else if ($listType === 'ol') {
                $listCount++;
                $result[] = $listCount . ". " . $content;
            }
        } else if (trim($line) !== '') {
            // Non-list content (only add non-empty lines)
            $result[] = trim($line);
        }
    }
    
    $markdown = implode("\n", $result);
    
    // Clean up
    $markdown = wp_strip_all_tags($markdown);
    
    // Clean up multiple newlines but preserve intentional spacing
    $markdown = preg_replace('/\n{3,}/', "\n\n", $markdown);
    
    // Ensure proper spacing around headings
    $markdown = preg_replace('/^(#{1,3}\s.*?)$/m', "\n$1\n", $markdown);
    
    return trim($markdown);
}

/**
 * Registers a custom post type for notes
 */
function noted_register_post_type() {
    $args = array(
        'public'              => false,
        'show_ui'             => false,
        'show_in_rest'        => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'capability_type'     => 'post',
        'supports'            => array('title', 'editor'),
    );
    register_post_type('noted_note', $args);
}
add_action('init', 'noted_register_post_type');

/**
 * Adds the Noted side panel to the footer
 */
function noted_side_panel() {
    if (current_user_can('administrator')) {
        echo '<div id="noted-panel" class="noted-panel wp-admin-styling">';
        echo '<button id="noted-close" class="noted-close-button">&times;</button>';
        echo '<div class="noted-content">';
        echo '<h2>Add a Note</h2>';
        echo '<form id="noted-form">';
        echo '<label for="noted-title">Title</label>';
        echo '<input type="text" id="noted-title" name="title" class="noted-input">';
        echo '<label for="noted-description">Description <span class="info-icon dashicons dashicons-info" data-tooltip="Limited Markdown Support (titles, bold, italic, lists, & links)"></span></label>';
        echo '<textarea id="noted-description" name="description" class="noted-textarea"></textarea>';
        echo '<button type="button" id="noted-add" class="noted-add-button">Add Note</button>';
        echo '</form>';
        echo '<div id="noted-list" class="noted-list-container"></div>';
        echo '</div>';
        echo '</div>';
    }
}
add_action('admin_footer', 'noted_side_panel');
add_action('wp_footer', 'noted_side_panel'); 

/**
 * Adds an icon to the admin bar
 */
function noted_add_admin_bar_icon($wp_admin_bar) {
    if (current_user_can('administrator')) {
        $wp_admin_bar->add_node(array(
            'id'    => 'noted',
            'title' => 'Noted!',
            'href'  => '#',
            'meta'  => array('class' => 'noted-icon')
        ));
    }
}
add_action('admin_bar_menu', 'noted_add_admin_bar_icon', 100);

/**
 * Enqueues CSS and JavaScript
 */
function noted_enqueue_scripts() {
    if (is_user_logged_in() && current_user_can('administrator')) {
        wp_enqueue_style('noted-style', plugins_url('noted-style.css', __FILE__), array(), '1.1');
        wp_enqueue_script('jquery');
        wp_enqueue_script('noted-js', plugins_url('noted-scripts.js', __FILE__), array('jquery'), '1.1');
        wp_localize_script('noted-js', 'noted', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('noted_nonce')
        ));
    }
}
add_action('admin_enqueue_scripts', 'noted_enqueue_scripts');
add_action('wp_enqueue_scripts', 'noted_enqueue_scripts');

/**
 * Enqueues block editor assets
 */
function noted_enqueue_block_editor_assets() {
    wp_enqueue_script(
        'noted-editor-button',
        plugins_url('noted-scripts.js', __FILE__),
        array('wp-edit-post', 'wp-element', 'wp-components', 'wp-dom-ready', 'wp-plugins'),
        null,
        true
    );
}
add_action('enqueue_block_editor_assets', 'noted_enqueue_block_editor_assets');

/**
 * Handles adding a new note
 */
function noted_add_note() {
    check_ajax_referer('noted_nonce', 'nonce');

    if (!current_user_can('edit_posts')) {
        wp_send_json_error('Unauthorized');
    }

    $title = isset($_POST['title']) ? sanitize_text_field(wp_unslash($_POST['title'])) : '';
    $description = isset($_POST['description']) ? wp_unslash($_POST['description']) : '';

    // Convert Markdown to HTML
    $html_content = noted_markdown_to_html($description);

    $user = wp_get_current_user();
    
    $note_id = wp_insert_post(array(
        'post_type'    => 'noted_note',
        'post_title'   => $title,
        'post_content' => $html_content,
        'post_status'  => 'publish',
        'post_author'  => $user->ID,
    ));

    if ($note_id) {
        update_post_meta($note_id, '_noted_timestamp', current_time('mysql'));
        update_post_meta($note_id, '_noted_username', $user->user_login);
        update_post_meta($note_id, '_noted_markdown', $description);
        wp_send_json_success(array('note_id' => $note_id));
    } else {
        wp_send_json_error('Failed to save note');
    }
}
add_action('wp_ajax_noted_add_note', 'noted_add_note');

/**
 * Handles fetching notes
 */
function noted_fetch_notes() {
    check_ajax_referer('noted_nonce', 'nonce');

    if (!current_user_can('edit_posts')) {
        wp_send_json_error('Unauthorized');
    }

    $notes = new WP_Query(array(
        'post_type'      => 'noted_note',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ));

    if ($notes->have_posts()) {
        $result = array();
        while ($notes->have_posts()) {
            $notes->the_post();
            $date = get_post_meta(get_the_ID(), '_noted_timestamp', true);
            $formatted_date = date_i18n('M j, Y - g:ia', strtotime($date));
            $username = esc_html(get_post_meta(get_the_ID(), '_noted_username', true));
            $markdown = get_post_meta(get_the_ID(), '_noted_markdown', true);

            $result[] = array(
                'id'          => get_the_ID(),
                'title'       => esc_html(get_the_title()),
                'description' => wp_kses_post(get_the_content()),
                'markdown'    => $markdown ?: noted_html_to_markdown(get_the_content()),
                'timestamp'   => esc_html($formatted_date),
                'username'    => $username,
            );
        }
        wp_reset_postdata();
        wp_send_json_success($result);
    } else {
        wp_send_json_error('No notes found');
    }
}
add_action('wp_ajax_noted_fetch_notes', 'noted_fetch_notes');

/**
 * Handles deleting a note
 */
function noted_delete_note() {
    check_ajax_referer('noted_nonce', 'nonce');

    if (!current_user_can('edit_posts')) {
        wp_send_json_error('Unauthorized');
    }

    $note_id = isset($_POST['note_id']) ? intval($_POST['note_id']) : 0;
    if ($note_id && wp_delete_post($note_id, true)) {
        wp_send_json_success();
    } else {
        wp_send_json_error('Failed to delete note');
    }
}
add_action('wp_ajax_noted_delete_note', 'noted_delete_note');

/**
 * Handles editing a note
 */
function noted_edit_note() {
    check_ajax_referer('noted_nonce', 'nonce');

    if (!current_user_can('edit_posts')) {
        wp_send_json_error('Unauthorized');
    }

    $note_id = isset($_POST['note_id']) ? intval($_POST['note_id']) : 0;
    $title = isset($_POST['title']) ? sanitize_text_field(wp_unslash($_POST['title'])) : '';
    $description = isset($_POST['description']) ? wp_unslash($_POST['description']) : '';

    // Convert Markdown to HTML
    $html_content = noted_markdown_to_html($description);

    $updated = wp_update_post(array(
        'ID'           => $note_id,
        'post_title'   => $title,
        'post_content' => $html_content
    ));

    if ($updated) {
        update_post_meta($note_id, '_noted_markdown', $description);
        wp_send_json_success();
    } else {
        wp_send_json_error('Failed to update note');
    }
}
add_action('wp_ajax_noted_edit_note', 'noted_edit_note');

/**
 * Redirects single note pages to homepage
 */
function noted_redirect_private_notes() {
    if (is_singular('noted_note')) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('template_redirect', 'noted_redirect_private_notes');

