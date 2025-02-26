import {observableToPromise} from '@tests/utils';
import {expect} from 'chai';
import {RequestMyInfo} from '../generic';
import {MyPhoneServerMock} from './__tests__/my-phone-server-mock';
import {MyPhoneService} from './my-phone-service';
import {MySessionState} from './my-phone-session';

describe('MyPhoneService', () => {
    let server: MyPhoneServerMock;
    before(() => {
        server = new MyPhoneServerMock();
    });

    after(() => {
        server.restore();
    });

    it('should connect and disconnect', async () => {
        const service = new MyPhoneService({}, 'http://sample.com:5000/', 'support');
        service.myPhoneSession$.subscribe(() => {
            // Should be subscribed for reconnect to work
        });
        // This will cause creation of connected session
        await observableToPromise(service.get(new RequestMyInfo()));

        let session = await observableToPromise(service.myPhoneSession$);
        expect(session.sessionState).equal(MySessionState.Connected);

        service.closeSession();
        session = await observableToPromise(service.myPhoneSession$);
        expect(session.sessionState).equal(MySessionState.Idle);
    });

    it('should read info', async () => {
        const service = new MyPhoneService({}, 'http://sample.com:5000/', 'support');
        const info = await observableToPromise(service.info$);
        expect(info).eql({allowVideo: true});
    });
});
