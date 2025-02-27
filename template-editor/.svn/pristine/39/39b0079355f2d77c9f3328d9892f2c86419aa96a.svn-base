document.addEventListener('DOMContentLoaded', function () {

    const subAllDetailsSummaryBlocks = document.querySelectorAll('.wp-block-details summary');

    subAllDetailsSummaryBlocks.forEach(container => {

        if (container.parentNode.classList.contains('has-close-other-details-when-opened')) {

            container.addEventListener('click', closeOtherOpenedDetails);

        }

    });

    function closeOtherOpenedDetails() {

        if (!this.parentNode.hasAttribute('open')) {

            subAllDetailsSummaryBlocks.forEach((container) => {

                if (container.parentNode !== this.parentNode) {

                    container.parentNode.removeAttribute('open');

                }

            });

            this.parentNode.scrollIntoView();

        }

    }

});
