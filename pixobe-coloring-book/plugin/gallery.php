<?php


function pixobe_colorgizer_create_online_coloring_page()
{
    // Check if the "Online Coloring" page already exists
    $coloring_page = get_page_by_path('online-coloring');

    // If the page doesn't exist, create it
    if (!$coloring_page) {
        // Set the page data
        $page_data = array(
            'post_title'   => 'Online Coloring',
            'post_content' => '[pixobecoloringbook]',
            'post_status'  => 'publish',
            'post_type'    => 'page'
        );
        // Insert the page into the database
        wp_insert_post($page_data);
    }
}

// Add filter to modify gallery block output
function pixobe_colorgizer_gallery_block($block_content, $block)
{
    // Check if the block is a Gallery block
    if ($block['blockName'] === 'core/gallery') {
        $attrs = $block['attrs'];
        if (isset($attrs['className'])) {
            $className = $attrs['className'];
            if (strpos($className, 'pixobe-gallery') !== false) {
                $block_content = preg_replace_callback(
                    '/<img\s+[^>]*data-id="([^"]+)"[^>]*>/i',
                    function ($matches) {
                        $image_tag = $matches[0];
                        $image_id = $matches[1];
                        // Add link to coloring page with image ID as query parameter
                        $link_url = '/online-coloring/?id=' . $image_id; // Change this to the desired URL structure
                        $image_tag = '<a href="' . $link_url . '">' . $image_tag . '</a>';
                        return $image_tag;
                    },
                    $block_content
                );
                pixobe_colorgizer_create_online_coloring_page();
            }
        }
    }
    return $block_content;
}

// Add filter to modify the title of the page
function pixobe_colorgizer_modify_page_title($title, $id = null)
{
    // Check if this is the "Online Coloring" page
    if ($title === 'Online Coloring') {
        // Get the image ID from the URL query parameter
        $image_id = isset($_GET['id']) ? intval($_GET['id']) : null;

        // If image ID is available, modify the title accordingly
        if ($image_id) {
            // Get the image title based on the image ID
            $title = get_the_title($image_id);
            // Set the modified title
            if (empty($title)) {
                $title = "Pixobe Coloring Book";
            }
        }
    }
    // Return the modified title or the original title if conditions are not met
    return $title;
}

// Add filter to modify the title of the page
add_filter('the_title', 'pixobe_colorgizer_modify_page_title', 10, 2);
add_filter('render_block', 'pixobe_colorgizer_gallery_block', 10, 2);
