
//jscs:disable

import React from 'react';
//eslint-disable-next-line
import { CSSTransitionGroup, Transition } from 'react-transition-group';

class TransitionButton extends React.Component {
  static defaultProps = {
    active: false,
    type: 'primary',
    defaultContent: <span />,
    activeContent: <span />,
    onClick: () => {},
  }

  state = { active: false }

  classList = {
    defaultContent: ['lumi-transitional-button-default'],
    activeContent: ['lumi-transitional-button-active']
  }

  resolveActiveClasses(type) {
    if (type === 'defaultContent') {
      if (!this.props.active) {
        const classList = [].concat(this.classList.defaultContent);

        classList.push('lumi-button-option-active');
        classList.push(this.props.type);

        return classList.join(' ');
      }

      return this.classList.defaultContent.join(' ');
    }

    if (type === 'activeContent') {
      if (this.props.active) {
        const classList = [].concat(this.classList.activeContent);

        classList.push('lumi-button-option-active');

        return classList.join(' ');
      }

      return this.classList.activeContent.join('');
    }
  }

  resolveContent() {
    if (!this.props.active) {
      return (
        <span key='default' className={this.resolveActiveClasses('defaultContent')}>
          {this.props.defaultContent}
        </span>
      );
    }

    return (
      <span key='active' className={this.resolveActiveClasses('activeContent')}>
        {this.props.activeContent}
      </span>
    );
  }

  resolveBaseClasses() {
    const classList = ['lumi-button', 'lumi-transitional-button'];

    if (this.props.active) {
      classList.push('lumi-transitional-button-active');
    }

    classList.push(`lumi-button-${this.props.type}`);

    return classList.join(' ');
  }

  render() {
    return (
      <button className={this.resolveBaseClasses()} onClick={this.props.onClick.bind(this)}>
        <Transition
          in={this.props.active}
          timeout={100}>
          {this.resolveContent()}
        </Transition>
      </button>
    );
  }
}

export default TransitionButton;
