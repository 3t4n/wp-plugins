import React from 'react';
import { useDispatch, useSelector } from 'react-redux';
import Cookies from 'universal-cookie';

// API
import { addDonationToCart } from '../../api';

// Actions
import { changeAction, changeStatusLoader } from '../../actions/global.actions';

// Components
import DonationRecurringOptions from './DonationRecurringOptions';
import DonationAmountList from './DonationAmountList';
import DonationTypeList from './DonationTypeList';
import MainButton from '../Buttons/MainButton';
import { Content } from '../Styles';

// Main Component
export default function Donation() {
	const cookies = new Cookies();

	// Redux Hook
	const dispatch = useDispatch();
	const {global, donate} = useSelector(state => ({
		global: state.global,
		donate: state.donate,
	}));

	// Handles
	const handleSubmit = async (e) => {
		e.preventDefault();

		dispatch(changeStatusLoader(true));

		if (global.settings.payment_gateway === 'woocommerce') {
			await addDonationToCart(donate.amount, global.settings.product_id)
				.then(res => {
					if (res && res.data.redirect) {
						const data = res.data;

						location.href = data.url_woo_cart;
						cookies.set('dydo_donation_amount', donate.amount, {path: '/'});
					}
				});
		} else {
			dispatch(changeAction('PAYMENT'));
		}
	}

	return (
		<>
			<Content>
				{
					global.settings.show_description && global.settings.description
						? (<p className="dydo_content-paragraph">{global.settings.description}</p>)
						: null
				}
				<DonationTypeList />
				{(donate.type === 'recurring') ? (<DonationRecurringOptions />) : null}
				{(donate.type) ? (<DonationAmountList />) : null}
			</Content>
			{donate.type && (<MainButton title={global.actionButtonText} onClick={handleSubmit} />)}
		</>
	);
}
