
<?php

    defined('ABSPATH') || die("Nice try");
    global $wpdb;

    $id  = '';
    if ( isset($_GET['select']) ) {
        $id = $_GET['select'];
    
        if ( strpos($id, '<script>') !== false || strpos($id, '</script>') !== false ) {
            wp_die('Invalid input detected.');
        }
    
        $id = sanitize_text_field( $id );
        $id = esc_html( $id );
    }
    

    if ( isset($_GET['frm_action']) ) {
        $frm_action = $_GET['frm_action'];
    
        if ( strpos($frm_action, '<script>') !== false || strpos($frm_action, '</script>') !== false ) {
            wp_die('Invalid input detected.');
        }
    
        $frm_action = sanitize_text_field( $frm_action );
        $frm_action = esc_html( $frm_action );
    }
    


    if($frm_action=='show'){
        include VFORM_PLUGIN_PATH."inc/admin/show-entries.php";
    }else if($frm_action=='analytics'){
        include VFORM_PLUGIN_PATH."inc/admin/show-analytics.php";
    }else{
?>

    <!-- entries -->
    <form id="myvformdata8form">
        <?php wp_nonce_field('myvformdata8','vfm-nonce8'); ?>
    </form>
    <div class="css-18e3853-PageLayout--mobile-PageLayout--tablet-PageLayout--desktop">
        <main class="css-17sl3ck-PageLayout--mainStyle">
            <div>
                <div class="css-1dxorl-HistoryPage--mobile-HistoryPage--tablet"><span class="css-1131mgd-Text"
                        data-zds="true">Vform Entries</span></div>
                <div class="css-1bt4ztp-HistoryPage--mobile-HistoryPage--tablet">
                    <div class="css-85pk7a-HistoryTabNavigation--navStyle">
                        <nav data-zds="true" class="css-14tgpsv-Tabs">
                            <div data-zds="true" class="css-uzkwfh-Tabs__primary">
                                
                                    <a aria-current="page"
                                class="css-xh4twp-Tabs__item active" data-zds="true" href="admin.php?page=vform_entries"><span
                                    data-text="[object Object]" data-zds="true" class="css-7zaj10-Tabs__itemText"><span
                                        class="css-mq6vhk-Text" data-zds="true">Entries</span></span></a>
                                        
                                        <a class="css-1uspe5b-Tabs__item" data-zds="true" href="admin.php?page=vform_entries&frm_action=analytics"><span
                                    data-text="[object Object]" data-zds="true" class="css-7zaj10-Tabs__itemText"><span
                                        class="css-mq6vhk-Text" data-zds="true">Analytics</span></span></a>
                                        
                            </div>
                            <div data-zds="true" class="css-1nu6yqo-Tabs__indicatorTrack">
                                <div data-type="default" data-zds="true" class="css-bcq1s5-Tabs__indicator"
                                    style="left: 0px; width: 126px;"></div>
                            </div>
                        </nav>
                    </div><a class="css-sx0oso-BaseButton" data-color="secondary" data-zds="true"  id="exportToCSV"
                        href="javascript:void(0)" data-icon="before" data-size="medium"><span
                            data-zds="true" class="css-x9pyp4-BaseButton__buttonContent"><span data-zds="true"
                                class="css-xmvvvu-BaseButton__buttonIcon"><span aria-hidden="true"
                                    data-testid="iconContainer" data-zds="true"
                                    class="css-6e2o9n-Icon--navBell--animate--disable-pointer-events--block--24x24"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24"
                                        width="24" size="24" name="navBell">
                                        <path fill="#2D2E2E"
                                            d="M6.72 8.9C6.93 6.15 9.25 4 12 4c2.75 0 5.07 2.15 5.28 4.9l.51 6.83L18.86 17H2.53l-.03.04V19h7a2.5 2.5 0 0 0 5 0h7v-1.96l-1.77-2.1-.46-6.19C18.99 4.96 15.79 2 12 2 8.21 2 5.01 4.96 4.73 8.75l-.46 6.19-.06.06h2.05l.46-6.1Z">
                                        </path>
                                    </svg></span></span><span data-zds="true"
                                class="css-g52fnz-BaseButton__buttonText">Export Data To CSV</span></span></a>
                </div>
                <script>
                        document.getElementById('exportToCSV').addEventListener('click', function(event) {
                            event.preventDefault(); // Prevent default behavior (like form submission or page refresh)
                            
                            // Redirect to the admin-post URL
                            window.location.href = "<?php echo admin_url('admin-post.php?action=export_csv2&id=' . intval($_GET['select']) . '&_wpnonce=' . wp_create_nonce('export_csv2_nonce')); ?>";
                        });
                    </script>
                <div data-zds="true" class="css-xeniyz-Spacer-0-by-20"></div>
                <div>
                    <div class="css-149cjty-Filters--mobile-Filters--desktop">
                        <div class="css-udwx8i-Filters--mobile-Filters--tablet-Filters--desktop-Filters--Filters">
                            <!-- <div data-zds="true" class="css-ec7vv4-DateRangePicker">
                                <div data-zds="true" class="css-dmsnls-DateRangePickerInput">
                                    <div data-icon-before="" data-layout="inline" data-size="small" data-zds="true"
                                        role="presentation" class="css-1uwc1d-Input">
                                        <div data-zds="true" class="css-ja78uo-Input__inputLayout">
                                            <div data-interactive="" data-size="small" data-zds="true"
                                                class="css-1g8hp77-Input__icon"><span aria-hidden="true"
                                                    data-testid="iconContainer" data-zds="true"
                                                    class="css-tc4ell-Icon--actionCalendar--animate--24x24"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        height="24" width="24" size="24" name="actionCalendar">
                                                        <path fill="#2D2E2E"
                                                            d="M17 4V2h-2v2H9V2H7v2H3v2h4v2h2V6h6v2h2V6h2v13H5V7.5H3V21h18V4h-4Z">
                                                        </path>
                                                        <path fill="#2D2E2E"
                                                            d="M8 12.25a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5ZM12 12.25a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5ZM16 12.25a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5ZM8 17.25a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5ZM12 17.25a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5ZM16 17.25a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5Z">
                                                        </path>
                                                    </svg></span></div><button aria-expanded="false" aria-haspopup="true"
                                                id="HistoryDateFilter" type="button" data-zds="true"
                                                class="css-b7vfpu-Input__input-DateRangePickerInput__button"
                                                fdprocessedid="68vxw"><span data-zds="true"
                                                    class="css-11ua37w-DateRangePickerInput__placeholder">Date
                                                    range</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->


                            <?php 
                                $fetfrm = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform ORDER BY id DESC", OBJECT );   
                            ?>
                            <div role="combobox" aria-haspopup="listbox" aria-owns="downshift-77-menu" aria-expanded="false"
                                class="css-mg4rdd-Typeahead--rootStyles">
                                <div data-layout="inline" data-size="small" data-zds="true" role="presentation"
                                    class="css-1uwc1d-Input" data-icon-before="">
                                    <div data-zds="true" class="css-ja78uo-Input__inputLayout">
                                        <div data-interactive="" data-size="small" data-zds="true"
                                            class="css-1g8hp77-Input__icon"><span aria-hidden="true"
                                                data-testid="iconContainer" data-zds="true"
                                                class="css-1iu3usa-Icon--miscBoltAlt--animate--24x24"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    height="24" width="24" size="24" name="miscBoltAlt">
                                                    <path fill="#2D2E2E"
                                                        d="M11 12H7.75L13 5.75V12h3.25L11 18.25V16H9v7.75L20.54 10H15V.25L3.46 14H11v-2Z">
                                                    </path>
                                                </svg></span></div>
                                                
                                            <span> <select name="select"
                                                id="formselection" fdprocessedid="xa3c2b">
                                                <option value="start">Forms</option>
                                                <?php 
                                                foreach ( $fetfrm as $v=>$f ) {

                                                    $count = $wpdb->get_var(
                                                        $wpdb->prepare(
                                                            "SELECT COUNT(*) FROM {$wpdb->prefix}vform_userinput WHERE formid = %d",
                                                            $f->id
                                                        )
                                                    );
                                                    
                                                    if ($count == null) {
                                                        $count = 0;
                                                    }



                                                        $sel = $id == $f->id ? 'selected' : '';
                                                        echo '<option '. $sel .' value="'.$f->id.'">'.$f->formname.' | Entries ('.$count.')</option>';
                                                    }
                                                ?>
                                        </select></span>
                                    </div>
                                </div>
                              
                            </div>

                            <!-- <div class="css-11nqisp-TooltipWrapper--non-interactive--hide-tooltip-on-touch-devices"><button
                                    aria-describedby="tooltip-767" aria-disabled="false" aria-label="Refresh"
                                    data-color="icon-tertiary" data-size="medium" data-square="" data-zds="true"
                                    role="button" class="css-1i65sbu-BaseButton" fdprocessedid="w5c8be"><span
                                        data-zds="true" class="css-x9pyp4-BaseButton__buttonContent"><span data-zds="true"
                                            class="css-g52fnz-BaseButton__buttonText"><span aria-hidden="true"
                                                data-testid="iconContainer" data-zds="true"
                                                class="css-1lb88l5-Icon--actionAutoRenew--animate--disable-pointer-events--block--24x24"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    height="24" width="24" size="24" name="actionAutoRenew">
                                                    <path fill="#2D2E2E"
                                                        d="M19 11v2a5 5 0 0 1-5 5H7.24l2.52-3H7.15l-3.36 4 3.35 4h2.61l-2.51-3H14a7 7 0 0 0 7-7v-2h-2ZM5 11a5 5 0 0 1 5-5h6.76l-2.52 3h2.61l3.36-4-3.36-4h-2.61l2.52 3H10a7 7 0 0 0-7 7v2h2v-2Z">
                                                    </path>
                                                </svg></span></span></span></button>
                                <div class="TooltipWrapper__content-4f0c54eb" data-testid="TooltipWrapper__content--south"
                                    data-zds="true"><span aria-hidden="true" data-testid="tooltip-null" data-zds="true"
                                        id="tooltip-767" role="tooltip" class="css-62ukpl-Tooltip--single-line"><span
                                            data-zds="true" class="css-1utf7ls-Tooltip__content">Refresh</span></span></div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div data-zds="true" class="css-1w77i7k-Spacer-0-by-40"></div>
                <div class="css-a9ir78-RunLog--rootStyle">
                    <div class="css-u3nm3l-RunLog--mobile-RunLog--desktop-RunLog--mobile-RunLog--desktop-RunLog--RunLog showwhenselect">
                        <!-- <span class="css-10enov2-RunLog--selectStyle">
                            <div aria-label="List of selection options" role="combobox" aria-expanded="false"
                                aria-haspopup="listbox" data-zds="true" class="css-76m758-Dropdown">
                                <div data-zds="true" class="css-1wq8it6-Dropdown__buttonWrap">
                                    <div data-icon-after="" data-layout="inline" data-size="medium" data-zds="true"
                                        role="presentation" class="css-1uwc1d-Input">
                                        <div data-zds="true" class="css-ja78uo-Input__inputLayout">
                                            
                                            <button
                                                aria-expanded="false" aria-haspopup="true" aria-label="Select shown"
                                                type="button" data-zds="true"
                                                class="css-bijidy-Input__input-Dropdown__button" fdprocessedid="52fux"><span
                                                    data-zds="true" class="css-1x1zzmj-Dropdown__buttonText">
                                                    <div class="css-rcr2z6-ListSelectionDropdown--ListSelectionDropdown">
                                                        <span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                                                            class="css-uyq60i-Icon--formDashSquare--animate--18x18"><svg
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" height="18" width="18" size="18"
                                                                name="formDashSquare">
                                                                <path fill="#2D2E2E" d="M21 3H3v18h18V3Zm-4 10H7v-2h10v2Z">
                                                                </path>
                                                            </svg></span></div>
                                                </span>
                                            
                                            </button>

                                            <div data-size="medium" data-zds="true" class="css-1g8hp77-Input__icon"><span
                                                    aria-hidden="true" data-testid="iconContainer" data-zds="true"
                                                    class="css-15bvmql-Icon--arrowDropdown--animate--24x24"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        height="24" width="24" size="24" name="arrowDropdown">
                                                        <path fill="#2D2E2E"
                                                            d="m12 3.69-5 4.2v2.61l5-4.19 5 4.19V7.89l-5-4.2ZM7 13.5v2.61l5 4.2 5-4.2V13.5l-5 4.19-5-4.19Z">
                                                        </path>
                                                    </svg></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span> -->
                        <span class="css-j7gs68-RunLog--actionsStyle">
                            <div class="css-7eaztn-RunActions--mobile-RunActions--tablet-RunActions--desktop"><button
                                    aria-disabled="false" data-color="secondary" data-icon="before" data-size="medium"
                                    data-zds="true" role="button" class="css-1i65sbu-BaseButton"
                                    fdprocessedid="mfyjsc"><span data-zds="true"
                                        class="css-x9pyp4-BaseButton__buttonContent"><span data-zds="true"
                                            class="css-xmvvvu-BaseButton__buttonIcon"><span aria-hidden="true"
                                                data-testid="iconContainer" data-zds="true"
                                                class="css-1qjyj44-Icon--actionTrash--animate--disable-pointer-events--block--24x24"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    height="24" width="24" size="24" name="actionTrash">
                                                    <path fill="#2D2E2E"
                                                        d="M15.98 20H8.02L7.19 9h-2l.97 13h11.68l.97-13h-2l-.83 11ZM20.41 4.55l-.34-1.97-5.12.89-1-.84-4.86.86-.65 1.13-5.12.89.35 1.98 16.74-2.94Z">
                                                    </path>
                                                </svg></span></span><span data-zds="true"
                                            class="css-g52fnz-BaseButton__buttonText makemyentrydel">Delete</span></span></button></div>
                        </span>
                    </div>
                    <div data-testid="TaskList" class="css-1l3tuom-RunList--mobile-RunList--tablet">
                       
                    
                                                
                        <?php

                            $chk = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform", OBJECT );  

                            if(count($chk)==0){
                            echo '<b class="createfirst">Create your Vform for getting entries</b>';
                            }else{

                        ?>

                        <?php

                            function getValueByKeyword2($array, $keyword) {
                                foreach ($array as $key => $value) {
                                    $parts = explode('__', $key);
                                    if (count($parts) > 1 && $parts[0] === $keyword) {
                                        return $value;
                                    }
                                }
                                return null;
                            }


                            $getvfid = $id;
$setdata = $getvfid != '' ? $getvfid : null;

// Define the current page and number of records per page
$records_per_page = 10;
$current_page = isset($_GET['pages']) && is_numeric($_GET['pages']) ? intval($_GET['pages']) : 1;

// Calculate the offset for the SQL query
$offset = ($current_page - 1) * $records_per_page;

if ($setdata) {
    // Count total records for a specific formid
    $total_records_query = "SELECT COUNT(*) FROM {$wpdb->prefix}vform_userinput WHERE formid = %d";
    $total_records = $wpdb->get_var($wpdb->prepare($total_records_query, $setdata));

    // Fetch records for the current page for a specific formid
    $query = "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE formid = %d ORDER BY id DESC LIMIT %d OFFSET %d";
    $prepared_query = $wpdb->prepare($query, $setdata, $records_per_page, $offset);
} else {
    // Count total records for all records
    $total_records_query = "SELECT COUNT(*) FROM {$wpdb->prefix}vform_userinput";
    $total_records = $wpdb->get_var($total_records_query);

    // Fetch records for the current page for all records
    $query = "SELECT * FROM {$wpdb->prefix}vform_userinput ORDER BY id DESC LIMIT %d OFFSET %d";
    $prepared_query = $wpdb->prepare($query, $records_per_page, $offset);
}

$total_pages = ceil($total_records / $records_per_page);

// Fetch the results
$vformdata2 = $wpdb->get_results($prepared_query, OBJECT);



                            // $query = "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE formid = %d ORDER BY id DESC";
                            // $prepared_query = $wpdb->prepare($query, $setdata);
                            // $vformdata2 = $wpdb->get_results($prepared_query, OBJECT);
                            // print_r($vformdata2);

                            if(empty($vformdata2) || empty($_GET['select'])){    
                                echo "<style>#exportToCSV{display:none!important;}</style>";
                            }
                            foreach ( $vformdata2 as $keyone2=>$valueone2 ) {

                                // echo "<pre>";
                                // print_r($valueone2);

                                $dataObject = json_decode($valueone2->maindatabody);
                                // print_r($dataObject);

                                $fname = getValueByKeyword2($dataObject, 'name');
                                $firstname = $fname[0];
                                $lastname = $fname[2];

                                $getemail = getValueByKeyword2($dataObject, 'email');

                                $email = $getemail[0];
                                
                                $ip = $valueone2->ip;
                                $entrydate = $valueone2->currentdate; 

                                $form_id = intval($valueone2->formid); // Assuming formid is an integer
                                $query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
                                $mainform = $wpdb->get_results($wpdb->prepare($query, $form_id), OBJECT);


                                // $mainform = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform WHERE id='$valueone2->formid'", OBJECT );
                                foreach ( $mainform as $k=>$v ) {
                                    $formname = $v->formname;
                                }

                                $tmtake = stripslashes($valueone2->usertimetakes);
                                $objvform = json_decode(html_entity_decode(esc_html($tmtake)), true);
                                $fulltimetkvform =$objvform['minute'] . " Minute " . $objvform['second']." Seconds";


                            ?>

                         <ul class="css-dxlbbx-List--rootStyle-List--rootWithGap-List--List">
                            <li><a class="css-sn0eve-ListItem--linkStyle" data-zds="true"
                                    href="?page=vform_entries&frm_action=show&id=<?php echo $valueone2->id; ?>"
                                    role="button" tabindex="0" >
                                    <div class="css-12bs45s-ListItem--mobile-ListItem--tablet-ListItem--clickableStyle-ListItem--item">
                                        <div data-testid="TaskRow"
                                            class="css-1a0m0tq-RunRow--rootBaseStyle-RunRow--mobile-RunRow--tablet-RunRow--desktop-RunRow--RunRow">
                                            <label for="00929409-9b21-a663-d57e-3b0be2aed5a1select"
                                                class="css-qprtuo-RunRow--checkStyle"><span data-zds="true"
                                                    class="css-16lytca-BooleanInput"><span data-zds="true"
                                                        class="css-19t2nt6-BooleanInput__inner"><input 
                                                            type="checkbox" data-zds="true"
                                                            class="css-1l1twqa-BooleanInput__layer "
                                                            value="<?php echo $valueone2->id; ?>"></span></span></label>
                                            <div class="css-6twdqc-RunRow--gridArea">
                                                <div class="css-3ks6d1-TooltipWrapper--non-interactive">
                                                    <div aria-describedby="tooltip-841" class="css-1ijz1tw-RunStatus--root">
                                                        <div
                                                            class="css-12vslhp-RunStatusIcon--root-RunStatusIcon--RunStatusIcon">
                                                            <span aria-hidden="true" data-testid="iconContainer"
                                                                data-zds="true"
                                                                class="css-1tilx24-Icon--formCheck--animate--24-5x24-5--neutral100"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" height="24.5" width="24.5"
                                                                    size="24.5" color="neutral100" name="formCheck">
                                                                    <path fill="#2D2E2E"
                                                                        d="m18.51 6.82-8.26 8.27-4.43-4.43-1.41 1.41 5.84 5.84 9.68-9.67-1.42-1.42Z">
                                                                    </path>
                                                                </svg></span></div>
                                                        <div class="css-1pqt682-RunStatus--info"><span
                                                                class="css-19w892g-RunStatus--title">Success</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="css-t16dfd-RunRow--infoStyle"><span
                                                    class="css-1tin7md-RunRow--mobile-RunRow--desktop"><span
                                                        class="css-ip2aev-Text" data-zds="true"><?php echo $firstname.' '.$lastname; ?>
                                                       </span></span><span class="css-howwmv-Text"
                                                    data-zds="true"><time> (<?php echo $email==''?'No Email':$email; ?>)</time></span></div>
                                            <div class="css-10n4drr-RunRow--gridArea">
                                                <ul aria-label="2 apps mentioned" data-zds="true"
                                                    class="css-1yxvc9g-ServiceIcons">
                                                    <li data-zds="true"><span data-zds="true" data-testid="ServiceIconShell"
                                                            class="css-157ag22-ServiceIconShell"><svg
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" height="18" width="18" size="18"
                                                                color="BrandOrange" name="miscBoltAltFill">
                                                                <path fill="#2D2E2E"
                                                                    d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z">
                                                                </path>
                                                            </svg></span></li>
                                                </ul>
                                            </div>
                                            <div class="css-19p6qdt-RunRow--gridArea-RunRow--RunRow">
                                                <div>
                                                    <div class="css-93aps9-Text" data-zds="true"><?php echo $entrydate; ?></div>
                                                    <!-- <div class="css-kmr9m-Text" data-zds="true"></div> -->
                                                </div>
                                            </div>
                                            <div class="css-yj0dgb-RunRow--gridArea"></div>
                                            <div class="css-ihoulf-RunRow--gridArea" style="
                                                            ">
                                                <div class="css-1oekjl3-TooltipWrapper--non-interactive">
                                                    <div aria-label="Deborah Marlor" data-block="true" data-size="40"
                                                        data-testid="Avatar" data-zds="true" role="img"
                                                        class="css-1o9bhyn-Avatar"><span>DM</span></div>
                                                </div>
                                            </div>
                                            <div class="css-mfpxnw-RunRow--gridArea-RunRow--RunRow">
                                                <div class="css-gn6txh-TooltipWrapper">
                                                    <div class="css-1qc9a8b-Arrow--arrowStyle"><span aria-hidden="true"
                                                            data-testid="iconContainer" data-zds="true"
                                                            class="css-1mc3do1-Icon--arrowBigRight--animate--26x26--currentColor"><svg
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" height="26" width="26" size="26"
                                                                color="currentColor" name="arrowBigRight">
                                                                <path fill="#2D2E2E"
                                                                    d="M16.86 11H4v2h12.86l-5.04 6h2.62l5.86-7-5.86-7h-2.62l5.04 6Z">
                                                                </path>
                                                            </svg></span></div>
                                                    <div class="TooltipWrapper__content-4f0c54eb"
                                                        data-testid="TooltipWrapper__content--southeast" data-zds="true">
                                                        <span aria-hidden="true" data-testid="tooltip-null" data-zds="true"
                                                            id="tooltip-843" role="tooltip"
                                                            class="css-62ukpl-Tooltip--single-line"><span data-zds="true"
                                                                class="css-1utf7ls-Tooltip__content"><span>View run
                                                                    details</span></span></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a></li>
                         </ul>

                         <?php } ?>


                        <div class="css-8xnviz-RunList--pageStyle">
                            <nav data-zds="true" class="css-g8nh65-Paginator">

                                                <?php

                                                // Previous Button
                                                if ($current_page > 1) {
                                                    $prev_page = $current_page - 1;
                                                    echo "<a aria-label='Previous page ($prev_page)' class='css-sx0oso-BaseButton' data-color='icon-secondary' data-zds='true' data-size='small' href='admin.php?page=vform_entries&select=".$_GET['select']."&pages=$prev_page'>
                                                            <span data-zds='true' class='css-x9pyp4-BaseButton__buttonContent'>
                                                                <span data-zds='true' class='css-g52fnz-BaseButton__buttonText'>
                                                                    <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' height='24' width='24'>
                                                                        <path fill='#2D2E2E' d='m9.3 12 5.88-7h-2.62L6.7 12l5.86 7h2.62L9.3 12Z'></path>
                                                                    </svg>
                                                                </span>
                                                            </span>
                                                        </a>";
                                                }

                                                // Generate pagination links
                                            for ($i = 1; $i <= $total_pages; $i++) {
                                                $is_active = $i == $current_page ? 'data-color="primary-alt"' : 'data-color="number"';
                                                echo "<a class='css-sx0oso-BaseButton' $is_active data-zds='true' data-size='small' href='admin.php?page=vform_entries&select=".$_GET['select']."&pages=$i'>
                                                        <span data-zds='true' class='css-x9pyp4-BaseButton__buttonContent'>
                                                            <span data-zds='true' class='css-g52fnz-BaseButton__buttonText'>$i</span>
                                                        </span>
                                                    </a>";
                                            }


                                            // Next Button
                                                if ($current_page < $total_pages) {
                                                    $next_page = $current_page + 1;
                                                    echo "<a aria-label='Next page ($next_page)' class='css-sx0oso-BaseButton' data-color='icon-secondary' data-zds='true' data-size='small' href='admin.php?page=vform_entries&select=".$_GET['select']."&pages=$next_page'>
                                                            <span data-zds='true' class='css-x9pyp4-BaseButton__buttonContent'>
                                                                <span data-zds='true' class='css-g52fnz-BaseButton__buttonText'>
                                                                    <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' height='24' width='24'>
                                                                        <path fill='#2D2E2E' d='M11.44 5H8.82l5.88 7-5.88 7h2.62l5.86-7-5.86-7Z'></path>
                                                                    </svg>
                                                                </span>
                                                            </span>
                                                        </a>";
                                                }
                                            ?>
                                       
                            </nav>
                        </div>
                        <?php
                        }
                        ?>
                    
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- entries -->

    <form id="myvformdata6form">
        <?php wp_nonce_field('myvformdata6','vfm-nonce6'); ?>
    </form>
    <div class="frm-admin-footer-links">
        <span class="frm-admin-footer-links-text">Feel free to support ❤</span>
        <div class="frm-admin-footer-links-nav">
            <a href="https://paypal.me/VikasRatudi" class='vform-donate' target="_blank">Donate</a>
        </div>
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSd8PHmbrNkcUw39TgpcKUsop333_-nT3QslwF0BRtjV7F00bw/viewform?usp=header" target="_blank">Vform PRO</a>
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSc4m1j-tABpqNEvAgAqQBIa2v7C8glvPve7YEIIbiGWtkQ7Sw/viewform?usp=header" target="_blank">Tech Support</a>
    </div>

<?php } ?>




<div id="vform-plugin-preloader" style="position: fixed; top: 0;left: 0; right: 0;bottom: 0;-moz-background-size:64px 64px;-o-background-size:64px 64px;-webkit-background-size:64px 64px;background-size:64px 64px;z-index: 99998;width:100%;height:100%;display:block;display: flex;justify-content: center;align-items: center; background: #fff;">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="50" width="50" color="zapier" name="miscBoltAltFill">
      <path fill="#ff4f00" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z">
      </path>
  </svg>
</div>
<script>
  window.addEventListener('load', function() {
    var preloader = document.getElementById('vform-plugin-preloader');
      preloader.remove(); 
      document.getElementById('showmyvform').style.display = 'block';
  });
</script>