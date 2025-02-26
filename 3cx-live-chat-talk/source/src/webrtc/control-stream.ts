import {Observable, Subject} from 'rxjs';

export const onSubscribe = (callback: () => void) => <T>(source: Observable<T>) => new Observable<T>(subscriber => {
    callback();
    return source.subscribe(subscriber);
});

export const controlStream = (suspendSelector: Observable<any>, resumeSelector: Observable<any>) => <T>(source: Observable<T>) => new Observable<T>(subscriber => {
    let semaphoreCount = 0;
    let buffer: T[] = [];

    const subscriptions = [
        suspendSelector.subscribe(() => {
            semaphoreCount++;
        }),
        resumeSelector.subscribe(() => {
            semaphoreCount--;
            if (semaphoreCount === 0) {
                buffer.forEach(item => subscriber.next(item));
                buffer = [];
            }
        }),
        source.subscribe(value => {
                if (semaphoreCount > 0) {
                    buffer.push(value);
                }
                else {
                    subscriber.next(value);
                }
            },
            // be sure to handle errors and completions as appropriate and
            // send them along
            err => subscriber.error(err),
            () => subscriber.complete())
    ];

    // to return now
    return () => {
        subscriptions.forEach(value => value.unsubscribe());
    };
});
