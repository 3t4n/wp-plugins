/* tslint:disable:no-unused-expression no-empty */
import {MyPhoneServiceStub} from '@tests/my-phone-service.stub';
import {MyPhoneSessionStub} from '@tests/my-phone-session.stub';
import * as chai from 'chai';
import {expect} from 'chai';
import {of} from 'rxjs';
import {MyWebRTCEndpoint, RequestWebRTCChangeSDPState, ResponseWebRTCChangeSDPState, WebRTCCall, WebRTCEndpointSDPState, WebRTCHoldState} from '../generic';
import {MyPhoneService} from '../myphone/my-phone-service';
import {MediaDescription} from '../phone/media-description';
import {WebRTCControlService} from './webrtc-control.service';

const WebRtcBrowserTimeout = 10000;

class Party {
    myPhoneService: MyPhoneServiceStub;
    myPhoneSession: MyPhoneSessionStub;
    webRtcService: WebRTCControlService;
    requestWebRTCChangeSDPState!: RequestWebRTCChangeSDPState;
    mediaDescription: MediaDescription[] = [];
    resolve!: () => void;

    constructor() {
        this.myPhoneSession = new MyPhoneSessionStub();
        this.myPhoneService = new MyPhoneServiceStub(of(this.myPhoneSession));

        this.webRtcService = new WebRTCControlService(this.myPhoneService as any as MyPhoneService);
        this.webRtcService.mediaDevice$.subscribe(device => {
            this.mediaDescription = device;
        });

        this.myPhoneSession.webRTCEndpoint$.next(new MyWebRTCEndpoint());

        chai.spy.on(this.myPhoneService, 'get', (init: RequestWebRTCChangeSDPState) => {
            if (this.resolve) {
                this.resolve();
            }
            // Save proposed web rtc state
            this.requestWebRTCChangeSDPState = init;
            return of(new ResponseWebRTCChangeSDPState({CallId: 1, Success: true}));
        });
    }

    makeRequestChangeStatePromise() {
        return new Promise((resolve, reject) => {
            const timeout = setTimeout(() => {
                reject();
            }, WebRtcBrowserTimeout);
            this.resolve = () => {
                clearTimeout(timeout);
                resolve();
            };
        });
    }

}

