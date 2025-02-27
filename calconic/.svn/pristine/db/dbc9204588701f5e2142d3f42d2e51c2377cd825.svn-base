
import React from 'react';

import './card.scss';

function resolveStyle(style) {
  if (style) {
    return { style: { ...style } };
  }

  return null;
}

function CalconicCard(props) {
  return (
    <div
      {...resolveStyle(props.style)}
      className={`calconic-card${props.className ? ' ' + props.className : ''}`}>
      {props.children}
    </div>
  );
}

function resolveTitle(title) {
  if (title) {
    return (
      <div className='card-title'>
        {title}
      </div>
    );
  }

  return null;
}

function resolveContent(content) {
  if (content) {
    return (
      <div className='card-content'>
        {content}
      </div>
    );
  }

  return null;
}

function Card(props) {
  return (
    <div
      {...resolveStyle(props.style)}
      className={`calconic-flat-card${props.className ? ' ' + props.className : ''}`}>
      {resolveTitle(props.title)}
      {resolveContent(props.children)}
    </div>
  );
}

export default Card;
