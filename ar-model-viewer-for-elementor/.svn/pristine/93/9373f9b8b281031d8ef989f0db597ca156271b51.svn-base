jQuery(function ($) {

    function add3DModal($src) {
        $('body').append(
            `<div id="ar-product-modal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                            <div style="margin: 0 auto;width: 100%; height: 100%;">
                                <model-viewer-preview>
                                    <model-viewer style="min-width: 350px; min-height: 350px;width: 100%; height: 100%;" bounds="tight"
                                        src="${$src}" 
                                        ar ar-modes="webxr scene-viewer quick-look" camera-controls environment-image="neutral" shadow-intensity="1"
                                        >
                                    </model-viewer>
                                </model-viewer-preview>
                            </div>
                            <div class="ar-modal-content-footer">
                                <hr class="ar-modal-separator"/>
                                <a href="https://bitbute.tech/ar-model-viewer/" target="_blank">
                                <img width="18" height="18" class="ar-bitbute-logo" src="data:image/png;base64,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" alt="Bitbute logo" />
                                </a>
                            </div>

                    </div>

                </div>`);
    }

    function open3DModal() {
        var $btn = $('.product-three-model-button');

        var $src = $btn.attr('src');
        var $modal = $('body').find('#ar-product-modal');
        if (!$modal.length) {
            add3DModal($src);
            $modal = $('body').find('#ar-product-modal');
        }
        $modal.show();
    }

    function add3DButtonToProductImage() {
        const $btn = $('.product-three-model-button');
        const $btn_text = $btn.data('btn-text');
        $('.woocommerce-product-gallery__image').append('<button class="ar-product-3d-model-button">' + $btn_text + '</button>');
        $('.ar-product-3d-model-button').css({ position: 'absolute', right: 0, bottom: 0, zIndex: 999, padding: '6px' }).click(open3DModal)
    }



    // Upload model file from the admin product page
    $('body').on('click', '.ar-model-viewer-file-upload', function (e) {
        var file_uploader = wp.media({ multiple: false, post_mime_type: 'glb' })
            .on('select', function () {
                var attachment = file_uploader.state().get('selection').first().toJSON();
                updatePostMetaBox(attachment);
            })
            .open();
    });

    // Remove model file from the admin product page
    $('body').on('click', '.remove-ar-model-viewer-file', function (e) {
        removeFile();
    });

    $('body').on('click', '#ar-product-modal .close', function (e) {
        $('#ar-product-modal').hide();
    });

    // Add 3d model viewer to the public product page
    var $btn = $('.product-three-model-button');
    if ($btn.length) {
        // $btn.remove();
        add3DButtonToProductImage();
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == document.getElementById("ar-product-modal")) {
            $('#ar-product-modal').hide();
        }
    }
})