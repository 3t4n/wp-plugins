import Cookies from "universal-cookie";

// WP API
import WPAPI from "./wp-api";

// Store
import store from "../store";

// Actions
import {
  changeDonationAmount,
  changeDonationAmountOption,
  changeDonationCurrency,
  changeSymbolCurrency,
} from "../actions/donate.actions";
import { getGlobalSettings } from "../actions/global.actions";
import {
  updateUserData,
  updateUserIsAuthenticated,
} from "../actions/user.actions";

// WPAPI instance
export const WP = new WPAPI();

/**
 * One Time Dontion
 * */
export const addDonationToCart = async (amount, product_id) => {
  return await WP.request.hook("wc_add_donation", {
    amount: amount,
    pid: product_id,
  });
};

/**
 * Get global plugin settings
 * */
export const fetchGetGlobalSettings = async () => {
  const res = await WP.request.hook("wp_get_global_settings");
  if (res.success) {
    formatGlobalSettings(res.data);
  }
  return res;
};

export const fetchGetGlobalInitialSettings = async () => {
  formatGlobalSettings(dydo_wp_public.initial_options);
};

const formatGlobalSettings = async (options) => {
  const cookies = new Cookies();
  const amountChecked = options.amounts.find(
    (item) => item.amount_checked === true
  );
  const defaultCurrency = options.default_currency;
  cookies.set("dydo_stripe_pk", options.stripe_pk, { path: "/" });
  store.dispatch(getGlobalSettings(options));
  store.dispatch(changeDonationAmount(amountChecked.amount));
  store.dispatch(changeDonationAmountOption(amountChecked.name));
  store.dispatch(changeSymbolCurrency(defaultCurrency.symbol));
  store.dispatch(changeDonationCurrency(defaultCurrency.iso));
};

export const fetchCheckCurrentUser = async () => {
  await WP.auth.isAuthenticated().then(async (authenticated) => {
    if (authenticated) {
      store.dispatch(updateUserIsAuthenticated(authenticated));

      await WP.auth.getCurrentUser().then((user) => {
        store.dispatch(updateUserData(user));
      });
    }
  });
};
