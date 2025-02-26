// Adds color picker to input
(function( $ ) {

    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('.color-field').wpColorPicker();
    });

})( jQuery );


// Copy shortcodes to clipboard
function aspCopyToClipboard(Container) {
    const Copy = document.getElementById(Container);
    Copy.select();
    Copy.setSelectionRange(0, 99999)
    document.execCommand("copy");

    // [asp-sermons]
    const aspSermonsTip = document.getElementById('aspSermonsTip');
    aspSermonsTip.innerHTML = "Copied to clipboard";
    // [asp-series]
    const aspSeriesTip = document.getElementById('aspSeriesTip');
    aspSeriesTip.innerHTML = "Copied to clipboard";
    // [asp-speakers]
    const aspSpeakersTip = document.getElementById('aspSpeakersTip');
    aspSpeakersTip.innerHTML = "Copied to clipboard";
    // [asp-widgets]
    const aspWidgetsTip = document.getElementById('aspWidgetsTip');
    aspWidgetsTip.innerHTML = "Copied to clipboard";
}

function aspClipboardOut() {
    // [asp-sermons]
    const aspSermonsTip = document.getElementById('aspSermonsTip');
    aspSermonsTip.innerHTML = "Copy to clipboard";
    // [asp-series]
    const aspSeriesTip = document.getElementById('aspSeriesTip');
    aspSeriesTip.innerHTML = "Copy to clipboard";
    // [asp-speakers]
    const aspSpeakersTip = document.getElementById('aspSpeakersTip');
    aspSpeakersTip.innerHTML = "Copy to clipboard";
    // [asp-widgets]
    const aspWidgetsTip = document.getElementById('aspWidgetsTip');
    aspWidgetsTip.innerHTML = "Copy to clipboard";
}

function aspDisableSortType( Event ) {
    const Target = Event.target;
    const Option = document.querySelector(`[name=asp_archive_${Target.dataset.taxonomy}_dropdown_order]`);
    Option.disabled = Target.name === `asp_archive_${Target.dataset.taxonomy}_dropdown_orderby` && Target.value === 'custom_order';
}

// 1. Define aspSetInitialVideoField
function aspSetInitialVideoField() {
    const videoDropdown = document.getElementById('asp_video_type');
    if (videoDropdown) {
        aspUpdateVideoFields(videoDropdown.value);
    }
}

// 2. Update the function to make it reusable
function aspUpdateVideoFields(selectedType) {
    const videoInputFields = document.querySelectorAll('.asp-single-video-type');
    videoInputFields.forEach((videoInputField) => {
        videoInputField.classList.add('asp-single-video-type-hidden');
        const dataType = videoInputField.getAttribute('data-asp-video-type');
        if (dataType === selectedType) {
            videoInputField.classList.remove('asp-single-video-type-hidden');
        }
    });
}

// 3. Define aspSelectVideoType
function aspSelectVideoType(event) {
    aspUpdateVideoFields(event.target.value);
}

// 4. Add the event listener for DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {
    aspSetInitialVideoField();

    // Add change event listener to the select element
    const videoDropdown = document.getElementById('asp_video_type');
    if (videoDropdown) {
        videoDropdown.addEventListener('change', aspSelectVideoType);
    }
});