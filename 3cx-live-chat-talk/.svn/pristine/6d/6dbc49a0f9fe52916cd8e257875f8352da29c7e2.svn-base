/* tslint:disable:no-unused-expression no-empty */
import {EMPTY, Subject} from 'rxjs';
import {MediaDescription} from '../phone/media-description';

export class WebRTCControlServiceStub implements Partial<WebRTCControlServiceStub> {
    public readonly mediaDevice$ = new Subject<MediaDescription[]>();

    public makeCall(destination: string, isVideoCall: boolean) {
        return EMPTY;
    }

    public getLastOutgoingMedia() {
        return undefined;
    }
}

