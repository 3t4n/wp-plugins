import { getCalconicHeaders, getHost } from './common';

function responseFactory(status, data) {
  return { status, data };
}

async function getCalculators(apiKey) {
  try {
    const options = { headers: getCalconicHeaders(apiKey) };
    const request = new Request(`${getHost()}/list/simple`, options);
    const response = await fetch(request);

    if (response.ok) {
      const data = await response.json();

      return responseFactory(response.status, data);
    }

    return responseFactory(response.status, void 0);
  } catch (err) {
    throw err;
  }
}

export {
  getCalculators
};
