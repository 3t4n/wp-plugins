/* tslint:disable:no-unused-expression no-empty */
import {mount} from '@vue/test-utils';
import * as chai from 'chai';
import {expect} from 'chai';
import * as fetchMock from 'fetch-mock';
import {AppChatMessage} from '../../model/app-chat-message';
import {Config} from '../../model/config';
import {MyPhoneServerMock} from '../../myphone/__tests__/my-phone-server-mock';
import {MyPhoneService} from '../../myphone/my-phone-service';
import {EventBus} from '../event-bus';
import CallUsChat from './chat';

function getNextMessage(element: CallUsChat) {
    const original = element.addChatMessage;

    return new Promise<AppChatMessage>(resolve => {
        chai.spy.on(element, 'addChatMessage', message => {
            resolve(message);
            original.apply(element, [message]);
            chai.spy.restore(element, 'addChatMessage');
        });
    });
}

describe('Chat component', () => {
    let server: MyPhoneServerMock;
    let myPhoneService: MyPhoneService;
    let element: CallUsChat;

    beforeEach(() => {
        server = new MyPhoneServerMock();
        chai.spy.on(server, 'getInfo', () => ({isAvailable: true}));
        myPhoneService = new MyPhoneService({}, 'http://sample.com:5000/', 'support');

        const config: Partial<Config> = {
            operatorName: 'Support',
            inviteMessage: 'Lets talk',
            unavailableMessage: 'No agents available'
        };
        const wrapper = mount(CallUsChat, {
            propsData: {
                config
            },
            provide: {
                myPhoneService,
                eventBus: new EventBus()
            },
        });
        element = wrapper.vm;
    });

    afterEach(() => {
        server.restore();
    });

    it('should show invite message', async () => {
        // Get operator message
        const message = await getNextMessage(element);
        expect(message.isLocal).false;
        expect(message.text).eql(['Lets talk']);
        expect(message.senderName).equal('Support');
        expect(message.dateTime).ok;
    });

});
