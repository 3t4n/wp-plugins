import React from "react";

const ConfirmDialog = ({ title, message, onConfirm, onCancel }) => {
  return (
    <div className="dydo_confirm-backdrop">
      <center>
        <div className="dydo_confirm-modal">
          <label className="dydo_confirm-label-title">{title}</label>
          <p className="dydo_confirm-message">{message}</p>
          <button className="dydo_btn-enable-solid" onClick={onConfirm}>Confirm</button>
          <button className="dydo_btn-enable-empty" onClick={onCancel}>Cancel</button>
        </div>
      </center>
    </div>

  );
};

export default ConfirmDialog;
