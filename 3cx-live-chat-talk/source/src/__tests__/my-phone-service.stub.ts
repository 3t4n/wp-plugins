import {EMPTY, NEVER, Observable, of} from 'rxjs';
import {switchMap} from 'rxjs/operators';
import {ResponseAcknowledge} from '../generic';
import {MyPhoneService} from '../myphone/my-phone-service';
import {IGenericRequest, IMyPhoneSession} from '../myphone/my-phone-session';
import {ofType} from '../myphone/utils';

export class MyPhoneServiceStub implements Partial<MyPhoneService> {
    readonly info$ = EMPTY;
    isLoading!: boolean;

    constructor(public readonly myPhoneSession$?: Observable<IMyPhoneSession>) {
    }

    get<T>(request: IGenericRequest): Observable<T> {
        return of(new ResponseAcknowledge() as any as T);
    }

    notificationsOfType$<K>(constructor: { new(): K }): Observable<K> {
        return this.myPhoneSession$ ? this.myPhoneSession$.pipe(switchMap(session => session.messages$), ofType(constructor)) : NEVER;
    }

}
