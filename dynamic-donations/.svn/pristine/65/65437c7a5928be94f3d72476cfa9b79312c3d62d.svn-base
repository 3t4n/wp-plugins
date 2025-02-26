import React, { useState, useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';

// API
import { WP, fetchCheckCurrentUser } from '../../api'

// Components
import MainButton from '../Buttons/MainButton';
import BackButton from '../Buttons/BackButton';
import { Content } from '../Styles';

// Actions
import { changeAction, changeError, changeStatusLoader } from '../../actions/global.actions';

// Main Component
export default function Login({changeForm}) {
	// redux Hooks
	const dispatch = useDispatch();
	const {user} = useSelector(state => ({
		user: state.user,
	}));

	// Component States
	const [creds, setCreds] = useState({
		email: '',
		password: '',
		remember: false,
	});

	const handleChangeInput = e => {
		setCreds({
			...creds,
			[e.target.name]: e.target.value,
		});
	};

	const toggleCheckboxChange = e => {
		setCreds({
			...creds,
			remember: !creds.remember,
		});
	};

	const handleSubmit = async (e) => {
		e.preventDefault();

		dispatch(changeStatusLoader(true));

		const resLogin = await WP.auth.login(creds);
		if (!resLogin.success) {
			dispatch(changeError(resLogin.data.error));
			dispatch(changeStatusLoader(false));
			return;
		}

		await fetchCheckCurrentUser();
		dispatch(changeAction('PAYMENT'));
	};

	useEffect(() => {
		if (!user.isAuthenticated) {
			dispatch(changeStatusLoader(false));
		}
	}, []);

	return (
		<form onSubmit={handleSubmit} className="dydo_auth-form">
			<Content>
				<BackButton
					action="DONATION_SETUP"
					actionButtonText="Make a recurring donation"
				/>
				<div className="dydo_row">
					<div className="dydo_col-xs-12 dydo_col-sm-12">
						<p className="dydo_donation-type__placeholder">Please Login to make your donation</p>
					</div>
					<div className="dydo_col-xs-12">
						<div className="dydo_auth-form__item">
							<label
								htmlFor="dydo-login-email"
								className="dydo_auth-form__label"
							>
								{dydo_texts.screens.auth.fields.email}
							</label>
							<input
								type="text"
								name="email"
								id="dydo-login-email"
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
						<div className="dydo_row">
							<div className="dydo_col-xs-12 dydo_col-sm-6">
								<label
									htmlFor="dydo-login-remember"
									className="dydo_auth-form__label"
								>
									<input
										type="checkbox"
										id="dydo-login-remember"
										name="remember"
										value={creds.remember}
										onChange={toggleCheckboxChange}
									/>
									{dydo_texts.screens.auth.fields.remember}
								</label>
							</div>
							<div className="dydo_col-xs-12 dydo_col-sm-6 dydo_end-xs">
								<a onClick={() => changeForm('register')}>{dydo_texts.screens.auth.register}</a>
							</div>
						</div>
					</div>
				</div>
			</Content>
			<MainButton title={dydo_texts.screens.auth.login} onClick={handleSubmit} />
		</form>
	)
}
