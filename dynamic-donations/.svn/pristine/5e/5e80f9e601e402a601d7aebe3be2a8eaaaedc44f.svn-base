import { WP } from "../../api";

// Create Subscription
const createSubscription = async (paymentMethodId, subscriptionData) => {
  return WP.request.hook("wp_stripe_recurring_payment", {
    payment_method_id: paymentMethodId,
    subscription_data: subscriptionData,
  });
};

// Create Payment Intent
const createPaymentIntent = async (paymentMethodId, amount, currency) => {
  return WP.request.hook("wp_stripe_onetime_payment", {
    payment_method_id: paymentMethodId,
    amount: amount,
    currency: currency,
  });
};

// Setup Intent
const createSetupIntent = async () => {
  return WP.request.hook("wp_stripe_setup_intents_and_customer");
};

// Confirm Card Setup
export const handleConfirmCard = async (
  type,
  client_secret,
  stripe,
  stripe_data
) => {
  switch (type) {
    case "setup":
      return stripe.confirmCardSetup(client_secret, stripe_data);
    case "payment":
      return stripe.confirmCardPayment(client_secret, stripe_data);
    default:
      return { error: false, paymentIntent: {} };
  }
};

// Attach payment method to customer
const handleAttachPaymentMethodToCustomer = (paymentMethodId) => {
  return WP.request.hook("wp_attach_payment_method_to_customer", {
    payment_method_id: paymentMethodId,
  });
};

// Update Donation
const handleUpdateDonation = async (
  onetime_donation_id,
  paymentIntent,
  confirmed
) => {
  return await WP.request.hook("wp_stripe_update_donation", {
    donation_id: onetime_donation_id,
    transaction_id: paymentIntent.id,
    amount: paymentIntent.amount,
    currency: paymentIntent.currency,
    confirmed: confirmed,
  });
};

const handleSaveDonation = async (paymentIntent, confirmed) => {
  return await WP.request.hook("wp_stripe_save_donation", {
    transaction_id: paymentIntent.id,
    amount: paymentIntent.amount,
    currency: paymentIntent.currency,
    confirmed: confirmed,
  });
};

const handleUpdateSubscriptionDate = async (
  subscriptionId,
  newDate,
  timezone
) => {
  return await WP.request.hook("wp_stripe_update_subscription_date", {
    subscription_id: subscriptionId,
    new_date: newDate,
    timezone: timezone,
  });
};

const handleCancelSubscription = async (subscriptionId) => {
  return await WP.request.hook("wp_stripe_cancel_subscription", {
    subscription_id: subscriptionId,
  });
};

const handleUpdateSubscriptionAmount = async (subscriptionId, newAmount) => {
  return await WP.request.hook("wp_stripe_update_subscription_amount", {
    subscription_id: subscriptionId,
    new_amount: newAmount,
  });
};

const handleUpdateSubscriptionPaymentMethod = async (
  subscriptionId,
  paymentMethodId
) => {
  return await WP.request.hook("wp_stripe_update_subscription_payment_method", {
    subscription_id: subscriptionId,
    payment_method_id: paymentMethodId,
  });
};

export const handleRecurringPaymentBySavedPaymentMethod = async ({
  paymentMethodId,
  subscriptionData,
}) => {
  if (!paymentMethodId) {
    throw new Error("Please select a credit card");
  }

  const resCreateSubscription = await createSubscription(
    paymentMethodId,
    subscriptionData
  );
  if (!resCreateSubscription.success) {
    throw new Error(resCreateSubscription.data.message);
  }
  return resCreateSubscription;
};

export const handleOnetimePaymentBySavedPaymentMethod = async ({
  paymentMethodId,
  amount,
  currency,
}) => {
  if (!paymentMethodId) {
    throw new Error("Please select a credit card");
  }

  const resCreatePaymentIntent = await createPaymentIntent(
    paymentMethodId,
    amount,
    currency
  );
  if (!resCreatePaymentIntent.success) {
    throw new Error(resCreatePaymentIntent.data.message);
  }

  return await resCreatePaymentIntent;
};

