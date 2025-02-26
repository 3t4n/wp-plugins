import React from 'react';
import ReactDOM from 'react-dom'

import { Fragment, useState, useEffect, useContext } from "@wordpress/element";

//import DashboardContext from '../context/DashboardContext';

export default function SubTab(props) {

    //const dashboardContext = useContext(DashboardContext);
    let tabs    = props.menu_item.tabs;
    let counter = 0;

    //const opt_form = dashboardContext.apiData.localData.settings.form;

    //console.log(tabs);


    function onClickSubTab(event){
        event.preventDefault();

        let $this = event.target;

        // target value, with which we select the target content
        let targetValue    = $this.dataset.list;

        // target content, we are going to active this content
        let targetContent  = $this.closest('.opt-main-content').querySelector("[data-content="+ targetValue + "]");

        // selector subtab menu list active item
        let subtabActive  = $this.closest('.opt-main-content-ul').querySelector(".opt-main-content-li-active");

        //remove subtab menu list's active class
        subtabActive.classList.remove("opt-main-content-li-active");

        // add active class to the target menu
        $this.classList.add("opt-main-content-li-active");

        // selector subtab active content
        let activeContent = $this.closest('.opt-main-content').querySelector(".opt-field-active");

        // remove subtab content's active class
        if( activeContent ) {
            activeContent.classList.remove("opt-field-active");
        }

        // add active class to the target content
        targetContent.classList.add("opt-field-active");
    }


    return (
        <ul className="opt-main-content-ul">
            {

                Object.keys(tabs).map(function(tab_item_key, key) {

                    let tab_item = tabs[tab_item_key];

                    // console.log(tab_item.menu.label);

                    let submenu_item_classes = ['opt-main-content-li'];
                    if( counter == 0 ) {
                        submenu_item_classes.push('opt-main-content-li-active');
                    }

                    counter++;

                    return(
                        <li className={ submenu_item_classes.join(' ') } data-list={tab_item_key} key={key} onClick={onClickSubTab}>{ tab_item.menu.label }</li>
                    )
                })
            }
        </ul>
    )
}