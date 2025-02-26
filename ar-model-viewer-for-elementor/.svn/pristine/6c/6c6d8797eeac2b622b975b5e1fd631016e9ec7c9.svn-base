function basename(path) {
    return path.substring(path.lastIndexOf('/') + 1)
}

jQuery(function ($) {

    function removeFile() {
        var $postMetaBox = $('#ar-model-viewer-post-metabox');
        $postMetaBox.empty().append(
            '<div  class="ar-model-viewer-file-upload button" />Upload 3D Model</div>'
        )
        $("#ar-product-3d-model").val('');
    }

    function updatePostMetaBox($attachment) {
        var $postMetaBox = $('#ar-model-viewer-post-metabox');
        var $id = $attachment.id;
        var $src = $attachment.url
        $postMetaBox.empty().append(
            `<div>File: ${basename($src)}</div>
            <a href="#" class="remove-ar-model-viewer-file delete">Remove Model</a>`
        )
        $("#ar-product-3d-model").val($id).trigger('input');
        console.error('feedback');
    }

    function initPostMetaBox() {
        var $postMetaBox = $('#ar-model-viewer-post-metabox');
        if (!$postMetaBox.length) {
            return;
        }
        const $feedbackHTML = `<div class="ar-feedback-section">
		<p class="ar-widget-description">We are always looking for ways to improve & would love to have a any valuable feedback from our customers. Please contact us to submit any query/feedback.</p>
		<a href="https://bitbute.tech/contact/" target="_blank">Contact Us</a>
	</div>`;
        $postMetaBox.append($feedbackHTML);

        var $src = $postMetaBox.data('src')
        var $id = $postMetaBox.data('id')
        if ($src) {
            updatePostMetaBox({ id: $id, url: $src });
        } else {
            removeFile();
        }
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
        e.preventDefault();
        e.stopPropagation();
    });

    initPostMetaBox();
})