describe('WebRTC control service', () => {
    let party1: Party;
    let party2: Party;

    beforeEach(() => {
        party1 = new Party();
        party2 = new Party();
    });

    async function connectParty1Party2(requestForOffer: boolean, makeCallVideo: boolean, answerCallVideo: boolean) {
        // ======== Make outbound call with party1
        if (!requestForOffer) {
            const foo = () => {
            };
            const makeCallCompleted1 = chai.spy(foo);
            // Make a call
            await new Promise((resolve, reject) => {
                party1.webRtcService.makeCall('100', makeCallVideo).subscribe(() => {
                }, err => reject(err), () => {
                    makeCallCompleted1();
                    resolve();
                });
            });
            expect(makeCallCompleted1).called;
        }
        else {
            // Subscribe again
            party1.myPhoneSession.webRTCEndpoint$.next(new MyWebRTCEndpoint({
                Items: [new WebRTCCall({
                    Id: 1,
                    sdpType: WebRTCEndpointSDPState.WRTCRequestForOffer,
                    holdState: WebRTCHoldState.WebRTCHoldState_NOHOLD
                })]
            }));

            const foo = () => {
            };
            const answerCallCompleted1 = chai.spy(foo);
            // Party2 answered the call
            await new Promise((resolve, reject) => {
                party1.webRtcService.answer(party1.mediaDescription[0], answerCallVideo).subscribe(() => {
                }, err => reject(err), () => {
                    answerCallCompleted1();
                    resolve();
                });
            });

            expect(answerCallCompleted1).called;
        }

        expect(party1.requestWebRTCChangeSDPState!.sdpType).equal(WebRTCEndpointSDPState.WRTCOffer);

        // ========= Answer inbound call with party2
        // Party2 received call information
        party2.myPhoneSession.webRTCEndpoint$.next(new MyWebRTCEndpoint({
            Items: [new WebRTCCall({
                Id: 1,
                sdp: party1.requestWebRTCChangeSDPState!.sdp,
                sdpType: party1.requestWebRTCChangeSDPState!.sdpType,
                holdState: WebRTCHoldState.WebRTCHoldState_NOHOLD
            })]
        }));

        const foo = () => {
        };
        const answerCallCompleted1 = chai.spy(foo);
        // Party2 answered the call
        await new Promise((resolve, reject) => {
            party2.webRtcService.answer(party2.mediaDescription[0], answerCallVideo).subscribe(() => {

            }, err => reject(err), () => {
                answerCallCompleted1();
                resolve();
            });
        });

        expect(party2.requestWebRTCChangeSDPState!.sdpType).equal(WebRTCEndpointSDPState.WRTCAnswer);
        expect(answerCallCompleted1).called;

        // ======== Party1 received answer from Party2
        const lastPromise = party1.makeRequestChangeStatePromise();
        // Subscribe again
        party1.myPhoneSession.webRTCEndpoint$.next(new MyWebRTCEndpoint({
            Items: [new WebRTCCall({
                Id: 1,
                sdp: party2.requestWebRTCChangeSDPState!.sdp,
                sdpType: WebRTCEndpointSDPState.WRTCAnswerProvided,
                holdState: WebRTCHoldState.WebRTCHoldState_NOHOLD
            })]
        }));
        await lastPromise;
        expect(party1.requestWebRTCChangeSDPState!.sdpType).equal(WebRTCEndpointSDPState.WRTCConfirm);

        // Set to confirmed
        party1.myPhoneSession.webRTCEndpoint$.next(new MyWebRTCEndpoint({
            Items: [new WebRTCCall({
                Id: 1,
                sdpType: WebRTCEndpointSDPState.WRTCConfirmed,
                holdState: WebRTCHoldState.WebRTCHoldState_NOHOLD
            })]
        }));
    }

    async function party1hold() {
        // =========== Hold the call
        await new Promise((resolve, reject) => {
            party1.webRtcService.hold(party1.mediaDescription[0], false).subscribe(
                () => {
                }, err => reject(err), () => resolve());
        });

        expect(party1.requestWebRTCChangeSDPState.sdp).contain('sendonly');

        let lastPromise = party2.makeRequestChangeStatePromise();
        // Party2 received call information
        party2.myPhoneSession.webRTCEndpoint$.next(new MyWebRTCEndpoint({
            Items: [new WebRTCCall({
                Id: 1,
                sdp: party1.requestWebRTCChangeSDPState!.sdp,
                sdpType: party1.requestWebRTCChangeSDPState!.sdpType,
                holdState: WebRTCHoldState.WebRTCHoldState_HELD
            })]
        }));
        await lastPromise;

        expect(party2.requestWebRTCChangeSDPState.sdp).contain('recvonly');

        lastPromise = party1.makeRequestChangeStatePromise();
        // Party1 received call information
        party1.myPhoneSession.webRTCEndpoint$.next(new MyWebRTCEndpoint({
            Items: [new WebRTCCall({
                Id: 1,
                sdp: party2.requestWebRTCChangeSDPState!.sdp,
                sdpType: WebRTCEndpointSDPState.WRTCAnswerProvided,
                holdState: WebRTCHoldState.WebRTCHoldState_HOLD
            })]
        }));
        await lastPromise;
        expect(party1.requestWebRTCChangeSDPState!.sdpType).equal(WebRTCEndpointSDPState.WRTCConfirm);

        // Set to confirmed
        party1.myPhoneSession.webRTCEndpoint$.next(new MyWebRTCEndpoint({
            Items: [new WebRTCCall({
                Id: 1,
                sdpType: WebRTCEndpointSDPState.WRTCConfirmed,
                holdState: WebRTCHoldState.WebRTCHoldState_HOLD
            })]
        }));

        // Second call to hold should be prohibited
        let myValOuter: boolean = false;
        await new Promise((resolve, reject) => {
            party1.webRtcService.hold(party1.mediaDescription[0], false).subscribe(
                (myVal) => {
                    myValOuter = myVal;
                }, err => reject(err), () => resolve());
        });
        expect(myValOuter).true;
    }

    async function party1resume() {
        // =========== Resume the call
        await new Promise((resolve, reject) => {
            party1.webRtcService.hold(party1.mediaDescription[0], true).subscribe(
                () => {
                }, err => reject(err), () => resolve());
        });

        expect(party1.requestWebRTCChangeSDPState.sdp).contain('sendrecv');

        let lastPromise = party2.makeRequestChangeStatePromise();
        // Party2 received call information
        party2.myPhoneSession.webRTCEndpoint$.next(new MyWebRTCEndpoint({
            Items: [new WebRTCCall({
                Id: 1,
                sdp: party1.requestWebRTCChangeSDPState!.sdp,
                sdpType: party1.requestWebRTCChangeSDPState!.sdpType,
                holdState: WebRTCHoldState.WebRTCHoldState_NOHOLD
            })]
        }));
        await lastPromise;

        expect(party2.requestWebRTCChangeSDPState.sdp).contain('sendrecv');

        lastPromise = party1.makeRequestChangeStatePromise();
        // Party1 received call information
        party1.myPhoneSession.webRTCEndpoint$.next(new MyWebRTCEndpoint({
            Items: [new WebRTCCall({
                Id: 1,
                sdp: party2.requestWebRTCChangeSDPState!.sdp,
                sdpType: WebRTCEndpointSDPState.WRTCAnswerProvided,
                holdState: WebRTCHoldState.WebRTCHoldState_NOHOLD
            })]
        }));
        await lastPromise;
        expect(party1.requestWebRTCChangeSDPState!.sdpType).equal(WebRTCEndpointSDPState.WRTCConfirm);

        // Second call to resume should be prohibited
        let myValOuter: boolean = false;
        await new Promise((resolve, reject) => {
            party1.webRtcService.hold(party1.mediaDescription[0], true).subscribe(
                (myVal) => {
                    myValOuter = myVal;
                }, err => reject(err), () => resolve());
        });
        expect(myValOuter).true;
    }

    it('makes connected audio call', async () => {
        await connectParty1Party2(false, false, false);
        party1.webRtcService.mute(party1.mediaDescription[0]);
        expect(party1.mediaDescription[0].isMuted).true;

        party1.webRtcService.mute(party1.mediaDescription[0]);
        expect(party1.mediaDescription[0].isMuted).false;
    });

    it('makes connected audio call initiated with request for offer', async () => {
        await connectParty1Party2(true, false, false);
    });

    it('makes connected video call', async () => {
        await connectParty1Party2(false, true, true);
    });

    it('reject video when answer', async () => {
        await connectParty1Party2(false, true, false);
    });

    it('hold and resume call', async () => {
        await connectParty1Party2(false, false, false);
        await party1hold();
        await party1resume();
    });

    it('hold and resume video call', async () => {
        await connectParty1Party2(false, true, true);
        await party1hold();
        await party1resume();
    });
});
