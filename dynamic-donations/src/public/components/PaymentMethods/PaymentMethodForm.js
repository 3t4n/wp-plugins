import React, { useState } from "react";
import { useDispatch, useSelector } from "react-redux";

// Actions
import { removePaymentMethod, updateCreditCards } from "../../actions/user.actions";
import { changeError, changeStatusLoader, changeSecondError, changePageLink } from "../../actions/global.actions"

import { 
  handleDeleteCard, 
  handleUpdatePaymentMethod, 
  handleSetPaymentMethodAsPrimary 
} from "../Payment/handlers";

// WP API
import { WP } from "../../api";

import ConfirmDialog from '../ConfirmDialog/ConfirmDialog'

// Main Component
function PaymentMethodForm({ paymentMethod }) {
  // redux Hooks
  const dispatch = useDispatch();
  const [disabled, setDisabled] = useState(true);
  const { user } = useSelector((state) => ({
    user: state.user,
  }));

  const [open, setOpen] = useState(false);
  const [modalDelete, setModalDelete] = useState(true);

  const [expMonth, setExpMonth] = useState(paymentMethod.exp_month);
  const [expYear, setExpYear] = useState(paymentMethod.exp_year);

  const currentMonth = new Date().getMonth() + 1;
  const currentYear = new Date().getFullYear();

  const expirationDate = new Date(`${paymentMethod.exp_month}/01/${paymentMethod.exp_year}`);
  const today = new Date();
  const differenceInMonths = (expirationDate - today) / (1000 * 60 * 60 * 24 * 30);

  const handleChangeMonth = (e) => {
    setExpMonth(e.target.value);
  }

  const handleChangeYear = (e) => {
    setExpYear(e.target.value);
  }

  const handleEditSaveButtonClick = async (e) => {
    
    if (disabled) {
      setDisabled(!disabled);
    } else {
      setDisabled(!disabled);

      let error = false;
      
      if (expYear == currentYear) {
        if (expMonth < currentMonth) {
          error = true;
        }
      } else if (expYear < currentYear) {
        error = true;
      }

      if (!error) {
        dispatch(changeError(""));
        dispatch(changeStatusLoader(true));

        const res = await handleUpdatePaymentMethod(paymentMethod.id, expMonth, expYear);
        if (res.success) {
          const resPaymentMethods = await WP.request.hook("wp_payment_methods");
          if (resPaymentMethods.success) {
            dispatch(updateCreditCards(resPaymentMethods.data));
          }
          dispatch(changeStatusLoader(false));
          return;
        } 
      } else {
        dispatch(changeError("The expiration date of your card has already passed."));
        dispatch(changeStatusLoader(false));
        return;
      }
    }
  }

  const handleCancelDeleteButtonClick = (e) => {
    if (disabled) {
      handleOpen();
      setModalDelete(true);
    } else {
      setDisabled(!disabled);
      setExpMonth(paymentMethod.exp_month);
    }
  }

  const handleSeAsPrimaryButtonClick = async () => {
    handleOpen();
    setModalDelete(false);
  }

  const confirmClickModal = async () => {
    setOpen(false);
    dispatch(changeError(""));
    dispatch(changeStatusLoader(true));
    

    if (modalDelete) {
      // setDisabled(!disabled);
      dispatch(removePaymentMethod([]));
      const cardsToRemoveInstance = removePaymentMethod([...user.removePaymentMethod, paymentMethod.id])
      const cardsToRemove = cardsToRemoveInstance.payload;
      const attachedCards = user.creditCards;
      let defaultPaymentMethodId = "";
      attachedCards.forEach((attachedCard) => {
        if (
          !cardsToRemove.includes(attachedCard.id)
        ) {
          defaultPaymentMethodId = attachedCard.id;
          return;
        }
      });
      var res = await handleDeleteCard(cardsToRemove, defaultPaymentMethodId);
    } else {
      var res = await handleSetPaymentMethodAsPrimary(paymentMethod.id);
    }
    
    if (res.success) {
      const resPaymentMethods = await WP.request.hook("wp_payment_methods");
      if (resPaymentMethods.success) {
        dispatch(updateCreditCards(resPaymentMethods.data));
      }
      dispatch(removePaymentMethod([]));
      dispatch(changeStatusLoader(false));
      return;
    } else {
      const res = await WP.request.hook("wp_page_with_shortcode");
      dispatch(changeStatusLoader(false));
      dispatch(
        changePageLink(res.data)
      );
      dispatch(
        changeSecondError(
          "You cannot remove this payment method because you have an active subscription. If you'd like to discontinue your active subscription click here to manage your "
        )
      );
      dispatch(
        changeError(
          "You must leave at least one card attached to your account."
        )
      );
    }
  }

  const handleOpen = () => {
    setOpen(true);
  };

  const handleClose = () => {
    setOpen(false);
  };

  return (
    <>
      {open && (
        <ConfirmDialog
          title={ modalDelete ? "Are you sure you want to Delete this Payment Method?" : "Are you sure you want to set as primary this Payment Method?"}
          message={modalDelete ? "This action cannot be undone." : ""}
          onConfirm={confirmClickModal}
          onCancel={handleClose}
        />
      )}
      <div className={`dydo_paymentmethods__item  ${differenceInMonths <= 3 ? "dydo_paymentmethods_item_close_to_expiring" : ""}`}>
        {differenceInMonths <= 3 ? <span className="dydo_paymentmethods_message_close_to_expiring"> <img src={`${dydo_wp_public.plugin.assets_uri}/public/icons/alert-triangle.svg`} /> Update your payment method</span> : ''}
        <div className="dydo_row dydo_middle-xs">
          <div className="dydo_col-xs-6 dydo_col-sm-3">
            <input
              className="dydo_donation-amount__edit-amount dydo_update-paymentmethod_edit-amount"
              type="text"
              data-name="dydo-last4"
              defaultValue={"****-****-****- " + paymentMethod.last4}
              disabled
            />
          </div>
          <div className="dydo_col-xs-6 dydo_col-sm-3">
            <div className="dydo_container_date_inputs">
              <input
                className="dydo_donation-amount__edit-amount input_month dydo_update-paymentmethod_edit-amount dydo_update-paymentmethod_edit-amount-small"
                type="number"
                name="dydo_exp_month"
                onChange={handleChangeMonth}
                value={expMonth}
                disabled={disabled}
                min='1'
                max='12'
              />
              <input
                className="dydo_donation-amount__edit-amount input_year dydo_update-paymentmethod_edit-amount dydo_update-paymentmethod_edit-amount-small"
                type="number"
                name="dydo_exp_year"
                onChange={handleChangeYear}
                value={expYear}
                disabled={disabled}
              />
            </div>            
          </div>
          <div className={`dydo_col-xs-6 dydo_col-sm-6 dydo_icons_container  ${!disabled ? "dydo_disabled_false" : ""} ${paymentMethod.default_payment_method ? "dydo_container_default_payment_method" : ""}`}>    
          
          { paymentMethod.default_payment_method ?
            <span className="dydo_container_primary_payment">Primary Payment Method <img src={`${dydo_wp_public.plugin.assets_uri}/public/icons/star-white.svg`} /> </span> : ''
          }
          
          { disabled ? 
            <button type="button"
              className="dydo_btn-enable"
              onClick={handleEditSaveButtonClick}>
              <img src={`${dydo_wp_public.plugin.assets_uri}/public/icons/edit-ligth.svg`}  title="Edit Card" /> 
            </button> :
            <button type="button"
              className="dydo_btn-enable-empty"
              onClick={handleEditSaveButtonClick}> Save
            </button>
          }    
          {/* { !disabled ? 
            <button type="button"
              className="dydo_btn-enable-solid"
              onClick={handleSeAsPrimaryButtonClick}> Set as Primary
            </button> : ''
          }   */}
            
            <button type="button"
              className="dydo_btn-enable"
              onClick={handleCancelDeleteButtonClick}>
              {disabled ? <img src={`${dydo_wp_public.plugin.assets_uri}/public/icons/delete-light.svg`}  title="Delete Card" /> : <img src={`${dydo_wp_public.plugin.assets_uri}/public/icons/close-solid.svg`}  title="Cancel" />}
            </button>
            <button type="button"
              className="dydo_btn-enable"
              onClick={handleSeAsPrimaryButtonClick}
              >
              {paymentMethod.default_payment_method ? <img src={`${dydo_wp_public.plugin.assets_uri}/public/icons/star-yellow.svg`}  title="Primary Payment Method" /> : <img src={`${dydo_wp_public.plugin.assets_uri}/public/icons/star-gray.svg`}  title="Set as Primary" />}
            </button>
          </div>
        </div>
      </div>
    </>

  );
}

export default PaymentMethodForm;
