/**
 * Created by Richie on 11/02/2018.
 */


(function($) {



    updateBackgroundColors();

    // Attach a change event listener to the checkboxes
    $("input[id^='acf-field_include_question_']").change(function() {
        updateBackgroundColors();
    });

    // Function to update the background color for each field
    function updateBackgroundColors() {
        $("input[id^='acf-field_include_question_']").each(function () {
            var $checkbox = $(this);
            var isChecked = $checkbox.prop('checked');
            var $parentDiv = $checkbox.closest(".acf-field");

            if (isChecked) {
                $parentDiv.removeClass('grey-background');
            } else {
                $parentDiv.addClass('grey-background');
            }
        });

    }
})(jQuery);
