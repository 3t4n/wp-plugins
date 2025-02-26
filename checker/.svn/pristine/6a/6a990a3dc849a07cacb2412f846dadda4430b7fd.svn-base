import React, { Component } from 'react';

class ToolButton extends Component {
  render() {
    const { name, icon, eventHandler, className } = this.props;
    return (
      <a
        href="#"
        className={"chkr-tool-btn " + className}
        id={`chkr-tool-btn-${name}`}
        onClick={eventHandler}
      >
        <i className={icon}></i>
        <span className="chkr-hidden">{name}</span>
      </a>
    );
  }
}

export default ToolButton;
