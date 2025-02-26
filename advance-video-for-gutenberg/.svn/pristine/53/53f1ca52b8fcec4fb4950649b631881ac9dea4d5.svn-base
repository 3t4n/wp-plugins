import * as React from "react";
import ResizableBox from "re-resizable"
import {debug} from "util";

export class VideoControl extends React.Component<VideoControlProperties,any>{
    render(){
        if(this.props.attributes.src!=null)
        {
            let styles:any={width:'100%',height:'100%'};
            if(this.props.attributes.align!='')
                styles.textAlign=this.props.attributes.align;
            return (
                <figure className="rnAdvanceVideo" style={styles} >
                    {this.GetVideoControl()}
                </figure>
            );
        }

    }

    GetVideoControl(){
        let style:any={width:'100%',height:'100%'};
        if(this.props.attributes.width>=0)
            style.width=this.props.attributes.width;
       
        style.display='inline-block';
        let video=<div  style={style}><video  src={this.props.attributes.src} controls={this.props.attributes.showControls} loop={this.props.attributes.loop} autoPlay={this.props.attributes.autoPlay}/></div>;
        if(this.props.IsDesign)
        {
            return (
                <ResizableBox
                className={"rnVideoResizer" + (this.props.isSelected ? ' is-focused' : '')}
                maxWidth="100%"
                size={style}
                style={{display:'inline-block'}}
                lockAspectRatio={true}
                onResizeStart={() => {
                    this.props.setAttributes({
                        width: -1,
                        height: -1
                    });
                    this.props.toggleSelection(false);
                }}
                onResizeStop={(event, direction, elt: any, delta) => {
                    this.props.setAttributes({
                        width: parseInt(elt.offsetWidth),
                        height: parseInt(elt.offsetHeight),
                    });
                    this.props.toggleSelection(true);
                }}
                enable={{
                    top: false,
                    right: true,
                    bottom: false,
                    left: false,
                    topRight: true,
                    bottomRight: true,
                    bottomLeft: true,
                    topLeft: true
                }}
                handleClasses={{
                    topRight: 'rnAdvanceVideo__resize-handler-top-right',
                    bottomRight: 'rnAdvanceVideo__resize-handler-bottom-right',
                    topLeft: 'rnAdvanceVideo__resize-handler-top-left',
                    bottomLeft: 'rnAdvanceVideo__resize-handler-bottom-left',
                }}
            >
                {video}
            </ResizableBox>)
        }
        return (
            video
        );
    }
}

interface VideoControlProperties extends WordpressBlockProperties<AdvanceVideoDesignProperties>{
    IsDesign:boolean;
}