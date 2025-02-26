<?php

if (!defined('ABSPATH')) {
    return;
}

?>

<div class="adqs-full-page-loader" style="display:none">
    <div class="loader"></div>
</div>

<div class="adqs-upload-csv-step form-mapping">
    <div class="adqs-upload-csv-step-body">
        <h2 class="adqs-upcsv-headline">Map CSV Fields to Listings</h2>
        <p style="margin-top: 15px;" class="adqs-upcsv-paragraph">Select fields from your CSV file to map to listing
            fields or choose 'Do not import' to ignore them.</p>

        <?php if ($this->ismultidirectory) { ?>
            <!-- select directory -->
            <div class="adqs-select-directory-wrapper">
                <p class="text">Select Directory</p>
                <div class="adqs-imex-selectbox">
                    <select id="adqs-importer-select-dir">
                        <option value="">Select Directory</option>
                        <?php
                        foreach ($this->currentdirectory as $directory) { ?>
                            <option value="<?php echo esc_attr($directory['id']); ?>">
                                <?php echo esc_html($directory['name']); ?>
                            </option>
                        <?php }

                        ?>
                    </select>
                    <span class="adqs-imex-selectbox_arrow">
                        <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.7108 0.289706C13.6178 0.195067 13.5072 0.11995 13.3854 0.0686888C13.2635 0.0174272 13.1328 -0.00896454 13.0008 -0.00896454C12.8688 -0.00896454 12.7381 0.0174272 12.6162 0.0686888C12.4944 0.11995 12.3838 0.195067 12.2908 0.289706L7.71079 4.91417C7.61783 5.00881 7.50723 5.08393 7.38537 5.13519C7.26351 5.18645 7.1328 5.21284 7.00079 5.21284C6.86878 5.21284 6.73807 5.18645 6.61622 5.13519C6.49436 5.08393 6.38376 5.00881 6.29079 4.91417L1.71079 0.289706C1.61783 0.195067 1.50723 0.11995 1.38537 0.0686888C1.26351 0.0174272 1.1328 -0.00896454 1.00079 -0.00896454C0.868781 -0.00896454 0.738075 0.0174272 0.616216 0.0686888C0.494356 0.11995 0.383755 0.195067 0.290792 0.289706C0.104542 0.478887 0 0.7348 0 1.00155C0 1.2683 0.104542 1.52421 0.290792 1.71339L4.88079 6.34796C5.44329 6.91521 6.20579 7.23384 7.00079 7.23384C7.79579 7.23384 8.55829 6.91521 9.12079 6.34796L13.7108 1.71339C13.897 1.52421 14.0016 1.2683 14.0016 1.00155C14.0016 0.7348 13.897 0.478887 13.7108 0.289706Z"
                                fill="#606C7D" />
                        </svg>

                    </span>
                </div>
            </div>
        <?php } ?>
        <form action="" id="adqs-mapping-form">
            <input type="hidden" class="directory-id-input" name="directory_id"
                value="<?php echo $this->currentdirectory['id'] ?? 0; ?>" />
            <div class="adqs-cta-section">
                <div class="adqs-top-bar">
                    <span class="text">Column</span>
                    <span class="text">Map to field</span>
                </div>
                <!--dropdown list-->

                <ul class="adqs-dropdown-list-wrapper">
                    <?php
                    foreach ($headers as $key => $header) { ?>
                        <li class="adqs-dropdown-item">
                            <div class="article-area">
                                <h3 class="title"><?php echo esc_html($header); ?></h3>
                                <p class="des">
                                    Sample:
                                    <code><?php echo empty($this->sample[$header]) ? 'N/A' : $this->sample[$header]; ?></code>
                                </p>
                            </div>
                            <div class="input-area">
                                <div class="adqs-imex-selectbox">
                                    <select class="adqs_mapped_to_metas"
                                        name="mapping[<?php echo esc_attr(strtolower(str_replace(" ", "", $header))); ?>]">
                                        <option value=''>Do Not Import</option>
                                        <option value='listing_title'
                                            <?php echo in_array(str_replace(' ', '', strtolower($header)), array('title', 'name', 'listingtitle')) ? 'selected' : '' ?>>
                                            Listing Title</option>

                                        <option value='listing_content'
                                            <?php echo in_array(str_replace(' ', '', strtolower($header)), array('description', 'content')) ? 'selected' : '' ?>>
                                            Listing Content</option>

                                        <option value='listing_cats'
                                            <?php echo in_array(str_replace(' ', '', strtolower($header)), array('categories', 'listingcategories')) ? 'selected' : '' ?>>
                                            Listing Categories</option>

                                        <option value='listing_locs'
                                            <?php echo in_array(str_replace(' ', '', strtolower($header)), array('locations', 'listinglocations')) ? 'selected' : '' ?>>
                                            Listing Locations</option>

                                        <option value='listing_images'>Listing Images</option>

                                        <option value='listing_status'
                                            <?php echo in_array(str_replace(' ', '', strtolower($header)), array('status', 'listingstatus')) ? 'selected' : '' ?>>
                                            Listing Status</option>

                                        <option value='published_date'
                                            <?php echo in_array(str_replace(' ', '', strtolower($header)), array('published', 'createdat', 'publishedat')) ? 'selected' : '' ?>>
                                            Published Date</option>

                                        <?php
                                        foreach ($this->submission_fields as $option) { ?>
                                            <option value="<?php echo $option['meta']; ?>"
                                                <?php echo str_replace(' ', '', strtolower($header)) === str_replace(' ', '', strtolower($option['label'])) ? 'selected' : ''; ?>>
                                                <?php echo $option['label']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="adqs-imex-selectbox_arrow">
                                        <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.7108 0.289706C13.6178 0.195067 13.5072 0.11995 13.3854 0.0686888C13.2635 0.0174272 13.1328 -0.00896454 13.0008 -0.00896454C12.8688 -0.00896454 12.7381 0.0174272 12.6162 0.0686888C12.4944 0.11995 12.3838 0.195067 12.2908 0.289706L7.71079 4.91417C7.61783 5.00881 7.50723 5.08393 7.38537 5.13519C7.26351 5.18645 7.1328 5.21284 7.00079 5.21284C6.86878 5.21284 6.73807 5.18645 6.61622 5.13519C6.49436 5.08393 6.38376 5.00881 6.29079 4.91417L1.71079 0.289706C1.61783 0.195067 1.50723 0.11995 1.38537 0.0686888C1.26351 0.0174272 1.1328 -0.00896454 1.00079 -0.00896454C0.868781 -0.00896454 0.738075 0.0174272 0.616216 0.0686888C0.494356 0.11995 0.383755 0.195067 0.290792 0.289706C0.104542 0.478887 0 0.7348 0 1.00155C0 1.2683 0.104542 1.52421 0.290792 1.71339L4.88079 6.34796C5.44329 6.91521 6.20579 7.23384 7.00079 7.23384C7.79579 7.23384 8.55829 6.91521 9.12079 6.34796L13.7108 1.71339C13.897 1.52421 14.0016 1.2683 14.0016 1.00155C14.0016 0.7348 13.897 0.478887 13.7108 0.289706Z"
                                                fill="#606C7D" />
                                        </svg>
                                    </span>
                                </div>

                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <input type="hidden" class="csv_file_inp" name="csv_file" value="<?php echo $this->file; ?>" />
            <input type="hidden" name="delimiter" value="<?php echo $this->delimiter; ?>" />
            <div class="adqs-step-handler-btn-wrapper">
                <!-- you can change tag button or a -->
                <button type="submit"
                    class="adqs-step-handler-btn"><?php esc_html_e('Run the Importer', 'adqs-directory'); ?></button>
            </div>
        </form>
    </div>
</div>

<div class="adqs-upload-csv-step loader-progress">
    <div class="adqs-upload-csv-step-body">
        <div class="adqs-title-and-loader">
            <div>
                <h2 class="adqs-upcsv-headline">Importing</h2>
                <p class="adqs-upcsv-paragraph">Your listings are now being imported...</p>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#D8E4FF"
                        d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,19a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z"
                        opacity=".25" />
                    <path fill="#2B69FA"
                        d="M10.14,1.16a11,11,0,0,0-9,8.92A1.59,1.59,0,0,0,2.46,12,1.52,1.52,0,0,0,4.11,10.7a8,8,0,0,1,6.66-6.61A1.42,1.42,0,0,0,12,2.69h0A1.57,1.57,0,0,0,10.14,1.16Z">
                        <animateTransform attributeName="transform" type="rotate" dur="0.75s" values="0 12 12;360 12 12"
                            repeatCount="indefinite" />
                    </path>
                </svg>
            </div>
        </div>
        <div class="adqs-cta-section">
            <p class="progress-warn"><?php esc_html_e("Please do not reload or close this page.", "adirectory"); ?></p>
            <div class="progress-wrapper">
                <div class="adqs-progress-bar">
                    <div style="width:0%" class="adqs-inner-bar">

                    </div>
                </div>
            </div>
            <p class="progress-count"></p>

        </div>
    </div>
</div>

<div class="adqs-upload-csv-step import-complete-status">
    <div class="adqs-upload-csv-step-body">
        <div class="adqs-cta-section">
            <div class="adqs-complete-wrapper">
                <div class="adqs-complete-thumb">
                    <svg width="117" height="126" viewBox="0 0 117 126" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.6922 15.6059C14.9345 15.1998 15.6143 13.8576 15.2105 12.608C14.8067 11.3585 13.4722 10.6747 12.2299 11.0809C10.9876 11.487 10.3078 12.8292 10.7116 14.0788C11.1154 15.3283 12.4498 16.0121 13.6922 15.6059Z"
                            fill="#D8E3FF" />
                        <path
                            d="M18.1685 7.59633C19.0133 7.32015 19.4755 6.40745 19.2009 5.55775C18.9264 4.70805 18.0189 4.24312 17.1741 4.5193C16.3294 4.79547 15.8671 5.70817 16.1417 6.55787C16.4163 7.40757 17.3237 7.8725 18.1685 7.59633Z"
                            fill="#D8E3FF" />
                        <path
                            d="M96.3994 16.0098C97.8652 14.6625 97.9676 12.3751 96.628 10.9008C95.2885 9.42649 93.0144 9.32352 91.5486 10.6708C90.0828 12.0181 89.9804 14.3055 91.3199 15.7798C92.6594 17.2542 94.9336 17.3571 96.3994 16.0098Z"
                            fill="#2B69FA" />
                        <path
                            d="M107.883 9.41677C108.5 8.84949 108.543 7.88638 107.979 7.26561C107.415 6.64484 106.457 6.60148 105.84 7.16877C105.223 7.73606 105.18 8.69916 105.744 9.31993C106.308 9.9407 107.265 9.98406 107.883 9.41677Z"
                            fill="#2B69FA" />
                        <path
                            d="M17.8513 93.9492C18.4685 93.382 18.5116 92.4189 17.9476 91.7981C17.3836 91.1773 16.4261 91.134 15.8089 91.7012C15.1917 92.2685 15.1486 93.2316 15.7126 93.8524C16.2766 94.4732 17.2342 94.5165 17.8513 93.9492Z"
                            fill="#D8E3FF" />
                        <path
                            d="M56.0229 98.9808C81.9929 98.9808 103.046 77.8054 103.046 51.6843C103.046 25.5632 81.9929 4.38779 56.0229 4.38779C30.0529 4.38779 9 25.5632 9 51.6843C9 77.8054 30.0529 98.9808 56.0229 98.9808Z"
                            fill="#EFF3FE" />
                        <g filter="url(#filter0_d_9444_6622)">
                            <path
                                d="M94.6237 75.2688C95.0764 76.9586 94.083 78.6909 92.403 79.1411L43.7633 92.174C42.0833 92.6242 40.3567 91.6207 39.904 89.9309L22.5693 25.237C22.1165 23.5473 23.11 21.815 24.79 21.3648L60.0698 11.9116L80.5883 25.1282L88.7564 54.3318L94.6237 75.2688Z"
                                fill="url(#paint0_linear_9444_6622)" />
                        </g>
                        <path
                            d="M81.5229 62.2202L52.3231 70.0443C51.8431 70.1729 51.3353 69.8778 51.2059 69.395C51.0766 68.9122 51.3687 68.4027 51.8487 68.2741L81.0486 60.45C81.5286 60.3214 82.0364 60.6165 82.1658 61.0993C82.2151 61.6035 82.0029 62.0916 81.5229 62.2202Z"
                            fill="#D8E3FF" />
                        <path
                            d="M48.7243 71.0089L43.6043 72.3808C43.1243 72.5094 42.6165 72.2143 42.4872 71.7315C42.3578 71.2487 42.65 70.7392 43.13 70.6106L48.25 69.2387C48.73 69.1101 49.2378 69.4052 49.3671 69.888C49.4965 70.3708 49.2043 70.8803 48.7243 71.0089Z"
                            fill="#D8E3FF" />
                        <path
                            d="M79.3083 54.2756L66.2684 57.7697C65.7884 57.8983 65.2806 57.6031 65.1512 57.1203C65.0219 56.6375 65.3141 56.128 65.7941 55.9994L78.834 52.5054C79.314 52.3768 79.8218 52.6719 79.9511 53.1547C80.0221 53.7394 79.7883 54.147 79.3083 54.2756Z"
                            fill="#D8E3FF" />
                        <path
                            d="M60.7497 59.2491L41.7098 64.3508C41.2298 64.4794 40.722 64.1843 40.5926 63.7015C40.4633 63.2187 40.7555 62.7092 41.2355 62.5806L60.2754 57.4789C60.7554 57.3502 61.2632 57.6454 61.3925 58.1282C61.5434 58.6914 61.2297 59.1205 60.7497 59.2491Z"
                            fill="#D8E3FF" />
                        <path
                            d="M77.4373 46.3256L72.3973 47.676C71.9173 47.8046 71.4095 47.5095 71.2801 47.0267C71.1508 46.5439 71.443 46.0344 71.923 45.9058L76.9629 44.5553C77.4429 44.4267 77.9507 44.7219 78.0801 45.2047C78.2095 45.6875 77.9173 46.197 77.4373 46.3256Z"
                            fill="#D8E3FF" />
                        <path
                            d="M67.6746 48.9408L39.8348 56.4005C39.3548 56.5291 38.847 56.234 38.7176 55.7512C38.5883 55.2684 38.8805 54.7589 39.3605 54.6303L67.2003 47.1706C67.6803 47.042 68.1881 47.3371 68.3175 47.8199C68.4468 48.3027 68.1546 48.8122 67.6746 48.9408Z"
                            fill="#D8E3FF" />
                        <path
                            d="M61.7706 76.8269L60.0106 77.2985C59.5306 77.4271 59.0228 77.132 58.8934 76.6492C58.7641 76.1664 59.0562 75.6569 59.5362 75.5283L61.2962 75.0567C61.7762 74.9281 62.284 75.2232 62.4134 75.706C62.4628 76.2102 62.1706 76.7197 61.7706 76.8269Z"
                            fill="#D8E3FF" />
                        <path
                            d="M56.8129 78.1556L46.4129 80.9423C45.9329 81.0709 45.4251 80.7757 45.2958 80.293C45.1664 79.8102 45.4586 79.3007 45.9386 79.172L56.2585 76.4068C56.7385 76.2782 57.2463 76.5734 57.3757 77.0561C57.5851 77.5175 57.2929 78.027 56.8129 78.1556Z"
                            fill="#D8E3FF" />
                        <path
                            d="M75.5633 38.3756L57.6434 43.1773C57.1634 43.3059 56.6556 43.0107 56.5262 42.5279C56.3969 42.0452 56.6891 41.5357 57.1691 41.407L75.089 36.6054C75.569 36.4768 76.0768 36.7719 76.2061 37.2547C76.3355 37.7375 76.0433 38.247 75.5633 38.3756Z"
                            fill="#D8E3FF" />
                        <path
                            d="M51.8836 44.7207L37.9637 48.4505C37.4837 48.5791 36.9759 48.284 36.8465 47.8012C36.7172 47.3184 37.0094 46.8089 37.4894 46.6803L51.3293 42.9719C51.8093 42.8433 52.3171 43.1384 52.4465 43.6212C52.5758 44.104 52.3636 44.5921 51.8836 44.7207Z"
                            fill="#D8E3FF" />
                        <path
                            d="M56.8531 24.2429L33.4932 30.5022C32.8532 30.6737 32.2439 30.3195 32.0714 29.6758C31.8989 29.0321 32.2495 28.4207 32.8895 28.2492L56.2494 21.9899C56.8894 21.8184 57.4988 22.1726 57.6712 22.8163C57.8222 23.3796 57.4131 24.0929 56.8531 24.2429Z"
                            fill="#D8E3FF" />
                        <path
                            d="M43.8849 33.7552L35.0049 36.1346C34.3649 36.3061 33.7556 35.9519 33.5831 35.3082C33.4106 34.6645 33.7612 34.0531 34.4012 33.8816L43.3612 31.4808C44.0012 31.3093 44.6106 31.6634 44.783 32.3072C44.854 32.8919 44.5249 33.5837 43.8849 33.7552Z"
                            fill="#D8E3FF" />
                        <path
                            d="M60.0703 11.9113L63.7787 25.7513C64.2962 27.6824 66.4074 28.8416 68.3274 28.3271L80.5673 25.0475"
                            fill="#2B69FA" />
                        <path
                            d="M48.6939 38.7595C52.036 36.6171 55.9779 35.4174 60.177 35.4174C71.66 35.4174 81.0007 44.6724 81.0007 56.1554C81.0007 67.6384 71.66 76.8934 60.177 76.8934C48.6939 76.8934 39.3533 67.6384 39.3533 56.1554C39.1819 48.8714 42.9524 42.53 48.6939 38.7595Z"
                            fill="#27AE60" />
                        <path
                            d="M57.9967 63.4547C57.8102 63.6421 57.556 63.7468 57.2918 63.7468C57.0276 63.7468 56.7733 63.6421 56.5869 63.4547L50.9577 57.8245C50.3735 57.2403 50.3735 56.2931 50.9577 55.7098L51.6626 55.0049C52.2469 54.4207 53.193 54.4207 53.7773 55.0049L57.2918 58.5194L66.7884 49.0228C67.3726 48.4386 68.3198 48.4386 68.9031 49.0228L69.608 49.7277C70.1922 50.312 70.1922 51.2591 69.608 51.8424L57.9967 63.4547Z"
                            fill="white" />
                        <defs>
                            <filter id="filter0_d_9444_6622" x="0.460938" y="0.911602" width="116.273" height="124.37"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dy="11" />
                                <feGaussianBlur stdDeviation="11" />
                                <feColorMatrix type="matrix"
                                    values="0 0 0 0 0.397708 0 0 0 0 0.47749 0 0 0 0 0.575 0 0 0 0.27 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_9444_6622" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_9444_6622"
                                    result="shape" />
                            </filter>
                            <linearGradient id="paint0_linear_9444_6622" x1="48.6531" y1="13.2152" x2="68.2698"
                                y2="86.4257" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FDFEFF" />
                                <stop offset="0.9964" stop-color="#ECF0F5" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <p class="adqs-complete-title"><?php esc_html_e("Import completed!", "adirectory"); ?></p>
                <div class="adqs-complete-des-wrapper">
                    <p class="adqs-complete-des">
                        <span class="adqs-importer-status"></span>
                    </p>

                    <a href="<?php echo esc_url(add_query_arg([
                                    "post_type" => "adqs_directory",
                                ], admin_url('edit.php')));
                                ?>"
                        class="adqs-step-handler-btn"><?php echo esc_html__('View Listings', 'adirectory'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>