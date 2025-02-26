(function () {
    firestudio.ready(function () {
        var applyButton = document.querySelector('.firestudio-modal_inner_debug-toggles_apply');
        applyButton.addEventListener('click', function clickApplyButton() {
            for (var toggleName in firestudio.config.debugToggles) {
                var debugToggleCheckbox = document.querySelector('.firestudio-modal_inner_debug-toggles input[name="' + toggleName + '"]');
                firestudio.config.debugToggles[debugToggleCheckbox.name] = debugToggleCheckbox.checked;
            }
            firestudio.cookie.setObject('fsDebugToggles', firestudio.config.debugToggles);
            document.location.reload();
        });
    });
})();