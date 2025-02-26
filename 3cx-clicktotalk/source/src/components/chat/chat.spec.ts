/* tslint:disable:no-unused-expression no-empty */
import {mount} from '@vue/test-utils';
import * as chai from 'chai';
import {expect} from 'chai';
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

    it('should not send empty message', () => {
        const requestSpy = chai.spy.on(myPhoneService, 'get');
        element.sendMessage();
        expect(requestSpy).not.called;
    });

    it('should not send long message', () => {
        const requestSpy = chai.spy.on(myPhoneService, 'get');
        element.myMessage = 'x'.repeat(30 * 1024);
        element.sendMessage();
        expect(requestSpy).not.called;
        expect(element.myMessage).eql('');
    });

    it('should be able to send and receive messages', async () => {
        // Get operator message
        let message = await getNextMessage(element);
        expect(message.isLocal).false;
        expect(message.text).eql(['No agents available']);
        expect(message.senderName).equal('Support');
        expect(message.dateTime).ok;

        // Send my message
        element.myMessage = 'Hello, World!';
        element.sendMessage();
        message = await getNextMessage(element);
        expect(message.isLocal).true;
        expect(message.text).eql(['Hello, World!']);

        // Send operator message
        let promise = getNextMessage(element);
        server.sendOperatorMessage('How can I help you?');
        message = await promise;
        expect(message.isLocal).false;
        expect(message.text).eql(['How can I help you?']);

        // Last message
        promise = getNextMessage(element);
        myPhoneService.closeSession();
        message = await promise;
        expect(message.isLocal).false;
        console.log(message.text);
        expect(message.text[0]).eql('Your session is over. Please feel free to contact us again!');

    });
});
