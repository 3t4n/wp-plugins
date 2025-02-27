jQuery(function ($) {
    const $instructionType = $('#_gpsr_instructions_type');
    const $textContainer = $('#gpsr_instructions_text_container');
    const $fileContainer = $('#gpsr_instructions_file_container');
    const $fileUploadButton = $('#gpsr_file_upload_button');
    const $fieldWithToggle = $('.js-gpsr-field-with-toggle');

    function toggleInstructionFields() {
        const selectedType = $instructionType.val();
        $textContainer.hide();
        $fileContainer.hide();

        if (selectedType === 'text') {
            $textContainer.show();
        } else if (selectedType === 'file') {
            $fileContainer.show();
        }
    }

    function initializeMediaUploader() {
        $fileUploadButton.on('click', function (e) {
            e.preventDefault();

            const mediaUploader = wp.media({
                title: wp.i18n.__('Select File', 'gpsr'),
                button: {
                    text: wp.i18n.__('Use this file', 'gpsr')
                },
                multiple: false
            });

            mediaUploader.on('select', function () {
                const attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#_gpsr_instructions_file').val(attachment.url);
            });

            mediaUploader.open();
        });
    }

    function handleFieldToggles() {
        $fieldWithToggle.each(function () {
            const $container = $(this);
            const $toggleCheckbox = $container.find('input[type="checkbox"]');
            const $inputs = $container.find('input[type="text"], textarea, input[type="file"]');
            const $selectType = $container.find('#_gpsr_instructions_type');

            if ($selectType.length) {
                const toggleSelect = () => {
                    const isChecked = $toggleCheckbox.is(':checked');
                    $selectType.prop('disabled', !isChecked);
                    if (isChecked) {
                        toggleInstructionFields();
                    } else {
                        $textContainer.hide();
                        $fileContainer.hide();
                    }
                };

                toggleSelect();
                $toggleCheckbox.on('change', toggleSelect);
            } else if ($inputs.length) {
                const toggleInputs = () => {
                    const isChecked = $toggleCheckbox.is(':checked');
                    $inputs.prop('disabled', !isChecked);
                };

                toggleInputs();
                $toggleCheckbox.on('change', toggleInputs);
            }
        });
    }

    function init() {
        $instructionType.on('change', toggleInstructionFields);
        toggleInstructionFields();
        initializeMediaUploader();
        handleFieldToggles();
    }

    init();
});
