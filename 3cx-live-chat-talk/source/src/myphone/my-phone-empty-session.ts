import {BehaviorSubject, Observable, Subject, throwError} from 'rxjs';
import {MyWebRTCEndpoint} from '../generic';
import {IGenericRequest, IMyPhoneSession, MySessionState} from './my-phone-session';

export class MyPhoneEmptySession implements IMyPhoneSession {
    readonly messages$ = new Subject<any>();
    readonly webRTCEndpoint$ = new BehaviorSubject<MyWebRTCEndpoint>(new MyWebRTCEndpoint());

    constructor(public readonly sessionState: MySessionState, public readonly error?: string) {
    }

    get<T>(request: IGenericRequest): Observable<T> {
        return throwError(this.error);
    }
}

export const idleSession = () => new MyPhoneEmptySession(MySessionState.Idle, 'Can\' send request to idle session');

export const errorSession = (error: any) => new MyPhoneEmptySession(MySessionState.Error, error);
