import React, { useState, useEffect } from 'react';
import axios from 'axios';
import Logo from './Svg/metatext';

const Settings = () => {
    const url = `${appLocalizerMetaText.url}/wp-meta-text/v1/settings`;
    const [ loader, setLoader ] = useState( 'Save Settings' );
    const [ state, setState ] = useState( {
        description: "",
        mobile: "",
        horizontalAlignment: "",
        verticalAlignment: "",
        margins: {
            vertical: 0,
            horizontal: 0,
        }, 
        offsetMargin: "",
        buttonWidth: 0,
        appState: "",
        selector: "",
        error: "",
    } );
    

    useEffect( () => {
        axios.get( url )
        .then( res => {
            setState({...res.data, margins: JSON.parse(res.data.margins)});
        } )
    }, [] );
    
    const handleSubmit = (e) => {
        e.preventDefault();
        setLoader( 'Saving...' );
        setState( s => ({...s, error: ""}));
       
        axios.post( url, {...state, margins: JSON.stringify(state.margins) }, {
            headers: {
                'content-type': 'application/json',
                'X-WP-NONCE': appLocalizerMetaText.nonce
            }
        } )
        .then( ( res ) => {
            setLoader( 'Save Changes' );
        }).catch(e => {
            console.log(e.message);
            setState( s => ({...s, error: e.message}));
            setLoader( 'Save Changes' );
        })
    }

    const addState = ( e ) => {
        const target = e.target;
        let key = target.name;
        let value = target.value;

        setState( s => ({...s, error: ""}));

        if (key === 'margins') {
            key = target.id ==='horizontalMargin'? 'horizontal' : 'vertical';            
            setState(s => ({ 
                ...s, 
                margins: { 
                    ...s.margins, 
                    [key]: value
                } 
            }));
            return;
        }

        setState(s => ({ ...s, [key]: value }));
    }

    return(
        <React.Fragment>
            <Logo />
            <form id="work-settings-form" onSubmit={ (e) => handleSubmit(e) }>
                <div className="meta-text-field ">
                    <label htmlFor="buttonDescription">Text Description</label>
                    <input type="text" name="description" onChange={addState} id="buttonDescription" value={state.description} />
                </div>
                <div className="meta-text-field">
                    <label htmlFor="displayOption">Show On Mobile?:</label>
                    <select name="mobile" id="displayOption" value={state.mobile} onChange={addState}>
                        <option value="show">Show</option>
                        <option value="hide">Hide</option>
                    </select>
                </div>
                <div className="meta-text-field">
                    <label htmlFor="horizontalAlignment">Horizontal Alignment:</label>
                    <select name="horizontalAlignment" id="horizontalAlignment" value={state.horizontalAlignment} onChange={addState}>
                        <option value="right">Right</option>
                        <option value="left">Left</option>
                    </select>
                </div>
                <div className="meta-text-field">
                    <label htmlFor="verticalAlignment">Vertical Alignment:</label>
                    <select name="verticalAlignment" id="verticalAlignment" value={state.verticalAlignment} onChange={addState}>
                        <option value="bottom">Bottom</option>
                        <option value="top">Top</option>
                    </select>
                </div>
                <div className="meta-text-field">
                    <label htmlFor="horizontalMargin">Custom Horizontal Margin (px):</label>
                    <input type="number" name="margins" id="horizontalMargin" onChange={addState} value={state.margins.horizontal} />
                </div>
                <div className="meta-text-field">
                    <label htmlFor="verticalMargin">Custom Vertical Margin (px):</label>
                    <input type="number" name="margins" id="verticalMargin" onChange={addState} value={state.margins.vertical} />
                </div>
                <div className="meta-text-field">
                    <label htmlFor="buttonWidth">Preferred Button Width (px):</label>
                    <input type="number" name="buttonWidth" id="buttonWidth" onChange={addState} value={state.buttonWidth} />
                </div>
                <div className="meta-text-field">                    
                <label htmlFor="appState">Activate/Deactivate Plugin</label>
                    <select name="appState" id="appState" value={state.appState} onChange={addState}>
                        <option value="enable">Enabled</option>
                        <option value="disable">Disabled</option>
                    </select>
                </div>

                <div className="meta-text-field meta-text-field-full">
                    <label htmlFor="selector">Preferred Selector:</label>
                    <textarea placeholder='Add an element selector' name="selector" id="selector" value={ state.selector } onChange={addState}></textarea>
                    <p>Add a preferred selector to apply metaText to it's text content (default selector is the body element).</p>
                </div>

                <p className="submit">
                    <button type="submit" className="button button-primary">{ loader }</button>
                </p>
                <p style={{color: 'red'}}>{state.error}</p>
            </form>
        </React.Fragment>
    )
}


export default Settings;