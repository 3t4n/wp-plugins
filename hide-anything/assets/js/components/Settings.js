import Switcher from "./Switcher";
import Preloader from "./Preloader";

class Settings extends wp.element.Component {
    constructor(props) {
        super(props);

        this.state = {
            updating: false,
            enableBackend: hideAnything.settings.enableBackend,
            enableFrontend: hideAnything.settings.enableFrontend,
        }

        this.handleChange = this.handleChange.bind(this)
        this.updateSettings = this.updateSettings.bind(this)
    }


    componentDidUpdate() {

        const {enableBackend} = this.state;

        const element = document.getElementById('wp-admin-bar-hide-anything');
        if (element) {
            'on' === enableBackend ? element.classList.remove('hidden') : element.classList.add('hidden');
        }

    }

    /**
     * update data
     *
     */
    updateSettings() {

        this.setState({updating: true})

        wp.apiFetch({
            method: 'POST',
            path: `hide-anything/v1/settings/`,
            headers: {
                'Content-Type': 'application/json',
                'X-WP-Nonce': hideAnything.nonce
            },

            data: {...this.state}

        }).then((res) => {
            this.setState({updating: false})
        });
    }

    handleChange(obj) {
        this.setState(obj);
    }

    render() {

        const {updating, enableBackend, enableFrontend} = this.state;
        const {updateSettings, handleChange} = this;


        return (

            <>
                <table className="form-table">

                    <tr>
                        <th><label htmlFor="enableFrontend">Enable Frontend Hiding</label></th>
                        <td>

                            <div className={`input-group`}>
                                <Switcher value={enableFrontend} name="enableFrontend"
                                          handleChange={handleChange}/>

                                <p className="description">
                                    Enable the hiding option for the site frontend.
                                    <br/>
                                    <br/>
                                    If ON, a new fixed widget (Hide Anything) will be appeared at the top-right side
                                    of the site.
                                    <br/>
                                    <br/>
                                    <img src={`${hideAnything.pluginURL}/assets/images/frontend-hide.png`} alt="Frontend Hide"/>
                                </p>
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <th><label htmlFor="enableBackend">Enable Backend Hiding</label></th>
                        <td>

                            <div className={`input-group`}>
                                <Switcher value={enableBackend} name="enableBackend"
                                          handleChange={handleChange}/>

                                <p className="description">
                                    Enable the hiding option for the backend admin dashboard.
                                    <br/>
                                    <br/>
                                    If ON, a new menu item (Hide Anything) will be appeared at the top-right side of
                                    the admin menu bar.
                                    <br/>
                                    <br/>
                                    <img src={`${hideAnything.pluginURL}/assets/images/admin-bar-menu.png`} alt="Admin Bar Menu"/>
                                </p>
                            </div>

                        </td>
                    </tr>


                </table>

                <button onClick={updateSettings} type="button"
                        className="button save-settings">{updating ? 'Saving...' : 'Save Changes'}</button>
            </>
        )

    }
}

const settingsApp = document.getElementById("hide_anything_settings_app");

if (settingsApp) {
    wp.element.render(
        <Settings/>,
        settingsApp
    );
}