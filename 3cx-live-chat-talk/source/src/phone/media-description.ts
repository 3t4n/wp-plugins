import { EMPTY, Observable, ReplaySubject } from 'rxjs';
import {WebRTCCall, WebRTCEndpointSDPState, WebRTCHoldState} from '../generic/index';

export class MediaDescription {
    constructor(init?: Partial<MediaDescription>) {
        Object.assign(this, init);
    }

    /// Call state as reported by server
    public lastWebRTCState!: Readonly<WebRTCCall>;

    /// WebRTC peer connection
    /// Could be undefined if call is not yet negotiated ( call is not WebRTC, not answered, trying call )
    public peerConnection!: RTCPeerConnection;
    /// Remote received stream
    public readonly remoteStream$ = new ReplaySubject<MediaStream | null>(1);
    /// Local transmitted stream
    public localStream!: MediaStream | null;

    /// Call is currently active
    public isActive = false;
    /// Audio is muted
    public isMuted = false;
    /// User wants this call to be a video call
    public isVideoCall = false;

    /// Audio sender
    public audio?: RTCRtpSender;

    /// If other party refuses to receive our video it will be dropped
    public get isVideoSend() {
        return !!this.video;
    }
    /// Other party wants to send us it's video
    public isVideoReceived = false;
    /// Video sender
    public video?: RTCRtpSender;

    /// Generates events when DTMF tone send
    public toneSend$: Observable<string> = EMPTY;
    /// True when negotiation is in progress
    public isNegotiationInProgress = false;
}

export const dummyMediaDescription = new MediaDescription({
    lastWebRTCState: new WebRTCCall({
        sdpType: WebRTCEndpointSDPState.WRTCInitial,
        holdState: WebRTCHoldState.WebRTCHoldState_NOHOLD
    })
});
