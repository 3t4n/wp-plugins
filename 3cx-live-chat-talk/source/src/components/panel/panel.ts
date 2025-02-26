import {Component, Prop, Vue} from 'vue-property-decorator';
import {GlyphiconChevron, GlyphiconTimes} from '../icons';
import ToolbarButton from '../toolbar/toolbar-button';

@Component({
    components: {
        GlyphiconChevron,
        GlyphiconTimes,
        ToolbarButton
    }
})
export default class Panel extends Vue {
    @Prop()
    showCloseButton!: boolean;

    @Prop()
    startMinimized!: boolean;

    @Prop()
    title!: string;

    collapsed = false;

    onClose(){
        this.$emit('close');
    }

    beforeMount() {
        this.collapsed = this.startMinimized;
        this.$nextTick(() => {
            const content = this.$refs.panelContent as HTMLElement;
            content.style.setProperty('--fullHeight', content.scrollHeight + 'px');
        });
    }

}
