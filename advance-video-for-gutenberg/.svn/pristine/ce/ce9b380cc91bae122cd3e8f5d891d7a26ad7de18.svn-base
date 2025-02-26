"use strict";
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
Object.defineProperty(exports, "__esModule", { value: true });
var React = require("react");
var re_resizable_1 = require("re-resizable");
var VideoControl = /** @class */ (function (_super) {
    __extends(VideoControl, _super);
    function VideoControl() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    VideoControl.prototype.render = function () {
        if (this.props.attributes.src != null) {
            var styles = { width: '100%', height: '100%' };
            if (this.props.attributes.align != '')
                styles.textAlign = this.props.attributes.align;
            return (React.createElement("figure", { className: "rnAdvanceVideo", style: styles }, this.GetVideoControl()));
        }
    };
    VideoControl.prototype.GetVideoControl = function () {
        var _this = this;
        var style = { width: '100%', height: '100%' };
        if (this.props.attributes.width >= 0)
            style.width = this.props.attributes.width;
        style.display = 'inline-block';
        var video = React.createElement("div", { style: style },
            React.createElement("video", { src: this.props.attributes.src, controls: this.props.attributes.showControls, loop: this.props.attributes.loop, autoPlay: this.props.attributes.autoPlay }));
        if (this.props.IsDesign) {
            return (React.createElement(re_resizable_1.default, { className: "rnVideoResizer" + (this.props.isSelected ? ' is-focused' : ''), maxWidth: "100%", size: style, style: { display: 'inline-block' }, lockAspectRatio: true, onResizeStart: function () {
                    _this.props.setAttributes({
                        width: -1,
                        height: -1
                    });
                    _this.props.toggleSelection(false);
                }, onResizeStop: function (event, direction, elt, delta) {
                    _this.props.setAttributes({
                        width: parseInt(elt.offsetWidth),
                        height: parseInt(elt.offsetHeight),
                    });
                    _this.props.toggleSelection(true);
                }, enable: {
                    top: false,
                    right: true,
                    bottom: false,
                    left: false,
                    topRight: true,
                    bottomRight: true,
                    bottomLeft: true,
                    topLeft: true
                }, handleClasses: {
                    topRight: 'rnAdvanceVideo__resize-handler-top-right',
                    bottomRight: 'rnAdvanceVideo__resize-handler-bottom-right',
                    topLeft: 'rnAdvanceVideo__resize-handler-top-left',
                    bottomLeft: 'rnAdvanceVideo__resize-handler-bottom-left',
                } }, video));
        }
        return (video);
    };
    return VideoControl;
}(React.Component));
exports.VideoControl = VideoControl;
//# sourceMappingURL=VideoControl.js.map