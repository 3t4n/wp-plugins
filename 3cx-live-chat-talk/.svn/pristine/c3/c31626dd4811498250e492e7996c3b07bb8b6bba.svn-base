import md5 from 'md5';
import {merge, Observable, of, Subscriber, throwError} from 'rxjs';
import {catchError, concatMap, filter, map, share, skipWhile, switchMap, timeout} from 'rxjs/operators';
import {Login, LoginInfo, MyWebRTCEndpoint, RequestMyInfo, RequestRegisterWebRTCEndpoint, ResponseAcknowledge} from '../generic';
import {logNotificationMessage} from '../logger';
import {Authentication} from '../model/authentication';
import {errorSession} from './my-phone-empty-session';
import {MyPhoneSession} from './my-phone-session';
import {decodeMessage, errorToString, fetch$} from './utils';

export const AddpTimeoutMs: number = 20000;

const ProtocolVersion = '1.9';
const ClientVersion = '1.0';
const ClientInfo = '3CX Callus';
const User = 'click2call';

const createClick2CallSession = (auth: Authentication, pbxUrl: string, party: string) => {
    let url = `${pbxUrl}MyPhone/c2clogin?c2cid=${encodeURIComponent(party)}`;
    if (!!auth.email) {
        url += `&email=${encodeURIComponent(auth.email)}`;
    }
    if (!!auth.name) {
        url += `&displayname=${encodeURIComponent(auth.name)}`;
    }
    return fetch$(url)
        .pipe(
            switchMap(response => response.json()),
            map(sessionResponse => sessionResponse.sessionId),
            catchError(error => {
                if (error instanceof Response) {
                    if (error.status === 404) {
                        return throwError('Party not found');
                    }
                }
                return throwError(error);
            })
        );
};

const login = (pbxUrl: string, sessionId: string) => {
    const session = new MyPhoneSession(pbxUrl, sessionId);
    const password = '';

    const loginRequest = new Login({
        ProtocolVersion,
        ClientVersion,
        ClientInfo,
        User,
        Password: password
    });

    // First login request
    return session.get<LoginInfo>(loginRequest)
        .pipe(
            switchMap(info => {
                if (!info.Nonce) {
                    return throwError(info.ValidationMessage);
                }
                // Second login request
                loginRequest.Password = md5(password + info.Nonce).toUpperCase();
                return session.get<LoginInfo>(loginRequest);
            }),
            map(response => {
                session.notificationChannelEndpoint =
                    `${pbxUrl.replace('http', 'ws')}ws/webclient?sessionId=${encodeURIComponent(sessionId)}&pass=${encodeURIComponent(md5(password + response.Nonce).toUpperCase())}`;
                return session;
            })
        );
};

const createNotificationChannel = (session: MyPhoneSession) => new Observable((observer) => {
    const socket = new WebSocket(session.notificationChannelEndpoint);
    socket.binaryType = 'arraybuffer';
    socket.onmessage = evt => observer.next(evt.data);
    socket.onerror = evt => observer.error(evt);
    return () => socket.close();
})
    .pipe(
        timeout(AddpTimeoutMs),
        filter(x => x !== 'ADDP'),
        skipWhile(x => x !== 'START'),
        concatMap((message: any) => {
            if (message === 'START') {
                return merge(
                    session.get(new RequestMyInfo()),
                    session.get(new RequestRegisterWebRTCEndpoint({register: true}))
                ).pipe(filter(resp => !(resp instanceof ResponseAcknowledge)));
            } else if (message === 'NOT AUTH' || message === 'STOP') {
                return throwError('Notification channel cancelled by server');
            } else {
                return of(decodeMessage(message));
            }
        }),
        share()
    );

const processMyPhoneMessages = (session: MyPhoneSession, notificationChannel: Observable<any>) => {
    let sessionReported = false;
    return new Observable((subscriber: Subscriber<MyPhoneSession>) => notificationChannel.subscribe(
        message => {
            logNotificationMessage(message);
            if (!sessionReported && message instanceof MyWebRTCEndpoint) {
                subscriber.next(session);
                sessionReported = true;
            }
            if (message instanceof MyWebRTCEndpoint) {
                session.onWebRtcEndpoint(message);
            }
            session.messages$.next(message);
        },
        error => subscriber.error(error),
        () => subscriber.complete()
    ));
};

export const createMyPhoneSession = (auth: Authentication, pbxUrl: string, party: string) => createClick2CallSession(auth, pbxUrl, party)
    .pipe(
        switchMap(sessionId => login(pbxUrl, sessionId)),
        switchMap(session => processMyPhoneMessages(session, createNotificationChannel(session))),
        catchError(error => {
            return of(errorSession(errorToString(error)));
        })
    );
