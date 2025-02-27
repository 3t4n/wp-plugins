class Device extends wp.element.Component {

    constructor(props) {
        super(props);

        this.state = {
            visible: false
        }

    }

    handleClick(e) {
        e.stopPropagation();
        const $ = jQuery;


            const element = $(e.currentTarget);
            element.toggleClass('active');

            const isVisible = element.hasClass('hide-anything-make-visible active');

            this.setState({visible: isVisible});
    }

    render() {
        const {exist, item} = this.props;

        const {visible} = this.state;
        const devices = [
            {
                label: 'Desktop',
                icon: 'desktop',
                key: 'desktop'
            },
            {
                label: 'Tablet',
                icon: 'tablet',
                key: 'tablet',
            },
            {
                label: 'Mobile',
                icon: 'smartphone',
                key: 'mobile',
            },
        ];

        return (
            <div className="hide-anything-ignore hide-anything-panel">
                <div className="hide-anything-ignore hide-anything-devices">

                    {exist &&
                    <div onClick={(e) => this.handleClick(e)} className="hide-anything-ignore hide-anything-device hide-anything-make-visible">
                        <span className="hide-anything-ignore  checkmark"></span>
                        <i className="hide-anything-ignore ab-icon dashicons dashicons-visibility"></i>
                        <span className='hide-anything-ignore'>Make Visible</span>
                    </div>
                    }

                    {!visible &&
                    devices.map((device) => {

                        let isActive = true;
                        if (exist && item) {

                            const {is_desktop, is_tablet, is_mobile} = item;

                            if ('desktop' === device.key) {
                                isActive = is_desktop;
                            } else if ('tablet' === device.key) {
                                isActive = is_tablet;
                            } else if ('mobile' === device.key) {
                                isActive = is_mobile;
                            }
                        }

                        return (
                            <div key={device.key} onClick={(e) => this.handleClick(e)} className={`hide-anything-ignore hide-anything-device ${isActive ? 'active' : ''} hide-anything-${device.key}`}>
                                <span className="hide-anything-ignore  checkmark"></span>
                                <i className={`hide-anything-ignore ab-icon dashicons dashicons-${device.icon}`}></i>
                                <span className='hide-anything-ignore'>Hide on {device.label}</span>
                            </div>
                        );
                    })
                    }

                </div>
            </div>
        )
    }
}

export default Device;