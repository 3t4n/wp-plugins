/* tslint:disable:no-unused-expression no-empty */
import {WebRTCControlServiceStub} from '@tests/webrtc-control-service.stub';
import * as chai from 'chai';
import {expect} from 'chai';
import {NEVER, throwError} from 'rxjs';
import {WebRTCCall, WebRTCEndpointSDPState} from '../generic';
import {WebRTCControlService} from '../webrtc/webrtc-control.service';
import {MediaDescription} from './media-description';
import {MyCall} from './mycall';
import {isEstablished, PhoneService} from './phone.service';

describe('Phone service', () => {
    let serviceStub: WebRTCControlServiceStub;
    let service: PhoneService;
    let myCalls: MyCall[];

    beforeEach(() => {
        serviceStub = new WebRTCControlServiceStub();
        service = new PhoneService(serviceStub as any as WebRTCControlService);
        myCalls = [];
        service.myCalls$.subscribe(value => myCalls = value);
    });

    it('should add trying call', () => {
        // Make a call
        service.call$('').subscribe();
        expect(myCalls.length).equal(1);
        expect(myCalls[0].isTryingCall).true;
    });

    it('should convert trying call to normal call', () => {
        // Make a call
        service.call$('').subscribe();
        serviceStub.mediaDevice$.next([new MediaDescription({lastWebRTCState: new WebRTCCall()})]);
        expect(myCalls.length).equal(1);
        expect(myCalls[0].isTryingCall).false;

        serviceStub.mediaDevice$.next([]);
        expect(myCalls.length).equal(0);
    });

    it('should remove trying call on error', () => {
        // Cause an error
        chai.spy.on(serviceStub, 'makeCall', () => throwError(''));

        // Make a call
        service.call$('').subscribe(() => {
        }, () => {
        });
        expect(myCalls.length).equal(0);
    });

    it('should return trying call on no media', () => {
        // Cause an error
        chai.spy.on(serviceStub, 'makeCall', () => NEVER);

        // Make a call
        service.call$('').subscribe(() => {
        }, () => {
        });
        serviceStub.mediaDevice$.next([]);
        expect(myCalls.length).equal(1);
    });

    it('should control established', () => {
        // Should set established
        expect(isEstablished([new MyCall({
            media: new MediaDescription({
                lastWebRTCState: new WebRTCCall({
                    Id: 5,
                    sdpType: WebRTCEndpointSDPState.WRTCOffer
                })
            })
        })], new MediaDescription({
            lastWebRTCState: new WebRTCCall({
                Id: 5,
                sdpType: WebRTCEndpointSDPState.WRTCConfirmed
            })
        }))).equal(true);

        // Should not set established
        expect(isEstablished([new MyCall({
            media: new MediaDescription({
                lastWebRTCState: new WebRTCCall({
                    Id: 5,
                    sdpType: WebRTCEndpointSDPState.WRTCOffer
                })
            })
        })], new MediaDescription({
            lastWebRTCState: new WebRTCCall({
                Id: 6,
                sdpType: WebRTCEndpointSDPState.WRTCConfirmed
            })
        }))).equal(false);

        // Should not set established
        expect(isEstablished([], new MediaDescription({
            lastWebRTCState: new WebRTCCall({
                Id: 6,
                sdpType: WebRTCEndpointSDPState.WRTCConfirmed
            })
        }))).equal(false);

        // Should keep established
        expect(isEstablished([new MyCall({
            isEstablished: true,
            media: new MediaDescription({
                lastWebRTCState: new WebRTCCall({
                    Id: 5,
                    sdpType: WebRTCEndpointSDPState.WRTCOffer
                })
            })
        })], new MediaDescription({
            lastWebRTCState: new WebRTCCall({
                Id: 5,
                sdpType: WebRTCEndpointSDPState.WRTCOffer
            })
        }))).equal(true);
    });

});
