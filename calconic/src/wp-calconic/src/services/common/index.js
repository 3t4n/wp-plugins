
export function getCalconicHeaders(apiKey) {
  return new Headers({
    'Content-Type': 'application/json',
    'X-Calconic-Referrer': 'wp-calconic',
    Authorization: apiKey ? `Bearer ${apiKey}` : '',
  });
}

export function getHost() {
  switch (process.env.NODE_ENV) {
    case 'production':
      return 'https://app.calconic.com/api/v1';
    default:
      return 'https://localhost:8443/api/v1';
  }
}
