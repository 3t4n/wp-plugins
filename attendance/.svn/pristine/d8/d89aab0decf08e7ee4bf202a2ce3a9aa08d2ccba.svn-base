<div class="wrap">
    <h1>Attendance</h1>

    <p>
        The Attendance plugin is the best way to keep track of attendance in your organization.<br>
        Vast reporting and 1-touch-adding of new attendees make the process seamless.<br>
        <a href="#" onclick="document.getElementById('attendance-more').style.display=document.getElementById('attendance-more').style.display==='block'?'none':'block';event.preventDefault()">Learn about how Attendance records your data.</a>
    </p>

    <ul id="attendance-more">
        <li>- Each of your staff members can access the Attendance app by visiting the URL above.</li>
        <li>- In the app, you can set up each staff member with their own access PIN.</li>
        <li>- We recommend saving the app on the Home Screen of mobile devices for convenience.</li>
        <li>- The app stores data locally on the device in the case of an unreliable internet connection.</li>
        <li>- Your data is stored on <em>this</em> WordPress database as the following post_types:
            <?php
                echo implode(array(
                    '`' . AttendanceAPI::TABLE_PREFIX . 'day' . '`',
                    '`' . AttendanceAPI::TABLE_PREFIX . 'location' . '`',
                    '`' . AttendanceAPI::TABLE_PREFIX . 'person' . '`',
                    '`' . AttendanceAPI::TABLE_PREFIX . 'staff' . '`'
                ), ', ')
            ?></li>
    </ul>

    <form method="post" action="options.php" novalidate="novalidate">
        <?php
            settings_fields('attendance_general');
            do_settings_sections('attendance');
            submit_button();
        ?>
    </form>

    <hr>

    <form class="float-right" onsubmit="confirm('Are you sure you want to reset all Attendance data?') || event.preventDefault()" action="<?php echo admin_url('options-general.php?page=attendance'); ?>" method="POST">
        <input type="hidden" name="attendance-reset" value="1">

        <p>
            Need to reset all data for Attendance? &nbsp; &nbsp;

            <button type="submit" class="button">
                Reset All Data
            </button>
        </p>
    </form>
</div>

<style type="text/css">
    .upsell {
        border: 1px dashed #C1A707;
        border-radius: 4px;
        padding: 20px;
        margin-top: 10px;
        background: #FFFEF4;
    }

    .upsell p:first-child {
        margin-bottom: 20px;
    }

    #attendance-more {
        display: none;
    }

    .float-right {
        float: right;
    }
</style>
