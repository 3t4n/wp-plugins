<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly  

include $this->topbar_file;

?>





<div class="wrap pssg_wrap pssg-content">

    <h1 class="wp-heading "></h1>
    <div class="fieldwrap">
        

        

        <div class="pssg-section-panel quick-edit-section multiple-site-connection-demo" id="quick-edit-section" data-icon="pssg_icon-home">
                

        <!-- <h1>Multisite hhhh</h1> -->
        <form action="#" method="post" id="pssg-multisite-form" class="pssg-multisite-form-parent">
                <div class="site-type-changer-wrapper">
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr>
                                <th scope="row">API Connection</th>
                                <td>
                                    <p class="site-type-changer-dropdown-p">
                                        <select name="pssg-connection-setting[type]" class="site-type-changer-dropdown">
                                            <option value="">Disable API Connection</option>
                                            <option value="child">Enable as Child (Share permission to Parent)</option>
                                            <option value="parent"  selected="selected">Enable as Parent (Able to add Some Child Site)</option>
                                        </select>
                                    </p>
                                    <p>
                                        Please select site type to connect your sheet with Multiple sites </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="site-type-changer-message">
                        This feature to connect your sheet with Multiple sites. If you connect your sheet with this single site, you have to choose this site as a <strong>Parent</strong> site.<br>
                        And if you want, this site Stock will be sync with other site with a Parent site, you have to choose this site as a <strong>Child</strong> site.<br>
                        If you connect your sheet with this multiple sites, you have to choose this site as a child site.
                    </p>
                    <div class="access-token-area">

                        <table class="form-table" role="presentation">
                            <tbody>
                                <tr>
                                    <th scope="row">Site URL</th>
                                    <td>
                                        <div class="pssg-access-token-area">
                                            <input type="text" class="pssg-this-access-token pssg-site-url" value="<?php echo esc_attr( site_url() ); ?>" readonly="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Access Token</th>
                                    <td>
                                        <div class="pssg-access-token-area">
                                            <input type="text" class="pssg-this-access-token" value="97C65B09CCF5814FBDD8B418AD22C*******************************************" readonly="">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="connect-parent-site-area pssg-multisite-setting-panel">

                    <h2>Add your Parent Site</h2>
                    <div class="add-child-site-section-desc" style="font-size: 19px;">
                        <p>Carefully insert valid and full URL(target webstie's main url) and 68 character long Token.
                            eg: <i>https://www.example.com/</i>
                            <b>Important:</b> No wp-admin, wp-content, wp-includes, wp-json in URL
                        </p>
                    </div>
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr>
                                <th scope="row">Connect to Parent Site</th>
                                <td>
                                    <div class="pssg-connected-sites-wrapper" data-my_nonce="cbf6408344">
                                        <div class="pssg-connected-site-single pssg-connected-site-single-1">
                                            <input type="url" id="parent_site_access" name="pssg-connection-setting[parent_site_access][url]" class="site-url-input input-text regular-input" placeholder="Parent Site URL" value="">
                                            <input type="text" id="parent_site_access" name="pssg-connection-setting[parent_site_access][token]" placeholder="Parent Site Access Token" class="site-url-input input-text regular-input" value="">
                                        </div>
                                        <button id="pssg-connect-site-check-connection-btn" class="button button-primary">Check Connection</button>
                                        <div class="connection-response-wrapper"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="connect-other-site-area pssg-multisite-setting-panel">
                    <!-- <h1>Multisite Connection</h1> -->

                    <input type="hidden" name="option_page" value="my_plugin_settings_group"><input type="hidden" name="action" value="update"><input type="hidden" id="_wpnonce" name="_wpnonce" value="2c0ad801cb"><input type="hidden" name="_wp_http_referer" value="/wp-admin/admin.php?page=pssg-multisite-connection">
                    <h2>Add your Child Sites</h2>
                    <div class="add-child-site-section-desc" style="font-size: 19px;">
                        <p>Carefully insert valid and full URL(target webstie's main url) and 68 character long Token.
                            eg: <i>https://www.example.com/</i>
                            <b>Important:</b> No wp-admin, wp-content, wp-includes, wp-json in URL
                        </p>
                    </div>
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr>
                                <th scope="row">Connected Sites</th>
                                <td>
                                    <div class="pssg-connected-sites-wrapper" data-my_nonce="cbf6408344" data-max_connected_site="5">
                                        <div class="pssg-connected-site-single pssg-connected-site-single-1">
                                            <input type="url" id="connected_sites" name="pssg-connection-setting[connected_sites][1][url]" placeholder="Site URL" class="site-url-input input-text regular-input" value="">
                                            <input type="text" id="connected_sites" name="pssg-connection-setting[connected_sites][1][token]" placeholder="Access Token" class="site-access-token-input input-text regular-input" value="">
                                            <a class="pssg-remove-connected-site-btn">x</a>
                                        </div>
                                        <button id="pssg-connect-site-add-new-btn" class="button button-warning">Add New</button>
                                        <button id="pssg-connect-site-check-connection-btn" class="button button-primary">Check Connection</button>
                                        <div class="connection-response-wrapper"></div>
                                    </div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="submit"><a type="submit" name="submit" id="submit" href="https://codeastrology.com/downloads/product-sync-master-sheet-premium/" target="_blank" class="button button-primary">Save Changes</a></p>
            </form>


        </div>

    </div>
</div> 
<style>
p.attr-alert.attr-alert-success {
    color: #4caf50;
}
.site-type-changer-message {
    display: none;
    color: #9E9E9E;
    font-size: 22px;
    font-weight: normal;
}
.site-type-changer-message b, .site-type-changer-message i, .site-type-changer-message u, .site-type-changer-message strong, .site-type-changer-message span {
    color: black;
    background: #ddd;
    padding: 2px 5px;
    border-radius: 7px;
}
.pssg-multisite-setting-panel{
    margin-top: 18px;
    display: none;
}
form.pssg-multisite-form- .access-token-area{
    display: none;
}
form.pssg-multisite-form- .site-type-changer-message,
form.pssg-multisite-form-parent .connect-other-site-area.pssg-multisite-setting-panel,
form.pssg-multisite-form-child .connect-parent-site-area.pssg-multisite-setting-panel{
    display: block;
}
.pssg-this-access-token{width: 100%;color: blue;min-width: 500px;max-width: 800px;}
.pssg-connected-site-single{
    margin: 5px 0;
}
.pssg-connected-site-single input[type="text"]{
    width: 100%;
    max-width: 500px;
    min-width: 200px;
}
a.pssg-remove-connected-site-btn{
    background-color: red;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    display: inline-block;
    cursor: pointer;
}
.add-child-site-section-desc p {
    font-size: 17px;
    color: #b1b1b1;
}

.add-child-site-section-desc p i {
    color: #2271b1;
}

.add-child-site-section-desc p strong, .add-child-site-section-desc p b, .add-child-site-section-desc p span {
    color: black;
}
.connection-response-wrapper {
    padding: 23px;
    background: aliceblue;
    margin: 20px 0;
    display: none;
}
.connection-response-wrapper>span {
    color: black;
    font-size: 30px;
}
.connection-response-wrapper>span.error{color: #c00;}

.connection-response-wrapper h2 {
    color: #023046;
    font-weight: bold;
    margin: 0;
    font-size: 22px;
    line-height: 12px;
}

.connection-response-wrapper > div {
    border: 1px solid #ffffff87;
    margin: 15px 0;
    padding: 20px;
    min-width: 400px;
    max-width: 100%;
    border-radius: 9px;
    display: block;
}

.connection-response-wrapper > div.pssg-con-stat-success-box {
    border-color: #ffffff;
    background: #ffffffed;
}

.pssg-con-stat-success-box li {color: green;}

.pssg-con-stat-success-box h4 {
    font-weight: bold;
}

.pssg-con-stat-warning-box {
    color: #c37a7a;
    border-color: #7979e300 !important;
    background: #e3e3ff8f;
}

.pssg-con-stat-warning-box h4 {
    color: #9E9E9E;
    font-weight: bold;
    font-size: 18px;
}
</style>
