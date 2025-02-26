import {map, switchMap} from 'rxjs/operators';
import Component from 'vue-class-component';
import {Inject, Prop, Vue} from 'vue-property-decorator';
import {MyPhoneService} from '../../myphone/my-phone-service';
import {dummyMediaDescription, MediaDescription} from '../../phone/media-description';
import {PhoneService} from '../../phone/phone.service';
import {WebRTCControlService} from '../../webrtc/webrtc-control.service';
import {EventBus} from '../event-bus';
import {GlyphiconCall, GlyphiconFullscreen, GlyphiconHourglass, GlyphiconMic, GlyphiconMicoff, GlyphiconThumbnails, GlyphiconVideo} from '../icons';
import ToolbarButton from '../toolbar/toolbar-button';
import SrcObject from './src-object';

function videoOnly(input: MediaStream | null) {
    if (!input) {
        return null;
    }
    const tracks = input.getVideoTracks();
    // Edge crashes when MediaStream assigned to Video doesn't have any tracks
    if (tracks.length === 0) {
        return null;
    }
    return new MediaStream(tracks);
}


@Component({
    directives: {
        SrcObject
    },
    components: {
        GlyphiconCall,
        GlyphiconVideo,
        GlyphiconHourglass,
        GlyphiconMic,
        GlyphiconMicoff,
        GlyphiconThumbnails,
        GlyphiconFullscreen,
        ToolbarButton
    }
})
export default class CallUsPhone extends Vue {
    @Prop()
    singleButtonPhone!: boolean;

    @Prop()
    allowVideo!: boolean;

    @Prop()
    callTitle!: string;

    @Inject()
    myPhoneService!: MyPhoneService;

    @Inject()
    eventBus!: EventBus;

    hasCall: boolean = false;
    hasTryingCall: boolean = false;
    readonly webrtcService: WebRTCControlService;
    readonly phoneService: PhoneService;
    media: MediaDescription = dummyMediaDescription;

    videoOnlyLocalStream: MediaStream | null = null;
    remoteStream: MediaStream | null = null;
    videoOnlyRemoteStream: MediaStream | null = null;
    audioNotificationUrl = null;

    constructor() {
        super();
        this.webrtcService = new WebRTCControlService(this.myPhoneService);
        this.phoneService = new PhoneService(this.webrtcService);
    }

    beforeMount() {
        const remoteStream = this.phoneService.myCalls$.pipe(
            map(data => data.length > 0 ? data[0].media : dummyMediaDescription),
            switchMap(media => media.remoteStream$)
        );
        this.$subscribeTo(this.phoneService.soundToPlay$, value => {
            this.audioNotificationUrl = value;
        });
        this.$subscribeTo(remoteStream, remoteStream => {
            this.remoteStream = remoteStream;
            this.videoOnlyRemoteStream = videoOnly(remoteStream);
        });

        this.$subscribeTo(this.phoneService.myCalls$, (data) => {
            this.hasCall = data.length > 0;
            this.hasTryingCall = this.hasCall && data[0].isTryingCall;
            const newMedia = data.length ? data[0].media : dummyMediaDescription;
            const mediaChanged = newMedia !== this.media;
            this.media = newMedia;

            if (this.media) {
                this.videoOnlyLocalStream = videoOnly(this.media.localStream);
            } else {
                this.videoOnlyLocalStream = null;
            }
        });
    }

    videoOutputClick() {
        const videoOutput = this.$refs.videoOutput as HTMLElement;
        videoOutput.requestFullscreen().then(() => {
            //
        }, () => {
            //
        });
    }

    toggleMute(){
        this.webrtcService.mute(this.media);
    }

    onMakeVideoCall() {
        this.makeCall(true);
    }

    onMakeCall() {
        this.makeCall(false);
    }

    makeCall(video?: boolean) {
        this.phoneService.call$('', video || false).subscribe(() => {
                //
            }, (error) =>
                this.eventBus.onError.next(error)
        );
    }

    dropCall() {
        if (!this.media) {
            return;
        }
        this.webrtcService.dropCall(this.media.lastWebRTCState.Id).subscribe(() => {
                //
            }, (error) =>
                this.eventBus.onError.next(error)
        );
    }

}
