
//jscs:disable

import React from 'react';
import { connect } from 'react-redux';
import { Redirect } from 'react-router-dom';
//eslint-disable-next-line
import { Form, Input, Icon, message } from 'antd';

import 'antd/lib/input/style/index.css';
import 'antd/lib/form/style/index.css';

import './login.scss';

import Logo from '../../logo';
import Button from '../../button';

import { actionFactory } from '../../../actions';
import { isAuthenticated, authenticateUser, saveAPIKey } from '../../../services/user';

function dispatchKey(key, dispatch) {
  dispatch(actionFactory('AUTHENTICATE', { key }));
}

function mapStoreToProps(store) {
  return { apiKey: store.apiKey };
}

class LoginForm extends React.Component {
  state = { submitting: false }

  constructor(props) {
    super(props);

    this.validateForm = this.validateForm.bind(this);
  }

  validateForm(evt) {
    evt.preventDefault();

    const { form } = this.props;

    form.validateFieldsAndScroll((err, values) => {
      if (!err) {
        this.setState({ submitting: true }, async () => {
          try {
            await this.props.requestKey(values.email, values.password);
          } catch (err) {
            throw err;
          }
        });
      }
    });
  }

  render() {
    const { getFieldDecorator } = this.props.form;

    return (
      <div className='calconic-login-form'>
        <h2>{'Sign in'}</h2>

        <Form onSubmit={this.validateForm}>
          <Form.Item>
            {getFieldDecorator('email', {
              rules: [{
                required: true, message: 'Please input your email'
              }, {
                type: 'email',
                message: 'The email does not seem to be valid.'
              }],
            })(<Input
              placeholder='Email'
              prefix={<Icon type="user" style={{ fontSize: 13 }} />}/>
            )}
          </Form.Item>

          <Form.Item>
            {getFieldDecorator('password', {
              rules: [{ required: true, message: 'The password is required' }],
            })(<Input
              type='password'
              placeholder='Password'
              prefix={<Icon type="lock" style={{ fontSize: 13 }} />}/>
          )}
          </Form.Item>

          <span className='login-button'>
            <Form.Item>
              <Button
                type="confirm"
                htmlType="submit"
                disabled={this.state.submitting}>
                {!this.state.submitting ? 'Log in' : 'Please wait'}
              </Button>
            </Form.Item>
          </span>

          <span className='recovery-link'>
            <a
              href='https://app.calconic.com/reset'
              rel="noopener noreferrer"
              target='_blank'>{'Forgot password?'}</a>
          </span>
        </Form>
      </div>
    );
  }
}

class LoginPage extends React.Component {
  state = {
    submitting: false,
  }

  constructor(props) {
    super(props);

    this.requestKey = this.requestKey.bind(this);
  }

  async requestKey(email, password) {
    const response = await authenticateUser(email, password);

    if (response.data && response.data.key) {
      await saveAPIKey(response.data.key);
      dispatchKey(response.data.key, this.props.dispatch);
    }
  }

  render() {
    if (isAuthenticated(this.props.apiKey)) {
      return <Redirect to='/calculators' />;
    }

    const WrappedForm = Form.create()(LoginForm);

    return (
      <div className='calconic-page calconic-page-login'>
        <Logo size='large' />

        <WrappedForm requestKey={this.requestKey} />

        <span className='signup-redirect'>
          <p>
            {'Don\'t have an account? '} <a
              href='https://app.calconic.com/signup'
              rel="noopener noreferrer"
              target='_blank'>{'Signup'}</a>
          </p>
        </span>
      </div>
    );
  }
}

export default connect(mapStoreToProps)(LoginPage);
