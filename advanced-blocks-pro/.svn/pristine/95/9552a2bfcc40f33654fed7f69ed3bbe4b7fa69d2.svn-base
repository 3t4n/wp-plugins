// import { TEXT_DOMAIN } from "../../../global/constants";
// import { labels as IconPacks } from "../../extensions/icon-inserter/data.json";
import font_awesome from "../../helper/font_awesome";
import "./style.scss"

// import { labels as IconPacks } from "../../gb-helper/font_awesome"

const { Component } = wp.element;
const { __ } = wp.i18n;
const { Popover, Button, PanelBody, Icon } = wp.components;
const { map, invoke, get, isEmpty, isEqual } = lodash;

class IconPicker extends Component {
  constructor() {
    super();
    this.state = {
      isVisible: false,
      selectedClassName: "",
    };

    this.handleSelect = this.handleSelect.bind(this);
    this.toggleVisibility = this.toggleVisibility.bind(this);
  }

  componentDidMount() {
    const value = get(this.props, "value");

    if (!isEmpty(value)) {
      this.setState({ selectedClassName: value });
    }
  }

  handleSelect(IconClassName) {
    const { props } = this;

    this.setState({ selectedClassName: IconClassName }, () => {
      // invoking change listener safely
      invoke(props, "onChange", IconClassName);
      this.toggleVisibility(false);
    });
  }

  toggleVisibility(state = undefined) {
    this.setState({
      isVisible: typeof state === "undefined" ? !this.state.isVisible : state,
    });
  }

  render() {
    const { isVisible, selectedClassName } = this.state;
    const { label = "Select Icon", allowReset = true } = this.props;

    return (
      <div className="em-icon-picker">
        <div className="em-flex">
      <div> {__(label, 'advanced-blocks-pro')}</div>
         
    
          <div>
            {!isEmpty(selectedClassName) && allowReset && (
              <Button
                isSmall
                showTooltip={true}
                label={__("Reset Icon", 'advanced-blocks-pro')}
                style={{ marginLeft: 5  }}
                onClick={() => this.handleSelect("")}
                key={selectedClassName}
              >
                <Icon icon="redo" />
              </Button>
            )}
            <Button isDefault onClick={this.toggleVisibility}>
              {!isEmpty(selectedClassName) ? (
                <span className={selectedClassName}></span>
              ) : (
                <Icon icon="list-view" />
              )}
              {isVisible && (
                <Popover
                  expandOnMobile={true}
                  headerTitle={__("Icons", 'advanced-blocks-pro')}
                  position="top"
                  className="em-icon-picker-popover"
                  onFocusOutside={() => this.setState({ isVisible: false })}
                >
                  <div
                    className="em-icon-picker-root"
                    onClick={(e) => e.stopPropagation()}
                  >
                 
                     
                        <div>
                          {
                            <div className="em-icon-picker-grid" >
                              {map(font_awesome, (icon) => {
                                const className = "".concat(icon);
                                const isActive = isEqual(
                                  className,
                                  this.state.selectedClassName
                                );

                                return (
                                  <div
                                    className={`em-icon ${
                                      isActive ? "em-active" : ""
                                    }`}
                                    onClick={() => this.handleSelect(className)}
                                  >
                                    <span className={className}></span>
                                  </div>
                                );
                              })}
                            </div>
                          }
                        </div>
                  
                  </div>
                </Popover>
              )}
            </Button>
          </div>
        </div>
      </div>
    );
  }
}

export default IconPicker;
