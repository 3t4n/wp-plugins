
import React from 'react';

import TransitionButton from './transitionalButton';

import './button.scss';

const defaultClickFunc = () => {};

function resolveIcon(type) {
  if (type) {
    return <i className="material-icons">{type}</i>;
  }

  return null;
}

function resolveStyleClasses(type, hasIcon) {
  return `lumi-button lumi-button-${type}${hasIcon ? ' lumi-button-icon' : ''}`;
}

function resolveHtmlType(htmlType) {
  if (htmlType === 'submit') {
    return { type: 'submit' };
  }

  return { type: 'button' };
}

function resolveContent(content) {
  if (content) {
    return (
      <span>
        {content}
      </span>
    );
  }

  return null;
}

function Button(props) {
  const clickFunc = props.onClick || defaultClickFunc;

  if (props.link === true) {
    return (
      <a
        href={props.href}
        rel={props.rel}
        target={props.target}
        className={resolveStyleClasses(props.type, props.icon ? true : false)} >
        {resolveIcon(props.icon)}
        {resolveContent(props.children)}
      </a>
    );
  }

  return (
    <button
      {...resolveHtmlType(props.htmlType)}
      disabled={props.disabled || false}
      className={resolveStyleClasses(props.type, props.icon ? true : false)}
      onClick={clickFunc}>
      {resolveIcon(props.icon)}
      {resolveContent(props.children)}
    </button>
  );
}

export default Button;
export {
  TransitionButton
};
