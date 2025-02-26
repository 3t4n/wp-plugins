"use strict";

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

const copyToClipboard = str => {
    const el = document.createElement('textarea');
    el.value = str;
    el.setAttribute('readonly', '');
    el.style.position = 'absolute';
    el.style.left = '-9999px';
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
};

class User extends React.Component {
  // eslint-disable-next-line no-useless-constructor
  constructor(props) {
    super(props);

    _defineProperty(this, "handleCopyLinkCodeClick", event => {
      event.stopPropagation();
      event.preventDefault();
      copyToClipboard(event.target.dataset.href);
      console.log("login link code copied to clipboard");
    });

    _defineProperty(this, "handleDeleteUserRecordClick", event => {
      event.stopPropagation();
      event.preventDefault();
      console.log(this.props.user);

      if (window.confirm("Are you sure you want to remove this user ?")) {
        this.props.removeUser(this.props.user);
      }
    });
  }

  render() {
    return /*#__PURE__*/React.createElement("tr", null, /*#__PURE__*/React.createElement("td", null, this.props.user.id), /*#__PURE__*/React.createElement("td", null, this.props.user.firstName), /*#__PURE__*/React.createElement("td", null, this.props.user.email), /*#__PURE__*/React.createElement("td", null, this.props.user.role), /*#__PURE__*/React.createElement("td", null, this.props.user.expiryDate), /*#__PURE__*/React.createElement("td", null, /*#__PURE__*/React.createElement("button", {
      onClick: this.handleCopyLinkCodeClick,
      "data-href": this.props.user.loginLink
    }, "Copy login Link"), " | ", /*#__PURE__*/React.createElement("button", {
      onClick: this.handleDeleteUserRecordClick
    }, "Delete User Record")), /*#__PURE__*/React.createElement("td", null, this.props.user.status));
  }

}

class UserInputForm extends React.Component {
  constructor(props) {
    super(props);

    _defineProperty(this, "handleFirstNameChange", event => {
      this.setState({
        firstName: event.target.value
      });
    });

    _defineProperty(this, "handleEmailChange", event => {
      this.setState({
        email: event.target.value
      });
    });

    _defineProperty(this, "handleRoleChange", event => {
      this.setState({
        role: event.target.value
      });
    });

    _defineProperty(this, "handleAccountLinkExpiryChange", event => {
      this.setState({
        accountLinkExpiry: event.target.value
      });
    });

    _defineProperty(this, "handleSubmit", async event => {
      event.preventDefault();
      let user = {

        firstName: this.state.firstName,
        email: this.state.email,
        role: this.state.role,
        accountLinkExpiry: this.state.accountLinkExpiry,
        noncekey: nonceKeyNewTempUser.nonce_token,
      };
      fetch(ajaxurl + '?action=ftlpp-ext-expirable-login-link', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(user)
      }).then(response => response.json()).then(result => {
        console.log(result.error);

        if (result.error) {
          alert(result.message);
          console.error(result.message);
        } else {
          alert("Account successfully created.");
          this.handleCancel(null);
          user.id = result.userId;
          user.loginCode = result.loginCode;
          this.props.addNewUser(user); // window.location.reload();
        }

        console.log(result);
      });
      console.log(user);
    });

    _defineProperty(this, "handleCancel", event => {
      document.getElementsByClassName("userDetailsInputForm")[0].style.display = "none";
      this.setState({
        id: 1,
        firstName: "",
        email: "",
        role: "administrator",
        accountLinkExpiry: "14"
      });
    });

