
//jscs:disable

import React from 'react';
import { Tooltip } from 'antd';
import { connect } from 'react-redux';

import Button from '../../button';
import ListItem from '../../list/item';
import CalconicList from '../../list/list';

import { actionFactory } from '../../../actions';
import { getCalculators } from '../../../services/calculator';

import 'antd/lib/tooltip/style/index.css';
import './index.scss';

function mapStoreToProps(store) {
  return { ...store };
}

function mapOptions(options, onClick) {
  return options.map((option, idx) => (
    <ListItem
      key={`${idx}`}
      onClick={() => onClick(option)}>
      <span className='calconic-item-wrapper'>
        <Tooltip title={`${option.active ? 'Calculator is active' : 'Calculator is inactive'}`}>
          <span className={`calconic-activity-symbol${option.active ? ' active' : ''}`}>
            {'•'}
          </span>
      </Tooltip>
        <h3>{option.settings.name}</h3>
      </span>
    </ListItem>
  ));
}

function CalculatorList(props) {
  return (
    <CalconicList>
      {mapOptions(props.calculators, props.onClick)}
    </CalconicList>
  );
}

function dispatchCalculators(calculators, dispatch) {
  dispatch(actionFactory('ASSIGN_CALCULATORS', { calculators }));
}

function EmbedOptions(props) {
  return (
    <div className='calconic-embed-options'>
      <h3>{props.calculator.settings.name}</h3>

      <h4>Regular shortcode:</h4>
      <div className='calconic-shortcode-embed'>
        {`[calconic id='${props.calculator._id}']`}
      </div>

      <h4>Ligtbox shortcode:</h4>
      <div className='calconic-shortcode-embed'>
        {`[calconic id='${props.calculator._id}' type='lightbox']My Text[/calconic]`}
      </div>
    </div>
  );
}

class CalculatorPage extends React.Component {
  state = {
    loading: true,
    loadingError: false,
    currentCalculator: null,
  }

  constructor(props) {
    super(props);

    this.setCalculator = this.setCalculator.bind(this);
  }

  async getCalculators() {
    try {
      const response = await getCalculators(this.props.apiKey);

      if (response.data && response.data.length) {
        this.setState({
          loading: false,
          loadingError: false,
          currentCalculator: response.data[0]
        }, () => {
          dispatchCalculators(response.data, this.props.dispatch);
        });
      }

      if (response.status >= 400 && response.status !== 404) {
        this.setState({ loading: false, loadingError: true });
      }
    } catch (err) {
      this.setState({ loading: false, loadingError: true });
      console.error(err);
    }
  }

  async componentDidMount() {
    await this.getCalculators();
  }

  setCalculator(calculator) {
    this.setState({ ...this.state, currentCalculator: calculator });
  }

  render() {
    if (this.state.loading) {
      return (
        <div className='calconic-page calconic-page-calculators'>
          <div className='calconic-page-header'>
            <h1 className='calconic-page-title'>
              Shortcode <b>generator</b>
            </h1>

            <Button
              href='https://app.calconic.com/login'
              type='confirm'
              link={true}
              rel='noopener noreferrer'
              target='_blank'>
              Open App
            </Button>
          </div>

          <div className='calconic-floating-card'>
            <div className='calconic-no-calc'>
              <h3>{'Loading calculators'}</h3>
              <h4>{'Please wait'}</h4>
            </div>
          </div>
        </div>
      );
    }

    if (this.state.loadingError) {
      return (
        <div className='calconic-page calconic-page-calculators'>
          <div className='calconic-page-header'>
            <h1 className='calconic-page-title'>
              Shortcode <b>generator</b>
            </h1>

            <Button
              href='https://app.calconic.com/login'
              type='confirm'
              link={true}
              rel='noopener noreferrer'
              target='_blank'>
              Open App
            </Button>
          </div>

          <div className='calconic-floating-card'>
            <div className='calconic-no-calc'>
              <h3>{'There was an error trying to load your calculators'}</h3>
              <h4>{'Please try again'}</h4>
            </div>
          </div>
        </div>
      );
    }

    if (!this.props.calculators.length) {
      return (
        <div className='calconic-page calconic-page-calculators'>
          <div className='calconic-page-header'>
            <h1 className='calconic-page-title'>
              Shortcode <b>generator</b>
            </h1>

            <Button
              href='https://app.calconic.com/login'
              type='confirm'
              link={true}
              rel='noopener noreferrer'
              target='_blank'>
              Open App
            </Button>
          </div>

          <div className='calconic-floating-card'>
            <div className='calconic-no-calc'>
              <h3>No calculators found.</h3>
              <h4>You should go ahead an create some!</h4>

              <Button
                href='https://app.calconic.com/editor'
                type='confirm'
                link={true}
                rel='noopener noreferrer'
                target='_blank'>
                Open Editor
              </Button>
            </div>
          </div>
        </div>
      );
    }

    return (
      <div className='calconic-page calconic-page-calculators'>
        <div className='calconic-page-header'>
          <h1 className='calconic-page-title'>
            Shortcode <b>generator</b>
          </h1>

          <Button
            href='https://app.calconic.com/login'
            type='confirm'
            link={true}
            rel='noopener noreferrer'
            target='_blank'>
            Open App
          </Button>
        </div>

        <div className='calconic-floating-card'>
          <div>
            <h2>{'Your active calculators'}</h2>
            <p>{'To see other calculators in this list, active them in our calconic editor'}</p>

            <div className='calconic-list-wrapper'>
              <CalculatorList
                calculators={this.props.calculators}
                onClick={this.setCalculator} />
            </div>
          </div>

          <div>
            <EmbedOptions calculator={this.state.currentCalculator} />
          </div>
        </div>
      </div>
    );
  }
}

export default connect(mapStoreToProps)(CalculatorPage);
