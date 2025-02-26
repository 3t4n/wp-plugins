import {Prop, Provide, Vue} from 'vue-property-decorator';
import {EventBus} from '../event-bus';

export default class TheApp extends Vue {
    @Prop({default: 'Hello! How can I help you?'})
    inviteMessage!: string;

    @Prop({default: 'No Agents available at the moment. Please leave a message and we will contact you shortly.'})
    unavailableMessage!: string;

    @Prop({default: 'true'})
    allowCall!: string;

    @Prop({default: 'false'})
    minimized!: string;

    @Prop({default: 'true'})
    allowVideo!: string;

    @Prop({default: 'none'})
    authentication!: string;

    @Prop()
    phonesystemUrl!: string;

    @Prop()
    party!: string;

    @Prop()
    operatorIcon!: string;

    @Prop({default: 'Support'})
    operatorName!: string;

    @Prop({default: 'CONTACT US'})
    windowTitle!: string;

    @Prop()
    userIcon!: string;

    @Prop({default: 'Call Us'})
    callTitle!: string;

    @Provide()
    eventBus = new EventBus();
}
