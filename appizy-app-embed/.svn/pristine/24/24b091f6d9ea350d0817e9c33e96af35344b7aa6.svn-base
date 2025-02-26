/* global window, document */

(function () {

    var admin = {
        generateShortCode: generateShortCode
    };

    var appizyGeneratorForm = document.getElementById('appizy-short-code-generator');

    if (appizyGeneratorForm) {
        var shortCodeOutput = appizyGeneratorForm.querySelector('textarea[name="shortcode"]');
        var appIdSelector = appizyGeneratorForm.querySelector('select[name="app-id"]');
        var enableSaveDataCheckbox = appizyGeneratorForm.querySelector('input[name="enable-save"]');
        var enablePrintCheckbox = appizyGeneratorForm.querySelector('input[name="enable-print"]');
        var enableResetCheckbox = appizyGeneratorForm.querySelector('input[name="enable-reset"]');
        var appContainerHeight = appizyGeneratorForm.querySelector('input[name="height"]');

        appizyGeneratorForm.addEventListener('change', function () {
            var appId = appIdSelector.value;
            var enableSave = enableSaveDataCheckbox.checked;
            var height = appContainerHeight.value;
            var enablePrint = enablePrintCheckbox.checked;
            var enableReset = enableResetCheckbox.checked;

            shortCodeOutput.value = generateShortCode(appId, enableSave, height, enablePrint, enableReset);
        });
    }

    /**
	 * @param {string} appId
	 * @param {boolean} enableSave
	 * @param {string} appContainerHeight
     * @param {boolean} enablePrint
	 * @return {string}
	 */
    function generateShortCode(appId, enableSave, appContainerHeight, enablePrint, enableReset) {
        var shortCode = '';

        if (parseInt(appId, 0) > 0) {
            shortCode += '[appizy' + ' id="' + appId + '"';

            if (enableSave) {
                shortCode += ' save="enabled"';
            }

            if (enablePrint) {
                shortCode += ' print="enabled"';
            }

            if (enableReset) {
                shortCode += ' reset="enabled"';
            }

            if (appContainerHeight > 0) {
				shortCode += ' height="' + appContainerHeight + '"';
			}

            shortCode += ']';
        }

        return shortCode;
    }

    // Add Admin to the WP Appizy namespace
    window.wp = window.wp || {};
    window.wp.appizy = window.wp.appizy || {};
    window.wp.appizy.admin = admin;
})();
