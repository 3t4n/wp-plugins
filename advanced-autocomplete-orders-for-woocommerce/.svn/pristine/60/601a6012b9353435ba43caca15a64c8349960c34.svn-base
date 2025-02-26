import React from 'react';
import ReactDOM from 'react-dom'

import { Fragment, useState, useEffect, useContext } from "@wordpress/element";

import DashboardContext from '../context/DashboardContext';
import Field from './Field';

export default function FieldContent(props) {

    const dashboardContext = useContext(DashboardContext);
    let counter = 0;

    useEffect(  () => {

    }, [] )

    let field_item = props.field_content;

    //console.log(field_item);




    return (
        <div className="opt-fields-area">
            {

            Object.keys(field_item).map(function(field_item_key, key) {

                let tab_item = field_item[field_item_key];

                // console.log(tab_item);
                // console.log(field_item_key);

                if( ! tab_item.hasOwnProperty('fields') ) {
                    return;
                }

                //fields data
                let fields = tab_item.fields;


                //fields item classes
                let field_item_classes = ['opt-main-items'];
                if( counter == 0 ) {
                    field_item_classes.push('opt-field-active');
                }

                counter++;

                return(
                    <div data-content={ field_item_key } className={ field_item_classes.join(' ') } key={key}>
                        {

                            Object.keys(fields).map(function(field_key, key) {

                                let field = fields[field_key];

                                return(
                                    <Field field={field} key={key}/>
                                )
                            })
                        }

                    </div>
                )
            })
            }
        </div>
    )
}