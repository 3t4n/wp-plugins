<?php
if ( !defined('ABSPATH') ) exit; // direct access disabled

$options = [
    1 => esc_html__('Today', 'wp_event_booking'),
    2 => esc_html__('Yesterday', 'wp_event_booking'),
    3 => esc_html__('Last 7 Days', 'wp_event_booking'),
    4 => esc_html__('Last 30 Days', 'wp_event_booking'),
    5 => esc_html__('This Month', 'wp_event_booking'),
    6 => esc_html__('Previous Month', 'wp_event_booking'),
    7 => esc_html__('This Year', 'wp_event_booking'),
    8 => esc_html__('Previous Year', 'wp_event_booking'),
    9 => esc_html__('Custom Range', 'wp_event_booking'),
];

$selected = isset($_GET['selected']) ? sanitize_text_field(wp_unslash($_GET['selected'])) : '4';
$start_date = isset($_GET['start-date']) ? sanitize_text_field(wp_unslash($_GET['start-date'])) : (new DateTime('today'))->modify('-30 days')->format('Y-m-d');
$end_date = isset($_GET['end-date']) ? sanitize_text_field(wp_unslash($_GET['end-date'])) : (new DateTime('today'))->format('Y-m-d');

$active_text = isset($options[$selected]) ? $options[$selected] : $options[2];
?>
<div class="wrap">
    <h1><?php esc_html_e('Analytics Dashboard', 'wp_event_booking');?></h1>
    
    <form id="filter-form" action="" method="get">
        <input type="hidden" name="post_type" value="<?php echo esc_attr(sanitize_text_field(wp_unslash($_GET['post_type'])));?>">
        <input type="hidden" name="page" value="<?php echo esc_attr(sanitize_text_field(wp_unslash($_GET['page'])));?>">
        <input type="hidden" name="selected">
        <div id="date-range-filter">
            <label for="date-range"><?php esc_html_e('Select Range', 'wp_event_booking');?>:</label>
            <div class="dropdown">
                <button type="button" class="button dropbtn"><?php echo esc_html($active_text); ?></button>
                <div class="dropdown-content">
                    <?php foreach ($options as $key => $option) {
                        ?>
                        <li data-id="<?php echo esc_html($key)?>" class="<?php echo $selected == $key ? 'active':''; ?>"><?php echo esc_html($option); ?></li>
                        <?php
                    }?>
                </div>
            </div>
    
            <div class="filter-input-grp" <?php echo $selected == 9 ? '' : 'style="display:none;"';?>>
                <label for="start-date"><?php esc_html_e('Start Date', 'wp_event_booking');?>:</label>
                <input type="text" id="start-date" name="start-date" value="<?php echo esc_html($start_date)?>" autocomplete="off" placeholder="yyyy-mm-dd">
            </div>
    
            <div class="filter-input-grp" <?php echo $selected == 9 ? '' : 'style="display:none;"';?>>
                <label for="end-date"><?php esc_html_e('End Date', 'wp_event_booking');?>:</label>
                <input type="text" id="end-date" name="end-date" value="<?php echo esc_html($end_date)?>" autocomplete="off" placeholder="yyyy-mm-dd">
            </div>
            
            <button type="submit" id="filter-button" class="button"><?php esc_html_e('Filter', 'wp_event_booking');?></button>
        </div>
    </form>

    <!-- Analytics Cards -->
    <div id="analytics-cards" class="analytics-cards-container">
        <div class="analytics-card">
            <h2><?php esc_html_e('Total Clicks', 'wp_event_booking');?></h2>
            <p id="total-clicks-count"><?php echo esc_html($total_clicks['count']);?></p>
        </div>
        <div class="analytics-card">
            <h2><?php esc_html_e('Sign Up Clicks', 'wp_event_booking');?></h2>
            <p id="signup-clicks-count"><?php echo esc_html($total_signup_clicks['count']);?></p>
        </div>
        <div class="analytics-card">
            <h2><?php esc_html_e('More Detail Clicks', 'wp_event_booking');?></h2>
            <p id="more-details-count"><?php echo esc_html($total_more_detail_clicks['count']);?></p>
        </div>
        <div class="analytics-card">
            <h2><?php esc_html_e('Published Events', 'wp_event_booking');?></h2>
            <p id="publish-events-count"><?php echo esc_html($total_published_events['count']);?></p>
        </div>
    </div>

    <div id="analytics-tables" class="analytics-table-container">
        <div class="analytics-table">
            <!-- Table for Detailed Overview Data -->
            <h2 class="table-h2"><?php esc_html_e('Sign Up Clicks by Date', 'wp_event_booking');?></h2>
            <table id="sign_up_dated" class="widefat fixed">
                <thead>
                    <tr>
                    <th><?php esc_html_e('Date', 'wp_event_booking');?></th>
                    <th><?php esc_html_e('Clicks', 'wp_event_booking');?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be loaded here via AJAX -->
                </tbody>
            </table>
        </div>
        <div class="analytics-table">
            <!-- Table for Detailed Overview Data -->
            <h2 class="table-h2"><?php esc_html_e('More Detail Clicks by Date', 'wp_event_booking');?></h2>
            <table id="more_details_dated" class="widefat fixed">
                <thead>
                    <tr>
                    <th><?php esc_html_e('Date', 'wp_event_booking');?></th>
                    <th><?php esc_html_e('Clicks', 'wp_event_booking');?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be loaded here via AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <div id="analytics-tables" class="analytics-table-container">
        <div class="analytics-table">
            <!-- Table for Detailed Overview Data -->
            <h2 class="table-h2"><?php esc_html_e('Sign Up Clicks by Event', 'wp_event_booking');?></h2>
            <table id="sign_up_event_table" class="widefat fixed">
                <thead>
                    <tr>
                    <th><?php esc_html_e('Event', 'wp_event_booking');?></th>
                    <th><?php esc_html_e('Clicks', 'wp_event_booking');?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be loaded here via AJAX -->
                </tbody>
            </table>
        </div>
        <div class="analytics-table">
            <!-- Table for Detailed Overview Data -->
            <h2 class="table-h2"><?php esc_html_e('More Detail Clicks by Event', 'wp_event_booking');?></h2>
            <table id="more_detail_event_table" class="widefat fixed">
                <thead>
                    <tr>
                    <th><?php esc_html_e('Event', 'wp_event_booking');?></th>
                    <th><?php esc_html_e('Clicks', 'wp_event_booking');?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be loaded here via AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-charts d-flex">
        <!-- Chart Container -->

        <h2 class="table-h2"><?php esc_html_e('Sign Up Clicks by Events Chart', 'wp_event_booking');?></h2>
        <div class="w-chart loading">
            <canvas id="signupClickAnalyticsChart" width="400" height="300" style="height:300px; width:100%;"></canvas>
        </div>

        <h2 class="table-h2"><?php esc_html_e('More Details Clicks by Events Chart', 'wp_event_booking');?></h2>
        <div class="w-chart loading">
            <canvas id="moreDetailClickAnalyticsChart" width="400" height="300" style="height:300px; width:100%;"></canvas>
        </div>
    </div>

    <div id="analytics-tables" class="analytics-table-container">
        <div class="analytics-table">
            <!-- Table for Detailed Overview Data -->
            <h2 class="table-h2"><?php esc_html_e('Published Events', 'wp_event_booking');?></h2>
            <table id="publish_events_table" class="widefat fixed">
                <thead>
                    <tr>
                    <th><?php esc_html_e('Date', 'wp_event_booking');?></th>
                    <th><?php esc_html_e('Events', 'wp_event_booking');?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be loaded here via AJAX -->
                </tbody>
            </table>
        </div>
        <?php if(function_exists('wpeb_ms_is_active')) {?>
        <div class="analytics-table">
            <!-- Table for Detailed Overview Data -->
            <h2 class="table-h2"><?php esc_html_e('Public Form Events', 'wp_event_booking');?></h2>
            <table id="public_events_table" class="widefat fixed">
                <thead>
                    <tr>
                    <th><?php esc_html_e('Date', 'wp_event_booking');?></th>
                    <th><?php esc_html_e('Events Created', 'wp_event_booking');?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be loaded here via AJAX -->
                </tbody>
            </table>
        </div>
        <?php }?>
    </div>
