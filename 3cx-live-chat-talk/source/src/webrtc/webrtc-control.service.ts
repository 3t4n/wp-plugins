import {BehaviorSubject, combineLatest, EMPTY, from, fromEvent, Observable, of, ReplaySubject, Subject, throwError, zip} from 'rxjs';
import {catchError, filter, finalize, map, multicast, refCount, scan, startWith, switchMap, take, tap} from 'rxjs/operators';
import * as SDPUtils from 'sdp';
import {MyWebRTCEndpoint, RequestWebRTCChangeSDPState, ResponseWebRTCChangeSDPState, WebRTCCall, WebRTCEndpointSDPState, WebRTCHoldState} from '../generic/index';
import {JoinTool} from '../myphone/join/join';
import {MyPhoneService} from '../myphone/my-phone-service';
import {MediaDescription} from '../phone/media-description';
import {controlStream, onSubscribe} from './control-stream';

function patchFirefoxSendrecInSession(sdp: string, resume: boolean) {
    if (resume) {
        return sdp;
    }
    return sdp.replace('sendrecv', 'sendonly');
}

/**
 * Call this function to add user media tracks to PeerConnection.
 * Function supposes that if localStream is setup than audio track is already there.
 * Function will not recreate stream in case video is requested and provided.
 * If video is requested but not provided stream should be recreated.
 * If video is not requested but provided video track will be stopped to ensure webcam is not lit.
 * @param {MediaDescription} media
 * @param {boolean} video
 * @returns {any}
 */
function setupMediaForPeerConnection(media: MediaDescription, audio: boolean, video: boolean) {
    const peerConnection = media.peerConnection;
    const setupStream = (localStream: MediaStream) => {
        // This is what I'm going to send
        media.localStream = localStream;

        localStream.getTracks().forEach((track: MediaStreamTrack) => {
            if (track.kind === 'video') {
                if (video && track.readyState === 'live') {
                    media.video = peerConnection.addTrack(track, localStream);
                }
            }
            else {
                if (audio && track.readyState === 'live') {
                    track.enabled = !media.isMuted;
                    media.audio = peerConnection.addTrack(track, localStream);
                }
            }
        });

        if (media.audio && media.audio.dtmf) {
            media.toneSend$ = fromEvent<RTCDTMFToneChangeEvent>(media.audio.dtmf, 'tonechange')
                .pipe(scan((acc: string, value: RTCDTMFToneChangeEvent) => {
                    return acc + value.tone;
                }, ''));
        }
    };

    if (media.localStream) {
        if (!video) {
            // User doesn't want video so let's stop it
            media.localStream.getVideoTracks().forEach(track => track.stop());
        }
        if (!audio) {
            // User doesn't want audio so let's stop it
            media.localStream.getAudioTracks().forEach(track => track.stop());
        }
        const hasVideoTracks = media.localStream.getVideoTracks().some(track => track.readyState === 'live');
        const hasAudioTracks = media.localStream.getAudioTracks().some(track => track.readyState === 'live');
        if ((!video || (video && hasVideoTracks)) && (!audio || (audio && hasAudioTracks))) {
            // User wants video and it's presented or video is not required
            setupStream(media.localStream);
            return of(media.localStream);
        }
        // Teardown and setup new localstream
        stopStream(media.localStream);
    }
    return from(navigator.mediaDevices.getUserMedia({audio, video})).pipe(
        // Retry with no video if webcam is not available at the moment
        catchError(err => {
            console.log(err);
            return from(navigator.mediaDevices.getUserMedia({audio, video: false}));
        }),
        tap(setupStream));
    // TODO theoretically would be nice to create silent media stream though dont want to use AudioContext for it
    // Retry with no video and audio if mic and webcam is not available at the moment
    // .catch(err => {
    //     setupStream(new MediaStream());
    //     return Observable.of(media.localStream);
    // })
}

function setupPeerConnection(media: MediaDescription) {
    function teardown(media: MediaDescription) {
        if (media.peerConnection) {
            media.peerConnection.close();
        }
        media.audio = undefined;
        media.isVideoReceived = false;
        media.toneSend$ = EMPTY;
        media.video = undefined;
        media.remoteStream$.next(null);
    }

    teardown(media);

    media.peerConnection = new RTCPeerConnection({});
    media.peerConnection.ontrack = (event) => media.remoteStream$.next(event.streams[0]);
    return media.peerConnection;
}

