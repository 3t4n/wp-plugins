<?php
namespace DaReactions\Pages;
use DaReactions\Abstracts\AbstractAdminPage;
use DaReactions\Cache;
use DaReactions\Data;
use DaReactions\FileSystem;
use DaReactions\Utils;
use Exception;
/**
 *
 */
class AdminPageImportVotes extends AbstractAdminPage
{
    private $upload_nonce = 'da_reactions_upload_csv';
    private $upload_nonce_name = 'da_reactions_upload_nonce_name';
    private $import_nonce = 'da_reactions_import_csv';
    private $import_nonce_name = 'da_reactions_import_nonce_name';
    private $valid_csv = false;
    private $total_records = [];
    private $valid_records = [];
    private $invalid_records = [];
    private $unregistered_types = [];
    private $unregistered_contents = [];
    private $unregistered_users = [];
    private $unregistered_reactions = [];
    private $registered_types = [];
    private $registered_contents = [];
    private $registered_users = [];
    private $registered_reactions = [];
    private $invalid_import_link = '';
    private $valid_import_link = '';
    private $uploaded_file_name = '';
    private $invalid_rows_file_name = '';
    private $valid_rows_file_name = '';
    private $upload_path = '/da-reactions/csv/';
    /**
     * @throws Exception
     */
    public function displayPage()
    {
        $upload_dir = wp_upload_dir();
        if (isset($_POST[$this->import_nonce_name])) {
            check_admin_referer($this->import_nonce, $this->import_nonce_name);
            $this->valid_rows_file_name = sanitize_text_field($_POST['valid_import_file_name']);
            $valid_import_path = $upload_dir['basedir'] . $this->upload_path . $this->valid_rows_file_name;
	        global $wp_filesystem;
	        WP_Filesystem();
	        $file_path     = $valid_import_path;
	        $file_contents = $wp_filesystem->get_contents( $file_path );
	        if ( $file_contents !== false ) {
		        $rows = str_getcsv( $file_contents, "\n" ); // Parse the rows
		        foreach ( $rows as $row ) {
			        $csv_row = str_getcsv( $row ); // Parse the columns
			        $this->sanitizeRecord( $csv_row );
                }
                if (count($this->valid_records) < 1) {
                    $this->renderImportComplete();
                    return;
                }
                Cache::deleteAll();
                $importCount = 0;
		        $importQuota = 5000;
                $remaining_rows_file_name = Utils::generateRandomString() . '.csv';
                $remaining_rows_file_path = $upload_dir['basedir'] . $this->upload_path . $remaining_rows_file_name;
		        $csv_content = '';
                    foreach ($this->valid_records as $record) {
                        $importCount ++;
                        if ($importCount > $importQuota) {
	                        $csv_content .= implode( ',', array(
                                    $importCount,
                                    $record['resource_type'],
                                    $record['resource_id'],
                                    $record['emotion_id'],
                                    $record['user_id'],
                                    $record['user_token'],
                                    $record['user_ip'],
                                    $record['created_at']
		                        ) ) . "\n";
                        } else {
                            Data::insertReactionIntoDB(
                                $record['resource_id'],
                                $record['resource_type'],
                                $record['emotion_id'],
                                $record['user_id'],
                                $record['user_token'],
                                $record['user_ip']
                            );
                        }
                    }
		        $wp_filesystem->put_contents( $remaining_rows_file_path, $csv_content );
                ?>
                <p><?php
			        // translators: %d: number of rows remaining
			        echo esc_html( sprintf( __( 'Importing from CSV, %d rows remaining.', 'da-reactions' ), count( $this->valid_records ) ) );
			        ?></p>
                <form id="importingForm" action="" method="POST">
                    <?php
                    wp_nonce_field($this->import_nonce, $this->import_nonce_name);
                    ?>
                    <input
                            type="hidden"
                            name="valid_import_file_name"
                            value="<?php echo esc_attr( $remaining_rows_file_name ); ?>"
                    />
                </form>
                <?php
            } else {
                ?>
                <p class="error"><?php esc_html_e( 'Cannot open imported file', 'da-reactions' ); ?></p><?php
            }
        } else if (isset($_POST[$this->upload_nonce_name])) {
	        $this->validateAndSanitizeFileInput();
        } else {
	        FileSystem::deleteAllCsv();
	        $this->renderUploadForm();
        }
    }
	private function validateAndSanitizeFileInput() {
		global $wp_filesystem;
		WP_Filesystem();
		$upload_dir = wp_upload_dir();
            if (
	            isset( $_FILES['uploadedCsv'] ) &&
	            isset( $_FILES['uploadedCsv']['tmp_name'] ) &&
                $_FILES['uploadedCsv']['error'] === UPLOAD_ERR_OK &&
                is_uploaded_file($_FILES['uploadedCsv']['tmp_name'])
            ) {
                if (FileSystem::isCsv($_FILES['uploadedCsv'])) {
                    $this->valid_csv = true;
                    $this->uploaded_file_name = Utils::generateRandomString() . '.csv';
                    $this->invalid_rows_file_name = Utils::generateRandomString() . '.csv';
                    $this->valid_rows_file_name = Utils::generateRandomString() . '.csv';
	                // Sanitize the file path
	                check_admin_referer( $this->upload_nonce, $this->upload_nonce_name );
	                $tmp_name      = sanitize_text_field( $_FILES['uploadedCsv']['tmp_name'] );
	                // Save to FileSystem
                    $this->valid_import_link = $upload_dir['baseurl'] . $this->upload_path . $this->valid_rows_file_name;
                    $this->invalid_import_link = $upload_dir['baseurl'] . $this->upload_path . $this->invalid_rows_file_name;
                    $valid_import_path = $upload_dir['basedir'] . $this->upload_path . $this->valid_rows_file_name;
                    $invalid_import_path = $upload_dir['basedir'] . $this->upload_path . $this->invalid_rows_file_name;
                    $path_with_end_slash = $upload_dir['basedir'] . $this->upload_path;
                    FileSystem::putContents(
                        $path_with_end_slash,
                        $this->uploaded_file_name,
	                    FileSystem::fileGetContents( $tmp_name )
                    );
	                // Read file as CSV
                    $this->total_records = [];
                    $this->valid_records = [];
                    $this->invalid_records = [];
                    $this->unregistered_types = [];
                    $this->unregistered_contents = [];
                    $this->unregistered_users = [];
                    $this->unregistered_reactions = [];
                    $this->registered_types = [];
                    $this->registered_contents = [];
                    $this->registered_users = [];
                    $this->registered_reactions = [];
	                $file_path     = $path_with_end_slash . $this->uploaded_file_name;
	                $file_contents = $wp_filesystem->get_contents( $file_path );
	                if ( $file_contents !== false ) {
		                $rows = str_getcsv( $file_contents, "\n" ); // Parse the rows
		                foreach ( $rows as $row ) {
			                $csv_row = str_getcsv( $row ); // Parse the columns
			                $this->sanitizeRecord( $csv_row );
                        }
                    }
	                // Write invalid and valid CSV files
	                $csv_content = "ID,resource_type,resource_id,emotion_id,user_id,user_token,user_ip,created_at\n";
                        foreach ($this->valid_records as $row) {
	                        $csv_content .= implode( ',', array_slice( $row, 0, 8 ) ) . "\n";
                        }
	                $wp_filesystem->put_contents( $valid_import_path, $csv_content );
	                $csv_content = "ID,resource_type,resource_id,emotion_id,user_id,user_token,user_ip,created_at,error\n";
                        foreach ($this->invalid_records as $row) {
	                        $csv_content .= implode( ',', array_slice( $row, 0, 9 ) ) . "\n";
                        }
	                $wp_filesystem->put_contents( $invalid_import_path, $csv_content );
                } else {
                    $this->valid_csv = false;
                }
                $this->renderImportForm();
            }
        }
	private function renderUploadForm() {
        ?>
        <div class="wrap" id="admin_page_import_votes">
            <h1 class="wp-heading-inline">
	            <?php echo esc_html_x( 'Import votes', 'Import page title', 'da-reactions' ); ?>
            </h1>
            <div class="form-container">
                <form id="uploadForm" action="" method="POST" enctype="multipart/form-data">
                    <?php
                    wp_nonce_field($this->upload_nonce, $this->upload_nonce_name);
                    ?>
                    <input type="file" name="uploadedCsv">
                    <p>&nbsp;</p>
                </form>
                <button id="uploadSubmit"><?php echo esc_html_x( 'Upload', 'Upload CSV Form Submit', 'da-reactions' ); ?></button>
            </div>
        </div>
        <?php
    }
    private function renderImportComplete()
    {
        ?>
        <div class="da-reactions-panel">
            <div class="da-reactions-panel-content">
                <h2>
	                <?php echo esc_html_x( 'Import complete', 'Upload result page title', 'da-reactions' ); ?>
                </h2>
                <p>
                    <a href="<?php echo esc_url( admin_url( 'admin.php' ) ) ?>?page=da-reactions_import"
                       class="button action">
                        <span class="dashicons dashicons-database-import"
                              style="line-height: 1.4em"></span>
		                <?php esc_html_e( 'Upload new file', 'da-reactions' ); ?>
                    </a>
                    <a href="<?php echo esc_url( admin_url( 'admin.php' ) ) ?>?page=da-reactions_votes_list"
                       class="button action">
                        <span class="dashicons dashicons-list-view"
                              style="line-height: 1.4em"></span>
		                <?php esc_html_e( 'Back to votes list', 'da-reactions' ); ?>
                    </a>
                </p>
            </div>
        </div>
        <?php
    }
    private function renderImportForm()
    {
        ?>
        <div class="da-reactions-panel">
            <div class="da-reactions-panel-content">
                <h2>
	                <?php echo esc_html_x( 'Upload result', 'Upload result page title', 'da-reactions' ); ?>
                </h2>
                <p class="da-reactions-panel-description">
	                <?php echo esc_html_x(
                        'In this screen you can check if everything is OK and complete import',
                        'Upload result page description',
                        'da-reactions'
                    ); ?>
                </p>
                <div class="da-reactions-panel-column-container">
                    <div class="da-reactions-panel-column">
                        <h3><?php esc_html_e( 'Uploaded file', 'da-reactions' ); ?></h3>
                        <?php if ($this->valid_csv) { ?>
                            <p class="success">
                                <?php
                                echo esc_html( sprintf(
                                // translators: %d: number of rows
                                    __(
                                        'The file was a valid CSV containing %d rows',
                                        'da-reactions'
                                    ), count( $this->total_records ) ) ); ?></p>
                        <?php } else { ?>
                            <p class="error">
                                <?php
                                esc_html_e( 'The file was not a valid CSV', 'da-reactions' );
                                ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="da-reactions-panel-column
                    <?php if (!$this->valid_csv) { ?>disabled<?php } ?>">
                        <h3><?php esc_html_e( 'Invalid rows', 'da-reactions' ); ?></h3>
                        <p class="error">
                            <?php
                            echo esc_html( sprintf(
                            // translators: %d: number of rows
                                __(
                                    'There was %d invalid rows in uploaded file',
                                    'da-reactions'
                                ), count($this->invalid_records)
                            ) );
                            ?>
                        </p>
                        <a
                                download="invalid_import.csv"
                                href="<?php if ($this->valid_csv && count($this->invalid_records) > 0) {
	                                echo esc_url( $this->invalid_import_link );
                                } else {
                                    echo 'javascript:;';
                                } ?>">
	                        <?php esc_html_e( 'Download invalid data as CSV', 'da-reactions' ); ?>
                        </a>
                    </div>
                    <div
                            class="da-reactions-panel-column
                    <?php if (!$this->valid_csv) { ?>disabled<?php } ?>">
                        <h3><?php esc_html_e( 'Valid rows', 'da-reactions' ); ?></h3>
                        <p class="success">
                            <?php
                            echo esc_html( sprintf(
                            // translators: %d: number of rows
                                __(
                                    'There was %d valid rows in uploaded file',
                                    'da-reactions'
                                ), count( $this->valid_records ) ) );
                            ?>
                        </p>
                        <p class="">
                            <a
                                    download="valid_import.csv"
                                    href="<?php if ($this->valid_csv && count($this->valid_records) > 0) {
	                                    echo esc_url( $this->valid_import_link );
                                    } else {
                                        echo 'javascript:;';
                                    } ?>">
	                            <?php esc_html_e( 'Download valid data as CSV', 'da-reactions' ); ?></a>
                        </p>
                        <?php if ($this->valid_csv && count($this->valid_records) > 0) { ?>
                            <form id="importForm" action="" method="POST"
                                  enctype="multipart/form-data">
                                <?php
                                wp_nonce_field($this->import_nonce, $this->import_nonce_name);
                                ?>
                                <input type="hidden" name="valid_import_file_name"
                                       value="<?php echo esc_attr( $this->valid_rows_file_name ); ?>"/>
                                <input type="hidden" name="invalid_import_file_name"
                                       value="<?php echo esc_attr( $this->invalid_rows_file_name ); ?>"/>
                                <input type="hidden" name="import_file_name"
                                       value="<?php echo esc_attr( $this->uploaded_file_name ); ?>"/>
                                <button type="submit" class="button button-primary button-hero"
                                        href="#"><?php esc_html_e( 'Confirm import', 'da-reactions' ); ?></button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    /**
     * @return AdminPageImportVotes|null
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new self();
        }
        return $instance;
    }
    /**
     * @param $row
     *
     */
    public function sanitizeRecord($row)
    {
        if (count($row) < 8) {
            $record = array(
                'error' => 'Wrong columns count'
            );
        } else {
            $record = array(
                'ID' => is_numeric($row[0]) ? (int) $row[0] : $row[0],
                'resource_type' => sanitize_text_field($row[1]),
                'resource_id' => (int) $row[2],
                'emotion_id' => (int) $row[3],
                'user_id' => (int) $row[4],
                'user_token' => sanitize_text_field($row[5]),
                'user_ip' => sanitize_text_field($row[6]),
                'created_at' => strtotime($row[7]),
                'error' => ''
            );
        }
        /// Check ID
        if (!$record['error'] && !is_numeric($record['ID'])) {
            /// First line
            $record['error'] = 'First column is not numeric';
        }
        /// Check Content Type
        if (!$record['error'] && !in_array($record['resource_type'], $this->registered_types, true)) {
            if (in_array($record['resource_type'], $this->unregistered_types, true)) {
                $record['error'] = 'Invalid Resource Type';
            } else if (
                $record['resource_type'] === 'comment' ||
                post_type_exists($record['resource_type'])
            ) {
                $this->registered_types[] = $record['resource_type'];
            } else {
                $this->unregistered_types[] = $record['resource_type'];
                $record['error'] = 'Invalid Resource Type';
            }
        }
        /// Check Content by ID
        $content_name_and_id = "{$record['resource_type']}___{$record['resource_id']}";
        if (!$record['error'] && !in_array($content_name_and_id, $this->registered_contents, true)) {
            if (in_array($content_name_and_id, $this->unregistered_contents, true)) {
                $record['error'] = 'Content not found';
            } else if ($record['resource_type'] === 'comment' && get_comment($record['resource_id'])) {
                $this->registered_contents[] = $content_name_and_id;
            } else {
                $post = get_post($record['resource_id']);
                if ($post->post_type === $record['resource_type']) {
                    $this->registered_contents[] = $content_name_and_id;
                } else {
                    $this->unregistered_contents[] = $content_name_and_id;
                    $record['error'] = 'Content not found';
                }
            }
        }
        /// Check Reaction By ID
        if (!$record['error'] && !in_array($record['emotion_id'], $this->unregistered_reactions, true) &&
            !in_array($record['emotion_id'], $this->registered_reactions, true)) {
            $reaction = Data::getReactionById($record['emotion_id']);
            if ($reaction) {
                $this->registered_reactions[] = $record['emotion_id'];
            } else {
                $record['error'] = 'Reaction not found';
                $this->unregistered_reactions[] = $record['emotion_id'];
            }
        }
        /// Check User By ID
        if (!$record['error']) {
            if (
                (int) $record['user_id'] !== 0 &&
                !in_array($record['user_id'], $this->unregistered_users, true) &&
                !in_array($record['user_id'], $this->registered_users, true)
            ) {
                $user = get_userdata($record['user_id']);
                if (!$user) {
                    $this->unregistered_users[] = $record['user_id'];
                    $record['error'] = 'User not found';
                } else {
                    $this->registered_users[] = $record['user_id'];
                }
            }
            $this->valid_records[] = $record;
        } else {
            $this->invalid_records[] = $record;
        }
        $this->total_records[] = $record;
    }
}
