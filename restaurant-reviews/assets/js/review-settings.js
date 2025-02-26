document.addEventListener('DOMContentLoaded', function () {
    // Collapsible Instructions
    const toggleButton = document.getElementById('toggle-instructions');
    const instructionsContent = document.getElementById('instructions-content');

    if (toggleButton && instructionsContent) {
        toggleButton.addEventListener('click', function () {
            if (instructionsContent.style.display === 'none') {
                instructionsContent.style.display = 'block';
                toggleButton.textContent = toggleButton.getAttribute('data-hide-text');
            } else {
                instructionsContent.style.display = 'none';
                toggleButton.textContent = toggleButton.getAttribute('data-show-text');
            }
        });
    }

    // Tab Navigation
    const tabs = document.querySelectorAll('.ptenm-restaurant-reviews-nav-tab');
    const panes = document.querySelectorAll('.ptenm-restaurant-reviews-tab-pane');

    if (tabs.length > 0 && panes.length > 0) {
        tabs[0].classList.add('ptenm-restaurant-reviews-nav-tab-active');
        panes[0].style.display = 'block';

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function (e) {
                e.preventDefault();

                tabs.forEach(t => t.classList.remove('ptenm-restaurant-reviews-nav-tab-active'));
                panes.forEach(p => (p.style.display = 'none'));

                this.classList.add('ptenm-restaurant-reviews-nav-tab-active');
                document.querySelector(this.getAttribute('href')).style.display = 'block';
            });
        });
    }

    // "More Options" Toggle
    const moreOptionsLink = document.getElementById('more-options-link');
    const moreOptions = document.getElementById('more-options');

    if (moreOptionsLink && moreOptions) {
        moreOptionsLink.addEventListener('click', function (event) {
            event.preventDefault();
            moreOptions.style.display =
                moreOptions.style.display === 'none' || moreOptions.style.display === ''
                    ? 'table-row-group'
                    : 'none';
        });
    }
});