function remoteEndpointState(sdp: string | null, direction: string[]) {
    let audio = false;
    let video = false;
    if (sdp) {
        SDPUtils.splitSections(sdp)
            .filter((section: any) => direction.indexOf(SDPUtils.getDirection(section)) >= 0 && !SDPUtils.isRejected(section))
            .map((allowedSection: any) => SDPUtils.getKind(allowedSection))
            .forEach((kind: string) => {
                if (kind === 'video') {
                    video = true;
                }
                else if (kind === 'audio') {
                    audio = true;
                     }
            });
    }
    return [audio, video];
}

/**
 * @param {string} sdp Other party sdp
 * @returns {[boolean , boolean]} True if other party will receive corresponding media
 */
export function remoteEndpointReceiveState(sdp: string | null) {
    return remoteEndpointState(sdp, ['sendrecv', 'recvonly']);
}

export function remoteEndpointSendState(sdp: string | null) {
    return remoteEndpointState(sdp, ['sendrecv', 'sendonly']);
}

/**
 * Stop all tracks of a stream
 * @param {MediaStream} stream
 */
function stopStream(stream: MediaStream) {
    stream.getAudioTracks().forEach(track => track.stop());
    stream.getVideoTracks().forEach(track => track.stop());
}

function setRemoteDescription(peerConnection: RTCPeerConnection, description: RTCSessionDescriptionInit) {
    // console.log(description.sdp);
    return from(peerConnection.setRemoteDescription(description));
}

function setLocalDescription(peerConnection: RTCPeerConnection, description: RTCSessionDescriptionInit) {
    // console.log(description.sdp);
    // if (localDescription.sdp)
    //     localDescription.sdp = maybePreferCodec(localDescription.sdp, "video", "receive", "VP9");

    return from(peerConnection.setLocalDescription(description)).pipe(
        switchMap(() => fromEvent(peerConnection, 'icegatheringstatechange')),
        filter(() => peerConnection.iceGatheringState === 'complete'),
        take(1));
}

/**
 * Destroy media streams and connection
 * @param {MediaDescription} media
 */
export function destroyMedia(media?: MediaDescription) {
    if (!media) {
        return;
    }
    if (media.localStream) {
        stopStream(media.localStream);
    }
    // Close negotiations
    if (media.peerConnection) {
        media.peerConnection.close();
    }
}

export class WebRTCControlService {
    public readonly mediaDevice$: Observable<MediaDescription[]>;

    private _lastOutgoingMedia?: MediaDescription;
    private _globalTransactionId: number = 0;
    private readonly _forcedEmit = new BehaviorSubject(true);
    private readonly _suspendStream = new Subject();
    private readonly _resumeStream = new Subject();

    constructor(private myPhoneService: MyPhoneService) {
        const webRTCEndpoint$ = this.myPhoneService.myPhoneSession$.pipe(
            switchMap(session => session.webRTCEndpoint$),
            startWith(new MyWebRTCEndpoint()),
            controlStream(this._suspendStream, this._resumeStream)
        );
        this.mediaDevice$ = combineLatest(webRTCEndpoint$, this._forcedEmit).pipe(
            scan((mediaDevice2: any, values) => {
                // TODO WTF?
                const mediaDevice = mediaDevice2 as MediaDescription[];
                const [endpoint] = values;
                const stateMap: { [id: number]: WebRTCCall } = endpoint.Items.reduce((result: { [id: number]: WebRTCCall }, item: any) => {
                    result[item.Id] = item;
                    return result;
                }, {});

                if (this._lastOutgoingMedia && stateMap[this._lastOutgoingMedia.lastWebRTCState.Id]) {
                    // Seems we have outgoing call and it's processed
                    mediaDevice.push(this._lastOutgoingMedia);
                    this._lastOutgoingMedia = undefined;
                }

                const updatedMedia: MediaDescription[] = [];
                mediaDevice.forEach(media => {
                    const newWebRTCState = stateMap[media.lastWebRTCState.Id];
                    if (!newWebRTCState) {
                    // This call is no longer present
                        destroyMedia(media);
                    }
                    else {
                        const lastWebRTCState = media.lastWebRTCState;
                        // Copy new state there
                        media.lastWebRTCState = {...newWebRTCState};
                        /* Warning! This is a patch in case HELD call goes ESTABLISHED when inactive. We force hold immediately */
                        if (!media.isActive && newWebRTCState.holdState === WebRTCHoldState.WebRTCHoldState_NOHOLD &&
                            lastWebRTCState.holdState === WebRTCHoldState.WebRTCHoldState_HELD) {
                            // We switched from hold to nohold on active media
                            this.hold(media, false).subscribe();
                        }

                        if (!(lastWebRTCState.sdpType === newWebRTCState.sdpType && lastWebRTCState.sdp === newWebRTCState.sdp)) {
                            this.processState(lastWebRTCState.sdpType, media).subscribe(() => {
                                //
                            }, err => {
                                // this.modalService.error(err)
                            });
                        }
                        delete stateMap[newWebRTCState.Id];
                        updatedMedia.push(media);
                    }
                });

                // What's left is new media
                const newMedia = Object.values(stateMap)
                // We will only allow media with this types otherwise we can do nothing with these calls
                    .filter(state => state.sdpType === WebRTCEndpointSDPState.WRTCOffer || state.sdpType === WebRTCEndpointSDPState.WRTCRequestForOffer)
                    .map(state => new MediaDescription({lastWebRTCState: {...state}}));

                const lastKnownValue = updatedMedia.concat(newMedia);
                return lastKnownValue;
            }, []),
            multicast(() => new ReplaySubject<MediaDescription[]>(1)),
            refCount());

        // this.mediaDevice$.connect();
    }

