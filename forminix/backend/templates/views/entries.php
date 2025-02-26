

<div id="forminix_entries">

    <div class="forminix_entries_header">
        <div class="forminix_close_icon" onclick="forminix_forms_init(`<?php echo esc_url(FORMINIX_URL); ?>`)">
            <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "forminix_close_icon.svg") ?>"/>
        </div>

        <div class="forminix_details">
            <h2>Form Entries - Untitled Form</h2>
            <!--<p>List of entries recorded under this form</p>-->
        </div>

        <div class="forminix_entries_header_action">
            <button class="forminix_entries_copy_shortcode" onclick="forminix_entries_copy_shortcode()"></button>
            <button class="forminix_entries_refresh" onclick="forminix_entries_refresh(`<?php echo esc_url(FORMINIX_URL); ?>`)">Refresh</button>
        </div>
    </div>


    <div class="forminix_entries_body">
        <div class="forminix_entries_body_container">



            <div class="forminix_entries_empty">
                <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "entries/forminix_entries_empty.svg") ?>"/>
                <h2>You haven't received any entries yet!</h2>
                <p>Form entries will appear here.</p>
            </div>


            <div class="forminix_entries_loader_container">
                <div class="forminix_entries_loading_bar"></div>
            </div>


            <div class="forminix_entries_main_area">


                <div class="forminix_entries_datatable_action_area">
                    <div class="forminix_entries_bulk_action">
                        <select>
                            <option value="" disabled selected>Bulk actions</option>
                            <option value="delete">Delete Entry</option>
                            <option value="read">Mark as Read</option>
                            <option value="unread">Mark as Unread</option>
                            <option value="export_csv">Export as CSV (Pro)</option>
                        </select>
                        <button onclick="forminix_entries_bulk_action(`<?php echo esc_url(FORMINIX_URL); ?>`)">Apply</button>
                    </div>
                    <div class="forminix_entries_search">
                        <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "entries/forminix_search_icon.svg") ?>"/>
                        <input type="text" placeholder="Search form entries" onkeyup="forminix_entries_datatable_search(this)"/>
                    </div>

                    <button class="forminix_entries_export_btn" onclick="forminix_entries_export_as_csv(`<?php echo esc_url(FORMINIX_URL); ?>`)">
                        <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "entries/forminix_export_icon.svg") ?>"/> Export All as CSV
                    </button>
                </div>

                <table class="forminix_entries_datatable">
                    <thead>
                    <tr>
                        <th>
                            <label class="forminix_entries_datatable_checkbox">
                                <input type="checkbox" onclick="forminix_entries_checkbox_select_all(this)">
                                <span class="checkmark"></span>
                            </label>
                        </th>
                        <th>Submitted By</th>
                        <th>Submitted On</th>
                        <th>Submitted From</th>
                        <th class="action_container">Action</th>
                    </tr>
                    </thead>
                    <tbody class="forminix_entries_datatable_tbody">

                    </tbody>
                </table>




            </div>


        </div>
    </div>



</div>

