<?php
if (! defined('ABSPATH')) {
    exit;
}
?>

<div class="adqs-upload-csv-step">
    <form method="post" enctype="multipart/form-data">
        <div class="adqs-upload-csv-step-body">
            <h2 class="adqs-upcsv-headline">Import listings from a CSV file</h2>
            <p style="margin-top: 15px;" class="adqs-upcsv-paragraph">This tool allows you to import bulk listings to
                your site from a CSV file in
                a few simple steps. <a target="_blank"
                    href="https://adirectory.io/document/adirectory/csv-import-export/"
                    style="text-decoration: none; color: blue">Learn more</a>
            </p>
            <button id="adqs-samcsv-download"
                data-csv="<?php echo ADQS_DIRECTORY_URL . 'inc/Admin/Importer/sample/sample.csv'; ?>"
                class="adqs-step-handler-btn"
                style="padding: 6px 12px;font-size:12px;margin-bottom:20px;background:#008000;">Download
                CSV Sample</button>
            <input type="file" name="import" class="csv_input_field" accept=".csv">
            <div class="adqs-cta-section">
                <div class="adqs-upload-file">
                    <div class="adqs-upload-article">
                        <p>
                            Choose a CSV file from your computer:
                        </p>
                    </div>
                    <div class="adqs-upload-main-cta">
                        <button type="button" class="adqs-up-btn-wrapper">
                            <div class="adqs-up-btn">
                                <span>
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 15V5.34M9 8.00021L12 5L15 8.00021" stroke="white"
                                            stroke-width="1.5" />
                                        <path d="M20 17L19 20H5L4 17" stroke="currentColor" stroke-width="1.5" />
                                    </svg>

                                </span>
                                <span>Choose File</span>
                            </div>
                            <span class="uploaded-file-name">No File Choosen</span>

                        </button>
                        <p class="uploaded-file-size">Max size: <span class="hightlight-black">(Depending upon your
                                server)</span></p>
                    </div>
                </div>
                <div class="adqs-csv-delimiter-wrapper">
                    <div class="adqs-upload-article">
                        <p>CSV Delimiter</p>
                    </div>
                    <div class="adqs-upload-main-cta">
                        <input type="text" placeholder="," name="delimiter" value=",">
                    </div>
                </div>
            </div>
            <?php wp_nonce_field('adqs-importer-nonce'); ?>
            <div class="adqs-step-handler-btn-wrapper">
                <!-- you can change tag button or a -->
                <button type="submit" name="save_step" class="adqs-step-handler-btn">
                    Continue
                </button>
            </div>
        </div>
    </form>
</div>