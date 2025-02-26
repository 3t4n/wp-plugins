import React from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios'
import QS from 'qs';
import NotificationSystem from 'react-notification-system';

import { Fragment, useState, useEffect, createRef, useRef } from "@wordpress/element";

import DashboardContext from '../context/DashboardContext';

import Header from './Header';
import Body from './Body';

export default function Container() {
    let notificationSystem = createRef();
    const runDataRef = useRef(false);

    const [apiData, setApiData] = useState({
        localData: opt_dashboard_data,
        settingsValue: {}
    });

    const [dataValue, setDataValue] = useState({});
    const [runData, setRunData] = useState(true);
    const [saveData, setSaveData] = useState(false);
    const [resetData, setResetData] = useState(false);
    const [runX, setRunX] = useState('one');

    useEffect( () => {

        async function fetchData() {
            if( runData ) {

                let defaultValues   = await optGetDefaultData();
                let parsedValue     = defaultValues;

                var data = {
                    action: 'opt_get_settings_data',
                    key: opt_dashboard_data.settings.key,
					nonce: opt_dashboard_data.nonce
                };

                axios.post(opt_dashboard_data.ajaxurl, QS.stringify( data ))
                .then( function (response) {
                    let data = response.data;

                    if( data.success ) {

                        if( Object.keys(data.data.values).length > 0 ) {
                            let dataValueObj = data.data.values;

                            parsedValue = { ...defaultValues, ...dataValueObj };
                        }
                    }

                    setDataValue(parsedValue);

                })
                .catch(function (error) {
                    console.log(error);
                });

                setRunData(false);
            }
        }

        fetchData();
    }, [runData])

    useEffect( () => {

        async function updateData() {
            if( saveData ) {

                var data = {
                    action: 'opt_update_settings_data',
                    key: opt_dashboard_data.settings.key,
                    value: dataValue,
					nonce: opt_dashboard_data.nonce
                };

                const notification = notificationSystem.current;

                axios.post(opt_dashboard_data.ajaxurl, QS.stringify( data ))
                .then( function (response) {
                    let data = response.data;
                    let dataValueObj = {};

                    if( data.success ) {

                        notification.addNotification({
                            title: 'Success!', //@TODO need to be dynamic
                            message: 'Settings Saved', //@TODO need to be dynamic
                            level: 'success',
                            position: 'br',
                            autoDismiss: 2,
                        });
                    }

                })
                .catch(function (error) {
                    console.log(error);
                });

                setSaveData(false);
            }
        }

        updateData();
    }, [saveData])

    useEffect( () => {

        async function runResetData() {
            if( resetData ) {

                let defaultValues = await optGetDefaultData();

                var data = {
                    action: 'opt_update_settings_data',
                    key: opt_dashboard_data.settings.key,
                    value: defaultValues
                };

                const notification = notificationSystem.current;

                axios.post(opt_dashboard_data.ajaxurl, QS.stringify( data ))
                .then( function (response) {
                    let data = response.data;
                    let dataValueObj = {};

                    console.log('reset done');

                    if( data.success ) {

                        notification.addNotification({
                            title: 'Success!', //@TODO need to be dynamic
                            message: 'Settings Reset', //@TODO need to be dynamic
                            level: 'success',
                            position: 'br',
                            autoDismiss: 2,
                        });
                    }

                })
                .catch(function (error) {
                    console.log(error);
                });

                // reset data state to false
                setResetData(false);
            }
        }

        runResetData();
    }, [resetData])

    async function optGetDefaultData() {
        let field_data = {};
        let items = opt_dashboard_data.settings.form.items;

        if( Object.keys(items).length > 0 ) {
            Object.keys(items).map( (items_key) => {
                let item = items[items_key];
                if( 'tabs' in item ) {
                    let tabs = item.tabs; //@TODO need to check `tabs` exists

                    Object.keys(tabs).map( (tab_key) => {

                        if( 'fields' in tabs[tab_key] ) {
                            let fields = tabs[tab_key].fields; //@TODO need to check `fields` exists

                            Object.keys(fields).map( (field_key) => {
                                let field           = fields[field_key];

                                if( 'name' in field && 'default_value' in field ) {
                                    let name            = field.name;
                                    let default_value   = field.default_value;

                                    field_data[name] = default_value;
                                }

                            });
                        }

                    });
                }

            });

            // console.log(field_data);

        }

        return field_data;
    }

    function onSubmitData(event) {
        event.preventDefault();

        setSaveData(true);
    }

    function onResetData(event) {
        event.preventDefault();

        let letsReset = confirm('Do you want to reset your settings?');

        if( letsReset ) {
            setResetData(true);
        }

    }

    function onChangeColor({value, item}) {
        console.log(item);

        // option name
        let name = item.name;

        // old values
        let currentData = { ...dataValue };

        // set current value
        currentData[name] = value;

        // update values
        setDataValue(currentData);
    }

    function onChangeSelect({value, item}) {
        // option name
        let name = item.name;
            name = sanitizeOptionsKey(name);

            console.log(item);

        // old values
        let currentData = { ...dataValue };

        console.log(value);

        // sync values
        let optionValues = [];
        if( value.length > 1 ) {
            Object.keys(value).forEach(function(key) {
                let item = value[key].value;
                optionValues.push(item);
            });
        }else {
            optionValues[0] = Array.isArray(value) ? value[0].value : value.value;
        }

        // set current value
        currentData[name] = optionValues;

        // update values
        setDataValue(currentData);

    }

    function onChangeInput(event) {

        console.log("inside on change input");

        let { value, name, type, checked, dataset } = event.target;
        let currentData = { ...dataValue };

        // console.log(checked);
        // console.log(value);
        // console.log(name);


        if( type === 'checkbox'  ) {
            let context = dataset.context;

            if( context === 'checkbox' ) {
                // remove `[]` parenthesis from the name
                name = sanitizeOptionsKey(name);

                // get the old values
                let oldValues = currentData[name];

                if (checked) {
                    // add to the list
                    currentData[name] = [
                        ...oldValues,
                        value,
                    ];
                } else {
                    // remove from list
                    currentData[name] = oldValues.filter((oldValue) => oldValue !== value);
                }
            }else if( context === 'switch' ) {
                currentData[name] = (value == 1) ? 0 : 1;
            }

        }else {
            currentData[name] = value;
        }

        // update values
        setDataValue(currentData);
    }

    function sanitizeOptionsKey(key) {
        // remove `[]` parenthesis from the field key
        key = key.replace(/[\])}[{(]/g, '');

        return key
    }

    let NotiStyle = {
        Containers: {
            DefaultStyle: {
                width: '260px',
            },
            br: {
                top: 'auto',
                bottom: '30px',
                left: 'auto',
                right: '50px'
            },
        },
        NotificationItem: {
            DefaultStyle: {
                borderTop: '',
                borderLeft: '5px solid #4abe61',
                margin: '10px 0px 0px 0px',
                padding: '15px',
                borderRadius: '5px',
            },
            success: {
                color: '#5B616F',
                backgroundColor: '#fff',
            }
        },
        Title: {
            DefaultStyle: {
                fontSize: '16px',
                fontWeight: '600'
            },
            success: {
                color: '#24A148'
            },
        }
    }

    return (
        <DashboardContext.Provider
            value={{apiData, onSubmitData, onResetData, dataValue, onChangeInput, onChangeSelect}}
        >
            <Header />
            <Body go={runData}/>
            <NotificationSystem ref={notificationSystem} style={NotiStyle}/>

        </DashboardContext.Provider>
    );
}
