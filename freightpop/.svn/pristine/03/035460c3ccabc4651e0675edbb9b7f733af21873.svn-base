<?php
/* Template Name: Settings */
if ( ! defined( 'ABSPATH' ) ) exit;
global $wpdb;

$results = $wpdb->get_results("SELECT * FROM `settings`", ARRAY_A);

$user_status = true; 

if (is_array($results) && empty($results)) {
    $user_status = false;
}
$connectionStatus = '';
$productSetting = '';
$ratesToDisplay = '';
$username = '';
$password = '';
$source = '';
if (!empty($results) && isset($results[0])) {
    $connectionStatus = $results[0]['connectionStatus'];
    $productSetting = $results[0]['productSetting'];
    $ratesToDisplay = $results[0]['ratesToDisplay'];
    $username = $results[0]['username'];
    $password = $results[0]['password'];
    $source = $results[0]['source'];
    $source = ($source == 'live')? 'Production':'Sandbox';
}

?>

<!-- Login Page  -->
<div class="login-form pe-3 pt-4 <?php echo ($connectionStatus == 1) ? 'hide' : ''; ?>">
    <h2 class="mainheading">Connect to FreightPOP</h2>
    <div class="panel p-4" id="connect_card">
        <div class="row align-items-center">
            <div class="col-md-6">
                <form class="pe-5 border-end" id="user-connect-from">
                    <div class="form-group">
                        <label for="source">Source</label>
                        <select id="source" name="source" required>
                            <option value="" disabled selected>Choose source</option>
                            <option value="live">Production</option>
                            <option value="sandbox">Sandbox</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="email" id="username" name="username" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="iptpsword">
                            <input type="password" id="password" name="password" required />
                            <span class="eye-open hide">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M13 10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-1.5 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/><path fill-rule="evenodd" d="M10 4c-2.476 0-4.348 1.23-5.577 2.532a9.266 9.266 0 0 0-1.4 1.922 5.98 5.98 0 0 0-.37.818c-.082.227-.153.488-.153.728s.071.501.152.728c.088.246.213.524.371.818.317.587.784 1.27 1.4 1.922 1.229 1.302 3.1 2.532 5.577 2.532 2.476 0 4.348-1.23 5.577-2.532a9.265 9.265 0 0 0 1.4-1.922 5.98 5.98 0 0 0 .37-.818c.082-.227.153-.488.153-.728s-.071-.501-.152-.728a5.984 5.984 0 0 0-.371-.818 9.269 9.269 0 0 0-1.4-1.922c-1.229-1.302-3.1-2.532-5.577-2.532Zm-5.999 6.002v-.004c.004-.02.017-.09.064-.223a4.5 4.5 0 0 1 .278-.608 7.768 7.768 0 0 1 1.17-1.605c1.042-1.104 2.545-2.062 4.487-2.062 1.942 0 3.445.958 4.486 2.062a7.77 7.77 0 0 1 1.17 1.605c.13.24.221.447.279.608.047.132.06.203.064.223v.004c-.004.02-.017.09-.064.223a4.503 4.503 0 0 1-.278.608 7.768 7.768 0 0 1-1.17 1.605c-1.042 1.104-2.545 2.062-4.487 2.062-1.942 0-3.445-.958-4.486-2.062a7.766 7.766 0 0 1-1.17-1.605 4.5 4.5 0 0 1-.279-.608c-.047-.132-.06-.203-.064-.223Z"/></svg>
                                </svg>
                            </span>
                            <span class="eye-close">
                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path d="M11.977 4.751a7.598 7.598 0 0 0-1.977-.251c-2.444 0-4.196 1.045-5.325 2.233a7.188 7.188 0 0 0-1.243 1.773c-.26.532-.432 1.076-.432 1.494 0 .418.171.962.432 1.493.172.354.4.734.687 1.116l1.074-1.074a5.388 5.388 0 0 1-.414-.7c-.221-.453-.279-.753-.279-.835 0-.082.058-.382.279-.835a5.71 5.71 0 0 1 .983-1.398c.89-.937 2.264-1.767 4.238-1.767.24 0 .471.012.693.036l1.284-1.285Z"></path><path fill-rule="evenodd" d="M4.25 14.6a.75.75 0 0 0 1.067 1.053l1.062-1.061c.975.543 2.177.908 3.621.908 2.45 0 4.142-1.05 5.24-2.242 1.078-1.17 1.588-2.476 1.738-3.076a.749.749 0 0 0 0-.364c-.15-.6-.66-1.906-1.738-3.076a7.245 7.245 0 0 0-.51-.502l.923-.923a.75.75 0 0 0-1.053-1.068l-.008.008-10.335 10.336-.008.007Zm5.75-.6c-.978 0-1.809-.204-2.506-.523l1.108-1.109a2.75 2.75 0 0 0 3.766-3.766l1.3-1.299c.169.147.325.3.469.455a6.387 6.387 0 0 1 1.332 2.242 6.387 6.387 0 0 1-1.332 2.242c-.86.933-2.17 1.758-4.137 1.758Zm0-2.75c-.087 0-.172-.01-.254-.026l1.478-1.478a1.25 1.25 0 0 1-1.224 1.504Z"></path></svg>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-error error"></div>
                    <div style="margin-top: 32px;">
                        <button type="button" id="userconnect" name="con_submit" class="btn btn-dark">
                            Connect
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="login-contant ps-3">
                    <h5>Why Connection to FreightPOP ?</h5>
                    <p>The connection has been made secure, seamless, easy to use, and will automate the process.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Login Page -->

