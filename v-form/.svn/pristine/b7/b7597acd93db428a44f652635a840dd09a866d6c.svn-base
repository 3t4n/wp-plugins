<?php
defined('ABSPATH') || die("Nice try");
global $wpdb;

$id = '';
if ( isset($_GET['id']) ) {
    $id = $_GET['id'];  // Get the raw input
  
    if ( strpos($id, '<script>') !== false || strpos($id, '</script>') !== false ) {
        // If found, exit the condition or display an error message
        wp_die('Invalid input detected.');
    }
  
    $id = sanitize_text_field( $id ); // Sanitize the input
    $id = esc_html( $id );
  }
  

$getid = $id;

if($getid!=''){

    // $fetfrm = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE id='".$getid."'", OBJECT );   

    $id = intval($getid); // Assuming `id` is an integer
    $query = "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE id = %d";
    $fetfrm = $wpdb->get_results($wpdb->prepare($query, $id), OBJECT);


    foreach ( $fetfrm as $v=>$f ) {
        $ip = $f->ip;
        $browser = $f->browser;
        $currentdate = $f->currentdate;

        $tmtake = stripslashes($f->usertimetakes);
        $objvform = json_decode(html_entity_decode(esc_html($tmtake)), true);
        $fulltimetkvform =$objvform['minute'] . " Minute " . $objvform['second']." Seconds";

    }


?>
<div class="mainwrap">
    <div class="css-0">
        <div class="css-q919xu">
            <div class="css-ubhhzq">
                <h2 class="css-18cy5i1 css-72qqz6-Text" data-zds="true">Entry Details</h2>

                <div>
                    <a href="javascript:void(0)" id="backButton" class="css-sx0oso-BaseButton">Back to Entries</a>
                    <button onclick="exportToCSV()" class="css-sx0oso-BaseButton">Export Data to CSV</button>
                </div>  

            </div>
            <div class="css-ubhhzq"><button id="react-aria5526282011-:rd:" data-size="medium" data-zds="true"
                    type="button" aria-labelledby="react-aria5526282011-:ri: react-aria5526282011-:re:"
                    aria-haspopup="listbox" aria-expanded="false" class="css-1thdzl4" data-rac=""
                    fdprocessedid="92gm2i"><span id="react-aria5526282011-:ri:" data-size="medium" data-zds="true"
                        class="css-143ceu1" data-rac=""><b>Submitted:</b> <?php echo $currentdate; ?></span></button><button
                    id="react-aria5526282011-:rd:" data-size="medium" data-zds="true" type="button"
                    aria-labelledby="react-aria5526282011-:ri: react-aria5526282011-:re:" aria-haspopup="listbox"
                    aria-expanded="false" class="css-1thdzl4" data-rac="" fdprocessedid="92gm2i"><span
                        id="react-aria5526282011-:ri:" data-size="medium" data-zds="true" class="css-143ceu1"
                        data-rac=""><b>User Time Take:</b> <?php echo $fulltimetkvform; ?></span></button><button
                    id="react-aria5526282011-:rd:" data-size="medium" data-zds="true" type="button"
                    aria-labelledby="react-aria5526282011-:ri: react-aria5526282011-:re:" aria-haspopup="listbox"
                    aria-expanded="false" class="css-1thdzl4" data-rac="" fdprocessedid="92gm2i"><span
                        id="react-aria5526282011-:ri:" data-size="medium" data-zds="true" class="css-143ceu1"
                        data-rac=""> <b>IP Address:</b> <?php echo $ip; ?></span></button></div>
            <div class="css-1hv24vz">
                <div class="css-1hef856">

                    <?php
                                
                        foreach ($fetfrm as $v => $f) {
                            $dataArray = json_decode($f->maindatabody, true); // Use associative array for easier access
                            if (isset($dataArray['ct_bot_detector_event_token'])) {
                                unset($dataArray['ct_bot_detector_event_token']);
                            }
                            if (isset($dataArray['apbct_visible_fields'])) {
                                unset($dataArray['apbct_visible_fields']);
                            }
                            foreach ($dataArray as $key => $value) {
                                if (!empty($value)) {
                                    $parts = explode('__', $key);
                                    
                                    // Check if $parts[1] exists before accessing it
                                    if (isset($parts[1]) && !empty($parts[1])) {
                                        $subParts = explode('~', $parts[1]);
                                    } else {
                                        $subParts = $parts;
                                    }
                                    
                                    // Convert $subParts to a header string
                                    $header = implode(' ', str_replace('~', ' ', $subParts));
                                    
                                    // Ensure $value is an array before using implode, otherwise use it directly
                                    $valueString = is_array($value) ? implode(' ', $value) : $value;
                        ?>

                            <div class="css-12cugid">
                                <div class="css-1tsa7cf">
                                    <div class="css-13tjqn0"><span
                                            class="css-37ysfe-Icon--miscBoltAltFill--animate--18x18--BrandOrange"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="18"
                                                width="18" size="18" color="BrandOrange" name="miscBoltAltFill">
                                                <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                                            </svg></span></div><a href="javascript:void(0)" class="css-fonis0"><?php echo $header.': '.htmlspecialchars($valueString); ?></a>
                                </div>
                            </div>

                        <?php
                                }
                            }
                        }
                    
                    ?>

                  

                   
                </div>
            </div>
            <div class="css-ubhhzq"><button id="react-aria5526282011-:rd:" data-size="medium" data-zds="true"
                    type="button" aria-labelledby="react-aria5526282011-:ri: react-aria5526282011-:re:"
                    aria-haspopup="listbox" aria-expanded="false" class="css-1thdzl4" data-rac=""
                    fdprocessedid="92gm2i"><span id="react-aria5526282011-:ri:" data-size="medium" data-zds="true"
                        class="css-143ceu1" data-rac=""><b>Browser/OS:</b> <?php echo $browser; ?></span></button></div>
        </div>
    </div>
                        <br>
                        <br>
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
    <br>

</div>

<?php  } ?>

<script>
document.getElementById("backButton").addEventListener("click", function() {
    history.back();
});

function exportToCSV() {
    window.location.href = "<?php echo admin_url('admin-post.php?action=export_csv&id=' . intval($_GET['id']) . '&_wpnonce=' . wp_create_nonce('export_csv_nonce')); ?>";
}
</script>   