    private processState(currentEndpointState: WebRTCEndpointSDPState, media: MediaDescription): Observable<any> {
        switch (media.lastWebRTCState.sdpType) {
            case WebRTCEndpointSDPState.WRTCAnswerProvided:
                return this.processAnswerProvided(currentEndpointState, media);

            case WebRTCEndpointSDPState.WRTCOffer:
                return this.processOffer(media);

            case WebRTCEndpointSDPState.WRTCRequestForOffer:
                return this.processRequestForOffer(media);

            case WebRTCEndpointSDPState.WRTCConfirmed:
                this.processConfirmed(media);
                break;
        }

        return EMPTY;
    }

    private processConfirmed(media: MediaDescription) {
        media.isNegotiationInProgress = false;
        if (media.peerConnection.remoteDescription) {
            const [sendAudio, sendVideo] = remoteEndpointSendState(media.peerConnection.remoteDescription.sdp);
            media.isVideoReceived = sendVideo;
        }
    }

    private processAnswerProvided(currentEndpointState: WebRTCEndpointSDPState, media: MediaDescription) {
        const callState = media.lastWebRTCState;

        // Achtung: This is a real call answer when call was already answered using early media
        // in this situation simply go to confirmed state
        if (currentEndpointState === WebRTCEndpointSDPState.WRTCConfirmed) {
            return this.setConfirmed(callState.Id);
        }

        const [receiveAudio, receiveVideo] = remoteEndpointReceiveState(media.lastWebRTCState.sdp);
        if (!receiveVideo && media.video) {
            // Video is transmitted but not needed at all
            // This causes NS_ERROR_UNEXPECTED in Firefox only
            // media.peerConnection.removeTrack(media.video);
            if (media.localStream) {
                media.localStream.getVideoTracks().forEach(track => track.stop());
            }
            media.video = undefined;
        }

        /// We send offer and remote party currently provided us with an answer
        return setRemoteDescription(media.peerConnection, {
            type: 'answer',
            sdp: callState.sdp
        })
            .pipe(switchMap(() => this.setConfirmed(callState.Id)));
    }

    private setConfirmed(Id: number) {
        return this.requestChangeState({Id, sdpType: WebRTCEndpointSDPState.WRTCConfirm});
    }

    private processOffer(media: MediaDescription) {
        // If the call will be held by other party
        const [receiveAudio, receiveVideo] = remoteEndpointReceiveState(media.lastWebRTCState.sdp);

        // Ask a user if he wants video in a call
        if (!media.isVideoCall && receiveVideo && confirm('Enable video in a call?')) {
            media.isVideoCall = true;
        }
        return this.processAnswer(media);
    }

    private processRequestForOffer(media: MediaDescription) {
        return this.processAnswer(media);
    }

