
import { getCalconicHeaders, getHost } from './common';

function isAuthenticated(key) {
  return key.length > 0;
}

async function authenticateUser(email, password) {
  try {
    const request = new Request(`${getHost()}/request_token`, {
      method: 'POST',
      headers: getCalconicHeaders(),
      body: JSON.stringify({ email, password }),
    });
    const response = await fetch(request);

    if (response.ok) {
      const data = await response.json();

      return {
        status: response.status,
        data,
      };
    }

    return {
      status: response.status,
      data: void 0,
    };
  } catch (err) {
    throw err;
  }
}

async function saveAPIKey(apiKey) {
  try {
    const request = new Request(window.calconicRequest.requestUrl, {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
      },
      body: `action=calconic_save_key&_ajax_nonce=${window.calconicRequest.nonce}&apiKey=${apiKey}`,
      credentials: 'same-origin',
    });
    const response = await fetch(request);

    if (response.ok) {
      return 200;
    }

    return void 0;
  } catch (err) {
    throw err;
  }
}

export {
  saveAPIKey,
  isAuthenticated,
  authenticateUser
};
