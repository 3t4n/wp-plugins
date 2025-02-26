const initialState = {
  statusModal: false,
  action: "DONATION_SETUP",
  actionButtonText: "",
  settings: {},
  error: "",
  loader: false,
  selectedSubscription: {},
  secondError: ""
};

function globalReducer(state = initialState, action) {
  switch (action.type) {
    case "CHANGE_STATUS_MODAL":
      return {
        ...state,
        statusModal: action.payload,
      };
    case "CHANGE_SETTINGS":
      return {
        ...state,
        settings: action.payload,
      };
    case "GET_SETTINGS":
      return {
        ...state,
        settings: action.payload,
      };
    case "CHANGE_ACTION_BUTTON_TEXT":
      return {
        ...state,
        actionButtonText: action.payload,
      };
    case "CHANGE_ACTION":
      return {
        ...state,
        action: action.payload,
      };
    case "GET_ERROR":
      return {
        ...state,
        error: action.payload,
      };
    case "CHANGE_ERROR":
      return {
        ...state,
        error: action.payload,
      };
    case "CHANGE_PAGE_LINK":
      return {
        ...state,
        pageLink: action.payload,
      };
    case "CHANGE_SECOND_ERROR":
      return {
        ...state,
        secondError: action.payload,
      };
    case "CHANGE_STATUS_LOADER":
      return {
        ...state,
        loader: action.payload,
      };
    case "CHANGE_SUBSCRIPTION_ID":
      return {
        ...state,
        subscriptionId: action.payload,
      };
    case "GET_SUBSCRIPTION_ID":
      return {
        ...state,
        subscriptionId: action.payload,
      };
    case "GET_SELECTED_SUBSCRIPTION":
      return {
        ...state,
        selectedSubscription: action.payload,
      };
    case "CHANGE_SELECTED_SUBSCRIPTION":
      return {
        ...state,
        selectedSubscription: action.payload,
      };
    case "RESTART_GLOBAL_STATE":
      return {
        ...initialState,
      };
    default:
      return state;
  }
}

export default globalReducer;
