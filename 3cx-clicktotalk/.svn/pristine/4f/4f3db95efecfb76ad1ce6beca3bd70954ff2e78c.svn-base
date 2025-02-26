import {Component, Prop, Vue} from 'vue-property-decorator';

@Component({})
export default class OverlayMessage extends Vue {
    @Prop()
    message!: string;

    mounted(){
        this.$nextTick(() => {
            const submitButton = this.$refs.submitButton as HTMLElement;
            submitButton.focus();
        });
    }

    submit(){
        this.$emit('submit');
    }
}
