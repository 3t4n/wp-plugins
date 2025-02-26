document.addEventListener('DOMContentLoaded', (event) => {
    // Function to get URL parameters
    function getUrlParameter(name, source) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(source);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    // Function to fire gtag event
    function fireGtagEvent(eventType, url) {
        // Get URL parameters
        const url_utm_source = getUrlParameter('utm_source', url);
        const url_utm_campaign = getUrlParameter('utm_campaign', url);
        const split_utm_campaign = url_utm_campaign.split('_');
        const url_utm_content = split_utm_campaign.length > 2 ? split_utm_campaign[2] : '';
        const url_index = split_utm_campaign.length > 0 ? split_utm_campaign[0] : '';
        const url_origin = split_utm_campaign.length > 1 ? split_utm_campaign[1] : '';
        
      


        // Fire gtag event
        gtag("event", eventType, {
            creative_name: url_utm_source,
            creative_slot: url_utm_campaign,
            promotion_id: url_utm_campaign,
            promotion_name: url_utm_source,
            plugin: "ai-eshop-optimizer",
            post_type: "product",
            send_to: myLocalizedData.aieo_google_ga4,
            items: [
                {
                    item_id: url_utm_content,
                    item_name: url_utm_content,
                    index: url_index,
                    item_list_id: url_origin,
                    item_list_name: url_origin,
                    quantity: 1
                }
            ]
        });
    }

    // Fire view_promotion event on page load
    fireGtagEvent("view_promotion", window.location.href);

    // Add event listener to all add_to_cart_button elements
    document.querySelectorAll('.add_to_cart_button').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default action
            // Get URL from the clicked button
            const url = e.target.href || e.currentTarget.href;
            // Fire select_promotion event on button click
            fireGtagEvent("select_promotion", url);
            // Proceed to the link
            window.location.href = url;
        });
    });
});
