import {Component, Prop, Vue} from 'vue-property-decorator';
import {validationMixin} from 'vuelidate/lib';
import {email, required} from 'vuelidate/lib/validators';
import {AuthenticationType, Config} from '../../model/config';
import Panel from '../panel/panel';

@Component({
    components: {
        Panel
    },
    mixins: [validationMixin],
    validations() {
        const validations: { [x: string]: any } = {};
        const self = this as CallUsAuthenticateForm;

        if (self.authType === AuthenticationType.Both || self.authType === AuthenticationType.Name) {
            validations.name = {
                required
            };
        }
        if (self.authType === AuthenticationType.Both || self.authType === AuthenticationType.Email) {
            validations.email = {
                required,
                email
            };
        }
        return validations;
    }
})
export default class CallUsAuthenticateForm extends Vue {
    @Prop()
    startMinimized!: boolean;

    @Prop()
    config!: Config;

    readonly AuthenticationType = AuthenticationType;
    @Prop()
    authType!: AuthenticationType;

    name: string = '';
    email: string = '';

    submit() {
        if (!this.$v) {
            return;
        }
        this.$v.$touch();
        if (this.$v.$invalid) {
            //
        }
        else {
            this.$emit('submit', {
                name: this.name,
                email: this.email
            });
        }
    }
}