</div>

<script>
var signupDatedChart = null;
var moreDetailDatedChart = null;

jQuery(document).ready(function ($) {
    var startDate = $('#start-date').val();
    var endDate = $('#end-date').val();

    getSignUpTableListing(startDate, endDate);
    getMoreDetailsTableListing(startDate, endDate);

    getSignUpEventTableListing(startDate, endDate);
    getMoreDetailsEventTableListing(startDate, endDate);

    getPublishEventsTableListing(startDate, endDate);
    getPublicEventsTableListing(startDate, endDate);

    loadSignUpGraphDated(startDate, endDate);
    loadMoreDetailGraphDated(startDate, endDate);

    // Initialize datepickers for the start and end date inputs
    $('#start-date, #end-date').datepicker({
        'format': 'yyyy-mm-dd',
    });


    // Handle the Filter Button Click
    $('#filter-button').on('click', function (e) {
        e.preventDefault();
        jQuery('.w-chart').addClass('loading');
        var startDate = $('#start-date').val();
        var endDate = $('#end-date').val();

        if (startDate === '' || endDate === '') {
            alert('Please select both start and end dates.');
            return;
        }

        updateQueryString('start-date', startDate);
        updateQueryString('end-date', endDate);

        getDashboardCardsData(startDate, endDate);

        getSignUpTableListing(startDate, endDate);
        getMoreDetailsTableListing(startDate, endDate);

        getSignUpEventTableListing(startDate, endDate);
        getMoreDetailsEventTableListing(startDate, endDate);

        getPublishEventsTableListing(startDate, endDate);
        getPublicEventsTableListing(startDate, endDate);

        loadSignUpGraphDated(startDate, endDate);
        loadMoreDetailGraphDated(startDate, endDate);
    });

    // Event listener for the date range options
    $('#date-range-filter li').on('click', function () {
        $(this).addClass('active').siblings().removeClass('active');
        var selectedOptionText = $(this).text();
        var selectedOption = parseInt($(this).data('id'));
        $('input[name="selected"]').val(selectedOption);

        var today = new Date();
        var startDate, endDate;

        // Calculate the date ranges based on the selected option
        switch (selectedOption) {
            case 1:
                startDate = today;
                endDate = today;
                $('.filter-input-grp').hide();
                break;

            case 2:
                startDate = new Date();
                startDate.setDate(today.getDate() - 1);
                endDate = new Date();
                endDate.setDate(today.getDate() - 1);
                $('.filter-input-grp').hide();
                break;

            case 3:
                startDate = new Date();
                startDate.setDate(today.getDate() - 7);
                endDate = today;
                $('.filter-input-grp').hide();
                break;

            case 4:
                startDate = new Date();
                startDate.setDate(today.getDate() - 30);
                endDate = today;
                $('.filter-input-grp').hide();
                break;

            case 5:
                startDate = new Date(today.getFullYear(), today.getMonth(), 1);
                endDate = today;
                $('.filter-input-grp').hide();
                break;

            case 6:
                startDate = new Date(today.getFullYear(), today.getMonth() - 1, 1);
                endDate = new Date(today.getFullYear(), today.getMonth(), 0);
                $('.filter-input-grp').hide();
                break;

            case 7:
                startDate = new Date(today.getFullYear(), 0, 1);
                endDate = today;
                $('.filter-input-grp').hide();
                break;

            case 8:
                startDate = new Date(today.getFullYear() - 1, 0, 1);
                endDate = new Date(today.getFullYear() - 1, 11, 31);
                $('.filter-input-grp').hide();
                break;

            case 9:
                // Do nothing, allow user to select custom dates
                startDate = today;
                endDate = today;
                $('.filter-input-grp').show();
                break;
                return;

            default:
                return;
        }

        // Format the dates as 'yyyy-mm-dd'
        var formattedStartDate = $.datepicker.formatDate('yy-mm-dd', startDate);
        var formattedEndDate = $.datepicker.formatDate('yy-mm-dd', endDate);

        // Set the values of the date inputs
        $('#start-date').val(formattedStartDate);
        $('#end-date').val(formattedEndDate);

        updateQueryString('selected', selectedOption);
        updateQueryString('start-date', formattedStartDate);
        updateQueryString('end-date', formattedEndDate);

        $('.dropbtn').text(selectedOptionText);
    });
});