    this.state = {
      id: 1,
      firstName: "",
      email: "",
      role: "administrator",
      accountLinkExpiry: "14"
    };
  }

  render() {
    return /*#__PURE__*/React.createElement("div", {
      className: "userDetailsInputForm",
      style: {
        display: 'none'
      }
    }, /*#__PURE__*/React.createElement("form", {
      onSubmit: this.handleSubmit
    }, /*#__PURE__*/React.createElement("div", {
      className: "userField"
    }, /*#__PURE__*/React.createElement("label", null, "First Name", /*#__PURE__*/React.createElement("p", null, /*#__PURE__*/React.createElement("input", {
      type: "text",
      placeholder: "First Name",
      value: this.state.firstName,
      onChange: this.handleFirstNameChange
    })))), /*#__PURE__*/React.createElement("div", {
      className: "userField"
    }, /*#__PURE__*/React.createElement("label", null, "Email*", /*#__PURE__*/React.createElement("p", null, /*#__PURE__*/React.createElement("input", {
      type: "email",
      placeholder: "Email",
      value: this.state.email,
      requried: true,
      onChange: this.handleEmailChange
    })))), /*#__PURE__*/React.createElement("div", {
      className: "userField"
    }, /*#__PURE__*/React.createElement("label", null, "Role", /*#__PURE__*/React.createElement("p", null, /*#__PURE__*/React.createElement("select", {
      value: this.state.role,
      onChange: this.handleRoleChange
    }, /*#__PURE__*/React.createElement("option", {
      value: "wpsl_store_locator_manager"
    }, "Store Locator Manager"), /*#__PURE__*/React.createElement("option", {
      value: "shop_manager"
    }, "Shop manager"), /*#__PURE__*/React.createElement("option", {
      value: "customer"
    }, "Customer"), /*#__PURE__*/React.createElement("option", {
      value: "subscriber"
    }, "Subscriber"), /*#__PURE__*/React.createElement("option", {
      value: "contributor"
    }, "Contributor"), /*#__PURE__*/React.createElement("option", {
      value: "author"
    }, "Author"), /*#__PURE__*/React.createElement("option", {
      value: "editor"
    }, "Editor"), /*#__PURE__*/React.createElement("option", {
      value: "administrator",
      selected: true
    }, "Administrator"))))), /*#__PURE__*/React.createElement("div", {
      className: "userField"
    }, /*#__PURE__*/React.createElement("label", null, "Account&Link Expiry", /*#__PURE__*/React.createElement("p", null, /*#__PURE__*/React.createElement("select", {
      value: this.state.accountLinkExpiry,
      onChange: this.handleAccountLinkExpiryChange
    }, /*#__PURE__*/React.createElement("option", {
      value: "3"
    }, "1 hour"), /*#__PURE__*/React.createElement("option", {
      value: "14"
    }, "14 hours"), /*#__PURE__*/React.createElement("option", {
      value: "24"
    }, "1 day"), /*#__PURE__*/React.createElement("option", {
      value: "96"
    }, "4 days"), /*#__PURE__*/React.createElement("option", {
      value: "168"
    }, "14 days"), /*#__PURE__*/React.createElement("option", {
      value: "720"
    }, "30 days"))))), /*#__PURE__*/React.createElement("div", {
      className: "userField"
    }, /*#__PURE__*/React.createElement("p", {
      class: "submit"
    }, /*#__PURE__*/React.createElement("input", {
      type: "submit",
      name: "submit",
      id: "submit",
      class: "button button-primary",
      value: "Create Account&Link"
    }))), /*#__PURE__*/React.createElement("span", {
      class: "submit"
    }, /*#__PURE__*/React.createElement("input", {
      onClick: this.handleCancel,
      type: "button",
      name: "cancel",
      id: "cancel-button",
      class: "button button-primary",
      value: "Cancel"
    }))));
  }

}

class App extends React.Component {
  constructor(props) {
    super(props);

    _defineProperty(this, "addNewUser", user => {
      /* console.log( this.state.users );
       this.setState( { users: [ ...this.state.users, user ] } ); */
      this.componentDidMount();
    });

    _defineProperty(this, "removeUser", user => {
      var users = this.state.users.filter((value, index, array) => {
        if (value.id === user.id) {
          console.log("removed user:  " + user.id);
          const userDeleteFetchUrl = ajaxurl + "?action=ftlpp-ext-expirable-delete-user&id=" + value.id + `&nonce=${nonceKeyNewTempUser.nonce_token}`;
          fetch(userDeleteFetchUrl).then(response => response.json()).then(result => {
            console.log(this.state.users);
          });
        } else {
          return value;
        }
      });
      this.setState({
        users: users
      });
    });

    _defineProperty(this, "handleCreateNew", event => {
      document.getElementsByClassName("userDetailsInputForm")[0].style.display = "block";
    });

    this.state = {
      users: [],
      showUserInputForm: false
    };
  }

  componentDidMount() {
    const usersFetchUrl = ajaxurl + "?action=ftlpp-ext-expirable-get-users"+`&nonce=${nonceKeyNewTempUser.nonce_token}`; //get users and display

    fetch(usersFetchUrl).then(response => response.json()).then(result => {
      this.setState({
        users: result
      });
      console.log(this.state.users);
    });
  }

  render() {
    return /*#__PURE__*/React.createElement("div", {
      className: "app"
    }, /*#__PURE__*/React.createElement("p", null, /*#__PURE__*/React.createElement("input", {
      className: "button submit",
      type: "button",
      value: "Create New",
      onClick: this.handleCreateNew
    })), /*#__PURE__*/React.createElement(UserInputForm, {
      addNewUser: this.addNewUser
    }), /*#__PURE__*/React.createElement("h3", null, "Temporary Login User List"), /*#__PURE__*/React.createElement("div", {
      className: "user-list"
    }, /*#__PURE__*/React.createElement("table", null, /*#__PURE__*/React.createElement("tr", null, /*#__PURE__*/React.createElement("th", null, "ID"), /*#__PURE__*/React.createElement("th", null, "Name"), /*#__PURE__*/React.createElement("th", null, "Email"), /*#__PURE__*/React.createElement("th", null, "Role"), /*#__PURE__*/React.createElement("th", null, "Expiry"), /*#__PURE__*/React.createElement("th", null, "Actions"), /*#__PURE__*/React.createElement("th", null, "Status")), this.state.users.map((user, index) => /*#__PURE__*/React.createElement(User, {
      key: index,
      index: index,
      user: user,
      removeUser: this.removeUser
    })))));
  }

}

ReactDOM.render( /*#__PURE__*/React.createElement(React.StrictMode, null, /*#__PURE__*/React.createElement(App, null)), document.getElementById('login_link_cont'));