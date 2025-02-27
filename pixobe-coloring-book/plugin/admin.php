<?php

// Function to add admin menu page
function pixobe_coloring_book_menu()
{
    $icon_data   = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTYuMDE5NjEgMTYuNTI2NEgzLjQ0MDgxQzIuNjQ1MDcgMTYuNTI2NCAyIDE3LjE3MyAyIDE3Ljk3MDdWMjAuNTU1OEMyIDIxLjM1MzQgMi42NDUwNyAyMi4wMDAxIDMuNDQwODEgMjIuMDAwMUg2LjAxOTYxQzYuODE1MzUgMjIuMDAwMSA3LjQ2MDQyIDIxLjM1MzQgNy40NjA0MiAyMC41NTU4VjE3Ljk3MDdDNy40NjA0MiAxNy4xNzMgNi44MTUzNSAxNi41MjY0IDYuMDE5NjEgMTYuNTI2NFoiIGZpbGw9IiMyRDJEMkQiLz4KPHBhdGggZD0iTTIwLjM2NTMgMi4xNzgxNkgxNy43ODY1QzE2Ljk5MDggMi4xNzgxNiAxNi4zNDU3IDIuODI0ODEgMTYuMzQ1NyAzLjYyMjVWNi4yMDc1NUMxNi4zNDU3IDcuMDA1MjMgMTYuOTkwOCA3LjY1MTg0IDE3Ljc4NjUgNy42NTE4NEgyMC4zNjUzQzIxLjE2MTEgNy42NTE4NCAyMS44MDYxIDcuMDA1MjMgMjEuODA2MSA2LjIwNzU1VjMuNjIyNUMyMS44MDYxIDIuODI0ODEgMjEuMTYxMSAyLjE3ODE2IDIwLjM2NTMgMi4xNzgxNloiIGZpbGw9IiMyRDJEMkQiLz4KPHBhdGggZD0iTTYuMDIzNzggMkgzLjQ0NDk4QzIuNjQ5MjQgMiAyLjAwNDE3IDIuNjQ2NjUgMi4wMDQxNyAzLjQ0NDM0VjYuMDI5MzlDMi4wMDQxNyA2LjgyNzA3IDIuNjQ5MjQgNy40NzM2OCAzLjQ0NDk4IDcuNDczNjhINi4wMjM3OEM2LjgxOTUyIDcuNDczNjggNy40NjQ1OSA2LjgyNzA3IDcuNDY0NTkgNi4wMjkzOVYzLjQ0NDM0QzcuNDY0NTkgMi42NDY2NSA2LjgxOTUyIDIgNi4wMjM3OCAyWiIgZmlsbD0iIzJEMkQyRCIvPgo8cGF0aCBkPSJNMjAuMzA0OSAxNi4zMTU4SDE3LjcyNjFDMTYuOTMwNCAxNi4zMTU4IDE2LjI4NTMgMTYuOTYyNCAxNi4yODUzIDE3Ljc2MDFWMjAuMzQ1MkMxNi4yODUzIDIxLjE0MjkgMTYuOTMwNCAyMS43ODk1IDE3LjcyNjEgMjEuNzg5NUgyMC4zMDQ5QzIxLjEwMDYgMjEuNzg5NSAyMS43NDU3IDIxLjE0MjkgMjEuNzQ1NyAyMC4zNDUyVjE3Ljc2MDFDMjEuNzQ1NyAxNi45NjI0IDIxLjEwMDYgMTYuMzE1OCAyMC4zMDQ5IDE2LjMxNThaIiBmaWxsPSIjMkQyRDJEIi8+CjxwYXRoIGQ9Ik0xNC42MDUyIDExLjg5NDdDMTQuNjA1MiAxMy40MDYzIDEzLjM4MjggMTQuNjMxNiAxMS44NzUgMTQuNjMxNkMxMC4zNjcxIDE0LjYzMTYgOS4xNDQ3NSAxMy40MDYzIDkuMTQ0NzUgMTEuODk0N0M5LjE0NDc1IDEwLjM4MzIgMTAuMzY3MSA5LjE1NzkgMTEuODc1IDkuMTU3OUMxMy4zODI4IDkuMTU3OSAxNC42MDUyIDEwLjM4MzIgMTQuNjA1MiAxMS44OTQ3WiIgZmlsbD0iIzJEMkQyRCIvPgo8cGF0aCBkPSJNMTMuNTM5NiAxNi4zNzIySDExLjI4NDVDMTAuMzQ2NiAxNi4zMjI2IDkuNDU0MDYgMTUuOTUyMSA4Ljc1NTggMTUuMzIyNEw4LjY2MTQ2IDE1LjIzNzJDOC4wMzEyOSAxNC41MzExIDcuNjYxNjYgMTMuNjI5NyA3LjYxNDExIDEyLjY4MzVWMTAuNDEzNUM3LjYwOTQ1IDEwLjAzMSA3LjQ1NzczIDkuNjY1MDMgNy4xOTA1NSA5LjM5MTg5QzYuOTIzMzcgOS4xMTg4IDYuNTYxMzQgOC45NTk1NiA2LjE3OTkxIDguOTQ3MzlIMy40ODEzN0MzLjA4ODQ3IDguOTQ3MzkgMi43MTE3IDkuMTAzODUgMi40MzM4OSA5LjM4MjM0QzIuMTU2MDggOS42NjA4MiAyIDEwLjAzODUgMiAxMC40MzI0VjEzLjA5MDJDMiAxMy40ODQgMi4xNTYwOCAxMy44NjE3IDIuNDMzODkgMTQuMTQwMkMyLjcxMTcgMTQuNDE4NyAzLjA4ODQ3IDE0LjU3NTEgMy40ODEzNyAxNC41NzUxSDUuNzQ1ODlDNi42ODI5NCAxNC42Mjg1IDcuNTc0MzMgMTQuOTk4NiA4LjI3NDYxIDE1LjYyNUw4LjM1OTU0IDE1LjcxOTZDOC45ODc3IDE2LjQxOTYgOS4zNTczNyAxNy4zMTQzIDkuNDA2ODUgMTguMjU0NVYyMC41MTVDOS40MDY4NSAyMC43MTA4IDkuNDQ1NDkgMjAuOTA0NyA5LjUyMDUxIDIxLjA4NTRDOS41OTU1NyAyMS4yNjYyIDkuNzA1NTMgMjEuNDMwNCA5Ljg0NDEgMjEuNTY4NEM5Ljk4MjYzIDIxLjcwNjQgMTAuMTQ3MSAyMS44MTU2IDEwLjMyNzkgMjEuODg5N0MxMC41MDg3IDIxLjk2MzcgMTAuNzAyNCAyMi4wMDEyIDEwLjg5NzcgMjJIMTMuNTM5NkMxMy45MzI1IDIyIDE0LjMwOTMgMjEuODQzNiAxNC41ODcxIDIxLjU2NTFDMTQuODY0OSAyMS4yODY2IDE1LjAyMSAyMC45MDg5IDE1LjAyMSAyMC41MTVWMTcuODU3MkMxNS4wMjEgMTcuNDYzNCAxNC44NjQ5IDE3LjA4NTcgMTQuNTg3MSAxNi44MDcyQzE0LjMwOTMgMTYuNTI4NyAxMy45MzI1IDE2LjM3MjIgMTMuNTM5NiAxNi4zNzIyWiIgZmlsbD0iIzJEMkQyRCIvPgo8cGF0aCBkPSJNMjAuNTE4NiA5LjYwM0gxOC4yNjM1QzE3LjMyNTYgOS41NTMzNiAxNi40MzMgOS4xODI4MyAxNS43MzQ4IDguNTUzMTVMMTUuNjQwNCA4LjQ2ODAxQzE1LjAxMDMgNy43NjE4NyAxNC42NDA2IDYuODYwNTIgMTQuNTkzMSA1LjkxNDI0VjMuNjQ0MjJDMTQuNTg4NCAzLjI2MTc0IDE0LjQzNjcgMi44OTU4IDE0LjE2OTUgMi42MjI2N0MxMy45MDI0IDIuMzQ5NTcgMTMuNTQwMyAyLjE5MDMzIDEzLjE1ODkgMi4xNzgxNkgxMC40NjA0QzEwLjA2NzUgMi4xNzgxNiA5LjY5MDY5IDIuMzM0NjMgOS40MTI4OCAyLjYxMzExQzkuMTM1MDcgMi44OTE1OSA4Ljk3ODk5IDMuMjY5MjggOC45Nzg5OSAzLjY2MzEzVjYuMzIwOTRDOC45Nzg5OSA2LjcxNDc5IDkuMTM1MDcgNy4wOTI0OCA5LjQxMjg4IDcuMzcxQzkuNjkwNjkgNy42NDk0OSAxMC4wNjc1IDcuODA1OTEgMTAuNDYwNCA3LjgwNTkxSDEyLjcyNDlDMTMuNjYxOSA3Ljg1OTMgMTQuNTUzMyA4LjIyOTM2IDE1LjI1MzYgOC44NTU4TDE1LjMzODUgOC45NTAzN0MxNS45NjY3IDkuNjUwMzMgMTYuMzM2NCAxMC41NDUxIDE2LjM4NTggMTEuNDg1MlYxMy43NDU4QzE2LjM4NTggMTMuOTQxNiAxNi40MjQ1IDE0LjEzNTUgMTYuNDk5NSAxNC4zMTYyQzE2LjU3NDYgMTQuNDk3IDE2LjY4NDUgMTQuNjYxMSAxNi44MjMxIDE0Ljc5OTJDMTYuOTYxNiAxNC45MzcyIDE3LjEyNjEgMTUuMDQ2NCAxNy4zMDY5IDE1LjEyMDRDMTcuNDg3NyAxNS4xOTQ1IDE3LjY4MTMgMTUuMjMyIDE3Ljg3NjcgMTUuMjMwN0gyMC41MTg2QzIwLjkxMTUgMTUuMjMwNyAyMS4yODgzIDE1LjA3NDMgMjEuNTY2MSAxNC43OTU4QzIxLjg0MzkgMTQuNTE3NCAyMiAxNC4xMzk2IDIyIDEzLjc0NThWMTEuMDg4QzIyIDEwLjY5NDIgMjEuODQzOSAxMC4zMTY0IDIxLjU2NjEgMTAuMDM3OUMyMS4yODgzIDkuNzU5NDcgMjAuOTExNSA5LjYwMyAyMC41MTg2IDkuNjAzWiIgZmlsbD0iIzJEMkQyRCIvPgo8L3N2Zz4K';

    // Add top-level menu page
    add_menu_page(
        'Pixobe Coloring Book', // Page title
        'Pixobe Coloring Book', // Menu title
        'manage_options',    // Capability required to access menu page
        'pixobe-coloring-book', // Menu slug
        'pixobe_coloring_book_page', // Callback function to display page content
        $icon_data
    );
}