export const handleAddNewPaymentMethod = async ({
  type,
  stripe,
  stripe_data,
}) => {
  const resSetupIntent = await createSetupIntent();
  if (!resSetupIntent.success) {
    throw new Error(resSetupIntent.data.message);
  }

  const { error, setupIntent } = await handleConfirmCard(
    type,
    resSetupIntent.data.client_secret,
    stripe,
    stripe_data
  );
  if (error) {
    throw new Error(error.message);
  }
  return setupIntent;
};

export const handleRecurringPaymentByNewPaymentMethod = async ({
  type,
  stripe,
  stripe_data,
  subscriptionData,
}) => {
  const resSetupIntent = await createSetupIntent();
  if (!resSetupIntent.success) {
    throw new Error(resSetupIntent.data.message);
  }

  const { error, setupIntent } = await handleConfirmCard(
    type,
    resSetupIntent.data.client_secret,
    stripe,
    stripe_data
  );
  if (error) {
    throw new Error(error.message);
  }
  const resCreateSubscription = await createSubscription(
    setupIntent.payment_method,
    subscriptionData
  );
  if (!resCreateSubscription.success) {
    throw new Error(resCreateSubscription.data.message);
  }
};

export const handleOnetimePaymentByNewPaymentMethod = async ({
  type,
  stripe,
  stripe_data,
  paymentMethodId,
  amount,
  currency,
}) => {
  const resCreatePaymentIntent = await createPaymentIntent(
    paymentMethodId,
    amount,
    currency
  );
  if (!resCreatePaymentIntent.success) {
    throw new Error(resCreatePaymentIntent.data.message);
  }
  const data = resCreatePaymentIntent.data;
  const paymentStatus = data.payment_intent.status;
  const paymentIntentId = data.payment_intent.id;
  if (
    paymentStatus === "requires_payment_method" ||
    paymentStatus === "requires_confirmation"
  ) {
    const { error, paymentIntent } = await handleConfirmCard(
      type,
      data.payment_intent.client_secret,
      stripe,
      stripe_data
    );
    if (error) {
      throw new Error(error.message);
    }
  }
  return await handleUpdateDonation(
    data.onetime_donation_id,
    { id: paymentIntentId, amount, currency },
    true
  );
};

export const handleChangeSubscriptionDate = async ({
  subscriptionId,
  newDate,
  timezone,
}) => {
  const updateSubscriptionDate = await handleUpdateSubscriptionDate(
    subscriptionId,
    newDate,
    timezone
  );
  if (!updateSubscriptionDate.success) {
    throw new Error(updateSubscriptionDate.data.message);
  }
  return updateSubscriptionDate;
};

export const handleRemoveSubscription = async (subscriptionId) => {
  const canceledSubscription = await handleCancelSubscription(subscriptionId);
  if (!canceledSubscription.success) {
    throw new Error(canceledSubscription.data);
  }
  return canceledSubscription;
};

export const handleChangeSubscriptionAmount = async ({
  subscriptionId,
  newAmount,
}) => {
  const updateSubscriptionAmount = await handleUpdateSubscriptionAmount(
    subscriptionId,
    newAmount
  );
  if (!updateSubscriptionAmount.success) {
    throw new Error(updateSubscriptionAmount.data.message);
  }
  return updateSubscriptionAmount;
};

export const handleChangeSubscriptionPaymentMethod = async ({
  subscriptionId,
  paymentMethodId,
}) => {
  const updatedSubscriptionPaymentMethod =
    await handleUpdateSubscriptionPaymentMethod(
      subscriptionId,
      paymentMethodId
    );
  if (!updatedSubscriptionPaymentMethod.success) {
    throw new Error(updatedSubscriptionPaymentMethod.data.message);
  }
  return updatedSubscriptionPaymentMethod;
};

export const handleDeleteCard = async (
  paymentMethods,
  defaultPaymentMethodId
) => {
  return await WP.request.hook("wp_stripe_delete_payment_method", {
    payment_methods: paymentMethods,
    default_payment_method_id: defaultPaymentMethodId,
  });
};

export const handleUpdatePaymentMethod = async (paymentMethod, expMonth, expYear) => {
  return await WP.request.hook("wp_stripe_update_payment_method", {
    payment_method: paymentMethod,
    exp_month: expMonth,
    exp_year: expYear
  })
}

export const handleSetPaymentMethodAsPrimary = async (paymentMethod) => {
  return await WP.request.hook("wp_stripe_payment_method_as_primary", {
    paymentmethod: paymentMethod,
  })
}
