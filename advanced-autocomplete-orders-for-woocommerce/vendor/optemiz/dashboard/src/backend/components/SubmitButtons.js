import React from 'react';
import ReactDOM from 'react-dom'

import { Fragment, useState, useEffect, useContext } from "@wordpress/element";
import DashboardContext from '../context/DashboardContext';

export default function SubmitButtons(props) {

    const dashboardContext = useContext(DashboardContext);

    return (
        <div className="opt-main-items-button">
            <div className="opt-main-item-button">
                <button className="opt-main-content-bottom-btn" type="submit">Save Changes</button>
                <a className="opt-main-content-bottom-anchor" onClick={dashboardContext.onResetData}>Reset Settings</a>
            </div>
        </div>
    )
}