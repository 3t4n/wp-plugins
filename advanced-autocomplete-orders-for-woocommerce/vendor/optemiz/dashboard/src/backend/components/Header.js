import React from 'react';
import ReactDOM from 'react-dom'
import axios from 'axios'

import { Fragment, useState, useEffect } from "@wordpress/element";

export default function Header() {

    if(opt_dashboard_data.settings.args.header === false) {
        return;
    }

    let opt_header = opt_dashboard_data.settings.header;

    return (
        <header className="opt-top-bar">
            <div className="opt-top-left-side">
                <img className="logo" src={ opt_dashboard_data.plugin_url + "/assets/images/xplainer.png" } alt="" />
                <img className="icon_wrapper" src={ opt_dashboard_data.plugin_url + "/assets/images/icon_wrapper.png" } alt="" />
                <h4 className="top-bar-content">{ opt_header.heading } <span className="opt-topbar-version">{ opt_header.version }</span></h4>
            </div>
            
            { ( opt_header.buttons.upgrade_to_pro && (
                <div className="opt-top-right-side">
                    <a className="top-bar-btn" href={ opt_header.buttons.upgrade_to_pro.url  }>
                        <img className="top-btn-icon" src={ opt_dashboard_data.plugin_url + "/assets/images/gift.png" } alt="upgrade to pro icon" /><span className="opt-top-bar-text">{ opt_header.buttons.upgrade_to_pro.text }</span>
                    </a>
                </div>
            ) )  }
        </header>

    )
}