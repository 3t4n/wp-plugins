<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Design page content
add_action( 'asp_settings_content', 'asp_render_import_export_page' );
function asp_render_import_export_page() {
    global $asp_active_tab;
    if ( 'import-export' != $asp_active_tab )
        return;

    $import_result = '';
    // Check if the Import Books button was clicked and nonce is verified
    if ( isset( $_POST['asp_import_books_submit'] ) && check_admin_referer( 'asp_import_books_action', 'asp_import_books_nonce' ) ) {
        $bible_books = asp_generate_bible_book_list();
        $existing_count = asp_books_already_exist();

        if ($existing_count == count($bible_books['Old Testament']) + count($bible_books['New Testament'])) {
            $import_result = 'already_exist';
        } else {
            // Perform the import
            $newly_added_count = asp_import_success_check();
            $import_result = $newly_added_count > 0 ? 'success' : 'failure';
        }
    }

    ?>

    <h3><?php _e( 'Import/Export Settings', 'advanced-sermons' ); ?></h3>
    <p class="asp-settings-desc">Import/Export Settings simplifies the management of your Sermons by providing tools to import books of the Bible, migrate from other Sermon plugins, and efficiently back up and transfer your settings.</p>

    <!-- Import Books of the Bible Form -->
    <table class="form-table">
        <tbody>

         <form action="" method="post">
            <?php wp_nonce_field( 'asp_import_books_action', 'asp_import_books_nonce' ); ?>
            <tr class="asp-title-holder">
                <td>
                    <h2 class="asp-inner-title"><?php _e( 'Books Taxonomy', 'advanced-sermons' ); ?></h2>
                </td>
            </tr>

            <tr class="asp-pro-version">
                <th scope="row"><?php _e( 'Import Books of the Bible', 'advanced-sermons' ); ?></th>
                <td>
                    <p class="description" style="padding-bottom: 15px;">
                    <?php _e( 'Easily import the entire canonical structure of the Bible into your sermon database. This feature ensures that all books of the Bible are organized and readily available for your sermon references.  Importantly, if you already have existing Books created, this process will seamlessly add any missing books from the Bible without deleting or altering your existing data."', 'advanced-sermons' ); ?>
                    </p>
                    <p class="description">
                        <?php _e( '<strong>Warning:</strong> This will generate all books of the Bible. This action is irreversible. Please perform a backup before proceeding.', 'advanced-sermons' ); ?>
                    </p>
                    <?php
                    // Add success of fail message
                    if ($import_result == 'success') {
                        echo '<div class="notice notice-success"><p>' . sprintf( __('%s Books of the Bible have been successfully imported.', 'advanced-sermons'), $newly_added_count ) . '</p></div>';
                    } elseif ($import_result == 'failure') {
                        // ... [existing failure message]
                    } elseif ($import_result == 'already_exist') {
                        echo '<div class="notice notice-info"><p>' . sprintf( __('All books of the Bible already exist (%s books).', 'advanced-sermons'), $existing_count ) . '</p></div>';
                    }
                    ?>
                </td>
            </tr>

            <tr class="asp-pro-version">
                <td>
                    <input type="hidden" name="asp_import_books_submit" value="1">
                    <?php submit_button( __( 'Import Books', 'advanced-sermons' ) ); ?>
                </td>
            </tr>
         </form>

        <tr class="asp-title-holder">
            <td>
                <h2 class="asp-inner-title"><?php _e( 'Import from Sermon Manager', 'advanced-sermons' ); ?></h2>
            </td>
        </tr>

        <tr>
            <th scope="row" style="padding-bottom: 40px;"><?php _e( 'Coming Soon', 'advanced-sermons' ); ?></th>
            <td><p><?php _e( 'This feature is currently in development. In the meantime, please review our online documention on how to <a href="https://advancedsermons.com/docs/import-sermons/" target="_blank">import sermons</a>.', 'advanced-sermons' ); ?></p>
            </td>
        </tr>


         <tr class="asp-title-holder">
             <td>
                 <h2 class="asp-inner-title"><?php _e( 'Import/Export Settings', 'advanced-sermons' ); ?></h2>
             </td>
         </tr>

         <tr>
             <th scope="row" style="padding-bottom: 40px;"><?php _e( 'Coming Soon', 'advanced-sermons' ); ?></th>
             <td>
                 <p><?php _e( 'This feature is currently in development.', 'advanced-sermons' ); ?></p>
             </td>
         </tr>

    </table>

<?php }

// Checks if the book import already has all books created.
function asp_books_already_exist() {
    $bible_books = asp_generate_bible_book_list();
    $existing_count = 0;

    foreach (array_merge($bible_books['Old Testament'], $bible_books['New Testament']) as $book) {
        if (term_exists($book, 'sermon_book')) {
            $existing_count++;
        }
    }
    return $existing_count;
}


// Checks if the book import was successful or not
function asp_import_success_check() {
    $bible_books = asp_generate_bible_book_list();
    $newly_added_count = 0;

    foreach (array_merge($bible_books['Old Testament'], $bible_books['New Testament']) as $book) {
        if (!term_exists($book, 'sermon_book')) {
            wp_insert_term($book, 'sermon_book');
            if (term_exists($book, 'sermon_book')) {
                $newly_added_count++;
            }
        }
    }
    return $newly_added_count;
}