import Device from "./device";
import unique from 'unique-selector';
import DomOutline from "./outline";

class App extends wp.element.Component {

    constructor(props) {
        super(props);

        this.state = {
            active: false,
            selected: false,
            selector: '',
            exist: false,
            selectors: hideAnything.selectors
        }
    }

    //Initialize the DomOutline
    myDomOutline = DomOutline({
        onClick: this.handleClick.bind(this),
    });

    //Handle element click
    handleClick(e) {
        const $ = jQuery;

        //exclude hide-anything element
        if (e.target.className && e.target.className.indexOf('hide-anything') !== -1) {
            this.setState({selected: false});

            return;
        } else {
            this.setState({
                selected: true,
                exist: false,
            });
        }

        e.preventDefault();
        e.stopImmediatePropagation();
        e.stopPropagation();

        const opts = hideAnything.is_admin ? {selectorTypes: ['ID', 'Class']} : {};

        const selector = unique(e.target, opts);

        this.setState({selector});

        //Add settings icon
        if (!$(`[data-selector="${selector}"]`).length) {
            this.addSettings({selector});
        }

        this.myDomOutline.stop();
    }

    //Add hide icon
    addSettings(item, isCancel = false) {
        const $ = jQuery;

        const {selector} = item;

        if (!$(selector).length) return;

        const scroll_top = $(window).scrollTop();

        const pos = $(selector)[0].getBoundingClientRect();
        const top = (pos.top + scroll_top) - 25;
        const left = pos.left;
        const width = pos.width;
        const height = pos.height;

        const label = $(`<div class="hide-anything-canvas ${isCancel ? 'cancel' : ''}" data-selector="${selector}"><i class="hide-anything-ignore ab-icon dashicons dashicons-admin-generic"></i> <span class="hide-anything-canvas-border"></span> </div>`).appendTo('body');

        label.css({top, left});
        $('.hide-anything-canvas-border', label).css({width, height});

    }

    //Stop on escape
    stopOnEscape(e) {
        if (e.keyCode === 27 || e.keyCode === 8 || e.keyCode === 46) {
            this.setState({active: false})
        }
    }

    componentDidMount() {
        const $ = jQuery;

        //Remove hidden selector from DB
        $(document).on('click', '.hide-anything-canvas', (e) => {
            e.preventDefault();
            e.stopPropagation();

            const element = $(e.currentTarget);

            const selector = element.data('selector');

            this.setState({
                selector,
                selected: true,
                exist: true,
            });

        });

        //stopOnEscape
        $('body').on('keyup', (e) => this.stopOnEscape(e));

    }

    //Component Update
    componentDidUpdate() {


        const $ = jQuery;
        const {active, selected, selector, selectors} = this.state;

        if (active) {
            $('body').addClass('hide-anything-active');
            this.myDomOutline.start();

            $('#hide_anything_css').html('');
        } else {
            $('body').removeClass('hide-anything-active');
            this.myDomOutline.stop();
            $('.hide-anything-canvas').remove();

            $('#hide_anything_css').html(this.renderCSS());
        }

        if (selected) {
            this.myDomOutline.stop();
        }

        if (active && !selected) {

            Object.keys(selectors).map((key) => {
                const item = selectors[key];
                this.addSettings(item);
            });
        }

        if (selected && selector) {
            if (!$(`[data-selector="${selector}"]`).length) {
                setTimeout(() => this.addSettings({selector}), 10);
            }
        }

    }

    //Handle HideAnything Toggle
    handleActive(e) {

        e.stopPropagation();
        const $ = jQuery;
        const {active, selector} = this.state;

        if (selector) {
            $(selector).removeClass('hide-anything-hidden');
        }

        this.setState({
            selector: '',
            selected: false,
            active: !active,
        });

    };

    //Handle Save
    handleSave(e) {
        e.stopPropagation();
        const $ = jQuery;

        let {selector, selectors} = this.state;

        this.handleActive(e, true);

        const current_page = hideAnything.current_page;
        const is_admin = typeof hideAnything.is_admin !== 'undefined';

        const is_visible = $('.hide-anything-make-visible').hasClass('active');

        const is_desktop = $('.hide-anything-desktop').hasClass('active');
        const is_tablet = $('.hide-anything-tablet').hasClass('active');
        const is_mobile = $('.hide-anything-mobile').hasClass('active');


        if (is_visible) {
            delete selectors[selector];
        } else {
            selectors[selector] = {
                selector,
                is_desktop,
                is_tablet,
                is_mobile
            }
        }

        this.setState({
            selectors,
            selector: ''
        });

        wp.ajax.post('hide_anything', {
            current_page,
            selector,
            is_visible,
            is_desktop,
            is_tablet,
            is_mobile,
            is_admin
        });

    }

    renderCSS() {

        const {selectors} = this.state;
        const selectorKeys = Object.keys(selectors);

        if (!selectorKeys.length) return;

        const common_selectors = [];
        const desktop_selectors = [];
        const tablet_selectors = [];
        const mobile_selectors = [];

        selectorKeys.map(key => {

            const {selector, is_desktop, is_tablet, is_mobile} = selectors[key];

            if ('' === key || '' === selector) {
                return;
            }


            if (is_desktop && is_tablet && is_mobile) {
                common_selectors.push(selector);
            } else {
                if (is_desktop) {
                    desktop_selectors.push(selector);
                }
                if (is_tablet) {
                    tablet_selectors.push(selector);
                }
                if (is_mobile) {
                    mobile_selectors.push(selector);
                }
            }

        });

        let css = '';

        if (common_selectors.length) {
            css += `${common_selectors.join(',')}{display: none !important;}`;
        }

        if (desktop_selectors.length) {
            css += `@media (min-width: 992px){${desktop_selectors.join(',')}{display: none !important;}}`;
        }

        if (tablet_selectors.length) {
            css += `@media (min-width: 768px) and (max-width: 991px){${desktop_selectors.join(',')}{display: none !important;}}`;
        }

        if (mobile_selectors.length) {
            css += `@media (max-width: 767px){${mobile_selectors.join(',')}{display: none !important;}}`;
        }

        return css;
    }

    render() {
        const {active, selected, exist, selector, selectors} = this.state;

        return (
            <>
                <div className="hide-anything-ignore hide-anything-wrap">

                    <div className='hide-anything-ignore hide-anything-toggle'
                         onClick={(e) => this.handleActive(e)}>
                        <i className={`ab-icon dashicons dashicons-${active ? 'pressthis' : 'hidden'}`}></i>
                        <span className="hide-anything-text">{active ? 'Select Anything' : 'Hide Anything'}</span>

                        <div className='hide-anything-ignore hide-anything-action'>
                            {active &&
                            <span
                                className='ab-icon hide-anything-ignore hide-anything-cancel  dashicons dashicons-no'
                                title='Cancel'></span>}
                            {active && selected &&
                            <span className='ab-icon hide-anything-ignore  dashicons dashicons-saved' title='Save'
                                  onClick={(e) => this.handleSave(e)}></span>}
                        </div>
                    </div>


                    {active && selected && <Device exist={exist} item={selectors[selector]}/>}

                </div>

            </>
        )
    }
}


const backendElement = document.getElementById('wp-admin-bar-hide-anything');
!!backendElement && wp.element.render(<App/>, backendElement);


const frontendElement = document.getElementById('hide_anything_tools');
!!frontendElement && wp.element.render(<App/>, frontendElement);


