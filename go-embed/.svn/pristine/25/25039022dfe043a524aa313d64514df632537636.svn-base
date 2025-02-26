import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';

function camelize(str) {
  return str.replace(/(?:^\w|[A-Z]|\b\w)/g, function(word, index) {
    return index === 0 ? word.toLowerCase() : word.toUpperCase();
  }).replace(/\s+/g, '').replace(/-/g, '');
}

const appId = camelize(JS_APP_ID);
const suffix = 'renderer';

export class AppInstall extends React.Component {
    render() {
        return (
            <App />
        )
    }
};

window.React = React;
window.ReactDOM = ReactDOM;
window[`${appId}${suffix}`] = (root) => {
    if (root) {
        console.log(`React App with element`, root);
        ReactDOM.render(React.createElement(AppInstall), root);
    } else {
        console.log(`React ${JS_APP_ID} App with element ${appId} id`);
        ReactDOM.render(React.createElement(AppInstall), document.getElementById(appId));
    }
};
window[`${appId}${suffix}`]();
