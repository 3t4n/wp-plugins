import React from 'react';
import ReactDOM from 'react-dom'

import { Fragment, useState, useEffect, useContext } from "@wordpress/element";
import DashboardContext from '../../context/DashboardContext';

export default function Number(props) {

    const dashboardContext = useContext(DashboardContext);

    let data  = props.data;
    let value = dashboardContext.dataValue[data.name];

    return (
        <>
            <input
                className="opt-main-input"
                name={data.name}
                value={value}
                placeholder={data.placeholder}
                onChange={dashboardContext.onChangeInput}
                type="number" />
        </>
    )
}