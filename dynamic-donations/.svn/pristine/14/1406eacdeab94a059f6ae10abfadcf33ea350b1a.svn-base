import React from 'react';
import { useDispatch, useSelector } from 'react-redux';

import { changeAction, changeActionButtonText } from '../../actions/global.actions';

function BackButton({action, actionButtonText}) {
	const dispatch = useDispatch();
	const {global} = useSelector(state => ({
		global: state.global,
	}));

	const handleClick = (e) => {
		e.preventDefault();

		dispatch(changeAction(action));
		dispatch(changeActionButtonText(actionButtonText));
	}

	return (
		<button
			className="dydo_back-button"
			onClick={handleClick}
			disabled={global.loader}
		>
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#1A73E8" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M12 8L8 12L12 16" stroke="#1A73E8" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M16 12H8" stroke="#1A73E8" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
      </svg>
			{` Back`}
    </button>
	);
}

export default BackButton;
