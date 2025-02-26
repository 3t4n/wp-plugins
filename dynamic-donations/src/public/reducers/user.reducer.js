const initialState = {
  isAuthenticated: false,
  data: {},
  creditCards: [],
  newPaymentMethod: { error: "", element: {}, stripe: {} },
  removePaymentMethod: [],
};

function userReducer(state = initialState, action) {
  switch (action.type) {
    case "UPDATE_USER_IS_AUTHENTICATED":
      return {
        ...state,
        isAuthenticated: action.payload,
      };
    case "UPDATE_USER_DATA":
      return {
        ...state,
        data: action.payload,
      };
    case "GET_CREDIT_CARDS":
      return {
        ...state,
        creditCards: action.payload,
      };
    case "UPDATE_CREDIT_CARDS":
      return {
        ...state,
        creditCards: action.payload,
      };
    case "ADD_CREDIT_CARD":
      return {
        ...state,
        newPaymentMethod: action.payload,
      };
    case "UPDATE_PAYMENT_METHOD":
      return {
        ...state,
        updatePaymentMethod: action.payload,
      };
    case "REMOVE_CREDIT_CARD":
      return {
        ...state,
        removePaymentMethod: action.payload,
      };
    case "RESTART_USER_STATE":
      return {
        ...initialState,
      };
    default:
      return state;
  }
}

export default userReducer;
