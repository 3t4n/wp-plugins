document.addEventListener("DOMContentLoaded", function () {
    //console.log("loaded");

        // Get the modal 
        // Handle opening popups
        document.querySelectorAll('[data-bs-toggle="digages_popup"]').forEach(button => {
            button.addEventListener('click', function () {
                const target = document.querySelector(this.getAttribute('data-bs-target'));
                if (target) target.style.display = 'block';
            });
        });

        // Handle closing popups
        document.querySelectorAll('.digages_popup .digages_close').forEach(closeButton => {
            closeButton.addEventListener('click', function () {
                this.closest('.digages_popup').style.display = 'none';
            });
        });
 

});
