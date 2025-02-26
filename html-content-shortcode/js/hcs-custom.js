import {
    ClassicEditor,
    Essentials,
    List,
    Bold,
    Italic,
    Font,
    Paragraph,
    Image,
    ImageToolbar,
    ImageUpload,
    Base64UploadAdapter,
    ImageResizeEditing,
    ImageResizeHandles,
    Table,
    TableToolbar,
    TableProperties,
    TableCellProperties,
    SourceEditing,
} from '../vendor/ckeditor5/ckeditor5/ckeditor5.js';

const HCS46238_COLORS = [
    {
        color: '#000000',
        label: 'Black'
    },
    {
        color: '#4d4d4d',
        label: 'Dim grey'
    },
    {
        color: '#999999',
        label: 'Grey'
    },
    {
        color: '#e6e6e6',
        label: 'Light grey'
    },
    {
        color: '#ffffff',
        label: 'White',
        hasBorder: true
    },
    {
        color: '#e64c4c',
        label: 'Red'
    },
    {
        color: '#e6994c',
        label: 'Orange'
    },
    {
        color: '#e6e64c',
        label: 'Yellow'
    },
    {
        color: '#99e64c',
        label: 'Light green'
    },
    {
        color: '#4ce64c',
        label: 'Green'
    },
    {
        color: '#4ce699',
        label: 'Aquamarine'
    },
    {
        color: '#4ce6e6',
        label: 'Turquoise'
    },
    {
        color: '#4c99e6',
        label: 'Light blue'
    },
    {
        color: '#4c4ce6',
        label: 'Blue'
    },
    {
        color: '#994ce6',
        label: 'Purple'
    }
];

ClassicEditor
    .create(document.querySelector('#hcs46238_editor'), {
        plugins: [
            Essentials,
            Bold,
            List,
            Italic,
            Font,
            Paragraph,
            Image,
            ImageToolbar,
            ImageUpload,
            Base64UploadAdapter,
            ImageResizeEditing,
            ImageResizeHandles,
            Table,
            TableToolbar,
            TableProperties,
            TableCellProperties,
            SourceEditing,
        ],
        toolbar: [
            'undo', 'redo', 
            '|', 'sourceEditing',
            '|', 'bold', 'italic', 
            '|','fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor',
            '|', 'bulletedList', 'numberedList',
            '|', 'uploadImage', 'insertTable',
            
        ],
        fontSize: {
            options: [
                9,
                11,
                13,
                'default',
                17,
                19,
                24,
                28,
                32,
                36,
                40
            ]
        },
        fontColor: {
            colors: HCS46238_COLORS,
        },
        fontBackgroundColor: {
            colors: HCS46238_COLORS,
        },
        image: {
            toolbar: ['imageTextAlternative'],
        },
        table: {
            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'TableProperties', 'TableCellProperties'],
            tableProperties: {
                borderColors: HCS46238_COLORS,
                backgroundColors: HCS46238_COLORS,
            },
            tableCellProperties: {
                borderColors: HCS46238_COLORS,
                backgroundColors: HCS46238_COLORS

            },
        },
    })
    .catch(error => {
        // console.error(error);
    });

jQuery(document).ready(function(){
    jQuery('#hcs46238_setting_form').on('submit',function(e){
        e.preventDefault();
        var _this = jQuery(this);
        var formData = new FormData(this);
        formData.append('action', 'hcs46238_option');

       jQuery.ajax({
            url: hcs46238_admin_ajax_link,
            data: formData,
            processData: false,
            contentType: false,
            type: 'post',
            success: function (data){
                var message = 'Somethins went worng.....';
                var className = 'errorPopup';
                if(data.success){
                    message = 'Data Updated Successfully.....';
                    className = 'successPopup';
                }
                hcs46238_showMessage(_this,className,message);
            },
            error: function(){
                hcs46238_showMessage(_this,'errorPopup','Somethins went worng.....');
            }
        })
    })
})

function hcs46238_showMessage(_this,className,message){
    _this.find('#submit').after('<p class="'+className+'">'+message+'</p>');
    setTimeout(function(){
        jQuery(document).find('.'+className).fadeOut('slow');
    },1000);
}