class ADTF_Field{
    constructor( options ) {
        this.options = options;
        this.init();
    }

    init() {
        this.initFlatPickr();
    }

    initFlatPickr() {
        let inputId = this.options.inputId;
        let options = {
            allowInput: true,
        };

        if ( this.options.type == 'time' ) {
            options.enableTime = true;
            options.noCalendar = true;
            options.time_24hr = true;
        }

        if( this.options.type == 'date' ) {
            options.enableTime = false;
            options.dateFormat = this.dateFormat( this.options.format );
        }

        if( this.options.type == 'both' ) {
            options.enableTime = true;
            options.dateFormat = this.dateFormat( this.options.format );
        }

        flatpickr(inputId, options);
    }

    dateFormat( format ) {
        let date_format;
        switch ( format ) {
            case 'mdy':
                date_format = 'm/d/Y';
                break;
        
            case 'dmy':
                date_format = 'd/m/Y';
                break;
        
            case 'ymd':
                date_format = 'Y/m/d';
                break;
        
            default:
                date_format = 'm/d/Y at H:i';
                break;
        }
        return date_format;
    }
}