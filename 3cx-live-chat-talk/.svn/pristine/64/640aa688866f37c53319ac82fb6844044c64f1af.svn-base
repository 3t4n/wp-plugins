import {Observable, of, ReplaySubject, Subject} from 'rxjs';
import {MyWebRTCEndpoint, ResponseAcknowledge} from '../generic';
import {IGenericRequest, MyPhoneSession, MySessionState} from '../myphone/my-phone-session';

export class MyPhoneSessionStub implements Partial<MyPhoneSession> {
    readonly messages$ = new Subject<any>();
    readonly webRTCEndpoint$ = new ReplaySubject<MyWebRTCEndpoint>();
    readonly sessionState = MySessionState.Connected;

    constructor() {
        this.webRTCEndpoint$.next(new MyWebRTCEndpoint());
    }

    get<T>(request: IGenericRequest): Observable<T> {
        return of(new ResponseAcknowledge() as any as T);
    }
}
