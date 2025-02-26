import React from 'react';
import { useSelector } from 'react-redux';

// Components
import Loader from '../Loader/Loader';

// Main Component
export default function MainButton({title, ...props}) {
	const {global} = useSelector((state) => ({
		global: state.global,
	}));

	return (
		<button className="dydo_action-button" {...props} disabled={global.loader}>
      {title}
			{/* {global.loader ? (<Loader />) : title} */}
		</button>
	);
}
