import {Observable, Observer} from 'rxjs';
import {filter, map} from 'rxjs/operators';
import {GenericMessage} from '../generic/index';

export const ofType = <K>(constructor: { new(): K }) => <T>(source: Observable<T>) => source.pipe(
    filter(x => x instanceof constructor),
    map(x => x as any as K)
);

export const fetch$ = (input: RequestInfo, init?: RequestInit) =>
    new Observable((observer: Observer<Response>) => {
        if (!init) {
            init = {};
        }
        if (!init.headers) {
            init.headers = {};
        }
        // Just in case to avoid caching
        Object.assign(init.headers, {
            'pragma': 'no-cache',
            'cache-control': 'no-store'
        });

        fetch(input, init)
            .then(data => {
                if (data.ok) {
                    observer.next(data);
                    observer.complete();
                } else {
                    observer.error(data);
                }
            })
            .catch(err => observer.error(err));
    });

export const decodeMessage = (buffer: ArrayBuffer) => {
    const arrayBuffer = new Uint8Array(buffer);
    const genericMessage = GenericMessage.decode(arrayBuffer, arrayBuffer.length);
    delete genericMessage.MessageId;

    return Object.values(genericMessage)[0];
};

export const constructUrl = (phonesystemUrl: string) =>
    (phonesystemUrl && !phonesystemUrl.endsWith('/')) ? phonesystemUrl + '/' : phonesystemUrl;

export const errorToString = (error: any) => {
    if (typeof error === 'string') {
        return error;
    } else if (error instanceof Error) {
        if (error.name === 'NotAllowedError') {
            return 'Please allow microphone access. Currently blocked by browser.';
        }
        else if (error.name === 'NotFoundError') {
            return 'Microphone not found';
        }
        // Handle 401 for example on fetch reject
        return error.message;
    } else {
        return 'Service unavailable';
    }
};
