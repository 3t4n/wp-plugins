const initialState = {
	alert: {
    severity: 'success',
    message: ''
  },
  plugin: {
    ...dydo_wp_admin.plugin
  }
};

function globalReducer(state = initialState, action) {
	switch (action.type) {
		case 'CHANGE_ALERT':
			return {
				...state,
				alert: action.payload,
			}
    case 'UPDATE_PLUGIN_DATA':
      return {
        ...state,
        plugin: action.payload,
      }
    case 'UPDATE_LICENSE':
      const pluginData = {...state.plugin}
      pluginData.license = action.payload;

      return {
        ...state,
        plugin: pluginData,
      }
		default:
			return state
	}
}

export default globalReducer;
