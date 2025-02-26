function isLoggerEnabled() {
    return localStorage.getItem('callus.loggerenabled') === 'true';
}

export function logRequest(message: any) {
    if (isLoggerEnabled()) {
        console.log(message);
    }
}

export function logResponse(message: any) {
    if (isLoggerEnabled()) {
        console.log(message);
    }
}

export function logNotificationMessage(message: any) {
    if (isLoggerEnabled()) {
        console.log(message);
    }
}

export function logWarningMessage(message: any) {
    if (isLoggerEnabled()) {
        console.warn('call-us:', message);
    }
}

export function logErrorMessage(message: any) {
    console.error('call-us:', message);
}
