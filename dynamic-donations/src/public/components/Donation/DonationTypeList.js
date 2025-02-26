import React from 'react';
import { useSelector } from 'react-redux';

// Components
import DonationType from './DonationType';
import { Row } from '../../styled'

// Main Components
export default function DonationTypeList() {
	// Redux Hooks
	const {global} = useSelector(state => ({
		global: state.global,
	}));

	return (
		<Row>
			<div className="dydo_col-xs-12 dydo_col-sm-12">
				<p className="dydo_donation-type__placeholder" style={{ marginBottom: '10px' }}>Select the donation type:</p>
			</div>
			{
				(global.settings.recurring_donation_enabled && global.settings.payment_gateway === 'stripe')
					?
					(
						<div className="dydo_col-xs-12 dydo_col-sm-6">
							<DonationType
								text={dydo_texts.screens.donate.make_a_recurring_donation}
								value="recurring"
								actionButtonText={dydo_texts.screens.donate.make_a_recurring_donation}
							/>
						</div>
					)
					: null
			}
			{
				(global.settings.onetime_donation_enabled)
					?
					(
						<div className="dydo_col-xs-12 dydo_col-sm-6">
							<DonationType
								text={dydo_texts.screens.donate.make_a_one_time_donation}
								value="onetime"
								actionButtonText={dydo_texts.screens.donate.add_donation}
							/>
						</div>
					)
					: null
			}
		</Row>
	);
}
