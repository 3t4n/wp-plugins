import { combineReducers } from 'redux';

import globalReducer from './global.reducer';
import donationReducer from './donation.reducer';
import userReducer from './user.reducer';
import subscriptionReducer from './subscription.reducer';

export default combineReducers({
	global: globalReducer,
	donate: donationReducer,
	user: userReducer,
	subscription: subscriptionReducer,
});