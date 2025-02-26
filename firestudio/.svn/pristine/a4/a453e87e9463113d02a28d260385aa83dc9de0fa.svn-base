(function() {
    firestudio.ready(function domLoaded() {
        var body = document.querySelector('body');
        var adminModal = document.querySelector('#firestudio-modal');
        var openModalBtn = document.querySelector('#wp-admin-bar-firestudio .ab-item');
        var closeModalBtn = document.querySelector('.firestudio-modal_inner__close');
        openModalBtn.addEventListener('click', function openModalButtonClick(e) {
            e.preventDefault();
            adminModal.classList.add('firestudio-modal__opened');
            body.classList.add('firestudio-modal__opened');
        });

        closeModalBtn.addEventListener('click', function closeModalButtonClick(e) {
            e.preventDefault();
            adminModal.classList.remove('firestudio-modal__opened');
            body.classList.remove('firestudio-modal__opened');;
        });
    });
})();