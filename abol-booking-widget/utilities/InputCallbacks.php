<?php

/**
 * Register your callbacks for the user-configurable options in here.
 * Callbacks for labels aren't currently required in the context of this plugin
 * so they aren't included.
 */

function abolSeatingWidget__renderGroupShortNameInput()
{
    $option = get_option('group-shortname');

    echo "<input type='text' name='group-shortname[abol_section_group_short-name-input]' value='" . $option['abol_section_group_short-name-input'] . "' />";
}

function abolSeatingWidget__renderBookingPageInput()
{
    $option = get_option('booking-page');

    echo "<input type='text' name='booking-page[abol_section_booking-page-input]' value='" . $option['abol_section_booking-page-input'] . "' />";
}

function abolSeatingWidget__renderBookingImageInput($args)
{
    $option = get_option('booking-image');
    ?>

    <form method="post">
        <input id="image-url" type="text" name="booking-image[abol_section_booking-image-input]" value="<?= $option['abol_section_booking-image-input'] ?>" />
        <input id="upload-button" type="button" class="button" value="Choose/Upload Image" />
    </form>

    <?php if(isset($option['abol_section_booking-image-input'])) : ?>
        <div style="margin-top: 25px;">
            <img src="<?= $option['abol_section_booking-image-input'] ?>" class="current_img" />
        </div>
    <?php endif;
}

function abolSeatingWidget__renderNoEventsInput()
{
    $option = get_option('no-open-events');

    echo "<input type='checkbox'";
    echo "name='no-open-events[abol_section_no-open-events-input]'";

    if(isset($option['abol_section_no-open-events-input']))
    {
        echo "checked='checked'";
    }

    echo "value='1'";
    echo "/>";
}

function abolSeatingWidget__renderAlwaysHideInput()
{
    $option = get_option('always-hide');

    echo "<input type='checkbox'";
    echo "name='always-hide[abol_section_always-hide-widget-input]'";

    if(isset($option['abol_section_always-hide-widget-input']))
    {
        echo "checked='checked'";
    }

    echo "value='1'";
    echo "/>";
}

function abolSeatingWidget__renderShowBookingImageInput()
{
    $option = get_option('show-booking-image');

    echo "<input type='checkbox'";
    echo "name='show-booking-image[abol_section_show-booking-image-input]'";

    if(isset($option['abol_section_show-booking-image-input']))
    {
        echo "checked='checked'";
    }

    echo "value=1";
    echo "/>";
}

function abolSeatingWidget__renderDisplayBookingLinkInput()
{
    $option = get_option('booking-page-link');

    echo "<input type='checkbox'";
    echo "name='booking-page-link[abol_section_display-booking-page-link-input]'";

    if(isset($option['abol_section_display-booking-page-link-input']))
    {
        echo "checked='checked'";
    }

    echo "value='1'";
    echo "/>";
}

function abolSeatingWidget__renderDisplayShowNameInput()
{
    $option = get_option('display-show-name');

    echo "<input type='checkbox'";
    echo "name='display-show-name[abol_section_display-show-name-input]'";

    if(isset($option['abol_section_display-show-name-input']))
    {
        echo "checked='checked'";
    }

    echo "value='1'";
    echo "/>";
}

function abolSeatingWidget__renderDisplayPerformancesInput()
{
    $option = get_option('display-performances');

    echo "<input type='checkbox'";
    echo "name='display-performances[abol_section_display-performances-input]'";

    if(isset($option['abol_section_display-performances-input']))
    {
        echo "checked='checked'";
    }

    echo "value='1'";
    echo "/>";
}

function abolSeatingWidget__renderStylesInput()
{
    $option = get_option('styles');

    echo "<textarea cols='50' rows='5' name='styles[abol_section_styles-input]'>";
    echo $option['abol_section_styles-input'];
    echo "</textarea>";
}

function abolSeatingWidget__renderAvailableSeatingOne()
{
    $option = get_option('available-seats');
    echo "<input type='text' name='available-seats[abol_section_available-seating-input-0]' value='{$option['abol_section_available-seating-input-0']}' placeholder='Good Availability' />";
}

function abolSeatingWidget__renderAvailableSeatingTwo()
{
    $option = get_option('available-seats');
    echo "<input type='text' name='available-seats[abol_section_available-seating-input-1]' value='{$option['abol_section_available-seating-input-1']}' placeholder='Fair Availability' />";
}

function abolSeatingWidget__renderAvailableSeatingThree()
{
    $option = get_option('available-seats');
    echo "<input type='text' name='available-seats[abol_section_available-seating-input-2]' value='{$option['abol_section_available-seating-input-2']}' placeholder='Few seats remaining' />";
}

function abolSeatingWidget__renderAvailableSeatingFour()
{
    $option = get_option('available-seats');
    echo "<input type='text' name='available-seats[abol_section_available-seating-input-3]' value='{$option['abol_section_available-seating-input-3']}' placeholder='Limited seats remaining' />";
}

function abolSeatingWidget__renderAvailableSeatingFive()
{
    $option = get_option('available-seats');
    echo "<input type='text' name='available-seats[abol_section_available-seating-input-4]' value='{$option['abol_section_available-seating-input-4']}' placeholder='Fully booked' />";
}

