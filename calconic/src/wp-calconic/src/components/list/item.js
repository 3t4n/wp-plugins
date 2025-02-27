
import React from 'react';

import './item.scss';

function ListItem(props) {
  return (
    <li
      className='calconic-list-item'
      onClick={props.onClick}>
      {props.children}
    </li>
  );
}

export default ListItem;
