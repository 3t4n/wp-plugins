
(function($) {

    // single select
    $(document).ready(function() {
        $('.opt-input-select').select2();

        //console.log(opt_dashboard_data);

        var optFieldItems = document.getElementsByClassName("opt-main-content-li");
        var arrOptFiledItems = Array.from(optFieldItems);

        arrOptFiledItems.forEach(function(item){
            item.addEventListener('click', optActiveItems)
        });

        function optActiveItems(event){
            event.preventDefault();

            // target value, with which we select the target content
            var targetValue    = this.dataset.list;

            // target content, we are going to active this content
            var targetContent  = this.closest('.opt-main-content').querySelector("[data-content="+ targetValue + "]");

            // selector subtab menu list active item
            var subtabActive  = this.closest('.opt-main-content-ul').querySelector(".opt-main-content-li-active");

            //remove subtab menu list's active class
            subtabActive.classList.remove("opt-main-content-li-active");

            // add active class to the target menu
            this.classList.add("opt-main-content-li-active");

            // selector subtab active content
            var activeContent = this.closest('.opt-main-content').querySelector(".opt-field-active");

            // remove subtab content's active class
            if( activeContent ) {
                activeContent.classList.remove("opt-field-active");
            }

            // add active class to the target content
            targetContent.classList.add("opt-field-active");
        }

        //  Left side bar tab

        var optLeftLists = document.querySelectorAll(".sidebar-li");

        // convert to array
        var optLeftListsArr = Array.from(optLeftLists);

        optLeftListsArr.forEach(function(item){
            item.addEventListener('click', optLeftActiveItems)
        });

        function optLeftActiveItems(){

            var leftSidebarTargetValue = this.dataset.mainMenu;

            var leftSidebarTargetContent = document.querySelector("[data-main-content="+ leftSidebarTargetValue + "]");

            var leftContentActive = document.querySelector(".opt-main-content-active");

            leftContentActive.classList.remove("opt-main-content-active");

            leftSidebarTargetContent.classList.add("opt-main-content-active");

            // target content first item active
            var tabActiveItem    = leftSidebarTargetContent.querySelector('.opt-main-content-ul .opt-main-content-li-active');

            // when active class is available, remove the active class
            if( tabActiveItem ) {
                tabActiveItem.classList.remove('opt-main-content-li-active');
            }

            // get the first tab item of the target menu item
            var targetFirstTab   = leftSidebarTargetContent.querySelector('.opt-main-content-ul .opt-main-content-li:first-child');

            // add active class to the first tab of the target menu item
            targetFirstTab.classList.add('opt-main-content-li-active');


            // selector subtab menu list active item
            var mainTabActive = document.querySelector(".sidebar-li-active");

            //remove subtab menu list's active class
            mainTabActive.classList.remove("sidebar-li-active");

            // add active class to the target menu
            this.classList.add('sidebar-li-active');

        }
    });

})(jQuery)






