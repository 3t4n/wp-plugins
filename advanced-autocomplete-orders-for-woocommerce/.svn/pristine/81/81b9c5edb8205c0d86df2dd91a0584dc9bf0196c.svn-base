import React from 'react';
import ReactDOM from 'react-dom'

import { Fragment, useState, useEffect, useContext } from "@wordpress/element";
import DashboardContext from '../../context/DashboardContext';

export default function Switch(props) {

    const dashboardContext = useContext(DashboardContext);

    let data  = props.data;
    let value = dashboardContext.dataValue[data.name];

    return (
        <>
            <label class="opt-switch-field">
                <input
                    name={data.name}
                    value={parseInt(value) === 1 ? 1 : 0}
                    type="checkbox"
                    data-context="switch"
                    onChange={dashboardContext.onChangeInput}
                    checked={parseInt(value) === 1}
                    />
                <span class="opt-slider opt-slider-round"></span>
            </label>
        </>
    )
}