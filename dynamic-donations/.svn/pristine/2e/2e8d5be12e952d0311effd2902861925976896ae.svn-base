import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';

//Actions
import { changeError, changeSecondError } from '../../actions/global.actions';

const Errors = () => {
	const dispatch = useDispatch();
	const {global} = useSelector((state) => ({
		global: state.global,
	}));

	const handleOnClick = () => {
		dispatch(changeError(''));
	}

	useEffect(() => {
		const timer = setTimeout(() => {
			dispatch(changeError(''));
      dispatch(changeSecondError(''));
		}, 20000);

		return () => clearTimeout(timer);
	}, [global.error]);

	if (global.error) {
		return (
			<div className="dydo_error-section test">
        <div className="dydo_error-section__content">
					<p className="dydo_error-section__paragraph">
						{global.error}
					</p>
					<button
						type="reset"
						className="dydo_error-section__button"
						onClick={handleOnClick}
					>
					<img src={`${dydo_wp_public.plugin.assets_uri}/public/icons/close-circle.svg`}  alt="" />

					</button>
				</div>
        {
          global.secondError && 

          <div className="dydo_error-section__content dydo_second_error-section__content">
            <p className="dydo_error-section__paragraph">
              {global.secondError} 
              <a href={`${global.pageLink}`} target="_blank">Subscriptions</a>
            </p>
           
				  </div>
        }
			</div>
		);
	} else {
		return <></>;
	}
};

export default Errors;
