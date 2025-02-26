import React from 'react';
import ReactDOM from 'react-dom'

import { Fragment, useState, useEffect, useContext } from "@wordpress/element";

import DashboardContext from '../context/DashboardContext';

export default function Tab() {

    //const [apiData, setApiData] = useState({});

    const dashboardContext = useContext(DashboardContext);

    const opt_settings  = dashboardContext.apiData.localData.settings;
    const opt_form      = opt_settings.form;

    useEffect(  () => {

        function tabItems() {
            let menu_sidebar = document.querySelector('.left-sidebar .sidebar-ul');

            let menu_list_items = opt_form.items;

            let counter = 0;
            let menu_list = Object.keys(menu_list_items).map( (key) => {

                let menu_list_item = menu_list_items[key];

                let menu_item_classes = ['sidebar-li'];

                if( counter == 0 ) {
                    menu_item_classes.push('sidebar-li-active');
                }

                counter++;

                return (
                    <li className={ menu_item_classes.join(' ') } data-main-menu={key} onClick={onClickTab}>
                        <img src={ opt_dashboard_data.plugin_url + "/assets/images/"+ key +".svg" } alt="" />
                        <span className="opt-sidebar-text">{ menu_list_item.menu.label }</span>
                    </li>
                )

            })

            ReactDOM.render(menu_list, menu_sidebar);
        }

        tabItems();

    }, [] )

    function onClickTab(event){
        event.preventDefault();
        event.stopPropagation();

        let $this = event.target;

        let currentItem = $this.closest('.sidebar-li');

        let leftSidebarTargetValue = currentItem.dataset.mainMenu;

        let leftSidebarTargetContent = document.querySelector("[data-main-content="+ leftSidebarTargetValue + "]");

        let leftContentActive = document.querySelector(".opt-main-content-active");

        leftContentActive.classList.remove("opt-main-content-active");

        leftSidebarTargetContent.classList.add("opt-main-content-active");

        // target content first item active
        let tabActiveItem    = leftSidebarTargetContent.querySelector('.opt-main-content-ul .opt-main-content-li-active');

        // when active class is available, remove the active class
        if( tabActiveItem ) {
            tabActiveItem.classList.remove('opt-main-content-li-active');
        }

        // get the first tab item of the target menu item
        let targetFirstTab   = leftSidebarTargetContent.querySelector('.opt-main-content-ul .opt-main-content-li:first-child');

        // add active class to the first tab of the target menu item
        targetFirstTab.classList.add('opt-main-content-li-active');


        // selector subtab menu list active item
        let mainTabActive = document.querySelector(".sidebar-li-active");

        //remove subtab menu list's active class
        mainTabActive.classList.remove("sidebar-li-active");

        // add active class to the target menu
        currentItem.classList.add('sidebar-li-active');

    }

    return (
        <div className="left-sidebar">
            <h4 className="left-sidebar-heading">{ opt_settings.args.panel_title }</h4>

            <ul className="sidebar-ul">

                {/*
                <li className="sidebar-li sidebar-li-active" data-main-menu="first"><img src={ opt_dashboard_data.plugin_url + "/assets/images/General.png" } alt="" /><span className="opt-sidebar-text">General</span></li>
                <li className="sidebar-li" data-main-menu="second"><img src={ opt_dashboard_data.plugin_url + "/assets/images/style.png" } alt="" /><span className="opt-sidebar-text">Style</span></li>
                <li className="sidebar-li" data-main-menu="third"><img src={ opt_dashboard_data.plugin_url + "/assets/images/display.png" } alt="" /><span className="opt-sidebar-text">Display</span></li>
                <li className="sidebar-li"><img src={ opt_dashboard_data.plugin_url + "/assets/images/cart.png" } alt="" /><span className="opt-sidebar-text">Cart</span></li>
                <li className="sidebar-li"><img src={ opt_dashboard_data.plugin_url + "/assets/images/order.png" } alt="" /><span className="opt-sidebar-text">Order</span></li>
                <li className="sidebar-li"><img src={ opt_dashboard_data.plugin_url + "/assets/images/string.png" } alt="" /><span className="opt-sidebar-text">String</span></li>
                <li className="sidebar-li"><img src={ opt_dashboard_data.plugin_url + "/assets/images/global.png" } alt="" /><span className="opt-sidebar-text">Global</span></li>
                <li className="sidebar-li"><img src={ opt_dashboard_data.plugin_url + "/assets/images/license.png" } alt="" /><span className="opt-sidebar-text">License</span></li>
                <li className="sidebar-li"><img src={ opt_dashboard_data.plugin_url + "/assets/images/upload_manager.png" } alt="" /><span className="opt-sidebar-text">Upload Manager</span></li>
                <li className="sidebar-li"><img src={ opt_dashboard_data.plugin_url + "/assets/images/custom.png" } alt="" /><span className="opt-sidebar-text">Custom Code</span></li> */}
            </ul>
        </div>
    )
}