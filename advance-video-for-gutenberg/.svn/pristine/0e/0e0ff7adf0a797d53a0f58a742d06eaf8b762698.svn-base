import * as React from "react";
import {VideoUploader} from "./VideoUploader";
import {VideoControl} from "./VideoControl";

let Placeholder=wp.components.Placeholder;
let InspectorControls=wp.blocks.InspectorControls;
let CheckboxControl=wp.components.CheckboxControl;
let BlockControls=wp.blocks.BlockControls;
let BlockAlignment=wp.blocks.BlockAlignmentToolbar;
let Toolbar=wp.components.Toolbar;
export class AdvanceVideoDesign extends React.Component<WordpressBlockProperties<AdvanceVideoDesignProperties>,AdvanceVideoDesignState>{
    constructor(props:any){
        super(props);

        this.ResetSize=this.ResetSize.bind(this);
        this.VideoSelected=this.VideoSelected.bind(this);
        this.state={
            src:this.props.attributes.src,
            id:this.props.attributes.id,
            fileUrl:this.props.attributes.fileUrl
        }
    }


    async componentDidMount() {
        if (this.props.attributes.id==null&&this.props.attributes.fileUrl!=null && this.props.attributes.fileUrl.indexOf( 'blob:' ) === 0 ) {
            let file:any=await fetch(this.props.attributes.fileUrl);
            let blob=await file.blob();
           // file=new File([blob],this.props.attributes.fileName);
            //file.type=blob.type;
            let media=await wp.utils.mediaUpload([blob],([video])=>{
                if(video.id==null)
                    return;
                this.props.setAttributes({
                    src:  video.url,
                    id:video.id
                });
            },'video');

        }

    }

    render(){

        let element=null;

        if(this.props.attributes.id==null&&this.props.attributes.fileUrl!=null)
        {
            return (
                <figure>
                     <Placeholder
                        key="placeholder"
                        icon="media-video"
                        label={  'Uploading video, please wait...'  }
                        >
                        <i className="spinner is-active" aria-hidden="true"></i>
                    </Placeholder>
                </figure>
            );
        }
        if(this.props.attributes.src==null)
            element= (

                        <VideoUploader VideoSelected={this.VideoSelected} setAttributes={this.props.setAttributes}  />


            );
        else {
            let style:any={width:'100%',height:'100%'};
            if(this.props.attributes.width>=0)
                style.width=this.props.attributes.width;
            if(this.props.attributes.height>=0)
                style.height=this.props.attributes.height;
            element = (
                    <VideoControl IsDesign={true} {...this.props}></VideoControl>
            );
        }

        return [

            this.props.isSelected&&
                <InspectorControls>
                    <CheckboxControl label="Show Controls"  checked={this.props.attributes.showControls} onChange={(e)=>{this.props.setAttributes({showControls:e})}}></CheckboxControl>
                    <CheckboxControl label="AutoPlay"  checked={this.props.attributes.autoPlay} onChange={(e)=>{this.props.setAttributes({autoPlay:e})}}></CheckboxControl>
                    <CheckboxControl label="Loop"  checked={this.props.attributes.loop} onChange={(e)=>{this.props.setAttributes({loop:e})}}></CheckboxControl>
                </InspectorControls>,
            this.GetBlockControls(),
            element
        ]
    }

    private VideoSelected(media:MediaData) {
        this.setState({
            src:this.props.attributes.src,
            id:this.props.attributes.id

        })
    }

    private GetBlockControls() {
        if(this.props.attributes.width>=0||this.props.attributes.height>=0)
        {
            return (
              <BlockControls>
                  <BlockAlignment value={this.props.attributes.align} onChange={(e)=>{this.props.setAttributes({align:e})}}>

                  </BlockAlignment>
                  <Toolbar>
                      <button className="resizeButton components-button components-icon-button components-toolbar__control" style={{padding:0,margin:0}} onClick={this.ResetSize}>
                        <i title="Reset Size" className="fa fa-arrows-alt" aria-hidden="true" style={{cursor:'pointer'}}></i>
                      </button>
                  </Toolbar>

              </BlockControls>
            );
        }
        return null;
    }

    private ResetSize(){
        this.props.setAttributes({
           width:-1,
           height:-1,
            align:''
        });
    }

}




export interface AdvanceVideoDesignState{

}