<!-- General setting -->

<div class="general_setting pe-3 my-4  
<?php 
    if($user_status == false){
        echo 'hide'; 
    } elseif ($productSetting !== null && $ratesToDisplay !== null) {
        echo 'hide';  // Add "hide" class
    }
?>">
    <h2 class="mainheading">General Setting</h2>
    <div class="panel p-4" id="general_setting_card">
        <form>
            <div class="form-group">
                <label for="product_setting">Product Setting</label>
                <select id="product_setting" name="product_setting" required>
                    <option value="" 
                    <?php echo ($productSetting == 'freightpop_product_catalog' || $productSetting == 'woocommerce_product_settings') ? '' : 'disabled selected'; ?> 
                    >Choose one</option>
                    <option value="freightpop_product_catalog" 
                    <?php echo ($productSetting == 'freightpop_product_catalog') ? 'selected' : ''; ?>
                    >FreightPOP Product Catalog</option>
                    <option value="woocommerce_product_settings" 
                    <?php echo ($productSetting == 'woocommerce_product_settings') ? 'selected' : ''; ?>
                    >WooCommerce Product Settings</option>
                </select>

            </div>
            <div class="form-group">
                <label for="rates_to_display">Rates to Display</label>
                <select id="rates_to_display" name="rates_to_display" required>
                <option value="" 
                    <?php echo ($ratesToDisplay == 'lowest_cost_only' || $ratesToDisplay == 'lowest_cost_per_transit_days' || $ratesToDisplay == 'show_all_rates') ? '' : 'disabled selected'; ?> 
                    >Choose one</option>
                    <option value="lowest_cost_only" 
                    <?php echo ($ratesToDisplay == 'lowest_cost_only') ? 'selected' : ''; ?>
                    >Lowest Cost Only</option>
                    <option value="lowest_cost_per_transit_days" 
                    <?php echo ($ratesToDisplay == 'lowest_cost_per_transit_days') ? 'selected' : ''; ?>
                    >Lowest Cost Per Transit Days</option>
                    <option value="show_all_rates" 
                    <?php echo ($ratesToDisplay == 'show_all_rates') ? 'selected' : ''; ?>
                    >Show All Rates</option>
                    <!-- <option value="" disabled selected>Chose one</option>
                    <option value="lowest_cost_only">Lowest Cost Only</option>
                    <option value="lowest_cost_per_transit_days">Lowest Cost Per Transit Days</option>
                    <option value="show_all_rates">Show All Rates</option> -->
                </select>
            </div>
            <div class="box text-end">
                <!-- Conditional rendering in React is replaced by CSS/JS here -->
                <button type="button" class="btn btn-outline-secondary" onclick="loggedOut()">
                    Cancel
                </button>
                <button type="button" class="btn btn-dark" onclick="saveProductSettings()">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<div class="final-step <?php echo ($connectionStatus == 1 && $user_status == true && $productSetting != null || $ratesToDisplay != null)? '': 'hide';?>">
