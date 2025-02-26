import React from 'react';

function DonationAmount({ item, amountOption, amountsEnabled, handleChangeDonation, symbol }) {
	return (
		<div className="dydo_col-xs-6 dydo_col-sm-2">
			<div className="dydo_donation-amount__item">
				<input
					className="dydo_donation-amount__radio"
					type="radio"
					name="amount"
					value={item.amount}
					id={item.name}
					data-name={item.name}
					checked={amountOption === item.name && amountsEnabled >= 1}
					onChange={handleChangeDonation}
				/>
				<label
					className="dydo_donation-amount__text"
					htmlFor={item.name}
				>
					{symbol}{item.amount}
				</label>
			</div>
		</div>
	);
}

export default DonationAmount;
