import anchorme from 'anchorme';
import {Component, Inject, Prop, Vue} from 'vue-property-decorator';
import {convertAsciiToUnicode, convertTextToEmoji} from '../../emojione-light/emojione-light';
import {ChatMessage, DateTime, RequestSendChatMessage, RequestSetChatReceived, ResponseMyMessages} from '../../generic/index';
import {logErrorMessage} from '../../logger';
import {AppChatMessage} from '../../model/app-chat-message';
import {Config} from '../../model/config';
import {MyPhoneService} from '../../myphone/my-phone-service';
import {MySessionState} from '../../myphone/my-phone-session';
import ChatMessage2 from '../chat-message/chat-message';
import {EventBus} from '../event-bus';

export const MaxChatMessageSize: number = 20 * 1024;

const protoBufToJsDateTime = (dt: DateTime) => new Date(Date.UTC(dt.Year, dt.Month - 1, dt.Day, dt.Hour, dt.Minute, dt.Second));
const dateTimeToString = (d: Date) => ('00' + d.getHours()).slice(-2) + ':' + ('00' + d.getMinutes()).slice(-2);
const linkify = (str: string) => anchorme(str, {
    attributes: [
        {
            name: 'target',
            value: '_blank'
        }
    ]
});

@Component({
    components: {
        ChatMessage2
    }
})
export default class CallUsChat extends Vue {
    @Prop()
    config!: Config;

    @Inject()
    myPhoneService!: MyPhoneService;

    @Inject()
    eventBus!: EventBus;

    myMessage: string = '';
    chatMessages: AppChatMessage[] = [];
    hasSession = false;

    beforeMount() {
        this.$subscribeTo(this.myPhoneService.myPhoneSession$, session => {
            if (this.hasSession && session.sessionState !== MySessionState.Connected) {
                this.endWithMessage();
            }
            this.hasSession = session.sessionState === MySessionState.Connected;
        });

        this.$subscribeTo(this.myPhoneService.info$, response => {
            this.startWithMessage(response.isAvailable);
        }, () => {
            this.startWithMessage(false);
        });

        this.$subscribeTo(this.myPhoneService.notificationsOfType$(ResponseMyMessages), (data) => {
            const isLastMessageLocal = this.chatMessages[this.chatMessages.length - 1].isLocal;
            data.Messages.forEach(message => {
                const isLocal = message.SenderBridgeNumber === 'webrtc';
                const text = convertTextToEmoji(linkify(message.Message), this.config.phonesystemUrl + 'webclient/');
                if (isLocal !== isLastMessageLocal) {
                    this.addChatMessage({
                        isLocal,
                        icon: isLocal ? this.config.userIcon : this.config.operatorIcon,
                        senderName: isLocal ? message.SenderName : this.config.operatorName,
                        dateTime: dateTimeToString(protoBufToJsDateTime(message.Time)),
                        text: [text]
                    });
                }
                else {
                    this.chatMessages[this.chatMessages.length - 1].text.push(text);
                    this.scrollChatToBottom();
                }
            });

            this.setMessagesAsReceived(data.Messages);
        });

    }

    addChatMessage(message: AppChatMessage) {
        this.chatMessages.push(message);
        this.scrollChatToBottom();
    }

    endWithMessage() {
        this.addChatMessage({
            isLocal: false,
            icon: this.config.operatorIcon,
            senderName: this.config.operatorName,
            dateTime: dateTimeToString(new Date()),
            text: ['Your session is over. Please feel free to contact us again!']
        });
    }

    startWithMessage(available: boolean) {
        this.addChatMessage({
            isLocal: false,
            icon: this.config.operatorIcon,
            senderName: this.config.operatorName,
            dateTime: dateTimeToString(new Date()),
            text: [available ? this.config.inviteMessage : this.config.unavailableMessage]
        });
    }

    private setMessagesAsReceived(messages: ChatMessage[]) {
        const messagesToMark = messages.filter(m => m.IsNew).map(m => m.Id);
        if (messagesToMark.length > 0) {
            this.myPhoneService.get(new RequestSetChatReceived({
                Items: messagesToMark
            })).subscribe();
        }
    }

    private focusInput() {
        setTimeout(() => {
            const input = this.$refs.chatInput as HTMLElement;
            input.focus();
        });
    }

    public sendMessage() {
        if (!this.myMessage) {
            return;
        }
        const messageToSend = convertAsciiToUnicode(this.myMessage);
        this.myMessage = '';
        if (messageToSend.length < MaxChatMessageSize) {
            this.myPhoneService.get(new RequestSendChatMessage({Message: messageToSend})).subscribe(() => {
                this.focusInput();
            }, (error) =>
                this.eventBus.onError.next(error));
        }
        else {
            logErrorMessage('Chat message too large');
        }
    }

    private scrollChatToBottom() {
        setTimeout(() => {
            const history = this.$refs.chatHistory as HTMLElement;
            history.scrollTop = history.scrollHeight;
        });
    }
}