<div class="connection pe-3 mt-3">
    <div id="connection-tab">
        <h2 class="mainheading">FreightPOP Connection</h2>
        <div class="panel p-4">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="username">Source</label>
                        <input type="text" value="<?php echo esc_attr($source); ?>" readonly id="finalstepsource" name="source" required />
                    </div>
                </div>
                <div class="col-md-7 text-end">
                    <a href="javascript:void(0)" class="edit" onclick="loggedOut()">Edit</a>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="email" value="<?php echo esc_attr($username); ?>" id="finalstepusername" name="username" required disabled readonly/>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="iptpsword">
                            <input type="password" value="<?php echo esc_attr($password); ?>" id="finalsteppassword" name="password" required disabled readonly/>
                            <span class="eye-open hide">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M13 10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-1.5 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/><path fill-rule="evenodd" d="M10 4c-2.476 0-4.348 1.23-5.577 2.532a9.266 9.266 0 0 0-1.4 1.922 5.98 5.98 0 0 0-.37.818c-.082.227-.153.488-.153.728s.071.501.152.728c.088.246.213.524.371.818.317.587.784 1.27 1.4 1.922 1.229 1.302 3.1 2.532 5.577 2.532 2.476 0 4.348-1.23 5.577-2.532a9.265 9.265 0 0 0 1.4-1.922 5.98 5.98 0 0 0 .37-.818c.082-.227.153-.488.153-.728s-.071-.501-.152-.728a5.984 5.984 0 0 0-.371-.818 9.269 9.269 0 0 0-1.4-1.922c-1.229-1.302-3.1-2.532-5.577-2.532Zm-5.999 6.002v-.004c.004-.02.017-.09.064-.223a4.5 4.5 0 0 1 .278-.608 7.768 7.768 0 0 1 1.17-1.605c1.042-1.104 2.545-2.062 4.487-2.062 1.942 0 3.445.958 4.486 2.062a7.77 7.77 0 0 1 1.17 1.605c.13.24.221.447.279.608.047.132.06.203.064.223v.004c-.004.02-.017.09-.064.223a4.503 4.503 0 0 1-.278.608 7.768 7.768 0 0 1-1.17 1.605c-1.042 1.104-2.545 2.062-4.487 2.062-1.942 0-3.445-.958-4.486-2.062a7.766 7.766 0 0 1-1.17-1.605 4.5 4.5 0 0 1-.279-.608c-.047-.132-.06-.203-.064-.223Z"/></svg>
                                </svg>
                            </span>
                            <span class="eye-close"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path d="M11.977 4.751a7.598 7.598 0 0 0-1.977-.251c-2.444 0-4.196 1.045-5.325 2.233a7.188 7.188 0 0 0-1.243 1.773c-.26.532-.432 1.076-.432 1.494 0 .418.171.962.432 1.493.172.354.4.734.687 1.116l1.074-1.074a5.388 5.388 0 0 1-.414-.7c-.221-.453-.279-.753-.279-.835 0-.082.058-.382.279-.835a5.71 5.71 0 0 1 .983-1.398c.89-.937 2.264-1.767 4.238-1.767.24 0 .471.012.693.036l1.284-1.285Z"></path><path fill-rule="evenodd" d="M4.25 14.6a.75.75 0 0 0 1.067 1.053l1.062-1.061c.975.543 2.177.908 3.621.908 2.45 0 4.142-1.05 5.24-2.242 1.078-1.17 1.588-2.476 1.738-3.076a.749.749 0 0 0 0-.364c-.15-.6-.66-1.906-1.738-3.076a7.245 7.245 0 0 0-.51-.502l.923-.923a.75.75 0 0 0-1.053-1.068l-.008.008-10.335 10.336-.008.007Zm5.75-.6c-.978 0-1.809-.204-2.506-.523l1.108-1.109a2.75 2.75 0 0 0 3.766-3.766l1.3-1.299c.169.147.325.3.469.455a6.387 6.387 0 0 1 1.332 2.242 6.387 6.387 0 0 1-1.332 2.242c-.86.933-2.17 1.758-4.137 1.758Zm0-2.75c-.087 0-.172-.01-.254-.026l1.478-1.478a1.25 1.25 0 0 1-1.224 1.504Z"></path></svg>
                            </span>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>    
