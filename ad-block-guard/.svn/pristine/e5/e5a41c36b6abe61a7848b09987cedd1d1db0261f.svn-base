document.addEventListener('DOMContentLoaded', function() {
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            const elements = document.querySelectorAll('[data-hint], [data-intro]');
            if (elements.length > 0) {
                introJs()
                    .onchange(function(targetElement) {
                        // Check if the current step is the one before the tab change
                        if (targetElement.getAttribute('data-step') === '2') {
                            // Find the button with the text "Overlay Settings Per Role"
                            const tabs = document.querySelectorAll('.cf-container__tabs-item button');
                            tabs.forEach(function(tab) {
                                if (tab.textContent.trim() === 'Overlay Settings Per Role') {
                                    tab.click();

                                    // Wait for the tab content to load, then proceed
                                    setTimeout(function() {
                                        introJs().nextStep();
                                    }, 1000); // Adjust delay as necessary
                                }
                            });
                        }
                    })
                    .start();

                observer.disconnect(); // Stop observing after initialization
            }
        });
    });

    observer.observe(document.body, { childList: true, subtree: true });
});
