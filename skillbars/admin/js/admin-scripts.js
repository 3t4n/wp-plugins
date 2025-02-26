jQuery(document).ready(function ($) {
    "use strict";

    $( document ).on( 'click', '.tab-nav li', function() {
        $( ".active" ).removeClass( "active" );
        $( this ).addClass( "active" );
        var nav = $( this ).attr( "nav" );
        $( ".box li.tab-box" ).css( "display","none" );
        $( ".box"+nav ).css( "display","block" );
        $( "#nav_value" ).val( nav );
    });

    const maxItems = 4; // Maximum number of skill items allowed

    // Add a new skillbar item
    $('#tp-add-skillbar').on('click', function (e) {
        e.preventDefault();

        // Get the container and count the current items
        const container = $('#tp-skillbar-container');
        const count = container.children('.tp-skillbar-item').length;

        if (count >= maxItems) {
            // Change the button text when the limit is reached
            $(this).text('Upgrade to Pro to unlock unlimited skills').addClass('disabled');
            return; // Prevent adding more items
        }

        // Generate a new skillbar item template with default values
        const newItem = `
            <div class="tp-skillbar-item">
                <p>
                    <label>Skill Title:</label>
                    <input type="text" name="tp_skillbar_data[${count}][title]" value="New Skill" />
                </p>
                <p>
                    <label>Skill Title Color:</label>
                    <input type="color" name="tp_skillbar_data[${count}][title_color]" value="#333333" />
                </p>
                <p>
                    <label>Skill Percentage:</label>
                    <span class="percentage-value">80</span>%
                    <input type="range" name="tp_skillbar_data[${count}][percentage]" value="80" min="0" max="100" />
                </p>
                <p>
                    <label>Skill Percentage Color:</label>
                    <input type="color" name="tp_skillbar_data[${count}][percent_color]" value="#333333" />
                </p>
                <p>
                    <label>Skill Background Color:</label>
                    <input type="color" name="tp_skillbar_data[${count}][bg_color]" value="#dddddd" />
                </p>
                <p>
                    <label>Skill Animate Background Color:</label>
                    <input type="color" name="tp_skillbar_data[${count}][color]" value="#333333" />
                </p>
                <button type="button" class="tp-remove-skillbar">Remove</button>
            </div>
        `;

        // Append the new item to the container
        container.append(newItem);

        // Update the button text if the limit is reached after adding the new item
        if (count + 1 >= maxItems) {
            $(this).text('Upgrade to Pro to unlock unlimited skills').addClass('disabled');
        }

        // Initialize the percentage value for the newly added range slider
        updatePercentageValue();

    });

    // Update percentage value when range slider value changes
    $('#tp-skillbar-container').on('input', 'input[type="range"]', function () {
        const percentage = $(this).val();
        $(this).siblings('.percentage-value').text(percentage); // Update the percentage display next to the range
    });

    // Remove a skillbar item
    $('#tp-skillbar-container').on('click', '.tp-remove-skillbar', function (e) {
        e.preventDefault();

        // Remove the clicked item
        $(this).closest('.tp-skillbar-item').remove();

        // Re-enable the button if the number of items is below the limit
        const container = $('#tp-skillbar-container');
        const count = container.children('.tp-skillbar-item').length;

        if (count < maxItems) {
            $('#tp-add-skillbar').text('Add Skill').removeClass('disabled');
        }
    });

    // Initialize percentage values for existing items when the page loads
    function updatePercentageValue() {
        $('#tp-skillbar-container').find('input[type="range"]').each(function () {
            const value = $(this).val();
            $(this).siblings('.percentage-value').text(value); // Set the initial percentage value
        });
    }

    // Call the function to initialize the percentage values on page load
    updatePercentageValue();
});