</div>    

<div class="general-setting freightPOP-form pe-3 mt-4">
    <h2 class="mainheading">General Setting</h2>
    <div class="panel p-4">
        <div class="form-group">
            <label for="product_setting">Product Setting</label>
            <select id="final_product_setting" onchange="updateProductSettings()" name="product_setting" required>
                <option value="" disabled>Choose one</option>
                <option value="freightpop_product_catalog" 
                <?php echo ($productSetting == 'freightpop_product_catalog') ? 'selected' : ''; ?>
                >FreightPOP Product Catalog</option>
                <option value="woocommerce_product_settings" 
                <?php echo ($productSetting == 'woocommerce_product_settings') ? 'selected' : ''; ?>
                >WooCommerce Product Settings</option>
            </select>
        </div>
        <div class="form-group">
            <label for="rates_to_display">Rates to Display</label>
            <select id="final_rates_to_display" onchange="updateProductSettings()" name="rates_to_display" required>
                <option value="" disabled>Choose one</option>
                <option value="lowest_cost_only" 
                <?php echo ($ratesToDisplay == 'lowest_cost_only') ? 'selected' : ''; ?>
                >Lowest Cost Only</option>
                <option value="lowest_cost_per_transit_days" 
                <?php echo ($ratesToDisplay == 'lowest_cost_per_transit_days') ? 'selected' : ''; ?>
                >Lowest Cost Per Transit Days</option>
                <option value="show_all_rates" 
                <?php echo ($ratesToDisplay == 'show_all_rates') ? 'selected' : ''; ?>
                >Show All Rates</option>
            </select>
        </div>
        <div class="box text-end settings-change hide">
            <button type="button" class="btn btn-dark" onclick="onChangeUpdateProductSettings()">
                Save
            </button>
        </div>
    </div>
</div>

