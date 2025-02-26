import {Component, Provide} from 'vue-property-decorator';
import '../../myphone/my-phone-channel';
import {MyPhoneService} from '../../myphone/my-phone-service';
import {constructUrl, errorToString} from '../../myphone/utils';
import CallUsPhone from '../phone/phone';
import TheApp from '../the-app/the-app';

@Component({
    components: {
        CallUsPhone
    }
})
export default class CallUsAppPhone extends TheApp {
    @Provide()
    myPhoneService: MyPhoneService;

    constructor() {
        super();
        this.myPhoneService = new MyPhoneService({}, constructUrl(this.phonesystemUrl), this.party);
    }

    beforeMount(){
        this.$subscribeTo(this.eventBus.onError, (error) => {
            alert(errorToString(error));
        });
    }

}
