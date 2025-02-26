import {Observable} from 'rxjs';
import {filter, skipUntil, take} from 'rxjs/operators';

export function observableToPromise<T>(observable: Observable<T>, predicate?: (val: T) => boolean) {
    return new Promise<T>((resolve, reject) => {
        observable.pipe(filter(x => predicate ? predicate(x) : true), take(1)).subscribe(value => resolve(value), err => reject(err));
    });
}
