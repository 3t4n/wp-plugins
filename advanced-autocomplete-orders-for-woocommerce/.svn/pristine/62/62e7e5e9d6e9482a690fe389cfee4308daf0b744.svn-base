import React from 'react';
import ReactDOM from 'react-dom'

import { Fragment, useState, useEffect, useContext } from "@wordpress/element";
import DashboardContext from '../../context/DashboardContext';

export default function Checkbox(props) {

    const dashboardContext = useContext(DashboardContext);

    let data  = props.data;

    if( Object.keys(data.options).length === 0 ) {
        return;
    }

    let values = dashboardContext.dataValue[data.name];

    return (
        <ul className='opt-checkbox-list'>
            {
                Object.keys(data.options).map( (option_key, index) => {
                    let label = data.options[option_key];
                    let isChecked = false;

                    //@TODO need to be dynamic values after default value parsing
                    if( (values !== undefined) ) {
                        if( Object.values(values).includes(option_key) ) {
                            isChecked = true;
                        }
                    }

                    return(
                        <li>
                            <input
                                name={data.name + "[]"}
                                value={option_key}
                                checked={isChecked}
                                onChange={dashboardContext.onChangeInput}
                                data-context="checkbox"
                                type="checkbox" />
                            <span>{ label }</span>
                        </li>
                    )
                })
            }
        </ul>
    )
}