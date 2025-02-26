import $ from "jquery";
import {
  fetchGetGlobalSettings,
  fetchCheckCurrentUser,
  fetchGetGlobalInitialSettings,
} from "./api/index";
import {
  changeDonationAmount,
  changeDonationAmountOption,
  changeDonationCurrency,
  changeDonationType,
  changeRecurringDonationOptions,
  changeSymbolCurrency,
  resetDonate,
} from "./actions/donate.actions";
import {
  changeAction,
  changeActionButtonText,
  changeSelectedSubscription,
  resetGlobal,
} from "./actions/global.actions";
import { resetSubscription } from "./actions/subscription.actions";
import { resetUser } from "./actions/user.actions";

import React from "react";
import ReactDOM from "react-dom";
import { Provider, useSelector } from "react-redux";
import { ThemeProvider } from "styled-components";
import "./config/dayjs";

// Themes
import { DefaultTheme } from "./themes";

// Store
import store from "./store";

// Apps
import { Main } from "./apps";

// (function () {
//   'use strict';



const header = `
		<header class="dydo_modal__header">
			<div class="dydo_row">
				<div class="dydo_col-xs-6">
					<h4 class="dydo_modal__title">${dydo_texts.modal.title ? dydo_texts.modal.title : dydo_texts.modal.title}</h4>
				</div>
				<div class="dydo_col-xs-6 dydo_end-xs">
					<button class="dydo_modal__close-button">
					  <img src=${dydo_wp_public.plugin.assets_uri}/public/icons/close-circle.svg alt="" />
					</button>
				</div>
			</div>
		</header>
	`;
const content = `
		<div class="dydo_modal__content"><div class="dydo_root-app"></div></div> 
	`;
const html = `
  <div id="dydo_modal">
    <div class="dydo_modal">
      <div class="dydo_modal__wrapper">
        ${header}
        ${content}
      </div>
      <div class="dydo_modal__bg"></div>
    </div>
  </div>
`;
$("body").append($(html));

export async function DyDo_Public_Modal() {
  const _self = this;
  _self.modal = $(".dydo_modal");
  _self.fetchSettingsResult = await fetchGetGlobalInitialSettings();
  _self.handleOpenModal();
  _self.handleCloseModal();
  _self.openModalByURL();    
}
DyDo_Public_Modal.prototype.createReactNode = async function () {
  try {
    await fetchCheckCurrentUser();
    const mainApp = document.querySelectorAll(".dydo_root-app");
    mainApp.forEach((container) => {
      container.innerHTML = "";
      ReactDOM.render(
        <Provider store={store}>
          <ThemeProvider theme={DefaultTheme}>
            <Main />
          </ThemeProvider>
        </Provider>,
        container
      );
    });
  } catch (error) {
    mainApp.forEach((container) => {
      container.innerHTML = `
      	<div class="dydo_error-section" style="margin-bottom: 2rem">
          <div class="dydo_error-section__content">
            <p class="dydo_error-section__paragraph">
            ${error}
            </p>
          </div>
        </div>
      `;
    });
  }
};

DyDo_Public_Modal.prototype.unmountReactNode = async function () {
    const mainApp = document.querySelectorAll(".dydo_root-app");
    mainApp.forEach((container) => {
      ReactDOM.unmountComponentAtNode(
        container
      );
    });
};

DyDo_Public_Modal.prototype.handleOpenModal = function () {
  const _self = this;
  const buttonOpenModal = $(".dydo_open-modal");
  buttonOpenModal.on("click", function (e) {
    e.preventDefault();
    const mode = $(this).data("mode");
    const screen = $(this).data("screen");
    $("body").css("overflow", "hidden");
    _self.modal.css({ opacity: 1, visibility: "visible" });
    _self.createReactNode();
    if (mode === "edit" || screen === "ADD_PAYMENT_METHOD" || screen === "REMOVE_PAYMENT_METHOD" || screen === "MANAGE_PAYMENT_METHOD") {
      store.dispatch(changeAction(screen));
      if (mode === "edit") {
        store.dispatch(
          changeSelectedSubscription(
            $(this)
              .parent()
              .parent()
              .parent()
              .parent()
              .parent()
              .data("subscription")
          )
        );
      }
    } else {
      _self.donationSetup(this);
    }
  });
};

