function adjustIframeHeight(event) {
    if (event.origin === "https://www.enneagramzoom.com") {
        var iframe = document.getElementById("syndicated-horoscope-iframe");
        var parentContainer = document.getElementById("ez-iframe-container"); // Ensure this ID exists in your HTML
        
        if (iframe && event.data) {
            console.log("Received height:", event.data); // Log the received height data
            var newHeight = parseInt(event.data) + 150; // Add 150 pixels to the received height
            console.log("Setting iframe height to:", newHeight + "px"); // Log the final height set for the iframe
            iframe.style.height = newHeight + "px"; // Set the new height for the iframe

            // Adjust parent container height if it exists
            if (parentContainer) {
                var newParentHeight = newHeight + 100; // Slightly larger than iframe height
                console.log("Setting parent container height to:", newParentHeight + "px");
                parentContainer.style.height = newParentHeight + "px"; 
            }
        } else {
            if (!iframe) {
                console.error("Failed to find iframe with id 'syndicated-horoscope-iframe'.");
            }
            if (!event.data) {
                console.error("No data received with the message event.");
            }
        }
    } else {
        console.error("Message received from unauthorized origin:", event.origin);
    }
}
window.addEventListener("message", adjustIframeHeight, false);
