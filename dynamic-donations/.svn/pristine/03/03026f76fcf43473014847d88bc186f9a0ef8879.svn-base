import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';

// Components
import Payment from '../components/Payment/Payment';

// Actions
import { changeAction } from '../actions/global.actions';

// Main Component
export default function ScreenPayment() {
	// redux Hooks
	const dispatch = useDispatch();
	const {user} = useSelector(state => ({
		user: state.user,
	}));

	useEffect(() => {
		if (!user.isAuthenticated) {
			dispatch(changeAction('AUTH'));
		}
	}, []);

	return user.isAuthenticated && (<Payment />)
}