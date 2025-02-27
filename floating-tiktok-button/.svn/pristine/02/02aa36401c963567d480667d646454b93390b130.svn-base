// console.log(options);
if (typeof options !== 'undefined') {
    new Vue({
        el: '#ftb_app',
        data: {
            data: [],
            icon_url: options.icon_url ? options.icon_url : "",
            icon_styles: options.icon_styles,
            icon_custom_preview: options.icon_custom_preview ? options.icon_custom_preview : "",
            button_text: options.button_text ? options.button_text : "",
            font_size: options.font_size ? options.font_size : 10,
            border_size: options.border_size ? options.border_size : 0,
            border_radius: options.border_radius ? options.border_radius : 5,
            button_padding: options.button_padding ? options.button_padding : 5,
            img_width: options.img_width ? options.img_width : 85,
            img_height: options.img_height ? options.img_height : 85,
            img_radius: options.img_radius ? options.img_radius : 50,
            button_position: options.button_position ? options.button_position : "bottom_left",
            margin_top: options.margin_top ? options.margin_top : 0,
            margin_right: options.margin_right ? options.margin_right : 10,
            margin_bottom: options.margin_bottom ? options.margin_bottom : 10,
            margin_left: options.margin_left ? options.margin_left : 0,
            qrcode: '',
            pro: ''
        },
        mounted() {
            this.data = options;

            new JSColor("#border_color", { 
                format: 'hexa',
                value: options.border_color ? options.border_color : '#ccc'
            })
            
            new JSColor("#bg_color", {
                format: 'hexa',
                value: options.bg_color ? options.bg_color : '#fff'
            })
            
            new JSColor("#font_color", { 
                format: 'hexa',
                value: options.font_color ? options.font_color : '#555'
            })

            var qrcode = new QRCode(document.getElementById("qrcode"), {
                width : this.data.img_width ? this.data.img_width : 85,
                height : this.data.img_height ? this.data.img_height : 85
            });

            const makeCode = () => {		
                var elText = "https://tiktok.com/@"+this.data.tiktok_id;
                
                if (!elText) {
                    console.log("Input a tiktok id");
                    elText.focus();
                    return;
                }
                
                qrcode.makeCode(elText);
            }

            makeCode();

            jQuery("#tiktok_id").
            on("blur", function () {
                makeCode();
            }).
            on("keydown", function (e) {
                if (e.keyCode == 13) {
                    makeCode();
                }
            });

            var self = this;

            jQuery('#img_width').
            on("change", function() {
                jQuery('#qrcode canvas, #qrcode img').attr('width', this.value);
            })

            jQuery('#img_height').
            on("change", function() {
                jQuery('#qrcode canvas, #qrcode img').attr('height', this.value);
            })

            //this.QRCode().makeCode(this.data.tiktok_id)
        },
        methods: {
            getPro(message) {
                this.pro = message;
                setTimeout(() => { 
                    this.pro = "";
                }, 5000);
            },
            uploadImage() {

                if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {

                    wp.media.editor.send.attachment = (props, attachment) => {

                        if (attachment.sizes.thumbnail) {
                        
                            this.icon_url = attachment.sizes.thumbnail.url;
                            this.icon_custom_preview = attachment.sizes.thumbnail.url;
                        
                        } else {

                            this.icon_url = attachment.url;
                            this.icon_custom_preview = attachment.url;
                        
                        }
                
                    }
                
                    wp.media.editor.open();
                    return false;
                }
            },
            removeImage() {
                let deleteConfirm = confirm('Do you want to remove this image?');
                
                if (deleteConfirm == true) {
                    this.icon_custom_preview = "";

                    var elem = document.getElementById("ftb-image-preview");
                    elem.parentNode.removeChild(elem);
                }
            },
        }
    });
}

jQuery(document).ready(function () {
    jQuery("#fs_connect button[type=submit]").on("click", function(e) {
        console.log("open verify window")
        window.open('https://better-robots.com/subscribe.php?plugin=tiktok-button','tiktok-button','resizable,height=400,width=700');
    });
});