function pixobe_coloring_book_page()
{
    // Check if the form has been submitted
    if (isset($_POST['save_settings'])) {
        // Save the checkbox values
        if (isset($_POST['checkboxes'])) {
            update_option('pixobe_coloring_book_checkboxes', $_POST['checkboxes']);
        }
        // Save the text box value
        if (isset($_POST['colors'])) {
            $colors = sanitize_text_field($_POST['colors']);
            $colors = implode(',', array_map('trim', explode(',', $colors)));
            update_option('pixobe_coloring_book_colors', $colors);
        }
        // Display a success message
        echo '<div class="updated"><p>Settings saved!</p></div>';
    } else  if (isset($_POST['get_free_trial'])) {
        // Save the checkbox values
        pixobe_colorgizer_get_free_trial();
    }

    pixobe_colorgizer_get_nonce(true);

    // Get saved values for checkboxes and text box
    $checkboxes = get_option('pixobe_coloring_book_checkboxes', array());
    $colors = get_option('pixobe_coloring_book_colors', '');
    $app_plan = get_option('pixobe_colorgizer_plan', '');
    $expiry_date  = get_option('pixobe_coloring_expiry', '');
    $app_message = get_option('pixobe_colorgizer_message', '');

    /**
     * check if expired
     */
    function pixobe_license_expired($expiry_date)
    {
        $current_date = new DateTime();
        $expiry_date_object = new DateTime($expiry_date);
        return $current_date > $expiry_date_object;
    }

    $has_expired =  pixobe_license_expired($expiry_date);

?>
    <div class="wrap">
        <form method="post" class="pixobe-settings-form">
            <div>
                <h1>Pixobe Coloring Settings</h1>
                <small><?php _e("Version", "pixobe-coloring-book") ?>&nbsp;<?php echo PIXOBE_COLORING_BOOK_VERSION; ?></small>
            </div>
            <p> <?php echo $app_message; ?> </p>
            <fieldset <?php if ($has_expired) echo "disabled"; ?>>
                <div class="pixobe-container">
                    <label><input type="checkbox" name="checkboxes[]" value="pencil" <?php if (in_array('pencil', $checkboxes)) echo 'checked'; ?>> Pencil</label><br>
                    <label><input type="checkbox" name="checkboxes[]" value="paint" <?php if (in_array('paint', $checkboxes)) echo 'checked'; ?>> Paint</label><br>
                    <label><input type="checkbox" name="checkboxes[]" value="download" <?php if (in_array('download', $checkboxes)) echo 'checked'; ?>> Download</label><br>
                    <label><input type="checkbox" name="checkboxes[]" value="print" <?php if (in_array('print', $checkboxes)) echo 'checked'; ?>> Print</label><br>
                    <label><input type="checkbox" name="checkboxes[]" value="zoom" <?php if (in_array('zoom', $checkboxes)) echo 'checked'; ?>> Zoom</label><br>
                    <label><input type="checkbox" name="checkboxes[]" value="brightness" <?php if (in_array('brightness', $checkboxes)) echo 'checked'; ?>> Brightness</label><br>
                    <label for="colors">Colors:</label><br>
                    <input type="text" id="colors" name="colors" value="<?php echo esc_attr($colors); ?>"><br>
                </div>
            </fieldset>
            <div class="btn-group">
                <?php if ($app_plan == 'Free') { ?>
                    <input type="submit" name="get_free_trial" class="button button-accent" value="<?php echo _e("Get 30 days free trial now", "pixobe-coloring-app"); ?>">
                <?php } else if (!$has_expired) { ?>
                    <input type="submit" name="save_settings" class="button button-primary" value="<?php echo _e("Save", "pixobe-coloring-app"); ?>">
                <?php } ?>
            </div>
        </form>
    </div>
<?php
}

// Hook the admin menu page function into WordPress
add_action('admin_menu', 'pixobe_coloring_book_menu');
// Callback function to enqueue styles
function pixobe_colorgizer_admin_styles()
{
    wp_enqueue_style('pixobe-colorgizer-admin-style', plugins_url('css/pixobe-colorgizer-admin.css', __DIR__));
}

// Hook the function into the admin_enqueue_scripts action
add_action('admin_enqueue_scripts', 'pixobe_colorgizer_admin_styles');
