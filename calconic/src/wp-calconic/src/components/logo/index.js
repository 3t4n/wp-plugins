
import React from 'react';

import './logo.scss';

class CalconicLogo extends React.Component {
  resolveCls() {
    if (this.props.size === 'small') {
      return 'calconic-logo';
    }

    return 'calconic-logo large';
  }

  render() {
    return (
      <div className={this.resolveCls()}>
        <div className='logo-overflow'>
          <h1>{'CALCONIC'}</h1>
        </div>

        <div className='logo-underline'></div>
        <div className='beta'>{'BETA'}</div>
      </div>
    );
  }
}

export default CalconicLogo;
