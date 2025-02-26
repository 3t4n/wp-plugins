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
var MediaUpload = wp.blocks.MediaUpload;
var Button = wp.components.Button;
var FormFileUpload = wp.components.FormFileUpload;
var Placeholder = wp.components.Placeholder;
var mediaUpload = wp.utils.mediaUpload;
var VideoUploader = /** @class */ (function (_super) {
    __extends(VideoUploader, _super);
    function VideoUploader(props) {
        var _this = _super.call(this, props) || this;
        _this.SelectVideo = _this.SelectVideo.bind(_this);
        _this.UploadedFromFile = _this.UploadedFromFile.bind(_this);
        _this.state = {};
        return _this;
    }
    VideoUploader.prototype.render = function () {
        return (React.createElement(Placeholder, { key: "placeholder", icon: "media-video", label: 'Video', instructions: 'Select a video file from your library, or upload a new one' },
            React.createElement(FormFileUpload, { isLarge: true, className: "wp-block-video__upload-button", onChange: this.UploadedFromFile, accept: "video/*" }, 'Upload'),
            ",",
            React.createElement(MediaUpload, { onSelect: this.SelectVideo, type: "video", id: 'rnVideo', render: function (_a) {
                    var open = _a.open;
                    return (React.createElement(Button, { isLarge: true, onClick: open }, 'Add from Media Library'));
                } })));
    };
    VideoUploader.prototype.SelectVideo = function (media) {
        this.props.setAttributes({ src: media.url, id: media.id });
        this.props.VideoSelected({ src: media.url, id: media.id });
    };
    VideoUploader.prototype.UploadedFromFile = function (e) {
        var _this = this;
        mediaUpload(e.target.files, function (_a) {
            var args = _a[0];
            return _this.SelectVideo(args);
        }, 'video');
    };
    return VideoUploader;
}(React.Component));
exports.VideoUploader = VideoUploader;
//# sourceMappingURL=VideoUploader.js.map