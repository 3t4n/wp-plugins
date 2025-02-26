<div class="wrap">
<div id="welcome-panel" class="welcome-panel">
	<div class="welcome-panel-content">
	<h2>Aspose Contact Form </h2>
		<p class="about-description">Using MS Excel Files</p>
		<div class="welcome-panel-column-container">
			<div class="welcome-panel-column" style="width:33%;">
				<h3>Creating MS Excel File</h3>
				<ul>
					<li><b>Create</b> a New MS Excel file</li>
					<li>In the first row <b>add</b> column names and <b>Save</b> the file, i.e; for simple <b>Contact Us form</b> you may add following columns and save
						<ol>
							<li>Your Name</li>
							<li>Your Email</li>
							<li>Message</li>
						</ol>
					</li>
				</ul>
			</div>

			<div class="welcome-panel-column" style="width:33%;">
				<h3>Create Form ShortCode</h3>
				<ul>
					<li>Select MS Excel Spreadsheet by clicking <b>Select Excel File</b> and Upload the file</li>
					<li>Now click on <b>Generate Shortcodes</b> button to generate the shotcods.</li>
					<li>Shortcodes for both data entry and data listing will be displayed in the following list.</li>

				</ul>
			</div>

			<div class="welcome-panel-column welcome-panel-last" style="width:33%;">
				<h3>How to Use</h3>
				<ul>
					<li>Add Data Entry shortcode on a new page for information collection</li>
					<li>Start doing data entry on the page. By clicking on “Save” button, it will save the information to the spreadsheet</li>
					<li>For data listing add Data listing shortcode to a new Page/Post and save it</li>
				</ul>
			</div>
		</div>
	</div>
</div>	
    <form method="post" action="">
        <table>
            <tr>
                <th colspan="3" style="line-height: 30px">
                    <hr/>
                </th>
            </tr>

            <tr>
                <td>
                    <input type="text" readonly name="excel_file_name" placeholder="Click on the Select Excel File button" style="width: 300px;" id="excel_file_name" />
                </td>
                <td>
                    <?php
                    $image_library_url = get_upload_iframe_src( );
                    $image_library_url = remove_query_arg( array('TB_iframe'), $image_library_url );
                    $image_library_url = add_query_arg( array( 'context' => 'APC-Select-Excel-File', 'TB_iframe' => 1 ), $image_library_url );
                    ?>
                    <p>
                        <a title="Select Excel File" href="<?php echo esc_url( $image_library_url ); ?>" id="select-excel-file" class="button thickbox">Select Excel File</a>
                    </p>
                </td>
                <td>
                    <input type="submit" name="apc_generate_short_code" value="Generate ShortCodes" />
                </td>
            </tr>

        </table>
    </form>
    <?php require_once('aspose-contact-form-listing-page.php') ?>
</div>
