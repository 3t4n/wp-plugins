import React from 'react';
import ReactDOM from 'react-dom'

import { Fragment, useState, useEffect, useContext } from "@wordpress/element";

import DashboardContext from '../context/DashboardContext';
import Text from './Fields/Text';
import Number from './Fields/Number';
import Radio from './Fields/Radio';
import Checkbox from './Fields/Checkbox';
import Switch from './Fields/Switch';
import SelectField from './Fields/Select';
import Color from './Fields/Color';

export default function Field(props) {

    const dashboardContext = useContext(DashboardContext);
    let counter = 0;

    let field_item  = props.field;
    let type        = field_item.type;

    // console.log(type);

    function displayField(type) {
        if( type == 'text' ) {
            return (
                <Text data={field_item}/>
            );
        }else if( type == 'number' ) {
            return (
                <Number data={field_item} />
            );
        }else if( type == 'radio' ) {
            return (
                <Radio data={field_item} />
            );
        }else if( type == 'checkbox' ) {
            return (
                <Checkbox data={field_item} />
            );
        }else if( type == 'switch' ) {
            return (
                <Switch data={field_item} />
            );
        }else if( type == 'color' ) {
            return (
                <Color data={field_item} />
            );
        }else if( type == 'select' ) {
            return (
                <SelectField data={field_item} />
            );
        }
    }

    return (
        <div className="opt-main-item">
            <div className="opt-contents">
                <h4 className="opt-item-heading">{field_item.label}</h4>
                <p className="opt-item-para">{field_item.description}</p>
            </div>

            { displayField(type) }
        </div>
    )
}