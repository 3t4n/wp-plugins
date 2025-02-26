import {merge, Observable, Subject, throwError} from 'rxjs';
import {catchError, map, scan, shareReplay} from 'rxjs/operators';
import {WebRTCEndpointSDPState} from '../generic';
import {ringingSound} from '../sounds/sounds';
import {destroyMedia, WebRTCControlService} from '../webrtc/webrtc-control.service';
import {dummyMediaDescription, MediaDescription} from './media-description';
import {MyCall} from './mycall';

type CallCommand = 'requestTryingCall' | 'removeTryingCall';

export function isEstablished(acc: MyCall[], media: MediaDescription) {
    const prevCall = acc.find(x => x.media.lastWebRTCState.Id === media.lastWebRTCState.Id);
    if (!prevCall) {
        return false;
    }
    if (prevCall.isEstablished) {
        // Keep established
        return true;
    }
    if (media.lastWebRTCState.sdpType === WebRTCEndpointSDPState.WRTCConfirmed) {
        return true;
    }
}

export class PhoneService {
    public callControl$ = new Subject<CallCommand>();
    public readonly myCalls$: Observable<MyCall[]>;
    public readonly soundToPlay$: Observable<any>;

    constructor(private webrtcService: WebRTCControlService) {
        this.myCalls$ = merge(this.webrtcService.mediaDevice$, this.callControl$).pipe(scan((acc: MyCall[], message: MediaDescription[] | CallCommand) => {
            if (message === 'removeTryingCall') {
                // Remove trying call from the list
                return acc.filter(call => !call.isTryingCall);
            }
            else if (message === 'requestTryingCall') {
                // Add trying call to the list
                return acc.concat([new MyCall({isTryingCall: true, media: dummyMediaDescription})]);
            }
            else {
                const mediaDescr = message as MediaDescription[];
                const newMedia = mediaDescr.map(media => new MyCall({media, isEstablished: isEstablished(acc, media)}));
                const tryingCall = acc.find(x => x.isTryingCall);
                if (tryingCall && newMedia.length === 0) {
                    newMedia.push(tryingCall);
                }

                return newMedia;
            }
        }, [] as MyCall[]), shareReplay(1));

        this.soundToPlay$ = this.myCalls$.pipe(
            map(data => {
                if (data.length === 0) {
                    return undefined;
                }
                const call = data[0];
                if (call.isEstablished) {
                    return undefined;
                }
                if (call.isTryingCall) {
                    return ringingSound;
                }
                const mediaType = call.media.lastWebRTCState.sdpType;
                return (mediaType === WebRTCEndpointSDPState.WRTCOffer || mediaType === WebRTCEndpointSDPState.WRTCProcessingOffer) ? ringingSound : undefined;
            }));
    }

    public call$(phoneNumber: string, video?: boolean): Observable<number> {
        this.callControl$.next('requestTryingCall');

        return this.webrtcService.makeCall('', video || false).pipe(catchError(error => {
            destroyMedia(this.webrtcService.getLastOutgoingMedia());
            this.callControl$.next('removeTryingCall');
            return throwError(error);
        }));
    }
}
