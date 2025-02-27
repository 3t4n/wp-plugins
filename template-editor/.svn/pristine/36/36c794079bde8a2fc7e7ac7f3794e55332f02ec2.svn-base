document.addEventListener('DOMContentLoaded', function () {

    const subHasBlockLinkContainers = document.querySelectorAll('.wp-block-cover.has-full-block-link, .wp-block-group.has-full-block-link');

    subHasBlockLinkContainers.forEach(container => {

        const containerLinks = container.getElementsByTagName('a')

        if (containerLinks.length) {

            var blockOverlay = document.createElement('div')
            blockOverlayLink = document.createElement('a');

            blockOverlay.style.opacity = 1;
            blockOverlay.style.position = 'absolute';
            blockOverlay.style.inset = '0';
            blockOverlay.style.zIndex = '2';
            blockOverlayLink.href = containerLinks[0].href;
            blockOverlayLink.style.zIndex = '2';
            blockOverlayLink.appendChild(blockOverlay);
            container.style.position = 'relative';
            container.prepend(blockOverlayLink);

        }

    });

});
