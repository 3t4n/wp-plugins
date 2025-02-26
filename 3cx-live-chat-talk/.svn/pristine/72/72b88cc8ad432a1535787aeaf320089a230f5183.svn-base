import * as fetchMock from 'fetch-mock';
import {MockRequest, MockResponse} from 'fetch-mock';
import {Server} from 'mock-socket';
import {ChatMessage, ChatRecipient, DateTime, GenericMessage, Login, LoginInfo, MyWebRTCEndpoint, RequestMyInfo, RequestRegisterWebRTCEndpoint, RequestSendChatMessage, RequestSetChatReceived, ResponseAcknowledge, ResponseMyMessages} from '../../generic';
import {IGenericRequest} from '../my-phone-session';

function encodeMessage(response: IGenericRequest) {
    const message = GenericMessage.encode(response.toGenericMessage()).finish();
    return message.buffer.slice(message.byteOffset, message.byteOffset + message.byteLength);
}

function encodeMockResponse(response: IGenericRequest): MockResponse {
    return new Response(encodeMessage(response), {status: 200});
}

function decodeMockRequest(opts: MockRequest) {
    const request = opts.body as Uint8Array;
    const genericMessage = GenericMessage.decode(request, request.length);
    delete genericMessage.MessageId;
    return Object.values(genericMessage)[0];
}

export class MyPhoneServerMock {
    socket?: WebSocket;
    interval: any;
    readonly server: Server;

    constructor() {
        fetchMock.get('http://sample.com:5000/MyPhone/c2cinfo?c2cid=support', () => this.getInfo());
        fetchMock.get('http://sample.com:5000/MyPhone/c2clogin?c2cid=support', {sessionId: '234dfgdgdfg3435'});
        fetchMock.get('http://sample.com:5000/MyPhone/c2clogin?c2cid=support&email=no%403cx.com&displayname=nikolaio', {sessionId: '234dfgdgdfg3435'});
        fetchMock.get('http://sample.com:5000/MyPhone/c2clogin?c2cid=invalid', {status: 404});
        fetchMock.post('http://sample.com:5000/MyPhone/MPWebService.asmx', (url, opts) => {
            const message = decodeMockRequest(opts);
            return encodeMockResponse(this.processMessage(message));
        });

        this.server = new Server('ws://sample.com:5000/ws/webclient?sessionId=234dfgdgdfg3435&pass=71AE69D27739B815B5DD0A77AE490609');
        this.server.on('connection', socket => {
            this.interval = setInterval(() => {
                socket.send('ADDP');
            }, 5000);
            this.socket = socket;
            socket.send('START');
        });
    }

    getInfo(){
        return {allowVideo: true};
    }

    processMessage(message: any): IGenericRequest {
        if (message instanceof Login) {
            return this.processLogin(message);
        }
        else if (message instanceof RequestMyInfo) {
            return this.processRequestMyInfo(message);
        }
        else if (message instanceof RequestRegisterWebRTCEndpoint) {
            return this.processRequestRegisterWebRTCEndpoint(message);
        }
        else if (message instanceof RequestSendChatMessage) {
            return this.processRequestSendChatMessage(message);
        }
        else if (message instanceof RequestSetChatReceived){
            return this.processRequestSetChatReceived(message);

        }
        else {
            return new ResponseAcknowledge({
                Success: false
            });
             }
    }

    processLogin(message: Login) {
        if (message.Password === '') {
            // First login
            return new LoginInfo({
                Nonce: 'fgdgg4urjdfhjfj'
            });
        }
        else {
            // Second login
            return new LoginInfo({
                Nonce: 'xfgretrtjutyut'
            });
        }
    }

    processRequestMyInfo(message: RequestMyInfo) {
        return new ResponseAcknowledge({
            Success: true
        });
    }

    processRequestSetChatReceived(message: RequestSetChatReceived) {
        return new ResponseAcknowledge({
            Success: true
        });
    }

    processRequestRegisterWebRTCEndpoint(message: RequestRegisterWebRTCEndpoint) {
        if (this.socket) {
            this.socket.send(encodeMessage(new MyWebRTCEndpoint({
                isWebRTCEnpointRegistered: true
            })));
        }
        return new ResponseAcknowledge({
            Success: true
        });
    }

    processRequestSendChatMessage(message: RequestSendChatMessage) {
        if (this.socket) {
            this.socket.send(encodeMessage(new ResponseMyMessages({
                Messages: [
                    new ChatMessage({
                        SenderNumber: '000',
                        Message: message.Message,
                        SenderBridgeNumber: 'webrtc',
                        Time: new DateTime({
                            Day: 1,
                            Hour: 1,
                            Minute: 1,
                            Month: 1,
                            Second: 1,
                            Year: 2018
                        }),
                        Recipient: new ChatRecipient({
                            ExtNumber: '000'
                        })
                    })
                ]
            })));
        }
        return new ResponseAcknowledge({
            Success: true
        });
    }

    sendOperatorMessage(text: string){
        if (this.socket) {
            this.socket.send(encodeMessage(new ResponseMyMessages({
                Messages: [
                    new ChatMessage({
                        SenderNumber: '000',
                        IsNew: true,
                        Message: text,
                        SenderBridgeNumber: '',
                        Time: new DateTime({
                            Day: 1,
                            Hour: 1,
                            Minute: 1,
                            Month: 1,
                            Second: 1,
                            Year: 2018
                        }),
                        Recipient: new ChatRecipient({
                            ExtNumber: '000'
                        })
                    })
                ]
            })));
        }
    }

    restore() {
        if (this.interval) {
            clearInterval(this.interval);
        }
        this.server.close();
        fetchMock.restore();
    }

}
