import React from 'react';
import ReactDOM from 'react-dom'

import { Fragment, useState, useEffect, useContext } from "@wordpress/element";
import DashboardContext from '../../context/DashboardContext';

export default function Color(props) {

    const dashboardContext = useContext(DashboardContext);

    let data  = props.data;
    let value = dashboardContext.dataValue[data.name];

    return (
        <>
            <label class="opt-color-field">
                <input
                    name={data.name}
                    value={value}
                    type="color"
                    onChange={dashboardContext.onChangeInput}
                    />
            </label>
        </>
    )
}