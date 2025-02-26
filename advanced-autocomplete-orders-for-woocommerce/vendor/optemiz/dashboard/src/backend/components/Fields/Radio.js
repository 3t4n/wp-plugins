import React from 'react';
import ReactDOM from 'react-dom'

import { Fragment, useState, useEffect, useContext } from "@wordpress/element";
import DashboardContext from '../../context/DashboardContext';

export default function Radio(props) {

    let data  = props.data;

    if( Object.keys(data.options).length === 0 ) {
        return;
    }

    const dashboardContext = useContext(DashboardContext);

    let value = dashboardContext.dataValue[data.name];

    return (
        <ul className='opt-radio-list'>
            {
                Object.keys(data.options).map( (option_key, index) => {
                    let label = data.options[option_key];

                    return(
                        <li>
                            <input
                                name={data.name}
                                value={option_key}
                                id={option_key}
                                checked={value === option_key}
                                onChange={dashboardContext.onChangeInput}
                                type="radio" />
                            <span>{ label }</span>
                        </li>
                    )
                })
            }
        </ul>
    )
}