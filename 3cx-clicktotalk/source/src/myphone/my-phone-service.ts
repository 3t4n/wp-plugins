import {Observable, of, Subject} from 'rxjs';
import {filter, publishReplay, refCount, startWith, switchMap, take} from 'rxjs/operators';
import {Authentication} from '../model/authentication';
import {CallUsInformation} from '../model/call-us-information';
import {createMyPhoneSession} from './my-phone-channel';
import {idleSession} from './my-phone-empty-session';
import {IGenericRequest, IMyPhoneSession, MySessionState} from './my-phone-session';
import {fetch$, ofType} from './utils';

export class MyPhoneService {
    public readonly info$: Observable<CallUsInformation>;
    public readonly myPhoneSession$: Observable<IMyPhoneSession>;

    private readonly connect$ = new Subject<boolean>();

    constructor(auth: Authentication, phonesystemUrl: string, party: string) {
        this.myPhoneSession$ = this.connect$.pipe(
            switchMap((startNewSession) => startNewSession ? createMyPhoneSession(auth, phonesystemUrl, party) : of(idleSession()) ),
            startWith(idleSession()),
            publishReplay(1),
            refCount()
        );

        this.info$ = fetch$(`${phonesystemUrl}MyPhone/c2cinfo?c2cid=${encodeURIComponent(party)}`).pipe(
            switchMap(response => response.json()),
            publishReplay(1),
            refCount()
        );
    }

    public closeSession(){
        this.connect$.next(false);
    }

    private reconnect() {
        this.connect$.next(true);
    }

    notificationsOfType$<K>(constructor: { new(): K }) {
        return this.myPhoneSession$.pipe(switchMap(session => session.messages$), ofType(constructor));
    }

    get<T>(request: IGenericRequest) {
        return this.myPhoneSession$.pipe(
            take(1),
            switchMap(session => {
                // Reconnect once
                if (session.sessionState !== MySessionState.Connected) {
                    this.reconnect();
                    // Wait for new emit
                    return this.myPhoneSession$.pipe(filter(x => x !== session));
                }
                else {
                    return of(session);
                }
            }),
            switchMap(session => session.get<T>(request)),
            take(1),
        );
    }

}
