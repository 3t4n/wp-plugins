jQuery(function($) { // DOM is now read and ready to be manipulated

    var $status;
    var $allStories;

    // Utility Functions

    function hasClass(el, cls) {
        return el.className && new RegExp("(\\s|^)" + cls + "(\\s|$)").test(el.className);
    }

    // Story Filtering

    function getAllStories() {
        $allStories = $('.pivotpress-story');
        return $allStories;
    }

    function getAllVisibleStories() {

        $allVisibleStories = $('.pivotpress-story:visible');
    }

    function getFilterStatus() {
        $('#filterSubmit').click(function () {
            mainFilter();
        });

    }

    function mainFilter() {
        getAllStories();
        $allStories.hide();
        $status = document.getElementById("filterByStatus").value;
        filterByStatus($status);
        $label = document.getElementById("filterByLabel").value;
        filterByLabel($label);
    }

    function filterByStatus($status) {
        switch ($status) {
            case 'state-all':
                getAllStories().show();
            case 'state-started':
                $('.state-started').show();
            case 'state-unstarted':
                $('.state-unstarted').show();
                break;
            case 'state-finished':
                $('.state-finished').show();
                break;
            case 'state-planned':
                $('.state-planned').show();
                break;
            case 'state-rejected':
                $('.state-rejected').show();
                break;
            case 'state-unscheduled':
                $('.state-unscheduled').show();
                break;
            case 'state-accepted':
                $('.state-accepted').show();
                break;
            case 'state-delivered':
                $('.state-delivered').show();
                break;
            default:
                console.log('something is wrong with the filtering');
        }
    }

    function filterByLabel($label) {

        getAllVisibleStories();
        if($label == 'any'){
            //do nothing
        } else {
            $.each($allVisibleStories, function (i, v) {
                if (hasClass(v, $label)) {
                    this.style.display = 'block';
                } else {
                    this.style.display = 'none';
                }
            });
        }
    }


    function getClearFilter() {
        $('#clearFiltersSubmit').click(function () {
            getAllStories();
            $allStories.show();
        });
    }



    $(document).ready(function () {
        getFilterStatus();
        getClearFilter()
    });

});
