import * as React from "react";

let MediaUpload: any = wp.blocks.MediaUpload;
let Button = wp.components.Button;
let FormFileUpload=wp.components.FormFileUpload;
let Placeholder=wp.components.Placeholder;
let mediaUpload=wp.utils.mediaUpload;

export class VideoUploader extends React.Component<VideoUploaderProps,any> {
    constructor(props:any) {
        super(props);
        this.SelectVideo=this.SelectVideo.bind(this);
        this.UploadedFromFile=this.UploadedFromFile.bind(this);
        this.state={

        }

    }

    render() {

        return(
            <Placeholder
            key="placeholder"
            icon="media-video"
            label={  'Video'  }
            instructions={'Select a video file from your library, or upload a new one'  }
            >
                <FormFileUpload
                    isLarge
                    className="wp-block-video__upload-button"
                    onChange={ this.UploadedFromFile }
                    accept="video/*"
                >
                    {  'Upload'  }
                </FormFileUpload>,
                <MediaUpload onSelect={this.SelectVideo} type="video" id={'rnVideo'} render={({open}) => (
                    <Button isLarge onClick={open}>
                        {'Add from Media Library'}
                    </Button>
                )}/>
            </Placeholder>
        )


    }

    SelectVideo(media:any) {

        this.props.setAttributes({ src: media.url, id: media.id });
        this.props.VideoSelected({src:media.url,id:media.id});


    }

    UploadedFromFile(e:any){
        mediaUpload(e.target.files,([args])=>this.SelectVideo(args),'video');
    }


}

declare let wp: any;

interface VideoUploaderProps{
    VideoSelected:(media:MediaData)=>void;
    setAttributes(object:any);
}

