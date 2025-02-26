import React, { useState } from 'react';
import { useDispatch } from 'react-redux';

// WP API
import { fetchCheckCurrentUser, WP } from '../../api';

// Components
import MainButton from '../Buttons/MainButton';
import BackButton from '../Buttons/BackButton';
import { Content } from '../Styles';

// Actions
import { changeAction, changeError, changeStatusLoader } from '../../actions/global.actions';

// Main component
export default function Register({changeForm}) {
	// redux Hooks
	const dispatch = useDispatch();
	const [creds, setCreds] = useState({
    firstName: '',
    lastName: '',
		username: '',
		email: '',
		password: '',
		confirmPassword: '',
	});

	const handleChangeInput = (e) => {
		setCreds({
			...creds,
			[e.target.name]: e.target.value,
		});
	}

	const handleSubmit = async (e) => {
		e.preventDefault();

		dispatch(changeStatusLoader(true));

		const resRegister = await WP.auth.register(creds);
		if (!resRegister.success) {
			dispatch(changeError(resRegister.data.error));
			dispatch(changeStatusLoader(false));
			return;
		}

		await fetchCheckCurrentUser();
		dispatch(changeAction('PAYMENT'));
	}

	return (
		<form>
			<Content>
				<BackButton
					action="DONATION_SETUP"
					actionButtonText="Make a recurring donation"
				/>
				<div className="dydo_row">
					<div className="dydo_col-xs-12 dydo_col-sm-12">
						<p className="dydo_donation-type__placeholder">Please create your account to make your donation</p>
					</div>
					<div className="dydo_col-xs-12">
						<div className="dydo_auth-form__item">
							<label
								htmlFor="dydo-auth-firstname"
								className="dydo_auth-form__label"
							>
                First Name
							</label>
							<input
								type="text"
								name="firstName"
								id="dydo-auth-firstname"
								className="dydo_auth-form__input"
								onChange={handleChangeInput}
							/>
						</div>
					</div>
					<div className="dydo_col-xs-12">
						<div className="dydo_auth-form__item">
							<label
								htmlFor="dydo-auth-lastname"
								className="dydo_auth-form__label"
							>
                Last Name
							</label>
							<input
								type="text"
								name="lastName"
								id="dydo-auth-lastname"
								className="dydo_auth-form__input"
								onChange={handleChangeInput}
							/>
						</div>
					</div>
					<div className="dydo_col-xs-12">
						<div className="dydo_auth-form__item">
							<label
								htmlFor="dydo-auth-username"
								className="dydo_auth-form__label"
							>
								{dydo_texts.screens.auth.fields.username}
							</label>
							<input
								type="text"
								name="username"
								id="dydo-auth-username"
								className="dydo_auth-form__input"
								onChange={handleChangeInput}
							/>
						</div>
					</div>
					<div className="dydo_col-xs-12">
						<div className="dydo_auth-form__item">
							<label
								htmlFor="dydo-auth-email"
								className="dydo_auth-form__label"
							>
								{dydo_texts.screens.auth.fields.email}
							</label>
							<input
								type="text"
								name="email"
								id="dydo-auth-email"
								className="dydo_auth-form__input"
								onChange={handleChangeInput}
							/>
						</div>
					</div>
					<div className="dydo_col-xs-12">
						<div className="dydo_auth-form__item">
							<label
								htmlFor="dydo-login-password"
								className="dydo_auth-form__label"
							>
								{dydo_texts.screens.auth.fields.password}
							</label>
							<input
								type="password"
								name="password"
								id="dydo-login-password"
								className="dydo_auth-form__input"
								onChange={handleChangeInput}
							/>
						</div>
					</div>
					<div className="dydo_col-xs-12">
						<div className="dydo_auth-form__item">
							<label
								htmlFor="dydo-login-confirm-password"
								className="dydo_auth-form__label"
							>
								{dydo_texts.screens.auth.fields.confirm_password}
							</label>
							<input
								type="password"
								name="confirmPassword"
								id="dydo-login-confirm-password"
								className="dydo_auth-form__input"
								onChange={handleChangeInput}
							/>
						</div>
					</div>
					<div className="dydo_col-xs-12">
						<div className="dydo_row">
							<div className="dydo_col-xs-12 dydo_col-sm-6">
							</div>
							<div className="dydo_col-xs-12 dydo_col-sm-6 dydo_end-xs">
								<a onClick={() => changeForm('login')}>{dydo_texts.screens.auth.login}</a>
							</div>
						</div>
					</div>
				</div>
			</Content>
			<MainButton title={dydo_texts.screens.auth.register} onClick={handleSubmit} />
		</form>
	);
}
