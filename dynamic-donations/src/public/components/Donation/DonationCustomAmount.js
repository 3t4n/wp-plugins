import React from 'react';

function DonationCustomAmount({ amount, amountOption, amountsEnabled, handleChangeDonation, handleChangeCustomAmountOption, symbol }) {
	return (
		<div className="dydo_col-xs-12 dydo_col-sm-4">
			<div className="dydo_donation-amount__item--custom">
				<div className="dydo_row dydo_middle-xs">
					<div className="dydo_col-xs-6">
						<div className="dydo_donation-amount__custom-label">
							<input
								className="dydo_donation-amount__radio"
								type="radio"
								name="amount"
								id="dydo-custom-amount-label"
								data-name="dydo-custom-amount"
								checked={amountOption === 'dydo-custom-amount' || amountsEnabled === 0}
								onChange={handleChangeDonation}
								value={amount}
							/>
							<label
								className="dydo_donation-amount__text"
								htmlFor="dydo-custom-amount-label"
							>
								{dydo_texts.screens.donate.other}{symbol}
							</label>
						</div>
					</div>
					<div className="dydo_col-xs-6">
						<input
							className="dydo_donation-amount__custom-amount"
							type="number"
							data-name="dydo-custom-amount"
							onClick={handleChangeCustomAmountOption}
							onChange={handleChangeDonation}
							value={amount}
						/>
					</div>
				</div>
			</div>
		</div>
	);
}

export default DonationCustomAmount;
