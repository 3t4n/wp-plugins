import React from 'react';

import { Fragment, useState, useEffect } from "@wordpress/element";

export default function () {

    const [apiData, setApiData] = useState({});

    let opt_sidebar = opt_dashboard_data.settings.sidebar;

    function sidebarItems() {

        if ( !('items' in opt_sidebar) ) {
            return;
        }
        
        let items = opt_sidebar.items.map( (item) => {

            let email_subscribe_input = "";

            if( item.type === "subscribe" ) {
                email_subscribe_input = <input className="opt-right-side-bar-input" type="email" placeholder="sample@mail.com" />
            }

            return(
                <div className="opt-body-right-contents">
                    <div className="opt-right-side-bar">
                        <div className="opt-right-side-bar-title">
                            <img className="opt-right-side-bar-title-img" src={ opt_dashboard_data.plugin_url + "/assets/images/email.png" } alt={ item.label } />
                            <h4 className="opt-right-side-bar-title-heading">{ item.label }</h4>
                        </div>
                        <p className="opt-right-side-bar-para">{ item.content }</p>

                        { email_subscribe_input }

                        <a className="opt-right-side-bar-btn"  href=""><span className="opt-right-side-bar-span">{ item.buttons[0].button_label }</span></a>
                    </div>
                </div>
            )
        });


        return items;
    }


    return (
        <div className="opt-body-right-child">

            { sidebarItems() }

        </div>
    )
}