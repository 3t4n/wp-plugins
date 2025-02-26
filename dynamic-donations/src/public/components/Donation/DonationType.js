import React from 'react';
import { useSelector, useDispatch } from 'react-redux';

import { changeDonationType } from '../../actions/donate.actions';
import { changeActionButtonText } from '../../actions/global.actions';

function DonationType({text, value, actionButtonText}) {
	const dispatch = useDispatch();
	const {donate} = useSelector(state => ({
		donate: state.donate,
	}));

	const handleChangedonationType = () => {
		dispatch(changeDonationType(value));
		dispatch(changeActionButtonText(actionButtonText));
	}

	return (
		<label
			className={`dydo_donation-type ${donate.type === value ? 'dydo_donation-type--active' : null}`}
			htmlFor={value}
			onClick={handleChangedonationType}
		>
			<input
				className="dydo_donation-type__input"
				type="radio"
				name="donation-type"
				id={value}
				value={value}
				checked={donate.type === value}
				onChange={handleChangedonationType}
			/>
			<span className="dydo_donation-type__radio"/>
			<span className="dydo_donation-type__text">{text}</span>
		</label>
	)
}

export default DonationType;