    public getLastOutgoingMedia() {
        const temp = this._lastOutgoingMedia;
        this._lastOutgoingMedia = undefined;
        return temp;
    }

    private holdAll(exceptId?: number) {
        return this.mediaDevice$.pipe(
            take(1),
            map(devices => devices.filter(device => device.lastWebRTCState.Id !== exceptId)),
            switchMap(devices => devices.length ? zip(...devices.map(media => this.hold(media, false))) : of([])));
    }

    public dropCall(id: number) {
        return this.requestChangeState(new RequestWebRTCChangeSDPState({
            Id: id,
            sdpType: WebRTCEndpointSDPState.WRTCTerminate
        }));
    }

    public makeCall(destination: string, isVideoCall: boolean): Observable<any> {
        const media = new MediaDescription({
            lastWebRTCState: new WebRTCCall({
                sdpType: WebRTCEndpointSDPState.WRTCInitial,
                holdState: WebRTCHoldState.WebRTCHoldState_NOHOLD
            })
        });
        media.isActive = true;
        media.isNegotiationInProgress = true;
        media.isVideoCall = isVideoCall;
        const peerConnection = setupPeerConnection(media);
        return this.holdAll().pipe(
            switchMap(() => setupMediaForPeerConnection(media, true, isVideoCall)),
            switchMap(localStream => from(peerConnection.createOffer({
                // Receive audio enabled
                offerToReceiveAudio: true,
                // Receive video enabled
                offerToReceiveVideo: isVideoCall
            }))),
            switchMap(localDescription => setLocalDescription(peerConnection, localDescription)),
            switchMap(() => (peerConnection.localDescription && peerConnection.localDescription.sdp) ?
                this.requestChangeState({
                    Id: 0,
                    sdpType: WebRTCEndpointSDPState.WRTCOffer,
                    destinationNumber: destination,
                    transactionId: this._globalTransactionId++,
                    sdp: peerConnection.localDescription.sdp
                }, true) :
                throwError('Local sdp missing')),
            tap((x: ResponseWebRTCChangeSDPState) => {
                media.lastWebRTCState = new WebRTCCall({
                    Id: x.CallId,
                    sdpType: WebRTCEndpointSDPState.WRTCInitial
                });
                this._lastOutgoingMedia = media;
            }),
            catchError(err => {
                destroyMedia(media);
                return throwError(err);
            }));
    }

    /// Answer a call provided by media description. Answer with video if it's requested
    public answer(media: MediaDescription, answerWithVideo: boolean) {
        if (media.isNegotiationInProgress) {
            return EMPTY;
        }

        media.isActive = true;
        media.isVideoCall = answerWithVideo;
        return this.holdAll(media.lastWebRTCState.Id).pipe(switchMap(() => this.processAnswer(media)));
    }

    private processAnswer(media: MediaDescription) {
        const callState = media.lastWebRTCState;
        const peerConnection = setupPeerConnection(media);
        if (!media.isActive) {
            // Mute media in case somebody makes renegotiation on inactive call
            media.isMuted = true;
        }
        media.isNegotiationInProgress = true;

        let bootstrap$: Observable<RTCSessionDescriptionInit>;
        let sdpType: WebRTCEndpointSDPState;
        if (callState.sdpType === WebRTCEndpointSDPState.WRTCOffer) {
            if (!callState.sdp) {
                return throwError(`Offer doesn't have sdp`);
            }
            // If the call will be held by other party
            const [receiveAudio, receiveVideo] = remoteEndpointReceiveState(callState.sdp);
            // Provide answer
            sdpType = WebRTCEndpointSDPState.WRTCAnswer;
            bootstrap$ = setupMediaForPeerConnection(media, receiveAudio, receiveVideo && media.isVideoCall).pipe(switchMap(() => setRemoteDescription(peerConnection, {
                    type: 'offer',
                    sdp: callState.sdp
                }))
                , switchMap(() => from(peerConnection.createAnswer())));
        }
        else if (callState.sdpType === WebRTCEndpointSDPState.WRTCRequestForOffer) {
            // Create offer
            sdpType = WebRTCEndpointSDPState.WRTCOffer;
            const offerOptions: RTCOfferOptions = {
                offerToReceiveAudio: true,
                offerToReceiveVideo: media.isVideoCall
            };
            bootstrap$ = setupMediaForPeerConnection(media, true, media.isVideoCall).pipe(switchMap(() => from(peerConnection.createOffer(offerOptions))));
        }
        else {
            media.isNegotiationInProgress = false;
            return throwError(`Can't answer when state ${callState.sdpType}`);
        }

        return bootstrap$.pipe(switchMap(localDescription => setLocalDescription(peerConnection, localDescription)),
            switchMap(() => (peerConnection.localDescription && peerConnection.localDescription.sdp) ? this.requestChangeState({
                Id: callState.Id,
                sdpType,
                transactionId: callState.transactionId,
                sdp: peerConnection.localDescription.sdp
            }) : throwError('Local sdp missing')),
            catchError(err => {
                media.isNegotiationInProgress = false;
                return throwError(err);
            }));
    }