// load signup graph function
function loadSignUpGraphDated(startDate, endDate) {

    // Fetch analytics data via AJAX
    jQuery.ajax({
        url: '<?php echo esc_url(admin_url('admin-ajax.php'));?>',
        method: 'POST',
        data: {
            action: 'fetch_analytics_data_in_dated_chart',
            start_date: startDate,
            end_date: endDate,
            click_type: 'sign_up'
        },
        success: function (response) {
            
            // Update Chart
            const maxLabelLength = 12; // Set max length for labels
            const post_title = response.data.map(item => 
                item.post_title.length > maxLabelLength 
                    ? item.post_title.substring(0, maxLabelLength) + '...' 
                    : item.post_title
            );
            const fullPostTitles = response.data.map(item => item.post_title);
            const counts = response.data.map(item => item.count);
            const isCenterLabel = fullPostTitles.length <= 3;

            if (signupDatedChart !== null) {
                signupDatedChart.destroy();
            }

            // Initialize the chart
            var ctx = document.getElementById('signupClickAnalyticsChart').getContext('2d');
            signupDatedChart = new Chart(ctx, {
                type: 'line', // You can change it to 'bar', 'line', 'pie', etc.
                data: {
                    labels: post_title, // Labels for the X-axis
                    datasets: [{
                        label: 'Clicks',
                        data: counts, // Data for Y-axis
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Bar color
                        borderColor: 'rgba(75, 192, 192, 1)', // Border color
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true, // Keep responsive behavior
                    maintainAspectRatio: false, // Allow manual control of aspect ratio
                    scales: {
                        x: {
                            beginAtZero: true,
                            offset: isCenterLabel
                        },
                        y: {
                            beginAtZero: true // Ensure the Y-axis starts at 0
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                title: function(tooltipItems) {
                                    const dataIndex = tooltipItems[0].dataIndex;
                                    return fullPostTitles[dataIndex];
                                }
                            }
                        }
                    }
                }
            });
            jQuery('.w-chart').removeClass('loading');
        }
    });
}

// load more detail graph
function loadMoreDetailGraphDated(startDate, endDate) {

    // Fetch analytics data via AJAX
    jQuery.ajax({
        url: '<?php echo esc_url(admin_url('admin-ajax.php'));?>',
        method: 'POST',
        data: {
            action: 'fetch_analytics_data_in_dated_chart',
            start_date: startDate,
            end_date: endDate,
            click_type: 'more_detail'
        },
        success: function (response) {
            // Update Chart
            const maxLabelLength = 12; // Set max length for labels
            const post_title = response.data.map(item => 
                item.post_title.length > maxLabelLength 
                    ? item.post_title.substring(0, maxLabelLength) + '...' 
                    : item.post_title
            );
            const fullPostTitles = response.data.map(item => item.post_title);

            const counts = response.data.map(item => item.count);
            const isCenterLabel = fullPostTitles.length <= 3;

            if (moreDetailDatedChart !== null) {
                moreDetailDatedChart.destroy();
            }

            // Initialize the chart
            var ctx = document.getElementById('moreDetailClickAnalyticsChart').getContext('2d');
            moreDetailDatedChart = new Chart(ctx, {
                type: 'line', // You can change it to 'bar', 'line', 'pie', etc.
                data: {
                    labels: post_title, // Labels for the X-axis
                    datasets: [{
                        label: 'Clicks',
                        data: counts, // Data for Y-axis
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Bar color
                        borderColor: 'rgba(75, 192, 192, 1)', // Border color
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true, // Keep responsive behavior
                    maintainAspectRatio: false, // Allow manual control of aspect ratio
                    scales: {
                        x: {
                            beginAtZero: true,
                            offset: isCenterLabel
                        },
                        y: {
                            beginAtZero: true // Ensure the Y-axis starts at 0
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                title: function(tooltipItems) {
                                    const dataIndex = tooltipItems[0].dataIndex;
                                    return fullPostTitles[dataIndex];
                                }
                            }
                        }
                    }
                }
            });
            jQuery('.w-chart').removeClass('loading');
        }
    });
}

// update query string in URL
function updateQueryString(key, value) {
    var url = new URL(window.location.href);
    var searchParams = new URLSearchParams(url.search);

    // Update or set the new query parameter
    searchParams.set(key, value);

    // Set the new URL with updated query parameters
    url.search = searchParams.toString();
    
    // Update the browser URL without reloading the page
    window.history.pushState({ path: url.href }, '', url.href);
}

// get dashboard cards data
function getDashboardCardsData(startDate, endDate) {
    jQuery('.analytics-cards-container').addClass('loading');
    jQuery.ajax({
        url : '<?php echo esc_url(admin_url('admin-ajax.php'));?>',
        method : 'POST',
        dataType : 'JSON',
        data : {
            action : 'fetch_analytics_dashboard_data', 
            start_date : startDate, 
            end_date : endDate, 
        },
        success: function(res){
            
            jQuery('#total-clicks-count').text(res.total_clicks);
            jQuery('#signup-clicks-count').text(res.signup_clicks);
            jQuery('#more-details-count').text(res.more_detail_clicks);
            jQuery('#publish-events-count').text(res.published_events);
            jQuery('.analytics-cards-container').removeClass('loading');
        }
    });
}

// common datatable config
function getDataTableConfig(action, startDate, endDate) {
    return {
        "processing": true,
        "serverSide": true,
        "pageLength": 15, // Number of records per page
        "lengthChange": false, // Disable changing page length
        "paging": true, // Enable pagination
        "searching": false, // Enable search functionality
        "ordering": false, // Enable column ordering
        "info": true, // Show table information
        "autoWidth": false, // Disable auto width adjustment
        "responsive": true, // Enable responsive table
    }
}

function getSignUpTableListing(startDate, endDate) {

    jQuery('#sign_up_dated').DataTable().destroy();
    jQuery('#sign_up_dated').DataTable({
        ...getDataTableConfig(),
        "language": {
            info: "<?php echo esc_html__('Showing _START_ to _END_ of _TOTAL_ entries', 'wp_event_booking');?>"
        },
        "ajax": {
            "url": "<?php echo esc_url(admin_url('admin-ajax.php'));?>",
            "type": "POST",
            "dataType": "JSON",
            "data": function (d) {
                d.page = (d.start / d.length) + 1;
                d['action'] = 'fetch_analytics_data_by_date';
                d['start_date'] = startDate;
                d['end_date'] = endDate;
                d['click_type'] = 'sign_up';
            }
        },
        "columns": [
            { "data": "dated" },
            { "data": "count" }
        ],
    });
}

function getMoreDetailsTableListing(startDate, endDate) {

    jQuery('#more_details_dated').DataTable().destroy();
    jQuery('#more_details_dated').DataTable({
        ...getDataTableConfig(),
        "language": {
            info: "<?php echo esc_html__('Showing _START_ to _END_ of _TOTAL_ entries', 'wp_event_booking');?>"
        },
        "ajax": {
            "url": "<?php echo esc_url(admin_url('admin-ajax.php'));?>",
            "type": "POST",
            "dataType": "JSON",
            "data": function (d) {
                d.page = (d.start / d.length) + 1;
                d['action'] = 'fetch_analytics_data_by_date';
                d['start_date'] = startDate;
                d['end_date'] = endDate;
                d['click_type'] = 'more_detail';
            }
        },
        "columns": [
            { "data": "dated" },
            { "data": "count" }
        ],
    });
}

function getSignUpEventTableListing(startDate, endDate) {

    jQuery('#sign_up_event_table').DataTable().destroy();
    jQuery('#sign_up_event_table').DataTable({
        ...getDataTableConfig(),
        "language": {
            info: "<?php echo esc_html__('Showing _START_ to _END_ of _TOTAL_ entries', 'wp_event_booking');?>"
        },
        "ajax": {
            "url": "<?php echo esc_url(admin_url('admin-ajax.php'));?>",
            "type": "POST",
            "dataType": "JSON",
            "data": function (d) {
                d.page = (d.start / d.length) + 1;
                d['action'] = 'fetch_analytics_data_by_event';
                d['start_date'] = startDate;
                d['end_date'] = endDate;
                d['click_type'] = 'sign_up';
            }
        },
        "columns": [
            { "data": "post_title" },
            { "data": "count" }
        ],
    });
}

function getMoreDetailsEventTableListing(startDate, endDate) {

    jQuery('#more_detail_event_table').DataTable().destroy();
    jQuery('#more_detail_event_table').DataTable({
        ...getDataTableConfig(),
        "language": {
            info: "<?php echo esc_html__('Showing _START_ to _END_ of _TOTAL_ entries', 'wp_event_booking');?>"
        },
        "ajax": {
            "url": "<?php echo esc_url(admin_url('admin-ajax.php'));?>",
            "type": "POST",
            "dataType": "JSON",
            "data": function (d) {
                d.page = (d.start / d.length) + 1;
                d['action'] = 'fetch_analytics_data_by_event';
                d['start_date'] = startDate;
                d['end_date'] = endDate;
                d['click_type'] = 'more_detail';
            }
        },
        "columns": [
            { "data": "post_title" },
            { "data": "count" }
        ],
    });
}

function getPublishEventsTableListing(startDate, endDate) {

    jQuery('#publish_events_table').DataTable().destroy();
    jQuery('#publish_events_table').DataTable({
        ...getDataTableConfig(),
        "language": {
            info: "<?php echo esc_html__('Showing _START_ to _END_ of _TOTAL_ entries', 'wp_event_booking');?>"
        },
        "ajax": {
            "url": "<?php echo esc_url(admin_url('admin-ajax.php'));?>",
            "type": "POST",
            "dataType": "JSON",
            "data": function (d) {
                d.page = (d.start / d.length) + 1;
                d['action'] = 'fetch_analytics_data_by_date';
                d['start_date'] = startDate;
                d['end_date'] = endDate;
                d['click_type'] = 'event_publish';
            }
        },
        "columns": [
            { "data": "dated" },
            { "data": "count" }
        ],
    });
}

function getPublicEventsTableListing(startDate, endDate) {

    jQuery('#public_events_table').DataTable().destroy();
    jQuery('#public_events_table').DataTable({
        ...getDataTableConfig(),
        "language": {
            info: "<?php echo esc_html__('Showing _START_ to _END_ of _TOTAL_ entries', 'wp_event_booking');?>"
        },
        "ajax": {
            "url": "<?php echo esc_url(admin_url('admin-ajax.php'));?>",
            "type": "POST",
            "dataType": "JSON",
            "data": function (d) {
                d.page = (d.start / d.length) + 1;
                d['action'] = 'fetch_analytics_data_by_date';
                d['start_date'] = startDate;
                d['end_date'] = endDate;
                d['click_type'] = 'public_form';
            }
        },
        "columns": [
            { "data": "dated" },
            { "data": "count" }
        ],
    });
}

</script>