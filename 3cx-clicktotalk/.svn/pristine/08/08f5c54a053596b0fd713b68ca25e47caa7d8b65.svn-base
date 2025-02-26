import {Component} from 'vue-property-decorator';
import operatorIcon from '../../images/OperatorIcon.png';
import userIcon from '../../images/user.png';
import {Authentication} from '../../model/authentication';
import {AuthenticationType, Config} from '../../model/config';
import '../../myphone/my-phone-channel';
import {constructUrl} from '../../myphone/utils';
import CallUsAuthenticateForm from '../authenticate-form/authenticate-form.vue';
import CallUsMainForm from '../main-form/main-form';
import TheApp from '../the-app/the-app';

export enum ViewState {
    Chat,
    InputForm
}

@Component({
    components: {
        CallUsMainForm,
        CallUsAuthenticateForm
    }
})
export default class CallUsApp extends TheApp {
    readonly ViewState = ViewState;
    type: ViewState = ViewState.Chat;
    auth: Authentication = {};
    authenticationType = AuthenticationType.None;
    authWindowMinimized = false;
    mainWindowMinimized = false;

    beforeMount() {
        if (this.authentication === 'name') {
            this.authenticationType = AuthenticationType.Name;
        }
        else if (this.authentication === 'email') {
            this.authenticationType = AuthenticationType.Email;
        }
        else if (this.authentication === 'both') {
            this.authenticationType = AuthenticationType.Both;
        }

        this.type = this.authenticationType === AuthenticationType.None ? ViewState.Chat : ViewState.InputForm;
        this.authWindowMinimized = this.minimized === 'true';

        this.mainWindowMinimized = this.minimized === 'true' && this.authenticationType === AuthenticationType.None;
    }

    showChat(auth: Authentication) {
        this.auth = auth;
        this.type = ViewState.Chat;
    }

    get config(): Config {
        return {
            windowTitle: this.windowTitle,
            operatorName: this.operatorName,
            operatorIcon: this.operatorIcon || operatorIcon,
            userIcon: this.operatorIcon || userIcon,
            allowCall: this.allowCall === 'true',
            allowVideo: this.allowVideo === 'true',
            inviteMessage: this.inviteMessage,
            unavailableMessage: this.unavailableMessage,
            party: this.party,
            phonesystemUrl: constructUrl(this.phonesystemUrl)
        };
    }
}
