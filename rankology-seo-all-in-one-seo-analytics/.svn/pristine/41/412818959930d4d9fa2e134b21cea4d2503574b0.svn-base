contentAnalysisToggle();

var contentAnalysisView = elementor.modules.controls.BaseData.extend({
    onReady: function () {
        if (
            rankologyFiltersElementor.resize_panel &&
            rankologyFiltersElementor.resize_panel === "1"
        ) {
            elementor.panel.storage.size.width = "495px";
            elementor.panel.setSize();
        }

        contentAnalysis();
        jQuery(document).on("click", "#rankology_launch_analysis", function () {
            contentAnalysis();
        });
    },
});

elementor.addControlView("rankology-content-analysis", contentAnalysisView);
