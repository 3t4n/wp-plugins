import {Observable, ReplaySubject, Subject} from 'rxjs';
import {map, switchMap} from 'rxjs/operators';
import {GenericMessage, MyWebRTCEndpoint, ResponseAcknowledge} from '../generic';
import {logRequest, logResponse} from '../logger';
import {JoinTool} from './join/join';
import {decodeMessage, fetch$} from './utils';

export interface IGenericRequest {
    toGenericMessage: () => GenericMessage;
}

export enum MySessionState {
    Idle,
    Error,
    Connected,
}

/// Session interface
export interface IMyPhoneSession {
    readonly messages$: Observable<any>;
    readonly webRTCEndpoint$: Observable<MyWebRTCEndpoint>;
    readonly sessionState: MySessionState;
    readonly error?: string;

    get<T>(request: IGenericRequest): Observable<T>;
}

export class MyPhoneSession implements IMyPhoneSession {
    notificationChannelEndpoint!: string;
    readonly endpoint: string;
    readonly messages$ = new Subject<any>();
    private webRTCEndpoint = new MyWebRTCEndpoint();
    readonly webRTCEndpoint$ = new ReplaySubject<MyWebRTCEndpoint>();
    readonly sessionState = MySessionState.Connected;

    constructor(pbxUrl: string, private readonly sessionId: string) {
        this.endpoint = `${pbxUrl}MyPhone/MPWebService.asmx`;
        this.webRTCEndpoint$.next(this.webRTCEndpoint);
    }

    public onWebRtcEndpoint(message: MyWebRTCEndpoint) {
        this.webRTCEndpoint = JoinTool.Merge(this.webRTCEndpoint, message);
        this.webRTCEndpoint$.next(this.webRTCEndpoint);
    }

    public get<T>(request: IGenericRequest) {
        logRequest(request);
        return fetch$(this.endpoint, {
            headers: {
                'Content-Type': 'application/octet-stream',
                'MyPhoneSession': this.sessionId
            },
            method: 'POST',
            body: GenericMessage.encode(request.toGenericMessage()).finish()
        }).pipe(
            switchMap(response => response.arrayBuffer()),
            map(responseBuffer => {
                const message = decodeMessage(responseBuffer);
                logResponse(message);
                if (message instanceof ResponseAcknowledge) {
                    if (!message.Success) {
                        // Throw if server response contains error
                        throw new Error(message.Message || `Received unsuccessful ack for ${request.constructor.name}`);
                    }
                }

                return message as T;
            })
        );
    }
}
