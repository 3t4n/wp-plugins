import React from "react";

const ConfirmModal = ({ title, message, onConfirm, onCancel, disabled }) => {
  return (
    <div className="dydo_confirm-backdrop">
      <center>
        <div className="dydo_confirm-modal">
          <label className="dydo_confirm-label-title">{title}</label>
          <p className="dydo_confirm-message">{message}</p>
          <button className="dydo_btn-enable-solid" onClick={onConfirm} disabled={disabled}>Confirm</button>
          <button className="dydo_btn-enable-empty" onClick={onCancel}>Cancel</button>
        </div>
      </center>
    </div>

  );
};

export default ConfirmModal;
