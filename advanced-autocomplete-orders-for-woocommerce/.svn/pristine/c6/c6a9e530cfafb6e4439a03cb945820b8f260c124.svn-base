import React from 'react';
import ReactDOM from 'react-dom'

import { Fragment, useState, useEffect, useContext } from "@wordpress/element";

import DashboardContext from '../context/DashboardContext';
import SubTab from './SubTab';
import FieldContent from './FieldContent';

export default function TabContent(props) {

    const dashboardContext = useContext(DashboardContext);
    //let tabs = props.menu_item.tabs;

    //const opt_form = dashboardContext.apiData.localData.settings.form;

    let content_classes = ['opt-main-content'];

    if( props.counter == 0 ) {
        content_classes.push('opt-main-content-active');
    }

    let tabs = props.item.tabs;

    // console.log(tabs);


    return (
        <div className={ content_classes.join(' ') } data-main-content={ props.item_type }>
            <SubTab menu_item={ props.item }/>
            <FieldContent field_content={tabs}/>
        </div>
    )
}