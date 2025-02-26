/* tslint:disable:no-unused-expression no-empty */
import {observableToPromise} from '@tests/utils';
import * as chai from 'chai';
import {expect} from 'chai';
import {LoginInfo} from '../generic';
import {MyPhoneServerMock} from './__tests__/my-phone-server-mock';
import {createMyPhoneSession} from './my-phone-channel';
import {MySessionState} from './my-phone-session';

describe('MyPhoneChannel', () => {
    let server: MyPhoneServerMock;
    beforeEach(() => {
        server = new MyPhoneServerMock();
    });

    afterEach(() => {
        server.restore();
    });

    it('should open channel', async () => {
        const session = await observableToPromise(createMyPhoneSession({}, 'http://sample.com:5000/', 'support'));
        expect(session.sessionState).equal(MySessionState.Connected);
    });

    it('should open channel with email and name', async () => {
        const session = await observableToPromise(createMyPhoneSession({name: 'nikolaio', email: 'no@3cx.com'}, 'http://sample.com:5000/', 'support'));
        expect(session.sessionState).equal(MySessionState.Connected);
    });

    it('should not open channel', async () => {
        const session = await observableToPromise(createMyPhoneSession({}, 'http://sample.com:5000/', 'invalid'));
        expect(session.sessionState).equal(MySessionState.Error);
    });

    it('should not open because of empty nonce', async () => {
        chai.spy.on(server, 'processLogin', () => new LoginInfo());
        const session = await observableToPromise(createMyPhoneSession({}, 'http://sample.com:5000/', 'invalid'));
        expect(session.sessionState).equal(MySessionState.Error);
    });
});
