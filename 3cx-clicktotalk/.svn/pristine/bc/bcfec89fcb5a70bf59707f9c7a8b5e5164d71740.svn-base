import {Component, Inject, Prop, Provide, Vue} from 'vue-property-decorator';
import {logErrorMessage} from '../../logger';
import {Authentication} from '../../model/authentication';
import {Config} from '../../model/config';
import {MyPhoneService} from '../../myphone/my-phone-service';
import {MySessionState} from '../../myphone/my-phone-session';
import CallUsChat from '../chat/chat';
import {EventBus} from '../event-bus';
import {GlyphiconChevron} from '../icons';
import OverlayMessage from '../overlay-message/overlay-message';
import Panel from '../panel/panel';
import CallUsPhone from '../phone/phone';
import {errorToString} from '../../myphone/utils';

@Component({
    components: {
        CallUsChat,
        CallUsPhone,
        Panel,
        OverlayMessage,
        GlyphiconChevron,
    }
})
export default class CallUsMainForm extends Vue {
    @Prop()
    startMinimized!: boolean;

    @Prop()
    auth!: Authentication;

    @Prop()
    config!: Config;

    @Provide()
    myPhoneService: MyPhoneService;

    @Inject()
    eventBus!: EventBus;
    notificationMessage = '';
    hasSession = false;

    constructor() {
        super();
        this.myPhoneService = new MyPhoneService(this.auth, this.config.phonesystemUrl, this.config.party);
    }

    onClose(){
        this.myPhoneService.closeSession();
    }

    beforeMount() {
        this.$subscribeTo(this.myPhoneService.myPhoneSession$, session => {
            this.hasSession = session.sessionState === MySessionState.Connected;
        });

        this.$subscribeTo(this.eventBus.onError, (error) => {
            this.notificationMessage = errorToString(error);
            logErrorMessage(this.notificationMessage);
        });
    }
}
