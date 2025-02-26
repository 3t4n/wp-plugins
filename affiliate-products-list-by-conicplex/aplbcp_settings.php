<?php
    global $wpdb;
    $table= $wpdb->prefix.'aplbcp_setting';
    $aplbcpSettingSql="SELECT * FROM $table";
    $aplbcpSettingRow=$wpdb->get_results($aplbcpSettingSql);
?>

<style>
    .aplbcp-settings {
        padding: 20px;
        margin: 10px 0;
        background: #FFFFFF;
    }

    .aplbcp-settings-items {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .aplbcp-settings .aplbcp-settings-items div {
        margin: 10px;
        width: 250px;
        padding: 20px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }

    .aplbcp-settings .aplbcp-settings-items div .aplbcp-settings-label {
        display: block;
        padding-bottom: 5px;
        font-weight: bold;
        font-size: 12px;
    }

    .aplbcp-settings .aplbcp-settings-items div .aplbcp-settings-input {
        padding: 5px;
        width: 100%;
        height: 40px;
    }

    fieldset {
        border: solid 1px !important;
    }

    legend {
        font-weight: bold;
        padding: 5px;
        font-size: 15px;
    }
</style>

<div id="wpbody" role="main">
    <div id="wpbody-content">
        <div class="wrap">
            <h1 class="wp-heading-inline">Settings - Affiliate Products List by ConicPlex</h1>
            <hr class="wp-header-end">
        </div>
        <div class="container">
            <div class="aplbcp-settings">
                <div class="aplbcp-settings-items">
                    <div>
                        <label class="aplbcp-settings-label">Header Background Color</label>
                        <input class="aplbcp-settings-input" type="color" value="<?php echo $aplbcpSettingRow[0]->aplbcp_header_bg; ?>" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Header Text Color</label>
                        <input class="aplbcp-settings-input" type="color" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Header Font Size</label>
                        <input class="aplbcp-settings-input" type="number" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Images Width</label>
                        <input class="aplbcp-settings-input" type="number" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Images Height</label>
                        <input class="aplbcp-settings-input" type="number" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Title Color</label>
                        <input class="aplbcp-settings-input" type="color" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Title Font Size</label>
                        <input class="aplbcp-settings-input" type="number" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Description Font Size</label>
                        <input class="aplbcp-settings-input" type="number" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Background Color</label>
                        <input class="aplbcp-settings-input" type="color" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Text Color</label>
                        <input class="aplbcp-settings-input" type="color" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Border Color</label>
                        <input class="aplbcp-settings-input" type="color" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Border Width</label>
                        <input class="aplbcp-settings-input" type="number" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Border Radius</label>
                        <input class="aplbcp-settings-input" type="number" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Hover Background Color</label>
                        <input class="aplbcp-settings-input" type="number" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Hover Text Color</label>
                        <input class="aplbcp-settings-input" type="number" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Hover Border Color</label>
                        <input class="aplbcp-settings-input" type="color" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Hover Border Width</label>
                        <input class="aplbcp-settings-input" type="number" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Hover Shadow</label>
                        <input class="aplbcp-settings-input" type="number" />
                    </div>
                </div>
            </div>
        </div>
    </div>