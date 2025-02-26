<?php 
/*
*
*	***** Addresser *****
*
*	Core Functions
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
/*
*
* Custom Front End Ajax Scripts / Loads In WP Footer
*
*/
function addresser_frontend_ajax_form_scripts(){
?>
<script type="text/javascript">
jQuery(function($){
    var progress = null;
    var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";

    // Addresser Widget
    $(document).on("keyup", "#addresser-search", function(){
        var search = $(this).val();
        $("#addresser-autocomplate-section").html('');
        $('#addresser-details').html('');
        progress = $.ajax({
            type: 'POST',
            data: 'action=addresser_getautocomplete_frontend_ajax&search=' + search,
            url: ajaxurl,
            beforeSend : function() {
                if(progress != null) {
                    progress.abort();
                }
            },
            success: function(results) {
                if (results.data.hasOwnProperty("errorCode")) {
                    $('.addresser-autocomplate').remove();
                }else{
                    if (results.data.length > 0) {
                        $('#addresser-autocomplate-section').append('<div class="addresser-autocomplate"><div class="addresser-autocomplate-data"><ul class="addresser-autocomplate-list"></ul></div></div>');
                        $.each(results.data, function(index, item) {
                            if(item.FULL_ADDRESS != undefined){
                                $(".addresser-autocomplate-list").append('<li class="addresser-autocomplete-widget-list-item"  data-id='+item._id+'>'+item.FULL_ADDRESS+'</li>');
                            }
                        });
                    }
                }
            },
            complete: function(){
                progress = null;
            }
        });
    });

    // Append text in input start
    $(document).on("click",".addresser-autocomplete-widget-list-item", function(){
        $("#addresser-search").val($(this).text());
        $("#addresser-search").attr('data-id',$(this).attr('data-id'));
        $('.addresser-autocomplate').remove();

    });
    // Append text in input end

    $("#addresser-form").submit(function(e){
        e.preventDefault();
        var search = $("#addresser-search").val();
        var id = $("#addresser-search").attr('data-id');
        var data = {
            'action': 'addresser_getmetadata_frontend_ajax',
            'search':  search,
            'id':   id,
        };
        $.post(ajaxurl, data, function(results) {
            if(results.data.length > 0){
                var FULL_ADDRESS = results.data[0]['FULL_ADDRESS'];
                var DELIVY_POINT_ID = results.data[0]['DELIVY_POINT_ID'];
                var BLDG_PROP_NAME_1 = results.data[0]['BLDG_PROP_NAME_1'];
                var DPID_BAR_CODE = '';
                var LOT_NBR = results.data[0]['LOT_NBR'];
                var LOCALITY_DID = results.data[0]['LOCALITY_DID'];
                var POSTAL_DELIVERY_TYPE = results.data[0]['POSTAL_DELIVERY_TYPE'];
                var DELIVY_POINT_GROUP_DID = results.data[0]['DELIVY_POINT_GROUP_DID'];
                var POSTAL_DELIVERY_NBR = results.data[0]['POSTAL_DELIVERY_NBR'];
                var FLAT_UNIT_TYPE = results.data[0]['FLAT_UNIT_TYPE'];
                var FLOOR_LEVEL_NBR = results.data[0]['FLOOR_LEVEL_NBR'];
                var STREET_NUMBER = '';
                var STREET_TYPE = results.data[0]['STREET_TYPE'];
                var STREET_NAME = results.data[0]['STREET_NAME'];
                var GNAF_NUMBER_LAST_SUFFIX = results.data[0]['GNAF_NUMBER_LAST_SUFFIX'];
                var STREET_NAME_2 = results.data[0]['GNAF_POSTCODE'];
                var GNAF_POSTCODE = results.data[0]['GNAF_POSTCODE'];
                var LOCALITY_NAME = results.data[0]['LOCALITY_NAME'];
                var GNAF_LATITUDE = results.data[0]['GNAF_LATITUDE'];
                var STATE = results.data[0]['STATE'];
                var GNAF_LONGITUDE = results.data[0]['GNAF_LONGITUDE'];

                $addressDetails = '<ul class="addresser-details-list"><li class="addresser-details-item-main"><p>Complete Address:<span>'+FULL_ADDRESS+'</span></p></li><li class="addresser-details-item"><p>DPIDs:<span>'+DELIVY_POINT_ID+'</span></li><li class="addresser-details-item"><p>Building Name:<span>'+BLDG_PROP_NAME_1+'</span></li><li class="addresser-details-item"><p>DPID Bar Code:<span>'+DPID_BAR_CODE+'</span></li><li class="addresser-details-item"><p>Lot number:<span>'+LOT_NBR+'</span></li><li class="addresser-details-item"><p>Locality DID:<span>'+LOCALITY_DID+'</span></li><li class="addresser-details-item"><p>Post delivery type:<span>'+POSTAL_DELIVERY_TYPE+'</span></li><li class="addresser-details-item"><p>Group DIPID:<span>'+DELIVY_POINT_GROUP_DID+'</span></li><li class="addresser-details-item"><p>Post delivery number:<span>'+POSTAL_DELIVERY_NBR+'</span></li><li class="addresser-details-item"><p>Flat Unit Number:<span>'+FLAT_UNIT_TYPE+'</span></li><li class="addresser-details-item"><p>Floor Level Number:<span>'+FLOOR_LEVEL_NBR+'</span></li><li class="addresser-details-item"><p>Street number:<span>'+STREET_NUMBER+'</span></li><li class="addresser-details-item"><p>Street Type:<span>'+STREET_TYPE+'</span></li><li class="addresser-details-item"><p>Street:<span>'+STREET_NAME+'</span></li><li class="addresser-details-item"><p>Street number 2 Sufix:<span>'+GNAF_NUMBER_LAST_SUFFIX+'</span></li><li class="addresser-details-item"><p>Street number 2:<span>'+STREET_NAME_2+'</span></li><li class="addresser-details-item"><p>Postcode:<span>'+results.data[0]['GNAF_STREET_TYPE_ABBR']+'</span></li><li class="addresser-details-item"><p>Street number 2 Sufix:<span></span></li><li class="addresser-details-item"><p>Postcode:<span>'+results.data[0]['GNAF_POSTCODE']+'</span></li><li class="addresser-details-item"><p>Latitude:<span>'+results.data[0]['GNAF_LATITUDE']+'</span></li><li class="addresser-details-item"><p>Longitude:<span>'+GNAF_POSTCODE+'</span></li><li class="addresser-details-item"><p>Locality:<span>'+LOCALITY_NAME+'</span></li><li class="addresser-details-item"><p>Latitude:<span>'+GNAF_LATITUDE+'</span></li><li class="addresser-details-item"><p>State:<span>'+STATE+'</span></li><li class="addresser-details-item"><p>Longitude:<span>'+GNAF_LONGITUDE+'</span></li></ul>';
                $("#addresser-details").html($addressDetails);
            }
        });
    });
    

    // Checkout page ajax
    var checkoutEnable = '<?php echo get_option( "wc_addressers_tab_checkout_page" ); ?>';
    if(checkoutEnable == 'yes'){
        $(document).on("keyup", "#billing_address_1", function(){
            var search = $(this).val();
            $('.addresser-autocomplate').remove();
            progress = $.ajax({
                type: 'POST',
                data: 'action=addresser_getautocomplete_frontend_ajax&search=' + search,
                url: ajaxurl,
                beforeSend : function() {
                    if(progress != null) {
                        progress.abort();
                    }
                },
                success: function(results) {
                    if (results.data.hasOwnProperty("errorCode")) {
                        $('.addresser-autocomplate').remove();
                    }else{
                        
                        if (results.data.length > 0) {
                            $('#billing_address_1_field').append('<div class="addresser-autocomplate"><div class="addresser-autocomplete-info"><h3 class="addresser-autocomplete-title">Suggestions</h3><button class="addresser-close">×</button></div><div class="addresser-autocomplate-data"><ul class="addresser-autocomplate-list"></ul></div></div>');
                            $.each(results.data, function(index, item) {
                                if(item.FULL_ADDRESS != undefined){
                                    $(".addresser-autocomplate-list").append('<li class="addresser-autocomplete-list-item"  data-id='+item._id+'>'+item.FULL_ADDRESS+'</li>');
                                }
                            });
                        }else{
                            $('.addresser-autocomplate').remove();
                        }
                    }
                }
            });
        });

        // Autofields all the fields 
        $(document).on("click",".addresser-autocomplete-list-item", function(){
            var search = $(this).text();
            $("#billing_address_1").val($(this).text());
            $("#shipping_address_1").val($(this).text());
            var id = $(this).attr('data-id');
            $('.addresser-autocomplate').remove();
            var data = {
                'action': 'addresser_getmetadata_frontend_ajax',
                'search':   search,
                'id':   id,
            }; 
            $.post(ajaxurl, data, function(results) {
                $("#billing_country").select2().val("AU").trigger("change");
                $("#billing_postcode").val(results.data[0]['POSTCODE']);
                $("#billing_state").select2().val(results.data[0]['STATE']).trigger("change");
                $("#billing_city").val(results.data[0]['LOCALITY_NAME']);

                $("#shipping_country").select2().val("AU").trigger("change");
                $("#shipping_postcode").val(results.data[0]['POSTCODE']);
                $("#shipping_state").select2().val(results.data[0]['STATE']).trigger("change");
                $("#shipping_city").val(results.data[0]['LOCALITY_NAME']);
            });
        });

        $(document).on('click','.addresser-close', function(e){
            e.preventDefault();
            $('.addresser-autocomplate').remove();
        });
        
    }


}(jQuery)); 
</script>
<?php }
add_action('wp_footer','addresser_frontend_ajax_form_scripts');