<div class="markup pe-3 freightPOP-form mt-4">
    <div id="connection-tab">
        <h2 class="mainheading">Markups</h2>
        <div class="panel p-4">
            <div class="row">
                <div class="col-md-12 text-end">
                    <a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#addMarkups">Add Markups</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="table-responsive tableFreight">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th>Markup Value</th>
                                  <th>Applied to</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="markupstbody">
                                <?php
                                    $markups = $wpdb->get_results("SELECT * FROM `markups`", ARRAY_A);
                                    foreach ($markups as $row):
                                ?>
                                <tr>
                                    <td>
                                        <?php 
                                            if($row['type'] == 'FIXED_AMOUNT'){
                                                echo '$';
                                            }
                                            echo esc_html($row['value']); 
                                            if($row['type'] == 'PERCENTAGE'){
                                                echo '%';
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo esc_attr($row['applyTo']); ?></td>
                                    <td>
                                    <div class="d-flex">
                                        <div class="delete-markup me-2" data-id="<?php echo esc_attr($row['id']);  ?>" onclick="deleteMarkUps(<?php echo esc_attr($row['id']); ?>, 'markups')">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path d="M11.5 8.25a.75.75 0 0 1 .75.75v4.25a.75.75 0 0 1-1.5 0v-4.25a.75.75 0 0 1 .75-.75Z"></path><path d="M9.25 9a.75.75 0 0 0-1.5 0v4.25a.75.75 0 0 0 1.5 0v-4.25Z"></path><path fill-rule="evenodd" d="M7.25 5.25a2.75 2.75 0 0 1 5.5 0h3a.75.75 0 0 1 0 1.5h-.75v5.45c0 1.68 0 2.52-.327 3.162a3 3 0 0 1-1.311 1.311c-.642.327-1.482.327-3.162.327h-.4c-1.68 0-2.52 0-3.162-.327a3 3 0 0 1-1.311-1.311c-.327-.642-.327-1.482-.327-3.162v-5.45h-.75a.75.75 0 0 1 0-1.5h3Zm1.5 0a1.25 1.25 0 1 1 2.5 0h-2.5Zm-2.25 1.5h7v5.45c0 .865-.001 1.423-.036 1.848-.033.408-.09.559-.128.633a1.5 1.5 0 0 1-.655.655c-.074.038-.225.095-.633.128-.425.035-.983.036-1.848.036h-.4c-.865 0-1.423-.001-1.848-.036-.408-.033-.559-.09-.633-.128a1.5 1.5 0 0 1-.656-.655c-.037-.074-.094-.225-.127-.633-.035-.425-.036-.983-.036-1.848v-5.45Z"></path></svg>
                                        </div>
                                        <div class="delete-markup" data-id="<?php echo esc_attr($row['id']); ?>" onclick="get_markup_data(<?php echo esc_attr($row['id']); ?>, 'markups')" data-bs-toggle="modal" data-bs-target="#editMarkups">
                                            <svg fill="#000000" style="width:14px;height:14px;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                width="20px" height="30px" viewBox="0 0 494.936 494.936"
                                                xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path d="M389.844,182.85c-6.743,0-12.21,5.467-12.21,12.21v222.968c0,23.562-19.174,42.735-42.736,42.735H67.157
                                                            c-23.562,0-42.736-19.174-42.736-42.735V150.285c0-23.562,19.174-42.735,42.736-42.735h267.741c6.743,0,12.21-5.467,12.21-12.21
                                                            s-5.467-12.21-12.21-12.21H67.157C30.126,83.13,0,113.255,0,150.285v267.743c0,37.029,30.126,67.155,67.157,67.155h267.741
                                                            c37.03,0,67.156-30.126,67.156-67.155V195.061C402.054,188.318,396.587,182.85,389.844,182.85z"/>
                                                        <path d="M483.876,20.791c-14.72-14.72-38.669-14.714-53.377,0L221.352,229.944c-0.28,0.28-3.434,3.559-4.251,5.396l-28.963,65.069
                                                            c-2.057,4.619-1.056,10.027,2.521,13.6c2.337,2.336,5.461,3.576,8.639,3.576c1.675,0,3.362-0.346,4.96-1.057l65.07-28.963
                                                            c1.83-0.815,5.114-3.97,5.396-4.25L483.876,74.169c7.131-7.131,11.06-16.61,11.06-26.692
                                                            C494.936,37.396,491.007,27.915,483.876,20.791z M466.61,56.897L257.457,266.05c-0.035,0.036-0.055,0.078-0.089,0.107
                                                            l-33.989,15.131L238.51,247.3c0.03-0.036,0.071-0.055,0.107-0.09L447.765,38.058c5.038-5.039,13.819-5.033,18.846,0.005
                                                            c2.518,2.51,3.905,5.855,3.905,9.414C470.516,51.036,469.127,54.38,466.61,56.897z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div> 

<div class="markup pe-3 freightPOP-form mt-4">
    <div id="connection-tab">
        <h2 class="mainheading">Discounts</h2>
        <div class="panel p-4">
            <div class="row">
                <div class="col-md-12 text-end">
                    <a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#addDiscount">Add Discounts</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="table-responsive tableFreight">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th>Discount Value</th>
                                  <th>Appied to</th>
                                  <th>Discount Condition</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="discounttbody">
                                <?php
                                    $markups = $wpdb->get_results("SELECT * FROM `discounts`", ARRAY_A);
                                    foreach ($markups as $row):
                                ?>
                                <tr>
                                    <td>
                                        <?php 
                                            if($row['type'] == 'FIXED_AMOUNT'){
                                                echo '$';
                                            }
                                            echo esc_html($row['value']); 
                                            if($row['type'] == 'PERCENTAGE'){
                                                echo '%';
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo esc_attr($row['applyTo']); ?></td>
                                    <td>
                                        <?php 
                                            
                                            echo esc_attr( $row['condition']);
                                           if($row['condition'] != 'No minimum requirements'){
                                            echo esc_attr(' $'.$row['conditionValue']);
                                           }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                        <div class="delete-markup me-2" data-id="<?php echo esc_attr($row['id']); ?>" onclick="deleteMarkUps(<?php echo esc_attr($row['id']); ?>, 'discounts')">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path d="M11.5 8.25a.75.75 0 0 1 .75.75v4.25a.75.75 0 0 1-1.5 0v-4.25a.75.75 0 0 1 .75-.75Z"></path><path d="M9.25 9a.75.75 0 0 0-1.5 0v4.25a.75.75 0 0 0 1.5 0v-4.25Z"></path><path fill-rule="evenodd" d="M7.25 5.25a2.75 2.75 0 0 1 5.5 0h3a.75.75 0 0 1 0 1.5h-.75v5.45c0 1.68 0 2.52-.327 3.162a3 3 0 0 1-1.311 1.311c-.642.327-1.482.327-3.162.327h-.4c-1.68 0-2.52 0-3.162-.327a3 3 0 0 1-1.311-1.311c-.327-.642-.327-1.482-.327-3.162v-5.45h-.75a.75.75 0 0 1 0-1.5h3Zm1.5 0a1.25 1.25 0 1 1 2.5 0h-2.5Zm-2.25 1.5h7v5.45c0 .865-.001 1.423-.036 1.848-.033.408-.09.559-.128.633a1.5 1.5 0 0 1-.655.655c-.074.038-.225.095-.633.128-.425.035-.983.036-1.848.036h-.4c-.865 0-1.423-.001-1.848-.036-.408-.033-.559-.09-.633-.128a1.5 1.5 0 0 1-.656-.655c-.037-.074-.094-.225-.127-.633-.035-.425-.036-.983-.036-1.848v-5.45Z"></path></svg>
                                        </div>  
                                        <div class="delete-markup" data-id="<?php echo esc_attr($row['id']); ?>" onclick="get_discount_data(<?php echo esc_attr($row['id']); ?>, 'discounts')" data-bs-toggle="modal" data-bs-target="#editDiscount">
                                            <svg fill="#000000" style="width:14px;height:14px;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                width="20px" height="30px" viewBox="0 0 494.936 494.936"
                                                xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path d="M389.844,182.85c-6.743,0-12.21,5.467-12.21,12.21v222.968c0,23.562-19.174,42.735-42.736,42.735H67.157
                                                            c-23.562,0-42.736-19.174-42.736-42.735V150.285c0-23.562,19.174-42.735,42.736-42.735h267.741c6.743,0,12.21-5.467,12.21-12.21
                                                            s-5.467-12.21-12.21-12.21H67.157C30.126,83.13,0,113.255,0,150.285v267.743c0,37.029,30.126,67.155,67.157,67.155h267.741
                                                            c37.03,0,67.156-30.126,67.156-67.155V195.061C402.054,188.318,396.587,182.85,389.844,182.85z"/>
                                                        <path d="M483.876,20.791c-14.72-14.72-38.669-14.714-53.377,0L221.352,229.944c-0.28,0.28-3.434,3.559-4.251,5.396l-28.963,65.069
                                                            c-2.057,4.619-1.056,10.027,2.521,13.6c2.337,2.336,5.461,3.576,8.639,3.576c1.675,0,3.362-0.346,4.96-1.057l65.07-28.963
                                                            c1.83-0.815,5.114-3.97,5.396-4.25L483.876,74.169c7.131-7.131,11.06-16.61,11.06-26.692
                                                            C494.936,37.396,491.007,27.915,483.876,20.791z M466.61,56.897L257.457,266.05c-0.035,0.036-0.055,0.078-0.089,0.107
                                                            l-33.989,15.131L238.51,247.3c0.03-0.036,0.071-0.055,0.107-0.09L447.765,38.058c5.038-5.039,13.819-5.033,18.846,0.005
                                                            c2.518,2.51,3.905,5.855,3.905,9.414C470.516,51.036,469.127,54.38,466.61,56.897z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div> 


<!-- Connection Tab End -->
</div>

<!-- Modal-Popup  Add Markup-->
<div class="modal fade modal_freightPOP" id="addMarkups" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="exampleModalLabel">Add Markup</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="markupForm">
            <div class="form-group">
                <label for="markuptype">*Markup Value</label>
                <div class="row">
                    <div class="col-md-3">
                        <select id="markuptype" required>
                            <!-- Replace with options from markupTypeOpt -->
                            <option value="" disabled selected>Chose Option</option>
                            <option value="FIXED_AMOUNT">$ Fixed Amount</option>
                            <option value="PERCENTAGE">Percentage %</option>
                        </select>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" id="markupvalue" min="1" max="1000" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="applyTo">*Applies to</label>
                <div class="row">
                    <div class="col-md-12">
                        <select id="applyto" required>
                            <!-- Replace with options from markupApplyToOpt -->
                            <option value="" disabled selected>Chose Option</option>
                            <option value="All Products">All Products</option>
                            <!-- <option value="Category">Category</option> -->
                        </select>
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="addMarkUps()" id="markupsave">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Popup Add Markup -->

<!-- Modal-Popup -->  
<div class="modal fade modal_freightPOP" id="addDiscount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
           <h2 class="modal-title fs-5" id="exampleModalLabel">Add Discount</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="discountform">
                <div class="form-group">
                    <label for="markupType">*Discount Value</label>
                    <div class="row">
                        <div class="col-md-3">
                            <select id="discounttype" required>
                                <!-- Replace with options from markupTypeOpt -->
                                <option value="" disabled selected>Choose Option</option>
                                <option value="FIXED_AMOUNT">$ Fixed Amount</option>
                                <option value="PERCENTAGE">Percentage %</option>
                            </select>
                        </div>
                        <div class="col-md-9">
                            <input type="number" class="form-control" id="discountvalue" min="1" max="1000" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="applyTo">*Applies to</label>
                    <div class="row">
                        <div class="col-md-12">
                            <select id="discountapplyto" required>
                                <!-- Replace with options from markupApplyToOpt -->
                                <option value="" disabled selected>Choose Option</option>
                                <option value="All Products">All Products</option>
                                <!-- <option value="Category">Category</option> -->
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="product_setting"><b>*Applied when the following rule is met.</b></label>
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="rule_is_met" value="No minimum requirements" id="norequirements">
                        <label class="form-check-label pt-1" for="norequirements">No minimum requirements</label>
                    </div>
                    <div class="frightpop_chkbx">
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="radio" name="rule_is_met" value="Minimum order value" id="minimumordervalue">
                            <label class="form-check-label pt-1" for="minimumordervalue">Minimum order value ($)</label>
                        </div>
                        <div class="input-container mt-0 mb-2" id="input-minimumordervalue">
                            <input type="number" class="w-100" placeholder="Enter minimum order value">
                        </div>
                        </div>
                    <div class="frightpop_chkbx">
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="radio" name="rule_is_met" value="FreightPOP rate greater than" id="rategrater">
                            <label class="form-check-label pt-1" for="rategrater">FreightPOP rate greater than ($)</label>
                        </div>
                        <div class="input-container mt-0 mb-2" id="input-rategrater">
                            <input type="number" class="w-100" placeholder="Enter rate greater than">
                        </div>
                    </div>
                    <div class="frightpop_chkbx">
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="radio" name="rule_is_met" value="FreightPOP rate less than" id="rateless">
                            <label class="form-check-label pt-1" for="rateless">FreightPOP rate less than ($)</label>
                        </div>
                        <div class="input-container mt-0 mb-2" id="input-rateless">
                            <input type="number" class="w-100" placeholder="Enter rate less than">
                        </div>
                    </div>
                    <!-- <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="rule_is_met" value="Total weight greater than (lbs)" id="greaterthan">
                        <label class="form-check-label pt-1" for="greaterthan">Total weight greater than (lbs)</label>
                        <div class="input-container" id="input-greaterthan">
                            <input type="number" placeholder="Enter weight greater than">
                        </div>
                    </div>
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="rule_is_met" value="Total weight less than (lbs)" id="weightless">
                        <label class="form-check-label pt-1" for="weightless">Total weight less than (lbs)</label>
                        <div class="input-container" id="input-weightless">
                            <input type="number" placeholder="Enter weight less than">
                        </div>
                    </div> -->
                    <div class="error" id="discount-error">Please select following rule is met.</div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-link close" style="text-decoration: none;" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" onclick="addDiscount()" id="discountsave">Save</button>
        </div>
    </div>
  </div>
</div>
<!-- End Modal Popup -->


<!-- Edit markup model -->
<div class="modal fade modal_freightPOP" id="editMarkups" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="exampleModalLabel">Edit Markup</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="markupForm">
            <div class="form-group">
                <label for="markuptype">*Markup Value</label>
                <div class="row">
                    <div class="col-md-3">
                        <select id="update-markuptype" required>
                            <!-- Replace with options from markupTypeOpt -->
                            <option value="" disabled selected>Chose Option</option>
                            <option value="FIXED_AMOUNT">$ Fixed Amount</option>
                            <option value="PERCENTAGE">Percentage %</option>
                        </select>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" id="update-markupvalue" min="1" max="1000" required>
                    </div>
                </div>
            </div>
            <input type="hidden" class="form-control" id="update-markupid" value="">
            <div class="form-group">
                <label for="applyTo">*Applies to</label>
                <div class="row">
                    <div class="col-md-12">
                        <select id="update-applyto" required>
                            <!-- Replace with options from markupApplyToOpt -->
                            <option value="" disabled selected>Chose Option</option>
                            <option value="All Products">All Products</option>
                            <!-- <option value="Category">Category</option> -->
                        </select>
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onClick="updateMarkUps()" id="markup_update">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- Edit markup model -->
<!-- Edit Discount Model -->  
<div class="modal fade modal_freightPOP" id="editDiscount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
               <h2 class="modal-title fs-5" id="editModalLabel">Edit Discount</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editDiscountForm">
                    <div class="form-group">
                        <label for="editDiscountType">*Discount Value</label>
                        <div class="row">
                            <div class="col-md-3">
                                <select id="editDiscountType" required>
                                    <!-- Replace with options from markupTypeOpt -->
                                    <option value="" disabled selected>Choose Option</option>
                                    <option value="FIXED_AMOUNT">$ Fixed Amount</option>
                                    <option value="PERCENTAGE">Percentage %</option>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="editDiscountValue" min="1" max="1000" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editApplyTo">*Applies to</label>
                        <div class="row">
                            <div class="col-md-12">
                                <select id="editApplyTo" required>
                                    <!-- Replace with options from markupApplyToOpt -->
                                    <option value="" disabled selected>Choose Option</option>
                                    <option value="All Products">All Products</option>
                                    <!-- <option value="Category">Category</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="discountid" value="">                       
                    <div class="form-group">
                        <label for="product_setting"><b>*Applied when the following rule is met.</b></label>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="radio" name="edit_rule_is_met" value="No minimum requirements" id="editNoRequirements">
                            <label class="form-check-label pt-1" for="editNoRequirements">No minimum requirements</label>
                        </div>
                        <div class="frightpop_chkbx">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="edit_rule_is_met" value="Minimum order value" id="editMinimumOrderValue">
                                <label class="form-check-label pt-1" for="editMinimumOrderValue">Minimum order value ($)</label>
                            </div>
                            <div class="input-container mt-0 mb-2" id="editInput-editMinimumOrderValue">
                                <input type="number" class="w-100" placeholder="Enter minimum order value">
                            </div>
                        </div>
                        <div class="frightpop_chkbx">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="edit_rule_is_met" value="FreightPOP rate greater than" id="editRateGreater">
                                <label class="form-check-label pt-1" for="editRateGreater">FreightPOP rate greater than ($)</label>
                            </div>
                            <div class="input-container mt-0 mb-2" id="editInput-editRateGreater">
                                <input type="number" class="w-100" placeholder="Enter rate greater than">
                            </div>
                        </div>
                        <div class="frightpop_chkbx">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="edit_rule_is_met" value="FreightPOP rate less than" id="editRateLess">
                                <label class="form-check-label pt-1" for="editRateLess">FreightPOP rate less than ($)</label>
                            </div>
                            <div class="input-container mt-0 mb-2" id="editInput-editRateLess">
                                <input type="number" class="w-100" placeholder="Enter rate less than">
                            </div>
                        </div>
                        <div class="error" id="editDiscountError">Please select following rule is met.</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link close" style="text-decoration: none;" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="editDiscount()" id="editDiscountSave">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Discount Model -->


