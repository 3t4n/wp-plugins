import React, { useEffect, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { changeStatusLoader } from '../../actions/global.actions';

// Actions
import { changeDonationAmount, changeDonationAmountOption, changeDonationCurrency, changeSymbolCurrency } from '../../actions/donate.actions';

// Components
import DonationAmount from './DonationAmount';
import DonationCustomAmount from './DonationCustomAmount';

// Main Component
export default function DonationAmountList() {
	const {global, donate} = useSelector(state => ({
		global: state.global,
		donate: state.donate,
	}));
	const dispatch = useDispatch();
	const selectedCurrencies = global.settings.selected_currencies || [];
	const showSelectCurrencies = global.settings.show_currencies;
	const symbol = donate.symbol;
	const [amountsEnabled, setAmountsEnabled] = useState(0);
	const [amount, setAmount] = useState(0);
	// Handlers
	const handleChangeDonation = (e) => {
		let amountSelected = e.target.value;
		console.log(e.target.value)
		dispatch(changeStatusLoader(false));
		if(amountSelected?.trim() == ''){
			dispatch(changeStatusLoader(true));
		}
		if (amountSelected <= 0  && amountSelected != '') {
			amountSelected = 10
		}
		setAmount(amountSelected);
		const option = e.target.getAttribute('data-name');
		dispatch(changeDonationAmount(amountSelected));
		dispatch(changeDonationAmountOption(option));
	}

	const handleChangeCustomAmountOption = (e) => {
		const option = e.target.getAttribute('data-name');

		if (option === 'dydo-custom-amount') {
			dispatch(changeDonationAmountOption(option));
		}
	}

	const handleChangeDonationCurrency = (e) => {
		const value = e.target.value;
		const index = selectedCurrencies.map((item) => item.iso).indexOf(value);
		const selected = selectedCurrencies[index];

		dispatch(changeDonationCurrency(selected.iso));
		dispatch(changeSymbolCurrency(selected.symbol));
	}

	useEffect(() => {
		const amountsEnabled = global?.settings?.amounts?.filter((item) => item.enabled);
		setAmountsEnabled(amountsEnabled?.length);
	}, []);

	return (
		<div className="dydo_donation-amount">
			<h6 className="dydo_donation-amount__title">{dydo_texts.screens.donate.donation_amount}:</h6>
      <p className="dydo_donation-type__placeholder" style={{ textAlign: 'left', marginTop: '8px' }}>Select the currency and amount you want to donate.</p>

			<div className="dydo_donation-amount__items">
				{
					showSelectCurrencies
						?
						(
							<div className="dydo_interval">
							<h6 className="dydo_donation-amount__title">{dydo_texts.screens.donate.currency}:</h6>
							<select
								name="currency"
								id="dydo-currencies"
                value={donate.currency}
								onChange={handleChangeDonationCurrency}
							>
								{
									selectedCurrencies.map((currency, key) => (
										<option
											key={key}
											value={currency.iso}
										>
											{currency.iso.toUpperCase()}
										</option>
									))
								}
							</select>
						</div>
						)		
						: null
					}	
				<div className="dydo_row dydo_middle-xs">
					{
						global?.settings?.amounts?.map((item, key) => (
							item.enabled &&
							(
								<DonationAmount
									key={key}
									item={item}
									amountOption={donate.amountOption}
									amountsEnabled={amountsEnabled}
									handleChangeDonation={handleChangeDonation}
									symbol={symbol}
								/>
							)
						))
					}

					<DonationCustomAmount
						amount={amount}
						amountsEnabled={amountsEnabled}
						amountOption={donate.amountOption}
						handleChangeDonation={handleChangeDonation}
						handleChangeCustomAmountOption={handleChangeCustomAmountOption}
						symbol={symbol}
					/>
				</div>				
			</div>
		</div>
	);
}

