
function assignAPIKey(key, store) {
  return {
    ...store,
    apiKey: key,
  };
}

function assignCalculators(calculators = [], store) {
  return {
    ...store,
    calculators,
  };
}

function reducerFactory() {
  const initialState = {
    apiKey: window.calconic && window.calconic.apiKey
      ? window.calconic.apiKey
      : '',
    calculators: [],
  };

  return (store = initialState, action) => {
    switch (action.type) {
      case 'AUTHENTICATE': {
        return assignAPIKey(action.payload.key, store);
      }

      case 'ASSIGN_CALCULATORS': {
        return assignCalculators(action.payload.calculators, store);
      }

      default: {
        return { ...store };
      }
    }
  };
}

export {
  reducerFactory
};
