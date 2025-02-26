import React from 'react';

import { Fragment, useState, useEffect, createRef, useRef } from "@wordpress/element";
import DashboardContext from '../context/DashboardContext';

export default function Dummy() {

    const [dataValue, setDataValue] = useState({});
    const [runData, setRunData] = useState(true);
    const [runX, setRunX] = useState('one');

    useEffect(() => {

        if( runData ) {
            //fetchAPIData();

            console.log('hello data');

            setRunData(false);
        }else {
            console.log('hello follow');
        }

    }, [runData])

    return (
        <DashboardContext.Provider>
            <h1>Hello Dummy Dashboard</h1>
        </DashboardContext.Provider>
    );
}