    public sendDtmf(media: MediaDescription, code: string) {
        if (media.audio && media.audio.dtmf) {
            media.audio.dtmf.insertDTMF(code, 100, 100);
        }
    }

    public video(media: MediaDescription): Observable<any> {
        if (media.isVideoCall && (!media.isVideoReceived || !media.isVideoSend)) {
            // We're not receiving any video so let's renegotiate with video again
        }
        else {
            media.isVideoCall = !media.isVideoCall;
        }
        return this.renegotiate(media, true);
    }

    public mute(media: MediaDescription) {
        this.setMute(media, !media.isMuted);
    }

    private setMute(media: MediaDescription, mute: boolean) {
        media.isMuted = mute;
        if (media.audio && media.audio.track) {
            media.audio.track.enabled = !mute;
        }
    }

    public hold(media: MediaDescription, resume: boolean): Observable<any> {
        media.isActive = resume;
        const callState = media.lastWebRTCState;

        if (!resume && callState.holdState !== WebRTCHoldState.WebRTCHoldState_NOHOLD) {
        // Hold requested and we're not in a proper state
            return of(true);
        }

        if (resume && callState.holdState !== WebRTCHoldState.WebRTCHoldState_HOLD) {
        // Resume requested and we're not in a proper state
            return of(true);
        }

        // Mute call anyway
        this.setMute(media, !resume);
        return this.renegotiate(media, resume);
    }

    private renegotiate(media: MediaDescription, resume: boolean) {
        if (media.isNegotiationInProgress) {
        // Something is already going on but at least we muted
            return of(true);
        }
        const callState = media.lastWebRTCState;

        media.isNegotiationInProgress = true;
        this._forcedEmit.next(true);
        const peerConnection = setupPeerConnection(media);

        let bootstrap$: Observable<any> = of(true);
        if (resume) {
            // All others should go on hold
            bootstrap$ = this.holdAll(media.lastWebRTCState.Id);
        }

        return bootstrap$.pipe(
            switchMap(() => setupMediaForPeerConnection(media, true, resume ? media.isVideoCall : false)),
            switchMap(() => from(peerConnection.createOffer({
                offerToReceiveAudio: resume,
                offerToReceiveVideo: resume && media.isVideoCall
            }))),
            switchMap(localDescription => setLocalDescription(peerConnection, localDescription)),
            switchMap(() => (peerConnection.localDescription && peerConnection.localDescription.sdp) ? this.requestChangeState(({
                Id: callState.Id,
                sdpType: WebRTCEndpointSDPState.WRTCOffer,
                transactionId: this._globalTransactionId++,
                sdp: patchFirefoxSendrecInSession(peerConnection.localDescription.sdp, resume)
            })) : throwError('Local sdp missing')),
            catchError(err => {
                media.isNegotiationInProgress = false;
                this._forcedEmit.next(true);
                return throwError(err);
            }));
    }

    private requestChangeState(init: Partial<RequestWebRTCChangeSDPState>, suspend?: boolean) {
        return suspend ?
            this.myPhoneService.get<ResponseWebRTCChangeSDPState>(new RequestWebRTCChangeSDPState(init)).pipe(
                onSubscribe(() => this._suspendStream.next()),
                switchMap(response => response.Success ? of(response) : throwError(response.Message)),
                finalize(() => this._resumeStream.next())) :
            this.myPhoneService.get<ResponseWebRTCChangeSDPState>(new RequestWebRTCChangeSDPState(init)).pipe(
                switchMap(response => response.Success ? of(response) : throwError(response.Message)));
    }

}