DyDo_Public_Modal.prototype.donationSetup= async function (self) {
  const stateGlobalSettings = store.getState().global.settings;
  const donationType = $(self).data("donation-type") || $(self).data("type");
  const donationAmount = $(self).data("amount");
  const donationPeriodMode = $(self).data("period-mode");
  const donationPeriodInterval = $(self).data("period-interval");
  const donationPeriodIntervalCount = $(self).data("period-interval-count");
  const donationScreen = $(self).data("screen");
  let donationCurrencyIndex = [];
  donationCurrencyIndex = stateGlobalSettings?.selected_currencies
    ?.map((item) => item?.iso)
    .indexOf($(self).data("currency") || "usd");
  const donationCurrency =
    stateGlobalSettings.selected_currencies[donationCurrencyIndex];

  store.dispatch(
    changeActionButtonText(dydo_texts.screens.donate.make_a_recurring_donation)
  );

  if (donationType === "recurring") {
    store.dispatch(changeAction(donationScreen));
    store.dispatch(changeDonationType("recurring"));
    if (donationAmount) {
      store.dispatch(changeDonationAmount(Number(donationAmount)));
      store.dispatch(changeDonationAmountOption("dydo-custom-amount"));
    }
    store.dispatch(changeDonationCurrency(donationCurrency?.iso));
    store.dispatch(changeSymbolCurrency(donationCurrency?.symbol));
    store.dispatch(
      changeRecurringDonationOptions({
        mode: donationPeriodMode || "month",
        interval: donationPeriodInterval || "month",
        intervalCount: donationPeriodIntervalCount || 2,
      })
    );
  }

  if (donationType === "onetime") {
    store.dispatch(changeAction(donationScreen));
    store.dispatch(changeDonationType("onetime"));
    if (donationAmount) {
      store.dispatch(changeDonationAmount(Number(donationAmount)));
      store.dispatch(changeDonationAmountOption("dydo-custom-amount"));
    }
    store.dispatch(changeDonationCurrency(donationCurrency.iso));
    store.dispatch(changeSymbolCurrency(donationCurrency.symbol));
  }
};

DyDo_Public_Modal.prototype.handleCloseModal = function () {
  const _self= this;
  const modal = $(".dydo_modal");
  const button = $(".dydo_modal__close-button");
  button.on("click", async function (e) {
    e.preventDefault();
    store.dispatch(resetGlobal());
    store.dispatch(resetSubscription());
    store.dispatch(resetDonate());
    store.dispatch(resetUser());
    $("body").css("overflow", "initial");
    modal.css({ opacity: 0, visibility: "hidden" });
    _self.unmountReactNode();    
    await fetchGetGlobalSettings();
    await fetchCheckCurrentUser();
  });
};

DyDo_Public_Modal.prototype.openModalByURL = function () {
  const value = window.location.search;
  const urlParams = new URLSearchParams(value);
  const statusModal = urlParams.get("donation");

  const modal = $(".dydo_modal");

  if (statusModal === "true") {
    $("body").css("overflow", "hidden");
    modal.css({ opacity: 1, visibility: "visible" });
  }
};

// Your Donation
export function DyDo_Public_My_Account() {
  const _self = this;
  _self.PUBLIC_AJAX_URL = dydo_wp_public.ajax_url;
  _self.PUBLIC_NONCE = dydo_wp_public.nonce;
  _self.handleChangeStatusSubscription();
  _self.setCookie('dydo_tz', Intl.DateTimeFormat().resolvedOptions().timeZone,365);
  console.log();
}

DyDo_Public_My_Account.prototype.handleChangeStatusSubscription = function () {
  const _self = this;
  const checkbox = $(".dydo_change-status-recuring-donation");
  checkbox.on("change", function (e) {
    e.preventDefault();
    const currentCheckbox = $(this);
    const subscriptionId = currentCheckbox.data("subscription-id");
    const request = $.ajax({
      type: "POST",
      url: _self.PUBLIC_AJAX_URL,
      dataType: "json",
      data: {
        action: "wp_stripe_change_status_subscription",
        subscription_id: subscriptionId,
        subscription_status: currentCheckbox.is(":checked")
          ? "subscribe"
          : "unsubscribe",
        nonce: _self.PUBLIC_NONCE,
      },
      beforeSend: function () {
        checkbox.each(function (index, item) {
          $(item).prop("disabled", true);
        });
      },
      complete: function () {
        checkbox.each(function (index, item) {
          $(item).prop("disabled", false);
        });
      },
    });
    request.done(function (res) {
      if (res.success) {
        const data = res.data;

        if ("pause_collection" in data && data.pause_collection == null) {
          currentCheckbox
            .parents(".dydo_subscription")
            .find(".dydo_subscription__interval")
            .addClass("dydo_subscription__interval--active")
            .parents(".dydo_subscription")
            .addClass("dydo_subscription--active")
            .find(".dydo_subscription__status")
            .addClass("dydo_subscription__status--active")
            .text("Active");
        } else {
          currentCheckbox
            .parents(".dydo_subscription")
            .find(".dydo_subscription__interval")
            .removeClass("dydo_subscription__interval--active")
            .parents(".dydo_subscription")
            .removeClass("dydo_subscription--active")
            .find(".dydo_subscription__status")
            .removeClass("dydo_subscription__status--active")
            .text("Cancelled");
        }
      }
    });
  });
};

DyDo_Public_My_Account.prototype.setCookie = function(name,value,days){
  var expires = "";
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days*24*60*60*1000));
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "")  + expires + "; path=/";
};

/**
 * Get cookie by Name
 */
DyDo_Public_My_Account.prototype.getCookie = function(name){
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
};
