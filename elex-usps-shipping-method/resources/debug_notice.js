jQuery(document).ready(function(){

    jQuery(document.body).on("updated_checkout",async function(){
        console.clear();
        await getUspsDebugLogs();
    });

    jQuery(document.body).on("updated_cart_totals",async function(){
        console.clear();
        await getUspsDebugLogs();
    });


    if(window?.wp?.data?.select('wc/store/cart')?.getCartData()){
       
        localStorage.setItem('elex-usps-debug-data',JSON.stringify(wp.data.select('wc/store/cart').getCartData()));

        wp.data.subscribe(async () =>{

            if(
                localStorage.getItem('elex-usps-debug-data') !== JSON.stringify(wp.data.select('wc/store/cart').getCartData())
            ){
                await getUspsDebugLogs();
            }

            localStorage.setItem('elex-usps-debug-data',JSON.stringify(wp.data.select('wc/store/cart').getCartData()));


        });

    }

});

async function getUspsDebugLogs(){

      const response = await jQuery.ajax({
        type: "get",
        url: elex_usps_console.ajax_url,
        data:{
            action: "elex_usps_get_debug_logs",
            _ajax_nonce: elex_usps_console.nonce,
        },
        dataType: "json",
    });
    if(response?.success && response?.data){
        const responseData =response?.data;
        if(responseData?.elex_usps_debug_logs){
            console.log(
                responseData?.elex_usps_debug_logs
                    ?.replaceAll("%colored_text_start%", "%c")
                    ?.replaceAll("%colored_text_end%", "%c"),
                responseData?.elex_usps_debug_logs?.includes("%colored_text_start%")
                    ? "color: red"
                    : "",
			    responseData?.elex_usps_debug_logs?.includes("%colored_text_end%")
                    ? "color: initial"
                    : ""
            )
        }
        
    }
}