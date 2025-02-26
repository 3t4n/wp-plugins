<div class="aliexpress-box-settings-row">

    <div class="aliexpress-box-settings-col-1">
        <span class="aliexpress-settings-label"><?php esc_html_e( 'Aliexpress Source', Auto_Aliexpress::DOMAIN ); ?></span>
        <span class="aliexpress-description"><?php esc_html_e( 'You can select get data from specify aliexpress user or some keywords.', Auto_Aliexpress::DOMAIN ); ?></span>
    </div>

    <div class="aliexpress-box-settings-col-2">
                <div class="aliexpress-form-field">
                    <label for="aliexpress_search" id="aliexpress-feed-link" class="aliexpress-label"><?php esc_html_e( 'search keyword', Auto_Aliexpress::DOMAIN ); ?></label>
                    <input
                        type="text"
                        name="aliexpress_search"
                        placeholder="<?php esc_html_e( 'Enter your search keyword here', Auto_Aliexpress::DOMAIN ); ?>"
                        value=""
                        id="aliexpress-search"
                        class="aliexpress-form-control"
                        aria-labelledby="aliexpress_search"
                    />
                </div>

                <div class="aliexpress-search-results-wrapper">
                    <ul class="search-result-list">
                        <script type="text/template" id="tmpl-aliexpress-search-results">
                            <# if ( data.length ) { #>
                                <# for ( key in data ) { #>
                                    <li>
                                        <a href="#">
                                            <span class="aliexpress-keyword-selected" data-keyword="{{{ data[ key ] }}}" >{{{ data[ key ] }}}</span>
                                        </a>
                                    </li>
                                    <# } #>
                                        <# } else { #>
                                            <p class="no-source">
                                                <?php esc_html_e( 'No source.', 'auto-aliexpress' ); ?>
                                            </p>
                                            <# } #>
                        </script>
                    </ul>
                </div>

                <div class="aliexpress-form-field">
                    <label for="aliexpress_selected_keywords" id="aliexpress-feed-link" class="aliexpress-label"><?php esc_html_e( 'Selected Keywords', Auto_Aliexpress::DOMAIN ); ?></label>
                    <textarea class="aliexpress-form-control" id="aliexpress-selected-keywords" rows="5" cols="20" name="aliexpress_selected_keywords" required="required"><?php if(isset($settings['aliexpress_selected_keywords'])){echo $settings['aliexpress_selected_keywords'];}?></textarea>
                </div>
    </div>

</div>
